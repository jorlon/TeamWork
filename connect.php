<?php
   require_once('header.php');


	
   echo 'Connected to database ' . DB_NAME;
	$sql = "SHOW TABLES FROM winestore";
$result = mysql_query($sql);
if (!$result) {
    echo "DB Error, could not list tables\n";
    echo 'MySQL Error: ' . mysql_error();
    exit;
}
?>


<br />
result is populated from mysql query
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="GET"> <select value="tableName">
<?php
while($row = mysql_fetch_row($result)) {
$tableName = $row[0];
echo " <option>{$row[0]}\n" . "<br /></option>"; echo ' selected = $tableName';
} ?>
</select>
<br />
<input type="submit" name="submit" value="Run Query"> </form>
<p>
output should be displayed here
</p>
<?php 
  

	$sql1 = "SELECT * FROM $tableName";
    $result1 = mysql_query($sql1);
    if (!$result1) {
    echo "DB Error, could not list tables\n";
    echo 'MySQL Error: ' . mysql_error();
    exit;
}
    while($row1 = mysql_fetch_row($result1)) {

        echo " {$row1[1]}\n" . "<br />";
}
       
?>



<?php 
while ($row = @ mysql_fetch_array($result)) {
    // Print one row of results
    print "\n<tr>\n\t<td>{$row["wine_id"]}</td>" .
        "\n\t<td>{$row["wine_name"]}</td>" .
        "\n\t<td>{$row["year"]}</td>" .
        "\n\t<td>{$row["winery_name"]}</td>" .
        "\n\t<td>{$row["description"]}</td>\n</tr>";
} // end while loop body
?>
