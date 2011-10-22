<?php

$ch = curl_init();
$url = "http://features.oxygen.com/OxygenECard2010/email.php?debug=1";
$fields = array(
	"name" => "Hrithik",
	"email" => "hrithikp@me.com",
	"recipients" => "hrithikp@gmail.com",
	"message" => "Hello World!"
);
$fields_string = "";
foreach($fields as $key=>$value) { $fields_string .= $key.'='.urlencode($value).'&'; } 
rtrim($fields_string,'&');
//set the url, number of POST vars, POST data 
curl_setopt($ch,CURLOPT_URL,$url);
curl_setopt($ch,CURLOPT_POST,count($fields));
curl_setopt($ch,CURLOPT_POSTFIELDS,$fields_string);
//execute post 
$result = curl_exec($ch);

echo $result;
