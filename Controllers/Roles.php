
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
       $data ['roles'] = RolesModel::listEqual('roles');
       $datos = ['nombre_rol' => 'WebSite', 'estado_rol' => 1];
       //RolesModel::insert('roles', $datos);
        $this->views->getView($this, 'roles', $data);
    }

   

}