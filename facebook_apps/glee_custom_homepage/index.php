<?php

require 'facebook.php';
$app_id = "222446347773019";
$app_secret = "01d1802674e8956fceea2fa2c0365a6a";
$facebook = new Facebook(array(
'appId' => $app_id,
'secret' => $app_secret,
'cookie' => true
));

$signed_request = $facebook->getSignedRequest();

$page_id = $signed_request["page"]["id"];
$page_admin = $signed_request["page"]["admin"];
$like_status = $signed_request["page"]["liked"];
$country = $signed_request["user"]["country"];
$locale = $signed_request["user"]["locale"];

if ($like_status) {
include("glee_homepage_liked.php");

}
else {
include("glee_homepage_clickLike.php");
}

?>