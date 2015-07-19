<?php
/* These functions are called from the search.php page to fill the dropdown boxes
 * These functions take in parameters set in the search page*/
function winestore1($name, $table) {
	GLOBAL $db;
	$sql  = "SELECT DISTINCT $table.$name"
		  ." FROM $table ";

	$results = $db->query($sql);
    return $results;
	$db = null;
if (!$result) {
    echo "DB Error, could not list tables\n";
    echo 'MySQL Error: ' . mysql_error();
 
}
return $result;
}

function getRow($results) {
	return $results->fetch();
	$db = null;
}

function winestoreprice($name, $table, $order) {
	GLOBAL $db;
	$sql  = "SELECT DISTINCT $table.$name"
		  ." FROM $table ORDER BY $name $order ";

	$results = $db->query($sql);
    return $results;
	$db = null;
if (!$result) {
    echo "DB Error, could not list tables\n";
    echo 'MySQL Error: ' . mysql_error();
 
}
return $result;
}

?>
