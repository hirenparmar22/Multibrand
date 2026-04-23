<?php
include '../config.php';

if(isset($_GET['id'])){

    $edit_id = $_GET['id'];

    $select_query = mysqli_query($conn, "SELECT * FROM categories WHERE id='$edit_id'");
    $row = mysqli_fetch_assoc($select_query);
}

if(isset($_POST['update_category'])){
    
    $category_name = $_POST['category_name'];

    $image_name = $row['category_image'];

    if(isset($_FILES['category_image']) && $_FILES['category_image']['name'] != ''){
        $image_name = $_FILES['category_image']['name'];
        $image_tmp = $_FILES['category_image']['tmp_name'];

        move_uploaded_file($image_tmp, '../uploads/' . $image_name);
    }

    mysqli_query($conn, "UPDATE admin_categories 
    SET category_name='$category_name',
    category_image='$image_name'
    WHERE id='$edit_id'");

    echo "<script>alert('Category Updated Successfully');</script>";
    echo "<script>window.location.href='dashboard.php?page=all-categories';</script>";
}
?>

<div class="page-content">

    <div class="page-header">
        <h2>Edit Category</h2>
        <p>Update category details here.</p>
    </div>

    <form method="POST" enctype="multipart/form-data" class="edit-form">

        <div class="form-group">
            <label>Category Name</label>
            <input type="text" name="category_name" class="form-control" value="<?php echo isset($row['category_name']) ? $row['category_name'] : ''; ?>" required>
        </div>

        <div class="form-group">
            <label>Current Image</label><br>
            <?php if(isset($row['category_image']) && $row['category_image'] != ''){ ?>
                <img src="../uploads/<?php echo $row['category_image']; ?>" width="80">
            <?php } ?> 
        </div>

        <div class="form-group">
            <label>Change Image</label>
            <input type="file" name="category_image" class="form-control">
        </div>

        <button type="submit" name="update_category" class="btn-save">
            Update Category
        </button>

    </form>

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
    margin-bottom: 20px;
}

.edit-form {
    display: flex;
    flex-direction: column;
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
}

.btn-save {
    background: #16a34a;
    color: #fff;
    border: none;
    padding: 14px;
    border-radius: 10px;
    cursor: pointer;
    max-width: 220px;
}
</style>