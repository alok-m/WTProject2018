<?php
session_start();
require_once 'dbconnect.php';

if (isset($_SESSION['userSession'])!="") {
 header("Location: home.php");
 exit;
}

if (isset($_POST['btn-login'])) {
 
 $email = strip_tags($_POST['email']);
 $password = strip_tags($_POST['password']);
 
 $email = $DBcon->real_escape_string($email);
 $password = $DBcon->real_escape_string($password);
 
 $query = $DBcon->query("SELECT user_id, email, password FROM users WHERE email='$email'");
 $row=$query->fetch_array();
 
 $count = $query->num_rows; // if email/password are correct returns must be 1 row
 
 if (password_verify($password, $row['password']) && $count==1) {
  $_SESSION['userSession'] = $row['user_id'];
  header("Location: home.php");
 } else {
  $msg = "<div class='alert alert-danger'>
     <span class='glyphicon glyphicon-info-sign'></span> &nbsp; Invalid Username or Password !
    </div>";
 }
 $DBcon->close();
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Login - Spatify</title>
</head>
<link rel="stylesheet" type="text/css" href="css/index.css">
<body>
  <div align="center"><a href="main.html" class="logo"><img class="logo-img" src="static/logo.png" width="57" height="55" ALT="align box" ALIGN=CENTER><strong > Spatify</strong></a></div>
  
  <div class="line">
    
  </div>

  <div class="place" align="CENTER">
    <form name="login" method="POST" id="login-form">
      <input type="text" placeholder="Email address" required id="login-username" autocomplete="off" autocorrect="off" name="email">

      <input id="login-pass" type="password" placeholder="Password" required autocomplete="off" autocorrect="off" name="password">
      <button type="submit" class="text1 styl-bttn" name="btn-login" id="btn-login">LOG IN </button>
    </form>
  </div>

  <div class="line1">
    
  </div>

  <div class="no-aacnt">
    <h4>Don't have an account?</h4>
  </div>
  <div class="hover-sign-up-bttn">
    <a href="register.php" role="button" class="text1 styl-bttn1">Sign Up</a>
  </div>

  <div class="line1">
    
  </div>
      

</body>
</html>