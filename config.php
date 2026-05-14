<?php

if (session_status() === PHP_SESSION_NONE) {
    session_set_cookie_params([
        'lifetime' => 0,
        'path' => '/',
        'secure' => isset($_SERVER['HTTPS']),
        'httponly' => true,
        'samesite' => 'Lax'
    ]);

    session_start();
}

if (!isset($conn)) {
    $conn = mysqli_connect("mysql", "root", "admin123", "multibrand_promotion");

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
}
