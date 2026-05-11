<?php
$conn = mysqli_connect("mysql", "root", "admin123", "multibrand_promotion");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
require_once __DIR__ . '/mail-config.php';
?>