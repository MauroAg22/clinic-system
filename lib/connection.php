<?php

// Base de datos de - https://www.000webhost.com/ 
// const USER = 'id21345029_mauroag22';
// const PASSWORD = 'F4f3&j85$Sdf';
// const DBNAME = 'id21345029_clinica';

const SERVER = "localhost";
const USER = "root";
const PASSWORD = "";
const DBNAME = "clinica";
const OPTIONS = array(
    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
    PDO::ATTR_PERSISTENT => false
);

function connect() {
    global $connection;
    try {
        $connection = new PDO("mysql:host=".SERVER.";dbname=".DBNAME, USER, PASSWORD, OPTIONS);
        $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $error) {
        die("Error de conexión: " . $error->getMessage());
    }
}

function disconnect() {
    global $connection;
    $connection = null;
}

// Insert - Update - Delete
function ejecucionSimple($sql) {
    global $connection;
    try {
        $sentencia = $connection->prepare($sql);
        $sentencia->execute();
        return $connection->lastInsertId();
    } catch (PDOException $error) {
        die("Error de ejecución script SQL: " . $error->getMessage());
    }
}

// Select
function consultaSimple($sql) {
    global $connection;
    try {
        $sentencia = $connection->prepare($sql);
        $sentencia->execute();
        return $sentencia->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $error) {
        die("Error al consultar: " . $error->getMessage());
    }
}