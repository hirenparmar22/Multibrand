<?php
include 'config.php';

if (!isset($_GET['token'])) {
    die('Invalid token');
}

$token = $_GET['token'];
?>

<!DOCTYPE html>
<html>
<head>
    <title>Reset Password</title>
</head>
<body>
    <h2>Reset Password</h2>

    <form action="reset-password-process.php" method="POST">
        <input type="hidden" name="token" value="<?php echo $token; ?>">

        <input type="password" name="new_password" placeholder="New Password" required>
        <input type="password" name="confirm_password" placeholder="Confirm Password" required>

        <button type="submit">Reset Password</button>
    </form>
</body>
</html>