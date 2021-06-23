<?php

session_start();
include("connection.php");
error_reporting(0);


?>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">    <meta charset="UTF-8">
    <link href='https://fonts.googleapis.com/css?family=Arbutus' rel='stylesheet'>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    
<style>
    *{
margin: 0;
padding: 0;

    }
    
    .header{

        background-color:#0081FF ;
        height: 3.5em;
        color: aliceblue;
        

    }
    .btn{
        width: 8em;
         height: 2.7rem;
          background-color:white;
           border-radius: 3rem;
           border: none; 
           font-size: medium;
    }
     .footer{

display:block;

position: fixed;

   left: 0;

   bottom: 0;

   width: 100%;

height:auto;

   background-color: white;

   color: grey;

   text-align: left;

}







/*buttons in the footer*/

.footer_btn{

background:white;

  border: none;

  color: white;

  padding: 10px 10px;

  text-align: center;

  text-decoration: none;

  font-size: 14px;

border-radius: 2px;

width:auto;

}

.footer_btn:hover{ /*when hover on footer buttons change color*/

background:#C0C0C0;

}
</style>

</head>

<body style="background-color: #f1f1f1; color: #333; font-family: Helvetica Neue,Helvetica,sans-serif;">
    <!--<div class="header">
        &nbsp;&nbsp;<i class="fa fa-angle-left" style="font-size:20px; margin-top: 20px;">&nbsp;&nbsp;&nbsp;Login</i>
    </div>--->
    <div class="header">
        &nbsp;&nbsp;&nbsp;&nbsp;<i onclick="goBack();" class="fa fa-angle-left" style="font-size:24px; margin-top: 19.5px; position: absolute;"></i>
        <div style=" width:120px; margin-left:30px; margin-top: 5px;"><p>Login</p></div>
           
        </div>
    <br>
    <center>
    
        <form method="post">
             <div>
                <div style="position: absolute;margin: 13px;margin-left: 10px;"><i class="fa fa-mobile-phone" style="font-size:24px"></i></div>
            <input type="text" id="number" name="number" onfocus="this.value='+91'" maxlength="13"  style="width:100%;font-size: medium; outline:none; height: 50px; border: 0px outset white; border-radius: 25px;text-indent:30px" placeholder="Mobile Number" required autocomplete="off"><br><br>
        </div>
            <div>
                <div style="position: absolute;margin: 16px;margin-left: 10px;"><i class="fa fa-key" aria-hidden="true"></i></div>
            <input type="password" id="password" name="password" maxlength="8" style="width:100%;font-size: medium; height: 50px; outline:none; border: 0px outset white; border-radius: 25px;text-indent:30px" placeholder="Enter Password" required autocomplete="off"><br><br>
        </div>
            
                <input type="submit" name="submit" style="width: 170px; height: 45px; background-color: #0081FF; border-radius: 5px; border: none; color: #f1f1f1;" value="Login">
                <br><br><br>
                 </form>
                 
                 <?php
                 
                                             
                            if(isset($_POST['submit']))
                            {
                              $phone = $_POST['number'];
                              $passwd = $_POST['password']; 
                            
                               //checking the username and passwords from database
                              $query = "SELECT * from users where phone_number='$phone' && password='$passwd'";
                              $data = mysqli_query($conn,$query);
                              $total = mysqli_num_rows($data);
                              $result = mysqli_fetch_assoc($data);
                              
                            
                              if($result['flag']==1 && $total==1)
                              {
                                session_regenerate_id();
                                $_SESSION['phonenumber'] = $result['phone_number'];
                                $_SESSION['id']=$result['user_id'];
                                $_SESSION['pass'] = $result['password'];
                            
                                session_write_close();
                            
                                header('location:home');
                              }
                            
                              else
                              {
                                echo "<script> alert('Password or Mobile Number Wrong!')</script>";  
                              }
                            
                            }
                        
                                
                 ?>
            
            <div>
                <input type="button"  onclick="location.href='https://elantamall.in/person/register?r_code=1003';" class="btn" value="Register">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <input type="button" onclick="window.location.href='forgotpass'"style="width:11em;margin-left: 2%;" class="btn" value="Forget password">
            </div>
       
</center>
 <div class="footer"> 
        <center>
            <button onclick="location.href='index.php'" style="float:left;outline:none;" class="footer_btn"><i id="f_home"  class="fa fa-home" style="font-size:25px;color:#696969"></i></button>
            <button  onclick="location.href='#'" style="outline:none;"  class="footer_btn"><i id="f_my" class="far fa-search" style="font-size:25px;color:#696969;color:grey"></i></button>
            
            <button  onclick="location.href='win'" style="outline:none;margin-left: 18%;"  class="footer_btn"><i id="f_my" class="far fa-trophy-alt" style="font-size:25px;color:#696969;color:grey"></i></button>
            <button  onclick="location.href='home'" style="float:right;outline:none;"  class="footer_btn"><i id="f_my" class="fa fa-user" style="font-size:25px;color:#696969;color:grey"></i></button>
        </center>
          </div>
</body>
</html>