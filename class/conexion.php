<?php

class conexion {
    private $servidor = "localhost";
    private $usuario = "root";
    private $contrasenia = "";
    private $dbname = "clinica";
    private $conexion;

    public function __construct() {
        try {
            $this->conexion = new PDO("mysql:host=$this->servidor;dbname=$this->dbname", $this->usuario, $this->contrasenia);
            $this->conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $error) {
            return "Conexion erronea $error";
        }
    }

    // Ejecutar - Actualizar - Borrar
    public function ejecutar($sql) {
        $this->conexion->exec($sql);
        return $this->conexion->lastInsertId();
    }

    // Consultar
    public function consultar($sql) {
        $sentencia = $this->conexion->prepare($sql);
        $sentencia->execute();
        return $sentencia->fetchAll();
    }

    // Se desconecta de la base de datos
    public function desconectar() {
        $this->conexion = null;
    }
}