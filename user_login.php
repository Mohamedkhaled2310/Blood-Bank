<?php 
session_start();
require ('admin/config.php');

if(isset($_POST['submit'])){
$national_id = $_POST['national_id'];
$email = $_POST['email'];
$name = $_POST['name'];
$password = md5($_POST['pswd']);

$query = "SELECT * FROM `client` WHERE national_id = '$national_id'";
$result_query = mysqli_query($con, $query);

if(mysqli_num_rows($result_query) > 0){
	echo '<script>alert("هذا الحساب مسجل بالفعل "); location.replace(document.referrer);</script>';
 }else{
	   $insert = "INSERT INTO client(national_id, email,name,password) VALUES('$national_id','$email','$name','$password')";
	   $regist = mysqli_query($con, $insert);
	   if($regist){
		echo '<script>alert("تم التسجيل بنجاح"); location.replace(document.referrer);</script>';
		  
	  }
	  else{
		echo '<script>alert("حدث خطأ"); location.replace(document.referrer);</script>';
		  
	  }
 }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>تسجبل الدخول/ انشاء حساب</title>
    <link rel="stylesheet" type="text/css" href="css/user.css">
    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@500&display=swap" rel="stylesheet">
</head>
<body>
<div class="main">
    <input type="checkbox" id="chk" aria-hidden="true">

    <div class="signup">
        <form action = "user_login.php" method="post">
            <label for="chk" aria-hidden="true">انشاء حساب </label>
            <input pattern="[0-9]+" maxlength="14" minlength="14" required oninvalid="this.setCustomValidity('الرجاء كتابة الرقم القومي ')"
                   oninput="this.setCustomValidity('')" type="text" name="national_id" placeholder="الرقم القومي" />
            <input type="email" name="email" placeholder="الايميل" required="">
            <input type="text" name="name" placeholder="الاسم" required="">
            <input type="password" name="pswd" placeholder="كلمة المرور" required="">
            <button type = "submit" name = "submit"> انشاء حساب </button>
        </form>
    </div>

    <div class="login">
        <form action = "check_login.php" method="post">
            <label for="chk" aria-hidden="true">تسجيل الدخول</label>
            <input type="number" name="national_id" placeholder="الرقم القومي" required="">
            <input type="password" name="pass" placeholder="كلمة السر" required="">
            <a href="sendmail/forgot-password.php" style="color: whitesmoke; font-weight: bold; margin-left: 170px;"> هل نسيت كلمة السر </a>
            <button>تسجيل دخول </button>
        </form>
    </div>
</div>
</body>
</html>
