<?php
include '../config.php';

// Add Campaign
if(isset($_POST['add_campaign'])){

    $name = $_POST['campaign_name'];
    $budget = $_POST['budget'];
    $status = $_POST['status'];
    $date = $_POST['start_date'];

    mysqli_query($conn, "INSERT INTO admin_campaigns(campaign_name, budget, status, start_date)
    VALUES('$name','$budget','$status','$date')");

    echo "<script>alert('Campaign Added Successfully');</script>";
    echo "<script>window.location.href='dashboard.php?page=campaigns';</script>";
}

// Delete Campaign
if(isset($_GET['delete'])){
    $id = $_GET['delete'];

    mysqli_query($conn, "DELETE FROM admin_campaigns WHERE id='$id'");

    echo "<script>alert('Campaign Deleted');</script>";
    echo "<script>window.location.href='dashboard.php?page=campaigns';</script>";
}
?>

<div class="page-card">

    <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap">
        <div>
            <h2 class="fw-bold mb-1">Campaigns</h2>
            <p class="text-muted mb-0">Create and manage campaigns</p>
        </div>
    </div>

    <!-- ADD FORM -->
    <form method="POST" class="campaign-form">

        <input type="text" name="campaign_name" placeholder="Campaign Name" required>
        <input type="number" name="budget" placeholder="Budget" required>

        <select name="status">
            <option value="Active">Active</option>
            <option value="Pending">Pending</option>
            <option value="Completed">Completed</option>
        </select>

        <input type="date" name="start_date" required>

        <button type="submit" name="add_campaign">Add Campaign</button>

    </form>

    <hr>

    <!-- TABLE -->
    <div class="table-responsive">
        <table class="table table-bordered table-hover align-middle bg-white">

            <thead class="table-dark text-center">
                <tr>
                    <th>ID</th>
                    <th>Campaign</th>
                    <th>Budget</th>
                    <th>Status</th>
                    <th>Start Date</th>
                    <th>Action</th>
                </tr>
            </thead>

            <tbody>

            <?php
            $query = mysqli_query($conn, "SELECT * FROM admin_campaigns ORDER BY id DESC");

            if(mysqli_num_rows($query) > 0){
                while($row = mysqli_fetch_assoc($query)){
            ?>

            <tr class="text-center">

                <td><?php echo $row['id']; ?></td>

                <td class="fw-semibold">
                    <?php echo $row['campaign_name']; ?>
                </td>

                <td>₹<?php echo $row['budget']; ?></td>

                <td>
                    <?php if($row['status'] == 'Active'){ ?>
                        <span class="status active">Active</span>
                    <?php } elseif($row['status'] == 'Pending'){ ?>
                        <span class="status pending">Pending</span>
                    <?php } else { ?>
                        <span class="status completed">Completed</span>
                    <?php } ?>
                </td>

                <td>
                    <?php echo date("d M Y", strtotime($row['start_date'])); ?>
                </td>

                <td>
                    <a href="dashboard.php?page=campaigns&delete=<?php echo $row['id']; ?>" 
                       class="btn btn-danger btn-sm"
                       onclick="return confirm('Delete this campaign?')">
                       Delete
                    </a>
                </td>

            </tr>

            <?php } } else { ?>

            <tr>
                <td colspan="6" class="text-center text-danger py-4">
                    No Campaigns Found
                </td>
            </tr>

            <?php } ?>

            </tbody>
        </table>
    </div>

</div>

<style>
.page-card{
    background: white;
    border-radius: 24px;
    padding: 25px;
    box-shadow: 0 10px 30px rgba(0,0,0,0.08);
}

/* FORM */
.campaign-form{
    display: flex;
    gap: 15px;
    flex-wrap: wrap;
    margin-bottom: 15px;
}

.campaign-form input,
.campaign-form select{
    padding: 10px;
    border-radius: 10px;
    border: 1px solid #ddd;
}

.campaign-form button{
    background: #4f46e5;
    color: white;
    border: none;
    padding: 10px 20px;
    border-radius: 10px;
    cursor: pointer;
}

/* STATUS */
.status{
    padding: 5px 12px;
    border-radius: 20px;
    font-size: 13px;
    font-weight: 600;
}

.status.active{
    background: #dcfce7;
    color: #166534;
}

.status.pending{
    background: #fef3c7;
    color: #92400e;
}

.status.completed{
    background: #e0e7ff;
    color: #3730a3;
}
</style>