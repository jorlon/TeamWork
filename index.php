<?php require_once("includes/dbconnection.php");?>
<?php include("includes/layout/header.php");?>



     <div id = "content">
       <div id ="contact_form">
        <p>1.3 the ngRepeat directive used to sort the keys alphabetically.)

        Version 1.4 removed the alphabetic sorting. We now rely on the order returned
        by the browser when running for key in myObj. It seems that browsers generally
        follow the strategy of providing keys in the order in which they were defined,
        although there are exceptions when keys are deleted and reinstated. See
        https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Operators/delete#Cross-browser_issues
        </p>
     </div>
     <div id="contentWidth">
        
   <div id="columns">


      <div id="leftcontent">
         <h2>Looking for wine?</h2>
			<p>Version 1.4 removed the alphabetic sorting. We now rely on the order returned
 			by the browser when running for key in myObj. It seems that browsers generally
  			follow the strategy of providing keys in the order in which they were defined,</p>
  
	  </div>
	  <div id="centerleftcontent">
  	     <h2>Search bar</h2>
         <img src="img/wineBottle.png">
         <div class ="stamp"><img src="img/waxLink.png"></div>
	     <p><a href="search.php">Search for wine</a></p>
      </div>

      <div id="centerrightcontent">
         <h2>Center content</h2>
         <img src="img/wineBottle.png">
         <div class ="stamp"><img src="img/waxLink.png"></div>
  		    <p><a href="search.php">Search wines in stock</a></p>
         </div>

	  <div id="rightcontent">
         <h2>Right content</h2>
         <img src="img/wineBottle.png">
         <div class ="stamp"><img src="img/waxLink.png"></div>
         <p><a href="search.php">Search wines ordered</a></p>
     </div>
   </div>
</div>
</div>
<?php include("includes/layout/footer.php");?>
