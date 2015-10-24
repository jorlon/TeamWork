<?php require_once("php/sessions.php"); ?>
<?php
//ob_start();
require_once("php/loadSliderFromJson.php");
require_once("php/canvasPages.php");
include("php/experimentCreateHeader.php");
require("php/function.php");
?>
<?php
confirm_logged_in();
echo "Welcome " . $_SESSION['username'];
?>
<div class="container">

   <?php
   $fileName = null;
   if (isset($_GET['fileName'])) {
      $fileName = $_GET['fileName'];
   } else {
      $filename = null;
   }

   loadExperimentFromJson($fileName);
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

<div class="modal fade" id="saveModalRun" role="dialog">
   <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
         <div class="modal-header">

            <h4 class="modal-title">Set Filename</h4>
         </div>
         <div class="modal-body">
            <form role='form' onsubmit='saveRun()' >
               <div class="form-group">
                  <label for="formExpNameRun">Enter Experiment Name: </label>
                  <input type="text" class="form-control" id="formExpNameRun" required>
               </div>
               <button type="submit" class="btn btn-default" id='fileNameButtonRun' >Submit</button>
            </form>
         </div>


      </div>

   </div>
</div>

<div class="modal fade" id="saveModal" role="dialog">
   <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
         <div class="modal-header">

            <h4 class="modal-title">Set Filename</h4>
         </div>
         <div class="modal-body">
            <form role='form' onsubmit='setFilename()' >
               <div class="form-group">
                  <label for="eprName">Enter Experiment Name: </label>
                  <input type="text" class="form-control" id="formExpName" required>
               </div>
               <button type="submit" class="btn btn-default" id='fileNameButton' >Submit</button>
            </form>
         </div>


      </div>

   </div>
</div>


<script src="js/imageLoading.js"></script>

<?php include("php/experimentCreateFooter.php"); ?>

