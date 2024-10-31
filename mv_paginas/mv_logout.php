<?php
session_start();
session_unset();
session_destroy();

header("Location: /mv_index.php");
exit();
?>