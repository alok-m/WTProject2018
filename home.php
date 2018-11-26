<!DOCTYPE html>
<html>
<head>
	<title>Home - Spatify</title>
	<link rel="stylesheet" type="text/css" href="css/home1.css">	

<?php
	session_start();
	include_once 'dbconnect.php';

	if (!isset($_SESSION['userSession'])) {
	 header("Location: index.php");
	}

	$query = $DBcon->query("SELECT * FROM users WHERE user_id=".$_SESSION['userSession']);
	$userRow=$query->fetch_array();
	$titles = array();$artists=array();$albums=array();$durations=array();
	$query = $DBcon->query("SELECT title,artist,album,duration FROM song");
	while($row = mysqli_fetch_array($query)){
		array_push($titles, trim($row['title']));
		array_push($albums, trim($row['album']));
		array_push($artists, trim($row['artist']));
		array_push($durations, trim($row['duration']));
	}
	$DBcon->close();
?>
</head>
<body>
	<table width="100%">
		<tr>
			<td class="first-col">
				<div class="align">
					<ul>
						<li class="text1">Your Library</li>
						<li><a href="home.php" class="text-active">Songs </a></li>
						<li><a href="upload.php" class="text">Upload</a></li>
						<li><a href="social.php" class="text">Add Friends</a></li>
						<li><a href="logout.php?logout" class="text">Logout</a></li>
					</ul>
				</div>
				<div class="align-play">
					<ul>


					</ul>
				</div>
				<div class="playlist-bttn">
					<button class="bttn">Create new playlist   +</button>
				</div>
			</td>
			<td class="second-col">
				<div>
					<h1 class="songs-h1">Songs</h1>
					<?php echo "<h3 class='user'>Welcome,".$userRow['username']."</h3>" ?>
				</div>

				<div>
					<table>
						<tr>
							<td>
								<div class="title">title</div>
								<ul class="title fix">
									<?php
										for($i=0; $i<count($titles); $i++){
										   echo "<li class=\"song\"><a>{$titles[$i]}</a></li>\n";
										}
									?>
								</ul>
							</td>
							<td>
								<div class="artist">
									artist
								</div>
								<ul class="artist fix-artist">
									<?php
										for($i=0; $i<count($artists); $i++){
										   echo "<li>{$artists[$i]}</li>\n";
										}
									?>
								</ul>
							</td>
							<td>
								<div class="album">
									album
								</div>
								<ul class="album fix-album">
									<?php
										for($i=0; $i<count($albums); $i++){
										   echo "<li>{$albums[$i]}</li>\n";
										}
									?>
								</ul>
							</td>
							<td>
								<div class="time">
									time
								</div>
								<ul class="time fix-time">
									<?php
										for($i=0; $i<count($durations); $i++){
										   echo "<li>{$durations[$i]}</li>\n";
										}
									?>
								</ul>
							</td>
						</tr>
					</table>
				</div>
				<div align="centre" class="current">
					<div class="song-place">
						<h4 id="songLabel" >No Audio Selected</h4>
					</div>
					<audio id="mainAudio" src="" controls style="margin-left: 100%; z-index: 2;"></audio>
					
				</div>
			</td>
		</tr>
		
	</table>
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/stream.js"></script>
</body>
</html>