<?php
require_once('../connection/db_conn.php'); // Database connection

$errors = [];

if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Validate inputs
    if (empty(trim($email)) || empty(trim($password))) {
        $errors[] = 'Email and Password are required.';
    } else {
        // Escape inputs to prevent SQL Injection
        $email = mysqli_real_escape_string($connection, $email);
        $password = mysqli_real_escape_string($connection, $password);

        // Check if email exists and password matches
        $query = "SELECT * FROM users WHERE email = '{$email}' LIMIT 1";
        $result_set = mysqli_query($connection, $query);

        if ($result_set && mysqli_num_rows($result_set) == 1) {
            $user = mysqli_fetch_assoc($result_set);

            if ($password === $user['password']) { // Assuming plain-text password for simplicity
                // Redirect to home if login is successful
                header('Location: home.php?login=success');
                exit();
            } else {
                $errors[] = 'Invalid email or password.';
            }
        } else {
            $errors[] = 'Invalid email or password.';
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Bookstore Login</title>
  <style>
    /* Basic reset */
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: Arial, sans-serif;
    }

    /* Background styling */
    body {
      display: flex;
      align-items: center;
      justify-content: center;
      min-height: 100vh;
      background-color: #e0f7ff;
    }

    /* Login container */
    .login-container {
      width: 100%;
      max-width: 400px;
      background-color: #ffffff;
      padding: 40px;
      border-radius: 8px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
      text-align: center;
    }

    /* Heading */
    .login-container h2 {
      color: #007bff;
      margin-bottom: 24px;
      font-size: 24px;
      font-weight: bold;
    }

    /* Input fields */
    .login-container input[type="text"],
    .login-container input[type="password"] {
      width: 100%;
      padding: 12px;
      margin: 8px 0 20px;
      border: 1px solid #007bff;
      border-radius: 4px;
      outline: none;
    }

    /* Button styling */
    .login-container button {
      width: 100%;
      padding: 12px;
      background-color: #007bff;
      color: #ffffff;
      border: none;
      border-radius: 4px;
      font-size: 16px;
      cursor: pointer;
    }

    /* Button hover effect */
    .login-container button:hover {
      background-color: #0056b3;
    }

    /* Links */
    .login-container .forgot-password {
      color: #007bff;
      text-decoration: none;
      font-size: 14px;
      display: block;
      margin-top: 20px;
    }

    .login-container .forgot-password:hover {
      text-decoration: underline;
    }

    /* Error message */
    .error-messages {
      color: red;
      font-size: 14px;
      margin-bottom: 15px;
    }
  </style>
</head>
<body>

  <div class="login-container">
    <h2>Bookstore Login</h2>

    <!-- Error messages -->
    <?php if (!empty($errors)): ?>
      <div class="error-messages">
        <ul>
          <?php foreach ($errors as $error): ?>
            <li><?php echo $error; ?></li>
          <?php endforeach; ?>
        </ul>
      </div>
    <?php endif; ?>

    <form action="./index.php" method="post">
      <input type="text" id="email" name="email" placeholder="Email" value="<?php echo isset($email) ? htmlspecialchars($email) : ''; ?>" required>
      <input type="password" id="pw" name="password" placeholder="Password" required>
      <button type="submit" name="submit">Login</button>
      <a href="./signUp.php" class="forgot-password">Sign Up Here</a>
    </form>
  </div>

</body>
</html>
