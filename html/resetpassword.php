<?php
session_start();
include("../connection.php");

if(isset($_GET['user_id'])){
    $user_id = mysqli_real_escape_string($connection, $_GET['user_id']);
    

    $query = "SELECT * FROM user WHERE id='$user_id'";
    $result = mysqli_query($connection, $query);

    if(!$result) {
        echo "Database query failed: " . mysqli_error($connection);
        exit;
    }

    if(mysqli_num_rows($result) > 0){
        $row = mysqli_fetch_array($result);
        $email = $row['email'];

 
    } else {
        echo "
            <script>
            window.alert('Invalid user ID.')  </script>
    ";
        exit;
    }
} else {
    echo "
            <script>
            window.alert('User ID is missing.')  </script>
    ";
    exit;
}

if(isset($_POST['submit'])){
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    if($password == $confirm_password){
        // Update the password in the database
        $hashed_password = password_hash($password, PASSWORD_BCRYPT);
        $updateQuery = "UPDATE user SET password='$hashed_password' WHERE id='$user_id'";
        $updateResult = mysqli_query($connection, $updateQuery);

        if($updateResult) {
            echo "
            <script>
            window.alert('Password has been reset successfully.')  </script>
    ";
        } else {
            echo "Error updating password: " . mysqli_error($connection);
        }
    } else {
        echo "
        <script>
        window.alert('Passwords do not match.')  </script>
";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
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
                    Reset Password Page
                </div>
            </div>
            <div class="subscribe-to-newsletter STN">
                <div class="heading-h1 primary-font">
                    RESET PASSWORD
                </div>
                <form action="resetpassword.php?user_id=<?php echo $user_id; ?>" method="POST">
                    <input type="password" placeholder="Enter new password" name="password" required>
                    <br>
                    <input type="password" placeholder="Confirm new password" name="confirm_password" required>
                    <br>
                    <input type="submit" value="Reset Password" name="submit">
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