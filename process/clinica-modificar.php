<?php 

if ($_POST) {
    $cl_id = $_POST["cl_id"];
    $cl_cuit = $_POST['cuit'];
    $cl_cuit = $_POST['cuit'];
    $cl_razon_social = $_POST['razonSocial'];
    $cl_nombre = $_POST['nombre'];
    $cl_codigo_postal = $_POST['codigoPostal'];
    $cl_provincia = $_POST['provincia'];
    $cl_ciudad = $_POST['ciudad'];
    $cl_calle = $_POST['calle'];
    $cl_numero_calle = $_POST['numero'];
    
    include "../lib/connection.php";
    connect();

    if ($_POST['cl_id'] == -1) {
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
    } else {
        $sql = "UPDATE Clinica
                SET 
                    cl_cuit = :cl_cuit,
                    cl_razon_social = :cl_razon_social,
                    cl_nombre = :cl_nombre,
                    cl_codigo_postal = :cl_codigo_postal,
                    cl_provincia = :cl_provincia,
                    cl_ciudad = :cl_ciudad,
                    cl_calle = :cl_calle,
                    cl_numero_calle = :cl_numero_calle
                WHERE
                    cl_id = :cl_id;";
        try {
            $sentencia = $connection->prepare($sql);
            $sentencia->bindParam(':cl_id', $cl_id, PDO::PARAM_INT);
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    $sentencia->bindParam(':cl_cuit', $cl_cuit, PDO::PARAM_STR,50);
    $sentencia->bindParam(':cl_razon_social', $cl_razon_social, PDO::PARAM_STR,50);
    $sentencia->bindParam(':cl_nombre', $cl_nombre, PDO::PARAM_STR,50);
    $sentencia->bindParam(':cl_codigo_postal', $cl_codigo_postal, PDO::PARAM_STR,10);
    $sentencia->bindParam(':cl_provincia', $cl_provincia, PDO::PARAM_STR,50);
    $sentencia->bindParam(':cl_ciudad', $cl_ciudad, PDO::PARAM_STR,50);
    $sentencia->bindParam(':cl_calle', $cl_calle, PDO::PARAM_STR,50);
    $sentencia->bindParam(':cl_numero_calle', $cl_numero_calle, PDO::PARAM_INT);

    try {
        $sentencia->execute();
        header("location:../");
        exit;
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
} else {
    header("location:../");
    exit;
}