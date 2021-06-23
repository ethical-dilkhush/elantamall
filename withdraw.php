<?php
include("connection.php");
session_start();
error_reporting(0);

$userphone = $_SESSION['phonenumber'];
$key = $_SESSION['pass'];
$id = $_SESSION['id'];

if($userphone==true);
else
header("location:login");



$walletdata = mysqli_query($conn,"SELECT * from wallet where user_id = $id");
$walletresult = mysqli_fetch_assoc($walletdata);

$carddata = mysqli_query($conn,"SELECT * from bank_cards where wallet_id=$id");
$total_cards_found = mysqli_num_rows($carddata);

?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Elanta Mall</title>
     <!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />

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
            #icn{
            color: rgb(158, 111, 158);
            font-size: 20px;
            margin-left: 8px;
        }
        .l-txt{
            margin: 10px;
            margin-top: 4%;
            font-size: 23px;
            position: relative;
        }
        .in-div{
            margin-left: 20px;
            animation-name: anim;
            animation-duration: 0.7s;
            animation-direction: alternate;
            
            
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
          width:390px;
          height:auto;
          color:grey;
          position:fixed;
          top:50%;
          left:50%;
          transform:translate(-50%,-50%);
          animation-name: animatecenter;
          animation-duration: 0.5s;
      }
      
       @keyframes animatecenter {
        from {-50%; opacity:0}
        to {50%; opacity:1}
        }
      
      
        
       .modal-btn{
        background:none;
        border: 0px ;
        padding: 7px 7px;
        text-align: center;
        text-decoration: none;
        font-size: 20px;
        border-radius: 5px;
        font-weight:bold;
        margin:8px;
        outline:none;
        width:100%;
        color:#0081FF;
        }
            
            
     /* The success modal*/
      .success-modal {
      z-index: 1; /* Sit on top */
      display:none;
      position:fixed;
      top:50%;
      left:50%;
      transform:translate(-50%,-50%);
      width:auto;
      height:auto;
      border-radius:5px;
      color:white;
      background-color:black;
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
            
            //function to count fee and to account amount
            function countFee()
            {
                var x = document.getElementById("amt").value;
                var fee=0;
                var toAcc=0;
                if(x<=500)
                {
                    document.getElementById("fee").innerHTML = "30";
                    toAcc=x-30;
                    document.getElementById("toAcc").innerHTML = toAcc;
                }
                
               else if(x<=1000 && x>500)
                {
                    document.getElementById("fee").innerHTML = "60";
                    toAcc=x-60;
                    document.getElementById("toAcc").innerHTML = toAcc;
                }
                
                else if(x<2000)
                {
                    document.getElementById("fee").innerHTML = "80";
                    toAcc=x-80;
                    document.getElementById("toAcc").innerHTML = toAcc;
                }
                
                else if(x>=2000)
                {
                    
                    fee=(x*4)/100;
                    document.getElementById("fee").innerHTML = fee;
                    toAcc=x-fee;
                    document.getElementById("toAcc").innerHTML = toAcc;
                }
            }
            
           //function to select card from drop down
            var cardNumber=0;
            function chooseCard()
            {
               
                if(cardNumber==0)
                {
                    <?php
                    $card1data = mysqli_query($conn,"SELECT * from bank_cards where wallet_id=$id LIMIT 1");
                    $card1=mysqli_fetch_array($card1data);
                    ?>
                    document.getElementById("card").innerHTML="<?php echo $card1['name']; echo " ".$card1['upi_id'];?>";
                    document.getElementById("drop").style.display="none";
                    flag=0;
                }
                
                else if(cardNumber==1)
                {
                    <?php
                    $card2data = mysqli_query($conn,"SELECT * from bank_cards where wallet_id=$id order by card_id DESC LIMIT 1");
                    $card2=mysqli_fetch_array($card2data);
                    ?>
                    document.getElementById("card").innerHTML="<?php echo $card2['name']; echo " ".$card2['upi_id']; ?>";
                    document.getElementById("drop").style.display="none";
                    flag=0;
                }
                
                else
                {
                    document.getElementById("card").innerHTML="Please Select Another card";
                    document.getElementById("drop").style.display="none";
                    flag=0;
                }
            }
            
            //function to exit the popup
            function exitPop()
            {
                document.getElementById("popup").style.display="none";
            }
    </script>
    <script>
        function goBack(){
            window.history.back();
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
    
    <!--success popup-->
    <div id="successPopup" class="success-modal">
<p style="text-align:center;margin:10px;font-size:20px" >
    success
</p>
</div>
    
    
    
    <div class="u-div">
        <div onclick="goBack()" style="margin: 12px;color: white;position: absolute;font-size: 20px;" >
            <span> <i class="far fa-chevron-left"></i>&nbsp&nbspWithdrawal</span>
            
        </div>
        <div style="color: white;font-size: 20px;margin-right: 10px;margin-top: 14px;">
            <i onclick="location.href='withdrawal_record'" style="float: right;" class="fal fa-bars"></i>
            <i onclick="location.href='withdrawal_record'" style="float: right;" class="far fa-ellipsis-v"></i> 
            

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
    <br>
    <hr style="background-color: rgb(206, 194, 194) ;" >
    </div>
    <center>
    <div style="margin-top: 7px;color: rgb(158, 111, 158);">
        <div style="margin-top: 23px;margin-left: 10%;position: absolute;font-size: 20px;">
             <i class="fa fa-rupee-sign"></i>

        </div>
        <input autocomplete="off" id="amt" oninput="countFee();" style="width: 85%;height: 4em;border-radius: 40px;border: none;text-indent: 8%;text-decoration: none;outline: none;" type="text" placeholder="Enter Withdrawal Amount Amount"/>
        
    </div>
</center>
<p style="margin:10px;color:grey;font-size:15px;"><span>Fee:</span><span id="fee"></span><span>,To Account:</span><span id="toAcc"></span></p>
    <br>
  <div>
      <span style="margin-left: 10px;font-size: 20px;">Payout:</span>
      <br>
      <br>
      <div  onclick="wallet();" class="l-div">
          <i  id="icn" class="fad fa-credit-card"></i>
        <span class="l-txt"><span id="card">Select Bank Card</span><i style="float: right;color: rgb(158, 111, 158);" class="far fa-chevron-down"></i></span>
    </div>
    <div id="drop" class="in-div" style="display: none;" >
        <hr>
        <?php
        //showing total number of cards
        $i=0;
        while($row=mysqli_fetch_array($carddata))
        {
            echo "<div onclick='cardNumber=$i;chooseCard();'><span class='l-txt'>$row[name] &nbsp $row[upi_id]</span></div>";
            echo "<hr>";
            $i++;
        }
        
        ?>
       <div onclick="location.href='bankcard'"> <span class="l-txt">Add Bank Card</span></div>
        <hr>
        
        
    </div>
    <br>

    <!--
    <div onclick="accsec();" class="l-div">
        <i id="icn" class="fas fa-fingerprint"></i>
        <span class="l-txt">upi withdrawal <i style="float: right;color: rgb(158, 111, 158);" class="far fa-chevron-down"></i></span>
    </div>
    <div class="in-div" id="drop1" style="display: none;" >
        <hr>
        <span   class="l-txt">select upi</span>
        <hr>
        <span   class="l-txt">Add upi</span>
        <hr>
        -->
        
        
    </div>

  </div>
  <br>
  
  <center>
    <div style="margin-top: 5px;color: rgb(158, 111, 158);">
        <div style="margin-top: 15px;margin-left: 10%;position: absolute;font-size: 20px;">
            <i class="far fa-unlock-alt"></i>

        </div>
    <div style="margin-top: 10px;">
        <input id="pwd" style="width: 85%;height: 3.5em;border-radius: 40px;border: none;text-indent: 9.5%;text-decoration: none;outline: none;" type="password" placeholder="Enter password">
    </div>
      <br>
<div>
    <button id="withdraw" style="background-color: #0081FF;width: 50%;height: 3.6em;border-radius: 5px;border: none;color: white;font-weight: bold;font-size: 15px;">Withdrawal</button>
</div>
</center>

<script>
    $('#withdraw').click(function(){

             var amt = $('#amt').val();
        	var pwd = $('#pwd').val();
			var card=document.getElementById("card").innerText;

			$.ajax({
				url: "withdrawHandler.php",
				method: "post",
				data: {amt:amt,pwd:pwd,card:card},
				dataType: "text",
				success: function(data){
                        
						if (data == "success") {
						    var pop= document.getElementById("successPopup");
						    pop.style.display="block";
						    	window.setTimeout(function(){
							pop.style.display="none";

						},1500)
						window.setTimeout(function(){
						    location.reload();
						},1000)
						
                        }

						else if(data=="fill all fields")
						{
							document.getElementById("errorMessage").innerHTML="Please Fill All The Fields";
							document.getElementById("popup").style.display="block";

						}

						else if(data=="select Card")
						{
							document.getElementById("errorMessage").innerHTML="Please Select Bank Card";
							document.getElementById("popup").style.display="block";

						}
						
						else if(data=="insufficient Balance")
						{
							document.getElementById("errorMessage").innerHTML="Insufficient Balance";
							document.getElementById("popup").style.display="block";

						}
						
						else if(data=="amount must be greater than 230")
						{
							document.getElementById("errorMessage").innerHTML="Amount Must Be Greater Than Rs.230";
							document.getElementById("popup").style.display="block";

						}
						else if(data=="wrong Password")
						{
							document.getElementById("errorMessage").innerHTML="Please Check Your Password!";
							document.getElementById("popup").style.display="block";

						}
						

						else{

                            document.getElementById("errorMessage").innerHTML="Something Went Wrong:(";
							document.getElementById("popup").style.display="block";					
							}
				}
			});
					

	}); 
</script>

<br><br><br><br>
 <div class="footer"> 
        <center>
            <button onclick="location.href='index'" style="float:left;outline:none;" class="footer_btn"><i id="f_home"  class="fa fa-home" style="font-size:25px;color:#696969;color:grey"></i></button>
            <button  onclick="location.href='#'" style="outline:none;"  class="footer_btn"><i id="f_my" class="far fa-search" style="font-size:25px;color:#696969;color:grey"></i></button>
            
            <button  onclick="location.href='win'" style="outline:none;margin-left: 18%;"  class="footer_btn"><i id="f_my" class="far fa-trophy-alt" style="font-size:25px;color:#696969;color:grey"></i></button>
            <button  onclick="location.href='home'" style="float:right;outline:none;"  class="footer_btn"><i id="f_my" class="fa fa-user" style="font-size:25px;color:#696969;color:grey"></i></button>
        </center>
          </div>
</body>
</html>