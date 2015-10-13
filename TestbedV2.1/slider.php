<?php require_once("php/header.php"); ?>
<?php require_once("php/function.php"); ?>
<?php require_once("php/loadSliderFromJson.php"); ?>

<?php



?>
<!--<div class="container">
<div id="myCarousel" class="carousel slide" data-ride="carousel" data-interval="2000" data-pause="false">
<div class="carousel-inner" role="listbox">-->
<div id="carousel" class="carousel slide carousel-fade" data-ride="carousel">
    <ol class="carousel-indicators">
        <li data-target="#carousel" data-slide-to="0" class="active"></li>
        <li data-target="#carousel" data-slide-to="1"></li>
        <li data-target="#carousel" data-slide-to="2"></li>
    </ol>
    <!-- Carousel items -->
    <div class="carousel-inner">
        <div class="active item"></div>
        <?php

      //loadSliderFromJson();
//foreach ($slides as $slideNum){      
//displaySlide($slideNum);}
      ?>
    </div>
    <!-- Carousel nav -->
    <a class="carousel-control left" href="#carousel" data-slide="prev">&lsaquo;</a>
    <a class="carousel-control right" href="#carousel" data-slide="next">&rsaquo;</a>
</div>
<?php

//loadSliderFromJson();
//foreach ($slides as $slideNum){      
//displaySlide($slideNum);}
      ?>


</div>
</div>
</div>
<?php require_once("php/footer.php"); ?>
