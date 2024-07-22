<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservation List Page</title>
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
<?php

include_once("header.php");


if(isset($_GET['id'])){
    $id=$_GET['id'];
   
    $qury="delete from reservation where id='$id'";
    $reg=mysqli_query($connection, $qury);
    if($reg) 
    echo "
    <script>
        window.alert('Reservation Has Been Successfully Cancelled!');
        window.location.href = 'reservation_list.php';
    </script>
    ";

   
    }



?>

    <main>
        <div id="reservation-list" class="reservation-page-container RPC">
            <div class="background-image-container">
                <div class="make-reservation-heading-h1 primary-font">
                    Your Reservation List
                </div>
            </div>

            <div class="make-reservation-container MRC">
                <div class="heading-h1 primary-font">
                <!-- Your Reservations -->
                </div>
                
                <?php
$user_id = $_SESSION["id"];
$query = "SELECT * FROM reservation WHERE user_id='$user_id'";
echo "
<style>
    .styled-table {
        width: 80%;
        margin: 50px auto;
        border-collapse: collapse;
        font-size: 18px;
        font-family: 'Arial', sans-serif;
        text-align: left;
        background-color: #FEF6E7; /* Table background color */
    }
    .styled-table thead tr {
        background-color: #FFE5B4;
        color: #000000;
        text-align: center;
    }
    .styled-table th, .styled-table td {
        padding: 12px 15px;
    }
    .styled-table tbody tr {
        border-bottom: 1px solid #dddddd;
    }
    .styled-table tbody tr:nth-of-type(even) {
        background-color: #f3f3f3;
    }
    .styled-table tbody tr:last-of-type {
        border-bottom: 2px solid #009879;
    }
    .btn {
        padding: 5px 10px;
        color: #ffffff;
        background-color: #e74c3c;
        border: none;
        text-decoration: none;
        cursor: pointer;
    }
    .date-col {
        width: 15%; /* Adjust width as needed for the Date column */
        white-space: nowrap; /* Prevent text wrapping */
    }
    .email-col {
        width: 25%; /* Adjust width as needed for the Email column */
    }
</style>
<style>
    .btn {
        padding: 5px 10px;
        color: #ffffff;
        background-color: #e74c3c;
        border: none;
        text-decoration: none;
        cursor: pointer;
        white-space: nowrap; /* Prevent text wrapping */
    }
</style>

";

echo "<center><table class='styled-table'><thead><tr><th>Name</th><th>Email</th><th>Seats</th><th class='date-col'>Date</th><th>Update</th><th>Delete</th><th>E-mail</th></tr></thead>";
$view = mysqli_query($connection, $query);
echo "<tbody>";
while ($rows = mysqli_fetch_array($view)) {
    $id = $rows['id'];
    $name = $rows['name'];
    $email = $rows['email'];
    $seats = $rows['seats'];
    $date = $rows['r_date'];
    echo "
    <tr>
        <td>" . $name . "</td>
        <td class='email-col'>" . $email . "</td>
        <td>" . $seats . "</td>
        <td class='date-col'>" . $date . "</td>
        <td><a href='reservation_update.php?id=$id' class='btn'>Update</a></td>
        <td><a href='reservation_list.php?id=$id' class='btn'>Delete</a></td>
        <td><a href='send_details.php?id=$id' class='btn'>Send Details</a></td>
    </tr>";
}
echo "</tbody></table></center>";
?>





<div class="heading-h1 primary-font">
                <br>
</div>
            </div>
            
        </div>

        <div class="subscribe-to-newsletter STN">

<div class="heading-h1 primary-font">
    Subscribe To Our Newsletter
</div>

<form action="reservation_list.php" method="POST">
    <input type="text" placeholder="Email address" name="mail" required>
    
    <div class="input-button">
        <input type="submit" value="Subscribe" onclick="myFunction()">
    </div>

  </form>

  <script>
function myFunction() {
alert("Subscribed Successfully!");
}
</script>
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

            <a href="../index.php#welcome-page"><img class="footer-logo" src="../images/main-logo-transparent-orange-circle-gray.png" alt=""></a>

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