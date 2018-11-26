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
						<li><a href="" class="text-active">Songs </a></li>
						<li><a href="upload.php" class="text">Upload</a></li>
						<li><a href="social.php" class="text">Add Friends</a></li>
						<li><a href="logout.php" class="text">Logout</a></li>
					</ul>
				</div>
				<div class="align-play">
					<ul>
						<li class="text1">Playlists</li>
						<li><a href="" class="text">#1 </a></li>
						<li><a href="" class="text">#3 </a></li>
						<li><a href="" class="text">#1 </a></li>
						<li><a href="" class="text">#3 </a></li>
						<li><a href="" class="text">#1 </a></li>
						<li><a href="" class="text">#3 </a></li>
						<li><a href="" class="text">#1 </a></li>
						<li><a href="" class="text">#3 </a></li>
						<li><a href="" class="text">#1 </a></li>
						<li><a href="" class="text">#3 </a></li>


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
									<li>song1ergegrwergreg</li>
									<li>song1ergegrwergreg</li>
									<li>song1ergegrwergreg</li>
								</ul>
							</td>
							<td>
								<div class="artist">
									artist
								</div>
								<ul class="artist fix-artist">
									<li>song1</li>
									<li>song1ergegrwergreg</li>
									<li>song1ergegrwergreg</li>
									

								</ul>
							</td>
							<td>
								<div class="album">
									album
								</div>
								<ul class="album fix-album">
									<li>song1</li>
									<li>song1ergegrwergreg</li>
									<li>song1ergegrwergreg</li>
								</ul>
							</td>
							<td>
								<div class="time">
									time
								</div>
								<ul class="time fix-time">
									<li>11:01</li>
									<li>11:01</li>
									<li>11:01</li>
								</ul>
							</td>
						</tr>
					</table>
				</div>
				<div align="centre" class="current">
					<div class="song-place">
						<h4 >song playing now</h4>
					</div>
					<audio src="" controls style="margin-left: 100%; z-index: 2;"></audio>
					
				</div>
			</td>
		</tr>
		
	</table>
</body>
</html>