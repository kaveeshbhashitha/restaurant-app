<?php
// Database connection
require '../config.php';

if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === TRUE) {
    echo "<script>window.location.href='./login.php';</script>";
    exit;
}

$sql = mysqli_query($link, "SELECT * FROM menus");

if (!$sql) {
    die("Error in SQL query: " . mysqli_error($link));
}

$menus = [];
while ($row = mysqli_fetch_assoc($sql)) {
    $menus[] = $row;
}

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);

    $sql = "DELETE FROM menus WHERE id = ?";
    $stmt = $link->prepare($sql);
    if ($stmt->execute([$id])) {
        echo "<script>alert('Menu item deleted successfully.'); window.location.href='menus.php';</script>";
    } else {
        echo "<script>alert('Failed to delete menu item.'); window.location.href='menus.php';</script>";
    }
} else {
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu List</title>
    <link rel="stylesheet" href="../../styles/admin.css">
    <link rel="shortcut icon" href="../../icons/restaurant.png" type="image/x-icon">
</head>
<body>
    <div class="flex">
        <div class="logo">
            <img src="../../icons/restaurant.png" alt="" class="logo-image">
            <h2>Available Menus</h2>
        </div>
        <div class="buttonbox">
            <a class="two-button add" href="./home.php">Back</a>
            <a class="two-button add" href="./add.php">Add New</a>
            <a class="two-button log" href="./logout.php">Logout</a>
        </div>
    </div>
    <table>
        <tr>
            <th>Menu ID</th>
            <th>Image</th>
            <th>Name</th>
            <th>Category</th>
            <th>Ingredients</th>
            <th>Mode</th>
            <th>Price</th>
            <th>Actions</th>
        </tr>
        <?php foreach ($menus as $menu): ?>
        <tr>
            <td><?= htmlspecialchars($menu['id']); ?></td>
            <td><a href="http://localhost/restaurant-app/images/<?= htmlspecialchars($menu['imageurl']); ?>" alt="<?= htmlspecialchars($menu['menuname']); ?>" target="_blank"><img class="table_image" src="http://localhost/restaurant-app/images/<?= htmlspecialchars($menu['imageurl']); ?>" alt="<?= htmlspecialchars($menu['menuname']); ?>"></a></td>
            <td><?= htmlspecialchars($menu['menuname']); ?></td>
            <td><?= htmlspecialchars($menu['category']); ?></td>
            <td><?= htmlspecialchars($menu['ingredients']); ?></td>
            <td><?= htmlspecialchars($menu['mode']); ?></td>
            <td>Rs.<?= htmlspecialchars($menu['price']); ?></td>
            <td>
                <a href="update.php?id=<?= htmlspecialchars($menu['id']); ?>" class="two-button edit">Edit</a>
                <a href="menus.php?id=<?= htmlspecialchars($menu['id']); ?>" class="two-button delete" onclick="return confirm('Are you sure you want to delete this menu item?');">Delete</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
