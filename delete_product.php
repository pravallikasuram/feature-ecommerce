<?php
session_start();
include('db.php');

if (!isset($_SESSION['id'])) {
    header("Location: login.php");
    exit();
}

if (!isset($_GET['id'])) {
    header("Location: dashboard.php");
    exit();
}

$product_id = $_GET['id'];

// Fetch product details
$productQuery = "SELECT * FROM products WHERE product_id = $product_id";
$productResult = mysqli_query($connection, $productQuery);
$productData = mysqli_fetch_assoc($productResult);

if (!$productData) {
    // Product not found
    header("Location: dashboard.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Delete product from the database
    $deleteQuery = "DELETE FROM products WHERE product_id = $product_id";
    $deleteResult = mysqli_query($connection, $deleteQuery);

    if ($deleteResult) {
        header("Location: dashboard.php");
    } else {
        // Handle error
        echo "Error: " . mysqli_error($connection);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Delete Product</title>
    
</head>
<body>
    <div class="container">
        <h2>Delete Product</h2>
        <p>Are you sure you want to delete the product "<?php echo $productData['product_name']; ?>"?</p>
        <form action="" method="post">
            <button type="submit">Delete</button>
            <a href="dashboard.php">Cancel</a>
        </form>
    </div>
</body>
</html>
