<?php include 'header.php'; ?>

<style>
  .page-wrap { max-width: 1200px; margin: 0 auto; padding: 36px 32px; }

  /* Page Title */
  .page-title { margin-bottom: 28px; }
  .page-title h2 {
    font-family: 'Bebas Neue', sans-serif;
    font-size: 30px; letter-spacing: 1px; color: var(--text);
  }
  .page-title p { font-size: 13px; color: var(--muted); margin-top: 4px; }

  /* Filter Bar */
  .filter-bar {
    display: flex; align-items: center; gap: 12px;
    margin-bottom: 24px; flex-wrap: wrap;
  }
  .filter-btn {
    padding: 8px 18px; border-radius: 20px;
    border: 1px solid var(--border);
    background: transparent; color: var(--muted);
    font-size: 13px; font-family: 'DM Sans', sans-serif;
    cursor: pointer; transition: all .2s;
  }
  .filter-btn:hover, .filter-btn.active {
    background: var(--accent); color: #000;
    border-color: var(--accent); font-weight: 600;
  }
  .search-wrap {
    margin-left: auto;
    display: flex; align-items: center; gap: 0;
    background: var(--surface);
    border: 1px solid var(--border); border-radius: 10px;
    overflow: hidden;
  }
  .search-wrap i { padding: 0 12px; color: var(--muted); font-size: 13px; }
  .search-wrap input {
    background: none; border: none; outline: none;
    color: var(--text); font-size: 13px;
    font-family: 'DM Sans', sans-serif;
    padding: 9px 12px 9px 0; width: 200px;
  }
  .search-wrap input::placeholder { color: var(--muted); }

  /* Orders Table Card */
  .table-card {
    background: var(--surface);
    border: 1px solid var(--border);
    border-radius: 16px; overflow: hidden;
  }
  .orders-table { width: 100%; border-collapse: collapse; }
  .orders-table th {
    text-align: left; font-size: 11px;
    text-transform: uppercase; letter-spacing: 1px;
    color: var(--muted); padding: 14px 22px;
    border-bottom: 1px solid var(--border);
    background: rgba(255,255,255,.02);
  }
  .orders-table td {
    padding: 16px 22px; font-size: 13px;
    color: var(--text); border-bottom: 1px solid rgba(42,42,42,.5);
    vertical-align: middle;
  }
  .orders-table tr:last-child td { border-bottom: none; }
  .orders-table tr:hover td { background: rgba(255,255,255,.025); }

  .brand-cell { display: flex; align-items: center; gap: 10px; }
  .brand-icon {
    width: 34px; height: 34px; border-radius: 8px;
    background: linear-gradient(135deg, var(--accent), var(--accent2));
    display: flex; align-items: center; justify-content: center;
    font-size: 14px; font-weight: 900; color: #000; flex-shrink: 0;
  }

  .status-badge {
    font-size: 11px; font-weight: 600; padding: 4px 12px;
    border-radius: 20px; display: inline-block;
  }
  .status-badge.delivered { background: rgba(34,197,94,.15);  color: #22c55e; }
  .status-badge.pending   { background: rgba(240,165,0,.15);  color: var(--accent); }
  .status-badge.cancelled { background: rgba(239,68,68,.15);  color: #ef4444; }
  .status-badge.shipped   { background: rgba(59,130,246,.15); color: #3b82f6; }

  .action-btn {
    background: var(--border); border: none;
    color: var(--muted); font-size: 12px;
    padding: 6px 14px; border-radius: 8px;
    cursor: pointer; font-family: 'DM Sans', sans-serif;
    transition: background .2s, color .2s;
  }
  .action-btn:hover { background: var(--accent); color: #000; font-weight: 600; }

  /* Pagination */
  .pagination {
    display: flex; align-items: center; justify-content: space-between;
    padding: 18px 22px;
    border-top: 1px solid var(--border);
  }
  .pagination span { font-size: 13px; color: var(--muted); }
  .page-btns { display: flex; gap: 6px; }
  .page-btns button {
    width: 34px; height: 34px; border-radius: 8px;
    background: var(--surface); border: 1px solid var(--border);
    color: var(--muted); font-size: 13px; cursor: pointer;
    font-family: 'DM Sans', sans-serif; transition: all .2s;
  }
  .page-btns button.active, .page-btns button:hover {
    background: var(--accent); color: #000;
    border-color: var(--accent); font-weight: 700;
  }

  @media (max-width: 768px) {
    .page-wrap { padding: 20px 16px; }
    .orders-table th:nth-child(4),
    .orders-table td:nth-child(4) { display: none; }
    .search-wrap input { width: 130px; }
  }
</style>

<div class="page-wrap">

  <!-- Title -->
  <div class="page-title">
    <h2>My Orders</h2>
    <p>Track and manage all your orders in one place.</p>
  </div>

  <!-- Filter Bar -->
  <div class="filter-bar">
    <button class="filter-btn active">All</button>
    <button class="filter-btn">Pending</button>
    <button class="filter-btn">Shipped</button>
    <button class="filter-btn">Delivered</button>
    <button class="filter-btn">Cancelled</button>
    <div class="search-wrap">
      <i class="fa fa-search"></i>
      <input type="text" placeholder="Search orders...">
    </div>
  </div>

  <!-- Table -->
  <div class="table-card">
    <table class="orders-table">
      <thead>
        <tr>
          <th>Order ID</th>
          <th>Brand</th>
          <th>Product</th>
          <th>Date</th>
          <th>Amount</th>
          <th>Status</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>#ORD-1021</td>
          <td><div class="brand-cell"><div class="brand-icon">N</div> Nike</div></td>
          <td>Air Max 270</td>
          <td>28 Apr 2026</td>
          <td>₹1,299</td>
          <td><span class="status-badge delivered">Delivered</span></td>
          <td><button class="action-btn">View</button></td>
        </tr>
        <tr>
          <td>#ORD-1020</td>
          <td><div class="brand-cell"><div class="brand-icon">A</div> Adidas</div></td>
          <td>Ultraboost 22</td>
          <td>25 Apr 2026</td>
          <td>₹849</td>
          <td><span class="status-badge pending">Pending</span></td>
          <td><button class="action-btn">View</button></td>
        </tr>
        <tr>
          <td>#ORD-1019</td>
          <td><div class="brand-cell"><div class="brand-icon">P</div> Puma</div></td>
          <td>RS-X Sneaker</td>
          <td>20 Apr 2026</td>
          <td>₹599</td>
          <td><span class="status-badge delivered">Delivered</span></td>
          <td><button class="action-btn">View</button></td>
        </tr>
        <tr>
          <td>#ORD-1018</td>
          <td><div class="brand-cell"><div class="brand-icon">R</div> Reebok</div></td>
          <td>Classic Leather</td>
          <td>18 Apr 2026</td>
          <td>₹1,100</td>
          <td><span class="status-badge cancelled">Cancelled</span></td>
          <td><button class="action-btn">View</button></td>
        </tr>
        <tr>
          <td>#ORD-1017</td>
          <td><div class="brand-cell"><div class="brand-icon">N</div> Nike</div></td>
          <td>React Infinity</td>
          <td>14 Apr 2026</td>
          <td>₹2,199</td>
          <td><span class="status-badge shipped">Shipped</span></td>
          <td><button class="action-btn">Track</button></td>
        </tr>
        <tr>
          <td>#ORD-1016</td>
          <td><div class="brand-cell"><div class="brand-icon">A</div> Adidas</div></td>
          <td>Stan Smith</td>
          <td>10 Apr 2026</td>
          <td>₹750</td>
          <td><span class="status-badge delivered">Delivered</span></td>
          <td><button class="action-btn">View</button></td>
        </tr>
      </tbody>
    </table>

    <!-- Pagination -->
    <div class="pagination">
      <span>Showing 1–6 of 24 orders</span>
      <div class="page-btns">
        <button><i class="fa fa-chevron-left"></i></button>
        <button class="active">1</button>
        <button>2</button>
        <button>3</button>
        <button>4</button>
        <button><i class="fa fa-chevron-right"></i></button>
      </div>
    </div>
  </div>

</div>

<?php include 'footer.php'; ?>