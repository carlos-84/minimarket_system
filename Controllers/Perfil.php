<?php

class Perfil extends Controller
{


    public function __construct()
    {
        if (!isset($_SESSION['login'])) {
            header('Location:' . base_url . '/Login');
        }
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
