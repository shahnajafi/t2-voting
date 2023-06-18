<!---->
<?php //if (!isset($_SESSION["admin"])) {
//    header("Location: login/index.php");
//};
//exit();?>
<?php require_once "sidebar.php"?>
<?php require_once "header.php" ?>
     <div class="breadcrumb-area">
        <h1>سلام، عضو گرامی!</h1>
        <ol class="breadcrumb">
            <li class="item"><a href="dashboard.html">خانه</a></li>
            <li class="item">داشبورد</li>
        </ol>
    </div>


    <div class="dashboard-fun-fact-area">
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="stats-fun-fact-box">
                    <div class="icon-box">
                        <i class="ri-briefcase-line"></i>
                    </div>
                    <span class="sub-title">مشاغل ارسال شده</span>
                    <h3>100</h3>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="stats-fun-fact-box">
                    <div class="icon-box">
                        <i class="ri-file-list-line"></i>
                    </div>
                    <span class="sub-title">متقاضیان</span>
                    <h3>6382</h3>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="stats-fun-fact-box">
                    <div class="icon-box">
                        <i class="ri-chat-2-line"></i>
                    </div>
                    <span class="sub-title">پیام ها</span>
                    <h3>85</h3>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="stats-fun-fact-box">
                    <div class="icon-box">
                        <i class="ri-bookmark-line"></i>
                    </div>
                    <span class="sub-title">فهرست کوتاه</span>
                    <h3>57</h3>
                </div>
            </div>
        </div>
    </div>

  <?php require_once "footer.php"?>

