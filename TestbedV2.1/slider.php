<?php require_once("php/header.php"); ?>
<?php require_once("php/function.php"); ?>
<?php require_once("php/loadSliderFromJson.php"); ?>

<?php



?>
<div class="container">
<div id="myCarousel" class="carousel slide" data-ride="carousel" data-interval="2000" data-pause="false">
<div class="carousel-inner" role="listbox">
     

<?php

loadSliderFromJson();
//foreach ($slides as $slideNum){      
//displaySlide($slideNum);}
      ?>


</div>
</div>
</div>
<?php require_once("php/footer.php"); ?>
