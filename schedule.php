<?php
    require_once 'includes/db.inc.php';
    session_start();
    $result = $conn->query("SELECT * FROM schedule") or die($conn->error);
    if(isset($_SESSION["username"])){        
    }else{
        header("Location: index.php");
        exit();
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>

    
    <link rel="apple-touch-icon" sizes="180x180" href="assets\Images\favicon\apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="assets\Images\favicon\favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="assets\Images\favicon\favicon-16x16.png">
    <link rel="manifest" href="assets\Images\favicon\site.webmanifest">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="assets\css\nav.css">
    <link rel="stylesheet" href="assets\css\home.css">
</head>
<body>
<nav class="navbar " style='position: fixed; background: #0c0d1c !important;'>
  <div class="container">

    <div class="navbar-header">
      <button class="navbar-toggler" data-toggle="open-navbar1">
        <span></span>
        <span></span>
        <span></span>
      </button>
      <a href="#">
        <img src="assets\Images\logo.png" height="80" alt="">
      </a>
    </div>

    <div class="navbar-menu" id="open-navbar1">
      <ul class="navbar-nav ">
        <li class="active">
            <a class='text-white' href="/TrainManagementSystem/">Home</a>
        </li>
        <li>
            <a class='text-white' href="schedule.php">schedules</a>
        </li>
        <li>
            <a data-toggle="modal" data-target="#logoutModal" class="nav-link text-white" style="cursor: pointer">
                <svg style="fill: white; width: 20px; margin-top: -5px;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                    <path d="M160 96c17.7 0 32-14.3 32-32s-14.3-32-32-32H96C43 32 0 75 0 128V384c0 53 43 96 96 96h64c17.7 0 32-14.3 32-32s-14.3-32-32-32H96c-17.7 0-32-14.3-32-32l0-256c0-17.7 14.3-32 32-32h64zM504.5 273.4c4.8-4.5 7.5-10.8 7.5-17.4s-2.7-12.9-7.5-17.4l-144-136c-7-6.6-17.2-8.4-26-4.6s-14.5 12.5-14.5 22v72H192c-17.7 0-32 14.3-32 32l0 64c0 17.7 14.3 32 32 32H320v72c0 9.6 5.7 18.2 14.5 22s19 2 26-4.6l144-136z"/>
                </svg>
                Sign out
            </a>
        </li>
      </ul>
    </div>
  </div>
</nav>

<!-- Logout -->
<div class="modal fade"  id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="logoutModalTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="logoutModalTitle" style="color:black">
          Logout
        </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true" style="color:black">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Are you sure you want to logout?
      </div>
      <div class="modal-footer">
        <a href="includes\logout.inc.php" class="btn btn-success">Proceed</a>
      </div>
    </div>
  </div>
</div>
<!-- Logout -->

<section class="container-fluid bg-light schedule">
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
   <div class="container" style="margin-top: 20px">
        <div class="card mt-2 ml-2 mr-2">
            <div class="card-header p-0" style='background: white;'>
                <div class="bg-primary p-1"></div>
                <p class='m-2 pt-4 pb-4 pl-2 shadow' style="border-left: solid 5px #0275d8">
                    <strong>Schedule</strong>
                </p>
            </div>
            <div class="card-body pt-0 pb-0">
            <div class="table-responsive py-5">
                    <table class="table table-bordered table-hover" style='cursor: pointer'>
                        <thead class="bg-primary text-white">
                            <tr>
                                <th scope='col'>#</th>
                                <th scope='col'>Schedule</th>
                                <th scope='col'>Route</th>
                                <th scope='col'>Train</th>
                                <th scope='col'>Slot</th>
                                <th scope='col'>Action</th>
                            </tr>
                        </thead>
                        <?php
                        while($data = $result->fetch_assoc()){
                            if ($data==null) {
                                # code...
                            }else {
                            echo"
                                <tbody>
                                    <tr>
                                        <th scope='row'>{$data['id']}</th>
                                        <th>{$data['scheduleTime']}</th>
                                        <th>
                                            <span class='text-muted'>From:</span> {$data['routefrom']}
                                            <hr class='p-0 m-0'>
                                            <span class='text-muted'>To:</span> {$data['routeto']}
                                        </th>
                                        <th>{$data['trainDetails']}</th>
                                        <th>
                                            <span class='text-muted'>First Class:</span> {$data['firstClass']}
                                            <hr class='p-0 m-0'>
                                            <span class='text-muted'>Economy:</span> {$data['economy']}
                                        </th>
                                        <th>
                                            <a href='book.php?schedule_code={$data['id']}' class='btn btn-primary'>
                                                Book
                                            <a/>
                                        </th>
                                    </tr>
                                </tbody>
                            ";
                        }
                        }
                        ?>
                        
                    </table>
                    
                </div>
            </div>
        </div>
   </div>
       
</section>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>
</html>