<?php
    # Initialize session
    session_start();
    require_once("config.php");

    if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== TRUE) {
        echo "<script>window.location.href='./login.php';</script>";
        exit;
    }

    $email = htmlspecialchars($_SESSION["email"]);
    $id = $_GET['id'];

    $id = intval($id);
    $email = mysqli_real_escape_string($link, $email);

    # Corrected SQL queries
    $result = mysqli_query($link, "SELECT * FROM menus WHERE id = $id");
    $customer = mysqli_query($link, "SELECT * FROM user WHERE email = '$email'");

    if (!$result || !$customer) {
        die("Error in SQL query: " . mysqli_error($link));
    }

    $resultData = mysqli_fetch_assoc($result);
    $cusData = mysqli_fetch_assoc($customer);
    $menuname = $resultData['menuname'];
    $price = $resultData['price'];
    $cusname = $cusData['name'];
    $cusemail = $cusData['email'];
    $cusmobile = $cusData['mobile'];

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../icons/restaurant.png" type="image/x-icon">
    <link rel="stylesheet" href="../styles/style.css">
    <link rel="stylesheet" href="../styles/delivery.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <title>ABC | Delivery</title>
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
                    <a href="delivery.html" class="nav-item active">Delivery</a>
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
                <h1 class="center" style="color:white;">Free Delivery in Downtown</h1>
                <div class="flex">
                    <a href="" class="text-orange mx-2"><h3>Home </h3></a> /
                    <a href="" class="text-orange mx-2"><h3>Pages</h3></a> / 
                    <a href="" class="text-white mx-2"><h3> Delivery</h3></a>
                </div>
            </div>
        </div>
    </div>
    <!-- welcome image-end -->

    <div class="message-container">
        <div class="center-content">
          <?php
              // Include the database connection file
            //   require_once("connect.php");

            //   if (isset($_POST['submit'])) {
            //     // Escape special characters in string for use in SQL statement	
            //     $fname = mysqli_real_escape_string($conn, $_POST['fname']);
            //     $lname = mysqli_real_escape_string($conn, $_POST['lname']);
            //     $email = mysqli_real_escape_string($conn, $_POST['email']);
            //     $subject = mysqli_real_escape_string($conn, $_POST['subject']);
            //     $message = mysqli_real_escape_string($conn, $_POST['message']);
                  
            //     if (empty($fname) || empty($lname) || empty($email) || empty($subject) || empty($message)) {
            //       echo "<div class='errormessage'>Fill all fields</div>";
            //     } else { 
            //       $result = mysqli_query($conn, "INSERT INTO contact (`fname`, `lname`, `email`, `subject`, `message`) VALUES ('$fname', '$lname', '$email', '$subject', '$message')");
                  
            //       echo "<div class='successmessage'>Data inserted successfully</div>";
            //     }
            //   }
          ?>
          <h2 class="topic">Place your delivery and make payment</h2>
          <h5 class="topic mot">We love deliver your order to your door steps</h5>
          <div class="text-orange mot between"><div>Meal Id: <?php echo $id ?></div>, <div>Menu Name: <?php echo $menuname ?></div>, <div>Price: <?php echo $price ?> (Per One)</div></div>
          <form class="form" method="post" name="add">
              <div class="input-group">
                <label for="email">Customer Name</label>
                <input type="text" name="fname" id="email" class="text-orange" value='<?php echo htmlspecialchars($cusname); ?>'>
            </div>
            <div class="input-group">
                <label for="email">Mobile</label>
                <input type="text" name="lname" id="email" class="text-orange" value='0<?php echo htmlspecialchars($cusmobile); ?>'>
            </div>
              <div class="input-group">
                  <label for="email">Customer Email</label>
                  <input type="email" name="email" id="email" class="text-orange" value='<?php echo htmlspecialchars($cusemail); ?>'>
              </div>
              <div class="input-group">
                  <label for="email">Number of potions</label>
                  <input type="number" name="subject" id="email" placeholder="Enter Number of potions required" >
              </div>
              <button type="submit" name="submit" class="submit-button">Order Now</button>
          </form>
        </div>
    </div>
    
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
                    <input class="textbox" type="text" placeholder="Your email" style="width:50%;">
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