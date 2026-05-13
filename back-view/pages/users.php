<?php
header("Location: dashboard.php?page=users");
include __DIR__ . '/../config.php';
exit;
?>
<!-- <div class="dropdown-menu-box">

    <div class="dropdown-toggle" onclick="toggleDropdown('userMenu')">
        <div style="display: flex; align-items: center; justify-content: space-between; width: 100%; padding-right: 12px;">

            <div style="display: flex; align-items: center; gap: 10px;">
                <i class="fas fa-users"></i>
                <span>Users</span>
            </div>

            <i class="fas fa-chevron-down arrow" style="margin-left: 20px;"></i>

        </div>
    </div>

    <div class="dropdown-content" id="userMenu">

        <a href="dashboard.php?page=users" class="submenu-link" style="display: flex; align-items: center; justify-content: space-between;">
            <div style="display: flex; align-items: center; gap: 10px;">
                <i class="fas fa-user-friends"></i>
                <span>All Users</span>
            </div>
            <i class="fas fa-chevron-right"></i>
        </a>

        <a href="dashboard.php?page=users" class="submenu-link" style="display: flex; align-items: center; justify-content: space-between;">
            <div style="display: flex; align-items: center; gap: 10px;">
                <i class="fas fa-user-plus"></i>
                <span>Add User</span>
            </div>
            <i class="fas fa-chevron-right"></i>
        </a>

        <a href="dashboard.php?page=users" class="submenu-link" style="display: flex; align-items: center; justify-content: space-between;">
            <div style="display: flex; align-items: center; gap: 10px;">
                <i class="fas fa-user-slash"></i>
                <span>Blocked Users</span>
            </div>
            <i class="fas fa-chevron-right"></i>
        </a>

    </div>

</div> -->