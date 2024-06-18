CREATE TABLE
    Clinica (
        cl_id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
        cl_cuit VARCHAR(16) NOT NULL UNIQUE,
        cl_razon_social VARCHAR(50) NOT NULL UNIQUE,
        cl_nombre VARCHAR(50) NOT NULL,
        cl_codigo_postal VARCHAR(8) NOT NULL,
        cl_provincia VARCHAR(50) NOT NULL,
        cl_ciudad VARCHAR(50) NOT NULL,
        cl_calle VARCHAR(50) NOT NULL,
        cl_numero_calle INT NOT NULL
    );

DROP TABLE Clinica;