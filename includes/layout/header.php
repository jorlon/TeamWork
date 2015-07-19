<!DOCTYPE html>
<!-- 
***********************************************************************************************
**************	Header page which contains the navigation and logo which will be displayed on 			
**************	each page that has it included.
**************
**************
***********************************************************************************************
-->

<html ng-app="myApp">
<head>
<meta charset="utf-8">

<title>Winestore</title>

<meta name="description" content="">

<!-- Mobile-friendly viewport -->
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<!-- Style sheet link -->
<link href="style/stylesheet.css" rel="stylesheet">
<!-- javascript link -->
<script src="js/jsMin.js"></script>
<!-- angularjs link -->
<script src="http://code.angularjs.org/angular-1.0.0.min.js"></script>
<script src="../js/formvalidation.js"></script>
<!--  link the angular app script -->
<script src="js/app.js"></script>

<script src="js/modernizer.js"></script>
<script type="text/javascript">
<!-- Javascript function to test the type of each variable that is entered via form.
  function checkForm(form)
  {
	  if (/[\d]/.test(document.getElementById("wine_name").value)) {
			alert("wine name must not contains Numbers!");
			form1.wine_name.focus();
			return false;
		}
	  if (/[\d]/.test(document.getElementById("name").value)) {
			alert("winery name must not contains Numbers!");
			form1.name.focus();
			return false;
			
		}
	  if (/[a-z][A_Z]/.test(document.getElementById("mincost").value)) {
			alert("The minimum cost must not contains Letters!");
			form1.name.focus();
			return false;
			
		}
        // validation was successful
    return true;
  }

</script>

</head>
<body>
	<header>

		<h6 style="color: #e0dc66; padding-top: 15px; padding-left: 150px">Wine</h6>


		<?php include("includes/layout/navigation.php");?>
		<div id="logo">
			<img src="../img/winestorelogoSmall.png">
		</div>
	</header>
	<div id="main">
		<div id="image">
			<img src="../img/wine.png">
		</div>
