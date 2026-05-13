<?php
// session_start();
include '../config.php';

// DB mathi design lavu
$res = mysqli_query($conn, "
    SELECT active_design 
    FROM settings 
    WHERE id=1
");

$data = mysqli_fetch_assoc($res);

// default design
$design = 'design1';

// jo DB ma value hoy to use karo
if ($data && !empty($data['active_design'])) {
    $design = $data['active_design'];
}
?>

<!-- CSS -->
<link rel="stylesheet" href="../designs/<?php echo $design; ?>/style.css">

<!-- Header -->

 <?php include "../includes/header.php"; ?>

<!-- Content -->
<?php include "../designs/$design/content.php"; ?>

<!-- Footer -->
<?php include "../includes/footer.php"; ?>