<?php
require '../admin/config.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';

if(isset($_POST['submit'])){

    $email = $_POST['email'];
    $select = " SELECT * FROM client WHERE email = '$email' ";
    $result = mysqli_query($con, $select);

    if (mysqli_num_rows($result) > 0) {
        $update = "update client set code = '$code' where email = '$email'";
        $run = mysqli_query($con, $update);

        $mail = new PHPMailer(true);

        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'mohamedkhaled74222310@gmail.com';
        $mail->Password = 'bwra ueve hhpo wrsy';
        $mail->SMTPSecure = 'ssl';
        $mail->Port = 465;

        $mail->setFrom('mohamedkhaled74222310@gmail.com');
        $mail->addAddress($email);
        $mail->isHTML(true);

        $mail->Subject = "Code Verification";
        $mail->Body = "Your Code Verification is '$code'";
        $mail->send();
        echo
        "
   <script>
   alert('تم ارسال الكود');
   document.location.href = 'user-otp.php';
   </script>
   ";
    }
    else{
        echo
        "
   <script>
   alert('هذا البريد غير مسجل');
   document.location.href = '$_SERVER[HTTP_SERVER]';
   </script>
   ";
    }
}

?>