
<?php 
session_start();
require("db_rw.php");
$commect= $_GET['comm'];
$postid= $_GET['postid'];

$userid=$_SESSION["id"];
date_default_timezone_set("America/New_York");
$Date=date("Y-m-d");
$time=date("h:i:sa");

$update = "INSERT INTO `comment` (`CommentId`, `PostId`, `UserID`, `Comments`, `CommentDate`, `commentTime`) 
VALUES (NULL, '".$postid."', '".$userid."', '".$commect."', '".$Date."', '".$time."');";

updateDB($update);

    
?>