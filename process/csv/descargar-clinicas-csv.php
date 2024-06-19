<?php

require_once "connection.php";



function crearCSV($tabla) {
    connect();

    $sql = "SELECT * FROM $tabla";

    $resultado = consultaSimple($sql);

    // [cl_id]
    // [cl_cuit]
    // [cl_razon_social]
    // [cl_nombre]
    // [cl_codigo_postal]
    // [cl_provincia]
    // [cl_ciudad]
    // [cl_calle]
    // [cl_numero_calle]

    print_r($resultado);

    
}


crearCSV("clinica");