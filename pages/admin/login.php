<?php
session_start();

$user_login_err = $user_password_err = $login_err = "";

if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === TRUE) {
    echo "<script>window.location.href='./login.php';</script>";
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty(trim($_POST["user_login"]))) {
        $user_login_err = "Please enter your email.";
    } else {
        $user_login = trim($_POST["user_login"]);
    }

    if (empty(trim($_POST["user_password"]))) {
        $user_password_err = "Please enter your password.";
    } else {
        $user_password = trim($_POST["user_password"]);
    }

    $valid_email = "admin";
    $valid_password = "admin123";
    $id = 1; 
    $name = "Admin User"; 

    if (empty($user_login_err) && empty($user_password_err)) {
        if ($user_login === $valid_email && $user_password === $valid_password) {
            $_SESSION["id"] = $id;
            $_SESSION["name"] = $name;
            $_SESSION["email"] = $user_login;
            $_SESSION["loggedin"] = TRUE;

            echo "<script>window.location.href='./home.php';</script>";
            exit;
        } else {
            $login_err = "Invalid email or password.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>User login system</title>
  <link rel="stylesheet" href="../../styles/action.css">
  <link rel="shortcut icon" href="../../icons/restaurant.png" type="image/x-icon">
  <script defer src="./../js/script.js"></script>

</head>

<body>
    <form action="<?= htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" novalidate>
        <h2>Admin Login</h2>
          <?php
            if (!empty($login_err)) {
              echo "<div style='color:red;'>" . $login_err . "</div>";
            }
          ?>
        <div class="form-group email">
          <label for="email">Email Address</label>
          <input type="email" placeholder="Enter your email address" name="user_login" id="user_login">
          <small class="text-danger"><?= $user_login_err; ?></small>
        </div>

        <div class="form-group password">
          <label for="password">Password</label>
          <input type="password" placeholder="Enter your password" name="user_password" id="password">
          <small class="text-danger"><?= $user_password_err; ?></small>
        </div>

        <div class="form-group submit-btn">
          <input type="submit" name="submit" value="Sign In" style="background-color:rgb(37, 88, 159);">
        </div>
      </form>

</body>
</html>