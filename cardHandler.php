<?php
session_start();
include("connection.php");
error_reporting(0);

$id = $_SESSION['id'];

$userphone = $_SESSION['phonenumber'];
 
if($userphone==true);

else
header("location:login");

if(isset($_POST['ch']) && isset($_POST['name']) && isset($_POST['ifsc']) && isset($_POST['bank']) && isset($_POST['account']) && isset($_POST['phone']) && isset($_POST['email']))
{
    $checking = "SELECT * from bank_cards where wallet_id=$id";
    $check_run = mysqli_query($conn,$checking);
    $total_records_found = mysqli_num_rows($check_run);
    
    if($_POST['ch']=="" || $_POST['name']=="" || $_POST['ifsc']=="" || $_POST['bank']=="" || $_POST['account']=="" || $_POST['phone']=="" || $_POST['email']=="" )
    {
        echo "fill all fields";
    }
    else if($total_records_found>=2)
    {
        echo "You Can Add Only Two Cards";
    }
    
    else
    {
    
        //storing values to variables
       $ch = $_POST['ch'];
       $name = $_POST['name'];
       $ifsc = $_POST['ifsc'];
       $bank = $_POST['bank'];
       $upi = $_POST['account'];
       
       switch($ch)
       {
           case 'bank_card':
                
                    //to find the bank card id of the new user here we find the total records.
                    $q= "SELECT * from bank_cards";
                    $d = mysqli_query($conn,$q);
                    $getid= mysqli_num_rows($d);
                    $getid = $getid+1; //total records + 1 will be the new id of the new user.
                        
                    
                    //inserting into the bank_cards table
                    $qry = "INSERT INTO bank_cards Values('$getid','$name','$ifsc','$bank','$upi','$id')";
                    $true = mysqli_query($conn,$qry);
                    
                    if($true)
                    { 
                        echo "success";                        
                    }
        
                    else
                    {
                        echo "fail";
                    }
               break;
            case 'upi':
                 //to find the bank card id of the new user here we find the total records.
                    $q= "SELECT * from bank_cards";
                    $d = mysqli_query($conn,$q);
                    $getid= mysqli_num_rows($d);
                    $getid = $getid+1; //total records + 1 will be the new id of the new user.
                        
                    
                    //inserting into the bank_cards table
                    $qry = "INSERT INTO bank_cards Values('$getid','$name','$ifsc','$bank','$upi','$id')";
                    $true = mysqli_query($conn,$qry);
                    
                    if($true)
                    { 
                        echo "success";                        
                    }
        
                    else
                    {
                        echo "fail";
                    }
                break;
       }
    }
}
else
{
    echo "Something Went Wrong:(";
}

?>