<?php

$nombreArchivo = 'personas.csv';

$ubicacionArchivo = '../temp/' . $nombreArchivo;

$separador = ',';

$manejo = fopen($ubicacionArchivo, 'r');


// Abre el archivo en modo lectura
if ($manejo !== false) {

    // Imprime cada linea del csv
    while (!feof($manejo)) {
        $linea = fgetcsv($manejo, 1000, $separador);

        foreach ($linea as $campo) {
            echo $campo . ",";
        }

        echo "<br>";

        // echo htmlspecialchars($linea) . "<br>";
    }

    // Cierra el archivo
    fclose($manejo);
} else {
    echo 'No se pudo abrir el archivo.';
}

?>