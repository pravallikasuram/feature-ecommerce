<?php

include('bootstrap.php');

session_start();

include('db.php');



session_destroy();
header("Location: login.php");
exit();
?>
