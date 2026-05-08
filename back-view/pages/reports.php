<?php
include '../config.php';

// SUMMARY DATA
$totalUsers = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) as total FROM users"))['total'];
$totalOrders = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) as total FROM admin_orders"))['total'];
$totalRevenue = mysqli_fetch_assoc(mysqli_query($conn, "SELECT SUM(total_price) as total FROM admin_orders"))['total'];
?>

<div class="page-card">

    <div class="header">
        <h2>Reports</h2>
        <p>System overview and recent activities</p>
    </div>

    <!-- SUMMARY BOX -->
    <div class="stats-box">

        <div class="stat">
            <h3><?php echo $totalUsers; ?></h3>
            <p>Total Users</p>
        </div>

        <div class="stat">
            <h3><?php echo $totalOrders; ?></h3>
            <p>Total Orders</p>
        </div>

        <div class="stat">
            <h3>₹<?php echo $totalRevenue ? $totalRevenue : 0; ?></h3>
            <p>Total Revenue</p>
        </div>

    </div>

    <hr>

    <!-- RECENT ORDERS -->
    <h3>Recent Orders</h3>

    <table class="table table-bordered table-hover">

        <thead class="table-dark text-center">
            <tr>
                <th>ID</th>
                <th>Customer</th>
                <th>Product</th>
                <th>Price</th>
                <th>Status</th>
            </tr>
        </thead>

        <tbody>

        <?php
        $order_query = mysqli_query($conn, "SELECT * FROM admin_orders ORDER BY id DESC LIMIT 10");

        if(mysqli_num_rows($order_query) > 0){
            while($row = mysqli_fetch_assoc($order_query)){
        ?>

        <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['customer_name']; ?></td>
            <td><?php echo $row['product_name']; ?></td>
            <td>₹<?php echo $row['total_price']; ?></td>

            <td>
                <?php if($row['status'] == 'Delivered'){ ?>
                    <span class="badge delivered">Delivered</span>
                <?php } elseif($row['status'] == 'Pending'){ ?>
                    <span class="badge pending">Pending</span>
                <?php } else { ?>
                    <span class="badge cancelled">Cancelled</span>
                <?php } ?>
            </td>
        </tr>

        <?php } } else { ?>

        <tr>
            <td colspan="5" class="text-center text-danger">No Orders Found</td>
        </tr>

        <?php } ?>

        </tbody>
    </table>

</div>

<style>
.page-card{
    background:#fff;
    padding:25px;
    border-radius:20px;
    box-shadow:0 10px 30px rgba(0,0,0,0.08);
}

.stats-box{
    display:flex;
    gap:20px;
    flex-wrap:wrap;
    margin-bottom:20px;
}

.stat{
    flex:1;
    background:#f5f5f5;
    padding:20px;
    border-radius:15px;
    text-align:center;
}

.stat h3{
    font-size:28px;
}

.stat p{
    color:#666;
}

/* STATUS BADGES */
.badge{
    padding:5px 10px;
    border-radius:20px;
    font-size:12px;
}

.delivered{
    background:#dcfce7;
    color:#166534;
}

.pending{
    background:#fef3c7;
    color:#92400e;
}

.cancelled{
    background:#fee2e2;
    color:#991b1b;
}
</style>