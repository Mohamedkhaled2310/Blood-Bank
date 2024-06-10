<?php 
session_start();
?>
<!doctype html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Blood Bank</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/all.min.css">
    <link rel="stylesheet" href="assets/css/style.css" />
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link href="assets/bootstrap-icons/bootstrap-icons.css">
  <link href="assets/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Changa&display=swap" rel="stylesheet">
</head>

<body style="text-align: right;">
  <header dir="ltr">
    <div class="my-nav" style="padding: 0">
      <div class="container">
        <div class="row">
          <div class="nav-items">
              <div class="menu-hamburger"></div>
            </div>
            <div class="logo">
              <img style="width: 55%;" src="assets/images/logoo.png">
            </div>
          <div style="margin-left: 40%; margin-top: 12px;">
          <?php
    if(isset($_SESSION['national_id'])){
    ?>
            <a class="btn btn-primary" href="logout.php" role="button" style="
            background-color: #c71919 !important; border: none;">تسجيل الخروج</a>
            <?php
            }
            else{
            ?>
              <a class="btn btn-primary" href="user_login.php" role="button" style="
            background-color: #c71919 !important; border: none;">تسجيل الدخول / انشاء حساب </a>
              <?php
              }?>
            
            
          </div>
          </div>
        </div>
      </div>
    </div>
  </header>


  <main class="charity-01-main">
    <section class="banner">
      <div class="container">
        <div class="row">
          <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12" style="padding: 0">
            <div class="wrapper">
              <div class="content">
                <h4 style="font-size: 28px; padding: 10px; font-weight: bold; color: #fd1b5b;" >بنك المتطوعين بابوتشت (مجانا)</h4>
                <p style="color: #c71919; font-size: 22px; font-weight: bold; padding: 10px">لا تتردد أبدًا في التبرع بالدم لشخص يحتاج ذلك وتتوقف عليه حياته بأكملها ، لأن هذا الفعل الإنساني يشعرك براحة كبيرة ، ويساعدك على اكتشاف الخير داخل روحك ، ويساهم في إنقاذ شخص لا تعرفه ، وهو أسمى مبادئ الإنسانية .</p>
              </div>
            </div>
          </div>
          <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
            <div class="img-wrapper" >
              <div class="banner-img">
                <img src="assets/images/bood.png">
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>
  <section class="card-botton"  style="text-align: center !important; margin-top: -100px;">
 


    <?php
    if(isset($_SESSION['national_id'])){
    ?>
    <div class="first hero">
      <img class="hero-profile-img" src="assets/images/donor.png" alt="" style="width:100%">
      <div class="hero-description-bk"></div>
      <div class="hero-logo">
        <img src="assets/images/donors.png" alt="">
      </div>

      <div class="hero-description">
        <p style="font-size: 22px; font-weight: bold">متبرع / Donor</p>
        <br>
      </div>

      <div class="hero-btn">
        <a href="update_info.php" style="font-size: 20px; font-weight: bold">تحديث بيناتك </a>
      </div>
    </div>
<?php }?>
    <div class="first hero">
      <img class="hero-profile-img" src="assets/images/donor.png" alt="" style="width:100%">
      <div class="hero-description-bk"></div>
      <div class="hero-logo">
        <img src="assets/images/donors.png" alt="">
      </div>
      <div class="hero-description">
        <p style="font-size: 22px; font-weight: bold">متبرع / Donor</p>
        <br>
      </div>

      <div class="hero-btn">
        <a href="benefactor.php" style="font-size: 20px; font-weight: bold">دخـول </a>
      </div>
    </div>

    <div class="second hero">
      <img class="hero-profile-img" src="assets/images/needs.jpeg" alt="" style="width: 100%">
      <div class="hero-description-bk"></div>
      <div class="hero-logo">
        <img src="assets/images/NED.png" alt="">
      </div>
      <div class="hero-description">
        <p href="benefactor.php" style="font-size: 22px; font-weight: bold">محتاج دم </p>
        <br>
      </div>
      <div class="hero-btn">
        <a href="index_bank.php" style="font-size: 20px; font-weight: bold">دخـول </a>
      </div>
    </div>
  </section>

  <footer>
    <div class="container" style="text-align: right;">
      <div class="row">
        <div class="col-lg-5 col-md-6 col-sm-6 col-xs-6">
          <div class="_kl_ds_we">
            <div class="head-footer">
              <h3>انقذ حياة</h3>
              <p style="font-weight: bold; font-size: 20px;">وإذا كان للصدقة بالمال منزلتها في الدين، وثوابها عند الله، حتى إن الله تعالى يتقبلها بيمينه، ويضاعفها أضعافًا كثيرة إلى سبعمائة ضعف، إلى ما شاء الله؛ فإن الصدقة بالدم أعلى منزلة وأعظم أجرًا؛ لأنه سبب الحياة، وهو جزء من الإنسان، والإنسان أغلى من المال، وكأن المتبرع بالدم يجود بجزء من كيانه المادي لأخيه حبًا وإيثارًا.</p>

            </div>
          </div>
        </div>




        <div class="col-lg-5 col-md-6 col-sm-6 col-xs-6">
          <div class="_kl_ds_we">
            <div class="head-footer">
              <h3 dir="ltr">find us</h3>
              <ul class="un-hover">

                <li><i class="far fa-location"></i>الاستاذ : ايمن محمود عبدالفتاح</li>
                <a href="https://www.facebook.com/elbitishty" class="facebook" style="margin-right: 10px;"><i class="bx bxl-facebook" ></i></a>
                <a href="https://whatsapp.com/">
                  <li><i class="fas fa-mobile-alt"></i>01003490483</li>
                </a>
              </ul>
              <ol>
                <a href="https://www.facebook.com/groups/506385549739012/">
                  <span style=""> جروب الفيس بوك بنك الدم</span><br>
                  <a href="https://www.facebook.com/groups/506385549739012/" class="facebook"><i class="bx bxl-facebook" style="border: 1px solid #0a53be; margin-right: 10px; " ></i></a>

                </a>


              </ol>
            </div>
          </div>
        </div>
        <div class="col-12">
          <div class="row _pl_we_sq">
            <div class="col-12">
              <div class="last-01" dir="ltr">
                <p style="color: #c71919;font-weight: bold; " >2023 @ developed by Eng : Mahmoud Walied & Eng Mohamed Khaled
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </footer>
</body>
<style>
  .bx{
    border: 1px solid #0a53be;
    font-size: 23px;
    margin-top: 10px;

  }
  span{
    color: white;
    font-weight: bold;
  }
  span:hover{
    color: #c71919;
  }
  .bx:hover{
    color: #b3d7ff;
    background-color: #0a53be;
  }

  /* BEGIN CARD DESIGN */
  .hero {
    display: inline-block;
    position: relative;
    width: 150px;
    min-width: 330px;
    height: 340px;
    border-radius: 30px;
    overflow:hidden;
    box-shadow: 5px 5px 30px rgba(0, 0, 0, 0.3);
    margin: 30px;
  }

  .hero-profile-img {
    height: 70%;
  }

  .hero-description-bk {
    background-image: linear-gradient(0deg , #3f5efb, #fc466b);
    border-radius: 30px;
    position: absolute;
    top: 55%;
    left: -5px;
    height: 65%;
    width: 108%;
    transform: skew(19deg, -9deg);
  }

  .second .hero-description-bk {
    background-image: linear-gradient(-20deg , #bb7413, #a41212)
  }

  .hero-logo {
    height: 80px;
    width: 80px;
    border-radius: 20px;
    background-color: #fff;
    position: absolute;
    bottom: 30%;
    left: 30px;
    overflow:hidden;
    box-shadow: 5px 5px 30px rgba(0, 0, 0, 0.7);
  }

  .hero-logo img {
    height: 100%;
  }

  .hero-description {
    position: absolute;
    color: #fff;
    font-weight: 900;
    left: 150px;
    bottom: 26%;
  }

  .hero-btn {
    position: absolute;
    color: #fff;
    right: 30px;
    bottom: 10%;
    padding: 10px 20px;
    border: 1px solid #fff;
  }
  .hero-btn:hover{
    background: #698598;
    border: none;
  }

  .hero-btn a {
    color: #fff;
  }

  .hero-date {
    position: absolute;
    color: #fff;
    left: 30px;
    bottom: 10%;
  }
  /* END CARD DESIGN */
  .btn i:before {
    width: 14px;
    height: 14px;
    position: fixed;
    color: #fff;
    background: #0077B5;
    padding: 10px;
    border-radius: 50%;
    top:5px;
    right:5px;
  }

</style>


<script src="assets/js/jquery-3.2.1.min.js"></script>
<script src="assets/js/popper.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/script.js"></script>
</html>