<?php
session_start();
include('db.php');

if (!isset($_SESSION['id'])) {
    header("Location: login.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $product_id = $_POST["product_id"];
    $product_name = $_POST["product_name"];
    $description = $_POST["description"];
    $sku = $_POST["sku"];
    $price = $_POST["price"];
    $stock_quantity = $_POST["stock_quantity"];
    $vendor_id = $_POST["vendor_id"];

    // Update product data in the database
    $query = "UPDATE products SET vendor_id='$vendor_id', product_name='$product_name', description='$description', sku='$sku', price='$price', stock_quantity='$stock_quantity' WHERE product_id='$product_id'";
    
    if (mysqli_query($connection, $query)) {
        // Product updated successfully
        header("Location: dashboard.php");
    } else {
        echo "Error: " . mysqli_error($connection);
    }
} else {
    $product_id = $_GET["product_id"];
    $query = "SELECT * FROM products WHERE product_id='$product_id'";
    echo "Query:$query";
    $result = mysqli_query($connection, $query);
    $product = mysqli_fetch_assoc($result);
    var_dump($product);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Product</title>
</head>
<body>
    <h2>Edit Product</h2>

    <form action="" method="post">
        <input type="hidden" name="product_id" value="<?php echo $product['product_id']; ?>">

        <label for="product_name">Product Name:</label>
        <input type="text" id="product_name" name="product_name" value="<?php echo $product['product_name']; ?>" required><br><br>

        <label for="description">Description:</label>
        <textarea id="description" name="description" required><?php echo $product['description']; ?></textarea><br><br>

        <label for="sku">SKU:</label>
        <input type="text" id="sku" name="sku" value="<?php echo $product['sku']; ?>"><br><br>

        <label for="price">Price:</label>
        <input type="number" id="price" name="price" step="0.01" value="<?php echo $product['price']; ?>" required><br><br>

        <label for="stock_quantity">Stock Quantity:</label>
        <input type="number" id="stock_quantity" name="stock_quantity" value="<?php echo $product['stock_quantity']; ?>" required><br><br>

        <label for="vendor_id">Vendor:</label>
        <select id="vendor_id" name="vendor_id" required>
            <?php
            $vendor_query = "SELECT * FROM vendors WHERE is_active = 1";
            $vendor_result = mysqli_query($connection, $vendor_query);

            while ($row = mysqli_fetch_assoc($vendor_result)) {
                $selected = ($row['vendor_id'] == $product['vendor_id']) ? "selected" : "";
                echo "<option value='{$row['vendor_id']}' $selected>{$row['name']}</option>";
            }
            ?>
        </select><br><br>

        <button type="submit">Save Changes</button>
    </form>
</body>
</html>
