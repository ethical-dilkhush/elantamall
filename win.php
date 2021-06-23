<?php
  session_start();
  include("connection.php");
  error_reporting(0); 

$userphone = $_SESSION['phonenumber'];
if($userphone==true)
{

}

else
{
  header("location:login");
}

  $id = $_SESSION['id'];
  $q_avail = "SELECT * from wallet where user_id = $id";
  $run_q_avail = mysqli_query($conn,$q_avail);
  $wallet_result = mysqli_fetch_assoc($run_q_avail);

  date_default_timezone_set("Asia/Kolkata");

  $h = date('H');
  $m = date('i');
  $s = date('s');

  $y = date('Y');
  $month = date('m');
  $day = date('d');
?>

<html>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>win</title>
    <link rel="icon" href="/img/site_logo.png" type="image/gif" sizes="32x32">
    <link rel="stylesheet" href="win.css">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href='https://fonts.googleapis.com/css?family=Amaranth' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css?family=Arbutus' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> 
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" /> 
    <script>

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

      /*recharge button color change on hover function*/
      function recharge_color(){
      document.getElementById("recharge1").style.color ="#954697";
      document.getElementById("recharge").src = "/img/recharge1.png";
      }

      function recharge_color1(){
      document.getElementById("recharge1").style.color ="black";
      document.getElementById("recharge").src = "/img/recharge.png";
      }

      function hr1(){
      document.getElementById("hr1").style.visibility ="";
      document.getElementById("hr2").style.visibility ="hidden";
      }

      function hr2(){
      document.getElementById("hr2").style.visibility ="";
      document.getElementById("hr1").style.visibility ="hidden";
      }






    </script>

    <!-- style section start -->
    <style>
      /*input fields icon color change to #954697*/
      /*text-indent:30px; to left the text in text fields*/
      /* yellow color for icons #FFD700*/


      /* The Modal (background) */
      .modal {
      z-index: 1; /* Sit on top */
      display:none;
      position:fixed;
      top:0;
      left:0;
      width:100%;
      height:100%;
        overflow: auto; /* Enable scroll if needed */
      background-color: rgb(0,0,0); /* Fallback color */
        background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
      }

      /* Modal Content */
      .modal-content {
        position: fixed;
        background-color: white;
        margin: auto;
         top:50%;
         left:50%;
        transform:translate(-50%,-50%);
        border-radius:12px;
        width: 320px;
         height:auto;
        animation-name: animatecenter;
        animation-duration: 0.5s
      }


      /* The Close Button */
      .close {
        color: white;
        float: right;
        font-size: 28px;
        font-weight: bold;
      }

      .close:hover,
      .close:focus {
        color: #000;
        text-decoration: none;
        cursor: pointer;
      }

      .modal-header {
        padding: 2px 10px;
        background-color: #5cb85c;
        color: white;
      }

      .modal-body {padding: 2px 16px;}

      @keyframes animatecenter {
        from {-50%; opacity:0}
        to {50%; opacity:1}
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

      /*increment/decrement buttons in modal*/
      .contract_btn{
      background:none;
        border: none;
        color: black;
        text-align: center;
        text-decoration: none;
        font-size: 15px;
      border-radius: 2px;
      margin:0px;
      height:38px;
      }
      .contract_btn:hover{ /*hower effect on bet buttons*/
      background:grey;
      color:black;
      }

      /*cancel & confirm button in modal*/
      .modal_footer_btn{
      background:black;
        border: none;
        color: yellow;
        padding: 10px 15px;
        text-align: center;
        text-decoration: none;
        font-size: 15px;
      border-radius: 2px;
      font-weight:bold;
      margin:5px;
      }
      .modal_footer_btn:hover{ /*hower effect on  buttons*/
      background:#181818;
      }
      
       .sbuttons {
  bottom: 8%;
  position: fixed;
  margin: 1em;
  right: 0;
  background:white;
  border-radius:50%;
}


.sbuttons:hover{
  opacity: 1;
  width: 60px;
  height: 60px;
  margin: 15px auto 0;
}
table {
  border-collapse: collapse; 
  width: 100%;
}

th,td {
    color:grey;
  padding: 6px;
  text-align:center;
  border-bottom: 1px solid #ddd;
}


    </style>

  </head>
<body style="height:100%;font-family: Roboto,sans-serif;overflow:auto;background-color:F5F5F5">

<!--header div -->
  <div class="header">
    <br>
    <b style="margin:20px;color:white;font-size:20px;">Available balance:&#8377; <?php echo $wallet_result['available_balance']; ?></b><br></b><br></b>

    <button onclick="location.href='recharge'" style="Margin-top:20px;position:relative;" class="recharge_button">Recharge</button>
    &nbsp
    <button onclick="rules()"  class="rules_btn">Read Rules</button>
  </div>

<!--parity sapre emered bcone and hr div -->

  <div style="width:100%;height:50px;margin-top:5px">
      <table>
  <tr>
    <th> <button onclick="location.href='win'" style="height:40px;width:50%;float:center;color:#2196f3;background:none;border:0px;font-weight:bold">Parity</button></th>
    <th><button onclick="location.href='sapre_win'"  style="height:40px;width:50%;float:right;background:none;border:0px;font-weight:bold">Sapre</button></th>
  <th><button onclick="location.href='bcon_win'"  style="height:40px;width:50%;float:right;background:none;border:0px;font-weight:bold">Bcone</button></th>
  <th><button onclick="location.href='emerd_win'"  style="height:40px;width:50%;float:right;background:none;border:0px;font-weight:bold">Emerd</button></th>
  
  </tr>
  </table>
    
    </div>
    
    <hr id="hr1" style="margin-top:0px;color:yellow;border: 1px solid #2196f3;width:25%;float:left;">
  <hr id="hr2" style="visibility:hidden;margin-top:0px;color:yellow;border: 1px dashed yellow;width:48%;float:right;">

<!-- container for timer and related text -->
<div class="timer_holder">
    <!--Period number holder -->
    <div style="height:75px;width:50%;background:none;float:left">
    <b style="font-size:20px;color:yellow;">&#127942;</b><i style="font-size:15px;">Period</i><br>
    <i id="round" style="font-size:30px;margin-left:10px;margin-top:0"> </i>
    </div>

   <!--countdown text holder -->
   <div style="height:75px;width:50%;background:none;float:right">
    <i style="font-size:15px;float:right;margin-right:5px">Count Down</i><br>

    <!--cloak holder holder -->
    <div style="float:right;margin-top:0px;width:100%;height:30px">
    <span style="text-align:center;border-radius:4px;height:100%;width:50px;background:none;float:right;margin-right:5px;"><i id="mins" style="font-size:30px;"></i></span>


    <span style="text-align:center;border-radius:4px;height:100%;width:20px;float:right;margin-right:5px;"><b style="font-size:30px;">:</b></span>
    <span  style="text-align:center;border-radius:4px;height:100%;width:50px;background:none;float:right;margin-right:5px;"><i id="secs" style="font-size:30px;"></i></span>


    </div>
    </div>
</div>
<!-- color button holder -->
 <div class="color_holder">
    <button id="join_green" onclick="num=11;join_green()" style="margin:10px;float:left;position:relative;" class="green_button">Join Green</button>
    <button id="join_voilet" onclick="num=12;join_voilet()" style="margin-left:6%;margin-right:6%;position:relative" class="voilet_button">Join Voilet</button>
    
    <button id="join_red" onclick="num=13;join_red()" style="margin:10px;float:right;position:relative;" class="red_button">Join Red</button>
 </div>

<!-- paragraph which holds the number buttons -->
<p style="text-align:center;margin-left:1%;margin-top:0">

  <button id="0" onclick="num=0;join_0();"  style="outline:none;  background-image: linear-gradient(#E54D42, #6739B6);
" class="bet_btn">0</button>

  <button id="1" onclick="num=1;join_1();" style="outline:none;background-color:#39B54A;" class="bet_btn">1</button>

  <button id="2" onclick="num=2;join_2();"  style="outline:none;background-color:#E54D42;" class="bet_btn">2</button>

  <button id="3" onclick="num=3;join_3();"  style="outline:none;background-color:#39B54A;" class="bet_btn">3</button>

  <button id="4" onclick="num=4;join_4();"  style="outline:none;background-color:#E54D42;" class="bet_btn">4</button>

  <button id="5" onclick="num=5;join_5();"  style="outline:none; background-image: linear-gradient(#39B54A, #6739B6);" class="bet_btn">5</button>

  <button id="6" onclick="num=6;join_6();"  style="outline:none;background-color:#E54D42;" class="bet_btn">6</button>

  <button id="7" onclick="num=7;join_7();"  style="outline:none;background-color:#39B54A;" class="bet_btn">7</button>

  <button id="8" onclick="num=8;join_8();"  style="outline:none;background-color:#E54D42;" class="bet_btn">8</button>

  <button id="9" onclick="num=9;join_9();"  style="outline:none;background-color:#39B54A;" class="bet_btn">9</button>
</p>

  <!--parity record -->
<div style="width:100%;height:50px;margin-top:0px;background:white">
    <p style="text-align:center;margin-left:1%;">
    <br>
    <i style="font-size:15px;margin:10px;">  <i id="f_my" class="far fa-trophy-alt" style="font-size:25px;color:#696969;color:grey"></i> Parity Record</i>
    </p>
    </div>

    <?php
  
  $parity = mysqli_query($conn,"SELECT * FROM parity_records order by period DESC LIMIT 10");
  $parity_records = mysqli_num_rows($parity);

  if($parity_records==0)
  {
    echo "<center style='color:black'> NO DATA FOUND!</center>";
  }

  else
  {
      ?>
      <div style="overflow-x:auto;background-color:white;box-shadow:0px 1px 0px 0px grey">
    <center>
      <table>
      <tr>

      <th>
      &nbsp;&nbsp;&nbsp;Period
      </th>

      <th>
      &nbsp;Price
      </th>

      <th>
      &nbsp;Number
      </th>

      <th>
      Color
      </th>
    
      </tr>

<?php
$s=1;
    while($row = mysqli_fetch_array($parity))
    {

      echo "<tr>"; 

      echo "<td>";
      echo "&emsp;".($row['period']);  // period
      echo "</td>";


      echo "<td>";
      $pr = (rand(3000,5000));  // price
      $fin = $pr.$row['number'];
      echo "&emsp;".$fin;
      echo "</td>";

      echo "<td>";
      echo "&emsp;".($row['number']);  // Number
      echo "</td>";

      echo "<td>";
      if($row['color']=='11')// color
      {
      ?>
    <img style="float:center;height:15px;width:15px" src="/assets/green.svg" >
    <?php
      //echo "Green";
      }
      else if($row['color']=='13')
      {
          ?>
    <img style="float:center;height:15px;width:15px" src="/assets/red.svg" >
    <?php
      }

      else if($row['color']=='14')
      {
       
         ?>
    <img style="float:center;height:15px;width:15px" src="/assets/red.svg" >
    <img style="float:center;height:15px;width:15px" src="/assets/voilet.svg" >
    <?php
      }
      
      else if($row['color']=='15')
      {
           ?>
    <img style="float:center;height:15px;width:15px" src="/assets/green.svg" >
    <img style="float:center;height:15px;width:15px" src="/assets/voilet.svg" >
    <?php
      }
      echo "</td>";
    

      echo "</tr>";
      $s++;
    }
    echo "</table>";  
    echo "</div>";
      
  }         
  
      
?>
</center>
</div>
    

<!-- my parity record -->
<br>

<div style="width:100%;height:40%;margin-top:0px;background:white;overflow:scroll">
    <br>

  <center>My Parity Record</center>
        
 <hr>
  <?php
  
    $selecting = mysqli_query($conn,"SELECT * FROM transactions where wallet_id ='$id'  && section=1 order by transaction_id DESC ");
    $records = mysqli_num_rows($selecting);

    if($records==0)
    {
      echo "<center style='color:black'> NO DATA FOUND!</center>";
    }

    else
    {
        ?>
                    


        <div style="overflow-x:auto;">
                <table style='width:100%;'>
      <tr>

      <th>
      Period
      </th>

      <th>
      Select
      </th>

      <th>
       Bet
      </th>

      <th>
      Status
      </th>
    
      </tr>

   
<?php
      while($row = mysqli_fetch_array($selecting))
      {
       // echo "<table style='width:100%;align=”justify;border:2px;”'>";
      //echo "<hr style='color:grey'>";

        echo "<tr style='border-bottom: 1px solid black;'
>"; 

        echo "<td>";
        echo ($row['period']);  // period
        echo "</td>";

        echo "<td>";
        if($row['selection']=='11')// color
        {
        ?>
    <img style="float:center;height:15px;width:15px" src="/assets/green.svg" >
    <?php
        }
        else if($row['selection']=='12')
        {
         ?>
    <img style="float:center;height:15px;width:15px" src="/assets/voilet.svg" >
    <?php
        }

        else if($row['selection']=='13')
        {
           ?>
    <img style="float:center;height:15px;width:15px" src="/assets/red.svg" >
    <?php

        }
        else
        {
        echo ($row['selection']); 
        } 
        echo "</td>";

        echo "<td>";
        echo "&emsp;&emsp;".($row['amount']);  // amt
        echo "</td>";

        echo "<td>";// status
        if($row['status']=='0')
        {
          echo "wait";
        }
        else if($row['status']=='Loss')
        {
        echo"<i style='color:red'>Loss</i>"; 
        } 
        
        else if($row['status']=='win')
        {
        echo "<i style='color:green'>Win</i>"; 
        } 
        echo "</td>";


        echo "</tr>";



      }
               echo "</table>"; 

      echo "</div>";
        
    }         
    
        
?>
</center>
</div>


<!-- The rules model -->
<div id="rulesmodal" class="modal">
    <div class="modal-content">
        <center><h1 id="pop_heading" style="color:grey">Rules of Guess</h1></center>
      
      <div class="modal-body" style="background-color:#F5F5F5"><br>
  3 minutes 1 issue, 2 minutes and 30 seconds to order,30seconds to show the lottery result.<br>
  1.JOIN GREEN: if the result shown 1,3,7,9, you will get (100*1.8)180, if the result shown 5, you will get (100*1.5) 150
  <br>
  2.JOIN RED: if the result shown 2,4,6,8, you will get (100*1.8)180,if the result shown 0, you will get (100*1.5) 150
   <br>
  3.JOIN VOILET: if the result shown 0 or 5, you will get (100*4.3)430
   <br>
  4.SELECT NUMBER: if the result is the same as the selection , you will get(100*8)800
  


  <div style="float:right;width:99%;height:auto;background:;"> 
  
  <button onclick="exit_pop()" style="float:right;outline:none;color:white;background-color:#F5F5F5;color:#2196f3" class="modal_footer_btn">CLOSE</button>
  
  </div>
  
      </div>
    </div>

</div>



<!-- The Modal 0 -->
<div id="myModal0" class="modal">
    <!-- Modal content -->
    <div class="modal-content">
      <div class="modal-header" style="background:#2196f3" id="modal-header">
        <h2 id="pop_heading" style="color:black">Select 0 </h2>
      </div>
      <div class="modal-body"><br>
  <b>Contract Money</b>
  <br>

  <!-- select amount buttons --> 
  <center>
  <input type="button" style="width:auto;outline:none;"  onclick="ind=10;document.getElementById('bet_amt').value ='10';" class="contract_btn" value="&#8377;10">

  <input type="button" style="width:auto;outline:none;margin-left:1%;margin-top:30px;" onclick="ind=100;document.getElementById('bet_amt').value ='100';"  class="contract_btn" value="&#8377;100">

  <input type="button" style="width:auto;outline:none;margin-left:1%;margin-top:30px;" onclick="ind=1000;document.getElementById('bet_amt').value ='1000';"  class="contract_btn" value="&#8377;1000">

  <form action="" method="POST">
      
      <input type="button" style="background-color:#F0F0F0;color:black;width:auto;outline:none;"  class="contract_btn" onclick="minus0();"  value="&minus;">
      
  <input id="bet_amt" value="10" name="bet" type="text" style="width:50%;height:40px;outline:none;color:black;text-align:center;font-size:30px;box-sizing:border-box;border:2px black;" readonly>
  
  <input type="button" style="background-color:#F0F0F0;color:black;width:auto;outline:none;margin-left:0px;"  class="contract_btn" onclick="plus0();"  value="&plus;">
  </center>

  <br><br>


  <input type="checkbox" name="selection" checked value="0" >
  <label>I agree</label><a style="text-decoration:none;font-size:14px;" href=""> PRESALE RULE</a>

  <br><br>

  <div style="float:right;width:99%;height:auto;background:;"> 
  <input  type="submit" name="confirm"  style="float:right;outline:none;color:#2196f3;background-color:#E0E0E0" class="modal_footer_btn" value="CONFIRM"> 
  <button onclick="exit_pop()" style="float:right;outline:none;color:grey;background-color:#E0E0E0" class="modal_footer_btn">CANCEL</button>
  </form>
  </div>
  <br><br><br>
      </div>
    </div>

</div>


<!-- The Modal 1 -->
<div id="myModal1" class="modal">

    <!-- Modal content -->
    <div class="modal-content">
    <div class="modal-header" style="background:#2196f3" id="modal-header">
        <h2 id="pop_heading" style="color:black">Select 1 </h2>
      </div>
      <div class="modal-body"><br>
<b>Contract Money</b>
  <br>
  <br>

  <!-- select amount buttons --> 
  <center>
  <input type="button" style="width:auto;outline:none;"  onclick="ind=10;document.getElementById('bet_amt1').value ='10';" class="contract_btn" value="&#8377;10">

  <input type="button" style="width:auto;outline:none;margin-left:1%;margin-top:30px;" onclick="ind=100;document.getElementById('bet_amt1').value ='100';"  class="contract_btn" value="&#8377;100">

  <input type="button" style="width:auto;outline:none;margin-left:1%;margin-top:30px;" onclick="ind=1000;document.getElementById('bet_amt1').value ='1000';"  class="contract_btn" value="&#8377;1000">

  <form action="" method="POST">
      
      <input type="button" style="background-color:#F0F0F0;color:black;width:auto;outline:none;"  class="contract_btn" onclick="minus1();"  value="&minus;">
      
  <input id="bet_amt1" value="10" name="bet" type="text" style="width:50%;height:40px;outline:none;color:black;text-align:center;font-size:30px;box-sizing:border-box;border:2px black;" readonly>
  
  <input type="button" style="background-color:#F0F0F0;color:black;width:auto;outline:none;margin-left:0px;"  class="contract_btn" onclick="plus1();"  value="&plus;">
  </center>

  <br><br>


  <input type="checkbox" name="selection" checked value="1" >
  <label>I agree</label><a style="text-decoration:none;font-size:14px;" href=""> PRESALE RULE</a>

  <br><br>

  <div style="float:right;width:99%;height:auto;background:;"> 
    <input  type="submit" name="confirm"  style="float:right;outline:none;color:#2196f3;background-color:#E0E0E0" class="modal_footer_btn" value="CONFIRM"> 
  <button onclick="exit_pop()" style="float:right;outline:none;color:grey;background-color:#E0E0E0" class="modal_footer_btn">CANCEL</button>
  </form>
  </div>
  <br><br><br>
      </div>
    </div>

</div>



<!-- The Modal2 -->
<div id="myModal2" class="modal">

      <!-- Modal content -->
      <div class="modal-content">
      <div class="modal-header" style="background:#2196f3" id="modal-header">
          <h2 id="pop_heading" style="color:black">Select 2 </h2>
        </div>
        <div class="modal-body"><br>
<b>Contract Money</b>
    <br>
    <br>

    <!-- select amount buttons --> 
    <center>
  <input type="button" style="width:auto;outline:none;"  onclick="ind=10;document.getElementById('bet_amt2').value ='10';" class="contract_btn" value="&#8377;10">

    <input type="button" style="width:auto;outline:none;margin-left:1%;margin-top:30px;" onclick="ind=100;document.getElementById('bet_amt2').value ='100';"  class="contract_btn" value="&#8377;100">

    <input type="button" style="width:auto;outline:none;margin-left:1%;margin-top:30px;" onclick="ind=1000;document.getElementById('bet_amt2').value ='1000';"  class="contract_btn" value="&#8377;1000">

    <form action="" method="POST">
        
         <input type="button" style="background-color:#F0F0F0;color:black;width:auto;outline:none;"  class="contract_btn" onclick="minus2();"  value="&minus;">
         
    <input id="bet_amt2" value="10" name="bet" type="text" style="width:50%;height:40px;outline:none;color:black;text-align:center;font-size:30px;box-sizing:border-box;border:2px black;" readonly>
    
    <input type="button" style="background-color:#F0F0F0;color:black;width:auto;outline:none;margin-left:0px;"  class="contract_btn" onclick="plus2();"  value="&plus;">
    </center>

    <br><br>


    <input type="checkbox" name="selection" checked value="2" >
    <label>I agree</label><a style="text-decoration:none;font-size:14px;" href=""> PRESALE RULE</a>

    <br><br>

    <div style="float:right;width:99%;height:auto;background:;"> 
    <input  type="submit" name="confirm"  style="float:right;outline:none;color:#2196f3;background-color:#E0E0E0" class="modal_footer_btn" value="CONFIRM"> 
    <button onclick="exit_pop()" style="float:right;outline:none;color:grey;background-color:#E0E0E0" class="modal_footer_btn">CANCEL</button>
    </form>
    </div>
    <br><br><br>
        </div>
      </div>

</div>

<!-- The Modal 3-->
<div id="myModal3" class="modal">

      <!-- Modal content -->
      <div class="modal-content">
      <div class="modal-header" style="background:#2196f3" id="modal-header">
          <h2 id="pop_heading" style="color:black">Select 3 </h2>
        </div>
        <div class="modal-body"><br>
<b>Contract Money</b>
    <br>
    <br>

    <!-- select amount buttons --> 
    <center>
  <input type="button" style="width:auto;outline:none;"  onclick="ind=10;document.getElementById('bet_amt3').value ='10';" class="contract_btn" value="&#8377;10">

    <input type="button" style="width:auto;outline:none;margin-left:1%;margin-top:30px;" onclick="ind=100;document.getElementById('bet_amt3').value ='100';"  class="contract_btn" value="&#8377;100">

    <input type="button" style="width:auto;outline:none;margin-left:1%;margin-top:30px;" onclick="ind=1000;document.getElementById('bet_amt3').value ='1000';"  class="contract_btn" value="&#8377;1000">

    <form action="" method="POST">
        
        <input type="button" style="background-color:#F0F0F0;color:black;width:auto;outline:none;"  class="contract_btn" onclick="minus3();"  value="&minus;">
    <input id="bet_amt3" value="10" name="bet" type="text" style="width:50%;height:40px;outline:none;color:black;text-align:center;font-size:30px;box-sizing:border-box;border:2px black;" readonly>
    
     <input type="button" style="background-color:#F0F0F0;color:black;width:auto;outline:none;margin-left:0px;"  class="contract_btn" onclick="plus3();"  value="&plus;">
    </center>

    <br><br>


    <input type="checkbox" name="selection" checked value="3" >
    <label>I agree</label><a style="text-decoration:none;font-size:14px;" href=""> PRESALE RULE</a>

    <br><br>

    <div style="float:right;width:99%;height:auto;background:;"> 
    <input  type="submit" name="confirm"  style="float:right;outline:none;color:#2196f3;background-color:#E0E0E0" class="modal_footer_btn" value="CONFIRM"> 
    <button onclick="exit_pop()" style="float:right;outline:none;color:grey;background-color:#E0E0E0" class="modal_footer_btn">CANCEL</button>
    </form>
    </div>
    <br><br><br>
        </div>
      </div>

</div>

<!-- The Modal 4 -->
<div id="myModal4" class="modal">

      <!-- Modal content -->
      <div class="modal-content">
      <div class="modal-header" style="background:#2196f3" id="modal-header">
          <h2 id="pop_heading" style="color:black">Select 4 </h2>
        </div>
        <div class="modal-body"><br>
<b>Contract Money</b>
    <br>
    <br>

    <!-- select amount buttons --> 
    <center>
  <input type="button" style="width:auto;outline:none;"  onclick="ind=10;document.getElementById('bet_amt4').value ='10';" class="contract_btn" value="&#8377;10">

    <input type="button" style="width:auto;outline:none;margin-left:1%;margin-top:30px;" onclick="ind=100;document.getElementById('bet_amt4').value ='100';"  class="contract_btn" value="&#8377;100">

    <input type="button" style="width:auto;outline:none;margin-left:1%;margin-top:30px;" onclick="ind=1000;document.getElementById('bet_amt4').value ='1000';"  class="contract_btn" value="&#8377;1000">

    <form action="" method="POST">
        
          <input type="button" style="background-color:#F0F0F0;color:black;width:auto;outline:none;"  class="contract_btn" onclick="minus4();"  value="&minus;">
    <input id="bet_amt4" value="10" name="bet" type="text" style="width:50%;height:40px;outline:none;color:black;text-align:center;font-size:30px;box-sizing:border-box;border:2px black;" readonly>
    
     <input type="button" style="background-color:#F0F0F0;color:black;width:auto;outline:none;margin-left:0px;"  class="contract_btn" onclick="plus4();"  value="&plus;">
    </center>

    <br><br>


    <input type="checkbox" name="selection" checked value="4" >
    <label>I agree</label><a style="text-decoration:none;font-size:14px;" href=""> PRESALE RULE</a>

    <br><br>

    <div style="float:right;width:99%;height:auto;background:;"> 
    <input  type="submit" name="confirm"  style="float:right;outline:none;color:#2196f3;background-color:#E0E0E0" class="modal_footer_btn" value="CONFIRM"> 
    <button onclick="exit_pop()" style="float:right;outline:none;color:grey;background-color:#E0E0E0" class="modal_footer_btn">CANCEL</button>
    </form>
    </div>
    <br><br><br>
        </div>
      </div>

</div>


<!-- The Modal 5 -->
<div id="myModal5" class="modal">

      <!-- Modal content -->
      <div class="modal-content">
      <div class="modal-header" style="background:#2196f3" id="modal-header">
          <h2 id="pop_heading" style="color:black">Select 5 </h2>
        </div>
        <div class="modal-body"><br>
<b>Contract Money</b>
    <br>
    <br>

    <!-- select amount buttons --> 
    <center>
  <input type="button" style="width:auto;outline:none;"  onclick="ind=10;document.getElementById('bet_amt5').value ='10';" class="contract_btn" value="&#8377;10">

    <input type="button" style="width:auto;outline:none;margin-left:1%;margin-top:30px;" onclick="ind=100;document.getElementById('bet_amt5').value ='100';"  class="contract_btn" value="&#8377;100">

    <input type="button" style="width:auto;outline:none;margin-left:1%;margin-top:30px;" onclick="ind=1000;document.getElementById('bet_amt5').value ='1000';"  class="contract_btn" value="&#8377;1000">

    <form action="" method="POST">
          <input type="button" style="background-color:#F0F0F0;color:black;width:auto;outline:none;"  class="contract_btn" onclick="minus5();"  value="&minus;">
    <input id="bet_amt5" value="10" name="bet" type="text" style="width:50%;height:40px;outline:none;color:black;text-align:center;font-size:30px;box-sizing:border-box;border:2px black;" readonly>
     <input type="button" style="background-color:#F0F0F0;color:black;width:auto;outline:none;margin-left:0px;"  class="contract_btn" onclick="plus5();"  value="&plus;">
    </center>

    <br><br>


    <input type="checkbox" name="selection" checked value="5" >
    <label>I agree</label><a style="text-decoration:none;font-size:14px;" href=""> PRESALE RULE</a>

    <br><br>

    <div style="float:right;width:99%;height:auto;background:;"> 
    <input  type="submit" name="confirm"  style="float:right;outline:none;color:#2196f3;background-color:#E0E0E0" class="modal_footer_btn" value="CONFIRM"> 
    <button onclick="exit_pop()" style="float:right;outline:none;color:grey;background-color:#E0E0E0" class="modal_footer_btn">CANCEL</button>
    </form>
    </div>
    <br><br><br>
        </div>
      </div>

</div>


<!-- The Modal 6 -->
<div id="myModal6" class="modal">

      <!-- Modal content -->
      <div class="modal-content">
      <div class="modal-header" style="background:#2196f3" id="modal-header">
          <h2 id="pop_heading" style="color:black">Select 6 </h2>
        </div>
        <div class="modal-body"><br>
<b>Contract Money</b>
    <br>
    <br>

    <!-- select amount buttons --> 
    <center>
  <input type="button" style="width:auto;outline:none;"  onclick="ind=10;document.getElementById('bet_amt6').value ='10';" class="contract_btn" value="&#8377;10">

    <input type="button" style="width:auto;outline:none;margin-left:1%;margin-top:30px;" onclick="ind=100;document.getElementById('bet_amt6').value ='100';"  class="contract_btn" value="&#8377;100">

    <input type="button" style="width:auto;outline:none;margin-left:1%;margin-top:30px;" onclick="ind=1000;document.getElementById('bet_amt6').value ='1000';"  class="contract_btn" value="&#8377;1000">

    <form action="" method="POST">
        
          <input type="button" style="background-color:#F0F0F0;color:black;width:auto;outline:none;"  class="contract_btn" onclick="minus6();"  value="&minus;">
    <input id="bet_amt6" value="10" name="bet" type="text" style="width:50%;height:40px;outline:none;color:black;text-align:center;font-size:30px;box-sizing:border-box;border:2px black;" readonly>
    
     <input type="button" style="background-color:#F0F0F0;color:black;width:auto;outline:none;margin-left:0px;"  class="contract_btn" onclick="plus6();"  value="&plus;">
    </center>

    <br><br>


    <input type="checkbox" name="selection" checked value="6" >
    <label>I agree</label><a style="text-decoration:none;font-size:14px;" href=""> PRESALE RULE</a>

    <br><br>

    <div style="float:right;width:99%;height:auto;background:;"> 
    <input  type="submit" name="confirm"  style="float:right;outline:none;color:#2196f3;background-color:#E0E0E0" class="modal_footer_btn" value="CONFIRM"> 
    <button onclick="exit_pop()" style="float:right;outline:none;color:grey;background-color:#E0E0E0" class="modal_footer_btn">CANCEL</button>
    </form>
    </div>
    <br><br><br>
        </div>
      </div>

</div>


 <!-- The Modal 7 -->
<div id="myModal7" class="modal">

      <!-- Modal content -->
      <div class="modal-content">
      <div class="modal-header" style="background:#2196f3" id="modal-header">
          <h2 id="pop_heading" style="color:black">Select 7 </h2>
        </div>
        <div class="modal-body"><br>
<b>Contract Money</b>
    <br>
    <br>

    <!-- select amount buttons --> 
    <center>
  <input type="button" style="width:auto;outline:none;"  onclick="ind=10;document.getElementById('bet_amt7').value ='10';" class="contract_btn" value="&#8377;10">

    <input type="button" style="width:auto;outline:none;margin-left:1%;margin-top:30px;" onclick="ind=100;document.getElementById('bet_amt7').value ='100';"  class="contract_btn" value="&#8377;100">

    <input type="button" style="width:auto;outline:none;margin-left:1%;margin-top:30px;" onclick="ind=1000;document.getElementById('bet_amt7').value ='1000';"  class="contract_btn" value="&#8377;1000">

    <form action="" method="POST">
          <input type="button" style="background-color:#F0F0F0;color:black;width:auto;outline:none;"  class="contract_btn" onclick="minus7();"  value="&minus;">
    <input id="bet_amt7" value="10" name="bet" type="text" style="width:50%;height:40px;outline:none;color:black;text-align:center;font-size:30px;box-sizing:border-box;border:2px black;" readonly>
    
     <input type="button" style="background-color:#F0F0F0;color:black;width:auto;outline:none;margin-left:0px;"  class="contract_btn" onclick="plus7();"  value="&plus;">
    </center>

    <br><br>


    <input type="checkbox" name="selection" checked value="7" >
    <label>I agree</label><a style="text-decoration:none;font-size:14px;" href=""> PRESALE RULE</a>

    <br><br>

    <div style="float:right;width:99%;height:auto;background:;"> 
    <input  type="submit" name="confirm"  style="float:right;outline:none;color:#2196f3;background-color:#E0E0E0" class="modal_footer_btn" value="CONFIRM"> 
    <button onclick="exit_pop()" style="float:right;outline:none;color:grey;background-color:#E0E0E0" class="modal_footer_btn">CANCEL</button>
    </form>
    </div>
    <br><br><br>
        </div>
      </div>

</div>


<!-- The Modal 8 -->
<div id="myModal8" class="modal">

      <!-- Modal content -->
      <div class="modal-content">
      <div class="modal-header" style="background:#2196f3" id="modal-header">
          <h2 id="pop_heading" style="color:black">Select 8 </h2>
        </div>
        <div class="modal-body"><br>
<b>Contract Money</b>
    <br>
    <br>

    <!-- select amount buttons --> 
    <center>
  <input type="button" style="width:auto;outline:none;"  onclick="ind=10;document.getElementById('bet_amt8').value ='10';" class="contract_btn" value="&#8377;10">

    <input type="button" style="width:auto;outline:none;margin-left:1%;margin-top:30px;" onclick="ind=100;document.getElementById('bet_amt8').value ='100';"  class="contract_btn" value="&#8377;100">

    <input type="button" style="width:auto;outline:none;margin-left:1%;margin-top:30px;" onclick="ind=1000;document.getElementById('bet_amt8').value ='1000';"  class="contract_btn" value="&#8377;1000">

    <form action="" method="POST">
          <input type="button" style="background-color:#F0F0F0;color:black;width:auto;outline:none;"  class="contract_btn" onclick="minus8();"  value="&minus;">
    <input id="bet_amt8" value="10" name="bet" type="text" style="width:50%;height:40px;outline:none;color:black;text-align:center;font-size:30px;box-sizing:border-box;border:2px black;" readonly>
    
     <input type="button" style="background-color:#F0F0F0;color:black;width:auto;outline:none;margin-left:0px;"  class="contract_btn" onclick="plus8();"  value="&plus;">
    </center>

    <br><br>


    <input type="checkbox" name="selection" checked value="8" >
    <label>I agree</label><a style="text-decoration:none;font-size:14px;" href=""> PRESALE RULE</a>

    <br><br>

    <div style="float:right;width:99%;height:auto;background:;"> 
    <input  type="submit" name="confirm"  style="float:right;outline:none;color:#2196f3;background-color:#E0E0E0" class="modal_footer_btn" value="CONFIRM"> 
    <button onclick="exit_pop()" style="float:right;outline:none;color:grey;background-color:#E0E0E0" class="modal_footer_btn">CANCEL</button>
    </form>
    </div>
    <br><br><br>
        </div>
      </div>

</div>


<!-- The Modal 9-->
<div id="myModal9" class="modal">

      <!-- Modal content -->
      <div class="modal-content">
      <div class="modal-header" style="background:#2196f3" id="modal-header">
          <h2 id="pop_heading" style="color:black">Select 9 </h2>
        </div>
        <div class="modal-body"><br>
<b>Contract Money</b>
    <br>
    <br>

    <!-- select amount buttons --> 
    <center>
  <input type="button" style="width:auto;outline:none;"  onclick="ind=10;document.getElementById('bet_amt9').value ='10';" class="contract_btn" value="&#8377;10">

    <input type="button" style="width:auto;outline:none;margin-left:1%;margin-top:30px;" onclick="ind=100;document.getElementById('bet_amt9').value ='100';"  class="contract_btn" value="&#8377;100">

    <input type="button" style="width:auto;outline:none;margin-left:1%;margin-top:30px;" onclick="ind=1000;document.getElementById('bet_amt9').value ='1000';"  class="contract_btn" value="&#8377;1000">

    <form action="" method="POST">
          <input type="button" style="background-color:#F0F0F0;color:black;width:auto;outline:none;"  class="contract_btn" onclick="minus9();"  value="&minus;">
    <input id="bet_amt9" value="10" name="bet" type="text" style="width:50%;height:40px;outline:none;color:black;text-align:center;font-size:30px;box-sizing:border-box;border:2px black;" readonly>
    
     <input type="button" style="background-color:#F0F0F0;color:black;width:auto;outline:none;margin-left:0px;"  class="contract_btn" onclick="plus9();"  value="&plus;">
    </center>

    <br><br>


    <input type="checkbox" name="selection" checked value="9" >
    <label>I agree</label><a style="text-decoration:none;font-size:14px;" href=""> PRESALE RULE</a>

    <br><br>

    <div style="float:right;width:99%;height:auto;background:;"> 
    <input  type="submit" name="confirm"  style="float:right;outline:none;color:#2196f3;background-color:#E0E0E0" class="modal_footer_btn" value="CONFIRM"> 
    <button onclick="exit_pop()" style="float:right;outline:none;color:grey;background-color:#E0E0E0" class="modal_footer_btn">CANCEL</button>
    </form>
    </div>
    <br><br><br>
        </div>
      </div>

</div>


<!-- The Modal 11 -->
<div id="myModal11" class="modal">

      <!-- Modal content -->
      <div class="modal-content">
      <div class="modal-header" style="background:green;" id="modal-header">
          <h2 id="pop_heading" style="color:black">Select Green </h2>
        </div>
        <div class="modal-body"><br>
<b>Contract Money</b>
    <br>
    <br>

    <!-- select amount buttons --> 
    <center>
  <input type="button" style="width:auto;outline:none;"  onclick="ind=10;document.getElementById('bet_amt11').value ='10';" class="contract_btn" value="&#8377;10">

    <input type="button" style="width:auto;outline:none;margin-left:1%;margin-top:30px;" onclick="ind=100;document.getElementById('bet_amt11').value ='100';"  class="contract_btn" value="&#8377;100">

    <input type="button" style="width:auto;outline:none;margin-left:1%;margin-top:30px;" onclick="ind=1000;document.getElementById('bet_amt11').value ='1000';"  class="contract_btn" value="&#8377;1000">

    <form action="" method="POST">
          <input type="button" style="background-color:#F0F0F0;color:black;width:auto;outline:none;"  class="contract_btn" onclick="minus11();"  value="&minus;">
    <input id="bet_amt11" value="10" name="bet" type="text" style="width:50%;height:40px;outline:none;color:black;text-align:center;font-size:30px;box-sizing:border-box;border:2px black;" readonly>
    
     <input type="button" style="background-color:#F0F0F0;color:black;width:auto;outline:none;margin-left:0px;"  class="contract_btn" onclick="plus11();"  value="&plus;">
    </center>

    <br><br>


    <input type="checkbox" name="selection" checked value="11" >
    <label>I agree</label><a style="text-decoration:none;font-size:14px;" href=""> PRESALE RULE</a>

    <br><br>

    <div style="float:right;width:99%;height:auto;background:;"> 
    <input  type="submit" name="confirm"  style="float:right;outline:none;color:#2196f3;background-color:#E0E0E0" class="modal_footer_btn" value="CONFIRM"> 
    <button onclick="exit_pop()" style="float:right;outline:none;color:grey;background-color:#E0E0E0" class="modal_footer_btn">CANCEL</button>
    </form>
    </div>
    <br><br><br>
        </div>
      </div>

</div>


<!-- The Modal12 -->
<div id="myModal12" class="modal">

      <!-- Modal content -->
      <div class="modal-content">
      <div class="modal-header" style="background:#9900CC;" id="modal-header">
          <h2 id="pop_heading" style="color:black">Select Purple </h2>
        </div>
        <div class="modal-body"><br>
<b>Contract Money</b>
    <br>
    <br>

    <!-- select amount buttons --> 
    <center>
  <input type="button" style="width:auto;outline:none;"  onclick="ind=10;document.getElementById('bet_amt12').value ='10';" class="contract_btn" value="&#8377;10">

    <input type="button" style="width:auto;outline:none;margin-left:1%;margin-top:30px;" onclick="ind=100;document.getElementById('bet_amt12').value ='100';"  class="contract_btn" value="&#8377;100">

    <input type="button" style="width:auto;outline:none;margin-left:1%;margin-top:30px;" onclick="ind=1000;document.getElementById('bet_amt12').value ='1000';"  class="contract_btn" value="&#8377;1000">

    <form action="" method="POST">
          <input type="button" style="background-color:#F0F0F0;color:black;width:auto;outline:none;"  class="contract_btn" onclick="minus12();"  value="&minus;">
    <input id="bet_amt12" value="10" name="bet" type="text" style="width:50%;height:40px;outline:none;color:black;text-align:center;font-size:30px;box-sizing:border-box;border:2px black;" readonly>
    
     <input type="button" style="background-color:#F0F0F0;color:black;width:auto;outline:none;margin-left:0px;"  class="contract_btn" onclick="plus12();"  value="&plus;">
    </center>

    <br><br>


    <input type="checkbox" name="selection" checked value="12" >
    <label>I agree</label><a style="text-decoration:none;font-size:14px;" href=""> PRESALE RULE</a>

    <br><br>

    <div style="float:right;width:99%;height:auto;background:;"> 
    <input  type="submit" name="confirm"  style="float:right;outline:none;color:#2196f3;background-color:#E0E0E0" class="modal_footer_btn" value="CONFIRM"> 
    <button onclick="exit_pop()" style="float:right;outline:none;color:grey;background-color:#E0E0E0" class="modal_footer_btn">CANCEL</button>
    </form>
    </div>
    <br><br><br>
        </div>
      </div>

</div>


<!-- The Modal 13 -->
<div id="myModal13" class="modal">

      <!-- Modal content -->
      <div class="modal-content">
      <div class="modal-header" style="background:red;" id="modal-header">
          <h2 id="pop_heading" style="color:black">Select Red </h2>
        </div>
        <div class="modal-body"><br>
<b>Contract Money</b>
    <br>
    <br>

    <!-- select amount buttons --> 
    <center>
  <input type="button" style="width:auto;outline:none;"  onclick="ind=10;document.getElementById('bet_amt13').value ='10';" class="contract_btn" value="&#8377;10">

    <input type="button" style="width:auto;outline:none;margin-left:1%;margin-top:30px;" onclick="ind=100;document.getElementById('bet_amt13').value ='100';"  class="contract_btn" value="&#8377;100">

    <input type="button" style="width:auto;outline:none;margin-left:1%;margin-top:30px;" onclick="ind=1000;document.getElementById('bet_amt13').value ='1000';"  class="contract_btn" value="&#8377;1000">

    <form action="" method="POST">
          <input type="button" style="background-color:#F0F0F0;color:black;width:auto;outline:none;"  class="contract_btn" onclick="minus13();"  value="&minus;">
    <input id="bet_amt13" value="10" name="bet" type="text" style="width:50%;height:40px;outline:none;color:black;text-align:center;font-size:30px;box-sizing:border-box;border:2px black;" readonly>
    
     <input type="button" style="background-color:#F0F0F0;color:black;width:auto;outline:none;margin-left:0px;"  class="contract_btn" onclick="plus13();"  value="&plus;">
    </center>

    <br><br>


    <input type="checkbox" name="selection" checked value="13"  checked>
    <label>I agree</label><a style="text-decoration:none;font-size:14px;" href=""> PRESALE RULE</a>

    <br><br>

    <div style="float:right;width:99%;height:auto;background:;"> 
    <input  type="submit" name="confirm"  style="float:right;outline:none;color:#2196f3;background-color:#E0E0E0" class="modal_footer_btn" value="CONFIRM"> 
    <button onclick="exit_pop()" style="float:right;outline:none;color:grey;background-color:#E0E0E0" class="modal_footer_btn">CANCEL</button>
    </form>
    </div>
    <br><br><br>
        </div>
      </div>

</div>

<!-- php for joining -->
<?php
  if(isset($_POST['confirm']))
  {
    $amount = $_POST['bet'];
    $past = (60*60*$h)+(60*$m)+$s;
    $current = $past /180+1;
    $current_period = $y.$month.$day.$current;
        $current_period = (int)$current_period;

    if($wallet_result['available_balance']>=$amount)
    {
      if(!isset($_POST['selection']))
      {
        echo '<script>alert("Please Agree to our PRESALE RULES")</script>';

      }
      else if($amount<='0')
              {
                          echo '<script>alert("Amount Must be greater than 10")</script>';

              }
     else              
      {
          
            $select =$_POST['selection'];
    
              $bal=$wallet_result['available_balance'];
              $remain = $bal-$amount;
              $upd = mysqli_query($conn,"UPDATE wallet SET available_balance='$remain' where wallet_id='$id'");
    
          
            if($upd)
            {
              //finding new id for transaction
              $t = mysqli_query($conn,"SELECT * FROM transactions");
              $t_id = mysqli_num_rows($t);
              $t_id = $t_id+1;
    
            //inserting into transactions
              $sql = mysqli_query($conn,"INSERT INTO transactions VALUES('$t_id','$current_period','$select','$amount','$id','0','1')");
    
              if($sql)
              {     
                  //giving level1 bonus
                  $rcode_query=mysqli_query($conn,"SELECT * from users where user_id='$id'");
                  
                  $rcode_query_result=mysqli_fetch_assoc($rcode_query);
                  
                  $r_code=$rcode_query_result['rcode'];
                  
                  $promo_query=mysqli_query($conn,"SELECT * from promotion where promotion_id='$r_code'");
                  
                  $promo_query_result=mysqli_fetch_assoc($promo_query);
                  
                  $lev1_commission=($amount*0.8)/100;
                  
                  $new_contribution=$promo_query_result['contribution']+$lev1_commission;
                  
                  $new_bon=$promo_query_result['bonus']+$lev1_commission;
                  
                  mysqli_query($conn,"UPDATE promotion set contribution='$new_contribution',bonus='$new_bon' where promotion_id='$r_code'");
                  
                  
                  //giving level2 bonus
                  
                  $level2_rcode_query=mysqli_query($conn,"SELECT * from users where user_id='$r_code'");
                  
                  $level2_rcode_query_result=mysqli_fetch_assoc($level2_rcode_query);
                  
                  $level2_rcode=$level2_rcode_query_result['rcode'];
                  
                  $level2_promo_query=mysqli_query($conn,"SELECT * from promotion where promotion_id='$level2_rcode'");
                  
                  $level2_promo_query_result=mysqli_fetch_assoc($level2_promo_query);
                  
                  $lev2_commission=($amount*0.4)/100;
                  
                  $level2_new_contribution=$level2_promo_query_result['level2_cont']+$lev2_commission;
                  
                  $new_bonnus=$level2_promo_query_result['bonus']+$lev2_commission;
                  
                  mysqli_query($conn,"UPDATE promotion set level2_cont='$level2_new_contribution',bonus='$new_bonnus' where promotion_id='$level2_rcode'");
                  
                  
                  
                echo '<script>alert("success")</script>';
                echo "<script>window.location.href='win';</script>";
              }
    
              else
              {
                echo '<script>alert("Please Try Again Later!")</script>';
    
              }
    
            }
    
            else
            {
              echo '<script>alert("Please Try Again Later!")</script>';
    
            }
          }
        }
    
        else
        {
          echo '<script>alert("Insufficient Balance!Please Recharge")</script>';
          echo "<script>window.location.href='recharge';</script>";
        }
}
?>


  

<script>
  var num="";
//  var ind=10;
//  var h= <?php echo $h; ?>;
//  var m= <?php echo $m; ?>;
//  var s= <?php echo $s; ?>;

  var ind=10;
var h= new Date().getHours();
var m= new Date().getMinutes();
var s= new Date().getSeconds();
  var past_seconds=(60*60*h)+(60*m)+s;
  var current_round=past_seconds/180+1;

  var period = parseInt(current_round);

  document.getElementById("round").innerHTML=period;

  // conditions
    switch(m)
    {
      case 0:
      var next_round=180-s;
      break;

      case 1:
      var next_round=120-s;
      break;

      case 2:
      var next_round=60-s;
      break;

      case 3:
      var next_round=180-s;
      break;

      case 4:
      var next_round=120-s;
      break;

      case 5:
      var next_round=60-s;
      break;

      case 6:
      var next_round=180-s;
      break;

      case 7:
      var next_round=120-s;
      break;

      case 8:
      var next_round=60-s;
      break;

      case 9:
      var next_round=180-s;
      break;

      case 10:
      var next_round=120-s;
      break;

      case 11:
      var next_round=60-s;
      break;

      case 12:
      var next_round=180-s;
      break;

      case 13:
      var next_round=120-s;
      break;

      case 14:
      var next_round=60-s;
      break;

      case 15:
      var next_round=180-s;
      break;

      case 16:
      var next_round=120-s;
      break;

      case 17:
      var next_round=60-s;
      break;

      case 18:
      var next_round=180-s;
      break;

      case 19:
      var next_round=120-s;
      break;

      case 20:
      var next_round=60-s;
      break;

      case 21:
      var next_round=180-s;
      break;

      case 22:
      var next_round=120-s;
      break;

      case 23:
      var next_round=60-s;
      break;

      case 24:
      var next_round=180-s;
      break;

      case 25:
      var next_round=120-s;
      break;

      case 26:
      var next_round=60-s;
      break;

      case 27:
      var next_round=180-s;
      break;

      case 28:
      var next_round=120-s;
      break;

      case 29:
      var next_round=60-s;
      break;

      case 30:
      var next_round=180-s;
      break;

      case 31:
      var next_round=120-s;
      break;

      case 32:
      var next_round=60-s;
      break;

      case 33:
      var next_round=180-s;

      break;case 34:
      var next_round=120-s;
      break;

      case 35:
      var next_round=60-s;
      break;

      case 36:
      var next_round=180-s;
      break;

      case 37:
      var next_round=120-s;
      break;

      case 38:
      var next_round=60-s;
      break;

      case 39:
      var next_round=180-s;
      break;


      case 40:
      var next_round=120-s;
      break;

      case 41:
      var next_round=60-s;
      break;

      case 42:
      var next_round=180-s;
      break;

      case 43:
      var next_round=120-s;
      break;

      case 44:
      var next_round=60-s;
      break;

      case 45:
      var next_round=180-s;
      break;

      case 46:
      var next_round=120-s;
      break;

      case 47:
      var next_round=60-s;
      break;

      case 48:
      var next_round=180-s;
      break;

      case 49:
      var next_round=120-s;
      break;

      case 50:
      var next_round=60-s;
      break;

      case 51:
      var next_round=180-s;
      break;

      case 52:
      var next_round=120-s;
      break;

      case 53:
      var next_round=60-s;
      break;

      case 54:
      var next_round=180-s;
      break;

      case 55:
      var next_round=120-s;
      break;

      case 56:
      var next_round=60-s;
      break;

      case 57:
      var next_round=180-s;
      break;
      case 58:
      var next_round=120-s;
      break;

      case 59:
      var next_round=60-s;
      break;

      case 60:
      var next_round=180-s;
      break;
  }

  var timeInSecs;
  var ticker;
  function startTimer(secs) 
  {
    timeInSecs = parseInt(secs);
    ticker = setInterval("tick()", 1000); 
  }

  function tick( ) 
  {
    var secs = timeInSecs;
    if(secs<=30 && secs>0)
    {
      timeInSecs--; 
      document.getElementById("join_green").style.background = "#C8C8C8";
      document.getElementById("join_voilet").style.background = "#C8C8C8";
      document.getElementById("join_red").style.background = "#C8C8C8";
      document.getElementById("0").style.background = "#C8C8C8";
      document.getElementById("1").style.background = "#C8C8C8";
      document.getElementById("2").style.background = "#C8C8C8";
      document.getElementById("3").style.background = "#C8C8C8";
      document.getElementById("4").style.background = "#C8C8C8";
      document.getElementById("5").style.background = "#C8C8C8";
      document.getElementById("6").style.background = "#C8C8C8";
      document.getElementById("7").style.background = "#C8C8C8";
      document.getElementById("8").style.background = "#C8C8C8";
      document.getElementById("9").style.background = "#C8C8C8";

      document.getElementById("join_green").disabled = true;
      document.getElementById("join_voilet").disabled = true;
      document.getElementById("join_red").disabled = true;
      document.getElementById("0").disabled = true;
      document.getElementById("1").disabled = true;
      document.getElementById("2").disabled = true;
      document.getElementById("3").disabled = true;
      document.getElementById("4").disabled = true;
      document.getElementById("5").disabled = true;
      document.getElementById("6").disabled = true;
      document.getElementById("7").disabled = true;
      document.getElementById("8").disabled = true;
      document.getElementById("9").disabled = true;
    }

    else if (secs > 0) 
    {
      timeInSecs--; 
    }

    else 
    {
      clearInterval(ticker);
      startTimer(3*60);
      reload1();
    }

    var days= Math.floor(secs/86400); 
    secs %= 86400;
    var hours= Math.floor(secs/3600);
    secs %= 3600;
    var mins = Math.floor(secs/60);
    secs %= 60;
    var sec_load=( (mins < 10) ? "0" : "" ) + mins;
    document.getElementById("secs").innerHTML =sec_load;

    var min_load=( (secs < 10) ? "0" : "" ) + secs;
    document.getElementById("mins").innerHTML = min_load;

  }

  startTimer(next_round); 
  
  function reload1()
  {
    window.setTimeout(function () {
    window.location.reload();
  }, 300);

  }



// Get the modal
    var modal0 = document.getElementById("myModal0");
    var modal1 = document.getElementById("myModal1");
    var modal2 = document.getElementById("myModal2");
    var modal3 = document.getElementById("myModal3");
    var modal4 = document.getElementById("myModal4");
    var modal5 = document.getElementById("myModal5");
    var modal6 = document.getElementById("myModal6");
    var modal7 = document.getElementById("myModal7");
    var modal8 = document.getElementById("myModal8");
    var modal9 = document.getElementById("myModal9");
    var modal11 = document.getElementById("myModal11");
    var modal12 = document.getElementById("myModal12");
    var modal13 = document.getElementById("myModal13");
    var rulesmodel = document.getElementById("rulesmodal");

// Get the <span> element that closes the modal
   var span = document.getElementsByClassName("close")[0];



  function exit_pop() 
  {
    modal0.style.display = "none";
    modal1.style.display = "none";
    modal2.style.display = "none";
    modal3.style.display = "none";
    modal4.style.display = "none";
    modal5.style.display = "none";
    modal6.style.display = "none";
    modal7.style.display = "none";
    modal8.style.display = "none";
    modal9.style.display = "none";
    modal11.style.display = "none";
    modal12.style.display = "none";
    modal13.style.display = "none";
    rulesmodal.style.display = "none";

  }


  window.onclick = function(event) 
  {
    if (event.target == modal) 
    {
      modal0.style.display = "none";
      modal1.style.display = "none";
      modal2.style.display = "none";
      modal3.style.display = "none";
      modal4.style.display = "none";
      modal5.style.display = "none";
      modal6.style.display = "none";
      modal7.style.display = "none";
      modal8.style.display = "none";
      modal9.style.display = "none";
      modal11.style.display = "none";
      modal12.style.display = "none";
      modal13.style.display = "none";    
    }
  }

//join functions
  function join_0()
  {
    modal0.style.display="block";
  }

  function join_1()
  {
  modal1.style.display="block";
  }
  function join_2()
  {
  modal2.style.display="block";
  }
  function join_3()
  {
  modal3.style.display="block";

  }
  function join_4()
  {
  modal4.style.display="block";

  }
  function join_5()
  {
  modal5.style.display="block";
  }
  function join_6()
  {
  modal6.style.display="block";
  }

  function join_7()
  {
  modal7.style.display="block";
  }
  function join_8()
  {
  modal8.style.display="block";
  }
  function join_9()
  {
  modal9.style.display="block";
  }

  function join_green()
  {
  modal11.style.display="block";
  }

  function join_voilet()
  {
  modal12.style.display="block";
  }

  function join_red()
  {
  modal13.style.display="block";
  }

function rules()
{
      rulesmodal.style.display="block";

}

//increase decrease buttons start
function minus0()
{
    var old =document.getElementById('bet_amt').value;
    if(old>0)
    {
        if(ind=='10')
        {
            old=old-ind;
            document.getElementById('bet_amt').value =old;
        }
        
        else if(ind=='100')
        {
            old=old-ind;
            document.getElementById('bet_amt').value =old;
        }
        
        else if(ind=='1000')
        {
            old=old-ind;
            document.getElementById('bet_amt').value =old;
        }
    }
}


function plus0()
{
      var ol =document.getElementById('bet_amt').value;
    if(ind==10)
    {
        var temp=parseInt(ol);
        var tt= temp+10;
        
        var ttt=tt.toString();
        
        document.getElementById('bet_amt').value=ttt;
    }
    
    else if(ind==100)
    {
        var temp=parseInt(ol);
        var tt= temp+100;
        
        var ttt=tt.toString();
        
        document.getElementById('bet_amt').value=ttt;
    }
    
    else if(ind==1000)
    {
        var temp=parseInt(ol);
        var tt= temp+1000;
        
        var ttt=tt.toString();
        
        document.getElementById('bet_amt').value=ttt;
    }
    
}


function minus1()
{
    var old =document.getElementById('bet_amt1').value;
    if(old>0)
    {
        if(ind=='10')
        {
            old=old-ind;
            document.getElementById('bet_amt1').value =old;
        }
        
        else if(ind=='100')
        {
            old=old-ind;
            document.getElementById('bet_amt1').value =old;
        }
        
        else if(ind=='1000')
        {
            old=old-ind;
            document.getElementById('bet_amt1').value =old;
        }
    }
}


function plus1()
{
      var ol =document.getElementById('bet_amt1').value;
    if(ind==10)
    {
        var temp=parseInt(ol);
        var tt= temp+10;
        
        var ttt=tt.toString();
        
        document.getElementById('bet_amt1').value=ttt;
    }
    
    else if(ind==100)
    {
        var temp=parseInt(ol);
        var tt= temp+100;
        
        var ttt=tt.toString();
        
        document.getElementById('bet_amt1').value=ttt;
    }
    
    else if(ind==1000)
    {
        var temp=parseInt(ol);
        var tt= temp+1000;
        
        var ttt=tt.toString();
        
        document.getElementById('bet_amt1').value=ttt;
    }
    
}


function minus2()
{
    var old =document.getElementById('bet_amt2').value;
    if(old>0)
    {
        if(ind=='10')
        {
            old=old-ind;
            document.getElementById('bet_amt2').value =old;
        }
        
        else if(ind=='100')
        {
            old=old-ind;
            document.getElementById('bet_amt2').value =old;
        }
        
        else if(ind=='1000')
        {
            old=old-ind;
            document.getElementById('bet_amt2').value =old;
        }
    }
}


function plus2()
{
      var ol =document.getElementById('bet_amt2').value;
    if(ind==10)
    {
        var temp=parseInt(ol);
        var tt= temp+10;
        
        var ttt=tt.toString();
        
        document.getElementById('bet_amt2').value=ttt;
    }
    
    else if(ind==100)
    {
        var temp=parseInt(ol);
        var tt= temp+100;
        
        var ttt=tt.toString();
        
        document.getElementById('bet_amt2').value=ttt;
    }
    
    else if(ind==1000)
    {
        var temp=parseInt(ol);
        var tt= temp+1000;
        
        var ttt=tt.toString();
        
        document.getElementById('bet_amt2').value=ttt;
    }
    
}


function minus3()
{
    var old =document.getElementById('bet_amt3').value;
    if(old>0)
    {
        if(ind=='10')
        {
            old=old-ind;
            document.getElementById('bet_amt3').value =old;
        }
        
        else if(ind=='100')
        {
            old=old-ind;
            document.getElementById('bet_amt3').value =old;
        }
        
        else if(ind=='1000')
        {
            old=old-ind;
            document.getElementById('bet_amt3').value =old;
        }
    }
}


function plus3()
{
      var ol =document.getElementById('bet_amt3').value;
    if(ind==10)
    {
        var temp=parseInt(ol);
        var tt= temp+10;
        
        var ttt=tt.toString();
        
        document.getElementById('bet_amt3').value=ttt;
    }
    
    else if(ind==100)
    {
        var temp=parseInt(ol);
        var tt= temp+100;
        
        var ttt=tt.toString();
        
        document.getElementById('bet_amt3').value=ttt;
    }
    
    else if(ind==1000)
    {
        var temp=parseInt(ol);
        var tt= temp+1000;
        
        var ttt=tt.toString();
        
        document.getElementById('bet_amt3').value=ttt;
    }
    
}


function minus4()
{
    var old =document.getElementById('bet_amt4').value;
    if(old>0)
    {
        if(ind=='10')
        {
            old=old-ind;
            document.getElementById('bet_amt4').value =old;
        }
        
        else if(ind=='100')
        {
            old=old-ind;
            document.getElementById('bet_amt4').value =old;
        }
        
        else if(ind=='1000')
        {
            old=old-ind;
            document.getElementById('bet_amt4').value =old;
        }
    }
}


function plus4()
{
      var ol =document.getElementById('bet_amt4').value;
    if(ind==10)
    {
        var temp=parseInt(ol);
        var tt= temp+10;
        
        var ttt=tt.toString();
        
        document.getElementById('bet_amt4').value=ttt;
    }
    
    else if(ind==100)
    {
        var temp=parseInt(ol);
        var tt= temp+100;
        
        var ttt=tt.toString();
        
        document.getElementById('bet_amt4').value=ttt;
    }
    
    else if(ind==1000)
    {
        var temp=parseInt(ol);
        var tt= temp+1000;
        
        var ttt=tt.toString();
        
        document.getElementById('bet_amt4').value=ttt;
    }
    
}


function minus5()
{
    var old =document.getElementById('bet_amt5').value;
    if(old>0)
    {
        if(ind=='10')
        {
            old=old-ind;
            document.getElementById('bet_amt5').value =old;
        }
        
        else if(ind=='100')
        {
            old=old-ind;
            document.getElementById('bet_amt5').value =old;
        }
        
        else if(ind=='1000')
        {
            old=old-ind;
            document.getElementById('bet_amt5').value =old;
        }
    }
}


function plus5()
{
      var ol =document.getElementById('bet_amt5').value;
    if(ind==10)
    {
        var temp=parseInt(ol);
        var tt= temp+10;
        
        var ttt=tt.toString();
        
        document.getElementById('bet_amt5').value=ttt;
    }
    
    else if(ind==100)
    {
        var temp=parseInt(ol);
        var tt= temp+100;
        
        var ttt=tt.toString();
        
        document.getElementById('bet_amt5').value=ttt;
    }
    
    else if(ind==1000)
    {
        var temp=parseInt(ol);
        var tt= temp+1000;
        
        var ttt=tt.toString();
        
        document.getElementById('bet_amt5').value=ttt;
    }
    
}

function minus6()
{
    var old =document.getElementById('bet_amt6').value;
    if(old>0)
    {
        if(ind=='10')
        {
            old=old-ind;
            document.getElementById('bet_amt6').value =old;
        }
        
        else if(ind=='100')
        {
            old=old-ind;
            document.getElementById('bet_amt6').value =old;
        }
        
        else if(ind=='1000')
        {
            old=old-ind;
            document.getElementById('bet_amt6').value =old;
        }
    }
}


function plus6()
{
      var ol =document.getElementById('bet_amt6').value;
    if(ind==10)
    {
        var temp=parseInt(ol);
        var tt= temp+10;
        
        var ttt=tt.toString();
        
        document.getElementById('bet_amt6').value=ttt;
    }
    
    else if(ind==100)
    {
        var temp=parseInt(ol);
        var tt= temp+100;
        
        var ttt=tt.toString();
        
        document.getElementById('bet_amt6').value=ttt;
    }
    
    else if(ind==1000)
    {
        var temp=parseInt(ol);
        var tt= temp+1000;
        
        var ttt=tt.toString();
        
        document.getElementById('bet_amt6').value=ttt;
    }
    
}


function minus7()
{
    var old =document.getElementById('bet_amt7').value;
    if(old>0)
    {
        if(ind=='10')
        {
            old=old-ind;
            document.getElementById('bet_amt7').value =old;
        }
        
        else if(ind=='100')
        {
            old=old-ind;
            document.getElementById('bet_amt7').value =old;
        }
        
        else if(ind=='1000')
        {
            old=old-ind;
            document.getElementById('bet_amt7').value =old;
        }
    }
}


function plus7()
{
      var ol =document.getElementById('bet_amt7').value;
    if(ind==10)
    {
        var temp=parseInt(ol);
        var tt= temp+10;
        
        var ttt=tt.toString();
        
        document.getElementById('bet_amt7').value=ttt;
    }
    
    else if(ind==100)
    {
        var temp=parseInt(ol);
        var tt= temp+100;
        
        var ttt=tt.toString();
        
        document.getElementById('bet_amt7').value=ttt;
    }
    
    else if(ind==1000)
    {
        var temp=parseInt(ol);
        var tt= temp+1000;
        
        var ttt=tt.toString();
        
        document.getElementById('bet_amt7').value=ttt;
    }
    
}

function minus8()
{
    var old =document.getElementById('bet_amt8').value;
    if(old>0)
    {
        if(ind=='10')
        {
            old=old-ind;
            document.getElementById('bet_amt8').value =old;
        }
        
        else if(ind=='100')
        {
            old=old-ind;
            document.getElementById('bet_amt8').value =old;
        }
        
        else if(ind=='1000')
        {
            old=old-ind;
            document.getElementById('bet_amt8').value =old;
        }
    }
}


function plus8()
{
      var ol =document.getElementById('bet_amt8').value;
    if(ind==10)
    {
        var temp=parseInt(ol);
        var tt= temp+10;
        
        var ttt=tt.toString();
        
        document.getElementById('bet_amt8').value=ttt;
    }
    
    else if(ind==100)
    {
        var temp=parseInt(ol);
        var tt= temp+100;
        
        var ttt=tt.toString();
        
        document.getElementById('bet_amt8').value=ttt;
    }
    
    else if(ind==1000)
    {
        var temp=parseInt(ol);
        var tt= temp+1000;
        
        var ttt=tt.toString();
        
        document.getElementById('bet_amt8').value=ttt;
    }
    
}

function minus9()
{
    var old =document.getElementById('bet_amt9').value;
    if(old>0)
    {
        if(ind=='10')
        {
            old=old-ind;
            document.getElementById('bet_amt9').value =old;
        }
        
        else if(ind=='100')
        {
            old=old-ind;
            document.getElementById('bet_amt9').value =old;
        }
        
        else if(ind=='1000')
        {
            old=old-ind;
            document.getElementById('bet_amt9').value =old;
        }
    }
}


function plus9()
{
      var ol =document.getElementById('bet_amt9').value;
    if(ind==10)
    {
        var temp=parseInt(ol);
        var tt= temp+10;
        
        var ttt=tt.toString();
        
        document.getElementById('bet_amt9').value=ttt;
    }
    
    else if(ind==100)
    {
        var temp=parseInt(ol);
        var tt= temp+100;
        
        var ttt=tt.toString();
        
        document.getElementById('bet_amt9').value=ttt;
    }
    
    else if(ind==1000)
    {
        var temp=parseInt(ol);
        var tt= temp+1000;
        
        var ttt=tt.toString();
        
        document.getElementById('bet_amt9').value=ttt;
    }
    
}


function minus11()
{
    var old =document.getElementById('bet_amt11').value;
    if(old>0)
    {
        if(ind=='10')
        {
            old=old-ind;
            document.getElementById('bet_amt11').value =old;
        }
        
        else if(ind=='100')
        {
            old=old-ind;
            document.getElementById('bet_amt11').value =old;
        }
        
        else if(ind=='1000')
        {
            old=old-ind;
            document.getElementById('bet_amt11').value =old;
        }
    }
}


function plus11()
{
      var ol =document.getElementById('bet_amt11').value;
    if(ind==10)
    {
        var temp=parseInt(ol);
        var tt= temp+10;
        
        var ttt=tt.toString();
        
        document.getElementById('bet_amt11').value=ttt;
    }
    
    else if(ind==100)
    {
        var temp=parseInt(ol);
        var tt= temp+100;
        
        var ttt=tt.toString();
        
        document.getElementById('bet_amt11').value=ttt;
    }
    
    else if(ind==1000)
    {
        var temp=parseInt(ol);
        var tt= temp+1000;
        
        var ttt=tt.toString();
        
        document.getElementById('bet_amt11').value=ttt;
    }
    
}


function minus12()
{
    var old =document.getElementById('bet_amt12').value;
    if(old>0)
    {
        if(ind=='10')
        {
            old=old-ind;
            document.getElementById('bet_amt12').value =old;
        }
        
        else if(ind=='100')
        {
            old=old-ind;
            document.getElementById('bet_amt12').value =old;
        }
        
        else if(ind=='1000')
        {
            old=old-ind;
            document.getElementById('bet_amt12').value =old;
        }
    }
}


function plus12()
{
      var ol =document.getElementById('bet_amt12').value;
    if(ind==10)
    {
        var temp=parseInt(ol);
        var tt= temp+10;
        
        var ttt=tt.toString();
        
        document.getElementById('bet_amt12').value=ttt;
    }
    
    else if(ind==100)
    {
        var temp=parseInt(ol);
        var tt= temp+100;
        
        var ttt=tt.toString();
        
        document.getElementById('bet_amt12').value=ttt;
    }
    
    else if(ind==1000)
    {
        var temp=parseInt(ol);
        var tt= temp+1000;
        
        var ttt=tt.toString();
        
        document.getElementById('bet_amt12').value=ttt;
    }
    
}

function minus13()
{
    var old =document.getElementById('bet_amt13').value;
    if(old>0)
    {
        if(ind=='10')
        {
            old=old-ind;
            document.getElementById('bet_amt13').value =old;
        }
        
        else if(ind=='100')
        {
            old=old-ind;
            document.getElementById('bet_amt13').value =old;
        }
        
        else if(ind=='1000')
        {
            old=old-ind;
            document.getElementById('bet_amt13').value =old;
        }
    }
}


function plus13()
{
      var ol =document.getElementById('bet_amt13').value;
    if(ind==10)
    {
        var temp=parseInt(ol);
        var tt= temp+10;
        
        var ttt=tt.toString();
        
        document.getElementById('bet_amt13').value=ttt;
    }
    
    else if(ind==100)
    {
        var temp=parseInt(ol);
        var tt= temp+100;
        
        var ttt=tt.toString();
        
        document.getElementById('bet_amt13').value=ttt;
    }
    
    else if(ind==1000)
    {
        var temp=parseInt(ol);
        var tt= temp+1000;
        
        var ttt=tt.toString();
        
        document.getElementById('bet_amt13').value=ttt;
    }
    
}


</script>


<br><br><br>

  <!-- footer start -->
  <div class="footer"> 
<div class="footer"> 
        <center>
            <button onclick="location.href='index'" style="float:left;outline:none;" class="footer_btn"><i id="f_home"  class="fa fa-home" style="font-size:25px;color:#696969;color:grey"></i></button>
            <button  onclick="location.href='#'" style="outline:none;"  class="footer_btn"><i id="f_my" class="far fa-search" style="font-size:25px;color:#696969;color:grey"></i></button>
            
            <button  onclick="location.href='win'" style="outline:none;margin-left: 18%;"  class="footer_btn"><i id="f_my" class="far fa-trophy-alt" style="font-size:25px;color:#0081FF;"></i></button>
            <button  onclick="location.href='home'" style="float:right;outline:none;"  class="footer_btn"><i id="f_my" class="fa fa-user" style="font-size:25px;color:#696969;color:grey"></i></button>
        </center>
          </div>
</body>
</html>