<?php

class Loader 
{
    public function __construct(){}

    public function model($class = '')
    {
        // require 'app/models/'.$class.'.php';
        // $model_name = strtolower($class);
        // $model = ucfirst($model_name);
        // $this->$model_name = new $model();
        // return $this->$model_name;
        if ($class == ''){ 
    		die("Specify a model name!");
    	}
        $model_name  = strtolower($class);

        // Instantiate the Super Object.
        $c =& Controller::getInstance();
        
        //This allows us to do something like $this->model_name->model_method
        $c->$model_name = load_class($class, 'app/models');
    }

    // public function database($dbgroupname)
    // {
    //     $db = new Db($dbgroupname);
    //     return $db;
    // }

    // public function view($view)
    // {
    //     require 'app/views/'.$view.'.php';
    // }

    // public function createProperty($class)
    // {
    //     $this->{$class} = '';
    // }
}