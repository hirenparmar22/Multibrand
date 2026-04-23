<?php
include '../config.php';

if(isset($_POST['add_category'])){

    $category_name = $_POST['category_name'];

    $image_name = '';

    if(isset($_FILES['category_image']) && $_FILES['category_image']['name'] != ''){
        $image_name = $_FILES['category_image']['name'];
        $image_tmp = $_FILES['category_image']['tmp_name'];

        move_uploaded_file($image_tmp, '../uploads/' . $image_name);
    }

    $insert_query = mysqli_query($conn, "INSERT INTO admin_categories(category_name, category_image)
    VALUES('$category_name', '$image_name')");

    if($insert_query){
        echo "<script>alert('Category Added Successfully');</script>";
        echo "<script>window.location.href='dashboard.php?page=add-category';</script>";
    }
}
?>

<div class="page-content">

    <div class="page-header">
        <h2>Add Category</h2>
        <p>Create category and manage all categories from one place.</p>
    </div>

    <form method="POST" enctype="multipart/form-data" class="category-form">

        <div class="form-group">
            <label>Category Name</label>
            <input type="text" name="category_name" class="form-control" placeholder="Enter category name" required>
        </div>

        <div class="form-group">
            <label>Category Image</label>
            <input type="file" name="category_image" class="form-control">
        </div>

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
            </tr>
        </thead>

        <tbody>

        <?php
        $category_query = mysqli_query($conn, "SELECT * FROM admin_categories ORDER BY id ASC");

        if(mysqli_num_rows($category_query) > 0){
            while($row = mysqli_fetch_assoc($category_query)){
        ?>

        <tr class="align-middle text-center">

            <td><?php echo $row['id']; ?></td>

            <td>
                <?php if(!empty($row['category_image'])){ ?>
                    <img src="../uploads/<?php echo $row['category_image']; ?>" 
                         width="60" height="60"
                         style="object-fit:cover; border-radius:10px;">
                <?php } else { ?>
                    <span class="text-muted">No Image</span>
                <?php } ?>
            </td>

            <td class="fw-semibold">
                <?php echo htmlspecialchars($row['category_name']); ?>
            </td>

        </tr>

        <?php } } else { ?>

        <tr>
            <td colspan="3" class="text-center text-danger py-4">
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
    font-size: 28px;
    margin-bottom: 5px;
}

.page-header p {
    color: #666;
    margin-bottom: 25px;
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

.form-group label {
    font-weight: 600;
    margin-bottom: 8px;
}

.form-control {
    padding: 12px;
    border: 1px solid #ddd;
    border-radius: 10px;
    outline: none;
}

.btn-save {
    background: #4f46e5;
    color: white;
    border: none;
    padding: 14px;
    border-radius: 10px;
    cursor: pointer;
    font-size: 16px;
    grid-column: span 2;
    max-width: 220px;
}

.table-title {
    margin-top: 25px;
    margin-bottom: 15px;
}

</style>