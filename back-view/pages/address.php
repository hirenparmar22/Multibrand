<?php
include '../config.php';

if(isset($_POST['save_address'])){

    $full_name = $_POST['full_name'];
    $mobile_number = $_POST['mobile_number'];
    $address_line = $_POST['address_line'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $pincode = $_POST['pincode'];

    mysqli_query($conn, "INSERT INTO admin_addresses(
        full_name,
        mobile_number,
        address_line,
        city,
        state,
        pincode
    ) VALUES(
        '$full_name',
        '$mobile_number',
        '$address_line',
        '$city',
        '$state',
        '$pincode'
    )");

    echo "<script>alert('Address Saved Successfully');</script>";
    echo "<script>window.location.href='dashboard.php?page=address';</script>";
}

if(isset($_GET['delete'])){

    $delete_id = $_GET['delete'];

    mysqli_query($conn, "DELETE FROM admin_addresses WHERE id='$delete_id'");

    echo "<script>alert('Address Deleted Successfully');</script>";
    echo "<script>window.location.href='dashboard.php?page=address';</script>";
}
?>

<div class="page-content">

    <div class="page-header">
        <h2>Address</h2>
        <p>Add and manage customer address records.</p>
    </div>

    <form method="POST" class="address-form">

        <div class="form-group">
            <label>Full Name</label>
            <input type="text" name="full_name" class="form-control" required>
        </div>

        <div class="form-group">
            <label>Mobile Number</label>
            <input type="text" name="mobile_number" class="form-control" required>
        </div>

        <div class="form-group full-width">
            <label>Address Line</label>
            <textarea name="address_line" class="form-control" rows="3" required></textarea>
        </div>

        <div class="form-group">
            <label>City</label>
            <input type="text" name="city" class="form-control" required>
        </div>

        <div class="form-group">
            <label>State</label>
            <input type="text" name="state" class="form-control" required>
        </div>

        <div class="form-group">
            <label>Pincode</label>
            <input type="text" name="pincode" class="form-control" required>
        </div>

        <button type="submit" name="save_address" class="btn-save">
            Save Address
        </button>

    </form>

    <hr>
<div class="table-responsive">
    <table class="table table-bordered table-hover align-middle bg-white">

        <thead class="table-dark text-center">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Mobile</th>
                <th>Address</th>
                <th>City</th>
                <th>State</th>
                <th>Pincode</th>
                <th>Action</th>
            </tr>
        </thead>

        <tbody>

        <?php
        $address_query = mysqli_query($conn, "SELECT * FROM admin_addresses ORDER BY id DESC");

        if(mysqli_num_rows($address_query) > 0){
            while($row = mysqli_fetch_assoc($address_query)){
        ?>

        <tr class="align-middle">

            <td><?php echo $row['id']; ?></td>

            <td class="fw-semibold">
                <?php echo htmlspecialchars($row['full_name']); ?>
            </td>

            <td><?php echo $row['mobile_number']; ?></td>

            <td style="max-width:250px;">
                <?php echo substr($row['address_line'], 0, 50); ?>...
            </td>

            <td><?php echo $row['city']; ?></td>
            <td><?php echo $row['state']; ?></td>
            <td><?php echo $row['pincode']; ?></td>

            <td class="text-center">
                <a href="dashboard.php?page=address&delete=<?php echo $row['id']; ?>" 
                   class="btn btn-danger btn-sm"
                   onclick="return confirm('Delete this address?')">
                   Delete
                </a>
            </td>

        </tr>

        <?php } } else { ?>

        <tr>
            <td colspan="8" class="text-center text-danger py-4">
                No Address Found
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

.address-form {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 20px;
}

.full-width {
    grid-column: span 2;
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

.btn-save {
    background: #4f46e5;
    color: #fff;
    border: none;
    padding: 14px;
    border-radius: 10px;
    cursor: pointer;
    max-width: 220px;
}

</style>