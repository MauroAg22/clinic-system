<?php

include "database-info.php";

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