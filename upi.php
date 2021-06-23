<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>upi</title>
    <link href='https://fonts.googleapis.com/css?family=Amaranth' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"/>
         <!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <style>
   *{
        margin: 0;
        padding:0;

    }
    body{
       font-family:  Helvetica Neue,Helvetica,sans-serif;
       font-size:smaller;
    }
    .header{

        background-color:#0081FF ;
        height: 3.5em;
        color: aliceblue;
        font-family:  Helvetica,Helvetica,sans-serif;
        position: relative;


    }
    .btn1{
        margin-top:17px;
        border: none;
        background-color: #007BEA;
        color: black;
        font-family:Arial, Helvetica, sans-serif;
        outline: none;
        font-size: small;
    }
    .btn2{
        margin-top:17px;
        border: none;
        background-color: #007BEA;
        color: white;
        font-family:Arial, Helvetica, sans-serif;
        outline: none;
        font-size: small;
        
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
        //function to exit the popup
        function exitPop()
        {
            document.getElementById("popup").style.display="none";
        }
        
        //goback function for going back
        function goBack()
        {
            window.history.back();
        }
    </script>
    
</head>
<body style="background-color: #f1f1f1; color: #333; ">
    
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

    <div class="header">
        &nbsp;&nbsp;&nbsp;&nbsp;<i onclick="goBack();" class="fa fa-angle-left" style="font-size:24px; margin-top: 16.5px; position: absolute;"></i>
        <div onclick="goBack();" style=" width:60px; margin-left:30px;"><p>Add UPI</p></div>
           
        </div>
    <center>
        <div style="background-color: #007BEA; height: 42px;">
            <button onclick="window.location.href='bank'" id="wt" class="btn1">Select Bank Card</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <button onclick="window.location.href='upi'" id="cmp" class="btn2">Select UPI</button>
        </div>

      
        <div style="height: 42px; background-color: white; margin-top:1px;">
            <input id="name" style="width: 100%; outline: none;font-size: small; border: 0px outset white;margin-top: 12px;text-indent:15px" type="text" placeholder="Actual Name" autocomplete="off">
        </div>
        <div  style="height: 42px; background-color: white; margin-top:1px;">
            <input id="upi" style="width: 100%; outline: none;font-size: small; border: 0px outset white; margin-top: 12px;text-indent:15px" type="email" placeholder="UPI Account" autocomplete="off">
        </div>
        <div style="height: 42px; background-color: white; margin-top:1px;">
            <input id="phone" style="width: 100%; outline: none;font-size: small; border: 0px outset white;margin-top: 12px;text-indent:15px" type="text" onfocus="this.value='+91'" placeholder="Mobile Number" autocomplete="off">
        </div>
        <div style="height: 42px; background-color: white; margin-top:1px;">
            <input id="email" style="width: 100%; outline: none;font-size: small; border: 0px outset white;margin-top: 12px;text-indent:15px" type="text" placeholder="Email" autocomplete="off">
        </div><br>
        <input id="addUpi" style="width: 170px; height: 45px; background-color: #0081FF; border-radius: 5px; border: none; color: #f1f1f1;" type="button" value="Continue">
</center> 

<script>
     $('#addUpi').click(function(){
            
			var name= $('#name').val();
			var ifsc= "null";
            var bank="null";
            var account=$('#upi').val();
            var phone=$('#phone').val();
            var email=$('#email').val();
            var ch='upi';
			$.ajax({
				url: "cardHandler.php",
				method: "post",
				data: {ch:ch,name:name,ifsc:ifsc,bank:bank,account:account,phone:phone,email:email},
				dataType: "text",
				success: function(data){
						if (data == "success") {
						    var pop= document.getElementById("successPopup");
						    pop.style.display="block";
						    	window.setTimeout(function(){
							pop.style.display="none";

						},1500)
						window.setTimeout(function(){
						   window.location.href='bankcard';
						},1000)
						
                        }

						else if(data=="fill all fields")
						{
							document.getElementById("errorMessage").innerHTML="Please Fill All The Fields";
							document.getElementById("popup").style.display="block";

						}

						else if(data=="You Can Add Only Two Cards")
						{
							document.getElementById("errorMessage").innerHTML="You Can Add Only Two Cards!";
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