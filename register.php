<?php 
   include("function.php");
   
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.84.0">
    <title>Carousel Template · Bootstrap v5.0</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/carousel/">

    <link href="assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
   
</head>

<body>

<div class="py-5 bg-light">
    <div class="container mt-5 ">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow rounded-4">
                   
                    <div class="p-5">
                   
                        <h4 class="text-dark mb-3">Sign into your POS system</h4>
                        <form action="./actions/create-user.php" method="POST">
                        <div class="mb-3">
                                <label for="username">Username :</label>
                                <input type="text" name="name" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label for="email">Email :</label>
                                <input type="email" name="email" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label for="password"> Password :</label>
                                <input type="password" name="password" id="" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                 <button type="submit" name="registerBtn"class="btn btn-primary w-100 mt-2">Register</button>
                                 <a href="login.php">Login</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

