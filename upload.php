<?php
session_start();
include_once 'dbconnect.php';
if (!isset($_SESSION['userSession'])) {
 header("Location: index.php");
}
?>
<!DOCTYPE html>
<html>
<link rel="stylesheet" type="text/css" href="css/upload.css">
<div align="center"><a href="home.php" class="logo"><img class="logo-img" src="static/logo1.png" width="57" height="55" ALT="align box" ALIGN=CENTER><strong ></strong></a></div>
  
<center><h1 style="color: #1ED760;">Upload Music</h1></center>
<div align="center" class="uploader">
    <form enctype="multipart/form-data" method="post" action="upload.php">
        <input type="file" name="uploaded_file" accept=".ogg,.flac,.mp3" required="required"/>
        <button type="submit" name="submit">Submit</button>
    </form>
</div>
</html>
<?php
// if(isset($_POST['submit']))
//     {

// $path = "static/audio/"; //file to place within the server
// $valid_formats1 = array("mp3", "ogg", "flac"); //list of file extention to be accepted
// if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST")
//     {
//         $song = $_FILES['song']['name'];
//         if(strlen($song))
//             {
//                 list($txt, $ext) = explode(".", $song);
//                 if(in_array($ext,$valid_formats1))
//                 {
//                     $actual_image_name = $txt.".".$ext;
//                     echo $path.$actual_image_name;
//                     $tmp = $_FILES['song']['tmp_name'];
//                     if(move_uploaded_file($tmp, $path.$actual_image_name))
//                         echo "Song Uploaded";
//                     else
//                         echo "Upload Failed";              
//                 }
//         }
//     }
// }
?>
<?php
  if(!empty($_FILES['uploaded_file']))
  {
    $path = "static/audio/";
    $path = $path . basename( $_FILES['uploaded_file']['name']);
    if(move_uploaded_file($_FILES['uploaded_file']['tmp_name'], $path)) {
      echo "The file ".  basename( $_FILES['uploaded_file']['name']). 
      " has been uploaded";
      $title = $_POST['songTitle'];
      $album = $_POST['album'];
      $duration = $_POST['duration'];
      $artist = $_POST['artist'];
      $queue="INSERT INTO song(title,artist,album,duration,urlPath) VALUES('$title','$artist','$album','$duration','$path')";
      $DBcon->query($query);
    } else{
        echo "There was an error uploading the file, please try again!";
    }
  }
?>