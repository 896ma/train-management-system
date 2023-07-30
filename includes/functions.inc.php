<?php
ob_start();

// check if password match
function pwdMatch($pwd, $pwdConfirm){
    $result;
    if ($pwd !== $pwdConfirm) {
        $result=true;
    }else{
        $result=false;
    }
    return $result;
}

// create account
function createUser($conn, $username, $email, $pwd){
    $sql = "INSERT INTO user_details (username, email, passwordCode) VALUES (?, ?, ?);";
    $stmt = mysqli_stmt_init($conn);
 
    if (!mysqli_stmt_prepare($stmt, $sql)) {
     header("Location: ../createaccount.php?error=stmt_failed");
     exit();
    }

    $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);
 
    mysqli_stmt_bind_param($stmt, "sss", $username, $email, $hashedPwd);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    $last_id = $conn->insert_id;
    loginUser($conn, $username, $pwd);
 }

// check if account exists
function accountExists($conn, $username, $email){
    $sql = "SELECT * FROM user_details WHERE username = ? OR email = ?;";
    $stmt = mysqli_stmt_init($conn);
 
    if (!mysqli_stmt_prepare($stmt, $sql)) {
     header("Location: ../index.php?error=stmt_failed");
     exit();
    }
 
    mysqli_stmt_bind_param($stmt, "ss", $username, $email);
    mysqli_stmt_execute($stmt);
 
    $resultData = mysqli_stmt_get_result($stmt);
 
    if ($row = mysqli_fetch_assoc($resultData)) {
        return $row;
    }else{
        $result = false;
        return $result;
    }
    mysqli_stmt_close($stmt);
 }

 function loginUser($conn, $username, $pwd){
  
    $accountExists = accountExists($conn, $username, $username);
    
    if ($accountExists === false) {
        header("Location: ../index.php?login_error=wrong_username");
        exit();
    }else
    
    $pwdHashed = $accountExists["passwordCode"];
    $checkPwd = password_verify($pwd, $pwdHashed);
    
    if ($checkPwd === false) {
        header("Location: ../index.php?login_error=wrong_password");
        exit();
    }elseif ($checkPwd === true) {
        session_start();
        $_SESSION["username"] = $accountExists["username"];
        header("Location: ../dashboard.php?auth=success");
        exit();
    }
}

// Reserve Seat
function createReservation($conn, $classType, $scheduleCode, $schedule, $trainDetails, $firstName, $lastName){
    $uniqueKey=strtoupper(substr(sha1(microtime()), rand(0, 3), 3));  
    $uniqueKey  = implode("-", str_split($uniqueKey, 3)); 
    $seatNumber=("TMS-$uniqueKey");

    $sql = "INSERT INTO reservation (seatNumber, classType, scheduleCode, schedule, trainDetails, firstName, lastName) VALUES (?, ?, ?, ?, ?, ?, ?);";
        $stmt = mysqli_stmt_init($conn);
    
        if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("Location: ../schedule.php?error=stmt_failed");
        exit();
        }

        mysqli_stmt_bind_param($stmt, "sssssss", $seatNumber, $classType, $scheduleCode, $schedule, $trainDetails, $firstName, $lastName);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
        header("Location: ../receipt.php?seatNum=$seatNumber");
        exit();
}