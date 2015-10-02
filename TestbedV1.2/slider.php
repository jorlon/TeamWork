<?php require_once("php/header.php"); ?>
<?php require_once("php/function.php"); ?>

<?php


$slides = array('1','2', '3', '4', '5');
?>
<div class="container">
<div id="myCarousel" class="carousel slide" data-ride="carousel" data-interval="2000">
<div class="carousel-inner" role="listbox">
     

<?php
foreach ($slides as $slideNum){      
displaySlide($slideNum);}
      ?>


</div>
</div>
</div>
<?php require_once("php/footer.php"); ?>
