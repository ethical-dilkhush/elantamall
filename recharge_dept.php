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
<!--<link rel="stylesheet" href="my_account.css"> -->
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
<br>
<input type="submit" name="find" class="logout_button" value="SHOW DATA">
</form>

<center>
 
<?php
  
  if(isset($_POST['find']))
  {
      date_default_timezone_set("Asia/Kolkata");
      $date = date('Y-m-d');
      
    $inserting = mysqli_query($conn,"SELECT * FROM recharge where  status='0' && date>='$date' ORDER BY order_number DESC LIMIT 30 ");
    $records = mysqli_num_rows($inserting);

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
        ORDER_NUMBER
        </th>

        <th>
        WALLET_ID
        </th>

        <th>
        UPI_ID
        </th>

        <th>
        AMOUNT
        </th>

        <th>
        DATE
        </th>

        <th colspan="2">
        UPDATE
        </th>
      
        </tr>

<?php
      while($row = mysqli_fetch_array($inserting))
      {


        echo "<tr>"; 
        echo "<td>";
        echo "&emsp;".($row['order_number']);  // order number
        echo "</td>";

        echo "<td>";
        echo "&emsp;".($row['wallet_id']);  // wallet id
        echo "</td>";

        echo "<td>";
        echo "&emsp;".($row['upi_id']);  // upi id
        echo "</td>";

        echo "<td>";
        echo "&emsp;".($row['recharege_amount']);  // amount
        echo "</td>";

        echo "<td>";
        echo "&emsp;".($row['date']);  // date
        echo "</td>";
        
        echo "<td>";
        echo "<a href='rcharge.php?od=$row[order_number]&wi=$row[wallet_id]&am=$row[recharege_amount]'>APPROVE</a>";
        echo "</td>";
        
        echo "<td>";
        echo "<a href='rejectrecharge.php?od=$row[order_number]'>REJECT</a>";
        echo "</td>";

        echo "</tr>";
      }
      echo "</table>";  
      echo "</div>";
        
    }         
    
        
}
?>

<form action="" method="post">
<br>
<input type="submit" name="Show_all" class="logout_button" value="SHOW All Data">
</form>

<?php
  
  if(isset($_POST['Show_all']))
  {
      date_default_timezone_set("Asia/Kolkata");
      $date = date('Y-m-d');
      
    $inserting = mysqli_query($conn,"SELECT * FROM recharge where  status='0'  ORDER BY order_number DESC ");
    $records = mysqli_num_rows($inserting);

    if($records==0)
    {
      echo "NO DATA FOUND!";
    }

    else
    {
        ?>
        <div style="overflow:scroll;height:100%;width:100%">

        <table style='color:yellow;' border='1px'>
        <tr>

        <th>
        ORDER_NUMBER
        </th>

        <th>
        WALLET_ID
        </th>

        <th>
        UPI_ID
        </th>

        <th>
        AMOUNT
        </th>

        <th>
        DATE
        </th>

        <th colspan="2">
        UPDATE
        </th>
      
        </tr>

<?php
      while($row = mysqli_fetch_array($inserting))
      {


        echo "<tr>"; 
        echo "<td>";
        echo "&emsp;".($row['order_number']);  // order number
        echo "</td>";

        echo "<td>";
        echo "&emsp;".($row['wallet_id']);  // wallet id
        echo "</td>";

        echo "<td>";
        echo "&emsp;".($row['upi_id']);  // upi id
        echo "</td>";

        echo "<td>";
        echo "&emsp;".($row['recharege_amount']);  // amount
        echo "</td>";

        echo "<td>";
        echo "&emsp;".($row['date']);  // date
        echo "</td>";
        
        echo "<td>";
        echo "<a href='rcharge.php?od=$row[order_number]&wi=$row[wallet_id]&am=$row[recharege_amount]'>APPROVE</a>";
        echo "</td>";
        
        echo "<td>";
        echo "<a href='rejectrecharge.php?od=$row[order_number]'>REJECT</a>";
        echo "</td>";

        echo "</tr>";
      }
      echo "</table>";  
      echo "</div>";
        
    }         
    
        
}
?>


<!--
<form action="" method="post">
<input type="number" name="order_number" placeholder="order number" style="outline:none" required>
<input type="number" name="wallet_id" placeholder="wallet id" style="outline:none" required>
<input type="number" name="amt" placeholder="enter amount" style="outline:none" required>


<br><br>
<input type="submit" name="update" value="UPDATE" class="logout_button">
</form>
-->
<?php
/*
  $order = $_POST['order_number'];
  $amount = $_POST['amt'];
  $wallet = $_POST['wallet_id'];

  $get_balance= mysqli_query($conn,"SELECT * FROM wallet where wallet_id='$wallet'");
  $balance = mysqli_fetch_assoc($get_balance);
  $new_balance = $balance['available_balance'];

  $new_balance = $new_balance + $amount;

  if(isset($_POST['update']))
  {
    $status_update = mysqli_query($conn,"UPDATE recharge SET status='1' where order_number='$order'");


    if($status_update)
    {
      $wallet_update = mysqli_query($conn,"UPDATE wallet SET available_balance='$new_balance' where wallet_id='$wallet'");

      if($wallet_update)
      {
        $check = mysqli_query($conn,"SELECT * FROM users WHERE user_id='$wallet'");
        $user_result = mysqli_fetch_assoc($check);
        $recharge_status = $user_result['recharge_status'];

        if($recharge_status=='0')
        {
          $person = $user_result['rcode'];
          $reffrer = mysqli_query($conn,"SELECT * FROM promotion where wallet_id='$person'");

          $reffrer_result = mysqli_fetch_assoc($reffrer);
          $new_bonus = $reffrer_result['bonus']+128;
          $new_contribution = $reffrer_result['contribution']+128;

          $updating = mysqli_query($conn,"UPDATE promotion SET bonus='$new_bonus', contribution='$new_contribution' where wallet_id='$person'");
          if($updating)
          {
            mysqli_query($conn,"UPDATE users set recharge_status='1' where user_id='$wallet'");
            echo '<script>alert("WALLET AND STATUS UPDATED!")</script>';
          }

          else
          {
            echo '<script>alert("WALLET NOT UPDATED!")</script>';
          }

          
        }
        echo '<script>alert("WALLET AND STATUS UPDATED!")</script>';

      }

      else
      {
        echo '<script>alert("WALLET NOT UPDATED!")</script>';

      }

    }

    else
    {
      echo '<script>alert("STATUS NOT UPDATED!")</script>';


    }
  }

*/

?>

<center>
    
    <form action="" method="POST">
        <input type="text" name="n_upi" placeholder="Enter new UPI" Style="outline:none" required>
        <br><br>
        <input type="submit" name="new_upi" class="logout_button" value="UPDATE UPI">
    </form>
</center>

<?php
if(isset($_POST['new_upi']))
{
    $new_upi=$_POST['n_upi'];
    $update_upi=mysqli_query($conn,"UPDATE recharge_upi set upi_id='$new_upi' where admin_id='$id'");
    
    if($update_upi)
    {
        echo '<script>alert("NEW UPI ADDED!!")</script>';
    }
    
    else
    {
        echo '<script>alert("FAILED")</script>';
    }
}

?>


<p style="text-align:center;margin-top:30px;">
<a href="admin_logout" onclick="return confirm('Do you want to logout?')" style="width:70px;outline:none;" class="logout_button" >Logout</a>
</p>

<br><br><br>



</body>
</html>