<?php
include '../config.php';

if(isset($_POST['add_category'])){

    $category_name = mysqli_real_escape_string($conn, $_POST['category_name']);
    $parent_id = isset($_POST['parent_id']) ? $_POST['parent_id'] : 0;

    $image_name = '';

    // Image Upload
    if(!empty($_FILES['category_image']['name'])){
        $image_name = time() . "_" . $_FILES['category_image']['name'];
        $image_tmp = $_FILES['category_image']['tmp_name'];

        move_uploaded_file($image_tmp, '../uploads/' . $image_name);
    }

    // Insert Query
    $insert_query = mysqli_query($conn, "
        INSERT INTO categories (name, parent_id, image)
        VALUES ('$category_name', '$parent_id', '$image_name')
    ");

    if($insert_query){
        echo "<script>alert('Category Added Successfully');</script>";
        echo "<script>window.location.href='dashboard.php?page=add-category';</script>";
    } else {
        echo mysqli_error($conn);
    }
}
?>

<div class="page-content">

    <div class="page-header">
        <h2>Add Category</h2>
        <p>Create and manage categories</p>
    </div>

    <form method="POST" enctype="multipart/form-data" class="category-form">

        <!-- Category Name -->
        <div class="form-group">
            <label>Category Name</label>
            <input type="text" name="category_name" class="form-control" required>
        </div>

        <!-- Parent Category -->
        <div class="form-group">
            <label>Parent Category</label>

            <select name="parent_id" class="form-control">
                <option value="0">Main Category</option>

                <?php
                $parentQuery = mysqli_query($conn, "SELECT * FROM categories WHERE parent_id = 0");

                while($row = mysqli_fetch_assoc($parentQuery)){
                ?>
                    <option value="<?= $row['id']; ?>">
                        <?= $row['name']; ?>
                    </option>
                <?php } ?>
            </select>
        </div>

        <!-- Image -->
        <div class="form-group">
            <label>Category Image</label>
            <input type="file" name="category_image" class="form-control">
        </div>

        <!-- Button -->
        <button type="submit" name="add_category" class="btn-save">
            Add Category
        </button>

    </form>

    <hr>

    <h3 class="table-title">All Categories</h3>

    <div class="table-responsive">
        <table class="table table-bordered table-hover align-middle bg-white">

            <thead class="table-dark text-center">
                <tr>
                    <th>ID</th>
                    <th>Image</th>
                    <th>Category Name</th>
                    <th>Parent</th>
                </tr>
            </thead>

            <tbody>

            <?php
            $category_query = mysqli_query($conn, "SELECT * FROM categories ORDER BY id ASC");

            if(mysqli_num_rows($category_query) > 0){
                while($row = mysqli_fetch_assoc($category_query)){

                    $parent_name = "Main";

                    if($row['parent_id'] != 0){
                        $parent = mysqli_fetch_assoc(mysqli_query($conn, 
                            "SELECT name FROM categories WHERE id=".$row['parent_id']
                        ));
                        $parent_name = $parent['name'];
                    }
            ?>

            <tr class="text-center">

                <td><?= $row['id']; ?></td>

                <td>
                    <?php if(!empty($row['image'])){ ?>
                        <img src="../uploads/<?= $row['image']; ?>" 
                             width="60" height="60"
                             style="object-fit:cover; border-radius:10px;">
                    <?php } else { ?>
                        <span class="text-muted">No Image</span>
                    <?php } ?>
                </td>

                <td><?= htmlspecialchars($row['name']); ?></td>

                <td><?= $parent_name; ?></td>

            </tr>

            <?php } } else { ?>

            <tr>
                <td colspan="4" class="text-center text-danger py-4">
                    No Categories Found
                </td>
            </tr>

            <?php } ?>

            </tbody>
        </table>
    </div>

</div>

<style>
.page-content {
    background: #fff;
    padding: 25px;
    border-radius: 20px;
    box-shadow: 0 10px 30px rgba(0,0,0,0.08);
}

.page-header h2 {
    font-size: 26px;
}

.category-form {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 20px;
}

.form-group {
    display: flex;
    flex-direction: column;
}

.form-control {
    padding: 10px;
    border: 1px solid #ddd;
    border-radius: 8px;
}

.btn-save {
    background: #4f46e5;
    color: white;
    border: none;
    padding: 12px;
    border-radius: 8px;
    cursor: pointer;
    grid-column: span 2;
    max-width: 200px;
}

.table-title {
    margin-top: 25px;
}
</style>