 <?php
include("php/viewExperimentHeader.php"); 
?>


<div class="container">
<?php
$dir = "experiments/";

// Open a directory, and read its contents
if (is_dir($dir)){
  if ($dh = opendir($dir)){
    while (($file = readdir($dh)) !== false){
     
	if(preg_match('(.json)',$file)>0){
	 echo "<div class='panel panel-default':>
		<div class='panel-heading'>Filename: " . $file . "</div>";
	echo "<a href='editExperiment.php?fileName=".$file."' class='btn btn-info' role='button' >Edit Experiment</a>
		<a href='sliderFileName.php?fileName=".$file."' class='btn btn-success' role='button' >View Experiment</a>		
		</div>
";}
    }
    closedir($dh);
  }
}
?>
</div>
<?php include("php/experimentCreateFooter.php"); ?>

