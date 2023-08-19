<?php
session_start();
include('bootstrap.php');
include('db.php');

error_reporting(E_ALL);
ini_set('display_errors', 'On');

if (!isset($_SESSION['id'])) {
    header("Location: login.php");
    exit();
}

// Include your database connection code here

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $vendor_id = $_POST["vendor_id"];
    $name = $_POST["name"];
    $description = $_POST["description"];
    $phone = $_POST["phone"];
    $email = $_POST["email"];
    $website = $_POST["website"];
    $address = $_POST["address"];
    $tax_id = $_POST["tax_id"];

    // Insert vendor data into the database
    $query = "INSERT INTO vendors (vendor_id,name, description, phone, email,website,address,tax_id) VALUES ('$vendor_id','$name', '$description', '$phone', '$email','$website','$address','$tax_id')";
    $result = mysqli_query($connection, $query);

    if ($result) {
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
    <title>Add New Vendor</title>
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
            <p> Add New Vendor</p>
          </div>
        </div> 
        </div> 
        
    <!-- Vendor Add Form -->
    <div class="col-lg-8">
            <div class="card mb-4" style="max-height: 600px;">
                <div class="card-body tag" style="max-height: 600px; overflow:auto;">
                <form action="" method="post">
                <div class="row">
                        <div class="col-sm-3 form-group row">
                            <label for="vendor_id" class="col-form-label text-md-right name mb-0">Vendor ID:</label>      
                        </div>    
                        <div class="col-sm-9">
                            <input class="form-control text-muted mb-0 " type="text" id="vendor_id" name="vendor_id" required><br><br>
                        </div>   
                    </div>

                    <div class="row">
                        <div class="col-sm-3 form-group row">
                            <label for="name" class="col-form-label text-md-right name mb-0">Name:</label>      
                        </div>    
                        <div class="col-sm-9">
                            <input class="form-control text-muted mb-0 " type="text" id="name" name="name" required><br><br>
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
                             <label for="phone" class="col-form-label text-md-right name mb-0">Phone:</label>
                        </div> 
                        <div class="col-sm-9"> 
                              <input class="form-control text-muted mb-0 " type="text" id="phone" name="phone" required><br><br>
                        </div>   
                    </div>
                    <div class="row">
                        <div class="col-sm-3 form-group row">
                              <label for="email" class="col-form-label text-md-right name mb-0">Email:</label>
                        </div> 
                        <div class="col-sm-9">       
                             <input class="form-control text-muted mb-0 " type="email" id="email" name="email" required><br><br>
                        </div>   
                    </div>
                    <div class="row">
                        <div class="col-sm-3 form-group row">
                              <label for="website" class="col-form-label text-md-right name mb-0">Website:</label>
                        </div> 
                        <div class="col-sm-9">       
                             <input class="form-control text-muted mb-0 " type="text" id="website" name="website" required><br><br>
                        </div>   
                    </div>
                    <div class="row">
                        <div class="col-sm-3 form-group row">
                              <label for="address" class="col-form-label text-md-right name mb-0">Address:</label>
                        </div> 
                        <div class="col-sm-9">       
                        <textarea class="form-control text-muted mb-0 " id="address" name="address" required></textarea><br><br>
                        </div>   
                    </div>
                    <div class="row">
                        <div class="col-sm-3 form-group row">
                              <label for="tax_id" class="col-form-label text-md-right name mb-0">Tax ID</label>
                        </div> 
                        <div class="col-sm-9">       
                             <input class="form-control text-muted mb-0 " type="text" id="tax_id" name="tax_id" required><br><br>
                        </div>   
                    </div>
                    <div class="col-md-6 offset-md-4 ">
                            <button type="submit" class="btn btn-primary align " style= "margin-left: 98px;">Add Vendor</button>
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
