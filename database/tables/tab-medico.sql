CREATE TABLE
    Medico (
        m_id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
        m_dni VARCHAR(10) NOT NULL UNIQUE,
        m_nombre VARCHAR(50) NOT NULL,
        m_apellido VARCHAR(50) NOT NULL,
        m_email VARCHAR(50) NOT NULL,
        m_tel VARCHAR(24) NOT NULL
    );

DROP TABLE Medico;