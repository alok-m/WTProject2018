<?php
	session_start();
	include_once 'dbconnect.php';
	if(isset($_GET['songTitle'])){
		// echo $_GET['songTitle']."\n";
		$query = $DBcon->query('SELECT urlPath FROM song where title="'.$_GET['songTitle'].'"');
		// $urlPath = $query->fetch_array();
		if($query){
			$urlPath = $query->fetch_array();
			print_r($urlPath['urlPath']);
		}
		else{
			echo "Error";
		}
	}
	$DBcon->close();
?>