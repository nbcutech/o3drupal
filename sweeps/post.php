<?php
ini_set("display_errors", "Off");
$conn = mysql_connect("10.64.80.135", "o2drupal", 'DyP$Y6');
mysql_select_db("oxygen", $conn);

foreach($_POST as $key => $value) {
	$_POST[$key] = htmlentities(strip_tags($value));
}

if(!empty($_POST)) {
	$sql = "INSERT INTO sweeps_records (`first_name`, `last_name`, `address`, `city`, `state`, `zip`, `email_address`, `phone`, `age`, `service_provider`, `oxygen_viewer`, `internet_access`, `signup`, `createdOn`) VALUES ('{$_POST['first_name']}', '{$_POST['last_name']}', '{$_POST['address']}', '{$_POST['city']}', '{$_POST['state']}', '{$_POST['zip_code']}', '{$_POST['email']}', '{$_POST['phone']}', '{$_POST['age']}', '{$_POST['tv_service_provider']}', '{$_POST['i_watch_oxygen']}', '{$_POST['my_home_internet_access_is']}', '{$_POST['sign_up']}', NOW())";

	$result = mysql_query($sql, $conn);
	if(!$result) {
		echo "Error executing the query(".mysql_errno()."): ".mysql_error();
	} else {
		if(!empty($_POST['redirect'])) {
			header("Location: ".$_POST['redirect']);
		} else {
			echo "Entered Successfully";
		}
	}
} else {
	echo "No data provided";
}
