<?php

if (!defined('GOOGLE_MINI_MAX_RESULTS')) {
  define('GOOGLE_MINI_MAX_RESULTS', 1000);
}

class GoogleMini {

  private $_metaDataFilters = array();
  public  $baseUrl = ''; // REQUIRED
  public  $frontEnd = ''; // IF SET WILL DISABLE parsing of results.
  public  $collection = ''; // REQUIRED
  protected $_queryParts;


  public function __construct($debug = FALSE, $debug_callback = NULL) {
    if ($debug) {
      $this->debug = TRUE;
      if ($debug_callback && function_exists($debug_callback)) {
        $this->debug_callback = $debug_callback;
      }
    }
  }

  function log($message = NULL) {
    if ($this->debug_callback) {
      $callback = $this->debug_callback;
      call_user_func($callback,$message);
    }
    error_log($message);
  }

  /**
   * Helper function, just builds the array for processing, may have validation later.
   *
   * @param string $key
   * @param string $value
   */
  public function setQueryPart($key, $value) {
    $this->_queryParts[$key] = $value;
  }

  /**
   * Helper function, returns a pre-assigned query part.
   *
   * @param string $key
   * @return the query part corresponding to $key, or false if it doesn't exist
   */
  public function getQueryPart($key) {
    if ($this->_queryParts[$key]) {
      return $this->_queryParts[$key];
    }
    return false;
  }

  /**
   * Adds a meta data filter to the query.  Currently has limited flexibility.
   * Pass a key as a meta field and values as an array of values to be OR'd together.
   * or you can pass a value as a string to be the only value (for ease of use).
   *
   * When you filter on many fields they are all AND'd together.
   *
   * @param fieldname $key
   * @param string|array $values
   * @param type either requiredfields or partialfields
   * @param string $join either AND or OR
   */
  public function addMetaDataFilter($key, $values, $type = 'partialfields', $join = 'OR') {
    if (!in_array($type, array('partialfields', 'requiredfields'))) {
      throw new GoogleMiniCriteriaException("You must provide a type of either partialfields or requiredfields", '-99');
    }
    if (is_array($values)) {
      $this->_metaDataFilters[$type][$key] = new stdClass();
      $this->_metaDataFilters[$type][$key]->type = $join;
      foreach ($values as $k => $value) {
        $this->_metaDataFilters[$type][$key]->values[] = urlencode($value);
      }
    } else {
      $this->_metaDataFilters[$type][$key]->type = $join;
      $this->_metaDataFilters[$type][$key]->values = array (urlencode($values));
    }
  }

  /**
   * Sets the languages to be used in the search, if none specified, searches all languages
   *
   * @param array $languages
   */
  public function setLanguageFilter($languages = NULL) {
    if ($languages) {
      if (is_array($languages)) {
        $this->setQueryPart("lr", implode('|', $languages));
      } else {
        $this->setQueryPart("lr", $languages);
      }
      return TRUE;
    }
    return FALSE;
  }

  /**
   * Creates a date filter
   *
   * @param date $date_before Date in YYYY-MM-DD format.
   * @param date $date_after Date in YYYY-MM-DD format.
   */
  public function setDateFilter($date_before, $date_after) {
    if ($this->_queryParts['q']) {
      $this->_queryParts['q'] .= "%20daterange:$date_before..$date_after";
    } else {
      $this->setQueryPart('q', "daterange:$date_before..$date_after");
    }
  }

  /**
   * Adds a site restriction. Useful if just querying by date, as that won't work
   * unless you search for words or at least one other keyword search.
   *
   * @param string $domain
   */
  public function setDomainRestriction($domain) {
    if ($this->_queryParts['q']) {
      $this->_queryParts['q'] .= "%20site:$domain";
    } else {
      $this->setQueryPart('q', "site:". urlencode($domain));
    }
  }

  /**
   * Sets sorting type (date or relevancy) and direction
   *
   * @param string $dir
   *  A - Sort in Ascending order
   *  D - Sort in Descending order
   * @param string $mode
   *  S - Return the 1,000 most relevant results, sorted by date.
   *  R - Return all results, sorted by date.
   *   *** WARNING *** Do not use this filter if your collection contains more than 50,000 documents.
   *   If the result set is very large, the sort operation could create significant delays in the display of results.
   */
  public function setDateSort($dir = "D", $mode = 'S') {
      if ($dir != 'A' && $dir != 'D') {
        throw new GoogleMiniCriteriaException(sprintf("The Sort direction provided is incorrect.  Got %s, needs to be A or D", htmlentities($dir)), E_WARNING);
      }
      if ($mode != 'S' && $mode != 'R') {
        throw new GoogleMiniCriteriaException(sprintf("The Sort mode provided is incorrect.  Got %s, needs to be S or R", htmlentities($mode)), E_WARNING);
      }

      // build sort string
      // http://code.google.com/apis/searchappliance/documentation/46/xml_reference.html#request_sort_by_date
      $this->setQueryPart('sort', "date:$dir:$mode:d1");
      return true;
  }


  /**
   * Set the keywords used for keyword search
   *
   * @param string $keys
   */
  public function setKeywords($keys) {		
    if ($this->_queryParts['q']) {
      $this->_queryParts['q'] .= "%20". urlencode($keys);
    } else {
      $this->setQueryPart('q', urlencode($keys));
    }
  }

  /**
   * Set fields to show in results. For all fields, send an asterisk (*)
   *
   * @param array $fields
   */
  public function setMetaDataRequested($fields = NULL) {
    if (is_array($fields)) {
     $this->setQueryPart('getfields', implode('.', $fields));
    } else {
      $this->setQueryPart('getfields', $fields);
    }
  }

  /**
   * Set page of result set to be shown and sets number of results per page
   *
   * @param int $page
   */
  public function setPageAndResultsPerPage($page = 0, $results = 10) {
    $end = $page * $results + $results;
    if ($end > GOOGLE_MINI_MAX_RESULTS) {
      throw new GoogleMiniCriteriaException("You cannot get more than ".GOOGLE_MINI_MAX_RESULTS." results per page, requested $end", 2);
    }
    $this->setQueryPart('start', $page * $results);
    $this->setQueryPart('num', $results);
    return true;
  }


  /**
   * Set the encoding for data coming out of the search
   *
   * @param string $enc
   */
  public function setOutputEncoding($enc) {
    $this->setQueryPart('oe', $enc);
  }

 /**
   * Set the encoding for data going into the search
   *
   * @param string $enc
   */
  public function setInputEncoding($enc) {
    $this->setQueryPart('ie', $enc);
  }

  /**
   * Fires the query to google
   *
   */

  public function buildQuery() {
     if (!$this->baseUrl || !$this->collection) {
      throw new GoogleMiniQueryException("Required variables (baseUrl or collection) missing", E_WARNING);
    }

    if (count($this->_metaDataFilters)) {
      foreach ($this->_metaDataFilters as $type => $fields ) {
        $_metafilter = '';
        foreach ($fields as $field => $mdf) {
          if ($mdf->type == "ANDNEG") {
            foreach ($mdf->values as $value) {
             $metafilter .= '-'. $field .':'. $value .'.';
            }
          }
          elseif ($mdf->type == 'OR' || $mdf->type == 'OROR') {
            $vals = array();
            foreach ($mdf->values as $v) {
              $vals[] = $field .':'. $v;
            }
            // The 'OROR' case is used on the Related Information pages, where you want
            // to search documents with one of multiple terms in multiple vocabularies.
            // You have to join the different types with a | otherwise the date sorting gets messed up.
            
            
            /***
             * IMPORTANT!  The new Version of the Mini uses parenthesis.
             * This will not work for older versions pre August 2008 (I believe).
             *
             * If you are using one of these versions see the patch at: ?
             * which will use the old ?
             *
             */
            
            if ($mdf->type == 'OROR') {
              $metafilter .= '(' . join("|", $vals) . ")|";
            }
            else {
              $metafilter .= '(' . join("|", $vals) . ").";
            }
          }
          else {
            foreach ($mdf->values as $value) {
              $metafilter .= $field .':'. $value .'.';
            }
          }
        }
        $metafilter = substr($metafilter, 0,-1);
        $this->setQueryPart($type, $metafilter);
      }
    }

    $this->setQueryPart('output', 'xml_no_dtd');

    $query = $this->baseUrl;
    $query .= "?site=". $this->collection;

    if ($this->debug) {
      $this->log('Building Query');
      $this->log(var_export($this->_queryParts, 1));
    }

    foreach ($this->_queryParts as $label => $value) {
      $query .= "&$label=$value";
    }
    $this->_query = $query;
    if ($this->debug) {
      $this->log($query);
    }

    return $query;

  }



  public function query($iteratorClass = 'GoogleMiniResultIterator') {
    $query = $this->buildQuery();
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $query);            // Set the query URL.
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);   // Return the response during the curl_exec() call, or FALSE on error.
    curl_setopt($ch, CURLOPT_VERBOSE, TRUE);          // Output errors to STDERR
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);  // Allow the cURL request to succeed even if the Google Mini server's SSL certificate isn't valid.
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);  // This way, you can serve the Google Mini using https without having to maintain an SSL certficate.

    // Set this to a large number if connections aren't being made. Set to 0 for infinite timeout.
    if ($timeout = variable_get('google_appliance_timeout', FALSE)) {
      curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
    }

    // send request
    $resultXML = curl_exec($ch);
    if ($this->debug) {
      $this->log('Made cURL request to '. $query);
    }

    // handle errors if cURL request fails
    if (!$resultXML) {
      if ($this->debug) {
        $this->log('cURL error #'. curl_errno($ch) .': '. curl_error($ch));
      }
      throw new GoogleMiniResultException('There was a cURL error while connecting with the Google device.');
      return FALSE;
    }

    // if request succeeded, return formatted result set
    return self::resultFactory($resultXML, $iteratorClass);
  }

  function resultFactory($resultXML, $className = 'GoogleMiniResultIterator') {
    $results = array();

    libxml_use_internal_errors(TRUE);
    if (!$payload = simplexml_load_string($resultXML)) {
      $errors = array();
      foreach (libxml_get_errors() as $error) {
        $errors[] = $error->message;
      }
      $errors = join(', ', $errors);
      throw new GoogleMiniResultException('There was an error parsing the result XML: '. $errors);
      return FALSE;
    }

    $totalResults = $payload->RES->M;    
    
    if ($totalResults == 0) {
      if (!$payload->GM) {
        throw new GoogleMiniResultException("No Results found", '1');
      }
    }
    else {
      foreach ($payload->xpath('//R') as $res) {
        $results[] = $res;
      }
    }
    $iterator = new $className($results);
    $iterator->payload = $payload;
    $iterator->time = $payload->TM;
    $iterator->totalResults = $totalResults;
    return $iterator;
  }
}

class GoogleResult extends SimpleXMLIterator {

}

class GoogleMiniResultIterator extends ArrayIterator   {

  public $time;
  public $payload;
  public $totalResults;

  function current() {
    $result = parent::current();
    return new GoogleMiniResult($result);
  }

  function __get($key) {
    return $this->payload->$key;
  }

  /**
   * Returns an array of keymatches keyed with:
   * [link] => [title]
   *
   */
  function getKeyMatches() {
    $output = array();
    if ($this->GM) {
      foreach ($this->GM as $match) {
        $output[(string)$match->GL] = (string)$match->GD;
      }
    }

    return $output;
  }

  /**
   * Returns an array of synonyms.
   */
  function getSynonyms() {
    $output = array();
    if ($this->Synonyms) {
      foreach ($this->Synonyms->children() as $child) {
        $output[] = (string) $child['q'];
      }
    }
    return $output;
  }

}

class GoogleMiniResult {
  var $metaData;
  function __construct($result) {
    $this->result = $result;
  }

  function __get($key) {
    return $this->result->$key;
  }

  function getMetaData($key) {
    if (!$this->metaData) {
      $this->buildMetaData();
    }
    return $this->metaData[$key];
  }

  function buildMetaData() {
    foreach ($this->result->MT as $metaTag) {
      $name = $metaTag['N'];
      $value = $metaTag['V'];
      $this->metaData[(string)$name] = (string)$value;
    }
  }
}


class GoogleMiniQueryException extends GoogleMiniException {

}
class GoogleMiniCriteriaException extends GoogleMiniException {

}

class GoogleMiniResultException extends GoogleMiniException {
  var $log_messages = array();
}

class GoogleMiniException extends Exception {
  
  function __construct($message, $code = null) {
    parent::__construct($message, $code);
    $this->userMessage = GoogleMiniException::getUserMessage($code);
    if (!$this->userMessage) {
      $this->userMessage = $message;
    }
  }
  
  function getErrorCodes() {
    static $error_codes;
    if (!$error_codes) {
      $error_codes = array(
        '-100' => 'We apologize, but the connection to our search engine appears to be down at the moment, please try again later.',
        '-99' => 'We apologize, but your search cannot be completed at this time, please try again later.',
        '1' => 'No results were found that matched your criteria.  Please try broadening your search.',
        '2' => 'Sorry, but our search does not return more than 1,000 records, please refine your criteria.',
      );
    }
    return $error_codes;
  }
  
  
  function getUserMessage($code) {
    $error_codes = $this->getErrorCodes();  
    return $error_codes[$code];
  }
}

?>
