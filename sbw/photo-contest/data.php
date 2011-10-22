<?php
require_once 'includes/config.php';
$conn = mysql_connect(DB_HOST, DB_USER, DB_PASS);
mysql_select_db(DB_NAME);

$data = array();


$page = (isset($_GET['page'])) ? $_GET['page'] : 1;
$data['limit'] = 9;
$data['offset'] = (int)( ($page - 1) * $data['limit']);

$query = "SELECT COUNT(*) as total FROM `storibook_ugc`";
$result = mysql_query($query);
$row = mysql_fetch_assoc($result);

$data['total'] = $row['total'];


$query = "SELECT * FROM `storibook_ugc` ORDER BY `createdOn` DESC LIMIT {$data['offset']}, {$data['limit']}";

$result = mysql_query($query);

$data['data'] = array();
while(false !== ($row = mysql_fetch_assoc($result))) {
	$data['data'][] = array(
		"name" => $row['name'],
		"title" => $row['title'],
		"caption" => $row['description'],
		"id" => $row['id']
	);
}

echo json_encode($data);