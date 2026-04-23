<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $full_name = mysqli_real_escape_string($conn, $_POST['full_name']);
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    $role = $_POST['role'];

    // Profile Image Upload
    $profile_image = "";

    if (isset($_FILES['profile_image']) && $_FILES['profile_image']['name'] != "") {

        $profile_image = time() . "_" . $_FILES['profile_image']['name'];

        $tmp_name = $_FILES['profile_image']['tmp_name'];

        move_uploaded_file($tmp_name, "uploads/" . $profile_image);
    }

    if ($password != $confirm_password) {
        die("Passwords do not match");
    }

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $checkEmail = mysqli_query($conn, "SELECT * FROM users WHERE email = '$email'");

    if (!$checkEmail) {
        die(mysqli_error($conn));
    }

    if (mysqli_num_rows($checkEmail) > 0) {
        die("Email already exists");
    }

    $hashed_password = md5($password);

    $query = "INSERT INTO users (
        full_name,
        username,
        email,
        password_hash,
        role,
        status,
        profile_image
    ) VALUES (
        '$full_name',
        '$username',
        '$email',
        '$hashed_password',
        '$role',
        'active',
        '$profile_image'
    )";

    if (mysqli_query($conn, $query)) {

        $subject = "Welcome to Brand Promotion";

        $body = "
        <h2>Welcome $full_name</h2>
        <p>Your account has been created successfully.</p>
        <p>Your role is: $role</p>
        ";

        sendMail($email, $subject, $body);

        header("Location: login.php");
        exit;

    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>