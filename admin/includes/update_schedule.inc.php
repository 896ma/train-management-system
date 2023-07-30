<?php

if (isset($_POST['update'])) {
    $id = $_POST["id"];
    $scheduleTime = $_POST["scheduleTime"];
    $trainDetails = $_POST["trainDetails"];
    $from = $_POST["from"];
    $to = $_POST["to"];
    $firstClass = $_POST["firstClass"];
    $economy = $_POST["economy"];

    require_once 'db.inc.php';
    require_once 'functions.inc.php';


    updateSchedule($conn, $id, $scheduleTime, $trainDetails, $from, $to, $firstClass, $economy);

}else {
    header("location: ../schedule_list.php");
    exit();
}