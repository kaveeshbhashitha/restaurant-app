<?php
require_once("config.php");
$id = $_GET['id'];

// Select data associated with this particular id
$result = mysqli_query($link, "SELECT * FROM tables WHERE id = $id");

// Fetch the next row of a result set as an associative array
$resultData = mysqli_fetch_assoc($result);

$allow = $resultData['allow'];
$seats = $resultData['seats'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../icons/restaurant.png" type="image/x-icon">
    <link rel="stylesheet" href="../styles/style.css">
    <link rel="stylesheet" href="../styles/booking.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <title>ABC | Booking</title>
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
                    <a href="menu.html" class="nav-item">Menu</a>
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
                <h1 class="center topic">Enjoy your meal with us</h1>
                <div class="flex">
                    <a href="" class="text-orange mx-2"><h3>Home </h3></a> /
                    <a href="" class="text-orange mx-2"><h3>Pages</h3></a> / 
                    <a href="" class="text-white mx-2"><h3> Reservation</h3></a>
                </div>
            </div>
        </div>
    </div>
    <!-- welcome image-end -->

    <!-- table section start -->
    <div class="container">
        <div class="border-box">
            <h3 class="text-orange center">Available Tables</h3>
            <h5 class="center">-- Select your preference for enjoy meals --</h5>
            <div class="center text-orange mt-2">Table ID: <?php echo $id ?> | Table is: <?php echo $allow ?> | Having: <?php echo $seats ?> Seats</div>
            <div class="table-data">
                <form action="" method="post">
                    <table width="100%">
                        <tr>
                            <td colspan="2">
                                <label for="">First Name</label>
                                <input type="text" placeholder="Freank" class="table-selection">
                            </td>
                            <td  colspan="2">
                                <label for="">Last Name</label>
                                <input type="text" placeholder="Ferdinand" class="table-selection">
                            </td>
                        </tr>
                        <tr>
                            <td  colspan="2">
                                <label for="">Email</label>
                                <input type="email" placeholder="freank@email.com" class="table-selection">
                            </td>
                            <td  colspan="2">
                                <label for="">Mobile</label>
                                <input type="text" placeholder="077342209" class="table-selection">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="">Date</label>
                                <input type="date" class="table-selection">
                            </td>
                            <td>
                                <label for="">Time Arrival</label>
                                <input type="time" class="table-selection">
                            </td>
                            <td>
                                <label for="">Time Leaving</label>
                                <input type="time" class="table-selection">
                            </td>
                            <td>
                                <label for="">Persons</label>
                                <input type="number" class="table-selection">
                            </td>
                        </tr>
                        <div class="table-button">
                            <button type="reset" class="reset">Reset</button>
                            <button type="submit" class="book btn-orange" onclick="alert('Fill all necessary data.')">Book</button>
                        </div>
                    </table>
                </form>
            </div>
        </div>
    </div>
    <!-- table section end -->

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
