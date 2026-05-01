<?php
require_once 'config/config.php';
require_once 'includes/auth.php';

// Initialize authentication
initAuth();

$db = Database::getInstance();

// Get featured brands
$featured_brands = $db->fetchAll("
    SELECT b.*, v.company_name, 
           (SELECT COUNT(*) FROM brand_views WHERE brand_id = b.id) as view_count
    FROM brands b 
    JOIN vendors v ON b.vendor_id = v.id 
    WHERE b.status = 'active' AND b.featured = 1 AND v.approved = 1
    ORDER BY b.created_at DESC 
    LIMIT 8
");

// Get trending promotions
$trending_promotions = $db->fetchAll("
    SELECT p.*, b.name as brand_name, b.logo as brand_logo, v.company_name,
           (SELECT COUNT(*) FROM promotion_clicks WHERE promotion_id = p.id) as click_count
    FROM promotions p 
    JOIN brands b ON p.brand_id = b.id 
    JOIN vendors v ON p.vendor_id = v.id 
    WHERE p.status = 'active' AND p.start_date <= NOW() AND p.end_date >= NOW() 
      AND b.status = 'active' AND v.approved = 1
    ORDER BY p.featured DESC, click_count DESC 
    LIMIT 6
");

// Get top categories with brand counts
$categories = $db->fetchAll("
    SELECT c.*, COUNT(b.id) as brand_count
    FROM categories c 
    LEFT JOIN brands b ON c.id = (SELECT category_id FROM products WHERE brand_id = b.id LIMIT 1)
    WHERE c.status = 'active'
    GROUP BY c.id 
    HAVING brand_count > 0
    ORDER BY c.sort_order ASC, c.name ASC 
    LIMIT 8
");

// Get recent brands
$recent_brands = $db->fetchAll("
    SELECT b.*, v.company_name
    FROM brands b 
    JOIN vendors v ON b.vendor_id = v.id 
    WHERE b.status = 'active' AND v.approved = 1
    ORDER BY b.created_at DESC 
    LIMIT 6
");

// Get search query
$search = sanitize($_GET['search'] ?? '');

$pageTitle = 'Home - MultiBrand Promotion';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $pageTitle; ?></title>
    <meta name="description" content="Discover amazing brands and promotions. Find the best deals from top vendors.">
    <meta name="csrf-token" content="<?php echo generateCSRFToken(); ?>">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
</head>

<body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top">
        <div class="container">
            <a class="navbar-brand" href="index.php">
                <i class="bi bi-bag-check"></i> MultiBrand
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="brands.php">Brands</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="promotions.php">Promotions</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="categories.php">Categories</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="contact.php">Contact</a>
                    </li>
                </ul>

                <!-- Search Bar -->
                <form class="d-flex me-3" method="GET" action="search.php">
                    <input class="form-control me-2" type="search" name="q" placeholder="Search brands, products..."
                        value="<?php echo escape($search); ?>">
                    <button class="btn btn-outline-light" type="submit">
                        <i class="bi bi-search"></i>
                    </button>
                </form>

                <ul class="navbar-nav">
                    <?php if (isLoggedIn()): ?>
                        <?php if (isAdmin()): ?>
                            <li class="nav-item">
                                <a class="nav-link" href="admin/">
                                    <i class="bi bi-shield-check"></i> Admin
                                </a>
                            </li>
                        <?php elseif (isVendor()): ?>
                            <li class="nav-item">
                                <a class="nav-link" href="vendor/">
                                    <i class="bi bi-shop"></i> Vendor Panel
                                </a>
                            </li>
                        <?php endif; ?>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">
                                <i class="bi bi-person-circle"></i> <?php echo escape($_SESSION['user_name']); ?>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li><a class="dropdown-item" href="profile.php">
                                        <i class="bi bi-person"></i> Profile
                                    </a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="logout.php">
                                        <i class="bi bi-box-arrow-right"></i> Logout
                                    </a></li>
                            </ul>
                        </li>
                    <?php else: ?>
                        <li class="nav-item">
                            <a class="nav-link" href="login.php">
                                <i class="bi bi-box-arrow-in-right"></i> Login
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="register.php">
                                <i class="bi bi-person-plus"></i> Register
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="vendor-register.php">
                                <i class="bi bi-shop"></i> Become a Vendor
                            </a>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero-section">
        <div class="container">
            <div class="row align-items-center min-vh-100">
                <div class="col-lg-6">
                    <div class="hero-content">
                        <h1 class="display-4 fw-bold text-white mb-4">
                            Discover Amazing Brands & Promotions
                        </h1>
                        <p class="lead text-white mb-4">
                            Find the best deals, explore top brands, and save money with exclusive promotions from trusted vendors.
                        </p>
                        <div class="d-flex gap-3">
                            <a href="brands.php" class="btn btn-light btn-lg">
                                <i class="bi bi-tags"></i> Explore Brands
                            </a>
                            <a href="promotions.php" class="btn btn-outline-light btn-lg">
                                <i class="bi bi-percent"></i> View Promotions
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="hero-image text-center">
                        <i class="bi bi-bag-check" style="font-size: 15rem; color: rgba(255,255,255,0.1);"></i>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Featured Brands -->
    <section class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h2 class="section-title">
                            <i class="bi bi-star"></i> Featured Brands
                        </h2>
                        <a href="brands.php" class="btn btn-outline-primary">
                            View All <i class="bi bi-arrow-right"></i>
                        </a>
                    </div>
                </div>
            </div>

            <?php if (empty($featured_brands)): ?>
                <div class="text-center py-5">
                    <i class="bi bi-tags fs-1 text-muted"></i>
                    <p class="text-muted">No featured brands available</p>
                </div>
            <?php else: ?>
                <div class="row g-4">
                    <?php foreach ($featured_brands as $brand): ?>
                        <div class="col-md-6 col-lg-3">
                            <div class="brand-card">
                                <div class="brand-logo">
                                    <?php if ($brand['logo']): ?>
                                        <img src="<?php echo UPLOAD_URL . '/' . $brand['logo']; ?>"
                                            alt="<?php echo escape($brand['name']); ?>" class="img-fluid">
                                    <?php else: ?>
                                        <i class="bi bi-tag"></i>
                                    <?php endif; ?>
                                </div>
                                <div class="brand-info">
                                    <h5><?php echo escape($brand['name']); ?></h5>
                                    <p class="text-muted small"><?php echo escape($brand['company_name']); ?></p>
                                    <div class="brand-stats">
                                        <span class="badge bg-info">
                                            <i class="bi bi-eye"></i> <?php echo number_format($brand['view_count']); ?>
                                        </span>
                                    </div>
                                    <a href="brand.php?slug=<?php echo escape($brand['slug']); ?>"
                                        class="btn btn-sm btn-outline-primary mt-2">
                                        View Brand
                                    </a>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>
    </section>

    <!-- Trending Promotions -->
    <section class="py-5 bg-light">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h2 class="section-title">
                            <i class="bi bi-fire"></i> Trending Promotions
                        </h2>
                        <a href="promotions.php" class="btn btn-outline-primary">
                            View All <i class="bi bi-arrow-right"></i>
                        </a>
                    </div>
                </div>
            </div>

            <?php if (empty($trending_promotions)): ?>
                <div class="text-center py-5">
                    <i class="bi bi-percent fs-1 text-muted"></i>
                    <p class="text-muted">No active promotions available</p>
                </div>
            <?php else: ?>
                <div class="row g-4">
                    <?php foreach ($trending_promotions as $promotion): ?>
                        <div class="col-md-6 col-lg-4">
                            <div class="promotion-card">
                                <?php if ($promotion['image']): ?>
                                    <div class="promotion-image">
                                        <img src="<?php echo UPLOAD_URL . '/' . $promotion['image']; ?>"
                                            alt="<?php echo escape($promotion['title']); ?>" class="img-fluid">
                                    </div>
                                <?php endif; ?>
                                <div class="promotion-body">
                                    <div class="promotion-header">
                                        <div class="brand-info-small">
                                            <?php if ($promotion['brand_logo']): ?>
                                                <img src="<?php echo UPLOAD_URL . '/' . $promotion['brand_logo']; ?>"
                                                    alt="<?php echo escape($promotion['brand_name']); ?>" class="brand-logo-small">
                                            <?php endif; ?>
                                            <span><?php echo escape($promotion['brand_name']); ?></span>
                                        </div>
                                        <span class="discount-badge">
                                            <?php if ($promotion['discount_type'] === 'percentage'): ?>
                                                <?php echo $promotion['discount_value']; ?>% OFF
                                            <?php else: ?>
                                                <?php echo formatPrice($promotion['discount_value']); ?> OFF
                                            <?php endif; ?>
                                        </span>
                                    </div>
                                    <h5 class="promotion-title"><?php echo escape($promotion['title']); ?></h5>
                                    <p class="promotion-description">
                                        <?php echo escape(substr($promotion['description'], 0, 100)); ?>...
                                    </p>
                                    <div class="promotion-footer">
                                        <small class="text-muted">
                                            <i class="bi bi-clock"></i>
                                            Valid until <?php echo formatDate($promotion['end_date'], 'M d, Y'); ?>
                                        </small>
                                        <div class="promotion-stats">
                                            <span class="badge bg-info">
                                                <i class="bi bi-mouse"></i> <?php echo number_format($promotion['click_count']); ?>
                                            </span>
                                        </div>
                                    </div>
                                    <a href="promotion.php?slug=<?php echo escape($promotion['slug']); ?>"
                                        class="btn btn-primary btn-sm mt-2">
                                        View Deal
                                    </a>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>
    </section>

    <!-- Categories -->
    <section class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h2 class="section-title">
                            <i class="bi bi-grid"></i> Popular Categories
                        </h2>
                        <a href="categories.php" class="btn btn-outline-primary">
                            View All <i class="bi bi-arrow-right"></i>
                        </a>
                    </div>
                </div>
            </div>

            <?php if (empty($categories)): ?>
                <div class="text-center py-5">
                    <i class="bi bi-grid fs-1 text-muted"></i>
                    <p class="text-muted">No categories available</p>
                </div>
            <?php else: ?>
                <div class="row g-4">
                    <?php foreach ($categories as $category): ?>
                        <div class="col-md-6 col-lg-3">
                            <a href="category.php?slug=<?php echo escape($category['slug']); ?>"
                                class="category-card text-decoration-none">
                                <div class="category-icon">
                                    <?php if ($category['icon']): ?>
                                        <i class="<?php echo escape($category['icon']); ?>"></i>
                                    <?php else: ?>
                                        <i class="bi bi-folder"></i>
                                    <?php endif; ?>
                                </div>
                                <h5><?php echo escape($category['name']); ?></h5>
                                <p class="text-muted small">
                                    <?php echo $category['brand_count']; ?> brands
                                </p>
                            </a>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>
    </section>

    <!-- Recent Brands -->
    <section class="py-5 bg-light">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2 class="section-title mb-4">
                        <i class="bi bi-clock"></i> Recently Added Brands
                    </h2>
                </div>
            </div>

            <?php if (empty($recent_brands)): ?>
                <div class="text-center py-5">
                    <i class="bi bi-tags fs-1 text-muted"></i>
                    <p class="text-muted">No recent brands available</p>
                </div>
            <?php else: ?>
                <div class="row g-4">
                    <?php foreach ($recent_brands as $brand): ?>
                        <div class="col-md-6 col-lg-4">
                            <div class="brand-card-small">
                                <div class="brand-logo-small">
                                    <?php if ($brand['logo']): ?>
                                        <img src="<?php echo UPLOAD_URL . '/' . $brand['logo']; ?>"
                                            alt="<?php echo escape($brand['name']); ?>" class="img-fluid">
                                    <?php else: ?>
                                        <i class="bi bi-tag"></i>
                                    <?php endif; ?>
                                </div>
                                <div class="brand-info-small">
                                    <h6><?php echo escape($brand['name']); ?></h6>
                                    <p class="text-muted small mb-1"><?php echo escape($brand['company_name']); ?></p>
                                    <small class="text-muted">
                                        <i class="bi bi-calendar"></i>
                                        <?php echo timeAgo($brand['created_at']); ?>
                                    </small>
                                </div>
                                <a href="brand.php?slug=<?php echo escape($brand['slug']); ?>"
                                    class="btn btn-sm btn-outline-primary">
                                    View
                                </a>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-5 bg-primary text-white">
        <div class="container text-center">
            <h2 class="mb-4">Ready to Promote Your Brand?</h2>
            <p class="lead mb-4">Join thousands of vendors who are already reaching more customers.</p>
            <div class="d-flex gap-3 justify-content-center">
                <a href="vendor-register.php" class="btn btn-light btn-lg">
                    <i class="bi bi-shop"></i> Become a Vendor
                </a>
                <a href="contact.php" class="btn btn-outline-light btn-lg">
                    <i class="bi bi-envelope"></i> Contact Us
                </a>
            </div>
        </div>
    </section>


    <!-- <footer class="bg-dark text-white py-4">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <h5><i class="bi bi-bag-check"></i> MultiBrand</h5>
                    <p class="text-muted">Your trusted platform for discovering amazing brands and exclusive promotions.</p>
                </div>
                <div class="col-md-4">
                    <h5>Quick Links</h5>
                    <ul class="list-unstyled">
                        <li><a href="brands.php" class="text-white text-decoration-none">Brands</a></li>
                        <li><a href="promotions.php" class="text-white text-decoration-none">Promotions</a></li>
                        <li><a href="categories.php" class="text-white text-decoration-none">Categories</a></li>
                        <li><a href="contact.php" class="text-white text-decoration-none">Contact</a></li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <h5>For Vendors</h5>
                    <ul class="list-unstyled">
                        <li><a href="vendor-register.php" class="text-white text-decoration-none">Register as Vendor</a></li>
                        <li><a href="login.php" class="text-white text-decoration-none">Vendor Login</a></li>
                        <li><a href="vendor/" class="text-white text-decoration-none">Vendor Panel</a></li>
                    </ul>
                </div>
            </div>
            <hr class="border-secondary">
            <div class="text-center">
                <p class="mb-0">&copy; <?php echo date('Y'); ?> MultiBrand Promotion. All rights reserved.</p>
            </div>
        </div>
    </footer> -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/main.js"></script>
</body>

</html>