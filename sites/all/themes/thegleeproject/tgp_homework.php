<?
include_once 'mysql.php';
include_once 'TGP_chat.php';

session_name('TGP_Homework');
session_set_cookie_params(31556926);
session_start();//print_r($_SESSION);

switch($_REQUEST['action']){
	case 'add-twitter':
		TGP_Twitter::add();
		if($_REQUEST['autopost'] == 'true') TGP_Twitter::post();
		echo 'twitter-added';
		break;
		
	case 'add-facebook':
		TGP_Facebook::add();
		if($_REQUEST['autopost'] == 'true') TGP_Facebook::post();
		echo 'facebook-added';
		break;
		
	case 'add-email':
		TGP_Email::add();
		if($_REQUEST['autopost'] == 'true') TGP_Email::send();
		echo 'email-added';
		break;
		
	case 'view':
		echo TGP_Comments::view();
		break;
		
	case 'share':
		echo TGP_Comments::share();
		break;
		
	case 'like':
		echo TGP_Comments::like();
		break;
		
	case 'fb-share':
		echo TGP_Facebook::share();
		break;
}

mysql_close();

?>