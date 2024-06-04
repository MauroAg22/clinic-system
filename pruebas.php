<?php


include "lib/conexion.php";

$sql = "SELECT * FROM Medico";

print_r(consultar($sql));

