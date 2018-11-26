<?php
session_start();
if (isset($_SESSION['userSession'])!="") {
 header("Location: home.php");
}
require_once 'dbconnect.php';

if(isset($_POST['btn-signup'])) {
 
 $uname = strip_tags($_POST['username']);
 $email = strip_tags($_POST['email']);
 $upass = strip_tags($_POST['password']);
 
 $uname = $DBcon->real_escape_string($uname);
 $email = $DBcon->real_escape_string($email);
 $upass = $DBcon->real_escape_string($upass);
 
 $hashed_password = password_hash($upass, PASSWORD_DEFAULT);
 
 $check_email = $DBcon->query("SELECT email FROM users WHERE email='$email'");
 $count=$check_email->num_rows;
 
 if ($count==0) {
  
  $query = "INSERT INTO users(username,email,password) VALUES('$uname','$email','$hashed_password')";

  if ($DBcon->query($query)) {
   $msg = "<div class='alert alert-success'>
      <span class='glyphicon glyphicon-info-sign'></span> &nbsp; successfully registered !
     </div>";
  }else {
   $msg = "<div class='alert alert-danger'>
      <span class='glyphicon glyphicon-info-sign'></span> &nbsp; error while registering !
     </div>";
  }
  
 } else {
  
  
  $msg = "<div class='alert alert-danger'>
     <span class='glyphicon glyphicon-info-sign'></span> &nbsp; sorry email already taken !
    </div>";
   
 }
 
 $DBcon->close();
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Login & Registration System</title>
<link rel="stylesheet" href="css/register.css" type="text/css">

</head>
<body>

<div align="center">

	<a href="main.html" class="logo"><img class="logo-img" src="static/logo.png" width="57" height="55" ALT="align box" ALIGN=CENTER><strong > Spatify</strong></a>

</div>
	<div class="line">
		
	</div>

	<div class="place" align="center">
		<form method="POST" action="register.php">
			<input type="email" placeholder="Email address" required id="login-email" name="email">
			<input id="sign-up-pass" type="password" placeholder="Password" required min="5" name="password" >
			<input type="text" placeholder="What should be call you?" required id="username" name="username">
			
			<button type="submit" class="text1 styl-bttn" name="btn-signup">SIGN UP </button>
		</form>
	</div>

	<?php
  if (isset($msg)) {
   echo $msg;
  }?>

<div class="line1">
		
	</div>

	<div class="no-aacnt">
		<h4>Already have an account?</h4>
	</div>
	<div class="hover-sign-up-bttn" align="center">
		<a href="index.php" role="button" class="text1 styl-bttn1">Log In</a>
	</div>

	<div class="line1">
		
	</div>

</body>
</html>