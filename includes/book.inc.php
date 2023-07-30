<?php

ob_start();
if (isset($_POST['submit'])){
    $classType = $_POST["classType"];
    $scheduleCode = $_POST["scheduleCode"];
    $schedule = $_POST["schedule"];
    $trainDetails = $_POST["trainDetails"];
    $firstName = $_POST["firstName"];
    $lastName = $_POST["lastName"];

    require_once 'db.inc.php';
    require_once 'functions.inc.php';

    createReservation($conn, $classType, $scheduleCode, $schedule, $trainDetails, $firstName, $lastName);
}else {
    header("Location: ../book.php");
    exit();
}
ob_end_flush();