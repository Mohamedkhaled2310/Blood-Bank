<?php
session_start();
require ('config.php');
if (isset($_SESSION['login_user'])) {
$userLoggedIn = $_SESSION['login_user'];

?>
<!DOCTYPE html>
<html lang="ar">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="css/stylevol.css">
    <title> Admin</title>
</head>

<body style="margin: 0;">



    <section class="main">
        <div class="center ">
            <a href="mainpage.php" class=" min-btn " > المتبرعين</a><br><br>
            <a href="mainpage_bank.php" class=" min-btn " >محتاج دم  </a><br><br>
            <a href="generate_pdf/pdf_maker.php" class=" min-btn " >التقرير اليومي</a><br><br>
            <a href="logout.php" class=" min-btn " > تسجيل خروج</a>
        </div>

    </section>

    </header>
    <?php
    }
    else {
    header("location:logout.php");
    }
    ?>
</body>

</html>