<?php require_once("includes/dbconnection.php");?>

<?php

$choose = "Choose";
$executeQuery = array();
$query = "";

if (!empty( $_GET['wine_name'])) {
	//$executeQuery['wine_name'] = 'Arch% ';
	$executeQuery['wine_name'] = addslashes(mysql_real_escape_string('wine_name'));
	//$executeQuery['wine_name'] = filter_input(INPUT_GET,'wine_name', FILTER_SANITIZE_SPECIAL_CHARS);// .'% \'';
	$query .= "wine.wine_name LIKE :wine_name AND ";
	//print_r($executeQuery);
	//echo $query;
}
if (isset($_GET['year1']) && isset($_GET['year2'])){
	if (($_GET['year1'] == $choose) && ($_GET['year2'] == $choose)){
		
	}else if ($_GET['year1'] != $choose && $_GET['year2'] == $choose) {
	$executeQuery['year1'] = filter_input(INPUT_GET,'year1', FILTER_SANITIZE_SPECIAL_CHARS);
	$executeQuery['year2'] = 2015;
	$query .= "wine.year BETWEEN :year1 AND :year2 AND ";
	} else if ($_GET['year2'] != $choose && $_GET['year1'] == $choose) {
	$executeQuery['year1'] = 1970;
	$executeQuery['year2'] = filter_input(INPUT_GET,'year2', FILTER_SANITIZE_SPECIAL_CHARS);
	$query .= "wine.year BETWEEN :year1 AND :year2 AND ";
	}else {
	$executeQuery['year1'] = filter_input(INPUT_GET,'year1', FILTER_SANITIZE_SPECIAL_CHARS);
	$executeQuery['year2'] = filter_input(INPUT_GET,'year2', FILTER_SANITIZE_SPECIAL_CHARS);
	$query .= "wine.year BETWEEN :year1 AND :year2 AND ";
}
}
if (isset( $_GET['year'])) {
	
	if ($_GET['year'] == $choose) {
	
	}else {
		
	$executeQuery['year'] = filter_input(INPUT_GET,'year', FILTER_SANITIZE_SPECIAL_CHARS);
	$query .= htmlspecialchars( ":year = year AND ");	
}
}
if (!empty($_GET['winery'])){
	$executeQuery['winery_name'] = filter_input(INPUT_GET,'winery', FILTER_SANITIZE_SPECIAL_CHARS);
	$query .= ":winery_name = winery.winery_name AND "; // remember to add a space after the and to allow it to cancatinate.
}

if ((isset($_GET['variety']))){
	if ($_GET['variety'] == $choose) {
		
	}else {
	$executeQuery['variety'] = filter_input(INPUT_GET,'variety', FILTER_SANITIZE_SPECIAL_CHARS);
	$query .= ":variety = variety AND "; // remember to add a space after the and to allow it to cancatinate.
}
}
if (isset($_GET['cost'])){
	if ($_GET['cost'] == $choose) {
		
	}else {
	$executeQuery['cost'] = filter_input(INPUT_GET,'cost', FILTER_SANITIZE_SPECIAL_CHARS);
	$query .= ":cost = inventory.cost AND ";
	}	
}
if ( (isset($_GET['mincost']) && (isset($_GET['maxcost'])))) {
	if ($_GET['mincost'] == "" && $_GET['maxcost'] == $choose) {
		
	} else if ($_GET['mincost'] != "" && $_GET['maxcost'] = $choose) {
		$executeQuery['mincost'] = filter_input(INPUT_GET,'mincost', FILTER_SANITIZE_SPECIAL_CHARS);
	    $executeQuery['maxcost'] = 1000;
	    $query .= "inventory.cost BETWEEN :mincost AND :maxcost AND ";
	} else if ($_GET['maxcost'] != $choose && $_GET['mincost'] == ""){
		
		$executeQuery['mincost'] = 0;
	    $executeQuery['maxcost'] = filter_input(INPUT_GET,'maxcost', FILTER_SANITIZE_SPECIAL_CHARS);
	$query .= "inventory.cost BETWEEN :mincost AND :maxcost AND ";
	}else{
	$executeQuery['mincost'] = filter_input(INPUT_GET,'mincost', FILTER_SANITIZE_SPECIAL_CHARS);
	$executeQuery['maxcost'] = filter_input(INPUT_GET,'maxcost', FILTER_SANITIZE_SPECIAL_CHARS);
	$query .= "inventory.cost BETWEEN :mincost AND :maxcost AND ";

	}	
}
if (isset($_GET['stock'])){
	if($_GET['stock'] == $choose) {
		
	}else {
	$executeQuery['stock'] = filter_input(INPUT_GET,'stock', FILTER_SANITIZE_SPECIAL_CHARS);
	$query .= " inventory.on_hand <= :stock  AND "; // remember to add a space after the and to allow it to cancatinate.
	}	
}
if (isset($_GET['on_hand'])){
	if($_GET['on_hand'] == $choose) {
		
	}else {
	$executeQuery['on_hand'] = filter_input(INPUT_GET,'on_hand', FILTER_SANITIZE_SPECIAL_CHARS);
	$query .= ":on_hand >= inventory.on_hand AND "; // remember to add a space after the and to allow it to cancatinate.
}
}
if (isset($_GET['region'])){
	if ($_GET['region'] == 'All'){
	$executeQuery['region_name'] = filter_input(INPUT_GET,'region', FILTER_SANITIZE_SPECIAL_CHARS);
	$query .= ":region_name != region.region_name AND ";
    }else {
	$executeQuery['region_name'] = filter_input(INPUT_GET,'region', FILTER_SANITIZE_SPECIAL_CHARS);
	$query .= ":region_name = region.region_name AND "; // remember to add a space after the and to allow it to cancatinate.
	}
}
// trims last AND of the query string
$query .= rtrim($query, 'AND ');
// takes all the query then adds GROUPS BY wine id to clean up the results
$query .=" GROUP BY wine.wine_id";

try {
	GLOBAL $db;

	$dbQuery =$db->prepare("SELECT DISTINCT
						    wine.wine_name, wine.year,
							winery.winery_name,
							region.region_name,
							GROUP_CONCAT(DISTINCT (grape_variety.variety)),
							inventory.cost,inventory.on_hand,
							items.price, items.qty,
							inventory.cost * items.qty AS 'revenue'
							FROM wine
							LEFT JOIN
							winery ON
							wine.winery_id = winery.winery_id
							LEFT JOIN region
							ON region.region_id = winery.region_id
							LEFT JOIN wine_variety
							ON wine.wine_id = wine_variety.wine_id
							LEFT JOIN grape_variety
							ON grape_variety.variety_id = wine_variety.variety_id
							LEFT JOIN inventory
							ON wine.wine_id = inventory.wine_id
						    LEFT JOIN items
							ON wine.wine_id = items.wine_id
						    WHERE ".  $query );
	$dbQuery->execute($executeQuery);
	
echo "<table style =\"border:1px solid black;width:100%;\">"; 
echo "<tr><th>wine_name</th><th>Variety</th><th>Year</th><th>Winery</th><th>region</th><th>Cost</th><th>on_hand</th><th>Quantity Sold</th><th> revenue</th></tr>";
echo "<tr style =\"border:1px solid black;\">";
    while($row = $dbQuery->fetch()) {

  echo "<tr></td><td style =\"border:1px solid black;\">";
  echo $row['wine_name'];
  echo "</td><td style =\"border:1px solid black;\">";   
  echo $row['GROUP_CONCAT(DISTINCT (grape_variety.variety))']." "."<br />";
  echo "</td><td style =\"border:1px solid black;\">";    
  echo $row['year'];
  echo "</td><td style =\"border:1px solid black;\">";    
  echo $row['winery_name'];
  echo "</td><td style =\"border:1px solid black;\">";    
  echo $row['region_name'];
  echo "</td><td style =\"border:1px solid black;\">";    
  echo $row['cost'];
  echo "</td><td style =\"border:1px solid black;\">"; 
  echo $row['on_hand'];
  echo "</td><td style =\"border:1px solid black;\">";
  echo $row['qty'];
  echo "</td><td style =\"border:1px solid black;\">"; 
   echo $row['revenue'];
  echo "</td><td style =\"border:1px solid black;\">";   
   } 


  echo "</table>";

  if($dbQuery->rowCount($row) == 0) {
  	
  
  	echo "<table>";
  	echo "<tr>";
  	echo "<td style =\"border:1px solid black; width:100%;\">ERROR: There were no results found for your search!</td>";
  	echo "<td style =\"border:1px solid black;\">";
  	echo  $dbQuery->rowCount($row);
  	echo "</td>";
  	echo "</tr>";
  	echo "</table>";


  }
  echo  $dbQuery->rowCount($row);
}catch(PDOException $e){
	echo 'ERROR ' . $e->getMessage();

}
?>

