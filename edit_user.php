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


if (isset($_GET['id'])) {
    $user_id = $_GET['id'];
    $sql = "SELECT id, name, email, room_no, ext, profile_picture FROM users WHERE id = $user_id";
    $result = mysqli_query($connect, $sql);
    $user = mysqli_fetch_assoc($result);
}


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $room_no = $_POST['room_no'];
    $ext = $_POST['ext'];

    $update_sql = "UPDATE users SET name='$name', email='$email', room_no='$room_no', ext='$ext' WHERE id=$id";
    if (mysqli_query($connect, $update_sql)) {
        echo "<script>alert('User updated successfully');</script>";
        header("Location: display_users.php");
    } else {
        echo "<script>alert('Error updating user: " . mysqli_error($connect) . "');</script>";
    }
}

mysqli_close($connect);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
     

        h1 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }

        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
            color: #555;
        }

        input[type="text"],
        input[type="email"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
            box-sizing: border-box;
        }

        input[type="text"]:focus,
        input[type="email"]:focus {
            border-color: #66afe9;
            outline: none;
            box-shadow: 0 0 8px rgba(102, 175, 233, 0.6);
        }

        button[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #28a745;
            color: white;
            border: none;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;
        }

        button[type="submit"]:hover {
            background-color: #218838;
        }

        button[type="submit"]:active {
            background-color: #1e7e34;
        }
    </style>
</head>
<body>
    <div>
    <h1>Edit User</h1>
    <form method="POST" action="">
        <input type="hidden" name="id" value="<?php echo $user['id']; ?>">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" value="<?php echo $user['name']; ?>" required><br>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="<?php echo $user['email']; ?>" required><br>
        <label for="room_no">Room No:</label>
        <input type="text" id="room_no" name="room_no" value="<?php echo $user['room_no']; ?>" required><br>
        <label for="ext">Ext:</label>
        <input type="text" id="ext" name="ext" value="<?php echo $user['ext']; ?>" required><br>
        <button type="submit">Update</button>
    </form>
    </div>
    
</body>
</html>