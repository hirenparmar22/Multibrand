<?php
// session_start();
include __DIR__ . '/../config.php';

if (isset($_POST['add_brand'])) {

    $brand_name = mysqli_real_escape_string($conn, $_POST['brand_name']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);

    $brand_logo = $_FILES['brand_logo']['name'];
    $temp_name = $_FILES['brand_logo']['tmp_name'];

    if (!empty($brand_logo)) {

        $new_logo_name = time() . "_" . $brand_logo;

        move_uploaded_file($temp_name, "../uploads/" . $new_logo_name);

        $insert = "INSERT INTO brands (brand_name, description, brand_logo) 
                   VALUES ('$brand_name', '$description', '$new_logo_name')";

        if (mysqli_query($conn, $insert)) {
            header("Location: dashboard.php?page=brands");
            exit;
        } else {
            echo "Database Error";
        }
    } else {
        echo "Please Select Brand Logo";
    }
}
