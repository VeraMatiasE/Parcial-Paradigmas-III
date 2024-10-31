<?php

if (!isset($_GET["id"])) {
    echo "<script>alert('No existe el post')</script>";
    header("Location: /mv_index.php");
}

include_once "../mv_include/mv_basedatos.php";
$pdo = mv_getConexionBaseDatos();
$sql = "SELECT titulo, fecha, descripcion, contenido, u.username FROM posts AS p 
            LEFT JOIN usuarios AS u ON u.id_usuario = p.id_usuario
            WHERE id_post = :id";
$id = $_GET["id"];
$pdo = mv_getConexionBaseDatos();
$stmt = $pdo->prepare($sql);
$stmt->execute(["id" => $id]);
$result = $stmt->fetch(PDO::FETCH_ASSOC);

$titulo = "Publicacion: $result[titulo]";
$script = "mv_comentario.js";
include_once "../mv_include/mv_head.php";
session_start();

?>

<body>
    <?php
    include_once "../mv_include/mv_navbar.php";
    ?>

    <main>
        <section class="contenido-publicacion">
            <h1><?php echo htmlspecialchars($result["titulo"]) ?></h1>
            <div class="propiedades">
                <p><?php echo htmlspecialchars($result["fecha"]) ?></p>
                <p><?php echo htmlspecialchars($result["username"]) ?></p>
            </div>
            <p><?php echo htmlspecialchars($result["contenido"]) ?></p>
        </section>
        <section class="lista-comentarios">
            <h3>Comentarios</h3>
            <?php

            $sql = "SELECT contenido, c.fecha, u.username FROM comentarios AS c
                LEFT JOIN usuarios AS u ON u.id_usuario = c.id_usuario
                WHERE id_post = :id";
            $id = $_GET["id"];
            $pdo = mv_getConexionBaseDatos();
            $stmt = $pdo->prepare($sql);
            $stmt->execute(["id" => $id]);
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

            foreach ($results as $index => $result) {
                if ($index != 0) {
                    echo "<hr>";
                }

                ?>
                <div class="comentario">
                    <div class="datos-comentario">
                        <p>Usuario
                            <?php echo !isset($result["username"]) ? "Anónimo" : htmlspecialchars($result["username"]) ?>
                        </p>
                        <?php echo $result["fecha"]; ?>
                        <p>Fecha <?php echo htmlspecialchars($result["fecha"]) ?></p>
                    </div>
                    <p><?php echo htmlspecialchars($result["contenido"]) ?></p>
                    </a>
                </div>
                <?php
            }

            ?>
        </section>
        <div id="insertar-comentario">
            <textarea cols="10" rows="10"></textarea>
            <button>Agregar Comentario</button>
        </div>
    </main>

</body>
