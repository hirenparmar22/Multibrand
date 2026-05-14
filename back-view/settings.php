<?php
include '../config.php';

$settingsQuery = mysqli_query($conn, "SELECT * FROM admin_settings WHERE id='1'");
$settings = mysqli_fetch_assoc($settingsQuery);
?>

<!-- 
<form action="update-settings.php" method="POST">
<div class="container py-4">

    <div class="mb-4">
        <h2 class="fw-bold">Settings</h2>
        <p class="text-muted">Manage website and admin settings</p>
    </div>

    <div class="row">

        <div class="col-md-6 mb-4">
            <div class="card shadow border-0 rounded-4 p-4 h-100">
                <h4 class="mb-3">Website Settings</h4>

                <div class="mb-3">
                    <label class="form-label">Website Name</label>
                    <input type="text" name="website_name" class="form-control"
                           value="<?php echo $settings['website_name']; ?>">
                </div>

                <div class="mb-3">
                    <label class="form-label">Footer Text</label>
                    <textarea name="footer_text" class="form-control" rows="3"><?php echo $settings['footer_text']; ?></textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label">Maintenance Mode</label>
                    <select name="maintenance_mode" class="form-control">
                        <option value="0" <?php if ($settings['maintenance_mode'] == '0') echo 'selected'; ?>>
                            Disable
                        </option>
                        <option value="1" <?php if ($settings['maintenance_mode'] == '1') echo 'selected'; ?>>
                            Enable
                        </option>
                    </select>
                </div>
            </div>
        </div>

        <div class="col-md-6 mb-4">
            <div class="card shadow border-0 rounded-4 p-4 h-100">
                <h4 class="mb-3">SMTP Settings</h4>

                <div class="mb-3">
                    <label class="form-label">SMTP Host</label>
                    <input type="text" name="smtp_host" class="form-control"
                           value="<?php echo $settings['smtp_host']; ?>">
                </div>

                <div class="mb-3">
                    <label class="form-label">SMTP Port</label>
                    <input type="text" name="smtp_port" class="form-control"
                           value="<?php echo $settings['smtp_port']; ?>">
                </div>

                <div class="mb-3">
                    <label class="form-label">SMTP Email</label>
                    <input type="email" name="smtp_email" class="form-control"
                           value="<?php echo $settings['smtp_email']; ?>">
                </div>
            </div>
        </div>

        <div class="col-md-6 mb-4">
            <div class="card shadow border-0 rounded-4 p-4 h-100">
                <h4 class="mb-3">Contact Settings</h4>

                <div class="mb-3">
                    <label class="form-label">Phone</label>
                    <input type="text" name="phone" class="form-control"
                           value="<?php echo $settings['phone']; ?>">
                </div>

                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" name="email" class="form-control"
                           value="<?php echo $settings['email']; ?>">
                </div>

                <div class="mb-3">
                    <label class="form-label">Address</label>
                    <textarea name="address" class="form-control" rows="3"><?php echo $settings['address']; ?></textarea>
                </div>
            </div>
        </div>

        <div class="col-md-6 mb-4">
            <div class="card shadow border-0 rounded-4 p-4 h-100">
                <h4 class="mb-3">Theme Settings</h4>

                <div class="mb-3">
                    <label class="form-label">Sidebar Color</label>
                    <input type="color" name="sidebar_color" class="form-control form-control-color"
                           value="<?php echo $settings['sidebar_color']; ?>">
                </div>

                <div class="mb-3">
                    <label class="form-label">Primary Color</label>
                    <input type="color" name="primary_color" class="form-control form-control-color"
                           value="<?php echo $settings['primary_color']; ?>">
                </div>

                <div class="mb-3">
                    <label class="form-label">Dark Mode</label>
                    <select name="dark_mode" class="form-control">
                        <option value="0" <?php if ($settings['dark_mode'] == '0') echo 'selected'; ?>>
                            Disable
                        </option>
                        <option value="1" <?php if ($settings['dark_mode'] == '1') echo 'selected'; ?>>
                            Enable
                        </option>
                    </select>
                </div>
            </div>
        </div>

    </div>

</div>
</form> -->