<?php
session_start();
error_reporting(0);
include("connection.php");

$userphone = $_SESSION['phonenumber'];
 
if($userphone==true)
{

}

else
{
    header("location:login");
}

$id = $_SESSION['id'];
$q_withdraw_records = "SELECT * from withdraw where wallet_id = $id order by withdraw_id DESC ";
$run_withdraw_records = mysqli_query($conn,$q_withdraw_records);
$total_rows_found = mysqli_num_rows($run_withdraw_records);

?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"/>

</head>
<style>
    *{
      margin: 0;
    }
    .u-div{
                height: 3.5em;
                background-color: #0081FF;
                width: 100%;
                position: absolute;
            }
</style>
<script>
    function goBack()
    {
        window.history.back();
    }
</script>
<body  style="background-color: #f1f1f1; color: #333;">
    
    <div class="u-div">
        <div onclick="goBack()" style="margin: 12px;color: white;position: absolute;font-size: 20px;" >
            <span> <i class="far fa-chevron-left"></i>&nbsp&nbspWithdraw Record</span>
            
        </div>
        <br>
        <br>


<?php
if($total_rows_found==0)
{
  echo "<center style='margin:5%;'>No Data Found!</center>";
}

else
{
    ?>
    <br>
      <div style="overflow-y:scroll;width:100%">
        
    <?php
 
  while($row = mysqli_fetch_array($run_withdraw_records))
  {
  
  echo "<table style='width:100%;'>";
  
    if($row['status']==0)
    {
      $status = "/assets/recharge_wait.png";
      $status_tag = "Wait";
    }

    else if($row['status']==1)
    {
      $status = "/assets/recharge_done.png"; 
      $status_tag = "Success";
    }
    
    else
    {
      $status = "/assets/recharge_fail.png"; 
      $status_tag = "Failed";
    }
   

    echo "<td >";
    ?>
    <img style="float:left;" src="<?php echo $status;?>" width="40" height="40">
    <?php
    echo "</td>";

    echo "<td>";
    echo "&emsp;".($row['amount']);  // amount
     if($row['amount']<=500)
    {
        $fee='30';
        echo '<span style = "color: grey;font-size:15px"> &emsp;fee:' . $fee . ' </span>';
        //echo "<br>"."<span style='color:grey'>fee:</span>{$fee}";
    }
    
    else if($row['amount']<=1000 && $row['amount']>500 )
    {
        $fee='60';
         echo '<span style = "color: grey;font-size:15px"> &emsp;fee:' . $fee . ' </span>';
    }
    
    else if($row['amount']<2000)
    {
        $fee='80';
         echo '<span style = "color: grey;font-size:15px"> &emsp;fee:' . $fee . ' </span>';
    }
    
    
    else if($row['amount']>=2000)
    {
        $fee=($row['amount']*4)/100;
         echo '<span style = "color: grey;font-size:15px"> &emsp;fee:' . $fee . ' </span>';
    }
    echo "</td>";

    echo "<td>";
    echo "&emsp;".$status_tag;  // status_tag
    
     $toacc=$row['amount']-$fee;
      echo '<span style = "color: grey;font-size:15px"> &emsp;acc:' . $toacc . ' </span>';
     //echo "<br>"."<i style='color:grey'>&emsp;acc:</i>".$toacc;

    //echo "<br>"."&emsp;acc:".$toacc;
    echo "</td>";

    echo "<td>";
    $temp_date=$row['time'];

    $temp_date=substr($temp_date,0,16);
    echo $temp_date;  // date
    echo "</td>";
    
    echo "</tr>";
    
     echo "<tr>";
    echo "<td colspan='4' style='color:blue'>";
    if($row['status']==2)
    {
        echo "Fail.Please try again later!!";
    }
    
    else if($row['status']==3)
    {
        echo "Betting amount is insufficient";
    }
    
    else if($row['status']==4)
    {
        echo "Please Use Bank Card!!";
    }
    else if($row['status']==5)
    {
        echo "Please Use UPI ID!!";
    }
    
     else if($row['status']==6)
    {
        echo "Please recharge Once to Withdraw!";
    }
     else if($row['status']==7)
    {
        echo "bhai promo ka task pura kr";
    }
    echo "</td>";  
    
    echo "</tr>";
    echo "</table>";
echo "<hr>";
    
  }            
}      
?>
 </div>

</body>
</html>