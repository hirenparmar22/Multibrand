<?php
include __DIR__ . '/../../config.php';

if (isset($_POST['save_settings'])) {

    $site_name = $_POST['site_name'];
    $admin_email = $_POST['admin_email'];
    $contact_number = $_POST['contact_number'];

    $check_query = mysqli_query($conn, "SELECT * FROM admin_settings");

    if (mysqli_num_rows($check_query) > 0) {

        mysqli_query($conn, "UPDATE admin_settings SET
            site_name='$site_name',
            admin_email='$admin_email',
            contact_number='$contact_number'
            WHERE id=1
            ");
    } else {

        mysqli_query($conn, "INSERT INTO admin_settings(site_name, admin_email, contact_number)
        VALUES('$site_name', '$admin_email', '$contact_number')");
    }

    echo "<script>alert('Settings Saved Successfully');</script>";
    echo "<script>window.location.href='dashboard.php?page=settings';</script>";
}

$settings_query = mysqli_query($conn, "SELECT * FROM admin_settings LIMIT 1");
$settings = mysqli_fetch_assoc($settings_query);
?>

<div class="page-content">

    <div class="page-header">
        <h2>Settings</h2>
        <p>Manage website basic settings.</p>
    </div>

    <form method="POST" class="settings-form">

        <div class="form-group">
            <label>Website Name</label>
            <input type="text" name="site_name" class="form-control" value="<?php echo $settings['site_name'] ?? ''; ?>">
        </div>

        <div class="form-group">
            <label>Admin Email</label>
            <input type="email" name="admin_email" class="form-control" value="<?php echo $settings['admin_email'] ?? ''; ?>">
        </div>

        <div class="form-group">
            <label>Contact Number</label>
            <input type="text" name="contact_number" class="form-control" value="<?php echo $settings['contact_number'] ?? ''; ?>">
        </div>

        <button type="submit" name="save_settings" class="btn-save">
            Save Settings
        </button>

    </form>

</div>

<style>
    .page-content {
        background: #fff;
        padding: 25px;
        border-radius: 20px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
    }

    .page-header h2 {
        font-size: 28px;
        margin-bottom: 5px;
    }

    .page-header p {
        color: #666;
        margin-bottom: 20px;
    }

    .settings-form {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 20px;
    }

    .form-group {
        display: flex;
        flex-direction: column;
    }

    .form-group label {
        margin-bottom: 8px;
        font-weight: 600;
    }

    .form-control {
        padding: 12px;
        border: 1px solid #ddd;
        border-radius: 10px;
    }

    .btn-save {
        background: #4f46e5;
        color: #fff;
        border: none;
        padding: 14px;
        border-radius: 10px;
        cursor: pointer;
        max-width: 220px;
    }
</style>