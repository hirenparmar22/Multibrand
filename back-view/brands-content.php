<?php
$brandQuery = mysqli_query($conn, "SELECT * FROM brands ORDER BY id DESC");
?>

<div class="page-card">

    <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap px-5">
        
        <div>
            <h2 class="fw-bold mb-1">Manage Brands</h2>
            <p class="text-muted mb-0">Add, edit or delete brand items</p>
        </div>

        <a href="add-brands.php" class="btn btn-dark rounded-3">
            + Add New Brand
        </a>

    </div>

    <div class="table-responsive">
        <table class="table table-bordered table-hover align-middle bg-white">

            <thead class="table-dark text-center">
                <tr>
                    <th>ID</th>
                    <th>Brand Name</th>
                    <th>Brand Logo</th>
                    <th>Description</th>
                    <th>Action</th>
                </tr>
            </thead>

            <tbody>

                <?php if(mysqli_num_rows($brandQuery) > 0){ ?>

                    <?php while($brand = mysqli_fetch_assoc($brandQuery)) { ?>

                    <tr class="text-center align-middle">
                        
                        <td><?php echo $brand['id']; ?></td>

                        <td><?php echo $brand['brand_name']; ?></td>

                        <td>
                            <img src="../uploads/<?php echo $brand['brand_logo']; ?>" 
                                 alt="Brand Logo"
                                 width="60" 
                                 height="60"
                                 style="object-fit: cover; border-radius: 12px;">
                        </td>

                        <td>
                            <?php echo $brand['description']; ?>
                        </td>

                        <td>
                            <div class="d-flex justify-content-center gap-2">
                                
                                <a href="edit-brands.php?id=<?php echo $brand['id']; ?>" 
                                   class="btn btn-primary btn-sm rounded-3">
                                   Edit
                                </a>

                                <a href="delete-brands.php?id=<?php echo $brand['id']; ?>" 
                                   class="btn btn-danger btn-sm rounded-3"
                                   onclick="return confirm('Are you sure you want to delete this brand?')">
                                   Delete
                                </a>

                            </div>
                        </td>

                    </tr>

                    <?php } ?>

                <?php } else { ?>

                    <tr>
                        <td colspan="5" class="text-center text-danger py-4">
                            No Brands Found
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

.table img{
    border: 1px solid #ddd;
    padding: 3px;
    background: white;
}

.table td,
.table th{
    vertical-align: middle;
}

.table td{
    font-size: 14px;
}

.btn{
    font-size: 13px;
    padding: 7px 14px;
}
</style>
