<?php

class DB extends Conexion{

    private $conexion, $query, $values;

    public function __construct()
    {
        //parent::__construct();
        $this->conexion = new Conexion();
        $this->conexion->conect();
    }

    /**
     * Ejecutar consultas
     */
    public function selectAll(string $query)
    {
        $this->query = $query;
        $result = $this->conexion->conect()->prepare($this->query);
        $result->execute();
        $data = $result->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }

}