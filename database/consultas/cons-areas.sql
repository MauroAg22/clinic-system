INSERT INTO
    Area (
        a_codigo,
        a_nombre,
        a_descripcion
    )
VALUES (
        'FRH101',
        'Cardiología',
        'Diagnóstico y tratamiento de enfermedades del corazón y sistema circulatorio'
    );

INSERT INTO
    Area (
        a_codigo,
        a_nombre,
        a_descripcion
    )
VALUES (
        'LEG543',
        'Pediatría',
        'Atención médica integral para niños y adolescentes'
    );

INSERT INTO
    Area (
        a_codigo,
        a_nombre,
        a_descripcion
    )
VALUES (
        'DDP540',
        'Neurología',
        'Diagnóstico y tratamiento de trastornos del sistema nervioso'
    );

INSERT INTO
    Area (
        a_codigo,
        a_nombre,
        a_descripcion
    )
VALUES (
        'TAA055',
        'Oncología',
        'Diagnóstico y tratamiento de diferentes tipos de cáncer'
    );

select count(*)
from
    Area as a
    join ClinicaAreaMedico as cam on a.a_id = cam.a_id
where
    cam.cl_id = 1;