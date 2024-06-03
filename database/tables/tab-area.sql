create table
    Area (
        a_id int not null primary key auto_increment,
        a_codigo varchar(50) not null unique,
        a_nombre varchar(50) not null unique,
        a_descripcion TEXT
    );

drop table Area;