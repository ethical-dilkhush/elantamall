<?php
include("connection.php");
include("remote.php");
session_start();
error_reporting(0);

$wd=$_GET['wd'];
$wi=$_GET['wi'];
$am=$_GET['am'];
$st=$_GET['st'];

switch($st)
{
    case 1:
          $status_update = mysqli_query($conn,"UPDATE withdraw SET status='$st' where withdraw_id='$wd'");

            $total_balance_query=mysqli_query($remote,"SELECT * from wallet_total where w_id=1");
            
            $total_wallet_result=mysqli_fetch_assoc($total_balance_query);
            
            if($am<=500)
            {
                $fee='30';

            }
            
            else if($am<=1000)
            {
                $fee='60';

            }
            
            else if($am<2000)
            {
                $fee='80';
            }
            
            
            else if($am>=2000)
            {
                $fee=($am*4)/100;

            }
            
            $toacc=$am-$fee-6;
            
            $new_total_balance=$total_wallet_result['total_balance']-$toacc;
            
            if($wi==1125);
            
            else
            {
            mysqli_query($remote,"UPDATE wallet_total set total_balance='$new_total_balance' where w_id='1'");
            }
            
            
            if($status_update)
            {
                echo '<script>alert("UPDATED!")</script>';
                echo '<script>window.location.href="withdraw_dept"</script>';
        
            }
        
            else
            {
              echo '<script>alert(" NOT UPDATED!")</script>';
              echo '<script>window.location.href="withdraw_dept"</script>';
        
            }
            
            break;
            
            case 2:
                 
          $getting_bal= mysqli_query($conn,"SELECT * FROM wallet where wallet_id='$wi' ");
          
          $wall_records =mysqli_fetch_assoc($getting_bal);
          $new_ball=$wall_records['available_balance']+$am;
          
          $wallet_update = mysqli_query($conn,"UPDATE wallet SET available_balance='$new_ball' where wallet_id='$wi'");
          
          if($wallet_update)
          {
               $st_update = mysqli_query($conn,"UPDATE withdraw SET status='$st' where withdraw_id='$wd'");


            if($st_update)
            {
                echo '<script>alert("UPDATED!")</script>';
                echo '<script>window.location.href="withdraw_dept"</script>';

        
            }
        
            else
            {
              echo '<script>alert(" NOT UPDATED!")</script>';
             echo '<script>window.location.href="withdraw_dept"</script>';
            }
          }
          
                break;
                
                case 3:
                 
          $getting_bal= mysqli_query($conn,"SELECT * FROM wallet where wallet_id='$wi' ");
          
          $wall_records =mysqli_fetch_assoc($getting_bal);
          $new_ball=$wall_records['available_balance']+$am;
          
          $wallet_update = mysqli_query($conn,"UPDATE wallet SET available_balance='$new_ball' where wallet_id='$wi'");
          
          if($wallet_update)
          {
               $st_update = mysqli_query($conn,"UPDATE withdraw SET status='$st' where withdraw_id='$wd'");


            if($st_update)
            {
                echo '<script>alert("UPDATED!")</script>';
                echo '<script>window.location.href="withdraw_dept"</script>';

        
            }
        
            else
            {
              echo '<script>alert(" NOT UPDATED!")</script>';
             echo '<script>window.location.href="withdraw_dept"</script>';
            }
          }
          
                break;
                
                case 4:
                 
          $getting_bal= mysqli_query($conn,"SELECT * FROM wallet where wallet_id='$wi' ");
          
          $wall_records =mysqli_fetch_assoc($getting_bal);
          $new_ball=$wall_records['available_balance']+$am;
          
          $wallet_update = mysqli_query($conn,"UPDATE wallet SET available_balance='$new_ball' where wallet_id='$wi'");
          
          if($wallet_update)
          {
               $st_update = mysqli_query($conn,"UPDATE withdraw SET status='$st' where withdraw_id='$wd'");


            if($st_update)
            {
                echo '<script>alert("UPDATED!")</script>';
                echo '<script>window.location.href="withdraw_dept"</script>';

        
            }
        
            else
            {
              echo '<script>alert(" NOT UPDATED!")</script>';
             echo '<script>window.location.href="withdraw_dept"</script>';
            }
          }
          
                break;
                
                case 5:
                 
          $getting_bal= mysqli_query($conn,"SELECT * FROM wallet where wallet_id='$wi' ");
          
          $wall_records =mysqli_fetch_assoc($getting_bal);
          $new_ball=$wall_records['available_balance']+$am;
          
          $wallet_update = mysqli_query($conn,"UPDATE wallet SET available_balance='$new_ball' where wallet_id='$wi'");
          
          if($wallet_update)
          {
               $st_update = mysqli_query($conn,"UPDATE withdraw SET status='$st' where withdraw_id='$wd'");


            if($st_update)
            {
                echo '<script>alert("UPDATED!")</script>';
                echo '<script>window.location.href="withdraw_dept"</script>';

        
            }
        
            else
            {
              echo '<script>alert(" NOT UPDATED!")</script>';
             echo '<script>window.location.href="withdraw_dept"</script>';
            }
          }
          
                break;
                
                case 6:
                 
          $getting_bal= mysqli_query($conn,"SELECT * FROM wallet where wallet_id='$wi' ");
          
          $wall_records =mysqli_fetch_assoc($getting_bal);
          $new_ball=$wall_records['available_balance']+$am;
          
          $wallet_update = mysqli_query($conn,"UPDATE wallet SET available_balance='$new_ball' where wallet_id='$wi'");
          
          if($wallet_update)
          {
               $st_update = mysqli_query($conn,"UPDATE withdraw SET status='$st' where withdraw_id='$wd'");


            if($st_update)
            {
                echo '<script>alert("UPDATED!")</script>';
                echo '<script>window.location.href="withdraw_dept"</script>';

        
            }
        
            else
            {
              echo '<script>alert(" NOT UPDATED!")</script>';
             echo '<script>window.location.href="withdraw_dept"</script>';
            }
          }
          
                break;
}

