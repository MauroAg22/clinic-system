<?php

const SERVER = "localhost";
const USER = "root";
const PASSWORD = "";
const DBNAME = "clinica";
const OPTIONS = array(
    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
    PDO::ATTR_PERSISTENT => false
);

function conectar() {
    global $connection;
    try {
        $connection = new PDO("mysql:host=".SERVER.";dbname=".DBNAME, USER, PASSWORD, OPTIONS);
        $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $error) {
        die("Conexion erronea: " . $error->getMessage());
    }
}

// Insert - Update - Delete
function ejecutar($sql) {
    global $connection;
    if (!isset($connection)) {
        conectar();
    }
    try {
        $sentencia = $connection->prepare($sql);
        $sentencia->execute();
        return $connection->lastInsertId();
    } catch (PDOException $error) {
        die("Error al ejecutar: " . $error->getMessage());
    }
}

// Select
function consultar($sql) {
    global $connection;
    if (!isset($connection)) {
        conectar();
    }
    try {
        $sentencia = $connection->prepare($sql);
        $sentencia->execute();
        return $sentencia->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $error) {
        die("Error al consultar: " . $error->getMessage());
    }
}