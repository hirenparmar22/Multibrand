<?php
session_start();
ob_start();
include '../config.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: ../login.php");
    exit;
}

$totalUsers     = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) as total FROM users"))['total'];
$totalBrands    = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) as total FROM brands"))['total'];
$totalCampaigns = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) as total FROM admin_campaigns"))['total'];
$totalmessages  = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) as total FROM admin_messages"))['total'];
?>
<?php include 'slidebar.php'; ?>

<div class="page-wrapper">
    <?php include 'header.php'; ?>

    <div class="main-content">

        <?php if (isset($_GET['page'])): $page = $_GET['page']; ?>

            <?php if ($page == 'manage-menu'): include 'manage-menu-content.php';
            elseif ($page == 'brands'):        include 'brands-content.php';
            elseif ($page == 'users'):         include 'pages/users-content.php';
            elseif ($page == 'settings'):      include 'pages/settings.php';
            elseif ($page == 'add-product'):   include 'pages/add-product.php';
            elseif ($page == 'edit-product'):  include 'pages/edit-product.php';
            elseif ($page == 'all-categories'): include 'pages/all-categories.php';
            elseif ($page == 'add-category'):  include 'pages/add-category.php';
            elseif ($page == 'edit-category'): include 'pages/edit-category.php';
            elseif ($page == 'all-attributes'): include 'pages/all-attributes.php';
            elseif ($page == 'edit-attribute'): include 'pages/edit-attribute.php';
            elseif ($page == 'all-orders'):    include 'pages/all-orders.php';
            elseif ($page == 'color'):         include 'pages/color.php';
            elseif ($page == 'address'):       include 'pages/address.php';
            elseif ($page == 'campaigns'):     include 'pages/campaigns.php';
            elseif ($page == 'messages'):      include 'pages/messages.php';
            elseif ($page == 'faq'):           include 'pages/faq.php';
            elseif ($page == 'offers'):        include 'pages/offers.php';
            elseif ($page == 'reports'):       include 'pages/reports.php';
            elseif ($page == 'notifications'): include 'pages/notifications.php';
            elseif ($page == 'analytics'):     include 'pages/analytics.php';
            elseif ($page == 'coupons'):       include 'pages/coupons.php';
            elseif ($page == 'support'):       include 'pages/support.php';

            elseif ($page == 'dashboard'): ?>

                <div class="welcome-card">
                    <div>
                        <h2>Welcome Back, <?php echo htmlspecialchars($_SESSION['full_name']); ?> 👋</h2>
                        <p>Here's what's happening in your admin dashboard today.</p>
                    </div>
                </div>



                <div class="stats-grid">
                    <a href="dashboard.php?page=users" class="stat-card">
                        <div class="stat-info">
                            <h3><?php echo $totalUsers; ?></h3>
                            <p>Users</p>
                        </div>
                        <div class="stat-icon icon-blue"><i class="fas fa-users"></i></div>
                    </a>

                    <a href="dashboard.php?page=brands" class="stat-card">
                        <div class="stat-info">
                            <h3><?php echo $totalBrands; ?></h3>
                            <p>Brands</p>
                        </div>
                        <div class="stat-icon icon-purple"><i class="fas fa-store"></i></div>
                    </a>

                    <a href="dashboard.php?page=campaigns" class="stat-card">
                        <div class="stat-info">
                            <h3><?php echo $totalCampaigns; ?></h3>
                            <p>Campaigns</p>
                        </div>
                        <div class="stat-icon icon-amber"><i class="fas fa-bullhorn"></i></div>
                    </a>

                    <a href="dashboard.php?page=messages" class="stat-card">
                        <div class="stat-info">
                            <h3><?php echo $totalmessages; ?></h3>
                            <p>Messages</p>
                        </div>
                        <div class="stat-icon icon-green"><i class="fas fa-envelope"></i></div>
                    </a>
                </div>

            <?php else: ?>
                <h4>Page Not Found</h4>
            <?php endif; ?>

        <?php else: ?>

            <div class="welcome-card">
                <div>
                    <h2>Welcome Back, <?php echo htmlspecialchars($_SESSION['full_name']); ?> 👋</h2>
                    <p>Here's what's happening in your admin dashboard today.</p>
                </div>
            </div>

        <?php endif; ?>

    </div>

    <div class="design-container">
        <h2>Change Website Design</h2>

        <form method="POST" action="save_design.php">
            <div class="design-buttons">
                <button class="design1" name="design" value="design1">Design 1</button>
                <button class="design2" name="design" value="design2">Design 2</button>
                <button class="design3" name="design" value="design3">Design 3</button>
                <button class="design4" name="design" value="design4">Design 4</button>
                <button class="design5" name="design" value="design5">Design 5</button>
                <button class="design6" name="design" value="design6">Design 6</button>
            </div>
        </form>
    </div>

    <?php include 'footer.php'; ?>
</div>

<style>
    /* ── Background ── */
    body {
        background-color: #f0f4ff;
        background-image:
            radial-gradient(ellipse 80% 60% at 20% 10%, rgba(99, 102, 241, 0.15) 0%, transparent 60%),
            radial-gradient(ellipse 60% 50% at 80% 80%, rgba(56, 189, 248, 0.12) 0%, transparent 55%),
            radial-gradient(ellipse 50% 40% at 60% 30%, rgba(168, 85, 247, 0.08) 0%, transparent 50%);
        overflow-x: hidden;
        position: relative;
    }

    /* ── Layout ── */
    .page-wrapper {
        margin-left: 310px;
        display: flex;
        flex-direction: column;
        min-height: 100vh;
    }

    .main-content {
        padding: 24px 28px;
        flex: 1;
    }

    /* ── Welcome Card ── */
    .welcome-card {
        background: #ffffff;
        border: 1px solid rgba(99, 102, 241, 0.12);
        padding: 28px 32px;
        border-radius: 20px;
        margin-bottom: 24px;
        box-shadow: 0 1px 4px rgba(0, 0, 0, 0.05);
    }

    .welcome-card h2 {
        font-size: 26px;
        font-weight: 600;
        color: #1e1b4b;
        margin-bottom: 6px;
    }

    .welcome-card p {
        color: #64748b;
        font-size: 15px;
        margin: 0;
    }

    /* ── Stats Grid ── */
    .stats-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
        gap: 18px;
        margin-bottom: 24px;
    }

    .stat-card {
        background: #ffffff;
        border: 1px solid rgba(99, 102, 241, 0.1);
        border-radius: 20px;
        padding: 22px 24px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        text-decoration: none;
        color: inherit;
        box-shadow: 0 1px 4px rgba(0, 0, 0, 0.05);
        transition: transform 0.2s ease, box-shadow 0.2s ease;
    }

    .stat-card:hover {
        transform: translateY(-3px);
        box-shadow: 0 8px 24px rgba(99, 102, 241, 0.12);
    }

    .stat-info h3 {
        font-size: 32px;
        font-weight: 700;
        color: #1e1b4b;
        margin: 0 0 4px;
        line-height: 1;
    }

    .stat-info p {
        color: #64748b;
        font-size: 14px;
        margin: 0;
    }

    .stat-icon {
        width: 52px;
        height: 52px;
        border-radius: 14px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 20px;
        flex-shrink: 0;
    }

    .icon-blue {
        background: #eff6ff;
        color: #3b82f6;
    }

    .icon-purple {
        background: #f5f3ff;
        color: #7c3aed;
    }

    .icon-amber {
        background: #fffbeb;
        color: #d97706;
    }

    .icon-green {
        background: #f0fdf4;
        color: #16a34a;
    }





    
    .design-container {
        text-align: center;
        margin-bottom: 20px;
    }

    .design-buttons {
        display: flex;
        justify-content: center;
        flex-wrap: wrap;
        gap: 15px;
    }

    .design-buttons button {
        padding: 12px 25px;
        border: none;
        border-radius: 10px;
        cursor: pointer;
        font-size: 15px;
        font-weight: bold;
        transition: all 0.3s ease;
        color: white;
        position: relative;
        overflow: hidden;
    }

    /* Different colors */
    .design1 {
        background: linear-gradient(45deg, #2193b0, #6dd5ed);
    }

    .design2 {
        background: linear-gradient(45deg, #ee0979, #ff6a00);
    }

    .design3 {
        background: linear-gradient(45deg, #11998e, #38ef7d);
    }

    .design4 {
        background: linear-gradient(45deg, #F2994A, #F2C94C);
    }

    .design5 {
        background: linear-gradient(45deg, #8E2DE2, #4A00E2);
    }

    .design6 {
        background: linear-gradient(45deg, #00c6ff, #0072ff);
    }

    /* Hover effect */
    .design-buttons button:hover {
        transform: translateY(-5px) scale(1.05);
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.3);
    }

    /* Click animation */
    .design-buttons button:active {
        transform: scale(0.95);
    }

    /* Shine effect */
    .design-buttons button::before {
        content: "";
        position: absolute;
        top: 0;
        left: -75%;
        width: 50%;
        height: 100%;
        background: rgba(255, 255, 255, 0.3);
        transform: skewX(-25deg);
        transition: 0.5s;
    }

    .design-buttons button:hover::before {
        left: 120%;
    }

    /* ── Responsive ── */
    @media (max-width: 991px) {
        .page-wrapper {
            margin-left: 0;
        }

        .main-content {
            padding: 16px;
        }

        .welcome-card h2 {
            font-size: 20px;
        }
    }
</style>