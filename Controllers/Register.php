<?php

class Register extends Controller
{


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

    public function save()
    {

        $data = [];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            // Validar los campos del formulario 

            $val = new Validations();
            $val->name('name')->value(limpiar($_POST['name']))->required();
            $val->name('email')->value(limpiar($_POST['email']))->pattern('email')->required();
            $val->name('password')->value(limpiar($_POST['password']))->min(5)->max(20)->pattern('alphanum')->equal(limpiar($_POST['confirm_password']))->required();

            if ($val->isSuccess()) {
                $pasHash = hash("SHA256", limpiar($_POST['password']));
                $data = [
                    'nombre' => limpiar($_POST['name']),
                    'email' => limpiar($_POST['email']),
                    'password' => $pasHash
                ];
                $idisert = RegisterModel::insert('usuarios', $data);
                $data = ['status' => true, 'msg' => 'Registrado correctamente'];
            }else {
                $data = ['error' => $val->getErrors()];
            }
        }

        echo json_encode($data, JSON_UNESCAPED_UNICODE);
    }
}
