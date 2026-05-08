<?php
include '../config.php';

if (isset($_GET['delete'])) {

    $delete_id = $_GET['delete'];

    mysqli_query($conn, "DELETE FROM products WHERE id='$delete_id'");

    echo "<script>alert('Product Deleted Successfully');</script>";
    echo "<script>window.location.href='dashboard.php?page=edit-product';</script>";
}
?>

<div class="page-content">

    <div class="page-header">
        <h2>Edit Product</h2>
        <p>Manage, edit and delete product records.</p>
    </div>

    <div class="table-responsive">
        <table class="table table-bordered table-hover align-middle bg-white">

            <thead class="table-dark text-center">
                <tr>
                    <th>ID</th>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Stock</th>
                    <th>Description</th>
                    <th>Action</th>
                </tr>
            </thead>

            <tbody>

                <?php
                $product_query = mysqli_query($conn, "SELECT * FROM products ORDER BY id DESC");

                if (mysqli_num_rows($product_query) > 0) {
                    while ($row = mysqli_fetch_assoc($product_query)) {
                ?>

                        <tr class="align-middle">

                            <td><?php echo $row['id']; ?></td>

                            <td>
                                <?php if (!empty($row['image'])) { ?>
                                    <img src="../uploads/products/<?php echo $row['image']; ?>"
                                        width="60" height="60"
                                        style="object-fit:cover; border-radius:10px;">
                                <?php } else { ?>
                                    <span class="text-muted">No Image</span>
                                <?php } ?>
                            </td>

                            <td class="fw-semibold">
                                <?php echo htmlspecialchars($row['name']); ?>
                            </td>

                            <td>
                                <strong>₹<?php echo number_format($row['price']); ?></strong>
                            </td>

                            <td>
                                <?php if ($row['stock'] > 0) { ?>
                                    <span class="badge bg-success"><?php echo $row['stock']; ?></span>
                                <?php } else { ?>
                                    <span class="badge bg-danger">Out</span>
                                <?php } ?>
                            </td>

                            <td style="max-width:250px;" title="<?php echo $row['description'] ?? ''; ?>">
                                <?php echo substr($row['description'] ?? '', 0, 50); ?>...
                            </td>

                            <td class="text-center">
                                <a href="dashboard.php?page=update-product&id=<?php echo $row['id']; ?>"
                                    class="btn btn-primary btn-sm me-1">
                                    Edit
                                </a>

                                <a href="dashboard.php?page=edit-product&delete=<?php echo $row['id']; ?>"
                                    class="btn btn-danger btn-sm"
                                    onclick="return confirm('Delete this product?')">
                                    Delete
                                </a>
                            </td>

                        </tr>

                    <?php }
                } else { ?>

                    <tr>
                        <td colspan="7" class="text-center text-danger py-4">
                            No Products Found
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
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
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