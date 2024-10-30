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
        $sql = "SELECT username, password FROM usuarios WHERE username = :username";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(["username" => $usuario]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$result) {
            echo "<script>alert('Credenciales Incorrectas')</script>";

        } else {
            $clave = $_POST["password"];

            if (password_verify($clave, $result["password"])) {
                //$_SESSION["username"] = $usuario;
                //header("Location: /mv_index.php");
                //exit();
    
            } else {
                echo "<script>alert('Credenciales Incorrectas')</script>";
            }
        }
    }

    ?>

    <main>
        <form method="POST" action="mv_login.php" class="formulario-sesion">
            <h1>Iniciar Sesión</h1>
            <div class="campo">
                <label for="username">Nombre de Usuario</label>
                <input type="text" placeholder="Nombre de Usuario" name="username" />
            </div>
            <div class="campo">
                <label for="username">Contraseña</label>
                <input type="password" placeholder="......" name="password" />
            </div>
            <input type="submit" value="Ingresar" class="boton-sesion" />
        </form>
    </main>
</body>