<form method="GET" class="mb-4">
    <input type="hidden" name="page" value="users">

    <div class="search-wrapper">
        <input type="text" 
               name="search" 
               class="form-control"
               placeholder="Search by name, username or email"
               value="<?php echo isset($_GET['search']) ? $_GET['search'] : ''; ?>">

        <button type="submit" class="btn btn-primary">
            Search
        </button>
    </div>
</form>

<div class="main-content">
    <h1 class="mb-4 text-dark text-center">All Users</h1>

    <div class="table-responsive">
        <table class="table table-light-subtle table-bordered rounded-3 table-hover align-middle">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Profile</th>
                    <th>Full Name</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Status</th>
                </tr>
            </thead>

            <tbody>
                <?php
                $search = isset($_GET['search']) ? trim(mysqli_real_escape_string($conn, $_GET['search'])) : '';

                if ($search != '') {
                    $sql = "SELECT * FROM users 
                            WHERE full_name LIKE '%$search%' 
                            OR username LIKE '%$search%' 
                            OR email LIKE '%$search%' 
                            ORDER BY id ASC";
                } else {
                    $sql = "SELECT * FROM users ORDER BY id ASC";
                }

                $query = mysqli_query($conn, $sql);

                while ($row = mysqli_fetch_assoc($query)) {
                    $userImage = !empty($row['profile_image'])
                        ? "../uploads/" . $row['profile_image']
                        : "../assets/default-user.png";
                ?>
                    <tr>
                        <td><?php echo $row['id']; ?></td>

                        <td>
                            <img src="<?php echo $userImage; ?>" 
                                 width="45" 
                                 height="45"
                                 style="border-radius:50%; object-fit:cover;">
                        </td>

                        <td><?php echo $row['full_name']; ?></td>
                        <td><?php echo $row['username']; ?></td>
                        <td><?php echo $row['email']; ?></td>
                        <td><?php echo ucfirst($row['role']); ?></td>
                        <td><?php echo ucfirst($row['status']); ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>

<style>
.search-wrapper{
    display:flex;
    gap:10px;
    justify-content:center;
    padding:0 20px;
}

.main-content{
    padding: 20px 25px;
    min-height: calc(100vh - 250px);
}
</style>