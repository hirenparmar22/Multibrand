<?php 
include '../config.php';

// ADD CATEGORY
if(isset($_POST['add_category'])){

    $category_name = mysqli_real_escape_string($conn, $_POST['category_name']);
    $slug = mysqli_real_escape_string($conn, $_POST['slug']);

    $parent_id = !empty($_POST['parent_id']) ? $_POST['parent_id'] : "NULL";

    $image_name = '';

    // IMAGE UPLOAD
    if(!empty($_FILES['category_image']['name'])){
        $image_name = time() . "_" . $_FILES['category_image']['name'];
        $image_tmp = $_FILES['category_image']['tmp_name'];

        move_uploaded_file($image_tmp, '../uploads/' . $image_name);
    }

    // INSERT QUERY
    $insert_query = mysqli_query($conn, "
        INSERT INTO categories (name, slug, parent_id, image)
        VALUES ('$category_name', '$slug', $parent_id, '$image_name')
    ");

    if($insert_query){
        echo "<script>alert('Category Added Successfully');</script>";
        echo "<script>window.location.href='dashboard.php?page=add-category';</script>";
    } else {
        echo mysqli_error($conn);
    }
}
?>

<div class="wc-container">

    <!-- LEFT PANEL -->
    <div class="wc-left">
        <h3>Add new category</h3>

        <form method="POST" enctype="multipart/form-data">

            <label>Name</label>
            <input type="text" name="category_name" id="name" placeholder="Category name" required>

            <label>Slug</label>
            <input type="text" name="slug" id="slug" placeholder="category-slug">

            <label>Parent category</label>
            <select name="parent_id">
                <option value="">None</option>

                <?php
                $parentQuery = mysqli_query($conn, "SELECT * FROM categories WHERE parent_id IS NULL");
                while($row = mysqli_fetch_assoc($parentQuery)){
                    echo "<option value='".$row['id']."'>".$row['name']."</option>";
                }
                ?>
            </select>

            <label>Image</label>
            <input type="file" name="category_image">

            <button type="submit" name="add_category">Add new category</button>

        </form>
    </div>


    <!-- RIGHT PANEL -->
    <div class="wc-right">
        <h3>Categories</h3>

        <table class="wc-table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Slug</th>
                    <th>Count</th>
                </tr>
            </thead>

            <tbody>
                <?php
                $category_query = mysqli_query($conn, "SELECT * FROM categories ORDER BY id ASC");

                while($row = mysqli_fetch_assoc($category_query)){

                    $prefix = "";

                    if(!empty($row['parent_id'])){
                        $prefix = "— ";
                    }
                ?>

                <tr>
                    <td><strong><?= $prefix . $row['name']; ?></strong></td>
                    <td>-</td>
                    <td><?= $row['slug'] ?? '-'; ?></td>
                    <td>0</td>
                </tr>

                <?php } ?>
            </tbody>
        </table>

    </div>

</div>


<style>
* { box-sizing: border-box; }

body {
    background: #f0f4ff;
    background-image:
        radial-gradient(ellipse 70% 60% at 15% 10%, rgba(99,102,241,0.14) 0%, transparent 60%),
        radial-gradient(ellipse 55% 50% at 85% 85%, rgba(139,92,246,0.10) 0%, transparent 55%);
    font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif;
    min-height: 100vh;
}

.wc-container {
    display: flex;
    gap: 20px;
    padding: 28px 24px;
    align-items: flex-start;
}

/* Glass card base */
.wc-left, .wc-right {
    background: rgba(255,255,255,0.72);
    backdrop-filter: blur(16px);
    -webkit-backdrop-filter: blur(16px);
    border: 1px solid rgba(255,255,255,0.9);
    border-radius: 20px;
    box-shadow: 0 4px 24px rgba(99,102,241,0.07), 0 1px 3px rgba(0,0,0,0.04);
    padding: 24px;
}

/* Left form panel */
.wc-left { width: 300px; flex-shrink: 0; }

.wc-left h3, .wc-right h3 {
    font-size: 15px;
    font-weight: 600;
    color: #1e1b4b;
    margin-bottom: 20px;
}

.wc-left label {
    display: block;
    font-size: 11px;
    font-weight: 700;
    color: #64748b;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    margin: 14px 0 5px;
}

.wc-left input,
.wc-left select {
    width: 100%;
    padding: 10px 12px;
    font-size: 13px;
    color: #1e293b;
    background: rgba(255,255,255,0.85);
    border: 1px solid rgba(99,102,241,0.2);
    border-radius: 10px;
    outline: none;
    transition: border-color 0.2s, box-shadow 0.2s;
    font-family: inherit;
}

.wc-left input:focus,
.wc-left select:focus {
    border-color: #6366f1;
    box-shadow: 0 0 0 3px rgba(99,102,241,0.12);
}

.wc-left button {
    margin-top: 18px;
    width: 100%;
    padding: 11px;
    background: linear-gradient(135deg, #6366f1, #8b5cf6);
    color: #fff;
    font-size: 13px;
    font-weight: 600;
    border: none;
    border-radius: 10px;
    cursor: pointer;
    transition: opacity 0.2s, transform 0.15s;
}

.wc-left button:hover { opacity: 0.9; transform: translateY(-1px); }
.wc-left button:active { transform: scale(0.98); }

/* Right table panel */
.wc-right { flex: 1; }

.wc-table {
    width: 100%;
    border-collapse: collapse;
    table-layout: fixed;
}

.wc-table thead tr {
    border-bottom: 1px solid rgba(99,102,241,0.12);
}

.wc-table th {
    font-size: 11px;
    font-weight: 700;
    color: #94a3b8;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    padding: 0 12px 10px;
    text-align: left;
    background: none;
    border: none;
}

.wc-table td {
    padding: 11px 12px;
    font-size: 13px;
    color: #334155;
    border-bottom: 1px solid rgba(0,0,0,0.04);
}

.wc-table tr:last-child td { border-bottom: none; }
.wc-table tbody tr:hover { background: rgba(99,102,241,0.03); }

@media (max-width: 820px) {
    .wc-container { flex-direction: column; }
    .wc-left { width: 100%; }
}
</style>

<script>
document.getElementById("name").addEventListener("keyup", function(){
    let slug = this.value
        .toLowerCase()
        .replace(/ /g, '-')
        .replace(/[^\w-]+/g, '');

    document.getElementById("slug").value = slug;
});
</script>