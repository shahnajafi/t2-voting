<?php require_once "../config.php"?>
<?php require_once "sidebar.php"?>
<?php require_once "header.php" ?>
    <div class="breadcrumb-area">
        <h1>مدیریت نامزدهای انتخابات</h1>
    </div>


    <div class="manage-jobs-box">
        <h3>مدیریت نامزدهای انتخابات</h3>
        <div class="bar"></div>
        <div class="manage-jobs-table table-responsive">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>نام ونام خانوادگی نامزد</th>
                    <th>تحصیلات</th>
                    <th>سن</th>
                    <th>دسته ی رای گیری</th>
                    <th>عملیات</th>
                </tr>
                </thead>
                <tbody>
                <?php $all_namzad = all_namzad();
                foreach ($all_namzad as $namzad) {?>
                <tr>
                    <td>
                        <h5><?= $namzad->name_family ?></h5>
                    </td>
                    <td><?= $namzad->tahsilat ?></td>
                    <td><?= $namzad->age ?></td>
                    <td>
                        <?php
                        $voting_number_title = voting_number_title($namzad->id);
                        $a = array_column($voting_number_title, "title", "id");
                        echo implode(" , ", $a);
                        ?>

                    </td>
                    <td>
                        <ul class="option-list">
                            <li>
                                <a href="edit_namzad_show.php?id=<?= $namzad->id ?>"
                                   style="text-align: center"
                                   class="option-btn d-inline-block" data-bs-toggle="tooltip" data-bs-placement="top"
                                   title="ویرایش ">
                                    <i class="ri-edit-line"></i>
                                </a>
                            </li>
                            <li>
                                <a href="delete_namzad.php?id=<?= $namzad->id ?>"
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
