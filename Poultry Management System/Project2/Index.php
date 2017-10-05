<?php 
session_start();
require("db_rw.php");
require("Navbar.html");

?>
<html>
    <head>
        <title>Home page</title>
    </head>
    <body>
        <?php 
                    $sql="SELECT * FROM `post` WHERE `post`.`PostType`='Sell' OR `post`.`PostType`='Buy'
                    order by `post`.`PostId` desc ;";
                    //echo $sql;
                    $result=getJSONFromDB($sql);
                    $jsn=json_decode($result);
                    //print_r($jsn) ;
                    

                    for($i=0;$i<sizeof($jsn);$i++){
                        $sql1="SELECT * FROM `user` WHERE `user`.`UserId` = '".$jsn[$i]->UserID."' ;";
                        
                        $result1=getJSONFromDB($sql1);
                        $jsn1=json_decode($result1);
                        
                        
                            echo "
                            
                            <p >
                                <img src='if_Man-16_379442.png' hight='30px' width='30px'> <a href='#'>".$jsn1[0]->UserName."</a> 
                            </p>
                            
                            <p>	
                                Posted on ".$jsn[$i]->PostDate." at ".$jsn[$i]->PostTime."
                            </p>
                            
                            <p>".$jsn[$i]->PostDescription."</p>
                            
                            <hr>
                            
                            <hr>
                            <br>";
                        
                        
                    }
        ?>
    </body>
</html>