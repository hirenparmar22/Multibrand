<?php
$currentPage = basename($_SERVER['PHP_SELF']);

// $userCountQuery = mysqli_query($conn, "SELECT COUNT(*) as total_users FROM users");
// $userCountData = mysqli_fetch_assoc($userCountQuery);
// $totalUsers = $userCountData['total_users'];

?>

<div class="sidebar">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <div class="sidebar-top">

        <div class="brand-section">
            <div class="brand-logo">
                <i class="fas fa-crown"></i>
            </div>

            <div class="brand-text">
                <h2>BrandPro</h2>
                <p>Premium Admin Panel</p>
            </div>
        </div>

        <?php
        $adminImage = !empty($_SESSION['profile_image'])
            ? "../uploads/" . $_SESSION['profile_image']
            : "../assets/default-user.png";
        ?>

        <div class="profile-card">
            <div class="profile-image-box">
                <img src="<?php echo $adminImage; ?>" alt="Admin" class="profile-image">
            </div>

            <h3><?php echo $_SESSION['full_name']; ?></h3>
            <p class="text-dark">Administration</p>
        </div>

         <a href="../logout.php" class="logout-btn">
            <i class="fas fa-sign-out-alt"></i>
            Logout
        </a>

        <div class="menu-title">MAIN MENU</div>
            <div class="menu-list">

    <a href="dashboard.php?page=dashboard" class="menu-item">
        <span>Dashboard</span>
        <i class="fas fa-home"></i>
        
    </a>

     <a href="dashboard.php?page=users" class="menu-item">
        <span>Users</span>
        <i class="fas fa-users"></i>
        
    </a>

    <div class="dropdown-menu-box">

        
        <div class="dropdown-toggle" onclick="toggleDropdown('productMenu')">
            <div style="display: flex; align-items: center; justify-content: space-between; width: 100%; padding-right: 12px;">

                <div style="display: flex; align-items: center;">
                    <span>Product</span>        
                </div>
                <i class="fas fa-box"></i>
            </div>
        </div>

        <div class="dropdown-content" id="productMenu">

            <a href="dashboard.php?page=add-product" class="submenu-link"  style="display: flex; align-items: center; justify-content: space-between;">
                <span>Add Product</span>
                <i class="fas fa-plus-circle"></i>
                
            </a>
            <a href="dashboard.php?page=edit-product" class="submenu-link"  style="display: flex; align-items: center; justify-content: space-between;">
                <span>Edit Product</span>
                <i class="fas fa-edit"></i>
                
            </a>

            <div class="nested-dropdown-box">

                <div class="nested-toggle" onclick="toggleDropdown('categoriesMenu')">
                      <div style="display: flex; align-items: center; justify-content: space-between; width: 100%; padding-right: 12px;">
                        <div style="display: flex; align-items: center; gap: 55px;">
                            <span>Categories</span>
                            <i class="fas fa-list"></i>
                            
                        </div>
                    <i class="fas fa-chevron-down arrow" style="margin-left: 20px;"></i>
                      </div>
                </div>

                <div class="nested-content" id="categoriesMenu">
                    <a href="dashboard.php?page=all-categories" class="nested-link">All Categories</a>
                    <a href="dashboard.php?page=add-category" class="nested-link">Add Category</a>
                    <a href="dashboard.php?page=edit-category" class="nested-link">Edit Category</a>
                </div>

            </div>

            <div class="nested-dropdown-box">

                <div class="nested-toggle" onclick="toggleDropdown('attributeMenu')">
                    <div style="display: flex; align-items: center; justify-content: space-between; width: 100%; padding-right: 12px;">

                        <div style="display: flex; align-items: center; gap: 60px;">
                            <span>Attributes</span>
                            <i class="fas fa-sliders-h"></i>
                            
                        </div>

                        <i class="fas fa-chevron-down arrow" style="margin-left: 20px;"></i>

                    </div>
                </div>

                <div class="nested-content" id="attributeMenu">
                    <a href="dashboard.php?page=all-attributes" class="nested-link">All Attributes</a>
                    <a href="dashboard.php?page=edit-attribute" class="nested-link">Edit Attribute</a>
                </div>

            </div>
            <a href="dashboard.php?page=brands" class="submenu-link"  style="display: flex; align-items: center; justify-content: space-between;">
                <span>Brands</span>
                <i class="fas fa-tags" style="margin-right: 8px;"></i>
                
            </a>

            <a href="dashboard.php?page=color" class="submenu-link"  style="display: flex; align-items: center; justify-content: space-between;">
                <span>Color</span>
                <i class="fas fa-palette" style="margin-right: 8px;"></i>
               
            </a>
        </div>

    </div>


   

      
    

    <div class="dropdown-menu-box">

    <div class="dropdown-toggle" onclick="toggleDropdown('orderMenu')">
        <div style="display: flex; align-items: center; justify-content: space-between; width: 100%; padding-right: 12px;">

                <span>Orders</span>             
            
                <i class="fas fa-shopping-bag"></i>
        </div>
    </div>

    <div class="dropdown-content" id="orderMenu">
        <a href="dashboard.php?page=all-orders" class="submenu-link"  style="display: flex; align-items: center; justify-content: space-between;">
            <span>All Orders</span>
            <i class="fas fa-list-alt"></i>
            
        </a>
        <a href="dashboard.php?page=address" class="submenu-link"  style="display: flex; align-items: center; justify-content: space-between;">
            <span>Address</span><i class="fas fa-map-marker-alt"></i>
            
        </a>
        <!-- <a href="dashboard.php?page=pending-orders" class="submenu-link">
            <i class="fas fa-clock"></i>
            <span>Address</span>
        </a> -->

        <!-- <a href="dashboard.php?page=completed-orders" class="submenu-link">
            <i class="fas fa-check-circle"></i>
            <span>Completed Orders</span>
        </a> -->

        <!-- <a href="dashboard.php?page=cancelled-orders" class="submenu-link">
            <i class="fas fa-times-circle"></i>
            <span>Cancelled Orders</span>
        </a> -->
    </div>

</div>

    <a href="dashboard.php?page=settings" class="menu-item">
        <span>Setting</span>
        <i class="fas fa-cog"></i>
        
    </a>

</div>

    </div>

    <div class="sidebar-bottom">

        <div class="manage-menu-wrapper">
            <a href="dashboard.php?page=manage-menu" class="manage-menu-btn">
                <i class="fas fa-pen"></i>
                <span>Manage Menu</span>
            </a>
        </div>

       

    </div>

</div>

<style>
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Segoe UI', sans-serif;
}

body {
    background: whitesmoke;
}

.sidebar {
    width: 310px;
    height: 100vh;
    background: whitesmoke;
    border-right: 1px solid rgba(0,0,0,0.08);
    padding: 24px;
    position: fixed;
    left: 0;
    top: 0;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    overflow-y: auto;
}

.sidebar::-webkit-scrollbar {
    width: 6px;
}

.sidebar::-webkit-scrollbar-thumb {
    background: rgba(0,0,0,0.15);
    border-radius: 20px;
}

.brand-section {
    display: flex;
    align-items: center;
    gap: 14px;
    margin-bottom: 28px;
}

.brand-logo {
    width: 62px;
    height: 62px;
    border-radius: 20px;
    background: white;
    color: black;
    display: flex;
    justify-content: center;
    align-items: center;
    font-size: 24px;
}

.brand-text h2 {
    font-size: 25px;
    font-weight: 700;
    color: black;
}

.brand-text p {
    color: black;
    font-size: 13px;
    margin-top: 4px;
}

.profile-card {
    background: white;
    border-radius: 28px;
    padding: 24px;
    text-align: center;
    margin-bottom: 28px;
}

.profile-image-box {
    width: fit-content;
    margin: auto;
}

.profile-image {
    width: 95px;
    height: 95px;
    border-radius: 50%;
    object-fit: cover;
    border: 4px solid #7c3aed;
}

.profile-card h3 {
    color: black;
    margin-top: 16px;
    font-size: 20px;
}

.profile-card p {
    font-size: 13px;
    margin-top: 5px;
}

.menu-title {
    color: #64748b;
    font-size: 12px;
    letter-spacing: 2px;
    margin-bottom: 14px;
    padding-left: 6px;
}

.sidebar-bottom {
    margin-top: 20px;
}

.manage-menu-wrapper {
    display: flex;
    align-items: center;
    gap: 10px;
    margin-bottom: 20px;
}

.manage-menu-btn {
    width: 100%;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 10px;
    padding: 15px;
    border-radius: 18px;
    text-decoration: none;
    background: #7c3aed;
    color: white;
    font-size: 15px;
    font-weight: 600;
    transition: 0.3s ease;
}

.manage-menu-btn:hover {
    background: black;
    color: white;
}
.menu-list {
    display: flex;
    flex-direction: column;
    gap: 10px;
}

.menu-item,
.dropdown-toggle,
.nested-toggle {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 15px 18px;
    border-radius: 16px;
    text-decoration: none;
    color: black;
    background: white;
    cursor: pointer;
    transition: 0.3s;
}

.menu-item:hover,
.dropdown-toggle:hover,
.nested-toggle:hover {
    background: rgba(124, 58, 237, 0.08);
    transform: translateX(5px);
}

.dropdown-toggle div,
.nested-toggle div {
    display: flex;
    align-items: center;
    gap: 12px;
}

.dropdown-content,
.nested-content {
    display: none;
    margin-top: 8px;
    margin-left: 18px;
    padding-left: 12px;
    border-left: 2px solid #7c3aed;
}

.submenu-link,
.nested-link {
    display: block;
    padding: 10px 14px;
    margin-top: 6px;
    text-decoration: none;
    color: #444;
    border-radius: 10px;
    background: #f8f8f8;
    transition: 0.3s;
}

.submenu-link:hover,
.nested-link:hover {
    background: #ececec;
}

.arrow {
    transition: 0.3s;
}


.logout-btn {
    width: 100%;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 10px;
    padding: 15px;
    border-radius: 18px;
    text-decoration: none;
    background: #ef4444;
    color: white;
    font-size: 15px;
    font-weight: 600;
    transition: 0.3s ease;
    margin-bottom:30px;
}

.logout-btn:hover {
    background: black;
    color: white;
}

@media (max-width: 991px) {
    .sidebar {
        width: 95px;
        padding: 18px 10px;
    }

    .brand-text,
    .profile-card h3,
    .profile-card p,
    .menu-title {
        display: none;
    }

    .manage-menu-btn,
    .logout-btn {
        justify-content: center;
        padding: 14px 10px;
    }

    .manage-menu-btn span,
    .logout-btn span {
        display: none;
    }

    .profile-card {
        padding: 15px 10px;
    }

    .profile-image {
        width: 55px;
        height: 55px;
    }
}
</style>


<script>
// function toggleDropdown(menuId) {
//     const menu = document.getElementById(menuId);

//     if (menu.style.display === 'block') {
//         menu.style.display = 'none';
//     } else {
//         menu.style.display = 'block';
//     }
// }
function toggleDropdown(id){

    let menu = document.getElementById(id);
    let toggle = menu.previousElementSibling;

    if(menu.style.display === "block"){
        menu.style.display = "none";
        toggle.classList.remove("active");
    } else {
        menu.style.display = "block";
        toggle.classList.add("active");
    }
}
</script>