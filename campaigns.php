<?php
session_start();


require_once __DIR__ . '/includes/header.php';

$user_id = (int)($_SESSION['user_id'] ?? 0);
$campaigns = [
    ['id' => 1, 'title' => 'Nike Run For Glory', 'brand' => 'Nike', 'brand_bg' => 'linear-gradient(135deg,#1a1a2e,#16213e)', 'brand_icon' => 'fa-brands fa-nike', 'status' => 'active', 'type' => 'Influencer', 'budget' => '₹5,00,000', 'reach' => '2.4M', 'clicks' => '48K', 'start' => '2026-04-01', 'end' => '2026-05-31', 'progress' => 72, 'color' => '#e91e8c', 'img_grad' => 'linear-gradient(135deg,#1a1a2e 0%,#e91e8c 100%)', 'desc' => 'Run. Achieve. Inspire. Join the largest athletic movement of 2026 with Nike.'],
    ['id' => 2, 'title' => 'Adidas Street Culture', 'brand' => 'Adidas', 'brand_bg' => 'linear-gradient(135deg,#2d2d44,#3d3d5c)', 'brand_icon' => '', 'status' => 'active', 'type' => 'Social Media', 'budget' => '₹3,20,000', 'reach' => '1.8M', 'clicks' => '32K', 'start' => '2026-04-15', 'end' => '2026-06-15', 'progress' => 48, 'color' => '#9c27b0', 'img_grad' => 'linear-gradient(135deg,#2d2d44 0%,#9c27b0 100%)', 'desc' => 'Express yourself through street culture and authentic Adidas Originals style.'],
    ['id' => 3, 'title' => 'Zara Fashion Week', 'brand' => 'Zara', 'brand_bg' => 'linear-gradient(135deg,#2e7d32,#388e3c)', 'brand_icon' => '', 'status' => 'active', 'type' => 'Email + Social', 'budget' => '₹4,50,000', 'reach' => '3.1M', 'clicks' => '61K', 'start' => '2026-03-20', 'end' => '2026-05-20', 'progress' => 88, 'color' => '#2e7d32', 'img_grad' => 'linear-gradient(135deg,#2e7d32 0%,#66bb6a 100%)', 'desc' => 'The most anticipated fashion campaign of the year — style redefined by Zara.'],
    ['id' => 4, 'title' => 'Samsung Galaxy 2026', 'brand' => 'Samsung', 'brand_bg' => 'linear-gradient(135deg,#1565c0,#1976d2)', 'brand_icon' => '', 'status' => 'upcoming', 'type' => 'Video + Display', 'budget' => '₹8,00,000', 'reach' => '5.2M', 'clicks' => '0', 'start' => '2026-06-01', 'end' => '2026-07-15', 'progress' => 0, 'color' => '#1565c0', 'img_grad' => 'linear-gradient(135deg,#1565c0 0%,#42a5f5 100%)', 'desc' => 'Prepare for the next chapter of Samsung innovation. The future is Galaxy.'],
    ['id' => 5, 'title' => 'Puma Fit Challenge', 'brand' => 'Puma', 'brand_bg' => 'linear-gradient(135deg,#c62828,#e53935)', 'brand_icon' => 'fa-solid fa-paw', 'status' => 'completed', 'type' => 'UGC Campaign', 'budget' => '₹2,00,000', 'reach' => '900K', 'clicks' => '18K', 'start' => '2026-02-01', 'end' => '2026-03-31', 'progress' => 100, 'color' => '#c62828', 'img_grad' => 'linear-gradient(135deg,#c62828 0%,#ff8a65 100%)', 'desc' => 'User-generated fitness challenge that broke records with 18K+ participants.'],
    ['id' => 6, 'title' => 'H&M Spring Collection', 'brand' => 'H&M', 'brand_bg' => 'linear-gradient(135deg,#b71c1c,#d32f2f)', 'brand_icon' => '', 'status' => 'active', 'type' => 'Influencer', 'budget' => '₹3,80,000', 'reach' => '2.7M', 'clicks' => '44K', 'start' => '2026-04-01', 'end' => '2026-06-01', 'progress' => 60, 'color' => '#d32f2f', 'img_grad' => 'linear-gradient(135deg,#b71c1c 0%,#ff6f00 100%)', 'desc' => 'Spring is in the air and H&M is bringing you the freshest looks of the season.'],
];

$status_counts = array_count_values(array_column($campaigns, 'status'));
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Campaigns – MultiBrand Promotion</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@300;400;500;600;700&family=Playfair+Display:wght@700;800;900&display=swap" rel="stylesheet" />
    <style>
        :root {
            --rose: #e91e8c;
            --violet: #9c27b0;
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
            text-align: center
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

        /* SUMMARY CARDS */
        .sum-card {
            background: var(--glass);
            backdrop-filter: blur(18px);
            border: 1px solid rgba(255, 255, 255, .65);
            border-radius: 18px;
            padding: 1.5rem 1.2rem;
            text-align: center;
            box-shadow: 0 6px 24px rgba(150, 80, 180, .09)
        }

        .sum-val {
            font-family: 'Playfair Display', serif;
            font-size: 2rem;
            font-weight: 900;
            background: linear-gradient(135deg, #e91e8c, #9c27b0);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text
        }

        .sum-lbl {
            font-size: .82rem;
            color: var(--muted);
            font-weight: 600;
            margin-top: .2rem
        }

        /* CAMPAIGN CARD */
        .campaign-card {
            background: var(--card-bg);
            backdrop-filter: blur(16px);
            border: 1px solid rgba(255, 255, 255, .68);
            border-radius: 22px;
            overflow: hidden;
            box-shadow: 0 6px 24px rgba(150, 80, 180, .09);
            transition: all .3s ease;
            height: 100%
        }

        .campaign-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 22px 50px rgba(150, 80, 180, .18)
        }

        .camp-header {
            height: 130px;
            position: relative;
            display: flex;
            align-items: flex-end;
            padding: 1.2rem
        }

        .camp-header-overlay {
            position: absolute;
            inset: 0;
            background: rgba(0, 0, 0, .25)
        }

        .camp-brand-badge {
            display: inline-flex;
            align-items: center;
            gap: .4rem;
            background: rgba(255, 255, 255, .25);
            backdrop-filter: blur(8px);
            border: 1px solid rgba(255, 255, 255, .3);
            border-radius: 99px;
            padding: .3rem .85rem;
            font-size: .75rem;
            font-weight: 700;
            color: #fff;
            position: relative;
            z-index: 1
        }

        .camp-status {
            position: absolute;
            top: 1rem;
            right: 1rem;
            z-index: 1;
            padding: .25rem .75rem;
            border-radius: 99px;
            font-size: .7rem;
            font-weight: 700;
            letter-spacing: .05em;
            text-transform: uppercase;
            backdrop-filter: blur(8px)
        }

        .status-active {
            background: rgba(46, 125, 50, .3);
            color: #a5d6a7;
            border: 1px solid rgba(102, 187, 106, .4)
        }

        .status-upcoming {
            background: rgba(21, 101, 192, .3);
            color: #90caf9;
            border: 1px solid rgba(66, 165, 245, .4)
        }

        .status-completed {
            background: rgba(97, 97, 97, .3);
            color: #e0e0e0;
            border: 1px solid rgba(189, 189, 189, .3)
        }

        .camp-body {
            padding: 1.4rem
        }

        .camp-title {
            font-family: 'Playfair Display', serif;
            font-weight: 800;
            font-size: 1.1rem;
            margin-bottom: .35rem
        }

        .camp-desc {
            font-size: .82rem;
            color: var(--muted);
            line-height: 1.6;
            margin-bottom: 1rem
        }

        .camp-type {
            display: inline-block;
            background: linear-gradient(135deg, rgba(233, 30, 140, .1), rgba(156, 39, 176, .08));
            border-radius: 99px;
            padding: .22rem .7rem;
            font-size: .7rem;
            font-weight: 700;
            color: var(--violet);
            border: 1px solid rgba(156, 39, 176, .15);
            margin-bottom: 1rem
        }

        .camp-metrics {
            display: grid;
            grid-template-columns: 1fr 1fr 1fr;
            gap: .5rem;
            margin-bottom: 1rem
        }

        .metric {
            background: rgba(233, 30, 140, .04);
            border-radius: 10px;
            padding: .6rem .5rem;
            text-align: center;
            border: 1px solid rgba(233, 30, 140, .08)
        }

        .metric-val {
            font-weight: 700;
            font-size: .9rem;
            color: var(--rose)
        }

        .metric-lbl {
            font-size: .65rem;
            color: var(--muted)
        }

        .progress-wrap {
            margin-bottom: 1rem
        }

        .progress-label {
            display: flex;
            justify-content: space-between;
            font-size: .75rem;
            color: var(--muted);
            margin-bottom: .35rem
        }

        .progress {
            height: 6px;
            border-radius: 99px;
            background: rgba(233, 30, 140, .12)
        }

        .progress-bar {
            border-radius: 99px;
            transition: width 1.5s ease
        }

        .btn-camp {
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

        .btn-camp:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 22px rgba(233, 30, 140, .45)
        }

        .btn-camp-outline {
            width: 100%;
            padding: .5rem;
            border-radius: 10px;
            background: transparent;
            color: var(--muted);
            border: 1.5px solid rgba(233, 30, 140, .2);
            font-weight: 600;
            font-size: .85rem;
            cursor: pointer;
            transition: all .25s;
            margin-top: .5rem
        }

        .btn-camp-outline:hover {
            color: var(--rose);
            border-color: var(--rose);
            background: rgba(233, 30, 140, .05)
        }
    </style>
</head>

<body>
    <div class="blob blob-1"></div>
    <div class="blob blob-2"></div>
    <div style="height:80px"></div>

    <section class="page-hero">
        <div class="container fade-up">
            <span class="section-tag"><i class="fa-solid fa-rocket me-1"></i> Brand Campaigns</span>
            <h1 class="section-title">Active <span class="gradient-text">Campaigns</span></h1>
            <p style="color:var(--muted);max-width:500px;margin:.5rem auto 2rem;font-size:1rem">Join the most powerful brand campaigns on the platform and drive real results for your promotions.</p>

            <!-- Summary -->
            <div class="row g-3 mb-4 justify-content-center" style="max-width:700px;margin:0 auto 2rem">
                <div class="col-6 col-md-3">
                    <div class="sum-card">
                        <div class="sum-val"><?= count($campaigns) ?></div>
                        <div class="sum-lbl">Total Campaigns</div>
                    </div>
                </div>
                <div class="col-6 col-md-3">
                    <div class="sum-card">
                        <div class="sum-val"><?= $status_counts['active'] ?? 0 ?></div>
                        <div class="sum-lbl">Active Now</div>
                    </div>
                </div>
                <div class="col-6 col-md-3">
                    <div class="sum-card">
                        <div class="sum-val"><?= $status_counts['upcoming'] ?? 0 ?></div>
                        <div class="sum-lbl">Upcoming</div>
                    </div>
                </div>
                <div class="col-6 col-md-3">
                    <div class="sum-card">
                        <div class="sum-val"><?= $status_counts['completed'] ?? 0 ?></div>
                        <div class="sum-lbl">Completed</div>
                    </div>
                </div>
            </div>

            <div class="filter-bar">
                <button class="filter-btn active" data-status="all">All</button>
                <button class="filter-btn" data-status="active">🟢 Active</button>
                <button class="filter-btn" data-status="upcoming">🔵 Upcoming</button>
                <button class="filter-btn" data-status="completed">⚫ Completed</button>
            </div>
        </div>
    </section>

    <section style="padding:0 0 80px">
        <div class="container">
            <div class="row g-4" id="campGrid">
                <?php foreach ($campaigns as $i => $c): ?>
                    <div class="col-md-6 col-lg-4 fade-up camp-item" data-status="<?= $c['status'] ?>" style="transition-delay:<?= ($i % 3) * 0.1 ?>s">
                        <div class="campaign-card">
                            <div class="camp-header" style="background:<?= $c['img_grad'] ?>">
                                <div class="camp-header-overlay"></div>
                                <span class="camp-status status-<?= $c['status'] ?>">
                                    <?php $icons = ['active' => '🟢', 'upcoming' => '🔵', 'completed' => '⚫'];
                                    echo $icons[$c['status']] . ' ' . $c['status']; ?>
                                </span>
                                <div class="camp-brand-badge">
                                    <?php if ($c['brand_icon']): ?><i class="<?= $c['brand_icon'] ?>" style="font-size:.75rem"></i><?php endif; ?>
                                    <?= htmlspecialchars($c['brand']) ?>
                                </div>
                            </div>
                            <div class="camp-body">
                                <h5 class="camp-title"><?= htmlspecialchars($c['title']) ?></h5>
                                <p class="camp-desc"><?= htmlspecialchars($c['desc']) ?></p>
                                <span class="camp-type"><i class="fa-solid fa-bolt me-1"></i><?= $c['type'] ?></span>
                                <div class="camp-metrics">
                                    <div class="metric">
                                        <div class="metric-val"><?= $c['reach'] ?></div>
                                        <div class="metric-lbl">Reach</div>
                                    </div>
                                    <div class="metric">
                                        <div class="metric-val"><?= $c['clicks'] ?></div>
                                        <div class="metric-lbl">Clicks</div>
                                    </div>
                                    <div class="metric">
                                        <div class="metric-val"><?= $c['budget'] ?></div>
                                        <div class="metric-lbl">Budget</div>
                                    </div>
                                </div>
                                <?php if ($c['status'] !== 'upcoming'): ?>
                                    <div class="progress-wrap">
                                        <div class="progress-label"><span>Campaign Progress</span><span style="color:var(--rose);font-weight:700"><?= $c['progress'] ?>%</span></div>
                                        <div class="progress">
                                            <div class="progress-bar" style="width:<?= $c['progress'] ?>%;background:<?= $c['progress'] >= 100 ? 'linear-gradient(90deg,#2e7d32,#66bb6a)' : 'linear-gradient(90deg,' . $c['color'] . ',#9c27b0)' ?>"></div>
                                        </div>
                                    </div>
                                <?php endif; ?>
                                <div style="font-size:.74rem;color:var(--muted);margin-bottom:.9rem">
                                    <i class="fa-solid fa-calendar me-1" style="color:var(--rose)"></i>
                                    <?= date('M d, Y', strtotime($c['start'])) ?> → <?= date('M d, Y', strtotime($c['end'])) ?>
                                </div>
                                <?php if ($c['status'] === 'active'): ?>
                                    <button class="btn-camp">Join Campaign <i class="fa-solid fa-arrow-right ms-1"></i></button>
                                <?php elseif ($c['status'] === 'upcoming'): ?>
                                    <button class="btn-camp" style="background:linear-gradient(135deg,#1565c0,#42a5f5)">Notify Me <i class="fa-solid fa-bell ms-1"></i></button>
                                <?php else: ?>
                                    <button class="btn-camp-outline">View Results <i class="fa-solid fa-chart-bar ms-1"></i></button>
                                <?php endif; ?>
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
                const s = this.dataset.status;
                document.querySelectorAll('.camp-item').forEach(item => {
                    item.style.display = (s === 'all' || item.dataset.status === s) ? '' : 'none';
                });
            });
        });
    </script>
     <?php include __DIR__ . '/includes/login-model.php'; ?>
     <!-- <?php include __DIR__ . '/../app/includes/signup-model.php'; ?> -->
    <?php require_once __DIR__ . '/includes/footer.php'; ?>
</body>

</html>