<?php 
session_start();
require("db_rw.php");
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Log in page</title>
        <script>
            function Viewcomment(id){
                alert("comment are here");
                 var xmlhttp = new XMLHttpRequest();
                xmlhttp.onreadystatechange = function() {
                    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) 
                    {
                        m=document.getElementById("comment");
                        msg=xmlhttp.responseText;
                        m.innerHTML=msg;
                    }
                };
                xmlhttp.open("GET", "CommentViewAjax.php?id=" +id, true);
                xmlhttp.send();
            }
            function Removepost(id){
                
                var xmlhttp = new XMLHttpRequest();
                xmlhttp.onreadystatechange = function() {
                    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) 
                    {
                        alert("Remove Post successfull");
                        location.replace("ReportPost.php");
                    }
                };
                xmlhttp.open("GET", "RemovePostajaxvalidation.php?id=" +id, true);
                xmlhttp.send();
            }
            function Restore(id){
                 var xmlhttp = new XMLHttpRequest();
                xmlhttp.onreadystatechange = function() {
                    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) 
                    {
                        alert("Restore successfull");
                        location.replace("ReportPost.php");
                    }
                };
                xmlhttp.open("GET", "RestorAjaxValidation.php?id=" +id, true);
                xmlhttp.send();
            }
        </script> 
	</head>
	<body>
		<?php
			include("AminNavbar.html");
		?>
		<br>
		
		<div >
			<div>
				<div>
                    <h2 style="text-align:center">Reported post</h2>
                    <?php
					$sql="SELECT * FROM `post` WHERE `post`.`PostStatus`='0';";
                    //echo $sql;
                    $result=getJSONFromDB($sql);
                    $jsn=json_decode($result);
                    //print_r($jsn) ;
                    

                    for($i=0;$i<sizeof($jsn);$i++){
                        $sql1="SELECT * FROM `user` WHERE `user`.`UserId` = '".$jsn[$i]->UserID."' ;";
                        
                        $result1=getJSONFromDB($sql1);
                        $jsn1=json_decode($result1);
                        echo "<!-- post 1--->
                            <br><br>
                            <p >
                                <img src='if_Man-16_379442.png' hight='30px' width='30px'>
                                <a href='#'>".$jsn1[0]->UserName."</a>
                            </p>
                            
                            <p>	
                                Posted on ".$jsn[$i]->PostDate." at ".$jsn[$i]->PostTime."
                            </p>
                            
                            <p>".$jsn[$i]->PostDescription."</p>
                            <hr>
                            <div >
                                <input type='button' onclick='Viewcomment(".$jsn[$i]->PostId.")' name='btcomment' value='View Comments'>
                                <input type='button' onclick='Removepost(".$jsn[$i]->PostId.")' name='btremove' value='Remove post'>
                                <input type='button' onclick='Restore(".$jsn[$i]->PostId.")' name='btrestor' value='Restore post'>
                            </div>
                            <p id='comment'></p>
                            
                            <hr>";
                    }
                    ?>
					
                </div>
			</div>
		</div>
		
		
		
		
		
		
		
	</body>