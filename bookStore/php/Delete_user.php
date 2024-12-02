<?php
require_once('../connection/db_conn.php');

// Check if User_ID is passed in the URL
if (isset($_GET['User_ID'])) {
    $user_id = $_GET['User_ID'];

    // Fetch user details for the given User_ID
    $query = "DELETE FROM users WHERE id = {$user_id}";
    $result = mysqli_query($connection, $query);

   
} else {
    echo "Invalid User ID.";
    exit();
}


    if (mysqli_query($connection, $query)) {
        // Redirect to the dashboard after successful update
        header("Location: viewDetails.php");
        exit();
    } else {
        echo "Failed to update the user.";
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Edit User</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f9f9f9;
        }
        .form-container {
            max-width: 400px;
            margin: 50px auto;
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .form-container h1 {
            text-align: center;
            margin-bottom: 20px;
        }
        .form-container input[type="text"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }
        .form-container button {
            width: 100%;
            padding: 10px;
            background: #007bff;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        .form-container button:hover {
            background: #0056b3;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h1>Edit User</h1>
        <form action="edit.php?User_ID=<?php echo $user_id; ?>" method="post">
            <label for="f_name">Name:</label>
            <input type="text" name="f_name" id="f_name" value="<?php echo $current_name; ?>" required>
            <button type="submit" name="submit">Update</button>
        </form>
    </div>
</body>
</html>