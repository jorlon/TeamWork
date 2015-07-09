<?php require_once("includes/dbconnection.php");?>
<?php include("includes/layout/header.php");?>
<?php include("includes/function.php");?>




 
 <div id = "content">
 
 <div id="contact_form">
<form name="form1" id="ff" method="get" action="answer.php" onSubmit ="return checkForm(this);">
<h1>Search database for your particular wine, what's in stock or the least ordered wines!</h1>
<h3>Please enter the your selection from the options in the form then press submit to return your search results.</h3>
<p>Below are a few options to search the databse to find different infomation. Please select on of the options to search
after the parameters have been entered select submit to  view your query.</p>
<br />
<br />
<hr>
<br />
<h3>Search by wine name</h3>
<label> <span>Wine Name:</span> <input type="text"
   placeholder="Enter a wine name to search" name="wine_name" id="wine_name" type>
</label>
<br />
<br />
<hr>
<br />
<h3>Search by winery</h3>
<label> <span>Winery Name:</span> <input type="text"
   placeholder="Enter a winery name to search" name="winery" id="name">
</label>
<br />
<hr>
<br />
<h3>Select a region, variety or year to search for wines</h3>
<br />

 <label> <span>Select a Region:</span> <select value="tableName" name ="region" onchange ="listVariety($region)">
<?php

$results = winestore1("region_name", "region");
while($row = getRow($results)) {
$region = $row[0];

echo " htmlspecialchars(<option>{$row[0]}\n" . "<br /></option>)"; echo ' selected = region';
} ?>
</select>
</label>
<br />
<br />
<hr>
<br />
<label><span>Select a Variety:</span>
<select value="" name ="variety" >
<?php

$results = winestore1("variety", "grape_variety");
//$results = listVariety($region);
echo "<option selected>Choose</option>";
while($row = getRow($results)) {
$variety = $row[0];

echo " htmlspecialchars(<option>{$row[0]}\n" . "<br /></option>)"; echo ' selected = variety';
} ?>
</select>
</label>
<br />

<br />
<hr>
<br />
<label><span>Select a year:</span>
<select value="tableName2" name = "year">
<?php

$results = winestoreprice("year", "wine", "ASC");
echo "<option selected>Choose</option>";
while($row = getRow($results)) {
$year = $row[0];
echo " htmlspecialchars(<option>{$row[0]}\n" . "<br /></option>)"; echo ' selected = year';
} ?>
</select>
</label>
<br />

<br />
<hr>
<br />
<label><span>Select a min year:</span>
<select value="tableName2" name = "year1">
<?php

$results = winestoreprice("year", "wine", "ASC");
echo "<option selected>Choose</option>";
while($row = getRow($results)) {
$year1 = $row[0];
echo " htmlspecialchars(<option>{$row[0]}\n" . "<br /></option>)"; echo ' selected = year1';
} ?>
</select>
</label>
<br />

<br />
<hr>
<br />
<label><span>Select a max year:</span>
<select value="tableName2" name = "year2">
<?php

$results = winestoreprice("year", "wine", "DESC");
echo "<option selected>Choose</option>";
while($row = getRow($results)) {
$year2 = $row[0];
echo " htmlspecialchars(<option>{$row[0]}\n" . "<br /></option>)"; echo ' selected = year2';
} ?>
</select>
</label>
<br />

<br />
<hr>

<br />
<label><span>Select minimum number of wines in stock per wine:</span>
<select value="" name ="variety" >
<?php

$results = winestoreprice("on_hand", "inventory");
//$results = listVariety($region);
echo "<option selected>Choose</option>";
while($row = getRow($results)) {
$stock = $row[0];

echo " htmlspecialchars(<option>{$row[0]}\n" . "<br /></option>)"; echo ' selected = stock';
} ?>
</select>
</label>
<br />
<br />
<hr>
<br />
<label><span>Select minimum number of wines ordered per wine:</span>
<select value="" name ="ordered" >
<?php

$results = winestoreprice("qty", "items");
//$results = listVariety($region);
echo "<option selected>Choose</option>";
while($row = getRow($results)) {
$ordered = $row[0];

echo " htmlspecialchars(<option>{$row[0]}\n" . "<br /></option>)"; echo ' selected = ordered';
} ?>
</select>
</label>
<br />


<!-- this is thee dollar value ranges start -->
<br />
<hr>
<br/>
<label><span>Select price of wine:</span>
<select value="" name ="ordered" >
<?php

$results = winestoreprice("price", "items", "ASC");
//$results = listVariety($region);
echo "<option selected>Choose</option>";
while($row = getRow($results)) {
$price = $row[0];

echo " htmlspecialchars(<option>{$row[0]}\n" . "<br /></option>)"; echo ' selected = price';
} ?>
</select>
</label>
<br />
<br />
<hr>
<br />
<label><span>Select minimum price to find wine:</span>
<select value="" name ="ordered" >
<?php

$results = winestoreprice("price", "items","ASC");
//$results = listVariety($region);
echo "<option selected>Choose</option>";
while($row = getRow($results)) {
$minprice = $row[0];

echo " htmlspecialchars(<option>{$row[0]}\n" . "<br /></option>)"; echo ' selected = minprice';
} ?>
</select>
</label>
<br />
<br />
<hr>
<br />
<label><span>Select max price range of wine:</span>
<select value="" name ="ordered" >
<?php

$results = winestoreprice("price", "items", "DESC");
//$results = listVariety($region);
echo "<option selected>Choose</option>";
while($row = getRow($results)) {
$maxprice = $row[0];

echo " htmlspecialchars(<option>{$row[0]}\n" . "<br /></option>)"; echo ' selected = maxprice';
} ?>
</select>
</label>
<br />
<br />
<hr>
<br />
<label><span>Select submit when you are happy with your choices</span> 
<br />
<br />
<br />
<input class="sendButton" type="submit" name="Submit" value="Submit Query">
</form>
</div>
<br />
<br />
 </div>
 
















<?php include("includes/layout/footer.php");?>