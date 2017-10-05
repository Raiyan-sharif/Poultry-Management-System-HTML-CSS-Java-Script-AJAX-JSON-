
<?php 
session_start();
require("db_rw.php");
//$postid= $_GET['id'];
$postid= 17;
//$userid=$_SESSION["id"];


$sql ="SELECT * FROM `comment` Where `comment`.`PostId` = ".$postid." order by `comment`.`CommentId` desc ;";

$result=getJSONFromDB($sql);
$jsn=json_decode($result);

 for($i=0;$i<sizeof($jsn);$i++){
    $sql1="SELECT * FROM `user` WHERE `user`.`UserID` = '".$jsn[$i]->UserID."' ;";
                        
    $result1=getJSONFromDB($sql1);
    $jsn1=json_decode($result1);
    echo "
            <div>
                <a href='#'>".$jsn1[0]->UserName."</a><br>
                <p>".$jsn[$i]->Comments."</p>
            </div>";
            
 }

                    
    
?>