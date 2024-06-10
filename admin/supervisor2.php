<?php
session_start();
require('config.php');
if (isset($_SESSION['login_user'])) {
    $userLoggedIn = $_SESSION['login_user'];

?>


<!DOCTYPE html>
<html lang="ar">

<head>
    <meta charset="UTF-8">
    <style>@import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');
* {
    font-family: Poppins,Changa,sans-serif!important;
        margin: 0;
    padding: 0;
    background-color: #071c2a;


}

body{
    font-family: Poppins,Changa,sans-serif!important;
}
    


.logo {
    text-decoration: none;
    color: #f0f0f0;
    text-transform: uppercase;
    font-weight: 700;
    font-size: 1.8em;
}

.nav a {
    direction: ltr;
    color: #f0f0f0;
    text-decoration: none;
    font-weight: 500;
    padding-left: 30px;
}

.nav a:hover {
    color: antiquewhite;
}

.main h2 {
    color: #3a6cf4;
    font-size: 3em;
    font-weight: 500;
}

.main h2 span {
    
    margin-top: 10px;
    color: #b1cde1;
    font-size: 1.4em;
    
}
.test{
    
    text-align: center;
    margin-top: 70px;
}

@media (max-width: 767px) {
    .test{
        flex-direction: column;

    }
    .min-btn{
        margin-bottom: 15px;
        margin-left: 1px;

    }


}

.min-btn {
    color: #f0f0f0;
    background-color: #11379b;
    text-decoration: none !important; ;
    font-size: 1.1em;
    font-weight: bold;
    display: inline-block;
    padding: 0.9375em 2.1875em;
    letter-spacing: 1px;
    border-radius: 19px;
    transition: 0.7s ease;
   margin-left: 10px;
    margin-right: 10px;

}

.logout{
    color: #f0f0f0;
    background-color: #cc2c2c;
    text-decoration: none !important;
    font-size: 1.1em;
    font-weight: 600;
    display: inline-block;
    padding: 0.9375em 2.1875em;
    letter-spacing: 1px;
    border-radius: 19px;
    transition: 0.7s ease;

}

.logout:hover{
    background-color: #d06b6b;
    transform: scale(1.1);
    color: #ffffff;

}

.min-btn:hover {
    background-color: #acbae7;
    transform: scale(1.1);
}

section{
    box-sizing: border-box;
    scroll-behavior: smooth;
    background: #071c2a;
    direction: rtl;
    height: 100vh;
}
</style>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Changa&display=swap" rel="stylesheet">
    <link href="//fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <title>المشرف </title>
</head>

<body>

<nav class="navbar navbar-expand-lg navbar-dark   fixed-top mb-4 " dir="rtl">
    <div class="container-fluid">
        <a class="navbar-brand" href="#"> Blood Bank</a>
        <ul class="navbar-nav me-auto my-2 my-lg-0" style="--bs-scroll-height: 100px; margin-left: 400px; ">
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" dir="rtl" href="supervisor2.php">الرئيسية</a>
            </li>
            <li class="nav-item">
                <a class="nav-link " aria-current="page" dir="rtl" href="mainpage.php">المتبرعين</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="mainpage_bank.php" dir="rtl">طلبات الدم</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="users_info.php" dir="rtl">المستخدمين</a>
            </li>
        </ul>
    </div>
    </div>
</nav>




    <section class="main">

        <div class="test">
            <h2><br><span> Admin </span></h2><br><br>
            <a href="register.php" class=" min-btn " > اضافة مستخدم جديد</a>
            <a href="users_info.php" class=" min-btn " >  المستخدمين الحاليين</a><br><br>
            <a href="mainpage.php" class=" min-btn " >  بيانات المتبرعين   </a>
            <a href="need_done.php" class=" min-btn " > طلبات الدم المنتهية </a>
            <a href="mainpage_bank.php" class=" min-btn " > بيانات المحتاجين دم </a>
            <a href="generate_pdf/pdf_maker.php" class=" min-btn " >التقرير اليومي</a><br><br>
            <a href="logout.php" class=" logout " >تسجيل الخروج </a> <br><br>
        </div>
    </section>

<?php
}
else{
    header("location:index.php");
}

?>



</body>
<style>
    body {
        text-align: center;
    }
    .bg-light{
        font-weight: bold;
    }

    .navbar {
        position: fixed;
        width: 100%;
    }




    .navbar-nav{
        flex-direction: row;

    }
    .navbar{
        background-color: #071c2a;
        color: whitesmoke !important;
        font-weight: bold;
    }

    .navbar-nav .nav-link{
        padding-right: 10px;
        margin-left:10px;

    }

    .navbar-brand{
        padding-right: 4.91rem;
        color: #c71919 !important;
        font-weight: bold !important;
        font-size: 20px;
    }
</style>
</html>