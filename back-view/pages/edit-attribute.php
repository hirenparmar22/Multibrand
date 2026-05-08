<?php
include '../config.php';

$row = [];

if(isset($_GET['id'])){

    $edit_id = $_GET['id'];

    $select_query = mysqli_query($conn, "SELECT * FROM admin_attributes WHERE id='$edit_id'");

    if(mysqli_num_rows($select_query) > 0){
        $row = mysqli_fetch_assoc($select_query);
    }
}

if(isset($_POST['update_attribute'])){

    $attribute_name = $_POST['attribute_name'];

    mysqli_query($conn, "UPDATE admin_attributes SET
        attribute_name='$attribute_name'
        WHERE id='$edit_id'
    ");

    echo "<script>alert('Attribute Updated Successfully');</script>";
    echo "<script>window.location.href='dashboard.php?page=all-attributes';</script>";
}
?>

<div class="page-content">

    <div class="page-header">
        <h2>Edit Attribute</h2>
        <p>Update attribute details here.</p>
    </div>

    <form method="POST" class="edit-form">

        <div class="form-group">
            <label>Attribute Name</label>
            <input type="text" name="attribute_name" class="form-control" value="<?php echo isset($row['attribute_name']) ? $row['attribute_name'] : ''; ?>" required>
        </div>

        <button type="submit" name="update_attribute" class="btn-save">
            Update Attribute
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