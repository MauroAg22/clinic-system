CREATE TABLE
    ClinicaAreaMedico (
        cam_id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
        cl_id INT NOT NULL,
        a_id INT NOT NULL,
        m_id INT NOT NULL,
        FOREIGN KEY (cl_id) REFERENCES Clinica (cl_id),
        FOREIGN KEY (a_id) REFERENCES Area (a_id),
        FOREIGN KEY (m_id) REFERENCES Medico (m_id),
        UNIQUE (cl_id, a_id, m_id)
    );

DROP TABLE ClinicaAreaMedico;