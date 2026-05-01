<?php
// designs/design3/header.php
// DESIGN 3 — NOIR LUXE THEME
// Dark luxury with electric gold accents | Bootstrap 5 + Internal CSS
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title><?= htmlspecialchars($pageTitle ?? 'BrandElite — Premium Multi Brand Hub') ?></title>
  <meta name="description" content="Premium multi-brand promotions with exclusive deals and luxury collections." />

  <!-- Bootstrap 5 CDN -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
  <!-- Bootstrap Icons -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet" />
  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,700;1,400&family=Outfit:wght@300;400;500;600&display=swap" rel="stylesheet" />

  <style>
    /* ═══════════════════════════════════════
       DESIGN 3 — NOIR LUXE
       Dark Luxury | Bootstrap Override
    ════════════════════════════════════════ */

    :root {
      --d3-bg:        #080c14;
      --d3-surface:   #0e1420;
      --d3-card:      #131926;
      --d3-border:    rgba(212, 175, 55, 0.18);
      --d3-gold:      #d4af37;
      --d3-gold-lt:   #f0d060;
      --d3-gold-dim:  rgba(212,175,55,0.12);
      --d3-silver:    #c0c8d8;
      --d3-mute:      #5a6480;
      --d3-white:     #eef2ff;
      --d3-accent1:   #e84393;
      --d3-accent2:   #00d4ff;
      --d3-radius:    12px;
      --d3-transition: 0.35s cubic-bezier(0.16,1,0.3,1);
    }

    *, *::before, *::after { box-sizing: border-box; }

    html { scroll-behavior: smooth; }

    body {
      font-family: 'Outfit', sans-serif;
      font-weight: 300;
      background-color: var(--d3-bg);
      color: var(--d3-white);
      overflow-x: hidden;
      min-height: 100vh;
    }

    /* ── Grain overlay ── */
    body::after {
      content: '';
      position: fixed;
      inset: 0;
      background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 256 256' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='noise'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.9' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23noise)' opacity='0.04'/%3E%3C/svg%3E");
      pointer-events: none;
      z-index: 9999;
      opacity: 0.35;
    }

    /* ── Glow orbs background ── */
    body::before {
      content: '';
      position: fixed;
      inset: 0;
      background:
        radial-gradient(ellipse 60% 50% at 15% 20%,  rgba(212,175,55,0.07), transparent 55%),
        radial-gradient(ellipse 50% 40% at 85% 70%,  rgba(0,212,255,0.05),  transparent 55%),
        radial-gradient(ellipse 40% 40% at 50% 100%, rgba(232,67,147,0.06), transparent 55%);
      pointer-events: none;
      z-index: 0;
    }

    /* ── Typography ── */
    h1, h2, h3, h4, h5 {
      font-family: 'Playfair Display', serif;
      font-weight: 700;
    }

    .display-gold {
      font-family: 'Playfair Display', serif;
      font-size: clamp(2.8rem, 6vw, 5.2rem);
      font-weight: 700;
      line-height: 1.1;
      background: linear-gradient(135deg, var(--d3-white) 0%, var(--d3-gold) 50%, var(--d3-gold-lt) 100%);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
      background-clip: text;
    }

    .text-gold   { color: var(--d3-gold) !important; }
    .text-silver { color: var(--d3-silver) !important; }
    .text-mute   { color: var(--d3-mute) !important; }

    /* ── Bootstrap Overrides ── */
    .bg-surface  { background-color: var(--d3-surface) !important; }
    .bg-card     { background-color: var(--d3-card) !important; }
    .border-gold { border-color: var(--d3-border) !important; }

    /* ── Gold Divider ── */
    .gold-divider {
      width: 50px;
      height: 2px;
      background: linear-gradient(90deg, var(--d3-gold), transparent);
      border-radius: 2px;
      margin: 14px 0;
    }
    .gold-divider-center {
      width: 50px; height: 2px;
      background: linear-gradient(90deg, transparent, var(--d3-gold), transparent);
      border-radius: 2px;
      margin: 14px auto;
    }

    /* ── Label Pill ── */
    .label-pill {
      display: inline-flex;
      align-items: center;
      gap: 7px;
      padding: 5px 16px;
      border-radius: 100px;
      font-family: 'Outfit', sans-serif;
      font-size: 0.72rem;
      font-weight: 500;
      letter-spacing: 0.18em;
      text-transform: uppercase;
      border: 1px solid var(--d3-border);
      background: var(--d3-gold-dim);
      color: var(--d3-gold);
    }
    .label-pill .pulse-dot {
      width: 6px; height: 6px;
      border-radius: 50%;
      background: var(--d3-gold);
      animation: d3pulse 2s infinite;
    }
    @keyframes d3pulse {
      0%,100% { opacity:1; transform:scale(1); box-shadow:0 0 0 0 rgba(212,175,55,.5); }
      50%      { opacity:.5; transform:scale(1.4); box-shadow:0 0 0 6px rgba(212,175,55,0); }
    }

    /* ── Buttons ── */
    .btn-d3-gold {
      display: inline-flex;
      align-items: center;
      gap: 8px;
      padding: 13px 32px;
      border-radius: 100px;
      font-family: 'Outfit', sans-serif;
      font-size: 0.88rem;
      font-weight: 500;
      letter-spacing: 0.06em;
      text-decoration: none;
      border: none;
      cursor: pointer;
      background: linear-gradient(135deg, #d4af37, #f0d060, #c89520);
      background-size: 200% auto;
      color: #080c14;
      box-shadow: 0 4px 24px rgba(212,175,55,0.3);
      transition: all var(--d3-transition);
    }
    .btn-d3-gold:hover {
      background-position: right center;
      transform: translateY(-2px);
      box-shadow: 0 8px 40px rgba(212,175,55,0.5);
      color: #080c14;
    }

    .btn-d3-outline {
      display: inline-flex;
      align-items: center;
      gap: 8px;
      padding: 12px 32px;
      border-radius: 100px;
      font-family: 'Outfit', sans-serif;
      font-size: 0.88rem;
      font-weight: 500;
      letter-spacing: 0.06em;
      text-decoration: none;
      cursor: pointer;
      background: transparent;
      color: var(--d3-gold);
      border: 1.5px solid var(--d3-border);
      box-shadow: 0 0 0 0 rgba(212,175,55,0);
      transition: all var(--d3-transition);
    }
    .btn-d3-outline:hover {
      border-color: var(--d3-gold);
      box-shadow: 0 0 20px rgba(212,175,55,0.2), inset 0 0 20px rgba(212,175,55,0.04);
      color: var(--d3-gold-lt);
    }

    /* ── Neon Glow Card ── */
    .d3-card {
      background: var(--d3-card);
      border: 1px solid var(--d3-border);
      border-radius: var(--d3-radius);
      transition: transform var(--d3-transition), box-shadow var(--d3-transition), border-color var(--d3-transition);
      position: relative;
      overflow: hidden;
    }
    .d3-card::before {
      content: '';
      position: absolute;
      top: 0; left: 0; right: 0;
      height: 1px;
      background: linear-gradient(90deg, transparent, var(--d3-gold), transparent);
      opacity: 0;
      transition: opacity var(--d3-transition);
    }
    .d3-card:hover { transform: translateY(-5px); box-shadow: 0 20px 60px rgba(0,0,0,0.5), 0 0 30px rgba(212,175,55,0.1); border-color: rgba(212,175,55,0.4); }
    .d3-card:hover::before { opacity: 1; }

    /* ── Section heading ── */
    .d3-section-label {
      font-family: 'Outfit', sans-serif;
      font-size: 0.72rem;
      font-weight: 500;
      letter-spacing: 0.22em;
      text-transform: uppercase;
      color: var(--d3-gold);
      margin-bottom: 8px;
    }
    .d3-section-title {
      font-family: 'Playfair Display', serif;
      font-size: clamp(1.8rem, 3.5vw, 2.8rem);
      color: var(--d3-white);
      margin-bottom: 0;
    }

    /* ── Navbar ── */
    .navbar-d3 {
      background: rgba(8,12,20,0.85) !important;
      backdrop-filter: blur(20px);
      -webkit-backdrop-filter: blur(20px);
      border-bottom: 1px solid var(--d3-border);
      padding: 16px 0;
      position: fixed !important;
      top: 0; left: 0; right: 0;
      z-index: 1000;
      animation: d3slideDown 0.6s ease both;
    }
    @keyframes d3slideDown {
      from { opacity:0; transform:translateY(-100%); }
      to   { opacity:1; transform:translateY(0); }
    }

    .navbar-brand-d3 {
      font-family: 'Playfair Display', serif;
      font-size: 1.5rem;
      font-weight: 700;
      color: var(--d3-gold) !important;
      letter-spacing: -0.01em;
      text-decoration: none;
    }
    .navbar-brand-d3 small {
      display: block;
      font-family: 'Outfit', sans-serif;
      font-size: 0.6rem;
      font-weight: 400;
      letter-spacing: 0.22em;
      text-transform: uppercase;
      color: var(--d3-mute);
      margin-top: -3px;
    }

    .nav-link-d3 {
      color: var(--d3-silver) !important;
      font-size: 0.85rem;
      font-weight: 400;
      letter-spacing: 0.04em;
      padding: 8px 14px !important;
      border-radius: 8px;
      transition: color 0.3s, background 0.3s;
      text-decoration: none;
      position: relative;
    }
    .nav-link-d3::after {
      content: '';
      position: absolute;
      bottom: 2px; left: 50%; right: 50%;
      height: 1.5px;
      background: var(--d3-gold);
      transition: left 0.3s, right 0.3s;
      border-radius: 2px;
    }
    .nav-link-d3:hover { color: var(--d3-gold) !important; }
    .nav-link-d3:hover::after { left: 14px; right: 14px; }

    /* ── Badge chips ── */
    .d3-badge {
      display: inline-flex;
      padding: 3px 11px;
      border-radius: 100px;
      font-family: 'Outfit', sans-serif;
      font-size: 0.68rem;
      font-weight: 500;
      letter-spacing: 0.05em;
    }
    .d3-badge-gold    { background:rgba(212,175,55,.14); color:var(--d3-gold); }
    .d3-badge-cyan    { background:rgba(0,212,255,.12);  color:#00d4ff; }
    .d3-badge-pink    { background:rgba(232,67,147,.12); color:#e84393; }
    .d3-badge-green   { background:rgba(0,230,150,.12);  color:#00e696; }

    /* ── Stat cards ── */
    .d3-stat {
      text-align: center;
      padding: 28px 20px;
      background: var(--d3-card);
      border: 1px solid var(--d3-border);
      border-radius: var(--d3-radius);
      position: relative;
      overflow: hidden;
    }
    .d3-stat::after {
      content: '';
      position: absolute;
      bottom: 0; left: 0; right: 0;
      height: 2px;
      background: linear-gradient(90deg, transparent, var(--d3-gold), transparent);
    }
    .d3-stat-num {
      font-family: 'Playfair Display', serif;
      font-size: 2.4rem;
      font-weight: 700;
      background: linear-gradient(135deg, var(--d3-gold), var(--d3-gold-lt));
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
      background-clip: text;
      line-height: 1;
      margin-bottom: 8px;
    }
    .d3-stat-label {
      font-size: 0.75rem;
      letter-spacing: 0.14em;
      text-transform: uppercase;
      color: var(--d3-mute);
    }

    /* ── Scroll Reveal ── */
    .d3-reveal {
      opacity: 0;
      transform: translateY(28px);
      transition: opacity 0.7s var(--d3-transition), transform 0.7s var(--d3-transition);
    }
    .d3-reveal.visible {
      opacity: 1;
      transform: none;
    }

    @keyframes d3fadeUp {
      from { opacity: 0; transform: translateY(22px); }
      to   { opacity: 1; transform: translateY(0); }
    }

    /* ── scrollbar ── */
    ::-webkit-scrollbar { width: 6px; }
    ::-webkit-scrollbar-track { background: var(--d3-bg); }
    ::-webkit-scrollbar-thumb {
      background: linear-gradient(180deg, var(--d3-gold), #8a6010);
      border-radius: 10px;
    }

    /* ── Responsive ── */
    @media (max-width: 768px) {
      .navbar-d3 .btn-d3-gold { padding: 9px 20px; font-size: .8rem; }
    }
  </style>
</head>
<body>

<!-- ░░ NAVBAR ░░ -->
<nav class="navbar-d3 navbar navbar-expand-lg">
  <div class="container">

    <a href="/brandpromotion/font-view/index.php" class="navbar-brand-d3">
      BrandElite
      <small>Multi Brand Promotion</small>
    </a>

    <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#d3Nav"
      style="color:var(--d3-gold);">
      <i class="bi bi-list" style="font-size:1.5rem;"></i>
    </button>

    <div class="collapse navbar-collapse" id="d3Nav">
      <ul class="navbar-nav ms-auto align-items-lg-center gap-1">
        <li class="nav-item"><a class="nav-link-d3" href="/brandpromotion/font-view/home.php">Home</a></li>
        <li class="nav-item"><a class="nav-link-d3" href="#">Brands</a></li>
        <li class="nav-item"><a class="nav-link-d3" href="#">Offers</a></li>
        <li class="nav-item"><a class="nav-link-d3" href="/brandpromotion/font-view/about.php">About</a></li>
        <li class="nav-item ms-lg-2">
          <a href="/brandpromotion/font-view/login.php" class="btn-d3-outline" style="padding:9px 22px;font-size:.82rem;">
            <i class="bi bi-person"></i> Sign In
          </a>
        </li>
        <li class="nav-item ms-2">
          <a href="/brandpromotion/font-view/signup.php" class="btn-d3-gold" style="padding:9px 22px;font-size:.82rem;">
            <i class="bi bi-stars"></i> Join Now
          </a>
        </li>
      </ul>
    </div>
  </div>
</nav>

<!-- Spacer -->
<div style="height:74px;"></div>