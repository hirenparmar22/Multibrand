<?php
include 'config.php';

error_reporting(E_ALL);
ini_set('display_errors', 1);

$brand_id = isset($_GET['brand_id']) ? (int)$_GET['brand_id'] : 0;

/* FETCH BRAND */
$brand = null;
$promotions = [];

if ($brand_id > 0) {

    $stmt = $conn->prepare("SELECT * FROM brands WHERE id = ?");
    $stmt->bind_param("i", $brand_id);
    $stmt->execute();
    $brand = $stmt->get_result()->fetch_assoc();
    $stmt->close();

    if ($brand) {
        $stmt = $conn->prepare("SELECT * FROM promotions WHERE brand_id = ? ORDER BY created_at DESC");
        $stmt->bind_param("i", $brand_id);
        $stmt->execute();

        $res = $stmt->get_result();
        while ($row = $res->fetch_assoc()) {
            $promotions[] = $row;
        }
        $stmt->close();
    }
}

/* HELPERS */
function initials($name)
{
    $p = explode(" ", trim($name));
    return strtoupper($p[0][0] . ($p[1][0] ?? ''));
}

function timeLeft($expiry)
{
    if (!$expiry) return '';

    $diff = strtotime($expiry) - time();
    if ($diff <= 0) return "Expired";

    $d = floor($diff / 86400);
    $h = floor(($diff % 86400) / 3600);

    return $d > 0 ? "$d d $h h left" : "$h h left";
}

/* SAFE DEFAULTS */
if ($brand) {
    $brandName = htmlspecialchars($brand['brand_name']);
    $inits = initials($brand['brand_name']);
} else {
    $brandName = "Brand Not Found";
    $inits = "??";
}
?>










<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title><?= $brandName ?> — Promotions</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Fraunces:opsz,wght@9..144,700;9..144,900&family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --page-bg: #FDF7F4;
            --card-bg: #FFFFFF;
            --txt-dark: #1A1523;
            --txt-mid: #6B5E7A;
            --r-card: 20px;
            --shadow-rest: 0 2px 12px rgba(60, 30, 80, .07);
            --shadow-up: 0 16px 40px rgba(60, 30, 80, .15);
            --spring: cubic-bezier(.34, 1.56, .64, 1);
        }

        *,
        *::before,
        *::after {
            box-sizing: border-box;
            margin: 0;
            padding: 0
        }

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background: var(--page-bg);
            color: var(--txt-dark);
        }

        /* blobs */
        .blob-layer {
            position: fixed;
            inset: 0;
            pointer-events: none;
            overflow: hidden;
            z-index: 0;
        }

        .blob {
            position: absolute;
            border-radius: 50%;
            filter: blur(90px);
        }

        .b1 {
            width: 480px;
            height: 480px;
            background: #FFD6E0;
            opacity: .28;
            top: -170px;
            left: -140px;
        }

        .b2 {
            width: 380px;
            height: 380px;
            background: #D4EAFF;
            opacity: .25;
            bottom: -130px;
            right: -110px;
        }

        .page-wrap {
            position: relative;
            z-index: 1;
            max-width: 1280px;
            margin: 0 auto;
            padding: 3rem 1.5rem 5rem;
        }

        /* ── Back breadcrumb ── */
        .breadcrumb-bar {
            display: flex;
            align-items: center;
            gap: .5rem;
            font-size: .78rem;
            font-weight: 600;
            color: var(--txt-mid);
            margin-bottom: 1.75rem;
        }

        .breadcrumb-bar a {
            color: var(--txt-mid);
            text-decoration: none;
        }

        .breadcrumb-bar a:hover {
            color: var(--txt-dark);
        }

        .breadcrumb-bar .sep {
            opacity: .4;
        }

        /* ── Brand hero card ── */
        .brand-hero {
            background: #fff;
            border-radius: 24px;
            box-shadow: var(--shadow-rest);
            border: 1.5px solid rgba(100, 60, 140, .055);
            padding: 2rem 2.25rem;
            display: flex;
            align-items: center;
            gap: 1.5rem;
            flex-wrap: wrap;
            margin-bottom: 2rem;
            position: relative;
            overflow: hidden;
        }

        .brand-hero::before {
            content: '';
            position: absolute;
            width: 260px;
            height: 260px;
            border-radius: 50%;
            background: <?= $pastel['bg'] ?>;
            opacity: .5;
            right: -80px;
            top: -80px;
            pointer-events: none;
        }

        .bh-avatar {
            width: 72px;
            height: 72px;
            border-radius: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Fraunces', serif;
            font-weight: 900;
            font-size: 1.3rem;
            color: <?= $pastel['fg'] ?>;
            background: <?= $pastel['bg'] ?>;
            border: 2.5px solid <?= $pastel['ring'] ?>;
            flex-shrink: 0;
        }

        .bh-info h2 {
            font-family: 'Fraunces', serif;
            font-weight: 900;
            font-size: 1.6rem;
            margin-bottom: .3rem;
        }

        .bh-info p {
            color: var(--txt-mid);
            font-size: .88rem;
            font-weight: 400;
            margin: 0;
        }

        .bh-stats {
            margin-left: auto;
            display: flex;
            gap: 1.5rem;
            flex-wrap: wrap;
        }

        .bh-stat {
            text-align: center;
        }

        .bh-stat .val {
            font-family: 'Fraunces', serif;
            font-weight: 900;
            font-size: 1.4rem;
            color: <?= $pastel['fg'] ?>;
            display: block;
            line-height: 1;
        }

        .bh-stat .lbl {
            font-size: .67rem;
            color: var(--txt-mid);
            letter-spacing: .06em;
            text-transform: uppercase;
            font-weight: 600;
        }

        /* ── Section heading ── */
        .sec-heading {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1.4rem;
            flex-wrap: wrap;
            gap: .75rem;
        }

        .sec-heading h3 {
            font-family: 'Fraunces', serif;
            font-weight: 900;
            font-size: 1.3rem;
            margin: 0;
        }

        .tag-chip {
            font-size: .7rem;
            font-weight: 700;
            letter-spacing: .07em;
            text-transform: uppercase;
            background: <?= $pastel['bg'] ?>;
            color: <?= $pastel['fg'] ?>;
            border: 1.5px solid <?= $pastel['ring'] ?>;
            border-radius: 99px;
            padding: .28rem .8rem;
        }

        /* ── Promo grid ── */
        .promo-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(290px, 1fr));
            gap: 1.1rem;
        }

        /* ── Promo card ── */
        .promo-card {
            background: var(--card-bg);
            border-radius: var(--r-card);
            box-shadow: var(--shadow-rest);
            border: 1.5px solid rgba(100, 60, 140, .06);
            overflow: hidden;
            display: flex;
            flex-direction: column;
            transition: transform .3s var(--spring), box-shadow .28s;
            opacity: 0;
            animation: fadeUp .45s forwards;
            will-change: transform;
        }

        .promo-card:hover {
            transform: translateY(-7px) scale(1.013);
            box-shadow: var(--shadow-up);
        }

        @keyframes fadeUp {
            from {
                opacity: 0;
                transform: translateY(18px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        <?php for ($i = 0; $i < 30; $i++): ?>.promo-card:nth-child(<?= $i + 1 ?>) {
            animation-delay: <?= round($i * .05, 2) ?>s;
        }

        <?php endfor; ?>.promo-stripe {
            height: 5px;
            background: linear-gradient(90deg, <?= $pastel['fg'] ?>, <?= $pastel['ring'] ?>);
        }

        .promo-body {
            padding: 1.35rem 1.4rem;
            flex: 1;
        }

        /* discount badge */
        .discount-pill {
            display: inline-flex;
            align-items: center;
            gap: .3rem;
            background: <?= $pastel['bg'] ?>;
            color: <?= $pastel['fg'] ?>;
            border: 1.5px solid <?= $pastel['ring'] ?>;
            border-radius: 99px;
            font-size: .68rem;
            font-weight: 800;
            letter-spacing: .05em;
            text-transform: uppercase;
            padding: .22rem .75rem;
            margin-bottom: .85rem;
        }

        .discount-pill::before {
            content: '🏷️';
            font-size: .75rem;
        }

        .promo-title {
            font-family: 'Fraunces', serif;
            font-weight: 700;
            font-size: 1rem;
            line-height: 1.25;
            margin-bottom: .5rem;
        }

        .promo-desc {
            font-size: .8rem;
            color: var(--txt-mid);
            line-height: 1.5;
            margin-bottom: .9rem;
        }

        /* coupon box */
        .coupon-box {
            display: flex;
            align-items: center;
            gap: .5rem;
            background: #F7F3FC;
            border-radius: 10px;
            padding: .5rem .75rem;
            margin-bottom: .8rem;
            border: 1.5px dashed <?= $pastel['ring'] ?>;
        }

        .coupon-code {
            font-family: 'Fraunces', serif;
            font-weight: 700;
            font-size: .88rem;
            color: <?= $pastel['fg'] ?>;
            letter-spacing: .08em;
            flex: 1;
        }

        .copy-btn {
            font-size: .65rem;
            font-weight: 700;
            letter-spacing: .06em;
            text-transform: uppercase;
            background: <?= $pastel['fg'] ?>;
            color: #fff;
            border: none;
            border-radius: 7px;
            padding: .25rem .65rem;
            cursor: pointer;
            transition: opacity .18s, transform .18s;
            flex-shrink: 0;
        }

        .copy-btn:hover {
            opacity: .85;
            transform: scale(1.06);
        }

        /* expiry */
        .expiry-row {
            display: flex;
            align-items: center;
            gap: .35rem;
            font-size: .7rem;
            color: var(--txt-mid);
            font-weight: 500;
        }

        .expiry-dot {
            width: 6px;
            height: 6px;
            border-radius: 50%;
            background: #F59E0B;
            display: inline-block;
        }

        /* card footer */
        .promo-foot {
            padding: .85rem 1.4rem;
            border-top: 1.5px solid #F5F0FB;
        }

        .btn-use {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: .4rem;
            width: 100%;
            border-radius: 12px;
            padding: .6rem 1rem;
            font-size: .8rem;
            font-weight: 700;
            font-family: 'Plus Jakarta Sans', sans-serif;
            border: 2px solid <?= $pastel['ring'] ?>;
            background: <?= $pastel['bg'] ?>;
            color: <?= $pastel['fg'] ?>;
            text-decoration: none;
            transition: filter .2s, transform .2s var(--spring), gap .18s;
        }

        .btn-use:hover {
            filter: brightness(1.08) saturate(1.1);
            transform: scale(1.03);
            gap: .7rem;
            color: <?= $pastel['fg'] ?>;
        }

        .btn-use .arr {
            transition: transform .18s var(--spring);
        }

        .btn-use:hover .arr {
            transform: translateX(4px);
        }

        /* ── Info sections ── */
        .info-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(260px, 1fr));
            gap: 1.1rem;
            margin-top: 2rem;
        }

        .info-card {
            background: #fff;
            border-radius: var(--r-card);
            box-shadow: var(--shadow-rest);
            border: 1.5px solid rgba(100, 60, 140, .055);
            padding: 1.5rem;
        }

        .info-card .ic-icon {
            font-size: 1.6rem;
            margin-bottom: .75rem;
            display: block;
        }

        .info-card h5 {
            font-family: 'Fraunces', serif;
            font-weight: 700;
            font-size: .95rem;
            margin-bottom: .4rem;
        }

        .info-card p {
            font-size: .8rem;
            color: var(--txt-mid);
            line-height: 1.5;
            margin: 0;
        }

        /* ── How to use ── */
        .how-section {
            background: #fff;
            border-radius: 24px;
            box-shadow: var(--shadow-rest);
            padding: 2rem 2.25rem;
            margin-top: 2rem;
        }

        .how-section h4 {
            font-family: 'Fraunces', serif;
            font-weight: 900;
            font-size: 1.15rem;
            margin-bottom: 1.25rem;
        }

        .steps {
            display: flex;
            gap: 1rem;
            flex-wrap: wrap;
        }

        .step {
            flex: 1;
            min-width: 160px;
            background: var(--page-bg);
            border-radius: 14px;
            padding: 1.1rem;
            position: relative;
        }

        .step-num {
            font-family: 'Fraunces', serif;
            font-weight: 900;
            font-size: 1.4rem;
            color: <?= $pastel['fg'] ?>;
            opacity: .25;
            position: absolute;
            top: .7rem;
            right: .9rem;
            line-height: 1;
        }

        .step-icon {
            font-size: 1.3rem;
            margin-bottom: .5rem;
            display: block;
        }

        .step h6 {
            font-weight: 700;
            font-size: .85rem;
            margin-bottom: .3rem;
        }

        .step p {
            font-size: .75rem;
            color: var(--txt-mid);
            margin: 0;
        }

        /* ── Empty state ── */
        .empty-promo {
            text-align: center;
            padding: 5rem 2rem;
            background: #fff;
            border-radius: 24px;
            box-shadow: var(--shadow-rest);
        }

        .empty-promo .ei {
            font-size: 4rem;
            display: block;
            margin-bottom: 1rem;
        }

        .empty-promo h3 {
            font-family: 'Fraunces', serif;
            font-weight: 900;
            font-size: 1.4rem;
            margin-bottom: .5rem;
        }

        .empty-promo p {
            color: var(--txt-mid);
            font-size: .88rem;
            max-width: 300px;
            margin: 0 auto;
        }

        /* not found */
        .not-found {
            text-align: center;
            padding: 6rem 2rem;
        }

        .not-found h2 {
            font-family: 'Fraunces', serif;
            font-weight: 900;
            font-size: 2rem;
            margin-bottom: .75rem;
        }

        .not-found p {
            color: var(--txt-mid);
        }

        @media(max-width:600px) {
            .bh-stats {
                margin-left: 0;
                gap: 1rem;
            }

            .brand-hero {
                padding: 1.5rem;
            }

            .promo-grid {
                grid-template-columns: 1fr;
            }

            .steps {
                flex-direction: column;
            }
        }
    </style>
</head>

<body>

    <div class="blob-layer" aria-hidden="true">
        <div class="blob b1"></div>
        <div class="blob b2"></div>
    </div>

    <div class="page-wrap">

        <?php if (!$brands): ?>
            <!-- ── Brand not found ── -->
            <div class="not-found">
                <span style="font-size:4rem;display:block;margin-bottom:1rem;">🔍</span>
                <h2>Brand Not Found</h2>
                <p>The brand you're looking for doesn't exist or has been removed.</p>
                <a href="font-view/index.php" class="btn mt-3" style="background:<?= $pastel['bg'] ?>;color:<?= $pastel['fg'] ?>;border:2px solid <?= $pastel['ring'] ?>;border-radius:12px;font-weight:700;padding:.65rem 1.5rem;">
                    ← Back to All Brands
                </a>
            </div>

        <?php else: ?>

            <!-- ── Breadcrumb ── -->
            <div class="breadcrumb-bar">
                <a href="all-brands.php">⭐ All Brands</a>
                <span class="sep">›</span>
                <span><?= $brandName ?></span>
                <span class="sep">›</span>
                <span>Promotions</span>
            </div>

            <!-- ── Brand hero ── -->
            <div class="brand-hero">
                <div class="bh-avatar"><?= $inits ?></div>
                <div class="bh-info">
                    <h2><?= $brandName ?></h2>
                    <p><?= htmlspecialchars($brand['brand_description'] ?? 'Explore exclusive deals from this brand.') ?></p>
                    <div class="mt-2 d-flex gap-2 flex-wrap">
                        <span class="tag-chip">📂 <?= htmlspecialchars($brand['category'] ?? 'General') ?></span>
                        <?php if (!empty($brand['rating'])): ?>
                            <span class="tag-chip">⭐ <?= htmlspecialchars($brand['rating']) ?> Rating</span>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="bh-stats">
                    <div class="bh-stat">
                        <span class="val"><?= count($promotions) ?></span>
                        <span class="lbl">Active Deals</span>
                    </div>
                    <?php if (!empty($brand['total_products'])): ?>
                        <div class="bh-stat">
                            <span class="val"><?= htmlspecialchars($brand['total_products']) ?></span>
                            <span class="lbl">Products</span>
                        </div>
                    <?php endif; ?>
                </div>
            </div>

            <!-- ── Promotions ── -->
            <div class="sec-heading">
                <h3>🎁 Active Promotions</h3>
                <span class="tag-chip"><?= count($promotions) ?> deals available</span>
            </div>

            <?php if (!empty($promotions)): ?>
                <div class="promo-grid">
                    <?php foreach ($promotions as $promo):
                        $title    = htmlspecialchars($promo['title']       ?? 'Special Offer');
                        $desc     = htmlspecialchars($promo['description'] ?? '');
                        $code     = htmlspecialchars($promo['coupon_code'] ?? '');
                        $discount = htmlspecialchars($promo['discount']    ?? '');
                        $expiry   = !empty($promo['expires_at']) ? $promo['expires_at'] : '';
                        $expiryFmt = $expiry ? date('d M Y', strtotime($expiry)) : '';
                        $timeleft = $expiry ? timeLeft($expiry) : '';
                    ?>
                        <div class="promo-card">
                            <div class="promo-stripe"></div>
                            <div class="promo-body">
                                <?php if ($discount): ?>
                                    <div class="discount-pill"><?= $discount ?></div>
                                <?php endif; ?>
                                <div class="promo-title"><?= $title ?></div>
                                <?php if ($desc): ?>
                                    <div class="promo-desc"><?= $desc ?></div>
                                <?php endif; ?>
                                <?php if ($code): ?>
                                    <div class="coupon-box">
                                        <span class="coupon-code"><?= $code ?></span>
                                        <button class="copy-btn" onclick="copyCode(this,'<?= $code ?>')">Copy</button>
                                    </div>
                                <?php endif; ?>
                                <?php if ($timeleft): ?>
                                    <div class="expiry-row">
                                        <span class="expiry-dot"></span>
                                        <?= $timeleft ?> · Expires <?= $expiryFmt ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                            <div class="promo-foot">
                                <a href="#" class="btn-use">
                                    Use This Deal <span class="arr">→</span>
                                </a>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>

            <?php else: ?>
                <div class="empty-promo">
                    <span class="ei">🎟️</span>
                    <h3>No Active Promotions</h3>
                    <p>This brand has no active promotions right now. Check back soon for exciting deals!</p>
                </div>
            <?php endif; ?>

            <!-- ── How to use ── -->
            <div class="how-section">
                <h4>🧭 How to Use a Promotion</h4>
                <div class="steps">
                    <div class="step">
                        <span class="step-num">01</span>
                        <span class="step-icon">🎁</span>
                        <h6>Pick a Deal</h6>
                        <p>Browse available promotions and choose the one that suits you best.</p>
                    </div>
                    <div class="step">
                        <span class="step-num">02</span>
                        <span class="step-icon">📋</span>
                        <h6>Copy the Code</h6>
                        <p>Click the Copy button to grab the coupon code to your clipboard.</p>
                    </div>
                    <div class="step">
                        <span class="step-num">03</span>
                        <span class="step-icon">🛒</span>
                        <h6>Shop & Apply</h6>
                        <p>Visit the brand's store and paste the code at checkout to save.</p>
                    </div>
                    <div class="step">
                        <span class="step-num">04</span>
                        <span class="step-icon">🎉</span>
                        <h6>Enjoy Savings!</h6>
                        <p>Your discount is applied — sit back and enjoy the deal!</p>
                    </div>
                </div>
            </div>

            <!-- ── Info cards ── -->
            <div class="info-grid">
                <div class="info-card">
                    <span class="ic-icon">🔒</span>
                    <h5>Verified Deals</h5>
                    <p>All promotions are verified and sourced directly from the brand — no expired codes.</p>
                </div>
                <div class="info-card">
                    <span class="ic-icon">⚡</span>
                    <h5>Instant Activation</h5>
                    <p>Coupons activate immediately after copying. No sign-up or extra steps required.</p>
                </div>
                <div class="info-card">
                    <span class="ic-icon">🔔</span>
                    <h5>Stay Updated</h5>
                    <p>New deals are added regularly. Bookmark this page and never miss a promotion.</p>
                </div>
            </div>

        <?php endif; ?>
    </div><!-- /page-wrap -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function copyCode(btn, code) {
            navigator.clipboard.writeText(code).then(() => {
                const orig = btn.textContent;
                btn.textContent = '✓ Copied';
                btn.style.background = '#10B981';
                setTimeout(() => {
                    btn.textContent = orig;
                    btn.style.background = '';
                }, 2000);
            });
        }
    </script>
    <?php require_once __DIR__ . '/includes/footer.php'; ?>
</body>

</html>





