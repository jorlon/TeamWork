<?php 
session_start();

require_once("php/canvasPages.php");
include("php/experimentCreateHeader.php"); ?>


  <div class="container">
    <h2>Create an Experiment Version One</h2>
    <ul class="nav nav-tabs" id="tabAdd">
     <li class="active" ><a data-toggle="tab" href="#page1">Page 1 <button class="close" title="Remove this page" type="button"><span class="glyphicon glyphicon-trash"></span></button></a></li>

    </ul>

    <div class="tab-content" id="pages">
    
<?php

	

		addNewSlide('1');


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

<!-- 
<button type="button" class="btn btn-info" id="JsonConvert">Button</button>
<pre id="JsonText">
</pre>
<canvas id="newCan" width="1100" height="600"></canvas>
 -->
<!--
<div class="btn-group btn-group-justified">
	<a role="button" class="btn btn-info" onclick="loadJSON2()">Save Experiment</a>
	
	<a role="button" class="btn btn-success" data-toggle="modal" data-target="#saveModalRun" >Save and Run Experiment</a>
        <a role="button" class="btn btn-warning" onclick="addPage()">Add Page</a>
	<a role="button" class="btn btn-primary" data-toggle="modal" data-target="#saveModal">Save Experiment</a>
	<a role="button" class="btn btn-error" onclick="deletePage()">Delete Page</a> 

 </div>
 </div>
-->

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
