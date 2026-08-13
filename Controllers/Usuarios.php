<?php

class Usuarios extends Controller
{


    public function __construct()
    {
       
        Auth::noAuth();
        Permisos::get_permisos(3);
        return parent::__construct();
    }


    public function usuarios()
    {
        if (empty($_SESSION['permisosMod']['r'])) {
            header('Location:' .base_url.'/Perfil');
            //debug( $_SESSION['permisosMod'][2]['r']);
        }

        $data['page_title'] = "Mini Market | Usuarios";
        $data['page_name'] = "Usuarios";
        $data['functions_js'] = "Usuarios.js";
        $this->views->getView($this, 'usuarios', $data);
    }

    public function editar()
    {

        echo  $msg = "soy editar";

        return $msg;
    }
}
