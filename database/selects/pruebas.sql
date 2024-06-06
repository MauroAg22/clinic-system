-- Muestra las patologías del paciente id = 4
SELECT pac.pac_nombre, pac.pac_apellido, pat.pat_nombre
FROM pacientepatologia AS pp
JOIN patologia AS pat ON pat.pat_id = pp.pat_id
JOIN paciente AS pac ON pac.pac_id = pp.pac_id
WHERE pac.pac_id = 4;

-- Cuenta las patologías del paciente id = 4
SELECT COUNT(*) AS cant_patologias
FROM pacientepatologia AS pp
JOIN patologia AS pat ON pat.pat_id = pp.pat_id
WHERE pp.pac_id = 4;

-- Area y teléfono de "Clínica Salud Total"
SELECT c.cl_nombre, a.a_nombre, tac.tac_tel
FROM TelAreaClinica AS tac
JOIN area AS a ON a.a_id = tac.a_id
JOIN Clinica AS c ON c.cl_id = tac.cl_id
WHERE c.cl_nombre = 'Clínica Salud Total';

-- Muestra las especialidades del médico id = 1
SELECT m.m_nombre AS NOMBRE, m.m_apellido AS APELLIDO, e.e_nombre AS ESPECIALIDAD
FROM medicoespecialidad AS me
JOIN medico AS m ON me.m_id = m.m_id
JOIN especialidad AS e ON me.e_id = e.e_id
WHERE m.m_id = 1
ORDER BY me.me_id

SELECT cl_nombre, cl_cuit
FROM clinica
ORDER BY cl_nombre;