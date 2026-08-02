<?php

class Home extends Controller{

    public function home(){
        $data['page_title'] = "Mini Market | Dashboard";
        $data['page_name'] = "Dashboard";
        $data['functions_js'] = "Dashboard.js";
        $this->views->getView($this, 'home', $data);
    }

}