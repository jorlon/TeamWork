<?php require_once("includes/dbconnection.php");?>
<?php include("includes/layout/header.php");?>
<!-- 
***********************************************************************************************
**************	KEVIN CROOK				
**************	S3404349
**************	ASIGNMNET 1				
**************
**************	index page just to have a landing page with some style. No functions here
**************
***********************************************************************************************
-->
<div id="content">
	<div id="contact_form">
	<h3 style= "color:maroon">
		


			Welcome to <strong>Gold Winestore!</strong> We are the premier leading edge
			vineyard database collection agency. We hold 1000's of wines in the database
			to search. The application permits the user to search via different input
			capabilities,the database to find infomation on chosen wines.
		
		
		</h3>
		
		<p>
		
		
		<h3>When you are ready to search for wines, wineries or any other seach
			variable head over to the Wine Search link in the navigtion. It's that easy.
		</h3>
		</p>
		<p>
		
		
		<h4>Please be aware that this is a fictitious representation of a winestore
			database for assignmnet purposes only.</h4>
		</p>
	</div>
	<div id="contentWidth">

		<div id="columns">


			<div id="leftcontent">
				<h2>Looking for wine?</h2>
				<p>There are various methods to search for your favourite wine, winery or
					region. The search page allows you to search via dropdown and textual
					inputs. Search by year or between years, check by stock limits or price of
					the wines.</p>

			</div>
			<div id="centerleftcontent">
				<h2>Search by wines</h2>
				<img src="img/wineBottle.png">
				<div class="stamp">
					<img src="img/waxLink.png">
				</div>
				<p>
					<a href="search.php">Search for wine</a>
				</p>
			</div>

			<div id="centerrightcontent">
				<h2>Search by winery</h2>
				<img src="img/wineBottle.png">
				<div class="stamp">
					<img src="img/waxLink.png">
				</div>
				<p>
					<a href="search.php">Search wines in stock</a>
				</p>
			</div>

			<div id="rightcontent">
				<h2>Search by other</h2>
				<img src="img/wineBottle.png">
				<div class="stamp">
					<img src="img/waxLink.png">
				</div>
				<p>
					<a href="search.php">Search wines ordered</a>
				</p>
			</div>
		</div>
	</div>
</div>
<?php include("includes/layout/footer.php");?>
