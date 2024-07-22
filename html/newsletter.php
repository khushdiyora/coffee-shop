<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Newsletter</title>
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
</head>
<body>
<?php

include_once("header.php");
?>

    <main>
        <div id="newsletter" class="our-newsletter-banner ONB">
            <div class="background-image-container">
                <div class="our-newsletter-heading-h1 primary-font">
                    Newsletter
                </div>
            </div>

            <div class="read-news-container RNC">
                <div class="news-heading-container NHC">
                    <div class="heading-h1 primary-font">
                        Read Our Latest Posts
                    </div>
                    <div class="heading-h2">
                    the newest updates, stories, and insights that reflect our journey and passions.
                    </div>
                </div>
    
                <div class="news-content-wrapper">
                    <div class="news-item-wrapper">
                        <div class="news-card">
                            <img class="news-card-img" src="../images/landing-page/read-news/image-1.jpg" alt="">
                        </div>
    
                        <div class="news-title-container">
    
                            <div class="heading-h2">
                                6 January 2023
                            </div>
                            
                            <div class="heading-h1 primary-font">
                                Best Coffee Shops In The State You Should Know
                            </div>
    
                            <a href="under-maintenance.php">
                                <button class="explore-more"><span>Read More</span></button>
                            </a>
    
                        </div>
    
                    </div>
    
                    <div class="news-item-wrapper">
                        <div class="news-card">
                            <img class="news-card-img" src="../images/landing-page/read-news/image-2.jpg" alt="">
                        </div>
    
                        <div class="news-title-container">
    
                            <div class="heading-h2">
                                4 January 2023
                            </div>
                            
                            <div class="heading-h1 primary-font">
                                The Culture And Coffee Customs Nowadays
                            </div>
    
                            <a href="under-maintenance.php">
                                <button class="explore-more"><span>Read More</span></button>
                            </a>
    
                        </div>
    
                    </div>
    
                    <div class="news-item-wrapper">
                        <div class="news-card">
                            <img class="news-card-img" src="../images/landing-page/read-news/image-3.jpg" alt="">
                        </div>
    
                        <div class="news-title-container">
    
                            <div class="heading-h2">
                                1 January 2023
                            </div>
                            
                            <div class="heading-h1 primary-font">
                                Best Cup Of Drinks For Your Break Today
                            </div>
    
                            <a href="under-maintenance.php">
                                <button class="explore-more"><span>Read More</span></button>
                            </a>
    
                        </div>
    
                    </div>
                </div>
                <div class="news-content-wrapper">
                    <div class="news-item-wrapper">
                        <div class="news-card">
                            <img class="news-card-img" src="../images/landing-page/read-news/image-4.jpg" alt="">
                        </div>
    
                        <div class="news-title-container">
    
                            <div class="heading-h2">
                                29 December 2022
                            </div>
                            
                            <div class="heading-h1 primary-font">
                                Researchers Write New Chapter in the History of the Arabica Species
                            </div>
    
                            <a href="under-maintenance.php">
                                <button class="explore-more"><span>Read More</span></button>
                            </a>
    
                        </div>
    
                    </div>
    
                    <div class="news-item-wrapper">
                        <div class="news-card">
                            <img class="news-card-img" src="../images/landing-page/read-news/image-5.jpg" alt="">
                        </div>
    
                        <div class="news-title-container">
    
                            <div class="heading-h2">
                                27 December 2022
                            </div>
                            
                            <div class="heading-h1 primary-font">
                                Weekly Coffee News: New Roast Website and Eco-Minded Shipping
                            </div>
    
                            <a href="under-maintenance.php">
                                <button class="explore-more"><span>Read More</span></button>
                            </a>
    
                        </div>
    
                    </div>
    
                    <div class="news-item-wrapper">
                        <div class="news-card">
                            <img class="news-card-img" src="../images/landing-page/read-news/image-6.jpg" alt="">
                        </div>
    
                        <div class="news-title-container">
    
                            <div class="heading-h2">
                                25 December 2022
                            </div>
                            
                            <div class="heading-h1 primary-font">
                                Arabica Enters Canada with Snowy White Toronto Flagship
                            </div>
    
                            <a href="under-maintenance.php">
                                <button class="explore-more"><span>Read More</span></button>
                            </a>
    
                        </div>
    
                    </div>
                </div>
            </div>
            

        </div>

        <div class="subscribe-to-newsletter STN">

<div class="heading-h1 primary-font">
    Subscribe To Our Newsletter
</div>

<form action="newsletter.php" method="POST">
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