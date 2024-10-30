<?php

session_start();

$id = $_GET["id_post"];
$usuario = isset($_SESSION["username"]) ? $_SESSION["username"] : "NULL";
$contenido = $_POST["contenido"];

include_once "../mv_include/mv_basedatos.php";
$pdo = mv_getConexionBaseDatos();

$sql = "SELECT id_usuario FROM usuarios WHERE username = :username";
$stmt = $pdo->prepare($sql);
$stmt->execute(["username" => $usuario]);
$usuario = $stmt->fetch(PDO::FETCH_ASSOC);

$id_usuario = $usuario["id_usuario"];


if ($id_usuario) {
    $sql = "INSERT INTO comentarios(id_post, id_usuario, contenido) VALUES (:id, :id_usuario, :contenido)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(["id" => $id, "id_usuario" => $id_usuario, "contenido" => $contenido]);

    echo $usuario;
    echo $contenido;
} else {
    $sql = "INSERT INTO comentarios(id_post, contenido) VALUES (:id, :contenido)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(["id" => $id, "contenido" => $contenido]);

    echo $usuario;
    echo $contenido;
}

?>