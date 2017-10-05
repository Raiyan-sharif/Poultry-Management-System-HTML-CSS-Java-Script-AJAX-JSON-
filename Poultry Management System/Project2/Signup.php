<html>
    <head>
        <title>
            Sign up page
        </title>
        <script>
            flag="a";
          xmlhttp = new XMLHttpRequest();
            function showHint(e) {
                var x = e.value;
                var atpos = x.indexOf("@");
                var dotpos = x.lastIndexOf(".");
                var msg=document.getElementById("checkmail");
                if (atpos<1 || dotpos<atpos+2 || dotpos+2>=x.length) {
                    msg.innerHTML="*";
                    msg.style.color="red";
                    //return false;
                }
                else{
                    msg.innerHTML="";
                    checkmail= true;
                }
                str=document.getElementById("mail").value;
                xmlhttp.onreadystatechange = function() {
                    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                        flag = xmlhttp.responseText;
                        document.getElementById('emailvar').innerHTML=flag;
                    }
                    
                };
                var url="AjaxMailValidation.php?email="+str;
                //alert(url);
                xmlhttp.open("GET", url, true);
                xmlhttp.send();
            }
            var pass="";
            var cpass="";
            checkfname=false;
            checkuname=false;
            checkmail=false;
            checkpass=false;
            checkcpass=false;
            checkph=false;
            function valiation(e){
                var uname=e.value;
                var msg=document.getElementById("check");
                
                if(uname.length>=5){
                    msg.innerHTML="";
                    checkuname=true;
                    
                }
                else if(uname.length<5){
                    msg.innerHTML="*";
                    msg.style.color="red";
                }
            }
            function valiationfn(e){
                var uname=e.value;
                var msg=document.getElementById("checkfn");
                
                if(uname.length>0){
                    msg.innerHTML="";
                    checkfname=true;
                }
                else if(uname.length==0){
                    msg.innerHTML="*";
                    msg.style.color="red";
                }
            }
            
            function validatepass(e){
                var x= e.value;
                var msg=document.getElementById("checkpass");
                if(x.length<6 || x.length>=20){
                    msg.innerHTML="*";
                    msg.style.color="red";
                   
                }
                else{
                    msg.innerHTML="";
                    pass=x;
                    checkpass= true;
                }
            }
            function validateCompass(e){
                var x= e.value;
                var msg=document.getElementById("checkcompass");
                if(x==pass){
                    msg.innerHTML="";
                    checkcpass= true;
                }
                else{
                    msg.innerHTML="*";
                    msg.style.color="red";
                    
                }
            }
            function valiationmobileno(e){
                var x= e.value;
                var msg=document.getElementById("checkph");
                if(x.length>=11 && x.length<=15 ){
                    msg.innerHTML="";
                    checkph=true;
                }
                else if(x.length<11 && x.length>15){
                    msg.innerHTML="*";
                    msg.style.color="red";
                }
            }
            
            function checkall(){
                
                var type=document.getElementById("Type");
                
                var posttype=type.options[type.selectedIndex].value;
                
                if(posttype.length !='4' && checkfname==true && checkph==true && checkmail==true && checkuname==true && checkpass==true && checkcpass==true){
                    alert("Signup sucessful.");
                    return true;
                }
                else{
                    alert("Please input all * information");
                    return false;
                }
            }
            
            
        </script>
    </head>
    <body>
        
        <?php
            include("Navbar.html");
        
            echo "<form action='SignupV.php' method='_POST' id='main' style='text-align:center'>
                <pre>
                    <h1 style='text-align:cenetr'>Free sign up here</h1>
                    <b>User Name     : </b> <level id='check' style='color:red'>*</level> <input type='text' onkeyup='valiation(this)' name='uname' id='usname' placeholder='At lest 6 character'>
                    
                    <b>First Name    : </b> <level id='checkfn' style='color:red'>*</level> <input type='text' onkeyup='valiationfn(this)' name='fname' id='fn' placeholder='input first name'>
                
                    <b>Last Name     : <input type='text' name='lname' id='ln' placeholder='optional'>
                
                    <b>Email         : </b> <level id='checkmail' style='color:red'>*</level> <input type='text' onkeyup='showHint(this)' name='email' id='mail' placeholder='input valid email'>
                    <span id='emailvar' style='color:red'></span>
                    
                    <b>Mobile        : </b> <level id='checkph' style='color:red'>*</level> <input type='text' onkeyup='valiationmobileno(this)' name='mobileno' id='mobile' placeholder='input valid Mobile'>
                    
                    <b>Password      : </b> <level id='checkpass' style='color:red'>*</level> <input type='password' onkeyup='validatepass(this)' name='upass' id='pass' placeholder='at lest 6 character'>
                    
                    <b>Confirm       : </b> <level id='checkcompass' style='color:red'>*</level> <input type='password' onkeyup='validateCompass(this)' name='cpass' id='ass' placeholder='rewrite the pass'>
                    
                    <b>Date of Birth  : </b> <input type='date' name='birth'>
                    
                    <b>User Type     : </b><level id='checkusertype' style='color:red'>*</level> <select name='User_Type' id='Type'>
                                              <option value='Nill'>--Select user type--</option>
                                              <option value='Admin'>Admin</option>
                                              <option value='Firm Owner'>Firm Owner</option>
                                            </select>
                    
                    
                                        <input type='submit' value='Sign up' onclick='return checkall()' style='color:green'><input type='reset' value='Reset' style='color:green'>
                </pre>
            
        </form>";
        ?>
        
        
        
        
    </body>
</html>