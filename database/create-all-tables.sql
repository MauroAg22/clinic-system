-- Crear base de datos
-- CREATE  DATABASE `clinica`
-- CHARACTER SET utf8mb4
-- COLLATE utf8mb4_unicode_ci;

-- Seleccionar la base de datos creada
-- USE clinica;

CREATE TABLE Clinica (
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

CREATE TABLE Area (
        a_id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
        a_codigo VARCHAR(50) NOT NULL UNIQUE,
        a_nombre VARCHAR(50) NOT NULL UNIQUE,
        a_descripcion TEXT
    );

CREATE TABLE Medico (
        m_id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
        m_dni VARCHAR(10) NOT NULL UNIQUE,
        m_nombre VARCHAR(50) NOT NULL,
        m_apellido VARCHAR(50) NOT NULL,
        m_email VARCHAR(50) NOT NULL,
        m_tel VARCHAR(24) NOT NULL
    );

CREATE TABLE ClinicaAreaMedico (
        cam_id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
        cl_id INT NOT NULL,
        a_id INT NOT NULL,
        m_id INT NOT NULL,
        FOREIGN KEY (cl_id) REFERENCES Clinica (cl_id),
        FOREIGN KEY (a_id) REFERENCES Area (a_id),
        FOREIGN KEY (m_id) REFERENCES Medico (m_id),
        UNIQUE (cl_id, a_id, m_id)
    );

CREATE TABLE TelAreaClinica (
        tac_id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
        tac_tel VARCHAR(50) NOT NULL UNIQUE,
        cl_id INT NOT NULL,
        a_id INT NOT NULL,
        FOREIGN KEY (cl_id) REFERENCES Clinica (cl_id),
        FOREIGN KEY (a_id) REFERENCES Area (a_id),
        UNIQUE (cl_id, a_id)
    );

CREATE TABLE Especialidad (
        e_id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
        e_nombre VARCHAR(50) NOT NULL UNIQUE
    );

CREATE TABLE MedicoEspecialidad (
        me_id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
        m_id INT NOT NULL,
        e_id INT NOT NULL,
        UNIQUE (m_id, e_id),
        FOREIGN KEY (m_id) REFERENCES Medico (m_id),
        FOREIGN KEY (e_id) REFERENCES Especialidad (e_id)
    );

CREATE TABLE Paciente (
        pac_id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
        pac_dni VARCHAR(10) NOT NULL UNIQUE,
        pac_nombre VARCHAR(50) NOT NULL,
        pac_apellido VARCHAR(50) NOT NULL,
        pac_fecha_nac DATE NOT NULL,
        pac_tel VARCHAR(50) NULL,
        pac_email VARCHAR(50) NULL,
        pac_ocupacion VARCHAR(50) NULL,
        pac_estado_civil VARCHAR(50) NOT NULL,
        pac_genero VARCHAR(50) NOT NULL,
        CHECK (
            pac_estado_civil IN (
                'Soltero/a',
                'Casado/a',
                'Separado/a',
                'Divorciado/a',
                'Viudo/a'
            )
        ),
        CHECK (
            pac_genero IN (
                'Masculino',
                'Femenino'
            )
        )
    );

CREATE TABLE Patologia (
        pat_id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
        pat_nombre VARCHAR(50) NOT NULL UNIQUE
    );

CREATE TABLE PacientePatologia (
        pp_id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
        pac_id INT NOT NULL,
        pat_id INT NOT NULL,
        UNIQUE (pac_id, pat_id),
        FOREIGN KEY (pac_id) REFERENCES Paciente (pac_id),
        FOREIGN KEY (pat_id) REFERENCES Patologia (pat_id)
    );

CREATE TABLE Vacuna (
        v_id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
        v_nombre VARCHAR(50) NOT NULL UNIQUE
    );

CREATE TABLE PacienteVacuna (
        pv_id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
        pac_id INT NOT NULL,
        v_id INT NOT NULL,
        UNIQUE (pac_id, v_id),
        FOREIGN KEY (pac_id) REFERENCES Paciente (pac_id),
        FOREIGN KEY (v_id) REFERENCES Vacuna (v_id)
    );

CREATE TABLE Consulta (
        co_id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
        co_fecha DATE NOT NULL,
        co_sintomas TEXT NOT NULL,
        co_valoracion TEXT NOT NULL,
        cam_id INT NOT NULL,
        pac_id INT NOT NULL,
        FOREIGN KEY (cam_id) REFERENCES ClinicaAreaMedico (cam_id),
        FOREIGN KEY (pac_id) REFERENCES Paciente (pac_id)
    );


-- Eliminar base de datos
-- DROP SCHEMA clinica;