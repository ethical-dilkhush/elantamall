<?php
$r = $_GET['r_code'];
error_reporting(0);
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Elanta Mall</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://fonts.googleapis.com/css?family=Amaranth' rel='stylesheet'>
    <!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <!--font awasme cdn-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"/>

    
    <style>
        *{
    margin: 0;
    padding: 0;
    
        }
        body{
            font-family: Helvetica Neue,Helvetica,sans-serif
        }
        .header{
            background-color:#0081FF ;
        height: 3.5em;
        color: aliceblue;
            
    
        }
        .header-1{
     
            background-color:#0081FF ;
            height: 6em;
            color: aliceblue;
            font-family:  Helvetica,Helvetica,sans-serif;
           position: absolute;
           width: 100%;
            margin: 0;
            padding: 0;
            
         }
         .complain{
            width:200px;
            margin-left:22px;
            position: absolute;
            margin-top: 11px;
            
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
    <script>
        function goBack()
        {
            window.history.back();
        }
    </script>
</head>
<body style="background-color: #f1f1f1; color: #333;">
    <!--<div class="header">
        &nbsp;&nbsp;<i onclick="goBack();" class="fa fa-angle-left" style="font-size:20px; margin-top: 20px;">&nbsp;&nbsp;&nbsp;Register</i>
       
       
    </div>--->
    <div class="header">
        &nbsp;&nbsp;&nbsp;&nbsp;<i onclick="goBack();" class="fa fa-angle-left" style="font-size:24px; margin-top: 19.5px; position: absolute;"></i>
        <div style=" width:120px; margin-left:30px; margin-top: -5px;"><p>Register</p></div>
           
        </div>
    <br>
    <center> <div class="otp_msg"></div> </center>
    <center>
        <form method="Post">
             <div>
                <div style="position: absolute;margin: 12px;margin-left: 10px;"><i class="fa fa-mobile-phone" style="font-size:24px"></i></div>
                <!--mobile number input field -->
            <input type="text" id="mob"  maxlength="13" onfocus="this.value='+91'" style="width:100%;height: 50px;font-size: medium; outline:none; border: 0px outset white; border-radius: 25px;text-indent:30px" placeholder="Mobile Number" required autocomplete="off"><br><br>
        </div>
        <div style="position: absolute; float: right; right: 0; margin-right: 20px; margin-top: 10px;">
            <!--otp button-->
            <input type="button" id="sendotp"  class="btn btn-primary" value="OTP">
        </div>
                <div>
                    <div style="position: absolute;margin: 16px;margin-left: 10px;"><i class="fa fa-comment"></i></div>
                    <!--varification input field -->
                <input type="text" id="otp" maxlength="6" style="width:100%; outline:none;font-size: medium; height: 50px; border: 0px outset white; border-radius: 25px;text-indent:30px" placeholder="Verification code" required autocomplete="off"><br><br>
            </div>
        <div>
                <div style="position: absolute;margin: 17px;margin-left: 10px;"><i class="fa fa-key" aria-hidden="true"></i></div>
                 <!--password input field -->
            <input type="password" id="pwd" name="pass" maxlength="8" style="width:100%; height: 50px;font-size: medium; outline:none; border: 0px outset white; border-radius: 25px;text-indent:30px" placeholder="Enter Password" required autocomplete="off"><br><br>
        </div>
        <div>
            <div style="position: absolute;margin: 16px;margin-left: 10px;"><i class="fa fa-gift"></i></div>
             <!--reffer code input field -->
        <input value="<?php echo $r;?>" type="text"  id="rcode" name="reffral"  maxlength="12"style="width:100%; outline:none;font-size: medium; height: 50px; border: 0px outset white; border-radius: 25px;text-indent:30px" placeholder="Recommendation code" required autocomplete="off"><br><br>
    </div>
    <div style="background-color: white; height: 50px;">
        <input style="font-size:17px; margin-top: 15px; float: left; margin-left: 12px;" type="checkbox" checked required><span style=" float: left; margin-top:13px; margin-left: 8px;"> Agree<a href="#" style="text-decoration:none;"> privacy policy</a> </span>
    </div><br>
    <!-- Register button -->
<input type="button" id="verifyotp" class="btn btn-primary" value="Register">
    

    </form>
    
    <!--script section start-->
    		<script type="text/javascript">
			
		


				//send otp function
				function send_otp(mob){

						var ch = "send_otp";
						
					
							$.ajax({
							url: "otp_process.php",
							method: "post",
							data: {mob:mob,ch:ch},
							dataType: "text",
							success: function(data){
								if (data == 'success') {
									
										timer();
									$('.otp_msg').html('<div class="alert alert-success">OTP sent successfully</div>').fadeIn();
										
										window.setTimeout(function(){
										$('.otp_msg').fadeOut();
									},1000)
										

								}else{

									$('.otp_msg').html('<div class="alert alert-danger">Error in sending OTP</div>').fadeIn();
										
										window.setTimeout(function(){
										$('.otp_msg').fadeOut();
									},1000)
								
								}
							}

						});
				}
				//end of send otp function


				//send otp function

				$('#sendotp').click(function(){

					var mob = $('#mob').val();
					

					/*	if (validate_mobile(mob) == false) $('.otp_msg').html('<div class="alert alert-danger" >Enter Valid mobile number</div>').fadeIn(); else 	send_otp(mob);
					*/
						send_otp(mob);

						window.setTimeout(function(){
							$('.otp_msg').fadeOut();
						},1000)
				
					});

				//end of send otp function


			//verify otp function starts

			$('#verifyotp').click(function(){

						
						var ch = "verify_otp";
						var otp = $('#otp').val();
						var pwd = $('#pwd').val();
						var rcode= $('#rcode').val();
						var mob = $('#mob').val();

						$.ajax({
							url: "otp_process.php",
							method: "post",
							data: {otp:otp,ch:ch,pwd:pwd,rcode:rcode,mob:mob},
							dataType: "text",
							success: function(data){

									if (data == "success") {

										goto_login();
										
									}

									else if(data=="exist")
									{
										$('.otp_msg').html('<div class="alert alert-danger">Phone Aleady Exist</div>').show().fadeOut(4000);

									}

									else if(data=="wrong")
									{
										$('.otp_msg').html('<div class="alert alert-danger">Please Try Again Later!!</div>').show().fadeOut(4000);

									}
									
									else{

										$('.otp_msg').html('<div class="alert alert-danger">otp did not match</div>').show().fadeOut(4000);
									}
							}
						});
								

				});

			//end of verify otp function
			
			//goto login function
			function goto_login()
			{
				window.location.href="login.php"
			}

			//start of timer function

			function timer(){

					var timer2 = "00:31";
					var interval = setInterval(function() {


					  var timer = timer2.split(':');
					  //by parsing integer, I avoid all extra string processing
					  var minutes = parseInt(timer[0], 10);
					  var seconds = parseInt(timer[1], 10);
					  --seconds;
					  minutes = (seconds < 0) ? --minutes : minutes;
					  
					  seconds = (seconds < 0) ? 59 : seconds;
					  seconds = (seconds < 10) ? '0' + seconds : seconds;
					  //minutes = (minutes < 10) ?  minutes : minutes;
					  $('#sendotp').val(seconds);
					  $("#sendotp").attr("disabled", true);
					  //if (minutes < 0) clearInterval(interval);
					  if ((seconds <= 0) && (minutes <= 0)){
					  	clearInterval(interval);
						  $("#sendotp").removeAttr('disabled');
						  $('#sendotp').val('OTP');

					  } 
					  timer2 = minutes + ':' + seconds;
					}, 1000);

				}

				//end of timer


		


			function footer_home_color(){
  document.getElementById("f_home").style.color ="#2196f3";
  }

  function footer_my_color(){
  document.getElementById("f_my").style.color ="#2196f3";
  }

  function onlyNumberKey(evt) { 
            
          // Only ASCII charactar in that range allowed 
          var ASCIICode = (evt.which) ? evt.which : evt.keyCode 
          if (ASCIICode > 31 && (ASCIICode < 48 || ASCIICode > 57)) 
              return false; 
          return true; 
      } 
  function goBack() {
    window.history.back();
  }

  function goto_login(){
    window.location.href = "login.php";

  }

  function show_error(){
  document.getElementById("error_div").style.display ="block";
  }

  function check_num(){
  document.getElementById("check_div").style.display ="block";
  }

		</script>
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