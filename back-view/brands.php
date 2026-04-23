<?php
session_start();
include '../config.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: ../login.php");
    exit;
}

$search = "";

if(isset($_GET['search'])){
    $search = mysqli_real_escape_string($conn, $_GET['search']);
}

$query = "SELECT * FROM brands";

if(!empty($search)){
    $query .= " WHERE brand_name LIKE '%$search%'";
}

$query .= " ORDER BY id ASC";

$result = mysqli_query($conn, $query);
?>

<table class="table table-bordered table-hover">
    <thead class="table-dark">
        <tr>
            <th>ID</th>
            <th>Brand Name</th>
            <th>Brand Logo</th>
            <th>Description</th>
            <th>Action</th>
        </tr>
    </thead>

    <tbody>
        <?php
        if(mysqli_num_rows($result) > 0){
            while($row = mysqli_fetch_assoc($result)){
        ?>
        
        <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['brand_name']; ?></td>

            <td>
                <img src="../uploads/<?php echo $row['brand_logo']; ?>" width="60">
            </td>

            <td><?php echo $row['description']; ?></td>

            <td>
                <a href="edit-brand.php?id=<?php echo $row['id']; ?>" class="btn btn-sm btn-primary">
                    Edit
                </a>

                <a href="delete-brand.php?id=<?php echo $row['id']; ?>" class="btn btn-sm btn-danger">
                    Delete
                </a>
                   <a href="add-brand.php" class="btn btn-primary">
                        Add Brand
                </a>
            </td>
        </tr>

        <?php
            }
        } else {
        ?>
            <tr>
                <td colspan="5" class="text-center text-danger">
                    No Brands Found
                </td>
            </tr>
        <?php
        }
        ?>
    </tbody>
</table>