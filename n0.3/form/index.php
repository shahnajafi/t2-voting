<?php
require_once "../config.php";
if (isset($_POST["submit"])) {
    if ($_POST["national_code"] == "" || $_POST["name_family"] == "" || $_POST["voting_number"] == "" || $_POST["name_namzad"] == "name_namzad"){
        $error = "خطا!!! هیچ فیلدی نباید خالی باشد";
    }else{
        $national_code = $_POST["national_code"];
        $name_family = $_POST["name_family"];
        $voting_number = $_POST["voting_number"];
        $name_namzad = $_POST["name_namzad"];

        $voting_number_ids = Chech_voting_number($voting_number);
        $voting_number_id = $voting_number_ids->id;
        $check_user = check_user_national_code($national_code,$name_family);
        $check_user_vote = check_user_vote($national_code,$voting_number,$name_namzad);

        if($check_user_vote !== null) {
            $error = "شما فقط یکبار می توانید رای بدهید";
        }elseif ($check_user === null) {
            $error = "کاربری یافت نشد ! لطفا قبل از رای دادن ثبت نام کنید";
        }else{
            $check_namzad = check_namzad($name_namzad);
            if ($check_namzad === null){
                $error = "نامزد انتخاباتی با این نام وجود ندارد";
            }else {
                $a = check_namzad($name_namzad);
                $namzad_id = $a->id;
                $check_voting_number_namzad = check_voting_number_namzad($namzad_id,$voting_number_id);

                if ($check_voting_number_namzad === null) {
                    $error = "این نام نامزد به شماره رای گیری اختصاص ندارد";
                }else{
                    $insert_vote = insert_user_vote($national_code,$voting_number,$name_namzad);
                    $error = "رای شما با موفقیت ثبت شد";
                }

            }
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
	<title></title>
<!--	<link type="text/css" href="css/style.css" rel="stylesheet" />-->
	<style>
		/* CSS Document */
		@charset "UTF-8";

		@font-face {
			font-family: 'Vazir';
			src: url('../fonts/Vazir.eot');
			src: local('../fonts/Vazir'), url('../fonts/Vazir.woff') format('woff'), url('../fonts/Vazir.ttf') format('truetype');
		}

		* {
			margin: 0;
			padding: 0;
			box-sizing: border-box;
			-webkit-box-sizing: border-box;
			-moz-box-sizing: border-box;
			-webkit-font-smoothing: antialiased;
			-moz-font-smoothing: antialiased;
			-o-font-smoothing: antialiased;
			font-smoothing: antialiased;
			text-rendering: optimizeLegibility;
		}

		body {
			font-family: 'Vazir';
			font-weight: 100;
			font-size: 12px;
			line-height: 30px;
			color: #777;
			background: #82b1ff;
			direction: rtl;
		}

		.container {
			max-width: 400px;
			width: 100%;
			margin: 0 auto;
			position: relative;
		}

		#contact input[type="text"],
		#contact input[type="email"],
		#contact input[type="tel"],
		#contact input[type="url"],
		#contact textarea,
		#contact button[type="submit"] {
			font: 400 12px/16px "Vazir", Helvetica, Arial, sans-serif;
		}

		#contact {
			background: #F9F9F9;
			padding: 25px;
			margin: 100px 0;
			box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.24);
		}

		#contact h3 {
			display: block;
			font-size: 30px;
			font-weight: 300;
			margin-bottom: 10px;
		}

		#contact h4 {
			margin: 5px 0 15px;
			display: block;
			font-size: 13px;
			font-weight: 400;
		}

		fieldset {
			border: medium none !important;
			margin: 0 0 10px;
			min-width: 100%;
			padding: 0;
			width: 100%;
		}

		#contact input[type="text"],
		#contact input[type="email"],
		#contact input[type="tel"],
		#contact input[type="url"],
		#contact textarea {
			width: 100%;
			border: 1px solid #ccc;
			background: #FFF;
			margin: 0 0 5px;
			padding: 10px;
		}

		#contact input[type="text"]:hover,
		#contact input[type="email"]:hover,
		#contact input[type="tel"]:hover,
		#contact input[type="url"]:hover,
		#contact textarea:hover {
			-webkit-transition: border-color 0.3s ease-in-out;
			-moz-transition: border-color 0.3s ease-in-out;
			transition: border-color 0.3s ease-in-out;
			border: 1px solid #aaa;
		}

		#contact textarea {
			height: 100px;
			max-width: 100%;
			resize: none;
		}

		#contact button[type="submit"] {
			cursor: pointer;
			width: 100%;
			border: none;
			background: #4CAF50;
			color: #FFF;
			margin: 0 0 5px;
			padding: 10px;
			font-size: 15px;
		}

		#contact button[type="submit"]:hover {
			background: #43A047;
			-webkit-transition: background 0.3s ease-in-out;
			-moz-transition: background 0.3s ease-in-out;
			transition: background-color 0.3s ease-in-out;
		}

		#contact button[type="submit"]:active {
			box-shadow: inset 0 1px 3px rgba(0, 0, 0, 0.5);
		}

		.copyright {
			text-align: center;
		}

		#contact input:focus,
		#contact textarea:focus {
			outline: 0;
			border: 1px solid #aaa;
		}

		::-webkit-input-placeholder {
			color: #888;
		}

		:-moz-placeholder {
			color: #888;
		}

		::-moz-placeholder {
			color: #888;
		}

		:-ms-input-placeholder {
			color: #888;
		}

	</style>
</head>
<body>
	<div class="container">
		<form id="contact" action="" method="post">
			<h3>رای من به :</h3>
			<fieldset>
				<input placeholder="کدملی" type="text" tabindex="1" required autofocus name="national_code">
			</fieldset>
			<fieldset>
				<input placeholder="نام ونام خانوادگی شما" type="text" tabindex="1" required autofocus name="name_family">
			</fieldset>
			<fieldset>
				<input placeholder="شماره رای گیری" type="text" tabindex="3" required name="voting_number">
			</fieldset>
			<fieldset>
				<input placeholder="نام نامزد انتخاباتی" type="text" tabindex="4" required name="name_namzad">
			</fieldset>
			<fieldset>
				<button name="submit" type="submit" id="contact-submit" data-submit="...ارسال">ارسال</button>
			</fieldset>
            <?php if (isset($error)) { ?>
            <h4 style="background-color: #f4ff81;color: black;padding: 7px;border-radius: 10px;font-size: 17px"><?= $error ?></h4>
            <?php } ?>
		</form>
	</div>
</body><!-- This template has been downloaded from Webrubik.com -->
</html>
