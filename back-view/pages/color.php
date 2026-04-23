<?php
include '../config.php';

if(isset($_POST['add_color'])){

    $color_name = $_POST['color_name'];
    $color_code = $_POST['color_code'];

    mysqli_query($conn, "INSERT INTO admin_colors(color_name, color_code)
    VALUES('$color_name', '$color_code')");

    echo "<script>alert('Color Added Successfully');</script>";
    echo "<script>window.location.href='dashboard.php?page=color';</script>";
}

if(isset($_GET['delete'])){

    $delete_id = $_GET['delete'];

    mysqli_query($conn, "DELETE FROM admin_colors WHERE id='$delete_id'");

    echo "<script>alert('Color Deleted Successfully');</script>";
    echo "<script>window.location.href='dashboard.php?page=color';</script>";
}
?>

<div class="page-content">

    <div class="page-header">
        <h2>Colors</h2>
        <p>Add, manage and delete colors.</p>
    </div>

    <form method="POST" class="color-form">

        <div class="form-group">
            <label>Color Name</label>
            <input type="text" name="color_name" class="form-control" placeholder="Enter color name" required>
        </div>

        <div class="form-group">
            <label>Color Code</label>
            <input type="color" name="color_code" class="form-control color-picker" required>
        </div>

        <button type="submit" name="add_color" class="btn-save">
            Add Color
        </button>

    </form>

    <hr><div class="table-responsive">
    <table class="table table-bordered table-hover align-middle bg-white">

        <thead class="table-dark text-center">
            <tr>
                <th>ID</th>
                <th>Preview</th>
                <th>Color Name</th>
                <th>Color Code</th>
                <th>Action</th>
            </tr>
        </thead>

        <tbody>

        <?php
        $color_query = mysqli_query($conn, "SELECT * FROM admin_colors ORDER BY id DESC");

        if(mysqli_num_rows($color_query) > 0){
            while($row = mysqli_fetch_assoc($color_query)){
        ?>

        <tr class="text-center align-middle">

            <td><?php echo $row['id']; ?></td>

            <td>
                <div style="
                    width:40px;
                    height:40px;
                    background: <?php echo $row['color_code']; ?>;
                    border-radius: 8px;
                    border:1px solid #ddd;
                    margin:auto;
                "></div>
            </td>

            <td><?php echo $row['color_name']; ?></td>

            <td>
                <span class="badge bg-dark">
                    <?php echo $row['color_code']; ?>
                </span>
            </td>

            <td>
                <a href="dashboard.php?page=color&delete=<?php echo $row['id']; ?>" 
                   class="btn btn-danger btn-sm"
                   onclick="return confirm('Delete this color?')">
                   Delete
                </a>
            </td>

        </tr>

        <?php } } else { ?>

        <tr>
            <td colspan="5" class="text-center text-danger py-4">
                No Colors Found
            </td>
        </tr>

        <?php } ?>

        </tbody>
    </table>
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

.color-form {
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

.color-picker {
    height: 50px;
    padding: 5px;
}

.btn-save {
    background: #4f46e5;
    color: white;
    border: none;
    padding: 14px;
    border-radius: 10px;
    cursor: pointer;
    max-width: 220px;
}
</style>