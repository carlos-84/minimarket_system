<?php

class Productos extends Controller{

    public function __construct()
    {
         Permisos::get_permisos(5);
        Auth::noAuth();
        parent::__construct();
    }

    public function productos(){
        $data['page_title'] = "Mini Market | Productos";
        $data['page_name'] = "Productos";
        $data['functions_js'] = "Productos.js";

        $productos = ProductosModel::join('productos','categorias','id_categoria','id_cat',['id_categoria' => 2],2);
        $data['productos'] = $productos;

        $this->views->getView($this, 'productos', $data);
    }

   

}