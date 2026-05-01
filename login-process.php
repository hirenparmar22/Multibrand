<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
session_start();
include 'config.php';


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = $_POST['password'];
    

    $query = "SELECT * FROM users WHERE email = '$email' AND status = 'active'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) == 1) {

        $user = mysqli_fetch_assoc($result);

        // if (password_verify($password, $user['password_hash'])) {
        // if (md5($password) == $users['password_hash']) {
	if (md5($password) == $user['password_hash']) {
        

            $_SESSION['user_id'] = $user['id'];
            $_SESSION['full_name'] = $user['full_name'];
            $_SESSION['username'] = $user['username'];
	    $_SESSION['role'] = $user['role'];
        $_SESSION['profile_image'] = $user['profile_image'];
           

  

	   if ($user['role'] == 'admin') {
           header("Location:  back-view/dashboard.php");
           exit;
           }

           if ($user['role'] == 'manager') {
           header("Location: dashboard.php");
           exit;
           }

          if ($user['role'] == 'user') {
          header("Location: font-view/index.php");
         exit;
         }

        } else {
            echo "Invalid password";
        }

    } else {
        echo "User not found or role mismatch";
    }
}
?>