<?php
require_once "../config.php";

if (isset($_POST["submit"])) {
    if (!isset($_POST["national_code"]) || !isset($_POST["username"])
        || !isset($_POST["password"]) || !isset($_POST["repeat_password"])
        || !isset($_POST["email"]) || !isset($_POST["phones"]) || !isset($_POST["voting_number"])) {
        $error = "خطا!!! هیچ فیلدی نباید حذف شود";
    }elseif ($_POST["national_code"] == "" || $_POST["username"] == "" || $_POST["password"] == ""
        || $_POST["email"] == "" || $_POST["phones"] == ""
        || $_POST["voting_number"] == ""){
        $error = "خطا!!! هیچ فیلدی نباید خالی باشد";
    }else {
        $national_code = $_POST["national_code"];
        $username = $_POST["username"];
        $password = $_POST["password"];
        $repeat_password = $_POST["repeat_password"];
        $email = $_POST["email"];
        $phones = $_POST["phones"];
        $voting_number = $_POST["voting_number"];

        $check_user = Check_User($national_code, $username, $password, $email, $phones);
        $check_voting_number = Chech_voting_number($voting_number);

        $national_codes = custom_check_national_code($national_code);
        if($national_codes === false) {
            $error = "کد ملی وارد شده صحیح نمی باشد ";
        }elseif ($password !== $repeat_password) {
            $error = "گذرواژه وتکرار گذرواژه یکی نمی باشد";
        }elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $error = "ایمیل وارد شده صحیح نمی باشد";
        }elseif ($check_user !== null) {
            $error = "کاربری با این مشخصات قبلا ثبت نام کرده است";
        } elseif ($check_voting_number === null) {
            $error = "شماره رای گیری که وارد کرده اید نادرست است";
        } else {
            $insert_user = Insert_User($national_code, $username, $password, $email, $phones);
            $error = "اطلاعات با موفقیت درج شد ";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>ورود به رای گیری</title>
	<!-- Styles -->
	<link type="text/css" href="css/bootstrap.min.css" rel="stylesheet" />
	<link type="text/css" href="css/style.css" rel="stylesheet" />
	<!-- /Styles -->
</head>
<body class="rtl">
	<div class="container register">
		<div class="row">
			<!-- Right Side Title -->
			<div class="col-12 col-md-3 register-right">
				<img src="https://image.ibb.co/n7oTvU/logo_white.png" alt=""/>
				<!-- <h3>خوش آمدید</h3> -->
				<h5>تنها سایت رای گیری متعبر</h5>
				<br>
				<h1>مطمئن</h1>
				<br>
				<h2>قابل اعتماد</h2>
				<br>
				<h3> آسان</h3>
				<input style="margin-top:15px;color: crimson;" type="submit" name="" value="ورود به سایت" onclick="goToSite()" /><br/>
			</div>
			<!-- /Right Side Title -->
			<!-- Left Side Forms -->
			<div class="col-12 col-md-9">
				<div class="register-left p-3">
					<!-- Tabs Nav-bar -->
					<ul class="nav nav-tabs nav-justified" id="myTab" role="tablist">
						<li class="nav-item">
							<a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">رای دهنده</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">رای گیرنده</a>
						</li>
					</ul>
					<!-- /Tabs Nav-bar -->
					<div class="tab-content" id="myTabContent">
						<!-- Tab 1 -->
						<div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
							<h3 class="register-heading">ثبت نام رای دهنده</h3>
							<form action="" method="post">
								<div class="row register-form mx-auto">
									<div class="col-12 col-md-6">
										<div class="form-group">
											<label style="color:green ;" for="">کد رای دهنده کدملی می باشد</label>
											<input type="text" name="national_code" class="form-control" placeholder="*کد رای دهنده" value="" />
										</div>
										<!-- <div class="form-group">
											<input type="text" class="form-control" placeholder="* نام" value="" />
										</div> -->
										<div class="form-group">
											<input type="text" class="form-control" placeholder="* نام و نام خانوادگی" value="" name="username"/>
										</div>
										<div class="form-group">
											<input type="password" class="form-control" placeholder="رمز عبور *" value="" name="password"/>
										</div>
										<div class="form-group">
											<input type="password" class="form-control"  placeholder="تکرار رمز عبور *" value="" name="repeat_password"/>
										</div>
									</div>
									<div class="col-12 col-md-6">
										<div class="form-group">
											<br style="margin-top:8px ;">
											<input type="email" class="form-control" placeholder="پست الکترونیک *" value="" name="email" />
										</div>
										<div class="form-group">
											<input type="text"  name="phones" class="form-control" placeholder="* تلفن تماس" />
										</div>
										<div class="form-group">
											<input type="text"  name="voting_number" class="form-control" placeholder="*شماره رای گیری " value="" />
										</div>
                                        <?php if (isset($error)) echo $error?>
										<input type="submit" class="btnRegister" name="submit"  value="ورود"/>
									</div>
								</div>
							</form>
						</div>
						<!-- /Tab 1 -->
						<!-- Tab 2 -->
						<div class="tab-pane fade show" id="profile" role="tabpanel" aria-labelledby="profile-tab">
							<h3  class="register-heading">ورود  رای گیرنده</h3>
							<form action="" method="post">
								<div class="row register-form mx-auto">
									<div class="col-12 col-md-6">
										<div class="form-group">
											<label style="color:green ;" for="">کد رای گیرنده کدملی می باشد </label>
											<input type="text" name="tel" maxlength="10" minlength="10" class="form-control" placeholder="*کد رای گیرنده" value="" />
										</div>
										<div class="form-group">
											<input type="text" name="fname" class="form-control" placeholder="* نام" value="" />
										</div>
										<div class="form-group">
											<input type="text" name="lname" class="form-control" placeholder="* نام خانوادگی" value="" />
										</div>
										<div class="form-group">
											<input type="email" name="email" class="form-control" placeholder="پست الکترونیک *" value="" />
										</div>
										
									</div>
									<div class="col-12 col-md-6">
										<div class="form-group">
											<input type="text" name="tel" maxlength="10" minlength="10" class="form-control" placeholder="* تلفن تماس" value="" />
										</div>
										<div class="form-group">
											<input type="password" name="password" class="form-control" placeholder="رمز عبور *" value="" />
										</div>
										<div class="form-group">
											<input type="password" name="repeat_password" class="form-control" placeholder="تکرار رمز عبور *" value="" />
										</div>

										<div class="form-group">
											<select class="form-control" name="question">
												<option class="hidden"  selected disabled>سوال امنیتی را انتخاب کنید</option>
												<option>در چه ماهی متولد شده اید؟</option>
												<option>برند تلفن همراه شما چیست؟</option>
												<option>نام نخستین عمویتان چیست؟</option>
											</select>
										</div>
										<div class="form-group"> 
											 <input type="text" name="answer" class="form-control" placeholder="* پاسخ را وارد کنید" value="" /> 
										</div>
                                        <input type="submit" class="btnRegister"  value="ثبت نام"/>
									</div>
								</div>
							</form>
						</div>
						<!-- /Tab 2 -->
					</div>
				</div>
			</div>
			<!-- /Left Side Forms -->
			<!-- <div class="col-12 mt-3 small text-white text-center">فارسی و راست چین شده توسط <a href="http://webrubik.com/" class="text-white">وب روبیک</a></div> -->
		</div>
	</div>

	<!-- Scripts -->
	<script src="js/jquery-3.1.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script type="text/javascript">
		function goToSite() {
			location.replace("../index.php");
		}
	</script>
	<!-- /Scripts -->

</body><!-- This template has been downloaded from Webrubik.com -->
</html>
