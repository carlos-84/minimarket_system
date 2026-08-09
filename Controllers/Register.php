<?php

class Register extends Controller{


    public function __construct()
    {
        parent::__construct();
    }

    public function register()
    {
        $data['page_title'] = "Register";
         $data['functions_js'] = "Register.js";
        $this->views->getView($this, "register", $data);
    }

    public function save(){

        $data = [$_POST];

        echo json_encode($data, JSON_UNESCAPED_UNICODE);
    }

}