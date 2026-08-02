<?php

class Usuarios extends Controller{

    public function usuarios(){
        $data['page_title'] = "Mini Market | Usuarios";
        $data['page_name'] = "Usuarios";
        $data['functions_js'] = "Usuarios.js";
        $this->views->getView($this, 'usuarios', $data);
    }

    public function editar(){

   echo  $msg = "soy editar";
      
    return $msg;
    }

}