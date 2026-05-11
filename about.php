<?php
session_start();
$team = [
    ['name' => 'Arjun Mehta',   'role' => 'CEO & Founder',       'avatar' => 'AM', 'grad' => 'linear-gradient(135deg,#e91e8c,#9c27b0)', 'bio' => '10+ years in brand marketing. Built 3 successful startups before MultiBrand.', 'social' => ['fa-brands fa-linkedin-in', 'fa-brands fa-twitter']],
    ['name' => 'Priya Sharma',  'role' => 'Chief Marketing Officer', 'avatar' => 'PS', 'grad' => 'linear-gradient(135deg,#f57c00,#fbc02d)', 'bio' => 'Former CMO at FashionHub. Expert in influencer marketing and growth hacking.', 'social' => ['fa-brands fa-linkedin-in', 'fa-brands fa-instagram']],
    ['name' => 'Rahul Verma',   'role' => 'CTO',                  'avatar' => 'RV', 'grad' => 'linear-gradient(135deg,#1565c0,#42a5f5)', 'bio' => 'Full-stack engineer with expertise in AI/ML driven marketing tech platforms.', 'social' => ['fa-brands fa-linkedin-in', 'fa-brands fa-github']],
    ['name' => 'Neha Joshi',    'role' => 'Head of Partnerships',  'avatar' => 'NJ', 'grad' => 'linear-gradient(135deg,#2e7d32,#66bb6a)', 'bio' => 'Manages 500+ brand partnerships. Built relationships with Nike, Adidas, Puma.', 'social' => ['fa-brands fa-linkedin-in', 'fa-brands fa-twitter']],
];

$milestones = [
    ['year' => '2020', 'title' => 'Founded', 'desc' => 'MultiBrand was born out of a vision to unify brand promotion across India.', 'icon' => 'fa-solid fa-flag'],
    ['year' => '2021', 'title' => '100 Brands', 'desc' => 'Onboarded our 100th brand partner and launched the influencer network.', 'icon' => 'fa-solid fa-handshake'],
    ['year' => '2022', 'title' => '1M Users', 'desc' => 'Crossed 1 million active users and expanded to 50 Indian cities.', 'icon' => 'fa-solid fa-users'],
    ['year' => '2023', 'title' => 'Series A', 'desc' => 'Raised ₹25 Cr in Series A funding. Launched smart analytics dashboard.', 'icon' => 'fa-solid fa-chart-line'],
    ['year' => '2024', 'title' => '500 Brands', 'desc' => '500 brand partners, 10M+ promotions sent, ₹100Cr GMV milestone.', 'icon' => 'fa-solid fa-trophy'],
    ['year' => '2025', 'title' => 'Going Global', 'desc' => 'Expanded to Southeast Asia. Partnered with global brands across 8 countries.', 'icon' => 'fa-solid fa-globe'],
];

$values = [
    ['icon' => 'fa-solid fa-heart', 'title' => 'People First', 'desc' => 'Every decision we make starts with our users, brand partners, and team.', 'color' => '#e91e8c', 'bg' => 'rgba(233,30,140,.1)'],
    ['icon' => 'fa-solid fa-lightbulb', 'title' => 'Innovation', 'desc' => 'We constantly push boundaries to build the most advanced promotion platform.', 'color' => '#f57c00', 'bg' => 'rgba(245,124,0,.1)'],
    ['icon' => 'fa-solid fa-shield-halved', 'title' => 'Trust & Safety', 'desc' => 'Transparent operations with secure data handling and honest partnerships.', 'color' => '#1565c0', 'bg' => 'rgba(21,101,192,.1)'],
    ['icon' => 'fa-solid fa-rocket', 'title' => 'Growth Mindset', 'desc' => 'We grow with our brand partners — their success is our success.', 'color' => '#9c27b0', 'bg' => 'rgba(156,39,176,.1)'],
];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>About Us – MultiBrand Promotion</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@300;400;500;600;700&family=Playfair+Display:wght@700;800;900&display=swap" rel="stylesheet" />
    <style>
        :root {
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

        .section-divider {
            height: 1px;
            background: linear-gradient(90deg, transparent, rgba(233, 30, 140, .2), rgba(156, 39, 176, .2), transparent);
            margin: 50px auto;
            max-width: 700px
        }

        /* HERO */
        .about-hero {
            padding: 120px 0 60px;
            position: relative;
            overflow: hidden
        }

        .about-hero h1 {
            font-family: 'Playfair Display', serif;
            font-size: clamp(2.2rem, 5vw, 4rem);
            font-weight: 900;
            line-height: 1.1;
            margin-bottom: 1.2rem
        }

        .about-hero p {
            color: var(--muted);
            font-size: 1.05rem;
            line-height: 1.7;
            margin-bottom: 2rem;
            max-width: 520px
        }

        .hero-stat-strip {
            display: flex;
            gap: 2rem;
            flex-wrap: wrap;
            margin-top: 2.5rem;
            padding: 1.5rem 2rem;
            background: var(--glass);
            backdrop-filter: blur(18px);
            border: 1px solid rgba(255, 255, 255, .65);
            border-radius: 18px;
            box-shadow: 0 6px 24px rgba(150, 80, 180, .09)
        }

        .hero-stat {
            text-align: center
        }

        .hero-stat-val {
            font-family: 'Playfair Display', serif;
            font-size: 1.9rem;
            font-weight: 900;
            background: linear-gradient(135deg, #e91e8c, #9c27b0);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            line-height: 1
        }

        .hero-stat-lbl {
            font-size: .75rem;
            color: var(--muted);
            font-weight: 600;
            margin-top: .2rem
        }

        /* MISSION */
        .mission-box {
            background: linear-gradient(135deg, rgba(233, 30, 140, .08), rgba(156, 39, 176, .06), rgba(63, 81, 181, .05));
            border: 1px solid rgba(255, 255, 255, .6);
            border-radius: 28px;
            padding: 3.5rem;
            backdrop-filter: blur(20px);
            box-shadow: 0 16px 50px rgba(150, 80, 180, .1);
            position: relative;
            overflow: hidden;
            text-align: center
        }

        .mission-box::before {
            content: '';
            position: absolute;
            top: -80px;
            right: -80px;
            width: 220px;
            height: 220px;
            background: radial-gradient(circle, rgba(233, 30, 140, .12), transparent 70%);
            border-radius: 50%
        }

        .mission-box::after {
            content: '';
            position: absolute;
            bottom: -60px;
            left: -60px;
            width: 180px;
            height: 180px;
            background: radial-gradient(circle, rgba(156, 39, 176, .1), transparent 70%);
            border-radius: 50%
        }

        .mission-box h2 {
            font-family: 'Playfair Display', serif;
            font-weight: 900;
            font-size: clamp(1.6rem, 3vw, 2.4rem);
            margin-bottom: 1rem;
            position: relative;
            z-index: 1
        }

        .mission-box p {
            color: var(--muted);
            font-size: 1rem;
            line-height: 1.75;
            max-width: 700px;
            margin: 0 auto;
            position: relative;
            z-index: 1
        }

        /* VALUES */
        .value-card {
            background: var(--glass);
            backdrop-filter: blur(18px);
            border: 1px solid rgba(255, 255, 255, .65);
            border-radius: 20px;
            padding: 2rem 1.6rem;
            box-shadow: 0 6px 24px rgba(150, 80, 180, .09);
            transition: all .3s ease;
            height: 100%;
            text-align: center
        }

        .value-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 20px 48px rgba(150, 80, 180, .16)
        }

        .value-icon {
            width: 66px;
            height: 66px;
            border-radius: 18px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            margin: 0 auto 1.2rem;
            transition: transform .3s
        }

        .value-card:hover .value-icon {
            transform: scale(1.12) rotate(-5deg)
        }

        .value-card h5 {
            font-family: 'Playfair Display', serif;
            font-weight: 800;
            font-size: 1.1rem;
            margin-bottom: .5rem
        }

        .value-card p {
            font-size: .85rem;
            color: var(--muted);
            line-height: 1.65
        }

        /* TEAM */
        .team-card {
            background: var(--card-bg);
            backdrop-filter: blur(16px);
            border: 1px solid rgba(255, 255, 255, .68);
            border-radius: 22px;
            overflow: hidden;
            box-shadow: 0 6px 24px rgba(150, 80, 180, .09);
            transition: all .3s ease;
            height: 100%;
            text-align: center
        }

        .team-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 24px 55px rgba(150, 80, 180, .2)
        }

        .team-card-header {
            padding: 2rem 1.5rem 1rem;
            background: linear-gradient(135deg, rgba(233, 30, 140, .04), rgba(156, 39, 176, .03))
        }

        .team-avatar {
            width: 88px;
            height: 88px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Playfair Display', serif;
            font-size: 1.8rem;
            font-weight: 900;
            color: #fff;
            margin: 0 auto 1rem;
            box-shadow: 0 8px 24px rgba(0, 0, 0, .2)
        }

        .team-card h5 {
            font-family: 'Playfair Display', serif;
            font-weight: 800;
            font-size: 1.05rem;
            margin-bottom: .2rem
        }

        .team-role {
            font-size: .78rem;
            font-weight: 600;
            background: linear-gradient(135deg, rgba(233, 30, 140, .1), rgba(156, 39, 176, .08));
            color: var(--violet);
            padding: .25rem .75rem;
            border-radius: 99px;
            border: 1px solid rgba(156, 39, 176, .15);
            display: inline-block;
            margin-bottom: .8rem
        }

        .team-bio {
            font-size: .82rem;
            color: var(--muted);
            line-height: 1.6;
            padding: 0 1.2rem 1.4rem
        }

        .team-socials {
            display: flex;
            justify-content: center;
            gap: .5rem;
            padding: 0 1.5rem 1.5rem
        }

        .t-social {
            width: 34px;
            height: 34px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: .8rem;
            color: #fff;
            background: linear-gradient(135deg, #e91e8c, #9c27b0);
            transition: all .25s;
            text-decoration: none
        }

        .t-social:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(233, 30, 140, .3)
        }

        /* TIMELINE */
        .timeline {
            position: relative;
            padding: 0 0 1rem
        }

        .timeline::before {
            content: '';
            position: absolute;
            left: 50%;
            transform: translateX(-50%);
            top: 0;
            bottom: 0;
            width: 2px;
            background: linear-gradient(180deg, transparent, rgba(233, 30, 140, .3), rgba(156, 39, 176, .3), transparent)
        }

        .tl-item {
            display: flex;
            justify-content: flex-end;
            padding-right: calc(50% + 30px);
            margin-bottom: 2.5rem;
            position: relative
        }

        .tl-item:nth-child(even) {
            justify-content: flex-start;
            padding-right: 0;
            padding-left: calc(50% + 30px)
        }

        .tl-dot {
            position: absolute;
            left: 50%;
            transform: translateX(-50%);
            top: .5rem;
            width: 20px;
            height: 20px;
            border-radius: 50%;
            background: linear-gradient(135deg, #e91e8c, #9c27b0);
            box-shadow: 0 0 0 4px rgba(233, 30, 140, .15);
            z-index: 1
        }

        .tl-card {
            background: var(--card-bg);
            backdrop-filter: blur(16px);
            border: 1px solid rgba(255, 255, 255, .68);
            border-radius: 16px;
            padding: 1.3rem 1.5rem;
            box-shadow: 0 6px 20px rgba(150, 80, 180, .09);
            max-width: 320px;
            transition: all .3s
        }

        .tl-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 14px 36px rgba(150, 80, 180, .16)
        }

        .tl-year {
            font-size: .72rem;
            font-weight: 800;
            color: var(--rose);
            letter-spacing: .1em;
            text-transform: uppercase;
            margin-bottom: .3rem
        }

        .tl-card h6 {
            font-family: 'Playfair Display', serif;
            font-weight: 800;
            margin-bottom: .3rem
        }

        .tl-card p {
            font-size: .8rem;
            color: var(--muted);
            line-height: 1.6;
            margin: 0
        }

        @media(max-width:768px) {
            .timeline::before {
                left: 20px
            }

            .tl-item,
            .tl-item:nth-child(even) {
                justify-content: flex-start;
                padding-right: 0;
                padding-left: 50px
            }

            .tl-dot {
                left: 20px
            }

            .tl-card {
                max-width: 100%
            }
        }

        /* CTA */
        .cta-box {
            background: linear-gradient(135deg, #e91e8c, #9c27b0);
            border-radius: 28px;
            padding: 4rem 3rem;
            text-align: center;
            box-shadow: 0 20px 60px rgba(233, 30, 140, .35);
            position: relative;
            overflow: hidden
        }

        .cta-box::before {
            content: '';
            position: absolute;
            top: -80px;
            right: -80px;
            width: 250px;
            height: 250px;
            background: rgba(255, 255, 255, .08);
            border-radius: 50%
        }

        .cta-box h2 {
            font-family: 'Playfair Display', serif;
            font-weight: 900;
            color: #fff;
            font-size: clamp(1.6rem, 3vw, 2.5rem);
            margin-bottom: 1rem;
            position: relative;
            z-index: 1
        }

        .cta-box p {
            color: rgba(255, 255, 255, .85);
            font-size: 1rem;
            max-width: 480px;
            margin: 0 auto 2rem;
            position: relative;
            z-index: 1
        }

        .btn-cta-white {
            background: #fff;
            color: var(--rose);
            border: none;
            padding: .8rem 2.2rem;
            border-radius: 14px;
            font-weight: 800;
            font-size: 1rem;
            cursor: pointer;
            transition: all .25s;
            box-shadow: 0 6px 20px rgba(0, 0, 0, .15);
            text-decoration: none;
            display: inline-block;
            position: relative;
            z-index: 1
        }

        .btn-cta-white:hover {
            transform: translateY(-3px);
            box-shadow: 0 12px 30px rgba(0, 0, 0, .25);
            color: var(--violet)
        }

        .btn-cta-outline {
            background: transparent;
            color: #fff;
            border: 2px solid rgba(255, 255, 255, .6);
            padding: .78rem 2rem;
            border-radius: 14px;
            font-weight: 700;
            font-size: 1rem;
            cursor: pointer;
            transition: all .25s;
            text-decoration: none;
            display: inline-block;
            position: relative;
            z-index: 1;
            margin-left: 1rem
        }

        .btn-cta-outline:hover {
            background: rgba(255, 255, 255, .15);
            border-color: #fff;
            color: #fff
        }
    </style>
</head>

<body>
    <div class="blob blob-1"></div>
    <div class="blob blob-2"></div>
    <div style="height:80px"></div>

    <!-- HERO -->
    <section class="about-hero">
        <div class="container">
            <div class="row align-items-center gy-4">
                <div class="col-lg-6 fade-up">
                    <span class="section-tag"><i class="fa-solid fa-circle-info me-1"></i> About MultiBrand</span>
                    <h1>India's #1 <span class="gradient-text">Brand Promotion</span> Platform</h1>
                    <p>We're on a mission to connect the world's most iconic brands with their next million customers through smart, data-driven, and creative promotions.</p>
                    <div class="d-flex flex-wrap gap-3">
                        <a href="campaigns.php" class="btn-primary-glow" style="background:linear-gradient(135deg,#e91e8c,#9c27b0);color:#fff;border:none;padding:.75rem 1.9rem;border-radius:12px;font-weight:600;font-size:.95rem;box-shadow:0 6px 22px rgba(233,30,140,.38);transition:all .28s;text-decoration:none;display:inline-block">
                            <i class="fa-solid fa-rocket me-2"></i>View Campaigns
                        </a>
                        <a href="contact.php" style="background:rgba(255,255,255,.7);color:var(--text);border:2px solid rgba(233,30,140,.25);padding:.73rem 1.8rem;border-radius:12px;font-weight:600;font-size:.95rem;transition:all .28s;text-decoration:none;display:inline-block">
                            <i class="fa-solid fa-envelope me-2"></i>Contact Us
                        </a>
                    </div>
                    <div class="hero-stat-strip">
                        <div class="hero-stat">
                            <div class="hero-stat-val">500+</div>
                            <div class="hero-stat-lbl">Brand Partners</div>
                        </div>
                        <div class="hero-stat">
                            <div class="hero-stat-val">10M+</div>
                            <div class="hero-stat-lbl">Active Users</div>
                        </div>
                        <div class="hero-stat">
                            <div class="hero-stat-val">₹100Cr</div>
                            <div class="hero-stat-lbl">GMV Driven</div>
                        </div>
                        <div class="hero-stat">
                            <div class="hero-stat-val">5+</div>
                            <div class="hero-stat-lbl">Years</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 fade-up" style="transition-delay:.2s;text-align:center">
                    <div style="position:relative;display:inline-block">
                        <div style="width:380px;max-width:100%;height:320px;background:linear-gradient(135deg,rgba(233,30,140,.12),rgba(156,39,176,.1),rgba(63,81,181,.08));border-radius:28px;border:1px solid rgba(255,255,255,.65);backdrop-filter:blur(20px);display:flex;align-items:center;justify-content:center;box-shadow:0 20px 60px rgba(150,80,180,.14);margin:0 auto">
                            <div style="text-align:center">
                                <div style="font-size:5rem;margin-bottom:.5rem">🏷️</div>
                                <div style="font-family:'Playfair Display',serif;font-size:1.5rem;font-weight:900;background:linear-gradient(135deg,#e91e8c,#9c27b0);-webkit-background-clip:text;-webkit-text-fill-color:transparent;background-clip:text">MultiBrand</div>
                                <div style="font-size:.85rem;color:var(--muted)">Promotion Platform</div>
                            </div>
                        </div>
                        <!-- floating chips -->
                        <div style="position:absolute;top:-15px;right:-15px;background:linear-gradient(135deg,#e91e8c,#9c27b0);color:#fff;border-radius:14px;padding:.5rem 1rem;font-size:.75rem;font-weight:700;box-shadow:0 4px 14px rgba(233,30,140,.4)">Founded 2020 🚀</div>
                        <div style="position:absolute;bottom:-15px;left:-15px;background:rgba(255,255,255,.85);backdrop-filter:blur(8px);border:1px solid rgba(233,30,140,.2);border-radius:14px;padding:.5rem 1rem;font-size:.75rem;font-weight:700;color:var(--violet);box-shadow:0 4px 14px rgba(150,80,180,.15)">500+ Brands ✨</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="section-divider"></div>

    <!-- MISSION -->
    <section style="padding:60px 0">
        <div class="container">
            <div class="mission-box fade-up">
                <span class="section-tag" style="position:relative;z-index:1">Our Mission</span>
                <h2>Empowering Brands. <span class="gradient-text">Connecting People.</span></h2>
                <p>MultiBrand was built on a simple belief: every brand deserves world-class promotion tools. We democratize access to influencer marketing, smart analytics, and campaign management — so brands of all sizes can compete, grow, and win in the digital era. From startups to Fortune 500 companies, we power the promotions that matter.</p>
            </div>
        </div>
    </section>

    <div class="section-divider"></div>

    <!-- VALUES -->
    <section style="padding:60px 0">
        <div class="container">
            <div class="text-center mb-5 fade-up">
                <span class="section-tag">What We Stand For</span>
                <h2 class="section-title">Our Core <span class="gradient-text">Values</span></h2>
            </div>
            <div class="row g-4">
                <?php foreach ($values as $i => $v): ?>
                    <div class="col-sm-6 col-lg-3 fade-up" style="transition-delay:<?= $i * 0.1 ?>s">
                        <div class="value-card">
                            <div class="value-icon" style="background:<?= $v['bg'] ?>;color:<?= $v['color'] ?>"><i class="<?= $v['icon'] ?>"></i></div>
                            <h5><?= $v['title'] ?></h5>
                            <p><?= $v['desc'] ?></p>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <div class="section-divider"></div>

    <!-- TEAM -->
    <section style="padding:60px 0">
        <div class="container">
            <div class="text-center mb-5 fade-up">
                <span class="section-tag">The People Behind It</span>
                <h2 class="section-title">Meet the <span class="gradient-text">Team</span></h2>
                <p style="color:var(--muted);max-width:480px;margin:.8rem auto 0;font-size:.95rem">A passionate team of marketers, engineers, and brand enthusiasts building the future of promotion.</p>
            </div>
            <div class="row g-4 justify-content-center">
                <?php foreach ($team as $i => $member): ?>
                    <div class="col-6 col-md-3 fade-up" style="transition-delay:<?= $i * 0.1 ?>s">
                        <div class="team-card">
                            <div class="team-card-header">
                                <div class="team-avatar" style="background:<?= $member['grad'] ?>"><?= $member['avatar'] ?></div>
                                <h5><?= $member['name'] ?></h5>
                                <span class="team-role"><?= $member['role'] ?></span>
                            </div>
                            <p class="team-bio"><?= $member['bio'] ?></p>
                            <div class="team-socials">
                                <?php foreach ($member['social'] as $s): ?>
                                    <a href="#" class="t-social"><i class="<?= $s ?>"></i></a>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <div class="section-divider"></div>

    <!-- TIMELINE -->
    <section style="padding:60px 0">
        <div class="container">
            <div class="text-center mb-5 fade-up">
                <span class="section-tag">Our Journey</span>
                <h2 class="section-title">The <span class="gradient-text">MultiBrand</span> Story</h2>
            </div>
            <div class="timeline">
                <?php foreach ($milestones as $i => $m): ?>
                    <div class="tl-item fade-up" style="transition-delay:<?= $i * 0.1 ?>s">
                        <div class="tl-dot"></div>
                        <div class="tl-card">
                            <div class="tl-year"><i class="<?= $m['icon'] ?> me-1"></i><?= $m['year'] ?></div>
                            <h6><?= $m['title'] ?></h6>
                            <p><?= $m['desc'] ?></p>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <div class="section-divider"></div>

    <!-- CTA -->
    <section style="padding:60px 0 80px">
        <div class="container">
            <div class="cta-box fade-up">
                <h2>Ready to Grow Your Brand?</h2>
                <p>Join 500+ brands already scaling with MultiBrand. Get started today and launch your first campaign in minutes.</p>
                <div class="d-flex flex-wrap gap-3 justify-content-center">
                    <a href="brands.php" class="btn-cta-white"><i class="fa-solid fa-store me-2"></i>Browse Brands</a>
                    <a href="contact.php" class="btn-cta-outline"><i class="fa-solid fa-envelope me-2"></i>Contact Sales</a>
                </div>
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
    </script>
</body>

</html>