<?php

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    require_once 'db.inc.php';
    require_once 'functions.inc.php';

    removeTrain($conn, $id);
    
}else {
    header("location: ../trainlist.php");
    exit();
}