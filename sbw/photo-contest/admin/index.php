<?php
include_once('../includes/config.php');
session_start();

if(!isset($_SESSION['admin_authenticated'])) {
	header('Location: login.php');
	exit();
}
$conn = mysql_connect(DB_HOST, DB_USER, DB_PASS);
mysql_select_db(DB_NAME);

$query = "SELECT * FROM storibook_ugc";
$result = mysql_query($query);

echo "<table>";
echo "<thead>";
echo "<tr>";
echo "<td>ID</td>";
echo "<td>Thumb</td>";
echo "<td>Email</td>";
echo "<td>Title</td>";
echo "<td>Description</td>";
echo "<td>Created On</td>";
echo "</tr>";
echo "</thead>";
while(($row = mysql_fetch_assoc($result)) !== false) {
	if(!file_exists("../ugc/generated/thumbs/{$row['name']}.jpeg")) {
		continue;
	}
	echo "<tr>";
	echo "<td>{$row['id']}</td>";
	echo "<td><img src=\"../ugc/generated/thumbs/{$row['name']}.jpeg\" border=\"0\" /></td>";
	echo "<td>{$row['email']}</td>";
	echo "<td>{$row['title']}</td>";
	echo "<td>{$row['description']}</td>";
	echo "<td>{$row['createdOn']}</td>";
	echo "</tr>";
	
}
echo "</table>";
