<?php
    require_once 'includes/db.inc.php';
    session_start();
    if (isset($_GET["seatNum"])) {
        $seatNumber=$_GET["seatNum"];
    }
    $result = $conn->query("SELECT * FROM reservation WHERE seatNumber= '$seatNumber'") or die($conn->error);
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
                    <strong>Generated Ticket</strong>
                    <button style='float: right' class="btn btn-success mb-1 p-2 mr-5" onclick="printReceipt()">
                        <svg style="fill: white; width: 20px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                            <path d="M128 0C92.7 0 64 28.7 64 64v96h64V64H354.7L384 93.3V160h64V93.3c0-17-6.7-33.3-18.7-45.3L400 18.7C388 6.7 371.7 0 354.7 0H128zM384 352v32 64H128V384 368 352H384zm64 32h32c17.7 0 32-14.3 32-32V256c0-35.3-28.7-64-64-64H64c-35.3 0-64 28.7-64 64v96c0 17.7 14.3 32 32 32H64v64c0 35.3 28.7 64 64 64H384c35.3 0 64-28.7 64-64V384zm-16-88c-13.3 0-24-10.7-24-24s10.7-24 24-24s24 10.7 24 24s-10.7 24-24 24z"/>
                        </svg>
                        <strong>Print</strong>
                    </button>
                </p>
            </div>
            
            <div class="card-body shadow m-2 p-0 receipt_watermark" id='receipt'>
                <div class="card-header" style='background: white;'>
                   
                        <div class="row">
                            <div class="col-md-1 mr-0" style="margin-left: auto;">
                                <img src="assets\Images\logo.png" height="100" alt="">
                            </div>
                            <div class="col-md-7 pt-4 mt-1 ml-0" style=" margin-right: auto">
                                <h2><strong>TRAIN MANAGEMENT SYSTEM</strong></h2>
                                <p style="text-align: center; margin-left: -30%">Reservation Ticket</p>
                            </div>
                        </div>
                </div>

                <div class="container pt-5 pl-4 pr-4 ">
                    <?php
                        while($data = $result->fetch_assoc()){
                            echo"
                                <div class='row'>
                                    <div class='col-md-5'>
                                        <p>
                                            <strong>Schedule Code:</strong>
                                            <p style='width: 75%; border-bottom: solid 1px black;  margin-top: -40px; margin-left: 27%;'>
                                                {$data['scheduleCode']}
                                            </p>
                                        </p>
                                    </div>
                                    <div class='col-md-5'>
                                        <p>
                                            <strong>Train:</strong>
                                            <p style='width: 100%; border-bottom: solid 1px black;  margin-top: -40px; margin-left: 10%;'>
                                                {$data['trainDetails']}
                                            </p>
                                        </p>
                                    </div>
                                </div>

                                <div class='row'>
                                    <div class='col-md-4'>
                                        <p>
                                            <strong>Schedule:</strong>
                                            <p style='width: 75%; border-bottom: solid 1px black;  margin-top: -40px; margin-left: 27%;'>
                                                {$data['schedule']}
                                            </p>
                                        </p>
                                    </div>
                                    <div class='col-md-3'>
                                        <p>
                                            <strong>Seat #:</strong>
                                            <p style='width: 80%; border-bottom: solid 1px black;  margin-top: -40px; margin-left: 23%;'>
                                                {$data['seatNumber']}
                                            </p>
                                        </p>
                                    </div>
                                    <div class='col-md-3'>
                                        <p>
                                            <strong>Cost:</strong>
                                            <p style='width: 100%; border-bottom: solid 1px black;  margin-top: -40px; margin-left: 20%;'>
                                                {$data['classType']}
                                            </p>
                                        </p>
                                    </div>
                                </div>

                                <div class='row'>
                                    <div class='col-md'>
                                        <p>
                                            <strong>Schedule Code:</strong>
                                            <p style='width: 75%; border-bottom: solid 1px black;  margin-top: -40px; margin-left: 11%;'>
                                                {$data['firstName']} {$data['lastName']}
                                            </p>
                                        </p>
                                    </div>
                                </div>
                            ";
                        }
                    ?>
                    
                </div>

                <hr class='mt-4 mb-4' style='border-top: 2px dashed black;'>
               
            </div>
         
        </div>
   </div>
       
</section>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    
    <script>
        function printReceipt() {
            var printDetails = document.getElementById("receipt").innerHTML;
            var a = window.open('', '', 'height=500, width=500');
            a.document.write('<html>');
            a.document.write(printDetails);
            a.document.write('</body></html>');
            a.document.close();
            a.print();
        }
    </script>
</body>
</html>