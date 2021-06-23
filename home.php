<?php
include("connection.php");
session_start();
error_reporting(0);
$userphone=$_SESSION['phonenumber'];
if($userphone==true);
else 
header("location:login");


$userdata=mysqli_query($conn,"SELECT * from users where phone_number='$userphone'");
$userresult = mysqli_fetch_assoc($userdata);
$id = $_SESSION['id'];

$walletdata=mysqli_query($conn,"SELECT * from wallet where user_id = $id");
$walletresult = mysqli_fetch_assoc($walletdata);

?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>profile</title>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"/>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">


    <style>
    
        .header{
            background-color: #0081FF;
            width: 100%;
            height: 12em;
            
            border-radius: 3px;
        }
        .btn{
            margin: 8px;
            height: 2.8em;
            width: 40%;
            border-radius: 5px;
            border: 0ch;
            box-shadow: 1px 1px #888888;
            padding: 0ch;
            position: static;
            
        }
        .l-div{
            height: 1.8em;
        }
        .l-txt{
            margin: 10px;
            margin-top: 3%;
            font-size: 15px;
            position: relative;
        }
        #icn{
            color: rgb(158, 111, 158);
            font-size: 20px;
            margin-left:10px;
        }
        .in-div{
            margin-left: 20px;
            animation-name: anim;
            animation-duration: 0.7s;
            animation-direction: alternate;
            margin-top: 10px;
            
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


        .spn
        {
            position: absolute;
            margin-top: 50px;
            margin-left: 4px;
            width: 100%;
        }
        .btn-1
        {
            width: 20%;
                height: 3.2em;
                background-color: white;
                border: none;
                border-radius: 5px;
                
        }
        @keyframes anim
        {
            from{opacity: 0;} to{opacity: 1;}
        }
        
         .sbuttons {
          bottom: 8%;
          position: fixed;
          background:white;
          border-radius:50%;
          margin: 1em;
          right: 0;
        }


        .sbuttons:hover{
          opacity: 1;
          width: 60px;
          height: 60px;
          margin: 15px auto 0;
        }
           
           
        /* The Modal (background) */
      .modal {
      z-index: 1; /* Sit on top */
      display:none;
      position:fixed;
      width: 100%; /* Full width */
      height: 100%; /* Full height */
      background-color: rgb(0,0,0); /* Fallback color */
      background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
      }
       .modal-content
      {
          background-color:white;
          margin:auto;
          border:1px solid white;
          width:320px;
          height:auto;
          color:grey;
          position:fixed;
          top:50%;
          left:50%;
          border-radius:10px;
          transform:translate(-50%,-50%);
          animation-name: animatecenter;
          animation-duration: 0.5s;
      }
      
      
        @keyframes animatecenter
        {
            from {100%; opacity:0}
            to {50%; opacity:1}
        }
      
      
        
           .modal-btn{
            background-color:#E0E0E0;
            border: 0px ;
            padding: 7px 7px;
            text-align: center;
            text-decoration: none;
            font-size: 15px;
            border-radius: 5px;
            font-weight:bold;
            margin:8px;
            outline:none;
            width:auto;
            }
          
    </style>
    <script> 
    var flag=0;
    
        function wallet()
        {
            //setTimeout(function(){ alert("Hello"); }, 3000);
            if(flag==0){
   
                document.getElementById("drop").style.display="block";
                flag=1;

            }
            else
            {
                document.getElementById("drop").style.display="none";
                flag=0;

            }
        }
        var flag1=0;
        function accsec()
        {
            if(flag1==0){

                document.getElementById("drop1").style.display="block";
                flag1=1;

            }
            else
            {
                document.getElementById("drop1").style.display="none";
                flag1=0;

            }
        }
        var flag2=0;

        function app()
        {
            if(flag2==0){

                document.getElementById("drop2").style.display="block";
                flag2=1;

            }
            else
            {
                document.getElementById("drop2").style.display="none";
                flag2=0;

            }
        }
        var flag3=0;
        function about()
        {
            if(flag3==0){

                document.getElementById("drop3").style.display="block";
                flag3=1;

            }
            else
            {
                document.getElementById("drop3").style.display="none";
                flag3=0;

            }
        }
        
        function logoutConfirm()
        {
            document.getElementById("confirmDialog").style.display="block";
        }
        
        function exitDialog()
        {
            document.getElementById("confirmDialog").style.display="none";
        }
    </script>
</head>
<body style="background-color: #f1f1f1; color: #333;" >
    
    <div class="modal" id="confirmDialog">
        <div class="modal-content">
       <center><h3>CONFIRM</h3></center> 
       <span style="margin:20px">Do You Want to Logout?</span>
       <p style="text-align:right;"><button class="modal-btn" onclick="location.href='logout'" style="float:right;color:#0081FF;">&nbsp;YES&nbsp;</button><button class="modal-btn" style="float:right;color:grey;" onclick="exitDialog();">CANCEL</button></p>
   </div>
    </div>
<div class="header">
    <div>
        <img style="margin: 10px;" src="/assets/user.png" alt="user" width="50px" height="50px">
        <span style="color: white;font-size: 20px;">id:<?php echo $id; ?></span>
    <br>
    </div>
    <div style="color: white;margin: 10px;margin-left: 14px;font-size: 15px;">
        
    <span style="font-weight:bold" >Mobile: &plus;<?php echo $userphone; ?></span>
    <br>
    <span style="font-weight:bold">Available Balance: &#8377;<?php echo $walletresult['available_balance'];?></span>
    </div>
    <div>
        <button onclick="location.href='recharge'" style="background-color: #39B54A;color: white;font-weight:bold;" class="btn" >RECHARGE</button>
        <button onclick="location.href='withdraw'" style="background-color: white;font-weight:bold;" class="btn" > WITHDRAW</button>
    </div>
    
</div>
<br>
<div>
    <div onclick="location.href='#'" class="l-div">
        <i id="icn" class="far fa-newspaper"></i>
        <span class="l-txt">orders</span>
    </div>
    <hr style="margin-top: 1px;">
</div>
<div>
    <div onclick="location.href='promotion'" class="l-div">
        <i id="icn" class="far fa-shopping-bag"></i>
        <span class="l-txt">Promotion</span>
    </div>
    <hr style="margin-top: 1px;">
</div>
<div>
    <div  onclick="wallet();" class="l-div">
        <i id="icn" class="far fa-wallet"></i>
        <span class="l-txt">wallet <i style="float:right;color: rgb(158, 111, 158);" class="far fa-chevron-down"></i></span>
    </div>
    <div id="drop" class="in-div" style="display: none;" >
        <hr >
       <div onclick="location.href='recharge'"><span   class="l-txt">Recharge</span></div> 
        <hr>
       <div onclick="location.href='withdraw'"> <span onclick="location.href='withdraw'" class="l-txt">Withdraw</span></div>
        <hr>
        <div onclick="#"><span class="l-txt">Transactions</span></div>
        
    </div>
    <hr style="margin-top: 1px;">
</div>
<div>
    <div  onclick="location.href='bankcard'" class="l-div">
        <i id="icn" class="fal fa-credit-card-blank"></i>
        <span class="l-txt">bank card</span>
    </div>
    <hr style="margin-top: 1px;">
</div>
<div>
    <div class="l-div">
        <i id="icn" class="far fa-address-card"></i>
        <span class="l-txt">address</span>
    </div>
    <hr style="margin-top: 1px;">  
</div>
<div>
    <div onclick="accsec();" class="l-div">
        <i  id="icn" class="far fa-shield-check"></i>
        <span class="l-txt">account security <i style="float: right;color: rgb(158, 111, 158);" class="far fa-chevron-down"></i></span>
        
    </div>
    <div class="in-div" id="drop1" style="display: none;" >
        <hr >
       <div onclick="location.href='forgotpass'" >
            <span   class="l-txt">Reset Password</span>  </div>
        
        
    </div>
    <hr  style="margin-top: 1px;">
</div>
<div>
    <div onclick="app();" class="l-div">
        <i id="icn" class="fal fa-download"></i>
        <span class="l-txt">app download <i style="float: right;color: rgb(158, 111, 158);" class="far fa-chevron-down"></i></span>
    </div>
    <div class="in-div" id="drop2" style="display: none;" >
        <hr>
        <span   class="l-txt">Android Download</span>
        
       
        
    </div>
    <hr style="margin-top: 1px;">
</div>
<div>
    <div class="l-div" onclick="location.href='complain'">
        <i id="icn" class="fal fa-envelope-open-text"></i>
        <span class="l-txt" >complaints&suggestion</span>
    </div>
    <hr style="margin-top: 1px;">
</div>
<div>
    <div onclick="about();" class="l-div">
        <i id="icn" class="fal fa-map-marker-question"></i> 
        <span class="l-txt">About <i style="float: right;color: rgb(158, 111, 158);" class="far fa-chevron-down"></i></span>
    </div>
    <div class="in-div" id="drop3" style="display: none;" >
        <hr>
        <span   class="l-txt">Privacy Policy</span>
        <hr>
        <span class="l-txt">Risk Disclouser Agreement</span>
        
        
    </div>
    <hr  style="margin-top: 1px;">
</div>
<br>
<center>
<div>
    <button onclick=" logoutConfirm();" style="background-color: #39B54A;" class="btn" > LOGOUT </button>



</div>
</center>
<br><br>
<div class="footer"> 
        <center>
            <button onclick="location.href='index.php'" style="float:left;outline:none;" class="footer_btn"><i id="f_home"  class="fa fa-home" style="font-size:25px;color:#696969;color:grey"></i></button>
            <button  onclick="location.href='#'" style="outline:none;"  class="footer_btn"><i id="f_my" class="far fa-search" style="font-size:25px;color:#696969;color:grey"></i></button>
            
            <button  onclick="location.href='win'" style="outline:none;margin-left: 18%;"  class="footer_btn"><i id="f_my" class="far fa-trophy-alt" style="font-size:25px;color:#696969;color:grey"></i></button>
            <button  onclick="location.href='home'" style="float:right;outline:none;"  class="footer_btn"><i id="f_my" class="fa fa-user" style="font-size:25px;color:#0081FF;"></i></button>
        </center>
          </div>

</body>
</html>