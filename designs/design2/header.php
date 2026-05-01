<?php
// designs/design2/header.php
// Clean, Elegant Multi-Brand Header
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?= htmlspecialchars($pageTitle ?? 'BrandLux') ?></title>

    <!-- Google Fonts: Elegant Serif for Brand, Clean Sans for Links -->
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@600&family=Inter:wght@400;500;600&display=swap" rel="stylesheet" />

    <style>
        :root {
            --bg-color: #f5f5f5; /* Whitesmoke */
            --accent: #1a1a1a;    /* Deep Black/Ink */
            --glass: rgba(255, 255, 255, 0.8);
        }

        body {
            margin: 0;
            padding: 0;
            background-color: var(--bg-color);
            font-family: 'Inter', sans-serif;
            color: var(--accent);
        }

        /* Fixed Navigation */
        .nav {
            position: fixed;
            top: 0;
            width: 100%;
            height: 70px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 5%;
            background: var(--glass);
            backdrop-filter: blur(10px); /* Modern Glassmorphism */
            box-sizing: border-box;
            z-index: 1000;
            border-bottom: 1px solid rgba(0,0,0,0.05);
        }

        .nav-brand {
            text-decoration: none;
            color: var(--accent);
            font-family: 'Cormorant Garamond', serif;
            font-size: 1.8rem;
            letter-spacing: 1px;
            display: flex;
            flex-direction: column;
            line-height: 1;
        }

        .nav-brand span {
            font-size: 0.65rem;
            text-transform: uppercase;
            font-family: 'Inter', sans-serif;
            letter-spacing: 2px;
            margin-top: 4px;
            opacity: 0.7;
        }

        .nav-links {
            list-style: none;
            display: flex;
            align-items: center;
            gap: 30px;
            margin: 0;
            padding: 0;
        }

        .nav-links a {
            text-decoration: none;
            color: var(--accent);
            font-size: 0.9rem;
            font-weight: 500;
            transition: 0.3s;
        }

        .nav-links a:hover {
            opacity: 0.6;
        }

        /* Simplified Buttons */
        .btn-auth {
            padding: 10px 24px;
            border-radius: 50px;
            font-size: 0.85rem;
            font-weight: 600;
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .btn-signin {
            color: var(--accent);
        }

        .btn-signup {
            background: var(--accent);
            color: #fff !important;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
        }

        .btn-signup:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 15px rgba(0,0,0,0.15);
            opacity: 1 !important;
        }

        .content-spacer {
            height: 90px;
        }
    </style>
</head>
<body>

    <nav class="nav">
        <a href="index.php" class="nav-brand">
            BrandLux
            <span>Multi Brand Promotion</span>
        </a>

        <ul class="nav-links">
            <li><a href="home.php">Home</a></li>
            <li><a href="about.php">About</a></li>
            <li><a href="login.php" class="btn-auth btn-signin">Sign In</a></li>
            <li><a href="signup.php" class="btn-auth btn-signup">Get Started</a></li>
        </ul>
    </nav>

    <div class="content-spacer"></div>
    
    <!-- Content starts here -->