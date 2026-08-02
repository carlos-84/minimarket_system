<?php

class RolesModel extends DB{

    public $id_rol, $nombre_rol, $estado_rol;
   

    public function __construct()
    {
        parent::__construct();
    }

    public function listRoles(){
        $sql = "SELECT * FROM roles WHERE estado_rol != 0";
        $result = $this->selectAll($sql);   
        return $result;
    }

}