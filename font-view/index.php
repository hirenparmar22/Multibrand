<?php
session_start();
include '../config.php';

// DB mathi design lavu
$res = mysqli_query($conn, "SELECT * FROM settings WHERE id=1");
$data = mysqli_fetch_assoc($res);

$design = $data['active_design'];

// fallback (safety)
if(!$design){
    $design = 'design1';
}
?>

<!-- CSS -->
<link rel="stylesheet" href="../designs/<?php echo $design; ?>/style.css">

<!-- Header -->
<?php include "../designs/$design/header.php"; ?>

<?php include "../designs/$design/content.php"; ?>

<!-- Footer -->
<?php include "../designs/$design/footer.php"; ?>