<?php

spl_autoload_register(function($classes)
{
    require_once ROOT_PATH.'/core/'.$classes.'.php';
});

// require_once 'Bootstrap.php';
// require_once 'Controller.php';
// require_once 'View.php';
// require_once 'Model.php';