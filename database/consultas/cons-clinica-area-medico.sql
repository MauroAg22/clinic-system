-- Asignar área 1 a clínica 1
INSERT INTO ClinicaAreaMedico (cl_id, a_id, m_id) 
VALUES (1, 1, 1);

INSERT INTO ClinicaAreaMedico (cl_id, a_id, m_id) 
VALUES (1, 2, 1);

INSERT INTO ClinicaAreaMedico (cl_id, a_id, m_id) 
VALUES (2, 1, 1);

INSERT INTO ClinicaAreaMedico (cl_id, a_id, m_id) 
VALUES (2, 3, 2);

INSERT INTO ClinicaAreaMedico (cl_id, a_id, m_id) 
VALUES (3, 3, 3);

INSERT INTO ClinicaAreaMedico (cl_id, a_id, m_id) 
VALUES (3, 4, 3);


SELECT *
FROM ClinicaAreaMedico;

-- Uniones de estilo antiguo
select c.cl_nombre, a.a_nombre
from Area as a, ClinicaAreaMedico as cma, Clinica as c
where a.a_id = cma.a_id and c.cl_id = cma.cl_id and cma.cl_id = 1;

-- Cláusulas ANSI-Standard Join
select *
from Area as a
join ClinicaAreaMedico as cma on a.a_id = cma.a_id
join Clinica as c on cma.cl_id = c.cl_id
where cma.cl_id = 1;