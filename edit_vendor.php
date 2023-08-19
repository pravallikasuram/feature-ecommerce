<?php
session_start();
include('db.php');
include('bootstrap.php');

error_reporting(E_ALL);
ini_set('display_errors', 'On');

if (!isset($_SESSION['id'])) {
    header("Location: login.php");
    exit();
}

// Include your database connection code here

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];
    // $vendor_id = $_POST["vendor_id"];
    $name = $_POST["name"];
    $description = $_POST["description"];
    $phone = $_POST["phone"];
    $email = $_POST["email"];
    $website = $_POST["website"];
    $address = $_POST["address"];
    $tax_id = $_POST["tax_id"];


    // Update vendor data in the database
    $query = "UPDATE vendors SET name='$name', description='$description', phone='$phone', email='$email' , website='$website', address ='$address', tax_id = '$tax_id'   WHERE id=$id";
    $result = mysqli_query($connection, $query);

    if ($result) {
        header("Location: dashboard.php");
    } else {
        // Handle error
        echo "Error: " . mysqli_error($connection);
    }
} else {
    // Fetch vendor data for editing
    $id = $_GET["id"];
    $query = "SELECT * FROM vendors WHERE id=$id";
    $result = mysqli_query($connection, $query);
    $vendor = mysqli_fetch_assoc($result);
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Edit Vendor</title>
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
            <p> Edit Vendor Details</p>
          </div>
        </div> 
        </div> 
    <!-- Vendor Edit Form -->
    <div class="col-lg-8">
            <div class="card mb-4" style="max-height: 600px;">
                <div class="card-body tag" style="max-height: 600px; overflow:auto;">
                <form action="" method="post">
                <input type="hidden" name="id" value="<?php echo $vendor['id']; ?>">

                    <div class="row">
                        <div class="col-sm-3 form-group row">
                            <label for="vendor_id" class="col-form-label text-md-right name mb-0">Vendor ID:</label>      
                        </div>    
                        <div class="col-sm-9">
                        <p class="text-muted mb-0 " id="vendor_id" name="vendor_id"><?php echo $vendor['vendor_id']; ?></p><br><br>
                            <!-- <input class="form-control text-muted mb-0 " type="text" id="vendor_id" name="vendor_id"  value="<?php echo $vendor['vendor_id']; ?>" required><br><br> -->
                        </div>   
                    </div>

                    <div class="row">
                        <div class="col-sm-3 form-group row">
                            <label for="name" class="col-form-label text-md-right name mb-0">Name:</label>      
                        </div>    
                        <div class="col-sm-9">
                            <input class="form-control text-muted mb-0 " type="text" id="name" name="name" value="<?php echo $vendor['name']; ?>"  required><br><br>
                        </div>   
                    </div> 
                    <div class="row">
                        <div class="col-sm-3 form-group row">
                            <label for="description" class="col-form-label text-md-right name mb-0">Description:</label>      
                        </div>    
                        <div class="col-sm-9">
                        <textarea class="form-control text-muted mb-0 " id="description" name="description" required><?php echo $vendor['description']; ?></textarea><br><br>
                        </div>   
                    </div> 
                    <div class="row">
                        <div class="col-sm-3 form-group row">
                            <label for="phone" class="col-form-label text-md-right name mb-0">Phone:</label>      
                        </div>    
                        <div class="col-sm-9">
                        <input class="form-control text-muted mb-0" type="text" id="phone" name="phone" value="<?php echo $vendor['phone']; ?>" required><br><br>
                        </div>   
                    </div>  
                    
                    <div class="row">
                        <div class="col-sm-3 form-group row">
                            <label for="email" class="col-form-label text-md-right name mb-0">Email:</label>      
                        </div>    
                        <div class="col-sm-9">
                        <input class="form-control text-muted mb-0" type="email" id="email" name="email" value="<?php echo $vendor['email']; ?>" required><br><br>
                        </div>   
                    </div> 

                    <div class="row">
                        <div class="col-sm-3 form-group row">
                              <label for="website" class="col-form-label text-md-right name mb-0">Website:</label>
                        </div> 
                        <div class="col-sm-9">       
                             <input class="form-control text-muted mb-0 " type="text" id="website" name="website" value="<?php echo $vendor['website']; ?>" required><br><br>
                        </div>   
                    </div>

                    <div class="row">
                        <div class="col-sm-3 form-group row">
                            <label for="address" class="col-form-label text-md-right name mb-0">Address:</label>      
                        </div>    
                        <div class="col-sm-9">
                        <textarea class="form-control text-muted mb-0 " id="address" name="address" required><?php echo $vendor['address']; ?></textarea><br><br>
                        </div>   
                    </div>
                    
                    <div class="row">
                        <div class="col-sm-3 form-group row">
                            <label for="tax_id" class="col-form-label text-md-right name mb-0">Tax ID</label>      
                        </div>    
                        <div class="col-sm-9">
                        <input class="form-control text-muted mb-0" type="text" id="tax_id" name="tax_id" value="<?php echo $vendor['tax_id']; ?>" required><br><br>
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

<!-- Link to go back to Vendor Management -->


</body>
</html>
