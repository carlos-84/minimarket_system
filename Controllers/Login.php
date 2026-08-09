<?php

class Login extends Controller{


public function __construct()
    {
        parent::__construct();
    }

    public function login()
    {
        $data['page_title'] = "Login";
        $this->views->getView($this, "login", $data);
    }

    

}