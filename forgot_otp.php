<?php
session_start();
$ch = $_POST['ch'];

switch ($ch) {
	case 'send_otp':

		$num = $_POST['mob'];
        $_SESSION['phn'] =	$num ;
        $num=substr("$num",3,10);
        $otp = rand(10000,999999);
        $_SESSION['otp']  = $otp;
			
			$curl = curl_init();

			curl_setopt_array($curl, array(
			     // CURLOPT_URL => "http://2factor.in/API/V1/9bce6ce9-9c7c-11eb-80ea-0200cd936042/SMS/9914471661/4499/WIN4CLUBS",
		   CURLOPT_URL => "http://2factor.in/API/V1/9bce6ce9-9c7c-11eb-80ea-0200cd936042/SMS/".$num."/".$otp."",
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
		  echo 'success';
		}
						

		break;

		case 'verify_otp':

			include("connection.php");

				$user_otp = $_POST['otp'];
				$verify_otp = $_SESSION['otp'];
				$ppp=$_SESSION['phn']; 
				// storing form data into variables
				 $phone = $_POST['mob'];
				 $new_pwd = $_POST['pwd'];

				if($verify_otp == $user_otp && $ppp==$phone ){

                    //checking if number already exist or not
                    $check_query = "SELECT * from users where phone_number='$phone'";
                    $checking = mysqli_query($conn,$check_query);
                    $rows_found = mysqli_num_rows($checking);

                    if($rows_found==0)
                    {
                        //if 1 row found,means number exist.So show error message
                        echo "exist";

                    }


                    else
                    {
                        //checking form blocked account
                        $check_flag = mysqli_query($conn,"SELECT * FROM users WHERE phone_number=$phone");
                        $status = mysqli_fetch_assoc($check_flag);

                        if($status['flag']==1)
                        {
                            $update = mysqli_query($conn,"UPDATE users set password='$new_pwd' where phone_number=$phone");

                            if($update)
                            {
                                echo "success";
                            }
                            else
                            {
                                echo "wrong";

                            }
                        }

                        else
                        {
                        
                        echo "success"; 
                        }
                    }

					
					
				}


		break;


	default:
		# code...
		break;
}

?>