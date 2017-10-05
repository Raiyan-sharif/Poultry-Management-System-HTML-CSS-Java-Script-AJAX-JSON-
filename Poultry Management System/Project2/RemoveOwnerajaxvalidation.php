<?php 
require("db_rw.php");
$id = $_GET['id'];

$update1 = "DELETE FROM `user` WHERE `user`.`UserId`  = '".$id."'";
$update2 = "DELETE FROM `post` WHERE `post`.`UserId`  = '".$id."'";
$update3 ="DELETE FROM `comment` WHERE `comment`.`UserId`  = '".$id."'";
updateDB($update1);
updateDB($update2);
updateDB($update3);
    
?>