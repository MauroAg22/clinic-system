create table
    MedicoEspecialidad (
        m_id INT NOT NULL,
        e_id INT NOT NULL,
        PRIMARY KEY (m_id, e_id),
        FOREIGN KEY (m_id) REFERENCES Medico (m_id),
        FOREIGN KEY (e_id) REFERENCES especialidad (e_id)
    );

DROP TABLE MedicoEspecialidad;