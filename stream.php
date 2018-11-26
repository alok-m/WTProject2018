<?php
			session_start();
			include_once 'dbconnect.php';

			if (!isset($_SESSION['userSession'])) {
			 header("Location: index.php");
			}
			$songs = array();
			$query = $DBcon->query("SELECT title FROM song");
			while($row = mysqli_fetch_array($query)){
				array_push($songs, trim($row['title']));
			}
			$DBcon->close();
?>
<!DOCTYPE html>
<html>
<head>
	<title>STREAM, more like SCREAM</title>
</head>
<link rel="stylesheet" type="text/css" href="css/stream.css">

<body>
	<a href="/main/home.php">Home</a>
	<center>
		<audio id="mainAudio" controls width="100px" style="width: 80%; height: 50px;"></audio>
	</center>
	<div>
		<ul>
			<?php
			for($i=0; $i<count($songs); $i++){
			   echo "<li class=\"song\"><a>{$songs[$i]}</a></li>\n";
			}
			?>	
		</ul>
	</div>
</body>
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/stream.js"></script>
</html>