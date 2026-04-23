<?php
include '../config.php';

if(isset($_POST['add_attribute'])){

    $attribute_name = $_POST['attribute_name'];

    mysqli_query($conn, "INSERT INTO admin_attributes(attribute_name)
    VALUES('$attribute_name')");

    echo "<script>alert('Attribute Added Successfully');</script>";
    echo "<script>window.location.href='dashboard.php?page=all-attributes';</script>";
}

if(isset($_GET['delete'])){

    
    $delete_id = intval($_GET['delete']);

    mysqli_query($conn, "DELETE FROM admin_attributes WHERE id='$delete_id'");

    echo "<script>alert('Attribute Deleted Successfully');</script>";
    echo "<script>window.location.href='dashboard.php?page=all-attributes';</script>";
}
?>

<div class="page-content">

    <div class="page-header">
        <h2>All Attributes</h2>
        <p>Add, manage and delete attributes.</p>
    </div>

    <form method="POST" class="attribute-form">

        <div class="form-group">
            <label>Attribute Name</label>
            <input type="text" name="attribute_name" class="form-control" placeholder="Enter attribute name" required>
        </div>

        <button type="submit" name="add_attribute" class="btn-save">
            Add Attribute
        </button>

    </form>

    <hr>

    <div class="table-responsive">
    <table class="table table-bordered table-hover align-middle bg-white">

        <thead class="table-dark text-center">
            <tr>
                <th>ID</th>
                <th>Attribute Name</th>
                <th>Action</th>
            </tr>
        </thead>

        <tbody>

        <?php
        $attribute_query = mysqli_query($conn, "SELECT * FROM admin_attributes ORDER BY id ASC");

        if(mysqli_num_rows($attribute_query) > 0){
            while($row = mysqli_fetch_assoc($attribute_query)){
        ?>

        <tr class="align-middle">

            <td><?php echo $row['id']; ?></td>

            <td class="fw-semibold">
                <?php echo htmlspecialchars($row['attribute_name']); ?>
            </td>

            <td class="text-center">
                <a href="dashboard.php?page=all-attributes&delete=<?php echo $row['id']; ?>" 
                   class="btn btn-danger btn-sm"
                   onclick="return confirm('Delete this attribute?')">
                   Delete
                </a>
            </td>

        </tr>

        <?php } } else { ?>

        <tr>
            <td colspan="3" class="text-center text-danger py-4">
                No Attributes Found
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
    margin-bottom: 20px;
}

.attribute-form {
    display: flex;
    gap: 20px;
    align-items: end;
    flex-wrap: wrap;
}

.form-group {
    display: flex;
    flex-direction: column;
    width: 100%;
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
    color: white;
    border: none;
    padding: 10px 10px;
    border-radius: 10px;
    cursor: pointer;
    height: 60px;
    line-height: 20px;
}
/* 
.custom-table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
    display: table;
}

.custom-table th,
.custom-table td {
    border: 1px solid #585252;
    padding: 14px;
    text-align: left;
    color: black !important;
}

.custom-table th {
    background: #f5f5f5;
    
}

.delete-btn {
    background: #dc2626;
    color: #fff;
    padding: 8px 14px;
    border-radius: 8px;
    text-decoration: none;
} */
/* .custom-table tr:hover {
    background: #ad9393;
} */



</style>