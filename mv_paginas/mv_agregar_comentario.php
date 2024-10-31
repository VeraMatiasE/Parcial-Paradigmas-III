<?php

session_start();

$id = $_GET["id_post"];
$nombre_usuario = $_SESSION["username"] ?? null;
$contenido = $_POST["contenido"];

include_once "../mv_include/mv_basedatos.php";
$pdo = mv_getConexionBaseDatos();

$id_usuario = null;
if ($nombre_usuario) {
    $sql = "SELECT id_usuario FROM usuarios WHERE username = :username";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(["username" => $nombre_usuario]);
    $usuario = $stmt->fetch(PDO::FETCH_ASSOC);
    $id_usuario = $usuario["id_usuario"] ?? null;
}

$sql = $id_usuario
    ? "INSERT INTO comentarios(id_post, id_usuario, contenido) VALUES (:id, :id_usuario, :contenido)"
    : "INSERT INTO comentarios(id_post, contenido) VALUES (:id, :contenido)";


$params = $id_usuario
    ? ["id" => $id, "id_usuario" => $id_usuario, "contenido" => $contenido]
    : ["id" => $id, "contenido" => $contenido];

$stmt = $pdo->prepare($sql);
$stmt->execute($params);

$response = [
    'nombre_usuario' => $nombre_usuario ?: "Anónimo",
    'contenido' => $contenido,
    'fecha' => date("Y-m-d")
];

header('Content-Type: application/json');
echo json_encode($response);

?>