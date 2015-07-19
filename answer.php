<?php require_once("includes/sessions.php"); ?>
<?php require_once("includes/dbconnection.php");?>
<!-- 
***********************************************************************************************
**************	Answer page takes all the variable that are set and not choose or "" and 			
**************	puts them through the filter input then builds up the
*************	WHERE clause for the sql query. $executeQuery holds variables fot the execute
**************	Function and the $query for the sql syntax.
**************
***********************************************************************************************
-->
<?php

$choose = "Choose";
$executeQuery = array();
$query = "";

if (!empty( $_GET['wine_name'])) {
	$executeQuery['wine_name'] = filter_input(INPUT_GET,'wine_name', FILTER_SANITIZE_SPECIAL_CHARS) .'%';
	$query .= "wine.wine_name LIKE :wine_name AND ";
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
	$executeQuery['winery_name'] = filter_input(INPUT_GET,'winery', FILTER_SANITIZE_SPECIAL_CHARS) . '%';
	$query .= "winery.winery_name LIKE :winery_name AND "; // remember to add a space after the and to allow it to cancatinate.
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
	if ($_GET['mincost'] == "" || $_GET['maxcost'] == $choose) {

		if ($_GET['mincost'] == "" && $_GET['maxcost'] == $choose){

		}
		else if ($_GET['mincost'] != "" && $_GET['maxcost'] = $choose) {
	 	$executeQuery['mincost'] = filter_input(INPUT_GET,'mincost', FILTER_SANITIZE_SPECIAL_CHARS);
	 	$executeQuery['maxcost'] = 1000;
	 	$query .= "inventory.cost BETWEEN :mincost AND :maxcost AND ";
		}else if ($_GET['maxcost'] != $choose && $_GET['mincost'] == ""){

	 	$executeQuery['mincost'] = 0;
	 	$executeQuery['maxcost'] = filter_input(INPUT_GET,'maxcost', FILTER_SANITIZE_SPECIAL_CHARS);
	 	$query .= "inventory.cost BETWEEN :mincost AND :maxcost AND ";
		}
	}else {
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
		$query .= ":on_hand < inventory.on_hand AND "; // remember to add a space after the and to allow it to cancatinate.
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

$query .=" GROUP BY wine.wine_id ";
// The query string is built up in a try catch block
try {
	GLOBAL $db;

	$dbQuery =$db->prepare("SELECT DISTINCT
						    wine.wine_name, wine.year,
							winery.winery_name,
							region.region_name,
							GROUP_CONCAT(DISTINCT (grape_variety.variety)),
							inventory.cost,inventory.on_hand,
							SUM(items.qty)  AS 'count',
							SUM(inventory.cost * items.qty) AS 'revenue'
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
	// Then the execute function adds the varibles and executes the query.
	$dbQuery->execute($executeQuery);
	// The results from the execute function is concatinated into the $results variable incorperating a html table for output.
	$results ="";
	$results .= "<table style =\"border:1px solid maroon; width:100%;\">";
	$results .= "<tr style =\"color:maroon;\"><th>wine_name</th><th>Variety</th><th>Year</th><th>Winery Name</th><th>Region</th><th>Cost</th><th>In Stock</th><th>Qty Sold</th><th> Revenue</th></tr>";
	$results .= "<tr style =\"border:1px solid maroon;\">";
	while($row = $dbQuery->fetch()) {
		$results .= "<td style =\"border:1px solid maroon;\">";
		$results .= $row['wine_name'];
		$results .= "</td><td style =\"border:1px solid maroon;\">";
		$results .= $row['GROUP_CONCAT(DISTINCT (grape_variety.variety))']." "."<br />";
		$results .= "</td><td style =\"border:1px solid maroon;\">";
		$results .= $row['year'];
		$results .="</td><td style =\"border:1px solid maroon;\">";
		$results .= $row['winery_name'];
		$results .= "</td><td style =\"border:1px solid maroon;\">";
		$results .= $row['region_name'];
		$results .="</td><td style =\"border:1px solid maroon;text-align:right;\">";
		$results .= "$".$row['cost'];
		$results .= "</td><td style =\"border:1px solid maroon;text-align:center;\">";
		$results .= $row['on_hand'];
		$results .= "</td><td style =\"border:1px solid maroon;text-align:right;\">";
		$results .= $row['count'];
		$results .= "</td><td style =\"border:1px solid maroon;text-align:right;\">";
		$results .= "$".$row['revenue'];
		$results .=  "</td></tr>";

	}


	$results.= "</table>";

		
	// This will send a redirect to the search page if there are no results found		
	if($dbQuery->rowCount($row) == 0) {
		$_SESSION['message'] = "There were no results for your query, Please try again.";
		header("Location: search.php");
	} else {
	// else it will send the results to $_SESSION variable which will be called from the answer.php
			
		$_SESSION['results'] = $results;
		$_SESSION['numberRows'] = $dbQuery->rowCount($row);
		header("Location: results.php");
	}
}catch(PDOException $e){
	echo 'ERROR ' . $e->getMessage();

}


?>
