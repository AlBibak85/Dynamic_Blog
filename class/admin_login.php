<?php


class admin_login
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

    public function Admin_Login_Check($data)
    {
        $password = md5($data[password]);

        $sql = "SELECT* FROM tbl_admin WHERE email_address='$data[email_address]' AND password='$password'";

        $qurry_result = mysqli_query($this->connection,$sql);
        $admin_info = mysqli_fetch_assoc($qurry_result);

        if ($admin_info){

            session_start();
            $_SESSION['admin_id']=$admin_info['admin_id'];
            $_SESSION['admin_name']=$admin_info['admin_name'];

            header('Location:dashboard.php');

        }else{
            header('Location: index.php');
        }


    }

    public function Admin_Logout()
    {
        unset($_SESSION['admin_id']);
        unset($_SESSION['admin_name']);
        header('Location: index.php');
    }




}