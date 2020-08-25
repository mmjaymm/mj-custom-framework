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
        /* Check if base_url is set */
        if($config['base_url'] === '')
        {
            die('Error : Ang Base URL configuration ay hindi nakaset.');
        }
        
        /* Parse url to array */
        $this->url = $this->urlParse();

        if(count($this->url) === 0)
        {   
            /* Default controller and method */
            $this->class = $config['default_controller'];
            $this->method = $config['default_method'];
        }
        else 
        {
            $this->class = $this->url[0];
            unset($this->url[0]);
        }

        /* Files in controller */
        $controller_path = 'app/controllers/'.$this->class.'.php';

        /* Check if controller class exist */
        if (file_exists($controller_path)) 
        {
            require $controller_path; //require controller file
        }
        else 
        {   
            die("Error : Walang controller file na nag-eexist");
        }

        /* Instantiate controller class */
        $this->controller = new $this->class;

        /* Set method of a class controller */
        if(isset($this->url[1]))
        {   
            if(is_callable(array($this->controller, $this->url[1])))
            {
                $this->method = $this->url[1];
                unset($this->url[1]);
            }
            else 
            {
                die('Error : This method is not callable in public.');    
            }
        }
        else 
        {
            $this->method = $config['default_method'];
        } 

        // Rebase Parameters or set empty array.
        $this->params = $this->url ? array_values($this->url) : [];
        
        /* Validate the parameters count in method */
        $paramsCount = $this->validateNumberParams($this->controller, $this->method, $this->params);
        
        if($paramsCount === count($this->params))
        {
            // Send Parameters to the Method of the Controller.
            call_user_func_array([$this->controller, $this->method], $this->params);
        }
        else 
        {
            die('Error : Hindi tama ang bilang ng parameters sa url at ng method.');
        }
        
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

    protected function validateNumberParams($controller, $method, $params)
    {
        $reflection = new ReflectionMethod($controller, $method);
        return count($reflection->getParameters());
    }
}