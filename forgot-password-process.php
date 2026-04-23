<?php
include 'config.php';


if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $email = mysqli_real_escape_string($conn, $_POST['email']);

    $query = mysqli_query($conn, "SELECT * FROM users WHERE email = '$email'");

    if (mysqli_num_rows($query) > 0) {

        $token = md5(rand());
        $expiry = date('Y-m-d H:i:s', strtotime('+1 hour'));

        mysqli_query($conn, "UPDATE users SET reset_token='$token', reset_token_expiry='$expiry' WHERE email='$email'");

        $reset_link = "http://localhost:8000/reset-password.php?token=$token";

        // echo "Reset Link: <a href='$reset_link'>$reset_link</a>";

	$subject = "Reset Your Password";

	$body = "
	<h2>Password Reset Request</h2>
	<p>Click below link to reset your password:</p>
	<p><a href='$reset_link'>$reset_link</a></p>
	";

	sendMail($email, $subject, $body);

	echo "Password reset link sent to your email";

    } else {
        echo "Email not found";
    }
}
?>