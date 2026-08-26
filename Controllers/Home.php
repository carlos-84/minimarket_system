<?php

class Home extends Controller{


public function __construct()
{
     Permisos::get_permisos(2);
        Auth::noAuth();
    return parent::__construct();
}

    public function home(){
        $data['page_title'] = "Mini Market | Dashboard";
        $data['page_name'] = "Dashboard";
        $data['functions_js'] = "Dashboard.js";
        $this->views->getView($this, 'home', $data);
    }

}