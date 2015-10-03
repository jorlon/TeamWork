<?php session_start();?>
<?php require_once("php/header.php"); ?>
<?php require_once("php/function.php"); ?>
 <?php
      if (isset($_SESSION['interval'])) {
         $interval = $_SESSION['interval'];
      }else {
         $interval = '2000';
      }
      ?> 
<?php

//$interval = '5000';
$slides = array('1','2', '3', '4', '5');
?>
<div class="container">
<div id="myCarousel" class="carousel slide" data-ride="carousel" data-interval = <?php echo  $interval; ?>  >
<div class="carousel-inner" role="listbox">
     

<?php
foreach ($slides as $slideNum){      
displaySlide($slideNum);}
      ?>


</div>
</div>
</div>
<?php require_once("php/footer.php"); ?>
