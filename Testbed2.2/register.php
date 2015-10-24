<?php session_start(); ?>
<?php require("php/function.php"); ?>
<?php confirm_logged_in(); ?>
<?php require_once("php/header.php"); ?>
<?php
$username = "";
$password1 = "";
$password2 = "";

if (isset($_POST['submit'])) {


   if (empty($errors)) {
      // Attempt Login

      $username = $_POST["username"];
      $password1 = $_POST["password1"];
      $password2 = $_POST["password2"];
      $found_admin = attempt_register($username, $password1, $password2);

      if ($found_admin) {
         // Success
         // Mark user as logged in
         $_SESSION["username"] = $found_admin["username"];
         echo "success";
         redirect_to("login.php");
      } else {

         $_SESSION["message"] = "Password/username not found";
      }
   }
} else {
   // This is probably a GET request
} // end: if (isset($_POST['submit']))
?>


<div class="container">
   <div class="content">

      <div class="row">
         <div class="login-form">

            <h2>Register new user</h2>
            <form action="register.php" method="post">
               <p>Enter Username:
                  <input type="text" name="username" value="<?php echo htmlentities($username); ?>" />
               </p>
               <p>Enter Password :
                  <input type="password" name="password1" value="" />
               </p>
               <p>Password check:
                  <input type="password" name="password2" value="" />
               </p>
               <input type="submit" name="submit" value="Submit" />
            </form>
         </div>
      </div>
   </div>
</div>
<?php require_once("php/footer.php"); ?>

