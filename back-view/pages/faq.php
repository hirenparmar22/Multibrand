<?php
include '../config.php';

// ADD FAQ
if(isset($_POST['add_faq'])){

    $question = $_POST['question'];
    $answer = $_POST['answer'];

    mysqli_query($conn, "INSERT INTO admin_faqs(question, answer)
    VALUES('$question','$answer')");

    echo "<script>alert('FAQ Added');</script>";
    echo "<script>window.location.href='dashboard.php?page=faq';</script>";
}

// DELETE FAQ
if(isset($_GET['delete'])){
    $id = $_GET['delete'];

    mysqli_query($conn, "DELETE FROM admin_faqs WHERE id='$id'");

    echo "<script>alert('FAQ Deleted');</script>";
    echo "<script>window.location.href='dashboard.php?page=faq';</script>";
}
?>

<div class="page-card">

    <div class="header">
        <h2>FAQ Management</h2>
        <p>Add and manage frequently asked questions</p>
    </div>

    <!-- ADD FORM -->
    <form method="POST" class="faq-form">

        <input type="text" name="question" placeholder="Enter Question" required>

        <textarea name="answer" placeholder="Enter Answer" rows="3" required></textarea>

        <button type="submit" name="add_faq">Add FAQ</button>

    </form>

    <hr>

    <!-- FAQ TABLE -->
    <table class="table table-bordered table-hover">

        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Question</th>
                <th>Answer</th>
                <th>Action</th>
            </tr>
        </thead>

        <tbody>

        <?php
        $faq_query = mysqli_query($conn, "SELECT * FROM admin_faqs ORDER BY id DESC");

        if(mysqli_num_rows($faq_query) > 0){
            while($row = mysqli_fetch_assoc($faq_query)){
        ?>

        <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['question']; ?></td>
            <td><?php echo $row['answer']; ?></td>

            <td>
                <a href="dashboard.php?page=faq&delete=<?php echo $row['id']; ?>" 
                   class="btn btn-danger btn-sm"
                   onclick="return confirm('Delete this FAQ?')">
                   Delete
                </a>
            </td>
        </tr>

        <?php } } else { ?>

        <tr>
            <td colspan="4" class="text-center text-danger">No FAQ Found</td>
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

.faq-form{
    display:flex;
    flex-direction:column;
    gap:10px;
}

.faq-form input,
.faq-form textarea{
    padding:10px;
    border-radius:10px;
    border:1px solid #ddd;
}

.faq-form button{
    width:150px;
    background:#4f46e5;
    color:white;
    border:none;
    padding:10px;
    border-radius:10px;
    cursor:pointer;
}
</style>