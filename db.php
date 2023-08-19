<?php


// Create a database connection
$connection = mysqli_connect('localhost','root', '', 'task3');

// Check the connection
if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}

//create table products( product_id int AUTO_INCREMENT PRIMARY key, vendor_id int not null, product_name varchar(255) not null, description text, sku varchar(50), price decimal(10,2) not null, stock_quantity int, FOREIGN key (vendor_id) REFERENCES vendors(vendor_id) );
?>
