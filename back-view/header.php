<?php
if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 'admin') {
    header("Location: ../login.php");
    exit;
}
?>

<header class="header-container px-4 py-3 mb-4">

    <div class="header-inner d-flex flex-wrap justify-content-between align-items-center px-4 py-3 gap-3 rounded-4 shadow-small border border-secondary-subtle bg-white-subtle">

        <!-- Left -->
        <div class="d-flex align-items-center gap-3 flex-wrap text-dark">

            <!-- <div class="dropdown">
                <button class="btn btn-outline-light rounded-3 text-dark border border-dark dropdown-toggle"
                    type="button"
                    data-bs-toggle="dropdown"
                    aria-expanded="false">
                    <i class="fas fa-bars"></i>
                </button>

                <ul class="dropdown-menu shadow rounded-3 border-0">

                    <li><h6 class="dropdown-header">Quick Access</h6></li>

                    <li><a class="dropdown-item" href="#"><i class="fas fa-user me-2"></i> My Profile</a></li>
                    <li><a class="dropdown-item" href="#"><i class="fas fa-bell me-2"></i> Notifications</a></li>
                    <li><a class="dropdown-item" href="#"><i class="fas fa-plus-circle me-2"></i> Add User</a></li>
                    <li><a class="dropdown-item" href="#"><i class="fas fa-store me-2"></i> Add Brand</a></li>
                    <li><a class="dropdown-item" href="#"><i class="fas fa-chart-line me-2"></i> Analytics</a></li>

                    <li><hr class="dropdown-divider"></li>

                    <li><h6 class="dropdown-header">Settings</h6></li>

                    <li><a class="dropdown-item" href="#"><i class="fas fa-key me-2"></i> Change Password</a></li>
                    <li><a class="dropdown-item" href="#"><i class="fas fa-cog me-2"></i> Website Settings</a></li>
                    <li><a class="dropdown-item" href="#"><i class="fas fa-lock me-2"></i> Lock Screen</a></li>

                    <li><hr class="dropdown-divider"></li>

                    <li><a class="dropdown-item text-danger" href="../logout.php"><i class="fas fa-sign-out-alt me-2"></i> Logout</a></li>
                </ul>
            </div> -->

            <div>
                <h4 class="fw-bold mb-0">Admin Panel</h4>
                <small class="text-secondary">Manage Your Website Easily</small>
            </div>

        </div>

        <!-- Search -->
        <!-- <div class="search-box flex-grow-1"> -->
            <!-- <div class="input-group">
                <span class="input-group-text bg-light-subtle border-secondary text-dark">
                    <i class="fas fa-search"></i>
                </span>

                <input type="text"
                    class="form-control bg-light-subtle border-secondary text-dark"
                    placeholder="Search users, orders, brands...">
            </div>
        </div> -->

        <!-- Right -->
        <div class="header-right d-flex align-items-center gap-2 flex-wrap">

            <button class="btn btn-white border border-secondary">
                <i class="fas fa-bell"></i>
            </button>

            <button class="btn btn-white border border-secondary">
                <i class="fas fa-envelope"></i>
            </button>

            <?php
                $adminImage = !empty($_SESSION['profile_image'])
                ? "../uploads/" . $_SESSION['profile_image']
                : "../assets/default-user.png";
            ?>

           
            
                <div class="d-flex align-items-center gap-2 bg-white rounded-4 px-2 py-1 border"
                  
                    style="cursor:pointer;">

                    <img src="<?php echo $adminImage; ?>" alt="Admin"
                        class="rounded-circle border border-danger"
                        style="width:45px; height:45px; object-fit:cover;">

                    <div class="d-none d-md-block ">
                        <h6 class="text-dark mb-0">
                        <?php echo $_SESSION['full_name']; ?>
                        </h6>
                        <small class="text-dark">Administration</small>
                    </div>
                    <!-- <i class="fas fa-chevron-down text-secondary small ms-1"></i> -->
                </div>

            <!-- <a href="../logout.php" class="btn btn-danger">
                <i class="fas fa-sign-out-alt me-1"></i> Logout
            </a> -->

        </div>
    </div>
</header>

<style>
.header-container{
    backdrop-filter: blur(15px);
    -webkit-backdrop-filter: blur(15px);
}

/* .search-box{
    max-width: 420px;
} */

.dropdown-item:hover{
    background-color: #f1f1f1;
    padding-left: 18px;
    transition: 0.3s;
}
.header-inner{
    flex-direction: row;
}

.header-right{
    justify-content: flex-end;
}


@media(max-width:991px){

    .search-box{
        width: 100%;
        max-width: 100%;
        order: 3;
    }
    .header-right{
        justify-content: center;
    }
    /* .header-container .d-flex.justify-content-between{
        flex-direction: column;
        align-items: stretch !important;
    } */
      

    .header-container .btn-danger{
        width: 100%;
    }

    /* .header-container .d-flex.align-items-center.gap-2.flex-wrap{
        justify-content: center;
    } */
}



/* mobile only */
@media(max-width:991px){
    .header-inner{
        flex-direction: column;
        align-items: stretch !important;
    }
}
@media(max-width:576px){

    .header-container h4{
        font-size: 18px;
    }

    .header-container small{
        font-size: 12px;
    }

    .header-container .btn{
        font-size: 13px;
    }

    .header-container img{
        width: 40px !important;
        height: 40px !important;
    }
}
</style>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>