<?php
require '../config.php';

if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === TRUE) {
    echo "<script>window.location.href='./login.php';</script>";
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $menuname = $_POST['menuname'];
    $category = $_POST['category'];
    $ingredients = $_POST['ingredients'];
    $mode = $_POST['mode'];
    $price = $_POST['price'];

    $image_name = basename($_FILES["imageurl"]["name"]);
    $target_file = "../../images/" . $image_name;

    // Basic validation and file upload handling
    if (getimagesize($_FILES["imageurl"]["tmp_name"]) !== false &&
        $_FILES["imageurl"]["size"] <= 500000 &&
        in_array(strtolower(pathinfo($target_file, PATHINFO_EXTENSION)), ["jpg", "jpeg", "png", "gif"]) &&
        move_uploaded_file($_FILES["imageurl"]["tmp_name"], $target_file)) {

        $stmt = $link->prepare("INSERT INTO menus (imageurl, menuname, category, ingredients, mode, price) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->execute([$image_name, $menuname, $category, $ingredients, $mode, $price]);

        echo "<script>window.location.href='menus.php'</script>";
    } else {
        echo "Failed to add menu. Please check your input.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Menu</title>
    <link rel="stylesheet" href="../../styles/menuoperation.css">
    <link rel="shortcut icon" href="../../icons/restaurant.png" type="image/x-icon">
    <script src="../../scripts/form.js"></script>
</head>
<body>
    <div class="container">
        <h2>Add New Menu</h2>
        <form action="<?= htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data" onclick="validateForm()">
            <div class="form-group">
                <label for="menuname">Menu Name:</label>
                <input type="text" name="menuname" id="menuname">
            </div>
            <div class="form-group">
                <label for="category">Category:</label>
                <select name="category" id="category">
                    <option value="">Select Mode</option>
                    <option value="Dairy">Dairy</option>
                    <option value="Not-Vegan">Not-Vegan</option>
                    <option value="Vegan">Vegan</option>
                </select>
            </div>
            <div class="form-group">
                <label for="ingredients">Ingredients:</label>
                <input type="text" name="ingredients" id="ingredients">
            </div>
            <div class="form-group">
                <label for="mode">Mode:</label>
                <select name="mode" id="mode">
                    <option value="">Select Mode</option>
                    <option value="lunch">Lunch</option>
                    <option value="breakfast">Breakfast</option>
                    <option value="dinner">Dinner</option>
                </select>
            </div>
            <div class="form-group">
                <label for="price">Price:</label>
                <input type="number" name="price" id="price" step="0.01">
            </div>
            <div class="form-group">
                <label for="imageurl">Upload Image:</label>
                <input type="file" name="imageurl" id="imageurl">
            </div>
            <input type="submit" value="Add Menu">
        </form>
    </div>
</body>
</html>