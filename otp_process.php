<?php
session_start();

$ch = $_POST['ch'];


switch ($ch)
{
	
    case 'send_otp':
        $num = $_POST['mob'];
        $_SESSION['phn'] =	$num ;
        $num=substr("$num",3,10);
        $otp = rand(10000,999999);
        $_SESSION['otp']  = $otp;
        
        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => "http://2factor.in/API/V1/4208ef86-9a7e-11eb-80ea-0200cd936042/SMS/".$num."/".$otp."",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_POSTFIELDS => "",
        CURLOPT_HTTPHEADER => array(
        "content-type: application/x-www-form-urlencoded"
        ),
        ));

		$response = curl_exec($curl);
		$err = curl_error($curl);

		curl_close($curl);

		if ($err) {
		  echo "cURL Error #:" . $err;
		} else {
		  echo "success";
		}
			
		break;

		case 'verify_otp':

			include("connection.php");
			
				// storing form data into variables
				$user_otp = $_POST['otp'];
				$verify_otp = $_SESSION['otp'];
				$phone = $_POST['mob'];
    			$passwd = $_POST['pwd'];
    		    $code = $_POST['rcode'];
    			$ppp=$_SESSION['phn']; 
                date_default_timezone_set("Asia/Kolkata");
                $join_date = date('Y-m-d H:i:s');

				if($verify_otp == $user_otp && $ppp==$phone )
				{

					
					//checking if number already exist or not
					$check_query = "SELECT * from users where phone_number='$phone'";
					$checking = mysqli_query($conn,$check_query);
					$rows_found = mysqli_num_rows($checking);

					if($rows_found>0)
					{
                        //if 1 row found,means number exist.So show error message
                        echo "exist";
					}

					else 
					{
		
					   //to find the id of the new user here we find the total records.
						$q= "SELECT * from users";
						$d = mysqli_query($conn,$q);
						$getid= mysqli_num_rows($d);
						$getid = $getid+1001; //total records + 1 will be the new id of the new user.

					   //inserting into the users table
						$query = "INSERT INTO users Values('$getid','$phone','$passwd','$code','$getid','1','0','$join_date')";
						$data = mysqli_query($conn,$query);
					
					if($data)
					{
                        //inserting into the wallet table
                        $query_wallet = "INSERT into wallet values('$getid','$getid','20')";
                        mysqli_query($conn,$query_wallet);
                        
                        //to find the order number.
                        $od= "SELECT * from recharge";
                        $d_r = mysqli_query($conn,$od);
                        $order= mysqli_num_rows($d_r);
                        $order = $order+1; //total records + 1 will be the new order number.
                        

                        //finding unique promotion id to insert
                        $sql_promotion= "SELECT * from promotion";
                        $data_sql_promotion = mysqli_query($conn,$sql_promotion);
                        $promotion_id= mysqli_num_rows($data_sql_promotion);
                        $promotion_id = $promotion_id+1001; //total records + 1 will be the new id of the new user.


                        //inserting into promotion table
                        $inserting = "INSERT INTO promotion values('$promotion_id','0','0','$getid','0','0','0')";
                        mysqli_query($conn,$inserting);

                        
                        //checking the old bonus and number of refrals of the refering account
                        $refrals = mysqli_query($conn,"SELECT * from promotion where promotion_id ='$code'");
                        $refrals_result  =  mysqli_fetch_assoc($refrals);
                        $number_of_refrals = $refrals_result['refrals'];
                        $total_bonus = $refrals_result['bonus'];
                        $number_of_refrals = $number_of_refrals+1;

                        $add_refral = "Update promotion set refrals='$number_of_refrals' where promotion_id ='$code' ";
                        mysqli_query($conn,$add_refral);   
                        
                        //finding level2 reffrer
                        $finding_rcode=mysqli_query($conn,"SELECT * from users where user_id='$code'");
                        $finding_rcode_result=mysqli_fetch_assoc($finding_rcode);
                        
                        $level2_rcode= $finding_rcode_result['rcode'];
                        $level2_promotion_record=mysqli_query($conn,"SELECT * from promotion where promotion_id='$level2_rcode'");
                        
                        $level2_promotion_record_result=mysqli_fetch_assoc($level2_promotion_record);
                        
                        $number_of_peoples=$level2_promotion_record_result['level2_people'];
                        $number_of_peoples=$number_of_peoples+1;
                        
                        mysqli_query($conn,"Update promotion set level2_people='$number_of_peoples' where promotion_id ='$level2_rcode'");
                        
                        
                        //if data inserted succesfuly , goto login page
                        echo "success";

					}

						else
						{
						echo "wrong";
						}
					}
					
								
	
				}


		break;


	default:
		# code...
		break;
}

?>