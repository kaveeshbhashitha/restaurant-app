<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="icons/restaurant.png" type="image/x-icon">
    <link href="https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="styles/style.css">
    <link rel="stylesheet" href="styles/cookie.css">
    <script src="scripts/cookie.js" defer></script>
    <title>Welcome | ABC Restaurant</title>
</head>
<body>
    <div class="wrapper">
        <header>
            <i class="bx bx-cookie"></i>
            <h3>Protect your privacy</h3>
        </header>

        <div class="data">
            <p>This website use cookies to help you have a superior and more relevant browsing experience on the website. <a href="https://www.cloudflare.com/en-gb/learning/privacy/what-are-cookies/"> Read more...</a></p>
        </div>

        <div class="buttons">
            <button class="button" id="acceptBtn">Accept</button>
            <button class="button" id="declineBtn">Decline</button>
        </div>
    </div>
    <!-- head section start -->
    <div class="header">
        <nav class="navbar navbar-layout">
            <a>
                <h1>Restoran</h1>
            </a>
            <div class="nav-link">
                <div>
                    <a href="index.php" class="nav-item active">Home</a>
                    <a href="pages/delivery.php" class="nav-item">Delivery</a>
                    <a href="pages/menu.php" class="nav-item">Menu</a>
                    <a href="pages/contact.php" class="nav-item">Contact</a>
                </div>
            </div>
            <div class="button-box">
                <a href="pages/booking.php" class="btn btn-orange">Book a Table</a>
                <a href="./pages/login.php" class="btn btn-transparent">Sign-in</a>
            </div>
        </nav>
    </div>
    <!-- head section end -->

    <!-- body section -->
    <!-- welcome image-start -->
    <div class="image-container" style="background-image: url('images/bg-hero.jpg');">
        <div class="image-back">
            <div class="image-text">
                <div>
                    <h1 class="text-large">Enjoy Our<br>Delicious Meal</h1>
                    <p class="sentence">We are the cookers provide most delicious meals in the city and we are popular for international culinary</p>
                    <a href="pages/booking.php" class="btn btn-orange">Book A Table</a>
                </div>
            </div>
            <div class="first-image">
                <img class="img-fluid" src="images/hero.png" alt="Background image">
            </div>
        </div>
    </div>
    <!-- welcome image-end -->

    <!-- Service start -->
    <div class="container">
        <div>
            <h2 class="text-orange center">Our Services</h2>
            <span class="center">We are providing reliable and quality service to you</span>
        </div>
        <div class="flex">
            <div class="box margin">
                <div class="box-content">
                    <img src="icons/catering.gif" alt="" class="service-icons">
                    <h3>Master Chefs</h3>
                    <h5 class="long">We are fullfilled with most talented masters in the country</h5>
                </div>
            </div>
            <div class="box margin">
                <div class="service-item rounded pt-3">
                    <div class="box-content">
                        <img src="icons/healthy-food.gif" alt="" class="service-icons">
                        <h3>Quality Food</h3>
                        <h5 class="long">We always think about you. We provide best things for your</h5>
                    </div>
                </div>
            </div>
            <div class="box margin">
                <div class="service-item rounded pt-3">
                    <div class="box-content">
                        <img src="icons/online-shop.gif" alt="" class="service-icons">
                        <h3>Online Order</h3>
                        <h5 class="long">We deliver your meals into your doore steps to feel you free</h5>
                    </div>
                </div>
            </div>
            <div class="box">
                <div class="service-item rounded pt-3">
                    <div class="box-content">
                        <img src="icons/24-7.gif" alt="" class="service-icons">
                        <h3>24/7 Service</h3>
                        <h5 class="long">We are working everyday every time for your happiness and comfortability</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Service End -->

    <!-- About Start -->
    <div class="container">
        <div>
            <h2 class="text-orange center">About US</h2>
            <span class="center">We are best taste maker in your city</span>
        </div>
        <div class="flex mt-2">
            <div>
                <div class="flex">
                    <div class="text-start">
                        <img class="image1" src="images/about-1.jpg">
                    </div>
                    <div class="text-start">
                        <img class="image2" src="images/about-2.jpg">
                    </div>
                </div>
                <div class="flex">
                    <div class="text-end">
                        <img class="image3" src="images/about-3.jpg">
                    </div>
                    <div class="text-end">
                        <img class="image4" src="images/about-4.jpg">
                    </div>
                </div>
            </div>
            <div class="about">
                <h5 class="text-orange">About Us</h5>
                <h1 class="">Welcome to <i class="fa fa-utensils text-primary me-2"></i> Restoran</h1>
                <p class="long">Our vision is to provide best things for our customers and make food quality as much as possible to maintaing the quality of our standards</p><br>
                <p class="long">Our vision is to provide best things for our customers and make food quality as much as possible to maintaing the quality of our standards</p>
                <div class="flex">
                    <div class="">
                        <div class="flex">
                            <h1 class="text-orange exp">| 15</h1>
                            <div class="mt-2">
                                <p class="exp-2">Years of</p>
                                <h6 class="exp-2">Experience</h6>
                            </div>
                        </div>
                    </div>
                    <div class="mx-2">
                        <div class="flex">
                            <h1 class="text-orange exp">| 50</h1>
                            <div class="mt-2">
                                <p class="exp-2">Popular</p>
                                <h6 class="exp-2">Master Chefs</h6>
                            </div>
                        </div>
                    </div>
                </div>
                <a class="btn btn-orange mt-2" href="">Read More</a>
            </div>
        </div>
    </div>
    <!-- About End -->

    <!-- Menu start -->
    <div class="container">
        <div>
            <h2 class="text-orange center">Our Popular Menus</h2>
            <span class="center">We are serving wide ranges of food and baverages to you.</span>
        </div>
        <table width="100%" class="mt-2">
            <tr>
                <th><img src="images/about-4.jpg" alt="" class="meals"></th>
                <th><img src="images/about-3.jpg" alt="" class="meals"></th>
                <th><img src="images/about-2.jpg" alt="" class="meals"></th>
                <th><img src="images/about-1.jpg" alt="" class="meals"></th>
            </tr>
            <tr>
                <th>Chees, Veg and Fruit Platters</th>
                <th>Veg/Non-Veg Salads</th>
                <th>Breackfirst Collections</th>
                <th>Romantic Dinner Arrangments</th>
            </tr>
            <tr>
                <th class="text-orange">Starting with Rs.500.00</th>
                <th class="text-orange">Starting with Rs.1500.00</th>
                <th class="text-orange">Starting with Rs.2500.00</th>
                <th class="text-orange">Starting with Rs.3500.00</th>
            </tr>
            <tr class="mt-2">
                <th><img src="images/about-4.jpg" alt="" class="meals"></th>
                <th><img src="images/about-3.jpg" alt="" class="meals"></th>
                <th><img src="images/about-2.jpg" alt="" class="meals"></th>
                <th><img src="images/about-1.jpg" alt="" class="meals"></th>
            </tr>
            <tr>
                <th>Chees, Veg and Fruit Platters</th>
                <th>Veg/Non-Veg Salads</th>
                <th>Breackfirst Collections</th>
                <th>Romantic Dinner Arrangments</th>
            </tr>
            <tr>
                <th class="text-orange">Starting with Rs.500.00</th>
                <th class="text-orange">Starting with Rs.1500.00</th>
                <th class="text-orange">Starting with Rs.2500.00</th>
                <th class="text-orange">Starting with Rs.3500.00</th>
            </tr>
        </table>
    </div>
     <!-- Menu end -->

    <!-- body section-end -->
    
    <!-- footer section start -->
    <div class="navbar footer mt-2">
        <div class="between">
            <div class="flex col line-height-1">
                <h3 class="text-orange">Company</h3>
                <a class="nav-item" href="pages/contact.php">Contact Us</a>
                <a class="nav-item" href="pages/booking.php">Reservation</a>
                <a class="nav-item active" href="./pages/logout.php">Logout</a>
            </div>
            <div class="line-height-1">
                <h3 class="text-orange">Contact</h3>
                <p class="nav-item">123 Street, New York, USA</p>
                <p class="nav-item">+012 345 67890</p>
                <p class="nav-item">info@example.com</p>
                <div class="">
                    <a class="social" href=""><i class="fab fa-twitter"></i></a>
                    <a class="social mx-2" href=""><i class="fab fa-facebook-f"></i></a>
                    <a class="social" href=""><i class="fab fa-youtube"></i></a>
                    <a class="social mx-2" href=""><i class="fab fa-linkedin-in"></i></a>
                </div>
            </div>
            <div class="line-height-1">
                <h3 class="text-orange">Opening</h3>
                <h5 class="nav-item">Monday - Saturday</h5>
                <p>09AM - 09PM</p>
                <h5 class="nav-item">Sunday</h5>
                <p>10AM - 08PM</p>
            </div>
            <div class="line-height-1">
                <h3 class="text-orange">Newsletter</h3>
                <p>Get our new recepies to your door step</p>
                <div class="nav-item">
                    <input class="textbox" type="text" placeholder="Your email">
                    <button type="button" class="btn btn-orange">SignUp</button>
                </div>
            </div>
        </div>
        <div class="center">
            &copy; <a class="nav-item" href="#">ABC Restaurant</a>, All Right Reserved. 
        </div>
    </div>
    <!-- footer section start -->

    <!-- back to top button -->
    <button id="scrollToTopBtn" title="Go to top">UP</button>
    <!--js connection here-->
    <script src="scripts/script.js"></script>
    
</body>
</html>