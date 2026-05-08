<?php
// designs/design2/footer.php
// Aurora Light Theme — Footer
?>

<!-- ═══════════════════════════════════════
     NEWSLETTER STRIP
════════════════════════════════════════ -->
<section class="section" style="padding-top:0;padding-bottom:60px;">
    <div class="glass-card reveal" style="padding:48px 44px;text-align:center;max-width:620px;margin:0 auto;">
        <p class="subtitle" style="margin-bottom:10px;">Stay in the loop</p>
        <h3 style="font-family:'Cormorant Garamond',serif;font-size:2rem;font-weight:300;margin-bottom:12px;color:var(--ink);">
            Get Exclusive Drops First
        </h3>
        <p style="font-size:.9rem;color:var(--ink-soft);margin-bottom:28px;line-height:1.75;">
            New brands, flash sales, and curated picks — straight to your inbox.
        </p>
        <form onsubmit="handleNewsletter(event)" style="display:flex;gap:12px;justify-content:center;flex-wrap:wrap;">
            <input
                type="email"
                id="nl-email"
                placeholder="your@email.com"
                required
                style="
          padding:13px 20px;
          border-radius:100px;
          border:1.5px solid rgba(201,168,76,0.3);
          background:rgba(255,255,255,0.8);
          font-family:'DM Sans',sans-serif;
          font-size:.9rem;
          color:var(--ink);
          outline:none;
          min-width:240px;
          flex:1;
          transition:border-color .3s;
        "
                onfocus="this.style.borderColor='var(--gold)'"
                onblur="this.style.borderColor='rgba(201,168,76,.3)'" />
            <button type="submit" class="btn-glow btn-glow-primary shimmer">
                Subscribe ✦
            </button>
        </form>
        <p id="nl-msg" style="margin-top:14px;font-size:.82rem;color:var(--mint);display:none;">
            🎉 You're in! Check your inbox for a welcome gift.
        </p>
    </div>
</section>


<!-- ═══════════════════════════════════════
     FOOTER
════════════════════════════════════════ -->
<footer class="footer" role="contentinfo">
    <div class="footer-grid">

        <!-- Brand Column -->
        <div>
            <a href="/brandpromotion/font-view/index.php" class="nav-brand" style="font-size:1.8rem;">
                BrandLux
                <span>Multi Brand Promotion</span>
            </a>
            <p class="footer-brand-desc">
                Connecting you with the world's most exciting brands through
                curated promotions, exclusive deals, and a community that
                celebrates beautiful living.
            </p>
            <!-- Social icons -->
            <div style="display:flex;gap:12px;margin-top:20px;">
                <?php
                $socials = [
                    ['icon' => '𝕏', 'href' => '#', 'label' => 'Twitter/X'],
                    ['icon' => 'in', 'href' => '#', 'label' => 'Instagram'],
                    ['icon' => 'fb', 'href' => '#', 'label' => 'Facebook'],
                    ['icon' => '▶', 'href' => '#', 'label' => 'YouTube'],
                ];
                foreach ($socials as $s): ?>
                    <a href="<?= $s['href'] ?>" aria-label="<?= $s['label'] ?>"
                        style="
             width:38px;height:38px;border-radius:50%;
             display:flex;align-items:center;justify-content:center;
             background:rgba(201,168,76,0.1);
             border:1px solid rgba(201,168,76,0.2);
             font-size:.78rem;font-weight:700;
             color:var(--ink-soft);text-decoration:none;
             transition:all .3s;
           "
                        onmouseover="this.style.background='var(--gold)';this.style.color='white';this.style.borderColor='var(--gold)'"
                        onmouseout="this.style.background='rgba(201,168,76,.1)';this.style.color='var(--ink-soft)';this.style.borderColor='rgba(201,168,76,.2)'"><?= $s['icon'] ?></a>
                <?php endforeach; ?>
            </div>
        </div>

        <!-- Brands -->
        <div class="footer-col">
            <h5>Brands</h5>
            <ul>
                <li><a href="#">Lumière Paris</a></li>
                <li><a href="#">Velour Athletics</a></li>
                <li><a href="#">Casa Verde</a></li>
                <li><a href="#">Rosé &amp; Co.</a></li>
                <li><a href="#">Orion Tech</a></li>
                <li><a href="#">Nomad Table</a></li>
            </ul>
        </div>

        <!-- Company -->
        <div class="footer-col">
            <h5>Company</h5>
            <ul>
                <li><a href="/brandpromotion/font-view/about.php">About Us</a></li>
                <li><a href="#">Careers</a></li>
                <li><a href="#">Press</a></li>
                <li><a href="#">Partner With Us</a></li>
                <li><a href="#">Blog</a></li>
            </ul>
        </div>

        <!-- Support -->
        <div class="footer-col">
            <h5>Support</h5>
            <ul>
                <li><a href="#">Help Center</a></li>
                <li><a href="#">Contact Us</a></li>
                <li><a href="#">Returns Policy</a></li>
                <li><a href="#">Privacy Policy</a></li>
                <li><a href="#">Terms of Service</a></li>
            </ul>
        </div>

    </div>

    <!-- Bottom bar -->
    <div class="footer-bottom">
        <p>© <?= date('Y') ?> BrandLux — Multi Brand Promotion. All rights reserved.</p>
        <p style="display:flex;align-items:center;gap:6px;">
            Made with
            <span style="color:var(--rose);font-size:1rem;">♥</span>
            in India
        </p>
    </div>
</footer>


<!-- ═══════════════════════════════════════
     GLOBAL SCRIPTS
════════════════════════════════════════ -->
<script>
    /* Newsletter handler */
    function handleNewsletter(e) {
        e.preventDefault();
        const btn = e.target.querySelector('button');
        btn.textContent = '✓ Done!';
        btn.style.background = 'linear-gradient(135deg,#6dcba0,#2a8a5e)';
        document.getElementById('nl-msg').style.display = 'block';
        setTimeout(() => {
            btn.textContent = 'Subscribe ✦';
            btn.style.background = '';
            document.getElementById('nl-msg').style.display = 'none';
            document.getElementById('nl-email').value = '';
        }, 4000);
    }

    /* Back-to-top glow button */
    (function() {
        const btn = document.createElement('button');
        btn.innerHTML = '↑';
        btn.setAttribute('aria-label', 'Back to top');
        btn.style.cssText = `
    position:fixed;bottom:32px;right:32px;
    width:46px;height:46px;border-radius:50%;
    background:linear-gradient(135deg,var(--gold),var(--rose));
    color:#fff;font-size:1.2rem;border:none;cursor:pointer;
    box-shadow:0 4px 20px rgba(201,168,76,.4);
    opacity:0;transform:translateY(20px);
    transition:all .4s cubic-bezier(.16,1,.3,1);
    z-index:999;
  `;
        document.body.appendChild(btn);
        window.addEventListener('scroll', () => {
            if (window.scrollY > 400) {
                btn.style.opacity = '1';
                btn.style.transform = 'translateY(0)';
            } else {
                btn.style.opacity = '0';
                btn.style.transform = 'translateY(20px)';
            }
        });
        btn.addEventListener('click', () => window.scrollTo({
            top: 0,
            behavior: 'smooth'
        }));
    })();
</script>

</body>

</html>