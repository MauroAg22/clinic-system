create table
    Clinica (
        cl_id int not null primary key auto_increment,
        cl_cuit varchar(50) not null unique,
        cl_razon_social varchar(50) not null unique,
        cl_nombre varchar(50) not null,
        cl_codigo_postal varchar(10) not null,
        cl_provincia varchar(50) not null,
        cl_ciudad varchar(50) not null,
        cl_calle varchar(50) not null,
        cl_numero_calle int not null
    );