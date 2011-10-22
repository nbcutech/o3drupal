<?

$xml = '<?xml version="1.0" encoding="UTF-8"?><K2DATACOLLECTOR><CLIENT>Oxygen</CLIENT><ZIPCODE>'.$_GET['zip'].'</ZIPCODE></K2DATACOLLECTOR>';

$ch = curl_init("http://oxygenxml.viewerlink.tv/collectxml.asp");
curl_setopt ($ch, CURLOPT_HEADER, 0);
curl_setopt ($ch, CURLOPT_POSTFIELDS, $xml);
curl_setopt ($ch, CURLOPT_HTTPHEADER, Array("Content-Type: text/xml"));
curl_setopt ($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt ($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
curl_setopt ($ch, CURLOPT_VERBOSE, false);

$xml = strtolower(curl_exec($ch)); //echo $xml;

$data = simplexml_load_string($xml, "SimpleXMLElement"); //print_r($data);

$json = json_encode($data);

header('content-type: application/jsonp; charset=utf-8');
echo $_GET['callback'].'('.$json.')';

?>