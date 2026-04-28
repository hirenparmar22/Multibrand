<?php
include '../config.php';

if(isset($_GET['delete'])){

    $delete_id = $_GET['delete'];

    mysqli_query($conn, "DELETE FROM categories WHERE id='$delete_id'");

    echo "<script>alert('Category Deleted Successfully');</script>";
    echo "<script>window.location.href='dashboard.php?page=all-categories';</script>";
}
?>

<div class="page-content">

    <div class="page-header">
        <h2>All Categories</h2>
        <p>Manage, edit and delete all category records.</p>
    </div>

   <div class="table-responsive">
    <table class="table table-bordered table-hover align-middle bg-white">

        <thead class="table-dark text-center">
            <tr>
                <th>ID</th>
                <th>Image</th>
                <th>Category Name</th>
                <th>Action</th>
            </tr>
        </thead>

        <tbody>

        <?php
        $category_query = mysqli_query($conn, "SELECT * FROM categories ORDER BY id DESC");

        if(mysqli_num_rows($category_query) > 0){
            while($row = mysqli_fetch_assoc($category_query)){
        ?>

        <tr class="align-middle">

            <td><?php echo $row['id']; ?></td>

            <td>
                <?php if(!empty($row['image'])){ ?>
                    <img src="../uploads/<?php echo $row['image']; ?>" 
                         width="60" height="60"
                         style="object-fit:cover; border-radius:10px;">
                <?php } else { ?>
                    <span class="text-muted">No Image</span>
                <?php } ?>
            </td>

            <td class="fw-semibold">
                <?php echo htmlspecialchars($row['name']); ?>
            </td>

            <td class="text-center">
                <a href="dashboard.php?page=edit-category&id=<?php echo $row['id']; ?>" 
                   class="btn btn-primary btn-sm me-1">
                   Edit
                </a>

                <a href="dashboard.php?page=all-categories&delete=<?php echo $row['id']; ?>" 
                   class="btn btn-danger btn-sm"
                   onclick="return confirm('Delete this category?')">
                   Delete
                </a>
            </td>

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
    body {
    color: black;
}
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

</style>