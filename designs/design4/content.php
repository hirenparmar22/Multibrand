<?php

$conn = mysqli_connect("mysql", "root", "admin123", "multibrand_promotion");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}



$sql = "SELECT id, brand_name, brand_logo, brand_description, color, rating, total_products, discount
        FROM brands
        WHERE status = 'active'
        ORDER BY created_at DESC
        LIMIT 6";

$result = mysqli_query($conn, $sql);

$featured_brands = [];

if ($result && mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $featured_brands[] = $row;
    }
}




$sql = "SELECT promotions.*, brands.brand_name
        FROM promotions
        JOIN brands ON brands.id = promotions.brand_id
        WHERE promotions.is_trending = 1";

$result = mysqli_query($conn, $sql);

$trending_promos = [];

if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
        $trending_promos[] = $row;
    }
}



$sql = "SELECT * FROM categories";

$result = mysqli_query($conn, $sql);

$categories = [];

if ($result && mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $categories[] = $row;
    }
}



$sql = "SELECT id, brand_name, brand_logo, color, category, created_at
        FROM brands
        WHERE status = 'active'
        ORDER BY created_at DESC
        LIMIT 6";

$result = mysqli_query($conn, $sql);

$recent_brands = [];

if ($result && mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $recent_brands[] = $row;
    }
}


// $featured_brands = [
//     ['name' => 'NovaSport',   'logo' => 'NS', 'color' => 'primary',   'tag' => 'Sports & Fitness',  'discount' => 'Up to 40% Off', 'rating' => 4.8, 'products' => 320],
//     ['name' => 'LuxeWear',    'logo' => 'LW', 'color' => 'danger',    'tag' => 'Fashion & Apparel', 'discount' => 'Up to 60% Off', 'rating' => 4.9, 'products' => 510],
//     ['name' => 'TechNest',    'logo' => 'TN', 'color' => 'dark',      'tag' => 'Electronics',       'discount' => 'Up to 35% Off', 'rating' => 4.7, 'products' => 280],
//     ['name' => 'GreenLeaf',   'logo' => 'GL', 'color' => 'success',   'tag' => 'Organic & Health',  'discount' => 'Up to 25% Off', 'rating' => 4.6, 'products' => 195],
//     ['name' => 'UrbanCraft',  'logo' => 'UC', 'color' => 'warning',   'tag' => 'Home & Decor',      'discount' => 'Up to 50% Off', 'rating' => 4.5, 'products' => 430],
//     ['name' => 'PeakGear',    'logo' => 'PG', 'color' => 'info',      'tag' => 'Outdoor & Travel',  'discount' => 'Up to 45% Off', 'rating' => 4.8, 'products' => 260],
// ];

// $trending_promos = [
//     [
//         'brand'       => 'LuxeWear',
//         'title'       => 'Summer Sale Extravaganza',
//         'description' => 'The biggest fashion event of the year — premium collections at unmissable prices.',
//         'badge'       => 'HOT',
//         'badge_color' => 'danger',
//         'discount'    => '60%',
//         'expiry'      => 'Ends June 30',
//         'icon'        => '👗',
//         'bg'          => 'danger',
//     ],
//     [
//         'brand'       => 'TechNest',
//         'title'       => 'Gadget Gala Weekend',
//         'description' => 'Smartphones, laptops, accessories — flagship tech at warehouse prices.',
//         'badge'       => 'NEW',
//         'badge_color' => 'dark',
//         'discount'    => '35%',
//         'expiry'      => 'Ends July 5',
//         'icon'        => '💻',
//         'bg'          => 'dark',
//     ],
//     [
//         'brand'       => 'NovaSport',
//         'title'       => 'Fitness Fuel Fest',
//         'description' => 'Gear up for the season with top-rated sports equipment and activewear deals.',
//         'badge'       => 'TRENDING',
//         'badge_color' => 'primary',
//         'discount'    => '40%',
//         'expiry'      => 'Ends July 15',
//         'icon'        => '🏋️',
//         'bg'          => 'primary',
//     ],
//     [
//         'brand'       => 'GreenLeaf',
//         'title'       => 'Clean Living Bundle',
//         'description' => 'Organic supplements, natural skincare, and wellness essentials — all in one deal.',
//         'badge'       => 'ECO',
//         'badge_color' => 'success',
//         'discount'    => '25%',
//         'expiry'      => 'Ends July 20',
//         'icon'        => '🌿',
//         'bg'          => 'success',
//     ],
// ];

// $categories = [
//     ['name' => 'Fashion',      'icon' => '👗', 'count' => 142, 'color' => 'danger'],
//     ['name' => 'Electronics',  'icon' => '📱', 'count' => 98,  'color' => 'dark'],
//     ['name' => 'Sports',       'icon' => '⚽', 'count' => 76,  'color' => 'primary'],
//     ['name' => 'Home & Decor', 'icon' => '🏠', 'count' => 115, 'color' => 'warning'],
//     ['name' => 'Health',       'icon' => '💊', 'count' => 63,  'color' => 'success'],
//     ['name' => 'Beauty',       'icon' => '💄', 'count' => 89,  'color' => 'info'],
//     ['name' => 'Travel',       'icon' => '✈️', 'count' => 54,  'color' => 'secondary'],
//     ['name' => 'Kids & Toys',  'icon' => '🧸', 'count' => 72,  'color' => 'warning'],
// ];

// $recent_brands = [
//     ['name' => 'BloomBox',    'logo' => 'BB', 'color' => 'danger',  'category' => 'Florals & Gifts',    'joined' => '2 days ago',  'promos' => 3],
//     ['name' => 'SwiftRide',   'logo' => 'SR', 'color' => 'dark',    'category' => 'Automotive',         'joined' => '4 days ago',  'promos' => 5],
//     ['name' => 'SkyBrew',     'logo' => 'SB', 'color' => 'info',    'category' => 'Food & Beverages',   'joined' => '1 week ago',  'promos' => 7],
//     ['name' => 'MarbleHome',  'logo' => 'MH', 'color' => 'warning', 'category' => 'Luxury Interiors',  'joined' => '1 week ago',  'promos' => 4],
//     ['name' => 'WaveSound',   'logo' => 'WS', 'color' => 'primary', 'category' => 'Audio & Music',     'joined' => '10 days ago', 'promos' => 6],
//     ['name' => 'FreshCart',   'logo' => 'FC', 'color' => 'success', 'category' => 'Grocery & Organic', 'joined' => '2 weeks ago', 'promos' => 8],
// ];
?>




<div class="container pt-5 mt-5" style="font-family: 'Playfair Display', serif;">

    <section class="py-5 my-3 rounded-4 text-white text-center"
        style="background: linear-gradient(135deg, #7498ce 0%, #1a1f2e 50%, #0f2027 100%);
                    border: 1px solid rgba(255,255,255,0.08);
                    position: relative; overflow: hidden;">
        <!-- Decorative blobs -->
        <div style="position:absolute;top:-60px;left:-60px;width:220px;height:220px;
                    background:radial-gradient(circle,rgba(216, 149, 155, 0.35),transparent 70%);
                    border-radius:50%;pointer-events:none;"></div>
        <div style="position:absolute;bottom:-60px;right:-60px;width:260px;height:260px;
                    background:radial-gradient(circle,rgba(13,110,253,.3),transparent 70%);
                    border-radius:50%;pointer-events:none;"></div>

        <div class="position-relative py-4 px-3 px-md-5">
            <span class="badge bg-danger bg-opacity-75 text-white fw-semibold px-3 py-2 mb-3 rounded-pill fs-6">
                🔥 500+ Active Promotions Live Now
            </span>
            <h1 class="display-4 fw-bold mb-3" style="letter-spacing:-1px;">
                One Destination.<br>
                <span style="background:linear-gradient(90deg,#f8d7da,#f093fb);
                             -webkit-background-clip:text;-webkit-text-fill-color:transparent;">
                    Every Brand. Every Deal.
                </span>
            </h1>
            <p class="lead text-white-50 mb-4 mx-auto" style="max-width:560px;">
                Discover exclusive promotions from top brands across fashion, electronics,
                health, sports, and more — all in one place.
            </p>
            <div class="d-flex flex-wrap gap-3 justify-content-center">
                <a href="#" class="btn btn-danger btn-lg px-4 fw-semibold rounded-pill shadow">
                    🛍️ Explore All Deals
                </a>
                <a href="#" class="btn btn-outline-light btn-lg px-4 fw-semibold rounded-pill">
                    🏷️ Browse Brands
                </a>
            </div>
            <div class="mt-4 d-flex flex-wrap gap-4 justify-content-center text-white-50 small">
                <span>✔ 200+ Verified Brands</span>
                <span>✔ Daily Updated Promos</span>
                <span>✔ Free to Browse</span>
            </div>
        </div>
    </section>


    <!-- ━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━
         2. FEATURED BRANDS SECTION
    ━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━ -->
    <section class="py-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h2 class="fw-bold mb-1 fs-3"> Featured Brands</h2>
                <p class="text-muted mb-0 small">Hand-picked partners with the best active deals</p>
            </div>
            <a href="/feature-all-brands.php" class="btn btn-outline-primary btn-sm rounded-pill px-3">View All →</a>
        </div>

        <div class="row g-3">
            <?php foreach ($featured_brands as $brand): ?>
                <div class="col-12 col-sm-6 col-lg-4">
                    <div class="card h-100 border-0 shadow-sm rounded-4"
                        style="transition:.2s;cursor:pointer;"
                        onmouseover="this.style.transform='translateY(-4px)';this.style.boxShadow='0 12px 32px rgba(0,0,0,.12)'"
                        onmouseout="this.style.transform='';this.style.boxShadow=''">
                        <div class="card-body d-flex gap-3 align-items-start p-4">
                            <!-- Logo avatar -->
                            <div class="flex-shrink-0 rounded-3 d-flex align-items-center justify-content-center text-white fw-bold fs-5"
                                style="width:54px;height:54px;background:var(--bs-<?= htmlspecialchars($brand['color']) ?>);">
                                <?= htmlspecialchars($brand['brand_logo']) ?>
                            </div>
                            <div class="flex-grow-1">
                                <div class="d-flex justify-content-between align-items-start">
                                    <h6 class="fw-bold mb-0"><?= htmlspecialchars($brand['brand_name']) ?></h6>
                                    <span class="badge bg-<?= htmlspecialchars($brand['color']) ?> bg-opacity-10 text-<?= htmlspecialchars($brand['color']) ?> small">
                                        <?= htmlspecialchars($brand['discount'] ?? 'Up to 30% Off') ?>
                                    </span>
                                </div>
                                <p class="text-muted small mb-2 mt-1"><?= htmlspecialchars($brand['brand_description']) ?></p>
                                <div class="d-flex gap-3 text-muted small">
                                    <span> <?= htmlspecialchars($brand['rating'] ?? '4.5') ?></span>
                                    <span> <?= htmlspecialchars($brand['products'] ?? '120') ?>products</span>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer bg-transparent border-top-0 pt-0 px-4 pb-3">
                            <a href="/brands-promotion.php" class="btn btn-<?= htmlspecialchars($brand['color']) ?> btn-sm rounded-pill w-100 fw-semibold">
                                View Promotions
                            </a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </section>


    <section class="py-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h2 class="fw-bold mb-1 fs-3"> Trending Promotions</h2>
                <p class="text-muted mb-0 small">Most-clicked deals across all brands right now</p>
            </div>
            <a href="/brands-promotion.php" class="btn btn-outline-danger btn-sm rounded-pill px-3">See All →</a>
        </div>

        <div class="row g-4">
            <?php foreach ($trending_promos as $promo): ?>
                <div class="col-12 col-md-6">
                    <div class="card border-0 rounded-4 overflow-hidden shadow-sm h-100"
                        style="transition:.2s;"
                        onmouseover="this.style.transform='translateY(-4px)';this.style.boxShadow='0 16px 40px rgba(0,0,0,.13)'"
                        onmouseout="this.style.transform='';this.style.boxShadow=''">
                        <!-- Coloured top strip -->
                        <div class="p-4 text-white position-relative"
                            style="background:var(--bs-<?= htmlspecialchars($promo['bg']) ?>);">
                            <div class="d-flex justify-content-between align-items-start">
                                <div>
                                    <span class="badge bg-white text-<?= htmlspecialchars($promo['badge_color']) ?> fw-bold small mb-2">
                                        <?= htmlspecialchars($promo['badge']) ?>
                                    </span>
                                    <h5 class="fw-bold mb-1"><?= htmlspecialchars($promo['title']) ?></h5>
                                    <p class="small mb-0 opacity-75"><?= htmlspecialchars($promo['brand_name']) ?></p>
                                </div>
                                <span class="display-6 lh-1"><?= $promo['icon'] ?></span>
                            </div>
                            <!-- Big discount badge -->
                            <div class="position-absolute top-0 end-0 m-3 rounded-circle bg-white text-<?= htmlspecialchars($promo['bg']) ?> fw-bolder d-flex align-items-center justify-content-center shadow"
                                style="width:62px;height:62px;font-size:1rem;line-height:1;">
                                <?= htmlspecialchars($promo['discount']) ?><br><span style="font-size:.6rem;">OFF</span>
                            </div>
                        </div>
                        <div class="card-body px-4 py-3">
                            <p class="text-muted small mb-3"><?= htmlspecialchars($promo['description']) ?></p>
                            <div class="d-flex justify-content-between align-items-center">
                                <small class="text-danger fw-semibold">⏰ <?= htmlspecialchars($promo['expiry']) ?></small>
                                <a href="#" class="btn btn-<?= htmlspecialchars($promo['bg']) ?> btn-sm rounded-pill px-3 fw-semibold">
                                    Grab Deal
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </section>


    <!-- ━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━
         4. CATEGORIES SECTION
    ━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━ -->
    <section class="py-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h2 class="fw-bold mb-1 fs-3"> Browse by Category</h2>
                <p class="text-muted mb-0 small">Find deals in the categories you love most</p>
            </div>
            <a href="/feature-all-brands.php" class="btn btn-outline-secondary btn-sm rounded-pill px-3">All Categories →</a>
        </div>

        <div class="row g-3">
            <?php foreach ($categories as $cat): ?>
                <div class="col-6 col-sm-4 col-md-3">

                    <a href="/feature-all-brands.php?category=<?= urlencode($cat['category_name']) ?>" class="text-decoration-none">

                        <div class="card border-0 rounded-4 text-center p-3 shadow-sm h-100"
                            style="transition:.2s;cursor:pointer;"
                            onmouseover="this.style.transform='scale(1.04)';this.style.boxShadow='0 10px 28px rgba(0,0,0,.1)'"
                            onmouseout="this.style.transform='';this.style.boxShadow=''">

                            <div class="mx-auto mb-2 rounded-circle d-flex align-items-center justify-content-center "
                                style="width:52px;height:52px;font-size:1.4rem;
                                    background:var(--bs-<?= htmlspecialchars($cat['color']) ?>);
                                    opacity:.9;">
                                <?= $cat['icon'] ?>
                            </div>

                            <p class="fw-semibold mb-0 text-dark small"> <?= htmlspecialchars($cat['category_name'] ?? 'Category') ?></p>
                            <p class="text-muted mb-0 border border-primary rounded-pill py-1" style="font-size:.72rem;"><?= htmlspecialchars($cat['count']) ?> Active Category</p>
                        </div>
                    </a>
                </div>
            <?php endforeach; ?>
        </div>
    </section>


    <!-- ━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━
         5. RECENT BRANDS SECTION
    ━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━ -->
    <section class="py-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h2 class="fw-bold mb-1 fs-3"> Recently Joined Brands</h2>
                <p class="text-muted mb-0 small">Fresh faces bringing new deals to the platform</p>
            </div>
            <a href="/recent-brands.php" class="btn btn-outline-success btn-sm rounded-pill px-3">View All →</a>
        </div>

        <div class="row g-3">
            <?php if (!empty($recent_brands)): ?>
                <?php foreach ($recent_brands as $rb): ?>
                    <div class="col-12 col-sm-6 col-xl-4">
                        <div class="card border-0 shadow-sm rounded-4 h-100"
                            style="transition:.2s;"
                            onmouseover="this.style.transform='translateY(-3px)';this.style.boxShadow='0 10px 28px rgba(0,0,0,.1)'"
                            onmouseout="this.style.transform='';this.style.boxShadow=''">
                            <div class="card-body d-flex align-items-center gap-3 p-3">
                                <!-- Avatar -->
                                <div class="flex-shrink-0 rounded-3 d-flex align-items-center justify-content-center text-white fw-bold"
                                    style="width:48px;height:48px;font-size:.9rem;
                                    background:var(--bs-<?= htmlspecialchars($rb['color']) ?>);">
                                    <?= htmlspecialchars($rb['brand_logo']) ?>
                                </div>
                                <div class="flex-grow-1 overflow-hidden">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <h6 class="fw-bold mb-0 text-truncate"><?= htmlspecialchars($rb['brand_name']) ?></h6>
                                        <span class="badge bg-success-subtle text-success small ms-2 flex-shrink-0">NEW</span>
                                    </div>
                                    <p class="text-muted small mb-1 text-truncate"><?= htmlspecialchars($rb['category'] ?? 'General') ?></p>
                                    <div class="d-flex gap-3 text-muted" style="font-size:.72rem;">
                                        <span>🕐 <?= date('d M Y', strtotime($rb['created_at'])) ?></span>
                                        <span>🏷️ <?= htmlspecialchars($rb['category'] ?? 'General') ?></span>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer bg-transparent border-top px-3 py-2">
                                <a href="#" class="btn btn-outline-<?= htmlspecialchars($rb['color']) ?> btn-sm w-100 rounded-pill fw-semibold" style="font-size:.8rem;">
                                    Explore Brand
                                </a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
        </div>
    </section>



    <section class="py-5 mb-4">
        <div class="rounded-4 overflow-hidden"
            style="background:linear-gradient(135deg,#0d1117 0%,#1a1f2e 60%,#0f2027 100%);
                    border:1px solid rgba(255,255,255,0.07);">
            <div class="row g-0 align-items-center">
                <!-- Text side -->
                <div class="col-12 col-md-7 p-5 text-white">
                    <span class="badge bg-warning text-dark fw-semibold px-3 py-2 rounded-pill mb-3">
                        🚀 Grow Your Brand
                    </span>
                    <h2 class="fw-bold display-6 mb-3">
                        Become a Vendor &amp;<br>
                        <span style="background:linear-gradient(90deg,#ffd700,#ff8c00);
                                     -webkit-background-clip:text;-webkit-text-fill-color:transparent;">
                            Reach Millions of Buyers
                        </span>
                    </h2>
                    <p class="text-white-50 mb-4" style="max-width:420px;line-height:1.7;">
                        List your brand's promotions for free and connect with thousands of
                        deal-hungry customers every day. Setup takes under 5 minutes.
                    </p>
                    <div class="d-flex flex-wrap gap-3">
                        <a href="#" class="btn btn-warning btn-lg px-4 fw-bold rounded-pill shadow text-dark">
                            🏪 Register as Vendor
                        </a>
                        <a href="#" class="btn btn-outline-light btn-lg px-4 fw-semibold rounded-pill">
                            Learn More
                        </a>
                    </div>
                </div>
                <!-- Stats side -->
                <div class="col-12 col-md-5 p-5 text-center text-white"
                    style="border-left:1px solid rgba(255,255,255,0.07);">
                    <div class="row g-4">
                        <?php
                        $vendor_stats = [
                            ['val' => '200+',  'lbl' => 'Active Brands',   'ico' => '🏪'],
                            ['val' => '50K+',  'lbl' => 'Monthly Shoppers', 'ico' => '🛍️'],
                            ['val' => '500+',  'lbl' => 'Live Promotions',  'ico' => '🏷️'],
                            ['val' => 'Free',  'lbl' => 'To Get Started',   'ico' => '🎉'],
                        ];
                        foreach ($vendor_stats as $stat):
                        ?>
                            <div class="col-6">
                                <div class="p-3 rounded-3" style="background:rgba(255,255,255,.05);">
                                    <div class="fs-3 mb-1"><?= $stat['ico'] ?></div>
                                    <div class="fw-bold fs-4 text-warning"><?= htmlspecialchars($stat['val']) ?></div>
                                    <div class="text-white-50 small"><?= htmlspecialchars($stat['lbl']) ?></div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <p>No recent brands found</p>
                    <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

</div><!-- /.container -->