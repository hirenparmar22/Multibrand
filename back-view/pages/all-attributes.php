<?php
include '../config.php';

if (isset($_GET['delete'])) {
    $id = intval($_GET['delete']);

    mysqli_query($conn, "DELETE FROM attribute_values WHERE attribute_id='$id'");
    mysqli_query($conn, "DELETE FROM attributes WHERE id='$id'");

    header("Location: dashboard.php?page=all-attributes");
    exit;
}

if (isset($_POST['add_attribute'])) {
    $attribute_name = mysqli_real_escape_string($conn, $_POST['attribute_name']);

    mysqli_query($conn, "INSERT INTO attributes(name) VALUES('$attribute_name')");
}


if (isset($_POST['add_value'])) {
    $value = mysqli_real_escape_string($conn, $_POST['value']);
    $attribute_id = intval($_POST['attribute_id']);

    mysqli_query($conn, "INSERT INTO attribute_values(attribute_id, value) 
    VALUES('$attribute_id', '$value')");
}

// if(isset($_GET['delete'])){
//     $id = intval($_GET['delete']);

//     // first delete values
//     mysqli_query($conn, "DELETE FROM attribute_values WHERE attribute_id='$id'");

//     // then delete attribute
//     mysqli_query($conn, "DELETE FROM attributes WHERE id='$id'");

//     header("Location: dashboard.php?page=all-attributes");
//     exit;
// }
?>

<div class="page-content">

    <h2>Add Attribute</h2>

    <form method="POST">
        <input type="text" name="attribute_name" placeholder="Enter attribute name (Color, Size)" required>
        <button type="submit" name="add_attribute">Add Attribute</button>
    </form>

    <hr>

    <h2>Add Attribute Value</h2>

    <form method="POST">
        <select name="attribute_id" required>
            <option value="">Select Attribute</option>

            <?php
            $attrs = mysqli_query($conn, "SELECT * FROM attributes");
            while ($a = mysqli_fetch_assoc($attrs)) {
                echo "<option value='{$a['id']}'>{$a['name']}</option>";
            }
            ?>
        </select>

        <input type="text" name="value" placeholder="Enter value (Red, Blue, S, M)" required>

        <button type="submit" name="add_value">Add Value</button>
    </form>

    <hr>


    <h2>All Attributes</h2>

    <div class="table-responsive">
        <table class="table table-bordered table-hover align-middle bg-white">

            <thead class="table-dark text-center">
                <tr>
                    <th>ID</th>
                    <th>Attribute</th>
                    <th>Values</th>
                    <th>Action</th>
                </tr>
            </thead>

            <tbody>

                <?php
                $attribute_query = mysqli_query($conn, "SELECT * FROM attributes ORDER BY id ASC");

                if (mysqli_num_rows($attribute_query) > 0) {
                    while ($row = mysqli_fetch_assoc($attribute_query)) {
                ?>

                        <tr>

                            <td class="text-center"><?php echo $row['id']; ?></td>

                            <td class="fw-semibold">
                                <?php echo htmlspecialchars($row['name']); ?>
                            </td>

                            <td>
                                <?php
                                $values = mysqli_query(
                                    $conn,
                                    "SELECT * FROM attribute_values WHERE attribute_id=" . $row['id']
                                );

                                if (mysqli_num_rows($values) > 0) {
                                    while ($v = mysqli_fetch_assoc($values)) {
                                        echo "<span class='value-badge'>{$v['value']}</span>";
                                    }
                                } else {
                                    echo "<span class='text-danger'>No Values</span>";
                                }
                                ?>
                            </td>

                            <td class="text-center">

                                <!-- EDIT -->
                                <a href="dashboard.php?page=edit-attribute&id=<?php echo $row['id']; ?>"
                                    class="btn btn-primary btn-sm">
                                    Edit
                                </a>

                                <!-- DELETE -->
                                <a href="dashboard.php?page=all-attributes&delete=<?php echo $row['id']; ?>"
                                    class="btn btn-primary btn-sm"
                                    onclick="return confirm('Delete this attribute?')">
                                    Delete
                                </a>


                            </td>

                        </tr>

                    <?php }
                } else { ?>

                    <tr>
                        <td colspan="4" class="text-center text-danger py-4">
                            No Attributes Found
                        </td>
                    </tr>

                <?php } ?>

            </tbody>

        </table>
    </div>
</div>
<style>
    .page-content {
        background: #fff;
        padding: 20px;
        border-radius: 12px;
    }


    /* Form */
    form {
        display: flex;
        gap: 10px;
        margin-bottom: 15px;
    }

    form input,
    form select {
        padding: 8px;
        border: 1px solid #ddd;
        border-radius: 6px;
    }

    form button {
        background: #4f46e5;
        color: #fff;
        border: none;
        padding: 8px 12px;
        border-radius: 6px;
        cursor: pointer;
    }

    /* Table */
    table {
        width: 100%;
        border-collapse: collapse;
    }

    table th,
    table td {
        border: 1px solid #ddd;
        padding: 10px;
        text-align: left;
    }

    table th {
        background: #f5f5f5;
    }

    /* Attribute values */
    td span {
        background: #eee;
        padding: 4px 8px;
        margin: 2px;
        border-radius: 5px;
        display: inline-block;
    }
</style>