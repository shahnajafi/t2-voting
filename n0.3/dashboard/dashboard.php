<!---->
<?php require_once  "../config.php"?>
<?php require_once "sidebar.php"?>
<?php require_once "header.php" ?>
     <div class="breadcrumb-area">
        <ol class="breadcrumb">
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
                    <?php $all_user_vote = count_user_vote() ?>
                    <span class="sub-title">تعداد کل رای ها</span>
                    <h3><?= count($all_user_vote) ?></h3>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="stats-fun-fact-box">
                    <div class="icon-box">
                        <i class="ri-file-list-line"></i>
                    </div>
                    <span class="sub-title">نام نامزد براساس بیشترین رای</span>
                    <h3><?php $count_vote = max_vot_namzad();
                               echo $count_vote->name_namzad;
                    ?></h3>
                </div>
            </div>
        </div>
    </div>

  <?php require_once "footer.php"?>

