<?php

require 'facebook.php';
$app_id = "115533325200683";
$app_secret = "448a5644755f10e9cef61b892e4d4dbe";
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
include("paris_video_liked.php");

}
else {
include("paris_video_clickLike.php");
}

?>