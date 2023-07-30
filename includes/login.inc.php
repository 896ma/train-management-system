<?php

ob_start();
if (isset($_POST['submit'])){
    $username = $_POST["username"];
    $pwd = $_POST["password"];

    require_once 'db.inc.php';
    require_once 'functions.inc.php';
    
    loginUser($conn, $username, $pwd);
}else {
    header("Location: ../index.php");
    exit();
}
ob_end_flush();