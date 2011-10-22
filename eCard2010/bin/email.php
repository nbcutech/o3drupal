<?php

  //////////////////////////////////////////
// output manager

ini_set('include_path', '/');
ini_set('safe_mode', '0');

require_once 'OutputManager.php';
OutputManager::setHeaders();

$debug = $_GET['debug'];

if($debug) {
	error_reporting(E_ALL|E_STRICT);
	ini_set("display_errors", "on");
}


  //////////////////////////////////////////
// POST params

$name 		= (string) sanitize($_POST['name']);
$email 		= (string) sanitize($_POST['email']);
$recipients = (string) sanitize($_POST['recipients']);
$message 	= (string) sanitize($_POST['message']);

function sanitize($var) {
	return filter_var($var, FILTER_SANITIZE_STRING);
}



  //////////////////////////////////////////
// sucess / error functions

function success($msg) {
	OutputManager::result($msg);
}

function error($msg) {
	OutputManager::error($msg);
}



  //////////////////////////////////////////
// email

$SUBJECT 	= 'This Season, Live Out Loud With Oxygen!';
$LINK_URL 	= 'http://features.oxygen.com/OxygenECard2010/index.php?msg=';
$IMG_URL	= 'http://features.oxygen.com/OxygenECard2010/email.jpg';


if($name && $email && $recipients && $message) {
	
	$linkUrl  = $LINK_URL . $message;
	$body 	  = '<html><body>This eCard was sent from ' . $name . '. To reply, please email <a href="mailto:' . $email . '">' . $email . '</a><br/>';
	$body 	 .= '<a href="' . $linkUrl . '"><img src="' . $IMG_URL . '" alt="Click to shake for your personalized holiday message!"/></a>';
	$body 	 .=  '</body></html>';
	
	$headers  = 'MIME-Version: 1.0' . "\r\n";
	$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
	$headers .= 'From:' . $email;
	$headers .= "\nReply-To:" . $email;

	$fifth 	  = "-f" . $email;
	$array    = explode(',', $recipients);
	

	foreach ($array as $to) {
		
		if(mail($to, $SUBJECT, $body, $headers, $fifth)) {
			
			if($debug) 	success('name:' . $name . ' email: ' . $email . ' recipients: ' . $recipients . ' message: ' . $message);
			else 		success('success');
			
		} else {
			error('send mail failed');
		}
		
	}
	
} else {
	error('missing params');
}

?>