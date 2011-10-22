<?php
error_reporting(E_ALL);
ini_set("display_errors", "On");
require_once 'Image.php';

if(!empty($_FILES['file'])) {
	$file = $_FILES['file'];
	$accepted_types = array(
		'png' => 'image/png',
		'jpe' => 'image/jpeg',
		'jpeg' => 'image/jpeg',
		'jpeg' => 'image/pjpeg',
		'jpg' => 'image/jpeg',
		'gif' => 'image/gif',
		'bmp' => 'image/bmp'
	);
	function getExtension($type) {
		$return = null;
		switch($type) {
			case 'image/jpeg':
				$return = "jpeg";
				break;
			case 'image/pjpeg':
				$return = "jpeg";
				break;
			case 'image/png':
				$return = "png";
				break;
			case 'image/gif':
				$return = "gif";
				break;
			case 'image/bmp':
				$return = "bmp";
				break;
			default:
				$return = "jpeg";
				break;
		}
		return $return;
	}
	if(in_array($file['type'], $accepted_types)) {

		$fileName = md5(time()) . "." . getExtension( $file['type'] );
		
		$masterFile = dirname(__FILE__).'/ugc/master/' . $fileName;

        move_uploaded_file( $_FILES['file']['tmp_name'], $masterFile );
		
		// create worker from master file
		$worker = new Image( $masterFile );
		// resize to max worker dimensions - no constrain
		// write to temp directory - returns random name
		$tmpFile = $worker->resize(630, 784)->write( './ugc/' . $fileName );
		$resizeRatio = $worker->getResizeRatio();
		
		echo '{"name":"'.$file['name'].'","type":"'.$file['type'].'","size":"'.$file['size'].'", "uploaded":"./ugc/' . $fileName . '", "resizeRatio":"'.$resizeRatio.'"}';
	}
} else {

}