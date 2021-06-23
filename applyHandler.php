<?php
session_start();
include("connection.php");
error_reporting(0);

$userphone = $_SESSION['phonenumber'];
 
if($userphone==true);

else
header("location:login");

$id = $_SESSION['id'];
$promotiondata = mysqli_query($conn,"SELECT * from promotion where wallet_id = '$id'");
$total_rows_found = mysqli_num_rows($promotiondata);
$promotionresult = mysqli_fetch_assoc($promotiondata);

$reff=$promotionrecords['refrals'];
$contri=$promotionrecords['contribution'];


$new_apply=mysqli_query($conn,"SELECT * from apply_bonus");
$apply_id = mysqli_num_rows($new_apply);
$apply_id=$apply_id+1000;

if(isset($_POST['amt']))
{
    if($_POST['amt']=="")
    {
        echo "Please Fill Amount";
    }
    else
    {
      $amount = $_POST['amt'];
      $bonus = $promotionresult['bonus'];
      $promo_id=$promotionresult['promotion_id'];
      
      if($amount<100)
      {
          echo "Amount Must Be Greater Than 100";
      }
      
      else if($bonus==0 || $bonus<$amount)
      {
          echo "insufficient Bonus";
      }
      
      
      else
      {
         $applying=mysqli_query($conn,"INSERT INTO apply_bonus values('$apply_id','$promo_id','$amount','0')");
         
        if($applying)
        {
          $remaining_bonus = $promotionresult['bonus']-$amount;
          mysqli_query($conn,"UPDATE promotion set bonus='$remaining_bonus' where promotion_id=$id");
          
          echo "success";
        }
        else
        {
            echo "fail";
        }
      }
  
    }
}
else
{
    echo "Something Went wrong:(";
}
?>