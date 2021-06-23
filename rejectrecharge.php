<?php
include("connection.php");
session_start();
error_reporting(0);

$od=$_GET['od'];
$status_update = mysqli_query($conn,"UPDATE recharge SET status='2' where order_number='$od'");
 if($status_update)
    {
     
        echo '<script>alert("rejected")</script>';
        echo '<script>window.location.href="recharge_dept"</script>';

      }

      else
      {
        echo '<script>alert("NOT UPDATED!")</script>';
        echo '<script>window.location.href="recharge_dept"</script>';
      }
?>
