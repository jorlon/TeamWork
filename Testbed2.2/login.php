<?php session_start(); ?>
<?php require("php/function.php"); ?>

<?php
require_once("php/header.php");
$username = "";
$password = "";
if (isset($_POST['submit'])) {


   if (empty($errors)) {
      // Attempt Login

      $username = $_POST["username"];
      $password = $_POST["password"];

      $found_admin = attempt_login($username, $password);

      if ($found_admin) {
         // Success
         $_SESSION['username'] = $username;
         redirect_to("editExperiment.php");
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
            <h2>TestBedV2.2 Login</h2>
            <form action="login.php" method="post">
               <p>Username:
                  <input type="text" name="username" value="<?php echo htmlentities($username); ?>" />
               </p>
               <p>Password:
                  <input type="password" name="password" value="" />
               </p>
               <input type="submit" name="submit" value="Submit" />
            </form>
         </div>
      </div>
   </div>
</div>

<?php
require_once("php/footer.php");
