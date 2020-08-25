<?php
require './config/database.php';

class Db
{   
    protected $dns;
    protected $host;
    protected $driver;
    protected $username;
    protected $password;
    public $con;

    public function __construct()
    {
        global $db;

        $dbconfig = $db[$dbgroupname];
        $this->dns = $dbconfig['dbdriver'].':host='.$dbconfig['host'].';dbname='.$dbconfig['database'];
        $this->username = $dbconfig['username'];
        $this->password = $dbconfig['password'];

        try {
            $this->con = new \PDO($this->dns, $this->username, $this->password);
            $this->con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            return $this->con;

        } catch (\PDOException $e) {

            return "Connection failed: ". $e->getMessage();
        }
    }

    protected function setDatabase($db)
    {
        if($db == null)
        {
            $db_con = 'default';
        }
        else 
        {
            $db_con = $db;
        }

        return $db_con;
    }
}