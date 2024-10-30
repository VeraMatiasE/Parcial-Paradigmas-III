<?php

$titulo = "Blog";
include_once "mv_include/mv_head.php";

session_start();

?>

<body>
    <?php
    include_once "mv_include/mv_navbar.php";
    ?>

    <main>
        <section class="lista-publicaciones">
            <h2>Listado de Publicaciones</a></h2>
            <?php
            include_once "mv_include/mv_basedatos.php";
            $pdo = mv_getConexionBaseDatos();
            $sql = "SELECT id_post,titulo, fecha, descripcion, id_usuario FROM posts";
            $pdo = mv_getConexionBaseDatos();
            $stmt = $pdo->prepare($sql);
            $stmt->execute();
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
            foreach ($results as $index => $result) {
                if ($index != 0) {
                    echo "<hr>";
                }
                ?>
                <div class="publicacion">
                    <a href="mv_paginas/mv_publicacion.php?id=<?php echo $result["id_post"] ?>">
                        <h3>Mi experiencia con php</h3>
                        <p>30/10/2024</p>
                        <p>Este es un blog</p>
                    </a>
                </div>
                <?php
            }
            ?>
        </section>

    </main>
</body>

</html>