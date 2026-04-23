<?php
session_start();
include '../config.php';
if (!isset($_SESSION['user_id'])) {
    header("Location: ../login.php");
    exit;
}

if(isset($_POST['update_menu'])){

    $id = mysqli_real_escape_string($conn, $_POST['id']);
    $menu_name = mysqli_real_escape_string($conn, $_POST['menu_name']);
    $menu_link = mysqli_real_escape_string($conn, $_POST['menu_link']);
    $menu_icon = mysqli_real_escape_string($conn, $_POST['menu_icon']);

    if(!empty($menu_name) && !empty($menu_link) && !empty($menu_icon)){

        $checkQuery = mysqli_query($conn, "SELECT * FROM sidebar_menu 
                                          WHERE menu_link = '$menu_link' 
                                          AND id != '$id'");

        if(mysqli_num_rows($checkQuery) > 0){

            echo "
            <script>
                alert('Menu Link Already Exists');
                window.location.href='edit-menu.php?id=$id';
            </script>
            ";

        } else {

            $updateQuery = "UPDATE sidebar_menu 
                            SET 
                                menu_name = '$menu_name',
                                menu_link = '$menu_link',
                                menu_icon = '$menu_icon'
                            WHERE id = '$id'";

            if(mysqli_query($conn, $updateQuery)){

                echo "
                <script>
                    alert('Menu Updated Successfully'); 
                    window.location.href='dashboard.php?page=manage-menu';
                </script>
                ";

            } else {

                echo "
                <script>
                    alert('Database Error');
                    window.location.href='edit-menu.php?id=$id';
                </script>
                ";
            }
        }

    } else {

        echo "
        <script>
            alert('Please Fill All Fields');
            window.location.href='edit-menu.php?id=$id';
        </script>
        ";
    }
}
?>