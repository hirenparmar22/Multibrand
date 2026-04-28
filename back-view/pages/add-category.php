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
body {
    background: #f1f1f1;
    font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif;
}

/* LAYOUT */
.wc-container {
    display: flex;
    gap: 25px;
    padding: 25px;
}

/* LEFT PANEL */
.wc-left {
    width: 280px;
    background:whitesmoke;
    padding: 20px;
    border-radius: 8px;
    border: 1px solid #dcdcde;
}

.wc-left h3 {
    margin-bottom: 15px;
    font-size: 18px;
}

.wc-left label {
    font-size: 13px;
    margin-top: 10px;
    display: block;
    color: #1d2327;
}

.wc-left input,
.wc-left select {
    width: 100%;
    padding: 8px;
    margin-top: 5px;
    border: 1px solid #8c8f94;
    background: whitesmoke;
    border-radius: 4px;
    font-size: 13px;
}

.wc-left button {
    margin-top: 15px;
    background: #2271b1;
    color: white;
    border: none;
    padding: 8px;
    width: 100%;
    border-radius: 4px;
    cursor: pointer;
}

/* RIGHT PANEL */
.wc-right {
    flex: 1;
    background:whitesmoke;
    padding: 20px;
    border-radius: 8px;
    border: 1px solid #dcdcde;
}

.wc-right h3 {
    margin-bottom: 15px;
}

/* TABLE */
.wc-table {
    width: 100%;
    border-collapse: collapse;
}

.wc-table th {
    background: #5a5e5e;
    text-align: left;
    padding: 10px;
    font-size: 13px;
    border-bottom: 1px solid black;
}

.wc-table td {
    padding: 10px;
    border-bottom: 1px solid #f0f0f1;
    font-size: 13px;
}

.wc-table tr:hover {
    background: #f6f7f7;
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