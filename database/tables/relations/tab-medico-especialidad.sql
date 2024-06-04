create table
    MedicoEspecialidad (
        me_id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
        m_id INT NOT NULL,
        e_id INT NOT NULL,
        UNIQUE (m_id, e_id),
        FOREIGN KEY (m_id) REFERENCES Medico (m_id),
        FOREIGN KEY (e_id) REFERENCES especialidad (e_id)
    );

DROP TABLE MedicoEspecialidad;