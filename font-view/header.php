<?php
session_start();
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>MultiBrand Pramotion</title>
  <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=DM+Sans:wght@300;400;500;600&display=swap" rel="stylesheet"/>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"/>
  <style>
    *, *::before, *::after { margin: 0; padding: 0; box-sizing: border-box; }

    :root {
      --bg:        #0d0d0d;
      --surface:   #161616;
      --border:    #2a2a2a;
      --accent:    #f0a500;
      --accent2:   #ff5e1a;
      --text:      #e8e8e8;
      --muted:     #888;
      --header-h:  68px;
    }

    body {
      background: var(--bg);
      color: var(--text);
      font-family: 'DM Sans', sans-serif;
      min-height: 100vh;
    }

    /* ── HEADER ── */
    header {
      position: sticky;
      top: 0;
      z-index: 1000;
      height: var(--header-h);
      background: rgba(13,13,13,0.92);
      backdrop-filter: blur(14px);
      border-bottom: 1px solid var(--border);
      display: flex;
      align-items: center;
      padding: 0 32px;
      gap: 40px;
    }

    /* Logo */
    .logo {
      display: flex;
      align-items: center;
      gap: 10px;
      text-decoration: none;
      flex-shrink: 0;
    }
    .logo-icon {
      width: 38px; height: 38px;
      background: linear-gradient(135deg, var(--accent), var(--accent2));
      border-radius: 10px;
      display: flex; align-items: center; justify-content: center;
      font-size: 18px; color: #000; font-weight: 900;
    }
    .logo-text {
      font-family: 'Bebas Neue', sans-serif;
      font-size: 22px;
      letter-spacing: 1.5px;
      color: var(--text);
      line-height: 1;
    }
    .logo-text span { color: var(--accent); }

    /* Nav */
    nav {
      display: flex;
      align-items: center;
      gap: 4px;
      flex: 1;
    }
    nav a {
      text-decoration: none;
      color: var(--muted);
      font-size: 14px;
      font-weight: 500;
      padding: 7px 14px;
      border-radius: 8px;
      transition: color .2s, background .2s;
      white-space: nowrap;
    }
    nav a:hover, nav a.active {
      color: var(--text);
      background: var(--border);
    }
    nav a.active { color: var(--accent); }

    /* Right side */
    .header-right {
      display: flex;
      align-items: center;
      gap: 16px;
      margin-left: auto;
    }

    .notif-btn {
      position: relative;
      background: var(--surface);
      border: 1px solid var(--border);
      color: var(--muted);
      width: 38px; height: 38px;
      border-radius: 10px;
      display: flex; align-items: center; justify-content: center;
      cursor: pointer;
      transition: color .2s, border-color .2s;
    }
    .notif-btn:hover { color: var(--text); border-color: var(--accent); }
    .notif-dot {
      position: absolute;
      top: 8px; right: 8px;
      width: 7px; height: 7px;
      background: var(--accent);
      border-radius: 50%;
      border: 2px solid var(--bg);
    }

    /* Profile dropdown */
    .profile-wrap { position: relative; }
    .profile-btn {
      display: flex; align-items: center; gap: 10px;
      background: var(--surface);
      border: 1px solid var(--border);
      border-radius: 12px;
      padding: 6px 12px 6px 6px;
      cursor: pointer;
      transition: border-color .2s;
    }
    .profile-btn:hover { border-color: var(--accent); }
    .avatar {
      width: 30px; height: 30px;
      border-radius: 8px;
      background: linear-gradient(135deg, var(--accent), var(--accent2));
      display: flex; align-items: center; justify-content: center;
      font-size: 13px; font-weight: 700; color: #000;
    }
    .profile-name {
      font-size: 13px; font-weight: 500; color: var(--text);
    }
    .profile-btn i { font-size: 11px; color: var(--muted); }

    /* Dropdown menu */
    .dropdown {
      display: none;
      position: absolute;
      top: calc(100% + 10px);
      right: 0;
      min-width: 180px;
      background: var(--surface);
      border: 1px solid var(--border);
      border-radius: 12px;
      padding: 8px;
      box-shadow: 0 16px 40px rgba(0,0,0,.6);
    }
    .profile-wrap:hover .dropdown { display: block; }
    .dropdown a {
      display: flex; align-items: center; gap: 10px;
      text-decoration: none;
      color: var(--muted);
      font-size: 13px;
      padding: 9px 12px;
      border-radius: 8px;
      transition: background .15s, color .15s;
    }
    .dropdown a:hover { background: var(--border); color: var(--text); }
    .dropdown a.logout { color: #ff5e5e; }
    .dropdown a.logout:hover { background: rgba(255,94,94,.1); }
    .dropdown hr { border: none; border-top: 1px solid var(--border); margin: 6px 0; }

    /* Mobile hamburger */
    .hamburger {
      display: none;
      background: none; border: none;
      color: var(--text); font-size: 20px; cursor: pointer;
    }

    @media (max-width: 768px) {
      header { padding: 0 18px; gap: 16px; }
      nav { display: none; }
      .hamburger { display: block; }
      .profile-name { display: none; }
    }
  </style>
</head>
<body>

<header>

  <!-- Logo -->
  <a href="dashboard.php" class="logo">
    <div class="logo-icon">M</div>
    <div class="logo-text">Multi<span>Brand</span></div>
  </a>

  <!-- Nav Menu -->
  <nav>
    <a href="dashboard.php" class="active"><i class="fa fa-house" style="margin-right:6px;font-size:12px;"></i>Dashboard</a>
    <a href="brands.php"><i class="fa fa-tags" style="margin-right:6px;font-size:12px;"></i>Brands</a>
    <a href="offers.php"><i class="fa fa-percent" style="margin-right:6px;font-size:12px;"></i>Offers</a>
    <a href="orders.php"><i class="fa fa-box" style="margin-right:6px;font-size:12px;"></i>Orders</a>
    <a href="wallet.php"><i class="fa fa-wallet" style="margin-right:6px;font-size:12px;"></i>Wallet</a>
  </nav>

  <!-- Right Side -->
  <div class="header-right">

    <!-- Notification Bell -->
    <button class="notif-btn">
      <i class="fa fa-bell"></i>
      <span class="notif-dot"></span>
    </button>

    <!-- Profile Dropdown -->
    <div class="profile-wrap">
      <div class="profile-btn">
        <div class="avatar">
          <?php echo isset($_SESSION['user_name']) ? strtoupper(substr($_SESSION['user_name'], 0, 1)) : 'U'; ?>
        </div>
        <span class="profile-name">
          <?php echo isset($_SESSION['user_name']) ? htmlspecialchars($_SESSION['user_name']) : 'My Account'; ?>
        </span>
        <i class="fa fa-chevron-down"></i>
      </div>
      <div class="dropdown">
        <a href="profile.php"><i class="fa fa-user"></i> My Profile</a>
        <a href="settings.php"><i class="fa fa-gear"></i> Settings</a>
        <a href="wallet.php"><i class="fa fa-wallet"></i> Wallet</a>
        <hr>
        <a href="logout.php" class="logout"><i class="fa fa-right-from-bracket"></i> Logout</a>
      </div>
    </div>

    <!-- Hamburger (mobile) -->
    <button class="hamburger"><i class="fa fa-bars"></i></button>

  </div>

</header>