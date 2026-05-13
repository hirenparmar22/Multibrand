<?php
include '../config.php';

if (isset($_GET['delete'])) {

    $delete_id = $_GET['delete'];

    mysqli_query($conn, "DELETE FROM orders WHERE id='$delete_id'");

    echo "<script>alert('Order Deleted Successfully');</script>";
    echo "<script>window.location.href='dashboard.php?page=all-orders';</script>";
}
?>

<div class="page-content">

    <div class="page-header">
        <h2>All Orders</h2>
        <p>Manage customer orders and delivery status.</p>
    </div>
    <div class="table-responsive">
        <table class="table table-bordered table-hover align-middle bg-white">

            <thead class="table-dark text-center">
                <tr>
                    <th>ID</th>
                    <th>Customer</th>
                    <th>Product</th>
                    <th>Total</th>
                    <th>Qty</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>

            <tbody>

                <?php
                $order_query = mysqli_query($conn, "SELECT * FROM admin_orders ORDER BY id DESC");

                if (mysqli_num_rows($order_query) > 0) {
                    while ($row = mysqli_fetch_assoc($order_query)) {
                ?>

                        <tr class="align-middle">

                            <td><?php echo $row['id']; ?></td>

                            <td class="fw-semibold">
                                <?php echo htmlspecialchars($row['customer_name']); ?>
                            </td>

                            <td><?php echo $row['product_name']; ?></td>

                            <td><strong>₹<?php echo $row['total_price']; ?></strong></td>

                            <td><?php echo $row['quantity']; ?></td>

                            <td class="text-center">
                                <?php if ($row['status'] == 'Delivered') { ?>
                                    <span class="badge bg-success">Delivered</span>
                                <?php } elseif ($row['status'] == 'Pending') { ?>
                                    <span class="badge bg-warning text-dark">Pending</span>
                                <?php } else { ?>
                                    <span class="badge bg-danger">Cancelled</span>
                                <?php } ?>
                            </td>

                            <td class="text-center">
                                <a href="dashboard.php?page=all-orders&delete=<?php echo $row['id']; ?>"
                                    class="btn btn-danger btn-sm"
                                    onclick="return confirm('Delete this order?')">
                                    Delete
                                </a>
                            </td>

                        </tr>

                    <?php }
                } else { ?>

                    <tr>
                        <td colspan="7" class="text-center text-danger py-4">
                            No Orders Found
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

    .custom-table {
        width: 100%;
        border-collapse: collapse;
    }

    .custom-table th,
    .custom-table td {
        border: 1px solid #eee;
        padding: 14px;
        text-align: left;
    }
</style>