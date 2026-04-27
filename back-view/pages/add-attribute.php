<?php
include 'config.php';

if(isset($_POST['add_attribute'])){
    $name = $_POST['name'];
    $slug = strtolower(str_replace(' ', '-', $name));

    $query = "INSERT INTO attributes (name, slug) VALUES ('$name', '$slug')";
    mysqli_query($conn, $query);

    header("Location: attributes.php");
}
?>

<form method="POST">
    <input type="text" name="name" placeholder="Attribute Name" required>
    <button type="submit" name="add_attribute">Add Attribute</button>
</form>