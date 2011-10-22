<?php

require 'tgp/tmhOAuth.php';
$tmhOAuth = new tmhOAuth(array(
  'consumer_key'    => '5msf8gRthg2UPqaQ6udq8A',
  'consumer_secret' => 'jidFO3aJ5bA23n6MuCjErI0roZrgVUPbYSfMHOh5k',
));

$here = $tmhOAuth->php_self();
session_name('TGP_Homework');
session_set_cookie_params(31556926);
session_start();

// reset?
if ( isset($_REQUEST['wipe'])) {
  session_destroy();
  header("Location: {$here}");

// already got some credentials stored?
} elseif ( isset($_SESSION['access_token']) ) {
  $tmhOAuth->config['user_token']  = $_SESSION['access_token']['oauth_token'];
  $tmhOAuth->config['user_secret'] = $_SESSION['access_token']['oauth_token_secret'];

  $tmhOAuth->request('GET', $tmhOAuth->url('1/account/verify_credentials'));
  $userCreds = json_decode($tmhOAuth->response['response']); //print_r($userCreds);
  
  $_SESSION['twitter']['screen_name'] = $userCreds->screen_name;
  $_SESSION['twitter']['profile_image_url'] = $userCreds->profile_image_url; //print_r($_SESSION);

echo '<script>';

if(empty($_GET['thisID'])){
	echo 'window.opener.document.getElementById("TGP_submit_button").style.display = "block";
	window.opener.tgp_showautopost(\'twitter\');';
}

if(!empty($_GET['thisID'])) echo 'window.opener.tgp_checkShare(\''.$_GET['thisID'].'\');';

echo 'window.opener.document.getElementById("signin_type").value = "twitter";';
echo 'window.close();';
echo '</script>';

// we're being called back by Twitter
} elseif (isset($_REQUEST['oauth_verifier'])) {
  $tmhOAuth->config['user_token']  = $_SESSION['oauth']['oauth_token'];
  $tmhOAuth->config['user_secret'] = $_SESSION['oauth']['oauth_token_secret'];

  $tmhOAuth->request('POST', $tmhOAuth->url('oauth/access_token', ''), array(
    'oauth_verifier' => $_REQUEST['oauth_verifier']
  ));
  $_SESSION['access_token'] = $tmhOAuth->extract_params($tmhOAuth->response['response']);
  unset($_SESSION['oauth']);
  header("Location: {$here}");

// start the OAuth dance
} elseif ( isset($_REQUEST['signin']) || isset($_REQUEST['allow']) ) {
  $callback = isset($_REQUEST['oob']) ? 'oob' : $here;

  $code = $tmhOAuth->request('POST', $tmhOAuth->url('oauth/request_token', ''), array(
    'oauth_callback' => $callback
  ));

  if ($code == 200) {
    $_SESSION['oauth'] = $tmhOAuth->extract_params($tmhOAuth->response['response']);
    $method = isset($_REQUEST['signin']) ? 'authenticate' : 'authorize';
    $force  = isset($_REQUEST['force']) ? '&force_login=1' : '';
    $forcewrite  = isset($_REQUEST['force_write']) ? '&oauth_access_type=write' : '';
    $forceread  = isset($_REQUEST['force_read']) ? '&oauth_access_type=read' : '';
    header("Location: " . $tmhOAuth->url("oauth/{$method}", '') .  "?oauth_token={$_SESSION['oauth']['oauth_token']}{$force}{$forcewrite}{$forceread}");

  } else {
    // error
    $tmhOAuth->pr(htmlentities($tmhOAuth->response['response']));
  }
}

?>