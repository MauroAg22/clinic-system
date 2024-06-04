CREATE TABLE
    PacientePatologia (
        pp_id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
        pac_id INT NOT NULL,
        pat_id INT NOT NULL,
        UNIQUE (pac_id, pat_id),
        FOREIGN KEY (pac_id) REFERENCES paciente (pac_id),
        FOREIGN KEY (pat_id) REFERENCES patologia (pat_id)
    );

DROP TABLE PacientePatologia;