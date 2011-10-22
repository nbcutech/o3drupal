<?php

require 'facebook.php';
$app_id = "270015919691451";
$app_secret = "63095618cf87cdba4552265f30a8041e";
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
include("tgp_casting_liked.php");
}
else {
include("tgp_casting_click_like.php");
}

?>