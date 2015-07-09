<?php
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

function listVariety($region){
	GLOBAL $db;
	$query = "SELECT variety ";
	$query .= " From grape_variety ";
	$query .= " WHERE variety_id IN ";
		$query  .= "(SELECT wine_id ";
		$query .= "FROM wine_variety ";
		$query .=" WHERE wine_id IN ";
			$query .= "(SELECT winery_id ";
			$query .= " FROM winery ";
			$query .= " WHERE region_id IN ";
				$query .= "(SELECT region_id ";
				$query .= " From region ";
				$query .= " WHERE region_name ='$region' ";
				$query .=")));";
	$result = mysql_query($query);
	$db=null;
if (!$result) {
    echo "DB Error, could not list tables\n";
    echo 'MySQL Error: ' . mysql_error();
}
return $result;
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
