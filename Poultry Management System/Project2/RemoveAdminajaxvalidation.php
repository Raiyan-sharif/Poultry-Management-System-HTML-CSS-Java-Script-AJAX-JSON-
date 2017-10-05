<?php 
require("db_rw.php");
$id = $_GET['id'];

$update = "DELETE FROM `user` WHERE `user`.`UserId`  = '".$id."'";

updateDB($update);

    
?>