<?php
include("./includes/config.php");

echo "<form action='{$_SERVER['PHP_SELF']}' method='post'><textarea name='query'></textarea><input type='submit' value='run' /></form>";

$query = $_POST['query'];

if(!empty($query)) {
	echo "<pre>";
	$conn = mysql_connect(DB_HOST, DB_USER, DB_PASS);
	mysql_select_db(DB_NAME);

	$result = mysql_query($query);
	echo "Executing Query: {$query}<br/><br/>";
	echo "Conn: ".var_export($conn, true);
	echo "<br/>";
	if($result) {
		while(false !== ($row = mysql_fetch_assoc($result))) {
			var_dump($row);
		}
	}
	echo "</pre>";
}
