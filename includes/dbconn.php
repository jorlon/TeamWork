<?php   
   define("DB_HOST", "localhost");
   define("DB_NAME", "winestore");
   define("DB_USER" ,"a1");
   define("DB_PW", "Jorlon77");
   
   	if(!$dbconn = mysql_connect (DB_HOST, DB_USER, DB_PW)) {
		echo 'could not connect to ' . DB_HOST .�\n�;
	exit;
	}
	
	if(!mysql_select_db(DB_NAME, $dbconn)) {
		echo 'could not connect to user ' . DB_NAME . �\n�;
		echo mysql_error() . �\n�;
		exit;
	}
 
 

?>