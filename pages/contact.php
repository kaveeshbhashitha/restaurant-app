<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../icons/restaurant.png" type="image/x-icon">
    <link rel="stylesheet" href="../styles/style.css">
    <link rel="stylesheet" href="../styles/contact.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <title>ABC | Contact Us</title>
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
                    <a href="../index.php" class="nav-item">Home</a>
                    <a href="delivery.php" class="nav-item">Delivery</a>
                    <a href="menu.php" class="nav-item">Menu</a>
                    <a href="contact.php" class="nav-item active">Contact</a>
                </div>
            </div>
            <div class="button-box">
                <a href="booking.php" class="btn btn-orange">Book a Table</a>
                <a href="login.php" class="btn btn-transparent">Sign-in</a>
            </div>
        </nav>
    </div>
    <!-- head section end -->

    <!-- welcome image-start -->
    <div class="image-container-1" style="background-image: url('../images/bg-hero.jpg');">
        <div class="image-back">
            <div class="image-text-1 center">
                <h1 class="center topic">Freely Contact US</h1>
                <div class="flex">
                    <a href="" class="text-orange mx-2"><h3>Home </h3></a> /
                    <a href="" class="text-orange mx-2"><h3>Pages</h3></a> / 
                    <a href="" class="text-white mx-2"><h3> Contact</h3></a>
                </div>
            </div>
        </div>
    </div>
    <!-- welcome image-end -->

    <!-- contact form with map start -->
    <div class="container">
        <h1 class="center text-orange query">Contact For Any Query</h1>
        
        <div class="between">
            <div class="map">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3960.316142595242!2d79.91297917499695!3d6.9719791930287105!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ae2581ce9900001%3A0xd831aae77aeb6e45!2sDepartment%20of%20Statistics%20and%20Computer%20Science!5e0!3m2!1sen!2slk!4v1719419329946!5m2!1sen!2slk" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
            <div class="contact-form">
                <h3>We welcome your queries, suggestions, orders, requests as well as ideas.</h3>
                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS7-skMS4JCt_IZHvpCUjujKsVKS6O0Jer9vw&s" alt="" style="width:70%; height:auto; margin-left: 15%;">
                <form action="./send_email.php" method="post">
                    <div class="form-group">
                        <label for="name">Name:</label>
                        <input type="text" id="name" name="name" required class="table-selection">
                    </div>
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" id="email" name="email" required class="table-selection">
                    </div>
                    <div class="form-group">
                        <label for="subject">Subject:</label>
                        <input type="text" id="subject" name="subject" required class="table-selection">
                    </div>
                    <div class="form-group">
                        <label for="message">Message:</label>
                        <textarea id="message" name="message" rows="5" required class="table-selection"></textarea>
                    </div>
                    <button type="submit" name="send">Submit</button>
                </form>
            </div>
        </div>
        <h1 class="center text-orange query">Follow Us On</h1>
        <div class="center">
            <div class="flex query">
                <a href="http://" target="_blank" rel="noopener noreferrer"><img src="../icons/facebook.png" alt="" class="media"></a>
                <a href="http://" target="_blank" rel="noopener noreferrer"><img src="../icons/whatsapp (1).png" alt="" class="media"></a>
                <a href="http://" target="_blank" rel="noopener noreferrer"><img src="../icons/social.png" alt="" class="media"></a>
                <a href="http://" target="_blank" rel="noopener noreferrer"><img src="../icons/youtube.png" alt="" class="media"></a>
                <a href="http://" target="_blank" rel="noopener noreferrer"><img src="../icons/email.png" alt="" class="media"></a>
            </div>
        </div>
    </div>
    
     <!-- contact form with map end -->
    
    <!-- footer section start -->
    <div class="navbar footer mt-2">
        <div class="between">
            <div class="flex col line-height-1">
                <h3 class="text-orange">Company</h3>
                <a class="nav-item" href="contact.php">Contact Us</a>
                <a class="nav-item" href="booking.php">Reservation</a>
                <a class="nav-item active" href="./logout.php">Logout</a>
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