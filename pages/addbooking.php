<?php

require_once("config.php");
require_once("sendmail.php");

// data retrieval and show top of the form
$id = $_GET['id'];
$result = mysqli_query($link, "SELECT * FROM tables WHERE id = $id");
if (!$result) {
    die("Error in SQL query: " . mysqli_error($link));
}
$resultData = mysqli_fetch_assoc($result);
$allow = $resultData['allow'];
$seats = $resultData['seats'];
$message1 = $message2 = $message3 = $message4 = $message5 = $message6 = $message7 = $message8 = $message = "";

// insert data into db
if (isset($_POST['submit'])) {
    // Escape special characters in string for use in SQL statement    
    $firstname = mysqli_real_escape_string($link, $_POST['fname']);
    $lastname = mysqli_real_escape_string($link, $_POST['lname']);
    $email = mysqli_real_escape_string($link, $_POST['email']);
    $mobile = mysqli_real_escape_string($link, $_POST['mobile']);
    $date = mysqli_real_escape_string($link, $_POST['date']);
    $atime = mysqli_real_escape_string($link, $_POST['atime']);
    $ltime = mysqli_real_escape_string($link, $_POST['ltime']);
    $numofcus = mysqli_real_escape_string($link, $_POST['numofperson']);
        
    // Check for empty fields
    if (empty($firstname) || empty($lastname) || empty($email) || empty($mobile) || empty($date) || empty($atime) || empty($ltime) || empty($numofcus)) {
        if (empty($firstname)) {
            $message1 = "<font color='red'>Provide Your First Name</font><br/>";
        }
        
        if (empty($lastname)) {
            $message2 = "<font color='red'>Provide Your Last Name</font><br/>";
        }
        
        if (empty($email)) {
            $message3 = "<font color='red'>Provide Your Email</font><br/>";
        }

        if (empty($mobile)) {
            $message4 = "<font color='red'>Provide Your Mobile</font><br/>";
        }
        
        if (empty($date)) {
            $message5 = "<font color='red'>Provide Date You want to Reserve Table</font><br/>";
        }
        
        if (empty($atime)) {
            $message6 = "<font color='red'>Provide Time You Come to Restaurant</font><br/>";
        }

        if (empty($ltime)) {
            $message7 = "<font color='red'>Provide Time You Leave form the Restaurante</font><br/>";
        }
        
        if (empty($numofcus)) {
            $message8 = "<font color='red'>Provide Number of Members Come with You</font><br/>";
        }
    } else { 
        // If all the fields are filled (not empty) 

        $insertQuery = "INSERT INTO booking (`tableid`, `tcondition`, `seats`, `email`, `mobile`, `date`, `atime`, `ltime`, `numofcus`, `fname`, `lname`) VALUES ('$id', '$allow', '$seats', '$email', '$mobile', '$date', '$atime', '$ltime', '$numofcus', '$firstname', '$lastname')";
        $updateQuery = "UPDATE tables SET status = 'reserved' WHERE id = $id";

        $insertResult = mysqli_query($link, $insertQuery);
        $updateResult = mysqli_query($link, $updateQuery);

        if ($insertResult && $updateResult) {
            // Send confirmation email
            sendConfirmationEmail($email, $firstname, $lastname, $date, $atime, $ltime, $numofcus);
            $message = "<div class='alert alert-success'>Booking Success. We welcome you on $date in $atime</div>";
        } else {
            // Display error message
            $message = "<div class='alert alert-danger'>Booking Success. We welcome you on $date in $atime</div>";
        }
    }
}
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
                    <a href="delivery.php" class="nav-item">Delivery</a>
                    <a href="menu.php" class="nav-item">Menu</a>
                    <a href="contact.php" class="nav-item">Contact</a>
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
                            <td colspan="4">
                                <div><?php echo $message ?></div>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <label for="">First Name</label>
                                <input type="text" name="fname" placeholder="Freank" class="table-selection">
                                <small><?php echo $message1 ?></small>
                            </td>
                            <td  colspan="2">
                                <label for="">Last Name</label>
                                <input type="text" name="lname" placeholder="Ferdinand" class="table-selection">
                                <small><?php echo $message2 ?></small>
                            </td>
                        </tr>
                        <tr>
                            <td  colspan="2">
                                <label for="">Email</label>
                                <input type="email" name="email" placeholder="freank@email.com" class="table-selection">
                                <small><?php echo $message3 ?></small>
                            </td>
                            <td  colspan="2">
                                <label for="">Mobile</label>
                                <input type="text" name="mobile" placeholder="077342209" class="table-selection">
                                <small><?php echo $message4 ?></small>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="">Date</label>
                                <input type="date" name="date" class="table-selection">
                                <small><?php echo $message5 ?></small>
                            </td>
                            <td>
                                <label for="">Time Arrival</label>
                                <input type="time" name="atime" class="table-selection">
                                <small><?php echo $message6 ?></small>
                            </td>
                            <td>
                                <label for="">Time Leaving</label>
                                <input type="time" name="ltime" class="table-selection">
                                <small><?php echo $message7 ?></small>
                            </td>
                            <td>
                                <label for="">Persons</label>
                                <input type="number" name="numofperson" class="table-selection">
                                <small><?php echo $message8 ?></small>
                            </td>
                        </tr>
                        <div class="table-button">
                            <button type="reset" class="reset">Reset</button>
                            <button type="submit" name="submit" class="book btn-orange">Book</button>
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
