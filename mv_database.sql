CREATE TABLE IF NOT EXISTS usuarios (
    id_usuario INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL
);

CREATE TABLE IF NOT EXISTS posts (
    id_post INT AUTO_INCREMENT PRIMARY KEY,
    titulo VARCHAR(255),
    fecha DATE DEFAULT NOW(),
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
("Mi experiencia con php", "2024-10-30", "Lorem ipsum dolor sit amet consectetur adipisicing", "Lorem ipsum, dolor sit amet consectetur adipisicing elit. Autem rem corporis sequi odit! Ipsum rerum ex quaerat consequuntur incidunt assumenda autem consectetur, aspernatur deserunt animi voluptas quasi quisquam dignissimos aut.", 2),
("Mi opinión de Code Clean", "2024-09-18", "Lorem ipsum dolor sit amet consectetur adipisicing", "Lorem ipsum, dolor sit amet consectetur adipisicing elit. Autem rem corporis sequi odit! Ipsum rerum ex quaerat consequuntur incidunt assumenda autem consectetur, aspernatur deserunt animi voluptas quasi quisquam dignissimos aut.", 3),
("La utilidad de los Frameworks", "2023-03-20", "Lorem ipsum dolor sit amet consectetur adipisicing", "Lorem ipsum, dolor sit amet consectetur adipisicing elit. Autem rem corporis sequi odit! Ipsum rerum ex quaerat consequuntur incidunt assumenda autem consectetur, aspernatur deserunt animi voluptas quasi quisquam dignissimos aut.", 2)
;


INSERT INTO comentarios(id_usuario, id_post, contenido) VALUES 
(NULL, 1, "Fabuloso"), 
(2, 1, "Fabuloso");
