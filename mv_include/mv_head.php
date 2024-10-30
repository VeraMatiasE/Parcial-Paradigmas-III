<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo isset($titulo) ? $titulo : "Docuemnto" ?></title>
    <script src="https://code.jquery.com/jquery-3.7.1.js"
        integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <link href="/mv_estilos/mv_estilos.css" rel="stylesheet">
    <?php
    if (isset($script)) {
        echo "<script src='/mv_js/$script'></script>";
    }
    ?>
</head>