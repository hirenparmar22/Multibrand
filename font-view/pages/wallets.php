<?php include 'header.php'; ?>

<style>
  .page-wrap { max-width: 1200px; margin: 0 auto; padding: 36px 32px; }

  .page-title { margin-bottom: 28px; }
  .page-title h2 {
    font-family: 'Bebas Neue', sans-serif;
    font-size: 30px; letter-spacing: 1px; color: var(--text);
  }
  .page-title p { font-size: 13px; color: var(--muted); margin-top: 4px; }

  /* Top Row */
  .wallet-top { display: grid; grid-template-columns: 1.4fr 1fr 1fr; gap: 20px; margin-bottom: 28px; }

  /* Balance Card */
  .balance-card {
    background: linear-gradient(135deg, #1c1c1c, #222);
    border: 1px solid var(--border);
    border-radius: 18px; padding: 30px 28px;
    position: relative; overflow: hidden;
  }
  .balance-card::before {
    content: '';
    position: absolute; top: -50px; right: -50px;
    width: 180px; height: 180px;
    background: radial-gradient(circle, rgba(240,165,0,.2), transparent 70%);
    border-radius: 50%;
  }
  .balance-card .label { font-size: 12px; color: var(--muted); text-transform: uppercase; letter-spacing: 1.5px; margin-bottom: 10px; }
  .balance-amount {
    font-family: 'Bebas Neue', sans-serif;
    font-size: 48px; color: var(--accent); letter-spacing: 2px; line-height: 1;
    margin-bottom: 18px;
  }
  .balance-actions { display: flex; gap: 10px; }
  .bal-btn {
    flex: 1; padding: 10px 0; border-radius: 10px;
    border: none; font-size: 13px; font-weight: 600;
    font-family: 'DM Sans', sans-serif; cursor: pointer;
    display: flex; align-items: center; justify-content: center; gap: 7px;
    transition: opacity .2s;
  }
  .bal-btn:hover { opacity: .85; }
  .bal-btn.add { background: var(--accent); color: #000; }
  .bal-btn.withdraw { background: var(--border); color: var(--text); }

  /* Mini Stat Cards */
  .mini-card {
    background: var(--surface);
    border: 1px solid var(--border);
    border-radius: 16px; padding: 24px 22px;
    display: flex; flex-direction: column; justify-content: space-between;
    transition: border-color .2s, transform .2s;
  }
  .mini-card:hover { border-color: var(--accent); transform: translateY(-3px); }
  .mini-card .mc-icon {
    width: 40px; height: 40px; border-radius: 10px;
    display: flex; align-items: center; justify-content: center;
    font-size: 16px; margin-bottom: 14px;
  }
  .mc-icon.green { background: rgba(34,197,94,.15); color: #22c55e; }
  .mc-icon.blue  { background: rgba(59,130,246,.15); color: #3b82f6; }
  .mini-card .mc-val {
    font-family: 'Bebas Neue', sans-serif;
    font-size: 28px; color: var(--text); letter-spacing: 1px;
  }
  .mini-card .mc-label { font-size: 12px; color: var(--muted); margin-top: 4px; }

  /* Transactions */
  .section-card {
    background: var(--surface);
    border: 1px solid var(--border);
    border-radius: 16px; overflow: hidden;
  }
  .section-head {
    display: flex; align-items: center; justify-content: space-between;
    padding: 18px 22px; border-bottom: 1px solid var(--border);
  }
  .section-head h3 { font-size: 15px; font-weight: 600; color: var(--text); }
  .filter-tabs { display: flex; gap: 6px; }
  .tab-btn {
    padding: 6px 14px; border-radius: 8px;
    border: 1px solid var(--border);
    background: none; color: var(--muted);
    font-size: 12px; font-family: 'DM Sans', sans-serif;
    cursor: pointer; transition: all .2s;
  }
  .tab-btn.active, .tab-btn:hover {
    background: var(--accent); color: #000;
    border-color: var(--accent); font-weight: 600;
  }

  /* Transaction Row */
  .txn-row {
    display: flex; align-items: center; gap: 14px;
    padding: 16px 22px;
    border-bottom: 1px solid rgba(42,42,42,.5);
    transition: background .15s;
  }
  .txn-row:last-child { border-bottom: none; }
  .txn-row:hover { background: rgba(255,255,255,.02); }
  .txn-icon {
    width: 42px; height: 42px; border-radius: 12px;
    display: flex; align-items: center; justify-content: center;
    font-size: 16px; flex-shrink: 0;
  }
  .txn-icon.credit { background: rgba(34,197,94,.15); color: #22c55e; }
  .txn-icon.debit  { background: rgba(239,68,68,.15);  color: #ef4444; }
  .txn-info { flex: 1; }
  .txn-info h4 { font-size: 13px; font-weight: 600; color: var(--text); margin-bottom: 3px; }
  .txn-info p  { font-size: 11px; color: var(--muted); }
  .txn-amount { font-size: 15px; font-weight: 700; }
  .txn-amount.credit { color: #22c55e; }
  .txn-amount.debit  { color: #ef4444; }

  @media (max-width: 900px) {
    .wallet-top { grid-template-columns: 1fr 1fr; }
    .balance-card { grid-column: 1 / -1; }
  }
  @media (max-width: 600px) {
    .page-wrap { padding: 20px 16px; }
    .wallet-top { grid-template-columns: 1fr; }
    .balance-card { grid-column: auto; }
  }
</style>

<div class="page-wrap">

  <div class="page-title">
    <h2>My Wallet</h2>
    <p>Manage your balance, rewards, and transaction history.</p>
  </div>

  <!-- Top Row -->
  <div class="wallet-top">

    <!-- Balance Card -->
    <div class="balance-card">
      <div class="label">Available Balance</div>
      <div class="balance-amount">₹1,840</div>
      <div class="balance-actions">
        <button class="bal-btn add"><i class="fa fa-plus"></i> Add Money</button>
        <button class="bal-btn withdraw"><i class="fa fa-arrow-up"></i> Withdraw</button>
      </div>
    </div>

    <!-- Total Earned -->
    <div class="mini-card">
      <div class="mc-icon green"><i class="fa fa-arrow-down"></i></div>
      <div>
        <div class="mc-val">₹4,620</div>
        <div class="mc-label">Total Earned / Received</div>
      </div>
    </div>

    <!-- Reward Points -->
    <div class="mini-card">
      <div class="mc-icon blue"><i class="fa fa-star"></i></div>
      <div>
        <div class="mc-val">320 pts</div>
        <div class="mc-label">Reward Points</div>
      </div>
    </div>

  </div>

  <!-- Transactions -->
  <div class="section-card">
    <div class="section-head">
      <h3>Transaction History</h3>
      <div class="filter-tabs">
        <button class="tab-btn active">All</button>
        <button class="tab-btn">Credit</button>
        <button class="tab-btn">Debit</button>
      </div>
    </div>

    <div class="txn-row">
      <div class="txn-icon credit"><i class="fa fa-arrow-down"></i></div>
      <div class="txn-info">
        <h4>Wallet Top-Up</h4>
        <p>28 Apr 2026 · UPI Payment</p>
      </div>
      <div class="txn-amount credit">+₹500</div>
    </div>

    <div class="txn-row">
      <div class="txn-icon debit"><i class="fa fa-arrow-up"></i></div>
      <div class="txn-info">
        <h4>Order #ORD-1021 - Nike Air Max</h4>
        <p>27 Apr 2026 · Order Payment</p>
      </div>
      <div class="txn-amount debit">-₹1,299</div>
    </div>

    <div class="txn-row">
      <div class="txn-icon credit"><i class="fa fa-gift"></i></div>
      <div class="txn-info">
        <h4>Cashback Reward</h4>
        <p>25 Apr 2026 · Adidas Offer Cashback</p>
      </div>
      <div class="txn-amount credit">+₹120</div>
    </div>

    <div class="txn-row">
      <div class="txn-icon debit"><i class="fa fa-arrow-up"></i></div>
      <div class="txn-info">
        <h4>Order #ORD-1019 - Puma RS-X</h4>
        <p>20 Apr 2026 · Order Payment</p>
      </div>
      <div class="txn-amount debit">-₹599</div>
    </div>

    <div class="txn-row">
      <div class="txn-icon credit"><i class="fa fa-arrow-down"></i></div>
      <div class="txn-info">
        <h4>Wallet Top-Up</h4>
        <p>15 Apr 2026 · Net Banking</p>
      </div>
      <div class="txn-amount credit">+₹2,000</div>
    </div>

    <div class="txn-row">
      <div class="txn-icon credit"><i class="fa fa-rotate-left"></i></div>
      <div class="txn-info">
        <h4>Refund - Order #ORD-1018</h4>
        <p>19 Apr 2026 · Reebok Order Cancelled</p>
      </div>
      <div class="txn-amount credit">+₹1,100</div>
    </div>

    <div class="txn-row">
      <div class="txn-icon debit"><i class="fa fa-arrow-up"></i></div>
      <div class="txn-info">
        <h4>Order #ORD-1016 - Adidas Stan Smith</h4>
        <p>10 Apr 2026 · Order Payment</p>
      </div>
      <div class="txn-amount debit">-₹750</div>
    </div>

  </div>

</div>

<?php include 'footer.php'; ?>