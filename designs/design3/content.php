<?php
// designs/design3/content.php
// DESIGN 3 — NOIR LUXE | All sections with Bootstrap layout + internal CSS

$brands = [
  ['name'=>'Lumière Paris',    'icon'=>'bi-flower1',        'color'=>'#d4af37','badge'=>'Skincare',  'bc'=>'d3-badge-gold',  'desc'=>'Rare botanical luxury skincare from the heart of Paris.'],
  ['name'=>'Velour Athletics', 'icon'=>'bi-lightning-fill', 'color'=>'#00d4ff','badge'=>'Sport',     'bc'=>'d3-badge-cyan',  'desc'=>'Elite performance wear engineered for champions.'],
  ['name'=>'Casa Verde',       'icon'=>'bi-tree-fill',      'color'=>'#00e696','badge'=>'Home',      'bc'=>'d3-badge-green', 'desc'=>'Sustainable living goods rooted in natural beauty.'],
  ['name'=>'Rosé & Co.',       'icon'=>'bi-heart-fill',     'color'=>'#e84393','badge'=>'Beauty',    'bc'=>'d3-badge-pink',  'desc'=>'Bold cosmetics that celebrate every skin story.'],
  ['name'=>'Orion Tech',       'icon'=>'bi-cpu-fill',       'color'=>'#a78bfa','badge'=>'Tech',      'bc'=>'d3-badge-gold',  'desc'=>'Precision gadgets designed to elevate the everyday.'],
  ['name'=>'Nomad Table',      'icon'=>'bi-cup-hot-fill',   'color'=>'#fb923c','badge'=>'Gourmet',   'bc'=>'d3-badge-pink',  'desc'=>'Artisan flavors sourced from every corner of the globe.'],
];

$features = [
  ['icon'=>'bi-gem',            'title'=>'Curated Collections',  'desc'=>'Every brand handpicked for quality, ethics, and innovation.'],
  ['icon'=>'bi-shield-check',   'title'=>'Secure Transactions',  'desc'=>'End-to-end encrypted payments with multi-layer protection.'],
  ['icon'=>'bi-truck',          'title'=>'Express Delivery',     'desc'=>'Same-day delivery available in 150+ premium cities.'],
  ['icon'=>'bi-award',          'title'=>'Elite Membership',     'desc'=>'Unlock VIP perks, early access, and exclusive member pricing.'],
  ['icon'=>'bi-arrow-repeat',   'title'=>'Easy Returns',         'desc'=>'Hassle-free 30-day returns with no questions asked.'],
  ['icon'=>'bi-headset',        'title'=>'Concierge Support',    'desc'=>'White-glove support available 24/7 for every member.'],
];

$testimonials = [
  ['text'=>'BrandElite is not just a platform — it\'s a lifestyle upgrade. The curation is impeccable and every deal feels personally crafted.', 'name'=>'Kavya Reddy', 'role'=>'Fashion Editor', 'init'=>'KR', 'color'=>'var(--d3-gold)'],
  ['text'=>'I\'ve saved over ₹40,000 this year alone. The loyalty programme is genuinely the best in the industry.', 'name'=>'Rohan Desai', 'role'=>'Tech Entrepreneur', 'init'=>'RD', 'color'=>'#00d4ff'],
  ['text'=>'As a brand founder, BrandElite gave us access to a premium audience we never could have reached on our own.', 'name'=>'Sneha Joshi', 'role'=>'Co-Founder, Lumière', 'init'=>'SJ', 'color'=>'#e84393'],
];
?>

<style>
/* ── HERO ── */
.d3-hero {
  min-height: 100vh;
  display: flex;
  align-items: center;
  position: relative;
  padding: 80px 0 60px;
  overflow: hidden;
}
.d3-hero-grid-bg {
  position: absolute;
  inset: 0;
  background-image:
    linear-gradient(rgba(212,175,55,0.04) 1px, transparent 1px),
    linear-gradient(90deg, rgba(212,175,55,0.04) 1px, transparent 1px);
  background-size: 60px 60px;
  mask-image: radial-gradient(ellipse 80% 80% at 50% 50%, black, transparent);
  pointer-events: none;
}
.d3-hero-glow {
  position: absolute;
  width: 600px; height: 600px;
  border-radius: 50%;
  background: radial-gradient(circle, rgba(212,175,55,0.08), transparent 70%);
  top: 50%; left: 50%;
  transform: translate(-50%,-50%);
  pointer-events: none;
  animation: d3glow 6s ease-in-out infinite alternate;
}
@keyframes d3glow {
  from { transform:translate(-50%,-50%) scale(1); opacity:.6; }
  to   { transform:translate(-50%,-50%) scale(1.2); opacity:1; }
}
.d3-hero-badge-line {
  display: flex;
  align-items: center;
  gap: 14px;
  margin-bottom: 28px;
  animation: d3fadeUp .7s .1s ease both;
}
.d3-hero-badge-line::before,
.d3-hero-badge-line::after {
  content:'';
  flex: 1;
  height: 1px;
  background: linear-gradient(90deg, transparent, var(--d3-border));
}
.d3-hero-badge-line::after {
  background: linear-gradient(90deg, var(--d3-border), transparent);
}

/* ── MARQUEE ── */
.d3-marquee-wrap {
  overflow: hidden;
  background: var(--d3-surface);
  border-top: 1px solid var(--d3-border);
  border-bottom: 1px solid var(--d3-border);
  padding: 14px 0;
}
.d3-marquee-track {
  display: flex;
  gap: 0;
  white-space: nowrap;
  animation: d3marquee 20s linear infinite;
}
.d3-marquee-track:hover { animation-play-state: paused; }
.d3-marquee-item {
  display: inline-flex;
  align-items: center;
  gap: 10px;
  padding: 0 32px;
  font-family: 'Outfit', sans-serif;
  font-size: .8rem;
  font-weight: 500;
  letter-spacing: .12em;
  text-transform: uppercase;
  color: var(--d3-mute);
  border-right: 1px solid var(--d3-border);
  flex-shrink: 0;
}
.d3-marquee-item i { color: var(--d3-gold); font-size: .85rem; }
@keyframes d3marquee {
  from { transform: translateX(0); }
  to   { transform: translateX(-50%); }
}

/* ── BRAND CARD ── */
.d3-brand-icon-wrap {
  width: 52px; height: 52px;
  border-radius: 12px;
  display: flex; align-items: center; justify-content: center;
  font-size: 1.4rem;
  margin-bottom: 16px;
  position: relative;
}
.d3-brand-icon-wrap::after {
  content:'';
  position:absolute;
  inset:-1px;
  border-radius:13px;
  border:1px solid currentColor;
  opacity:.25;
}

/* ── OFFER SECTION ── */
.d3-offer-section {
  position: relative;
  overflow: hidden;
  background: var(--d3-surface);
  border-top: 1px solid var(--d3-border);
  border-bottom: 1px solid var(--d3-border);
}
.d3-offer-section::before {
  content:'';
  position:absolute;
  top:-200px; left:-200px;
  width:500px; height:500px;
  border-radius:50%;
  background:radial-gradient(circle, rgba(212,175,55,0.09), transparent 65%);
  pointer-events:none;
}
.d3-offer-section::after {
  content:'';
  position:absolute;
  bottom:-200px; right:-200px;
  width:500px; height:500px;
  border-radius:50%;
  background:radial-gradient(circle, rgba(0,212,255,0.06), transparent 65%);
  pointer-events:none;
}
.d3-offer-number {
  font-family:'Playfair Display',serif;
  font-size: clamp(5rem,12vw,10rem);
  font-weight:700;
  line-height:1;
  background: linear-gradient(135deg, rgba(212,175,55,.12), rgba(212,175,55,.04));
  -webkit-background-clip:text;
  -webkit-text-fill-color:transparent;
  background-clip:text;
  user-select:none;
  position:absolute;
  right: 5%;
  top:50%;
  transform:translateY(-50%);
  pointer-events:none;
  letter-spacing:-0.05em;
}

/* ── FEATURE CARD ── */
.d3-feature-card {
  background: var(--d3-card);
  border: 1px solid var(--d3-border);
  border-radius: var(--d3-radius);
  padding: 28px 24px;
  height: 100%;
  transition: transform var(--d3-transition), border-color var(--d3-transition), box-shadow var(--d3-transition);
  position: relative;
  overflow: hidden;
}
.d3-feature-card::after {
  content:'';
  position:absolute;
  bottom:0; left:0; right:0;
  height:2px;
  background: linear-gradient(90deg, transparent, var(--d3-gold), transparent);
  transform: scaleX(0);
  transition: transform var(--d3-transition);
}
.d3-feature-card:hover { transform:translateY(-4px); border-color:rgba(212,175,55,.35); box-shadow:0 12px 40px rgba(0,0,0,.4); }
.d3-feature-card:hover::after { transform:scaleX(1); }
.d3-feature-icon {
  width:46px; height:46px;
  border-radius:10px;
  background:var(--d3-gold-dim);
  border:1px solid var(--d3-border);
  display:flex; align-items:center; justify-content:center;
  font-size:1.2rem;
  color:var(--d3-gold);
  margin-bottom:16px;
  transition: transform .3s, background .3s;
}
.d3-feature-card:hover .d3-feature-icon { transform:scale(1.1) rotate(-4deg); background:rgba(212,175,55,.2); }

/* ── TESTIMONIAL ── */
.d3-tcard {
  background: var(--d3-card);
  border: 1px solid var(--d3-border);
  border-radius: var(--d3-radius);
  padding: 32px 28px;
  height: 100%;
  position: relative;
  overflow: hidden;
  transition: transform var(--d3-transition), box-shadow var(--d3-transition);
}
.d3-tcard:hover { transform:translateY(-4px); box-shadow:0 16px 50px rgba(0,0,0,.5); }
.d3-tcard-quote {
  font-family:'Playfair Display',serif;
  font-size:3.5rem;
  line-height:.8;
  color:var(--d3-gold);
  opacity:.25;
  margin-bottom:8px;
  user-select:none;
}
.d3-tcard-text {
  font-size:.92rem;
  color:var(--d3-silver);
  line-height:1.8;
  margin-bottom:22px;
  font-style:italic;
}
.d3-tcard-avatar {
  width:42px; height:42px; border-radius:50%;
  display:flex; align-items:center; justify-content:center;
  font-size:.82rem; font-weight:600;
  color: #080c14;
  flex-shrink:0;
}
.d3-tcard-stars { color:var(--d3-gold); font-size:.85rem; letter-spacing:2px; margin-bottom:16px; }

/* ── NEWSLETTER ── */
.d3-nl-input {
  background: rgba(255,255,255,.05);
  border: 1px solid var(--d3-border);
  border-radius: 100px;
  padding: 14px 24px;
  color: var(--d3-white);
  font-family: 'Outfit', sans-serif;
  font-size: .9rem;
  outline: none;
  width: 100%;
  transition: border-color .3s, box-shadow .3s;
}
.d3-nl-input::placeholder { color: var(--d3-mute); }
.d3-nl-input:focus {
  border-color: var(--d3-gold);
  box-shadow: 0 0 0 3px rgba(212,175,55,.1);
}
</style>


<!-- ═══════════════════════════════════════
     HERO
════════════════════════════════════════ -->
<section class="d3-hero">
  <div class="d3-hero-grid-bg"></div>
  <div class="d3-hero-glow"></div>

  <div class="container position-relative" style="z-index:1;">
    <div class="row align-items-center gy-5">

      <!-- Left content -->
      <div class="col-lg-7">
        <div class="d3-hero-badge-line">
          <span class="label-pill"><span class="pulse-dot"></span>Premium Brand Hub — 2025</span>
        </div>

        <h1 class="display-gold mb-4" style="animation:d3fadeUp .7s .2s ease both;">
          Discover<br>
          <em style="color:var(--d3-gold);">Elite Brands.</em><br>
          Unlock Rewards.
        </h1>

        <p class="text-silver mb-5" style="font-size:1.05rem;line-height:1.85;max-width:500px;animation:d3fadeUp .7s .4s ease both;">
          Your gateway to 120+ premium brands with exclusive member deals,
          loyalty points, and a curated shopping experience unlike anything else.
        </p>

        <div class="d-flex flex-wrap gap-3" style="animation:d3fadeUp .7s .55s ease both;">
          <a href="/brandpromotion/font-view/signup.php" class="btn-d3-gold">
            <i class="bi bi-stars"></i> Explore Now
          </a>
          <a href="#brands" class="btn-d3-outline">
            <i class="bi bi-grid"></i> View Brands
          </a>
        </div>

        <!-- Trust signals -->
        <div class="d-flex flex-wrap gap-4 mt-5" style="animation:d3fadeUp .7s .7s ease both;">
          <div class="d-flex align-items-center gap-2">
            <i class="bi bi-shield-check text-gold"></i>
            <span style="font-size:.8rem;color:var(--d3-mute);">Secure & Verified</span>
          </div>
          <div class="d-flex align-items-center gap-2">
            <i class="bi bi-star-fill text-gold"></i>
            <span style="font-size:.8rem;color:var(--d3-mute);">4.9 / 5 Rating</span>
          </div>
          <div class="d-flex align-items-center gap-2">
            <i class="bi bi-people-fill text-gold"></i>
            <span style="font-size:.8rem;color:var(--d3-mute);">50,000+ Members</span>
          </div>
        </div>
      </div>

      <!-- Right: stat cards -->
      <div class="col-lg-5">
        <div class="row g-3" style="animation:d3fadeUp .7s .5s ease both;">
          <div class="col-6">
            <div class="d3-stat">
              <div class="d3-stat-num">120+</div>
              <div class="d3-stat-label">Premium Brands</div>
            </div>
          </div>
          <div class="col-6">
            <div class="d3-stat">
              <div class="d3-stat-num">50K</div>
              <div class="d3-stat-label">Active Members</div>
            </div>
          </div>
          <div class="col-6">
            <div class="d3-stat">
              <div class="d3-stat-num">₹2Cr</div>
              <div class="d3-stat-label">Total Savings</div>
            </div>
          </div>
          <div class="col-6">
            <div class="d3-stat">
              <div class="d3-stat-num">98%</div>
              <div class="d3-stat-label">Satisfaction</div>
            </div>
          </div>
        </div>

        <!-- Floating promo card -->
        <div class="d3-card mt-3 p-3 d-flex align-items-center gap-3" style="animation:d3fadeUp .7s .7s ease both;">
          <div style="width:44px;height:44px;border-radius:10px;background:rgba(212,175,55,.15);border:1px solid var(--d3-border);display:flex;align-items:center;justify-content:center;flex-shrink:0;">
            <i class="bi bi-gift-fill text-gold" style="font-size:1.2rem;"></i>
          </div>
          <div>
            <div style="font-size:.82rem;font-weight:600;color:var(--d3-white);">Welcome Gift Unlocked</div>
            <div style="font-size:.75rem;color:var(--d3-mute);">₹500 credit + Free shipping on first order</div>
          </div>
          <span class="d3-badge d3-badge-gold ms-auto">New</span>
        </div>
      </div>
    </div>
  </div>
</section>


<!-- ═══════════════════════════════════════
     MARQUEE TICKER
════════════════════════════════════════ -->
<div class="d3-marquee-wrap">
  <div class="d3-marquee-track">
    <?php
    $items = ['Exclusive Member Deals','Free Shipping on ₹999+','New Brands Added Weekly','Earn LuxPoints on Every Order','30-Day Easy Returns','24/7 Concierge Support','Flash Sales Every Friday','Verified Premium Brands'];
    // Duplicate for seamless loop
    $all = array_merge($items, $items);
    foreach($all as $item): ?>
    <div class="d3-marquee-item">
      <i class="bi bi-diamond-fill"></i>
      <?= htmlspecialchars($item) ?>
    </div>
    <?php endforeach; ?>
  </div>
</div>


<!-- ═══════════════════════════════════════
     BRAND SHOWCASE
════════════════════════════════════════ -->
<section class="py-5 my-3" id="brands">
  <div class="container">
    <div class="text-center mb-5 d3-reveal">
      <p class="d3-section-label"><i class="bi bi-diamond-fill me-2"></i>Featured Collections</p>
      <h2 class="d3-section-title">Our Brand Universe</h2>
      <div class="gold-divider-center mt-3"></div>
    </div>

    <div class="row g-4">
      <?php foreach($brands as $i => $b): ?>
      <div class="col-md-6 col-lg-4 d3-reveal" style="transition-delay:<?= $i * 0.08 ?>s;">
        <div class="d3-card p-4 h-100">
          <div class="d-flex justify-content-between align-items-start mb-3">
            <div class="d3-brand-icon-wrap" style="background:<?= $b['color'] ?>22; color:<?= $b['color'] ?>;">
              <i class="bi <?= $b['icon'] ?>"></i>
            </div>
            <span class="d3-badge <?= $b['bc'] ?>"><?= $b['badge'] ?></span>
          </div>

          <h5 class="mb-2" style="font-family:'Playfair Display',serif;color:var(--d3-white);font-size:1.2rem;">
            <?= htmlspecialchars($b['name']) ?>
          </h5>
          <p style="font-size:.86rem;color:var(--d3-mute);line-height:1.75;margin-bottom:20px;">
            <?= htmlspecialchars($b['desc']) ?>
          </p>

          <a href="#" class="d-inline-flex align-items-center gap-2 text-decoration-none"
             style="font-size:.78rem;font-weight:500;letter-spacing:.08em;text-transform:uppercase;color:<?= $b['color'] ?>;transition:gap .3s;"
             onmouseover="this.style.gap='14px'" onmouseout="this.style.gap='8px'">
            Explore Collection <i class="bi bi-arrow-right"></i>
          </a>
        </div>
      </div>
      <?php endforeach; ?>
    </div>

    <!-- CTA row -->
    <div class="text-center mt-5 d3-reveal">
      <a href="#" class="btn-d3-outline">
        <i class="bi bi-grid-3x3-gap"></i> View All 120+ Brands
      </a>
    </div>
  </div>
</section>


<!-- ═══════════════════════════════════════
     OFFER BANNER
════════════════════════════════════════ -->
<section class="d3-offer-section py-5 my-3">
  <div class="d3-offer-number">50%</div>
  <div class="container position-relative" style="z-index:1;">
    <div class="row align-items-center gy-4">
      <div class="col-lg-7 d3-reveal">
        <p class="d3-section-label mb-3"><i class="bi bi-clock-history me-2"></i>Limited Time Offer</p>
        <h2 style="font-family:'Playfair Display',serif;font-size:clamp(2rem,4vw,3.2rem);color:var(--d3-white);margin-bottom:16px;">
          Up to <span class="text-gold">50% Off</span><br>Across All Brands
        </h2>
        <p style="font-size:.95rem;color:var(--d3-mute);line-height:1.8;margin-bottom:28px;max-width:480px;">
          Sign up today and receive your welcome package — ₹500 account credits,
          free express shipping, and priority access to flash sales.
        </p>
        <div class="d-flex flex-wrap gap-3">
          <a href="/brandpromotion/font-view/signup.php" class="btn-d3-gold">
            <i class="bi bi-lightning-fill"></i> Claim Offer
          </a>
          <div class="d-flex align-items-center gap-2" style="color:var(--d3-mute);font-size:.85rem;">
            <i class="bi bi-hourglass-split text-gold"></i>
            Ends in: <strong id="d3countdown" style="color:var(--d3-gold-lt);font-family:'Playfair Display',serif;font-size:1.05rem;">--:--:--</strong>
          </div>
        </div>
      </div>
      <div class="col-lg-5 d3-reveal">
        <div class="row g-3">
          <?php
          $perks = [
            ['icon'=>'bi-cash-coin',       'title'=>'₹500 Credits',       'desc'=>'Instant on signup'],
            ['icon'=>'bi-truck',           'title'=>'Free Shipping',      'desc'=>'On your first 3 orders'],
            ['icon'=>'bi-calendar-event',  'title'=>'Flash Sale Access',  'desc'=>'Every Friday priority'],
            ['icon'=>'bi-gift',            'title'=>'Birthday Gift',      'desc'=>'Exclusive member perk'],
          ];
          foreach($perks as $p): ?>
          <div class="col-6">
            <div style="background:rgba(255,255,255,.04);border:1px solid var(--d3-border);border-radius:10px;padding:18px 16px;">
              <i class="bi <?= $p['icon'] ?> text-gold d-block mb-2" style="font-size:1.3rem;"></i>
              <div style="font-size:.88rem;font-weight:500;color:var(--d3-white);"><?= $p['title'] ?></div>
              <div style="font-size:.75rem;color:var(--d3-mute);"><?= $p['desc'] ?></div>
            </div>
          </div>
          <?php endforeach; ?>
        </div>
      </div>
    </div>
  </div>
</section>


<!-- ═══════════════════════════════════════
     WHY BRANDLITE — FEATURES
════════════════════════════════════════ -->
<section class="py-5 my-3">
  <div class="container">
    <div class="text-center mb-5 d3-reveal">
      <p class="d3-section-label"><i class="bi bi-diamond-fill me-2"></i>Why Choose Us</p>
      <h2 class="d3-section-title">Built for the Discerning Buyer</h2>
      <div class="gold-divider-center mt-3"></div>
    </div>

    <div class="row g-4">
      <?php foreach($features as $i => $f): ?>
      <div class="col-md-6 col-lg-4 d3-reveal" style="transition-delay:<?= $i * 0.07 ?>s;">
        <div class="d3-feature-card">
          <div class="d3-feature-icon">
            <i class="bi <?= $f['icon'] ?>"></i>
          </div>
          <h6 style="font-family:'Outfit',sans-serif;font-size:.95rem;font-weight:600;color:var(--d3-white);margin-bottom:8px;">
            <?= htmlspecialchars($f['title']) ?>
          </h6>
          <p style="font-size:.83rem;color:var(--d3-mute);line-height:1.75;margin:0;">
            <?= htmlspecialchars($f['desc']) ?>
          </p>
        </div>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>


<!-- ═══════════════════════════════════════
     TESTIMONIALS
════════════════════════════════════════ -->
<section class="py-5 my-3" style="background:var(--d3-surface);border-top:1px solid var(--d3-border);border-bottom:1px solid var(--d3-border);">
  <div class="container">
    <div class="text-center mb-5 d3-reveal">
      <p class="d3-section-label"><i class="bi bi-diamond-fill me-2"></i>Member Stories</p>
      <h2 class="d3-section-title">Voices of Our Community</h2>
      <div class="gold-divider-center mt-3"></div>
    </div>

    <div class="row g-4">
      <?php foreach($testimonials as $i => $t): ?>
      <div class="col-md-4 d3-reveal" style="transition-delay:<?= $i * 0.1 ?>s;">
        <div class="d3-tcard">
          <div class="d3-tcard-quote">"</div>
          <div class="d3-tcard-stars">★★★★★</div>
          <p class="d3-tcard-text"><?= htmlspecialchars($t['text']) ?></p>
          <div class="d-flex align-items-center gap-3">
            <div class="d3-tcard-avatar" style="background:<?= $t['color'] ?>;">
              <?= htmlspecialchars($t['init']) ?>
            </div>
            <div>
              <div style="font-size:.88rem;font-weight:500;color:var(--d3-white);"><?= htmlspecialchars($t['name']) ?></div>
              <div style="font-size:.75rem;color:var(--d3-mute);"><?= htmlspecialchars($t['role']) ?></div>
            </div>
          </div>
        </div>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>


<!-- ═══════════════════════════════════════
     SCRIPTS
════════════════════════════════════════ -->
<script>
/* Scroll reveal */
(function(){
  const els = document.querySelectorAll('.d3-reveal');
  const io = new IntersectionObserver(entries=>{
    entries.forEach(e=>{
      if(e.isIntersecting){ e.target.classList.add('visible'); io.unobserve(e.target); }
    });
  },{threshold:.12});
  els.forEach(el=>io.observe(el));
})();

/* Countdown */
(function(){
  const el = document.getElementById('d3countdown');
  if(!el) return;
  let end = localStorage.getItem('d3end');
  if(!end || Date.now()>Number(end)){
    end = Date.now() + 24*60*60*1000;
    localStorage.setItem('d3end', end);
  }
  function tick(){
    const diff = Math.max(0, end - Date.now());
    const h = String(Math.floor(diff/3600000)).padStart(2,'0');
    const m = String(Math.floor((diff%3600000)/60000)).padStart(2,'0');
    const s = String(Math.floor((diff%60000)/1000)).padStart(2,'0');
    el.textContent = h+':'+m+':'+s;
    if(diff>0) requestAnimationFrame(tick);
  }
  tick();
})();
</script>