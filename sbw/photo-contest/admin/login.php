<?php
session_start();

if(isset($_POST['password']) && isset($_POST['username'])) {
	if(strtolower($_POST['username']) == 'o2admin' && $_POST['password'] == 'o2d!g!tal_') {
		$_SESSION['admin_authenticated'] = true;
		header('Location: index.php');
		exit();
	}
} else if(isset($_SESSION['admin_authenticated'])) {
	header('Location: index.php');
	exit();
} else {
	echo "<html>";
	echo "<head>";
	echo "<title>Login to access the admin</title>";
	echo "</head>";
	echo "<body>";
	echo "<form action=\"{$_SERVER['PHP_SELF']}\" method=\"post\"";
	echo "<label for=\"username\">Username: </label><input type=\"text\" name=\"username\" value=\"\" /><br/>";
	echo "<label for=\"password\">Password: </lable><input type=\"password\" name=\"password\" value=\"\" /><br/>";
	echo "<input type=\"submit\" name=\"submit\" value=\"Login\" /><br/>";
	echo "</body>";
	echo "</html>";
}
