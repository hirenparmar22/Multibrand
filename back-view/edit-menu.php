<?php
// session_start();
include '../config.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: ../login.php");
    exit;
}

if (!isset($_GET['id'])) {
    header("Location: manage-menu.php");
    exit;
}

$id = $_GET['id'];

$query = mysqli_query($conn, "SELECT * FROM sidebar_menu WHERE id = '$id'");
$row = mysqli_fetch_assoc($query);

if (!$row) {
    header("Location: manage-menu.php");
    exit;
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Edit Menu</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: whitesmoke;
        }

        .page-wrapper {
            margin-left: 310px;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        .main-content {
            flex: 1;
            padding: 120px 30px 30px 30px;
        }

        .form-card {
            max-width: 700px;
            margin: auto;
            background: white;
            border-radius: 24px;
            padding: 30px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
        }

        .preview-icon {
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
    <?php include 'slidebar.php'; ?>

    <div class="page-wrapper">
        <?php include 'header.php'; ?>


        <div style="main-content">
            <div class="container-fluid">

                <div class="form-card">

                    <div class="text-center mb-4">
                        <h2 class="fw-bold">Edit Slidebar Menu</h2>
                        <p class="text-muted">Update your sidebar menu item</p>
                    </div>

                    <form action="edit-menu-process.php" method="POST">

                        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">

                        <div class="mb-3">
                            <label class="form-label fw-semibold">Menu Name</label>
                            <input type="text" name="menu_name" class="form-control rounded-3"
                                value="<?php echo $row['menu_name']; ?>" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-semibold">Menu Link</label>
                            <input type="text" name="menu_link" class="form-control rounded-3"
                                value="<?php echo $row['menu_link']; ?>" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-semibold">Menu Icon</label>
                            <input type="text" name="menu_icon" class="form-control rounded-3"
                                value="<?php echo $row['menu_icon']; ?>" required>

                            <small class="text-muted">
                                Example: fas fa-users, fas fa-wallet, fas fa-chart-line
                            </small>
                        </div>

                        <!-- <div class="mb-4 text-center">
                <div class="preview-icon">
                    <i id="iconPreview" class="<?php echo $row['menu_icon']; ?>"></i>
                </div>
            </div> -->

                        <div class="d-flex gap-2">
                            <button type="submit" name="update_menu" class="btn btn-primary rounded-3">
                                Update Menu
                            </button>

                            <a href="dashboard.php?page=manage-menu" class="btn btn-secondary rounded-3">
                                Back
                            </a>
                        </div>

                    </form>

                </div>
            </div>

        </div>
        <?php include 'footer.php'; ?>
    </div>
    <script>
        const iconInput = document.querySelector('input[name="menu_icon"]');
        const iconPreview = document.getElementById('iconPreview');

        iconInput.addEventListener('keyup', function() {
            iconPreview.className = this.value;
        });
    </script>
</body>

</html>