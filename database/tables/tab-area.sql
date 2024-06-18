CREATE TABLE
    Area (
        a_id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
        a_codigo VARCHAR(50) NOT NULL UNIQUE,
        a_nombre VARCHAR(50) NOT NULL UNIQUE,
        a_descripcion TEXT
    );

DROP TABLE Area;