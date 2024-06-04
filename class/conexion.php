<?php

class conexion {
    private $servidor = "localhost";
    private $usuario = "root";
    private $contrasenia = "";
    private $dbname = "clinica";
    private $opciones = array (
        PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
        PDO::ATTR_PERSISTENT => false
    );
    private $conexion;

    public function __construct() {
        try {
            $this->conexion = new PDO(
                "mysql:host=$this->servidor;dbname=$this->dbname",
                $this->usuario,
                $this->contrasenia,
                $this->opciones
            );
            $this->conexion->setAttribute(
                PDO::ATTR_ERRMODE,
                PDO::ERRMODE_EXCEPTION
            );
        } catch (PDOException $error) {
            return "Conexion erronea: " . $error->getMessage();
        }
    }

    // Insert - Update - Delete
    public function ejecutar($sql) {
        $sentencia = $this->conexion->prepare($sql);
        $sentencia->execute();
        return $this->conexion->lastInsertId();
    }

    // Select
    public function consultar($sql) {
        $sentencia = $this->conexion->prepare($sql);
        $sentencia->execute();
        return $sentencia->fetchAll();
    }
}