<?php
session_start();
error_reporting(0);
include("connection.php");

$userphone = $_SESSION['phonenumber'];
if($userphone==true);

else
header("location:login");


$id = $_SESSION['id'];
$q_avail = "SELECT * from wallet where user_id = $id";
$run_q_avail = mysqli_query($conn,$q_avail);
$wallet_result = mysqli_fetch_assoc($run_q_avail);



if(isset($_POST['amt']) && isset($_POST['ptype']) && isset($_POST['mobile']) && isset($_POST['name']) && isset($_POST['upi']))
{
    if($_POST['amt']=="" || $_POST['ptype']=="" || $_POST['mobile']=="" || $_POST['name']=="" || $_POST['upi']=="")
    {
        echo "fill all fields";
    }
    
    else if($_POST['amt']<100)
    {
        echo "amount must graeter than 100";
    }
    
    else
    {
      //finding upi id 
      $r_upi = mysqli_query($conn,"SELECT * FROM recharge_upi where status='1'");
      $rows_found = mysqli_num_rows($r_upi);
      
      if($r_upi)
      {
         if($rows_found==0)
        {
          echo "no merchant available";
    
        }
        
        else
        {
        
          $i=-1;
          while($row = mysqli_fetch_array($r_upi))
          {  
            $i++;
            $cards[$i]=$row['upi_id'];
          } 
        
          // storing form data into variables
          $r_amt= $_POST['amt'];
          $upi_id = $_POST['upi'];
          date_default_timezone_set("Asia/Kolkata");
          $date = date('Y-m-d H:i:s');
        
          //to find the order number.
          $q= "SELECT * from recharge";
          $d = mysqli_query($conn,$q);
          $order= mysqli_num_rows($d);
          $order = $order+1; //total records + 1 will be the new order number.
          
          $r_query = "INSERT into recharge values('$order','$id','$upi_id','$r_amt','$date','0')";
          $r_data = mysqli_query($conn,$r_query);
        
          if($r_data)
          {
              if($i=='1')
              {
                  $shuffle=rand(0,1);
              }
              else if($i=='2')
              {
                 $shuffle=rand(0,2); 
              }
              else
              {
                  $shuffle='0';
              }
            $_SESSION['upi'] = $cards[$shuffle];
            $_SESSION['order_number'] = $order;
            
            echo "success";
           }
          }
      }
      
      else
      {
         echo "Something Went wrong:(";
      }
    }
}

else
{
    echo "Something Went wrong:(";
}

?>
