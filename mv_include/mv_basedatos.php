<?php

function mv_getConexionBaseDatos()
{
    $host = "localhost";
    $db = "mv_parcial_plp3";

    $dsn = "mysql:host=$host;dbname=$db";
    $usuario = "root";
    $clave = "";

    try {
        $pdo = new PDO($dsn, $usuario, $clave);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        exit();
    }

    return $pdo;
}

?>