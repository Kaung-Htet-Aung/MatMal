<?php
include("function.php");
if (isset($_SESSION['loggedin'])) {
    ?>
    <script>window.location.href = 'index.php'</script>
    <?php
}
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

    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    </style>


    <!-- Custom styles for this template -->
</head>

<body>

    <div class="py-5 bg-light">
        <div class="container mt-5 ">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card shadow rounded-4">
                        <?php alertMessage() ?>
                        <div class="p-5">

                            <h4 class="text-dark mb-3">Sign into your POS system</h4>
                            <form action="actions/login-code.php" method="POST">
                                <div class="mb-3">
                                    <label for="email">Enter email</label>
                                    <input type="email" name="email" class="form-control" required>
                                </div>
                                <div class="mb-3">
                                    <label for="password">Enter Password</label>
                                    <input type="password" name="password" id="" class="form-control" required>
                                </div>
                                <div class="mb-3">
                                    <button type="submit" name="login" class="btn btn-primary w-100 mt-2">Sign
                                        In</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>