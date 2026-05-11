<?php
session_start();


require_once __DIR__ . '/includes/header.php';

$user_name = htmlspecialchars($_SESSION['user_name'] ?? 'User', ENT_QUOTES, 'UTF-8');
$user_id   = (int)($_SESSION['user_id'] ?? 0);

// DEMO DATA — replace with real DB queries
$brands = [
    ['slug' => 'nike',    'logo_text' => '',    'logo_icon' => 'fa-brands fa-nike', 'name' => 'Nike',    'tagline' => 'Just Do It',          'category' => 'Sports & Lifestyle', 'offers' => 12, 'discount' => 'Up to 30%', 'bg' => 'linear-gradient(135deg,#1a1a2e,#16213e)', 'rating' => 4.9, 'products' => '240+'],
    ['slug' => 'adidas',  'logo_text' => 'ADI', 'logo_icon' => '',                  'name' => 'Adidas',  'tagline' => 'Impossible Is Nothing', 'category' => 'Sports & Fashion',   'offers' => 9,  'discount' => 'Up to 20%', 'bg' => 'linear-gradient(135deg,#2d2d44,#3d3d5c)', 'rating' => 4.8, 'products' => '180+'],
    ['slug' => 'puma',    'logo_text' => '',    'logo_icon' => 'fa-solid fa-paw',   'name' => 'Puma',    'tagline' => 'Forever Faster',      'category' => 'Athletic Wear',      'offers' => 7,  'discount' => 'Up to 15%', 'bg' => 'linear-gradient(135deg,#c62828,#e53935)', 'rating' => 4.7, 'products' => '160+'],
    ['slug' => 'apple',   'logo_text' => '',    'logo_icon' => 'fa-brands fa-apple', 'name' => 'Apple',   'tagline' => 'Think Different',     'category' => 'Technology',         'offers' => 5,  'discount' => 'Up to 10%', 'bg' => 'linear-gradient(135deg,#424242,#757575)', 'rating' => 4.9, 'products' => '90+'],
    ['slug' => 'samsung', 'logo_text' => 'SAM', 'logo_icon' => '',                  'name' => 'Samsung', 'tagline' => "Do What You Can't",   'category' => 'Technology',         'offers' => 8,  'discount' => 'Up to 25%', 'bg' => 'linear-gradient(135deg,#1565c0,#1976d2)', 'rating' => 4.7, 'products' => '210+'],
    ['slug' => 'zara',    'logo_text' => 'Z',   'logo_icon' => '',                  'name' => 'Zara',    'tagline' => 'Fashion Forward',     'category' => 'Fashion & Apparel',  'offers' => 11, 'discount' => 'Up to 35%', 'bg' => 'linear-gradient(135deg,#2e7d32,#388e3c)', 'rating' => 4.6, 'products' => '300+'],
    ['slug' => 'reebok',  'logo_text' => 'R',   'logo_icon' => '',                  'name' => 'Reebok',  'tagline' => 'Be More Human',       'category' => 'Sports & Fitness',   'offers' => 6,  'discount' => 'Up to 28%', 'bg' => 'linear-gradient(135deg,#880e4f,#c2185b)', 'rating' => 4.5, 'products' => '140+'],
    ['slug' => 'sony',    'logo_text' => 'S',   'logo_icon' => '',                  'name' => 'Sony',    'tagline' => 'Make.Believe',        'category' => 'Electronics',        'offers' => 4,  'discount' => 'Up to 18%', 'bg' => 'linear-gradient(135deg,#212121,#424242)', 'rating' => 4.8, 'products' => '120+'],
    ['slug' => 'levi',    'logo_text' => "L'S", 'logo_icon' => '',                  'name' => "Levi's",  'tagline' => 'Original Since 1873', 'category' => 'Denim & Apparel',    'offers' => 10, 'discount' => 'Up to 22%', 'bg' => 'linear-gradient(135deg,#0d47a1,#1565c0)', 'rating' => 4.6, 'products' => '170+'],
    ['slug' => 'hm',      'logo_text' => 'H&M', 'logo_icon' => '',                  'name' => 'H&M',     'tagline' => 'Style & Quality',     'category' => 'Fashion',            'offers' => 14, 'discount' => 'Up to 40%', 'bg' => 'linear-gradient(135deg,#b71c1c,#d32f2f)', 'rating' => 4.4, 'products' => '400+'],
    ['slug' => 'diesel',  'logo_text' => 'DSL', 'logo_icon' => '',                  'name' => 'Diesel',  'tagline' => 'Be Stupid',           'category' => 'Premium Fashion',    'offers' => 5,  'discount' => 'Up to 20%', 'bg' => 'linear-gradient(135deg,#e65100,#f57c00)', 'rating' => 4.5, 'products' => '110+'],
    ['slug' => 'gucci',   'logo_text' => 'GG',  'logo_icon' => '',                  'name' => 'Gucci',   'tagline' => 'Quality is Remembered', 'category' => 'Luxury Fashion',    'offers' => 3,  'discount' => 'Up to 12%', 'bg' => 'linear-gradient(135deg,#4a148c,#6a1b9a)', 'rating' => 4.9, 'products' => '80+'],
];

$categories = array_unique(array_column($brands, 'category'));
// include 'includes/header.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Brands – MultiBrand Promotion</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@300;400;500;600;700&family=Playfair+Display:wght@700;800;900&display=swap" rel="stylesheet" />
    <style>
        :root {
            --pink: #f7b2cb;
            --peach: #ffd4b2;
            --lavender: #c8b6e2;
            --mint: #b2e8d8;
            --sky: #b2d8f7;
            --rose: #e91e8c;
            --violet: #9c27b0;
            --indigo: #3f51b5;
            --text: #2d2d3f;
            --muted: #7a7a9d;
            --white: #ffffff;
            --card-bg: rgba(255, 255, 255, .65);
            --glass: rgba(255, 255, 255, .45)
        }

        *,
        *::before,
        *::after {
            box-sizing: border-box
        }

        html {
            scroll-behavior: smooth
        }

        body {
            font-family: 'DM Sans', sans-serif;
            color: var(--text);
            overflow-x: hidden;
            background: linear-gradient(135deg, #fce4ec 0%, #e8f4fd 50%, #f3e5f5 100%);
            min-height: 100vh
        }

        .section-tag {
            display: inline-block;
            font-size: .72rem;
            font-weight: 700;
            letter-spacing: 2px;
            text-transform: uppercase;
            padding: .3rem .9rem;
            border-radius: 99px;
            background: linear-gradient(135deg, rgba(233, 30, 140, .12), rgba(156, 39, 176, .12));
            color: var(--rose);
            margin-bottom: .9rem
        }

        .section-title {
            font-family: 'Playfair Display', serif;
            font-size: clamp(1.8rem, 4vw, 2.9rem);
            font-weight: 800;
            line-height: 1.15;
            color: var(--text)
        }

        .gradient-text {
            background: linear-gradient(135deg, #e91e8c 0%, #9c27b0 55%, #3f51b5 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text
        }

        .blob {
            position: fixed;
            border-radius: 50%;
            filter: blur(60px);
            opacity: .35;
            pointer-events: none;
            animation: blobFloat 8s ease-in-out infinite
        }

        .blob-1 {
            width: 400px;
            height: 400px;
            background: radial-gradient(circle, #f7b2cb, transparent 70%);
            top: -80px;
            left: -100px
        }

        .blob-2 {
            width: 350px;
            height: 350px;
            background: radial-gradient(circle, #c8b6e2, transparent 70%);
            bottom: 10%;
            right: -80px;
            animation-delay: 3s
        }

        @keyframes blobFloat {

            0%,
            100% {
                transform: translateY(0) scale(1)
            }

            50% {
                transform: translateY(-28px) scale(1.04)
            }
        }

        .fade-up {
            opacity: 0;
            transform: translateY(36px);
            transition: opacity .65s ease, transform .65s ease
        }

        .fade-up.visible {
            opacity: 1;
            transform: translateY(0)
        }

        /* PAGE HERO */
        .page-hero {
            padding: 120px 0 60px;
            position: relative;
            text-align: center
        }

        .page-hero h1 {
            font-family: 'Playfair Display', serif;
            font-size: clamp(2rem, 5vw, 3.5rem);
            font-weight: 900;
            margin-bottom: 1rem
        }

        .page-hero p {
            color: var(--muted);
            font-size: 1.05rem;
            max-width: 520px;
            margin: 0 auto 2rem
        }

        /* FILTER BAR */
        .filter-bar {
            display: flex;
            flex-wrap: wrap;
            gap: .5rem;
            justify-content: center;
            margin-bottom: 2.5rem
        }

        .filter-btn {
            padding: .4rem 1.1rem;
            border-radius: 99px;
            border: 1.5px solid rgba(233, 30, 140, .25);
            color: var(--muted);
            background: rgba(255, 255, 255, .6);
            font-size: .83rem;
            font-weight: 600;
            cursor: pointer;
            transition: all .25s ease;
            backdrop-filter: blur(8px)
        }

        .filter-btn:hover,
        .filter-btn.active {
            background: linear-gradient(135deg, #e91e8c, #9c27b0);
            color: #fff;
            border-color: transparent;
            transform: translateY(-2px);
            box-shadow: 0 4px 14px rgba(233, 30, 140, .3)
        }

        /* SEARCH */
        .search-wrap {
            max-width: 420px;
            margin: 0 auto 2rem;
            position: relative
        }

        .search-input {
            width: 100%;
            padding: .75rem 1.2rem .75rem 3rem;
            border-radius: 14px;
            border: 2px solid rgba(233, 30, 140, .2);
            background: rgba(255, 255, 255, .75);
            backdrop-filter: blur(8px);
            font-family: 'DM Sans', sans-serif;
            font-size: .9rem;
            color: var(--text);
            outline: none;
            transition: all .25s
        }

        .search-input:focus {
            border-color: var(--rose);
            box-shadow: 0 0 0 4px rgba(233, 30, 140, .1);
            background: rgba(255, 255, 255, .95)
        }

        .search-icon {
            position: absolute;
            left: 1rem;
            top: 50%;
            transform: translateY(-50%);
            color: var(--muted);
            font-size: .9rem
        }

        /* BRAND CARDS */
        .brand-card {
            background: var(--card-bg);
            backdrop-filter: blur(16px);
            border: 1px solid rgba(255, 255, 255, .68);
            border-radius: 22px;
            overflow: hidden;
            box-shadow: 0 6px 24px rgba(150, 80, 180, .09);
            transition: all .3s ease;
            height: 100%
        }

        .brand-card:hover {
            transform: translateY(-10px) scale(1.01);
            box-shadow: 0 24px 55px rgba(150, 80, 180, .2)
        }

        .brand-card-header {
            padding: 2rem;
            text-align: center;
            position: relative
        }

        .brand-logo {
            width: 80px;
            height: 80px;
            border-radius: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.6rem;
            font-weight: 900;
            margin: 0 auto 1rem;
            color: #fff;
            font-family: 'Playfair Display', serif;
            box-shadow: 0 8px 24px rgba(0, 0, 0, .25)
        }

        .brand-card-body {
            padding: 0 1.4rem 1.6rem
        }

        .brand-card h5 {
            font-family: 'Playfair Display', serif;
            font-size: 1.1rem;
            font-weight: 800;
            margin-bottom: .25rem;
            text-align: center
        }

        .brand-tagline {
            font-size: .78rem;
            color: var(--muted);
            text-align: center;
            margin-bottom: 1rem;
            font-style: italic
        }

        .brand-meta {
            display: flex;
            justify-content: space-between;
            margin-bottom: 1rem;
            padding: .7rem .9rem;
            background: rgba(233, 30, 140, .05);
            border-radius: 10px;
            border: 1px solid rgba(233, 30, 140, .08)
        }

        .brand-meta-item {
            text-align: center
        }

        .brand-meta-val {
            font-weight: 700;
            font-size: .9rem;
            color: var(--rose)
        }

        .brand-meta-lbl {
            font-size: .68rem;
            color: var(--muted)
        }

        .brand-badge {
            display: inline-block;
            padding: .22rem .65rem;
            border-radius: 99px;
            font-size: .68rem;
            font-weight: 700;
            background: linear-gradient(135deg, rgba(233, 30, 140, .1), rgba(156, 39, 176, .08));
            color: var(--violet);
            border: 1px solid rgba(156, 39, 176, .15);
            margin-bottom: .8rem
        }

        .stars {
            color: #f59e0b;
            font-size: .75rem
        }

        .btn-view-offers {
            width: 100%;
            padding: .55rem;
            border-radius: 10px;
            background: linear-gradient(135deg, #e91e8c, #9c27b0);
            color: #fff;
            border: none;
            font-weight: 700;
            font-size: .85rem;
            cursor: pointer;
            transition: all .25s;
            box-shadow: 0 4px 14px rgba(233, 30, 140, .3)
        }

        .btn-view-offers:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 22px rgba(233, 30, 140, .45)
        }

        .section-divider {
            height: 1px;
            background: linear-gradient(90deg, transparent, rgba(233, 30, 140, .2), rgba(156, 39, 176, .2), transparent);
            margin: 0 auto;
            max-width: 700px
        }
    </style>
</head>

<body>
    <div class="blob blob-1"></div>
    <div class="blob blob-2"></div>
    <div style="height:80px"></div>

    <!-- PAGE HERO -->
    <section class="page-hero">
        <div class="container">
            <div class="fade-up">
                <span class="section-tag"><i class="fa-solid fa-store me-1"></i> Brand Directory</span>
                <h1 class="section-title">Explore Top <span class="gradient-text">Brands</span></h1>
                <p>Discover exclusive deals, campaigns and promotions from the world's most iconic brands — all in one place.</p>

                <!-- Search -->
                <div class="search-wrap">
                    <i class="fa-solid fa-magnifying-glass search-icon"></i>
                    <input type="text" class="search-input" id="brandSearch" placeholder="Search brands…" />
                </div>

                <!-- Filter -->
                <div class="filter-bar" id="filterBar">
                    <button class="filter-btn active" data-cat="all">All Brands</button>
                    <?php foreach ($categories as $cat): ?>
                        <button class="filter-btn" data-cat="<?= htmlspecialchars($cat) ?>"><?= htmlspecialchars($cat) ?></button>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </section>

    <!-- BRANDS GRID -->
    <section style="padding:0 0 80px">
        <div class="container">
            <div class="row g-4" id="brandsGrid">
                <?php foreach ($brands as $i => $b): ?>
                    <div class="col-6 col-md-4 col-lg-3 fade-up brand-item" data-cat="<?= htmlspecialchars($b['category']) ?>" data-name="<?= strtolower($b['name']) ?>" style="transition-delay:<?= ($i % 4) * 0.08 ?>s">
                        <div class="brand-card">
                            <div class="brand-card-header">
                                <div class="brand-logo" style="background:<?= $b['bg'] ?>">
                                    <?php if ($b['logo_icon']): ?><i class="<?= $b['logo_icon'] ?>"></i><?php else: ?><?= $b['logo_text'] ?><?php endif; ?>
                                </div>
                                <div class="stars">
                                    <?php for ($s = 0; $s < 5; $s++) echo $s < floor($b['rating']) ? '★' : '☆'; ?>
                                    <span style="color:var(--muted);font-size:.7rem;margin-left:.2rem"><?= $b['rating'] ?></span>
                                </div>
                            </div>
                            <div class="brand-card-body">
                                <h5><?= $b['name'] ?></h5>
                                <p class="brand-tagline">"<?= $b['tagline'] ?>"</p>
                                <span class="brand-badge"><?= $b['category'] ?></span>
                                <div class="brand-meta">
                                    <div class="brand-meta-item">
                                        <div class="brand-meta-val"><?= $b['offers'] ?></div>
                                        <div class="brand-meta-lbl">Offers</div>
                                    </div>
                                    <div class="brand-meta-item">
                                        <div class="brand-meta-val"><?= $b['discount'] ?></div>
                                        <div class="brand-meta-lbl">Discount</div>
                                    </div>
                                    <div class="brand-meta-item">
                                        <div class="brand-meta-val"><?= $b['products'] ?></div>
                                        <div class="brand-meta-lbl">Products</div>
                                    </div>
                                </div>
                                <button class="btn-view-offers">View Offers <i class="fa-solid fa-arrow-right ms-1"></i></button>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
            <div id="noResults" style="display:none;text-align:center;padding:3rem;color:var(--muted)">
                <i class="fa-solid fa-face-sad-tear" style="font-size:2.5rem;margin-bottom:1rem;color:rgba(233,30,140,.3)"></i>
                <p style="font-size:1.1rem">No brands found matching your search.</p>
            </div>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Fade-up
        const io = new IntersectionObserver(e => e.forEach(x => {
            if (x.isIntersecting) x.target.classList.add('visible')
        }), {
            threshold: .1
        });
        document.querySelectorAll('.fade-up').forEach(el => io.observe(el));

        // Filter
        let activecat = 'all';
        document.querySelectorAll('.filter-btn').forEach(btn => {
            btn.addEventListener('click', function() {
                document.querySelectorAll('.filter-btn').forEach(b => b.classList.remove('active'));
                this.classList.add('active');
                activecat = this.dataset.cat;
                filterBrands();
            });
        });

        // Search
        document.getElementById('brandSearch').addEventListener('input', filterBrands);

        function filterBrands() {
            const q = document.getElementById('brandSearch').value.toLowerCase();
            const items = document.querySelectorAll('.brand-item');
            let visible = 0;
            items.forEach(item => {
                const catMatch = activecat === 'all' || item.dataset.cat === activecat;
                const nameMatch = item.dataset.name.includes(q);
                const show = catMatch && nameMatch;
                item.style.display = show ? '' : 'none';
                if (show) visible++;
            });
            document.getElementById('noResults').style.display = visible === 0 ? 'block' : 'none';
        }
    </script>
      <?php include __DIR__ . '/includes/login-model.php'; ?>
     <!-- <?php include __DIR__ . '/../app/includes/signup-model.php'; ?> -->
    <?php require_once __DIR__ . '/includes/footer.php'; ?>
</body>

</html>