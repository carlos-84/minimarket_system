<?php

class Perfil extends Controller
{


    public function __construct()
    {
        Permisos::get_permisos(1);
        Auth::noAuth();
        return parent::__construct();
    }

    public function perfil()
    {
        $data['page_title'] = "Mini Market | Perfil de usuario";
        $data['page_name'] = "Perfil de usuario";
        $data['functions_js'] = "Perfil.js";
        $this->views->getView($this, 'perfil', $data);
    }
}
