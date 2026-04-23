<?php
session_start();
include '../config.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: ../login.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Menu</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body{
            background: whitesmoke;
        }

        .form-card{
            max-width: 700px;
            margin: auto;
            background: white;
            border-radius: 24px;
            padding: 30px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.08);
        }

        .preview-icon{
            width: 70px;
            height: 70px;
            border-radius: 20px;
            background: whitesmoke;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 28px;
            margin: auto;
            border: 1px solid #ddd;
        }
    </style>
</head>
<body>

<div class="container py-5">

    <div class="form-card">

        <div class="text-center mb-4">
            <h2 class="fw-bold">Add Sidebar Menu</h2>
            <p class="text-muted">Create a new menu item for the admin sidebar</p>
        </div>

        <form action="add-menu-process.php" method="POST">

            <div class="mb-3">
                <label class="form-label fw-semibold">Menu Name</label>
                <input type="text" name="menu_name" class="form-control rounded-3" placeholder="Example: Analytics" required>
            </div>

            <div class="mb-3">
                <label class="form-label fw-semibold">Menu Link</label>
                <input type="text" name="menu_link" class="form-control rounded-3" placeholder="Example: analytics.php" required>
            </div>

            <div class="mb-3">
                <label class="form-label fw-semibold">Menu Icon</label>
                <input type="text" name="menu_icon" class="form-control rounded-3" placeholder="Example: fas fa-chart-pie" required>
                <small class="text-muted">
                    Use Font Awesome class name like: fas fa-users, fas fa-cog, fas fa-wallet
                </small>
            </div>

            <div class="mb-4 text-center">
                <div class="preview-icon">
                    <i id="iconPreview" class="fas fa-icons"></i>
                </div>
            </div>

            <!-- <div class="mb-4 text-center">
                <div class="preview-icon">
                    <i class="fas fa-icons"></i>
                </div>
            </div> -->

            <div class="d-flex gap-2">
                <button type="submit" name="add_menu" class="btn btn-dark rounded-3">
                    Add Menu
                </button>

                <a href="manage-menu.php" class="btn btn-secondary rounded-3">
                    Back
                </a>
            </div>

        </form>

    </div>

</div>
<script>
    const iconInput = document.querySelector('input[name="menu_icon"]');
    const iconPreview = document.getElementById('iconPreview');

    iconInput.addEventListener('keyup', function () {
        iconPreview.className = this.value;
    });
</script>
</body>
</html>