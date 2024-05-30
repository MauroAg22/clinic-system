INSERT INTO
    MedicoEspecialidad (m_id, e_id)
VALUES
    (2, 3);

INSERT INTO
    MedicoEspecialidad (m_id, e_id)
VALUES
    (1, 1);

INSERT INTO
    MedicoEspecialidad (m_id, e_id)
VALUES
    (5, 1);

SELECT
    m.m_nombre,
    m.m_apellido,
    e.e_nombre
FROM
    MedicoEspecialidad AS me
    JOIN Especialidad AS e ON me.e_id = e.e_id
    JOIN Medico AS m ON me.m_id = m.m_id;