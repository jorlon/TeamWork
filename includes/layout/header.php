<!DOCTYPE html>

<html ng-app ="myApp">
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

  function checkForm(form)
  {
	  if (/[\d]/.test(document.getElementById("wine_name").value)) {
			alert("Name Contains Numbers!");
			form1.wine_name.focus();
			return false;
		}
	  if (/[\d]/.test(document.getElementById("name").value)) {
			alert("Name Contains Numbers!");
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
		<h1>Winestore</h1>
		<?php include("includes/layout/navigation.php");?>
	
	</header>
   <div id="main">
   <div id ="image">
	  <img src ="img/wine.png">
  </div>