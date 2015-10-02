<!DOCTYPE HTML PUBLIC
"-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html401/loose.dtd">
<html>
<head>

	<title><?= isset($title) ? $title : "Psych Project"?></title>	
	<meta charset="utf-8">
	<meta name="viewport" content="width-device-width, initial-scale=1">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<script src="https:ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="css/style.css">
	
</head>
<body>

<!-- REFERENCE THENEWBOSTON BOOTSTRAP TUTORIALS - https://www.youtube.com/playlist?list=PL6gx4Cwl9DGBPw1sFodruZUPheWVKchlM -->

	<div id="wrapper">
	
		<nav class="navbar navbar-inverse">	
			<div class="container-fluid">
			
			
			<!-- Logo -->
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#mainNavBar">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a href="#" class="navbar-brand">RESEARCH</a>
			</div>
			
			
			<!-- Menu Items -->
			<div class="collapse navbar-collapse" id="mainNavBar">
				<ul class="nav navbar-nav">
					<li><a href="#">New Experiment</a></li>
					<li><a href="#">Open</a></li>
					<li><a href="#">Save</a></li>
					<li><a href="#">Run</a></li>
					<li><a href="#" class="btn btn-success" id="menu-toggle">Toggle Sidebar</a></li>
				</ul>
			</div>
		
		</nav>
		
		<!-- Sidebar -->
		<div id="sidebar-wrapper">
			<ul class="sidebar-nav">
				<li><a href="#">Add Text</a></li>
				<li><a href="#">Add Videos</a></li>
				<li><a href="#">Add Photos</a></li>
				<li><a href="#">Get Photo/Video</a></li>
			</ul>
		</div>
		

		
		<!-- Page content -->
		<div id="page-content-wrapper">
			<div class="container-fluid">
				<div class="row">
					<div class="col-lg-12">
						
						
		