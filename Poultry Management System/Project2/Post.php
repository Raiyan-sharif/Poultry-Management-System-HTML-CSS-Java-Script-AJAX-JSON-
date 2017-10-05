<?php
session_start();
require("db_rw.php");
$name=$_SESSION["uname"];
$id=$_SESSION["id"];
?>
<html>
    <head>
        <title>
            Eit Profile
        </title>
        <script>
            function commentpost(){
                alert("comment are here");
            }
            function Removepost(id){
                
                var xmlhttp = new XMLHttpRequest();
                xmlhttp.onreadystatechange = function() {
                    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) 
                    {
                        alert("Remove Post successfull");
                        location.replace("Post.php");
                    }
                };
                xmlhttp.open("GET", "RemovePostajaxvalidation.php?id=" +id, true);
                xmlhttp.send();
            }
            
            function checkall(){
                var msg=document.getElementById("text");
                var type=document.getElementById("type");
                var loc=document.getElementById("location");
                var posttype=type.options[type.selectedIndex].value;
                var location=loc.options[loc.selectedIndex].value;
                if(location.length !='0' && posttype.length !='0'){
                    //alert(location);
                    return true;
                    
                }
                else{
                    //alert(location);
                    alert("fill all info");
                    return false;
                }
                //alert(type.options[type.selectedIndex].value.length);
                //alert(loc.options[loc.selectedIndex].value.length);
                alert(document.msg.value.length);
                return false;
            }
        </script>
    </head>
    <body>
        <?php
        include("OwnerNavbar.html");
        ?><br>
        <form style="text-align:center" action="Postvalidation.php" method="post">
            <div>
                <h3>Post your Idea</h3>
                <div>
                    <br>
                    <textarea name="message" rows="10" cols="100" id="text">
                        describe your post.
                    </textarea>
                    <br>
                    <hr>
                    <div>
                        <select id="type" name="posttype">
                            <option value=''>--Select Post type--</option>
                            <option value='Idea'>Idea</option>
                            <option value='Sell'>Sell</option>
                            <option value='Buy'>Buy</option>
                        </select>
                        <select id="location" name="postloc">
                            <option value=''>--Select location--</option>
                            <option value='Dhaka'>Dhaka</option>
                            <option value='Rajshahi'>Rajshahi</option>
                            <option value='Chittagong'>Chittagong</option>
                        </select>
                        <input type="submit" value="Post" onclick="return checkall()">
                        
                    </div>
                    <hr>
                    <br>
                </div>
            </div>
        </form>
		
		<div >
			<div>
				<div >
                    
					<?php 
                    $sql="SELECT * FROM `post` WHERE `post`.`PostStatus`='1' AND 
                        `post`.`UserID`='".$id."' order by `post`.`PostId` desc ;";
                    
                    $result=getJSONFromDB($sql);
                    $jsn=json_decode($result);
                    
                    for($i=0;$i<sizeof($jsn);$i++){

                        echo "
                            
                           <img src='if_Man-16_379442.png' hight='30px' width='30px'> <a href='profile.php'>".$name."</a>
                            
                            <p>	
                                Posted on ".$jsn[$i]->PostDate." at ".$jsn[$i]->PostTime."
                            </p>
                            
                            <p>".$jsn[$i]->PostDescription."</p>
                            <hr>
                            <div >
                                
                                <input type='button' onclick='Viewcomment()' name='btcomment' value='View Comment'>
                                <input type='button' onclick='Removepost(".$jsn[$i]->PostId.")' name='btremove' value='Remove'>
                            </div>
                            <hr>";
                    }
                    ?>
					
                </div>
			</div>
		</div>
		
        
        
    </body>
</html>