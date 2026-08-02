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

    public static function query($sql, $params=[]){
        $db = new Conexion();
        $link = $db->conect();
        $link->beginTransaction(); // inicia la transacción, para cualquier error, se puede hacer un rollback
        $query = $link->prepare($sql);

        if(!$query->execute($params)){
            $link->commit(); // si todo sale bien, se hace commit
            $error = $query->errorInfo();
            throw new Exception("Error en la consulta: " . $error[2]);
        }

        //SELECT // INSERT // UPDATE // DELETE // ALTER TABLE
        //Manejo del tipo de query

        if(strpos($sql, 'SELECT') !== false){
            return $query->rowCount() > 0 ? $query->fetchAll(PDO::FETCH_ASSOC) : false;
        }else if(strpos($sql, 'INSERT') !== false){
            $id = $link->lastInsertId();
            $link->commit();
            return $id;
        }else if(strpos($sql, 'UPDATE') !== false){
            $link->commit();
            return true;
        
        }elseif(strpos($sql, 'DELETE') !== false){
            if($query->rowCount() > 0){
                $link->commit();
                return true;
            }
            $link->rollBack();
            return false;
        }else{
            $link->commit();
            return true;
        }

    }

}