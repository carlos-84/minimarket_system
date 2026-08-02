
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
        $data ['roles'] = RolesModel::listEqual('roles', ['estado_rol' => 1],1);
        $this->views->getView($this, 'roles', $data);
    }

   

}