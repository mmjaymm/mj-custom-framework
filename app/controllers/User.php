<?php

class User extends Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('users');
    }

    public function index()
    {   
        $this->load->view('header');
        $this->load->view('index');
        $this->load->view('footer');
    }

    public function sample($var)
    {
        $this->users->get_firstname($var);
    }
}