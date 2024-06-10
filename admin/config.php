<?php
ob_start();
$con = mysqli_connect("localhost", "root", "", "blood_bank"); 
$code = rand(100000,999999);
if(mysqli_connect_errno()) 
{
	echo "Failed to connect: " . mysqli_connect_errno();
}

?>