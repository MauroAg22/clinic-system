<?php

$server = "localhost";
$user = "root";
$password = "";
$dbname = "clinica";

function abrirBase_pdo()
{
    global $dbname, $servidor, $user, $password;
    $opciones = array(
        PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8', PDO::ATTR_PERSISTENT => false
    );

    $gbd = new PDO("mysql:host=$servidor;dbname=$dbname", $user, $password, $opciones);
    return ($gbd);
}

if (!$pdo = abrirBase_pdo())
    echo "No me pude conectar";
