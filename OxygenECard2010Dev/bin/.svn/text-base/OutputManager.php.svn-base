<?php

class OutputManager {
	
	private static $_debug = false;
	private static $_returnParams = '';
	
	private static $_callback;

		
	public static function setHeaders() {
		header('Content-type: text/javascript; charset=UTF-8');
		header('Cache-Control: private, no-cache, no-store, must-revalidate');
	}
	
	public static function setDebugMode($debug = true) {
		self::$_debug = $debug;
		if(self::$_debug) self::debug(__CLASS__ . ': debug mode activated');
		
		return self::$_debug;
	}
	
	public static function getDebugMode() {
		return self::$_debug;
	}
	
	public static function setCallback($callback) {
		if (preg_match('/\W/', $callback)) {
			// if $callback contains a non-word character this could be an XSS attack.
			self::error('Invalid callback', true);
		} else {
			self::$_callback = $callback;
		}
	}


	////////////////////////////////////////////////////////////////////////
	////////////////////////////////////////////////////////////////////////
	
	public static function debug($msg) {
		if(self::$_debug) echo $msg . "\n";
	}

	public static function error($msg, $fatal = false) {
		if(self::$_debug) self::debug($msg);
		self::_print('error', $msg);
		if($fatal) die();
	}

	public static function result($data) {
		self::_print('result', $data);
	}
	
	private static function _print($label, $data) {
		$returnData = Array();
		$returnData[$label] = $data;
		$json = json_encode($returnData);
	
	  	if(isset(self::$_callback)) print self::$_callback . '(' . $json . ');';
		else print $json;
	}
}

?>