<?php require_once("includes/sessions.php"); ?>
<?php require_once("includes/dbconnection.php");?>
<?php include("includes/layout/header.php");?>
<?php include("includes/function.php");?>
<!-- 
***********************************************************************************************
**************	Takes the $_SESSION variable and displays it.				
**************
**************
**************
***********************************************************************************************
-->
<div id="content">

<div id ="contact_form">
<h3 style ="color:maroon;">Results returned <?php echo $_SESSION['numberRows'];?> rows.</h3>
<?php
echo $_SESSION['results'];
?>
</div>
<br />
<br />
</div>
</div>

<?php include("includes/layout/footer.php");?>