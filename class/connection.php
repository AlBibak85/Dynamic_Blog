<?php


class connection
{
    protected $connection;
    public function __construct()
    {
        $host_name='localhost';
        $user_name='root';
        $password='';
        $database_name='student';
        $this->connection =mysqli_connect($host_name,$user_name,$password,$database_name);

        if (!$this->connection){

            die('connnection failed'.mysqli_error($this->connection));
        }

    }




}