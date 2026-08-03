
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
       
       //insertar un registro en la base de datos
       //$datos = ['nombre_rol' => 'WebSite', 'estado_rol' => 1];
       //RolesModel::insert('roles', $datos);

       //actualizar un registro en la base de datos
       //$datosUdapte = ['nombre_rol' => 'WebSite Update2'];
       //RolesModel::update('roles', $datosUdapte,['id_rol' => 3]);

       //eliminar un registro en la base de datos
       //$id_rol = 4;
       //RolesModel::delete('roles',['id_rol' => $id_rol]);

       $data ['roles'] = RolesModel::listEqual('roles');
        $this->views->getView($this, 'roles', $data);
    }

   

}