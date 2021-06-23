<?php
include("connection.php");
session_start();
error_reporting(0);
$id = $_SESSION['admin_id'];

if($id==true)
{

}

else
{
    header("location:admin_login");
}


?>

<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Ps Club</title>
<link rel="icon" href="/img/site_logo.png" type="image/gif" sizes="32x32">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script>
</script>
 
<!-- style section start -->
<style>
  /*iput fields icon color change to #954697*/
  /*text-indent:30px; to left the text in text fields*/


  input[type=text] {
background-position: 20px; 
background-size: 30px 30px;
background-repeat: no-repeat;
font-size: 16px;
width: 95%;
padding: 10px 15px;
margin-top: 20px;
margin-right: 10px;
box-sizing: border-box;
border: 2px white;
color:black;
}

#body_gradient {
  background-image: linear-gradient(to right,#434343 , #000000);
}


input[type=number] {
background-position: 20px; 
background-size: 30px 30px;
background-repeat: no-repeat;
font-size: 16px;
width: 95%;
padding: 10px 15px;
margin-top: 20px;
margin-right: 10px;
box-sizing: border-box;
border: 2px white;
color:black;
}


  /*login button in the middle*/
  .logout_button{
  background:yellow;
    border: none;
    color: black;
    padding: 10px 14px;
    text-align: center;
    text-decoration: none;
    font-size: 14px;
  border-radius: 2px;
  font-family:sans-serif;

  }
  .logout_button:hover{ /*when hover on login button change color*/
  background:#006600;
  }


</style>
 
</head>
<body id="body_gradient" style="height:100%;font-family: Roboto,sans-serif;">

<center>
<form action="" method="post">
<input type="submit" name="find" class="logout_button" value="SHOW DATA">
</form>

<center>

<?php
  
  if(isset($_POST['find']))
  {
    $finding = mysqli_query($conn,"SELECT * FROM withdraw where status ='0' LIMIT 20");
    $records = mysqli_num_rows($finding);

    if($records==0)
    {
      echo "NO DATA FOUND!";
    }

    else
    {
        ?>
        <div style="overflow-x:auto;">

        <table style='margin:%;color:yellow;' border='1px'>
        <tr>

        <th>
        WITHDRAW ID
        </th>

        <th>
        UPI ID
        </th>
        
         <th>
        IFSC
        </th>

        <th>
        AMOUNT
        </th>
        
          <th>
        WalletID
        </th>

      <th colspan="6">
        UPDATE
        </th>
      
        </tr>

<?php
      while($row = mysqli_fetch_array($finding))
      {
       
       $tempw=$row['wallet_id'];
       
        echo "<tr>"; 
        echo "<td>";
        echo "&emsp;".($row['withdraw_id']); //apply_id
        echo "</td>";

        echo "<td>";
        echo "&emsp;".($row['upi_id']);  // upi
        echo "</td>";
        
        $ifsc=mysqli_query($conn,"SELECT ifsc AS ifsc from bank_cards where wallet_id='$tempw' LIMIT 1");
        
        $var0 = mysqli_fetch_assoc($ifsc);
        echo "<td>";
        echo "&emsp;".($var0['ifsc']);  // ifsc
        echo "</td>";
        

        echo "<td>";
        echo "&emsp;".($row['amount']);  // amount
        echo "</td>";
        
          echo "<td>";
        echo "&emsp;".($row['wallet_id']);  // wallet
        echo "</td>";

         echo "<td>";
        echo "<a href='wd.php?wd=$row[withdraw_id]&wi=$row[wallet_id]&am=$row[amount]&st=1'>Success</a>";
        echo "</td>";
        
        echo "<td>";
        echo "<a href='wd.php?wd=$row[withdraw_id]&wi=$row[wallet_id]&am=$row[amount]&st=2'>Fail</a>";
        echo "</td>";
        
        echo "<td>";
        echo "<a href='wd.php?wd=$row[withdraw_id]&wi=$row[wallet_id]&am=$row[amount]&st=3'>BET</a>";
        echo "</td>";
        
        echo "<td>";
        echo "<a href='wd.php?wd=$row[withdraw_id]&wi=$row[wallet_id]&am=$row[amount]&st=4'>Use Bank</a>";
        echo "</td>";
        
        echo "<td>";
        echo "<a href='wd.php?wd=$row[withdraw_id]&wi=$row[wallet_id]&am=$row[amount]&st=5'>Use Upi</a>";
        echo "</td>";
        
        echo "<td>";
        echo "<a href='wd.php?wd=$row[withdraw_id]&wi=$row[wallet_id]&am=$row[amount]&st=6'>Recharge</a>";
        echo "</td>";
    

      

        echo "</tr>";
      }
      echo "</table>";  
      echo "</div>";
        
    }              
}
?>

<center>
<form action="" method="post">
<input type="number" name="w" placeholder="wallet id" style="outline:none" required>

<br><br>
<input type="submit" name="show_bet" class="logout_button" value="SHOW BET">
</form>

<center>

<?php
  
  if(isset($_POST['show_bet']))
  {
      $ww=$_POST['w'];
    $bett = mysqli_query($conn,"SELECT SUM(amount) AS total FROM transactions where wallet_id ='$ww'");
    $total_bet = mysqli_fetch_array($bett);
    echo "<center style='color:yellow'>"."total Bet:".$total_bet['total']."</center>";
    
    $checkblock=mysqli_query($conn,"SELECT flag AS flag,rcode AS rcode, recharge_status AS st from users where user_id='$ww'");
    
    
    $flagg = mysqli_fetch_array($checkblock);
    
    echo "<center style='color:yellow'>"."rcode:".$flagg['rcode']."</center>";
    
    
    if($flagg['flag']==0)
    {
    echo "<center style='color:yellow'>"."Status:Blocked"."</center>";
    }
    
    else
    {
          echo "<center style='color:yellow'>"."Status:Not Blocked"."</center>";

    }
    
    
    if($flagg['st']==0)
    {
        echo "<center style='color:yellow'>"."No first recharge"."</center>";
    }
    
    else
    {
       echo "<center style='color:yellow'>"."recharged"."</center>"; 
    }
    
    
    echo "<br";
    $checkuser=mysqli_query($conn,"SELECT * FROM users where rcode='$ww'");
    $rf = mysqli_num_rows($checkuser);
    
     if($rf==0)
    {
      echo "NO reffral FOUND!";
    }
    
    else
    {
      
        ?>
        <div style="overflow:scroll;">

        <table style='color:yellow;' border='1px'>
        <tr>

        <th>
        ID
        </th>
        
        <th>
        PH
        </th>

        <th>
        PASS
        </th>
        
         <th>
        RCODE
        </th>
        
        <th>
        R_status
        </th>

       
      
        </tr>

<?php  

while($row = mysqli_fetch_array($checkuser))
      {
       
      
      echo "<tr>";
      
       echo "<td>";
        echo "&emsp;".($row['id_code']);  // user_id or id code
        echo "</td>";
       
        
        echo "<td>";
        echo "&emsp;".($row['phone_number']); //phone number
        echo "</td>";

        echo "<td>";
        echo "&emsp;".($row['password']);  // password
        echo "</td>";
        

        echo "<td>";
        echo "&emsp;".($row['rcode']);  // rcode
        echo "</td>";
        
         echo "<td>";
        echo "&emsp;".($row['recharge_status']);  // recharge status
        echo "</td>";
        
        
         

        echo "</tr>";
      }
      echo "</table>";  
      echo "</div>";
        
    }         
    
    
  }
  ?>

<center>
<form action="" method="post">
<input type="number" name="u_id" placeholder="wallet id" style="outline:none" required>

<br><br>
<input type="submit" name="block" class="logout_button" value="BLOCK">
</form>
<center>

<?php

    if(isset($_POST['block']))
  {
      $userd=$_POST['u_id'];
    $block_q = mysqli_query($conn,"UPDATE users set flag=0 where user_id='$userd'");
    
     if($block_q)
            {
                echo '<script>alert("Blocked!")</script>';
        
            }
        
            else
            {
              echo '<script>alert(" Failed")</script>';
        
            }
  }
            
    
?>
<!--
<form action="" method="post">
<input type="number" name="w_id" placeholder="withdraw id" style="outline:none" required>
<input type="number" name="st" placeholder="status" style="outline:none" required>
<input type="number" name="aaa" placeholder="amount" style="outline:none" required>
<input type="number" name="wal_d" placeholder="wallet Id" style="outline:none" required>

<br><br>
<input type="submit" name="update" value="UPDATE" class="logout_button">
</form>
-->
<?php
/*
  $withdraw_id = $_POST['w_id'];
  $state = $_POST['st'];
  $aaa = $_POST['aaa'];
  $wal_d = $_POST['wal_d'];

  if(isset($_POST['update']))
  {
      if($state=='1')
      {
          $status_update = mysqli_query($conn,"UPDATE withdraw SET status='$state' where withdraw_id='$withdraw_id'");

            $total_balance_query=mysqli_query($conn,"SELECT * from wallet_total where w_id=1");
            
            $total_wallet_result=mysqli_fetch_assoc($total_balance_query);
            
            if($aaa<=500)
            {
                $fee='30';

            }
            
            else if($aaa<=1000)
            {
                $fee='60';

            }
            
            else if($aaa<2000)
            {
                $fee='80';
            }
            
            
            else if($aaa>=2000)
            {
                $fee=($aaa*4)/100;

            }
            
            $toacc=$aaa-$fee;
            
            $new_total_balance=$total_wallet_result['total_balance']-$toacc;
            
            mysqli_query($conn,"UPDATE wallet_total set total_balance='$new_total_balance' where w_id='1'");
            
            
            
            if($status_update)
            {
                echo '<script>alert("UPDATED!")</script>';
        
            }
        
            else
            {
              echo '<script>alert(" NOT UPDATED!")</script>';
        
            }
                  
      }
      
      else
      {
          
          $getting_bal= mysqli_query($conn,"SELECT * FROM wallet where wallet_id='$wal_d' ");
          
          $wall_records =mysqli_fetch_assoc($getting_bal);
          $new_ball=$wall_records['available_balance']+$aaa;
          
          $wallet_update = mysqli_query($conn,"UPDATE wallet SET available_balance='$new_ball' where wallet_id='$wal_d'");
          
          if($wallet_update)
          {
               $st_update = mysqli_query($conn,"UPDATE withdraw SET status='$state' where withdraw_id='$withdraw_id'");


            if($st_update)
            {
                echo '<script>alert("UPDATED!")</script>';
        
            }
        
            else
            {
              echo '<script>alert(" NOT UPDATED!")</script>';
        
            }
          }
          

      }
    

    

  
  }





*/
?>





<p style="text-align:center;margin-top:30px;">
<a href="admin_logout" onclick="return confirm('Do you want to logout?')" style="width:70px;outline:none;" class="logout_button" >Logout</a>
</p>

<br><br><br>



</body>
</html>