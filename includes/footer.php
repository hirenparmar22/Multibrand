<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>MultiBrand Promotion – Footer</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@300;400;500;600;700&family=Playfair+Display:wght@700;800&display=swap" rel="stylesheet" />

    <style>
        :root {
            --pink: #f7b2cb;
            --lavender: #c8b6e2;
            --rose: #e91e8c;
            --violet: #9c27b0;
            --indigo: #3f51b5;
            --text: #2d2d3f;
            --muted: #7a7a9d;
        }

        *,
        *::before,
        *::after {
            box-sizing: border-box;
        }

        body {
            font-family: 'DM Sans', sans-serif;
            margin: 0;
            background: linear-gradient(135deg, #fce4ec 0%, #e8f4fd 50%, #f3e5f5 100%);
        }

        /* ══════════════════════════════════════
       FOOTER
    ══════════════════════════════════════ */
        footer {
            background: linear-gradient(135deg, #1a1033 0%, #0f1940 55%, #1a0a2e 100%);
            color: #e0d8f0;
            padding: 72px 0 0;
            position: relative;
            overflow: hidden;
        }

        /* decorative blobs */
        footer::before {
            content: '';
            position: absolute;
            top: -80px;
            right: -80px;
            width: 320px;
            height: 320px;
            background: radial-gradient(circle, rgba(233, 30, 140, .18), transparent 70%);
            border-radius: 50%;
            pointer-events: none;
        }

        footer::after {
            content: '';
            position: absolute;
            bottom: 40px;
            left: -60px;
            width: 260px;
            height: 260px;
            background: radial-gradient(circle, rgba(63, 81, 181, .15), transparent 70%);
            border-radius: 50%;
            pointer-events: none;
        }

        /* logo */
        .footer-logo {
            font-family: 'Playfair Display', serif;
            font-size: 1.55rem;
            font-weight: 800;
            background: linear-gradient(135deg, #f7b2cb, #c8b6e2, #b2d8f7);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: .55rem;
            margin-bottom: 1.1rem;
        }

        .footer-logo-icon {
            width: 38px;
            height: 38px;
            background: linear-gradient(135deg, #e91e8c, #9c27b0);
            border-radius: 11px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #fff;
            font-size: .85rem;
            flex-shrink: 0;
            box-shadow: 0 4px 14px rgba(233, 30, 140, .4);
        }

        .footer-tagline {
            font-size: .88rem;
            color: rgba(224, 216, 240, .6);
            line-height: 1.7;
            max-width: 260px;
            margin-bottom: 1.5rem;
        }

        /* social icons */
        .social-icons {
            display: flex;
            gap: .6rem;
            flex-wrap: wrap;
        }

        .social-icon {
            width: 38px;
            height: 38px;
            border-radius: 10px;
            background: rgba(255, 255, 255, .08);
            border: 1px solid rgba(255, 255, 255, .1);
            display: flex;
            align-items: center;
            justify-content: center;
            color: rgba(224, 216, 240, .75);
            font-size: .9rem;
            text-decoration: none;
            transition: all .25s ease;
        }

        .social-icon:hover {
            background: linear-gradient(135deg, #e91e8c, #9c27b0);
            border-color: transparent;
            color: #fff;
            transform: translateY(-3px);
            box-shadow: 0 6px 18px rgba(233, 30, 140, .4);
        }

        /* headings */
        .footer-heading {
            font-family: 'Playfair Display', serif;
            font-size: 1.05rem;
            font-weight: 700;
            color: #fff;
            margin-bottom: 1.2rem;
            position: relative;
            padding-bottom: .6rem;
        }

        .footer-heading::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 36px;
            height: 2px;
            background: linear-gradient(90deg, #e91e8c, #9c27b0);
            border-radius: 99px;
        }

        /* links */
        .footer-links {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .footer-links li {
            margin-bottom: .55rem;
        }

        .footer-links a {
            color: rgba(224, 216, 240, .6);
            text-decoration: none;
            font-size: .88rem;
            transition: all .22s ease;
            display: inline-flex;
            align-items: center;
            gap: .4rem;
        }

        .footer-links a::before {
            content: '›';
            color: var(--rose);
            font-weight: 700;
            transition: transform .2s ease;
        }

        .footer-links a:hover {
            color: rgba(224, 216, 240, 1);
            transform: translateX(4px);
        }

        /* contact items */
        .footer-contact {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .footer-contact li {
            display: flex;
            align-items: flex-start;
            gap: .7rem;
            margin-bottom: .8rem;
            font-size: .87rem;
            color: rgba(224, 216, 240, .65);
        }

        .footer-contact li .fc-icon {
            width: 30px;
            height: 30px;
            border-radius: 8px;
            background: rgba(233, 30, 140, .15);
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--pink);
            font-size: .8rem;
            flex-shrink: 0;
            margin-top: 1px;
        }

        /* newsletter mini */
        .footer-nl-input {
            width: 100%;
            padding: .65rem 1rem;
            border-radius: 10px;
            border: 1.5px solid rgba(255, 255, 255, .1);
            background: rgba(255, 255, 255, .07);
            color: #fff;
            font-family: 'DM Sans', sans-serif;
            font-size: .85rem;
            outline: none;
            transition: all .25s ease;
            margin-bottom: .6rem;
        }

        .footer-nl-input::placeholder {
            color: rgba(255, 255, 255, .35);
        }

        .footer-nl-input:focus {
            border-color: rgba(233, 30, 140, .5);
            background: rgba(255, 255, 255, .1);
        }

        .footer-nl-btn {
            width: 100%;
            padding: .65rem;
            border-radius: 10px;
            background: linear-gradient(135deg, #e91e8c, #9c27b0);
            color: #fff;
            border: none;
            font-weight: 700;
            font-size: .88rem;
            cursor: pointer;
            box-shadow: 0 4px 16px rgba(233, 30, 140, .35);
            transition: all .25s ease;
        }

        .footer-nl-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 24px rgba(233, 30, 140, .5);
        }

        /* divider */
        .footer-divider {
            border: none;
            height: 1px;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, .1), transparent);
            margin: 3rem 0 0;
        }

        /* bottom bar */
        .footer-bottom {
            padding: 1.4rem 0;
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: .75rem;
        }

        .footer-copy {
            font-size: .82rem;
            color: rgba(224, 216, 240, .45);
        }

        .footer-copy span {
            color: var(--pink);
        }

        .footer-bottom-links {
            display: flex;
            gap: 1.2rem;
            flex-wrap: wrap;
        }

        .footer-bottom-links a {
            font-size: .8rem;
            color: rgba(224, 216, 240, .4);
            text-decoration: none;
            transition: color .2s ease;
        }

        .footer-bottom-links a:hover {
            color: var(--pink);
        }

        /* badge */
        .footer-badge {
            display: inline-flex;
            align-items: center;
            gap: .35rem;
            background: rgba(255, 255, 255, .06);
            border: 1px solid rgba(255, 255, 255, .1);
            border-radius: 99px;
            padding: .25rem .75rem;
            font-size: .72rem;
            color: rgba(224, 216, 240, .55);
            margin-bottom: 1.3rem;
        }

        .footer-badge span {
            color: #6bcb77;
        }

        /* scroll-to-top */
        #scrollTop {
            position: fixed;
            bottom: 30px;
            right: 30px;
            width: 46px;
            height: 46px;
            background: linear-gradient(135deg, #e91e8c, #9c27b0);
            color: #fff;
            border: none;
            border-radius: 12px;
            font-size: 1rem;
            cursor: pointer;
            box-shadow: 0 6px 20px rgba(233, 30, 140, .4);
            display: flex;
            align-items: center;
            justify-content: center;
            opacity: 0;
            transform: translateY(20px);
            transition: all .3s ease;
            z-index: 999;
        }

        #scrollTop.visible {
            opacity: 1;
            transform: translateY(0);
        }

        #scrollTop:hover {
            transform: translateY(-4px);
            box-shadow: 0 10px 28px rgba(233, 30, 140, .55);
        }

        @keyframes footerFadeUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .f-reveal {
            animation: footerFadeUp .6s ease forwards;
            opacity: 0;
        }

        .f-reveal.d1 {
            animation-delay: .05s;
        }

        .f-reveal.d2 {
            animation-delay: .15s;
        }

        .f-reveal.d3 {
            animation-delay: .25s;
        }

        .f-reveal.d4 {
            animation-delay: .35s;
        }
    </style>
</head>

<body>

    <!-- ════════════════════════════════════════════════════
     FOOTER
════════════════════════════════════════════════════ -->
    <footer>
        <div class="container" style="position:relative;z-index:2">
            <div class="row gy-5">

                <!-- Brand column -->
                <div class="col-lg-3 col-md-6 f-reveal d1">
                    <a href="#" class="footer-logo">
                        <span class="footer-logo-icon"><i class="fa-solid fa-fire-flame-curved"></i></span>
                        MultiBrand
                    </a>
                    <div class="footer-badge">
                        <span>●</span> Platform Online & Active
                    </div>
                    <p class="footer-tagline">
                        The #1 multi-brand promotion platform empowering brands, businesses, and influencers to grow smarter together.
                    </p>
                    <div class="social-icons">
                        <a href="#" class="social-icon" title="Facebook"><i class="fa-brands fa-facebook-f"></i></a>
                        <a href="#" class="social-icon" title="Twitter/X"><i class="fa-brands fa-x-twitter"></i></a>
                        <a href="#" class="social-icon" title="Instagram"><i class="fa-brands fa-instagram"></i></a>
                        <a href="#" class="social-icon" title="LinkedIn"><i class="fa-brands fa-linkedin-in"></i></a>
                        <a href="#" class="social-icon" title="YouTube"><i class="fa-brands fa-youtube"></i></a>
                    </div>
                </div>

                <!-- Quick Links -->
                <div class="col-lg-2 col-md-6 col-6 f-reveal d2">
                    <h6 class="footer-heading">Quick Links</h6>
                    <ul class="footer-links">
                        <li><a href="#">Home</a></li>
                        <li><a href="#">About Us</a></li>
                        <li><a href="#">All Brands</a></li>
                        <li><a href="#">Campaigns</a></li>
                        <li><a href="#">Offers & Deals</a></li>
                        <li><a href="#">Blog</a></li>
                    </ul>
                </div>

                <!-- Services -->
                <div class="col-lg-2 col-md-6 col-6 f-reveal d2">
                    <h6 class="footer-heading">Services</h6>
                    <ul class="footer-links">
                        <li><a href="#">Brand Registration</a></li>
                        <li><a href="#">Influencer Connect</a></li>
                        <li><a href="#">Smart Analytics</a></li>
                        <li><a href="#">Flash Deals</a></li>
                        <li><a href="#">API Integration</a></li>
                        <li><a href="#">Enterprise Plan</a></li>
                    </ul>
                </div>

                <!-- Contact -->
                <div class="col-lg-2 col-md-6 f-reveal d3">
                    <h6 class="footer-heading">Contact</h6>
                    <ul class="footer-contact">
                        <li>
                            <span class="fc-icon"><i class="fa-solid fa-location-dot"></i></span>
                            <span>Rajkot, Gujarat, India 360001</span>
                        </li>
                        <li>
                            <span class="fc-icon"><i class="fa-solid fa-phone"></i></span>
                            <span>+91 98765 43210</span>
                        </li>
                        <li>
                            <span class="fc-icon"><i class="fa-solid fa-envelope"></i></span>
                            <span>hello@multibrand.in</span>
                        </li>
                        <li>
                            <span class="fc-icon"><i class="fa-solid fa-clock"></i></span>
                            <span>Mon–Sat, 9am – 6pm IST</span>
                        </li>
                    </ul>
                </div>

                <!-- Newsletter mini -->
                <div class="col-lg-3 col-md-6 f-reveal d4">
                    <h6 class="footer-heading">Stay in the Loop</h6>
                    <p style="font-size:.83rem;color:rgba(224,216,240,.55);margin-bottom:1rem;line-height:1.6">
                        Get weekly brand deals, new campaign alerts, and exclusive influencer features.
                    </p>
                    <input type="email" class="footer-nl-input" placeholder="Your email address…" id="footerEmail" />
                    <button class="footer-nl-btn" id="footerNlBtn">
                        <i class="fa-solid fa-paper-plane me-2"></i>Subscribe Now
                    </button>
                    <p id="footerNlMsg" style="font-size:.77rem;margin-top:.5rem;display:none;color:#f7b2cb"></p>

                    <!-- Badges row -->
                    <div class="d-flex gap-2 mt-3 flex-wrap">
                        <span style="font-size:.7rem;background:rgba(255,255,255,.07);border:1px solid rgba(255,255,255,.1);border-radius:8px;padding:.25rem .65rem;color:rgba(224,216,240,.5)">
                            <i class="fa-solid fa-shield-halved me-1" style="color:#b2e8d8"></i>Secure
                        </span>
                        <span style="font-size:.7rem;background:rgba(255,255,255,.07);border:1px solid rgba(255,255,255,.1);border-radius:8px;padding:.25rem .65rem;color:rgba(224,216,240,.5)">
                            <i class="fa-solid fa-lock me-1" style="color:#b2d8f7"></i>Privacy First
                        </span>
                        <span style="font-size:.7rem;background:rgba(255,255,255,.07);border:1px solid rgba(255,255,255,.1);border-radius:8px;padding:.25rem .65rem;color:rgba(224,216,240,.5)">
                            <i class="fa-solid fa-bell me-1" style="color:#ffd4b2"></i>No Spam
                        </span>
                    </div>
                </div>

            </div><!-- /row -->

            <hr class="footer-divider">

            <div class="footer-bottom">
                <p class="footer-copy mb-0">
                    © 2025 <span>MultiBrand Promotion</span>. All rights reserved. Made with <span>♥</span> in India.
                </p>
                <div class="footer-bottom-links">
                    <a href="#">Privacy Policy</a>
                    <a href="#">Terms of Service</a>
                    <a href="#">Cookie Policy</a>
                    <a href="#">Sitemap</a>
                </div>
            </div>
        </div><!-- /container -->
    </footer>

    <!-- Scroll to top -->
    <button id="scrollTop" title="Back to top">
        <i class="fa-solid fa-arrow-up"></i>
    </button>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        /* ── Scroll-to-top ─────────────────────────────── */
        const scrollBtn = document.getElementById('scrollTop');

        window.addEventListener('scroll', () => {
            scrollBtn.classList.toggle('visible', window.scrollY > 300);
        });

        scrollBtn.addEventListener('click', () => {
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        });

        /* ── Footer Newsletter ─────────────────────────── */
        document.getElementById('footerNlBtn').addEventListener('click', function() {
            const email = document.getElementById('footerEmail').value.trim();
            const msg = document.getElementById('footerNlMsg');
            const re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

            if (!email || !re.test(email)) {
                msg.textContent = '⚠️ Please enter a valid email.';
                msg.style.color = '#ffb3c1';
                msg.style.display = 'block';
                return;
            }

            msg.textContent = '🎉 Subscribed successfully! Great deals coming your way.';
            msg.style.color = '#b2e8d8';
            msg.style.display = 'block';
            document.getElementById('footerEmail').value = '';
            setTimeout(() => msg.style.display = 'none', 5000);
        });

        /* ── Intersection observer for footer columns ─── */
        const fReveal = document.querySelectorAll('.f-reveal');
        const fIo = new IntersectionObserver((entries) => {
            entries.forEach(e => {
                if (e.isIntersecting) {
                    e.target.style.animationPlayState = 'running';
                    fIo.unobserve(e.target);
                }
            });
        }, {
            threshold: 0.15
        });

        fReveal.forEach(el => {
            el.style.animationPlayState = 'paused';
            fIo.observe(el);
        });

        /* ── Year auto-update ──────────────────────────── */
        document.querySelectorAll('.footer-copy').forEach(el => {
            el.innerHTML = el.innerHTML.replace('2025', new Date().getFullYear());
        });

        function openLogin() {
            var loginModal = new bootstrap.Modal(
                document.getElementById('loginModal')
            );
            loginModal.show();
        }
        
    </script>

    <?php if ($is_home) { ?>
        <script>
            window.onload = function() {
                // auto popup only home page (optional)
                openLogin();
            };
        </script>
    <?php } ?>
</body>

</html>