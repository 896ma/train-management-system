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
function createAdmin($conn, $username, $email, $pwd){
    $sql = "INSERT INTO admin_details (username, email, passwordCode) VALUES (?, ?, ?);";
    $stmt = mysqli_stmt_init($conn);
 
    if (!mysqli_stmt_prepare($stmt, $sql)) {
     header("Location: ../index.php?error=stmt_failed");
     exit();
    }

    $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);
 
    mysqli_stmt_bind_param($stmt, "sss", $username, $email, $hashedPwd);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    $last_id = $conn->insert_id;
    header("Location: ../admin_list.php?auth=success");
    exit();
 }

// check if account exists
function accountExists($conn, $username, $email){
    $sql = "SELECT * FROM admin_details WHERE username = ? OR email = ?;";
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

 function loginAdmin($conn, $username, $pwd){
  
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

// Train
// train exists
function trainExists($conn, $trainCode){
    $sql = "SELECT * FROM trains WHERE trainCode = ?;";
    $stmt = mysqli_stmt_init($conn);
 
    if (!mysqli_stmt_prepare($stmt, $sql)) {
     header("Location: ../trainlist.php?error=stmt_failed");
     exit();
    }
 
    mysqli_stmt_bind_param($stmt, "s", $trainCode);
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

//  create train
function createTrain($conn, $trainName, $firstClassSeat, $secondClassSeat, $creationDate, $trainCode){
    $trainExists = trainExists($conn, $trainCode);
    
        $sql = "INSERT INTO trains (trainName, firstClass, secondClass, creationDate, trainCode) VALUES (?, ?, ?, ?, ?);";
        $stmt = mysqli_stmt_init($conn);
    
        if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("Location: ../trainlist.php?error=stmt_failed");
        exit();
        }

        mysqli_stmt_bind_param($stmt, "sssss", $trainName, $firstClassSeat, $secondClassSeat, $creationDate, $trainCode);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
        header("Location: ../trainlist.php?message=upload_success");
        exit();
    
    
}

// Update Train
function updateTrain($conn, $trainId, $trainCode, $trainName, $firstClassSeat, $secondClassSeat){
    $query = "UPDATE trains SET trainCode='$trainCode', trainName='$trainName', firstClass='$firstClassSeat', secondClass='$secondClassSeat' WHERE id='$trainId'";
    $query_run = mysqli_query($conn, $query);

    if ($query_run) {
        header("Location: ../trainlist.php?message=update_success");
        exit();
    }else {
        header("Location: ../trainlist.php?message=update_failed");
        exit();
    }
}

// Update Schedule
function updateSchedule($conn, $id, $scheduleTime, $trainDetails, $from, $to, $firstClass, $economy){
    $query = "UPDATE schedule SET scheduleTime='$scheduleTime', trainDetails='$trainDetails', routefrom='$from', routeto='$to', firstClass='$firstClass', economy='$economy' WHERE id='$id'";
    $query_run = mysqli_query($conn, $query);

    if ($query_run) {
        header("Location: ../schedule_list.php?message=update_success");
        exit();
    }else {
        header("Location: ../schedule_list.php?message=update_failed");
        exit();
    }
}

// Update Admin
function updateAdmin($conn, $adminId, $username, $email, $password, $passwordCode){
    $hashedPwd = password_hash($passwordCode, PASSWORD_DEFAULT);
    $query = "UPDATE admin_details SET username='$username', email='$email', passwordCode='$hashedPwd' WHERE id='$adminId'";
    $query_run = mysqli_query($conn, $query);

    if ($query_run) {
        header("Location: ../admin_list.php?message=update_success");
        exit();
    }else {
        header("Location: ../admin_list.php?message=update_failed");
        exit();
    }
}

// Schedule
function createSchedule($conn, $scheduleTime, $trainDetails, $routefrom, $routeto, $firstClass, $economy){
    $sql = "INSERT INTO schedule (scheduleTime, routefrom, routeto, trainDetails, firstClass, economy) VALUES (?, ?, ?, ?, ?, ?);";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
    header("Location: ../schedule_list.php?error=stmt_failed");
    exit();
    }

    mysqli_stmt_bind_param($stmt, "ssssss", $scheduleTime, $routefrom, $routeto, $trainDetails, $firstClass, $economy);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("Location: ../schedule_list.php?message=upload_success");
    exit();
}

// remove reservations

function removeReservation($conn, $id){
    $query = "DELETE FROM reservation WHERE id='$id'";
    $query_run = mysqli_query($conn, $query);

    if ($query_run) {
        header("Location: ../reservations.php?message=delete_success");
        exit();
    }else {
        header("Location: ../reservations.php?message=delete_failed");
        exit();
    }
}

// Remove Train
function removeTrain($conn, $id){
    $query = "DELETE FROM trains WHERE id='$id'";
    $query_run = mysqli_query($conn, $query);

    if ($query_run) {
        header("Location: ../trainlist.php?message=delete_success");
        exit();
    }else {
        header("Location: ../trainlist.php?message=delete_failed");
        exit();
    }
}

// Remove Schedule
function removeSchedule($conn, $id){
    $query = "DELETE FROM schedule WHERE id='$id'";
    $query_run = mysqli_query($conn, $query);

    if ($query_run) {
        header("Location: ../schedule_list.php?message=delete_success");
        exit();
    }else {
        header("Location: ../schedule_list.php?message=delete_failed");
        exit();
    }
}

// Remove Admin
function removeAdmin($conn, $id){
    $query = "DELETE FROM admin_details WHERE id='$id'";
    $query_run = mysqli_query($conn, $query);

    if ($query_run) {
        header("Location: ../admin_list.php?message=delete_success");
        exit();
    }else {
        header("Location: ../admin_list.php?message=delete_failed");
        exit();
    }
}

// Remove User
function removeUser($conn, $id){
    $query = "DELETE FROM user_details WHERE id='$id'";
    $query_run = mysqli_query($conn, $query);

    if ($query_run) {
        header("Location: ../users_list.php?message=delete_success");
        exit();
    }else {
        header("Location: ../users_list.php?message=delete_failed");
        exit();
    }
}