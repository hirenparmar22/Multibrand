<?php
include '../config.php';

// DATA
$totalUsers = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) as total FROM users"))['total'];
$totalOrders = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) as total FROM admin_orders"))['total'];
$totalRevenue = mysqli_fetch_assoc(mysqli_query($conn, "SELECT SUM(total_price) as total FROM admin_orders"))['total'];

// Monthly Orders Data
$chart_data = [];
$query = mysqli_query($conn, "
    SELECT MONTH(created_at) as month, COUNT(*) as total 
    FROM admin_orders 
    GROUP BY MONTH(created_at)
");

while($row = mysqli_fetch_assoc($query)){
    $chart_data[] = $row['total'];
}
?>

<div class="page-card">

    <div class="header">
        <h2>Analytics</h2>
        <p>Overview of your platform performance</p>
    </div>

    <!-- STATS -->
    <div class="stats-box">

        <div class="stat">
            <h3><?php echo $totalUsers; ?></h3>
            <p>Users</p>
        </div>

        <div class="stat">
            <h3><?php echo $totalOrders; ?></h3>
            <p>Orders</p>
        </div>

        <div class="stat">
            <h3>₹<?php echo $totalRevenue ? $totalRevenue : 0; ?></h3>
            <p>Revenue</p>
        </div>

    </div>

    <hr>

    <!-- CHART -->
    <canvas id="orderChart" height="100"></canvas>

</div>

<!-- Chart JS -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
const ctx = document.getElementById('orderChart');

new Chart(ctx, {
    type: 'line',
    data: {
        labels: ['Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec'],
        datasets: [{
            label: 'Orders',
            data: <?php echo json_encode($chart_data); ?>,
            borderWidth: 3,
            fill: true,
            tension: 0.4
        }]
    },
    options: {
        responsive: true
    }
});
</script>

<style>
.page-card{
    background:#fff;
    padding:25px;
    border-radius:20px;
    box-shadow:0 10px 30px rgba(0,0,0,0.08);
}

.stats-box{
    display:flex;
    gap:20px;
    flex-wrap:wrap;
    margin-bottom:20px;
}

.stat{
    flex:1;
    background:#f5f5f5;
    padding:20px;
    border-radius:15px;
    text-align:center;
}

.stat h3{
    font-size:28px;
}

.stat p{
    color:#666;
}
</style>