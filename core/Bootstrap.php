<?php

class Bootstrap
{
    public function __construct()
    {   
        /* Remove existing slash (/) */
        $url = rtrim(preg_replace('/\s+/', '', $_GET['url']), '/');

        /* Seperate query string thru / */
        $query_string = explode('/', $url);

        /* Files in controller */
        $file = 'app/controllers/'.$query_string[0].'.php';

        /* Check if controller class exist */
        if (file_exists($file)) 
        {
            require $file; //require controller file
        }
        else 
        {
            require 'app/controllers/Error.php';
            $controller = new Error();
            return false;
        }

        /* Instantiate controller class */
        $controller = new $query_string[0];

        /* Check if have parameters */
        if(isset($query_string[2]))
        {
            $controller->{$query_string[1]}($query_string[2]); //execute functions
        }
        else 
        {
            if(isset($query_string[1]))
            {
                $controller->{$query_string[1]}(); //execute functions
            }
            else 
            {
                $controller->index(); //execute index functions
            }
        }
    }
}