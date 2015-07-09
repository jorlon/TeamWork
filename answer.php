<?php require_once("includes/dbconnection.php");?>

<?php
/*$test ="Choose";


$statement = $db->prepare("SELECT wine.wine_name, wine.year",
							     "winery.winery_name",
								 "region.region-name",
								 "grape_variety.variety",
								 "inventory.cost, inventory.on_hand",
								 "item.price",
						 "FROM wine LEFT JOIN winery ON wine_id");
$statement->execute(array($statement));
$row = $statement->fetch();



*/

$executeQuery = array();
$query = "";

if (isset( $_GET['wine_name'])) {

	$executeQuery['wine_name'] = filter_input(INPUT_GET,'wine_name', FILTER_SANITIZE_SPECIAL_CHARS);
	$query .= ":wine_name like wine_name OR ";
	
}
if (isset($_GET['year1']) || isset($_GET['year2'])){
	$executeQuery['year1'] = filter_input(INPUT_GET,'year1', FILTER_SANITIZE_SPECIAL_CHARS);
	$executeQuery['year2'] = filter_input(INPUT_GET,'year2', FILTER_SANITIZE_SPECIAL_CHARS);
	$query .= ":year1 <= year AND :year2 >= year OR "; // remember to add a space after the and to allow it to cancatinate.
}
if (isset( $_GET['year'])) {

	$executeQuery['year'] = filter_input(INPUT_GET,'year', FILTER_SANITIZE_SPECIAL_CHARS);
	$query .= ":year = year OR";
	
}
/*if (isset($_GET['winery'])){
	$executeQuery['winery_name'] = filter_input(INPUT_GET,'winery', FILTER_SANITIZE_SPECIAL_CHARS);
	$query .= ":winery_name = winery_name OR"; // remember to add a space after the and to allow it to cancatinate.
}*/
/*if (isset($_GET['region'])){
	$executeQuery['region_name'] = filter_input(INPUT_GET,'region', FILTER_SANITIZE_SPECIAL_CHARS);
	$query .= ":region_name = region_name OR"; // remember to add a space after the and to allow it to cancatinate.
}*/
/*if (isset($_GET['variety'])){
	$executeQuery['variety'] = filter_input(INPUT_GET,'variety', FILTER_SANITIZE_SPECIAL_CHARS);
	$query .= ":variety = variety OR"; // remember to add a space after the and to allow it to cancatinate.
}*/
/*if (isset($_GET['price'])){
	$executeQuery['price'] = filter_input(INPUT_GET,'price', FILTER_SANITIZE_SPECIAL_CHARS);
	$query .= ":price = price OR"; // remember to add a space after the and to allow it to cancatinate.
}*/
/*if (isset($_GET['stock'])){
	$executeQuery['stock'] = filter_input(INPUT_GET,'stock', FILTER_SANITIZE_SPECIAL_CHARS);
	$query .= ":stock < stock OR"; // remember to add a space after the and to allow it to cancatinate.
}*/
/*if (isset($_GET['order'])){
	$executeQuery['order'] = filter_input(INPUT_GET,'order', FILTER_SANITIZE_SPECIAL_CHARS);
	$query .= ":order < order OR"; // remember to add a space after the and to allow it to cancatinate.
}*/

$query = rtrim($query, 'OR');
//$query;
//$print_r($executeQuery);
try {
	GLOBAL $db;

	$dbQuery =$db->prepare("SELECT * FROM wine WHERE ".  $query);
	$dbQuery->execute($executeQuery);
echo "<table style =\"border:1px solid black;\">"; 
echo "<tr><th>Name</th><th>year</th><th>description</th></tr>";
    while($row = $dbQuery->fetch()) {
 // add an if statement that if row affected then do this else return no wines found.

 		
     //echo "<td style =\"border: 1px solid black; \"><td>".$row['wine_name']. " ".$row['description']." ".$row['year']." ".$row['wine_type']."<br />" ."</td></tr>";
  echo "<tr><td style =\"border:1px solid black;\">"; 
  echo $row['wine_name'];
  echo "</td><td style =\"border:1px solid black;\">";   
  echo $row['year'];
  echo "</td><td style =\"border:1px solid black;\">";    
  echo $row['description'];
  echo "</td></tr>";

  }

  echo "</table>";
}catch(PDOException $e){
	echo 'ERROR ' . $e->getMessage();

}
?>



