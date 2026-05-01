<?php
include '../config.php';

if (isset($_POST['design'])) {

    $design = $_POST['design'];

    // DB ma update
    mysqli_query($conn, "UPDATE settings SET active_design='$design' WHERE id=1");
}

header("Location: dashboard.php");
exit();
?>