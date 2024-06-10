<?php
session_start();
require ('config.php');
if (isset($_SESSION['login_user'])) {
$userLoggedIn = $_SESSION['login_user'];

$id = ($_GET['id']);

if(isset($_POST['submit'])){

   $pass = md5($_POST['password']);
   $cpass = md5($_POST['cpassword']);

      if($pass != $cpass){
         $error[] = '! كلمة السر غير متطابقة ';
      }else{
         $update = "update user set passsword = '$cpass' where id = '$id'";
         $query = mysqli_query($con, $update);
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

;

}
else {
   header("location:logout.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">

   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>سجل الان</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="style.css">

</head>
<body>
   
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

      <input type="password" name="password" required placeholder=" ادخل كلمة السر الجديدة">
      <input type="password" name="cpassword" required placeholder="تاكيد كلمة السر">
      <input type="submit" name="submit" value="تحديث" class="form-btn">
   </form>

</div>

</body>
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
                    window.location = "supervisor2.php";

            });

    </script>
    <?php
    unset($_SESSION['status']);
}
?>

</body>
</html>