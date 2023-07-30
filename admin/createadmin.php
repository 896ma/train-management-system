<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Account Creation</title>

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
                    <form action="includes/createadmin.inc.php" method="POST">
                        <h3>CREATE ACCOUNT</h3>
                        <input type="text" name="username" placeholder="USERNAME" required>
                        <input type="email" name="email" placeholder="EMAIL" required>
                        <input type="password" name="password" placeholder="PASSWORD" required>
                        <input type="password" name="pwdConfirm" placeholder="REPEAT PASSWORD" required>
                        <button type="submit" name="submit" class="submit">CREATE</button>
                        <br>
                        <a href="admin_list.php">
                            <svg  style='fill: #17a2b8; width: 10px' xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                <path d="M512 256C512 114.6 397.4 0 256 0S0 114.6 0 256S114.6 512 256 512s256-114.6 256-256zM116.7 244.7l112-112c4.6-4.6 11.5-5.9 17.4-3.5s9.9 8.3 9.9 14.8l0 64 96 0c17.7 0 32 14.3 32 32l0 32c0 17.7-14.3 32-32 32l-96 0 0 64c0 6.5-3.9 12.3-9.9 14.8s-12.9 1.1-17.4-3.5l-112-112c-6.2-6.2-6.2-16.4 0-22.6z"/>
                            </svg>                            
                            Go Back to "List of Admins"
                        </a>
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