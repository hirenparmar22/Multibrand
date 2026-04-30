<!-- ── FOOTER ── -->
<footer>
  <div class="footer-inner">
    <!-- Brand Section -->
    <div class="footer-brand">
      <div class="footer-logo">
        <div class="f-icon">M</div>
        <span class="f-name">Multi<span>Brand</span> Pramotion</span>
      </div>
      <p class="footer-tagline">Your one-stop multi-brand promotions platform. Discover deals, earn rewards, and save more every day.</p>
    </div>

    
    <div class="footer-links">
      <div class="link-group">
        <h4>Quick Links</h4>
        <a href="dashboard.php">Dashboard</a>
        <a href="brands.php">Brands</a>
        <a href="offers.php">Offers</a>
        <a href="orders.php">Orders</a>
      </div>
      <div class="link-group">
        <h4>Account</h4>
        <a href="profile.php">My Profile</a>
        <a href="wallet.php">Wallet</a>
        <a href="settings.php">Settings</a>
        <a href="logout.php">Logout</a>
      </div>
      <div class="link-group">
        <h4>Support</h4>
        <a href="help.php">Help Center</a>
        <a href="contact.php">Contact Us</a>
        <a href="privacy.php">Privacy Policy</a>
        <a href="terms.php">Terms of Use</a>
      </div>
    </div>
  </div>

  <!-- Bottom Section -->
  <div class="footer-bottom">
    <span>&copy; <?php echo date('Y'); ?> MultiBrand Pramotion. All rights reserved.</span>
    <div class="social-links">
      <a href="#"><i class="fab fa-facebook-f"></i></a>
      <a href="#"><i class="fab fa-instagram"></i></a>
      <a href="#"><i class="fab fa-twitter"></i></a>
      <a href="#"><i class="fab fa-whatsapp"></i></a>
    </div>
  </div>
</footer>

<style>
  /* Structure & Layout */
  footer {
    background: var(--surface);
    border-top: 1px solid var(--border);
    margin-top: 60px;
    padding: 50px 20px 24px;
    font-family: sans-serif;
    /* Fallback font */
  }

  .footer-inner,
  .footer-bottom {
    max-width: 1200px;
    margin: 0 auto;
    display: flex;
    justify-content: space-between;
    flex-wrap: wrap;
    gap: 40px;
  }

  .footer-inner {
    padding-bottom: 30px;
    border-bottom: 1px solid var(--border);
  }

  /* Brand Styling */
  .footer-brand {
    flex: 1;
    min-width: 250px;
  }

  .footer-logo {
    display: flex;
    align-items: center;
    gap: 10px;
    margin-bottom: 15px;
  }

  .f-icon {
    width: 36px;
    height: 36px;
    background: linear-gradient(135deg, var(--accent), var(--accent2));
    border-radius: 8px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: 900;
    color: #000;
  }

  .f-name {
    font-family: 'Bebas Neue', sans-serif;
    font-size: 20px;
    color: var(--text);
  }

  .f-name span {
    color: var(--accent);
  }

  .footer-tagline {
    font-size: 13px;
    color: var(--muted);
    line-height: 1.6;
  }

  /* Links Styling */
  .footer-links {
    display: flex;
    gap: 50px;
    flex-wrap: wrap;
  }

  .link-group {
    display: flex;
    flex-direction: column;
    gap: 8px;
  }

  .link-group h4 {
    font-size: 12px;
    text-transform: uppercase;
    color: var(--accent);
    margin-bottom: 5px;
    letter-spacing: 1px;
  }

  .link-group a {
    text-decoration: none;
    color: var(--muted);
    font-size: 13px;
    transition: 0.2s;
  }

  .link-group a:hover {
    color: var(--text);
    padding-left: 2px;
  }

  /* Subtle hover effect */

  /* Footer Bottom & Socials */
  .footer-bottom {
    padding-top: 20px;
    align-items: center;
  }

  .footer-bottom span {
    font-size: 12px;
    color: var(--muted);
  }

  .social-links {
    display: flex;
    gap: 10px;
  }

  .social-links a {
    width: 35px;
    height: 35px;
    border: 1px solid var(--border);
    border-radius: 8px;
    display: flex;
    align-items: center;
    justify-content: center;
    color: var(--muted);
    transition: 0.3s;
    text-decoration: none;
  }

  .social-links a:hover {
    color: var(--accent);
    border-color: var(--accent);
    transform: translateY(-3px);
  }

  /* Mobile Responsive */
  @media (max-width: 768px) {

    .footer-inner,
    .footer-bottom {
      flex-direction: column;
      text-align: center;
      align-items: center;
    }

    .footer-links {
      justify-content: center;
      gap: 30px;
    }

    .footer-tagline {
      margin: 0 auto;
    }
  }
</style>