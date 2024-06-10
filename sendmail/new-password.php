<?php
session_start();
require '../config.php';
if(isset($_POST['submit'])){
  $pass = md5($_POST['password']);
  $cpass = md5($_POST['cpassword']);
  $email = $_SESSION['_user-email'];
  if($pass == $cpass){
      $update = "update client set passsword = '$cpass' where email = '$email' ";
      $run = mysqli_query($con,$update);
    echo
    "
    <script>
    alert('تم تغيير كلمة السر بنجاح');
    document.location.href = 'user_login.php';
    </script>
    ";
  }
  else{
    echo
    "
    <script>
    alert('!كلمة السر غير متطابقة');
    document.location.href = 'new-password.php';
    </script>
    ";
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>كلمة السر الجديدة</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-4 offset-md-4 form">
                <form action="" method="POST">
                    <h2 class="text-center">كلمة السر الجديدة</h2>

                    <div class="form-group">
                        <input class="form-control" type="password" name="password" placeholder="كلمة السر الجديدة" required>
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="password" name="cpassword" placeholder="تاكيد كلمةالسر الجديدة" required>
                    </div>
                    <div class="form-group">
                        <input class="form-control button" type="submit" name="submit" value="تغيير ">
                    </div>
                </form>
            </div>
        </div>
    </div>
    
</body>
</html>