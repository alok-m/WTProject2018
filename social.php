<?php
session_start();
include_once 'dbconnect.php';
if (!isset($_SESSION['userSession'])) {
 header("Location: index.php");
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Social Site</title>
</head>
<link rel="stylesheet" type="text/css" href="css/social.css">
<body>
	<a href="/main/home.php">Home</a>
	<br>

	<center>
		<h1>Find Friends</h1>
	<label>Search : </label>
	<input type="text" name="search">
	</center>

	<ul>
		
	</ul>	
	
</body>
</html>