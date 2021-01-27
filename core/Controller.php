<?php
class Controller extends Loader
{   
    private static $instance;
    public $load;

    public function __construct()
    {  
        $this->load = $this;
        self::$instance = $this->load;
    }

    public static function &getInstance()
    {
        return self::$instance;
    }
}