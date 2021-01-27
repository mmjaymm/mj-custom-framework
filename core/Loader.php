<?php

class Loader 
{
    public function __construct(){}

    public function view($view)
    {
        /* Display the view file */
        require 'app/views/'.$view.'.php';
    }

    
    public function model($class = '')
    {
        if ($class == ''){ 
    		die("Specify a model name!");
    	}
        $model_name  = strtolower($class);

        // Instantiate the Super Object.
        $c =& Controller::getInstance();
        
        //This allows us to do something like $this->model_name->model_method
        // $c->$model_name = load_class($class, 'app/models');
        //if not, load the files
		$model_path = 'app/models/'.$model_name.'.php';
		
		if (file_exists($model_path)){
			require_once($model_path);
		}else{
			die($class . " model is not found!");
        }
        
        $className = ucfirst($model_name);
        $c->$model_name = new $className();
    }

    // public function database($dbgroupname)
    // {
    //     $db = new Db($dbgroupname);
    //     return $db;
    // }

    
    // public function createProperty($class)
    // {
    //     $this->{$class} = '';
    // }
}