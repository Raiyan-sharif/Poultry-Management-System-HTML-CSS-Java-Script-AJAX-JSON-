<?php 
session_start();
require("db_rw.php");
$postid= $_GET['id'];

$sql="DELETE FROM `report` WHERE `report`.`PostId` = ".$postid.";";

$sql1="UPDATE `post` SET `PostStatus` = '1' WHERE `post`.`PostId` = ".$postid.";";

updateDB($sql);
updateDB($sql1);

?>