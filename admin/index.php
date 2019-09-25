<?php
session_start();
if (isset($_SESSION['admin_id'])){
    if ($_SESSION['admin_id']!=null){
        header('Location: dashboard.php');           //dashboard theke logout chara jawa jabe na
    }
}
if (isset($_POST['btn'])){
    require_once '../class/admin_login.php';               //login check
    $admin_login = new admin_login();
    $admin_login->Admin_Login_Check($_POST);

}

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v3.8.5">
    <title>Jumbotron Template · Bootstrap</title>
    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    </style>
    <!-- Custom styles for this template -->
    <link href="../asset/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container">
    <div class="row">
        <div class="offset-md-2 col-md-8">
            <div class="card card-body bg-light" style="margin-top: 100px; padding: 80px;">
                <h5 class="text-center text-danger">Please use valid email address and password</h5>
                <hr/>
                <form action="" method="post">
                    <div class="form-group row">
                        <label class="col-form-label col-md-3">Email Address</label>
                        <div class="col-md-9">
                            <input type="email" name="email_address" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-md-3">Password</label>
                        <div class="col-md-9">
                            <input type="password" name="password" class="form-control">
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="offset-md-3 col-md-9">
                            <input type="submit" name="btn" class="btn btn-success btn-block" value="Login"/>
                        </div>
                    </div>
                </form>


            </div>
        </div>
    </div>
</div>

<script src="../asset/js/bootstrap.min.js"></script>
</body>
</html>

