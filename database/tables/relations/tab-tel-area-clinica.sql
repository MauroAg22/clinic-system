CREATE TABLE
    TelAreaClinica (
        tac_id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
        tac_tel VARCHAR(50) NOT NULL UNIQUE,
        cl_id INT NOT NULL,
        a_id INT NOT NULL,
        FOREIGN KEY (cl_id) REFERENCES Clinica (cl_id),
        FOREIGN KEY (a_id) REFERENCES Area (a_id),
        UNIQUE (cl_id, a_id)
    );

DROP TABLE TelAreaClinica;