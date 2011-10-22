<?php
/**
 * Copyright 2011 Facebook, Inc.
 *
 * Licensed under the Apache License, Version 2.0 (the "License"); you may
 * not use this file except in compliance with the License. You may obtain
 * a copy of the License at
 *
 *     http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS, WITHOUT
 * WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied. See the
 * License for the specific language governing permissions and limitations
 * under the License.
 */

require 'tgp/facebook/src/facebook.php';

// Create our Application instance (replace this with your appId and secret).
$facebook = new Facebook(array(
  'appId'  => '229203110427066',
  'secret' => '3305c49668d784684742e65312308033'
));

// Get User ID
$user = $facebook->getUser();

// We may or may not have this data based on whether the user is logged in.
//
// If we have a $user id here, it means we know the user is logged into
// Facebook, but we don't know if the access token is valid. An access
// token is invalid if the user logged out of Facebook.

if ($user) {
  try {
    // Proceed knowing you have a logged in user who's authenticated.
    $user_profile = $facebook->api('/me');
	 
  } catch (FacebookApiException $e) {
    error_log($e);
    $user = null;
  }
}

// Login or logout url will be needed depending on current user state.
if ($user) {
  $logoutUrl = $facebook->getLogoutUrl();
  
  $_SESSION['facebook']['screen_name'] = $user_profile['name'];
  $_SESSION['facebook']['profile_image_url'] = 'https://graph.facebook.com/'.$user.'/picture';
   
 	echo '<script>';
if(empty($_GET['thisID']) && empty($_GET['fb-share'])){
	echo 'window.opener.document.getElementById("TGP_submit_button").style.display = "block";
	window.opener.tgp_showautopost(\'wall\');';
}

if(!empty($_GET['thisID'])) echo 'window.opener.tgp_checkLike(\''.$_GET['thisID'].'\');';

if(!empty($_GET['fb-share'])) echo 'window.opener.tgp_checkFBshare();';

echo 'window.opener.document.getElementById("signin_type").value = "facebook";';
echo 'window.close();';
echo '</script>';
} else {
  $params = array();
  $params['scope'] = "publish_stream,offline_access,read_stream,export_stream";
  $loginUrl = $facebook->getLoginUrl($params);
  header("Location: $loginUrl");
  exit;
}

?>
