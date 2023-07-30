<?php
    require_once 'includes/db.inc.php';
    session_start();
    $result = $conn->query("SELECT * FROM admin_details LIMIT 1,5") or die($conn->error);
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
    <title>List of Admins</title>

    <link rel="apple-touch-icon" sizes="180x180" href="assets/Images/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="assets/Images/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="assets/Images/favicon/favicon-16x16.png">
    <link rel="manifest" href="assets/Images/favicon/site.webmanifest">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    
    <link rel="stylesheet" href="assets/css/dash.css">
    <link rel="stylesheet" href="assets/css/main.css">
</head>
<body>
    
    <!-- Side Bar -->
        <nav>
            <a href="#0" class="js-menu-open menu-open">
                <svg style="fill: white; width: 20px; margin-left: 10px; margin-top: 15px;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                    <path d="M0 96C0 78.3 14.3 64 32 64H416c17.7 0 32 14.3 32 32s-14.3 32-32 32H32C14.3 128 0 113.7 0 96zM0 256c0-17.7 14.3-32 32-32H416c17.7 0 32 14.3 32 32s-14.3 32-32 32H32c-17.7 0-32-14.3-32-32zM448 416c0 17.7-14.3 32-32 32H32c-17.7 0-32-14.3-32-32s14.3-32 32-32H416c17.7 0 32 14.3 32 32z"/>
                </svg>
            </a>
            <li class="nav-link" style="margin-left: 90%">
                <a  data-toggle="modal" data-target="#logoutModal" class="nav-link text-white m-0 p-0" style="cursor: pointer">
                    <svg style="fill: white; width: 20px; margin-top: -5px;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                        <path d="M160 96c17.7 0 32-14.3 32-32s-14.3-32-32-32H96C43 32 0 75 0 128V384c0 53 43 96 96 96h64c17.7 0 32-14.3 32-32s-14.3-32-32-32H96c-17.7 0-32-14.3-32-32l0-256c0-17.7 14.3-32 32-32h64zM504.5 273.4c4.8-4.5 7.5-10.8 7.5-17.4s-2.7-12.9-7.5-17.4l-144-136c-7-6.6-17.2-8.4-26-4.6s-14.5 12.5-14.5 22v72H192c-17.7 0-32 14.3-32 32l0 64c0 17.7 14.3 32 32 32H320v72c0 9.6 5.7 18.2 14.5 22s19 2 26-4.6l144-136z"/>
                    </svg>
                    Logout
                </a>
            </li>
        </nav>

          <!-- admin list -->
          <div class="card mt-2 ml-2 mr-2">
            <div class="card-header p-0" style='background: white;'>
                <div class="bg-primary p-1"></div>
                <p class='mt-2 pl-2'>
                    <svg style="fill: black; height: 20px; margin-left: 10px; margin-top: -3px;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 128 512">
                        <path d="M64 360c30.9 0 56 25.1 56 56s-25.1 56-56 56s-56-25.1-56-56s25.1-56 56-56zm0-160c30.9 0 56 25.1 56 56s-25.1 56-56 56s-56-25.1-56-56s25.1-56 56-56zM120 96c0 30.9-25.1 56-56 56S8 126.9 8 96S33.1 40 64 40s56 25.1 56 56z"/>
                    </svg>
                    List of Admins
                </p>
            </div>
            <div class="card-body pt-0 pb-0">
                <a href='createadmin.php' class='btn btn-info mt-1' style='position: absolute; margin-left: 90%;' href="">
                    <strong>Create</strong>
                </a>
                <div class="table-responsive py-5">
                    <table class="table table-bordered table-hover" style='cursor: pointer'>
                        <thead class="bg-primary text-white">
                            <tr>
                                <th scope='col'>#</th>
                                <th scope='col'>Username</th>
                                <th scope='col'>Email</th>
                                <th scope='col'>
                                    <svg style="fill: white; width: 20px; margin-top: -5px;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512">
                                        <path d="M38.8 5.1C28.4-3.1 13.3-1.2 5.1 9.2S-1.2 34.7 9.2 42.9l592 464c10.4 8.2 25.5 6.3 33.7-4.1s6.3-25.5-4.1-33.7L525.6 386.7c39.6-40.6 66.4-86.1 79.9-118.4c3.3-7.9 3.3-16.7 0-24.6c-14.9-35.7-46.2-87.7-93-131.1C465.5 68.8 400.8 32 320 32c-68.2 0-125 26.3-169.3 60.8L38.8 5.1zM223.1 149.5C248.6 126.2 282.7 112 320 112c79.5 0 144 64.5 144 144c0 24.9-6.3 48.3-17.4 68.7L408 294.5c5.2-11.8 8-24.8 8-38.5c0-53-43-96-96-96c-2.8 0-5.6 .1-8.4 .4c5.3 9.3 8.4 20.1 8.4 31.6c0 10.2-2.4 19.8-6.6 28.3l-90.3-70.8zm223.1 298L373 389.9c-16.4 6.5-34.3 10.1-53 10.1c-79.5 0-144-64.5-144-144c0-6.9 .5-13.6 1.4-20.2L83.1 161.5C60.3 191.2 44 220.8 34.5 243.7c-3.3 7.9-3.3 16.7 0 24.6c14.9 35.7 46.2 87.7 93 131.1C174.5 443.2 239.2 480 320 480c47.8 0 89.9-12.9 126.2-32.5z"/>
                                    </svg>
                                    Password (Hashed)
                                </th>
                                <th scope='col'>Actions</th>
                            </tr>
                        </thead>
                        <?php
                        while($data = $result->fetch_assoc()){
                            echo"
                                <tbody>
                                    <tr>
                                        <th scope='row'>{$data['id']}</th>
                                        <th>{$data['username']}</th>
                                        <th>{$data['email']}</th>
                                        <th>{$data['passwordCode']}</th>
                                        <th>
                                            <div class='row'>
                                                <div class='col-md ml-3'>
                                                    <a type='submit' name='submit' data-toggle='modal' data-target='#updateAdminModal{$data['id']}'>
                                                        <svg style='fill: gray; width: 15px' xmlns='http://www.w3.org/2000/svg' viewBox='0 0 512 512'>
                                                            <path d='M471.6 21.7c-21.9-21.9-57.3-21.9-79.2 0L362.3 51.7l97.9 97.9 30.1-30.1c21.9-21.9 21.9-57.3 0-79.2L471.6 21.7zm-299.2 220c-6.1 6.1-10.8 13.6-13.5 21.9l-29.6 88.8c-2.9 8.6-.6 18.1 5.8 24.6s15.9 8.7 24.6 5.8l88.8-29.6c8.2-2.8 15.7-7.4 21.9-13.5L437.7 172.3 339.7 74.3 172.4 241.7zM96 64C43 64 0 107 0 160V416c0 53 43 96 96 96H352c53 0 96-43 96-96V320c0-17.7-14.3-32-32-32s-32 14.3-32 32v96c0 17.7-14.3 32-32 32H96c-17.7 0-32-14.3-32-32V160c0-17.7 14.3-32 32-32h96c17.7 0 32-14.3 32-32s-14.3-32-32-32H96z'/>
                                                        </svg>
                                                    <a/>
                                                </div>
                                                <div class='col-md'>
                                                    <a type='submit' name='submit' data-toggle='modal' data-target='#deleteAdminModal{$data['id']}''>
                                                        <svg style='fill: red; width: 15px' xmlns='http://www.w3.org/2000/svg' viewBox='0 0 448 512'>
                                                            <path d='M135.2 17.7L128 32H32C14.3 32 0 46.3 0 64S14.3 96 32 96H416c17.7 0 32-14.3 32-32s-14.3-32-32-32H320l-7.2-14.3C307.4 6.8 296.3 0 284.2 0H163.8c-12.1 0-23.2 6.8-28.6 17.7zM416 128H32L53.2 467c1.6 25.3 22.6 45 47.9 45H346.9c25.3 0 46.3-19.7 47.9-45L416 128z'/>
                                                        </svg>
                                                    <a/>
                                                </div>
                                            </div>
                                        </th>
                                    </tr>
                                </tbody>
                            ";

                            echo"<div class='modal fade' id='updateAdminModal{$data['id']}' tabindex='-1' role='dialog' aria-labelledby='updateAdminModalTitle' aria-hidden='true'>
                                    <div class='modal-dialog' role='document'>
                                        <div class='modal-content'>
                                            <div class='modal-header'>
                                                <h5 class='modal-title' id='updateAdminModalTitle' style='color:black'>
                                                    Update {$data['username']}
                                                </h5>
                                                <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                                                <span aria-hidden='true' style='color:black'>&times;</span>
                                                </button>
                                            </div>
                                            <div class='modal-body'>
                                                <form action='includes/update_admin.inc.php' method='POST'>
                                                    <input type='hidden' name='adminId' value='{$data['id']}' required>
                                                    <input type='text' name='username' value='{$data['username']}' required>
                                                    <input type='text' name='email' value='{$data['email']}' required>
                                                    <input type='hidden' name='password' value='{$data['passwordCode']}' min='0' required>
                                                    <input type='password' name='passwordCode' placeholder='Update Password' min='0' required>
                                                    <div class='modal-footer mt-4'>
                                                        <button type='submit' name='update' class='btn btn-success'>Update</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            ";

                            echo"<div class='modal fade' id='deleteAdminModal{$data['id']}' tabindex='-1' role='dialog' aria-labelledby='deleteAdminModalTitle' aria-hidden='true'>
                                    <div class='modal-dialog' role='document'>
                                        <div class='modal-content'>
                                            <div class='modal-header'>
                                                <h5 class='modal-title' id='deleteAdminModalTitle' style='color:black'>
                                                    Delete {$data['username']}
                                                </h5>
                                                <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                                                <span aria-hidden='true' style='color:black'>&times;</span>
                                                </button>
                                            </div>
                                            <div class='modal-body'>
                                                Are you sure you want to remove <strong>{$data['username']}</strong>?
                                            </div>
                                            <div class='modal-footer'>
                                                <a href='includes/delete_admin.inc.php?id={$data['id']}' class='btn btn-danger'>Delete</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            ";
                        }
                        ?>
                        
                    </table>
                    
                </div>
            </div>
        </div>

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

        <div class="js-side-nav-container side-nav-container">
            <div class="js-side-nav side-nav">
                <a href="#0" class="js-menu-close menu-close">
                    <svg style="fill: white; width: 20px; margin-left: 10px; margin-top: 10px;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512">
                        <path d="M310.6 150.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L160 210.7 54.6 105.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L114.7 256 9.4 361.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L160 301.3 265.4 406.6c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L205.3 256 310.6 150.6z"/>
                    </svg>
                </a>
                
                <br>

                <div class="side-navbar active-nav d-flex justify-content-between flex-wrap flex-column" id="sidebar">
                    <ul class="nav flex-column  w-100 text-white">
                        <a href="#" class="nav-link h3 my-2">
                            <center>
                                <img src="assets/Images/logo.png" height="100" style="position: fixed; margin-left: -50px; margin-top: -20px" alt=""> 
                            <br>
                            <span style="font-size: .9rem;">Train Management System</span>
                            </center>
                            
                            
                        </a>
                        <li class="nav-link">
                            <a href="dashboard.php" class="nav-link text-white m-0 p-0">
                                <svg style="fill: white; width: 20px; margin-top: -5px;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                    <path d="M512 256c0 141.4-114.6 256-256 256S0 397.4 0 256S114.6 0 256 0S512 114.6 512 256zM320 352c0-26.9-16.5-49.9-40-59.3V88c0-13.3-10.7-24-24-24s-24 10.7-24 24V292.7c-23.5 9.5-40 32.5-40 59.3c0 35.3 28.7 64 64 64s64-28.7 64-64zM144 176c17.7 0 32-14.3 32-32s-14.3-32-32-32s-32 14.3-32 32s14.3 32 32 32zm-16 80c0-17.7-14.3-32-32-32s-32 14.3-32 32s14.3 32 32 32s32-14.3 32-32zm288 32c17.7 0 32-14.3 32-32s-14.3-32-32-32s-32 14.3-32 32s14.3 32 32 32zM400 144c0-17.7-14.3-32-32-32s-32 14.3-32 32s14.3 32 32 32s32-14.3 32-32z"/>
                                </svg>
                                Dashboard
                            </a>
                        </li>
                        <li class="nav-link">
                            <a href="reservations.php" class="nav-link text-white m-0 p-0">
                                <svg style="fill: white; width: 20px; margin-top: -5px;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512">
                                    <path d="M192 0c-41.8 0-77.4 26.7-90.5 64H64C28.7 64 0 92.7 0 128V448c0 35.3 28.7 64 64 64H320c35.3 0 64-28.7 64-64V128c0-35.3-28.7-64-64-64H282.5C269.4 26.7 233.8 0 192 0zm0 64a32 32 0 1 1 0 64 32 32 0 1 1 0-64zM112 192H272c8.8 0 16 7.2 16 16s-7.2 16-16 16H112c-8.8 0-16-7.2-16-16s7.2-16 16-16z"/>
                                </svg>
                                Reservations
                            </a>
                        </li>
                        <!-- <li class="nav-link">
                            <a href="inquiries.php" class="nav-link text-white m-0 p-0">
                                <svg style="fill: white; width: 20px; margin-top: -5px;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                    <path d="M256 512c141.4 0 256-114.6 256-256S397.4 0 256 0S0 114.6 0 256S114.6 512 256 512zM169.8 165.3c7.9-22.3 29.1-37.3 52.8-37.3h58.3c34.9 0 63.1 28.3 63.1 63.1c0 22.6-12.1 43.5-31.7 54.8L280 264.4c-.2 13-10.9 23.6-24 23.6c-13.3 0-24-10.7-24-24V250.5c0-8.6 4.6-16.5 12.1-20.8l44.3-25.4c4.7-2.7 7.6-7.7 7.6-13.1c0-8.4-6.8-15.1-15.1-15.1H222.6c-3.4 0-6.4 2.1-7.5 5.3l-.4 1.2c-4.4 12.5-18.2 19-30.6 14.6s-19-18.2-14.6-30.6l.4-1.2zM288 352c0 17.7-14.3 32-32 32s-32-14.3-32-32s14.3-32 32-32s32 14.3 32 32z"/>
                                </svg>
                                Inquiries
                            </a>
                        </li> -->
                        <br>
                        <span style="margin-left: 35px;">Maintenance</span>
                        <hr style="border: solid 1px white; margin-top: 1px; margin-bottom: 2px; width: 90%; margin-left: 16px;">
                        <li class="nav-link">
                            <a href="trainlist.php" class="nav-link text-white m-0 p-0">
                                <svg style="fill: white; width: 20px; margin-top: -5px;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                    <path d="M256 512c141.4 0 256-114.6 256-256S397.4 0 256 0S0 114.6 0 256S114.6 512 256 512zM169.8 165.3c7.9-22.3 29.1-37.3 52.8-37.3h58.3c34.9 0 63.1 28.3 63.1 63.1c0 22.6-12.1 43.5-31.7 54.8L280 264.4c-.2 13-10.9 23.6-24 23.6c-13.3 0-24-10.7-24-24V250.5c0-8.6 4.6-16.5 12.1-20.8l44.3-25.4c4.7-2.7 7.6-7.7 7.6-13.1c0-8.4-6.8-15.1-15.1-15.1H222.6c-3.4 0-6.4 2.1-7.5 5.3l-.4 1.2c-4.4 12.5-18.2 19-30.6 14.6s-19-18.2-14.6-30.6l.4-1.2zM288 352c0 17.7-14.3 32-32 32s-32-14.3-32-32s14.3-32 32-32s32 14.3 32 32z"/>
                                </svg>
                                Train List
                            </a>
                        </li>
                        <li class="nav-link">
                            <a href="schedule_list.php" class="nav-link text-white m-0 p-0">
                                <svg style="fill: white; width: 20px; margin-top: -5px;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                                    <path d="M96 32V64H48C21.5 64 0 85.5 0 112v48H448V112c0-26.5-21.5-48-48-48H352V32c0-17.7-14.3-32-32-32s-32 14.3-32 32V64H160V32c0-17.7-14.3-32-32-32S96 14.3 96 32zM448 192H0V464c0 26.5 21.5 48 48 48H400c26.5 0 48-21.5 48-48V192z"/>
                                </svg>
                                Schedule List
                            </a>
                        </li>
                        <li class="nav-link">
                            <a href="admin_list.php" class="nav-link text-white m-0 p-0">
                                    <svg style="fill: white; width: 20px; margin-top: -5px;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512">
                                        <path d="M144 160c44.2 0 80-35.8 80-80s-35.8-80-80-80S64 35.8 64 80s35.8 80 80 80zm368 0c44.2 0 80-35.8 80-80s-35.8-80-80-80s-80 35.8-80 80s35.8 80 80 80zM0 298.7C0 310.4 9.6 320 21.3 320H234.7c.2 0 .4 0 .7 0c-26.6-23.5-43.3-57.8-43.3-96c0-7.6 .7-15 1.9-22.3c-13.6-6.3-28.7-9.7-44.6-9.7H106.7C47.8 192 0 239.8 0 298.7zM320 320c24 0 45.9-8.8 62.7-23.3c2.5-3.7 5.2-7.3 8-10.7c2.7-3.3 5.7-6.1 9-8.3C410 262.3 416 243.9 416 224c0-53-43-96-96-96s-96 43-96 96s43 96 96 96zm65.4 60.2c-10.3-5.9-18.1-16.2-20.8-28.2H261.3C187.7 352 128 411.7 128 485.3c0 14.7 11.9 26.7 26.7 26.7H455.2c-2.1-5.2-3.2-10.9-3.2-16.4v-3c-1.3-.7-2.7-1.5-4-2.3l-2.6 1.5c-16.8 9.7-40.5 8-54.7-9.7c-4.5-5.6-8.6-11.5-12.4-17.6l-.1-.2-.1-.2-2.4-4.1-.1-.2-.1-.2c-3.4-6.2-6.4-12.6-9-19.3c-8.2-21.2 2.2-42.6 19-52.3l2.7-1.5c0-.8 0-1.5 0-2.3s0-1.5 0-2.3l-2.7-1.5zM533.3 192H490.7c-15.9 0-31 3.5-44.6 9.7c1.3 7.2 1.9 14.7 1.9 22.3c0 17.4-3.5 33.9-9.7 49c2.5 .9 4.9 2 7.1 3.3l2.6 1.5c1.3-.8 2.6-1.6 4-2.3v-3c0-19.4 13.3-39.1 35.8-42.6c7.9-1.2 16-1.9 24.2-1.9s16.3 .6 24.2 1.9c22.5 3.5 35.8 23.2 35.8 42.6v3c1.3 .7 2.7 1.5 4 2.3l2.6-1.5c16.8-9.7 40.5-8 54.7 9.7c2.3 2.8 4.5 5.8 6.6 8.7c-2.1-57.1-49-102.7-106.6-102.7zm91.3 163.9c6.3-3.6 9.5-11.1 6.8-18c-2.1-5.5-4.6-10.8-7.4-15.9l-2.3-4c-3.1-5.1-6.5-9.9-10.2-14.5c-4.6-5.7-12.7-6.7-19-3L574.4 311c-8.9-7.6-19.1-13.6-30.4-17.6v-21c0-7.3-4.9-13.8-12.1-14.9c-6.5-1-13.1-1.5-19.9-1.5s-13.4 .5-19.9 1.5c-7.2 1.1-12.1 7.6-12.1 14.9v21c-11.2 4-21.5 10-30.4 17.6l-18.2-10.5c-6.3-3.6-14.4-2.6-19 3c-3.7 4.6-7.1 9.5-10.2 14.6l-2.3 3.9c-2.8 5.1-5.3 10.4-7.4 15.9c-2.6 6.8 .5 14.3 6.8 17.9l18.2 10.5c-1 5.7-1.6 11.6-1.6 17.6s.6 11.9 1.6 17.5l-18.2 10.5c-6.3 3.6-9.5 11.1-6.8 17.9c2.1 5.5 4.6 10.7 7.4 15.8l2.4 4.1c3 5.1 6.4 9.9 10.1 14.5c4.6 5.7 12.7 6.7 19 3L449.6 457c8.9 7.6 19.2 13.6 30.4 17.6v21c0 7.3 4.9 13.8 12.1 14.9c6.5 1 13.1 1.5 19.9 1.5s13.4-.5 19.9-1.5c7.2-1.1 12.1-7.6 12.1-14.9v-21c11.2-4 21.5-10 30.4-17.6l18.2 10.5c6.3 3.6 14.4 2.6 19-3c3.7-4.6 7.1-9.4 10.1-14.5l2.4-4.2c2.8-5.1 5.3-10.3 7.4-15.8c2.6-6.8-.5-14.3-6.8-17.9l-18.2-10.5c1-5.7 1.6-11.6 1.6-17.5s-.6-11.9-1.6-17.6l18.2-10.5zM552 384c0 22.1-17.9 40-40 40s-40-17.9-40-40s17.9-40 40-40s40 17.9 40 40z"/>
                                    </svg>
                                Admin List
                            </a>
                        </li>
                        <li class="nav-link">
                            <a href="users_list.php" class="nav-link text-white m-0 p-0">
                                    <svg style="fill: white; width: 20px; margin-top: -5px;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512">
                                        <path d="M144 160c44.2 0 80-35.8 80-80s-35.8-80-80-80S64 35.8 64 80s35.8 80 80 80zm368 0c44.2 0 80-35.8 80-80s-35.8-80-80-80s-80 35.8-80 80s35.8 80 80 80zM0 298.7C0 310.4 9.6 320 21.3 320H234.7c.2 0 .4 0 .7 0c-26.6-23.5-43.3-57.8-43.3-96c0-7.6 .7-15 1.9-22.3c-13.6-6.3-28.7-9.7-44.6-9.7H106.7C47.8 192 0 239.8 0 298.7zM320 320c24 0 45.9-8.8 62.7-23.3c2.5-3.7 5.2-7.3 8-10.7c2.7-3.3 5.7-6.1 9-8.3C410 262.3 416 243.9 416 224c0-53-43-96-96-96s-96 43-96 96s43 96 96 96zm65.4 60.2c-10.3-5.9-18.1-16.2-20.8-28.2H261.3C187.7 352 128 411.7 128 485.3c0 14.7 11.9 26.7 26.7 26.7H455.2c-2.1-5.2-3.2-10.9-3.2-16.4v-3c-1.3-.7-2.7-1.5-4-2.3l-2.6 1.5c-16.8 9.7-40.5 8-54.7-9.7c-4.5-5.6-8.6-11.5-12.4-17.6l-.1-.2-.1-.2-2.4-4.1-.1-.2-.1-.2c-3.4-6.2-6.4-12.6-9-19.3c-8.2-21.2 2.2-42.6 19-52.3l2.7-1.5c0-.8 0-1.5 0-2.3s0-1.5 0-2.3l-2.7-1.5zM533.3 192H490.7c-15.9 0-31 3.5-44.6 9.7c1.3 7.2 1.9 14.7 1.9 22.3c0 17.4-3.5 33.9-9.7 49c2.5 .9 4.9 2 7.1 3.3l2.6 1.5c1.3-.8 2.6-1.6 4-2.3v-3c0-19.4 13.3-39.1 35.8-42.6c7.9-1.2 16-1.9 24.2-1.9s16.3 .6 24.2 1.9c22.5 3.5 35.8 23.2 35.8 42.6v3c1.3 .7 2.7 1.5 4 2.3l2.6-1.5c16.8-9.7 40.5-8 54.7 9.7c2.3 2.8 4.5 5.8 6.6 8.7c-2.1-57.1-49-102.7-106.6-102.7zm91.3 163.9c6.3-3.6 9.5-11.1 6.8-18c-2.1-5.5-4.6-10.8-7.4-15.9l-2.3-4c-3.1-5.1-6.5-9.9-10.2-14.5c-4.6-5.7-12.7-6.7-19-3L574.4 311c-8.9-7.6-19.1-13.6-30.4-17.6v-21c0-7.3-4.9-13.8-12.1-14.9c-6.5-1-13.1-1.5-19.9-1.5s-13.4 .5-19.9 1.5c-7.2 1.1-12.1 7.6-12.1 14.9v21c-11.2 4-21.5 10-30.4 17.6l-18.2-10.5c-6.3-3.6-14.4-2.6-19 3c-3.7 4.6-7.1 9.5-10.2 14.6l-2.3 3.9c-2.8 5.1-5.3 10.4-7.4 15.9c-2.6 6.8 .5 14.3 6.8 17.9l18.2 10.5c-1 5.7-1.6 11.6-1.6 17.6s.6 11.9 1.6 17.5l-18.2 10.5c-6.3 3.6-9.5 11.1-6.8 17.9c2.1 5.5 4.6 10.7 7.4 15.8l2.4 4.1c3 5.1 6.4 9.9 10.1 14.5c4.6 5.7 12.7 6.7 19 3L449.6 457c8.9 7.6 19.2 13.6 30.4 17.6v21c0 7.3 4.9 13.8 12.1 14.9c6.5 1 13.1 1.5 19.9 1.5s13.4-.5 19.9-1.5c7.2-1.1 12.1-7.6 12.1-14.9v-21c11.2-4 21.5-10 30.4-17.6l18.2 10.5c6.3 3.6 14.4 2.6 19-3c3.7-4.6 7.1-9.4 10.1-14.5l2.4-4.2c2.8-5.1 5.3-10.3 7.4-15.8c2.6-6.8-.5-14.3-6.8-17.9l-18.2-10.5c1-5.7 1.6-11.6 1.6-17.5s-.6-11.9-1.6-17.6l18.2-10.5zM552 384c0 22.1-17.9 40-40 40s-40-17.9-40-40s17.9-40 40-40s40 17.9 40 40z"/>
                                    </svg>
                                Users List
                            </a>
                        </li>
                        
                        <!-- <li class="nav-link">
                            <a href="settings.php" class="nav-link text-white m-0 p-0">
                                <svg style="fill: white; width: 20px; margin-top: -5px;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                                    <path d="M96 32V64H48C21.5 64 0 85.5 0 112v48H448V112c0-26.5-21.5-48-48-48H352V32c0-17.7-14.3-32-32-32s-32 14.3-32 32V64H160V32c0-17.7-14.3-32-32-32S96 14.3 96 32zM448 192H0V464c0 26.5 21.5 48 48 48H400c26.5 0 48-21.5 48-48V192z"/>
                                </svg>
                                Settings
                            </a>
                        </li> -->
                    </ul>
                </div>
            </div>
        </div>

      


        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
        <script src="assets\js\sidenav.js"></script>
</body>
</html>