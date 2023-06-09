<?php
require_once "config.php";

if (isset($_POST["submit"])) {
    if (!isset($_POST["password"]) || !isset($_POST["repeat_password"])
        || !isset($_POST["email"])) {
        $error = "خطا!!! هیچ فیلدی نباید حذف شود";
    }elseif ($_POST["password"] == "" || $_POST["email"] == "" || $_POST["repeat_password"] == ""){
        $error = "خطا!!! هیچ فیلدی نباید خالی باشد";
    }elseif(filter_var($_POST["email"], FILTER_VALIDATE_EMAIL) === false){
        $error = "خطا!!! لطفا ایمیل را به طور صحیح وارد کنید";
    }elseif ($_POST["password"] !== $_POST["repeat_password"]) {
        $error = "گذرواژه وتکرار گذرواژه یکی نمی باشد";
    }else{
        $password = $_POST["password"];
        $repeat_password = $_POST["repeat_password"];
        $email = $_POST["email"];


        $check_user_login = Check_User_login($password,$email);

        if ($check_user_login === null) {
            $error = "کاربری با این مشخصات یافت نشد لطفا قبل از ورود ثبت نام کنید";
        }else{
            $_SESSION["user"] = $check_user_login->id;
            header("Location: form/index.php");
            exit();
        }

    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>سایت رای گیری سایش</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!--Meta Tag-->
    <meta name="description" content="سایت رای گیری انلاین">
    <!--Meta keyword-->
    <meta name="keyword" content="سایت رای گیری آنلاین سامانه رای گیری سایش ">
    <link href="https://fonts.googleapis.com/css?family=Muli:300,400,700,900" rel="stylesheet">
    <link rel="stylesheet" href="fonts/icomoon/style.css">

      <!-- font icons -->
    <link rel="stylesheet" href="../n0.3/css/themify-icons.css">
      <!-- Bootstrap + Steller main styles -->
    <link rel="stylesheet" href="../n0.3/css/steller.css">
    <!--    <link rel="stylesheet" href="css/bootstrap.min.css">-->
    <!--    Bootsrap RTL-->
    <link rel="stylesheet" href="css/bootstrap-rtl.min.css">
    <link rel="stylesheet" href="css/jquery-ui.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">

    <link rel="stylesheet" href="css/jquery.fancybox.min.css">

    <link rel="stylesheet" href="css/bootstrap-datepicker.css">

    <link rel="stylesheet" href="fonts/flaticon/font/flaticon.css">
    <link rel="stylesheet" href="css/aos.css">

    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="style.css">

  <!-- CSS FILES -->        
  <link href="./a/css/bootstrap.min.css" rel="stylesheet">

  <link href="./a/css/bootstrap-icons.css" rel="stylesheet">

  <link href="./a/css/templatemo-kind-heart-charity.css" rel="stylesheet">

  <link rel="stylesheet" href="assets/vendors/themify-icons/css/themify-icons.css">

</head>
<body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">


    <header class="site-header">
        <div class="container">
            <div class="row">
                
                <div class="col-lg-8 col-12 d-flex flex-wrap">
                    <p class="d-flex me-4 mb-0">
                        <i class="bi-geo-alt me-2"></i>
ایران،استان اصفهان،شهر کاشان ....
                    </p>

                    <p class="d-flex mb-0">
                        <i class="bi-envelope me-2"></i>

                        <a href="mailto:info@company.com">
                            sayesh@gamil.com
                        </a>
                    </p>
                </div>

                <div class="col-lg-3 col-12 ms-auto d-lg-block d-none">
                    <ul class="social-icon">
                        <li class="social-icon-item">
                            <a href="#" class="social-icon-link bi-twitter"></a>
                        </li>

                        <li class="social-icon-item">
                            <a href="#" class="social-icon-link bi-facebook"></a>
                        </li>

                        <li class="social-icon-item">
                            <a href="#" class="social-icon-link bi-instagram"></a>
                        </li>

                        <li class="social-icon-item">
                            <a href="#" class="social-icon-link bi-youtube"></a>
                        </li>

                        <li class="social-icon-item">
                            <a href="#" class="social-icon-link bi-whatsapp"></a>
                        </li>
                    </ul>
                </div>

            </div>
        </div>
    </header>
  




<div class="site-wrap">

    <div class="site-mobile-menu site-navbar-target">
        <div class="site-mobile-menu-header">
            <div class="site-mobile-menu-close mt-3">
                <span class="icon-close2 js-menu-toggle"></span>
            </div>
        </div>
        <div class="site-mobile-menu-body"></div>
    </div>


    <header class="site-navbar py-4 js-sticky-header site-navbar-target" role="banner">

        <div class="container-fluid">
            
            <div class="d-flex align-items-center">
                <div class="site-logo mr-auto w-25"><a href="index.html">SAyeSH</a></div>

                <div class="mx-auto text-center">
                    <nav class="site-navigation position-relative text-right" role="navigation">
                        <ul class="site-menu main-menu js-clone-nav mx-auto d-none d-lg-block  m-0 p-0">
                            <li><a href="index.html" class="nav-link">صفحه اصلی</a></li>
                            <li><a href="#courses-section" class="nav-link">رای گیری</a></li>
                            <li><a href="#programs-section" class="nav-link">درباره ما</a></li>
                            <li><a href="#frm2" class="nav-link">تماس با ما</a></li>
                            <!-- <li><a href="#teachers-section" class="nav-link">ارتباط با ما</a></li> -->
                        </ul>
                    </nav>
                </div>

                <div class="ml-auto w-25">
                    <nav class="site-navigation position-relative text-right" role="navigation">
                        <ul class="site-menu main-menu site-menu-dark js-clone-nav mr-auto d-none d-lg-block m-0 p-0">
                            <li class="cta"><a href="#" ><span>سبد خرید</span></a>
                            </li>
                        </ul>
                    </nav>
                    <a href="#" class="d-inline-block d-lg-none site-menu-toggle js-menu-toggle text-black float-right"><span
                            class="icon-menu h3"></span></a>
                </div>
            </div>
        </div>

    </header>  

        <div class="intro-section" id="home-section">
            <div class="slide-1"  data-stellar-background-ratio="0.5">
                <!--  -->
               
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-12">
                            <div class="row align-items-center">
                                <div class="col-lg-6 mb-4">
                                    <h1 data-aos="fade-up" data-aos-delay="100" class="res" style="margin-top:60px ;">سامانه انتخابات الکترونیکی</h1>
                                    <p class="mb-4" data-aos="fade-up" data-aos-delay="200">برگزرای آنلاین انتخابات و  رای گیری امن ، شفاف و قابل اعتماد</p>
<!--                                    <p data-aos="fade-up" data-aos-delay="300"><a href="./login/index.html"-->
<!--                                   class="btn btn-primary py-3 px-5 btn-pill">ورود به صفحه رای گیری</a></p>-->
                                    <p data-aos="fade-up" data-aos-delay="300"><a href="./dashboard/login/index.php"
                                                                                  class="btn btn-primary py-3 px-5 btn-pill">پنل مدیریت انتخابات</a></p> 
                                </div>
    
                                <div class="col-lg-5 ml-auto" data-aos="fade-up" data-aos-delay="500">
                                    <form action="" method="post" class="form-box">
                                        <h3 class="h4 text-black mb-4 " style="color: rgb(107, 108, 110) !important;">عضویت در سامانه</h3>
                                        <div class="form-group">
                                            <input type="email" class="form-control" placeholder="آدرس ایمیل ..." name="email">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" value="" class="form-control" placeholder="رمز ورود ..." name="password">
                                        </div>
                                        <div class="form-group mb-4">
                                            <input type="password" class="form-control" placeholder="تایپ مجدد رمز ورود" name="repeat_password">
                                        </div>
                                        <div class="form-group">اگر تا بحال وارد نشده اید ثبت نام کنید

                                            <button style="background-color: #0d95e8;border-radius: 5px;padding: 5px" name="submit">ورود</button>
                                            <button style="background-color: #0d95e8;border-radius: 5px;padding: 5PX" name="submit2"><a style="color:#0b0b0b;" href="login/index.php">ثبت نام</a></button>
<!--                                            <a class="btn btn-primary btn-pill"  href="login/index.php"><input type="submit" name="submit" class="btn btn-primary btn-pill"  value="ورود"></a>-->
<!--                                            <a class="btn btn-primary btn-pill"  href="login/index.php"><input type="submit2" name="submit2" class="btn btn-primary btn-pill"  value="ثبت نام"></a>-->
                                        </div>
                                        <?php if(isset($error)) { ?>
                                        <span style="background-color: red;color: white;padding: 10px;border-radius: 10px">
                                            <?=  $error ?>
                                        </span>
                                        <?php } ?>

                                    </form>
    
                                </div>
                            </div>
                        </div>
                     </div>
                </div>
            </div>
        </div>


        <main class="mgt">

            <section class="hero-section hero-section-full-height">
                <div class="container-fluid">
                    <div class="row">
    
                        <div class="col-lg-12 col-12 p-0">
                            <div id="hero-slide" class="carousel carousel-fade slide" data-bs-ride="carousel">
                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                        <img src="a/images/slide/aa.png" class="carousel-image img-fluid" alt="...">
                                        
                                        <div class="carousel-caption d-flex flex-column justify-content-end">
                                            <h1>انواع رای گیری ها</h1>
                                            
                                            <p>مدارس، انجمن،شرکتها ، احزاب و گروه های مردم نهاد ، وزارتخانه و...</p>
                                        </div>
                                    </div>
    
                                    <div class="carousel-item">
                                        <img src="a/images/slide/a1.png" class="carousel-image img-fluid" alt="...">
                                        
                                        <div class="carousel-caption d-flex flex-column justify-content-end">
                                            <h1>احراز هویت</h1>
                                            
                                            <p>احراز هویت استفاده از نام کاربری و کلمه عبور</p>
                                        </div>
                                    </div>

                                    <div class="carousel-item">
                                        <img src="a/images/slide/p1.jpg" class="carousel-image img-fluid" alt="...">
                                        
                                        <div class="carousel-caption d-flex flex-column justify-content-end">
                                            <h1>اعتبار سنجی </h1>
                                            
                                            <p>اعتبارسنجی و بازبینی برگه رأی ، شمارش دقیق و صحیح آراء </p>
                                        </div>
                                    </div>
    
                                    <div class="carousel-item">
                                        <img src="a/images/slide/p4.png" class="carousel-image img-fluid" alt="...">
                                        
                                        <div class="carousel-caption d-flex flex-column justify-content-end">
                                            <h1>پنل مدیریت </h1>
                                            
                                            <p>پنل مدیریت جهت بررسی وضعیت و پیکربندی برگزارکنندگان </p>
                                        </div>
                                    </div>
                                </div>
    
                                <button class="carousel-control-prev" type="button" data-bs-target="#hero-slide" data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Previous</span>
                                </button>
    
                                <button class="carousel-control-next" type="button" data-bs-target="#hero-slide" data-bs-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Next</span>
                                </button>
                            </div>
                        </div>
    
                    </div>
                </div>
            </section> 
    

    <div class="site-section courses-title" id="courses-section">
        <div class="container">
            <div class="row mb-5 justify-content-center">
                <div class="col-lg-7 text-center" data-aos="fade-up" data-aos-delay="">
                    <h2 class="section-title">رای گیری ، نظرسنجی و برگزاری انتخابات</h2>
                </div>
            </div>
        </div>
    </div>
    <div class="site-section courses-entry-wrap" data-aos="fade-up" data-aos-delay="100">
        <div class="container">
            <div class="row">

                <div class=" owl-carousel col-12 nonloop-block-14">

                    <div class=" box_fr course bg-white h-100 align-self-stretch">
                        <figure class="m-0">
                            <a href="course-single.html"><img src="pics/p1.jpg" alt="Image" class="img-fluid"></a>
                        </figure>
                        <div class="course-inner-text py-4 px-4 box_color">
                            <span class="course-price">589,000 تومان</span>
                          <!-- <div class="meta"><span class="icon-clock-o"></span>4 درس / 12 هفته</div> -->
                          <h3><a href="#">انتخابات کوچک در محدوده 500 نفر</a></h3>
                            <p>رای گیری ، نظرسنجی و انتخابات در این پکیج به تعداد 3 بار استفاده فعال است.</p>
                        </div>
                        <button class="btn_fr"><a href="./cardbuy/box/card1.html" style="text-decoration-line:none ;display:block;color:#fff;font-weight:bold;">افزودن به سبد خرید</a></button>
                    </div>

                    <div class="box_fr course bg-white h-100 align-self-stretch">
                        <figure class="m-0">
                            <a href="course-single.html"><img src="pics/p6.jpg" alt="Image" class="img-fluid"></a>
                        </figure>
                        <div class="course-inner-text py-4 px-4 box_color">
                            <span class="course-price"> 1,238,000 تومان</span>
                            <h3><a href="#">انتخابات کوچک در محدوده 1000 نفر</a></h3>
                            <p>این پکیج اختصاصی است و به تعداد 5 بار استفاده فعال خواهد بود </p>
                        </div>
                        <button class="btn_fr"><a href="./cardbuy/box/card6.html" style="text-decoration-line:none ;display:block;color:#fff;font-weight:bold;">افزودن به سبد خرید</a></button>
                    </div>

                    <div class="box_fr course bg-white h-100 align-self-stretch">
                        <figure class="m-0">
                            <a href="course-single.html"><img src="pics/p2.jpg" alt="Image" class="img-fluid"></a>
                        </figure>
                        <div class="course-inner-text py-4 px-4 box_color">
                            <span class="course-price">1,675,000 تومان</span>
                            <h3><a href="#">انتخابات متوسط در محدوده 1000 نفر</a></h3>
                            <p>رای گیری ، نظرسنجی و انتخابات در این پکیج به تعداد 3 بار استفاده فعال است.</p>

                        </div>
                        <button class="btn_fr"><a href="./cardbuy/box/card2.html" style="text-decoration-line:none ;display:block;color:#fff;font-weight:bold;">افزودن به سبد خرید</a></button>
                    </div>


                    <div class="box_fr course bg-white h-100 align-self-stretch">
                        <figure class="m-0">
                            <a href="course-single.html"><img src="pics/p5.jpg" alt="Image" class="img-fluid"></a>
                        </figure>
                        <div class="course-inner-text py-4 px-4 box_color">
                            <span class="course-price">1,986,000 تومان</span>
                            <h3><a href="#">انتخابات متوسط در محدوده 1500 نفر</a></h3>
                            <p>این پکیج اختصاصی است و به تعداد 10 بار استفاده فعال خواهد بود </p>
                        </div>
                        <button class="btn_fr"><a href="./cardbuy/box/card5.html" style="text-decoration-line:none ;display:block;color:#fff;font-weight:bold;">افزودن به سبد خرید</a></button>
                    </div>

                    <div class="box_fr course bg-white h-100 align-self-stretch">
                        <figure class="m-0">
                            <a href="course-single.html"><img src="pics/p3.jpg" alt="Image" class="img-fluid"></a>
                        </figure>
                        <div class="course-inner-text py-4 px-4 box_color">
                            <span class="course-price">2,435,000 تومان</span>
                            <h3><a href="#">انتخابات بزرگ در محدوده 2000 نفر</a></h3>
                            <p>رای گیری ، نظرسنجی و انتخابات در این پکیج به تعداد 3 بار استفاده فعال است.</p>
                        </div>
                        <button class="btn_fr"><a href="./cardbuy/box/card3.html" style="text-decoration-line:none ;display:block;color:#fff;font-weight:bold;">افزودن به سبد خرید</a></button>
                    </div>

                    <div class="box_fr course bg-white h-100 align-self-stretch">
                        <figure class="m-0">
                            <a href="course-single.html"><img src="pics/p4.jpg" alt="Image" class="img-fluid"></a>
                        </figure>
                        <div class="course-inner-text py-4 px-4 box_color">
                            <span class="course-price">3,210,000 تومان</span>
                            <h3><a href="#">انتخابات بزرگ در محدوده 2000 نفر</a></h3>
                            <p>این پکیج اختصاصی است و به تعداد 20 بار استفاده فعال خواهد بود </p>

                        </div>
                        <button class="btn_fr"><a href="./cardbuy/box/card4.html" style="text-decoration-line:none ;display:block;color:#fff;font-weight:bold;">افزودن به سبد خرید</a></button>
                    </div>

                </div>


            </div>
            <div class="row justify-content-center">
                <div class="col-7 text-center">
                    <button class="customPrevBtn btn btn-primary m-1">قبلی</button>
                    <button class="customNextBtn btn btn-primary m-1">بعدی</button>
                </div>
            </div>
        </div>
    </div>


    <div class="site-section" id="programs-section">
        <div class="container">
            <div class="row mb-5 justify-content-center">
                <div class="col-lg-7 text-center" data-aos="fade-up" data-aos-delay="">
                    <h1 class="section-title">درباره ما</h1>
                    <p>سامانه انتخابات الکترونیکی معینک به شما امکان برگزاری  انتخابات متنوع را از جمله انتخابات غیر حضوری و آنلاین یا انتخابات حضوری و الکترونیکی یا ترکیبی از هر نوع را میدهد. یک انتخابات هوشمند،آسان،مطمئن،شفاف و قابل اعتماد را تجربه می کنید. با استفاده از سامانه انتخابات الکترونیکی معینک،انواع انتخابات، رای گیری و نظر سنجی را به صورت مجازی، غیر حضوری و آنلاین قابل برگزاری است.برگزاری مجامع عمومی و خصوصی که نیاز کامل شرکت ها ، انجمن ها ، کانون ها و .... را برطرف میکند.
                    </p>
                    <h1 class="gray">فقط کافیه به ما اعتماد کنید</h1>
                </div>
            </div>
            <div class="row mb-5 align-items-center">
                <div class="col-lg-7 mb-5" data-aos="fade-up" data-aos-delay="100">
                    <img src="pics/m1.svg" alt="Image" class="img-fluid">
                </div>
                <div class="col-lg-4 ml-auto" data-aos="fade-up" data-aos-delay="200">
                    <h2 class="text-black mb-4 gray size" style="color: #737373 !important;">ما در امنیت عالی هستیم</h2>
                    <p class="mb-4">احراز هویت کاربران و امنیت داده ها، جلوگیری از دسترسی غیر مجاز</p>

                    <div class="d-flex align-items-center custom-icon-wrap mb-3">
                        <span class="custom-icon-inner ml-3"><span class="icon icon-graduation-cap"></span></span>
                        <div><h3 class="m-0">اقدامات امنیتی در برابر دسترسی غیر مجاز و حملات سایبری</h3></div>
                    </div>

                    <div class="d-flex align-items-center custom-icon-wrap">
                        <span class="custom-icon-inner ml-3"><span class="icon icon-university"></span></span>
                        <div><h3 class="m-0">سیاست حفظ حریم خصوصی یک خط مشی رازداری </h3></div>
                    </div>

                </div>
            </div>

            <div class="row mb-5 align-items-center">
                <div class="col-lg-7 mb-5 order-1 order-lg-2" data-aos="fade-up" data-aos-delay="100">
                    <img src="pics/mm.avif" alt="Image" class="img-fluid">
                </div>
                <div class="col-lg-4 mr-auto order-2 order-lg-1" data-aos="fade-up" data-aos-delay="200">
                    <h2 class="text-black mb-4 gray size" style="color: #737373 !important;">برگزاری انتخابات و رای گیری آسان</h2>
                    <p class="mb-4">رابط کاربری آسان و بصری ، دسترسی آسان  ملزوم به اطمینان دسترسی به تمام کاربران</p>

                    <div class="d-flex align-items-center custom-icon-wrap mb-3">
                        <span class="custom-icon-inner ml-3"><span class="icon icon-graduation-cap"></span></span>
                        <div><h3 class="m-0">نمایش نامزدها و مشخصات آن به صورت واضح</h3></div>
                    </div>

                    <div class="d-flex align-items-center custom-icon-wrap">
                        <span class="custom-icon-inner ml-3"><span class="icon icon-university"></span></span>
                        <div><h3 class="m-0">دسترسی آسان برای کاربران از جمله افراد دارای معلولیت</h3></div>
                    </div>

                </div>
            </div>

            <div class="row mb-5 align-items-center">
                <div class="col-lg-7 mb-5" data-aos="fade-up" data-aos-delay="100">
                    <img src="pics/mo.avif" alt="Image" class="img-fluid">
                </div>
                <div class="col-lg-4 ml-auto" data-aos="fade-up" data-aos-delay="200">
                    <h2 class="text-black mb-4 gray size" style="color: #737373 !important;">مدیریت پنل حساب های کاربری</h2>
                    <p class="mb-4">کاربران به راحتی میتوانند به صورت دقیق نتایج را مشاهده کنند</p>

                    <div class="d-flex align-items-center custom-icon-wrap mb-3">
                        <span class="custom-icon-inner ml-3"><span class="icon icon-graduation-cap"></span></span>
                        <div><h3 class="m-0">مشاهده سوابق رای گیری کنترل و مدیریت پنل حساب های کاربری</h3></div>
                    </div>

                    <div class="d-flex align-items-center custom-icon-wrap">
                        <span class="custom-icon-inner ml-3"><span class="icon icon-university"></span></span>
                        <div><h3 class="m-0">نمایش نتایج و تعداد آرا به صورت لحظه ای و دقیق</h3></div>
                    </div>

                </div>
            </div>

        </div>
    </div>
<div class="site-section pb-0">

    <div class="future-blobs">
        <div class="blob_2">
            <img src="pics/blob_2.svg" alt="Image">
        </div>
        <div class="blob_1">
            <img src="pics/blob_1.svg" alt="Image">
        </div>
    </div>
    <div class="container">
        <div class="row mb-5 justify-content-center" data-aos="fade-up" data-aos-delay="">
            <div class="col-lg-7 text-center">
                <h2 class="section-title">مناسب برای انواع رای گیری ها</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4 ml-auto align-self-start" data-aos="fade-up" data-aos-delay="100">

                <div class="p-4 rounded bg-white why-choose-us-box">

                    <div class="d-flex align-items-center custom-icon-wrap custom-icon-light mb-3">
                        <div class="ml-3"><span class="custom-icon-inner"><span
                                class="icon icon-graduation-cap"></span></span></div>
                        <div><h3 class="m-0"> رای گیری مدارس و انجمن ها</h3></div>
                    </div>

                    <div class="d-flex align-items-center custom-icon-wrap custom-icon-light mb-3">
                        <div class="ml-3"><span class="custom-icon-inner"><span
                                class="icon icon-university"></span></span>
                        </div>
                        <div><h3 class="m-0">  رای گیری  دانشگاه ها </h3></div>
                    </div>

                    <div class="d-flex align-items-center custom-icon-wrap custom-icon-light mb-3">
                        <div class="ml-3"><span class="custom-icon-inner"><span
                                class="icon icon-graduation-cap"></span></span></div>
                        <div><h3 class="m-0">رای گیری مشاغل و صنایع</h3></div>
                    </div>

                    <div class="d-flex align-items-center custom-icon-wrap custom-icon-light mb-3">
                        <div class="ml-3"><span class="custom-icon-inner"><span
                                class="icon icon-university"></span></span>
                        </div>
                        <div><h3 class="m-0">رای گیری احزاب و گروههای مردم نهاد</h3></div>
                    </div>

                    <div class="d-flex align-items-center custom-icon-wrap custom-icon-light mb-3">
                        <div class="ml-3"><span class="custom-icon-inner"><span
                                class="icon icon-graduation-cap"></span></span></div>
                        <div><h3 class="m-0">رای گیری وزارتخانه ها و سازمان ها</h3></div>
                    </div>

                    <div class="d-flex align-items-center custom-icon-wrap custom-icon-light">
                        <div class="ml-3"><span class="custom-icon-inner"><span
                                class="icon icon-university"></span></span>
                        </div>
                        <div><h3 class="m-0">رای گیری شرکت ها و مجتمع ها</h3></div>
                    </div>

                </div>


            </div>
            <div class="col-lg-7 align-self-end" data-aos="fade-left" data-aos-delay="200">
                <!-- <img src="pics/tr.png" alt="Image" class="img-fluid"> -->
                <img src="pics/tr1.png" alt="Image" class="img-fluid">

            </div>
        </div>
    </div>
</div>
<div class="contact text-left" id="frm2">
    <div class="form">
        <h6 class="section-title mb-4">تماس با ما</h6>
        <form>
            <div class="form-group">
                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="ایمیل را وارد کنید" required>
            </div>
            <div class="form-group">
                <input type="password" class="form-control" id="exampleInputPassword1" placeholder="رمز عبور" required>
            </div>
            <div class="form-group">
                <textarea name="contact-message" id="" cols="30" rows="5" class="form-control" placeholder="متن پیام"></textarea>
            </div>
            <button type="submit" class="btn btn-primary btn-block rounded w-lg">ارسال پیام</button>
        </form>
    </div>
    <div class="contact-infos">
        <div class="item">
            <i class="ti-location-pin"></i>
            <div class="">
                <h5>موقعیت مکانی</h5>
                <p>ایران : استان اصفهان شهرستان کاشان ....</p>
            </div>                          
        </div>
        <div class="item">
            <i class="ti-mobile"></i>
            <div>
                <h5>شماره تماس </h5>
                <p>98-9390000000</p>
            </div>                          
        </div>
        <div class="item">
            <i class="ti-email"></i>
            <div class="mb-0">
                <h5>نشانی الکترونیک</h5>
                <p>sayesh@gmail.com</p>
            </div>
        </div>
    </div>                  
</div>
<!-- form -->

<div style="height: 50px;"></div>
<footer style="margin-top: -130px;">
<div class="container">
    <div class="row">
        <div class="col-md-5">
            <div class="about-veno">
                <div class="logo">
                    <img src="pics/namad.jpg" alt="Venue Logo">
                </div>
                <!-- <p>سایت رای گیری سایش در راستای برطرف کردن نیار کاربران در زمینه نظرسنجی و رای گیری و برگزاری انتخابات به صورت غیر حضوری و آنلاین</p> -->
                    
                        <a href="#"><i class="fa fa-facebook"></i></a>
                        <a href="#"><i class="fa fa-twitter"></i></a>
                        <a href="#"><i class="fa fa-linkedin"></i></a>
                        <a href="#"><i class="fa fa-rss"></i></a>
                        <a href="#"><i class="fa fa-dribbble"></i></a>
                    
            
            </div>
        </div>
        <div class="col-md-4">
            <div class="useful-links">
                <div class="footer-heading">
                    <h4 style="color: #737373;">لینک های مفید</h4>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <ul>
                            <li><a href="index.html"><i class="fa fa-stop"></i>خانه</a></li>
                            <li><a href="#"><i class="fa fa-stop"></i>قوانین سایت</a></li>
                            <li><a href="#"><i class="fa fa-stop"></i>حریم خصوصی</a></li>
                            <li><a href="#"><i class="fa fa-stop"></i>سوالات متداول</a></li>
                            <li><a href="#"><i class="fa fa-stop"></i>راهنمای سایت</a></li>
                            <li><a href="#"><i class="fa fa-stop"></i>مشتریان ما</a></li>
                        </ul>
                    </div>
                    <div class="col-md-6">
                        <ul>
                            <li><a href="#"><i class="fa fa-stop"></i>خدمات</a></li>
                            <li><a href="sabtname/index.html"><i class="fa fa-stop"></i>ورود/ثبت نام</a></li>
                            <li><a href="#programs-section" class="nav-link">درباره ما</a></li>
                            <li><a href="#frm2"><i class="fa fa-stop"></i>تماس با ما</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="contact-info" >
                <div class="footer-heading">
                    <h4 style="color: #737373;">اطلاعات تماس</h4>
                </div>
                <p>سامانه الکترونیکی آنلاین رای گیری نظرسنجی و برگزاری انواع انتخابات 24 ساعته در حال ارائه خدمات به شما کاربران عزیز می باشد</p>
                <ul>
                    <li><span> تلفن:</span><a href="#">9390000000-98</a></li>
                    <li><span>ایمیل:</span><a href="#">sayesh@gmail.com</a></li>
                    <li><span>آدرس:</span><a href="#">کاشان،خیابان ...</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
<p style="text-align: center; margin-top: 1rems;">تمامی حقوق متعلق به وبسایت سایش میباشد.</p>
</footer>






<script src="js/jquery-3.3.1.min.js"></script>
<script src="js/jquery-migrate-3.0.1.min.js"></script>
<script src="js/jquery-ui.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/owl.carousel.min.js"></script>
<script src="js/jquery.stellar.min.js"></script>
<script src="js/jquery.countdown.min.js"></script>
<script src="js/bootstrap-datepicker.min.js"></script>
<script src="js/jquery.easing.1.3.js"></script>
<script src="js/aos.js"></script>
<script src="js/jquery.fancybox.min.js"></script>
<script src="js/jquery.sticky.js"></script>


<script src="js/main.js"></script>
</body>
</html>