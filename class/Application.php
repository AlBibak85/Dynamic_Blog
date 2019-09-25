<?php


class Application
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

    public function All_Publication_Blog_Show()
    {
        $sql = "SELECT* FROM tbl_blog WHERE publication_status=1 ORDER BY blog_id DESC";
        if (mysqli_query($this->connection,$sql)){
            $query_result = mysqli_query($this->connection,$sql);
            return $query_result;
        }

    }

    public function View_Details($blog_id)
    {
        $sql = "SELECT* FROM tbl_blog WHERE blog_id ='$blog_id'";
        if (mysqli_query($this->connection,$sql)){
            $query_result = mysqli_query($this->connection,$sql);
            return $query_result;
        }

    }


}