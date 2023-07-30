<?php

ob_start();
if (isset($_POST['submit'])){
    $username = $_POST["username"];
    $email = $_POST["email"];
    $pwd = $_POST["password"];
    $pwdConfirm = $_POST["pwdConfirm"];

    require_once 'db.inc.php';
    require_once 'functions.inc.php';

    if (pwdMatch($pwd, $pwdConfirm) !==false) {
        header("location: ../createadmin.php?error=passwords_don't_match");
        exit();
    }
    
    createAdmin($conn, $username, $email, $pwd);
}else {
    header("Location: ../index.php");
    exit();
}
ob_end_flush();