<?php

ob_start();
if (isset($_POST['submit'])){
    $scheduleTime = $_POST["scheduleTime"];
    $trainDetails = $_POST["trainDetails"];
    $routefrom = $_POST["from"];
    $routeto = $_POST["to"];
    $firstClass = $_POST["firstClass"];
    $economy = $_POST["economy"];


    require_once 'db.inc.php';
    require_once 'functions.inc.php';

    createSchedule($conn, $scheduleTime, $trainDetails, $routefrom, $routeto, $firstClass, $economy);
}else {
    header("Location: ../schedule_list.php");
    exit();
}
ob_end_flush();