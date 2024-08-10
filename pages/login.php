<?php
# Initialize session
session_start();

# Check if user is already logged in, If yes then redirect him to index page
if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] == TRUE) {
  echo "<script>" . "window.location.href='./menu.php'" . "</script>";
  exit;
}

# Include connection
require_once "./config.php";

# Define variables and initialize with empty values
$user_login_err = $user_password_err = $login_err = "";
$user_login = $user_password = "";

# Processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty(trim($_POST["user_login"]))) {
    $user_login_err = "Please enter your email";
  } else {
    $user_login = trim($_POST["user_login"]);
  }

  if (empty(trim($_POST["user_password"]))) {
    $user_password_err = "Please enter your password.";
  } else {
    $user_password = trim($_POST["user_password"]);
  }

  # Validate credentials 
  if (empty($user_login_err) && empty($user_password_err)) {
    # Prepare a select statement
    $sql = "SELECT id, name, email, password FROM user WHERE email = ?";

    if ($stmt = mysqli_prepare($link, $sql)) {
      # Bind variables to the statement as parameters
      mysqli_stmt_bind_param($stmt, "s", $param_user_login);

      # Set parameters
      $param_user_login = $user_login;

      # Execute the statement
      if (mysqli_stmt_execute($stmt)) {
        # Store result
        mysqli_stmt_store_result($stmt);

        # Check if user exists, If yes then verify password
        if (mysqli_stmt_num_rows($stmt) == 1) {
          # Bind values in result to variables
          mysqli_stmt_bind_result($stmt, $id, $name, $email, $hashed_password);

          if (mysqli_stmt_fetch($stmt)) {
            # Check if password is correct
            if (password_verify($user_password, $hashed_password)) {

              # Store data in session variables
              $_SESSION["id"] = $id;
              $_SESSION["name"] = $name;
              $_SESSION["email"] = $email;
              $_SESSION["loggedin"] = TRUE;

              # Redirect user to index page
              echo "<script>" . "window.location.href='./menu.php'" . "</script>";
              exit;
            } else {
              # If password is incorrect show an error message
              $login_err = "The email or password you entered is incorrect.";
            }
          }
        } else {
          # If user doesn't exists show an error message
          $login_err = "Invalid username or password.";
        }
      } else {
        echo "<script>" . "alert('Oops! Something went wrong. Please try again later.');" . "</script>";
        echo "<script>" . "window.location.href='./login.php'" . "</script>";
        exit;
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
  <script defer src="./js/script.js"></script>
</head>

<body>
    <div class="container">
        <div class="login-box">
          <div class="boxsize">
            
          </div>
        </div>
    </div>
    <form action="<?= htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" novalidate>
        <h2>Login</h2>
          <?php
            if (!empty($login_err)) {
              echo "<div style='color:red;'>" . $login_err . "</div>";
            }
          ?>
        <div class="form-group email">
          <label for="email">Email Address</label>
          <input type="email" placeholder="Enter your email address" name="user_login" id="user_login" value="<?= $user_login; ?>">
          <small class="text-danger"><?= $user_login_err; ?></small>
        </div>

        <div class="form-group password">
          <label for="password">Password</label>
          <input type="password" placeholder="Enter your password" name="user_password" id="password">
          <small class="text-danger"><?= $user_password_err; ?></small>
        </div>

        <div class="form-group submit-btn">
          <input type="submit" name="submit" value="Sign In">
        </div>
        <div class="mt-2" style="text-align:center;">
          Don't have an account<a href="./register.php" style="margin-left:5px;">Sign Up</a>
        </div>

      </form>

</body>
</html>