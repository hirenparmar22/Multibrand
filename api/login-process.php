<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

session_start();
include '../config.php';

if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
    die("Invalid CSRF request");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // clean input
    $email = trim($_POST['email']);
    $password = $_POST['password'];

    // ── SECURE QUERY (Prepared Statement) ──
    $stmt = $conn->prepare("SELECT * FROM users WHERE email = ? AND status = 'active'");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result && $result->num_rows == 1) {

        $user = $result->fetch_assoc();

        // ── SECURE PASSWORD CHECK ──
        if (password_verify($password, $user['password_hash'])) {

            // session set
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['full_name'] = $user['full_name'];
            $_SESSION['user_name'] = $user['username'];
            $_SESSION['role'] = $user['role'];
            $_SESSION['profile_image'] = $user['profile_image'];

            // ── ROLE BASED REDIRECT ──
            $redirect = "/index.php";

            if ($user['role'] === 'admin') {
                $redirect = "/back-view/dashboard.php";
            } elseif ($user['role'] === 'manager') {
                $redirect = "/dashboard.php";
            } elseif ($user['role'] === 'user') {
                $redirect = "/index.php";
            }

            header("Location: $redirect");
            exit;

        } else {
            echo "Invalid password";
            exit;
        }

    } else {
        echo "User not found or inactive";
        exit;
    }
}