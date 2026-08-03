
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

        // Obtener los roles activos desde la base de datos
       //$data ['roles'] = RolesModel::listEqual('roles');
       $datosUdapte = ['nombre_rol' => 'WebSite Update2'];
       //RolesModel::update('roles', $datosUdapte,['id_rol' => 3]);
       $data ['roles'] = RolesModel::listEqual('roles');
        $this->views->getView($this, 'roles', $data);
    }

   

}