<?php
session_start();
require("db_rw.php");
$name=$_SESSION["mail"];

?>
<html>
    <head>
        <title>
            Profile
        </title>
    </head>
    <body>
        
        <?php
        if($_SESSION["type"]=="Admin"){
            $sql="SELECT * FROM `user` WHERE `user`.`Email` = '$name';";
            
            $result=getJSONFromDB($sql);
            $jsn=json_decode($result);
            //print_r($jsn);
            //echo $jsn[0]["FirstName"];
            
            include("AminNavbar.html");
            echo "<form  action='' method='post'>
           <pre>
            <h3>Welcome to Admin profile!</h3><br>
                    
            <img src='if_Man-16_379442.png' height='100' width='80'>
             
            <fieldset>
             
            <legend>Personal Information</legend>
             
            <b>First Name    : </b>   ".$jsn[0]->FirstName."
                
            <b>Last Name     : </b>   ".$jsn[0]->LastName."
                
            <b>Email         : </b>   ".$jsn[0]->Email."
            
            <b>Date of Birth  : </b>    ".$jsn[0]->DateOfBirth."
            
            <b>Mobile   : </b>         ".$jsn[0]->Mobile."
  
             </fieldset>
            
            </pre> 
        </form>";
        }
        else if($_SESSION["type"]=="Firm Owner"){
            
            $sql="SELECT * FROM `user` WHERE `user`.`Email` = '$name'";
            
            $result=getJSONFromDB($sql);
            $jsn=json_decode($result);
            
            include("OwnerNavbar.html");
            
            echo "<form  action='' method='post'>
            <pre>
            <h3>Welcome to Owner profile!</h3><br>
                    
            <img src='if_Man-16_379442.png' height='100' width='80'>
             
            <fieldset>
             
            <legend>Personal Information</legend>
             
            <b>First Name    : </b>     ".$jsn[0]->FirstName."
                
            <b>Last Name     : </b>     ".$jsn[0]->LastName."
                
            <b>Email         : </b>     ".$jsn[0]->Email."
            
            <b>Date of Birth  : </b>     ".$jsn[0]->DateOfBirth."
            
            <b>Mobile   : </b>          ".$jsn[0]->Mobile."
  
            </fieldset>
  
            </fieldset>
            
            </pre> 
        </form>";
        }
        
        ?>
    </body>
</html>