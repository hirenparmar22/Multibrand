<?php
// designs/design2/content.php
// Aurora Light Theme — All main page sections



$brand_query = mysqli_query($conn, "
    SELECT * FROM brands
    WHERE status='active'
    ORDER BY id DESC
");

$feature_query = mysqli_query($conn,"
    SELECT * FROM features
    WHERE status='active'
");

$testimonial_query = mysqli_query($conn,"
    SELECT * FROM testimonials
    WHERE status=1
");
?>

<!-- ═══════════════════════════════════════
     HERO SECTION
════════════════════════════════════════ -->
<section class="hero" id="hero">
    <div style="max-width:780px;width:100%;">

        <div class="hero-badge">
            <span class="dot"></span>
            Exclusive Brand Promotions — 2025 Edition
        </div>

        <h1 class="display hero-title">
            Where Premium<br>Brands Meet<br><em>Your World</em>
        </h1>

        <p class="hero-desc">
            Discover curated collections from the world's finest brands.
            Unlock exclusive offers, loyalty rewards, and a shopping
            experience that truly shines.
        </p>

        <div class="hero-actions">
            <a href="/brandpromotion/font-view/signup.php" class="btn-glow btn-glow-primary shimmer">
                <span>✦</span> Explore Brands
            </a>
            <a href="/brandpromotion/font-view/about.php" class="btn-glow btn-glow-outline">
                Learn More →
            </a>
        </div>

        <!-- Stats -->
        <div class="stats-row">
            <div class="stat-item">
                <div class="stat-number">120+</div>
                <div class="stat-label">Premium Brands</div>
            </div>
            <div class="stat-item">
                <div class="stat-number">50K</div>
                <div class="stat-label">Happy Members</div>
            </div>
            <div class="stat-item">
                <div class="stat-number">98%</div>
                <div class="stat-label">Satisfaction Rate</div>
            </div>
            <div class="stat-item">
                <div class="stat-number">₹2Cr+</div>
                <div class="stat-label">Savings This Year</div>
            </div>
        </div>

    </div>
</section>


<!-- ═══════════════════════════════════════
     FEATURES ROW
════════════════════════════════════════ -->
<section class="section" style="padding-top:40px;">
    <div class="section-header reveal">
        <p class="subtitle">Why BrandLux</p>
        <h2>Everything You Need</h2>
        <div class="divider"></div>
    </div>

    <div class="features-grid">
        <?php while($f = mysqli_fetch_assoc($feature_query)): ?>
            <div class="glass-card feature-item reveal">
                <span class="feature-icon" style="--fi-delay:<?= $f['delay_time'] ?>"><?= $f['icon'] ?></span>
                <h4><?= htmlspecialchars($f['title']) ?></h4>
                <p><?= htmlspecialchars($f['description']) ?></p>
            </div>
        <?php endwhile; ?>
    </div>
</section>


<section class="section" id="brands">
    <div class="section-header reveal">
        <p class="subtitle">Featured Collections</p>
        <h2>Our Brand Universe</h2>
        <div class="divider"></div>
    </div>

    <div class="brand-grid">
        <?php while ($brand = mysqli_fetch_assoc($brand_query)): ?>
            <div class="glass-card brand-card reveal">
                <!-- Top accent bar -->
                <div class="brand-card-accent"></div>

                <div class="brand-logo shimmer" style="background:<?= $brand['color'] ?>">

                    <?= htmlspecialchars($brand['brand_logo']) ?>

                </div>

                <span class="tag tag-gold"
                    style="margin-bottom:12px;display:inline-flex;">

                    <?= htmlspecialchars($brand['category']) ?>

                </span>

                <h3 class="brand-card-title"><?= htmlspecialchars($brand['brand_name']) ?></h3>
                <p class="brand-card-desc"><?= htmlspecialchars($brand['brand_description'])  ?></p>

                <a href="#" class="brand-card-link">
                    View Collection <span>→</span>
                </a>
            </div>
        <?php endwhile; ?>
    </div>
</section>


<section class="section" style="padding-top:0;">
    <div class="offer-banner reveal">
        <!-- Decorative rings -->
        <div style="position:absolute;top:-80px;right:-80px;width:300px;height:300px;border:1px solid rgba(201,168,76,0.15);border-radius:50%;pointer-events:none;"></div>
        <div style="position:absolute;bottom:-60px;left:-60px;width:220px;height:220px;border:1px solid rgba(232,143,163,0.1);border-radius:50%;pointer-events:none;"></div>

        <p class="subtitle" style="color:rgba(255,255,255,0.5);margin-bottom:12px;">
            ✦ Limited Time ✦
        </p>
        <h2>Up to <em>50% Off</em><br>Across All Brands</h2>
        <p>Join today and unlock your welcome gift — free shipping +<br>₹500 credits on your first order.</p>

        <div style="display:flex;gap:16px;justify-content:center;flex-wrap:wrap;position:relative;">
            <a href="/brandpromotion/font-view/signup.php" class="btn-glow btn-glow-primary shimmer">
                Claim Offer Now
            </a>
            <a href="/brandpromotion/font-view/login.php" class="btn-glow" style="background:rgba(255,255,255,0.12);color:#fff;border:1px solid rgba(255,255,255,0.25);">
                Sign In
            </a>
        </div>

        <!-- Countdown timer (JS) -->
        <p style="color:rgba(255,255,255,0.45);font-size:.82rem;margin-top:28px;position:relative;">
            Offer ends in: <strong id="countdown" style="color:var(--gold-lt);font-family:'Cormorant Garamond',serif;font-size:1.1rem;">--:--:--</strong>
        </p>
    </div>
</section>



<section class="section" id="testimonials">
    <div class="section-header reveal">
        <p class="subtitle">What Members Say</p>
        <h2>Stories of Delight</h2>
        <div class="divider"></div>
    </div>

    <div class="testimonial-grid">
        <?php while($t = mysqli_fetch_assoc($testimonial_query)): ?>

            <div class="glass-card testimonial-card reveal">
                <div class="testimonial-stars">★★★★★</div>
                <p class="testimonial-text">"<?= htmlspecialchars($t['text']) ?>"</p>
                <div class="testimonial-author">
                    <div class="testimonial-avatar" style="background:<?= $t['color'] ?>">
                        <?= htmlspecialchars($t['avatar']) ?>
                    </div>
                    <div>
                        <div class="testimonial-name"><?= htmlspecialchars($t['name']) ?></div>
                        <div class="testimonial-role"><?= htmlspecialchars($t['role']) ?></div>
                    </div>
                </div>
            </div>
        <?php endwhile; ?>
    </div>
</section>


<script>
    /* ── Scroll Reveal ── */
    (function() {
        const els = document.querySelectorAll('.reveal');
        if (!els.length) return;
        const io = new IntersectionObserver((entries) => {
            entries.forEach(e => {
                if (e.isIntersecting) {
                    e.target.classList.add('visible');
                    io.unobserve(e.target);
                }
            });
        }, {
            threshold: 0.12
        });
        els.forEach(el => io.observe(el));
    })();

    /* ── Countdown Timer ── */
    (function() {
        const el = document.getElementById('countdown');
        if (!el) return;
        let end = localStorage.getItem('bd2_end');
        if (!end || Date.now() > Number(end)) {
            end = Date.now() + 24 * 60 * 60 * 1000; // 24h
            localStorage.setItem('bd2_end', end);
        }

        function tick() {
            const diff = Math.max(0, end - Date.now());
            const h = String(Math.floor(diff / 3600000)).padStart(2, '0');
            const m = String(Math.floor((diff % 3600000) / 60000)).padStart(2, '0');
            const s = String(Math.floor((diff % 60000) / 1000)).padStart(2, '0');
            el.textContent = `${h}:${m}:${s}`;
            if (diff > 0) requestAnimationFrame(tick);
        }
        tick();
    })();

    /* ── Lucide icons (if used inline) ── */
    if (typeof lucide !== 'undefined') lucide.createIcons();
</script>