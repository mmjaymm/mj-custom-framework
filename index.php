<?php
session_start();

/* Root Directory */
define('ROOT', dirname(__FILE__));

require_once 'core/Bootstrap.php';
require_once 'core/Controller.php';
require_once 'core/View.php';

$app = new Bootstrap();
?>