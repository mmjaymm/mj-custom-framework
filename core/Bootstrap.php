<?php

class Bootstrap
{   
    protected $class = '';
    protected $method = '';
    protected $params = [];
    protected $url = [];
    protected $controller = '';

    public function __construct($config)
    {   
        /* Parse url to array */
        $this->url = $this->urlParse();

        /* Check if no base_url */
        if($config['base_url'] !== '')
        {
            if(count($this->url) === 0)
            {   
                /* Default controller and method */
                $this->class = $config['default_controller'];
                $this->method = $config['default_method'];
            }
            else 
            {
                foreach ($this->url as $key => $value) 
                {
                    $this->class = $this->url[0];
                    unset($this->url[0]);
                }
            }
        }else {
            die('Error : The Base URL configuration is not set.');
        }

        print_r($this->url);

        /* Files in controller */
        // $controller_path = 'app/controllers/'.$this->class.'.php';

        // /* Check if controller class exist */
        // if (file_exists($controller_path)) 
        // {
        //     require $controller_path; //require controller file
        // }
        // else 
        // {   
        //     die("Error : No controller file");
        // }

        // /* Instantiate controller class */
        // $this->controller = new $this->class;

        /* Set method of a class controller */
        


        /* Check if have parameters */
        // if(isset($this->url[2]))
        // {
        //     $controller->{$query_string[1]}($query_string[2]); //execute functions
        // }
        // else 
        // {
        //     if(isset($query_string[1]))
        //     {
        //         $controller->{$query_string[1]}(); //execute functions
        //     }
        //     else 
        //     {
        //         $controller->index(); //execute index functions
        //     }
        // }
    }

    protected function urlParse()
    {   
        if (isset($_GET['url'])) 
        {
            /* 
            *   Remove slash(/) at the end and sanitize the string url
            */
            $url_string = filter_var(rtrim($_GET['url'], '/'), FILTER_SANITIZE_URL);
            return $url = explode('/', $url_string);
        }
        else 
        {
            return array();
        }
        
    }
}