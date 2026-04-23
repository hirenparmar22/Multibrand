<?php
include("../config.php");

// CATEGORY FETCH
$catQuery = mysqli_query($conn, "SELECT * FROM categories");

// BRAND FETCH
$brandQuery = mysqli_query($conn, "SELECT * FROM brands");

if(isset($_POST['submit'])){

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
    $category = mysqli_real_escape_string($conn, $_POST['category']);
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
    (name, description, short_description, price, sale_price, stock, sku, category_id, brand_id, image, status) 
    VALUES 
    ('$name','$description','$short_desc','$price','$sale_price','$stock','$sku','$category','$brand','$imageName','$status')";

    if(mysqli_query($conn, $query)){

        // ✅ STEP 4 START (IMPORTANT)
        $product_id = mysqli_insert_id($conn);

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
        // ✅ STEP 4 END

        echo "<script>alert('Product Added Successfully');</script>";

    } else {
        echo mysqli_error($conn);
    }
}
?>

<div class="page-header">
    <h2>Add Product</h2>
</div>

<form action="" method="POST" enctype="multipart/form-data">

<div class="content-wrapper">

    <!-- LEFT SIDE -->
    <div class="content-left">

        <!-- Product Name -->
        <div class="card">
            <label>Product Name</label>
            <input type="text" name="name" placeholder="Enter product name">
        </div>

        <!-- Description -->
        <div class="card">
            <label>Description</label>
            <textarea name="description" rows="5"></textarea>
        </div>

        <!-- Price -->
        <div class="card">
            <label>Regular Price</label>
            <input type="text" name="price">

            <label>Sale Price</label>
            <input type="text" name="sale_price">
        </div>

        <!-- Inventory -->
        <div class="card">
            <label>Stock</label>
            <input type="text" name="stock">

            <label>SKU</label>
            <input type="text" name="sku">
        </div>

        <!-- Short Description -->
        <div class="card">
            <label>Short Description</label>
            <textarea name="short_desc" rows="3"></textarea>
        </div>

    </div>

    <!-- RIGHT SIDE -->
    <div class="content-right">

        <!-- Publish -->
        <div class="card">
            <label>Status</label>
            <select name="status">
                <option value="draft">Draft</option>
                <option value="active">Publish</option>
            </select>

            <button type="submit" class="btn">Save Product</button>
        </div>

        <!-- Image -->
        <div class="card">
            <label>Product Image</label>
            <label>Product Gallery</label>
            <input type="file" name="gallery[]" multiple>
            <div id="preview"></div>
        </div>

        <!-- Category -->
        <div class="form-group">
            <label>Category</label>
            <select name="category">
                <option value="">Select Category</option>

            <?php while($cat = mysqli_fetch_assoc($catQuery)){ ?>
                <option value="<?= $cat['id']; ?>">
                <?= $cat['name']; ?>
                </option>
            <?php } ?>

            </select>
        </div>

        <!-- Brand -->
        <div class="form-group">
                <label>Brand</label>
                <select name="brand" required>
                    <option value="">Select Brand</option>

                    <?php while($b = mysqli_fetch_assoc($brandQuery)){ ?>
                        <option value="<?= $b['id']; ?>">
                        <?= $b['brand_name']; ?>
                    </option>
                    <?php } ?>

                </select>
        </div>
        <!-- <button type="submit" name="submit" class="btn">Save Product</button> -->
    </div>

</div>

</form>



<style>

.page-header {
    margin-bottom: 20px;
}

.content-wrapper {
    display: flex;
    gap: 20px;
}

.content-left {
    flex: 3;
}

.content-right {
    flex: 1;
}

.card {
    background: white;
    padding: 20px;
    border-radius: 12px;
    margin-bottom: 20px;
    box-shadow: 0 2px 8px rgba(0,0,0,0.05);
}

.card label {
    display: block;
    margin-bottom: 6px;
    font-weight: 600;
}

.card input,
.card textarea,
.card select {
    /* width: 100%; */
    padding: 10px;
    /* margin-bottom: 15px; */
    border: 1px solid #ddd;
    border-radius: 6px;
}

.btn {
    width: 100%;
    background: #7c3aed;
    color: white;
    padding: 12px;
    border: none;
    border-radius: 8px;
    cursor: pointer;
}

.btn:hover {
    background: black;
}


@media(max-width:768px){
    .content-wrapper {
        flex-direction: column;
    }
}

</style>

<script>
document.querySelector('input[name="gallery[]"]').addEventListener('change', function(e){

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
</script>