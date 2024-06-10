<?php
ob_start();
require 'admin/config.php';
if(isset($_POST['submit'])){
    $blood = $_POST['blood'];
    $name = $_POST['name'];
    $notes = $_POST['notes'];
    $num = $_POST['num'];
    $check = $_POST['check'];
    
    
    $query = mysqli_query($con, "INSERT INTO `need`(`id`, `name`, `phone`, `t_blood`,`notes`,`place`,`order_date`) VALUES ('','$name','$num','$blood','$notes','$check',CURDATE())");
    if($query){
        $_SESSION['status'] = "تم";
        $_SESSION['status_code'] = "success";
        header("index.php");
    }
    else{
        $_SESSION['status'] = "حدث خطأ";
        $_SESSION['status_code'] = "error";
        header("index_bank.php");
    }
    

}
?>
<!DOCTYPE html>
<html dir="rtl">
<head>
    
<title>بنك الدم</title>
<!-- custom-theme -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv='Content-Type' content='text/html;' charset='windows-1256'>
<meta name="keywords" content="Elegant Feedback Form  Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<!-- //custom-theme -->
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Changa&display=swap" rel="stylesheet">
<link href="//fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet">
</head>
<body class="agileits_w3layouts">

<section id="contact" class="contact">
    <h1 class="agile_head text-center" style="color: #c71919 ">blood bank </h1>
    <div class="w3layouts_main wrap">
        <h3 style="  margin-bottom: 6px; margin-top: 6px; font-size:101%; font-weight: bold; color: black; width: 110%" ><span style="color: #c71919; font-weight: bold;">*</span> نوع الفصيلة </h3>
        <form action="" method="post" class="agile_form">
                <select   required oninvalid="this.setCustomValidity('الرجاء اختيار نوع الفصيلة  ')"
                          oninput="this.setCustomValidity('')"  class="form-select" name="blood" style="width: 100%;
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
                    <option selected> </option>
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
            <h3 style=" margin-bottom: 6px; margin-top: 6px; font-size:101%; font-weight: bold; color: black; width: 110%" ><span style="color: #c71919; font-weight: bold;">*</span> مكان التبرع</h3>
            <select  required oninvalid="this.setCustomValidity('الرجاء اختيار مكان التبرع ')"
                     oninput="this.setCustomValidity('')"
                       class="form-select" name="check" style="width: 100%;
                 margin-left: 0;
                  padding: 10px;
                   margin-top: 10px;
                    background-color: #ffffff;
                     font-size: 16px;
                      border: 1px solid #0e0909;
                      border-radius: 5px;
                        color: black;
                   font-weight: bold;
                        " aria-label="Default select example">
                <option selected>  </option>
                <option type="radio" value="داخل المستشفي" name="check">داخل المستشفي</option>
                <option  type="radio" value="مباشر خارج المستشفي" name="check">مباشر خارج المستشفي</option>
            </select>
            <h6>برجاء اختيار مكان التبرع ..
                <br>
                "في حالة اختيار (داخل المستشفى) يجب احضار اثنين متبرعين "</h6>

            <h3 style="  margin-bottom: 6px; margin-top: 6px; font-weight: bold; color: black;" > <span style="color: #c71919; font-weight: bold;">*</span> الاسم رباعي </h3>

            <input  required oninvalid="this.setCustomValidity('الرجاء كتابة الاسم رباعي ')"
                    oninput="this.setCustomValidity('')"  type="text" placeholder="..." name="name"/>
            <h3 style="  margin-bottom: 6px; margin-top: 6px; font-weight: bold; color: black;" > <span style="color: #c71919; font-weight: bold;">*</span> سبب احتياج الدم</h3>

            <input   required oninvalid="this.setCustomValidity('الرجاء كتابة سبب احتياج الدم/نوع الخالة ')"
                     oninput="this.setCustomValidity('')" type="text" placeholder="..." name="notes"/>
            <h3 style="  margin-bottom: 6px; margin-top: 6px; font-weight: bold; color: black;" > <span style="color: #c71919; font-weight: bold;">*</span> الرقم الخاص بك</h3>

            <input  required oninvalid="this.setCustomValidity('الرجاء كتابة الرقم صحيح ')"
                    oninput="this.setCustomValidity('')" type="tel"  pattern="^01[0-2,5]\d{1,8}$" placeholder="..." minlength="11" maxlength="11"name="num"/>


<br>

                <center><input type="submit" value="ارسال" class="show-modal" name = "submit"></center>
        </form>

    </div>
    <div class="aki text-center">
			<p style="color: #c71919; font-weight: bold !important;">2023 @ developed by Eng : Mahmoud Walied & Eng Mohamed Khaled</p>
        <br>
</div>
</section>

</body>
</html>

<?php include("footer.php")?>



