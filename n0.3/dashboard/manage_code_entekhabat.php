<?php require_once "../config.php"?>
<?php require_once "sidebar.php"?>
<?php require_once "header.php" ?>
<div class="breadcrumb-area">
    <h1>مدیریت شماره رای گیری ها</h1>
    <ol class="breadcrumb">

    </ol>
</div>


<div class="manage-jobs-box">
    <h3>مدیریت شماره رای گیری ها</h3>
    <div class="col-lg-12 col-md-12 d-flex">
        <div class="col-lg-2 col-md-2" style="margin: 20px">
            <a class="default-btn" href="create_code_entekhabat.php">افزودن کدانتخاباتی جدید</a>
        </div>
    </div>
    <div class="bar"></div>
    <div class="manage-jobs-table table-responsive">
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>عنوان</th>
                <th>کد انتخابی</th>
                <th>عملیات</th>
            </tr>
            </thead>
            <tbody>
            <?php $all_voting_number = all_voting_number();
            foreach ($all_voting_number as $voting_number) {?>
                <tr>
                    <td>
                        <h5><?= $voting_number->title ?></h5>
                    </td>
                    <td><?= $voting_number->voting_number ?></td>
                    <td>
                        <ul class="option-list">
                            <li>
                                <a href="edit_voting_number_show.php?id=<?= $voting_number->id ?>"
                                   style="text-align: center"
                                   class="option-btn d-inline-block" data-bs-toggle="tooltip" data-bs-placement="top"
                                   title="ویرایش ">
                                    <i class="ri-edit-line"></i>
                                </a>
                            </li>
                            <li>
                                <a href="delete_voting_number.php?id=<?= $voting_number->id ?>"
                                   style="text-align: center"
                                   class="option-btn d-inline-block" data-bs-toggle="tooltip" data-bs-placement="top"
                                   title="حذف">
                                    <i class="ri-delete-bin-line"></i>
                                </a>
                            </li>

                        </ul>
                    </td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>
</div>
<?php require_once "footer.php"?>
