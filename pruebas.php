<?php


include "class/conexion.php";

$conexion = new conexion();
$i = 0;

$sql = "SELECT * FROM Clinica";

$clinicas = $conexion->consultar($sql);

// print_r($clinicas);


foreach ($clinicas as  $value) {
    echo "Nombre: " . $value['cl_nombre'] . "<br>";
    echo "CUIT: " . $value['cl_cuit'] . "<br>";
    echo "Provincia: " . $value['cl_provincia'] . "<br>";
    echo "Código postal: " . $value['cl_codigo_postal'] . "<br><br>";
}

$conexion->desconectar();
