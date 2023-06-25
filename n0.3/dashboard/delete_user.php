<?php
include "../config.php";

if (!isset($_GET["id"])) {
    header("Location: manage_user.php");
    exit();
}

$id = $_GET["id"];

Delete_user_vote($id);
header("Location: manage_user.php");
exit();