<?php

class Users extends Model
{
    public function __construct()
    {
        
    }

    public function getname()
    {
        echo "samples";
    }

    public function get_firstname($sample)
    {
        echo $sample;
    }
}