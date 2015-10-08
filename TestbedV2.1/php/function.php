<?php

function displaySlide($slideNum) {
//$myfile = file_get_contents("page1.json");
if ($slideNum == 1)
{ echo "<div class='item active'>";}
else{
	echo "<div class='item'>";}
     $JsonPath = "experiments/page".$slideNum.".json";
    
//  echo "<div class='slide'> ";
      echo "<canvas id='can".$slideNum."' width='1100' height='600' ></canvas>";
        

    echo "</div>";

   
 ?>

<script>
$(document).ready(function(){
	var canvasName = <?php echo "can".$slideNum; ?>;
	var JsonStr = <?php echo file_get_contents($JsonPath); ?>;        
        var newCanvas = new fabric.StaticCanvas(canvasName);
        newCanvas.loadFromJSON(JsonStr);       
});

</script>
<?php } ?>

<?php

function displaySlide2($slideNum, $jsonString) {
//$myfile = file_get_contents("page1.json");
if ($slideNum == '1')
{ echo "<div class='item active'>";}
else{
        echo "<div class='item'>";}
     

//  echo "<div class='slide'> ";
      echo "<canvas id='can".$slideNum."' width='1100' height='600' ></canvas>";


    echo "</div>";


 ?>

<script>
$(document).ready(function(){
        var canvasName = <?php echo "can".$slideNum; ?>;
        var JsonStr = <?php echo $jsonString; ?>;        
        var newCanvas = new fabric.StaticCanvas(canvasName);
        newCanvas.loadFromJSON(JsonStr);       
});

</script>
<?php } ?>

