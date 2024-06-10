<?php
require 'admin/config.php';
session_start();
if(isset($_SESSION['national_id'])){
$national_id_1= $_SESSION['national_id'];

$query = "SELECT * FROM `poll` WHERE national_id = '$national_id_1'";

$result_query = mysqli_query($con, $query);
$count_query = mysqli_num_rows($result_query);

/////////////////////////
$row = mysqli_fetch_array($result_query);
$current_date = new DateTime(date("Y-m-d"));
$order_date = new DateTime($row['date']);
$diff = $current_date->diff($order_date);
/////////////////////

if ($count_query != 0) {
    $is_exist = true;
}
else{
    $is_exist = false;
}




if (isset($_POST['submit'])){
    $blood = $_POST['blood'];
    $name = $_POST['name'];
    $national_id = $_POST['national_id'];
    $num = $_POST['num'];
    $address = $_POST['address'];
    $check = $_POST['check'];
    $date = $_POST['date'];
    $call_time = $_POST['call_time'];
    $check2 = $_POST['check2'];
    if($national_id == $_SESSION['national_id']){
        if($diff->m < 3 && $row['status'] != 'done'){
    $query = mysqli_query($con, "update `poll` set name = '$name ', phone = '$num',t_blood = '$blood',address = '$address',is_sick ='$check ' ,date = '$date',call_time = '$call_time',t_cuminication = '$check2 ' where national_id = '$national_id_1'");
    if($query){
        $_SESSION['status'] = "تم";
        $_SESSION['status_code'] = "success";
    }
    else{
        $_SESSION['status'] = "حدث خطأ";
        $_SESSION['status_code'] = "error";
    }
}else{
    $_SESSION['status'] = " يجب ان تتعدي ثلاثة اشهر علي الاقل للتبرع مرة اخري ):";
    $_SESSION['status_code'] = "error";
}
}
else{
    
    echo "<script>alert('ادخل الرقم القومي الصحيح !');</script>";
}

}
}
?>
<?php if($is_exist){
?>
<!DOCTYPE html>
<html dir="rtl">
<head>

    <title>بنك الدم</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Changa&display=swap" rel="stylesheet">
    <!-- custom-theme -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv='Content-Type' content='text/html;' charset='windows-1256'>
    <meta name="keywords"
          content="Elegant Feedback Form  Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design"/>
    <script type="application/x-javascript"> addEventListener("load", function () {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        } </script>
    <!-- //custom-theme -->
    <link href="css/style.css" rel="stylesheet" type="text/css" media="all"/>
    <link href="//fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet">
</head>
<body class="agileits_w3layouts">

<section id="contact">
    <h1 class="agile_head text-center"
        style="font-family: 'Trebuchet MS', Arial, Helvetica, sans-serif; color: #c71919 ">blood bank </h1>
    <div class="w3layouts_main wrap">
        <h3 style=" margin-bottom: 6px; margin-top: 6px; font-size:95%;"><span style="color: #c71919; font-weight: bold;">*</span> الرجاء مساعدتنا في تحديد فصيلتك  </h3>
            <form action="" method="post" class="agile_form">
                <select   required oninvalid="this.setCustomValidity('الرجاء اختيار نوع الفصيلة  ')"
                          oninput="this.setCustomValidity('')"  class="form-select" name="blood" value = "<?php echo $row['t_blood'];?>" style="width: 100%;
                 margin-left: 0;
                  padding: 10px;
                   margin-top: 10px;
                   color: black;
                   font-weight: bold;
                    background-color: #ffffff;
                     font-size: 16px;
                     border-radius: 5px;
                      border: 1px solid #0e0909;
                        " aria-label="Default select example">
                    <option value ="<?php echo $row['t_blood']?>" selected ><?php echo $row['t_blood']?></option>
                    <option value="+O">+O</option>
                    <option value="-O">-O</option>
                    <option value="+A">+A</option>
                    <option value="-A">-A</option>
                    <option value="B">+B</option>
                    <option value="-B">-B</option>
                    <option value="+AB">+AB</option>
                    <option value="-AB">-AB</option>
                </select>
                <h6>برجاء اختيار نوع فصيلتك ..</h6>
            <h3 style=" margin-bottom: 12px; margin-top: 6px; font-weight: bold; color: black;" > <span style="color: #c71919; font-weight: bold; ">*</span> الاسم رباعي </h3>

            <input  required oninvalid="this.setCustomValidity('الرجاء كتابة الاسم رباعي ')"
                    oninput="this.setCustomValidity('')" type="text" name="name" value = "<?php echo $_SESSION['name']?>"/>
            <h3 style=" margin-bottom: 12px; margin-top: 6px; font-weight: bold; color: black;" > <span style="color: #c71919; font-weight: bold;">*</span> الرقم القومي </h3>

            <input maxlength="14" minlength="14" required oninvalid="this.setCustomValidity('الرجاء كتابة الرقم القومي ')"
                   oninput="this.setCustomValidity('')" type="number"  name="national_id" value = "<?php echo $row['national_id']?>"/>
            <h3 style=" margin-bottom: 12px; margin-top: 6px; font-weight: bold; color: black;" > <span style="color: #c71919; font-weight: bold;">*</span> العنوان </h3>
            <input required oninvalid="this.setCustomValidity('الرجاء كتابة العنوان ')"
                   oninput="this.setCustomValidity('')" type="text" name="address" value = "<?php echo $row['address']?>"><br>
            <h3 style="margin-bottom: 12px; margin-top: 6px; font-size: 20px; font-weight: 200; color: black ;"> <span style="color: #c71919; font-weight: bold;">*</span> موعد تبرعك الاخير ؟ </h3>
            <input required oninvalid="this.setCustomValidity('الرجاء اختيار اخر موعد تبرعك ')"
                   oninput="this.setCustomValidity('')"  style="
            background-color: whitesmoke;
	        padding: 5px;
            color: black;
            font-size: 18px;
            border: none;
            outline: none;
            margin: 5px;
            border-radius: 5px; " type="date" name="date" id="date"  value = "<?php echo $row['date']?>"> <br>
            <h3 style="margin-bottom: 12px; margin-top: 6px; font-weight: bold; color: black;" > <span style="color: #c71919; font-weight: bold;">*</span> الرقم الخاص بك </h3>

            <input required oninvalid="this.setCustomValidity('الرجاء كتابة الرقم صحيح ')"
                   oninput="this.setCustomValidity('')" type="tel" minlength="11" maxlength="11" name="num" value = "<?php echo $row['phone']?>"/>
            <h3 style=" margin-bottom: 12px; margin-top: 6px; font-weight: bold; color: black;" > <span style="color: #c71919; font-weight: bold;">*</span> وقت الاتصال </h3>
            <input required oninvalid="this.setCustomValidity('الرجاء كتاية موعد الاتصال بك ')"
                   oninput="this.setCustomValidity('')"type="text" name="call_time" value = "<?php echo $row['call_time']?>"><br>
            <h3 style=" font-weight: bold; color: black; margin-bottom: 7px; margin-top: 6px;" > <span style="color: #c71919; font-weight: bold;">*</span> هل يوجد لديك امراض مزمنة؟ </h3>

            <select required oninvalid="this.setCustomValidity('الرجاء اختيار اذا كان لديك امراض مزمنةام لأ ')"
                    oninput="this.setCustomValidity('')" class="form-select" name="check" style="width: 100%;
                 margin-left: 0;
                  padding: 10px;
                   margin-top: 10px;
                    background-color: #ffffff;
                     font-size: 16px;
                      border: 1px solid #0e0909;
                      border-radius: 5px;
                        color: black;
                   font-weight: bold;
                        " aria-label="Default select example" >
                <option selected value = "<?php echo $row['is_sick']?>"><?php echo $row['is_sick']?></option>
                <option type="radio" value="نعم " name="check">نعم</option>
                <option  type="radio" value="لا" name="check">لا</option>
            </select>


            <h3 style=" margin-bottom: 7px; margin-top: 6px; font-weight: bold; color: black;" > <span style="color: #c71919; font-weight: bold;">*</span> كيفية التواصل بك </h3>
            <select required oninvalid="this.setCustomValidity('الرجاء اختيار كيفية التوصل معك ')"
                    oninput="this.setCustomValidity('')" class="form-select" name="check2" style="width: 100%;
                 margin-left: 0;
                  padding: 10px;
                   margin-top: 10px;
                    background-color: #ffffff;
                     font-size: 16px;
                      border: 1px solid #0e0909;
                      border-radius: 5px;
                        color: black;
                   font-weight: bold;
                        " aria-label="Default select example" >
                <option selected value = "<?php echo $row['t_cuminication']?>"><?php echo $row['t_cuminication']?></option>
                <option type="radio"  value="رساله نصية واتساب" name="check2">رساله نصية واتساب</option>
                <option  type="radio" value="الاتصال مباشر" name="check2">الاتصال مباشر</option>
            </select>
            <br>
            <br>
            <center><input type="submit" value="تحديث" class="agileinfo" name="submit"></center>
        </form>

    </div>
    <div class="aki text-center">
        <p style="color: #c71919;font-weight: bold;">2023 @ developed by Eng : Mahmoud Walied & Eng Mohamed Khaled </p>
        <br>
    </div>
</section>

</body>
</html>
<?php include("footer.php")?>
<?php }else{
    header("location:benefactor.php");
}
?>





