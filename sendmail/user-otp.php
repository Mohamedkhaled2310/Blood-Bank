<?php
session_start();
require '../config.php';
  if(isset($_POST['submit'])){
      $otp_code = mysqli_real_escape_string($con, $_POST['otp']);
        $check_code = "SELECT * FROM client WHERE code = $otp_code";
        $code_res = mysqli_query($con, $check_code);
        if(mysqli_num_rows($code_res) > 0){
            $fetch_data = mysqli_fetch_assoc($code_res);
            $email = $fetch_data['email'];
            $_SESSION['client-email'] = $email;
        echo
   "
   <script>
   alert('الكود صحيح');
   document.location.href = 'new-password.php';
   </script>
   ";
     $update = "update user set code = 0 where email = '$email' ";
      $run = mysqli_query($con,$update);
        }
     else{
        echo
        "
        <script>
        alert('الكود غير صحيح');
        document.location.href = 'user-otp.php';
        </script>
        ";
     }
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>كود التفعيل</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-4 offset-md-4 form">
                <form action="user-otp.php" method="POST">
                    <h2 class="text-center">كود التفعيل</h2>
           
                    <div class="form-group">
                        <input class="form-control" type="number" name="otp" placeholder="ادخل كود التفعيل" required>
                    </div>
                    <div class="form-group">
                        <input class="form-control button" type="submit" name="submit" value="ارسال">
                    </div>
                </form>
            </div>
        </div>
    </div>
    
</body>
</html>