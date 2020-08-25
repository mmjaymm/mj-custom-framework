<?php

/* Application Environment */
define('ENVIRONMENT', 'development');

/* Defaul Timezone */
date_default_timezone_set('Asia/Manila');

/* Error Reporting */
if (defined('ENVIRONMENT'))
{
    switch (ENVIRONMENT)
    {
        case 'development':
            error_reporting(E_ALL);
            break;
        case 'production':
            error_reporting(0);
            break;
        default:
            exit('The application environment is not set correctly.');
    }
}

/* Root Directory */
define('ROOT', dirname(__FILE__));
define('ROOT_PATH', str_replace('\\', '/', ROOT));

/* Controllers Directory */
define('CONTROLLERS_PATH', './app/controllers/');

require_once 'core/Bootstrap.php';

?>