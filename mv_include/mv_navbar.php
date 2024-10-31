<header>
    <nav>
        <ul>
            <li><a href="/mv_index.php">Inicio</a></li>
            <?php if (!isset($_SESSION['username'])): ?>
                <li><a href="/mv_paginas/mv_registro.php">Registrarse</a></li>
                <li><a href="/mv_paginas/mv_login.php">Iniciar Sesión</a></li>
            <?php else: ?>
                <li><a href="/mv_paginas/mv_logout.php">Cerrar Sesión</a></li>
            <?php endif; ?>
        </ul>
    </nav>
</header>