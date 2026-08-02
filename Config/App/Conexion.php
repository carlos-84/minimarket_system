<?php

class Conexion {

    private $conect;

    public function __construct()
    {
        $conectionString = "mysql:host=".DB_HOST.";dbname=".DB_NAME.";charset=".DB_CHARSET;
        try {
            $this->conect = new PDO($conectionString,DB_USER,DB_PASWWORD);
            $this->conect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            //echo "Conexion exitosa a la BD";
        } catch (PDOException $e) {
            echo "Error en la conexión: " . $e->getMessage();
        }
    }

    public function conect(){
        return $this->conect;
    }

}