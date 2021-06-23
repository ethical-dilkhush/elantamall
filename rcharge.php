<?php
include("connection.php");
session_start();
error_reporting(0);

$od=$_GET['od'];
$wi=$_GET['wi'];
$am=$_GET['am'];

$get_balance= mysqli_query($conn,"SELECT * FROM wallet where wallet_id='$wi'");
  $balance = mysqli_fetch_assoc($get_balance);
  $new_balance = $balance['available_balance'];
  
  //$addon=($am*50)/100;
   
  $new_balance = $new_balance + $am;
  
   $status_update = mysqli_query($conn,"UPDATE recharge SET status='1' where order_number='$od'");
   
   if($status_update)
    {
      $wallet_update = mysqli_query($conn,"UPDATE wallet SET available_balance='$new_balance' where wallet_id='$wi'");

      if($wallet_update)
      {
          
          
        $check = mysqli_query($conn,"SELECT * FROM users WHERE user_id='$wi'");
        $user_result = mysqli_fetch_assoc($check);
        $recharge_status = $user_result['recharge_status'];

        if($recharge_status=='0')
        {
          $person = $user_result['rcode'];
          $reffrer = mysqli_query($conn,"SELECT * FROM promotion where wallet_id='$person'");

          $reffrer_result = mysqli_fetch_assoc($reffrer);
          $new_bonus = $reffrer_result['bonus']+138;
          $new_contribution = $reffrer_result['contribution']+138;

          $updating = mysqli_query($conn,"UPDATE promotion SET bonus='$new_bonus', contribution='$new_contribution' where wallet_id='$person'");
          if($updating)
          {
            mysqli_query($conn,"UPDATE users set recharge_status='1' where user_id='$wi'");
          }

          else
          {
            echo '<script>alert("Bonus not update in reffral")</script>';
            echo '<script>window.location.href="recharge_dept"</script>';
          }

          
        }
        
        echo '<script>alert("WALLET AND STATUS UPDATED!")</script>';
        echo '<script>window.location.href="recharge_dept"</script>';


      }

      else
      {
        echo '<script>alert("WALLET NOT UPDATED!")</script>';
        echo '<script>window.location.href="recharge_dept"</script>';


      }

    }

    else
    {
      echo '<script>alert("STATUS NOT UPDATED!")</script>';
      echo '<script>window.location.href="recharge_dept"</script>';

    }