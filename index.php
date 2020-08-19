<?php
/*
 * ---------------------------------------------------------------
 * APPLICATION ENVIRONMENT
 * ---------------------------------------------------------------
 */
define('ENVIRONMENT', 'development');

/*
 * ---------------------------------------------------------------
 * DEFAULT TIME ZONE
 * ---------------------------------------------------------------
 */
date_default_timezone_set('Asia/Manila');

/*
 * ---------------------------------------------------------------
 * ERROR REPORTING
 * ---------------------------------------------------------------
 */
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

$base_path = __DIR__; //current folder name

/*
 * ---------------------------------------------------------------
 * ROOT DIRECTORY
 * ---------------------------------------------------------------
 */
define('ROOT', dirname(__FILE__));

require_once 'config/config.php';
require_once 'core/init.php';

$app = new Bootstrap($config);
?>