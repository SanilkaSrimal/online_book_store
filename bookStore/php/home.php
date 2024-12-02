<?php
// Start session to access logged-in user's information
session_start();


// Mock user data (Replace this with session or database query)
if (!isset($_SESSION['user_name'])) {
    $_SESSION['user_name'] = 'Shanilka'; // Example: Assign user name for testing
}

// Get the user's name from the session
$user_name = isset($_SESSION['user_name']) ? $_SESSION['user_name'] : 'Sign In';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Online Bookstore</title>
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: Arial, sans-serif;
    }
    body {
      background-color: #f4f4f4;
      color: #333;
    }
    .header {
      background-color: #002776;
      color: white;
      padding: 15px;
      display: flex;
      justify-content: space-between;
      align-items: center;
    }
    .header-logo {
      display: flex;
      align-items: center;
    }
    .header-logo img {
      height: 50px;
      margin-right: 10px;
    }
    .header-logo span {
      font-size: 1.5em;
      font-weight: bold;
    }
    .icon a {
      color: white;
      text-decoration: none;
      font-size: 1em;
      margin-right: 20px;
    }
    .icon img {
      height: 40px;
      vertical-align: middle;
    }
    .top-nav {
      background-color: #0044cc;
      padding: 10px 0;
      text-align: center;
    }
    .top-nav a {
      color: white;
      text-decoration: none;
      margin: 0 15px;
      font-size: 1em;
    }
    .top-nav a:hover {
      text-decoration: underline;
    }
    .search-bar {
      display: flex;
      justify-content: center;
      margin: 20px 0;
    }
    .search-bar input[type="text"] {
      width: 400px;
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 5px 0 0 5px;
    }
    .search-bar button {
      padding: 10px 20px;
      background-color: #002776;
      color: white;
      border: none;
      border-radius: 0 5px 5px 0;
      cursor: pointer;
    }
    .search-bar button:hover {
      background-color: #0044cc;
    }
    .main-nav {
      background-color: #fff;
      padding: 10px;
      text-align: center;
      border-bottom: 1px solid #ddd;
    }
    .main-nav a {
      color: #002776;
      text-decoration: none;
      margin: 0 15px;
      font-size: 1em;
    }
    .main-nav a:hover {
      color: #0044cc;
    }
    .content {
      display: flex;
      margin: 20px;
    }
    .sidebar {
      width: 25%;
      padding: 20px;
      background-color: #fff;
      border-radius: 5px;
      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    }
    .sidebar a {
      display: block;
      color: #0044cc;
      text-decoration: none;
      font-size: 1em;
      margin-bottom: 10px;
    }
    .sidebar a:hover {
      text-decoration: underline;
    }
    .books-section {
      width: 75%;
      display: flex;
      flex-wrap: wrap;
      gap: 20px;
      padding: 20px;
      background-color: #fff;
      border-radius: 5px;
      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    }
    .book {
      width: 23%;
      text-align: center;
      background-color: #f9f9f9;
      padding: 15px;
      border: 1px solid #ddd;
      border-radius: 5px;
      box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
    }
    .book img {
      max-width: 100%;
      border-radius: 5px;
    }
    .book h3 {
      margin: 10px 0;
      font-size: 1em;
    }
    .book span {
      color: #e74c3c;
      font-weight: bold;
      font-size: 1.2em;
    }
  </style>
</head>
<body>

  <!-- Header -->
  <div class="header">
    <div class="header-logo">
      <img src="../img/logo.jpg" alt="Logo">
      <span>Online Bookstore</span>
    </div>
    <div class="icon">
      <a href="#">Hello, <?php echo htmlspecialchars($user_name); ?></a>
      <a href="viewDetails.php">
        <img src="../img/profile1.png" alt="Profile">
      </a>
    </div>
  </div>

  <!-- Top Navigation -->
  <div class="top-nav">
    <a href="#">Best Sellers</a>
    <a href="#">New Arrival</a>
    <a href="#">Events</a>
    <a href="#">EDUTV</a>
    <a href="#">Our Blog</a>
  </div>

  <!-- Search Bar -->
  <div class="search-bar">
    <input type="text" placeholder="Search Products by Title, Author, Publisher, ISBN...">
    <button>Search</button>
  </div>

  <!-- Main Navigation -->
  <div class="main-nav">
    <a href="#">Home</a>
    <a href="#">Offers</a>
    <a href="#">Ebooks</a>
    <a href="#">Book Genie</a>
    <a href="#">E-Vouchers</a>
    <a href="#">Study Abroad</a>
  </div>

  <!-- Main Content -->
  <div class="content">
    <!-- Sidebar -->
    <div class="sidebar">
      <a href="#">Best Sellers</a>
      <a href="#">New Arrival</a>
      <a href="#">Award Winners</a>
      <a href="#">On-Demand</a>
      <a href="#">Office Stationery</a>
      <a href="#">Bundle Offers</a>
      <a href="#">Gift Vouchers</a>
      <img src="../img/boy1.png">
    </div>

    <!-- Books Section -->
    <div class="books-section">
      <div class="book">
        <img src="../img/harry-potter-deathly-hallows-book-cover-i214933.jpg" alt="Book 1">
        <h3>Harry Potter</h3>
        <span>රු950.00</span>
      </div>
      <div class="book">
        <img src="../img/9781408855904.webp" alt="Book 2">
        <h3>Harry Potter 2</h3>
        <span>රු700.00</span>
      </div>
      <div class="book">
        <img src="../img/61g60+r7ZWL._AC_UF894,1000_QL80_.jpg" alt="Book 3">
        <h3>Tin Tin</h3>
        <span>රු1,200.00</span>
      </div>
      <div class="book">
        <img src="../img/61UEv2CUB7L._AC_UF1000,1000_QL80_.jpg" alt="Book 4">
        <h3>Zorro 1</h3>
        <span>රු450.00</span>
      </div>
      <div class="book">
        <img src="../img/hp2.jpg" alt="Book 5">
        <h3>Harry Potter</h3>
        <span>රු850.00</span>
      </div>
      <div class="book">
        <img src="../img/zorro.jpg" alt="Book 6">
        <h3>Zorro 2</h3>
        <span>රු1150.00</span>
      </div>
      <div class="book">
        <img src="../img/loadofthering.jpg" alt="Book 7">
        <h3>Load Of the ring</h3>
        <span>රු650.00</span>
      </div>
      <div class="book">
        <img src="../img/jackson.jpg" alt="Book 8">
        <h3>Percy Jackson</h3>
        <span>රු450.00</span>
      </div>
    </div>
  </div>

</body>
</html>

