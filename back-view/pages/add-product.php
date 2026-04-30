<?php
include_once(__DIR__ . "/../../config.php");
error_reporting(E_ALL);
ini_set('display_errors', 1);

$product = null;
$productCategories = [];

// 1. FETCH PRODUCT DATA
if (isset($_GET['id'])) {
    $id = mysqli_real_escape_string($conn, $_GET['id']);

    $result = mysqli_query($conn, "SELECT * FROM products WHERE id='$id'");
    $product = ($result && mysqli_num_rows($result) > 0) ? mysqli_fetch_assoc($result) : null;

    // Fetch Categories assigned to this product
    $res = mysqli_query($conn, "SELECT category_id FROM product_categories WHERE product_id='$id'");
    while ($row = mysqli_fetch_assoc($res)) {
        $productCategories[] = $row['category_id'];
    }
}

// FETCH BRANDS (Common for both Add/Edit)
$brandQuery = mysqli_query($conn, "SELECT * FROM brands");

// 2. PUBLISH BUTTON LOGIC
if (isset($_POST['publish_btn'])) {
    $id = mysqli_real_escape_string($conn, $_POST['id']);
    $query = "UPDATE products SET status='active' WHERE id='$id'";

    if (mysqli_query($conn, $query)) {
        header("Location: /back-view/dashboard.php?page=add-product&msg=published&id=$id");
        exit();
    }
}

// 3. UPDATE BUTTON LOGIC
if (isset($_POST['update_btn'])) {
    $id = mysqli_real_escape_string($conn, $_POST['id']);
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $price = (float)$_POST['price'];
    $stock = (int)$_POST['stock'];

    $query = "UPDATE products SET name='$name', price='$price', stock='$stock' WHERE id='$id'";

    if (mysqli_query($conn, $query)) {
        header("Location: /back-view/dashboard.php?page=add-product&msg=updated&id=$id");
        exit();
    }
}

// 4. SAVE DRAFT (INSERT) LOGIC
if (isset($_POST['save_draft_btn'])) {



    // Sanitize Inputs
    $name         = mysqli_real_escape_string($conn, $_POST['name'] ?? '');
    $description  = mysqli_real_escape_string($conn, $_POST['description'] ?? '');
    $short_desc   = mysqli_real_escape_string($conn, $_POST['short_desc'] ?? '');
    $price        = (float)($_POST['price'] ?? 0);
    $sale_price_sql   = !empty($_POST['sale_price']) ? (float)$_POST['sale_price'] : "NULL";
    $stock        = (int)($_POST['stock'] ?? 0);
    $sku          = mysqli_real_escape_string($conn, $_POST['sku'] ?? '');
    $brand_sql = !empty($_POST['brand']) ? (int)$_POST['brand'] : "NULL";
    $categories   = $_POST['category'] ?? [];


    // Image Handling
    $imageName = "";
    if (!empty($_FILES['image']['name'])) {
        $ext = strtolower(pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION));
        if (in_array($ext, ['jpg', 'jpeg', 'png', 'webp'])) {
            $imageName = time() . "_" . $_FILES['image']['name'];
            move_uploaded_file($_FILES['image']['tmp_name'], "../uploads/products/" . str_replace("'", "", $imageName));
        }
    }
    $imageName_sql = !empty($imageName) ? "'$imageName'" : "NULL";

    // INSERT PRODUCT
    $query = "INSERT INTO products 
            (name, description, short_description, price, sale_price, stock, sku, brand_id, image, status) 
            VALUES 
            ('$name', '$description', '$short_desc', $price, $sale_price_sql, $stock, '$sku', $brand_sql, $imageName_sql, 'draft')";

    if (mysqli_query($conn, $query)) {
        $product_id = mysqli_insert_id($conn);

        // Save Categories
        foreach ($categories as $cat_id) {
            $cat_id = (int)$cat_id;
            mysqli_query($conn, "INSERT INTO product_categories (product_id, category_id) VALUES ('$product_id', '$cat_id')");
        }

        // Save Gallery
        if (!empty($_FILES['gallery']['name'][0])) {
            foreach ($_FILES['gallery']['name'] as $key => $val) {
                $galName = time() . "_" . $val;
                if (move_uploaded_file($_FILES['gallery']['tmp_name'][$key], "../uploads/products/" . $galName)) {
                    mysqli_query($conn, "INSERT INTO product_images (product_id, image) VALUES ('$product_id', '$galName')");
                }
            }
        }

        // Save Attributes
        if (isset($_POST['attributes'])) {
            foreach ($_POST['attributes'] as $value_id) {
                $value_id = (int)$value_id;
                $getAttr = mysqli_query($conn, "SELECT attribute_id FROM attribute_values WHERE id='$value_id'");
                if ($attrData = mysqli_fetch_assoc($getAttr)) {
                    $attr_id = $attrData['attribute_id'];
                    mysqli_query($conn, "INSERT INTO product_attributes (product_id, attribute_id, attribute_value_id) VALUES ('$product_id', '$attr_id', '$value_id')");
                }
            }
        }


        header("Location: /back-view/dashboard.php?page=add-product&msg=draft&id=$product_id");
        exit();
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>



<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

<div class="container py-5">
    <?php if (isset($_GET['msg'])): ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <?php
            if ($_GET['msg'] == 'draft') echo "Product saved as draft successfully!";
            if ($_GET['msg'] == 'published') echo "Product published successfully!";
            if ($_GET['msg'] == 'updated') echo "Product updated successfully!";
            ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    <?php endif; ?>
    <!-- Page Header -->
    <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center mb-4 gap-3">
        <div>
            <h2 class="fw-bold m-0">Add New Product</h2>
            <p class="text-muted small">Create and manage your store inventory</p>
        </div>
        <div class="d-flex gap-2">
            <button type="submit" form="mainProductForm" name="save_draft_btn" class="btn btn-light border">Save Draft</button>
            <?php if (isset($product) && ($product['status'] ?? 'draft') == 'active'): ?>
                <button type="submit" form="mainProductForm" name="update_btn" class="btn btn-primary">Update Product</button>
            <?php else: ?>
                <button type="submit" form="mainProductForm" name="publish_btn" class="btn btn-success">Publish Product</button>
            <?php endif; ?>
        </div>
    </div>

    <form id="mainProductForm" action="" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?= $product['id'] ?? '' ?>">

        <div class="row">
            <!-- Left Side: 8 Columns -->
            <div class="col-lg-8">

                <!-- Basic Details Card -->
                <div class="card">
                    <div class="card-body p-4">
                        <div class="mb-4">
                            <label class="form-label fw-semibold">Product Name</label>
                            <input type="text" name="name" class="form-control" value="<?= $product['name'] ?? '' ?>" placeholder="e.g. Premium Leather Jacket">
                        </div>
                        <div class="mb-4">
                            <label class="form-label fw-semibold">Description</label>
                            <textarea name="description" rows="6" class="form-control" placeholder="Describe your product..."><?= $product['description'] ?? '' ?></textarea>
                        </div>
                        <div class="mb-0">
                            <label class="form-label fw-semibold">Short Description</label>
                            <textarea name="short_desc" rows="2" class="form-control"><?= $product['short_description'] ?? '' ?></textarea>
                        </div>
                    </div>
                </div>

                <!-- Product Data Tabs Card -->
                <div class="card">
                    <div class="card-header bg-light-subtle">
                        <ul class="nav nav-pills nav-pills-custom border-0" id="productTab" role="tablist">
                            <li class="nav-item">
                                <button class="nav-link active" id="general-tab" data-bs-toggle="pill" data-bs-target="#general" type="button">General</button>
                            </li>
                            <li class="nav-item">
                                <button class="nav-link" id="inventory-tab" data-bs-toggle="pill" data-bs-target="#inventory" type="button">Inventory</button>
                            </li>
                            <li class="nav-item">
                                <button class="nav-link" id="shipping-tab" data-bs-toggle="pill" data-bs-target="#shipping" type="button">Shipping</button>
                            </li>
                        </ul>
                    </div>
                    <div class="card-body p-4">
                        <div class="tab-content" id="productTabContent">
                            <!-- General -->
                            <div class="tab-pane fade show active" id="general">
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <label class="form-label small fw-bold text-muted">Regular Price (₹)</label>
                                        <input type="number" name="price" class="form-control" value="<?= $product['price'] ?? '' ?>">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label small fw-bold text-muted">Sale Price (₹)</label>
                                        <input type="number" name="sale_price" class="form-control" value="<?= $product['sale_price'] ?? '' ?>">
                                    </div>
                                </div>
                            </div>
                            <!-- Inventory -->
                            <div class="tab-pane fade" id="inventory">
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <label class="form-label small fw-bold text-muted">Stock Quantity</label>
                                        <input type="number" name="stock" class="form-control" value="<?= $product['stock'] ?? '' ?>">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label small fw-bold text-muted">SKU</label>
                                        <input type="text" name="sku" class="form-control" value="<?= $product['sku'] ?? '' ?>">
                                    </div>
                                </div>
                            </div>
                            <!-- Shipping -->
                            <div class="tab-pane fade" id="shipping">
                                <div class="mb-3">
                                    <label class="form-label small fw-bold text-muted">Weight (kg)</label>
                                    <input type="text" name="weight" class="form-control" value="<?= $product['weight'] ?? '' ?>">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Side: 4 Columns -->
            <div class="col-lg-4">

                <!-- Status Card (Collapsible) -->
                <div class="card shadow-sm">
                    <div class="card-header" style="cursor:pointer;" onclick="toggleCollapse('statusCollapse')">
                        <span>Status</span>
                        <i class="bi bi-chevron-down small" id="statusCollapseIcon"></i>
                    </div>
                    <div class="collapse show" id="statusCollapse">
                        <div class="card-body">
                            <div class="d-flex align-items-center mb-3">
                                <span class="badge bg-info-subtle text-info rounded-pill px-3 py-2 uppercase">
                                    <i class="bi bi-circle-fill me-1 small"></i> <?= $product['status'] ?? 'Draft' ?>
                                </span>
                            </div>
                            <button type="submit" name="save_draft_btn" class="btn btn-secondary w-100 mb-2">Save Draft</button>
                        </div>
                    </div>
                </div>

                <!-- Media Upload Card -->
                <div class="card">
                    <div class="card-header">Product Images</div>
                    <div class="card-body">
                        <label class="small fw-bold text-muted mb-2">Thumbnail</label>
                        <div class="upload-area mb-3" onclick="document.getElementById('mainImg').click()">
                            <i class="bi bi-image text-muted fs-2"></i>
                            <p class="small text-muted m-0">Click to upload main image</p>
                            <input type="file" id="mainImg" name="image" class="d-none">
                        </div>

                        <label class="small fw-bold text-muted mb-2">Gallery</label>
                        <input type="file" name="gallery[]" id="galleryInput" multiple class="form-control form-control-sm mb-3">
                        <div id="galleryPreview" class="d-flex flex-wrap gap-2"></div>
                    </div>
                </div>

                <!-- Category Tree Card -->
                <div class="card">
                    <div class="card-header">
                        Categories
                        <a href="add-category.php" class="text-decoration-none small text-primary">+ New</a>
                    </div>
                    <div class="card-body" style="max-height: 300px; overflow-y: auto;">
                        <?php
                        $parentQuery = mysqli_query($conn, "SELECT * FROM categories WHERE parent_id IS NULL OR parent_id = 0");
                        while ($parent = mysqli_fetch_assoc($parentQuery)): ?>
                            <div class="category-tree-item">
                                <div class="form-check">
                                    <input class="form-check-input parent-check" type="checkbox" name="category[]" value="<?= $parent['id']; ?>" id="cat-<?= $parent['id']; ?>" <?= in_array($parent['id'], $productCategories) ? 'checked' : '' ?>>
                                    <label class="form-check-label fw-semibold" for="cat-<?= $parent['id']; ?>"><?= $parent['name']; ?></label>
                                </div>
                                <?php
                                $childQuery = mysqli_query($conn, "SELECT * FROM categories WHERE parent_id = {$parent['id']}");
                                while ($child = mysqli_fetch_assoc($childQuery)): ?>
                                    <div class="child-item">
                                        <div class="form-check">
                                            <input class="form-check-input child-of-<?= $parent['id']; ?>" type="checkbox" name="category[]" value="<?= $child['id']; ?>" id="cat-<?= $child['id']; ?>" <?= in_array($child['id'], $productCategories) ? 'checked' : '' ?>>
                                            <label class="form-check-label small" for="cat-<?= $child['id']; ?>"><?= $child['name']; ?></label>
                                        </div>
                                    </div>
                                <?php endwhile; ?>
                            </div>
                        <?php endwhile; ?>
                    </div>
                </div>

                <!-- Attributes Card -->
                <div class="card">
                    <div class="card-header">Attributes</div>
                    <div class="card-body">
                        <?php
                        $attributes = mysqli_query($conn, "SELECT * FROM attributes");
                        while ($attr = mysqli_fetch_assoc($attributes)): ?>
                            <div class="mb-3">
                                <label class="small text-uppercase fw-bold text-muted d-block mb-2"><?= $attr['name'] ?></label>
                                <div class="attr-chip-wrapper">
                                    <?php
                                    $values = mysqli_query($conn, "SELECT * FROM attribute_values WHERE attribute_id={$attr['id']}");
                                    while ($val = mysqli_fetch_assoc($values)): ?>
                                        <label class="attr-chip">
                                            <input type="checkbox" name="attributes[]" value="<?= $val['id'] ?>">
                                            <span><?= $val['value'] ?></span>
                                        </label>
                                    <?php endwhile; ?>
                                </div>
                            </div>
                        <?php endwhile; ?>
                    </div>
                </div>

            </div>
        </div>
    </form>
</div>
<div class="position-fixed top-0 end-0 p-3" style="z-index: 9999">
    <div id="liveToast" class="toast align-items-center text-bg-success border-0" role="alert">
        <div class="d-flex">
            <div class="toast-body" id="toastMsg"></div>
            <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"></button>
        </div>
    </div>
</div>


<style>
:root { --admin-bg: #f0f4ff; }

body {
    font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif;
    background: linear-gradient(135deg, #f0f4ff 0%, #faf5ff 45%, #f0fdfa 100%);
    color: #334155;
    min-height: 100vh;
    position: relative;
    overflow-x: hidden;
}
body::before {
    content: "";
    position: fixed; top: -120px; left: -80px;
    width: 460px; height: 460px;
    background: radial-gradient(circle, rgba(99,102,241,0.12), transparent 70%);
    border-radius: 50%; pointer-events: none; z-index: 0;
}
body::after {
    content: "";
    position: fixed; bottom: -100px; right: -60px;
    width: 380px; height: 380px;
    background: radial-gradient(circle, rgba(139,92,246,0.09), transparent 70%);
    border-radius: 50%; pointer-events: none; z-index: 0;
}

.container { position: relative; z-index: 1; }

/* Glass cards */
.card {
    background: rgba(255,255,255,0.70) !important;
    backdrop-filter: blur(18px);
    -webkit-backdrop-filter: blur(18px);
    border: 1px solid rgba(255,255,255,0.88) !important;
    border-radius: 20px !important;
    box-shadow: 0 4px 28px rgba(99,102,241,0.07), 0 1px 3px rgba(0,0,0,0.04) !important;
    margin-bottom: 16px;
    overflow: hidden;
}

.card-header {
    background: rgba(255,255,255,0.5) !important;
    border-bottom: 1px solid rgba(99,102,241,0.08) !important;
    padding: 14px 20px;
    font-size: 13px;
    font-weight: 700;
    color: #1e1b4b;
}

/* Form controls */
.form-control, .form-select {
    background: rgba(255,255,255,0.85) !important;
    border: 1px solid rgba(99,102,241,0.2) !important;
    border-radius: 10px !important;
    padding: 10px 13px;
    font-size: 13px;
    color: #1e293b;
    transition: border-color 0.2s, box-shadow 0.2s;
}
.form-control:focus, .form-select:focus {
    border-color: #6366f1 !important;
    box-shadow: 0 0 0 3px rgba(99,102,241,0.11) !important;
}

/* Nav pills */
.nav-pills-custom {
    display: flex;
    gap: 4px;
    background: rgba(99,102,241,0.06);
    border-radius: 11px;
    padding: 4px;
}
.nav-pills-custom .nav-link {
    flex: 1;
    text-align: center;
    border-radius: 8px !important;
    font-size: 12px;
    font-weight: 600;
    color: #64748b;
    padding: 8px 10px;
    border: none;
    transition: all 0.18s;
}
.nav-pills-custom .nav-link.active {
    background: #fff !important;
    color: #4f46e5 !important;
    box-shadow: 0 1px 4px rgba(99,102,241,0.15);
}

/* Attribute chips */
.attr-chip span {
    padding: 5px 14px;
    border-radius: 20px;
    border: 1px solid rgba(99,102,241,0.2);
    font-size: 12px;
    font-weight: 500;
    background: rgba(255,255,255,0.85);
    color: #475569;
    transition: all 0.18s;
}
.attr-chip span:hover { border-color: #6366f1; color: #4f46e5; }
.attr-chip input:checked + span {
    background: #6366f1;
    color: #fff;
    border-color: #6366f1;
}

/* Upload area */
.upload-area {
    border: 2px dashed rgba(99,102,241,0.22);
    border-radius: 12px;
    padding: 24px 16px;
    text-align: center;
    background: rgba(99,102,241,0.03);
    cursor: pointer;
    transition: all 0.2s;
}
.upload-area:hover {
    border-color: #6366f1;
    background: rgba(99,102,241,0.06);
}

.preview-img {
    width: 52px; height: 52px;
    object-fit: cover;
    border-radius: 8px;
    border: 1px solid rgba(99,102,241,0.15);
}

/* Buttons */
.btn {
    border-radius: 10px !important;
    font-size: 13px;
    font-weight: 600;
    padding: 9px 18px;
    transition: all 0.18s;
}
.btn-primary {
    background: linear-gradient(135deg, #6366f1, #8b5cf6) !important;
    border: none !important;
}
.btn-primary:hover { opacity: 0.9; transform: translateY(-1px); }
.btn-secondary, .btn-light {
    background: rgba(255,255,255,0.8) !important;
    border: 1px solid rgba(99,102,241,0.25) !important;
    color: #475569 !important;
}
.btn-secondary:hover, .btn-light:hover { background: #fff !important; }
.btn-success {
    background: linear-gradient(135deg, #10b981, #059669) !important;
    border: none !important;
}

/* Status badge */
.badge.bg-info-subtle {
    background: rgba(99,102,241,0.1) !important;
    color: #4338ca !important;
    font-weight: 600;
    border-radius: 20px;
}

/* Category tree */
.category-tree-item { padding: 3px 0; }
.form-check-input:checked {
    background-color: #6366f1 !important;
    border-color: #6366f1 !important;
}
.child-item {
    margin-left: 20px;
    padding-left: 10px;
    border-left: 2px solid rgba(99,102,241,0.12);
}

@media (max-width: 768px) {
    .card { border-radius: 14px !important; }
}
</style>







<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<script>
    // 1. Toggle Collapsible Cards
    function toggleCollapse(id) {
        const el = document.getElementById(id);
        const icon = document.getElementById(id + 'Icon');
        const bsCollapse = new bootstrap.Collapse(el, {
            toggle: true
        });

        el.addEventListener('shown.bs.collapse', () => {
            icon.classList.replace('bi-chevron-down', 'bi-chevron-up');
        });
        el.addEventListener('hidden.bs.collapse', () => {
            icon.classList.replace('bi-chevron-up', 'bi-chevron-down');
        });
    }

    // 2. Gallery Preview Logic
    document.getElementById('galleryInput').addEventListener('change', function(e) {
        const preview = document.getElementById('galleryPreview');
        preview.innerHTML = '';
        [...e.target.files].forEach(file => {
            const reader = new FileReader();
            reader.onload = (e) => {
                const img = document.createElement('img');
                img.src = e.target.result;
                img.className = 'preview-img';
                preview.appendChild(img);
            };
            reader.readAsDataURL(file);
        });
    });

    // 3. Category Tree Logic (Parent-Child)
    document.querySelectorAll('.parent-check').forEach(parent => {
        parent.addEventListener('change', function() {
            const children = document.querySelectorAll('.child-of-' + this.value);
            children.forEach(child => child.checked = this.checked);
        });
    });

    <?php if (isset($_GET['msg'])): ?>
        var msg = "";
        <?php if ($_GET['msg'] == 'draft'): ?>
            msg = "Product saved as draft!";
        <?php elseif ($_GET['msg'] == 'published'): ?>
            msg = "Product published!";
        <?php elseif ($_GET['msg'] == 'updated'): ?>
            msg = "Product updated!";
        <?php endif; ?>

        document.getElementById("toastMsg").innerText = msg;
        var toast = new bootstrap.Toast(document.getElementById('liveToast'));
        toast.show();
    <?php endif; ?>
</script>