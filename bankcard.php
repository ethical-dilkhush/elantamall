<?php
  session_start();
  include("connection.php");
  error_reporting(0);

  $userphone = $_SESSION['phonenumber'];
 
if($userphone==true);
else
header("location:login");


  $id = $_SESSION['id'];
  $q_bank_cards = "SELECT * from bank_cards where wallet_id = $id ";
  $run_bank_cards = mysqli_query($conn,$q_bank_cards);
  $total_rows_found = mysqli_num_rows($run_bank_cards);

?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>added bank card</title>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"/>
     <!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <style>
        *{
            margin: 0;
        }
        .u-div{
            height: 3.2em;
            background-color: #0081FF;
            width: 100%;
        }
        .btn{
            margin: 8px;
            height: 3.3em;
            width: 11em;
            border-radius: 5px;
            border: 0ch;
            box-shadow: 1px 1px #888888;
            padding: 0ch;
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
      
      .modal-heading
      {
          width:100%;
          height:auto;
          color:black;
          background-color:white;
          border-radius:10px;
          margin:0;
          
      }
      .modal-button
      {
        background:none;
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
      
      
        @keyframes animatecenter
        {
            from {100%; opacity:0}
            to {50%; opacity:1}
        }
        
    .success-modal {
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
    //on cancel button click exit the apply dialog box
        function exitDialog()
        {
            document.getElementById("applyDialog").style.display="none";
            document.getElementById("amt").value="";
        }
        
        //on apply to balance click show the dialog box
        function applyBalance()
        {
            document.getElementById("applyDialog").style.display="block";
            document.getElementById("amt").value="";
        }
        
        //apply all button fuction to aplly all the bonus 
        function applyAll()
        {
            var data=document.getElementById("bonus").innerHTML;
            document.getElementById("amt").value=data;
        }
        
        //to exit the error message pop up
        function exitPop()
        {
          document.getElementById("popup").style.display="none";
        }
    </script>
</head>
<body style="background-color: #f1f1f1; color: #333;">
    <!--Apply bonus Modal-->
    <div id="applyDialog" class="modal">
        <div class="modal-content">
            <div class="modal-heading">
               <h3 style="margin:10px">Apply To Balance</h3>
            </div>
            <br>
            <input id="amt" type="text">
            <hr>
            <br>
            <center><button onclick="applyAll()" style="margin:10px;background-color:#E0E0E0" class="modal-button">Apply All</button></center>
              <p style="text-align:right;">
                  <button id="confirm" class="modal-button" style="float:right;color:#0081FF;">CONFIRM</button>
                  
                  <button class="modal-button" style="float:right;color:grey;" onclick="exitDialog();">CANCEL</button>
              </p>
        </div>
    </div>
    
    <!--error Message Popup-->
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
    
    
    
    <center>
    <div class="u-div">
        <div  onclick="window.history.back();" style="margin: 10px;color: white;position: absolute;font-size: 18px;" >
            <span> <i class="far fa-chevron-left"></i>&nbsp&nbspBank Card</span>
            
        </div>
         <div onclick="location.href = 'bank';" style="color: white;font-size: 20px;margin-right: 10px;">
            <i style="float: right;margin-top:14px;" class="fal fa-plus"></i>
             </div>
    </div>
    
<?php
  if($total_rows_found==0) 
  {
    echo "<center style='margin:5%;color:black'>No Data Found!</center>";
    $button_visibility ="hidden";
  }

  else
  {
    
    while($row = mysqli_fetch_array($run_bank_cards))
    {
  
      echo "<br>";
      echo "<table style='margin:%;color:black;'>";
    
      echo "<tr>";
      echo "<td>";
      ?>
    <i style="color:black;" class="fa fa-credit-card"></i>

      <?php
      echo "</td>";

      echo "<td>";
      echo "&emsp;&emsp;".($row[1]);  // name
      echo "</td>";
      
      echo "<td>";
      echo "&emsp;".($row[4]);  // upi
      echo "</td>";

      echo "<td>";
      echo "&emsp;&emsp;&emsp;";
      echo "</td>";      

       echo "<hr style='color:grey'>";

      echo "</tr>";
      

      echo "</table>";
      
    }           
  }      

?>


<script>
function openLink()
{
    var link=document.getElementById("link").innerHTML;
    window.open(link,"_blank");
}
    function level1()
    {
        document.getElementById("hr1").style.visibility="";
        document.getElementById("hr2").style.visibility="hidden";
        document.getElementById("lvl2").style.color="black";
        document.getElementById("lvl1").style.color="#0081FF";

    }

    function level2()
    {
        document.getElementById("hr2").style.visibility="";
        document.getElementById("hr1").style.visibility="hidden";
        document.getElementById("lvl1").style.color="black";
        document.getElementById("lvl2").style.color="#0081FF";

    }
    
    
function copyElementText() {
    var text = document.getElementById('link').innerText;
    var elem = document.createElement("textarea");
    document.body.appendChild(elem);
    elem.value = text;
    elem.select();
    document.execCommand("copy");
    document.body.removeChild(elem);
    alert("UPI Copied Successfuly!!");
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
</body>
</html>