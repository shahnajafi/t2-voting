<?php
include "../config.php";

if (!isset($_GET["id"])) {
    header("Location: manage_namzad_entekhabat.php");
    exit();
}

$id = $_GET["id"];

Delete_namzad($id);
header("Location: manage_namzad_entekhabat.php");
exit();
