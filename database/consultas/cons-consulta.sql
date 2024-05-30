INSERT INTO 
    Consulta (
        co_fecha,
        co_sintomas,
        co_valoracion,
        cam_id,
        pac_id
    )
VALUES
    (
        '2024-05-28',
        'Mucha tos y picazón de garganta',
        'Garganta con infección. Roja y muy inflamada.',
        2,
        2
    )

SELECT m.m_nombre, m.m_apellido, pac.pac_nombre, pac.pac_apellido, c.co_sintomas, c.co_valoracion, c.co_fecha
FROM Consulta AS c
JOIN ClinicaAreaMedico AS cam ON c.cam_id = cam.cam_id
JOIN Paciente AS pac ON c.pac_id = pac.pac_id
JOIN Medico AS m ON cam.m_id = m.m_id

SELECT *
FROM Consulta