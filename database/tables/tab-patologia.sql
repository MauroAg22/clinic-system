CREATE TABLE
    Patologia (
        pat_id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
        pat_nombre VARCHAR(50) NOT NULL UNIQUE
    );

DROP TABLE Patologia;