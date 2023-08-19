<?php
session_start();
include('bootstrap.php');
include('db.php');

if (!isset($_SESSION['id'])) {
    header("Location: login.php");
    exit();
}
?>

<html>
<head>
    <title>Add New Product</title>
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
</head>
<body>
<section style="background-color: #eee;">
  <div class="container py-5">
    <div class="row">
      <div class="col">
        
        <nav class="navbar navbar-expand-lg navbar-light bg-light rounded-3 p-3 mb-4">
            <div class="collapse navbar-collapse" id="navbarNav">
                 <ul class="navbar-nav">
                    <li class="nav-item active">
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
            <p> Add New Product</p>
          </div>
        </div> 
        </div> 
        
    <!-- Vendor Add Form -->
    <div class="col-lg-8">
            <div class="card mb-4" style="max-height: 600px;">
                <div class="card-body tag" style="max-height: 600px; overflow:auto;">
                <form action="add_product_process.php" method="post">
                <div class="row">
                        <div class="col-sm-3 form-group row">
                            <label for="product_name" class="col-form-label text-md-right name mb-0">Product Name:</label>      
                        </div>    
                        <div class="col-sm-9">
                            <input class="form-control text-muted mb-0 " type="text" id="product_name" name="product_name" required><br><br>
                        </div>   
                    </div>
 
                   
                    <div class="row">
                        <div class="col-sm-3 form-group row">
                            <label for="description" class="col-form-label text-md-right name mb-0">Description:</label>
                        </div> 
                        <div class="col-sm-9">   
                             <textarea class="form-control text-muted mb-0 " id="description" name="description" required></textarea><br><br>
                        </div>   
                    </div>    
                    
                    <div class="row">
                        <div class="col-sm-3 form-group row">
                             <label for="sku" class="col-form-label text-md-right name mb-0">SKU:</label>
                        </div> 
                        <div class="col-sm-9"> 
                              <input class="form-control text-muted mb-0 " type="text" id="sku" name="sku" required><br><br>
                        </div>   
                    </div>
                    <div class="row">
                        <div class="col-sm-3 form-group row">
                              <label for="price" class="col-form-label text-md-right name mb-0">Price</label>
                        </div> 
                        <div class="col-sm-9">       
                             <input class="form-control text-muted mb-0 " type="number" id="price" name="price" step="0.01" required><br><br>
                        </div>   
                    </div>
                    <div class="row">
                        <div class="col-sm-3 form-group row">
                              <label for="stock_quantity" class="col-form-label text-md-right name mb-0">Stock Quantity:</label>
                        </div> 
                        <div class="col-sm-9">       
                             <input class="form-control text-muted mb-0 " type="number" id="stock_quantity" name="stock_quantity" required><br><br>
                        </div>   
                    </div>

                    <div class="row">
                        <div class="col-sm-3 form-group row col-auto">
                              <label for="vendor_id" class="col-form-label text-md-right  mb-0">Vendor:</label>
                              <select id="vendor_id" name="vendor_id" class="form-control mb-2">
                                    <?php
                                        $query = "SELECT * FROM vendors WHERE is_active = 1";
                                        $result = mysqli_query($connection, $query);
            
                                        while ($row = mysqli_fetch_assoc($result)) {
                                                echo "<option value='{$row['vendor_id']}'>{$row['name']}</option>";
                                        }
                                     ?> 
                             </select><br><br>

                        </div> 
                          
                    </div>
                    
                    <div class="col-md-6 offset-md-4 ">
                            <button type="submit" class="btn btn-primary align " style= "margin-left: 98px;">Add Product</button>
                    </div>        
                </form>
                </div>
            </div>
    </div>        


</div>
</div>
</section>
</body>
</html>





















<!-- Your Product Management Content -->

<!-- <a href="dashboard.php">Go back to Dashboard</a> -->
