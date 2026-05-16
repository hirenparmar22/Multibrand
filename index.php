<?php
// session_start();
include __DIR__ . '/config.php';

/* LOGIN CHECK */
$isLoggedIn = isset($_SESSION['user_id']);

/* GET ACTIVE DESIGN */
$res = mysqli_query($conn, "SELECT active_design FROM settings WHERE id=1");
$data = mysqli_fetch_assoc($res);

$design = $data['active_design'] ?? 'design1';

/* CSRF */
if (empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}
$csrf = $_SESSION['csrf_token'];

// $user_name = htmlspecialchars($_SESSION['user_name'] ?? 'User', ENT_QUOTES, 'UTF-8');
// $user_id   = (int) ($_SESSION['user_id'] ?? 0);


// $total_orders = 24;


// $wallet = 1840;

// $active_offers = 8;

// $recent_orders = [
//     ['id' => 'ORD-1021', 'brand' => 'Nike',   'amount' => 1299, 'status' => 'delivered'],
//     ['id' => 'ORD-1020', 'brand' => 'Adidas',  'amount' =>  849, 'status' => 'pending'],
//     ['id' => 'ORD-1019', 'brand' => 'Puma',    'amount' =>  599, 'status' => 'delivered'],
//     ['id' => 'ORD-1018', 'brand' => 'Reebok',  'amount' => 1100, 'status' => 'cancelled'],
// ];

// $offers = [
//     ['initial' => 'N', 'title' => 'Nike Summer Sale',  'expiry' => '2026-05-31', 'discount' => 30],
//     ['initial' => 'A', 'title' => 'Adidas Flash Deal',  'expiry' => '2026-06-05', 'discount' => 20],
//     ['initial' => 'P', 'title' => 'Puma Mega Offer',    'expiry' => '2026-05-15', 'discount' => 15],
//     ['initial' => 'R', 'title' => 'Reebok Weekend',     'expiry' => '2026-06-10', 'discount' => 25],
// ];

// ─── CSRF Token ───────────────────────────────────────────────────────────────
//  if (empty($_SESSION['csrf_token'])) {
//     $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
// }
// $csrf = $_SESSION['csrf_token'];

// include 'includes/header.php';

// include "designs/$design/content.php";

// include 'includes/footer.php';
// exit;
// 
?>




<?php include 'includes/header.php'; ?>

<?php if (!$isLoggedIn): ?>


<?php else: ?>

    <?php
    $allowed_designs = [
        'design1',
        'design2',
        'design3',
        'design4',
        'design5',
        'design6'
    ];

    if (!in_array($design, $allowed_designs)) {
        $design = 'design1';
    }

    include __DIR__ . "/designs/$design/content.php";

    include 'includes/footer.php';

    exit; // STOP PAGE HERE
    ?>

<?php endif; ?>




<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>MultiBrand Promotion – Content</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@300;400;500;600;700&family=Playfair+Display:wght@700;800;900&display=swap" rel="stylesheet" />

    <style>
        :root {
            --pink: #f7b2cb;
            --peach: #ffd4b2;
            --lavender: #c8b6e2;
            --mint: #b2e8d8;
            --sky: #b2d8f7;
            --rose: #e91e8c;
            --violet: #9c27b0;
            --indigo: #3f51b5;
            --text: #2d2d3f;
            --muted: #7a7a9d;
            --white: #ffffff;
            --card-bg: rgba(255, 255, 255, .65);
            --glass: rgba(255, 255, 255, .45);
        }

        *,
        *::before,
        *::after {
            box-sizing: border-box;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            font-family: 'DM Sans', sans-serif;
            color: var(--text);
            overflow-x: hidden;
            background: linear-gradient(135deg, #fce4ec 0%, #e8f4fd 50%, #f3e5f5 100%);
        }

        /* ── UTILITIES ────────────────────────────────── */
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
            margin-bottom: .9rem;
        }

        .section-title {
            font-family: 'Playfair Display', serif;
            font-size: clamp(1.8rem, 4vw, 2.9rem);
            font-weight: 800;
            line-height: 1.15;
            color: var(--text);
        }

        .gradient-text {
            background: linear-gradient(135deg, #e91e8c 0%, #9c27b0 55%, #3f51b5 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        /* ── FLOATING BLOBS ──────────────────────────── */
        .blob {
            position: absolute;
            border-radius: 50%;
            filter: blur(60px);
            opacity: .45;
            pointer-events: none;
            animation: blobFloat 8s ease-in-out infinite;
        }

        .blob-1 {
            width: 400px;
            height: 400px;
            background: radial-gradient(circle, #f7b2cb, transparent 70%);
            top: -80px;
            left: -100px;
            animation-delay: 0s;
        }

        .blob-2 {
            width: 350px;
            height: 350px;
            background: radial-gradient(circle, #c8b6e2, transparent 70%);
            top: 100px;
            right: -80px;
            animation-delay: 2s;
        }

        .blob-3 {
            width: 300px;
            height: 300px;
            background: radial-gradient(circle, #b2d8f7, transparent 70%);
            bottom: 0;
            left: 30%;
            animation-delay: 4s;
        }

        @keyframes blobFloat {

            0%,
            100% {
                transform: translateY(0) scale(1);
            }

            50% {
                transform: translateY(-28px) scale(1.04);
            }
        }

        /* ── FADE-IN ON SCROLL ───────────────────────── */
        .fade-up {
            opacity: 0;
            transform: translateY(36px);
            transition: opacity .65s ease, transform .65s ease;
        }

        .fade-up.visible {
            opacity: 1;
            transform: translateY(0);
        }

 
        #hero {
            min-height: 100vh;
            display: flex;
            align-items: center;
            position: relative;
            overflow: hidden;
            padding: 60px 0 40px;
        }

        .hero-heading {
            font-family: 'Playfair Display', serif;
            font-size: clamp(2.2rem, 6vw, 4.2rem);
            font-weight: 900;
            line-height: 1.1;
            margin-bottom: 1.2rem;
        }

        .hero-sub {
            font-size: 1.08rem;
            color: var(--muted);
            line-height: 1.7;
            max-width: 480px;
            margin-bottom: 2rem;
        }

        .btn-primary-glow {
            background: linear-gradient(135deg, #e91e8c, #9c27b0);
            color: #fff;
            border: none;
            padding: .75rem 1.9rem;
            border-radius: 12px;
            font-weight: 600;
            font-size: .95rem;
            box-shadow: 0 6px 22px rgba(233, 30, 140, .38);
            transition: all .28s ease;
            cursor: pointer;
            text-decoration: none;
            display: inline-block;
        }

        .btn-primary-glow:hover {
            transform: translateY(-3px);
            box-shadow: 0 12px 32px rgba(233, 30, 140, .52);
            color: #fff;
        }

        .btn-outline-soft {
            background: rgba(255, 255, 255, .7);
            color: var(--text);
            border: 2px solid rgba(233, 30, 140, .25);
            padding: .73rem 1.8rem;
            border-radius: 12px;
            font-weight: 600;
            font-size: .95rem;
            backdrop-filter: blur(8px);
            transition: all .28s ease;
            cursor: pointer;
            text-decoration: none;
            display: inline-block;
        }

        .btn-outline-soft:hover {
            border-color: var(--rose);
            color: var(--rose);
            transform: translateY(-3px);
            background: rgba(255, 255, 255, .9);
        }

        /* Hero mockup card */
        .hero-card-wrap {
            position: relative;
            perspective: 900px;
        }

        .hero-mock {
            background: rgba(255, 255, 255, .6);
            backdrop-filter: blur(24px);
            border: 1px solid rgba(255, 255, 255, .75);
            border-radius: 28px;
            padding: 2rem;
            box-shadow: 0 24px 60px rgba(150, 80, 180, .18), 0 0 0 1px rgba(255, 255, 255, .4) inset;
            animation: heroFloat 6s ease-in-out infinite;
        }

        @keyframes heroFloat {

            0%,
            100% {
                transform: translateY(0) rotateY(-4deg);
            }

            50% {
                transform: translateY(-14px) rotateY(4deg);
            }
        }

        .mock-bar {
            display: flex;
            gap: .4rem;
            margin-bottom: 1.2rem;
        }

        .mock-dot {
            width: 10px;
            height: 10px;
            border-radius: 50%;
        }

        .mock-dot:nth-child(1) {
            background: #ff6b6b;
        }

        .mock-dot:nth-child(2) {
            background: #ffd166;
        }

        .mock-dot:nth-child(3) {
            background: #6bcb77;
        }

        .mock-stat-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: .75rem;
            margin-bottom: 1rem;
        }

        .mock-stat {
            background: linear-gradient(135deg, rgba(233, 30, 140, .08), rgba(156, 39, 176, .06));
            border-radius: 14px;
            padding: .9rem 1rem;
            border: 1px solid rgba(233, 30, 140, .12);
        }

        .mock-stat-val {
            font-family: 'Playfair Display', serif;
            font-size: 1.4rem;
            font-weight: 800;
            color: var(--rose);
        }

        .mock-stat-lbl {
            font-size: .72rem;
            color: var(--muted);
            font-weight: 500;
        }

        .mock-brand-row {
            display: flex;
            gap: .5rem;
            flex-wrap: wrap;
        }

        .mock-brand-chip {
            background: linear-gradient(135deg, #fce4ec, #f3e5f5);
            border-radius: 99px;
            padding: .3rem .85rem;
            font-size: .72rem;
            font-weight: 600;
            color: var(--violet);
            border: 1px solid rgba(156, 39, 176, .2);
        }

        /* floating circles */
        .float-circle {
            position: absolute;
            border-radius: 50%;
            animation: floatCirc 5s ease-in-out infinite;
        }

        .fc1 {
            width: 60px;
            height: 60px;
            background: linear-gradient(135deg, #ffd4b2, #f7b2cb);
            top: 10%;
            right: 5%;
            opacity: .7;
        }

        .fc2 {
            width: 40px;
            height: 40px;
            background: linear-gradient(135deg, #b2d8f7, #c8b6e2);
            bottom: 20%;
            left: 5%;
            opacity: .6;
            animation-delay: 1.5s;
        }

        .fc3 {
            width: 25px;
            height: 25px;
            background: linear-gradient(135deg, #b2e8d8, #b2d8f7);
            top: 55%;
            right: 2%;
            opacity: .55;
            animation-delay: 3s;
        }

        @keyframes floatCirc {

            0%,
            100% {
                transform: translateY(0) rotate(0deg);
            }

            50% {
                transform: translateY(-20px) rotate(180deg);
            }
        }

        /* ════════════════════════════════════════════════
       2. FEATURES
    ════════════════════════════════════════════════ */
        #features {
            padding: 90px 0;
            position: relative;
        }

        .feature-card {
            background: var(--glass);
            backdrop-filter: blur(18px);
            -webkit-backdrop-filter: blur(18px);
            border: 1px solid rgba(255, 255, 255, .65);
            border-radius: 22px;
            padding: 2.2rem 1.8rem;
            text-align: center;
            box-shadow: 0 8px 32px rgba(150, 80, 180, .1);
            transition: all .3s ease;
            height: 100%;
        }

        .feature-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 24px 55px rgba(150, 80, 180, .18);
            background: rgba(255, 255, 255, .78);
        }

        .feature-icon {
            width: 72px;
            height: 72px;
            border-radius: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.6rem;
            margin: 0 auto 1.3rem;
            transition: transform .3s ease;
        }

        .feature-card:hover .feature-icon {
            transform: scale(1.12) rotate(-5deg);
        }

        .fi-pink {
            background: linear-gradient(135deg, #fce4ec, #f8bbd0);
            color: #e91e8c;
        }

        .fi-peach {
            background: linear-gradient(135deg, #fff3e0, #ffe0b2);
            color: #f57c00;
        }

        .fi-lavender {
            background: linear-gradient(135deg, #f3e5f5, #e1bee7);
            color: #9c27b0;
        }

        .fi-mint {
            background: linear-gradient(135deg, #e8f5e9, #c8e6c9);
            color: #2e7d32;
        }

        .feature-card h5 {
            font-family: 'Playfair Display', serif;
            font-size: 1.15rem;
            font-weight: 700;
            margin-bottom: .5rem;
        }

        .feature-card p {
            font-size: .88rem;
            color: var(--muted);
            line-height: 1.65;
        }

        /* ════════════════════════════════════════════════
       3. TRENDING BRANDS
    ════════════════════════════════════════════════ */
        #brands {
            padding: 90px 0;
        }

        .brand-card {
            background: var(--card-bg);
            backdrop-filter: blur(16px);
            border: 1px solid rgba(255, 255, 255, .68);
            border-radius: 20px;
            padding: 1.8rem 1.4rem;
            text-align: center;
            box-shadow: 0 6px 24px rgba(150, 80, 180, .09);
            transition: all .3s ease;
            height: 100%;
        }

        .brand-card:hover {
            transform: translateY(-8px) scale(1.02);
            box-shadow: 0 20px 48px rgba(150, 80, 180, .18);
        }

        .brand-logo {
            width: 70px;
            height: 70px;
            border-radius: 18px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            font-weight: 900;
            margin: 0 auto 1rem;
            font-family: 'Playfair Display', serif;
            color: #fff;
        }

        .brand-card h6 {
            font-family: 'Playfair Display', serif;
            font-size: 1.05rem;
            font-weight: 700;
            margin-bottom: .35rem;
        }

        .brand-card p {
            font-size: .8rem;
            color: var(--muted);
            margin-bottom: 1rem;
        }

        .btn-view-offers {
            font-size: .8rem;
            font-weight: 600;
            padding: .4rem 1.1rem;
            border-radius: 8px;
            border: 1.5px solid rgba(233, 30, 140, .35);
            color: var(--rose);
            background: transparent;
            transition: all .25s ease;
            cursor: pointer;
        }

        .btn-view-offers:hover {
            background: linear-gradient(135deg, #e91e8c, #9c27b0);
            color: #fff;
            border-color: transparent;
            transform: translateY(-2px);
            box-shadow: 0 4px 14px rgba(233, 30, 140, .3);
        }

        /* brand gradients */
        .bg-nike {
            background: linear-gradient(135deg, #1a1a2e, #16213e);
        }

        .bg-adidas {
            background: linear-gradient(135deg, #2d2d44, #3d3d5c);
        }

        .bg-puma {
            background: linear-gradient(135deg, #c62828, #e53935);
        }

        .bg-apple {
            background: linear-gradient(135deg, #424242, #757575);
        }

        .bg-samsung {
            background: linear-gradient(135deg, #1565c0, #1976d2);
        }

        .bg-zara {
            background: linear-gradient(135deg, #2e7d32, #388e3c);
        }

        /* ════════════════════════════════════════════════
       4. OFFERS
    ════════════════════════════════════════════════ */
        #offers {
            padding: 90px 0;
        }

        .offer-card {
            border-radius: 22px;
            padding: 2rem 1.6rem;
            position: relative;
            overflow: hidden;
            box-shadow: 0 8px 30px rgba(0, 0, 0, .08);
            transition: all .3s ease;
            height: 100%;
        }

        .offer-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 24px 55px rgba(0, 0, 0, .14);
        }

        .offer-card::before {
            content: '';
            position: absolute;
            inset: 0;
            background: rgba(255, 255, 255, .15);
            opacity: 0;
            transition: .3s;
        }

        .offer-card:hover::before {
            opacity: 1;
        }

        .oc-1 {
            background: linear-gradient(135deg, #ff9a9e, #fad0c4);
        }

        .oc-2 {
            background: linear-gradient(135deg, #a18cd1, #fbc2eb);
        }

        .oc-3 {
            background: linear-gradient(135deg, #fccb90, #d57eeb);
        }

        .oc-4 {
            background: linear-gradient(135deg, #84fab0, #8fd3f4);
        }

        .offer-badge {
            display: inline-block;
            background: rgba(255, 255, 255, .35);
            backdrop-filter: blur(8px);
            border-radius: 99px;
            padding: .28rem .85rem;
            font-size: .7rem;
            font-weight: 700;
            letter-spacing: 1.5px;
            text-transform: uppercase;
            color: #fff;
            margin-bottom: 1rem;
            animation: badgePulse 2.5s ease-in-out infinite;
        }

        @keyframes badgePulse {

            0%,
            100% {
                transform: scale(1);
            }

            50% {
                transform: scale(1.06);
            }
        }

        .offer-card h3 {
            font-family: 'Playfair Display', serif;
            font-size: 2.4rem;
            font-weight: 900;
            color: #fff;
            line-height: 1;
            margin-bottom: .4rem;
            text-shadow: 0 2px 12px rgba(0, 0, 0, .15);
        }

        .offer-card p {
            color: rgba(255, 255, 255, .85);
            font-size: .88rem;
            margin-bottom: 1.3rem;
        }

        .btn-offer {
            background: rgba(255, 255, 255, .3);
            backdrop-filter: blur(8px);
            color: #fff;
            border: 1.5px solid rgba(255, 255, 255, .5);
            padding: .48rem 1.3rem;
            border-radius: 10px;
            font-weight: 600;
            font-size: .85rem;
            transition: all .25s ease;
            cursor: pointer;
        }

        .btn-offer:hover {
            background: rgba(255, 255, 255, .55);
            color: var(--text);
            transform: translateY(-2px);
        }

        /* ════════════════════════════════════════════════
       5. STATS
    ════════════════════════════════════════════════ */
        #stats {
            padding: 90px 0;
            background: linear-gradient(135deg, rgba(233, 30, 140, .07) 0%, rgba(156, 39, 176, .07) 50%, rgba(63, 81, 181, .07) 100%);
            position: relative;
        }

        .stat-card {
            text-align: center;
            padding: 2.2rem 1.5rem;
            border-radius: 22px;
            background: var(--glass);
            backdrop-filter: blur(18px);
            border: 1px solid rgba(255, 255, 255, .65);
            box-shadow: 0 8px 30px rgba(150, 80, 180, .1);
            transition: all .3s ease;
        }

        .stat-card:hover {
            transform: translateY(-6px);
            box-shadow: 0 20px 50px rgba(150, 80, 180, .18);
        }

        .stat-icon {
            font-size: 2rem;
            margin-bottom: .8rem;
        }

        .stat-num {
            font-family: 'Playfair Display', serif;
            font-size: 2.8rem;
            font-weight: 900;
            background: linear-gradient(135deg, #e91e8c, #9c27b0);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            line-height: 1;
        }

        .stat-lbl {
            font-size: .9rem;
            color: var(--muted);
            font-weight: 600;
            margin-top: .35rem;
        }

        /* ════════════════════════════════════════════════
       6. TESTIMONIALS
    ════════════════════════════════════════════════ */
        #testimonials {
            padding: 90px 0;
        }

        .testimonial-track {
            display: flex;
            gap: 1.5rem;
            overflow-x: auto;
            scroll-snap-type: x mandatory;
            -webkit-overflow-scrolling: touch;
            scrollbar-width: none;
            padding-bottom: .5rem;
        }

        .testimonial-track::-webkit-scrollbar {
            display: none;
        }

        .testi-card {
            flex: 0 0 310px;
            scroll-snap-align: start;
            background: var(--glass);
            backdrop-filter: blur(18px);
            border: 1px solid rgba(255, 255, 255, .65);
            border-radius: 22px;
            padding: 1.8rem;
            box-shadow: 0 8px 28px rgba(150, 80, 180, .1);
            transition: all .3s ease;
        }

        .testi-card:hover {
            transform: translateY(-6px);
            box-shadow: 0 20px 50px rgba(150, 80, 180, .18);
        }

        .testi-avatar {
            width: 52px;
            height: 52px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.2rem;
            font-weight: 800;
            color: #fff;
            margin-bottom: 1rem;
        }

        .testi-stars {
            color: #f59e0b;
            font-size: .85rem;
            margin-bottom: .7rem;
        }

        .testi-text {
            font-size: .87rem;
            color: var(--muted);
            line-height: 1.65;
            margin-bottom: 1rem;
        }

        .testi-name {
            font-weight: 700;
            font-size: .92rem;
        }

        .testi-role {
            font-size: .75rem;
            color: var(--muted);
        }

        .carousel-dots {
            display: flex;
            justify-content: center;
            gap: .5rem;
            margin-top: 1.5rem;
        }

        .c-dot {
            width: 8px;
            height: 8px;
            border-radius: 99px;
            background: rgba(233, 30, 140, .25);
            cursor: pointer;
            transition: all .3s ease;
        }

        .c-dot.active {
            background: var(--rose);
            width: 24px;
        }

        /* ════════════════════════════════════════════════
       7. NEWSLETTER
    ════════════════════════════════════════════════ */
        #newsletter {
            padding: 90px 0;
        }

        .newsletter-box {
            background: linear-gradient(135deg, rgba(233, 30, 140, .1) 0%, rgba(156, 39, 176, .1) 50%, rgba(63, 81, 181, .08) 100%);
            border: 1px solid rgba(255, 255, 255, .6);
            backdrop-filter: blur(20px);
            border-radius: 28px;
            padding: 4rem 3rem;
            text-align: center;
            position: relative;
            overflow: hidden;
            box-shadow: 0 20px 60px rgba(150, 80, 180, .12);
        }

        .newsletter-box::before {
            content: '';
            position: absolute;
            top: -80px;
            right: -80px;
            width: 250px;
            height: 250px;
            background: radial-gradient(circle, rgba(233, 30, 140, .15), transparent 70%);
            border-radius: 50%;
        }

        .newsletter-box::after {
            content: '';
            position: absolute;
            bottom: -60px;
            left: -60px;
            width: 200px;
            height: 200px;
            background: radial-gradient(circle, rgba(156, 39, 176, .12), transparent 70%);
            border-radius: 50%;
        }

        .newsletter-form {
            display: flex;
            max-width: 480px;
            margin: 1.8rem auto 0;
            gap: .6rem;
            position: relative;
            z-index: 1;
        }

        .newsletter-input {
            flex: 1;
            padding: .8rem 1.3rem;
            border-radius: 12px;
            border: 2px solid rgba(233, 30, 140, .2);
            background: rgba(255, 255, 255, .75);
            backdrop-filter: blur(8px);
            font-family: 'DM Sans', sans-serif;
            font-size: .9rem;
            color: var(--text);
            outline: none;
            transition: all .25s ease;
        }

        .newsletter-input:focus {
            border-color: var(--rose);
            box-shadow: 0 0 0 4px rgba(233, 30, 140, .1);
            background: rgba(255, 255, 255, .9);
        }

        .newsletter-btn {
            padding: .8rem 1.6rem;
            border-radius: 12px;
            background: linear-gradient(135deg, #e91e8c, #9c27b0);
            color: #fff;
            border: none;
            font-weight: 700;
            font-size: .9rem;
            cursor: pointer;
            box-shadow: 0 6px 20px rgba(233, 30, 140, .35);
            transition: all .25s ease;
            white-space: nowrap;
        }

        .newsletter-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 28px rgba(233, 30, 140, .5);
        }

        /* ── SECTION DIVIDER ─────────────────────────── */
        .section-divider {
            height: 1px;
            background: linear-gradient(90deg, transparent, rgba(233, 30, 140, .2), rgba(156, 39, 176, .2), transparent);
            margin: 0 auto;
            max-width: 700px;
        }

        /* ── RIPPLE BUTTON ───────────────────────────── */
        .ripple-btn {
            position: relative;
            overflow: hidden;
        }

        .ripple-btn .ripple {
            position: absolute;
            border-radius: 50%;
            background: rgba(255, 255, 255, .4);
            transform: scale(0);
            animation: rippleAnim .6s linear;
            pointer-events: none;
        }

        @keyframes rippleAnim {
            to {
                transform: scale(4);
                opacity: 0;
            }
        }
    </style>
</head>

<body>

   
    <section id="hero">
        <div class="blob blob-1"></div>
        <div class="blob blob-2"></div>
        <div class="blob blob-3"></div>

        <div class="float-circle fc1"></div>
        <div class="float-circle fc2"></div>
        <div class="float-circle fc3"></div>

        <div class="container">
            <div class="row align-items-center gy-5">

                <!-- Left -->
                <div class="col-lg-6 fade-up">
                    <span class="section-tag"><i class="fa-solid fa-bolt me-1"></i> #1 Brand Promotion Platform</span>
                    <h1 class="hero-heading">
                        Promote Every Brand
                        <span class="gradient-text">Smarter.</span>
                    </h1>
                    <p class="hero-sub">
                        Connect your brand with millions of potential customers through influencer campaigns, smart analytics, and powerful multi-brand promotion tools — all in one place.
                    </p>
                    <div class="d-flex flex-wrap gap-3">
                        <a href="#brands" class="btn-primary-glow ripple-btn">
                            <i class="fa-solid fa-rocket me-2"></i>Explore Brands
                        </a>
                        <a href="#features" class="btn-outline-soft">
                            <i class="fa-solid fa-play me-2"></i>Start Promotion
                        </a>
                    </div>

                    <!-- Trust badges -->
                    <div class="d-flex align-items-center gap-3 mt-4 flex-wrap">
                        <div class="d-flex align-items-center gap-1">
                            <i class="fa-solid fa-star text-warning" style="font-size:.8rem"></i>
                            <i class="fa-solid fa-star text-warning" style="font-size:.8rem"></i>
                            <i class="fa-solid fa-star text-warning" style="font-size:.8rem"></i>
                            <i class="fa-solid fa-star text-warning" style="font-size:.8rem"></i>
                            <i class="fa-solid fa-star text-warning" style="font-size:.8rem"></i>
                            <span style="font-size:.8rem;color:var(--muted);margin-left:.3rem">4.9 (2k+ reviews)</span>
                        </div>
                        <span style="color:rgba(0,0,0,.15)">|</span>
                        <span style="font-size:.8rem;color:var(--muted)"><i class="fa-solid fa-shield-halved me-1" style="color:var(--rose)"></i>Trusted by 500+ brands</span>
                    </div>
                </div>

                <!-- Right – Dashboard Mockup -->
                <div class="col-lg-6 fade-up" style="transition-delay:.2s">
                    <div class="hero-card-wrap">
                        <div class="hero-mock">
                            <div class="mock-bar">
                                <span class="mock-dot"></span><span class="mock-dot"></span><span class="mock-dot"></span>
                                <span style="font-size:.72rem;color:var(--muted);margin-left:.5rem;font-weight:600">Dashboard Preview</span>
                            </div>

                            <div class="mock-stat-row">
                                <div class="mock-stat">
                                    <div class="mock-stat-val">10K+</div>
                                    <div class="mock-stat-lbl">Active Users</div>
                                </div>
                                <div class="mock-stat">
                                    <div class="mock-stat-val">500+</div>
                                    <div class="mock-stat-lbl">Brands</div>
                                </div>
                                <div class="mock-stat">
                                    <div class="mock-stat-val">1M+</div>
                                    <div class="mock-stat-lbl">Promotions</div>
                                </div>
                                <div class="mock-stat">
                                    <div class="mock-stat-val">250+</div>
                                    <div class="mock-stat-lbl">Campaigns</div>
                                </div>
                            </div>

                            <!-- Mini chart -->
                            <div style="background:linear-gradient(135deg,rgba(233,30,140,.07),rgba(156,39,176,.05));border-radius:14px;padding:.9rem;margin-bottom:1rem;border:1px solid rgba(233,30,140,.1)">
                                <div style="font-size:.72rem;font-weight:700;color:var(--muted);margin-bottom:.6rem">Weekly Promotions</div>
                                <div style="display:flex;align-items:flex-end;gap:5px;height:48px">
                                    <div style="flex:1;background:linear-gradient(135deg,#e91e8c,#9c27b0);border-radius:4px 4px 0 0;height:40%;opacity:.6"></div>
                                    <div style="flex:1;background:linear-gradient(135deg,#e91e8c,#9c27b0);border-radius:4px 4px 0 0;height:65%"></div>
                                    <div style="flex:1;background:linear-gradient(135deg,#e91e8c,#9c27b0);border-radius:4px 4px 0 0;height:50%;opacity:.7"></div>
                                    <div style="flex:1;background:linear-gradient(135deg,#e91e8c,#9c27b0);border-radius:4px 4px 0 0;height:85%"></div>
                                    <div style="flex:1;background:linear-gradient(135deg,#e91e8c,#9c27b0);border-radius:4px 4px 0 0;height:70%;opacity:.8"></div>
                                    <div style="flex:1;background:linear-gradient(135deg,#e91e8c,#9c27b0);border-radius:4px 4px 0 0;height:95%"></div>
                                    <div style="flex:1;background:linear-gradient(135deg,#e91e8c,#9c27b0);border-radius:4px 4px 0 0;height:60%;opacity:.65"></div>
                                </div>
                            </div>

                            <div class="mock-brand-row">
                                <span class="mock-brand-chip">Nike</span>
                                <span class="mock-brand-chip">Apple</span>
                                <span class="mock-brand-chip">Puma</span>
                                <span class="mock-brand-chip">Zara</span>
                                <span class="mock-brand-chip">+496</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="section-divider my-2"></div>

    <!-- ═══════════════════════════════════════════════════════
     FEATURES
═══════════════════════════════════════════════════════ -->
    <section id="features">
        <div class="container">
            <div class="text-center mb-5 fade-up">
                <span class="section-tag">Why Choose Us</span>
                <h2 class="section-title">Everything You Need to <span class="gradient-text">Scale</span></h2>
                <p style="color:var(--muted);max-width:500px;margin:.8rem auto 0;font-size:.95rem">
                    Powerful tools designed to supercharge your brand growth and maximize promotional ROI.
                </p>
            </div>

            <div class="row g-4">
                <div class="col-sm-6 col-lg-3 fade-up">
                    <div class="feature-card">
                        <div class="feature-icon fi-pink"><i class="fa-solid fa-bullhorn"></i></div>
                        <h5>Brand Campaigns</h5>
                        <p>Launch multi-channel campaigns that reach your target audience with precision and creative impact.</p>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-3 fade-up" style="transition-delay:.1s">
                    <div class="feature-card">
                        <div class="feature-icon fi-peach"><i class="fa-solid fa-user-group"></i></div>
                        <h5>Influencer Marketing</h5>
                        <p>Connect with thousands of verified influencers and amplify your brand voice to millions.</p>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-3 fade-up" style="transition-delay:.2s">
                    <div class="feature-card">
                        <div class="feature-icon fi-lavender"><i class="fa-solid fa-chart-line"></i></div>
                        <h5>Smart Analytics</h5>
                        <p>Real-time data insights and performance dashboards to track every campaign metric in detail.</p>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-3 fade-up" style="transition-delay:.3s">
                    <div class="feature-card">
                        <div class="feature-icon fi-mint"><i class="fa-solid fa-tags"></i></div>
                        <h5>Product Promotions</h5>
                        <p>Showcase products with stunning creatives, flash deals, and automated discount engine.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="section-divider my-2"></div>

    <!-- ═══════════════════════════════════════════════════════
     TRENDING BRANDS
═══════════════════════════════════════════════════════ -->
    <section id="brands">
        <div class="container">
            <div class="text-center mb-5 fade-up">
                <span class="section-tag">Trending Now</span>
                <h2 class="section-title">Top <span class="gradient-text">Brands</span> On Platform</h2>
                <p style="color:var(--muted);max-width:480px;margin:.8rem auto 0;font-size:.95rem">
                    Explore the world's most loved brands — discover exclusive deals and campaigns.
                </p>
            </div>

            <div class="row g-4">
                <!-- Nike -->
                <div class="col-6 col-md-4 col-lg-2 fade-up">
                    <div class="brand-card">
                        <div class="brand-logo bg-nike"><i class="fa-brands fa-nike"></i></div>
                        <h6>Nike</h6>
                        <p>Just Do It. World's #1 athletic brand.</p>
                        <button class="btn-view-offers">View Offers</button>
                    </div>
                </div>
                <!-- Adidas -->
                <div class="col-6 col-md-4 col-lg-2 fade-up" style="transition-delay:.07s">
                    <div class="brand-card">
                        <div class="brand-logo bg-adidas" style="font-size:.85rem">ADI</div>
                        <h6>Adidas</h6>
                        <p>Impossible is nothing. Sports & lifestyle.</p>
                        <button class="btn-view-offers">View Offers</button>
                    </div>
                </div>
                <!-- Puma -->
                <div class="col-6 col-md-4 col-lg-2 fade-up" style="transition-delay:.14s">
                    <div class="brand-card">
                        <div class="brand-logo bg-puma"><i class="fa-solid fa-paw"></i></div>
                        <h6>Puma</h6>
                        <p>Forever Faster. Bold sports fashion.</p>
                        <button class="btn-view-offers">View Offers</button>
                    </div>
                </div>
                <!-- Apple -->
                <div class="col-6 col-md-4 col-lg-2 fade-up" style="transition-delay:.21s">
                    <div class="brand-card">
                        <div class="brand-logo bg-apple"><i class="fa-brands fa-apple"></i></div>
                        <h6>Apple</h6>
                        <p>Think Different. Innovation redefined.</p>
                        <button class="btn-view-offers">View Offers</button>
                    </div>
                </div>
                <!-- Samsung -->
                <div class="col-6 col-md-4 col-lg-2 fade-up" style="transition-delay:.28s">
                    <div class="brand-card">
                        <div class="brand-logo bg-samsung" style="font-size:.8rem">SAM</div>
                        <h6>Samsung</h6>
                        <p>Do What You Can't. Tech excellence.</p>
                        <button class="btn-view-offers">View Offers</button>
                    </div>
                </div>
                <!-- Zara -->
                <div class="col-6 col-md-4 col-lg-2 fade-up" style="transition-delay:.35s">
                    <div class="brand-card">
                        <div class="brand-logo bg-zara" style="font-size:.85rem">Z</div>
                        <h6>Zara</h6>
                        <p>Fashion forward. Latest global trends.</p>
                        <button class="btn-view-offers">View Offers</button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="section-divider my-2"></div>

    <!-- ═══════════════════════════════════════════════════════
     OFFERS
═══════════════════════════════════════════════════════ -->
    <section id="offers" style="padding:90px 0">
        <div class="container">
            <div class="text-center mb-5 fade-up">
                <span class="section-tag">Hot Deals</span>
                <h2 class="section-title">Exclusive <span class="gradient-text">Offers</span> & Campaigns</h2>
                <p style="color:var(--muted);max-width:460px;margin:.8rem auto 0;font-size:.95rem">
                    Grab the hottest deals before they expire. Limited time promotions curated just for you.
                </p>
            </div>

            <div class="row g-4">
                <div class="col-sm-6 col-lg-3 fade-up">
                    <div class="offer-card oc-1">
                        <span class="offer-badge">🔥 Hot Deal</span>
                        <h3>50%<br>OFF</h3>
                        <p>On selected Nike & Adidas collections. Limited stock!</p>
                        <button class="btn-offer ripple-btn">Grab Now</button>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-3 fade-up" style="transition-delay:.1s">
                    <div class="offer-card oc-2">
                        <span class="offer-badge">☀️ Season Sale</span>
                        <h3>Summer<br>Sale</h3>
                        <p>Up to 40% off on summer fashion from top brands.</p>
                        <button class="btn-offer ripple-btn">Shop Now</button>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-3 fade-up" style="transition-delay:.2s">
                    <div class="offer-card oc-3">
                        <span class="offer-badge">⚡ Flash Deal</span>
                        <h3>Flash<br>Deals</h3>
                        <p>Hourly deals on electronics, fashion & more. Act fast!</p>
                        <button class="btn-offer ripple-btn">View Deals</button>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-3 fade-up" style="transition-delay:.3s">
                    <div class="offer-card oc-4">
                        <span class="offer-badge">📈 Trending</span>
                        <h3>Top<br>Campaigns</h3>
                        <p>Join the most successful brand campaigns right now.</p>
                        <button class="btn-offer ripple-btn">Explore</button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="section-divider my-2"></div>

    <!-- ═══════════════════════════════════════════════════════
     STATS
═══════════════════════════════════════════════════════ -->
    <section id="stats">
        <div class="container">
            <div class="text-center mb-5 fade-up">
                <span class="section-tag">Our Impact</span>
                <h2 class="section-title">Numbers That <span class="gradient-text">Speak</span></h2>
            </div>

            <div class="row g-4">
                <div class="col-6 col-lg-3 fade-up">
                    <div class="stat-card">
                        <div class="stat-icon">👥</div>
                        <div class="stat-num" data-target="10000" data-suffix="K+">0</div>
                        <div class="stat-lbl">Active Users</div>
                    </div>
                </div>
                <div class="col-6 col-lg-3 fade-up" style="transition-delay:.1s">
                    <div class="stat-card">
                        <div class="stat-icon">🏷️</div>
                        <div class="stat-num" data-target="500" data-suffix="+">0</div>
                        <div class="stat-lbl">Partner Brands</div>
                    </div>
                </div>
                <div class="col-6 col-lg-3 fade-up" style="transition-delay:.2s">
                    <div class="stat-card">
                        <div class="stat-icon">📣</div>
                        <div class="stat-num" data-target="1000" data-suffix="K+">0</div>
                        <div class="stat-lbl">Promotions Sent</div>
                    </div>
                </div>
                <div class="col-6 col-lg-3 fade-up" style="transition-delay:.3s">
                    <div class="stat-card">
                        <div class="stat-icon">🎯</div>
                        <div class="stat-num" data-target="250" data-suffix="+">0</div>
                        <div class="stat-lbl">Campaigns Launched</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="section-divider my-2"></div>

    <!-- ═══════════════════════════════════════════════════════
     TESTIMONIALS
═══════════════════════════════════════════════════════ -->
    <section id="testimonials" style="padding:90px 0">
        <div class="container">
            <div class="text-center mb-5 fade-up">
                <span class="section-tag">Happy Clients</span>
                <h2 class="section-title">What Our <span class="gradient-text">Users</span> Say</h2>
            </div>

            <div class="testimonial-track fade-up" id="testiTrack">
                <!-- Card 1 -->
                <div class="testi-card">
                    <div class="testi-avatar" style="background:linear-gradient(135deg,#e91e8c,#9c27b0)">SA</div>
                    <div class="testi-stars">★★★★★</div>
                    <p class="testi-text">"MultiBrand completely transformed how we run promotions. Our reach tripled in just 2 months. The analytics dashboard is incredibly powerful!"</p>
                    <div class="testi-name">Sarah A.</div>
                    <div class="testi-role">Marketing Head, TechCorp</div>
                </div>
                <!-- Card 2 -->
                <div class="testi-card">
                    <div class="testi-avatar" style="background:linear-gradient(135deg,#f57c00,#fbc02d)">MK</div>
                    <div class="testi-stars">★★★★★</div>
                    <p class="testi-text">"The influencer marketing tools are next level. We connected with 50+ influencers within a week. ROI was 4x our investment!"</p>
                    <div class="testi-name">Mark K.</div>
                    <div class="testi-role">Brand Manager, FashionHub</div>
                </div>
                <!-- Card 3 -->
                <div class="testi-card">
                    <div class="testi-avatar" style="background:linear-gradient(135deg,#1565c0,#42a5f5)">RJ</div>
                    <div class="testi-stars">★★★★★</div>
                    <p class="testi-text">"Onboarding was seamless. Within 24 hours we had our first campaign live. The glassmorphic UI feels premium and the results speak for themselves."</p>
                    <div class="testi-name">Raj J.</div>
                    <div class="testi-role">CEO, StartUp India</div>
                </div>
                <!-- Card 4 -->
                <div class="testi-card">
                    <div class="testi-avatar" style="background:linear-gradient(135deg,#2e7d32,#66bb6a)">LP</div>
                    <div class="testi-stars">★★★★★</div>
                    <p class="testi-text">"Flash deals feature is a game changer. Our e-commerce conversion rate went up by 38% after running the first campaign. Highly recommend!"</p>
                    <div class="testi-name">Lara P.</div>
                    <div class="testi-role">E-commerce Director, ShopNow</div>
                </div>
                <!-- Card 5 -->
                <div class="testi-card">
                    <div class="testi-avatar" style="background:linear-gradient(135deg,#c62828,#ef5350)">DM</div>
                    <div class="testi-stars">★★★★★</div>
                    <p class="testi-text">"Customer support is fantastic and the platform keeps getting better. Smart analytics alone is worth the subscription price many times over."</p>
                    <div class="testi-name">Dev M.</div>
                    <div class="testi-role">Growth Lead, BrandX</div>
                </div>
            </div>

            <!-- Dots -->
            <div class="carousel-dots" id="carouselDots">
                <div class="c-dot active" data-idx="0"></div>
                <div class="c-dot" data-idx="1"></div>
                <div class="c-dot" data-idx="2"></div>
                <div class="c-dot" data-idx="3"></div>
                <div class="c-dot" data-idx="4"></div>
            </div>
        </div>
    </section>

    <div class="section-divider my-2"></div>

    <!-- ═══════════════════════════════════════════════════════
     NEWSLETTER
═══════════════════════════════════════════════════════ -->
    <section id="newsletter">
        <div class="container">
            <div class="newsletter-box fade-up">
                <span class="section-tag" style="position:relative;z-index:1">Stay Updated</span>
                <h2 class="section-title" style="position:relative;z-index:1">
                    Get the Latest <span class="gradient-text">Deals & Campaigns</span>
                </h2>
                <p style="color:var(--muted);max-width:440px;margin:.7rem auto 0;font-size:.95rem;position:relative;z-index:1">
                    Subscribe and get exclusive brand promotions, trending offers, and campaign alerts directly in your inbox.
                </p>
                <div class="newsletter-form">
                    <input type="email" class="newsletter-input" placeholder="Enter your email address…" id="nlEmail" />
                    <button class="newsletter-btn ripple-btn" id="nlBtn">
                        <i class="fa-solid fa-paper-plane me-1"></i> Subscribe
                    </button>
                </div>
                <p id="nlMsg" style="margin-top:.8rem;font-size:.82rem;color:var(--rose);display:none;position:relative;z-index:1"></p>
            </div>
        </div>
    </section>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        /* ── FADE-UP on Scroll ──────────────────────────── */
        const fadeEls = document.querySelectorAll('.fade-up');
        const io = new IntersectionObserver((entries) => {
            entries.forEach(e => {
                if (e.isIntersecting) e.target.classList.add('visible');
            });
        }, {
            threshold: 0.12
        });
        fadeEls.forEach(el => io.observe(el));

        /* ── COUNT-UP ────────────────────────────────────── */
        function countUp(el) {
            const target = parseInt(el.dataset.target);
            const suffix = el.dataset.suffix || '';
            const duration = 1800;
            const step = target / (duration / 16);
            let current = 0;
            const timer = setInterval(() => {
                current += step;
                if (current >= target) {
                    current = target;
                    clearInterval(timer);
                }
                if (target >= 1000) {
                    el.textContent = (current / 1000).toFixed(current >= target ? 0 : 1) + suffix;
                } else {
                    el.textContent = Math.floor(current) + suffix;
                }
            }, 16);
        }

        const statsIo = new IntersectionObserver((entries) => {
            entries.forEach(e => {
                if (e.isIntersecting) {
                    countUp(e.target);
                    statsIo.unobserve(e.target);
                }
            });
        }, {
            threshold: 0.5
        });
        document.querySelectorAll('.stat-num').forEach(el => statsIo.observe(el));

        /* ── TESTIMONIAL DOTS ───────────────────────────── */
        const track = document.getElementById('testiTrack');
        const dots = document.querySelectorAll('.c-dot');

        track.addEventListener('scroll', () => {
            const idx = Math.round(track.scrollLeft / 325);
            dots.forEach((d, i) => d.classList.toggle('active', i === idx));
        });

        dots.forEach(dot => {
            dot.addEventListener('click', () => {
                const i = parseInt(dot.dataset.idx);
                track.scrollTo({
                    left: i * 325,
                    behavior: 'smooth'
                });
            });
        });

        /* ── RIPPLE EFFECT ──────────────────────────────── */
        document.querySelectorAll('.ripple-btn').forEach(btn => {
            btn.addEventListener('click', function(e) {
                const r = document.createElement('span');
                r.className = 'ripple';
                const rect = this.getBoundingClientRect();
                const size = Math.max(rect.width, rect.height);
                r.style.cssText = `width:${size}px;height:${size}px;left:${e.clientX-rect.left-size/2}px;top:${e.clientY-rect.top-size/2}px`;
                this.appendChild(r);
                setTimeout(() => r.remove(), 650);
            });
        });

        /* ── NEWSLETTER SUBMIT ──────────────────────────── */
        document.getElementById('nlBtn').addEventListener('click', () => {
            const email = document.getElementById('nlEmail').value.trim();
            const msg = document.getElementById('nlMsg');
            if (!email || !/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)) {
                msg.textContent = '⚠️ Please enter a valid email address.';
                msg.style.display = 'block';
                return;
            }
            msg.textContent = '🎉 You\'re subscribed! Watch your inbox for amazing deals.';
            msg.style.color = '#2e7d32';
            msg.style.display = 'block';
            document.getElementById('nlEmail').value = '';
            setTimeout(() => msg.style.display = 'none', 5000);
        });
    </script>





    <?php include 'includes/footer.php'; ?>