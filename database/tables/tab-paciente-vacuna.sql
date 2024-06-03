CREATE TABLE
    PacienteVacuna (
        pv_id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
        pac_id INT NOT NULL,
        v_id INT NOT NULL,
        UNIQUE (pac_id, v_id),
        FOREIGN KEY (pac_id) REFERENCES paciente (pac_id),
        FOREIGN KEY (v_id) REFERENCES vacuna (v_id)
    );
    
DROP TABLE PacienteVacuna;