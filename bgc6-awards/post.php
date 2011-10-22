<?php
ini_set("display_errors", "Off");
$conn = mysql_connect("10.64.80.135", "o2drupal", 'DyP$Y6');
mysql_select_db("oxygen", $conn);

foreach($_POST as $key => $value) {
	$_POST[$key] = mysql_escape_string(trim(strip_tags($value)));
}

$query = "INSERT INTO oxygen_awards (uid, award, nominee, createdOn) VALUES('{$_POST['uid']}', '{$_POST['award']}', '{$_POST['nominee']}', NOW())";
$result = mysql_query($query, $conn);
if($result) {
	echo json_encode(array("success" => "true"));
} else {
	echo json_encode(array("success" => "false"));
}
