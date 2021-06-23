<?php
include("connection.php");
session_start();
error_reporting(0);

$ad=$_GET['ad'];
$status_update = mysqli_query($conn,"UPDATE apply_bonus SET status='2' where apply_id='$ad'");

 if($status_update)
    {
     
        echo '<script>alert("rejected")</script>';
        echo '<script>window.location.href="promotion_dept"</script>';

      }

      else
      {
        echo '<script>alert("NOT UPDATED!")</script>';
        echo '<script>window.location.href="promotion_dept"</script>';
      }
?>
