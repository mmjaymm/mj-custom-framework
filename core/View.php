<?php

class View
{
    public function __construct(){}

    public function view($name)
    {
        require 'app/views/'.$name.'.php';
    }
}