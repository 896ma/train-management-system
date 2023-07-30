<?php

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    require_once 'db.inc.php';
    require_once 'functions.inc.php';

    removeUser($conn, $id);
    
}else {
    header("location: ../users_list.php");
    exit();
}