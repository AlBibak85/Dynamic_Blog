<?php
session_start();
$message='';
if (isset($_SESSION['message'])){
    $message = $_SESSION['message'];     //update of code
    unset($_SESSION['message']);
}

if ($_SESSION['admin_id']==null){
    header('Location:index.php');           //login security of code
}

if (isset($_GET['logout'])){
    require_once '../class/admin_login.php';     //logout of code
    $admin_logout= new admin_login();
    $admin_logout->Admin_Logout();
}
require_once '../class/blog.php';
$blog = new blog();
$query_result = $blog->Select_Blog_Info($_POST);     //manage of blog info code

if (isset($_GET['delete'])){

    $id = $_GET['delete'];
    $blog->Delete_Blog_Info($id);

}



?>

<!doctype html>
<html lang="en">
<head>
    <title>View Blog Info</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="../asset/css/bootstrap.min.css" rel="stylesheet"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
<h3 class="text-success text-center"><?php echo $message?></h3>
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-body bg-light">
                <table class="table table-bordered table-hover">

                    <tr>
                        <th>SI No</th>
                        <th>Blog Title</th>
                        <th>Author Name</th>
                        <th>Blog Description</th>
                        <th>Publication Status</th>
                        <th>Action</th>

                    </tr>
                    <?php $i=1; while ( $blog_info=mysqli_fetch_assoc($query_result)){?>
                        <tr>
                            <td><?php echo $i++?></td>
                            <td><?php echo $blog_info['blog_title'];?></td>
                            <td><?php echo $blog_info['author_name'];?></td>
                            <td><?php echo $blog_info['blog_description'];?></td>
                            <td>
                                <?php
                                if ($blog_info['publication_status']==1){
                                    echo "Published";
                                }else{
                                    echo "Unpublished";
                                }
                                ?>

                            </td>

                            <td>
                                <a href="edit_blog.php?id=<?php echo $blog_info['blog_id'];?>" class="btn btn-success" title="Edit"></a>
                                <a href="?delete=<?php echo $blog_info['blog_id'];?>" class="btn btn-danger" title="Delete"></a>

                            </td>

                        </tr>
                    <?php } ?>


                </table>
            </div>
        </div>
    </div>
</div>

<!--<h3 class="offset-md-4 text-success"><?php /*echo $message*/?></h3>-->

<script src="../asset/js/jquery-3.4.1.min.js"></script>
<script src="../asset/js/bootstrap.min.js"></script>
</body>
</html>