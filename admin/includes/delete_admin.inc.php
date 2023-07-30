<?php

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    require_once 'db.inc.php';
    require_once 'functions.inc.php';

    removeAdmin($conn, $id);
    
}else {
    header("location: ../admin_list.php");
    exit();
}