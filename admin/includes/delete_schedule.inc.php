<?php

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    require_once 'db.inc.php';
    require_once 'functions.inc.php';

    removeSchedule($conn, $id);
    
}else {
    header("location: ../schedule_list.php");
    exit();
}