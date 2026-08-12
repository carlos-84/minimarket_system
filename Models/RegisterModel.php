<?php

class RegisterModel extends DB{


    public function __construct()
    {
        return parent::__construct();
    }

    public static function validar()

    {
        $errores = [];
        $name = $_POST['name'];
        $email = $_POST['email'];   
        $password = $_POST['password'];
        $confirm_password = $_POST['confirm_password'];

        
        if(strlen($password) <= 5){
            $errores = array('error'=> 'La contraseña debe tener al menos 6 caracteres');
        }else if($password !== $confirm_password){
            $errores = array('error'=> 'Las contraseñas no coinciden');
        }
        if(empty($name) || empty($email) || empty($password) || empty($confirm_password)){
            $errores = array('error' => 'Todos los campos son obligatorios');
        }else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            $errores = array('error'=> 'El email no es válido');
        }
        
        
        return $errores;
    }
}