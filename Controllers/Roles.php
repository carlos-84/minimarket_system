
<?php

class Roles extends Controller{

    public function __construct()
    {
        parent::__construct();
    }

    public function roles(){
        $data['page_title'] = "Mini Market | Roles de Usuario";
        $data['page_name'] = "Roles de Usuario";
        $data['functions_js'] = "Roles.js";
        $data ['roles'] = $this->model->listRoles();
        $this->views->getView($this, 'roles', $data);
    }

   

}