<?php
// designs/design3/footer.php
// DESIGN 3 — NOIR LUXE | Footer + Newsletter + Bootstrap 5 JS
?>

<style>
/* ── FOOTER ── */
.d3-footer {
  background: var(--d3-surface);
  border-top: 1px solid var(--d3-border);
  padding: 72px 0 0;
}
.d3-footer-brand {
  font-family: 'Playfair Display', serif;
  font-size: 2rem;
  font-weight: 700;
  color: var(--d3-gold);
  text-decoration: none;
  display: inline-block;
  margin-bottom: 4px;
}
.d3-footer-brand small {
  display: block;
  font-family: 'Outfit', sans-serif;
  font-size: .62rem;
  font-weight: 400;
  letter-spacing: .2em;
  text-transform: uppercase;
  color: var(--d3-mute);
  margin-top: -2px;
}
.d3-footer-desc {
  font-size: .87rem;
  color: var(--d3-mute);
  line-height: 1.85;
  max-width: 280px;
  margin-top: 14px;
}
.d3-footer-heading {
  font-family: 'Outfit', sans-serif;
  font-size: .7rem;
  font-weight: 500;
  letter-spacing: .2em;
  text-transform: uppercase;
  color: var(--d3-gold);
  margin-bottom: 20px;
  padding-bottom: 10px;
  border-bottom: 1px solid var(--d3-border);
}
.d3-footer-link {
  display: block;
  font-size: .86rem;
  color: var(--d3-mute);
  text-decoration: none;
  padding: 5px 0;
  transition: color .3s, padding-left .3s;
  position: relative;
}
.d3-footer-link:hover {
  color: var(--d3-gold);
  padding-left: 8px;
}
.d3-footer-link::before {
  content: '';
  position: absolute;
  left: 0; top: 50%;
  transform: translateY(-50%);
  width: 0; height: 1px;
  background: var(--d3-gold);
  transition: width .3s;
}
.d3-footer-link:hover::before { width: 4px; }

.d3-social-btn {
  width: 38px; height: 38px;
  border-radius: 10px;
  display: inline-flex; align-items: center; justify-content: center;
  background: rgba(212,175,55,.08);
  border: 1px solid var(--d3-border);
  color: var(--d3-mute);
  font-size: .95rem;
  text-decoration: none;
  transition: all .3s;
}
.d3-social-btn:hover {
  background: var(--d3-gold);
  border-color: var(--d3-gold);
  color: #080c14;
  transform: translateY(-2px);
}

.d3-footer-bottom {
  margin-top: 48px;
  padding: 22px 0;
  border-top: 1px solid var(--d3-border);
}

/* ── BACK TO TOP ── */
#d3-back-top {
  position: fixed;
  bottom: 32px; right: 32px;
  width: 46px; height: 46px;
  border-radius: 12px;
  background: linear-gradient(135deg, var(--d3-gold), #a07010);
  color: #080c14;
  font-size: 1.1rem;
  display: flex; align-items: center; justify-content: center;
  cursor: pointer;
  border: none;
  box-shadow: 0 4px 20px rgba(212,175,55,.4);
  opacity: 0;
  transform: translateY(20px);
  transition: all .4s var(--d3-transition);
  z-index: 999;
}
#d3-back-top.show { opacity: 1; transform: translateY(0); }
#d3-back-top:hover { transform: translateY(-3px); box-shadow: 0 8px 32px rgba(212,175,55,.6); }
</style>


<!-- ═══════════════════════════════════════
     NEWSLETTER STRIP
════════════════════════════════════════ -->
<section class="py-5" style="background: linear-gradient(135deg, #0e1420, #131926);">
  <div class="container">
    <div class="row align-items-center gy-4">
      <div class="col-lg-5 d3-reveal">
        <p class="d3-section-label mb-2"><i class="bi bi-envelope-fill me-2"></i>Newsletter</p>
        <h3 style="font-family:'Playfair Display',serif;font-size:1.8rem;color:var(--d3-white);margin-bottom:10px;">
          Get Exclusive Drops <span class="text-gold">First</span>
        </h3>
        <p style="font-size:.88rem;color:var(--d3-mute);margin:0;">
          Flash sales, new arrivals, and VIP offers — straight to your inbox.
        </p>
      </div>
      <div class="col-lg-7 d3-reveal">
        <form onsubmit="d3Newsletter(event)" class="d-flex flex-column flex-sm-row gap-3">
          <input
            type="email"
            id="d3-nl-email"
            class="d3-nl-input flex-grow-1"
            placeholder="your@email.com"
            required
          />
          <button type="submit" id="d3-nl-btn" class="btn-d3-gold flex-shrink-0">
            <i class="bi bi-send-fill"></i> Subscribe
          </button>
        </form>
        <p id="d3-nl-msg" style="font-size:.8rem;color:#00e696;margin-top:10px;display:none;">
          <i class="bi bi-check-circle-fill me-1"></i> Welcome aboard! Check your inbox for a gift.
        </p>
      </div>
    </div>
  </div>
</section>


<!-- ═══════════════════════════════════════
     FOOTER
════════════════════════════════════════ -->
<footer class="d3-footer">
  <div class="container">
    <div class="row gy-5">

      <!-- Brand col -->
      <div class="col-lg-4">
        <a href="/brandpromotion/font-view/index.php" class="d3-footer-brand">
          BrandElite
          <small>Multi Brand Promotion</small>
        </a>
        <p class="d3-footer-desc">
          Connecting premium brands with discerning buyers through exclusive
          promotions, curated experiences, and unparalleled loyalty rewards.
        </p>
        <!-- Socials -->
        <div class="d-flex gap-2 mt-4">
          <?php
          $socials = [
            ['icon'=>'bi-twitter-x',   'href'=>'#','label'=>'Twitter'],
            ['icon'=>'bi-instagram',   'href'=>'#','label'=>'Instagram'],
            ['icon'=>'bi-facebook',    'href'=>'#','label'=>'Facebook'],
            ['icon'=>'bi-youtube',     'href'=>'#','label'=>'YouTube'],
            ['icon'=>'bi-linkedin',    'href'=>'#','label'=>'LinkedIn'],
          ];
          foreach($socials as $s): ?>
          <a href="<?= $s['href'] ?>" class="d3-social-btn" aria-label="<?= $s['label'] ?>">
            <i class="bi <?= $s['icon'] ?>"></i>
          </a>
          <?php endforeach; ?>
        </div>

        <!-- App badges -->
        <div class="mt-4">
          <p style="font-size:.72rem;letter-spacing:.12em;text-transform:uppercase;color:var(--d3-mute);margin-bottom:10px;">Available on</p>
          <div class="d-flex gap-2">
            <a href="#" style="display:inline-flex;align-items:center;gap:8px;padding:8px 14px;border-radius:8px;border:1px solid var(--d3-border);background:rgba(255,255,255,.04);text-decoration:none;">
              <i class="bi bi-apple text-gold" style="font-size:1.1rem;"></i>
              <div><div style="font-size:.62rem;color:var(--d3-mute);">Download on</div><div style="font-size:.8rem;color:var(--d3-white);font-weight:500;">App Store</div></div>
            </a>
            <a href="#" style="display:inline-flex;align-items:center;gap:8px;padding:8px 14px;border-radius:8px;border:1px solid var(--d3-border);background:rgba(255,255,255,.04);text-decoration:none;">
              <i class="bi bi-google-play text-gold" style="font-size:1.1rem;"></i>
              <div><div style="font-size:.62rem;color:var(--d3-mute);">Get it on</div><div style="font-size:.8rem;color:var(--d3-white);font-weight:500;">Google Play</div></div>
            </a>
          </div>
        </div>
      </div>

      <!-- Links cols -->
      <div class="col-6 col-md-4 col-lg-2 offset-lg-1">
        <div class="d3-footer-heading">Brands</div>
        <?php
        $brands_list = ['Lumière Paris','Velour Athletics','Casa Verde','Rosé & Co.','Orion Tech','Nomad Table'];
        foreach($brands_list as $b): ?>
        <a href="#" class="d3-footer-link"><?= htmlspecialchars($b) ?></a>
        <?php endforeach; ?>
      </div>

      <div class="col-6 col-md-4 col-lg-2">
        <div class="d3-footer-heading">Company</div>
        <?php
        $company = ['About Us','Careers','Press','Partner With Us','Sustainability','Blog'];
        foreach($company as $c): ?>
        <a href="#" class="d3-footer-link"><?= htmlspecialchars($c) ?></a>
        <?php endforeach; ?>
      </div>

      <div class="col-6 col-md-4 col-lg-2">
        <div class="d3-footer-heading">Support</div>
        <?php
        $support = ['Help Center','Contact Us','Returns','Shipping Info','Privacy Policy','Terms of Use'];
        foreach($support as $s): ?>
        <a href="#" class="d3-footer-link"><?= htmlspecialchars($s) ?></a>
        <?php endforeach; ?>
      </div>

    </div>

    <!-- Bottom bar -->
    <div class="d3-footer-bottom">
      <div class="row align-items-center gy-2">
        <div class="col-md-6">
          <p style="font-size:.78rem;color:var(--d3-mute);margin:0;">
            © <?= date('Y') ?> BrandElite — Multi Brand Promotion. All rights reserved.
          </p>
        </div>
        <div class="col-md-6 text-md-end">
          <div class="d-flex flex-wrap gap-3 justify-content-md-end">
            <a href="#" style="font-size:.75rem;color:var(--d3-mute);text-decoration:none;transition:color .3s;" onmouseover="this.style.color='var(--d3-gold)'" onmouseout="this.style.color='var(--d3-mute)'">Privacy Policy</a>
            <a href="#" style="font-size:.75rem;color:var(--d3-mute);text-decoration:none;transition:color .3s;" onmouseover="this.style.color='var(--d3-gold)'" onmouseout="this.style.color='var(--d3-mute)'">Terms of Use</a>
            <a href="#" style="font-size:.75rem;color:var(--d3-mute);text-decoration:none;transition:color .3s;" onmouseover="this.style.color='var(--d3-gold)'" onmouseout="this.style.color='var(--d3-mute)'">Cookie Policy</a>
          </div>
          <p style="font-size:.75rem;color:var(--d3-mute);margin:6px 0 0;">
            Made with <span style="color:var(--d3-accent1);">♥</span> in India
          </p>
        </div>
      </div>
    </div>
  </div>
</footer>


<!-- Back to top -->
<button id="d3-back-top" aria-label="Back to top">
  <i class="bi bi-arrow-up"></i>
</button>


<!-- ═══════════════════════════════════════
     BOOTSTRAP 5 JS + SCRIPTS
════════════════════════════════════════ -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<script>
/* Newsletter */
function d3Newsletter(e){
  e.preventDefault();
  const btn = document.getElementById('d3-nl-btn');
  const msg = document.getElementById('d3-nl-msg');
  btn.innerHTML = '<i class="bi bi-check-circle-fill"></i> Done!';
  btn.style.background = 'linear-gradient(135deg,#00e696,#00a060)';
  msg.style.display = 'block';
  setTimeout(()=>{
    btn.innerHTML = '<i class="bi bi-send-fill"></i> Subscribe';
    btn.style.background = '';
    msg.style.display = 'none';
    document.getElementById('d3-nl-email').value = '';
  }, 4000);
}

/* Back to top */
const bttBtn = document.getElementById('d3-back-top');
window.addEventListener('scroll', ()=>{
  bttBtn.classList.toggle('show', window.scrollY > 400);
});
bttBtn.addEventListener('click', ()=> window.scrollTo({top:0,behavior:'smooth'}));
</script>

</body>
</html>