<?php
session_start();

include('db.php');

if (!isset($_SESSION['id'])) {
    header("Location: login.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['delete'])) {
    $id = $_GET["delete"];

    // Delete vendor data from the database
    $deleteQuery = "DELETE FROM vendors WHERE id=$id";
    $deleteResult = mysqli_query($connection, $deleteQuery);

    if ($deleteResult) {
        header("Location: dashboard.php");
    } else {
        // Handle error
        echo "Error: " . mysqli_error($connection);
    }
}


if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["update_status"])) {
    $id = $_POST["vendor_id"];
    $status = $_POST["status"];

    $updateQuery = "UPDATE vendors SET is_active = $status WHERE id = $id";
    $updateResult = mysqli_query($connection, $updateQuery);

    if ($updateResult) {
        header("Location: dashboard.php");
    } else {
        echo "Error updating status: " . mysqli_error($connection);
    }
}

$query = "SELECT * FROM vendors";
$result = mysqli_query($connection, $query);
?>


<!DOCTYPE html>
<html>
<head>
    <title>Vendor Management</title>
    <style>
        body {
            background-color: #f8f9fa;
        }

        .card {
            margin-bottom: 20px;
        }

        .card-header {
            background-color: #343a40;
            color: #ffffff;
        }

        .card-title {
            margin-bottom: 0;
        }

        .btn-group {
            margin-right: 10px;
        }

        .btn-action {
            font-size: 14px;
            padding: 6px 10px;
            margin-right: 5px;
        }

        .btn-action.delete {
            background-color: #dc3545;
            border-color: #dc3545;
        }

        .btn-action.edit {
            background-color: #17a2b8;
            border-color: #17a2b8;
        }

        .btn-action.update {
            background-color: #28a745;
            border-color: #28a745;
        }

        .btn-action.active {
            background-color: #ffc107;
            border-color: #ffc107;
        }

        .btn-action.inactive {
            background-color: #6c757d;
            border-color: #6c757d;
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
    function confirmDelete(name, id) {
        return confirm("Are you sure you want to delete the vendor '" + name + "'?");
    }
</script>

</head>
<body>
    <div class="container mt-4">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Vendor Details</h3>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead class="bg-dark text-light">
                                <tr>
                                    <th>Vendor ID</th>
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th>Phone</th>
                                    <th>Email</th>
                                    <th>Website</th>
                                    <th>Address</th>
                                    <th>Tax ID</th>
                                    <th>Is Active</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                                    <tr>
                                        <td><?php echo $row['vendor_id']?>
                                        <td><?php echo $row['name']; ?></td>
                                        <td><?php echo $row['description']; ?></td>
                                        <td><?php echo $row['phone']; ?></td>
                                        <td><?php echo $row['email']; ?></td>
                                        <td><?php echo $row['website']; ?></td>
                                        <td><?php echo $row['address']; ?></td>
                                        <td><?php echo $row['tax_id']; ?></td>
                                        <td>
                                        <form action="vendor_management.php" method="post">
        <input type="hidden" name="vendor_id" value="<?php echo $row['id']; ?>">
        <div class="form-check">
            <input class="form-check-input" type="radio" name="status" value="1" <?php if ($row['is_active'] == 1) echo 'checked'; ?>>
            <label class="form-check-label">Active</label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="status" value="0" <?php if ($row['is_active'] == 0) echo 'checked'; ?>>
            <label class="form-check-label">Inactive</label>
        </div>
        <button type="submit" name="update_status" class="btn btn-primary btn-sm">Update</button>
    </form>
                                        </td>
                                        <td>
                                            <div class="btn-group">
                                                <a href="edit_vendor.php?id=<?php echo $row['id']; ?>" class="btn btn-action edit btn-sm">Edit</a>
                                                <a href="?delete=<?php echo $row['id']; ?>&confirm=yes" class="btn btn-danger btn-sm" onclick="return confirmDelete('<?php echo $row['name']; ?>')">Delete</a>
                                            </div>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                        <a class="btn btn-primary" href="add_vendor.php">Add Vendor</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
   
</body>
</html>
