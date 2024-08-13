<?php

include "lib/connection.php";

connect();

// ----------------------------------------------------------------------------------------------------

$sql = "SELECT cl_id, cl_nombre, cl_cuit, cl_calle, cl_numero_calle, cl_provincia, cl_ciudad
        FROM Clinica
        ORDER BY cl_nombre;";

$clinicas = consultaSimple($sql);

// ----------------------------------------------------------------------------------------------------

$sql2 = "SELECT COUNT(DISTINCT m.m_id) AS medicos
        FROM Medico AS m
        JOIN ClinicaAreaMedico as cam ON m.m_id = cam.m_id
        WHERE cam.cl_id = :cl_id";

foreach ($clinicas as $unaClinica) {
    $sentencia = $connection->prepare($sql2);
    $sentencia->bindParam(':cl_id', $unaClinica['cl_id'], PDO::PARAM_INT);
    $sentencia->execute();
    $arrayCantMedicos[$unaClinica['cl_id']] = $sentencia->fetchAll(PDO::FETCH_ASSOC)[0]['medicos'];
}

// ----------------------------------------------------------------------------------------------------

disconnect();


?>

<?php include "components/head.php" ?>

<nav class="navbar bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand" href="index.php">Clinicas</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Clínicas</h5>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
                <form action="ingresar-modificar-clinica.php" method="post">
                    <input type="hidden" name="modificar" value="-1">
                    <div class="d-grid mb-3">
                        <input class="btn btn-outline-success" type="submit" value="Agregar">
                    </div>
                </form>
                <?php if (!empty($clinicas)) { ?>
                <div class="d-grid mb-3">
                    <a class="btn btn-outline-primary" href="process/csv/descargar-clinicas-csv.php">Descargar CSV</a>
                </div>
                <?php } ?>
            </div>
        </div>
    </div>
</nav>

<main class="container-xl my-4">
    <form action="process/csv/cargar-clinicas-csv.php" method="post" enctype="multipart/form-data">
        <div class="mb-4 bg-white rounded border">
            <div class="row row-gap-3 p-3">
                <div class="col-12">
                    <h3 class="m-0">Cargar datos de clínicas (csv)</h3>
                </div>
                <div class="col-12 col-md-10">
                    <input type="file" class="form-control" name="archivo" required>
                </div>
                <div class="col-12 col-md-2">
                    <div class="d-grid">
                        <input class="btn btn-success" type="submit" value="CARGAR">
                    </div>
                </div>
            </div>
        </div>
    </form>
    <?php if (!empty($clinicas)) { ?>
        <div class="p-3 bg-white rounded border">
            <div class="table-responsive">
                <table class="table text-nowrap m-0 align-middle table-hover border-top">
                    <thead>
                        <tr>
                            <th scope="col">Nombre</th>
                            <th scope="col">CUIT</th>
                            <th scope="col">Ciudad</th>
                            <th scope="col">Dirección</th>
                            <th scope="col" class="text-center">Médicos</th>
                            <th scope="col" colspan="3" class="text-center">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($clinicas as $unaClinica) { ?>
                            <tr>
                                <td><?= $unaClinica['cl_nombre']; ?></td>
                                <td><?= $unaClinica['cl_cuit']; ?></td>
                                <td><?= $unaClinica['cl_ciudad'] . ", " . $unaClinica['cl_provincia']; ?></td>
                                <td><?= $unaClinica['cl_calle'] . ", " . $unaClinica['cl_numero_calle']; ?></td>
                                <td class="text-center"><?= $arrayCantMedicos[$unaClinica['cl_id']]; ?></td>
                                
                                <td>
                                    <form action="" method="post">
                                        <input type="hidden" name="ingresar" value="<?//= $unaClinica['cl_id'] ?>">
                                        <div class="d-grid">
                                            <input class="btn btn-sm btn-outline-secondary" type="submit" value="Ingresar" disabled>
                                        </div>
                                    </form>
                                </td>

                                <td>
                                    <form action="ingresar-modificar-clinica.php" method="post">
                                        <input type="hidden" name="modificar" value="<?= $unaClinica['cl_id'] ?>">
                                        <div class="d-grid">
                                            <input class="btn btn-sm btn-outline-dark" type="submit" value="Modificar">
                                        </div>
                                    </form>
                                </td>

                                <td>
                                    <form action="process/clinica-eliminar.php" method="post">
                                        <input type="hidden" name="eliminar" value="<?= $unaClinica['cl_id'] ?>">
                                        <div class="d-grid">
                                            <input class="btn btn-sm btn-outline-danger" type="submit" value="Eliminar">
                                        </div>
                                    </form>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    <?php } else { ?>
        <div class="alert alert-warning text-center mt-4" role="alert">
            <h3 class="m-0">No hay clínicas disponibles</h3>
        </div>
    <?php } ?>

</main>

<?php include "components/footer.php"; ?>