<?php
session_start();
include '../config.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: ../login.php");
    exit;
}

$totalUsers = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) as total FROM users"))['total'];
$totalBrands = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) as total FROM brands"))['total'];
$totalCampaigns = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) as total FROM admin_campaigns"))['total'];
$totalmessages = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) as total FROM admin_messages"))['total'];
?>

<?php include 'slidebar.php'; ?>

<div class="page-wrapper">

    <?php include 'header.php'; ?>

    <div class="main-content">


    <?php
if(isset($_GET['page'])){

    $page = $_GET['page'];

    if($page == 'manage-menu'){
        include 'manage-menu-content.php';
    }

    elseif($page == 'brands'){
        include 'brands-content.php';
    }

    // elseif($page == 'faqs'){
    //     include 'faqs-content.php';
    // }

    elseif($page == 'users'){
        include 'pages/users-content.php';
    }
 
    elseif($page == 'settings'){
        include 'pages/settings.php';
    }
    

    // Product
    elseif($page == 'add-product'){
        include 'pages/add-product.php';
    }

    elseif($page == 'edit-product'){
        include 'pages/edit-product.php';
    }

    // Categories
    elseif($page == 'all-categories'){
        include 'pages/all-categories.php';
    }

    elseif($page == 'add-category'){
        include 'pages/add-category.php';
    }

    elseif($page == 'edit-category'){
        include 'pages/edit-category.php';
    }

    // Attributes
    elseif($page == 'all-attributes'){
        include 'pages/all-attributes.php';
    }

    elseif($page == 'edit-attribute'){
        include 'pages/edit-attribute.php';
    }

    // Orders
    elseif($page == 'all-orders'){
        include 'pages/all-orders.php';
    }

    elseif($page == 'color'){
    include 'pages/color.php';
    }
    elseif($page == 'address'){
        include 'pages/address.php';
    }


    elseif($page == 'campaigns'){
        include 'pages/campaigns.php';
    }

    elseif($page == 'messages'){
        include 'pages/messages.php';
    }


     elseif($page == 'faq'){
        include 'pages/faq.php';
    }

    elseif($page == 'offers'){
        include 'pages/offers.php';
    }

    elseif($page == 'reports'){
        include 'pages/reports.php';
    }

    elseif($page == 'notifications'){
        include 'pages/notifications.php';
    }

    elseif($page == 'analytics'){
        include 'pages/analytics.php';
    }

    elseif($page == 'coupons'){
        include 'pages/coupons.php';
    }

    elseif($page == 'support'){
        include 'pages/support.php';
    }


    elseif($page == 'dashboard'){
    ?>
    
        <!-- Welcome Section -->
        <div class="welcome-card">
            <div>
                <h2>Welcome Back, <?php echo $_SESSION['full_name']; ?> </h2>
                <p class="text-dark">Here is what is happening in your admin dashboard today.</p>
            </div>
        </div>

        <div class="stats-grid">
            <a href="dashboard.php?page=users" class="stat-card">
                <div class="dashboard-card">
                    <h3><?php echo $totalUsers; ?></h3>
                    <p>Users</p>
                </div>
                <i class="fas fa-users"></i>
            </a>

             <a href="dashboard.php?page=brands" class="stat-card">
                <div class="dashboard-card">
                    <h3><?php echo $totalBrands; ?></h3>
                    <p>Brands</p>
                </div>
                <i class="fas fa-store"></i>
            </a>

            <a href="dashboard.php?page=campaigns" class="stat-card">
                <div class="dashboard-card">
                    <h3><?php echo $totalCampaigns; ?></h3>
                    <p>Campaigns</p>
                </div>
                <i class="fas fa-bullhorn"></i>
            </a>
        
            <a href="dashboard.php?page=messages" class="stat-card">
                <div class="dashboard-card">
                    <h3><?php echo $totalmessages; ?></h3>
                    <p>Messages</p>
                </div>
                 <i class="fas fa-wallet"></i>
            </a>
            
        </div>
    <?php  
    }

    else {
        echo "<h4>Page Not Found</h4>";
    }

} else {
?>


         <div class="welcome-card">
            <div>
                <h2>Welcome Back, <?php echo $_SESSION['full_name']; ?> </h2>
                <p class="text-dark">Here is what is happening in your admin dashboard today.</p>
            </div>
        </div>

     <!--
        <div class="section-card">
            <div class="section-title">
                <h3>Quick Actions</h3>
            </div>

            <div class="quick-actions">
                <a href="#" class="action-btn"><i class="fas fa-user-plus"></i> Add User</a>
                <a href="#" class="action-btn"><i class="fas fa-store"></i> Add Brand</a>
                <a href="#" class="action-btn"><i class="fas fa-bullhorn"></i> Create Campaign</a>
                <a href="#" class="action-btn"><i class="fas fa-cog"></i> Settings</a>
            </div>
        </div>

       
    

        <div class="section-card">
            <div class="section-title">
                <h3>Recent Activity</h3>
            </div>

            <div class="activity-list">
                <div class="activity-item">
                    <i class="fas fa-user-plus"></i>
                    <div>
                        <h4>New user registered</h4>
                        <p>2 minutes ago</p>
                    </div>
                </div>

                <div class="activity-item">
                    <i class="fas fa-store"></i>
                    <div>
                        <h4>New brand added</h4>
                        <p>10 minutes ago</p>
                    </div>
                </div>

                <div class="activity-item">
                    <i class="fas fa-wallet"></i>
                    <div>
                        <h4>Payment received</h4>
                        <p>30 minutes ago</p>
                    </div>
                </div>
            </div>-->
        
    <?php } ?>
    </div>

    <?php include 'footer.php'; ?>

</div>
<style>
.page-wrapper {
    margin-left: 310px;
    display: flex;
    flex-direction: column;
    min-height: 100vh;
}

.main-content {
    padding: 20px 25px;
     flex: 1;
}

.welcome-card {
    background-color:whitesmoke;
    padding: 30px;
    border-radius: 25px;
    color: black;
    margin-bottom: 25px;
    /* box-shadow: 0 15px 35px rgba(124, 58, 237, 0.35); */
}

.welcome-card h2 {
    font-size: 30px;
    margin-bottom: 8px;
}

.welcome-card p {
    color: rgba(255,255,255,0.85);
}

.stats-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(230px, 1fr));
    gap: 20px;
    margin-bottom: 25px;
}

.stat-card {
    border-radius: 24px;
    padding: 25px;
    color: black;
    display: flex;
    justify-content: space-between;
    align-items: center;
    background-color:whitesmoke;
    /* box-shadow: 0 12px 30px rgba(0,0,0,0.25); */
    text-decoration: none;

}

.stat-card h3 {
    font-size: 30px;
    margin-bottom: 5px;
}

.stat-card i {
    font-size: 34px;
    opacity: 0.85;
}


.section-card {
    background: rgba(255,255,255,0.05);
    border: 1px solid rgba(255,255,255,0.08);
    border-radius: 24px;
    padding: 25px;
    margin-bottom: 25px;
}

.section-title h3 {
    color: white;
    
    margin-bottom: 20px;
}

.quick-actions {
    display: flex;
    flex-wrap: wrap;
    gap: 15px;
}

.action-btn {
    padding: 14px 20px;
    background: rgba(255,255,255,0.08);
    color: white;
    text-decoration: none;
    border-radius: 16px;
    transition: 0.3s ease;
}

.action-btn:hover {
    background: #7c3aed;
}

.custom-table {
    width: 100%;
    border-collapse: collapse;
}

.custom-table th,
.custom-table td {
    padding: 15px;
    border-bottom: 1px solid rgba(255,255,255,0.08);
    color: white;
}

.custom-table th {
    color: #94a3b8;
}

.status-badge {
    background: #16a34a;
    padding: 6px 12px;
    border-radius: 30px;
    font-size: 12px;
}

.activity-list {
    display: flex;
    
    justify-content:center;
    gap: 38px;
}

.activity-item {
    display: flex;
    align-items: center;
    gap: 15px;
    padding: 15px;
    border-radius: 18px;
    background: rgba(255,255,255,0.05);
}

.activity-item i {
    width: 50px;
    height: 50px;
    border-radius: 14px;
    background: linear-gradient(135deg, #7c3aed, #ec4899);
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
}

.activity-item h4 {
    color: white;
    margin-bottom: 4px;
}

.activity-item p {
    color: #94a3b8;
    font-size: 13px;
}

@media (max-width: 991px) {
    .page-wrapper {
        margin-left: 0;
    }

    .main-content {
        padding: 15px;
    }

    .welcome-card h2 {
        font-size: 24px;
    }
}
</style>

