INSERT INTO
    TelAreaClinica (tac_tel, cl_id, a_id)
VALUES
    (
        '2657-554710',
        1,
        1
    ),
    (
        '2657-859418',
        1,
        2
    ),
    (
        '2657-305569',
        2,
        3
    ),
    (
        '2657415099',
        3,
        1
    );

SELECT c.cl_nombre, a.a_nombre, tac.tac_tel
FROM TelAreaClinica AS tac
JOIN area AS a ON a.a_id = tac.a_id
JOIN Clinica AS c ON c.cl_id = tac.cl_id
WHERE c.cl_nombre = 'Clínica Salud Total';