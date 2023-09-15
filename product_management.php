<?php
session_start();
include('db.php');

if (!isset($_SESSION['id'])) {
    header("Location: login.php");
    exit();
}


// Fetch active vendors
$query = "SELECT * FROM vendors WHERE is_active = 1";
$vendorResult = mysqli_query($connection, $query);

// Fetch products for active vendors
$query = "SELECT v.name AS vendor_name, p.product_id, p.product_name AS product_name, p.description, p.sku, p.price, p.stock_quantity 
          FROM products p
          JOIN vendors v ON p.vendor_id = v.vendor_id
          WHERE v.is_active = 1";
$productResult = mysqli_query($connection, $query);

// Check for errors in query execution
if (!$vendorResult || !$productResult) {
    die("Query failed: " . mysqli_error($connection));
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    
</head>
<body>
    <div class="container mt-4">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Product Details</h3>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead class="bg-dark text-light">
                                <tr>
                                    <th>Vendor Name</th>
                                    <th>Product Name</th>
                                    <th>Description</th>
                                    <th>SKU</th>
                                    <th>Price</th>
                                    <th>Stock Quantity</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php while ($productRow = mysqli_fetch_assoc($productResult)) { ?>
                                <tr>
                                    <td><?php echo $productRow['vendor_name']; ?></td>
                                    <td><?php echo $productRow['product_name']; ?></td>
                                    <td><?php echo $productRow['description']; ?></td>
                                    <td><?php echo $productRow['sku']; ?></td>
                                    <td><?php echo $productRow['price']; ?></td>
                                    <td><?php echo $productRow['stock_quantity']; ?></td>
                                    <td>
                                        <div class="btn-group">
                                            <a href="edit_product.php?id=<?php echo $productRow['product_id']; ?>" class="btn btn-action edit btn-sm">Edit</a>
                                            <!-- <a href="?delete=<?php echo $productRow['product_id']; ?>&confirm=yes" class="btn btn-danger btn-sm" onclick="return confirmDelete('<?php echo $productRow['product_name']; ?>')">Delete</a> -->

                                            <a href="delete_product.php?id=<?php echo $productRow['product_id']; ?>" class="btn btn-danger edit btn-sm">Delete</a>

                                            <!-- <a href="?delete=<?php echo $productRow['product_id']; ?>&confirm=yes" class="btn btn-danger btn-sm" onclick="return confirmDelete('<?php echo $productRow['product_name']; ?>')">Delete</a> -->
                                        </div>
                                    </td>
                                </tr>
                            <?php } ?>
                            </tbody>
                        </table>
                        <a class="btn btn-primary" href="add_product.php">Add Product</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
</html>
