create schema `clinica`;
use clinica;

create table Persona (
    pe_dni int not null primary key,
    pe_nombre varchar (50) not null,
    pe_apellido varchar (50) not null,
    pe_email varchar (50) null,
    pe_tel varchar (50) not null,
    pe_parentesco varchar (50) null
);

create table Paciente (
    pac_dni int not null primary key,
    pac_nombre varchar (50) not null,
    pac_apellido varchar (50) not null,
    pac_fecha_nac date not null,
    pac_tel varchar (50) not null,
    pac_email varchar (50) null,
    pac_ocupacion varchar (50) null,
    pac_estado_civil varchar (50) not null,
    pac_sexo varchar (50) not null,
    pe_dni int null,
    cl_cuit int not null,
    foreign key (pe_dni) references persona (pe_dni),
    foreign key (cl_cuit) references clinica (cl_cuit)
);

create table Vacuna (
    v_id int not null primary key,
    v_nombre varchar (50) not null
);

create table Patologia (
    pat_id int not null primary key,
    pat_nombre varchar (50) not null
);

create table Medico (
    m_dni int not null primary key,
    m_nombre varchar (50) not null,
    m_apellido varchar (50) not null,
    m_email varchar (50) not null,
    m_tel varchar (50) not null,
    a_codigo varchar (50) not null,
    foreign key (a_codigo) references area (a_codigo)
);

create table Especialidad (
    e_id int not null primary key,
    e_nombre varchar (50) not null
);

create table Internacion (
    i_id int not null primary key,
    i_fecha_ing date not null,
    i_fecha_salida date not null,
    i_alta_medica varchar (560) not null,
    i_diagnistico varchar (560) not null,
    i_tipo varchar (50) not null,
    i_razon varchar (50) not null,
    pac_dni int not null,
    m_dni int not null,
    ca_id int not null,
    foreign key (pac_dni) references paciente (pac_dni),
    foreign key (m_dni) references medico (m_dni),
    foreign key (ca_id) references cama (ca_id)
);

create table Consulta (
    co_id int not null primary key,
    co_fecha date not null,
    co_valoracion varchar (560) not null,
    co_sintomas varchar (50) null,
    co_razon varchar (50) not null,
    pac_dni int not null,
    m_dni int not null,
    foreign key (pac_dni) references paciente (pac_dni),
    foreign key (m_dni) references medico (m_dni)
);

create table Area (
    a_codigo varchar (50) not null primary key,
    a_nombre varchar (50) not null,
    cl_cuit int not null,
    foreign key (cl_cuit) references clinica (cl_cuit)
);
create table Clinica (
    cl_cuit int not null primary key,
    cl_nombre varchar (50) not null,
    cl_direccion varchar (50) not null,
    cl_razon_social varchar (50) not null
);

create table Habitacion (
    h_nro_habitacion int not null primary key,
    h_banio_privado bool not null,
    h_acondicionador bool not null,
    h_calefaccion bool not null,
    h_television bool not null,
    h_internet bool not null,
    a_codigo varchar (50) not null,
    foreign key (a_codigo) references area (a_codigo)
);

create table Cama (
    ca_id int not null primary key,
    ca_nro_cama int not null,
    ca_tipo_cama varchar (50) not null,
    ca_ocupada bool not null,
    h_nro_habitacion int not null,
    unique (ca_nro_cama, h_nro_habitacion),
    foreign key (h_nro_habitacion) references habitacion (h_nro_habitacion)
);

create table Posee (
    m_dni int not null,
    e_id int not null,
    primary key (m_dni, e_id),
    foreign key (m_dni) references medico (m_dni),
    foreign key (e_id) references especialidad (e_id)
);

create table tiene_vacunas (
    pac_dni int not null,
    v_id int not null,
    primary key (pac_dni, v_id),
    foreign key (pac_dni) references paciente (pac_dni),
    foreign key (v_id) references vacuna (v_id)
);

create table tiene_patologia (
    pac_dni int not null,
    pat_id int not null,
    primary key (pac_dni, pat_id),
    foreign key (pac_dni) references paciente (pac_dni),
    foreign key (pat_id) references patologia (pat_id)
);

drop schema clinica;