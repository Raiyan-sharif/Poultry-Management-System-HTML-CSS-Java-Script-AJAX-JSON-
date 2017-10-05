<?php 
require("db_rw.php");
$id = $_GET['id'];

$update = "DELETE FROM `post` WHERE `post`.`PostId`  = '".$id."'";
$update2="DELETE FROM `comment` WHERE `comment`.`PostId`  = '".$id."'";
updateDB($update);
updateDB($update2);

    
?>