<?php
// ── Safety: start session if not already started ──

$current_page = basename($_SERVER['PHP_SELF']);

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// ── Simple variables (easy to read) ──
$is_logged_in  = isset($_SESSION['user_id']);
$user_name     = htmlspecialchars($_SESSION['user_name'] ?? 'Guest', ENT_QUOTES, 'UTF-8');
$user_initial  = strtoupper(substr($user_name, 0, 1));
$current_page  = basename($_SERVER['PHP_SELF']); // e.g. "dashboard.php"

$is_home = ($current_page == 'index.php');

// Helper: mark nav link active
function nav_active($page)
{
    global $current_page;
    return $current_page === $page ? 'active' : '';
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>MultiBrand Promotion – Header</title>


    <!-- includes/header.php -->
    <link rel="stylesheet" href="/designs/<?php echo $design; ?>/style.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@300;400;500;600;700&family=Playfair+Display:wght@700;800&display=swap" rel="stylesheet" />

    <style>
        :root {
            --pink: #f7b2cb;
            --peach: #ffd4b2;
            --lavender: #c8b6e2;
            --mint: #b2e8d8;
            --sky: #b2d8f7;
            --white: #ffffff;
            --text: #2d2d3f;
            --muted: #7a7a9d;
            --grad1: linear-gradient(135deg, #fce4ec 0%, #e8f4fd 50%, #f3e5f5 100%);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'DM Sans', sans-serif;
            color: var(--text);
            background: var(--grad1);
            min-height: 100vh;
        }

        /* ── NAVBAR ────────────────────────────────────── */
        #mainNav {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 1000;
            padding: 1rem 0;
            transition: all .35s ease;
        }

        #mainNav.scrolled {
            background: rgba(255, 255, 255, .72);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            box-shadow: 0 4px 30px rgba(180, 120, 200, .12);
            padding: .6rem 0;
        }

        .nav-logo {
            font-family: 'Playfair Display', serif;
            font-size: 1.45rem;
            font-weight: 800;
            background: linear-gradient(135deg, #e91e8c 0%, #9c27b0 50%, #3f51b5 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            letter-spacing: -.5px;
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: .5rem;
        }

        .nav-logo-icon {
            width: 36px;
            height: 36px;
            background: linear-gradient(135deg, #e91e8c, #9c27b0);
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #fff;
            font-size: .85rem;
            flex-shrink: 0;
            box-shadow: 0 4px 14px rgba(233, 30, 140, .35);
        }


        .navbar-nav .nav-link {
            font-size: .92rem;
            font-weight: 500;
            color: var(--text) !important;
            padding: .45rem .85rem !important;
            border-radius: 8px;
            position: relative;
            transition: all .25s ease;
        }

        .navbar-nav .nav-link::after {
            content: '';
            position: absolute;
            bottom: 4px;
            left: 50%;
            transform: translateX(-50%) scaleX(0);
            width: 60%;
            height: 2px;
            background: linear-gradient(90deg, #e91e8c, #9c27b0);
            border-radius: 99px;
            transition: transform .25s ease;
        }

        .navbar-nav .nav-link:hover {
            color: #e91e8c !important;
        }

        .navbar-nav .nav-link:hover::after {
            transform: translateX(-50%) scaleX(1);
        }

        .btn-nav-login {
            font-size: .88rem;
            font-weight: 600;
            padding: .45rem 1.2rem;
            border-radius: 10px;
            border: 2px solid rgba(233, 30, 140, .4);
            color: #e91e8c;
            background: transparent;
            transition: all .25s ease;
            text-decoration: none;
        }

        .btn-nav-login:hover {
            background: rgba(233, 30, 140, .07);
            border-color: #e91e8c;
            color: #c2185b;
            transform: translateY(-1px);
        }

        .btn-nav-signup {
            font-size: .88rem;
            font-weight: 600;
            padding: .45rem 1.3rem;
            border-radius: 10px;
            border: none;
            background: linear-gradient(135deg, #e91e8c, #9c27b0);
            color: #fff;
            box-shadow: 0 4px 14px rgba(233, 30, 140, .3);
            transition: all .25s ease;
            text-decoration: none;
        }

        .btn-nav-signup:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 22px rgba(233, 30, 140, .42);
            color: #fff;
        }

        /* hamburger tint */
        .navbar-toggler {
            border: none;
            outline: none;
            box-shadow: none !important;
        }

        .navbar-toggler-icon {
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 30 30'%3E%3Cpath stroke='%23e91e8c' stroke-width='2.5' stroke-linecap='round' d='M4 7h22M4 15h22M4 23h22'/%3E%3C/svg%3E") !important;
        }

        /* mobile collapse */
        @media (max-width:991.98px) {
            #navbarMain {
                background: rgba(255, 255, 255, .92);
                backdrop-filter: blur(18px);
                border-radius: 16px;
                margin-top: .6rem;
                padding: 1rem 1.25rem;
                box-shadow: 0 8px 30px rgba(150, 80, 180, .14);
            }

            .nav-actions {
                gap: .5rem !important;
            }
        }

        /* load animation */
        @keyframes navFadeDown {
            from {
                opacity: 0;
                transform: translateY(-18px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        #mainNav {
            animation: navFadeDown .55s ease forwards;
        }
    </style>
</head>

<body>

    <!-- ═══════════════════════ NAVBAR ═══════════════════════ -->
    <nav id="mainNav" class="navbar navbar-expand-lg">
        <div class="container">

            <!-- Logo -->
            <a href="#" class="nav-logo">
                <span class="nav-logo-icon"><i class="fa-brands fa-asymmetrik"></i></span>
                MultiBrand
            </a>

            <!-- Hamburger -->
            <button class="navbar-toggler" type="button"
                data-bs-toggle="collapse" data-bs-target="#navbarMain"
                aria-controls="navbarMain" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Links -->
            <div class="collapse navbar-collapse" id="navbarMain">
                <ul class="navbar-nav mx-auto gap-1">
                    <li class="nav-item"><a class="nav-link" href="/index.php">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="/brands.php">Brands</a></li>
                    <li class="nav-item"><a class="nav-link" href="/offers.php">Offers</a></li>
                    <li class="nav-item"><a class="nav-link" href="/campaigns.php">Campaigns</a></li>
                    <li class="nav-item"><a class="nav-link" href="/contact.php">Contact</a></li>
                </ul>

                <div class="nav-actions d-flex align-items-center gap-3">

                    <?php if (!empty($_SESSION['user_id'])): ?>

                        <!-- AFTER LOGIN USER UI -->
                        <div class="d-flex align-items-center gap-2  rounded-3" style="border: 2px solid rgba(233, 30, 140, .4);">

                            <!-- User Photo -->
                            <img src="<?php echo !empty($_SESSION['user_photo'])
                                            ? $_SESSION['user_photo']
                                            : 'assets/img/default-user.png'; ?>"
                                alt="User"
                                style="width:35px;height:35px;border-radius:50%;object-fit:cover;">

                            <!-- Username -->
                            <span class="fw-semibold text-white">
                                <?php echo htmlspecialchars($_SESSION['user_name'] ?? 'User'); ?>
                            </span>

                            <!-- Dropdown -->
                            <div class="dropdown">
                                <button class="btn btn-sm dropdown-toggle" data-bs-toggle="dropdown"></button>

                                <ul class="dropdown-menu dropdown-menu-end">
                                    <li><a class="dropdown-item" href="profile.php">Profile</a></li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li><a class="dropdown-item text-danger" href="../../auth/logout.php">Logout</a></li>
                                </ul>
                            </div>

                        </div>

                        <!-- Optional extra button -->
                        <a href="/contact.php" class="btn-nav-signup">
                            Join Team
                        </a>
                        <a href="../../auth/logout.php" class="btn-nav-login">
                            Logout
                        </a>
                    <?php else: ?>

                        <!-- BEFORE LOGIN -->
                        <button class="btn-nav-login" data-bs-toggle="modal" data-bs-target="#loginModal">
                            Login
                        </button>

                        <button class="btn-nav-signup" data-bs-toggle="modal" data-bs-target="#signupModal">
                            Sign Up
                        </button>

                    <?php endif; ?>

                </div>

            </div>
        </div>
    </nav>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        // Scroll effect – add .scrolled class
        const nav = document.getElementById('mainNav');
        window.addEventListener('scroll', () => {
            nav.classList.toggle('scrolled', window.scrollY > 40);
        });

        // Active link highlight
        document.querySelectorAll('.nav-link').forEach(link => {
            link.addEventListener('click', function() {
                document.querySelectorAll('.nav-link').forEach(l => l.classList.remove('active'));
                this.classList.add('active');
            });
        });
    </script>

    <?php
    if (!isset($_SESSION['user_id'])) {
        include __DIR__ . "/login-model.php";
        include __DIR__ . "/signup-model.php";
    }
    ?>



</body>

</html>