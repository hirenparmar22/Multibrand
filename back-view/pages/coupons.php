<?php
include '../config.php';

// ADD COUPON
if (isset($_POST['add_coupon'])) {

    $code = $_POST['coupon_code'];
    $discount = $_POST['discount'];
    $type = $_POST['type'];
    $expiry = $_POST['expiry'];

    mysqli_query($conn, "INSERT INTO admin_coupons(coupon_code, discount, type, expiry_date)
    VALUES('$code','$discount','$type','$expiry')");

    echo "<script>alert('Coupon Added');</script>";
    echo "<script>window.location.href='dashboard.php?page=coupons';</script>";
}

// DELETE
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];

    mysqli_query($conn, "DELETE FROM admin_coupons WHERE id='$id'");

    echo "<script>alert('Coupon Deleted');</script>";
    echo "<script>window.location.href='dashboard.php?page=coupons';</script>";
}
?>

<div class="page-card">

    <div class="header">
        <h2>Coupons</h2>
        <p>Create and manage promo codes</p>
    </div>

    <!-- FORM -->
    <form method="POST" class="coupon-form">

        <input type="text" name="coupon_code" placeholder="Coupon Code (e.g. SAVE50)" required>

        <input type="number" name="discount" placeholder="Discount" required>

        <select name="type">
            <option value="percent">Percentage (%)</option>
            <option value="flat">Flat (₹)</option>
        </select>

        <input type="date" name="expiry" required>

        <button type="submit" name="add_coupon">Add Coupon</button>

    </form>

    <hr>

    <!-- TABLE -->
    <table class="table table-bordered table-hover">

        <thead class="table-dark text-center">
            <tr>
                <th>ID</th>
                <th>Code</th>
                <th>Discount</th>
                <th>Type</th>
                <th>Expiry</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>

        <tbody>

            <?php
            $query = mysqli_query($conn, "SELECT * FROM admin_coupons ORDER BY id DESC");

            if (mysqli_num_rows($query) > 0) {
                while ($row = mysqli_fetch_assoc($query)) {

                    $today = date('Y-m-d');
                    $status = ($row['expiry_date'] >= $today) ? 'Active' : 'Expired';
            ?>

                    <tr>
                        <td><?php echo $row['id']; ?></td>

                        <td><b><?php echo $row['coupon_code']; ?></b></td>

                        <td>
                            <?php
                            if ($row['type'] == 'percent') {
                                echo $row['discount'] . "%";
                            } else {
                                echo "₹" . $row['discount'];
                            }
                            ?>
                        </td>

                        <td><?php echo ucfirst($row['type']); ?></td>

                        <td><?php echo $row['expiry_date']; ?></td>

                        <td>
                            <?php if ($status == 'Active') { ?>
                                <span class="badge active">Active</span>
                            <?php } else { ?>
                                <span class="badge expired">Expired</span>
                            <?php } ?>
                        </td>

                        <td>
                            <a href="dashboard.php?page=coupons&delete=<?php echo $row['id']; ?>"
                                class="btn btn-danger btn-sm"
                                onclick="return confirm('Delete this coupon?')">
                                Delete
                            </a>
                        </td>
                    </tr>

                <?php }
            } else { ?>

                <tr>
                    <td colspan="7" class="text-center text-danger">No Coupons Found</td>
                </tr>

            <?php } ?>

        </tbody>
    </table>

</div>

<style>
    .page-card {
        background: #fff;
        padding: 25px;
        border-radius: 20px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
    }

    .coupon-form {
        display: flex;
        gap: 15px;
        flex-wrap: wrap;
        margin-bottom: 15px;
    }

    .coupon-form input,
    .coupon-form select {
        padding: 10px;
        border-radius: 10px;
        border: 1px solid #ddd;
    }

    .coupon-form button {
        background: #4f46e5;
        color: white;
        border: none;
        padding: 10px 20px;
        border-radius: 10px;
        cursor: pointer;
    }

    .badge {
        padding: 5px 10px;
        border-radius: 20px;
        font-size: 12px;
    }

    .active {
        background: #dcfce7;
        color: #166534;
    }

    .expired {
        background: #fee2e2;
        color: #991b1b;
    }
</style>