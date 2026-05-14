<?php
include '../config.php';

if (isset($_POST['design'])) {

    $allowed = ['design1','design2','design3','design4','design5','design6'];

    $design = $_POST['design'];

    if (in_array($design, $allowed)) {

        // 1. CREATE TABLE IF NOT EXISTS
        mysqli_query($conn, "
            CREATE TABLE IF NOT EXISTS settings (
                id INT PRIMARY KEY AUTO_INCREMENT,
                site_name VARCHAR(255),
                logo VARCHAR(255),
                active_design VARCHAR(50),
                created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
            )
        ");

        // 2. CHECK ROW
        $check = mysqli_query($conn, "SELECT * FROM settings WHERE id=1");

        if(mysqli_num_rows($check) > 0){

            // 3. UPDATE
            mysqli_query($conn, "
                UPDATE settings 
                SET active_design='$design'
                WHERE id=1
            ");

        } else {

            // 4. INSERT FIRST TIME
            mysqli_query($conn, "
                INSERT INTO settings (id, active_design)
                VALUES (1, '$design')
            ");
        }
    }
}

header("Location: dashboard.php");
exit();
?>