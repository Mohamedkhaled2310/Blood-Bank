<?php 
session_start();
session_destroy();

$_SERVER['HTTP_REFERER']="index.php";
header("Location:index.php");
?>