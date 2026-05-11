<?php
include 'config.php';

$result = mysqli_query($conn, "SELECT * FROM products");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Products</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f4f4;
            padding: 30px;
        }

        h1 {
            text-align: center;
            margin-bottom: 30px;
        }

        .products-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
        }

        .product-card {
            background: #fff;
            border-radius: 15px;
            padding: 20px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
            transition: 0.3s;
        }

        .product-card:hover {
            transform: translateY(-5px);
        }

        .product-name {
            font-size: 22px;
            margin-bottom: 10px;
        }

        .product-description {
            color: #666;
            margin-bottom: 15px;
        }

        .product-price {
            font-size: 24px;
            color: #28a745;
            font-weight: bold;
        }

        .product-sku {
            margin-top: 10px;
            color: #999;
            font-size: 14px;
        }
    </style>
</head>
<body>
	<nav class="navbar">
    <div class="logo">BrandPromotion</div>

    <ul class="nav-links">
        <li><a href="#">Home</a></li>
        <li><a href="#">Products</a></li>
        <li><a href="#">Brands</a></li>
        <li><a href="#">Categories</a></li>
        <li><a href="#">Contact</a></li>
    </ul>
</nav>

<section class="hero">
    <div class="hero-content">
        <h1>Discover Amazing Products</h1>
        <p>Explore top brands, latest collections and best offers.</p>
        <button>Shop Now</button>
    </div>
</section>
<style>
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

.navbar {
    background: #111827;
    color: white;
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 20px 50px;
}

.logo {
    font-size: 28px;
    font-weight: bold;
}

.nav-links {
    display: flex;
    list-style: none;
    gap: 25px;
}

.nav-links a {
    color: white;
    text-decoration: none;
    transition: 0.3s;
}

.nav-links a:hover {
    color: #38bdf8;
}

.hero {
    background: linear-gradient(to right, #111827, #1e3a8a);
    color: white;
    padding: 80px 50px;
    border-radius: 20px;
    margin: 30px 0;
}

.hero-content h1 {
    font-size: 48px;
    margin-bottom: 20px;
}

.hero-content p {
    font-size: 18px;
    margin-bottom: 25px;
}

.hero-content button {
    background: #38bdf8;
    color: white;
    border: none;
    padding: 12px 25px;
    border-radius: 8px;
    cursor: pointer;
    font-size: 16px;
}

.hero-content button:hover {
    background: #0ea5e9;
}
</style>
    <h1>Our Products</h1>

    <div class="products-container">

        <?php while($row = mysqli_fetch_assoc($result)) { ?>

            <div class="product-card">
                <div class="product-name"><?php echo $row['name']; ?></div>

                <div class="product-description">
                    <?php echo $row['description']; ?>
                </div>

                <div class="product-price">
                    ₹<?php echo $row['price']; ?>
                </div>

                <div class="product-sku">
                    SKU: <?php echo $row['sku']; ?>
                </div>
            </div>

        <?php } ?>

    </div>

</body>
</html>