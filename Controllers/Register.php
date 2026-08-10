<?php

class Register extends Controller{


    public function __construct()
    {
        parent::__construct();
    }

    public function register()
    {
        $data['page_title'] = "Register";
         $data['functions_js'] = "Register.js";
        $this->views->getView($this, "register", $data);
    }

    public function save(){

        $data = [];

        if($_SERVER['REQUEST_METHOD'] === 'POST') {

        // Validar los campos del formulario 

            $errores = RegisterModel::validar();
            $data = $errores;
            if (empty($errores)) {

                $data = [
                    'id_rol' => 3,
                    'nombre' => $_POST['name'],   
                    'email' => $_POST['email'],
                    'password' => $_POST['password']
                ];
                $idisert = RegisterModel::insert('usuarios', $data);
                 $data = ['status' => true, 'msg' => 'Usuario registrado correctamente'];
            }
        
           
        
        }

        echo json_encode($data, JSON_UNESCAPED_UNICODE);
    }

}