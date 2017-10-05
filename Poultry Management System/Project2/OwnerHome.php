<?php 
session_start();
require("db_rw.php");
$id=$_SESSION["id"];
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Login page</title>
	   <script>
           function Viewcomment(id){
                //alert(id);
                 var xmlhttp = new XMLHttpRequest();
                xmlhttp.onreadystatechange = function() {
                    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) 
                    {
                        
                        m=document.getElementById("comment");
                        msg=xmlhttp.responseText;
                        m.innerHTML=msg;
                        
                    }
                };
                xmlhttp.open("GET", "CommentViewAjax.php?id="+id, true);
                xmlhttp.send();
            }
           function commentpost(id){
               var comm=document.getElementById("tex").value;
               var xmlhttp = new XMLHttpRequest();
                xmlhttp.onreadystatechange = function() {
                    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) 
                    {
                        alert("Comment Post successfull");
                        document.getElementById("tex").value="";
                        //location.replace("ReportPost.php");
                    }
                };
                xmlhttp.open("GET", "CommentAjaxValidation.php?comm=" +comm+"&postid="+id, true);
                xmlhttp.send();
           }
           
           function Reportpost(id){
               var xmlhttp = new XMLHttpRequest();
                xmlhttp.onreadystatechange = function() {
                    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) 
                    {
                        alert("Report Post successfull");
                    }
                };
                xmlhttp.open("GET", "ReportAjaxValidation.php?id="+id, true);
                xmlhttp.send();
               
           }
        </script>
	</head>
	<body>
		<?php
			include("OwnerNavbar.html");
            
		?>
		<br>
		
		<div >
			<div>
				<div >
                    <h2>
                        <a style="text-align:center" >Other Owner Post</a>
                    </h2>
					<?php 
                    $sql="SELECT * FROM `post` WHERE `post`.`PostStatus`='1'order by `post`.`PostId` desc ;";
                    //echo $sql;
                    $result=getJSONFromDB($sql);
                    $jsn=json_decode($result);
                    //print_r($jsn) ;
                    

                    for($i=0;$i<sizeof($jsn);$i++){
                        $sql1="SELECT * FROM `user` WHERE `user`.`UserId` = '".$jsn[$i]->UserID."' ;";
                        
                        $result1=getJSONFromDB($sql1);
                        $jsn1=json_decode($result1);
                        
                        if($jsn[$i]->UserID==$id){
                            echo "
                            
                            <p >
                                <img src='if_Man-16_379442.png' hight='30px' width='30px'> <a href='#'>".$jsn1[0]->UserName."</a> 
                            </p>
                            
                            <p>	
                                Posted on ".$jsn[$i]->PostDate." at ".$jsn[$i]->PostTime."
                            </p>
                            
                            <p>".$jsn[$i]->PostDescription."</p>
                            
                            <hr>
                            <div >
                           
                                <input type='text' name='commenttxt' placeholder='Comment here' id='tex'>
                                <input type='button' onclick='commentpost(".$jsn[$i]->PostId.")' name='btcomment' value='Post'>
                                <input type='button' onclick='Viewcomment(".$jsn[$i]->PostId.")' name='btcommentview' value='View comment'>
                                
                            </div>
                            <p id='comment'></p>
                            <hr>
                            <br>";
                        }
                        else{
                            echo "
                            
                            <p >
                                <img src='if_Man-16_379442.png' hight='30px' width='30px'> <a href='#'>".$jsn1[0]->UserName."</a> 
                            </p>
                            
                            <p>	
                                Posted on ".$jsn[$i]->PostDate." at ".$jsn[$i]->PostTime."
                            </p>
                            
                            <p>".$jsn[$i]->PostDescription."</p>
                            
                            <hr>
                            <div >
                            
                                <input type='text' name='comment' placeholder='Comment here' id='tex'>
                                <input type='button' onclick='commentpost(".$jsn[$i]->PostId.")' name='btcomment' value='Post'>
                                <input type='button' onclick='Viewcomment(".$jsn[$i]->PostId.")' name='btcommentview' value='View comment'>
                                <input type='button' onclick='Reportpost(".$jsn[$i]->PostId.")' name='btReport' value='Report'>
                                
                                
                            </div>
                            <p id='comment'></p>
                            <hr>
                            <br>";
                        }

                        
                    }
                    ?>
					
                </div>
			</div>
		</div>
		
		
		
		
		
		
		
		
	</body>