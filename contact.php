<?php
session_start();

require_once __DIR__ . '/includes/header.php';

$csrf = $_SESSION['csrf_token'] ?? bin2hex(random_bytes(32));
$_SESSION['csrf_token'] = $csrf;
$success = $error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!hash_equals($csrf, $_POST['csrf_token'] ?? '')) {
        $error = 'Invalid request. Please try again.';
    } else {
        $name    = htmlspecialchars(trim($_POST['name'] ?? ''));
        $email   = filter_var(trim($_POST['email'] ?? ''), FILTER_VALIDATE_EMAIL);
        $subject = htmlspecialchars(trim($_POST['subject'] ?? ''));
        $message = htmlspecialchars(trim($_POST['message'] ?? ''));
        if (!$name || !$email || !$subject || !$message) {
            $error = 'Please fill in all fields correctly.';
        } else {
            // mail($to, $subject, $message); // Uncomment for real mail
            $success = "Thanks {$name}! We'll get back to you within 24 hours.";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Contact – MultiBrand Promotion</title>
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

        .page-hero {
            padding: 120px 0 50px;
            text-align: center
        }

        .page-hero h1 {
            font-family: 'Playfair Display', serif;
            font-size: clamp(2rem, 5vw, 3.5rem);
            font-weight: 900;
            margin-bottom: 1rem
        }

        /* CONTACT CARD */
        .contact-box {
            background: var(--card-bg);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, .7);
            border-radius: 28px;
            padding: 3rem;
            box-shadow: 0 16px 50px rgba(150, 80, 180, .12)
        }

        .form-label {
            font-size: .85rem;
            font-weight: 600;
            color: var(--text);
            margin-bottom: .4rem
        }

        .form-control {
            padding: .75rem 1.1rem;
            border-radius: 12px;
            border: 2px solid rgba(233, 30, 140, .15);
            background: rgba(255, 255, 255, .75);
            backdrop-filter: blur(8px);
            font-family: 'DM Sans', sans-serif;
            font-size: .9rem;
            color: var(--text);
            transition: all .25s;
            outline: none
        }

        .form-control:focus {
            border-color: var(--rose);
            box-shadow: 0 0 0 4px rgba(233, 30, 140, .1);
            background: rgba(255, 255, 255, .95)
        }

        .btn-send {
            width: 100%;
            padding: .8rem;
            border-radius: 12px;
            background: linear-gradient(135deg, #e91e8c, #9c27b0);
            color: #fff;
            border: none;
            font-weight: 700;
            font-size: .95rem;
            cursor: pointer;
            box-shadow: 0 6px 20px rgba(233, 30, 140, .35);
            transition: all .25s;
            position: relative;
            overflow: hidden
        }

        .btn-send:hover {
            transform: translateY(-2px);
            box-shadow: 0 12px 30px rgba(233, 30, 140, .5)
        }

        .btn-send:disabled {
            opacity: .65;
            cursor: not-allowed;
            transform: none
        }

        /* INFO CARDS */
        .info-card {
            background: var(--glass);
            backdrop-filter: blur(18px);
            border: 1px solid rgba(255, 255, 255, .65);
            border-radius: 18px;
            padding: 1.6rem;
            box-shadow: 0 6px 24px rgba(150, 80, 180, .09);
            display: flex;
            gap: 1rem;
            align-items: flex-start;
            transition: all .3s ease;
            margin-bottom: 1rem
        }

        .info-card:hover {
            transform: translateX(6px);
            box-shadow: 0 10px 32px rgba(150, 80, 180, .16)
        }

        .info-icon {
            width: 48px;
            height: 48px;
            border-radius: 14px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.1rem;
            flex-shrink: 0
        }

        .info-card h6 {
            font-weight: 700;
            font-size: .9rem;
            margin-bottom: .2rem
        }

        .info-card p {
            font-size: .82rem;
            color: var(--muted);
            margin: 0;
            line-height: 1.5
        }

        .info-card a {
            color: var(--rose);
            text-decoration: none;
            font-weight: 600
        }

        .info-card a:hover {
            text-decoration: underline
        }

        /* SOCIAL */
        .social-row {
            display: flex;
            gap: .6rem;
            flex-wrap: wrap;
            margin-top: 1.2rem
        }

        .social-btn {
            width: 44px;
            height: 44px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1rem;
            color: #fff;
            transition: all .25s;
            text-decoration: none;
            border: none;
            cursor: pointer
        }

        .social-btn:hover {
            transform: translateY(-3px) scale(1.1)
        }

        /* Map placeholder */
        .map-box {
            background: linear-gradient(135deg, rgba(233, 30, 140, .07), rgba(156, 39, 176, .05));
            border: 1px solid rgba(233, 30, 140, .12);
            border-radius: 18px;
            height: 200px;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            margin-top: 1.5rem
        }

        .map-box p {
            color: var(--muted);
            font-size: .85rem
        }

        .alert-success-custom {
            background: linear-gradient(135deg, rgba(46, 125, 50, .1), rgba(102, 187, 106, .08));
            border: 1px solid rgba(102, 187, 106, .3);
            color: #2e7d32;
            border-radius: 12px;
            padding: .9rem 1.2rem;
            font-weight: 600;
            font-size: .88rem;
            margin-bottom: 1rem
        }

        .alert-error-custom {
            background: linear-gradient(135deg, rgba(183, 28, 28, .08), rgba(229, 57, 53, .06));
            border: 1px solid rgba(229, 57, 53, .25);
            color: #b71c1c;
            border-radius: 12px;
            padding: .9rem 1.2rem;
            font-weight: 600;
            font-size: .88rem;
            margin-bottom: 1rem
        }
    </style>
</head>

<body>
    <div class="blob blob-1"></div>
    <div class="blob blob-2"></div>
    <div style="height:80px"></div>

    <section class="page-hero">
        <div class="container fade-up">
            <span class="section-tag"><i class="fa-solid fa-envelope me-1"></i> Get In Touch</span>
            <h1 class="section-title">Contact <span class="gradient-text">Us</span></h1>
            <p style="color:var(--muted);max-width:480px;margin:.5rem auto 0;font-size:1rem">Have a question, partnership inquiry, or just want to say hello? We'd love to hear from you.</p>
        </div>
    </section>

    <section style="padding:20px 0 80px">
        <div class="container">
            <div class="row g-4">

                <!-- FORM -->
                <div class="col-lg-7 fade-up">
                    <div class="contact-box">
                        <h4 style="font-family:'Playfair Display',serif;font-weight:800;margin-bottom:.3rem">Send us a Message</h4>
                        <p style="color:var(--muted);font-size:.88rem;margin-bottom:1.8rem">We typically respond within 24 hours.</p>

                        <?php if ($success): ?>
                            <div class="alert-success-custom"><i class="fa-solid fa-circle-check me-2"></i><?= $success ?></div>
                        <?php elseif ($error): ?>
                            <div class="alert-error-custom"><i class="fa-solid fa-circle-exclamation me-2"></i><?= $error ?></div>
                        <?php endif; ?>

                        <form method="POST" id="contactForm">
                            <input type="hidden" name="csrf_token" value="<?= $csrf ?>" />
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label class="form-label">Your Name <span style="color:var(--rose)">*</span></label>
                                    <input type="text" name="name" class="form-control" placeholder="John Doe" required value="<?= htmlspecialchars($_POST['name'] ?? '') ?>" />
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Email Address <span style="color:var(--rose)">*</span></label>
                                    <input type="email" name="email" class="form-control" placeholder="john@example.com" required value="<?= htmlspecialchars($_POST['email'] ?? '') ?>" />
                                </div>
                                <div class="col-12">
                                    <label class="form-label">Subject <span style="color:var(--rose)">*</span></label>
                                    <select name="subject" class="form-control" required>
                                        <option value="">Select a subject…</option>
                                        <option value="Partnership" <?= ($_POST['subject'] ?? '') === 'Partnership' ? 'selected' : '' ?>>Brand Partnership</option>
                                        <option value="Support" <?= ($_POST['subject'] ?? '') === 'Support' ? 'selected' : '' ?>>Customer Support</option>
                                        <option value="Campaign" <?= ($_POST['subject'] ?? '') === 'Campaign' ? 'selected' : '' ?>>Campaign Inquiry</option>
                                        <option value="Billing" <?= ($_POST['subject'] ?? '') === 'Billing' ? 'selected' : '' ?>>Billing & Payments</option>
                                        <option value="Other" <?= ($_POST['subject'] ?? '') === 'Other' ? 'selected' : '' ?>>Other</option>
                                    </select>
                                </div>
                                <div class="col-12">
                                    <label class="form-label">Message <span style="color:var(--rose)">*</span></label>
                                    <textarea name="message" class="form-control" rows="5" placeholder="Tell us how we can help…" required><?= htmlspecialchars($_POST['message'] ?? '') ?></textarea>
                                </div>
                                <div class="col-12">
                                    <button type="submit" class="btn-send ripple-btn" id="sendBtn">
                                        <i class="fa-solid fa-paper-plane me-2"></i> Send Message
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- INFO -->
                <div class="col-lg-5 fade-up" style="transition-delay:.15s">

                    <div class="info-card">
                        <div class="info-icon" style="background:linear-gradient(135deg,rgba(233,30,140,.15),rgba(156,39,176,.1));color:var(--rose)"><i class="fa-solid fa-location-dot"></i></div>
                        <div>
                            <h6>Head Office</h6>
                            <p>Level 12, Infinity Tower, Bandra Kurla Complex,<br>Mumbai – 400 051, Maharashtra, India</p>
                        </div>
                    </div>

                    <div class="info-card">
                        <div class="info-icon" style="background:linear-gradient(135deg,rgba(21,101,192,.12),rgba(66,165,245,.08));color:#1565c0"><i class="fa-solid fa-phone"></i></div>
                        <div>
                            <h6>Phone & WhatsApp</h6>
                            <p><a href="tel:+911234567890">+91 12345 67890</a></p>
                            <p><a href="https://wa.me/911234567890">WhatsApp us</a> — Mon–Sat, 9AM–6PM IST</p>
                        </div>
                    </div>

                    <div class="info-card">
                        <div class="info-icon" style="background:linear-gradient(135deg,rgba(46,125,50,.12),rgba(102,187,106,.08));color:#2e7d32"><i class="fa-solid fa-envelope"></i></div>
                        <div>
                            <h6>Email</h6>
                            <p><a href="mailto:hello@multibrand.in">hello@multibrand.in</a> — General Inquiries</p>
                            <p><a href="mailto:brands@multibrand.in">brands@multibrand.in</a> — Brand Partnerships</p>
                        </div>
                    </div>

                    <div class="info-card">
                        <div class="info-icon" style="background:linear-gradient(135deg,rgba(245,124,0,.12),rgba(255,193,7,.08));color:#f57c00"><i class="fa-solid fa-clock"></i></div>
                        <div>
                            <h6>Business Hours</h6>
                            <p>Monday – Friday: 9:00 AM – 6:00 PM IST<br>Saturday: 10:00 AM – 2:00 PM IST</p>
                        </div>
                    </div>

                    <!-- Social -->
                    <div style="background:var(--glass);backdrop-filter:blur(18px);border:1px solid rgba(255,255,255,.65);border-radius:18px;padding:1.4rem;box-shadow:0 6px 24px rgba(150,80,180,.09)">
                        <h6 style="font-weight:700;margin-bottom:.2rem">Follow Us</h6>
                        <p style="font-size:.8rem;color:var(--muted);margin-bottom:.8rem">Stay updated on the latest deals and campaigns.</p>
                        <div class="social-row">
                            <a href="#" class="social-btn" style="background:linear-gradient(135deg,#405de6,#5851db,#833ab4,#c13584,#e1306c,#fd1d1d)" title="Instagram"><i class="fa-brands fa-instagram"></i></a>
                            <a href="#" class="social-btn" style="background:#1877f2" title="Facebook"><i class="fa-brands fa-facebook-f"></i></a>
                            <a href="#" class="social-btn" style="background:#1da1f2" title="Twitter"><i class="fa-brands fa-twitter"></i></a>
                            <a href="#" class="social-btn" style="background:linear-gradient(135deg,#0077b5,#00a0dc)" title="LinkedIn"><i class="fa-brands fa-linkedin-in"></i></a>
                            <a href="#" class="social-btn" style="background:linear-gradient(135deg,#ff0000,#cc0000)" title="YouTube"><i class="fa-brands fa-youtube"></i></a>
                        </div>
                    </div>

                    <div class="map-box">
                        <div>
                            <i class="fa-solid fa-map-location-dot" style="font-size:2rem;color:var(--rose);margin-bottom:.6rem"></i>
                            <p>Interactive map — integrate Google Maps API with your API key here.</p>
                        </div>
                    </div>
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

        // Ripple
        document.querySelectorAll('.ripple-btn').forEach(btn => {
            btn.addEventListener('click', function(e) {
                const r = document.createElement('span');
                r.className = 'ripple';
                const rect = this.getBoundingClientRect();
                const size = Math.max(rect.width, rect.height);
                r.style.cssText = `width:${size}px;height:${size}px;left:${e.clientX-rect.left-size/2}px;top:${e.clientY-rect.top-size/2}px;position:absolute;border-radius:50%;background:rgba(255,255,255,.4);transform:scale(0);animation:rippleAnim .6s linear;pointer-events:none`;
                this.appendChild(r);
                setTimeout(() => r.remove(), 650);
            });
        });
    </script>
    <style>
        @keyframes rippleAnim {
            to {
                transform: scale(4);
                opacity: 0
            }
        }
    </style>
    <?php include __DIR__ . '/includes/login-model.php'; ?>
     <!-- <?php include __DIR__ . '/../app/includes/signup-model.php'; ?> -->
    <?php require_once __DIR__ . '/includes/footer.php'; ?>
    
    
</body>

</html>