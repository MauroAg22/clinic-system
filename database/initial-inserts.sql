-- Seleccionar la base de datos creada
-- USE clinica;

INSERT INTO
    Clinica (
        cl_cuit,
        cl_razon_social,
        cl_nombre,
        cl_codigo_postal,
        cl_provincia,
        cl_ciudad,
        cl_calle,
        cl_numero_calle
    )
VALUES
    (
        '20-12345678-9',
        'Clínica Salud Total S.A.',
        'Clínica Salud Total',
        '5730',
        'San Luis',
        'Villa Mercedes',
        'Av. 25 de Mayo',
        1354
    ),
    (
        '30-87654321-0',
        'Centro Médico Integral S.R.L.',
        'Centro Médico Integral',
        '2000',
        'Santa Fe',
        'Rosario',
        'Av. Pellegrini',
        1183
    ),
    (
        '27-11223344-5',
        'Hospital de la Vida Ltda.',
        'Hospital de la Vida',
        '1043',
        'Buenos Aires',
        'Buenos Aires',
        'Av. 9 de Julio',
        2456
    );

INSERT INTO
    Area (a_codigo, a_nombre, a_descripcion)
VALUES
    (
        'FRH101',
        'Cardiología',
        'Diagnóstico y tratamiento de enfermedades del corazón y sistema circulatorio'
    ),
    (
        'LEG543',
        'Pediatría',
        'Atención médica integral para niños y adolescentes'
    ),
    (
        'DDP540',
        'Neurología',
        'Diagnóstico y tratamiento de trastornos del sistema nervioso'
    ),
    (
        'TAA055',
        'Oncología',
        'Diagnóstico y tratamiento de diferentes tipos de cáncer'
    );

INSERT INTO
    Medico (m_dni, m_nombre, m_apellido, m_email, m_tel)
VALUES
    (
        '18640789',
        'Juan Carlos',
        'Gómez',
        'juan.c.gomez@gmail.com',
        '266-4546080'
    ),
    (
        '23480996',
        'María Luz',
        'López',
        'maria.l.lopez@gmail.com',
        '2657-305480'
    ),
    (
        '34480060',
        'Fernando Ariel',
        'Martínez',
        'carlos.a.martinez@gmail.com',
        '2657-147749'
    ),
    (
        '20151582',
        'Ana Paula',
        'Rodríguez',
        'ana.p.rodriguez@gmail.com',
        '2657-330590'
    ),
    (
        '37520770',
        'Joaquín Esteban',
        'Sánchez',
        'pedro.e.sanchez@gmail.com',
        '2657-103178'
    ),
    (
        '19011963',
        'Laura Jazmín',
        'García',
        'laura.j.garcia@gmail.com',
        '266-4528870'
    ),
    (
        '25502887',
        'Sofía Nicole',
        'Pérez',
        'sofia.perez@gmail.com',
        '266-4789023'
    ),
    (
        '31234567',
        'Hugo Ariel',
        'Ramírez Gutierrez',
        'hugo.ramirez@gmail.com',
        '2657-309876'
    ),
    (
        '21234567',
        'Camila Beatriz',
        'Torres',
        'camila.torres@gmail.com',
        '2657-256788'
    ),
    (
        '33123456',
        'Mateo Emanuel',
        'Sosa',
        'mateo.sosa@gmail.com',
        '266-4876543'
    ),
    (
        '18123456',
        'Paula Valentina',
        'Silva Diaz',
        'valentina.silva@gmail.com',
        '2657-345670'
    ),
    (
        '22123456',
        'Lucas Andrés',
        'Gómez',
        'lucas.gomez@gmail.com',
        '2657-109876'
    ),
    (
        '29123456',
        'Martina Lourdes',
        'Molina',
        'martina.molina@gmail.com',
        '266-4678901'
    ),
    (
        '27123456',
        'Diego Carlos',
        'Suárez',
        'diego.suarez@gmail.com',
        '2657-298765'
    ),
    (
        '30123456',
        'Emilia Jazmín',
        'Cabrera',
        'emilia.cabrera@gmail.com',
        '2657-234567'
    ),
    (
        '24123456',
        'Santiago Agustín',
        'Castro Moreno',
        'santiago.castro@gmail.com',
        '266-4578902'
    );

-- Relación de médicos, areas y clínicas
INSERT INTO
    ClinicaAreaMedico (cl_id, a_id, m_id)
VALUES
    (1, 1, 1),
    (1, 2, 2),
    (1, 4, 3),
    (2, 3, 4),
    (3, 3, 5),
    (3, 4, 6),
    (1, 3, 7),
    (1, 3, 8),
    (1, 2, 9),
    (2, 1, 10),
    (2, 2, 11),
    (2, 4, 12),
    (3, 1, 13),
    (3, 1, 14),
    (3, 1, 15),
    (3, 2, 16);