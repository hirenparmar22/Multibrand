<?php
include 'config.php';

// ✅ ADD ATTRIBUTE
if(isset($_POST['add_attribute'])){
    $name = $_POST['name'];
    $slug = strtolower(str_replace(' ', '-', $name));

    mysqli_query($conn, "INSERT INTO attributes (name, slug) 
    VALUES ('$name', '$slug')");
}

// ✅ ADD ATTRIBUTE VALUE
if(isset($_POST['add_value'])){
    $value = $_POST['value'];
    $attribute_id = $_POST['attribute_id'];

    mysqli_query($conn, "INSERT INTO attribute_values (attribute_id, value) 
    VALUES ('$attribute_id', '$value')");
}
?>


<h3>Add Attribute</h3>
<form method="POST">
    <input type="text" name="name" placeholder="Attribute Name (Color, Size)" required>
    <button type="submit" name="add_attribute">Add Attribute</button>
</form>

<hr>


<h3>Add Attribute Value</h3>
<form method="POST">

    <input type="text" name="value" placeholder="Enter value (Red, Blue...)" required>

    <select name="attribute_id" required>
        <option value="">Select Attribute</option>

        <?php
        $attrs = mysqli_query($conn, "SELECT * FROM attributes");
        while($a = mysqli_fetch_assoc($attrs)){
            echo "<option value='{$a['id']}'>{$a['name']}</option>";
        }
        ?>
    </select>

    <button type="submit" name="add_value">Add Value</button>
</form>