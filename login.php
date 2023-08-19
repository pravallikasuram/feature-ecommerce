<?php

include('bootstrap.php');

session_start();
if (isset($_SESSION["registration_success"])) {
    echo "<p>Registration successful! You can now log in.</p>";
    unset($_SESSION["registration_success"]);
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Login Form</title>
<style>
    body{
    margin: 70px;
    font-size: 16px;
    font-weight: 400;
    line-height: 1.6;
    color: #212529;
    text-align: left;
    background-color: #f5f8fa;
    }
    .login-form{
    padding-top: 1.5rem;
    padding-bottom: 1.5rem;
    }
    .login-form.row{
    margin-left: 10px;
    margin-right: 10px;
    }
    .align{
       
        margin-left: 342px
    }
    .text{
        margin-top: 20px;
        margin-left: 220px
    }
    .user{
        margin-top:10px;
    }
</style>    
</head>
<body>
<main class="login-form">
    <div class="container">
    <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Login</div>
                    <div>
                    <?php if(isset($_GET['error']) && $_GET['error'] === '1'){?>
                        <p style ="color:red;">Invalid username or password</p>
                    <?php } ?>
                    <div class="card-body tag">
                        <form action="login_process.php" method="post">
                            <div class = "form-group row user">
                                <label for="username" class="col-md-4 col-form-label text-md-right username">Username:</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" id= "username" name="username"  required><br><br>
                                </div>
                            </div>
                            <div class = "form-group row">         
                                <label for="password" class="col-md-4 col-form-label text-md-right password">Password:</label>
                                <div class="col-md-6">
                                    <input type="password" name="password" class="form-control" id= "username" required><br><br>
                                </div>
                            </div>   
                            <button type="submit" class="btn btn-primary align">
                                    Login
                            </button> 
                            <p class="text">Don't have an account yet? <a href="register.php">Register here</a></p>
                        
                        </form>
                    </div>   
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>            
</body>
</html>
