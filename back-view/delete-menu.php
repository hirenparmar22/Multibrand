<?php
// session_start();
include '../config.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: ../login.php");
    exit;
}

if (isset($_GET['id'])) {

    $id = mysqli_real_escape_string($conn, $_GET['id']);

    $deleteQuery = "DELETE FROM sidebar_menu WHERE id = '$id'";

    if (mysqli_query($conn, $deleteQuery)) {

        echo "
        <script>
            alert('Menu Deleted Successfully');
            window.location.href='manage-menu.php';
        </script>
        ";
    } else {

        echo "
        <script>
            alert('Database Error');
            window.location.href='manage-menu.php';
        </script>
        ";
    }
} else {

    header("Location: manage-menu.php");
    exit;
}
