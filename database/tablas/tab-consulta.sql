CREATE TABLE
    Consulta (
        co_id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
        co_fecha DATE NOT NULL,
        co_sintomas TEXT NOT NULL,
        co_valoracion TEXT NOT NULL,
        cam_id INT NOT NULL,
        pac_id INT NOT NULL,
        FOREIGN KEY (cam_id) REFERENCES ClinicaAreaMedico (cam_id),
        FOREIGN KEY (pac_id) REFERENCES Paciente (pac_id)
    );

    DROP TABLE Consulta;