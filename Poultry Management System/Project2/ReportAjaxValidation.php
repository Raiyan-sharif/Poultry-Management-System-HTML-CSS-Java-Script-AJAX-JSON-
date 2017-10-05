

<?php 
session_start();
require("db_rw.php");
$postid= $_GET['id'];

$userid=$_SESSION["id"];
date_default_timezone_set("America/New_York");
$Date=date("Y-m-d");
$time=date("h:i:sa");

$sql="INSERT INTO `report` (`ReportId`, `UserID`, `PostId`, `ReportDate`, `ReportTime`) 
VALUES (NULL, '".$userid."', '".$postid."', '".$Date."', '".$time."');";

$sql1="UPDATE `post` SET `PostStatus` = '0' WHERE `post`.`PostId` = ".$postid.";";

updateDB($sql);
updateDB($sql1);

?>