<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Account Creation</title>

    <link rel="apple-touch-icon" sizes="180x180" href="assets/Images/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="assets/Images/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="assets/Images/favicon/favicon-16x16.png">
    <link rel="manifest" href="assets/Images/favicon/site.webmanifest">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    
    <link rel="stylesheet" href="assets/css/login.css">
</head>
<body>
    <section class="login">
        <div class="login_box">
            <div class="left">
                <div class="contact">
                    <form action="includes/createuser.inc.php" method="POST">
                        <h3>CREATE ACCOUNT</h3>
                        <input type="text" name="username" placeholder="USERNAME" required>
                        <input type="email" name="email" placeholder="EMAIL" required>
                        <input type="password" name="password" placeholder="PASSWORD" required>
                        <input type="password" name="pwdConfirm" placeholder="REPEAT PASSWORD" required>
                        <button type="submit" name="submit" class="submit">CREATE</button>
                        <br>
                        <br>
                        <center>
                            Don't have account?
                            <a href="/TrainManagementSystem/">
                                Sign up
                            </a>
                        </center>
                    </form>
                </div>
            </div>
            <div class="right">
                    <img src="assets/Images/logo.png" style="position: absolute; margin-top: -150px;" width="10" alt="">
                <div class="right-text">
                    <h2>TRAIN BOOKING SYSTEM</h2>
                    <h5>A TRAIN BASED BOOKING AGENCEY</h5>
                </div>
                <div class="right-inductor">
                </div>
            </div>
        </div>
    </section>

    
    
</body>
</html>