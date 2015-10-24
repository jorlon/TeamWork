<?PHP

$users = array();

$file_handle = fopen("txt.txt", "rb");
while (!feof($file_handle)) {

   $line_of_text = fgets($file_handle);
   $parts = explode(':', $line_of_text);
   if ($line_of_text != "") {
      for ($i = 0; $i < count($line_of_text - 1); $i++) {
         $users[$parts[0]] = $parts[1];
      }
   }
}
fclose($file_handle);

function attempt_login($username, $password) {
   $admin = find_user_by_username($username);
   if ($admin) {

      if (password_check($password, $admin)) {
         return $admin;
      } else {
         echo "<div id=\"error\">";
         echo" password does not match";
         echo "</div>";
         return false;
      }
   } else {
      // user not found
      return false;
   }
}

function password_encrypt($password) {
   $hash_format = "$2y$10$";   // Blowfish with a "cost" of 10
   $salt_length = 22;      // Blowfish salts 
   $salt = generate_salt($salt_length);
   $format_and_salt = $hash_format . $salt;
   $hash = crypt($password, $format_and_salt);
   return $hash;
}

function generate_salt($length) {

   $unique_random_string = md5(uniqid(mt_rand(), true));
   $base64_string = base64_encode($unique_random_string);
   $modified_base64_string = str_replace('+', '.', $base64_string);
   $salt = substr($modified_base64_string, 0, $length);

   return $salt;
}

function find_user_by_username($username) {
   global $users;
   if (isset($users[$username])) {
      $admin = $users[$username];

      return $admin;
   } else {
      echo "<div id=\"error\">";
      echo "User not found";
      echo "</div>";
      return false;
   }
}

function password_check($password, $existing_hash) {
   $a = crypt($password, $existing_hash);
   $b = trim($existing_hash);

   if (crypt($password, $b) == $b) {
      $a = crypt($password, $b);
      return true;
   } else {

      return false;
   }
}

function attempt_register($username, $password1, $password2) {
   $pass1 = trim($password1);
   $pass2 = trim($password2);

   if (($username != "") && ($pass1 != "") && ($pass2 != "")) {

      $user = find_username($username);
      if (!$user) {

         if ($pass1 === $pass2) {
            $encryptedPass = password_encrypt($pass1);
            add_user($username, $encryptedPass);
            return true;
         } else {
            echo "<div id=\"error\">";
            echo "passwords do not match";
            echo "</div>";
         }
      } else {
         echo "<div id=\"error\">";
         echo " this user name has been taken";
         echo "</div>";
      }
   } else {
      echo "<div id=\"error\">";
      echo"please enter all feilds";
      echo "</div>";
   }
}

function find_username($username) {
   global $users;
   if (isset($users[$username])) {
      $admin = key($users);
      return $admin;
   } else {
      return false;
   }
}

function add_user($username, $encryptedPass) {
   global $users;
   $users[$username] = $encryptedPass;
   print_to_textfile($users);
}

function print_to_textfile($array) {
   global $users;
   $filename = "txt.txt";
   $text = "";

   foreach ($users as $key => $value) { 

      $text = $key . ":" . $value . "\n";
   }
   //$texts = implode("\n",$users);
   $fh = fopen($filename, "a") or die("Could not open log file.");
   fwrite($fh, print_r($text, True));

   fclose($fh);
}

function redirect_to($new_location) {
   header("Location: " . $new_location);
   exit;
}
function logged_in() {
   return isset($_SESSION['username']);
}

function confirm_logged_in() {
   if (!logged_in()) {
      redirect_to("login.php");
   }
}
function user(){
   return $_SESSION['username'];
}

