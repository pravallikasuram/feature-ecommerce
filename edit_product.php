<?php
session_start();
include('db.php');
include('bootstrap.php');

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
$productQuery = "SELECT p.*, v.name AS vendor_name FROM products p
                 JOIN vendors v ON p.vendor_id = v.vendor_id
                 WHERE p.product_id = $product_id";
$productResult = mysqli_query($connection, $productQuery);
$productData = mysqli_fetch_assoc($productResult);

if (!$productData) {
    // Product not found
    header("Location: dashboard.php");
    exit();
}

// Fetch active vendors
$vendorQuery = "SELECT * FROM vendors WHERE is_active = 1";
$vendorResult = mysqli_query($connection, $vendorQuery);

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve updated form data
    $product_name = $_POST["product_name"];
    $description = $_POST["description"];
    $sku = $_POST["sku"];
    $price = $_POST["price"];
    $stock_quantity = $_POST["stock_quantity"];
    $vendor_id = $_POST["vendor_id"];

    // Update product data in the database
    $updateQuery = "UPDATE products SET product_name='$product_name', description='$description', sku='$sku', price='$price', stock_quantity='$stock_quantity', vendor_id='$vendor_id' WHERE product_id=$product_id";
    $updateResult = mysqli_query($connection, $updateQuery);

    if ($updateResult) {
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
    <title>Edit Product</title>
    <style>
html, body {
width: 100%;
height: 100%;
overflow: hidden;
}
    body { 
    background-color: #eee;; 
   }
   </style>
    <!-- Include any necessary CSS styles or scripts here -->
</head>
<body>
<section style="background-color: #eee;">
    <div class="container py-5">
        <div class="row">
        <div class="col">
            <nav class="navbar navbar-expand-lg navbar-light bg-light rounded-3 p-3 mb-4">
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="dashboard.php" style="margin-left: 940px;margin-top: -15px;">Back to Profile</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
        </div>
        <div class="row">
            <div class="col-lg-4">
                <div class="card mb-4">
                    <div class="card-body text-center">
                        <p> Edit Product Details</p>
                    </div>
                </div> 
            </div> 

            <div class="col-lg-8">
            <div class="card mb-4" style="max-height: 600px;">
                <div class="card-body tag" style="max-height: 600px; overflow:auto;">
                <form action="" method="post">
                <div class="row">
                        <div class="col-sm-3 form-group row">
                            <label for="product_name" class="col-form-label text-md-right name mb-0">Name:</label>      
                        </div>    
                        <div class="col-sm-9">
                            <input class="form-control text-muted mb-0 " type="text" id="product_name" name="product_name" value="<?php echo $productData['product_name']; ?>"  required><br><br>
                        </div>   
                </div> 

                <div class="row">
                        <div class="col-sm-3 form-group row">
                            <label for="description" class="col-form-label text-md-right name mb-0">Description:</label>      
                        </div>    
                        <div class="col-sm-9">
                        <textarea class="form-control text-muted mb-0 " id="description" name="description" required><?php echo $productData['description']; ?></textarea><br><br>
                        </div>   
                </div>       

                <div class="row">
                        <div class="col-sm-3 form-group row">
                            <label for="sku" class="col-form-label text-md-right name mb-0">SKU:</label>      
                        </div>    
                        <div class="col-sm-9">
                        <input class="form-control text-muted mb-0 " type="text" id="sku" name="sku" value="<?php echo $productData['sku']; ?>"  required><br><br>
                        </div>   
                </div>       

                <div class="row">
                        <div class="col-sm-3 form-group row">
                            <label for="price" class="col-form-label text-md-right name mb-0">Price:</label>      
                        </div>    
                        <div class="col-sm-9">
                        <input class="form-control text-muted mb-0 " type="number" id="price" step="0.01" name="price" value="<?php echo $productData['price']; ?>"  required><br><br>
                        </div>   
                </div> 

                <div class="row">
                        <div class="col-sm-3 form-group row">
                            <label for="stock_quantity" class="col-form-label text-md-right name mb-0">Stock Quantity:</label>      
                        </div>    
                        <div class="col-sm-9">
                        <input class="form-control text-muted mb-0 " type="number" id="stock_quantity" name="stock_quantity" value="<?php echo $productData['stock_quantity']; ?>"  required><br><br>
                        </div>   
                </div> 

                <div class="row">
                        <div class="col-sm-3 form-group row">
                            <label for="vendor_id" class="col-form-label text-md-right name mb-0">Vendor:</label>      
                        </div>    
                        <div class="col-sm-9">
                        <select id="vendor_id" name="vendor_id">
                            <?php while ($vendorRow = mysqli_fetch_assoc($vendorResult)) {
                                    $selected = ($vendorRow['vendor_id'] == $productData['vendor_id']) ? 'selected' : '';
                                    echo "<option value='{$vendorRow['vendor_id']}' $selected>{$vendorRow['name']}</option>";
                            } ?>
                        </select><br><br>
            
                        </div>   
                </div> 
                <div class="col-md-6 offset-md-4 ">
                            <button type="submit" class="btn btn-primary align " style= "margin-left: 98px;">Save Changes</button>
                    </div>  
                </div>
            </div> 
    </div>          
    
</form>

</div>
</div>
</section>
