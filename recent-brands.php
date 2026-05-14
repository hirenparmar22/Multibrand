<?php


include 'config.php';
require_once __DIR__ . '/includes/header.php';

// Fetch latest 24 brands ordered by newest first
$sql    = "SELECT * FROM brands ORDER BY created_at DESC LIMIT 24";
$result = mysqli_query($conn, $sql);
$brands = [];

if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
        $brands[] = $row;
    }
}

mysqli_close($conn);

// ── Expanded pastel palette: [bg, fg/icon, ring/border] ───────────────────
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
    ['bg' => '#F1F8E9', 'fg' => '#558B2F', 'ring' => '#C5E1A5'],
    ['bg' => '#EDE7F6', 'fg' => '#6A1B9A', 'ring' => '#CE93D8'],
];

function brandPastel(string $name, array $palette): array
{
    return $palette[abs(crc32($name)) % count($palette)];
}

function initials(string $name): string
{
    $parts = preg_split('/\s+/', trim($name));
    if (count($parts) >= 2) {
        return mb_strtoupper(mb_substr($parts[0], 0, 1) . mb_substr($parts[1], 0, 1));
    }
    return mb_strtoupper(mb_substr($name, 0, 2));
}

function daysSince(string $dateStr): string
{
    if (empty($dateStr)) return '';
    $diff = (int) floor((time() - strtotime($dateStr)) / 86400);
    if ($diff === 0) return 'Today';
    if ($diff === 1) return 'Yesterday';
    if ($diff < 7)  return $diff . 'd ago';
    if ($diff < 30) return ceil($diff / 7) . 'w ago';
    return date('d M Y', strtotime($dateStr));
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recently Joined Brands</title>

    <!-- Bootstrap 5 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">

    <!-- Fonts: Fraunces (display) + Plus Jakarta Sans (body) -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Fraunces:opsz,wght@9..144,700;9..144,900&family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">

    <style>
        /* ── Tokens ──────────────────────────────── */
        :root {
            --page-bg: #FDF7F4;
            --card-bg: #FFFFFF;
            --txt-dark: #1A1523;
            --txt-mid: #6B5E7A;
            --txt-soft: #A89BB5;
            --r-card: 22px;
            --shadow-rest: 0 2px 12px rgba(60, 30, 80, .07);
            --shadow-up: 0 18px 42px rgba(60, 30, 80, .16);
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
            min-height: 100vh;
        }

        /* ── Pastel blobs (background atmosphere) ── */
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
            width: 560px;
            height: 560px;
            background: #FFD6E0;
            opacity: .3;
            top: -200px;
            left: -160px;
        }

        .b2 {
            width: 440px;
            height: 440px;
            background: #C7E5FF;
            opacity: .28;
            bottom: -150px;
            right: -130px;
        }

        .b3 {
            width: 320px;
            height: 320px;
            background: #D9F5D6;
            opacity: .22;
            top: 42%;
            left: 52%;
        }

        .b4 {
            width: 240px;
            height: 240px;
            background: #F5E2FF;
            opacity: .20;
            top: 20%;
            right: 10%;
        }

        /* ── Page wrapper ────────────────────────── */
        .page-wrap {
            position: relative;
            z-index: 1;
            max-width: 1380px;
            margin: 0 auto;
            padding: 3.5rem 1.5rem 6rem;
        }

        /* ── Hero banner ─────────────────────────── */
        .hero {
            background: linear-gradient(145deg, #2D1B69 0%, #6D28D9 52%, #EC4899 100%);
            border-radius: 28px;
            padding: 2.75rem 3rem;
            margin-bottom: 2rem;
            position: relative;
            overflow: hidden;
            color: #fff;
        }

        .hero::before {
            content: '' position:absolute;
            width: 380px;
            height: 380px;
            border-radius: 50%;
            background: rgba(255, 255, 255, .07);
            top: -110px;
            right: -80px;
        }

        .hero::after {
            content: '';
            position: absolute;
            width: 220px;
            height: 220px;
            border-radius: 50%;
            background: rgba(255, 255, 255, .05);
            bottom: -70px;
            left: 70px;
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
            background: rgba(255, 255, 255, .15);
            border: 1px solid rgba(255, 255, 255, .25);
            color: #fff;
            border-radius: 99px;
            padding: .3rem .9rem;
            margin-bottom: .9rem;
            backdrop-filter: blur(6px);
        }

        .live-dot {
            width: 7px;
            height: 7px;
            border-radius: 50%;
            background: #4ADE80;
            animation: livePulse 1.6s ease-in-out infinite;
        }

        @keyframes livePulse {

            0%,
            100% {
                box-shadow: 0 0 0 0 rgba(74, 222, 128, .55);
            }

            50% {
                box-shadow: 0 0 0 6px rgba(74, 222, 128, 0);
            }
        }

        .hero-title {
            font-family: 'Fraunces', serif;
            font-size: clamp(2rem, 5vw, 3.1rem);
            font-weight: 900;
            line-height: 1.1;
            margin-bottom: .65rem;
        }

        .hero-sub {
            font-size: .98rem;
            opacity: .78;
            max-width: 420px;
            font-weight: 400;
        }

        .hero-kpi {
            position: absolute;
            top: 1.75rem;
            right: 2rem;
            background: rgba(255, 255, 255, .16);
            border: 1px solid rgba(255, 255, 255, .28);
            border-radius: 16px;
            padding: .7rem 1.25rem;
            text-align: center;
            backdrop-filter: blur(8px);
            z-index: 1;
        }

        .hero-kpi .num {
            font-family: 'Fraunces', serif;
            font-size: 1.75rem;
            font-weight: 900;
            display: block;
            line-height: 1;
        }

        .hero-kpi .lbl {
            font-size: .62rem;
            letter-spacing: .07em;
            opacity: .7;
            text-transform: uppercase;
        }

        /* ── Stats strip ─────────────────────────── */
        .stats-strip {
            display: flex;
            gap: .75rem;
            flex-wrap: wrap;
            margin-bottom: 1.75rem;
        }

        .s-chip {
            background: #fff;
            border-radius: 12px;
            padding: .6rem 1.1rem;
            box-shadow: var(--shadow-rest);
            font-size: .78rem;
            font-weight: 600;
            color: var(--txt-dark);
            display: flex;
            align-items: center;
            gap: .45rem;
        }

        .s-chip .dot {
            width: 8px;
            height: 8px;
            border-radius: 50%;
            background: #A78BFA;
            animation: livePulse 2s infinite;
        }

        /* ── Filter chips ────────────────────────── */
        .filter-row {
            display: flex;
            gap: .55rem;
            flex-wrap: wrap;
            margin-bottom: 2rem;
        }

        .f-chip {
            font-size: .76rem;
            font-weight: 600;
            padding: .42rem 1rem;
            border-radius: 99px;
            border: 1.5px solid #E5DDF0;
            background: #fff;
            color: var(--txt-mid);
            cursor: pointer;
            transition: all .2s;
            white-space: nowrap;
        }

        .f-chip:hover,
        .f-chip.active {
            background: var(--txt-dark);
            color: #fff;
            border-color: var(--txt-dark);
        }

        /* ── Grid ─────────────────────────────────── */
        .brands-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(292px, 1fr));
            gap: 1.1rem;
        }

        /* ── Card ─────────────────────────────────── */
        .brand-card {
            background: var(--card-bg);
            border-radius: var(--r-card);
            box-shadow: var(--shadow-rest);
            border: 1.5px solid rgba(100, 60, 140, .055);
            overflow: hidden;
            display: flex;
            flex-direction: column;
            transition: transform .32s var(--spring), box-shadow .28s ease;
            will-change: transform;
            opacity: 0;
            animation: fadeUp .5s forwards;
        }

        .brand-card:hover {
            transform: translateY(-9px) scale(1.014);
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

        /* stagger */
        <?php for ($i = 0; $i < 24; $i++): ?>.brand-card:nth-child(<?= $i + 1 ?>) {
            animation-delay: <?= round($i * 0.045, 3) ?>s;
        }

        <?php endfor; ?>

        /* colour stripe at card top */
        .card-stripe {
            height: 5px;
            width: 100%;
            flex-shrink: 0;
        }

        /* card body */
        .card-body-inner {
            padding: 1.4rem 1.45rem 1.15rem;
            flex: 1;
        }

        .card-head-row {
            display: flex;
            align-items: flex-start;
            gap: .9rem;
            margin-bottom: 1.05rem;
        }

        /* pastel avatar */
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
            letter-spacing: .01em;
        }

        .brand-info {
            flex: 1;
            min-width: 0;
        }

        .brand-name {
            font-family: 'Fraunces', serif;
            font-weight: 700;
            font-size: 1.06rem;
            line-height: 1.2;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            margin-bottom: .28rem;
        }

        .brand-cat {
            font-size: .72rem;
            font-weight: 700;
            letter-spacing: .04em;
            padding: .18rem .65rem;
            border-radius: 7px;
            display: inline-block;
        }

        /* NEW badge */
        .badge-new {
            flex-shrink: 0;
            display: inline-flex;
            align-items: center;
            gap: .22rem;
            font-size: .6rem;
            font-weight: 800;
            letter-spacing: .1em;
            text-transform: uppercase;
            background: linear-gradient(135deg, #D1FAE5, #A7F3D0);
            color: #065F46;
            border-radius: 99px;
            padding: .22rem .65rem;
            margin-top: .1rem;
            border: 1px solid #6EE7B7;
        }

        .badge-new::before {
            content: '';
            width: 5px;
            height: 5px;
            border-radius: 50%;
            background: #10B981;
            display: inline-block;
            animation: livePulse 2s infinite;
        }

        /* meta chips */
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
            padding: .24rem .62rem;
            font-weight: 500;
            display: flex;
            align-items: center;
            gap: .28rem;
        }

        /* card footer */
        .card-foot {
            padding: .85rem 1.45rem;
            border-top: 1.5px solid #F5F0FB;
        }

        .btn-explore {
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
            letter-spacing: .02em;
            border: 2px solid transparent;
            text-decoration: none;
            transition: filter .2s, transform .2s var(--spring), gap .18s;
        }

        .btn-explore:hover {
            filter: brightness(1.1) saturate(1.12);
            transform: scale(1.03);
            gap: .7rem;
        }

        .btn-explore .arrow {
            transition: transform .18s var(--spring);
            display: inline-block;
        }

        .btn-explore:hover .arrow {
            transform: translateX(4px);
        }

        /* ── Empty state ─────────────────────────── */
        .empty-state {
            text-align: center;
            padding: 6rem 2rem;
            background: #fff;
            border-radius: 28px;
            box-shadow: var(--shadow-rest);
        }

        .empty-state .e-icon {
            font-size: 4.5rem;
            display: block;
            margin-bottom: 1.25rem;
        }

        .empty-state h3 {
            font-family: 'Fraunces', serif;
            font-size: 1.5rem;
            font-weight: 900;
            margin-bottom: .5rem;
        }

        .empty-state p {
            color: var(--txt-mid);
            font-size: .9rem;
            max-width: 300px;
            margin: 0 auto;
        }

        /* ── Responsive ──────────────────────────── */
        @media (max-width:640px) {
            .hero {
                padding: 2.25rem 1.6rem;
            }

            .hero-kpi {
                display: none;
            }

            .filter-row {
                display: none;
            }

            .brands-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>

<body>

    <!-- Background blobs -->
    <div class="blob-layer" aria-hidden="true">
        <div class="blob b1"></div>
        <div class="blob b2"></div>
        <div class="blob b3"></div>
        <div class="blob b4"></div>
    </div>

    <div class="page-wrap">

        <!-- ── Hero ──────────────────────────────────── -->
        <div class="hero">
            <div class="hero-inner">
                <div class="hero-eyebrow"><span class="live-dot"></span> Live Updates</div>
                <h1 class="hero-title"> Recently Joined Brands</h1>
                <p class="hero-sub">Explore newly added brands on our platform — fresh partnerships, new deals.</p>
            </div>
            <div class="hero-kpi">
                <span class="num"><?= count($brands) ?></span>
                <span class="lbl">New Brands</span>
            </div>
        </div>

        <!-- ── Stats strip ───────────────────────────── -->
        <div class="stats-strip">
            <div class="s-chip"><span class="dot"></span><?= count($brands) ?> brand<?= count($brands) !== 1 ? 's' : '' ?> added recently</div>
            <div class="s-chip">📅 Updated <?= date('d M Y') ?></div>
        </div>

        <!-- ── Filter chips ──────────────────────────── -->
        <div class="filter-row">
            <span class="f-chip active">✨ All Brands</span>
            <span class="f-chip">🛍️ Retail</span>
            <span class="f-chip">🍔 Food &amp; Beverage</span>
            <span class="f-chip">💄 Beauty</span>
            <span class="f-chip">👗 Fashion</span>
            <span class="f-chip">📱 Tech</span>
            <span class="f-chip">🏋️ Health</span>
            <span class="f-chip">🎮 Gaming</span>
            <span class="f-chip">🌿 Lifestyle</span>
        </div>

        <!-- ── Brand Grid ─────────────────────────────── -->
        <?php if (!empty($brands)): ?>
            <div class="brands-grid">
                <?php foreach ($brands as $brand):
                    $name     = htmlspecialchars($brand['brand_name'] ?? 'Brand');
                    $category = htmlspecialchars($brand['category']   ?? 'General');
                    $date     = !empty($brand['created_at'])
                        ? date('d M Y', strtotime($brand['created_at']))
                        : 'N/A';
                    $since    = !empty($brand['created_at']) ? daysSince($brand['created_at']) : $date;
                    $p        = brandPastel($name, $pastelPalette);
                    $inits    = initials($name);
                ?>
                    <div class="brand-card">

                        <!-- colour stripe -->
                        <div class="card-stripe"
                            style="background:linear-gradient(90deg,<?= $p['fg'] ?>,<?= $p['ring'] ?>);"></div>

                        <div class="card-body-inner">
                            <div class="card-head-row">

                                <!-- Pastel avatar -->
                                <div class="brand-avatar"
                                    style="background:<?= $p['bg'] ?>;
                                color:<?= $p['fg'] ?>;
                                border-color:<?= $p['ring'] ?>;">
                                    <?= $inits ?>
                                </div>

                                <div class="brand-info">
                                    <div class="brand-name"><?= $name ?></div>
                                    <span class="brand-cat"
                                        style="background:<?= $p['bg'] ?>;color:<?= $p['fg'] ?>;">
                                        <?= $category ?>
                                    </span>
                                </div>

                                <span class="badge-new">New</span>
                            </div>

                            <!-- Meta chips -->
                            <div class="meta-row">
                                <span class="meta-chip">🕐 <?= $since ?></span>
                                <span class="meta-chip">📅 <?= $date ?></span>
                            </div>
                        </div>

                        <div class="card-foot">
                            <a href="#" class="btn-explore"
                                style="background:<?= $p['bg'] ?>;
                          color:<?= $p['fg'] ?>;
                          border-color:<?= $p['ring'] ?>;">
                                Explore Brand <span class="arrow">→</span>
                            </a>
                        </div>

                    </div>
                <?php endforeach; ?>
            </div>

        <?php else: ?>
            <!-- ── Empty state ──────────────────────────── -->
            <div class="empty-state">
                <span class="e-icon">🏪</span>
                <h3>No Brands Yet</h3>
                <p>There are no recently joined brands at the moment. Check back soon — new brands are added regularly!</p>
            </div>
        <?php endif; ?>

    </div><!-- /page-wrap -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Filter chip toggle (wire up filtering logic as needed)
        document.querySelectorAll('.f-chip').forEach(chip => {
            chip.addEventListener('click', () => {
                document.querySelectorAll('.f-chip').forEach(c => c.classList.remove('active'));
                chip.classList.add('active');
            });
        });
    </script>

    <?php require_once __DIR__ . '/includes/footer.php'; ?>

</body>

</html>