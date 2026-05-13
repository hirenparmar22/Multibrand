<?php
include '../config.php';

// Add Offer
if (isset($_POST['add_offer'])) {

    $title = $_POST['title'];
    $discount = $_POST['discount'];
    $expiry = $_POST['expiry'];

    mysqli_query($conn, "INSERT INTO admin_offers(title, discount, expiry_date)
    VALUES('$title','$discount','$expiry')");

    echo "<script>alert('Offer Added');</script>";
    echo "<script>window.location.href='dashboard.php?page=offers';</script>";
}

// Delete
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];

    mysqli_query($conn, "DELETE FROM admin_offers WHERE id='$id'");

    echo "<script>alert('Offer Deleted');</script>";
    echo "<script>window.location.href='dashboard.php?page=offers';</script>";
}
?>

<div class="page-card">

    <div class="header">
        <h2>Offers</h2>
        <p>Manage discount offers</p>
    </div>

    <!-- FORM -->
    <form method="POST" class="offer-form">
        <input type="text" name="title" placeholder="Offer Title" required>
        <input type="number" name="discount" placeholder="Discount %" required>
        <input type="date" name="expiry" required>

        <button type="submit" name="add_offer">Add Offer</button>
    </form>

    <hr>

    <!-- TABLE -->
    <table class="table table-bordered table-hover">

        <thead class="table-dark text-center">
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Discount</th>
                <th>Expiry</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>

        <tbody>

            <?php
            $query = mysqli_query($conn, "SELECT * FROM admin_offers ORDER BY id DESC");

            if (mysqli_num_rows($query) > 0) {
                while ($row = mysqli_fetch_assoc($query)) {

                    $today = date('Y-m-d');
                    $status = ($row['expiry_date'] >= $today) ? 'Active' : 'Expired';
            ?>

                    <tr>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo $row['title']; ?></td>
                        <td><?php echo $row['discount']; ?>%</td>
                        <td><?php echo $row['expiry_date']; ?></td>

                        <td>
                            <?php if ($status == 'Active') { ?>
                                <span class="badge active">Active</span>
                            <?php } else { ?>
                                <span class="badge expired">Expired</span>
                            <?php } ?>
                        </td>

                        <td>
                            <a href="dashboard.php?page=offers&delete=<?php echo $row['id']; ?>"
                                class="btn btn-danger btn-sm"
                                onclick="return confirm('Delete this offer?')">
                                Delete
                            </a>
                        </td>
                    </tr>

                <?php }
            } else { ?>

                <tr>
                    <td colspan="6" class="text-center text-danger">No Offers Found</td>
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

    .offer-form {
        display: flex;
        gap: 15px;
        flex-wrap: wrap;
        margin-bottom: 15px;
    }

    .offer-form input {
        padding: 10px;
        border-radius: 10px;
        border: 1px solid #ddd;
    }

    .offer-form button {
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