<?php 
session_start();
require("db_rw.php");

$type=$_POST["User_Type"];
$uname=$_POST["uname"];
$pass=$_POST["upass"];

$_SESSION["mail"]=$uname;
$sql="SELECT * FROM `user` WHERE `user`.`Email` = '$uname' AND 
`user`.`password`='$pass';";
//echo $sql;
$result=getJSONFromDB($sql);
$jsn=json_decode($result);
//print_r($jsn) ;
$_SESSION["type"]=$jsn[0]->UserType;
$_SESSION["id"]=$jsn[0]->UserId;
$_SESSION["uname"]=$jsn[0]->UserName;
//echo $_SESSION["id"];
if($jsn[0]->UserType=="Admin" && $jsn[0]->Email==$uname && $jsn[0]->password==$pass && $jsn[0]->UserStatus=="1" ){
    header("location:AminHome.php");
}
else if($jsn[0]->UserType=="Firm Owner" && $jsn[0]->Email==$uname && $jsn[0]->password==$pass ){
    header("location:OwnerHome.php");
}
else {
    header("location:login.php");
}
?>