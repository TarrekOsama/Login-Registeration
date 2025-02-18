<?php
session_start();



$servername = "localhost";
$username = "Tarrek";
$password_db = "Tarrek79@";
$dbname = "user_management";

$connect = mysqli_connect($servername, $username, $password_db, $dbname);
if (!$connect) {
    die("Connection failed: " . mysqli_connect_error());
}


if (isset($_GET['delete_id'])) {
    $delete_id = $_GET['delete_id'];
    $delete_sql = "DELETE FROM users WHERE id = $delete_id";
    if (mysqli_query($connect, $delete_sql)) {
        echo "<script>alert('User deleted successfully');</script>";
    } else {
        echo "<script>alert('Error deleting user: " . mysqli_error($connect) . "');</script>";
    }
}



$sql = "SELECT id, name, email, room_no, ext, profile_picture FROM users";
$result = mysqli_query($connect, $sql);

if (!$result) {
    die("Error fetching users: " . mysqli_error($connect));
}


$users = [];
while ($row = mysqli_fetch_assoc($result)) {
    $users[] = $row;
}


mysqli_close($connect);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Data</title>
    <style>
        /* General Styles */
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f9;
            color: #333;
            margin: 0;
            padding: 20px;
        }

        h1 {
            text-align: center;
            color: #2c3e50;
            margin-bottom: 20px;
        }

        /* Table Styles */
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 0 auto;
            background-color: #ffffff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            overflow: hidden;
        }

        th, td {
            padding: 12px 15px;
            text-align: left;
        }

        th {
            background-color: #3498db;
            color: #ffffff;
            font-weight: bold;
            text-transform: uppercase;
        }

        tr:nth-child(even) {
            background-color: #f8f9fa;
        }

        tr:hover {
            background-color: #f1f1f1;
        }

        td {
            border-bottom: 1px solid #ddd;
        }

        td img {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            object-fit: cover;
        }

        /* Responsive Table */
        @media (max-width: 768px) {
            table {
                display: block;
                overflow-x: auto;
            }
        }

        /* Action Buttons */
        .action-buttons {
            display: flex;
            gap: 10px;
        }

        .action-buttons button {
            padding: 5px 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            color: #fff;
        }

        .action-buttons .edit-btn {
            background-color: #28a745;
        }

        .action-buttons .delete-btn {
            background-color: #dc3545;
        }
    </style>
</head>
<body>
    <h1>User Data</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Room-No</th>
                <th>Ext</th>
                <th>Photo</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $user): ?>
                <tr>
                    <td><?php echo $user['id']; ?></td>
                    <td><?php echo $user['name']; ?></td>
                    <td><?php echo $user['email']; ?></td>
                    <td><?php echo $user['room_no']; ?></td>
                    <td><?php echo $user['ext']; ?></td>
                    <td><img src="<?php echo $user['profile_picture']; ?>" alt="Profile Picture"></td>
                    <td>
                        <div class="action-buttons">
                            <button class="edit-btn" onclick="editUser(<?php echo $user['id']; ?>)">Edit</button>
                            <button class="delete-btn" onclick="deleteUser(<?php echo $user['id']; ?>)">Delete</button>
                        </div>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <script>
        function editUser(userId) {
            window.location.href = `edit_user.php?id=${userId}`;
        }

        function deleteUser(userId) {
            if (confirm('Are you sure you want to delete this user?')) {
                window.location.href = `?delete_id=${userId}`;
            }
        }
    </script>
</body>
</html>