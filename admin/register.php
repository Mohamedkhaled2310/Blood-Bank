<?php

require ('config.php');

if(isset($_POST['submit'])){

   $name = ($_POST['name']);
   $email = ($_POST['email']);
   $pass = md5(($_POST['password']));
   $cpass = md5(($_POST['cpassword']));


   $select = " SELECT * FROM user WHERE email = '$email' ";

   $result = mysqli_query($con, $select);

   if(mysqli_num_rows($result) > 0){

      $error[] = ' ! هذا الحساب مسجل بالفعل ';

   }else{

      if($pass != $cpass){
         $error[] = '! كلمة السر غير متطابقة ';
      }else{
         $insert = "INSERT INTO user(name, email, passsword) VALUES('$name','$email','$pass')";
         $query = mysqli_query($con, $insert);
         if($query){
            $_SESSION['status'] = "تم";
            $_SESSION['status_code'] = "success";
            
        }
        else{
            $_SESSION['status'] = "حدث خطأ";
            $_SESSION['status_code'] = "error";
            
        }
         
      }
   }

};


?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>سجل الان</title>

   <!-- custom css file link  -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Changa&display=swap" rel="stylesheet">
    <link href="//fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet">
   <link rel="stylesheet" href="style.css">

</head>
<body>


<nav class="navbar navbar-expand-lg navbar-dark   fixed-top " dir="rtl">
    <div class="container-fluid">
        <a class="navbar-brand" href="supervisor2.php"> Blood Bank</a>
        <ul class="navbar-nav me-auto my-2 my-lg-0" style="--bs-scroll-height: 100px; margin-left: 360px;">
            <li class="nav-item">
                <a class="nav-link" aria-current="page" dir="rtl" href="supervisor2.php">الرئيسية</a>
            </li>
            <li class="nav-item">
                <a class="nav-link " aria-current="page" dir="rtl" href="mainpage.php">المتبرعين</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="mainpage_bank.php" dir="rtl">طلبات الدم</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" href="register.php" dir="rtl">اضافة مستخدمين</a>
            </li>
        </ul>
    </div>
</nav>

   
<div class="form-container">

   <form action="" method="post">
      <h3>سجل الان</h3>
      <?php
      if(isset($error)){
         foreach($error as $error){
            echo '<span class="error-msg">'.$error.'</span>';
         };
      };
      ?>
      <input type="text" name="name" required placeholder="ادخل اسمك">
      <input type="email" name="email" required placeholder="ادخل بريدك الالكتروني">
      <input type="password" name="password" required placeholder="ادخل كلمة السر">
      <input type="password" name="cpassword" required placeholder="تاكيد كلمة السر">
      <input type="submit" name="submit" value="سجل الان" class="form-btn">
      
   </form>

</div>




</body>

<style>

    .bg-light{
        font-weight: bold;
    }
    .form-control{
        border-radius:8px;
        margin-right: 10px;
        padding: 8px;
        color: #819ade;
        font-weight: bold;
    }
    .navbar {
        position: fixed;
        width: 100%;
    }


    .btn-outline-success{
        color: whitesmoke;
        font-weight: bold;
        border: 1px solid #b3d7ff;
        margin-right: 10px;
        width: 70px;

    }
    .btn-outline-success:hover{
        background-color: #b3d7ff;
    }


    .navbar-nav{
        flex-direction: row;

    }
    .navbar{
        background-color: #0c1736;
        color: whitesmoke;
        font-weight: bold;
    }

    .navbar-nav .nav-link{
        padding-right: 10px;
        margin-left:10px ;
    }


    .block {
        display: block;
        width: 100%;
        border: none;
        color: white;
        padding: 14px 28px;
        font-size: 16px;
        cursor: pointer;
        text-align: center;
    }

    .block:hover {
        background-color: #ddd;
        color: white;
    }

    .navbar-brand  {
        margin-right: 5em;

    }

</style>


</html>



<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>

<script src="../sweetalert.js"></script>
<?php
if(isset($_SESSION['status']) && $_SESSION['status'] != '')
{
    ?>
    <script>
        swal({
            title: "الارسال",
            text: "<?php echo $_SESSION['status'];?>",
            icon: "<?php echo $_SESSION['status_code'];?>",
            buttons: "موافق",

        })
            .then((confirm) => {
                if (confirm)
                    window.location = "users_info.php";

            });

    </script>
    <?php
    unset($_SESSION['status']);
}
?>

</body>
</html>