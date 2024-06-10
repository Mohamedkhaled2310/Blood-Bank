<?php
session_start();
require ('config.php');
if (isset($_SESSION['login_user'])) {
$userLoggedIn = $_SESSION['login_user'];

if(isset($_GET['id']))
{
    $id = $_GET['id'];
    $result = "delete from need where id = '$id'";
    mysqli_query($con,$result);
}

?>
<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>محتاجين الدم</title>
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
</head>

<body style="background-color: #cad2c5">

<nav class="navbar navbar-expand-lg navbar-dark   fixed-top " dir="rtl">
    <div class="container-fluid">
        <a class="navbar-brand" href="#"> Blood Bank</a>
        <ul class="navbar-nav me-auto my-2 my-lg-0" style="--bs-scroll-height: 100px;">
            <li class="nav-item">
            <?php
                    if($_SESSION['user_id'] == 1){
                        $path = "supervisor2.php";
                    }
                    else{
                        $path = "admin_home.php";
                    }
                    ?>
                <a class="nav-link" aria-current="page" dir="rtl" href=<?php echo $path;?>>الرئيسية</a>
            </li>
            <li class="nav-item">
                <a class="nav-link " aria-current="page" dir="rtl" href="mainpage.php">المتبرعين</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" href="mainpage_bank.php" dir="rtl">طلبات الدم</a>
            </li>
            <?php if($_SESSION['user_id'] == 1){?>
                <li class="nav-item">
                    <a class="nav-link" href="users_info.php" dir="rtl">المستخدمين</a>
                </li>
                <?php
                }
                
                 ?>
        </ul>
        <form class="d-flex" action = "search_need.php" method = "post">
            <input class="form-control me-2" type="search" placeholder="بحث" aria-label="Search" name = "search" required oninvalid="this.setCustomValidity(' ادخل كلمة البحث')"
                   oninput="this.setCustomValidity('')">
            <button class="btn btn-outline-success" type="submit" name = "submit">بحث</button>
        </form>
    </div>
    </div>
</nav>

  <?php 

if(isset($_GET['page'])){
    $page = $_GET['page'];
    
    if($page =="" || $page =="1"){
        $page1 = 0;
    }
    else{
        $page1 = ($page*10)-10;
    }
}
else{
    $page1 = 0; 
}
          $result = mysqli_query($con,"SELECT * FROM need where status != 'done'");
          $result2 = mysqli_query($con, "SELECT * FROM need where status != 'done' limit $page1,10");
             
            echo 
            "
            <br><br>
            <br>
            <table border='1' id='table'>
            <tr>
            <th> العملية</th>
            <th>الحالة</th>
            <th> الملاحظات</th>
            <th>مكان التبرع</th>
            <th>نوع الحالة</th>
            <th>نوع الفصيلة</th>
            <th>رقم الهاتف</th>
            <th>الاسم</th>
            </tr>";
            if(isset($_POST['submit'])){
                $feedback = $_POST['feedback'];
                $id = $_POST['id'];
                $update = mysqli_query($con, "update need set feedback = '$feedback' where id = '$id' ");
                if($update){
                    $_SESSION['status'] = "تم";
                    $_SESSION['status_code'] = "success";
                    
                }
                else{
                    $_SESSION['status'] = "حدث خطأ";
                    $_SESSION['status_code'] = "error";
                    
                }
                
            }
            if(isset($_GET['status'])){
                $_SESSION['status'] = " تم التبرع لهذا الشخص";
                    $_SESSION['status_code'] = "success";   
            }
            while($row = mysqli_fetch_array($result2))
            {
            echo "<tr>";
            echo "<td><a href ='need_update.php?id=$row[id] ' class ='del'>تعديل</a>
            <a href ='mainpage_bank.php?id=".$row['id']."' class ='del'>حذف</a></td>";
            if($row['status'] == "done"){
                echo "<td><a href='mainpage_bank.php?status=".$row['status']."' style='border: 1px solid #85a185; background-color: #1f621f; padding: 6px; color: #77bda1; text-decoration: none;   '>استفسار عن الحالة</a></td>";
            }
            else{
               
                echo "<td><a href='donor_of_need.php?id=". $row['id']."&name=". $row['name']. "' style='border: 1px solid #85a185; background-color: #1f621f; padding: 6px; color: #77bda1; text-decoration: none;   '>استفسار عن الحالة</a></td>";
            }
                echo "<form method='post'>";
                echo "<td><button type = 'submit' name = 'submit'>حفظ</button><input type = 'text' name = 'feedback' value = '". $row['feedback'] ."'><input type = 'hidden' name = 'id' value = '". $row['id'] ."'></td>";
                echo "</form>";
            echo "<td>" . $row['place'] . "</td>";
            echo "<td>" . $row['notes'] . "</td>";
            echo "<td>" . $row['t_blood'] . "</td>";
            echo "<td>" . $row['phone'] . "</td>";
            echo "<td>" . $row['name'] . "</td>";

            }
            echo "</table>";                                                                    
        
        }else {
    header("location:logout.php");
  }
   ?>
   <br>
        <?php
           $count = mysqli_num_rows($result);
           $num_page = $count/10;
           $num_page = ceil($num_page);
           
           for($i = 1;$i<= $num_page;$i++){
            ?><a class="paging" href = "mainpage_bank.php?page=<?php echo $i;?>" style = "text-decoration:none;border-raduis:10%;padding:10px;background-color:#344e41;color:aliceblue;"><?php echo $i." "; ?></a><?php
           }

        ?>
</body>
<style>
    body {
        text-align: center;
    }

    .paging:hover{
        background-color: #84A98C !important;

    }
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
        border: 1px solid #52796f;
        margin-right: 10px;
        width: 70px;

    }
    .btn-outline-success:hover{
        background-color: #52796f;
    }


    .navbar-nav{
        flex-direction: row;

    }
    .navbar{
        background-color: #2f3e46;
        color: whitesmoke;
        font-weight: bold;
    }

    .navbar-nav .nav-link{
        padding-right: 10px;
        margin-left:10px ;
    }
    #label{
            font-size: 60px;
            text-align: center;
        }
        #table {
            font-family: Poppins,Changa,sans-serif!important;
            border-collapse: collapse;
            width: 100%;

        }
        a:hover{
            background-color: #82b982 !important;
            color: #031103 !important;
            border: none !important;
        }

        #table td, #customers th {
            padding: 8px;
            color: black;
            font-weight: bold;
        }


        #table tr:nth-child(odd){background-color: #52796f;}
        #table tr:hover {background-color: #84A98C ;}

        #table th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: center;
            background-color: #354f52;
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

</style>
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
            title: "حالة العميل",
            text: "<?php echo $_SESSION['status'];?>",
            icon: "<?php echo $_SESSION['status_code'];?>",
            buttons: "موافق",

        })
            .then((confirm) => {
                if (confirm)
                    window.location = "mainpage_bank.php";

            });

    </script>
    <?php
    unset($_SESSION['status']);
}
?>

</body>
</html>