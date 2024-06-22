<?php

require_once "../../lib/connection.php";

connect();

$sql = "SELECT * FROM Clinica";

$clinicas = consultaSimple($sql);

$filename = 'clinicas.csv';

header('Content-Type: text/csv; charset=utf-8');
header('Content-Disposition: attachment; filename=' . $filename);

$manejo = fopen("php://output","w");

foreach ($clinicas as $unaClinica) {
    $linea = [
        $unaClinica['cl_id'],
        $unaClinica['cl_cuit'],
        $unaClinica['cl_razon_social'],
        $unaClinica['cl_nombre'],
        $unaClinica['cl_codigo_postal'],
        $unaClinica['cl_provincia'],
        $unaClinica['cl_ciudad'],
        $unaClinica['cl_calle'],
        $unaClinica['cl_numero_calle']
    ];
    fputcsv($manejo, $linea, ';');
}

fclose($manejo);