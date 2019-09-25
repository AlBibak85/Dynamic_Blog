<?php


class blog
{
    protected $connection;
    public function __construct()
    {
        $host_name='localhost';
        $user_name='root';
        $password='';
        $database_name='news_portal';
        $this->connection =mysqli_connect($host_name,$user_name,$password,$database_name);

        if (!$this->connection){

            die('connnection failed'.mysqli_error($this->connection));
        }

    }

    public function Save_Blog_Info($data)
    {
        $sql = "INSERT INTO tbl_blog (blog_title,author_name,blog_description,publication_status) VALUES ('$data[blog_title]','$data[author_name]','$data[blog_description]','$data[publication_status]')";

        if (mysqli_query($this->connection,$sql)){

            $message = "Blog info save succesfully";
            return $message;

        }

    }


    public function Select_Blog_Info($data)
    {
        $sql = "SELECT* FROM tbl_blog";
        if (mysqli_query($this->connection,$sql)){
            $query_result = mysqli_query($this->connection,$sql);
            return $query_result;

        }else{

            die('query problem'.mysqli_error($this->connection));

        }


    }

    public function Edit_Blog_Info($blog_id)
    {
        $sql = "SELECT* FROM tbl_blog WHERE blog_id='$blog_id'";

        if (mysqli_query($this->connection,$sql)){
            $query_result = mysqli_query($this->connection,$sql);
            return $query_result;
        }else{

            die('query problem'.mysqli_error($this->connection));
        }

    }

    public function Upadte_Blog_Info($data)
    {
        $sql  = "UPDATE tbl_blog SET blog_title='$data[blog_title]',author_name='$data[author_name]',blog_description='$data[blog_description]',publication_status='$data[publication_status]' WHERE blog_id='$data[blog_id]'";
        if (mysqli_query($this->connection,$sql)){
            session_start();
            $_SESSION['message']='Update blog info sucessfully';
            header('Location: manage_blog.php');

        }else{
            die('query problem'.mysqli_error($this->connection));
        }

    }


    public function Delete_Blog_Info($id)
    {
        $sql  = "DELETE FROM tbl_blog WHERE blog_id ='$id'";

       if ( mysqli_query($this->connection,$sql))
       {
           header('Location: manage_blog.php');
       }else{
           die('query problem'.mysqli_error($this->connection));
       }

    }


    public function Save_Image($data)
    {
        //echo '<pre>';
        //print_r($_FILES);
        //echo $_FILES['blog_image']['name'];
        $image_name = $_FILES['blog_image']['name'];
        $directory='../asset/blog_image/';
        $image_url = $directory.$image_name;
        $image_type = pathinfo($image_name,PATHINFO_EXTENSION);
        $image_size = $_FILES['blog_image']['size'];
        $check =getimagesize($_FILES['blog_image']['tmp_name']);

        if ($check){

            if (file_exists($image_url)){
                die('file already exist');
            }else{
                if ($image_size > 50000){
                    die('file size is too large ');
                }else{
                    if ($image_type!='jpg'&& $image_type!='png'){
                        die('file type is not valid ');
                    }else{
                        move_uploaded_file($_FILES['blog_image']['tmp_name'],$image_url);
                    }
                }
            }


        }else{
           die('this file upload file not a image file.please upload a valid image file ');

        }





        //move_uploaded_file($_FILES['blog_image']['tmp_name'],$image_url);

    }




}