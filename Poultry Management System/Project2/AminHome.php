<?php
include("AminNavbar.html");

session_start();
require("db_rw.php");

$name=$_SESSION["uname"];
?>
<html>
    <head>
        <title>
            Admin home
        </title>
        <script>
            function AddAdmin(id){
                //alert(id);
                var xmlhttp = new XMLHttpRequest();
                xmlhttp.onreadystatechange = function() {
                    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) 
                    {
                        alert("Add Admin successfull");
                        location.replace("AminHome.php");
                    }
                };
                xmlhttp.open("GET", "AddAdminajaxvalidation.php?id=" +id, true);
                xmlhttp.send();
            }
            function RemoveAdmin(id){
                var xmlhttp = new XMLHttpRequest();
                xmlhttp.onreadystatechange = function() {
                    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) 
                    {
                        alert("Remove Admin successfull");
                        location.replace("AminHome.php");
                    }
                };
                xmlhttp.open("GET", "RemoveAdminajaxvalidation.php?id=" +id, true);
                xmlhttp.send();
            }
            function RemoveOwner(id){
                var xmlhttp = new XMLHttpRequest();
                xmlhttp.onreadystatechange = function() {
                    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) 
                    {
                        alert("Remove Owner successfull");
                        location.replace("AminHome.php");
                    }
                };
                xmlhttp.open("GET", "RemoveOwnerajaxvalidation.php?id=" +id, true);
                xmlhttp.send();
            }
            
           
        </script>
    </head>
    <body>
        <fieldset>
            
            <legend>Amdin Request</legend>
            
            <div>
                <table style="width: 100%" >
                  
                    <tr>
                    <td><b>Photo</b></td>
                    <td><b>UserId</b></td>
                    <td><b>UserName</b></td>
                    <td><b>FirstName</b></td>
                    <td><b>LastName</b></td>
                    <td><b>Email</b></td>
                    <td><b>Mobile</b></td>
                    <td><b>DateOfBirth</b></td>
                    <td><b>UserStatus</b></td>
                  </tr>
              
            <?php  
            if(isset($_SESSION["uname"])){
            $sql="SELECT * FROM `user` WHERE `user`.`UserType` = 'Admin' AND 
                 `user`.`UserStatus`='0';";
                    
            $result=getJSONFromDB($sql);
            $jsn=json_decode($result);
                    
            for($i=0;$i<sizeof($jsn);$i++){
                echo "<tr>
                    <td><img src='if_Man-16_379442.png' hight='30px' width='30px'></td>
                    <td>".$jsn[$i]->UserId."</td>
                    <td>".$jsn[$i]->UserName."</td>
                    <td>".$jsn[$i]->FirstName."</td>
                    <td>".$jsn[$i]->LastName."</td>
                    <td>".$jsn[$i]->Email."</td>
                    <td>".$jsn[$i]->Mobile."</td>
                    <td>".$jsn[$i]->DateOfBirth."</td>
                    <td><input type='button' onclick='AddAdmin(".$jsn[$i]->UserId.")' name='btadd' value='Add' style='color:green'>
                    <input type='button' onclick='RemoveAdmin(".$jsn[$i]->UserId.")' name='btremove' value='Remove' style='color:red'></td>
                  </tr>";
            }
            }
                    
            ?>
              
                </table>
            </div>
            
        </fieldset>
        <hr>
        <fieldset>
            
            <legend>Firm Owner</legend>
            
            <div>
                <table style="width: 100%" >
                    
                  <tr>
                    <td><b>Photo</b></td>
                    <td><b>UserId</b></td>
                    <td><b>UserName</b></td>
                    <td><b>FirstName</b></td>
                    <td><b>LastName</b></td>
                    <td><b>Email</b></td>
                    <td><b>Mobile</b></td>
                    <td><b>DateOfBirth</b></td>
                    
                  </tr>
                  
            <?php  
            if(isset($_SESSION["uname"])){
            $sql="SELECT * FROM `user` WHERE `user`.`UserType` = 'Firm Owner' AND 
                 `user`.`UserStatus`='1';";
            
            $result=getJSONFromDB($sql);
            $jsn=json_decode($result);
                    
                    
            for($i=0;$i<sizeof($jsn);$i++){
                echo "<tr>
                    <td><img src='if_Man-16_379442.png' hight='30px' width='30px'></td>
                    <td>".$jsn[$i]->UserId."</td>
                    <td>".$jsn[$i]->UserName."</td>
                    <td>".$jsn[$i]->FirstName."</td>
                    <td>".$jsn[$i]->LastName."</td>
                    <td>".$jsn[$i]->Email."</td>
                    <td>".$jsn[$i]->Mobile."</td>
                    <td>".$jsn[$i]->DateOfBirth."</td>
                    <td><input type='button' onclick='RemoveOwner(".$jsn[$i]->UserId.")' name='btremove' value='Remove' style='color:red'></td>
                  </tr>";
            }
                    }
        
            ?>
              
                </table>
                
            </div>
            
            
        </fieldset>
        
    </body>
</html>