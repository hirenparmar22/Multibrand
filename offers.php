<?php
session_start();

require_once __DIR__ . '/includes/header.php';

$user_id = (int)($_SESSION['user_id'] ?? 0);

// DEMO DATA
$offers = [
    ['id' => 1, 'brand' => 'Nike',   'brand_bg' => 'linear-gradient(135deg,#1a1a2e,#16213e)', 'brand_initial' => '', 'brand_icon' => 'fa-brands fa-nike', 'title' => 'Nike Summer Sale', 'desc' => 'Get up to 30% off on all Nike running shoes, jerseys, and sportswear. Limited time!', 'discount' => 30, 'code' => 'NIKE30', 'expiry' => '2026-05-31', 'type' => 'Season Sale', 'card_class' => 'oc-1', 'tags' => ['Shoes', 'Apparel'], 'claimed' => 1240],
    ['id' => 2, 'brand' => 'Adidas', 'brand_bg' => 'linear-gradient(135deg,#2d2d44,#3d3d5c)', 'brand_initial' => 'ADI', 'brand_icon' => '', 'title' => 'Adidas Flash Deal', 'desc' => 'Flash deal! 20% off on Adidas Originals & NMD collections. Shop before it\'s gone.', 'discount' => 20, 'code' => 'ADIDAS20', 'expiry' => '2026-06-05', 'type' => 'Flash Deal', 'card_class' => 'oc-2', 'tags' => ['Shoes', 'Originals'], 'claimed' => 876],
    ['id' => 3, 'brand' => 'Puma',   'brand_bg' => 'linear-gradient(135deg,#c62828,#e53935)', 'brand_initial' => '', 'brand_icon' => 'fa-solid fa-paw', 'title' => 'Puma Mega Offer', 'desc' => '15% off sitewide on Puma. Perfect for your fitness goals — don\'t miss out!', 'discount' => 15, 'code' => 'PUMA15', 'expiry' => '2026-05-15', 'type' => 'Mega Offer', 'card_class' => 'oc-3', 'tags' => ['Fitness', 'Casual'], 'claimed' => 540],
    ['id' => 4, 'brand' => 'Reebok', 'brand_bg' => 'linear-gradient(135deg,#880e4f,#c2185b)', 'brand_initial' => 'R', 'brand_icon' => '', 'title' => 'Reebok Weekend Special', 'desc' => '25% discount on Reebok CrossFit gear and classic footwear. This weekend only!', 'discount' => 25, 'code' => 'REEBKWK', 'expiry' => '2026-06-10', 'type' => 'Weekend Deal', 'card_class' => 'oc-4', 'tags' => ['CrossFit', 'Footwear'], 'claimed' => 320],
    ['id' => 5, 'brand' => 'Zara',   'brand_bg' => 'linear-gradient(135deg,#2e7d32,#388e3c)', 'brand_initial' => 'Z', 'brand_icon' => '', 'title' => 'Zara Clearance Sale', 'desc' => 'Up to 40% off on Zara\'s latest summer collection. Trendy styles at unbeatable prices.', 'discount' => 40, 'code' => 'ZARA40', 'expiry' => '2026-05-20', 'type' => 'Clearance', 'card_class' => 'oc-1', 'tags' => ['Fashion', 'Summer'], 'claimed' => 2100],
    ['id' => 6, 'brand' => 'H&M',    'brand_bg' => 'linear-gradient(135deg,#b71c1c,#d32f2f)', 'brand_initial' => 'H&M', 'brand_icon' => '', 'title' => 'H&M Big Season Sale', 'desc' => 'Shop the latest H&M trends at 35% off. New arrivals included — style for everyone.', 'discount' => 35, 'code' => 'HM35NOW', 'expiry' => '2026-06-15', 'type' => 'Season Sale', 'card_class' => 'oc-2', 'tags' => ['Fashion', 'New Arrivals'], 'claimed' => 1680],
    ['id' => 7, 'brand' => 'Samsung', 'brand_bg' => 'linear-gradient(135deg,#1565c0,#1976d2)', 'brand_initial' => 'SAM', 'brand_icon' => '', 'title' => 'Samsung Galaxy Fest', 'desc' => 'Save 18% on Samsung Galaxy smartphones & accessories. Upgrade your tech today.', 'discount' => 18, 'code' => 'SAMGFEST', 'expiry' => '2026-05-25', 'type' => 'Tech Fest', 'card_class' => 'oc-3', 'tags' => ['Phones', 'Accessories'], 'claimed' => 950],
    ['id' => 8, 'brand' => 'Apple',  'brand_bg' => 'linear-gradient(135deg,#424242,#757575)', 'brand_initial' => '', 'brand_icon' => 'fa-brands fa-apple', 'title' => 'Apple Refurb Sale', 'desc' => 'Certified refurbished Apple products at 10% off. Same quality, better price.', 'discount' => 10, 'code' => 'APLREFURB', 'expiry' => '2026-06-30', 'type' => 'Refurb Sale', 'card_class' => 'oc-4', 'tags' => ['iPhone', 'Mac'], 'claimed' => 432],
];

$types = array_unique(array_column($offers, 'type'));
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Offers – MultiBrand Promotion</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@300;400;500;600;700&family=Playfair+Display:wght@700;800;900&display=swap" rel="stylesheet" />
    <style>
        :root {
            --pink: #f7b2cb;
            --rose: #e91e8c;
            --violet: #9c27b0;
            --indigo: #3f51b5;
            --text: #2d2d3f;
            --muted: #7a7a9d;
            --glass: rgba(255, 255, 255, .45);
            --card-bg: rgba(255, 255, 255, .65)
        }

        *,
        *::before,
        *::after {
            box-sizing: border-box
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
            line-height: 1.15
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
            bottom: 5%;
            right: -80px;
            animation-delay: 3s
        }

        @keyframes blobFloat {

            0%,
            100% {
                transform: translateY(0)
            }

            50% {
                transform: translateY(-28px)
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

        .page-hero {
            padding: 120px 0 60px;
            text-align: center;
            position: relative
        }

        .page-hero h1 {
            font-family: 'Playfair Display', serif;
            font-size: clamp(2rem, 5vw, 3.5rem);
            font-weight: 900;
            margin-bottom: 1rem
        }

        .filter-bar {
            display: flex;
            flex-wrap: wrap;
            gap: .5rem;
            justify-content: center;
            margin-bottom: 2rem
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
            transition: all .25s;
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

        /* OFFER CARD */
        .offer-card {
            border-radius: 24px;
            overflow: hidden;
            box-shadow: 0 8px 30px rgba(0, 0, 0, .09);
            transition: all .3s ease;
            height: 100%;
            position: relative
        }

        .offer-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 28px 60px rgba(0, 0, 0, .16)
        }

        .oc-1 {
            background: linear-gradient(135deg, #ff9a9e, #fad0c4)
        }

        .oc-2 {
            background: linear-gradient(135deg, #a18cd1, #fbc2eb)
        }

        .oc-3 {
            background: linear-gradient(135deg, #fccb90, #d57eeb)
        }

        .oc-4 {
            background: linear-gradient(135deg, #84fab0, #8fd3f4)
        }

        .offer-top {
            padding: 1.8rem 1.8rem 1.4rem;
            position: relative
        }

        .offer-badge {
            display: inline-block;
            background: rgba(255, 255, 255, .35);
            backdrop-filter: blur(8px);
            border-radius: 99px;
            padding: .25rem .8rem;
            font-size: .68rem;
            font-weight: 700;
            letter-spacing: 1.5px;
            text-transform: uppercase;
            color: #fff;
            margin-bottom: .9rem;
            animation: badgePulse 2.5s ease-in-out infinite
        }

        @keyframes badgePulse {

            0%,
            100% {
                transform: scale(1)
            }

            50% {
                transform: scale(1.06)
            }
        }

        .offer-discount {
            font-family: 'Playfair Display', serif;
            font-size: 3.2rem;
            font-weight: 900;
            color: #fff;
            line-height: 1;
            text-shadow: 0 2px 12px rgba(0, 0, 0, .15);
            margin-bottom: .3rem
        }

        .offer-title {
            font-size: 1.05rem;
            font-weight: 700;
            color: #fff;
            margin-bottom: .5rem
        }

        .offer-desc {
            font-size: .82rem;
            color: rgba(255, 255, 255, .85);
            line-height: 1.6;
            margin-bottom: 1.2rem
        }

        .offer-bottom {
            padding: 1.2rem 1.8rem 1.8rem;
            background: rgba(255, 255, 255, .25);
            backdrop-filter: blur(10px)
        }

        .brand-chip {
            display: inline-flex;
            align-items: center;
            gap: .4rem;
            background: rgba(255, 255, 255, .4);
            border-radius: 99px;
            padding: .28rem .8rem;
            font-size: .75rem;
            font-weight: 700;
            color: #fff;
            margin-bottom: .9rem
        }

        .brand-mini-logo {
            width: 24px;
            height: 24px;
            border-radius: 6px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-size: .65rem;
            font-weight: 900;
            color: #fff
        }

        .code-box {
            display: flex;
            align-items: center;
            gap: .5rem;
            background: rgba(255, 255, 255, .35);
            border: 1.5px dashed rgba(255, 255, 255, .7);
            border-radius: 10px;
            padding: .5rem .9rem;
            margin-bottom: .9rem;
            cursor: pointer;
            transition: all .2s
        }

        .code-box:hover {
            background: rgba(255, 255, 255, .55)
        }

        .code-text {
            font-family: 'Courier New', monospace;
            font-size: .88rem;
            font-weight: 700;
            color: #fff;
            letter-spacing: .1em;
            flex: 1
        }

        .expiry-row {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: .9rem
        }

        .expiry-text {
            font-size: .75rem;
            color: rgba(255, 255, 255, .8)
        }

        .claimed-text {
            font-size: .75rem;
            color: rgba(255, 255, 255, .8)
        }

        .btn-claim {
            width: 100%;
            padding: .55rem;
            border-radius: 10px;
            background: rgba(255, 255, 255, .3);
            backdrop-filter: blur(8px);
            color: #fff;
            border: 1.5px solid rgba(255, 255, 255, .5);
            font-weight: 700;
            font-size: .88rem;
            cursor: pointer;
            transition: all .25s
        }

        .btn-claim:hover {
            background: rgba(255, 255, 255, .55);
            color: var(--text)
        }

        .offer-tag {
            display: inline-block;
            background: rgba(255, 255, 255, .25);
            border-radius: 99px;
            padding: .18rem .55rem;
            font-size: .65rem;
            font-weight: 600;
            color: #fff;
            margin-right: .3rem;
            margin-bottom: .3rem
        }

        .tag-copied {
            background: rgba(255, 255, 255, .5) !important
        }

        /* Stats bar */
        .stats-bar {
            display: flex;
            gap: 1rem;
            justify-content: center;
            flex-wrap: wrap;
            margin-bottom: 2.5rem
        }

        .stat-pill {
            background: var(--glass);
            backdrop-filter: blur(16px);
            border: 1px solid rgba(255, 255, 255, .65);
            border-radius: 99px;
            padding: .5rem 1.4rem;
            font-size: .82rem;
            font-weight: 600;
            color: var(--text)
        }

        .stat-pill span {
            color: var(--rose);
            font-weight: 800
        }
    </style>
</head>

<body>
    <div class="blob blob-1"></div>
    <div class="blob blob-2"></div>
    <div style="height:80px"></div>

    <section class="page-hero">
        <div class="container fade-up">
            <span class="section-tag"><i class="fa-solid fa-tags me-1"></i> Hot Deals</span>
            <h1 class="section-title">Exclusive <span class="gradient-text">Offers</span> & Deals</h1>
            <p style="color:var(--muted);max-width:500px;margin:.5rem auto 1.5rem;font-size:1rem">Grab the hottest limited-time deals from the world's top brands. Copy your code and save instantly.</p>

            <div class="stats-bar">
                <div class="stat-pill"><span><?= count($offers) ?></span> Active Offers</div>
                <div class="stat-pill"><span>Up to 40%</span> Max Discount</div>
                <div class="stat-pill"><span>8</span> Brands</div>
                <div class="stat-pill"><span>Ends Soon</span> — Act Fast!</div>
            </div>

            <div class="filter-bar">
                <button class="filter-btn active" data-type="all">All Offers</button>
                <?php foreach ($types as $t): ?>
                    <button class="filter-btn" data-type="<?= htmlspecialchars($t) ?>"><?= htmlspecialchars($t) ?></button>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section style="padding:0 0 80px">
        <div class="container">
            <div class="row g-4" id="offersGrid">
                <?php foreach ($offers as $i => $o): ?>
                    <div class="col-sm-6 col-lg-3 fade-up offer-item" data-type="<?= htmlspecialchars($o['type']) ?>" style="transition-delay:<?= ($i % 4) * 0.08 ?>s">
                        <div class="offer-card <?= $o['card_class'] ?>">
                            <div class="offer-top">
                                <span class="offer-badge"><?= $o['type'] ?></span>
                                <div class="offer-discount"><?= $o['discount'] ?>%<br><span style="font-size:1.4rem">OFF</span></div>
                                <div class="offer-title"><?= htmlspecialchars($o['title']) ?></div>
                                <div class="offer-desc"><?= htmlspecialchars($o['desc']) ?></div>
                                <?php foreach ($o['tags'] as $tag): ?>
                                    <span class="offer-tag"><?= $tag ?></span>
                                <?php endforeach; ?>
                            </div>
                            <div class="offer-bottom">
                                <div class="brand-chip">
                                    <div class="brand-mini-logo" style="background:<?= $o['brand_bg'] ?>">
                                        <?php if ($o['brand_icon']): ?><i class="<?= $o['brand_icon'] ?>" style="font-size:.7rem"></i><?php else: ?><?= substr($o['brand'], 0, 1) ?><?php endif; ?>
                                    </div>
                                    <?= htmlspecialchars($o['brand']) ?>
                                </div>
                                <div class="code-box" onclick="copyCode(this,'<?= $o['code'] ?>')">
                                    <i class="fa-solid fa-copy" style="color:rgba(255,255,255,.8);font-size:.8rem"></i>
                                    <span class="code-text"><?= $o['code'] ?></span>
                                    <span style="font-size:.65rem;color:rgba(255,255,255,.7)">Tap to copy</span>
                                </div>
                                <div class="expiry-row">
                                    <div class="expiry-text"><i class="fa-solid fa-clock me-1"></i>Expires <?= date('M d', strtotime($o['expiry'])) ?></div>
                                    <div class="claimed-text"><i class="fa-solid fa-fire me-1"></i><?= number_format($o['claimed']) ?> claimed</div>
                                </div>
                                <button class="btn-claim ripple-btn">Claim Offer <i class="fa-solid fa-arrow-right ms-1"></i></button>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        const io = new IntersectionObserver(e => e.forEach(x => {
            if (x.isIntersecting) x.target.classList.add('visible')
        }), {
            threshold: .1
        });
        document.querySelectorAll('.fade-up').forEach(el => io.observe(el));

        document.querySelectorAll('.filter-btn').forEach(btn => {
            btn.addEventListener('click', function() {
                document.querySelectorAll('.filter-btn').forEach(b => b.classList.remove('active'));
                this.classList.add('active');
                const type = this.dataset.type;
                document.querySelectorAll('.offer-item').forEach(item => {
                    item.style.display = (type === 'all' || item.dataset.type === type) ? '' : 'none';
                });
            });
        });

        function copyCode(el, code) {
            navigator.clipboard.writeText(code).catch(() => {});
            const orig = el.querySelector('.code-text').textContent;
            el.querySelector('.code-text').textContent = 'Copied!';
            el.classList.add('tag-copied');
            setTimeout(() => {
                el.querySelector('.code-text').textContent = orig;
                el.classList.remove('tag-copied');
            }, 2000);
        }
    </script>
     <?php include __DIR__ . '/includes/login-model.php'; ?>
     <!-- <?php include __DIR__ . '/../app/includes/signup-model.php'; ?> -->
    <?php require_once __DIR__ . '/includes/footer.php'; ?>
</body>

</html>