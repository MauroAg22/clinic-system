<?php

include "lib/connection.php";

$sql = "SELECT cl_nombre, cl_cuit, cl_calle, cl_numero_calle
        FROM clinica
        ORDER BY cl_nombre;";

$clinicas = consultar($sql);

?>

<?php include "components/head.php" ?>

<main class="container my-4 pt-4">

    <div class="row gy-3 rounded-4 border border-2 bg-white">
        <div class="col-12 border-2 border-bottom">
            <h1 class="h1 text-center mb-3">Sistema de clínicas</h1>
        </div>
        <div class="col-12 col-md-5">
            <h3 class="h3 text-center mb-3">Gestionar</h3>
            <div class="d-grid mb-3">
                <a class="btn btn-outline-success" href="#">Agregar</a>
            </div>
            <div class="d-grid mb-3">
                <a class="btn btn-outline-dark" href="#">Modificar</a>
            </div>
            <div class="d-grid mb-3">
                <a class="btn btn-outline-danger" href="#">Eliminar</a>
            </div>

        </div>
        <div class="col-12 col-md-7">
            <h3 class="h3 text-center mb-3">Ingresar</h3>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">Nombre</th>
                        <th scope="col">Cuit</th>
                        <th scope="col">Dirección</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($clinicas as $unaClinica) { ?>
                    <tr>
                        <td><?= $unaClinica['cl_nombre']; ?></td>
                        <td><?= $unaClinica['cl_cuit']; ?></td>
                        <td><?= $unaClinica['cl_calle'] . " " . $unaClinica['cl_numero_calle']; ?></td>
                        <td><a class="btn btn-outline-dark" href="#">Modificar</a></td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>

</main>

<?php include "components/footer.php"; ?>