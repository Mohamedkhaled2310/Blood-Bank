<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>تسجيل الدخول</title>
    <link href="https://fonts.googleapis.com/css2?family=Changa&display=swap" rel="stylesheet">

   <!-- custom css file link  -->
<!--<link rel="stylesheet" href ="style.css">-->
<style>
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    outline: none;
    border: none;
    text-decoration: none;
    background:#E4E4D0;
    font-family:Changa,sans-serif!important;
}
.form-container {
    min-height: 100vh;
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 20px;
    padding-bottom: 60px;
}


.login {
    color:#52796f;
    text-transform: uppercase;
    letter-spacing: 2px;
    display: block;
    font-weight: bold;
    font-size: x-large;
    background:transparent;
  }
  
  .card {
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 350px;
    width: 700px;
    flex-direction: column;
    gap: 35px;
    background: #FFEEF4;
    border-radius: 8px;
  }
  
  .inputBox {
    position: relative;
    width: 350px;
  }
  
  .inputBox input {
    width: 100%;
    padding: 10px;
    outline: none;
    border: none;
    color: #000;
    font-size: 1em;
    background: #fff;
    border-left: 2px solid #52796f;
    border-bottom: 2px solid #52796f;
    transition: 0.1s;
    border-bottom-left-radius: 8px;
  }
  
  .inputBox span {
    margin-top: 5px;
    position: absolute;
    left: 0;
    transform: translateY(-4px);
    margin-left: 10px;
    padding: 10px;
    pointer-events: none;
    font-size: 12px;
    color: black;
    text-transform: uppercase;
    transition: 0.5s;
    letter-spacing: 3px;
    border-radius: 8px;
    background:#fff;
  }
  
  .inputBox input:valid~span,
  .inputBox input:focus~span {
    transform: translateX(200px) translateY(-15px);
    font-size: 0.8em;
    padding: 5px 10px;
    background: #52796f;
    letter-spacing: 0.2em;
    color: #fff;
    border: 2px;
  }
  
  .inputBox input:valid,
  .inputBox input:focus {
    border: 2px solid #52796f;
    border-radius: 8px;
  }
  
  .enter {
    height: 45px;
    width: 100px;
    border-radius: 5px;
    border: 2px solid #52796f;
    cursor: pointer;
    background-color: transparent;
    transition: 0.5s;
    text-transform: uppercase;
    font-size: 10px;
    letter-spacing: 2px;
    margin-bottom: 1em;
    color: #52796f;
  }
  
  .enter:hover {
    background-color: #52796f;
    color: white;
  }
  </style>
</head>
<body>
   
<div class="form-container">
   <form action="checklogin.php" method = "post">
        <div class="card">
            <a class="login">تسجيل الدخول</a>
            <div class="inputBox">
                <input type="text" required="required" name="email" autofocus>
                <span class="user">البريد الالكتروني</span>
            </div>

            <div class="inputBox">
                <input type="password" required="required" name = "password">
                <span>كلمة السر</span>
            </div>
            <a href="sendmail/forgot-password.php" style="color: #215486; font-weight: bold; margin-left: 170px;"> هل نسيت كلمة السر </a>

            <button type="submit" class="enter" nmae = "submit" >دخول</button>
</form>
        </div>
    </div>

</body>
</html>