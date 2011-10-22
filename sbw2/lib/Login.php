<?php
// Define path to application directory
defined('APPLICATION_PATH')
    || define('APPLICATION_PATH', realpath(dirname(__FILE__) . '/../'));

// Ensure lib/ is on include_path
set_include_path(implode(PATH_SEPARATOR, array(
    realpath(APPLICATION_PATH . '/lib')
)));

require_once 'Zend/Exception.php';
require_once 'Zend/Config/Ini.php';
require_once 'Zend/Registry.php';
require_once 'Zend/Auth.php';

class Login {

    /**
     *
     * @var Zend_Config 
     */
    protected $_config;

    /**
     *
     * @var Array $_GET params
     */
    protected $_params;

    /**
     * Constructor
     *
     * @param array $params $_GET params
     */
    public function __construct( Array $params=array() )
    {
        // get config
        $this->_config = new Zend_Config_Ini(APPLICATION_PATH . '/configs/config.ini');

        // set params
        $this->_params = $params;
        
        // clear the message
        self::setMessenger( '' );
    }

    /**
     * Authorizes client and sets auth session
     * 
     * @return boolean true on success
     */
    public function login() {

        // get an instance of Zend_Auth
        $auth = Zend_Auth::getInstance();

        // check if a user is already logged
        if ($auth->hasIdentity()) {
            self::setMessenger( 'It seems you are already logged into the system' );
            return false;
        }

        // if the user is not logged, the do the logging
        // $openid_identifier will be set when users 'clicks' on the account provider
        $openid_identifier = $this->_getParam('openid_identifier');

        // $openid_mode will be set after first query to the openid provider
        $openid_mode = $this->_getParam('openid_mode');

        // this one will be set by facebook connect
        $code = $this->_getParam('code');

        // while this one will be set by twitter
        $oauth_token = $this->_getParam('oauth_token');


        // do the first query to an authentication provider
        if ($openid_identifier) {
            
            if ('https://www.twitter.com' == $openid_identifier) {
                $adapter = $this->_getTwitterAdapter();
            } else if ('https://www.facebook.com' == $openid_identifier) {
                $adapter = $this->_getFacebookAdapter();
            } else {
                // for openid
                $adapter = $this->_getOpenIdAdapter($openid_identifier);

                // specify what to grab from the provider and what extension to use
                // for this purpose
                $toFetch = $this->_config->openid->tofetch->toArray();
                
                // for google and yahoo use AtributeExchange Extension
                if ('https://www.google.com/accounts/o8/id' == $openid_identifier || 'http://me.yahoo.com/' == $openid_identifier) {
                    $ext = $this->_getOpenIdExt('ax', $toFetch);
                } else {
                    $ext = $this->_getOpenIdExt('sreg', $toFetch);
                }

                $adapter->setExtensions($ext);
            }

            // here a user is redirect to the provider for logging
            $result = $auth->authenticate($adapter);

            // the following two lines should never be executed unless the redirection failed.
            self::setMessenger( 'Redirection failed' );
            return false;
        } else if ($openid_mode || $code || $oauth_token) {
            // this will be exectued after provider has redirected the user back to us
            if ($code) {
                // for facebook
                $adapter = $this->_getFacebookAdapter();
            } else if ($oauth_token) {
                // for twitter
                $adapter = $this->_getTwitterAdapter()->setQueryData($_GET);
            } else {
                // for openid                
                $adapter = $this->_getOpenIdAdapter(null);

                // specify what to grab from the provider and what extension to use
                // for this purpose
                $ext = null;
                
                $toFetch = $this->_config->openid->tofetch->toArray();
                
                // for google and yahoo use AtributeExchange Extension
                if (isset($_GET['openid_ns_ext1']) || isset($_GET['openid_ns_ax'])) {
                    $ext = $this->_getOpenIdExt('ax', $toFetch);
                } else if (isset($_GET['openid_ns_sreg'])) {
                    $ext = $this->_getOpenIdExt('sreg', $toFetch);
                }

                if ($ext) {
                    $ext->parseResponse($_GET);
                    $adapter->setExtensions($ext);
                }
            }

            $result = $auth->authenticate($adapter);

            if ($result->isValid()) {

                $toStore = array('identity' => $auth->getIdentity());

                if (isset( $ext ) && !is_null( $ext ) ) {
                    // for openId
                    $toStore['properties'] = $ext->getProperties();
                } else if ($code) {
                    // for facebook
                    $msgs = $result->getMessages();
                    $toStore['properties'] = (array) $msgs['user'];
                } else if ($oauth_token) {
                    // for twitter
                    $identity = $result->getIdentity();
                    // get user info
                    $twitterUserData = (array) $adapter->verifyCredentials();
                    $toStore = array('identity' => $identity['user_id']);
                    if (isset($twitterUserData['status'])) {
                        $twitterUserData['status'] = (array) $twitterUserData['status'];
                    }
                    $toStore['properties'] = $twitterUserData;
                }

                $auth->getStorage()->write($toStore);

                self::setMessenger('Successful authentication');
                return true;
            } else {
                self::setMessenger('Failed authentication');
                return false;
            }
        }
    }

    /**
     * Logout user by clearing Identity
     * 
     * @return boolean
     */
    public static function logout() {
        $auth = Zend_Auth::getInstance();
        $auth->clearIdentity();
        self::setMessenger('You were logged out');
        return true;
    }

    /**
     * Get My_Auth_Adapter_Facebook adapter
     *
     * @return My_Auth_Adapter_Facebook
     */
    protected function _getFacebookAdapter() {

        require 'My/Auth/Adapter/Facebook.php';
        
        extract($this->_config->facebook->toArray());
        return new My_Auth_Adapter_Facebook( $this->_getParam( 'code' ), $appid, $secret, $redirecturi, $scope);
    }

    /**
     * Get My_Auth_Adapter_Oauth_Twitter adapter
     *
     * @return My_Auth_Adapter_Oauth_Twitter
     */
    protected function _getTwitterAdapter() {

        require_once 'My/Auth/Adapter/Oauth/Twitter.php';

        extract($this->_config->twitter->toArray());
        return new My_Auth_Adapter_Oauth_Twitter(array(), $appid, $secret, $redirecturi);
    }

    /**
     * Get Zend_Auth_Adapter_OpenId adapter
     *
     * @param string $openid_identifier
     * @return Zend_Auth_Adapter_OpenId
     */
    protected function _getOpenIdAdapter($openid_identifier = null) {

        require_once 'Zend/Auth/Adapter/OpenId.php';
        require_once 'Zend/OpenId/Consumer/Storage/File.php';

        $adapter = new Zend_Auth_Adapter_OpenId($openid_identifier);

        if (!file_exists($this->_config->tmpDirectory)) {
            if (!mkdir($this->_config->tmpDirectory)) {
                throw new Zend_Exception("Cannot create {$this->_config->tmpDirectory} to store tmp auth data.");
            }
        }
        $adapter->setStorage(new Zend_OpenId_Consumer_Storage_File($this->_config->tmpDirectory));

        return $adapter;
    }

    /**
     * Get Zend_OpenId_Extension. Sreg or Ax. 
     * 
     * @param string $extType Possible values: 'sreg' or 'ax'
     * @param array $propertiesToRequest
     * @return Zend_OpenId_Extension|null
     */
    protected function _getOpenIdExt($extType, array $propertiesToRequest) {

        require_once 'My/OpenId/Extension/AttributeExchange.php';
        require_once 'Zend/OpenId/Extension/Sreg.php';

        $ext = null;

        if ('ax' == $extType) {
            $ext = new My_OpenId_Extension_AttributeExchange($propertiesToRequest);
        } elseif ('sreg' == $extType) {
            $ext = new Zend_OpenId_Extension_Sreg($propertiesToRequest);
        }

        return $ext;
    }

    /**
     * get current $_GET param if set
     *
     * @param string $param
     * @return string|null
     */
    protected function _getParam($param)
    {
        if( isset( $this->_params[$param] ) ) {
            return $this->_params[$param];
        } else {
            return null;
        }
    }

    /**
     * Set a message to registry
     *
     * @param string $message
     */
    public static function setMessenger( $message )
    {
        Zend_Registry::set( 'message', $message );
    }

    /**
     * Get message from registry
     *
     * @return string
     */
    public static function getMessenger()
    {
        return Zend_Registry::get( 'message' );
    }

    /**
     * Determine whether user is logged in or not
     * 
     * @return boolean
     */
    public static function hasIdentity()
    {
        $auth = Zend_Auth::getInstance();
        return $auth->hasIdentity();
    }

    /**
     * Get the Identity from Zend_Auth instance
     * 
     * @return Array|false
     */
    public static function getIdentity()
    {
        $auth = Zend_Auth::getInstance();
        return $auth->hasIdentity() ? $auth->getIdentity() : false;
    }
}

