<?php
include("connection.php");
session_start();
error_reporting(0);

$userphone = $_SESSION['phonenumber'];
$key = $_SESSION['pass'];
if($userphone==true);

else
header("location:login");


$id = $_SESSION['id'];
$walletdata = mysqli_query($conn,"SELECT * from wallet where user_id = $id");
$walletresult = mysqli_fetch_assoc($walletdata);

$carddata = mysqli_query($conn,"SELECT * from bank_cards where wallet_id=$id");
$total_cards_found = mysqli_num_rows($carddata);




if(isset($_POST['amt']) && isset($_POST['pwd']) && isset($_POST['card']))
{
    if($_POST['amt']=="" || $_POST['pwd']=="")
    {
        echo "fill all fields";
    }
    
    else
    {
        if($_POST['card']=="Select Bank Card")
        {
            echo "select Card";
        }
         
        else
         {
        
            
          $amount = $_POST['amt'];
          $balance = $walletresult['available_balance'];
          $pass = $_POST['pwd'];
          $upi_id=$_POST['card'];
           date_default_timezone_set("Asia/Kolkata");
            $date = date('Y-m-d H:i:s');
      
          
          if($balance==0 || $balance<$amount)
          {
              echo "insufficient Balance";
          }
          
          else if($amount<230)
          {
              echo "amount must be greater than 230";
          }
          
          else if($pass!=$key)
          {
              echo "wrong Password";
          }
          
          else
          {
         
            $new = mysqli_query($conn,"SELECT * from withdraw");
            $rows_found = mysqli_num_rows($new);
            $rows_found = $rows_found+1001;
           
          
           $sql =mysqli_query($conn,"INSERT INTO withdraw values('$rows_found','$upi_id','$amount','$id','$date','0')");
            if($sql)
            {
              $remaining_balance = $walletresult['available_balance']-$amount;
              mysqli_query($conn,"UPDATE wallet set available_balance='$remaining_balance' where wallet_id=$id");
    		
              echo "success";
            }
    
            else
            {
              echo "Please try Again Later!";
              
            }
          }
        
        
        }
        
    }
}     


else

{
    echo "Something Went wrong:(";
}


?>