CREATE DATABASE IF NOT EXISTS mv_parcial_plp3;
USE mv_parcial_plp3;

CREATE TABLE IF NOT EXISTS usuarios (
    id_usuario INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL
);

CREATE TABLE IF NOT EXISTS posts (
    id_post INT AUTO_INCREMENT PRIMARY KEY,
    titulo VARCHAR(255),
    fecha DATE DEFAULT(CURDATE()),
    descripcion VARCHAR(250),
    contenido TEXT,
    id_usuario INT,
    FOREIGN KEY (id_usuario) REFERENCES usuarios(id_usuario)
);

CREATE TABLE IF NOT EXISTS comentarios (
    id_comentario INT AUTO_INCREMENT PRIMARY KEY,
    id_usuario INT DEFAULT NULL,
    id_post INT,
    contenido TEXT,
    fecha DATE,
    FOREIGN KEY (id_usuario) REFERENCES usuarios(id_usuario),
    FOREIGN KEY (id_post) REFERENCES posts(id_post)
);

INSERT INTO usuarios(username, password) VALUES
("Test","$2y$10$EOS4Mq6hwvf5QBDrcMcjou3IIyBUcRmzD5SKUuEAZ37e4CEsSppja"), -- Test 1234
("Usuario1", "$2y$10$ET7ewj5nrd6ntEVeTtAqNOnY/PMTc4INExLG1kpfTZhVOhsOJ5hPC"), -- Usuario1 aaaa
("Usuario2", "$2y$10$NIERF8Fwejm5zUZHvi7HaOoJ0iYeN9T6MGm1JsSBNoc6scdiN7IQK") -- Usuario2 0000
;

INSERT INTO posts(titulo, fecha, descripcion, contenido, id_usuario) VALUES
("Mi experiencia con php", "2024-10-30", "	Compartiendo mis aprendizajes y desafíos con PHP", "Mi viaje en el mundo de PHP ha sido interesante y, en ocasiones, desafiante. Desde escribir el primer \"Hola Mundo\" hasta comprender la importancia de organizar el código de forma modular, PHP me ha mostrado sus ventajas para el desarrollo web dinámico. A través de mis proyectos, he aprendido a manipular bases de datos, gestionar sesiones y mejorar la experiencia de usuario mediante formularios interactivos y seguros.", 2),
("Mi opinión de Code Clean", "2024-09-18", "Mis reflexiones sobre el valor de un código limpio y claro", "Leer \"Clean Code\" me ha hecho reflexionar sobre la importancia de la legibilidad en el código. Antes, no me preocupaba mucho por cómo escribía el código mientras funcionara. Pero ahora, comprendo que escribir código limpio ayuda a que el equipo entero lo entienda, evitando errores y reduciendo tiempo en el futuro. Un buen código debe ser autoexplicativo y organizado, y este libro me ayudó a mejorar en esa área.", 3),
("La utilidad de los Frameworks", "2023-03-20", "Explorando las ventajas de usar frameworks en proyectos", "Los frameworks han sido una herramienta invaluable para el desarrollo eficiente y organizado. Aunque al inicio me parecía innecesario, con el tiempo entendí que los frameworks no solo ahorran tiempo, sino que también permiten estructurar de manera sólida los proyectos. Son de gran ayuda para mantener la coherencia en el código, asegurar buenas prácticas y facilitar la colaboración en proyectos grandes.", 2),
("Por qué elegir PHP en 2024", "2024-07-15", "Razones para usar PHP en desarrollo web este año", "PHP sigue siendo una opción sólida en 2024 para el desarrollo web. La facilidad con la que se integra con bases de datos y la rápida curva de aprendizaje hacen que sea ideal para quienes inician en programación. Además, su soporte de grandes comunidades permite un desarrollo rápido y eficiente, respaldado por muchos recursos y documentación.", 1),
("Las claves para mejorar en programación", "2024-08-10", "Consejos prácticos para ser mejor programador", "La programación es una habilidad que se mejora con la práctica constante. Para ser mejor programador, es esencial estudiar algoritmos, entender estructuras de datos y participar en proyectos de código abierto. Además, la disciplina de escribir código limpio y comentado facilitará que tú y otros puedan entender y colaborar en el proyecto.", 3)
;


INSERT INTO comentarios(id_usuario, id_post, contenido, fecha) VALUES 
(NULL, 1, "Muy útil tu experiencia, gracias.", "2024-10-30"), 
(2, 1, "Gran aporte, yo también uso PHP.", "2024-10-30"),
(1, 1, "Interesante punto de vista, nunca lo había visto de esa forma.", "2024-10-30"),
(NULL, 1, "Concuerdo contigo, PHP tiene sus ventajas para principiantes.", "2024-10-30"),
(3, 1, "Aprecio tu honestidad sobre los desafíos en PHP, ¡gracias por compartir!", "2024-10-31"),
(2, 2, "Totalmente de acuerdo con tu opinión sobre el código limpio, es fundamental.", "2024-09-18"),
(NULL, 2, "Este libro cambió mi forma de escribir código también.", "2024-09-18"),
(1, 3, "Yo también creo que los frameworks son esenciales en proyectos grandes.", "2023-03-20"),
(3, 4, "PHP tiene mucho que ofrecer, especialmente con frameworks modernos.", "2024-07-15"),
(NULL, 4, "Gracias por el post, justo buscaba una opinión actualizada sobre PHP.", "2024-07-15"),
(2, 5, "Excelente artículo. La clave es la práctica constante.", "2024-08-10"),
(NULL, 5, "Muy buenos consejos, intentaré ponerlos en práctica.", "2024-08-10")
;
