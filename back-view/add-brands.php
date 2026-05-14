<?php
// session_start();
include '../config.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: ../login.php");
    exit;
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Add Brand</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

    <div class="container py-5 ">

        <div class="card shadow border-0 rounded-4 d-flex justify-content-center">
            <div class="card-header bg-dark text-white rounded-top-4">
                <h3 class="mb-0">Add Brand</h3>
            </div>

            <div class="card-body p-4">

                <form action="add-brands-process.php" method="POST" enctype="multipart/form-data">

                    <div class="mb-3">
                        <label class="form-label">Brand Name</label>
                        <input type="text" name="brand_name" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Brand Description</label>
                        <textarea name="description" class="form-control" rows="4" required></textarea>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Brand Logo</label>
                        <input type="file" name="brand_logo" class="form-control" required>
                    </div>

                    <button type="submit" name="add_brand" class="btn btn-primary">
                        Add Brand
                    </button>

                    <a href="brands.php" class="btn btn-secondary">
                        Back
                    </a>

                </form>

            </div>
        </div>

    </div>

</body>

</html>