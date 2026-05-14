<?php
include '../config.php';

if (isset($_POST['add_color'])) {

    $color_name = $_POST['color_name'];
    $color_code = $_POST['color_code'];

    mysqli_query($conn, "INSERT INTO admin_colors(color_name, color_code)
    VALUES('$color_name', '$color_code')");

    echo "<script>alert('Color Added Successfully');</script>";
    echo "<script>window.location.href='dashboard.php?page=color';</script>";
}

if (isset($_GET['delete'])) {

    $delete_id = $_GET['delete'];

    mysqli_query($conn, "DELETE FROM admin_colors WHERE id='$delete_id'");

    echo "<script>alert('Color Deleted Successfully');</script>";
    echo "<script>window.location.href='dashboard.php?page=color';</script>";
}
?>



<div class="page-content">

    <div class="pg-header">
        <h1>Color management</h1>
        <p>Add, preview and remove colors from your palette.</p>
    </div>

    <div class="glass form-card">
        <h2>Add new color</h2>
        <form method="POST" class="form-row">
            <div class="field">
                <label>Color name</label>
                <input type="text" name="color_name" placeholder="e.g. Ocean Blue" required>
            </div>
            <div class="field">
                <label>Color code</label>
                <div class="color-wrap">
                    <input type="color" name="color_code" id="cpicker" value="#6366f1"
                        oninput="document.getElementById('ccode-label').textContent=this.value">
                    <span id="ccode-label">#6366f1</span>
                </div>
            </div>
            <button type="submit" name="add_color" class="add-btn">+ Add color</button>
        </form>
    </div>

    <div class="glass table-card">
        <div class="table-top">
            <h2>Palette</h2>
        </div>
        <div class="colors-grid">
            <?php
            $color_query = mysqli_query($conn, "SELECT * FROM admin_colors ORDER BY id DESC");
            if (mysqli_num_rows($color_query) > 0):
                while ($row = mysqli_fetch_assoc($color_query)): ?>
                    <div class="color-tile">
                        <div class="swatch" style="background:<?= htmlspecialchars($row['color_code']) ?>"></div>
                        <div class="tile-info">
                            <span class="tile-name"><?= htmlspecialchars($row['color_name']) ?></span>
                            <span class="tile-code"><?= htmlspecialchars($row['color_code']) ?></span>
                        </div>
                        <div style="display:flex;justify-content:flex-end;margin-top:4px">
                            <a href="dashboard.php?page=color&delete=<?= $row['id'] ?>"
                                onclick="return confirm('Delete this color?')" class="del-btn">&#x2715;</a>
                        </div>
                    </div>
                <?php endwhile;
            else: ?>
                <p class="empty">No colors found. Add one above.</p>
            <?php endif; ?>
        </div>
    </div>
</div>

<style>
    body {
        background: linear-gradient(135deg, #f5f3ff 0%, #eff6ff 50%, #f0fdf4 100%);
        min-height: 100vh;
        font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif;
    }

    .page-content {
        padding: 28px 24px;
    }

    .pg-header {
        margin-bottom: 22px;
    }

    .pg-header h1 {
        font-size: 22px;
        font-weight: 700;
        color: #1e1b4b;
    }

    .pg-header p {
        font-size: 13px;
        color: #64748b;
        margin-top: 4px;
    }

    .glass {
        background: rgba(255, 255, 255, 0.70);
        backdrop-filter: blur(18px);
        -webkit-backdrop-filter: blur(18px);
        border: 1px solid rgba(255, 255, 255, 0.88);
        border-radius: 20px;
        box-shadow: 0 4px 28px rgba(99, 102, 241, 0.08), 0 1px 3px rgba(0, 0, 0, 0.04);
    }

    .form-card {
        padding: 24px;
        margin-bottom: 20px;
    }

    .form-card h2 {
        font-size: 14px;
        font-weight: 600;
        color: #1e1b4b;
        margin-bottom: 18px;
    }

    .form-row {
        display: grid;
        grid-template-columns: 1fr 200px auto;
        gap: 14px;
        align-items: flex-end;
    }

    .field {
        display: flex;
        flex-direction: column;
        gap: 6px;
    }

    .field label {
        font-size: 11px;
        font-weight: 700;
        color: #64748b;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .field input[type="text"] {
        padding: 10px 13px;
        font-size: 13px;
        color: #1e293b;
        background: rgba(255, 255, 255, 0.85);
        border: 1px solid rgba(99, 102, 241, 0.2);
        border-radius: 10px;
        outline: none;
        transition: border-color 0.2s, box-shadow 0.2s;
    }

    .field input[type="text"]:focus {
        border-color: #6366f1;
        box-shadow: 0 0 0 3px rgba(99, 102, 241, 0.12);
    }

    .color-wrap {
        display: flex;
        align-items: center;
        gap: 10px;
        background: rgba(255, 255, 255, 0.85);
        border: 1px solid rgba(99, 102, 241, 0.2);
        border-radius: 10px;
        padding: 6px 10px;
    }

    .color-wrap input[type="color"] {
        width: 34px;
        height: 34px;
        border: none;
        background: none;
        cursor: pointer;
        border-radius: 6px;
    }

    .color-wrap span {
        font-size: 12px;
        color: #94a3b8;
        font-family: monospace;
    }

    .add-btn {
        padding: 0 22px;
        height: 46px;
        background: linear-gradient(135deg, #6366f1, #8b5cf6);
        color: #fff;
        border: none;
        border-radius: 10px;
        font-size: 13px;
        font-weight: 600;
        cursor: pointer;
        transition: opacity 0.2s, transform 0.15s;
        white-space: nowrap;
    }

    .add-btn:hover {
        opacity: 0.9;
        transform: translateY(-1px);
    }

    .add-btn:active {
        transform: scale(0.98);
    }

    .table-card {
        padding: 24px;
    }

    .table-top {
        margin-bottom: 18px;
    }

    .table-top h2 {
        font-size: 14px;
        font-weight: 600;
        color: #1e1b4b;
    }

    .colors-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(175px, 1fr));
        gap: 12px;
    }

    .color-tile {
        background: rgba(255, 255, 255, 0.8);
        border: 1px solid rgba(99, 102, 241, 0.1);
        border-radius: 14px;
        padding: 14px;
        transition: transform 0.18s, box-shadow 0.18s;
    }

    .color-tile:hover {
        transform: translateY(-3px);
        box-shadow: 0 8px 24px rgba(99, 102, 241, 0.12);
    }

    .swatch {
        width: 100%;
        height: 72px;
        border-radius: 10px;
        border: 1px solid rgba(0, 0, 0, 0.07);
        margin-bottom: 10px;
    }

    .tile-info {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 6px;
    }

    .tile-name {
        font-size: 13px;
        font-weight: 600;
        color: #1e293b;
    }

    .tile-code {
        font-size: 11px;
        color: #64748b;
        font-family: monospace;
        background: #f1f5f9;
        padding: 2px 7px;
        border-radius: 5px;
    }

    .del-btn {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 28px;
        height: 28px;
        margin-top: 8px;
        background: #fff1f2;
        border: none;
        border-radius: 7px;
        color: #ef4444;
        font-size: 13px;
        cursor: pointer;
        text-decoration: none;
        transition: background 0.15s;
    }

    .del-btn:hover {
        background: #ffe4e6;
    }

    .empty {
        color: #94a3b8;
        font-size: 13px;
        padding: 24px 0;
    }

    @media (max-width: 620px) {
        .form-row {
            grid-template-columns: 1fr 1fr;
        }

        .add-btn {
            grid-column: 1 / -1;
        }
    }
</style>