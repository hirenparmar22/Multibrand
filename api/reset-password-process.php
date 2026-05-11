<?php
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $token = $_POST['token'];
    $new_password = $_POST['new_password'];
    $confirm_password = $_POST['confirm_password'];

    if ($new_password != $confirm_password) {
        die('Passwords do not match');
    }

    $query = mysqli_query($conn, "SELECT * FROM users WHERE reset_token='$token' AND reset_token_expiry > NOW()");

    if (mysqli_num_rows($query) == 1) {

        // $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);
	$hashed_password = md5($new_password);

        mysqli_query($conn, "UPDATE users SET password_hash='$hashed_password', reset_token=NULL, reset_token_expiry=NULL WHERE reset_token='$token'");

        echo "Password reset successful. <a href='login.php'>Login Here</a>";

    } else {
        echo "Invalid or expired token";
    }
}
?>