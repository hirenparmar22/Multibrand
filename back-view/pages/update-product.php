<?php
include("../config.php");

$id = $_GET['id'];

// FETCH PRODUCT
$query = mysqli_query($conn, "SELECT * FROM products WHERE id='$id'");
$data = mysqli_fetch_assoc($query);

// UPDATE LOGIC
if(isset($_POST['update'])){

    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $stock = $_POST['stock'];
    $status = $_POST['status'];

    // IMAGE UPDATE
    if(!empty($_FILES['image']['name'])){

        $imageName = time() . "_" . $_FILES['image']['name'];
        $tmpName = $_FILES['image']['tmp_name'];

        move_uploaded_file($tmpName, "../uploads/products/" . $imageName);

    } else {
        $imageName = $data['image']; // old image
    }

    mysqli_query($conn, "UPDATE products SET 
        name='$name',
        description='$description',
        price='$price',
        stock='$stock',
        image='$imageName'
        WHERE id='$id'
    ");

    echo "<script>alert('Product Updated'); window.location='dashboard.php?page=edit-product';</script>";
}
?>

<div class="page-content">

<h2>Update Product</h2>

<form method="POST" enctype="multipart/form-data">

<div class="form-grid">

    <div class="form-group">
        <label>Name</label>
        <input type="text" name="name" value="<?= $data['name']; ?>">
    </div>

    <div class="form-group">
        <label>Price</label>
        <input type="number" name="price" value="<?= $data['price']; ?>">
    </div>

    <div class="form-group">
        <label>Stock</label>
        <input type="number" name="stock" value="<?= $data['stock']; ?>">
    </div>

    <div class="form-group">
        <label>Status</label>
        <select name="status">
            <option value="1" <?= $data['status']==1?'selected':''; ?>>Active</option>
            <option value="0" <?= $data['status']==0?'selected':''; ?>>Inactive</option>
        </select>
    </div>

</div>

<div class="form-group">
    <label>Description</label>
    <textarea name="description"><?= $data['description']; ?></textarea>
</div>

<label>Image</label>
<input type="file" name="image" onchange="previewImage(event)">

<img id="previewImg" src="../uploads/products/<?= $data['image']; ?>" width="120">

<br><br>
<button type="submit" name="update">Update Product</button>

</form>

</div>


<style>



.page-content {
    background: #fff;
    padding: 25px;
    border-radius: 20px;
    box-shadow: 0 10px 30px rgba(0,0,0,0.08);
    margin: 20px;
}

/* TITLE */
.page-content h2 {
    font-size: 26px;
    font-weight: 700;
    margin-bottom: 25px;
    color: #111;
}

/* FORM GRID */
.form-grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 20px;
}

/* FORM GROUP */
.form-group {
    display: flex;
    flex-direction: column;
}

/* LABEL */
.form-group label,
label {
    font-weight: 600;
    margin-bottom: 6px;
    color: #333;
}

/* INPUTS */
input, textarea, select {
    padding: 12px ;
    border-radius: 12px;
    border: 1px solid #ddd;
    font-size: 14px;
    transition: 0.3s;
}

/* FOCUS EFFECT */
input:focus, textarea:focus, select:focus {
    border-color: #7c3aed;
    box-shadow: 0 0 0 3px rgba(124,58,237,0.15);
}

/* TEXTAREA */
textarea {
    min-height: 110px;
    resize: vertical;
}

/* IMAGE PREVIEW */
#previewImg {
    margin-top: 10px;
    border-radius: 12px;
    border: 2px solid #eee;
    padding: 4px;
    background: #fafafa;
}

/* BUTTON */
button {
    margin-top: 20px;
    background: #7c3aed;
    color: #fff;
    padding: 14px;
    border: none;
    border-radius: 14px;
    font-size: 15px;
    font-weight: 600;
    cursor: pointer;
    transition: 0.3s;
}

button:hover {
    background: #000;
}

/* BACK BUTTON */
.back-btn {
    display: inline-block;
    margin-top: 15px;
    text-decoration: none;
    color: #7c3aed;
    font-weight: 600;
}

/* RESPONSIVE */
@media(max-width:768px){
    .form-grid {
        grid-template-columns: 1fr;
    }

    .page-content {
        padding: 20px;
        margin: 20px;
    }
}

</style>











<script>
function previewImage(event){
    let reader = new FileReader();

    reader.onload = function(){
        document.getElementById('previewImg').src = reader.result;
    }

    reader.readAsDataURL(event.target.files[0]);
}
</script>