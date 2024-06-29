<?php
# Initialize session
session_start();

# Include connection
require_once "./config.php";

# Define variables and initialize with empty values
$name_err = $email_err = $password_err = $address_err = $mobile_err = "";
$name = $email = $password = $address = $mobile = "";

# Processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

  # Validate and sanitize email
  if (empty(trim($_POST["email"]))) {
    $email_err = "Please enter an email address.";
  } else {
    $email = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $email_err = "Please enter a valid email address.";
    } else {
      # Check if email is already registered
      $sql = "SELECT id FROM user WHERE email = ?";
      if ($stmt = mysqli_prepare($link, $sql)) {
        mysqli_stmt_bind_param($stmt, "s", $email);
        if (mysqli_stmt_execute($stmt)) {
          mysqli_stmt_store_result($stmt);
          if (mysqli_stmt_num_rows($stmt) == 1) {
            $email_err = "This email is already registered.";
          }
        } else {
          echo "<script>alert('Oops! Something went wrong. Please try again later.');</script>";
        }
        mysqli_stmt_close($stmt);
      }
    }
  }

  # Validate and sanitize name
  if (empty(trim($_POST["name"]))) {
    $name_err = "Please enter a name.";
  } else {
    $name = htmlspecialchars(trim($_POST["name"]));
  }

  # Validate and sanitize address
  if (empty(trim($_POST["address"]))) {
    $address_err = "Please enter an address.";
  } else {
    $address = htmlspecialchars(trim($_POST["address"]));
  }

  # Validate and sanitize mobile
  if (empty(trim($_POST["mobile"]))) {
    $mobile_err = "Please enter a mobile number.";
  } elseif (strlen(trim($_POST["mobile"])) != 10) {
    $mobile_err = "Please enter a valid mobile number.";
  } else {
    $mobile = htmlspecialchars(trim($_POST["mobile"]));
  }

  # Validate password
  if (empty(trim($_POST["password"]))) {
    $password_err = "Please enter a password.";
  } else {
    $password = trim($_POST["password"]);
    if (strlen($password) < 8) {
      $password_err = "Password must contain at least 8 characters.";
    }
  }

  # Check input errors before inserting data into the database
  if (empty($name_err) && empty($email_err) && empty($password_err) && empty($address_err) && empty($mobile_err)) {
    $sql = "INSERT INTO user (name, email, mobile, address, password) VALUES (?, ?, ?, ?, ?)";
    if ($stmt = mysqli_prepare($link, $sql)) {
      $param_password = password_hash($password, PASSWORD_DEFAULT);
      mysqli_stmt_bind_param($stmt, "sssss", $name, $email, $mobile, $address, $param_password);
      if (mysqli_stmt_execute($stmt)) {
        echo "<script>alert('Registration completed successfully. Login to continue.');</script>";
        echo "<script>window.location.href='./login.php';</script>";
        exit;
      } else {
        echo "<script>alert('Oops! Something went wrong. Please try again later.');</script>";
      }
      mysqli_stmt_close($stmt);
    }
  }

  # Close connection
  mysqli_close($link);
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>User login system</title>
  <link rel="stylesheet" href="../styles/action.css">
  <link rel="shortcut icon" href="../icons/restaurant.png" type="image/x-icon">
  <script src="../scripts/script.js"></script>
</head>

<body>
    <form action="<?= htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" novalidate>
      <h2>Register</h2>

      <div class="form-group fullname">
        <label for="fullname">Full Name</label>
        <input type="text" placeholder="Enter your full name" name="name" id="name" value="<?= $name; ?>">
        <small class="text-danger"><?= $name_err; ?></small>
      </div>

      <div class="form-group email">
        <label for="email">Email Address</label>
        <input type="email" placeholder="Enter your email address" name="email" id="email" value="<?= $email; ?>">
        <small class="text-danger"><?= $email_err; ?></small>
      </div>

      <div class="form-group email">
        <label for="mobile">Address</label>
        <input type="text" placeholder="Enter your address" name="address" id="address" value="<?= $address; ?>">
        <small class="text-danger"><?= $address_err; ?></small>
      </div>

      <div class="form-group email">
        <label for="email">Mobile</label>
        <input type="text" id="mobile" placeholder="Enter your mobile" name="mobile" value="<?= $mobile; ?>">
        <small class="text-danger"><?= $mobile_err; ?></small>
      </div>

      <div class="form-group password">
        <label for="password">Password</label>
        <input type="password" id="password" placeholder="Enter your password" name="password" value="<?= $password; ?>">
        <small class="text-danger"><?= $password_err; ?></small>
      </div>

      <div class="form-group submit-btn">
        <input type="submit" name="submit" value="Sign Up">
      </div>
      <div class="mt-2" style="text-align:center;">
          Already have an account<a href="./login.php" style="margin-left:5px;">Sign In</a>
      </div>

    </form>
</body>
</html>