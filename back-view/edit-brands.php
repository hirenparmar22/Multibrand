<?php
// session_start();
include __DIR__ . '/../config.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: ../login.php");
    exit;
}

if (!isset($_GET['id'])) {
    header("Location: dashboard.php?page=brands");
    exit;
}

$id = $_GET['id'];

$select = mysqli_query($conn, "SELECT * FROM brands WHERE id = '$id'");
$data = mysqli_fetch_assoc($select);

if (!$data) {
    header("Location: dashboard.php?page=brands");
    exit;
}

if (isset($_POST['update_brand'])) {

    $brand_name = mysqli_real_escape_string($conn, $_POST['brand_name']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);

    $old_logo = $data['brand_logo'];

    $new_logo = $_FILES['brand_logo']['name'];
    $tmp_name = $_FILES['brand_logo']['tmp_name'];

    if (!empty($new_logo)) {

        $logo_name = time() . "_" . $new_logo;

        move_uploaded_file($tmp_name, "../uploads/" . $logo_name);

        mysqli_query($conn, "UPDATE brands SET 
            brand_name='$brand_name',
            brand_logo='$logo_name',
            description='$description'
            WHERE id='$id'
        ");
    } else {

        mysqli_query($conn, "UPDATE brands SET 
            brand_name='$brand_name',
            brand_logo='$old_logo',
            description='$description'
            WHERE id='$id'
        ");
    }

    header("Location: dashboard.php?page=brands");
    exit;
}
?>

<?php include 'slidebar.php'; ?>

<div class="page-wrapper">

    <?php include 'header.php'; ?>

    <div class="main-content">

        <div class="form-card">

            <div class="text-center mb-4">
                <h2 class="fw-bold">Edit Brand</h2>
                <p class="text-muted">Update your brand details</p>
            </div>

            <form method="POST" enctype="multipart/form-data">

                <div class="mb-3">
                    <label class="form-label fw-semibold">Brand Name</label>
                    <input type="text" name="brand_name" class="form-control rounded-3"
                        value="<?php echo $data['brand_name']; ?>" required>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Current Logo</label><br>
                    <img src="../uploads/<?php echo $data['brand_logo']; ?>"
                        width="100"
                        height="100"
                        style="object-fit: cover; border-radius: 12px;">
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Change Logo</label>
                    <input type="file" name="brand_logo" class="form-control rounded-3">
                </div>

                <div class="mb-4">
                    <label class="form-label fw-semibold">Description</label>
                    <textarea name="description" class="form-control rounded-3" rows="4" required><?php echo $data['description']; ?></textarea>
                </div>

                <div class="d-flex gap-2">
                    <button type="submit" name="update_brand" class="btn btn-primary rounded-3">
                        Update Brand
                    </button>

                    <a href="dashboard.php?page=brands" class="btn btn-secondary rounded-3">
                        Cancel
                    </a>
                </div>

            </form>

        </div>

    </div>

    <?php include 'footer.php'; ?>

</div>

<style>
    .page-wrapper {
        margin-left: 310px;
        min-height: 100vh;
    }

    .main-content {
        padding: 30px;
    }

    .form-card {
        max-width: 700px;
        margin: auto;
        background: white;
        border-radius: 24px;
        padding: 30px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
    }

    @media (max-width: 991px) {
        .page-wrapper {
            margin-left: 0;
        }
    }
</style>