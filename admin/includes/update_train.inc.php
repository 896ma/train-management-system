<?php

if (isset($_POST['update'])) {
    $trainId = $_POST["trainId"];
    $trainCode = $_POST["trainCode"];
    $trainName = $_POST["trainName"];
    $firstClassSeat = $_POST["firstClassSeat"];
    $secondClassSeat = $_POST["secondClassSeat"];

    require_once 'db.inc.php';
    require_once 'functions.inc.php';


    updateTrain($conn, $trainId, $trainCode, $trainName, $firstClassSeat, $secondClassSeat);

}else {
    header("location: ../trainlist.php");
    exit();
}