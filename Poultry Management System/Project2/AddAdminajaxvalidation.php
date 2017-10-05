<?php 
require("db_rw.php");
$id = $_GET['id'];

$update = "UPDATE `user` SET `UserStatus` = '1' WHERE `user`.`UserId` = '".$id."'";

updateDB($update);

    
?>