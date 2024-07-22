<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
include("../connection.php");

if(isset($_POST['login'])){
    $email = $_POST['email'];
    $password = $_POST['password'];
    
    if($email == null || $password == null) {
        echo "<h3 class='text-center'>Please Enter Password And Username</h3>";
    } else {
        $query = "SELECT * FROM user WHERE email='$email'";
        $result = mysqli_query($connection, $query);
        
        if(mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_array($result);
            $id = $row['id'];
            $uname = $row['name'];
            $dbemail = $row['email'];
            $dbpassword = $row['password'];  // This should be the hashed password

            // Verify the password
            if(password_verify($password, $dbpassword)){
                $_SESSION["id"] = $id;
                $_SESSION["email"] = $email;
                $_SESSION["name"] = $uname;
                $_SESSION["rank"] = "user";
                echo "
                    <script>
                        window.location.href = 'reservation.php';
                    </script>
                ";
            } else {
                echo "
                <script>
                    window.alert('Invalid Email and Password!');
                    window.history.back();
                </script>
                ";
            }
        } else {
            echo "
            <script>
                window.alert('No account found with that email!');
                window.history.back();
            </script>
            ";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signin Page</title>
    <link rel="shortcut icon" href="images/main-logo-transparent-orange-circle.png" sizes="30x30 32x32" type="image/x-icon" />
    <link rel="stylesheet" href="../css/header-footer.css">
    <link rel="stylesheet" href="../css/landing-page/welcome-page.css">
    <link rel="stylesheet" href="../css//landing-page/cup-of-coffee-page.css">
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
<body>
    <?php include_once("header.php"); ?>

    <main>
        <div id="newsletter" class="reservation-page-container RPC">
            <div class="background-image-container">
                <div class="make-reservation-heading-h1 primary-font">
                    Login Page
                </div>
            </div>
        </div>

        <div class="subscribe-to-newsletter STN">
            <div class="heading-h1 primary-font">
                LOGIN
            </div>

            <form action="signin.php" method="POST">
                <input type="text" placeholder="Email address" name="email" required><br>
                <input type="password" placeholder="Password" name="password" required>
                <div class="input-button">
                    <input type="submit" value="Login" name="login">
                </div>
                <div class="heading-h1 primary-font">
                    <a href="forgotpassword.php">FORGOT PASSWORD?</a>
                </div>
            </form>
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