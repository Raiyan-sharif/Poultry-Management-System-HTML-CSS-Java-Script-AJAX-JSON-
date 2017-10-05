
<html>
    <head>
        <title>
            Sign up page
        </title>
    </head>
    <body>
        
        <?php
        require("db_rw.php");
		
		$sql="";
        if($_REQUEST['User_Type']=="Admin"){
            if(isset($_REQUEST['uname']) && isset($_REQUEST['fname']) && isset($_REQUEST['lname']) && isset($_REQUEST['email']) && isset($_REQUEST['mobileno']) && isset($_REQUEST['upass']) && isset($_REQUEST['birth']) && isset($_REQUEST['User_Type']) ){
                $sql = "INSERT INTO `user` (`UserId`, `UserName`, `FirstName`, `LastName`, `Email`, `Mobile`, `password`, `DateOfBirth`, `UserType`, `UserStatus`, `Image`) VALUES (NULL, '".$_REQUEST['uname']."', '".$_REQUEST['fname']."', '".$_REQUEST['lname']."', '".$_REQUEST['email']."', '".$_REQUEST['mobileno']."', '".$_REQUEST['upass']."', '".$_REQUEST['birth']."', '".$_REQUEST['User_Type']."', '0', 'any')";

                //echo $sql;
                updateDB($sql);
                header("location:login.php");

            }
            else{
			 header("location:Signup.php");
                
		    }
            
        }
        else if($_REQUEST['User_Type']=="Firm Owner"){
            if(isset($_REQUEST['uname']) && isset($_REQUEST['fname']) && isset($_REQUEST['lname']) && isset($_REQUEST['email']) && isset($_REQUEST['mobileno']) && isset($_REQUEST['upass']) && isset($_REQUEST['birth']) && isset($_REQUEST['User_Type']) ){
                $sql = "INSERT INTO `user` (`UserId`, `UserName`, `FirstName`, `LastName`, `Email`, `Mobile`, `password`, `DateOfBirth`, `UserType`, `UserStatus`, `Image`) VALUES (NULL, '".$_REQUEST['uname']."', '".$_REQUEST['fname']."', '".$_REQUEST['lname']."', '".$_REQUEST['email']."', '".$_REQUEST['mobileno']."', '".$_REQUEST['upass']."', '".$_REQUEST['birth']."', '".$_REQUEST['User_Type']."', '1', 'any')";

                echo $sql;
                updateDB($sql);
                header("location:login.php");

            }
            else{
			 header("location:Signup.php");
                
		    }
            
        }
        else{
            header("location:Signup.php");
           
        }
		
        ?>
        
    </body>
</html>