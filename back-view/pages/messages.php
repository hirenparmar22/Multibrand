<?php
include '../config.php';

// Delete message
if (isset($_GET['delete'])) {
    $delete_id = $_GET['delete'];

    mysqli_query($conn, "DELETE FROM admin_messages WHERE id='$delete_id'");

    echo "<script>alert('Message Deleted');</script>";
    echo "<script>window.location.href='dashboard.php?page=messages';</script>";
}
?>

<div class="page-card">

    <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap">
        <div>
            <h2 class="fw-bold mb-1">All Messages</h2>
            <p class="text-muted mb-0">Customer contact messages</p>
        </div>
    </div>

    <div class="table-responsive">
        <table class="table table-bordered table-hover align-middle bg-white">

            <thead class="table-dark text-center">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Message</th>
                    <th>Date</th>
                    <th>Action</th>
                </tr>
            </thead>

            <tbody>

                <?php
                $msg_query = mysqli_query($conn, "SELECT * FROM admin_messages ORDER BY id DESC");

                if (mysqli_num_rows($msg_query) > 0) {
                    while ($row = mysqli_fetch_assoc($msg_query)) {
                ?>

                        <tr>

                            <td><?php echo $row['id']; ?></td>

                            <td class="fw-semibold">
                                <?php echo htmlspecialchars($row['name']); ?>
                            </td>

                            <td>
                                <a href="mailto:<?php echo $row['email']; ?>">
                                    <?php echo $row['email']; ?>
                                </a>
                            </td>

                            <td style="max-width:250px;" title="<?php echo $row['message']; ?>">
                                <?php echo substr($row['message'], 0, 50); ?>...
                            </td>

                            <td>
                                <?php echo date("d M Y", strtotime($row['created_at'])); ?>
                            </td>

                            <td class="text-center">
                                <a href="dashboard.php?page=messages&delete=<?php echo $row['id']; ?>"
                                    class="btn btn-danger btn-sm"
                                    onclick="return confirm('Delete this message?')">
                                    Delete
                                </a>
                            </td>

                        </tr>

                    <?php }
                } else { ?>

                    <tr>
                        <td colspan="6" class="text-center text-danger py-4">
                            No Messages Found
                        </td>
                    </tr>

                <?php } ?>

            </tbody>
        </table>
    </div>

</div>