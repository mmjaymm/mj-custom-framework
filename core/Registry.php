<?php

class Class_Registry
{
    private static $_classes = array();
	private static $_instance;
	
	// private constructor
	private function __construct() { }
	
	// disallow cloning
	private function __clone(){ }
	
    public static function getInstance()
    {
    	if(!isset(self::$_instance))
        {
            //First and only construction.
            self::$_instance = new self();
        }
        return self::$_instance;
    }

    //get an object from the registry by key
    protected function get($key)
    {
    	
        if(isset(self::$_classes[$key]))
        {	
            return self::$_classes[$key];
        }
        return NULL;
    }

    protected function set($key,$object)
    {
        self::$_classes[$key] = $object;
    }
    
    // Handles retreiving and storing objects
    static function getObject($key)
    {
		return self::getInstance()->get($key);
	}
	static function storeObject($key, $object)
	{
		return self::getInstance()->set($key,$object);
	}
}