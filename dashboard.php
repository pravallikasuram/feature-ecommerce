<?php
session_start();
include('bootstrap.php');
if (!isset($_SESSION['id'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Main Dashboard</title>
    
    <style>
        div.heading{
            text-align: center;
            font-size: 30px;
            
        }
       
        html, body {
            width: 100%;
            height: 100%;
            overflow: hidden;
        }
        body { 
            background-color: #eee;; 
        }
   
        
    </style>
    <script>
        function showVendorManagement() {
            document.getElementById("vendor-management").style.display = "block";
            document.getElementById("product-management").style.display = "none";
        }
        
        function showProductManagement() {
            document.getElementById("product-management").style.display = "block";
            document.getElementById("vendor-management").style.display = "none";
        }
    </script>
</head>
<body>
<br><br>
    <div class="heading">
        Welcome to the Dashboard, <?php echo $_SESSION['username']; ?>
    </div>
<!-- Navigation Links -->
<section style="background-color: #eee;">
  <div class="container py-5">
    <div class="row">
      <div class="col">
        
        <nav class="navbar navbar-expand-lg navbar-light bg-light rounded-3 p-3 mb-4">
  
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item active">
      <a class="nav-link mx-2 active"  href="#" onclick="showVendorManagement()" style="padding-left: 10px;">Vendor Management</a>
      <li class="nav-item">
      <a class="nav-link mx-2 " href="#" onclick="showProductManagement()" style="padding-left: 20px;">Product Management</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="logout.php" style="padding-left: 700px;">Logout</a>
      </li>
    </ul>
  </div>
</nav>
      </div>
    </div>
    <!-- <nav class="navbar navbar-expand-lg navbar-light  p-2" style="background-color: #B09488 ;">
        <div class="collapse navbar-collapse ">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link mx-2 active"  href="#" onclick="showVendorManagement()" style="padding-left: 10px;">Vendor Management</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link mx-2 " href="#" onclick="showProductManagement()" style="padding-left: 20px;">Product Management</a>
                </li>
            </ul>
        </div>
    </nav> -->
    <!-- Vendor Management Section -->
    <section id="vendor-management" style="display: block;">
        <div class="container mt-4">
            <?php include 'vendor_management.php'; ?>
        </div>
    </section>

    <!-- Product Management Section -->
    <section id="product-management" style="display: none;">
        <div class="container mt-4">
            <?php include 'product_management.php'; ?>
        </div>
    </section>

</div>
</section>

</body>
</html>
