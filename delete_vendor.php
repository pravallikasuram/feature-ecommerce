<?php
session_start();
include('db.php');

error_reporting(E_ALL);
ini_set('display_errors', 'On');

if (!isset($_SESSION['id'])) {
    header("Location: login.php");
    exit();
}


    if(isset($_GET['id'])) {

        $id = $_GET['id'];

        $sql = "DELETE FROM vendors WHERE id='$id'";
        $result = $connection->query($sql);

        if($result == TRUE) {
            //header('Location : display.php');

            echo "Record deleted successfully";
        }else{

            echo "Error: " . $sql . "<br>" .$connection->error;

        }

    }

?>
<!DOCTYPE html>
<html>
<p><a href="dashboard.php">Back to Profile</a></p>
</body>
</html>
