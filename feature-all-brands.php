<?php


include 'config.php';
require_once __DIR__ . '/includes/header.php';

// Search & filter inputs
$search   = isset($_GET['q'])        ? trim(mysqli_real_escape_string($conn, $_GET['q']))        : '';
$category = isset($_GET['category']) ? trim(mysqli_real_escape_string($conn, $_GET['category'])) : '';
$sort     = isset($_GET['sort'])     ? trim($_GET['sort']) : 'newest';

// Build query
$where = [];
if ($search)   $where[] = "(brand_name LIKE '%$search%' OR brand_description LIKE '%$search%')";
if ($category) $where[] = "category = '$category'";
$whereSQL = $where ? 'WHERE ' . implode(' AND ', $where) : '';

$orderSQL = match ($sort) {
    'name'   => 'ORDER BY brand_name ASC',
    'oldest' => 'ORDER BY created_at ASC',
    default  => 'ORDER BY created_at DESC',
};

$brands = [];
$res = mysqli_query($conn, "SELECT * FROM brands $whereSQL $orderSQL");
if ($res) {
    while ($row = mysqli_fetch_assoc($res)) $brands[] = $row;
}

// All distinct categories for filter chips
$cats = [];
$catRes = mysqli_query($conn, "SELECT DISTINCT category FROM brands WHERE category IS NOT NULL AND category != '' ORDER BY category ASC");
if ($catRes) {
    while ($c = mysqli_fetch_assoc($catRes)) $cats[] = $c['category'];
}

// Total count
$totalRes = mysqli_query($conn, "SELECT COUNT(*) as c FROM brands");
$totalBrands = $totalRes ? (int)mysqli_fetch_assoc($totalRes)['c'] : 0;

mysqli_close($conn);

// ── Pastel helpers ────────────────────────────
$pastelPalette = [
    ['bg' => '#FFE4E8', 'fg' => '#E8546A', 'ring' => '#FBBDC7'],
    ['bg' => '#FFF0D6', 'fg' => '#D97706', 'ring' => '#FDDFA0'],
    ['bg' => '#E8F5E9', 'fg' => '#2E9E5B', 'ring' => '#A8DDB8'],
    ['bg' => '#E3F0FF', 'fg' => '#3478F6', 'ring' => '#A8CAFF'],
    ['bg' => '#F3E8FF', 'fg' => '#8B5CF6', 'ring' => '#D0ADFF'],
    ['bg' => '#FFF4F0', 'fg' => '#E05C2A', 'ring' => '#FFCAB5'],
    ['bg' => '#E0F9F7', 'fg' => '#0D9488', 'ring' => '#99DDD9'],
    ['bg' => '#FDE8F5', 'fg' => '#C026A0', 'ring' => '#F5ADDF'],
    ['bg' => '#FFFBE6', 'fg' => '#B45309', 'ring' => '#FDEEA0'],
    ['bg' => '#E8EAF6', 'fg' => '#3F51B5', 'ring' => '#B3BAE8'],
    ['bg' => '#FCE4EC', 'fg' => '#C2185B', 'ring' => '#F8AABF'],
    ['bg' => '#E8F5E0', 'fg' => '#558B2F', 'ring' => '#BDDBA8'],
    ['bg' => '#FFF8E1', 'fg' => '#F57F17', 'ring' => '#FFE082'],
    ['bg' => '#E1F5FE', 'fg' => '#0277BD', 'ring' => '#81D4FA'],
    ['bg' => '#EDE7F6', 'fg' => '#6A1B9A', 'ring' => '#CE93D8'],
    ['bg' => '#F1F8E9', 'fg' => '#558B2F', 'ring' => '#C5E1A5'],
];
function brandPastel(string $name, array $pal): array
{
    return $pal[abs(crc32($name)) % count($pal)];
}
function initials(string $name): string
{
    $p = preg_split('/\s+/', trim($name));
    return count($p) >= 2
        ? mb_strtoupper(mb_substr($p[0], 0, 1) . mb_substr($p[1], 0, 1))
        : mb_strtoupper(mb_substr($name, 0, 2));
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title>All Brands — Browse Every Partner</title>
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
            padding: 0;
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
            width: 500px;
            height: 500px;
            background: #FFD6E0;
            opacity: .28;
            top: -180px;
            left: -150px;
        }

        .b2 {
            width: 420px;
            height: 420px;
            background: #D4EAFF;
            opacity: .25;
            bottom: -140px;
            right: -120px;
        }

        .b3 {
            width: 300px;
            height: 300px;
            background: #D9F5D6;
            opacity: .2;
            top: 40%;
            left: 50%;
        }

        .page-wrap {
            position: relative;
            z-index: 1;
            max-width: 1380px;
            margin: 0 auto;
            padding: 3rem 1.5rem 5rem;
        }

        /* ── Hero ── */
        .hero {
            background: linear-gradient(145deg, #1A0A3B 0%, #5B21B6 55%, #DB2777 100%);
            border-radius: 28px;
            padding: 3.5rem 3rem;
            margin-bottom: 2rem;
            position: relative;
            overflow: hidden;
            color: #fff;
            margin: 60px auto;
        }

        .hero::before {
            content: '';
            position: absolute;
            width: 360px;
            height: 360px;
            border-radius: 50%;
            background: rgba(255, 255, 255, .07);
            top: -100px;
            right: -70px;
        }

        .hero::after {
            content: '';
            position: absolute;
            width: 200px;
            height: 200px;
            border-radius: 50%;
            background: rgba(255, 255, 255, .05);
            bottom: -60px;
            left: 60px;
        }

        .hero-inner {
            position: relative;
            z-index: 1;
        }

        .hero-eyebrow {
            display: inline-flex;
            align-items: center;
            gap: .4rem;
            font-size: .7rem;
            font-weight: 700;
            letter-spacing: .12em;
            text-transform: uppercase;
            background: rgba(255, 255, 255, .14);
            border: 1px solid rgba(255, 255, 255, .24);
            color: #fff;
            border-radius: 99px;
            padding: .3rem .9rem;
            margin-bottom: .9rem;
        }

        .hero-title {
            font-family: 'Fraunces', serif;
            font-weight: 900;
            font-size: clamp(1.9rem, 5vw, 3rem);
            line-height: 1.1;
            margin-bottom: .6rem;
        }

        .hero-sub {
            font-size: .95rem;
            opacity: .76;
            max-width: 400px;
        }

        .hero-kpis {
            position: absolute;
            top: 1.75rem;
            right: 2rem;
            z-index: 1;
            display: flex;
            gap: .75rem;
            flex-wrap: wrap;
        }

        .kpi-pill {
            background: rgba(255, 255, 255, .16);
            border: 1px solid rgba(255, 255, 255, .27);
            border-radius: 14px;
            padding: .6rem 1.1rem;
            text-align: center;
            backdrop-filter: blur(8px);
        }

        .kpi-pill .num {
            font-family: 'Fraunces', serif;
            font-size: 1.5rem;
            font-weight: 900;
            display: block;
            line-height: 1;
        }

        .kpi-pill .lbl {
            font-size: .6rem;
            letter-spacing: .07em;
            opacity: .7;
            text-transform: uppercase;
        }

        /* ── Search bar ── */
        .search-wrap {
            background: #fff;
            border-radius: 16px;
            box-shadow: var(--shadow-rest);
            padding: 1.25rem 1.5rem;
            margin-bottom: 1.4rem;
            display: flex;
            gap: .75rem;
            flex-wrap: wrap;
            align-items: center;
        }

        .search-field {
            flex: 1;
            min-width: 200px;
            display: flex;
            align-items: center;
            gap: .6rem;
            background: #F7F3FC;
            border-radius: 12px;
            padding: .55rem 1rem;
        }

        .search-field input {
            border: none;
            background: transparent;
            outline: none;
            font-family: 'Plus Jakarta Sans', sans-serif;
            font-size: .88rem;
            font-weight: 500;
            color: var(--txt-dark);
            width: 100%;
        }

        .search-field input::placeholder {
            color: var(--txt-mid);
        }

        .search-icon {
            font-size: 1rem;
            flex-shrink: 0;
            color: var(--txt-mid);
        }

        .sort-select {
            border: 1.5px solid #E5DDF0;
            border-radius: 12px;
            padding: .5rem .85rem;
            font-size: .8rem;
            font-weight: 600;
            font-family: 'Plus Jakarta Sans', sans-serif;
            color: var(--txt-dark);
            background: #fff;
            cursor: pointer;
            outline: none;
        }

        .btn-search {
            background: linear-gradient(135deg, #5B21B6, #DB2777);
            color: #fff;
            border: none;
            border-radius: 12px;
            padding: .58rem 1.4rem;
            font-size: .82rem;
            font-weight: 700;
            font-family: 'Plus Jakarta Sans', sans-serif;
            cursor: pointer;
            transition: opacity .2s, transform .2s;
            white-space: nowrap;
        }

        .btn-search:hover {
            opacity: .9;
            transform: scale(1.03);
        }

        /* ── Category chips ── */
        .cat-row {
            display: flex;
            gap: .55rem;
            flex-wrap: wrap;
            margin-bottom: 1.75rem;
        }

        .c-chip {
            font-size: .75rem;
            font-weight: 600;
            padding: .4rem .95rem;
            border-radius: 99px;
            border: 1.5px solid #E5DDF0;
            background: #fff;
            color: var(--txt-mid);
            cursor: pointer;
            text-decoration: none;
            transition: all .2s;
            white-space: nowrap;
        }

        .c-chip:hover,
        .c-chip.active {
            background: var(--txt-dark);
            color: #fff;
            border-color: var(--txt-dark);
        }

        /* ── Results bar ── */
        .results-bar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1.25rem;
            flex-wrap: wrap;
            gap: .5rem;
        }

        .results-bar .count {
            font-family: 'Fraunces', serif;
            font-weight: 700;
            font-size: 1rem;
        }

        .results-bar .count span {
            color: #8B5CF6;
        }

        /* ── Grid ── */
        .brands-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(295px, 1fr));
            gap: 1.1rem;
        }

        /* ── Brand card ── */
        .brand-card {
            background: var(--card-bg);
            border-radius: var(--r-card);
            box-shadow: var(--shadow-rest);
            border: 1.5px solid rgba(100, 60, 140, .055);
            overflow: hidden;
            display: flex;
            flex-direction: column;
            transition: transform .32s var(--spring), box-shadow .28s;
            will-change: transform;
            opacity: 0;
            animation: fadeUp .48s forwards;
        }

        .brand-card:hover {
            transform: translateY(-8px) scale(1.013);
            box-shadow: var(--shadow-up);
        }

        @keyframes fadeUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        <?php for ($i = 0; $i < count($brands); $i++): ?>.brand-card:nth-child(<?= $i + 1 ?>) {
            animation-delay: <?= round($i * .04, 2) ?>s;
        }

        <?php endfor; ?>.card-stripe {
            height: 5px;
            width: 100%;
            flex-shrink: 0;
        }

        .card-body-inner {
            padding: 1.4rem 1.45rem 1.1rem;
            flex: 1;
        }

        .card-head-row {
            display: flex;
            align-items: flex-start;
            gap: .9rem;
            margin-bottom: 1rem;
        }

        .brand-avatar {
            width: 54px;
            height: 54px;
            border-radius: 16px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Fraunces', serif;
            font-weight: 900;
            font-size: 1rem;
            flex-shrink: 0;
            border: 2px solid transparent;
        }

        .brand-info {
            flex: 1;
            min-width: 0;
        }

        .brand-name {
            font-family: 'Fraunces', serif;
            font-weight: 700;
            font-size: 1.05rem;
            line-height: 1.2;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            margin-bottom: .25rem;
        }

        .brand-desc {
            font-size: .76rem;
            color: var(--txt-mid);
            line-height: 1.45;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
            margin-bottom: .6rem;
        }

        .brand-cat {
            font-size: .7rem;
            font-weight: 700;
            padding: .18rem .62rem;
            border-radius: 7px;
            display: inline-block;
        }

        .badge-new {
            flex-shrink: 0;
            display: inline-flex;
            align-items: center;
            gap: .2rem;
            font-size: .58rem;
            font-weight: 800;
            letter-spacing: .1em;
            text-transform: uppercase;
            background: linear-gradient(135deg, #D1FAE5, #A7F3D0);
            color: #065F46;
            border-radius: 99px;
            padding: .2rem .6rem;
            margin-top: .1rem;
            border: 1px solid #6EE7B7;
        }

        .meta-row {
            display: flex;
            gap: .45rem;
            flex-wrap: wrap;
        }

        .meta-chip {
            font-size: .7rem;
            color: var(--txt-mid);
            background: #F7F3FC;
            border-radius: 8px;
            padding: .23rem .6rem;
            font-weight: 500;
            display: flex;
            align-items: center;
            gap: .25rem;
        }

        .card-foot {
            padding: .85rem 1.45rem;
            border-top: 1.5px solid #F5F0FB;
        }

        .btn-promo {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: .4rem;
            width: 100%;
            border-radius: 13px;
            padding: .62rem 1rem;
            font-size: .8rem;
            font-weight: 700;
            font-family: 'Plus Jakarta Sans', sans-serif;
            border: 2px solid transparent;
            text-decoration: none;
            transition: filter .2s, transform .2s var(--spring), gap .18s;
        }

        .btn-promo:hover {
            filter: brightness(1.1) saturate(1.12);
            transform: scale(1.03);
            gap: .7rem;
        }

        .btn-promo .arr {
            transition: transform .18s var(--spring);
            display: inline-block;
        }

        .btn-promo:hover .arr {
            transform: translateX(4px);
        }

        /* ── Empty ── */
        .empty-state {
            text-align: center;
            padding: 6rem 2rem;
            background: #fff;
            border-radius: 24px;
            box-shadow: var(--shadow-rest);
        }

        .empty-state .ei {
            font-size: 4rem;
            display: block;
            margin-bottom: 1rem;
        }

        .empty-state h3 {
            font-family: 'Fraunces', serif;
            font-weight: 900;
            font-size: 1.4rem;
            margin-bottom: .5rem;
        }

        .empty-state p {
            color: var(--txt-mid);
            font-size: .88rem;
            max-width: 300px;
            margin: 0 auto 1.5rem;
        }

        .btn-clear {
            display: inline-block;
            border-radius: 12px;
            padding: .6rem 1.4rem;
            font-size: .82rem;
            font-weight: 700;
            font-family: 'Plus Jakarta Sans', sans-serif;
            background: linear-gradient(135deg, #5B21B6, #DB2777);
            color: #fff;
            text-decoration: none;
            transition: opacity .2s;
        }

        .btn-clear:hover {
            opacity: .88;
            color: #fff;
        }

        @media(max-width:640px) {
            .hero {
                padding: 2.25rem 1.6rem;
            }

            .hero-kpis {
                display: none;
            }

            .brands-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>

<body>

    <div class="blob-layer" aria-hidden="true">
        <div class="blob b1"></div>
        <div class="blob b2"></div>
        <div class="blob b3"></div>
    </div>

    <div class="page-wrap">

        <!-- ── Hero ── -->
        <div class="hero">
            <div class="hero-inner">
                <div class="hero-eyebrow">⭐ Partner Network</div>
                <h1 class="hero-title">All Brands</h1>
                <p class="hero-sub">Browse every brand on our platform — discover deals, explore products, and save more.</p>
            </div>
            <div class="hero-kpis">
                <div class="kpi-pill">
                    <span class="num"><?= $totalBrands ?></span>
                    <span class="lbl">Total Brands</span>
                </div>
                <div class="kpi-pill">
                    <span class="num"><?= count($cats) ?></span>
                    <span class="lbl">Categories</span>
                </div>
            </div>
        </div>

        <!-- ── Search ── -->
        <form method="GET" action="">
            <div class="search-wrap">
                <div class="search-field">
                    <span class="search-icon">🔍</span>
                    <input type="text" name="q" placeholder="Search brands by name or description…"
                        value="<?= htmlspecialchars($search) ?>">
                </div>
                <select name="sort" class="sort-select" onchange="this.form.submit()">
                    <option value="newest" <?= $sort === 'newest' ? 'selected' : '' ?>>Newest First</option>
                    <option value="oldest" <?= $sort === 'oldest' ? 'selected' : '' ?>>Oldest First</option>
                    <option value="name" <?= $sort === 'name'  ? 'selected' : '' ?>>A → Z</option>
                </select>
                <button type="submit" class="btn-search">Search →</button>
            </div>
        </form>

        <!-- ── Category filter chips ── -->
        <?php if (!empty($cats)): ?>
            <div class="cat-row">
                <a href="?sort=<?= htmlspecialchars($sort) ?>"
                    class="c-chip <?= !$category ? 'active' : '' ?>">✨ All</a>
                <?php foreach ($cats as $cat): ?>
                    <a href="?category=<?= urlencode($cat) ?>&sort=<?= htmlspecialchars($sort) ?>"
                        class="c-chip <?= $category === $cat ? 'active' : '' ?>">
                        <?= htmlspecialchars($cat) ?>
                    </a>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>

        <!-- ── Results bar ── -->
        <div class="results-bar">
            <div class="count">
                Showing <span><?= count($brands) ?></span> brand<?= count($brands) !== 1 ? 's' : '' ?>
                <?= $search ? ' for <em>"' . htmlspecialchars($search) . '"</em>' : '' ?>
                <?= $category ? ' in <em>' . htmlspecialchars($category) . '</em>' : '' ?>
            </div>
            <?php if ($search || $category): ?>
                <a href="all-brands.php" style="font-size:.78rem;font-weight:600;color:#8B5CF6;text-decoration:none;">
                    ✕ Clear filters
                </a>
            <?php endif; ?>
        </div>

        <!-- ── Grid ── -->
        <?php if (!empty($brands)): ?>
            <div class="brands-grid">
                <?php foreach ($brands as $brand):
                    $name  = htmlspecialchars($brand['brand_name']        ?? 'Brand');
                    $desc  = htmlspecialchars($brand['brand_description']  ?? '');
                    $cat   = htmlspecialchars($brand['category']           ?? 'General');
                    $date  = !empty($brand['created_at']) ? date('d M Y', strtotime($brand['created_at'])) : 'N/A';
                    $id    = (int)($brand['id'] ?? 0);
                    $p     = brandPastel($name, $pastelPalette);
                    $inits = initials($name);
                    $isNew = !empty($brand['created_at']) && (time() - strtotime($brand['created_at'])) < 86400 * 14;
                ?>
                    <div class="brand-card">
                        <div class="card-stripe"
                            style="background:linear-gradient(90deg,<?= $p['fg'] ?>,<?= $p['ring'] ?>);"></div>
                        <div class="card-body-inner">
                            <div class="card-head-row">
                                <div class="brand-avatar"
                                    style="background:<?= $p['bg'] ?>;color:<?= $p['fg'] ?>;border-color:<?= $p['ring'] ?>;">
                                    <?= $inits ?>
                                </div>
                                <div class="brand-info">
                                    <div class="brand-name"><?= $name ?></div>
                                    <?php if ($desc): ?>
                                        <div class="brand-desc"><?= $desc ?></div>
                                    <?php endif; ?>
                                    <span class="brand-cat"
                                        style="background:<?= $p['bg'] ?>;color:<?= $p['fg'] ?>;">
                                        <?= $cat ?>
                                    </span>
                                </div>
                                <?php if ($isNew): ?>
                                    <span class="badge-new">New</span>
                                <?php endif; ?>
                            </div>
                            <div class="meta-row">
                                <?php if (!empty($brand['rating'])): ?>
                                    <span class="meta-chip">⭐ <?= htmlspecialchars($brand['rating']) ?></span>
                                <?php endif; ?>
                                <?php if (!empty($brand['products'])): ?>
                                    <span class="meta-chip">📦 <?= htmlspecialchars($brand['products']) ?> items</span>
                                <?php endif; ?>
                                <span class="meta-chip">📅 <?= $date ?></span>
                            </div>
                        </div>
                        <div class="card-foot">
                            <a href="brand-promotions.php?brand_id=<?= $id ?>" class="btn-promo"
                                style="background:<?= $p['bg'] ?>;color:<?= $p['fg'] ?>;border-color:<?= $p['ring'] ?>;">
                                View Promotions <span class="arr">→</span>
                            </a>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>

        <?php else: ?>
            <div class="empty-state">
                <span class="ei">🔍</span>
                <h3>No Brands Found</h3>
                <p>We couldn't find any brands matching your search. Try a different keyword or clear the filters.</p>
                <a href="all-brands.php" class="btn-clear">Clear Filters →</a>
            </div>
        <?php endif; ?>

    </div><!-- /page-wrap -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

 <?php require_once __DIR__ . '/includes/footer.php'; ?>

</body>

</html>


