<?php
require './config/database.php';

class Model
{   
    // protected $databases;

    public function __construct()
    {   
        // global $db;
        // $this->databases = $db;
        
        // foreach ($this->databases as $key => $value) 
        // {
        //     $this->createDb($key);
        //     $this->{$key} =& $this->db->{$key};
        // }

        // print_r($this->databases);
    }

    public function __get($key)
    {
        return get_instance()->$key;
    }
}