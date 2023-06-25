<?php require_once "../config.php"?>
<?php require_once "sidebar.php"?>
<?php require_once "header.php" ?>
<div class="breadcrumb-area">
    <h1>مدیریت کاربران و رای آنها</h1>
</div>


<div class="manage-jobs-box">
    <h3>مدیریت کاربران و رای آنها</h3>
    <div class="bar"></div>
    <div class="manage-jobs-table table-responsive">
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>نام ونام خانوادگی کاربر</th>
                <th>کدملی کاربر</th>
                <th>ایمیل کاربر</th>
                <th>تلفن کاربر</th>
                <th>نام نامزد انتخاباتی</th>
                <th>دسته ی رای گیری</th>
                <th>عملیات</th>
            </tr>
            </thead>
            <tbody>
            <?php $all_user_vote = all_user_vote();
            foreach ($all_user_vote as $user) {
                $find_user_base_national_code = find_user_with_national_code($user->national_code_user);
                $find_title_voting_number = find_title_voting_number($user->voting_number);
                ?>
                <tr>
                    <td>
                        <h5><?= $find_user_base_national_code->username ?></h5>
                    </td>
                    <td><?= $find_user_base_national_code->national_code ?></td>
                    <td><?= $find_user_base_national_code->email ?></td>
                    <td><?= $find_user_base_national_code->phones ?></td>
                    <td><?= $user->name_namzad ?></td>
                    <td><?= $find_title_voting_number->title ?></td>
                    <td>
                        <ul class="option-list">
                            <li>
                                <a href="delete_user.php?id=<?= $user->id ?>"
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
