<?php

class Permisos
{

    // public static function get_permisos(int $idmodulo)
    // {
    //      $id_user = $_SESSION['idUser'];
    //      $permisoByUser = DB::SQL("SELECT p.*, m.id, m.nombre_mod FROM permisos AS p INNER JOIN modulos AS m ON p.id_modulo = m.id WHERE id_user = $id_user");
         
    //     $arrPermisos = [];

    //     for ($i=0; $i < count($permisoByUser); $i++) { 
    //         $arrPermisos[$permisoByUser[$i]['id_modulo']] = $permisoByUser;
    //     }
    //     $permisos = '';
    //     $permisoMod = '';

    //     if (count($arrPermisos) > 0) {
    //        $permisos = $arrPermisos;
    //        $permisoMod = isset($arrPermisos[$idmodulo]) ? $arrPermisos[$idmodulo] : "";
    //     }
       
    //     $_SESSION['permisos'] = $permisos;
    //     $_SESSION['permisosMod'] = $permisoMod;
    //      debug( $_SESSION['permisosMod'][2]['r']);
    // }

    public static function get_permisos(int $idpagina)
    {
    // 1. Validar sesión activa
    if (!isset($_SESSION['idUser'])) {
        return;
    }
    
    $id_user = (int)$_SESSION['idUser'];

    // 2. Seguridad: Consultas preparadas para evitar Inyección SQL
    // Nota: Ajusta 'DB::SQL' con marcadores de posición (?) si tu framework lo soporta
    $sql = "SELECT p.*, pg.id, pg.titulo
            FROM permisos AS p 
            INNER JOIN paginas AS pg ON p.id_pagina = pg.id 
            WHERE p.id_rol = $id_user";
            
    $permisoByUser = DB::SQL($sql); 
    
    $arrPermisos = [];

    // 3. Corrección del bucle: Mapear correctamente por id_modulo
    foreach ($permisoByUser as $permiso) {
        $arrPermisos[$permiso['id_pagina']] = $permiso;
    }
   
    // 4. Asignación limpia a variables de sesión
    $_SESSION['permisos'] = $arrPermisos;
    $_SESSION['permisosMod'] = $arrPermisos[$idpagina] ?? "";

    // Depuración segura
    if (!empty($_SESSION['permisosMod'])) {
        //debug($_SESSION['permisos']['r']); // Ya no requiere el índice numérico [2]
    }
    }

    public static function nav()
    {
    $sql = DB::SQL("SELECT id AS idpagina, titulo, icono FROM paginas");
    
    foreach($sql as $item){
        if (!empty($_SESSION['permisos'][$item['idpagina']]['r'])) {
            echo "<li class='nav-item'>
          <a href='".base_url()."/".$item['titulo']."' class='nav-link'>
            <i class='".$item['icono']." nav-icon'></i>
            <p>".$item['titulo']."</p>
          </a>
        </li>";
        }
    }
        
    }

    public static function leer()
    {
        if (!empty($_SESSION['permisosMod']['r'])) {
        return true;
        }
    }

    public static function crear()
    {
        if (!empty($_SESSION['permisosMod']['c'])) {
        return true;
        }
    }

    public static function actualizar()
    {
        if (!empty($_SESSION['permisosMod']['u'])) {
        return true;
        }
    }

    public static function eliminar()
    {
        if (!empty($_SESSION['permisosMod']['d'])) {
        return true;
        }
    }

}