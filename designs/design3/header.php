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