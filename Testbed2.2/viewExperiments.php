<?php require_once("php/sessions.php"); ?>
<?php
include("php/viewExperimentHeader.php");
?>
<?php require("php/function.php"); ?>
<?php confirm_logged_in(); ?>
<?php  echo "Welcome ".$_SESSION['username'];?>
<div class="container">
    <div class="header">
        <h2>Your Experiments</h2>
    </div>

        <?php
        $dir = "experiments/";

// Open a directory, and read its contents
        if (is_dir($dir)) {
            if ($dh = opendir($dir)) {
                while (($file = readdir($dh)) !== false) {

                    if (preg_match('(.json)', $file) > 0) {
                        $path_parts = pathinfo($file);
                        echo "<div class='col-sm-4 col-md-3'>
                            <div class='panel panel-default':>
		<div class='panel-heading'>" . $path_parts['filename'] . "</div>";
                        echo "<div class='btn-group btn-group-vertical'><a href='editExperiment.php?fileName=" . $file . "' class='btn btn-info' role='button' >Edit Experiment</a>
		<a href='sliderFileName.php?fileName=" . $file . "' class='btn btn-success' role='button' >View Experiment</a>		
		</div></div></div>
";
                    }
                }
                closedir($dh);
            }
        }
        ?>
    </div>

<?php include("php/experimentCreateFooter.php"); ?>

