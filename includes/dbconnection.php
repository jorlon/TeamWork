<?php 
$mysql ='mysql:host=localhost;dbname=winestore';
try {
	$db = new PDO($mysql,'a1','Jorlon77');
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
	echo "Error: " . $e->getMessage();
}


?>