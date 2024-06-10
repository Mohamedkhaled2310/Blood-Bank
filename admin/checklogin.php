<?php 
session_start();
ob_start(); 
require ('config.php');

$email = $_POST['email'];
$password = md5($_POST['password']);

$query = "SELECT * FROM `user` WHERE email = '$email' AND passsword = '$password'";
$result_query = mysqli_query($con, $query);
$row = mysqli_fetch_array($result_query);
$count_query = mysqli_num_rows($result_query);

if ($count_query != 0) 
	{

	$sessionemail = $row['email'];
	$_SESSION['login_user']= $sessionemail;
	$_SESSION['user_id'] = $row['id'];
	$_SESSION['name'] = $row['name'];
	if($row['id'] == 1){
		header("Location: supervisor2.php");
	}
	else{
    header("Location: admin_home.php");
	}
	exit();
	} 
else {
		    echo '<script>alert("كلمة السر او البريد الالكتروني خطأ !"); location.replace(document.referrer);</script>';
	}
?>