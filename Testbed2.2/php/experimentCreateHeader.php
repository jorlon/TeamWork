<!DOCTYPE HTML PUBLIC

   "-//W3C//DTD HTML 4.01 Transitional//EN"

   "http://www.w3.org/TR/html401/loose.dtd">

<html>

   <head>



      <title><?= isset($title) ? $title : "Psych Project" ?></title>	

      <meta charset="utf-8">

      <meta name="viewport" content="width-device-width, initial-scale=1">

      <link rel="stylesheet" href="css/bootstrap.min.css">

      <script src="https:ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/fabric.js/1.5.0/fabric.min.js" ></script>

      <script src="js/bootstrap.min.js"></script>
      <script src="js/spectrum.js"></script>


      <link rel="stylesheet" href="css/style.css">



   </head>

   <body>



      <!-- REFERENCE THENEWBOSTON BOOTSTRAP TUTORIALS - https://www.youtube.com/playlist?list=PL6gx4Cwl9DGBPw1sFodruZUPheWVKchlM -->



      <div id="wrapper" class="menuDisplayed">



         <nav class="navbar navbar-inverse">	

            <div class="container">





               <!-- Logo -->

               <div class="navbar-header">

                  <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#mainNavBar">

                     <span class="icon-bar"></span>

                     <span class="icon-bar"></span>

                     <span class="icon-bar"></span>

                     <span class="icon-bar"></span>

                  </button>

                  <a href="#" class="navbar-brand">Home</a>

               </div>





               <!-- Menu Items -->

               <div class="collapse navbar-collapse" id="mainNavBar">

                  <ul class="nav navbar-nav">
                     

                     <li><a href="editExperiment.php">Create</a></li>

                     <li><a href="viewExperiments.php">Experiments</a></li>

                     <li><a href="#" class="btn btn-success" id="menu-toggle" style="color:white;">Experiment Tools</a></li>

                  </ul>

               </div>

            </div>		

         </nav>



         <!-- Sidebar -->
         <div id="sidebar-wrapper">

            <ul class="sidebar-nav">



               <li><a href="#" onclick="addCustomText()"><div class="sideIcon"><span  class="glyphicon glyphicon-text-color"></span></div>Text</a></li>
               <li class="dropdown">
                  <a href="#" id="backGroundColour" onclick= "backgroundColour()"><div class="sideIcon"><span class="glyphicon glyphicon-th-large"></span> </div>Background</a>
                  <input type='color' name="color" id="backColour" hidden/>
                  <!--                        <ul class="dropdown-menu">
                                              <li>
                                                  <form class="navbar-form">
                                                      <div class="form-group">
                                                          <div class="col-xs-12">
                                                              <label for="full">Set Background Colour</label>
                                                              <input type='color' name="color" id=""backColour"/>
                                                          </div>
                                                      </div>
                                                  </form>
                                              </li>
                                          </ul>-->
               </li>
               <li><a href="#" onclick="addPage()"><div class="sideIcon"><span class="glyphicon glyphicon-plus"></span></div>Page</a></li>
               <li><a href="#" data-toggle="modal" data-target="#saveModal"><div class="sideIcon"><span class="glyphicon glyphicon-save-file"></span></div>Save</a></li>
               <li><a href="#" id="sideImageAdd"><div class="sideIcon"><span class="glyphicon glyphicon-picture"></span></div>Image</a></li>
               <li class="dropdown">
                  <a class="dropdown-toggle" data-toggle="dropdown" href="#"><div class="sideIcon"><span class="glyphicon glyphicon-time"></span></div>Slide Time</a>
                  <ul class="dropdown-menu" >
                     <li>
                        <form class="navbar-form">
                           <div class="form-group">
                              <label for="slideInterval">Slide Interval:</label>
                              <select class="form-control" id="slideInterval">
                                 <option value="1000">1 second</option>
                                 <option value="2000">2 seconds</option>
                                 <option value="3000">3 seconds</option>
                                 <option value="4000">4 seconds</option>
                                 <option value="5000">5 second</option>
                                 <option value="6000">6 seconds</option>
                                 <option value="7000">7 seconds</option>
                                 <option value="8000">8 seconds</option>
                                 <option value="9000">9 seconds</option>
                                 <option value="10000">10 seconds</option>									
                              </select>
                           </div>		
                        </form>
                     </li>
                  </ul>
               </li>
               <li><a href="#" onclick="deleteItem()"><div class="sideIcon"><span class="glyphicon glyphicon-remove-sign"></span></div>Delete Item</a></li>
               <li><a href="register.php"><div class="sideIcon"><span class="glyphicon glyphicon-user"></span></div>Register</a></li>
               <li><a href="log_out.php"><div class="sideIcon"><span class="glyphicon glyphicon-fire"></span></div>Log Out</a></li>
            </ul>

         </div>



         <!-- Page content -->

         <div id="page-content-wrapper">

            <div class="container-fluid">

               <div class="row">

                  <div class="col-lg-12">






