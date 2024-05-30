-- Ingreso de datos
insert into
    persona (pe_dni, pe_nombre, pe_apellido, pe_email, pe_tel)
values
    (
        40319143,
        'Mauro Agustin',
        'Lucero',
        'maurolucero1997@gmail.com',
        2657281741
    );

insert into
    persona (pe_dni, pe_nombre, pe_apellido, pe_tel)
values
    (
        41221919,
        'Milagros Anahí',
        'Pedernera Diaz',
        2664851791
    );



insert into
    paciente (
        pac_dni,
        pac_nombre,
        pac_apellido,
        pac_fecha_nac,
        pac_tel,
        pac_email,
        pac_ocupacion,
        pac_estado_civil,
        pac_sexo,
        pe_dni,
        cl_cuit
    )
values
    (
        18206248,
        'Nerio Fernando',
        'Lucero',
        '1967-05-15',
        2657308269,
        null,
        'Empleado',
        'Casado',
        'Masculino',
        40319143,
        456
    );

insert into
    area
values
    ('CP32', 'Pediatría', 456);

insert into
    habitacion
values
    (1, false, false, true, false, true, 'CP32'),
    (2, true, true, true, false, false, 'CP32'),
    (3, true, true, true, true, true, 'CP32'),
    (4, true, true, true, true, true, 'CP32');

insert into
    cama
values
    (1, 1, 'nivel1', false, 1),
    (2, 2, 'nivel1', false, 1),
    (3, 1, 'nivel1', false, 3),
    (4, 2, 'nivel1', false, 3);

insert into
    cama
values
    (5, 3, 'nivel1', false, 1);

select
    *
from
    cama
where
    h_nro_habitacion = 1;

-- Consultas
select
    pac_nombre,
    pac_apellido,
    pe_nombre,
    pe_apellido
from
    paciente,
    persona
where
    paciente.pe_dni = persona.pe_dni;

select
    *
from
    paciente;

select
    *
from
    clinica c,
    paciente pa,
    persona pe
where
    c.cl_cuit = pa.cl_cuit
    and pa.pe_dni = pe.pe_dni;