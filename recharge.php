<?php
session_start();
error_reporting(0);
include("connection.php");

//retrieving session variables
$userphone = $_SESSION['phonenumber'];
$id = $_SESSION['id'];

//checking session created or not
if($userphone==true);
else
header("location:login");


//retrieving data from wallet relation
$walletdata = mysqli_query($conn,"SELECT * from wallet where user_id = $id");
$walletresult = mysqli_fetch_assoc($walletdata);


?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>recharge</title>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"/>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" />
         <!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>


    <style>
        *{
                margin: 0;
            }
            .u-div{
                height: 3.5em;
                background-color: #0081FF;
                width: 100%;
                position: absolute;
            }
            .btn{
                width: 20%;
                height: 3.2em;
                background-color: white;
                border: none;
                border-radius: 5px;
                font-weight: bold;
            }
            .in-div{
            margin-left: 20px;
            animation-name: anim;
            animation-duration: 0.7s;
            animation-direction: alternate;
            
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
        .rdio
        {
            margin-left: 10px;
            height: 25px;
            width: 25px;
        }
        @keyframes anim
        {
            from{opacity: 0;} to{opacity: 1;}
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
      
      
      /*animation for the modal*/
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
    
    .modal-header
    {
        padding: 20px 20px;
        background-color: #0081FF;
        color: white;
        width:100%;
        border:3px solid #0081FF;
        display:block;
    }
    .modal-input
    {
       width: 85%;
        height: 2em;
       
        border: none;
        text-indent: 10%;
        text-decoration: none;
        outline: none;
    }
    </style>
    
    <script>
      var count=0;
      function amount()
      {
          if(count==1){
          document.getElementById("amt").value ="100";
          }
        
          else if(count==2){
          document.getElementById("amt").value ="300";
          }
        
          else if(count==3){
          document.getElementById("amt").value ="500";
          }
        
          else if(count==4){
          document.getElementById("amt").value ="1000";
          }
        
          else if(count==5){
          document.getElementById("amt").value ="2000";
          }
        
          else if(count==6){
          document.getElementById("amt").value ="5000";
          }
        
          else if(count==7){
          document.getElementById("amt").value ="10000";
          }
          
          else if(count==8){
          document.getElementById("amt").value ="50000";
          }
      }
 
 var infoDialogStatus=0;
function infoDialog()
{
    if(infoDialogStatus==1)
    document.getElementById("infoDialog").style.display="block";
    
    else
    document.getElementById("infoDialog").style.display="none";
    
    document.getElementById("actual_name").value="";
    document.getElementById("mobile").value="";
    document.getElementById("upi").value="";

}
    </script>
    <script>
        function goBack(){
            window.history.back();
        }
        
         //function to exit the popup
            function exitPop()
            {
                document.getElementById("popup").style.display="none";
            }
    </script>
</head>

<body style="background-color: #f1f1f1; color: #333;">
    
    
    <!--pop up div-->
    <div id="popup" class="modal">
        <div class="modal-content">
        <center><h4 style="margin:10px">Fail</h4>
        <p id="errorMessage"></p>
        <hr>
        <div onclick="exitPop()" class="modal-btn">OK</div>
        
        </center>
        </div>
    </div>
    
  
    <!--info dialog for getting upi-->
    <div id="infoDialog" class="modal">
        <div class="modal-content">
        <div class="modal-header"></div>
        <div>
            <br>
            <div>
                

            </div>
            <i style="margin-left: 5%;" class="fal fa-user-alt"></i> <input id="actual_name"   class="modal-input"  type="text"   placeholder="  Actual Name"  autocomplete="off">
            <hr>
            
            <i  style="margin-left: 5%;" class="fal fa-mobile"></i>   <input id="mobile"  class="modal-input" type="text" placeholder="Mobile No." autocomplete="off">
            
            <hr>
            <i   style="margin-left: 5%;" class="fab fa-amazon-pay"></i>    <input id="upi" class="modal-input" type="text" placeholder="UPI" autocomplete="off">
            <hr>
        </div>
               <p style="text-align:right;">
                   <button id="continue" class="modal-btn" style="float:right;color:#0081FF;">CONTINUE</button>
                   <button class="modal-btn" style="float:right;color:grey;" onclick="infoDialogStatus=0;infoDialog();">CANCEL</button>
                   </p>

    </div>
    </div>
    
    <div class="u-div">
        <div onclick="goBack()" style="margin: 12px;color: white;position: absolute;font-size: 20px;" >
            <span> <i onclick="goBack()" class="far fa-chevron-left"></i>&nbsp;&nbsp;Reacharge </span>
            
        </div>
        <div onclick="location.href = 'recharge_rec';" style="color: white;font-size: 20px;margin-right: 10px;margin-top: 14px;">
            <i style="float: right;" class="fal fa-bars"></i>
            <i  style="float: right;" class="far fa-ellipsis-v"></i> 
            

        </div>
    </div>
    <br>
    <br>
    <br>
    <br>
    <center>
    <div>
        <span style="color:black;font-size: 20px;">Balance:₹<?php echo $walletresult['available_balance']; ?></span>
    </center>
   
    <hr style="background-color: rgb(206, 194, 194) ;" >
    </div>
    <center>
        <div style="margin-top: 10px;color: rgb(158, 111, 158);">
            <div style="margin-top: 22.5px;margin-left: 11%;position: absolute;font-size: 20px;">
                <i class="fa fa-rupee-sign"></i>
    
            </div>
    <div style="margin-top: 10px;">
        <input autocomplete="off" id="amt" style="width: 85%;height: 4em;border-radius: 40px;border: none;text-indent: 10%;text-decoration: none;outline: none;" type="text" placeholder="Enter Recharge Amount">
    </div>
    <br>
    <div>
    <button onclick="count=1;amount();" class="btn">100</button>
    &nbsp&nbsp&nbsp<button onclick="count=2;amount();" class="btn">300</button>
    &nbsp&nbsp&nbsp<button onclick="count=3;amount();" class="btn">500</button>
    &nbsp&nbsp&nbsp<button onclick="count=4;amount();" class="btn">1000</button>
    <br>
    <br>
    <button onclick="count=5;amount();" class="btn">2000</button>
    &nbsp&nbsp&nbsp<button onclick="count=6;amount();" class="btn">5000</button>
    &nbsp&nbsp&nbsp<button onclick="count=7;amount();" class="btn">10000</button>
    &nbsp&nbsp&nbsp<button onclick="count=8;amount();" class="btn">50000</button>
    </div>
</center>
<br>
<div style="background-color: white;">
    <div style="margin-left: 10px;margin-right: 10px;">
    <span style="font-size: 18px;color: grey;">Tips:Please Contact xxxxxx if you have any questioin about the order or payment faliure</span>

    <br>
    <br>
    <input class="rdio" value="upi" type="radio" name="gateway" checked> <span style="float: right;margin-right: 20px;font-size: 20px;">UPI Payment</span>
    <br>
   
    <hr>
    
    <input class="rdio" value="bank" type="radio"  name="gateway"> <span style="float: right;margin-right: 20px;font-size: 20px;">Bank Payment</span>
    <br>
    <br>
</div>
</div>
<br>
<br>
<center>
<div>
    <button onclick="infoDialogStatus=1;infoDialog();" style="background-color: #0081FF;width: 50%;height: 3.6em;border-radius: 5px;border: none;color: white;font-weight: bold;font-size: 15px;">Recharge</button>
</div>
</center>


<script>
    $('#continue').click(function(){

			var amt = $('#amt').val();
			var ptype = $(".rdio:checked").val();
            var name= $('#actual_name').val();
			var mobile= $('#mobile').val();
            var upi= $('#upi').val();
            
			$.ajax({
				url: "rechargeHandler.php",
				method: "post",
				data: {amt:amt,ptype:ptype,name:name,mobile:mobile,upi:upi},
				dataType: "text",
				success: function(data){
						if (data == "success") {
                            window.location.href='recharge_redirect';
                        }

						else if(data=="fill all fields")
						{
							document.getElementById("errorMessage").innerHTML="Please Fill All The Fields";
								document.getElementById("infoDialog").style.display="none";
							document.getElementById("popup").style.display="block";
						

						}

						else if(data=="amount must graeter than 100")
						{
							document.getElementById("errorMessage").innerHTML="Ammount Must Be Greater Than 100";
								document.getElementById("infoDialog").style.display="none";
							document.getElementById("popup").style.display="block";

						}
						
						
						else if(data=="no merchant available")
						{
							document.getElementById("errorMessage").innerHTML="No Merchant Available!Please Try Again Later.";
								document.getElementById("infoDialog").style.display="none";
							document.getElementById("popup").style.display="block";
						

						}
						

						else{

                            document.getElementById("errorMessage").innerHTML="Something Went Wrong:(";
                            	document.getElementById("infoDialog").style.display="none";
							document.getElementById("popup").style.display="block";					
							}
				}
			});
					

	}); 
</script>





<br><br><br><br>

 <div class="footer"> 
        <center>
            <button onclick="location.href='index.php'" style="float:left;outline:none;" class="footer_btn"><i id="f_home"  class="fa fa-home" style="font-size:25px;color:#696969;color:grey"></i></button>
            <button  onclick="location.href='/insert/my_account'" style="outline:none;"  class="footer_btn"><i id="f_my" class="far fa-search" style="font-size:25px;color:#696969;color:grey"></i></button>
            
            <button  onclick="location.href='win'" style="outline:none;margin-left: 18%;"  class="footer_btn"><i id="f_my" class="far fa-trophy-alt" style="font-size:25px;color:#696969;color:grey"></i></button>
            <button  onclick="location.href='home'" style="float:right;outline:none;"  class="footer_btn"><i id="f_my" class="fa fa-user" style="font-size:25px;color:#696969;color:grey"></i></button>
        </center>
          </div>
</body>
</html>