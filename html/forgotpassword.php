<?php
session_start();
include("../connection.php");

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader
require 'vendor/autoload.php';

if(isset($_POST['submit'])){
    $email = $_POST['email'];

    // Check if the email exists in the database
    $query = "SELECT * FROM user WHERE email='$email'";
    $result = mysqli_query($connection, $query);
    if(mysqli_num_rows($result) > 0){
        $row = mysqli_fetch_array($result);
        $user_id = $row['id'];

        // Send reset email
        $mail = new PHPMailer(true);

        try {
            //Server settings
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com'; // Your SMTP server
            $mail->SMTPAuth = true;
            $mail->Username = 'noreplyarabicacafe@gmail.com'; // SMTP username
            $mail->Password = 'luvkscpkzktwqiqo'; // SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; // Enable TLS encryption
            $mail->Port = 587; // TCP port to connect to

            // Recipients
            $mail->setFrom('noreplyarabicacafe@gmail.com', 'Arabica Cafe'); // Sender's email address and name
            $mail->addAddress($email); // Recipient's email address and name

            // Content
            $mail->isHTML(true);
            $mail->Subject = 'Password Reset Request';
            
            // Custom HTML body
            $body = '
                <!DOCTYPE html>
                <html lang="en">
                <head>
                    <meta charset="UTF-8">
                    <meta name="viewport" content="width=device-width, initial-scale=1.0">
                    <title>Password Reset Request</title>
                    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
                    <style>
                        body {
                            font-family: Arial, sans-serif;
                            background-color: #f0f0f0;
                            margin: 0;
                            padding: 0;
                        }
                        .email-body {
                            background-color: #ffffff;
                            border-radius: 8px;
                            padding: 20px;
                            margin: 20px;
                        }
                        .email-footer {
                            text-align: center;
                            color: #777777;
                            font-size: 12px;
                        }
                    </style>
                </head>
                <body>
                    <div class="container">
                        <div class="email-body">
                            <h2 class="text-center mb-4">Password Reset Request</h2>
                            <p class="text-center">Click the link below to reset your password:</p>
                            <p class="button" class="text-center"><a href="http://localhost/coffee-shop/html/resetpassword.php?user_id='.$user_id.'"  >Reset Password</a></p>
                           <p>This is a computer-generated email, please do not reply to this email.</p>
                    
                    <p>If this was not done by you, report this at support@arabicacoffee.com</p>
                    <p>Thank you,<br>Arabica Café Team</p>
                            </div>
                    </div>
                    <div class="container email-footer">
                        <p>&copy; 2024 Arabica Cafe. All rights reserved.</p>
                    </div>
                </body>
                </html>
            ';

            $mail->Body = $body;

            $mail->send();
            echo '<script>window.alert("Password reset link has been sent to your email.");</script>';
        } catch (Exception $e) {
            echo '<script>window.alert("Message could not be sent. Mailer Error: '.$mail->ErrorInfo.'");</script>';
        }
    } else {
        echo '<script>window.alert("No account found with that email.");</script>';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
    <link rel="shortcut icon" href="images/main-logo-transparent-orange-circle.png" sizes="30x30 32x32" type="image/x-icon" />
    <link rel="stylesheet" href="../css/header-footer.css">
    <link rel="stylesheet" href="../css/landing-page/welcome-page.css">
    <link rel="stylesheet" href="../css/landing-page/cup-of-coffee-page.css">
    <link rel="stylesheet" href="../css/landing-page/fresh-coffee-banner.css">
    <link rel="stylesheet" href="../css/landing-page/testimonials-banner.css">
    <link rel="stylesheet" href="../css/landing-page/food-tea-coffee-card.css">
    <link rel="stylesheet" href="../css/landing-page/menu-snippet.css">
    <link rel="stylesheet" href="../css/landing-page/read-our-latest-news.css">
    <link rel="stylesheet" href="../css/landing-page/subscibe-to-newsletter.css">
    <link rel="stylesheet" href="../css/menu.css">
    <link rel="stylesheet" href="../css/about.css">
    <link rel="stylesheet" href="../css/our-locations.css">
    <link rel="stylesheet" href="../css/newsletter.css">
    <link rel="stylesheet" href="../css/under-maintenance.css">
    <link rel="stylesheet" href="../css/reservation.css">
</head>
<header>
    <a href="../index.php">
        <img class="logo" src="../images/main-logo-transparent.png" alt="LOGO - arabica cafe">
    </a>
    
    <nav>
        <ul class="nav-links">
            <li><a href="../index.php">HOME</a></li>
            <li><a href="menu.php">MENU</a></li>
            <li><a href="our-locations.php">OUR LOCATIONS</a></li>
            <li><a href="reservation.php">RESERVATION</a></li>
            <li><a href="newsletter.php">NEWSLETTER</a></li>
            <li><a href="about.php">ABOUT US</a></li>
            <li><a href="../index.html">COFFEE</a></li>
        </ul>
    </nav>

    <?php if(isset($_SESSION["id"])){  ?>
        <div>
            <a class="button-profile" href="reservation_list.php"><button>Reservation List</button></a>
            <a class="button-profile" href="../logout.php"><button>Logout</button></a>  
        </div>
    <?php }
    else {  ?>
        <div>
            <a class="button-profile" href="signin.php"><button>Sign In</button></a>
            <a class="button-profile" href="signup.php"><button>Register</button></a>
        </div>
    <?php }  ?>
</header>
<body>
    <main>
        <div id="newsletter" class="reservation-page-container RPC">
            <div class="background-image-container">
                <div class="make-reservation-heading-h1 primary-font">
                    Forgot Password Page
                </div>
            </div>
            <div class="subscribe-to-newsletter STN">
                <div class="heading-h1 primary-font">
                    FORGOT PASSWORD
                </div>
                <form action="forgotpassword.php" method="POST">
                    <input type="email" placeholder="Enter your email" name="email" required>
                    <br>
                    <input type="submit" value="Submit" name="submit">
                </form>
            </div>
        </div>
    </main>
    <footer>

<div class="info-container">
    <div class="content-wrapper">
        <div class="heading-h1 primary-font">
            Contact
        </div>
        <div class="heading-h2">
            Phone: 931 689 0367 <br>
            Email: enquiry@arabica.com <br>
            Address: Luxembourg, LU0000304
        </div>
    </div>

    <div class="content-wrapper">
        <div class="heading-h1 primary-font">
            Locations
        </div>
        <div>
            <a href="https://maps.app.goo.gl/YjmPry3Ci5WMe6cn8" class="heading-h2">EC, Echternach <br></a>
            <a href="https://maps.app.goo.gl/hDgn2ZDGiaWDj2EB7" class="heading-h2">LU, Luxembourg <br></a>
            <a href="https://maps.app.goo.gl/sNK9T5weMm9BnxzH8" class="heading-h2">NÖ, Naturpark Öewersauer </a>
        </div>
    </div>
    <a href="index.php#welcome-page"><img class="footer-logo" src="images/main-logo-transparent-orange-circle-gray.png" alt=""></a>

    <div class="content-wrapper">
        <div class="heading-h1 primary-font">
            Information
        </div>
        <div>
        <a class="heading-h2" href="html/menu.php">Menu</a> <br>
            <a class="heading-h2" href="html/about.php">About</a> <br>
            <a class="heading-h2" href="html/reservation.php">Reservation</a> <br>
        </div>
    </div>

    <div class="content-wrapper">
        <div class="heading-h1 primary-font">
            Operating Hours
        </div>
        <div class="day-hour-outer-container">
            <div class="day-hour-inner-container">
                <div class="week-day heading-h2">Mon - Fri</div>
                <div class="icon-time-container">
                    <img src="../images/star-transparent.png" alt="">
                    <div class="heading-h2"> 09-22</div>
                </div>
            </div>
            <div class="day-hour-inner-container">
                <div class="week-day heading-h2">Saturday</div>
                <div class="icon-time-container">
                    <img src="../images/star-transparent.png" alt="">
                    <div class="heading-h2"> 09-01</div>
                </div>
            </div>
            <div class="day-hour-inner-container">
                <div class="week-day heading-h2">Sunday</div>
                <div class="icon-time-container">
                    <img src="../images/star-transparent.png" alt="">
                    <div class="heading-h2"> 09-23</div>
                </div>
            </div>

        </div>

    </div>
</div>

<div class="copyright-container">
    <div class="copyright">
        © 2022  Bìčlius  Khush. All Rights Reserved
    </div>
</div>
</footer>
    

</body>
</html>