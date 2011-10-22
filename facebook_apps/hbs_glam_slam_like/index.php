<?php

require 'facebook.php';
$app_id = "191921854207294";
$app_secret = "05d188d688ec6e5ecbf76729f7d3c2e0";
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
include("this_page_liked.php");
}
else {
include("this_page_click_like.php");
}

?>