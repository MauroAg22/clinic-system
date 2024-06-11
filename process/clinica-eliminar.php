<?php 

if ($_POST) {
    include "../lib/connection.php";

    $cl_id = $_POST["eliminar"];

    connect();

    // Acá borramos las consultas que se hicieron los pacientes en la clínica
    $sql1 = "DELETE FROM Consulta
            WHERE
                cam_id IN (
                    SELECT
                        cam_id
                    FROM
                        ClinicaAreaMedico
                    WHERE
                        cl_id = :cl_id
                );";

    $sentencia = $connection->prepare($sql1);
    $sentencia->bindParam(':cl_id', $cl_id, PDO::PARAM_INT);
    try {
        $sentencia->execute();
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }

    // Acá borramos las areas de la clínica y sus médicos que trabajan
    $sql2 = "DELETE FROM 
                ClinicaAreaMedico
            WHERE
                cl_id = :cl_id;";

    $sentencia = $connection->prepare($sql2);
    $sentencia->bindParam(':cl_id', $cl_id, PDO::PARAM_INT);
    try {
        $sentencia->execute();
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }

    // Acá borramos los teléfonos de las áreas
    $sql3 = "DELETE FROM 
                TelAreaClinica
            WHERE
                cl_id = :cl_id;";

    $sentencia = $connection->prepare($sql3);
    $sentencia->bindParam(':cl_id', $cl_id, PDO::PARAM_INT);
    try {
        $sentencia->execute();
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }

    // Acá borramos la clínica
    $sql4 = "DELETE FROM clinica 
            WHERE cl_id = :cl_id";

    $sentencia = $connection->prepare($sql4);
    $sentencia->bindParam(':cl_id', $cl_id, PDO::PARAM_INT);
    try {
        $sentencia->execute();
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }

    $lastInsertId = $connection->lastInsertId();

    header("location:../");
    exit;
} else {
    header("location:../");
    exit;
}