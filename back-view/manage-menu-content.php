<?php
$result = mysqli_query($conn, "
    SELECT * FROM sidebar_menu 
    WHERE menu_name NOT IN (
        'Dashboard',
        'Users',
        'Brands',
        'Campaigns',
        'Messages',
        'Payments',
        'Settings'
    )
    ORDER BY id ASC
");
?>

<div class="page-card">

    <div class="d-flex justify-content-between align-items-center  mb-4 flex-wrap px-5">
        <div>
            <h2 class="fw-bold mb-1">Manage Sidebar Menu</h2>
            <p class="text-muted mb-0">Add, edit or delete sidebar menu items</p>
        </div>

        <a href="add-menu.php" class="btn btn-dark rounded-3">
            + Add New Menu
        </a>
    </div>

    <div class="table-responsive">
        <table class="table table-bordered table-hover align-middle bg-white">

            <thead class="table-dark text-center">
                <tr>
                    <th>ID</th>
                    <th>Menu Name</th>
                    <th>Menu Link</th>
                    <th>Menu Icon</th>
                    <th>Action</th>
                </tr>
            </thead>

            <tbody>

                <?php if(mysqli_num_rows($result) > 0){ ?>
                    
                    <?php while($row = mysqli_fetch_assoc($result)) { ?>

                    <tr class="text-center">
                        <td><?php echo $row['id']; ?></td>

                        <td><?php echo $row['menu_name']; ?></td>

                        <td><?php echo $row['menu_link']; ?></td>

                        <td>
                            <div  class="d-flex align-items-center justify-content-center">
                                <i class="<?php echo $row['menu_icon']; ?> fs-5" style="max-width: 30px;"></i>
                                
                                <div class="small text-muted  ms-3 text-start "style="min-width: 120px;">
                                    <?php echo $row['menu_icon']; ?>
                                </div>
                            </div>
                        </td>

                        <td>
    <div style="display:flex; gap:8px; flex-wrap:wrap; justify-content:center; ">

        <a href="edit-menu.php?id=<?php echo $row['id']; ?>" 
           class="btn btn-primary btn-sm rounded-3">
            Edit
        </a>

        <a href="delete-menu.php?id=<?php echo $row['id']; ?>" 
           class="btn btn-danger btn-sm rounded-3"
           onclick="return confirm('Are you sure you want to delete this menu?')">
            Delete
        </a>

        <a href="dashboard.php?page=<?php echo strtolower(str_replace('.php', '', $row['menu_link'])); ?>" 
           class="btn btn-success btn-sm rounded-3">
            Open
        </a>

    </div>
</td>
                    </tr>

                    <?php } ?>

                <?php } else { ?>

                    <tr>
                        <td colspan="5" class="text-center text-danger py-4">
                            No Menu Found
                        </td>
                    </tr>

                <?php } ?>

            </tbody>

        </table>
    </div>

</div>