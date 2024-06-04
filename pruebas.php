<?php


include "class/conexion.php";

$conexion = new conexion();

$sql = "INSERT INTO
            MedicoEspecialidad (m_id, e_id)
        VALUES
            (1, 2)";

echo $conexion->ejecutar($sql);
