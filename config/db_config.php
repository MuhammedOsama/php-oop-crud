<?php
session_start();
require_once('./config/operations.php');

class dbConfig
{
    public $connection;

    public function __construct()
    {
        $this->db_connect();
    }

    public function db_connect()
    {
        $this->connection = mysqli_connect("localhost", "root", "", "oop_php_crud");
        if (mysqli_connect_error()) {
            die("Connection Failed");
        }
    }

    public function check($operation)
    {
        return mysqli_real_escape_string($this->connection, $operation);
    }
}
