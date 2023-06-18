<?php require_once "../config.php"?>
<?php if (isset($_POST["submit"])) {
    if ($_POST["title"] !== "" || $_POST["voting_number"])  {
        $id = $_POST["id"];
        $title = $_POST["title"];
        $voting_number = $_POST["voting_number"];
        Update_Voting_number($id,$title,$voting_number);
        header("Location: manage_code_entekhabat.php");
        exit();
    }
} ?>

<?php $find_voting_number = find_voting_number($_GET["id"]) ?>
<?php require_once "sidebar.php"?>
<?php require_once "header.php" ?>

    <div class="breadcrumb-area">
        <h1>ویرایش شماره رای گیری</h1>
    </div>
    <div class="post-a-new-job-box">
        <h3>ویرایش شماره رای گیری</h3>
        <div class="bar"></div>
        <form action="" method="post">
            <div class="row">
                <div class="col-xl-6 col-lg-12 col-md-12">
                    <div class="form-group">
                        <label>عنوان</label>
                        <input type="text" class="form-control"  name="title" value="<?= $find_voting_number->title ?>">
                    </div>
                </div>
                <div class="col-xl-6 col-lg-12 col-md-12">
                    <div class="form-group">
                        <label> شماره</label>
                        <input type="text" class="form-control"  name="voting_number" value="<?= $find_voting_number->voting_number ?>">
                    </div>
                </div>
                <input type="hidden" name="id" value="<?= $_GET["id"] ?>">
                <div class="col-lg-12 col-md-12">
                    <button name="submit" type="submit" class="default-btn">ویرایش</button>
                </div>
            </div>
        </form>
    </div>

<?php require_once "footer.php" ?>