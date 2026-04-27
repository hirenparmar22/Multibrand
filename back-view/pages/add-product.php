<?php
include_once("../config.php");
error_reporting(E_ALL);
ini_set('display_errors', 1);

// CATEGORY FETCH
$catQuery = mysqli_query($conn, "SELECT * FROM categories");

// BRAND FETCH
$brandQuery = mysqli_query($conn, "SELECT * FROM brands");

if(isset($_POST['submit'])){
    echo "FORM SUBMITTED<br>";
    
    if(empty($_POST['name']) || empty($_POST['price']) || empty($_POST['stock'])){
    echo "<script>alert('Please fill required fields');</script>";
    return;
    }

    $name = mysqli_real_escape_string($conn, $_POST['name']);
$description = mysqli_real_escape_string($conn, $_POST['description']);
$short_desc = mysqli_real_escape_string($conn, $_POST['short_desc']);
    $price = mysqli_real_escape_string($conn, $_POST['price']);
    $sale_price = mysqli_real_escape_string($conn, $_POST['sale_price']);
    $stock = mysqli_real_escape_string($conn, $_POST['stock']);
    $sku = mysqli_real_escape_string($conn, $_POST['sku']);
    // $category = mysqli_real_escape_string($conn, $_POST['category']);
    $categories = isset($_POST['category']) ? $_POST['category'] : [];
    $brand = mysqli_real_escape_string($conn, $_POST['brand']);
    $status = mysqli_real_escape_string($conn, $_POST['status']);

    // 🔹 MAIN IMAGE UPLOAD
    $imageName = time() . "_" . $_FILES['image']['name'];
    $tmpName = $_FILES['image']['tmp_name'];

        // ✅ IMAGE VALIDATION (AA AHI MUKVU)
    $allowed = ['jpg','jpeg','png','webp'];

    $ext = strtolower(pathinfo($imageName, PATHINFO_EXTENSION));

    if(!in_array($ext, $allowed)){
    echo "<script>alert('Only image files allowed');</script>";
    return;
    }


    $folder = "../uploads/products/" . $imageName;
    move_uploaded_file($tmpName, $folder);

    // 🔹 INSERT PRODUCT
    $query = "INSERT INTO products 
    (name, description, short_description, price, sale_price, stock, sku, brand_id, image, status) 
    VALUES 
    ('$name','$description','$short_desc','$price','$sale_price','$stock','$sku','$brand','$imageName','$status')";

    // if(mysqli_query($conn, $query)){
    //     // $product_id = mysqli_insert_id($conn);
    if(mysqli_query($conn, $query)){
    echo "INSERT SUCCESS<br>";
    $product_id = mysqli_insert_id($conn);
} else {
    die("DB ERROR: " . mysqli_error($conn));
}

        // CATEGORY INSERT (NEW)
        if(!empty($categories)){
            foreach($categories as $cat_id){
            mysqli_query($conn, "INSERT INTO product_categories (product_id, category_id) 
            VALUES ('$product_id', '$cat_id')");
            }
    }

        $files = $_FILES['gallery'];

        if(!empty($files['name'][0])){

            foreach($files['name'] as $key => $value){

                
                $galleryName = time() . "_" . $files['name'][$key];
                $tmpName = $files['tmp_name'][$key];

                $path = "../uploads/products/" . $galleryName;

                move_uploaded_file($tmpName, $path);

                mysqli_query($conn, "INSERT INTO product_images (product_id, image) 
                VALUES ('$product_id', '$galleryName')");
            }

        }
            // 🔥 ATTRIBUTES SAVE
            if(isset($_POST['attributes'])){
                foreach($_POST['attributes'] as $attr_id => $term_id){

                if(!empty($term_id)){
                     mysqli_query($conn, "INSERT INTO product_attributes 
                    (product_id, attribute_id, term_id) 
                    VALUES ('$product_id', '$attr_id', '$term_id')");
                }

            }
        }
        // ✅ STEP 4 END

        echo "<script>alert('Product Added Successfully');</script>";

    }else {
        echo mysqli_error($conn);
    }

?>
<div class="page-header">
    <h2>Add Product</h2>
</div>

<form action="" method="POST" enctype="multipart/form-data">

<div class="product-wrapper">

    <!-- LEFT SIDE -->
    <div class="product-left">

        <!-- Product Name -->
        <div class="product-card">
            <label>Product Name</label>
            <input type="text" name="name" placeholder="Enter product name" required>
        </div>

        <!-- Description -->
        <div class="product-card">
            <label>Description</label>
            <textarea name="description" rows="5"></textarea>
        </div>

        <!-- Short Description -->
        <div class="product-card">
            <label>Short Description</label>
            <textarea name="short_desc" rows="3"></textarea>
        </div>

        <!-- PRODUCT DATA TABS -->
        <div class="product-card">

            <div class="product-data-box">

                <!-- Tabs -->
                <div class="product-tabs">
                    <button type="button" class="tab-btn active" onclick="openTab('general')">General</button>
                    <button type="button" class="tab-btn" onclick="openTab('inventory')">Inventory</button>
                    <button type="button" class="tab-btn" onclick="openTab('shipping')">Shipping</button>
                </div>

                <!-- Content -->
                <div class="tab-content-area">

                    <!-- General -->
                    <div id="general" class="tab-content active">
                        <label>Regular Price</label>
                        <input type="text" name="price">

                        <label>Sale Price</label>
                        <input type="text" name="sale_price">
                    </div>

                    <!-- Inventory -->
                    <div id="inventory" class="tab-content">
                        <label>Stock</label>
                        <input type="text" name="stock">

                        <label>SKU</label>
                        <input type="text" name="sku">
                    </div>

                    <!-- Shipping -->
                    <div id="shipping" class="tab-content">
                        <label>Weight</label>
                        <input type="text" name="weight">
                    </div>

                </div>

            </div>

        </div>

    </div>

    <!-- RIGHT SIDE -->
    <div class="product-right">

        <!-- Publish -->
        <div class="product-card">

    <!-- HEADER -->
    <div class="card-header" onclick="toggleCard(this)">
        <span>Status</span>

        <span class="icons">
            <i class="bi bi-caret-down-fill down-icon"></i>
            <i class="bi bi-caret-up-fill up-icon"></i>
        </span>
    </div>

    <!-- BODY -->
    <div class="card-body">

        <label>Status</label>
        <select name="status">
            <option value="draft">Draft</option>
            <option value="active">Publish</option>
        </select>

       
    </div>

</div>

        <!-- Image -->
            <div class="product-card">

    <!-- HEADER -->
    <div class="card-header" onclick="toggleCard(this)">
        <span>Product Image</span>

        <span class="icons">
            <i class="bi bi-caret-down-fill down-icon"></i>
            <i class="bi bi-caret-up-fill up-icon"></i>
        </span>
    </div>

    <!-- BODY -->
    <div class="card-body">

        <label>Main Image</label>
        <input type="file" name="image" required>

        <label>Product Gallery</label>
        <input type="file" name="gallery[]" multiple>

        <div id="preview"></div>

    </div>

</div>
            
            <div class="product-card">
                <div class="card-header" onclick="toggleCard(this)">
                <span>Product Category</span>
                <span class="icons">
                <i class="bi bi-caret-down-fill down-icon"></i>
                <i class="bi bi-caret-up-fill up-icon"></i>
                </span>
            </div>
    <div class="card-body">

    <div class="category-tree">

        <?php
        $parentQuery = mysqli_query($conn, "SELECT * FROM categories WHERE parent_id = 0");

        while($parent = mysqli_fetch_assoc($parentQuery)){
        ?>

            <div class="parent-item">
                <label>
                    <input type="checkbox" name="category[]" value="<?= $parent['id']; ?>" class="parent-checkbox">
                    <?= $parent['name']; ?>
                </label>

                <?php
                $childQuery = mysqli_query($conn, "SELECT * FROM categories WHERE parent_id = {$parent['id']}");

                while($child = mysqli_fetch_assoc($childQuery)){
                ?>
                    <div class="child-item">
                        <label>
                            <input type="checkbox" name="category[]" value="<?= $child['id']; ?>" class="child-of-<?= $parent['id']; ?>">
                            <?= $child['name']; ?>
                        </label>
                    </div>
                <?php } ?>

            </div>

        <?php } ?>

    </div>
    <div class="add-new-link">
        <a href="dashboard.php?page=add-category">+ Add Category</a>
    </div>
    </div>
</div>

        <!-- Brand -->
        <div class="product-card">
             <div class="card-header" onclick="toggleCard(this)">
                <span>Brand</span>
                <span class="icons">
            <i class="bi bi-caret-down-fill down-icon"></i>
            <i class="bi bi-caret-up-fill up-icon"></i>
        </span>
            </div>
           
            <div class="card-body">
            <select name="brand">
                <option value="">Select Brand</option>
                <?php while($b = mysqli_fetch_assoc($brandQuery)){ ?>
                    <option value="<?= $b['id']; ?>">
                        <?= $b['brand_name']; ?>
                    </option>
                <?php } ?>
            </select>
            <div class="add-new-link">
                <!-- <a href="dashboard.php?page=add-brand">+ Add Brand</a> -->
                <a href="add-brands.php">+ Add Brand</a>
            </div>
            </div>
        </div>

        <!-- Attributes -->
<div class="product-card">

    <div class="card-header" onclick="toggleCard(this)">
        <span>Attributes</span>
        <span class="icons">
            <i class="bi bi-caret-down-fill down-icon"></i>
            <i class="bi bi-caret-up-fill up-icon"></i>
        </span>
    </div>

    <div class="card-body">

        <?php
        $attributes = mysqli_query($conn, "SELECT * FROM attributes");

        while($attr = mysqli_fetch_assoc($attributes)){
            echo "<label>{$attr['name']}</label>";

            $terms = mysqli_query($conn, 
            "SELECT * FROM attribute_terms WHERE attribute_id={$attr['id']}");

            echo "<select name='attributes[{$attr['id']}]'>";
            
            echo "<option value=''>Select {$attr['name']}</option>";

            while($term = mysqli_fetch_assoc($terms)){
                echo "<option value='{$term['id']}'>{$term['term_name']}</option>";
            }

            echo "</select>";
        }
        ?>

    </div>
    

</div>
 <button type="submit" name="submit" class="product-btn">
            Save Product
        </button>

    </div>
        
</div>

</form>




<style>
.page-header {
    margin-bottom: 20px;
}

.product-wrapper {
    display: flex;
    gap: 20px;
}

.product-left {
    flex: 3;
}

.product-right {
    flex: 1;
}

.product-card {
    background: whitesmoke;
    padding: 20px;
    border-radius: 12px;
    border: 1px solid #ddd;
    margin-bottom: 20px;
    box-shadow: 0 2px 8px rgba(0,0,0,0.05);
}

.product-card label {
    font-weight: 600;
    margin-bottom: 6px;
    display: block;
    border-bottom: 1px solid #eee;
}

/* Inputs */
.product-card input,
.product-card textarea,
.product-card select {
    width: 100%;
    padding: 10px;
    margin-bottom: 15px;
    border: 1px solid #ddd;
    border-radius: 6px;
    background: whitesmoke;
}

/* Button */
.product-btn {
    width: 100%;
    background: #7c3aed;
    color: white;
    padding: 12px;
    border: none;
    border-radius: 8px;
    cursor: pointer;
}

.product-btn:hover {
    background: black;
}

/* Tabs */
.product-data-box {
    display: flex;
    border: 1px solid #ddd;
    border-radius: 10px;
}

.product-tabs {
    width: 180px;
    background: whitesmoke;
    border-right: 1px solid #ddd;
}

.tab-btn {
    width: 100%;
    padding: 12px;
    border: none;
    background: none;
    text-align: left;
    cursor: pointer;
}

.tab-btn.active {
    background: white;
    font-weight: bold;
}

.tab-content-area {
    flex: 1;
    padding: 20px;
}

.tab-content {
    display: none;
}

.tab-content.active {
    display: block;
}

/* Category Tree */
.category-tree {
    padding-top: 10px;
    font-size: 14px;
}

.category-tree label {
    display: inline-flex;
    align-items: center;
    gap: 6px;   /* ochho gap */
    cursor: pointer;
}

.parent-item {
    margin-bottom: 8px;
}

.child-item {
    margin-left: 20px;   /* child ne andar shift */
}
.category-tree input[type="checkbox"] {
    margin: 0;              
    vertical-align: middle;
}
.card-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    cursor: pointer;
    font-weight: 600;
}
.card-body {
    display: none;
    margin-top: 10px;
}

/* default state */
.down-icon {
    display: inline;
}

.up-icon {
    display: none;
}

/* when active */
.product-card.active .card-body {
    display: block;
}

.product-card.active .down-icon {
    display: none;
}

.product-card.active .up-icon {
    display: inline;
}

.add-new-link {
    margin-top: 5px;
}

.add-new-link a {
    font-size: 13px;
    color: #4f46e5;
    text-decoration: none;
    font-weight: 500;
}

.add-new-link a:hover {
    text-decoration: underline;
}
/* Responsive */
@media(max-width:768px){
    .product-wrapper {
        flex-direction: column;
    }

    .product-data-box {
        flex-direction: column;
    }

    .product-tabs {
        width: 100%;
        display: flex;
    }

    .tab-btn {
        flex: 1;
        text-align: center;
    }
}
</style>

<script>
document.addEventListener("DOMContentLoaded", function(){

    // Tabs
    window.openTab = function(tabName, el){
        let tabs = document.querySelectorAll(".tab-content");
        let buttons = document.querySelectorAll(".tab-btn");

        tabs.forEach(tab => tab.classList.remove("active"));
        buttons.forEach(btn => btn.classList.remove("active"));

        document.getElementById(tabName).classList.add("active");
        el.classList.add("active");
    }

    // Gallery preview
    let galleryInput = document.querySelector('input[name="gallery[]"]');

    if(galleryInput){
        galleryInput.addEventListener('change', function(e){

            let preview = document.getElementById('preview');
            preview.innerHTML = "";

            for(let file of e.target.files){
                let reader = new FileReader();

                reader.onload = function(e){
                    let img = document.createElement("img");
                    img.src = e.target.result;
                    img.style.width = "80px";
                    img.style.margin = "5px";
                    preview.appendChild(img);
                }

                reader.readAsDataURL(file);
            }
        });
    }

    // Parent → Child checkbox
    document.querySelectorAll(".parent-checkbox").forEach(parent => {
        parent.addEventListener("change", function(){

            let parentId = this.value;

            let children = document.querySelectorAll(".child-of-" + parentId);

            children.forEach(child => {
                child.checked = parent.checked;
            });

        });
    });

});

function toggleCard(header){
    let card = header.parentElement;
    card.classList.toggle("active");
}
</script>