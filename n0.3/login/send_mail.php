<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ارسال فرم به ایمیل شما</title>
    <style>
        body{
            font-family: Tahoma;
            background-color: #18425e;
            margin-top: 50px;
            text-align: center;
            color: white;
            font-size: large;
        }
    </style>
</head>
<body dir="rtl">
<?php
if(isset($_POST['email'])) {
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $tel = $_POST['tel'];
    $question = $_POST['question'];
    $subject = "ثبت درخواست نمایندگی در سایت"; /* Email Subject */

    $message = "کاربر با ایمیل ".$email." درخواست نمایندگی خود را ثبت کرده است.<br>"; /* Email Message */
    $message .= "نام: " . $fname . ' ' . '<br>';
    $message .= "پست الکترونیک: " . $email . ' ' . '<br>';
    $message .= "تلفن تماس: " . $tel;

    $to = 'youremail@example.com'; /* Email you want to send */

    /* if(mail($to, $subject, $message)) */
    if(1 == 1){ /* CHANGE THIS LINE WITH ABOVE */
        echo 'درخواست شما با موفقیت ارسال شد.';
    }
    else{
        echo 'مشکلی در ارسال درخواست پیش آمده است.';
    }
}
?>
</body>
</html>

