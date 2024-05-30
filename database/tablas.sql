

create table
    Vacuna (
        v_id int not null primary key,
        v_nombre varchar(50) not null
    );

create table
    Patologia (
        pat_id int not null primary key,
        pat_nombre varchar(50) not null
    );

create table
    Especialidad (
        e_id int not null primary key,
        e_nombre varchar(50) not null
    );

create table
    Internacion (
        i_id int not null primary key,
        i_fecha_ing date not null,
        i_fecha_salida date not null,
        i_alta_medica varchar(560) not null,
        i_diagnistico varchar(560) not null,
        i_tipo varchar(50) not null,
        i_razon varchar(50) not null,
        pac_dni int not null,
        m_dni int not null,
        ca_id int not null,
        foreign key (pac_dni) references paciente (pac_dni),
        foreign key (m_dni) references medico (m_dni),
        foreign key (ca_id) references cama (ca_id)
    );


create table
    Habitacion (
        h_nro_habitacion int not null primary key,
        h_banio_privado bool not null,
        h_acondicionador bool not null,
        h_calefaccion bool not null,
        h_television bool not null,
        h_internet bool not null,
        a_codigo varchar(50) not null,
        foreign key (a_codigo) references area (a_codigo)
    );

create table
    Cama (
        ca_id int not null primary key,
        ca_nro_cama int not null,
        ca_tipo_cama varchar(50) not null,
        ca_ocupada bool not null,
        h_nro_habitacion int not null,
        unique (ca_nro_cama, h_nro_habitacion),
        foreign key (h_nro_habitacion) references habitacion (h_nro_habitacion)
    );

create table
    Posee (
        m_dni int not null,
        e_id int not null,
        primary key (m_dni, e_id),
        foreign key (m_dni) references medico (m_dni),
        foreign key (e_id) references especialidad (e_id)
    );

create table
    tiene_vacunas (
        pac_dni int not null,
        v_id int not null,
        primary key (pac_dni, v_id),
        foreign key (pac_dni) references paciente (pac_dni),
        foreign key (v_id) references vacuna (v_id)
    );

create table
    tiene_patologia (
        pac_dni int not null,
        pat_id int not null,
        primary key (pac_dni, pat_id),
        foreign key (pac_dni) references paciente (pac_dni),
        foreign key (pat_id) references patologia (pat_id)
    );
