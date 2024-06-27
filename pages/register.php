<?php
// session_start();

// # If user is not logged in then redirect him to login page
// if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== TRUE) {
//   echo "<script>" . "window.location.href='./login.php';" . "</script>";
//   exit;
// }
# Include connection
require_once "./config.php";

# Define variables and initialize with empty values
$name_err = $email_err = $password_err = $address_err = $mobile_err = "";
$name = $email = $password = $address = $mobile = "";

# Processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  # Validate email 
  if (empty(trim($_POST["email"]))) {
    $email_err = "Please enter an email address";
  } else {
    $email = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $email_err = "Please enter a valid email address.";
    } else {
      # Prepare a select statement
      $sql = "SELECT id FROM user WHERE email = ?";

      if ($stmt = mysqli_prepare($link, $sql)) {
        # Bind variables to the statement as parameters
        mysqli_stmt_bind_param($stmt, "s", $param_email);

        # Set parameters
        $param_email = $email;

        # Execute the prepared statement 
        if (mysqli_stmt_execute($stmt)) {
          # Store result
          mysqli_stmt_store_result($stmt);

          # Check if email is already registered
          if (mysqli_stmt_num_rows($stmt) == 1) {
            $email_err = "This email is already registered.";
          }
        } else {
          echo "<script>" . "alert('Oops! Something went wrong. Please try again later.');" . "</script>";
        }

        # Close statement
        mysqli_stmt_close($stmt);
      }
    }
  }

  # Validate address
  if (empty(trim($_POST["address"]))) {
    $address_err = "Please enter a Address.";
  }

  # Validate mobile
  if (empty(trim($_POST["mobile"]))) {
    $mobile_err = "Please enter a Mobile Number.";
  }elseif(strlen(trim($_POST["mobile"])) != 10){
    $mobile_err = "Please enter a valid Mobile Number.";
  }

  # Validate password
  if (empty(trim($_POST["password"]))) {
    $password_err = "Please enter a password.";
  } else {
    $password = trim($_POST["password"]);
    if (strlen($password) < 8) {
      $password_err = "Password must contain at least 8 or more characters.";
    }
  }

  # Check input errors before inserting data into database
if (empty($name_err) && empty($email_err) && empty($password_err) && empty($address_err) && empty($mobile_err)) {
  # Prepare an insert statement
  $sql = "INSERT INTO user (name, email, mobile, address, password) VALUES (?, ?, ?, ?, ?)";

  if ($stmt = mysqli_prepare($link, $sql)) {
      # Bind variables to the prepared statement as parameters
      mysqli_stmt_bind_param($stmt, "sssss", $param_name, $param_email, $param_mobile, $param_address, $param_password);

      # Set parameters
      $param_name = $name;
      $param_email = $email;
      $param_mobile = $mobile;
      $param_address = $address;
      $param_password = password_hash($password, PASSWORD_DEFAULT);

      # Execute the prepared statement
      if (mysqli_stmt_execute($stmt)) {
          echo "<script>alert('Registration completed successfully. Login to continue.');</script>";
          echo "<script>window.location.href='./login.php';</script>";
          exit;
      } else {
          echo "<script>alert('Oops! Something went wrong. Please try again later.');</script>";
      }

      # Close statement
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

    </form>
</body>
</html>