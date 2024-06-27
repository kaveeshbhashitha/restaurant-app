<?php
require_once("dbConnection.php");
$result = mysqli_query($mysqli, "SELECT * FROM tables WHERE status='notreserved'");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../icons/restaurant.png" type="image/x-icon">
    <link rel="stylesheet" href="../styles/style.css">
    <link rel="stylesheet" href="../styles/menu.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <title>ABC | Menu</title>
</head>
<body>
    <!-- head section start -->
    <div class="header">
        <nav class="navbar navbar-layout">
            <a>
                <h1>Restoran</h1>
            </a>
            <div class="nav-link">
                <div>
                    <a href="../index.html" class="nav-item">Home</a>
                    <a href="delivery.html" class="nav-item">Delivery</a>
                    <a href="menu.html" class="nav-item active">Menu</a>
                    <a href="contact.html" class="nav-item">Contact</a>
                </div>
            </div>
            <div class="button-box">
                <a href="booking.html" class="btn btn-orange">Book a Table</a>
                <a href="" class="btn btn-transparent">Sign-in</a>
            </div>
        </nav>
    </div>
    <!-- head section end -->

    <!-- welcome image-start -->
    <div class="image-container-1" style="background-image: url('../images/bg-hero.jpg');">
        <div class="image-back">
            <div class="image-text-1 center">
                <h1 class="center topic">Food Menu</h1>
                <div class="flex">
                    <a href="" class="text-orange mx-2"><h3>Home </h3></a> /
                    <a href="" class="text-orange mx-2"><h3>Pages</h3></a> / 
                    <a href="" class="text-white mx-2"><h3> Menu</h3></a>
                </div>
            </div>
        </div>
    </div>
    <!-- welcome image-end -->

    <!-- menu item card list start -->
    <div class="container">
        <div class="center popular-menu">
            <h1 class="text-orange">Most Popular Items</h1>
        </div>
        <div class="menu-buttons">
            <button onclick="showMenu('dinner')" class="button-set selected" id="btn-dinner">
                <div class="flex">
                    <img src="../icons/dinner.png" alt="lc">
                    <div class="button-inside">
                        <div class="text-light">Lovely</div>
                        <div class="bold">Dinner</div>
                    </div>
                </div>
            </button>
            <button onclick="showMenu('breakfast')" class="button-set" id="btn-breakfast">
                <div class="flex">
                    <img src="../icons/breakfast.png" alt="bf">
                    <div class="button-inside">
                        <div class="text-light">Popular</div>
                        <div class="bold">Breakfast</div>
                    </div>
                </div>
            </button>
            <button onclick="showMenu('lunch')" class="button-set" id="btn-lunch">
                <div class="flex">
                    <img src="../icons/fried-rice.png" alt="lc">
                    <div class="button-inside">
                        <div class="text-light">Special</div>
                        <div class="bold">Lunch</div>
                    </div>
                </div>
            </button>
        </div>
        <div id="menu-content">
            <div id="breakfast" class="menu hidden">
                <div class="card-list">
                    <div href="#" class="card-item">
                        <img src="../images/about-1.jpg" alt="Card Image">
                        <span class="developer">Non-Vegan</span>
                        <h3>A "developer" codes software and websites.</h3>
                        <a class="btn btn-orange-menu center mt-2" href="">Add To Delivery</a>
                    </div>
                    <div href="#" class="card-item">
                        <img src="../images/about-2.jpg" alt="Card Image">
                        <span class="designer">Dairy-Product</span>
                        <h3>A "designer" is a design expert.</h3>
                        <a class="btn btn-orange-menu center mt-2" href="">Add To Delivery</a>
                    </div>
                    <div href="#" class="card-item">
                        <img src="../images/about-3.jpg" alt="Card Image">
                        <span class="editor">Vegan</span>
                        <h3>An "editor" ensures content quality and accuracy.</h3>
                        <a class="btn btn-orange-menu center mt-2" href="">Add To Delivery</a>
                    </div>
                </div>
            </div>
            <div id="lunch" class="menu hidden">
                <div class="card-list">
                    <div href="#" class="card-item">
                        <img src="../images/about-1.jpg" alt="Card Image">
                        <span class="developer">Non-Vegan</span>
                        <h3>A "developer" codes software and websites.</h3>
                        <a class="btn btn-orange-menu center mt-2" href="">Add To Delivery</a>
                    </div>
                    <div href="#" class="card-item">
                        <img src="../images/about-2.jpg" alt="Card Image">
                        <span class="designer">Dairy-Product</span>
                        <h3>A "designer" is a design expert.</h3>
                        <a class="btn btn-orange-menu center mt-2" href="">Add To Delivery</a>
                    </div>
                    <div href="#" class="card-item">
                        <img src="../images/about-3.jpg" alt="Card Image">
                        <span class="editor">Vegan</span>
                        <h3>An "editor" ensures content quality and accuracy.</h3>
                        <a class="btn btn-orange-menu center mt-2" href="">Add To Delivery</a>
                    </div>
                </div>
            </div>
            <div id="dinner" class="menu">
                <div class="card-list">
                    <div href="#" class="card-item">
                        <img src="../images/about-4.jpg" alt="Card Image">
                        <span class="developer">Non-Vegan</span>
                        <h3>A "developer" codes software and websites.</h3>
                        <a class="btn btn-orange-menu center mt-2" href="">Add To Delivery</a>
                    </div>
                    <div href="#" class="card-item">
                        <img src="../images/about-2.jpg" alt="Card Image">
                        <span class="designer">Dairy-Product</span>
                        <h3>A "designer" is a design expert.</h3>
                        <a class="btn btn-orange-menu center mt-2" href="">Add To Delivery</a>
                    </div>
                    <div href="#" class="card-item">
                        <img src="../images/about-3.jpg" alt="Card Image">
                        <span class="editor">Vegan</span>
                        <h3>An "editor" ensures content quality and accuracy.</h3>
                        <a class="btn btn-orange-menu center mt-2" href="">Add To Delivery</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- menu item card list start -->

    <!-- footer section start -->
    <div class="navbar footer mt-2">
        <div class="between">
            <div class="flex col line-height-1">
                <h3 class="text-orange">Company</h3>
                <a class="nav-item" href="">About Us</a>
                <a class="nav-item" href="">Contact Us</a>
                <a class="nav-item" href="">Reservation</a>
                <a class="nav-item" href="">Privacy Policy</a>
                <a class="nav-item" href="">Terms & Condition</a>
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

<script src="../scripts/script.js"></script>
</body>
</html>