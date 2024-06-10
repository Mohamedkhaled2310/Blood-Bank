<?php
session_start();
require('config.php');
if (isset($_SESSION['login_user'])) {
$userLoggedIn = $_SESSION['login_user'];
if(isset($_GET['id']))
{
    $id = $_GET['id'];
    $result = "delete from user where id = '$id'";
    mysqli_query($con,$result);
}

?>
<!DOCTYPE html>
<html lang="en" >

<head>

  <meta charset="UTF-8">
  <title> المستخدمين الحاليين</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Changa&display=swap" rel="stylesheet">
    <link href="//fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
</head>

<body style="
    min-height: 100vh;
    background: #090f1f;
  ">
  <br>
<a href="supervisor2.php" class=" min-btn " > رجوع </a>
  <?php
          $result = mysqli_query($con,"SELECT * FROM user where id != 1 ");
             
            echo 
            "
            <h2 id ='label'>المستخدمين الحاليين</h2>
            <br><br>
            <table border='1' id='table'>
            <tr>
            <th> العملية</th>
            <th> البريد الالكتروني</th>
            <th>الاسم</th>
            </tr>";
            while($row = mysqli_fetch_array($result))
            {
            echo "<tr>";
            echo "<td><a href ='update_user.php?id=$row[id] ' class ='del'>تعديل</a>
            <a href ='users_info.php?id=".$row['id']."' class ='del'>حذف</a></td>";
            echo "<td>" . $row['email'] . "</td>";
            echo "<td>" . $row['name'] . "</td>";
            echo "</tr>";
            }
            echo "</table>";                                                                    
}
  else {
      header("location: index.php ");
  }
   ?>
</body>

<style>
    body{
        font-family: Poppins,Changa,sans-serif!important;
    }

  #label{
    font-size: 40px;
    text-align: center;
    color: #3a6cf4;
  }
#table {
    font-family: Poppins,Changa,sans-serif!important;
  border-collapse: collapse;
  width: 100%;
  
}

#table td, #customers th {
  padding: 8px;
    color: whitesmoke;
    font-weight: bold;

}


#table tr:hover {background-color: #4e7fab;}

#table th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: center;
  background-color:#3a6cf4;
  color: white;
  align-items: center;
}
#table td{
  text-align: center;
}
.block {
  display: block;
  width: 100%;
  border: none;
  background-color: #4CAF50;
  color: white;
  padding: 14px 28px;
  font-size: 16px;
  cursor: pointer;
  text-align: center;
}

.block:hover {
  background-color: #0d1d28;
  color: white;
}
.del{
   color:whitesmoke;
   font-size: 1.2em;
   padding: 10px;
   text-decoration: none;
}
.min-btn {
  
    color: #f0f0f0;
    background-color: #c71919;
    text-decoration: none;
    font-size: 1.1em;
    font-weight: 600;
    display: inline-block;
    padding: 0.5375em 1.3875em;
    letter-spacing: 1px;
    border-radius: 19px;
    transition: 0.7s ease;
    margin-left:20px;

}

@media (min-width: 767px) {
    .min-btn{
        font-size: 2.0em;

    }

}


.min-btn:hover {
    background-color: #d98181;
    transform: scale(1.1);
}
</style>

</html>
