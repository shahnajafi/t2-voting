<?php require_once "../config.php"?>
<?php if (isset($_POST["submit"])) {
    if ($_POST["name_family"] !== "" || $_POST["age"] || $_POST["tahsilat"])  {
        $name_family = $_POST["name_family"];
        $age = $_POST["age"];
        $tahsilat = $_POST["tahsilat"];
        $namzad_id = $_GET["id"];
        $categories_id = $_POST["voting_number_id"];
        Update_namzad($name_family,$age,$tahsilat,$namzad_id);
        foreach ($categories_id as $category_id) {
            Delete_namzad_voting_number($_GET["id"]);
            insert_namzad_voting_number($category_id,$_GET["id"]);
        }
        header("Location: manage_namzad_entekhabat.php");
        exit();
    }
} ?>
<?php require_once "sidebar.php"?>
<?php require_once "header.php" ?>
<?php $find_namzad = find_namzad($_GET["id"]) ?>
    <div class="breadcrumb-area">
        <h1>ویرایش نامزد انتخاباتی </h1>
    </div>
    <div class="post-a-new-job-box">
        <h3>ویرایش نامزد انتخاباتی </h3>
        <div class="bar"></div>
        <form action="" method="post">
            <div class="row">
                <div class="col-xl-6 col-lg-12 col-md-12">
                    <div class="form-group">
                        <label>نام ونام خانوادگی نامزد</label>
                        <input type="text" class="form-control"  name="name_family" value="<?= $find_namzad->name_family ?>">
                    </div>
                </div>
                <div class="col-xl-6 col-lg-12 col-md-12">
                    <div class="form-group">
                        <label> سن نامزد</label>
                        <input type="text" class="form-control"  name="age" value="<?= $find_namzad->age ?>">
                    </div>
                </div>
                <div class="col-xl-6 col-lg-12 col-md-12">
                    <div class="form-group">
                        <label> تحصیلات نامزد</label>
                        <input type="text" class="form-control"  name="tahsilat" value="<?= $find_namzad->tahsilat ?>">
                    </div>
                </div>
                <div class="col-xl-6 col-lg-12 col-md-12">
                    <div class="form-group">
                        <label> شماره انتخاباتی نامزد</label>
                       <select class="form-control" multiple name="voting_number_id[]">
                           <?php $all_voting_number = all_voting_number();
                           foreach ($all_voting_number as $voting_number) {?>
                           <option value="<?= $voting_number->id ?>"><?= $voting_number->title?></option>
                           <?php } ?>
                       </select>
                    </div>
                </div>
                <input type="hidden" value="<?= $_GET["id"] ?>" name="id">
                <div class="col-lg-12 col-md-12">
                    <button type="submit" class="default-btn" name="submit">ویرایش </button>
                </div>
            </div>
        </form>
    </div>

<?php require_once "footer.php" ?>