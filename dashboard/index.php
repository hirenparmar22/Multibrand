<?php
// session_start();
include __DIR__ . '/../config.php';
if (!isset($_SESSION['user_id'])) {
    header("Location: ../auth/login.php");
    exit;
}
include '../includes/header.php';
?>

<!DOCTYPE html>
<html>

<head>
    <title>Dashboard</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            min-height: 100vh;
        }

        .navbar {
            padding: 15px 30px;
        }

        .dashboard-box {
            max-width: 1200px;
            margin: 50px auto;
            padding: 30px;
            border-radius: 20px;
            color: white;
        }

        .card-box {
            padding: 25px;
            border-radius: 15px;
            text-align: center;
            margin-bottom: 20px;
            background: rgba(255, 255, 255, 0.15);
            backdrop-filter: blur(10px);
        }

        .logout-btn {
            text-decoration: none;
            color: white;
            background: red;
            padding: 10px 20px;
            border-radius: 10px;
        }
    </style>
</head>

<body style="<?php
                if ($_SESSION['role'] == 'admin') {
                    echo 'background: linear-gradient(to right, #0f172a, #7f1d1d);';
                } elseif ($_SESSION['role'] == 'manager') {
                    echo 'background: linear-gradient(to right, #111827, #1e3a8a);';
                } else {
                    echo 'background: linear-gradient(to right, #e0f2fe, #f8fafc); color:black;';
                }
                ?>">


    <?php if ($_SESSION['role'] == 'admin') { ?>



        <nav class="navbar navbar-dark bg-dark">
            <div class="container-fluid">
                <span class="navbar-brand">Admin Dashboard</span>
                <a href="../auth/logout.php" class="logout-btn">Logout</a>
            </div>
        </nav>

        <div class="dashboard-box text-center">
            <h1 style="color:red; font-size:50px;">ADMIN</h1>
            <h2>Welcome <?php echo $_SESSION['full_name']; ?></h2>
            <p>Hello <?php echo $_SESSION['username']; ?></p>

            <div class="row mt-5">
                <div class="col-md-3">
                    <div class="card-box">
                        <h3>Total Users</h3>
                        <p>120</p>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="card-box">
                        <h3>Total Managers</h3>
                        <p>10</p>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="card-box">
                        <h3>Total Products</h3>
                        <p>250</p>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="card-box">
                        <h3>Total Promotions</h3>
                        <p>45</p>
                    </div>
                </div>
            </div>
        </div>

    <?php } elseif ($_SESSION['role'] == 'manager') { ?>



        <nav class="navbar navbar-dark bg-primary">
            <div class="container-fluid">
                <span class="navbar-brand">Manager Dashboard</span>
                <a href="logout.php" class="logout-btn">Logout</a>
            </div>
        </nav>

        <div class="dashboard-box text-center">
            <h1 style="color:lightblue; font-size:50px;">MANAGER</h1>
            <h2>Welcome <?php echo $_SESSION['full_name']; ?></h2>
            <p>Hello <?php echo $_SESSION['username']; ?></p>

            <div class="row mt-5">
                <div class="col-md-4">
                    <div class="card-box">
                        <h3>Total Products</h3>
                        <p>80</p>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card-box">
                        <h3>Total Promotions</h3>
                        <p>20</p>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card-box">
                        <h3>Total Views</h3>
                        <p>1500</p>
                    </div>
                </div>
            </div>
        </div>

    <?php } else { ?>


        <nav class="navbar navbar-light bg-light">
            <div class="container-fluid">
                <span class="navbar-brand">User Dashboard</span>
                <a href="logout.php" class="btn btn-danger">Logout</a>
            </div>
        </nav>

        <div class="dashboard-box text-center" style="color:black;">
            <h1 style="color:green; font-size:50px;">USER</h1>
            <h2>Welcome <?php echo $_SESSION['full_name']; ?></h2>
            <p>Hello <?php echo $_SESSION['username']; ?></p>

            <div class="row mt-5">
                <div class="col-md-4">
                    <div class="card-box" style="background:white;">
                        <h3>Latest Brands</h3>
                        <p>10 Brands</p>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card-box" style="background:white;">
                        <h3>Featured Products</h3>
                        <p>25 Products</p>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card-box" style="background:white;">
                        <h3>Recent Promotions</h3>
                        <p>5 Offers</p>
                    </div>
                </div>
            </div>
        </div>

    <?php } ?>

    <?php include '../includes/footer.php'; ?>