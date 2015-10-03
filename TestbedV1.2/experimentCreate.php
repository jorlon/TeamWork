<?php
session_start();
require_once("php/canvasPages.php");
include("php/experimentCreateHeader.php");
?>


<div class="container">
   <h2>Create an Experiment Version One</h2>
   <ul class="nav nav-tabs">
      <li class="active" ><a data-toggle="tab" href="#page1">Page 1</a></li>
      <li ><a data-toggle="tab" href="#page2">Page 2</a></li>
      <li ><a data-toggle="tab" href="#page3">Page 3</a></li>   
      <li ><a data-toggle="tab" href="#page4">Page 4</a></li>
      <li ><a data-toggle="tab" href="#page5">Page 5</a></li>
   </ul>

   <div class="tab-content">

      <?php
      $slides = array('1', '2', '3', '4', '5');

      foreach ($slides as $pageNum) {
         addNewSlide($pageNum);
      }
      ?>


   </div>

   <!-- Modal -->
   <div class="modal fade" id="myModal" role="dialog">
      <div class="modal-dialog">

         <!-- Modal content-->
         <div class="modal-content">
            <div class="modal-header">

               <h4 class="modal-title">Saving Experiment Please Wait</h4>
            </div>
            <div class="modal-body">

               <img src="loading.gif" class="img-responsive" style="margin:auto;"/>	


            </div>


         </div>

      </div>
   </div>


   <div class="btn-group btn-group-justified">
      <a role="button" class="btn btn-info" onclick="loadJSON()">Save Experiment</a>
      <a role="button" class="btn btn-primary" onclick="loadAndRunJSON()">Save and Run Experiment</a>
      <a href="slider.php" role="button" class="btn btn-success ">Run Last Saved Experiment</a>

   </div>
   <br />
   <div id ="intervalTime" class = "btn btn-primary">


      <form action="<?= $_SERVER['PHP_SELF'] ?>" method="POST">
         <select name="interval">
            <option value="1000">1 second</option>
            <option value="2000">2 seconds</option>
            <option value="3000">3 seconds</option>
            <option value="4000">4 seconds</option>
            <option value="5000">5 second</option>
            <option value="6000">6 seconds</option>
            <option value="7000">7 seconds</option>
            <option value="8000">8 seconds</option>
            <option value="9000">9 seconds</option>
            <option value="10000">10 seconds</option>
         </select>
       
         <input type="submit" value="submit" name="submitMe" style ="color:black;">
      </form>
      <?php
      if (isset($_POST['submitMe'])) {
         echo("The time between slides will be set to:  " . $_POST['interval']). " seconds";
         $interval = $_POST['interval'];
         return $_SESSION['interval'] = $interval;
      }
      ?> 
   </div>


</div>

<!--
<script>
$(document).ready(function(){
$("#JsonConvert").click(function(){
    var jsonText =JSON.stringify(canvas2); 
    $("#JsonText").text(jsonText);
    var newCanvas = new fabric.StaticCanvas('newCan');
    newCanvas.loadFromJSON(jsonText);	
});
});
</script>
-->

<script src="js/imageLoading.js"></script>

<?php include("php/experimentCreateFooter.php"); ?>
