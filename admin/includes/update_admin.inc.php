<?php

if (isset($_POST['update'])) {
    $adminId = $_POST["adminId"];
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $passwordCode = $_POST["passwordCode"];

    require_once 'db.inc.php';
    require_once 'functions.inc.php';


    updateAdmin($conn, $adminId, $username, $email, $password, $passwordCode);

}else {
    header("location: ../admin_list.php");
    exit();
}