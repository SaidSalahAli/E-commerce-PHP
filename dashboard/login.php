<?php 
session_start();
if (isset($_SESSION["login"])){
    header("location:index.php");
}

?>


<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin - Login</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin.css" rel="stylesheet">

</head>

<body class="bg-dark">
    <?php if (isset($_GET["loguot"])):?>
    <div class="alert alert-success" role="alert">
        <?= $_GET["loguot"]?>
    </div>
    <?php endif?>
    <div class="container">
        <div class="card card-login mx-auto mt-5">
            <div class="card-header">Login</div>
            <div class="card-body">
                <div class="form-group">
                    <div class="form-label-group">
                        <?php if (isset($_GET["ms"])):?>
                        <div class="alert alert-danger" role="alert">
                            <?= $_GET["ms"]?>
                        </div>
                        <?php endif?>
                        <form action="functions/users/logincheck.php" method="POST">
                            <label for="inputEmail">Email address</label>
                            <input type="email" name="email" id="inputEmail" class="form-control"
                                placeholder="Email address" required="required" autofocus="autofocus">

                    </div>
                </div>
                <div class="form-group">
                    <div class="form-label-group">
                        <label for="inputPassword">Password</label>
                        <input type="password" name="password" id="inputPassword" class="form-control"
                            placeholder="Password" required="required">

                    </div>
                </div>
                <div class="form-group">
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" value="remember-me">
                            Remember Password
                        </label>
                    </div>
                </div>
                <button type="submit" name="submit" class="btn btn-primary btn-block">Login</button>
                <!-- <a class="btn btn-primary btn-block" href="index.html">Login</a> -->
                </form>
                <div class="text-center">
                    <a class="d-block small mt-3" href="register.html">Register an Account</a>
                    <a class="d-block small" href="forgot-password.html">Forgot Password?</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

</body>

</html>