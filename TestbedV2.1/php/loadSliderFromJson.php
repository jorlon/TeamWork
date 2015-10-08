<?php
require_once("function.php");
require_once("canvasPages.php");

function loadSliderFromJson(){

$JsonPath = "experiments/pageTot.json";
$pagesJson = file_get_contents($JsonPath); 

$pagesArray = json_decode($pagesJson);
foreach ($pagesArray as $pageNum=>$jsonString){
	displaySlide2($pageNum, $jsonString);
}
}
function loadSliderFromJsonFileName($fileName){


$JsonPath = "experiments/".$fileName;
$pagesJson = file_get_contents($JsonPath);
$pagesArray = json_decode($pagesJson, true);


if (array_key_exists('slideInterval',$pagesArray)){
echo "<div class='container'><div id='myCarousel' class='carousel slide' data-ride='carousel' data-interval='".$pagesArray['slideInterval']."' data-pause='false'><div class='carousel-inner' role='listbox'>";
}
else{
echo "<div class='container'>
<div id='myCarousel' class='carousel slide' data-ride='carousel' data-interval='2000' data-pause='false'>
<div class='carousel-inner' role='listbox'>";
}
foreach ($pagesArray as $pageNum=>$jsonString){
if ($pageNum == 'slideInterval'){

}
else{
        displaySlide2($pageNum, $jsonString);
}}

echo "</div>
</div>
</div>";
}

function loadExperimentFromJson($fileName){

$JsonPath = "experiments/".$fileName;
$pagesJson = file_get_contents($JsonPath);

$pagesArray = json_decode($pagesJson,true);

echo "<h2>Edit Experiment '".$fileName."' </h2>
    <ul class='nav nav-tabs' id='tabAdd'>";
foreach ($pagesArray as $pageNum=>$jsonString){
if ($pageNum == 'slideInterval'){

}

elseif ($pageNum == 1){
echo "<li class='active' ><a data-toggle='tab' href='#page".$pageNum."'>Page ".$pageNum."</a></li>";
}
else {
echo "<li><a data-toggle='tab' href='#page".$pageNum."'>Page ".$pageNum." <button class='close' type='button' title='Remove this page'><span class='glyphicon glyphicon-trash'></span></button></a></li>";
}
}
echo " </ul>

    <div class='tab-content' id='pages'>";

foreach ($pagesArray as $pageNum=>$jsonString){
if ($pageNum == 'slideInterval'){

}
else{ 
       addNewEditSlide($pageNum, $jsonString);
}	

}
echo "</div>
<script>
$(document).ready(function(){

var editCanvasNum = document.getElementsByTagName('canvas').length;
canvasNum = (editCanvasNum/2);
pageNum = (editCanvasNum/2);
});
</script>";
}
?>

