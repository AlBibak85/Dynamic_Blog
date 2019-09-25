<?php
session_start();

if ($_SESSION['admin_id']==null){
    header('Location:index.php');
}

if (isset($_GET['logout'])){
    require_once '../class/admin_login.php';
    $admin_logout= new admin_login();
    $admin_logout->Admin_Logout();
}

$message='';
if (isset($_POST['btn'])){

    require_once '../class/blog.php';
    $blog = new blog();
    $message = $blog->Save_Blog_Info($_POST);
}

?>


<!doctype html>
<html lang="en">
<head>
    <title>Student Info</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="../asset/css/bootstrap.min.css" rel="stylesheet"/>
</head>

<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="dashboard.php">Add Blog</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="manage_blog.php">Manage Blog</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="add_image.php">Add Image</a>
            </li>

        </ul>
        <!--<form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>-->

        <ul class="nav navbar-nav my-3 my-sm-0">

            <li><a href="" class="col-md-6"></a></li>

            <li><a href="?logout=logout">Logout</a></li>

        </ul>
        
    </div>
</nav>
<hr/>

<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-body bg-light">
                <h3 class="text-success text-center"><?php echo $message;?></h3>
                <form action="" method="post">
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Blog Title</label>
                        <div class="col-sm-10">
                            <input type="text" name="blog_title" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Author Name</label>
                        <div class="col-sm-10">
                            <input type="text" name="author_name" class="form-control">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Blog Description</label>
                        <div class="col-sm-10">
                            <textarea type="text" name="blog_description" class="form-control"></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Publication Status </label>
                        <div class="col-sm-10">
                            <select name="publication_status" class="form-control">
                                <option value="1">Published</option>
                                <option value="0">Unpublished</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="offset-md-2 col-sm-10">
                            <button type="submit" name="btn" class="btn btn-success btn-block" >Save Blog Info</button>
                        </div>
                    </div>
                </form>


            </div>
        </div>
    </div>
</div>


<script src="../asset/js/jquery-3.4.1.min.js"></script>
<script src="../asset/js/bootstrap.min.js"></script>
</body>
</html>

