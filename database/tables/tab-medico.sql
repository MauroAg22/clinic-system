create table
    Medico (
        m_id int not null primary key auto_increment,
        m_dni int not null unique,
        m_nombre varchar(50) not null,
        m_apellido varchar(50) not null,
        m_email varchar(50) not null,
        m_tel varchar(50) not null
    );

DROP TABLE Medico;