<?php
	require_once('db.php');
	if(!$dbconn = mysql_connect (DB_HOST, DB_USER, DB_PW)) {
		echo 'could not connect to ' . DB_HOST .’\n’;
	exit;
	}
	echo 'Connected to mysql <br />';
	if(!mysql_select_db(DB_NAME, $dbconn)) {
		echo 'could not connect to user ' . DB_NAME . ‘\n’;
		echo mysql_error() . ‘\n’;
		exit;
	}
?>
