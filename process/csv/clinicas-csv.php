<?php

if ($_FILES) {
    include "../../lib/connection.php";

    $type = $_FILES["archivo"]["type"];
    if ($type == "text/csv") {
        $url = $_FILES["archivo"]["tmp_name"];
        $nombreArchivo = "clinicas.csv";
        $guardarEn = '../../temp/';
        $filename = "datos_upload.csv";
        $fichero_subido = $guardarEn . $nombreArchivo;
        move_uploaded_file($url, $fichero_subido);


        $separador = ';';
        $manejo = fopen($fichero_subido, 'r');

        
        if ($manejo !== false) {
            // // Lee la primera línea para obtener los nombres de las columnas
            // $columnas = fgetcsv($manejo, 1000, $separador);

            $columnas = array(
                "cl_cuit",
                "cl_razon_social",
                "cl_nombre",
                "cl_codigo_postal",
                "cl_provincia",
                "cl_ciudad",
                "cl_calle",
                "cl_numero_calle"
            );

            // Lee cada línea del CSV hasta que fgetcsv devuelva false, lo que indica que ha alcanzado el final del archivo
            while (($linea = fgetcsv($manejo, 1000, $separador)) !== false) {

                $clinicasCSV[] = array_combine($columnas, $linea);

            }

            // Cierra el archivo
            fclose($manejo);
            // Elimina el archivo
            unlink($fichero_subido);

        } else {
            echo 'No se pudo abrir el archivo.';
        }



        connect();


        foreach ($clinicasCSV as $value) {

            $sql = "INSERT INTO 
                        Clinica (
                            cl_cuit,
                            cl_razon_social,
                            cl_nombre,
                            cl_codigo_postal,
                            cl_provincia,
                            cl_ciudad,
                            cl_calle,
                            cl_numero_calle
                        )
                    VALUES
                        (
                            :cl_cuit,
                            :cl_razon_social,
                            :cl_nombre,
                            :cl_codigo_postal,
                            :cl_provincia,
                            :cl_ciudad,
                            :cl_calle,
                            :cl_numero_calle
                        );";
            try {
                $sentencia = $connection->prepare($sql);
            } catch (PDOException $e) {
                echo "Error: " . $e->getMessage();
            }
        
            $sentencia->bindParam(':cl_cuit', $value["cl_cuit"], PDO::PARAM_STR,50);
            $sentencia->bindParam(':cl_razon_social', $value["cl_razon_social"], PDO::PARAM_STR,50);
            $sentencia->bindParam(':cl_nombre', $value["cl_nombre"], PDO::PARAM_STR,50);
            $sentencia->bindParam(':cl_codigo_postal', $value["cl_codigo_postal"], PDO::PARAM_STR,10);
            $sentencia->bindParam(':cl_provincia', $value["cl_provincia"], PDO::PARAM_STR,50);
            $sentencia->bindParam(':cl_ciudad', $value["cl_ciudad"], PDO::PARAM_STR,50);
            $sentencia->bindParam(':cl_calle', $value["cl_calle"], PDO::PARAM_STR,50);
            $sentencia->bindParam(':cl_numero_calle', $value["cl_numero_calle"], PDO::PARAM_INT);
        
            try {
                $sentencia->execute();
            } catch (PDOException $e) {
                echo "Error: " . $e->getMessage();
            }
        }




        echo "Clínicas cargadas correctamente.";



        header("location:../../");
        exit;




        // header("location:../../success.php");
        // exit;
    } else {
        header("location:../../danger.php");
        exit;
    }
    
} else {
    header("location:../../");
    exit;
}

?>