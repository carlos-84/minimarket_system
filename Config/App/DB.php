<?php

class DB extends Conexion{

//listar registros desde la base de datos, o un registro en especifico.

    public static function listEqual($table, $params = [], $limit = null){
        $cols_values = "";
        $limits = "";

        if(!empty($params)){
            $cols_values .= " WHERE ";
            foreach($params as $key => $value){
                $cols_values .= "{$key} = :{$key} AND";            }
           $cols_values = substr($cols_values, 0, -3); // Elimina el último " AND " 
        }
        
        if(!empty($limit)){
            $limits = " LIMIT {$limit}";
        }


        // Reemplaza los marcadores de posición con los valores reales
        $stmt = "SELECT * FROM $table {$cols_values} {$limits}";

        if(!$rows = parent::query($stmt, $params)){
            return false;
        }

        return $limit === 1 ? $rows[0] : $rows;
    }

    //listar con inner join desde la base de datos, o un registro en especifico.
     public static function join($table1, $table2, $val1, $val2, $params = [], $limit = null){
        $cols_values = "";
        $limits = "";

        if(!empty($params)){
            $cols_values .= " WHERE ";
            foreach($params as $key => $value){
                $cols_values .= "{$key} = :{$key} AND";            }
           $cols_values = substr($cols_values, 0, -3); // Elimina el último " AND " 
        }
        
        if(!empty($limit)){
            $limits = " LIMIT {$limit}";
        }


        // Reemplaza los marcadores de posición con los valores reales

        $stmt = "SELECT * FROM $table1 
                INNER JOIN $table2 
                ON $table1.$val1 = $table2.$val2
                 {$cols_values} {$limits}";

        if(!$rows = parent::query($stmt, $params)){
            return false;
        }

        return $limit === 1 ? $rows[0] : $rows;
    }

    //inserción de registros en la base de datos
    public static function insert($table, $params){
        $cols = "";
        $placeholders = "";

        foreach($params as $key => $value){
            $cols .= "{$key},";
            $placeholders .= ":{$key},";
        }
        $cols = substr($cols, 0, -1); // Elimina la última coma
        $placeholders = substr($placeholders, 0, -1); // Elimina la última coma

        $stmt = "INSERT INTO $table ($cols) VALUES ($placeholders)";

        if($id = parent::query($stmt, $params)){
            return $id;
        }
        return false;
    }

    //actualización de registros en la base de datos
    public static function update($table, $params  = [],  $id = []){
        //UDATE producto SET namepro = :namepro WHERE idpro = 1 AND estado = 1;
        $cols = "";
        $placeholders = "";

        foreach($params as $key => $value){
    
            $placeholders .= " {$key} = :{$key}, ";
        }
        $placeholders = substr($placeholders, 0, -2); // Elimina la última coma y espacio

        if (count($id) > 1) {
             foreach($id as $key => $value){
            $cols .= " {$key} = :{$key} AND";           
            }

           $cols = substr($cols, 0, -3); // Elimina el último
            
        }else{
            foreach($id as $key => $value){
            $cols .= " $key = :$key"; 
        }
        
        $stmt = "UPDATE $table SET $placeholders WHERE $cols";

            if(!parent::query($stmt, array_merge($params, $id))){
                return false;
            }
            return true;
        
        }
    }
}