<?php

require_once './functions.php';

spl_autoload_register(function($classes)
{
    require_once $_SERVER['DOCUMENT_ROOT'].'/st-ot-qa-system/classes/'.$classes.'.php';
})

?>