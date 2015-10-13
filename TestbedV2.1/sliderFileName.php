<?php require_once("php/header.php"); 
 require_once("php/function.php"); 
 require_once("php/loadSliderFromJson.php"); 







$fileName= $_GET['fileName'];
loadSliderFromJsonFileName($fileName);
     

require_once("php/footer.php"); ?>

