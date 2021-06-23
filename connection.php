<?php

$servername = "localhost";
$username = "czyrr7hi744m";
$password = "Veer@2222";
$dbname = "elantamall";

$conn = mysqli_connect($servername,$username,$password,$dbname);

if($conn)
{

}

else
{
die("connection failed because".mysqli_connect_error());
}




?>
