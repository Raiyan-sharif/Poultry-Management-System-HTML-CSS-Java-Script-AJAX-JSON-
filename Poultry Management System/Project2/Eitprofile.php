
<?php
session_start();
require("db_rw.php");
$name=$_SESSION["mail"];
?>
<html>
    <head>
        <title>
            Eit Profile
        </title>
    </head>
    <body>
        <?php
        $type=$_SESSION["type"];
        if($_SESSION["type"]=="Admin"){
            include("AminNavbar.html");
            
            $sql="SELECT * FROM `user` WHERE `user`.`Email` = '$name';";
            
            $result=getJSONFromDB($sql);
            $jsn=json_decode($result);
            
            echo "<form action='Eitvaliation.php' method='post'>
           <pre>
            <h3>Welcome to Admin profile!</h3><br>
                    
            <img src='if_Man-16_379442.png' height='100' width='80'>
             
            <fieldset>
             
            <legend>Personal Information</legend>
             
            <b>First Name    : </b><input type='text' name='fname' id='fn' value='".$jsn[0]->FirstName."' >
                
            <b>Last Name     : </b><input type='text' name='lname' id='ln' value='".$jsn[0]->LastName."'>
                
            <b>Email         : </b><input type='text' name='email' id='mail' value='".$jsn[0]->Email."'>
            
            <b>Password      : </b> <input type='password' name='upass' id='pass' value='".$jsn[0]->password."'>
            
            <b>Date of Birth  : </b><input type='date' name='birth' value='".$jsn[0]->DateOfBirth."'>
            
            <b>Mobile no     : </b><input type='text' name='mobile' value='".$jsn[0]->Mobile."'>
                                        
                        <input type='submit' value='done' style='color:green'>
  
             </fieldset>
            
            </pre> 
                
        </form>";
        }
        else if($_SESSION["type"]=="Firm Owner"){
            include("OwnerNavbar.html");
           
            $sql="SELECT * FROM `user` WHERE `user`.`Email` = '$name';";
            echo $sql;
            $result=getJSONFromDB($sql);
            $jsn=json_decode($result);
            echo "<form action='Eitvaliation.php' method='post'>
           <pre>
            <h3>Welcome to Owner profile!</h3><br>
                    
            <img src='if_Man-16_379442.png' height='100' width='80'>
             
            <fieldset>
             
            <legend>Personal Information</legend>
             
            <b>First Name    : </b><input type='text' name='fname' id='fn' value='".$jsn[0]->FirstName."' >
                
            <b>Last Name     : </b><input type='text' name='lname' id='ln' value='".$jsn[0]->LastName."'>
                
            <b>Email         : </b><input type='text' name='email' id='mail' value='".$jsn[0]->Email."'>
            
            <b>Password      :</b> <input type='password' name='upass' id='pass' value='".$jsn[0]->password."'>
            
            <b>Date of Birth  : </b><input type='date' name='birth' value='".$jsn[0]->DateOfBirth."'>
            
            <b>Mobile no     : </b><input type='text' name='mobile' value='".$jsn[0]->Mobile."'>
                                        
                        <input type='submit' value='done' style='color:green'>
  
             </fieldset>
            
            </pre> 
                
        </form>";
        }
        ?>
    </body>
</html>