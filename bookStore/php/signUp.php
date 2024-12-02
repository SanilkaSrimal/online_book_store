<?php 
require_once ('../connection/db_conn.php');
require_once ('function.php');

$errors = [];
$name = '';
$email = '';
$password = '';
$cpassword = '';

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];

    $req_fields = ['name', 'email', 'password', 'cpassword'];

    foreach ($req_fields as $field) {
        if (empty(trim($_POST[$field]))) {
            $errors[] = ucfirst($field) . ' is required.';
        }
    }
    
    $max_len_fields = ['name' => 70, 'email' => 50, 'password' => 20, 'cpassword' => 20];

    foreach ($max_len_fields as $field => $max_len) {
        if (strlen(trim($_POST[$field])) > $max_len) {
            $errors[] = ucfirst($field) . ' must be less than ' . $max_len . ' characters.';
        }
    }

    $email = mysqli_real_escape_string($connection, $_POST['email']);
    $query = "SELECT * FROM users WHERE email ='{$email}' LIMIT 1";
    $result_set = mysqli_query($connection, $query);
    
    if ($result_set) {
        if (mysqli_num_rows($result_set) == 1) {
            $errors[] = 'Email address already exists.';
        }
    }

    if (empty($errors)) {
        $name = mysqli_real_escape_string($connection, $_POST['name']);
        $email = mysqli_real_escape_string($connection, $_POST['email']);
        $password = mysqli_real_escape_string($connection, $_POST['password']);

        $query = "INSERT INTO users (f_name, email, password) VALUES ('{$name}', '{$email}', '{$password}')";
        $result = mysqli_query($connection, $query);

        if ($result) {
            header('Location: home.php?user_added=true');
            exit();
        } else {
            $errors[] = 'Failed to add a new record.';
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Bookstore Signup</title>
  <style>
    /* CSS styling remains the same */
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: Arial, sans-serif;
    }
    body {
      display: flex;
      align-items: center;
      justify-content: center;
      min-height: 100vh;
      background-color: #e0f7ff;
    }
    .signup-container {
      width: 100%;
      max-width: 400px;
      background-color: #ffffff;
      padding: 40px;
      border-radius: 8px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
      text-align: center;
    }
    .signup-container h2 {
      color: #007bff;
      margin-bottom: 24px;
      font-size: 24px;
      font-weight: bold;
    }
    .signup-container input[type="text"],
    .signup-container input[type="email"],
    .signup-container input[type="password"] {
      width: 100%;
      padding: 12px;
      margin: 8px 0 20px;
      border: 1px solid #007bff;
      border-radius: 4px;
      outline: none;
    }
    .signup-container button {
      width: 100%;
      padding: 12px;
      background-color: #007bff;
      color: #ffffff;
      border: none;
      border-radius: 4px;
      font-size: 16px;
      cursor: pointer;
      margin-top: 8px;
    }
    .signup-container button:hover {
      background-color: #0056b3;
    }
    .signup-container .login-link {
      color: #007bff;
      text-decoration: none;
      font-size: 14px;
      display: block;
      margin-top: 20px;
    }
    .signup-container .login-link:hover {
      text-decoration: underline;
    }
    .error-messages {
      color: red;
      font-size: 14px;
      text-align: left;
      margin-bottom: 10px;
    }
    
  </style>
</head>
<body>

<div class="signup-container">
  <h2>Bookstore Signup</h2>

  <?php if (!empty($errors)): ?>
    <div class="error-messages">
      <ul>
        <?php foreach ($errors as $error): ?>
          <li><?php echo $error; ?></li>
        <?php endforeach; ?>
      </ul>
    </div>
  <?php endif; ?>

  <form action="./signUp.php" method="POST" id="js_form">
    <input type="text" name="name" placeholder="Full Name" value="<?php echo htmlspecialchars($name); ?>" required>
    <input type="email" name="email" placeholder="Email" value="<?php echo htmlspecialchars($email); ?>" required>
    <input type="password" name="password" placeholder="Password" required>
    <input type="password" name="cpassword" placeholder="Confirm Password" required>
    <button type="submit" name="submit">Sign Up</button>
  </form>

  <!-- Link to login page -->
  <a href="./index.php" class="login-link">Already have an account? Login</a>
</div>

</body>
</html>
