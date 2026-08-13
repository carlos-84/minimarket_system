<?php

class Login extends Controller{


public function __construct()
    {
        if (isset($_SESSION['login'])) {
            header('Location:' .base_url.'/Perfil');
        }
        parent::__construct();
    }

    public function login()
    {
        $data['page_title'] = "Login";
        $data['functions_js'] = "Login.js";
        $this->views->getView($this, "login", $data);
    }

    public function ingresar()
    {
        $arrJson = [];

        if($_SERVER['REQUEST_METHOD'] == "POST"){
            $val = new Validations();

            $val->name('email')->value($_POST["email"])->pattern('email')->required();
            $val->name('password')->value(limpiar($_POST["password"]))->min(5)->max(20)->pattern('alphanum')->required();
            
            // si todo va bien se loguea
            if ($val->isSuccess()) {
                //loguearse
                $usuario = LoginModel::login(limpiar($_POST["email"]),hash("SHA256", limpiar($_POST['password'])));
              
                if (empty($usuario)) {
                   $arrJson = ['error' => 'Estas credenciales no existen en nuestro sistema o el usuario no existe'];
                }else {
                    //Crear nuestras sesiones
                    $_SESSION['idUser'] = $usuario['id_usuario'];
                    $_SESSION['nombre'] = $usuario['nombre'];
                    $_SESSION['email'] = $usuario['email'];
                    $_SESSION['login'] = true;
                    $arrJson = ['msg' => '¡El usuario se ha logueado corretamente!'];
                }
               
            }else{
                $arrJson = ['error' => $val->getErrors()];
            }

        }

        echo json_encode($arrJson, JSON_UNESCAPED_UNICODE);
    }

}