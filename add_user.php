<?php
session_start();

$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $name = trim($_POST['name']);
    if (empty($name)) {
        $errors['name'] = "Name is required.";
    }


    $email = $_POST['email'];
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = "Invalid email format.";
    }


    $password = $_POST['password'];
    $password_pattern = "/^[a-z0-9_]{8}$/";
    if (!preg_match($password_pattern, $password)) {
        $errors['password'] = "Password must be 8 characters long, contain only lowercase letters, numbers, and underscores.";
    }


    if ($password !== $_POST['confirm_password']) {
        $errors['confirm_password'] = "Passwords do not match.";
    }


    $hashed_password = md5($password);


    $ext = trim($_POST['ext']);
    if (empty($ext)) {
        $errors['ext'] = "Extension is required.";
    }


    if (isset($_FILES['profile_picture'])) {
        $file_name = $_FILES['profile_picture']['name'];
        $file_tmp = $_FILES['profile_picture']['tmp_name'];
        $file_type = $_FILES['profile_picture']['type'];


        $allowed_types = ['image/jpeg', 'image/png', 'image/gif'];
        if (!in_array($file_type, $allowed_types)) {
            $errors['profile_picture'] = "Only JPEG, PNG, and GIF images are allowed.";
        }


        $upload_dir = "uploads/";
        if (!is_dir($upload_dir)) {
            mkdir($upload_dir, 0755, true);
        }
        $file_path = $upload_dir . basename($file_name);
        move_uploaded_file($file_tmp, $file_path);
    } else {
        $errors['profile_picture'] = "Profile picture is required.";
    }


    if (empty($errors)) {

        $servername = "localhost";
        $username = "Tarrek";
        $password = "Tarrek79@";
        $dbname = "user_management";

        $connect = mysqli_connect($servername, $username, $password, $dbname);
        if (!$connect) {
            die("Connection failed: " . mysqli_connect_error());
        }


        $sql = "INSERT INTO users (name, email, password, room_no, ext, profile_picture) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = mysqli_prepare($connect, $sql);
        mysqli_stmt_bind_param($stmt, "ssssss", $name, $email, $hashed_password, $_POST['room_no'], $ext, $file_path);

        if (mysqli_stmt_execute($stmt)) {
            header("Location: login.php");
            exit();
        } else {
            echo "<script>alert('Error: " . mysqli_error($connect) . "');</script>";
        }


        mysqli_stmt_close($stmt);
        mysqli_close($connect);
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add User</title>
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

        .form-container {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 25vw;
        }

        .form-container h2 {
            text-align: center;
            margin-bottom: 20px;
            font-size: 24px;
            color: #333;
        }

        .form-container label {
            display: block;
            margin-bottom: 5px;
            color: #555;
        }

        .form-container input[type="text"],
        .form-container input[type="email"],
        .form-container input[type="password"],
        .form-container select,
        .form-container input[type="file"] {
            width: 95%;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .form-container input[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #28a745;
            border: none;
            border-radius: 4px;
            color: #fff;
            font-size: 16px;
            cursor: pointer;
        }

        .form-container input[type="submit"]:hover {
            background-color: #218838;
        }

        .error {
            color: red;
            font-size: 14px;
            margin-top: -8px;
            margin-bottom: 10px;
        }
    </style>
</head>

<body>
    <div class="form-container">
        <h2>Add User</h2>
        <form action="" method="POST" enctype="multipart/form-data">

            <label for="name">Name:</label>
            <input type="text" id="name" name="name">
            <?php if (isset($errors['name'])): ?>
                <div class="error"><?php echo $errors['name']; ?></div>
            <?php endif; ?>


            <label for="email">Email:</label>
            <input type="email" id="email" name="email">
            <?php if (isset($errors['email'])): ?>
                <div class="error"><?php echo $errors['email']; ?></div>
            <?php endif; ?>


            <label for="password">Password:</label>
            <input type="password" id="password" name="password">
            <?php if (isset($errors['password'])): ?>
                <div class="error"><?php echo $errors['password']; ?></div>
            <?php endif; ?>


            <label for="confirm_password">Confirm Password:</label>
            <input type="password" id="confirm_password" name="confirm_password">
            <?php if (isset($errors['confirm_password'])): ?>
                <div class="error"><?php echo $errors['confirm_password']; ?></div>
            <?php endif; ?>


            <label for="room_no">Room No.:</label>
            <select id="room_no" name="room_no">
                <option value="Application1" selected>Application1</option>
                <option value="Application2">Application2</option>
                <option value="Cloud">Cloud</option>
            </select>


            <label for="ext">Ext.:</label>
            <input type="text" id="ext" name="ext">
            <?php if (isset($errors['ext'])): ?>
                <div class="error"><?php echo $errors['ext']; ?></div>
            <?php endif; ?>


            <label for="profile_picture">Profile Picture:</label>
            <input type="file" id="profile_picture" name="profile_picture" accept="image/*">
            <?php if (isset($errors['profile_picture'])): ?>
                <div class="error"><?php echo $errors['profile_picture']; ?></div>
            <?php endif; ?>


            <input type="submit" value="Add User">
        </form>
    </div>
</body>

</html>