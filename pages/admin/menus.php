<?php
// Database connection
require '../config.php';

$sql = mysqli_query($link, "SELECT * FROM menus");

if (!$sql) {
    die("Error in SQL query: " . mysqli_error($link));
}

// Fetch all rows from the query result
$menus = [];
while ($row = mysqli_fetch_assoc($sql)) {
    $menus[] = $row;
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
                <button class="two-button edit">Edit</button>
                <button class="two-button delete">Delete</button>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
