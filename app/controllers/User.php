<?php

class User extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {   
        $this->load->view('header');
        $this->load->view('index');
        $this->load->view('footer');
    }

    public function sample($a, $cxzcz)
    {
        echo $a.' - '.$cxzcz;
        // $n = func_num_args();
        // echo $n;
    }
}