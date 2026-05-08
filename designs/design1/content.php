<style>
    .page-wrap {
        max-width: 1200px;
        margin: 0 auto;
        padding: 36px 32px;
    }

    /* Welcome Banner */
    .welcome-banner {
        background: linear-gradient(135deg, #1a1a1a 0%, #222 100%);
        border: 1px solid var(--border);
        border-radius: 18px;
        padding: 32px 36px;
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin-bottom: 32px;
        position: relative;
        overflow: hidden;
    }

    .welcome-banner::before {
        content: '';
        position: absolute;
        top: -40px;
        right: -40px;
        width: 200px;
        height: 200px;
        background: radial-gradient(circle, rgba(240, 165, 0, 0.15), transparent 70%);
        border-radius: 50%;
    }

    .welcome-banner::after {
        content: '';
        position: absolute;
        bottom: -60px;
        right: 100px;
        width: 160px;
        height: 160px;
        background: radial-gradient(circle, rgba(255, 94, 26, 0.1), transparent 70%);
        border-radius: 50%;
    }

    .welcome-left h2 {
        font-family: 'Bebas Neue', sans-serif;
        font-size: 32px;
        letter-spacing: 1px;
        color: var(--text);
        margin-bottom: 6px;
    }

    .welcome-left h2 span {
        color: var(--accent);
    }

    .welcome-left p {
        font-size: 14px;
        color: var(--muted);
    }

    .welcome-right {
        display: flex;
        gap: 14px;
        flex-shrink: 0;
    }

    .quick-btn {
        background: var(--accent);
        color: #000;
        border: none;
        padding: 10px 22px;
        border-radius: 10px;
        font-size: 13px;
        font-weight: 600;
        cursor: pointer;
        text-decoration: none;
        transition: opacity .2s;
        display: inline-flex;
        align-items: center;
        gap: 7px;
    }

    .quick-btn:hover {
        opacity: .85;
    }

    .quick-btn.outline {
        background: transparent;
        color: var(--text);
        border: 1px solid var(--border);
    }

    .quick-btn.outline:hover {
        border-color: var(--accent);
        color: var(--accent);
    }

    /* Stats Grid */
    .stats-grid {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 18px;
        margin-bottom: 32px;
    }

    .stat-card {
        background: var(--surface);
        border: 1px solid var(--border);
        border-radius: 14px;
        padding: 22px 20px;
        display: flex;
        flex-direction: column;
        gap: 12px;
        transition: border-color .2s, transform .2s;
    }

    .stat-card:hover {
        border-color: var(--accent);
        transform: translateY(-3px);
    }

    .stat-top {
        display: flex;
        align-items: center;
        justify-content: space-between;
    }

    .stat-icon {
        width: 40px;
        height: 40px;
        border-radius: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 16px;
    }

    .stat-icon.orange {
        background: rgba(240, 165, 0, .15);
        color: var(--accent);
    }

    .stat-icon.red {
        background: rgba(255, 94, 26, .15);
        color: var(--accent2);
    }

    .stat-icon.green {
        background: rgba(34, 197, 94, .15);
        color: #22c55e;
    }

    .stat-icon.blue {
        background: rgba(59, 130, 246, .15);
        color: #3b82f6;
    }

    .stat-badge {
        font-size: 11px;
        font-weight: 600;
        padding: 3px 8px;
        border-radius: 20px;
    }

    .stat-badge.up {
        background: rgba(34, 197, 94, .15);
        color: #22c55e;
    }

    .stat-badge.down {
        background: rgba(239, 68, 68, .15);
        color: #ef4444;
    }

    .stat-value {
        font-family: 'Bebas Neue', sans-serif;
        font-size: 30px;
        color: var(--text);
        letter-spacing: 1px;
    }

    .stat-label {
        font-size: 12px;
        color: var(--muted);
    }

    /* Two column layout */
    .two-col {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 24px;
        margin-bottom: 32px;
    }

    /* Section card */
    .section-card {
        background: var(--surface);
        border: 1px solid var(--border);
        border-radius: 16px;
        overflow: hidden;
    }

    .section-head {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 18px 22px;
        border-bottom: 1px solid var(--border);
    }

    .section-head h3 {
        font-size: 15px;
        font-weight: 600;
        color: var(--text);
    }

    .see-all {
        font-size: 12px;
        color: var(--accent);
        text-decoration: none;
        font-weight: 500;
    }

    .see-all:hover {
        text-decoration: underline;
    }

    /* Recent Orders table */
    .orders-table {
        width: 100%;
        border-collapse: collapse;
    }

    .orders-table th {
        text-align: left;
        font-size: 11px;
        text-transform: uppercase;
        letter-spacing: 1px;
        color: var(--muted);
        padding: 12px 22px;
        border-bottom: 1px solid var(--border);
    }

    .orders-table td {
        padding: 14px 22px;
        font-size: 13px;
        color: var(--text);
        border-bottom: 1px solid rgba(42, 42, 42, .5);
    }

    .orders-table tr:last-child td {
        border-bottom: none;
    }

    .orders-table tr:hover td {
        background: rgba(255, 255, 255, .02);
    }

    .status-badge {
        font-size: 11px;
        font-weight: 600;
        padding: 3px 10px;
        border-radius: 20px;
        display: inline-block;
    }

    .status-badge.delivered {
        background: rgba(34, 197, 94, .15);
        color: #22c55e;
    }

    .status-badge.pending {
        background: rgba(240, 165, 0, .15);
        color: var(--accent);
    }

    .status-badge.cancelled {
        background: rgba(239, 68, 68, .15);
        color: #ef4444;
    }

    /* Active Offers list */
    .offer-item {
        display: flex;
        align-items: center;
        gap: 14px;
        padding: 14px 22px;
        border-bottom: 1px solid rgba(42, 42, 42, .5);
        transition: background .15s;
    }

    .offer-item:last-child {
        border-bottom: none;
    }

    .offer-item:hover {
        background: rgba(255, 255, 255, .02);
    }

    .offer-thumb {
        width: 44px;
        height: 44px;
        border-radius: 10px;
        background: linear-gradient(135deg, var(--accent), var(--accent2));
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 18px;
        color: #000;
        font-weight: 900;
        flex-shrink: 0;
    }

    .offer-info {
        flex: 1;
    }

    .offer-info h4 {
        font-size: 13px;
        font-weight: 600;
        color: var(--text);
        margin-bottom: 3px;
    }

    .offer-info p {
        font-size: 11px;
        color: var(--muted);
    }

    .offer-discount {
        font-family: 'Bebas Neue', sans-serif;
        font-size: 22px;
        color: var(--accent);
        letter-spacing: 1px;
    }

    @media (max-width: 900px) {
        .stats-grid {
            grid-template-columns: repeat(2, 1fr);
        }

        .two-col {
            grid-template-columns: 1fr;
        }
    }

    @media (max-width: 600px) {
        .page-wrap {
            padding: 20px 16px;
        }

        .welcome-banner {
            flex-direction: column;
            align-items: flex-start;
            gap: 20px;
        }

        .stats-grid {
            grid-template-columns: 1fr 1fr;
            gap: 12px;
        }
    }
</style>

<div class="page-wrap">

    <!-- Welcome Banner -->
    <div class="welcome-banner">
        <div class="welcome-left">
            <h2>Welcome Back, <span><?php echo isset($_SESSION['user_name']) ? htmlspecialchars($_SESSION['user_name']) : 'User'; ?> 👋</span></h2>
            <p>Here's what's happening with your account today.</p>
        </div>
        <div class="welcome-right">
            <a href="offers.php" class="quick-btn"><i class="fa fa-percent"></i> Browse Offers</a>
            <a href="orders.php" class="quick-btn outline"><i class="fa fa-box"></i> My Orders</a>
        </div>
    </div>

    <!-- Stats -->
    <div class="stats-grid">
        <div class="stat-card">
            <div class="stat-top">
                <div class="stat-icon orange"><i class="fa fa-box"></i></div>
                <span class="stat-badge up">+12%</span>
            </div>
            <div class="stat-value">24</div>
            <div class="stat-label">Total Orders</div>
        </div>
        <div class="stat-card">
            <div class="stat-top">
                <div class="stat-icon green"><i class="fa fa-wallet"></i></div>
                <span class="stat-badge up">+5%</span>
            </div>
            <div class="stat-value">₹1,840</div>
            <div class="stat-label">Wallet Balance</div>
        </div>
        <div class="stat-card">
            <div class="stat-top">
                <div class="stat-icon red"><i class="fa fa-tags"></i></div>
                <span class="stat-badge up">+3</span>
            </div>
            <div class="stat-value">8</div>
            <div class="stat-label">Active Offers</div>
        </div>
        <div class="stat-card">
            <div class="stat-top">
                <div class="stat-icon blue"><i class="fa fa-star"></i></div>
                <span class="stat-badge down">-1</span>
            </div>
            <div class="stat-value">320</div>
            <div class="stat-label">Reward Points</div>
        </div>
    </div>

    <!-- Two Column -->
    <div class="two-col">

        <!-- Recent Orders -->
        <div class="section-card">
            <div class="section-head">
                <h3>Recent Orders</h3>
                <a href="orders.php" class="see-all">See All →</a>
            </div>
            <table class="orders-table">
                <thead>
                    <tr>
                        <th>Order</th>
                        <th>Brand</th>
                        <th>Amount</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>#ORD-1021</td>
                        <td>Nike</td>
                        <td>₹1,299</td>
                        <td><span class="status-badge delivered">Delivered</span></td>
                    </tr>
                    <tr>
                        <td>#ORD-1020</td>
                        <td>Adidas</td>
                        <td>₹849</td>
                        <td><span class="status-badge pending">Pending</span></td>
                    </tr>
                    <tr>
                        <td>#ORD-1019</td>
                        <td>Puma</td>
                        <td>₹599</td>
                        <td><span class="status-badge delivered">Delivered</span></td>
                    </tr>
                    <tr>
                        <td>#ORD-1018</td>
                        <td>Reebok</td>
                        <td>₹1,100</td>
                        <td><span class="status-badge cancelled">Cancelled</span></td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- Active Offers -->
        <div class="section-card">
            <div class="section-head">
                <h3>Active Offers</h3>
                <a href="offers.php" class="see-all">See All →</a>
            </div>
            <div class="offer-item">
                <div class="offer-thumb">N</div>
                <div class="offer-info">
                    <h4>Nike Summer Sale</h4>
                    <p>Valid till 31 May 2026</p>
                </div>
                <div class="offer-discount">30%</div>
            </div>
            <div class="offer-item">
                <div class="offer-thumb">A</div>
                <div class="offer-info">
                    <h4>Adidas Flash Deal</h4>
                    <p>Valid till 5 May 2026</p>
                </div>
                <div class="offer-discount">20%</div>
            </div>
            <div class="offer-item">
                <div class="offer-thumb">P</div>
                <div class="offer-info">
                    <h4>Puma Mega Offer</h4>
                    <p>Valid till 15 May 2026</p>
                </div>
                <div class="offer-discount">15%</div>
            </div>
            <div class="offer-item">
                <div class="offer-thumb">R</div>
                <div class="offer-info">
                    <h4>Reebok Weekend</h4>
                    <p>Valid till 3 May 2026</p>
                </div>
                <div class="offer-discount">25%</div>
            </div>
        </div>

    </div>

</div>