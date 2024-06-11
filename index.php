<?php

include "lib/connection.php";

connect();

// ----------------------------------------------------------------------------------------------------

$sql = "SELECT cl_id, cl_nombre, cl_cuit, cl_calle, cl_numero_calle, cl_provincia, cl_ciudad
        FROM clinica
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
                <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Menú</h5>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
                <form action="ingresar-modificar-clinica.php" method="post">
                    <input type="hidden" name="modificar" value="-1">
                    <div class="d-grid mb-3">
                        <input class="btn btn-outline-success" type="submit" value="Agregar">
                    </div>
                </form>
            </div>
        </div>
    </div>
</nav>

<main class="container-lg my-4">
    <?php if (!empty($clinicas)) { ?>
    <div class="p-3 bg-white rounded border table-responsive">
        <table class="table align-middle table-hover">
            <thead>
                <tr>
                    <th scope="col">Nombre</th>
                    <th scope="col">Cuit</th>
                    <th scope="col">Ciudad</th>
                    <th scope="col">Dirección</th>
                    <th scope="col" class="text-center">Médicos</th>
                    <th scope="col" colspan="4" class="text-center">Acciones</th>
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
                        <!-- <td><a class="" href="#">Modificar</a></td> -->
                        <form action="" method="post">
                            <input type="hidden" name="ingresar" value="<?= $unaClinica['cl_id'] ?>">
                            <td class="text-center">
                                <!-- <div class="d-grid"> -->
                                    <input class="btn btn-outline-secondary" type="submit" value="Ingresar">
                                <!-- </div> -->
                            </td>
                        </form>
                        <form action="ingresar-modificar-clinica.php" method="post">
                            <input type="hidden" name="modificar" value="<?= $unaClinica['cl_id'] ?>">
                            <td class="text-center">
                                <!-- <div class="d-grid"> -->
                                    <input class="btn btn-outline-dark" type="submit" value="Modificar">
                                <!-- </div> -->
                            </td>
                        </form>
                        <form action="process/clinica-eliminar.php" method="post">
                            <input type="hidden" name="eliminar" value="<?= $unaClinica['cl_id'] ?>">
                            <td class="text-center">
                                <!-- <div class="d-grid"> -->
                                    <input class="btn btn-outline-danger" type="submit" value="Eliminar">
                                <!-- </div> -->
                            </td>
                        </form>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
    <?php } else { ?>
        <div class="container-fluid">
            <div class="row justify-content-center mt-5">
                <div class="alert alert-secondary col-sm-8 text-center" role="alert">
                    No hay nada que mostrar aquí.
                </div>
            </div>
        </div>
    <?php } ?>

</main>

<?php include "components/footer.php"; ?>