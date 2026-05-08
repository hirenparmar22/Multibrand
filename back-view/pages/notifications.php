<?php
include '../config.php';

// ADD NOTIFICATION
if(isset($_POST['add_notification'])){

    $message = $_POST['message'];
    $type = $_POST['type'];

    mysqli_query($conn, "INSERT INTO admin_notifications(message, type)
    VALUES('$message','$type')");

    echo "<script>alert('Notification Added');</script>";
    echo "<script>window.location.href='dashboard.php?page=notifications';</script>";
}

// DELETE
if(isset($_GET['delete'])){
    $id = $_GET['delete'];

    mysqli_query($conn, "DELETE FROM admin_notifications WHERE id='$id'");

    echo "<script>alert('Notification Deleted');</script>";
    echo "<script>window.location.href='dashboard.php?page=notifications';</script>";
}
?>

<div class="page-card">

    <div class="header">
        <h2>Notifications</h2>
        <p>Manage system alerts</p>
    </div>

    <!-- FORM -->
    <form method="POST" class="notify-form">

        <input type="text" name="message" placeholder="Enter notification message" required>

        <select name="type">
            <option value="info">Info</option>
            <option value="success">Success</option>
            <option value="warning">Warning</option>
        </select>

        <button type="submit" name="add_notification">Add</button>

    </form>

    <hr>

    <!-- LIST -->
    <div class="notification-list">

    <?php
    $query = mysqli_query($conn, "SELECT * FROM admin_notifications ORDER BY id DESC");

    if(mysqli_num_rows($query) > 0){
        while($row = mysqli_fetch_assoc($query)){
    ?>

        <div class="notification <?php echo $row['type']; ?>">

            <div>
                <p><?php echo $row['message']; ?></p>
                <small><?php echo date("d M Y, h:i A", strtotime($row['created_at'])); ?></small>
            </div>

            <a href="dashboard.php?page=notifications&delete=<?php echo $row['id']; ?>" 
               class="delete-btn"
               onclick="return confirm('Delete this notification?')">
               ✖
            </a>

        </div>

    <?php } } else { ?>

        <p class="text-center text-danger">No Notifications Found</p>

    <?php } ?>

    </div>

</div>

<style>
.page-card{
    background:#fff;
    padding:25px;
    border-radius:20px;
    box-shadow:0 10px 30px rgba(0,0,0,0.08);
}

.notify-form{
    display:flex;
    gap:10px;
    flex-wrap:wrap;
}

.notify-form input,
.notify-form select{
    padding:10px;
    border-radius:10px;
    border:1px solid #ddd;
}

.notify-form button{
    background:#4f46e5;
    color:white;
    border:none;
    padding:10px 20px;
    border-radius:10px;
    cursor:pointer;
}

/* LIST */
.notification-list{
    display:flex;
    flex-direction:column;
    gap:15px;
}

.notification{
    display:flex;
    justify-content:space-between;
    align-items:center;
    padding:15px;
    border-radius:12px;
    border-left:5px solid;
}

/* TYPES */
.notification.info{
    background:#e0f2fe;
    border-color:#0284c7;
}

.notification.success{
    background:#dcfce7;
    border-color:#16a34a;
}

.notification.warning{
    background:#fef3c7;
    border-color:#d97706;
}

.delete-btn{
    text-decoration:none;
    color:#dc2626;
    font-weight:bold;
    font-size:18px;
}
</style>