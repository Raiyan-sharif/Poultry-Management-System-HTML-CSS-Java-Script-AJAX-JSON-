<?php
session_start();
require("db_rw.php");

$idea=$_POST["message"];
$type=$_POST["posttype"];
$location=$_POST["postloc"];
$userid=$_SESSION["id"];
date_default_timezone_set("America/New_York");
$Date=date("Y-m-d");
$time=date("h:i:sa");

$sql="INSERT INTO `post` (`PostId`, `UserID`, `PostDescription`, `PostDate`, `PostTime`, `PostArea`, `PostType`, `PostStatus`, `PostImage`) VALUES (NULL, '".$userid."', '".$idea."', '".$Date."', '".$time."', '".$location."', 
'".$type."', '1', NULL)";

updateDB($sql);
header("location:Post.php");

?>