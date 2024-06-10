
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <style>

    </style>
    <title>Forgot Password</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-4 offset-md-4 form">
                <form action="send.php" method="POST" autocomplete="">
                    <h2 class="text-center">هل نسيت كلمة السر</h2>
                    <p class="text-center">ادخل البريد الالكتروني</p>
   
                    <div class="form-group">
                        <input class="form-control" type="email" name="email" placeholder="ادخل البريد الالكتروني" required>
                        <input type="hidden" name="type" value = "admin" required> 
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