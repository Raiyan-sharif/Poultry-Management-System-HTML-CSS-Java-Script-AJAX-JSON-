
<html>
    <head>
        <title>
            Login page
        </title>
        <script>
           
            function validation1(){
                
                var mail=document.getElementById("name");
                var pass=document.getElementById("pass");
                //alert(mail.value.length);
                //alert(pass.value.length);
                if(mail.value.length==0 || pass.value.length==0){
                    alert("Missing input");
                    return false;
                }
                else{
                    return true;
                }
            }
        </script>
    </head>
    <body>
        <?php 
            include("Navbar.html");
        ?>
        <form style="text-align:center" action="LoginValiation.php" method="post" id="main">
            
            <pre>
                <h3> Login To Poultry Managemrnt System</h3>
            
                    <b>Emai Id     : </b><input type="text" name="uname" id="name">

                    <b>Password      : </b><input type="password" name="upass" id="pass">
                    <span id="checkMail"></span>

                    <!--<b>User Type     : </b> <select name='User Type'>
                                              <option value=''>--Select user type--</option>
                                              <option value='Admin'>Admin</option>
                                              <option value='Firm Owner'>Firm Owner</option>
                                            </select>
                                            -->
                
                <input type="submit" name="submit" value="Login" id="login" onclick="return validation1()">
            </pre>
        </form>
    </body>
</html>



