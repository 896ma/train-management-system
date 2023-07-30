<?php

ob_start();
if (isset($_POST['submit'])){
    $trainCode = $_POST["trainCode"];
    $trainName = $_POST["trainName"];
    $firstClassSeat = $_POST["firstClassSeat"];
    $secondClassSeat = $_POST["secondClassSeat"];


    require_once 'db.inc.php';
    require_once 'functions.inc.php';

    // set the default timezone to use.
    date_default_timezone_set('UTC');
    $creationDate = date("d-m-Y");

    createTrain($conn, $trainName, $firstClassSeat, $secondClassSeat, $creationDate, $trainCode);
}else {
    header("Location: ../trainlist.php");
    exit();
}
ob_end_flush();