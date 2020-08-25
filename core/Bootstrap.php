<?php

require_once 'config/config.php';
require_once 'config/database.php';
require_once 'core/init.php';
require_once 'core/x_Registry.php';
require_once 'core/Loader.php';
require_once 'core/x_Common.php';

$class = null;
$method = null;
$params = array();
/* Parse url to array */
$url = urlParse();


if($config['base_url'] === '')
{
    die('Error : Ang Base URL configuration ay hindi nakaset.');
}

if(count($url) === 0)
{   
    /* Default controller and method */
    $class = $config['default_controller'];
    $method = $config['default_method'];
}
else 
{
    $class = $url[0];
    unset($url[0]);
}

/* Files in controller */
$controller_path = 'app/controllers/'.$class.'.php';

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
$controller = new $class;

/* Set method of a class controller */
if(isset($url[1]))
{   
    if(is_callable(array($controller, $url[1])))
    {
        $method = $url[1];
        unset($url[1]);
    }
    else 
    {
        die('Error : This method is not callable in public.');    
    }
}
else 
{
    $method = $config['default_method'];
}

// Rebase Parameters or set empty array.
$params = $url ? array_values($url) : [];
        
/* Validate the parameters count in method */
$paramsCount = validateNumberParams($controller, $method, $params);
        
if($paramsCount === count($params))
{
    // Send Parameters to the Method of the Controller.
    call_user_func_array([$controller, $method], $params);
}
else 
{
    die('Error : Hindi tama ang bilang ng parameters sa url at ng method.');
}

function urlParse()
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

function validateNumberParams($controller, $method, $params)
{
    $reflection = new ReflectionMethod($controller, $method);
    return count($reflection->getParameters());
}