<?php
include '../config.php';

$id = $_GET['id'];

$select = mysqli_query($conn, "SELECT * FROM brands WHERE id = '$id'");
$data = mysqli_fetch_assoc($select);

$logo = $data['brand_logo'];

// Delete image from uploads folder
if(file_exists("../uploads/" . $logo)){
    unlink("../uploads/" . $logo);
}

// Delete brand from database
mysqli_query($conn, "DELETE FROM brands WHERE id = '$id'");

header("Location: dashboard.php?page=brands");
exit;
?>
<?php
include '../config.php';

if(isset($_GET['id'])){

    $id = $_GET['id'];

    $select = mysqli_query($conn, "SELECT * FROM brands WHERE id = '$id'");
    $brand = mysqli_fetch_assoc($select);

    if($brand){

        $logoPath = "../uploads/" . $brand['brand_logo'];

        if(file_exists($logoPath)){
            unlink($logoPath);
        }

        mysqli_query($conn, "DELETE FROM brands WHERE id = '$id'");
    }

    header("Location: dashboard.php?page=brands");
    exit;
}
?>