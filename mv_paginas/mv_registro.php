<?php
$titulo = "Registrarse";
include_once "../mv_include/mv_head.php";

session_start();

?>

<body>
    <?php

    include_once "../mv_include/mv_navbar.php";

    if (isset($_POST["username"]) && isset($_POST["password"])) {
        include_once "../mv_include/mv_basedatos.php";
        $pdo = mv_getConexionBaseDatos();

        $usuario = $_POST["username"];
        $sql = "SELECT 1 FROM usuarios WHERE username = :username";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(["username" => $usuario]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($result) {
            echo "<script>alert('El usuario ya existe')</script>";

        } else {
            $clave = password_hash($_POST["password"], PASSWORD_DEFAULT);
            $sql = "INSERT INTO usuarios(username, password) VALUES (:username, :password)";
            $stmt = $pdo->prepare($sql);
            $stmt->execute(["username" => $usuario, "password" => $clave]);

            $_SESSION["username"] = $usuario;
            header("Location: /mv_index.php");
            exit();
        }
    }

    ?>

    <main>
        <form method="POST" action="mv_registro.php" class="formulario-sesion">
            <h1>Registrarse</h1>
            <div class="campo">
                <label for="username">Nombre de Usuario</label>
                <input type="text" id="username" name="username" placeholder="Nombre de Usuario" required />
            </div>
            <div class="campo">
                <label for="username">Contraseña</label>
                <input type="password" id="password" name="password" placeholder="******" required />
            </div>
            <button type="submit" class="boton-sesion">Registrarse</button>
        </form>
    </main>
</body>