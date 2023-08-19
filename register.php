<?php
    
    include('bootstrap.php');

?>
<!DOCTYPE html>
<html>
<head>
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
.register-form
{
    padding-top: 1.5rem;
    padding-bottom: 1.5rem;
}

.register-form .row
{
    margin-left: 10px;
    margin-right: 10px;
}
.username{
    margin-right: -92px;
    margin-left: 81px;
}
.email{
    margin-right: -74px;
    margin-left: 59px;
}
.firstname{
    margin-right: -72px;
    margin-left: 59px;
}
.lastname{
    margin-right: -70px;
    margin-left: 59px;
}
.password{
    margin-right: -68px;
    margin-left: 57px;
}
.tag{
    margin-top: 10px;
}
.text{
    margin-top: 10px;
}
.align{
    margin-left: 81px
}

</style>

    <title>Registration Form</title>
</head>
<body >
<main class="register-form">
    <div class="container">
    <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Register</div>
                    <div class="card-body tag">
                        <form action="register_process.php" method="post">
                            <div class="form-group row">
                                 <label for="username" class="col-md-4 col-form-label text-md-right username">Username:</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" id= "username" name="username" required><br><br>
                                </div>
                            <div>    

                            <div class = "form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right email">Email:</label>
                                <div class="col-md-6">
                                    <input type="email" class="form-control"  id="email" name="email" style="margin-right: width;width: 345px;" required><br><br>
                                </div>    
                            </div>

                            <div class = "form-group row">
                                <label for="firstname" class="col-md-4 col-form-label text-md-right firstname">First Name:</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control"  id="firstname" name="firstname" style="width: 345px;" required><br><br>
                                </div>    
                            </div>

                            <div class = "form-group row">
                                <label for="lastname" class="col-md-4 col-form-label text-md-right lastname">Last Name:</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control"  id="lastname" name="lastname" style="width: 345px;" required><br><br>
                                </div>    
                            </div>

                            <div class = "form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right password">Password:</label>
                                <div class="col-md-6">
                                     <input type="password" class="form-control"  id="password" name="password" style="width: 345px;" required><br><br>
                                </div>     
                            </div>
                            <div class="col-md-6 offset-md-4 ">
                                <button type="submit" class="btn btn-primary align ">
                                    Register
                                </button>
                                <p class="text">Already have an account? <a href="login.php">Login here</a></p>
                            </div>
                        </form>
                    </div> 
                </div> 
            </div>              
        </div>
    </div>
</main>
</body>
</html>        
    
