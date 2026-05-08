<?php
include '../config.php';

// REPLY
if(isset($_POST['send_reply'])){

    $id = $_POST['id'];
    $reply = $_POST['reply'];

    mysqli_query($conn, "UPDATE admin_support 
    SET reply='$reply', status='Replied' 
    WHERE id='$id'");

    echo "<script>alert('Reply Sent');</script>";
    echo "<script>window.location.href='dashboard.php?page=support';</script>";
}

// DELETE
if(isset($_GET['delete'])){
    $id = $_GET['delete'];

    mysqli_query($conn, "DELETE FROM admin_support WHERE id='$id'");

    echo "<script>alert('Message Deleted');</script>";
    echo "<script>window.location.href='dashboard.php?page=support';</script>";
}
?>

<div class="page-card">

    <div class="header">
        <h2>Support Messages</h2>
        <p>Manage user queries and replies</p>
    </div>

    <table class="table table-bordered table-hover">

        <thead class="table-dark text-center">
            <tr>
                <th>ID</th>
                <th>User</th>
                <th>Email</th>
                <th>Message</th>
                <th>Reply</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>

        <tbody>

        <?php
        $query = mysqli_query($conn, "SELECT * FROM admin_support ORDER BY id DESC");

        if(mysqli_num_rows($query) > 0){
            while($row = mysqli_fetch_assoc($query)){
        ?>

        <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['name']; ?></td>
            <td><?php echo $row['email']; ?></td>
            <td><?php echo $row['message']; ?></td>

            <td>
                <?php if($row['reply']){ ?>
                    <?php echo $row['reply']; ?>
                <?php } else { ?>

                <form method="POST" class="reply-form">
                    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                    <input type="text" name="reply" placeholder="Write reply..." required>
                    <button type="submit" name="send_reply">Send</button>
                </form>

                <?php } ?>
            </td>

            <td>
                <?php if($row['status'] == 'Replied'){ ?>
                    <span class="badge success">Replied</span>
                <?php } else { ?>
                    <span class="badge pending">Pending</span>
                <?php } ?>
            </td>

            <td>
                <a href="dashboard.php?page=support&delete=<?php echo $row['id']; ?>" 
                   class="btn btn-danger btn-sm"
                   onclick="return confirm('Delete this message?')">
                   Delete
                </a>
            </td>
        </tr>

        <?php } } else { ?>

        <tr>
            <td colspan="7" class="text-center text-danger">No Messages Found</td>
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

/* REPLY FORM */
.reply-form{
    display:flex;
    gap:5px;
}

.reply-form input{
    padding:6px;
    border-radius:8px;
    border:1px solid #ddd;
}

.reply-form button{
    background:#4f46e5;
    color:white;
    border:none;
    padding:6px 10px;
    border-radius:8px;
    cursor:pointer;
}

/* STATUS */
.badge{
    padding:5px 10px;
    border-radius:20px;
    font-size:12px;
}

.success{
    background:#dcfce7;
    color:#166534;
}

.pending{
    background:#fef3c7;
    color:#92400e;
}
</style>