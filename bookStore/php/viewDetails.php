<?php  
    require_once('../connection/db_conn.php');


    $user_list = '';


$query = "SELECT * FROM users ";
$inq= mysqli_query($connection, $query);

if ($inq) {
    
    while ($user = mysqli_fetch_assoc($inq)) {
        
        $user_list .= "<tr>";
        $user_list .= "<td>{$user['id']}</td>";
        $user_list .= "<td>{$user['f_name']}</td>";
        $user_list .= "<td>{$user['email']}</td>";
       $user_list .= "<td> <a href=\"edit.php?User_ID={$user['id']}\">Edit</a></td>";
       $user_list .= "<td> <a href=\"Delete_user.php?User_ID={$user['id']}\">Delete</a></td>";
        $user_list .= "</tr>";
    }
} else {
    echo "Database query failed."; 
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f9f9f9;
        }

        h1 {
            text-align: center;
            margin-bottom: 30px;
            color: #333;
            font-size: 28px;
            font-weight: bold;
        }

        .masterlist {
            width: 100%;
            border-collapse: collapse;
            background-color: #fff;
            margin: 0 auto;
            text-align: left;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .masterlist th, .masterlist td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: center;
            font-size: 14px;
        }

        .masterlist th {
            background-color: #007bff;
            color: white;
            font-weight: bold;
        }

        .masterlist tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        .masterlist tr:hover {
            background-color: #f1f1f1;
        }

        a {
            color: #007bff;
            text-decoration: none;
            font-weight: bold;
        }

        a:hover {
            text-decoration: underline;
        }

        .actions {
            display: flex;
            justify-content: space-around;
            gap: 10px;
        }

        .actions a {
            padding: 6px 12px;
            background-color: #007bff;
            color: white;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        .actions a:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <main>
        <h1>User Dashboard</h1>
        <table class="masterlist">
            <thead>
                <tr>
                    <th>UserID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                <!-- Dynamic user list -->
                <?php echo $user_list; ?>
            </tbody>
        </table>
    </main>
</body>
</html>

