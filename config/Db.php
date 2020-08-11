<?php

class Db
{
    private $db_host = 'localhost';
    private $db_name = 'qa';
    private $username = 'root';
    private $password = 'root';
    private $con = null;

    public function __construct()
    {
        
    }

    public function connect()
    {   
        $dns = "mysql:host=".$this->db_host.";dbname=".$this->db_name;

        try {
            $this->con = new \PDO($dns, $this->username, $this->password);
            $this->con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            return $this->con;

        } catch (\PDOException $e) {

            return "Connection failed: ". $e->getMessage();
        }
    }
}