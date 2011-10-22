<?php
error_reporting(E_ALL);
ini_set("display_errors", "On");
require_once '../sbw/lib/Login.php';

$logoutLink = '';
$message = '';

if( isset( $_GET['action'] ) || isset( $_GET['openid_mode'] ) || isset( $_GET['code'] ) || isset( $_GET['oauth_token'] ) ) {

    $params = array();
    $params['openid_identifier'] = isset( $_GET['openid_identifier'] ) ? $_GET['openid_identifier'] : null;
    $params['openid_mode'] = isset( $_GET['openid_mode'] ) ? $_GET['openid_mode'] : null;
    $params['code'] = isset( $_GET['code'] ) ? $_GET['code'] : null;
    $params['oauth_token'] = isset( $_GET['oauth_token'] ) ? $_GET['oauth_token'] : null;

    $login = new Login( $params );
    $success = $login->login();
    $message = Login::getMessenger();
    $upload_image = true;

}

// check if user is logged in
if ( Login::hasIdentity()) {
    $logoutLink = '<a href="' . $_SERVER['PHP_SELF'] . '?logout"> Logout </a>';

    // array of identity properties
    $identity = Login::getIdentity();
    $upload_image = true;
}

// logout user
if( isset( $_GET['logout'] ) ) {
    $success = Login::logout();
    $logoutLink = '';
    $message = Login::getMessenger();
    $upload_image = false;
}

echo '<script>';
echo 'window.opener.document.getElementById("TGP_submit_button").style.display = "block";';
echo 'window.opener.document.getElementById("signin_type").value = "email";';
echo 'window.opener.tgp_emailsignform();';
echo 'window.opener.tgp_showautopost(\'email\');';
echo 'window.opener.tgp_closeemail();';
echo 'window.close();';
echo '</script>';

?>