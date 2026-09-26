<?php

class UsuariosModel extends DB{

   

    public function __construct()
    {
        parent::__construct();
    }

    public static function all()
    {
        $respuesta = DB::SQL("SELECT u.id_usuario, r.id, r.nombre AS rol, u.nombre AS nom_user, u.email, u.is_activo FROM usuarios u INNER JOIN roles r ON u.id_rol = r.id");
        return $respuesta;
    }

    public static function rolesAll()
    {
        $respuesta = DB::SQL("SELECT * FROM roles WHERE activo != 0");
        return $respuesta;
    }

    public static function insertUser($params)
    {
        $idInsert = DB::insert('usuarios', $params);
        return $idInsert;
    }

    public static function updates($params, $id)
    {
        $idUpdate = DB::update('usuarios', $params, ['id_usuario' => $id]);
        return $idUpdate;
    }

    public static function deleteUser($id)
    {
        $idDelete = DB::delete('usuarios', ['id_usuario' => $id]);
        return $idDelete;
    }

}