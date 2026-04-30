<?php
session_start();
include __DIR__ . '/../config.php';

if (!isset($_SESSION['user_id']) || !isset($_SESSION['role']) || $_SESSION['role'] != 'user')  {
  header("Location: ../login.php");
  exit;
}

$user_id = $_SESSION['user_id'];

// fetch user data
$user_query = mysqli_query($conn, "SELECT * FROM users WHERE id='$user_id'");
$user = mysqli_fetch_assoc($user_query);

// // fetch counts
// $total_orders = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) as total FROM orders WHERE user_id='$user_id'"))['total'];
// $total_wishlist = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) as total FROM wishlist WHERE user_id='$user_id'"))['total'];
// $pending_orders = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) as total FROM orders WHERE user_id='$user_id' AND status='pending'"))['total'];
// 
?>

<?php include 'header.php'; ?>

<div class="page-wrapper">

  <div class="main-content">

    <?php
    if (isset($_GET['page'])) {
      $page = $_GET['page'];

      // if($page == 'profile'){
      //     include 'pages/profile.php';
      // }
      // elseif($page == 'my-orders'){
      //     include 'pages/my-orders.php';
      // }
      // elseif($page == 'order-detail'){
      //     include 'pages/order-detail.php';
      // }
      // elseif($page == 'wishlist'){
      //     include 'pages/wishlist.php';
      // }
      // elseif($page == 'addresses'){
      //     include 'pages/addresses.php';
      // }
      // elseif($page == 'change-password'){
      //     include 'pages/change-password.php';
      // }
      // elseif($page == 'notifications'){
      //     include 'pages/notifications.php';
      // }
      // elseif($page == 'support'){
      //     include 'pages/support.php';
      // }
      // elseif($page == 'dashboard'){
      //     // show dashboard content below
      // }
      // else{
      //     echo "<h4>Page not found</h4>";
      // }

    } 
    ?>



<style>

  .page-wrap {
    max-width: 1280px;
    margin: 0 auto;
    padding: 36px 32px 0;
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

  .fade-up {
    animation: fadeUp .5s ease forwards;
    opacity: 0;
  }

  .d1 {
    animation-delay: .05s;
  }

  .d2 {
    animation-delay: .12s;
  }

  .d3 {
    animation-delay: .18s;
  }

  .d4 {
    animation-delay: .24s;
  }

  .d5 {
    animation-delay: .30s;
  }

  /* ── WELCOME BANNER ── */
  .welcome-banner {
    background: linear-gradient(130deg, #1a1a1a 0%, #1f1f1f 60%, #181818 100%);
    border: 1px solid var(--border);
    border-radius: 20px;
    padding: 34px 40px;
    display: flex;
    align-items: center;
    justify-content: space-between;
    margin-bottom: 28px;
    position: relative;
    overflow: hidden;
  }

  .welcome-banner::before {
    content: '';
    position: absolute;
    top: -60px;
    right: -60px;
    width: 260px;
    height: 260px;
    background: radial-gradient(circle, rgba(240, 165, 0, .18), transparent 65%);
    border-radius: 50%;
    pointer-events: none;
  }

  .welcome-banner::after {
    content: '';
    position: absolute;
    bottom: -80px;
    right: 160px;
    width: 200px;
    height: 200px;
    background: radial-gradient(circle, rgba(255, 94, 26, .12), transparent 65%);
    border-radius: 50%;
    pointer-events: none;
  }

  .wb-left .greeting {
    font-size: 13px;
    color: var(--accent);
    letter-spacing: 2px;
    text-transform: uppercase;
    font-weight: 600;
    margin-bottom: 6px;
  }

  .wb-left h1 {
    font-family: 'Bebas Neue', sans-serif;
    font-size: 40px;
    letter-spacing: 2px;
    color: var(--text);
    line-height: 1;
    margin-bottom: 8px;
  }

  .wb-left h1 span {
    color: var(--accent);
  }

  .wb-left p {
    font-size: 14px;
    color: var(--muted);
  }

  .wb-right {
    display: flex;
    gap: 12px;
    flex-shrink: 0;
    z-index: 1;
  }

  .wb-btn {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    padding: 11px 24px;
    border-radius: 12px;
    font-size: 13px;
    font-weight: 600;
    font-family: 'DM Sans', sans-serif;
    text-decoration: none;
    border: none;
    cursor: pointer;
    transition: opacity .2s, transform .15s;
  }

  .wb-btn:hover {
    opacity: .88;
    transform: translateY(-2px);
  }

  .wb-btn.primary {
    background: var(--accent);
    color: #000;
  }

  .wb-btn.ghost {
    background: transparent;
    color: var(--text);
    border: 1px solid var(--border);
  }

  .wb-btn.ghost:hover {
    border-color: var(--accent);
    color: var(--accent);
  }

  /* ── STATS GRID ── */
  .stats-grid {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 18px;
    margin-bottom: 26px;
  }

  .stat-card {
    background: var(--surface);
    border: 1px solid var(--border);
    border-radius: 16px;
    padding: 24px 22px;
    display: flex;
    flex-direction: column;
    gap: 14px;
    cursor: pointer;
    position: relative;
    overflow: hidden;
    transition: border-color .25s, transform .25s, box-shadow .25s;
  }

  .stat-card::before {
    content: '';
    position: absolute;
    bottom: -30px;
    right: -30px;
    width: 90px;
    height: 90px;
    border-radius: 50%;
    opacity: .07;
    transition: opacity .3s;
  }

  .stat-card:hover {
    transform: translateY(-4px);
    box-shadow: 0 14px 40px rgba(0, 0, 0, .4);
  }

  .stat-card:hover::before {
    opacity: .14;
  }

  .stat-card.c-orange {
    border-color: rgba(240, 165, 0, .2);
  }

  .stat-card.c-orange::before {
    background: var(--accent);
  }

  .stat-card.c-orange:hover {
    border-color: var(--accent);
  }

  .stat-card.c-green {
    border-color: rgba(34, 197, 94, .2);
  }

  .stat-card.c-green::before {
    background: #22c55e;
  }

  .stat-card.c-green:hover {
    border-color: #22c55e;
  }

  .stat-card.c-blue {
    border-color: rgba(59, 130, 246, .2);
  }

  .stat-card.c-blue::before {
    background: #3b82f6;
  }

  .stat-card.c-blue:hover {
    border-color: #3b82f6;
  }

  .stat-card.c-red {
    border-color: rgba(255, 94, 26, .2);
  }

  .stat-card.c-red::before {
    background: var(--accent2);
  }

  .stat-card.c-red:hover {
    border-color: var(--accent2);
  }

  .stat-top {
    display: flex;
    align-items: flex-start;
    justify-content: space-between;
  }

  .stat-icon {
    width: 44px;
    height: 44px;
    border-radius: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 18px;
  }

  .c-orange .stat-icon {
    background: rgba(240, 165, 0, .15);
    color: var(--accent);
  }

  .c-green .stat-icon {
    background: rgba(34, 197, 94, .15);
    color: #22c55e;
  }

  .c-blue .stat-icon {
    background: rgba(59, 130, 246, .15);
    color: #3b82f6;
  }

  .c-red .stat-icon {
    background: rgba(255, 94, 26, .15);
    color: var(--accent2);
  }

  .stat-trend {
    font-size: 11px;
    font-weight: 700;
    padding: 3px 9px;
    border-radius: 20px;
  }

  .trend-up {
    background: rgba(34, 197, 94, .15);
    color: #22c55e;
  }

  .trend-new {
    background: rgba(240, 165, 0, .15);
    color: var(--accent);
  }

  .stat-value {
    font-family: 'Bebas Neue', sans-serif;
    font-size: 34px;
    color: var(--text);
    letter-spacing: 1px;
    line-height: 1;
    margin-bottom: 4px;
  }

  .stat-label {
    font-size: 12px;
    color: var(--muted);
    font-weight: 500;
  }

  /* ── MAIN GRID ── */
  .main-grid {
    display: grid;
    grid-template-columns: 1fr 380px;
    gap: 22px;
    margin-bottom: 26px;
  }

  .s-card {
    background: var(--surface);
    border: 1px solid var(--border);
    border-radius: 18px;
    overflow: hidden;
  }

  .s-head {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 20px 24px;
    border-bottom: 1px solid var(--border);
  }

  .s-head h3 {
    font-size: 15px;
    font-weight: 600;
    color: var(--text);
  }

  .s-link {
    font-size: 12px;
    color: var(--accent);
    text-decoration: none;
    font-weight: 500;
  }

  .s-link:hover {
    opacity: .7;
  }

  /* Orders Table */
  .orders-table {
    width: 100%;
    border-collapse: collapse;
  }

  .orders-table th {
    text-align: left;
    font-size: 11px;
    text-transform: uppercase;
    letter-spacing: 1px;
    color: var(--muted);
    padding: 12px 24px;
    background: rgba(255, 255, 255, .015);
  }

  .orders-table td {
    padding: 15px 24px;
    font-size: 13px;
    color: var(--text);
    border-top: 1px solid rgba(42, 42, 42, .6);
    vertical-align: middle;
  }

  .orders-table tr:hover td {
    background: rgba(255, 255, 255, .02);
  }

  .brand-pill {
    display: inline-flex;
    align-items: center;
    gap: 8px;
  }

  .brand-dot {
    width: 30px;
    height: 30px;
    border-radius: 8px;
    background: linear-gradient(135deg, var(--accent), var(--accent2));
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 12px;
    font-weight: 900;
    color: #000;
  }

  .status-badge {
    font-size: 11px;
    font-weight: 600;
    padding: 4px 12px;
    border-radius: 20px;
    display: inline-block;
    white-space: nowrap;
  }

  .s-delivered {
    background: rgba(34, 197, 94, .15);
    color: #22c55e;
  }

  .s-pending {
    background: rgba(240, 165, 0, .15);
    color: var(--accent);
  }

  .s-cancelled {
    background: rgba(239, 68, 68, .15);
    color: #ef4444;
  }

  .s-shipped {
    background: rgba(59, 130, 246, .15);
    color: #3b82f6;
  }

  /* Active Offers */
  .offer-item {
    display: flex;
    align-items: center;
    gap: 14px;
    padding: 16px 24px;
    border-top: 1px solid rgba(42, 42, 42, .6);
    transition: background .15s;
    cursor: pointer;
  }

  .offer-item:first-of-type {
    border-top: none;
  }

  .offer-item:hover {
    background: rgba(255, 255, 255, .025);
  }

  .offer-thumb {
    width: 46px;
    height: 46px;
    border-radius: 12px;
    background: linear-gradient(135deg, var(--accent), var(--accent2));
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 18px;
    font-weight: 900;
    color: #000;
    flex-shrink: 0;
  }

  .offer-info {
    flex: 1;
    min-width: 0;
  }

  .offer-info h4 {
    font-size: 13px;
    font-weight: 600;
    color: var(--text);
    margin-bottom: 3px;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
  }

  .offer-info p {
    font-size: 11px;
    color: var(--muted);
  }

  .offer-pct {
    font-family: 'Bebas Neue', sans-serif;
    font-size: 26px;
    color: var(--accent);
    letter-spacing: 1px;
    flex-shrink: 0;
  }

  /* ── BOTTOM GRID ── */
  .bottom-grid {
    display: grid;
    grid-template-columns: 1fr 1fr 1fr;
    gap: 22px;
    margin-bottom: 26px;
  }

  /* Wallet */
  .wallet-summary {
    padding: 24px;
  }

  .ws-balance-label {
    font-size: 11px;
    color: var(--muted);
    text-transform: uppercase;
    letter-spacing: 1.5px;
    margin-bottom: 6px;
  }

  .ws-amount {
    font-family: 'Bebas Neue', sans-serif;
    font-size: 40px;
    color: var(--accent);
    letter-spacing: 2px;
    margin-bottom: 20px;
  }

  .ws-row {
    display: flex;
    gap: 10px;
    margin-bottom: 22px;
  }

  .ws-btn {
    flex: 1;
    padding: 10px 0;
    border-radius: 10px;
    border: none;
    font-size: 13px;
    font-weight: 600;
    font-family: 'DM Sans', sans-serif;
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 7px;
    transition: opacity .2s;
  }

  .ws-btn:hover {
    opacity: .85;
  }

  .ws-btn.add {
    background: var(--accent);
    color: #000;
  }

  .ws-btn.withdraw {
    background: var(--border);
    color: var(--text);
    border: 1px solid var(--border);
  }

  .ws-txns {
    display: flex;
    flex-direction: column;
  }

  .ws-txn {
    display: flex;
    align-items: center;
    gap: 12px;
    padding: 11px 0;
    border-bottom: 1px solid rgba(42, 42, 42, .5);
  }

  .ws-txn:last-child {
    border-bottom: none;
  }

  .ws-txn-icon {
    width: 32px;
    height: 32px;
    border-radius: 8px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 13px;
  }

  .ws-txn-icon.cr {
    background: rgba(34, 197, 94, .15);
    color: #22c55e;
  }

  .ws-txn-icon.dr {
    background: rgba(239, 68, 68, .15);
    color: #ef4444;
  }

  .ws-txn-desc {
    flex: 1;
    font-size: 12px;
    color: var(--text);
  }

  .ws-txn-amt {
    font-size: 13px;
    font-weight: 700;
  }

  .ws-txn-amt.cr {
    color: #22c55e;
  }

  .ws-txn-amt.dr {
    color: #ef4444;
  }

  /* Reward Points */
  .reward-wrap {
    padding: 24px;
  }

  .reward-circle-wrap {
    display: flex;
    justify-content: center;
    margin: 10px 0 20px;
  }

  .reward-circle {
    width: 130px;
    height: 130px;
    border-radius: 50%;
    background: conic-gradient(var(--accent) 0deg 230deg, rgba(42, 42, 42, .6) 230deg 360deg);
    box-shadow: 0 0 30px rgba(240, 165, 0, .15);
    display: flex;
    align-items: center;
    justify-content: center;
    position: relative;
  }

  .reward-circle::before {
    content: '';
    position: absolute;
    inset: 10px;
    background: var(--surface);
    border-radius: 50%;
  }

  .rc-inner {
    position: relative;
    z-index: 1;
    text-align: center;
  }

  .rc-val {
    font-family: 'Bebas Neue', sans-serif;
    font-size: 30px;
    color: var(--accent);
    letter-spacing: 1px;
    line-height: 1;
  }

  .rc-label {
    font-size: 10px;
    color: var(--muted);
    letter-spacing: 1px;
    text-transform: uppercase;
  }

  .reward-tiers {
    display: flex;
    flex-direction: column;
    gap: 12px;
  }

  .tier-row {
    display: flex;
    align-items: center;
    gap: 10px;
  }

  .tier-name {
    font-size: 12px;
    color: var(--muted);
    width: 70px;
    flex-shrink: 0;
  }

  .tier-bar-wrap {
    flex: 1;
    height: 5px;
    background: var(--border);
    border-radius: 10px;
    overflow: hidden;
  }

  .tier-bar {
    height: 100%;
    border-radius: 10px;
    background: linear-gradient(90deg, var(--accent), var(--accent2));
  }

  .tier-pts {
    font-size: 11px;
    color: var(--text);
    font-weight: 600;
    width: 56px;
    text-align: right;
  }

  /* Top Brands */
  .brand-row {
    display: flex;
    align-items: center;
    gap: 14px;
    padding: 14px 24px;
    border-top: 1px solid rgba(42, 42, 42, .6);
    transition: background .15s;
    cursor: pointer;
  }

  .brand-row:first-of-type {
    border-top: none;
  }

  .brand-row:hover {
    background: rgba(255, 255, 255, .025);
  }

  .brand-rank {
    font-family: 'Bebas Neue', sans-serif;
    font-size: 20px;
    color: var(--border);
    width: 24px;
    flex-shrink: 0;
  }

  .brand-logo {
    width: 40px;
    height: 40px;
    border-radius: 10px;
    background: linear-gradient(135deg, var(--accent), var(--accent2));
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 16px;
    font-weight: 900;
    color: #000;
    flex-shrink: 0;
  }

  .brand-meta {
    flex: 1;
  }

  .brand-meta h4 {
    font-size: 13px;
    font-weight: 600;
    color: var(--text);
    margin-bottom: 3px;
  }

  .brand-meta p {
    font-size: 11px;
    color: var(--muted);
  }

  .brand-bar-col {
    width: 80px;
  }

  .brand-mini-bar {
    height: 4px;
    background: var(--border);
    border-radius: 10px;
    overflow: hidden;
    margin-bottom: 4px;
  }

  .brand-mini-bar div {
    height: 100%;
    background: linear-gradient(90deg, var(--accent), var(--accent2));
    border-radius: 10px;
  }

  .brand-pct {
    font-size: 11px;
    color: var(--muted);
    text-align: right;
  }

  /* ── PROMO BANNER ── */
  .promo-banner {
    background: linear-gradient(120deg, #1e1400 0%, #2a1c00 50%, #1a1000 100%);
    border: 1px solid rgba(240, 165, 0, .25);
    border-radius: 18px;
    padding: 28px 36px;
    display: flex;
    align-items: center;
    justify-content: space-between;
    margin-bottom: 28px;
    position: relative;
    overflow: hidden;
  }

  .promo-banner::before {
    content: '🎉';
    position: absolute;
    right: 180px;
    top: 50%;
    transform: translateY(-50%);
    font-size: 80px;
    opacity: .08;
    pointer-events: none;
  }

  .promo-left h3 {
    font-family: 'Bebas Neue', sans-serif;
    font-size: 24px;
    color: var(--accent);
    letter-spacing: 1.5px;
    margin-bottom: 4px;
  }

  .promo-left p {
    font-size: 13px;
    color: var(--muted);
  }

  .promo-code {
    background: rgba(240, 165, 0, .12);
    border: 1px dashed var(--accent);
    color: var(--accent);
    font-size: 18px;
    font-family: 'Bebas Neue', sans-serif;
    letter-spacing: 4px;
    padding: 10px 28px;
    border-radius: 10px;
    cursor: pointer;
    transition: background .2s;
    user-select: none;
  }

  .promo-code:hover {
    background: rgba(240, 165, 0, .2);
  }

  /* Responsive */
  @media (max-width: 1100px) {
    .main-grid {
      grid-template-columns: 1fr;
    }

    .bottom-grid {
      grid-template-columns: 1fr 1fr;
    }
  }

  @media (max-width: 768px) {
    .stats-grid {
      grid-template-columns: 1fr 1fr;
    }

    .bottom-grid {
      grid-template-columns: 1fr;
    }

    .page-wrap {
      padding: 20px 16px 0;
    }

    .welcome-banner {
      flex-direction: column;
      align-items: flex-start;
      gap: 20px;
      padding: 24px;
    }

    .wb-right {
      width: 100%;
    }

    .wb-btn {
      flex: 1;
      justify-content: center;
    }

    .promo-banner {
      flex-direction: column;
      gap: 16px;
      text-align: center;
    }
  }
</style>

<div class="page-wrap">

  <!-- ① Welcome Banner -->
  <div class="welcome-banner fade-up d1">
    <div class="wb-left">
      <div class="greeting">Good <?php
                                  $h = (int)date('H');
                                  echo $h < 12 ? 'Morning ☀️' : ($h < 17 ? 'Afternoon 🌤️' : 'Evening 🌙');
                                  ?></div>
      <h1>Welcome Back, <span><?php echo isset($_SESSION['user_name']) ? htmlspecialchars($_SESSION['user_name']) : 'User'; ?>!</span></h1>
      <p>Here's your activity summary — <?php echo date('l, d M Y'); ?></p>
    </div>
    <div class="wb-right">
      <a href="offers.php" class="wb-btn primary"><i class="fa fa-percent"></i> Browse Offers</a>
      <a href="orders.php" class="wb-btn ghost"><i class="fa fa-box"></i> My Orders</a>
    </div>
  </div>

  <!-- ② Stats -->
  <div class="stats-grid fade-up d2">
    <div class="stat-card c-orange">
      <div class="stat-top">
        <div class="stat-icon"><i class="fa fa-box"></i></div><span class="stat-trend trend-up">↑ 12%</span>
      </div>
      <div>
        <div class="stat-value">24</div>
        <div class="stat-label">Total Orders</div>
      </div>
    </div>
    <div class="stat-card c-green">
      <div class="stat-top">
        <div class="stat-icon"><i class="fa fa-wallet"></i></div><span class="stat-trend trend-up">↑ 5%</span>
      </div>
      <div>
        <div class="stat-value">₹1,840</div>
        <div class="stat-label">Wallet Balance</div>
      </div>
    </div>
    <div class="stat-card c-blue">
      <div class="stat-top">
        <div class="stat-icon"><i class="fa fa-star"></i></div><span class="stat-trend trend-up">+20 pts</span>
      </div>
      <div>
        <div class="stat-value">320</div>
        <div class="stat-label">Reward Points</div>
      </div>
    </div>
    <div class="stat-card c-red">
      <div class="stat-top">
        <div class="stat-icon"><i class="fa fa-tags"></i></div><span class="stat-trend trend-new">+3 new</span>
      </div>
      <div>
        <div class="stat-value">8</div>
        <div class="stat-label">Active Offers</div>
      </div>
    </div>
  </div>

  <!-- ③ Main Grid -->
  <div class="main-grid fade-up d3">

    <!-- Recent Orders -->
    <div class="s-card">
      <div class="s-head">
        <h3><i class="fa fa-clock-rotate-left" style="color:var(--accent);margin-right:8px;font-size:13px;"></i>Recent Orders</h3>
        <a href="orders.php" class="s-link">View All →</a>
      </div>
      <table class="orders-table">
        <thead>
          <tr>
            <th>Order ID</th>
            <th>Brand</th>
            <th>Product</th>
            <th>Amount</th>
            <th>Status</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td style="color:var(--muted);font-size:12px;">#ORD-1021</td>
            <td>
              <div class="brand-pill">
                <div class="brand-dot">N</div>Nike
              </div>
            </td>
            <td>Air Max 270</td>
            <td style="font-weight:600;">₹1,299</td>
            <td><span class="status-badge s-delivered">Delivered</span></td>
          </tr>
          <tr>
            <td style="color:var(--muted);font-size:12px;">#ORD-1020</td>
            <td>
              <div class="brand-pill">
                <div class="brand-dot">A</div>Adidas
              </div>
            </td>
            <td>Ultraboost 22</td>
            <td style="font-weight:600;">₹849</td>
            <td><span class="status-badge s-pending">Pending</span></td>
          </tr>
          <tr>
            <td style="color:var(--muted);font-size:12px;">#ORD-1019</td>
            <td>
              <div class="brand-pill">
                <div class="brand-dot">P</div>Puma
              </div>
            </td>
            <td>RS-X Sneaker</td>
            <td style="font-weight:600;">₹599</td>
            <td><span class="status-badge s-delivered">Delivered</span></td>
          </tr>
          <tr>
            <td style="color:var(--muted);font-size:12px;">#ORD-1018</td>
            <td>
              <div class="brand-pill">
                <div class="brand-dot">R</div>Reebok
              </div>
            </td>
            <td>Classic Leather</td>
            <td style="font-weight:600;">₹1,100</td>
            <td><span class="status-badge s-cancelled">Cancelled</span></td>
          </tr>
          <tr>
            <td style="color:var(--muted);font-size:12px;">#ORD-1017</td>
            <td>
              <div class="brand-pill">
                <div class="brand-dot">N</div>Nike
              </div>
            </td>
            <td>React Infinity</td>
            <td style="font-weight:600;">₹2,199</td>
            <td><span class="status-badge s-shipped">Shipped</span></td>
          </tr>
        </tbody>
      </table>
    </div>

    <!-- Hot Offers -->
    <div class="s-card">
      <div class="s-head">
        <h3><i class="fa fa-fire" style="color:var(--accent2);margin-right:8px;font-size:13px;"></i>Hot Offers</h3>
        <a href="offers.php" class="s-link">See All →</a>
      </div>
      <div class="offer-item">
        <div class="offer-thumb">N</div>
        <div class="offer-info">
          <h4>Nike Summer Sale</h4>
          <p>Valid till 31 May 2026</p>
        </div>
        <div class="offer-pct">30%</div>
      </div>
      <div class="offer-item">
        <div class="offer-thumb">A</div>
        <div class="offer-info">
          <h4>Adidas Flash Deal</h4>
          <p>Valid till 5 May 2026</p>
        </div>
        <div class="offer-pct">20%</div>
      </div>
      <div class="offer-item">
        <div class="offer-thumb">P</div>
        <div class="offer-info">
          <h4>Puma Mega Offer</h4>
          <p>Valid till 15 May 2026</p>
        </div>
        <div class="offer-pct">15%</div>
      </div>
      <div class="offer-item">
        <div class="offer-thumb">R</div>
        <div class="offer-info">
          <h4>Reebok Weekend Deal</h4>
          <p>Valid till 3 May 2026</p>
        </div>
        <div class="offer-pct">25%</div>
      </div>
      <div class="offer-item">
        <div class="offer-thumb">L</div>
        <div class="offer-info">
          <h4>Levis Special Promo</h4>
          <p>Valid till 10 May 2026</p>
        </div>
        <div class="offer-pct">18%</div>
      </div>
    </div>

  </div>

  <!-- ④ Bottom Grid -->
  <div class="bottom-grid fade-up d4">

    <!-- Wallet Summary -->
    <div class="s-card">
      <div class="s-head">
        <h3><i class="fa fa-wallet" style="color:var(--accent);margin-right:8px;font-size:13px;"></i>Wallet</h3>
        <a href="wallet.php" class="s-link">Manage →</a>
      </div>
      <div class="wallet-summary">
        <div class="ws-balance-label">Available Balance</div>
        <div class="ws-amount">₹1,840</div>
        <div class="ws-row">
          <button class="ws-btn add"><i class="fa fa-plus"></i> Add Money</button>
          <button class="ws-btn withdraw"><i class="fa fa-arrow-up"></i> Withdraw</button>
        </div>
        <div class="ws-txns">
          <div class="ws-txn">
            <div class="ws-txn-icon cr"><i class="fa fa-arrow-down"></i></div>
            <div class="ws-txn-desc">Top-Up · 28 Apr</div>
            <div class="ws-txn-amt cr">+₹500</div>
          </div>
          <div class="ws-txn">
            <div class="ws-txn-icon dr"><i class="fa fa-arrow-up"></i></div>
            <div class="ws-txn-desc">#ORD-1021 · 27 Apr</div>
            <div class="ws-txn-amt dr">-₹1,299</div>
          </div>
          <div class="ws-txn">
            <div class="ws-txn-icon cr"><i class="fa fa-gift"></i></div>
            <div class="ws-txn-desc">Cashback · 25 Apr</div>
            <div class="ws-txn-amt cr">+₹120</div>
          </div>
          <div class="ws-txn">
            <div class="ws-txn-icon cr"><i class="fa fa-rotate-left"></i></div>
            <div class="ws-txn-desc">Refund #1018 · 19 Apr</div>
            <div class="ws-txn-amt cr">+₹1,100</div>
          </div>
        </div>
      </div>
    </div>

    <!-- Reward Points -->
    <div class="s-card">
      <div class="s-head">
        <h3><i class="fa fa-star" style="color:var(--accent);margin-right:8px;font-size:13px;"></i>Reward Points</h3>
        <a href="rewards.php" class="s-link">History →</a>
      </div>
      <div class="reward-wrap">
        <div class="reward-circle-wrap">
          <div class="reward-circle">
            <div class="rc-inner">
              <div class="rc-val">320</div>
              <div class="rc-label">Points</div>
            </div>
          </div>
        </div>
        <div class="reward-tiers">
          <div class="tier-row">
            <div class="tier-name">Bronze</div>
            <div class="tier-bar-wrap">
              <div class="tier-bar" style="width:100%"></div>
            </div>
            <div class="tier-pts">100 ✓</div>
          </div>
          <div class="tier-row">
            <div class="tier-name">Silver</div>
            <div class="tier-bar-wrap">
              <div class="tier-bar" style="width:100%"></div>
            </div>
            <div class="tier-pts">250 ✓</div>
          </div>
          <div class="tier-row">
            <div class="tier-name">Gold</div>
            <div class="tier-bar-wrap">
              <div class="tier-bar" style="width:64%"></div>
            </div>
            <div class="tier-pts">320/500</div>
          </div>
          <div class="tier-row">
            <div class="tier-name">Platinum</div>
            <div class="tier-bar-wrap">
              <div class="tier-bar" style="width:32%"></div>
            </div>
            <div class="tier-pts">320/1000</div>
          </div>
        </div>
      </div>
    </div>

    <!-- Top Brands -->
    <div class="s-card">
      <div class="s-head">
        <h3><i class="fa fa-crown" style="color:var(--accent);margin-right:8px;font-size:13px;"></i>Top Brands</h3>
        <a href="brands.php" class="s-link">All Brands →</a>
      </div>
      <div class="brand-row">
        <div class="brand-rank">01</div>
        <div class="brand-logo">N</div>
        <div class="brand-meta">
          <h4>Nike</h4>
          <p>12 active offers</p>
        </div>
        <div class="brand-bar-col">
          <div class="brand-mini-bar">
            <div style="width:90%"></div>
          </div>
          <div class="brand-pct">90%</div>
        </div>
      </div>
      <div class="brand-row">
        <div class="brand-rank">02</div>
        <div class="brand-logo">A</div>
        <div class="brand-meta">
          <h4>Adidas</h4>
          <p>9 active offers</p>
        </div>
        <div class="brand-bar-col">
          <div class="brand-mini-bar">
            <div style="width:74%"></div>
          </div>
          <div class="brand-pct">74%</div>
        </div>
      </div>
      <div class="brand-row">
        <div class="brand-rank">03</div>
        <div class="brand-logo">P</div>
        <div class="brand-meta">
          <h4>Puma</h4>
          <p>7 active offers</p>
        </div>
        <div class="brand-bar-col">
          <div class="brand-mini-bar">
            <div style="width:60%"></div>
          </div>
          <div class="brand-pct">60%</div>
        </div>
      </div>
      <div class="brand-row">
        <div class="brand-rank">04</div>
        <div class="brand-logo">R</div>
        <div class="brand-meta">
          <h4>Reebok</h4>
          <p>5 active offers</p>
        </div>
        <div class="brand-bar-col">
          <div class="brand-mini-bar">
            <div style="width:44%"></div>
          </div>
          <div class="brand-pct">44%</div>
        </div>
      </div>
      <div class="brand-row">
        <div class="brand-rank">05</div>
        <div class="brand-logo">L</div>
        <div class="brand-meta">
          <h4>Levis</h4>
          <p>4 active offers</p>
        </div>
        <div class="brand-bar-col">
          <div class="brand-mini-bar">
            <div style="width:35%"></div>
          </div>
          <div class="brand-pct">35%</div>
        </div>
      </div>
    </div>

  </div>

  <!-- ⑤ Promo Referral Banner -->
  <div class="promo-banner fade-up d5">
    <div class="promo-left">
      <h3>🎁 Special Referral Offer — Invite Friends & Earn ₹200!</h3>
      <p>Share your code with friends. They get 10% off, you earn ₹200 wallet credit on each successful referral.</p>
    </div>
    <div class="promo-code" onclick="navigator.clipboard.writeText('MBPREF200');this.innerText='✓ Copied!';">MBPREF200</div>
  </div>

</div>

<?php include 'footer.php';
 ?>