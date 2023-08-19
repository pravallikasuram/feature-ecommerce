<?php
session_start();
include('db.php');

error_reporting(E_ALL);
ini_set('display_errors', 'On');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $product_name = $_POST["product_name"];
    $description = $_POST["description"];
    $sku = $_POST["sku"];
    $price = $_POST["price"];
    $stock_quantity = $_POST["stock_quantity"];
    $vendor_id = $_POST["vendor_id"];

    $query = "INSERT INTO products (vendor_id, product_name, description, sku, price, stock_quantity) 
              VALUES ('$vendor_id', '$product_name', '$description', '$sku', '$price', '$stock_quantity')";
    
    if (mysqli_query($connection, $query)) {
        // Product added successfully
        header("Location: dashboard.php");
    } else {
        echo "Error: " . mysqli_error($connection);
    }
}
?>
