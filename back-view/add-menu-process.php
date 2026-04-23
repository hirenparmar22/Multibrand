<?php
session_start();
include '../config.php';
if (!isset($_SESSION['user_id'])) {
    header("Location: ../login.php");
    exit;
}

if(isset($_POST['add_menu'])){

    $menu_name = mysqli_real_escape_string($conn, $_POST['menu_name']);
    $menu_link = mysqli_real_escape_string($conn, $_POST['menu_link']);
    $menu_icon = mysqli_real_escape_string($conn, $_POST['menu_icon']);

    if(!empty($menu_name) && !empty($menu_link) && !empty($menu_icon)){

        $checkQuery = mysqli_query($conn, "SELECT * FROM sidebar_menu WHERE menu_link = '$menu_link'");

        if(mysqli_num_rows($checkQuery) > 0){

            echo "
            <script>
                alert('Menu Link Already Exists');
                window.location.href='add-menu.php';
            </script>
            ";

        } else {

            $insertQuery = "INSERT INTO sidebar_menu (menu_name, menu_link, menu_icon)
                            VALUES ('$menu_name', '$menu_link', '$menu_icon')";

            if(mysqli_query($conn, $insertQuery)){

                echo "
                <script>
                    alert('Menu Added Successfully');
                    window.location.href='manage-menu.php';
                </script>
                ";

            } else {

                echo "
                <script>
                    alert('Database Error');
                    window.location.href='add-menu.php';
                </script>
                ";
            }
        }

    } else {

        echo "
        <script>
            alert('Please Fill All Fields');
            window.location.href='add-menu.php';
        </script>
        ";
    }
}
?>