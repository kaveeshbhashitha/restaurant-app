<?php
    require_once("config.php");
    $lunch = mysqli_query($link, "SELECT * FROM menus WHERE mode = 'lunch'");
    $breakfast = mysqli_query($link, "SELECT * FROM menus WHERE mode = 'breakfast'");
    $dinner = mysqli_query($link, "SELECT * FROM menus WHERE mode = 'dinner'");
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
                    <a href="../index.php" class="nav-item">Home</a>
                    <a href="delivery.php" class="nav-item">Delivery</a>
                    <a href="menu.php" class="nav-item active">Menu</a>
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

        <div id="menu-content" class="center">
            <div id="breakfast" class="menu hidden">
                <div class="card-list">
                <?php
                    while ($row = mysqli_fetch_assoc($breakfast)) {
                    
                        $menuname = $row['menuname'];
                        $imageurl = $row['imageurl'];
                        $category = $row['category'];
                        $ingredients = $row['ingredients'];

                        if ($category == "Non-Vegan") {
                            $categoryDisplay = "<span class='developer'>$category</span>";
                        } elseif ($category == "Dairy") {
                            $categoryDisplay = "<span class='designer'>Dairy-Product</span>";
                        } elseif ($category == "Vegan") {
                            $categoryDisplay = "<span class='editor'>Vegan</span>";
                        } else {
                            $categoryDisplay = "<span class='developer'>$category</span>";
                        }

                        echo "
                        <div class='card-item'>
                            <div class='menu-item'>
                                <img src='http://localhost/restaurant-app/images/$imageurl' alt='Card Image'>
                                $categoryDisplay
                                <h3>$menuname</h3>
                                <p>$ingredients</p>
                                <a class='btn btn-orange-menu center mt-2' href='delivery.php?id={$row['id']}'>Add To Delivery</a>
                            </div>
                        </div>";
                    }
                    ?>
                </div>
            </div>

            <div id="lunch" class="menu hidden">
                <div class="card-list">
                <?php
                    while ($row = mysqli_fetch_assoc($lunch)) {
                    
                        $menuname = $row['menuname'];
                        $imageurl = $row['imageurl'];
                        $category = $row['category'];
                        $ingredients = $row['ingredients'];

                        if ($category == "Non-Vegan") {
                            $categoryDisplay = "<span class='developer'>$category</span>";
                        } elseif ($category == "Dairy") {
                            $categoryDisplay = "<span class='designer'>Dairy-Product</span>";
                        } elseif ($category == "Vegan") {
                            $categoryDisplay = "<span class='editor'>Vegan</span>";
                        } else {
                            $categoryDisplay = "<span class='developer'>$category</span>";
                        }

                        echo "
                        <div class='card-item'>
                            <div class='menu-item'>
                                <img src='http://localhost/restaurant-app/images/$imageurl' alt='Card Image'>
                                $categoryDisplay
                                <h3>$menuname</h3>
                                <p>$ingredients</p>
                                <a class='btn btn-orange-menu center mt-2' href='delivery.php?id={$row['id']}'>Add To Delivery</a>
                            </div>
                        </div>";
                    }
                    ?>
                </div>
            </div>
            <div id="dinner" class="menu">
                <div class="card-list">
                <?php
                    while ($row = mysqli_fetch_assoc($dinner)) {
                    
                        $menuname = $row['menuname'];
                        $imageurl = $row['imageurl'];
                        $category = $row['category'];
                        $ingredients = $row['ingredients'];

                        if ($category == "Non-Vegan") {
                            $categoryDisplay = "<span class='developer'>$category</span>";
                        } elseif ($category == "Dairy") {
                            $categoryDisplay = "<span class='designer'>Dairy-Product</span>";
                        } elseif ($category == "Vegan") {
                            $categoryDisplay = "<span class='editor'>Vegan</span>";
                        } else {
                            $categoryDisplay = "<span class='developer'>$category</span>";
                        }

                        echo "
                        <div class='card-item'>
                            <div class='menu-item'>
                                <img src='http://localhost/restaurant-app/images/$imageurl' alt='Card Image'>
                                $categoryDisplay
                                <h3>$menuname</h3>
                                <p>$ingredients</p>
                                <a class='btn btn-orange-menu center mt-2' href='delivery.php?id={$row['id']}'>Add To Delivery</a>
                            </div>
                        </div>";
                    }
                    ?>
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