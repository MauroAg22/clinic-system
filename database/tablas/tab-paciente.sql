CREATE TABLE
    Paciente (
        pac_id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
        pac_dni INT NOT NULL UNIQUE,
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

DROP TABLE Paciente;