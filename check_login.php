<?php 
session_start();
require ('admin/config.php');

$national_id = $_POST['national_id'];
$password = md5($_POST['pass']);

$query = "SELECT * FROM `client` WHERE national_id = '$national_id'and password = '$password'";
$result_query = mysqli_query($con, $query);

$row = mysqli_fetch_array($result_query);
$count_query = mysqli_num_rows($result_query);

if ($count_query != 0) 
	{
	$_SESSION['national_id'] = $row['national_id'];
	$_SESSION['name'] = $row['name'];
		header("Location: index.php");
	exit();
	} 
else {
		    echo '<script>alert("كلمة السر او الرقم القومي خطأ !"); location.replace(document.referrer);</script>';
	}
?>
