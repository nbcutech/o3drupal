<?php
error_reporting(E_ALL);
ini_set("display_errors", "On");

require_once 'Image.php';
require_once 'includes/config.php';

// Change the following 2 dates to reflect the current week
$startDate = '2011-04-06';
$endDate   = '2011-04-12';

$params = array(
	"title" => array("trim", "strip_tags", "htmlentities"),
	"description" => array("trim", "strip_tags", "htmlentities"),
	"accepted" => array("trim")
);
$valid = true;
$missing_fields = array();

foreach($params as $key => $data) {
	if(empty($_POST[$key])) {
		$missing_fields[] = $key;
		$valid = false;
	}
}
foreach($_POST as $key => $value) {
	if(isset($params[$key])) {
		if(!empty($value)) {
			foreach($params[$key] as $filter) {
				$result = call_user_func($filter, $value);
				if(!$result) {
					$valid = false;
					$missing_fields[] = $key;
				} else {
					$_POST[$key] = $result;
				}
			}
		}
	}
}
//$_POST['email'] = (!empty($_POST['email'])) ? $_POST['email'] : substr(md5(time()), 0, 10)."@nbcuni.com";
if(!validEmail($_POST['email'])) {
	$valid = false;
	$missing_fields[] = "email";
}
if($valid) {
	$data = array();
    // divide by ratio when working with the master file
    $width = (int) ( $_POST['width'] / $_POST['ratio'] );
    $height = (int) ( $_POST['height'] / $_POST['ratio'] );
    $top = (int) ( $_POST['top'] / $_POST['ratio'] );
    $left = (int) ( $_POST['left'] / $_POST['ratio'] );

	
	$conn = mysql_connect(DB_HOST, DB_USER, DB_PASS);
	mysql_select_db(DB_NAME);
	
	$name = basename($_POST['path']);
	$name = explode(".", $name);
	$name = $name[0];
	
	//$query = "SELECT id FROM `storibook_ugc` WHERE `email` = '{$_POST['email']}'";
	$query = "SELECT * FROM `storibook_ugc` WHERE `email` = '{$_POST['email']}' AND DATE(createdOn) BETWEEN '{$startDate}' AND '{$endDate}'";
	$result = mysql_query($query);
	$row = mysql_fetch_assoc($result);
	if(empty($row)) {
		$query = "INSERT INTO storibook_ugc (`name`, `email`, `title`, `description`, `createdOn`) VALUES ('{$name}', '{$_POST['email']}', '{$_POST['title']}', '{$_POST['description']}', NOW())";
		$result = mysql_query($query);
		if($result) {
			$masterFile = './ugc/master/' . basename( $_POST['path'] );
			$workerFile = './ugc/' . basename( $_POST['path'] );
		
			// get master file
			$worker = new Image( $masterFile );

			// crop master, resize - constrain true for rounding errors
			// write to file
			$worker->crop( $width, $height, $top, $left )->resize( 374, 567, true )->write(dirname(__FILE__)."/ugc/generated/".basename($_POST['path']));

			// remove
			unlink( $workerFile );
			unlink( $masterFile );

			// create thumbnail from cropped image
			// resize with constain and write to file
			$worker = new Image(dirname(__FILE__)."/ugc/generated/".basename($_POST['path']));
			$worker->resize( 122, 185, true )->write(dirname(__FILE__)."/ugc/generated/thumbs/".basename($_POST['path']));
		
			$worker = new Image(dirname(__FILE__)."/ugc/generated/".basename($_POST['path']));
			$worker->resize( 122, 185, true )->write(dirname(__FILE__)."/ugc/latest.jpeg");
			$data["success"] = true;
			echo json_encode($data);
		}
	} else {
		echo json_encode(array("success" => false, "error" => "Cannot upload more than one image per theme"));
	}
} else {
	echo json_encode(array("success" => false, "error" => "Missing required fields", "fields" => $missing_fields));
}
