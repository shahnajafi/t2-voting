<?php
include "../config.php";

if (!isset($_GET["id"])) {
    header("Location: manage_code_entekhabat.php");
    exit();
}

$id = $_GET["id"];

Delete_Voting_Number($id);
header("Location: manage_code_entekhabat.php");
exit();
