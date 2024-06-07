<?php

include "lib/connection.php";

$cl_id = $_POST['modificar'];

if ($_POST) {
    if ($cl_id == -1) {
        $cl_cuit = "";
        $cl_razon_social = "";
        $cl_nombre = "";
        $cl_codigo_postal = "";
        $cl_provincia = "";
        $cl_ciudad = "";
        $cl_calle = "";
        $cl_numero_calle = "";
    } else {
        connect();

        $sql = "SELECT *
                FROM clinica
                WHERE cl_id = :cl_id";

        $sentencia = $connection->prepare($sql);
        $sentencia->bindParam(':cl_id', $cl_id, PDO::PARAM_INT);
        $sentencia->execute();
        $clinica = $sentencia->fetchAll(PDO::FETCH_ASSOC)[0];

        // print_r($clinica);

        $cl_cuit = $clinica['cl_cuit'];
        $cl_razon_social = $clinica['cl_razon_social'];
        $cl_nombre = $clinica['cl_nombre'];
        $cl_codigo_postal = $clinica['cl_codigo_postal'];
        $cl_provincia = $clinica['cl_provincia'];
        $cl_ciudad = $clinica['cl_ciudad'];
        $cl_calle = $clinica['cl_calle'];
        $cl_numero_calle = $clinica['cl_numero_calle'];
    }


    disconnect();
} else {
    header("location:index.php");
}

?>




<?php include "components/head.php"; ?>


<main class="container">
    <div class="row justify-content-center pt-5">
        <div class="col-lg-8 p-3 bg-white rounded border">
            <form action="process/modificar-clinica.php" method="post">
                <div class="row">
                    <div class="col-md-12">
                        <div class="mb-3">
                            <label for="nombre" class="form-label">Nombre de la clínica</label>
                            <input type="text" class="form-control" required id="nombre" value="<?= $cl_nombre ?>">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="razonSocial" class="form-label">Razón social</label>
                            <input type="text" class="form-control" required id="razonSocial" value="<?= $cl_razon_social ?>">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="cuit" class="form-label">CUIT</label>
                            <input type="text" class="form-control" required id="cuit" value="<?= $cl_cuit ?>">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="codigoPostal" class="form-label">Código postal</label>
                            <input type="text" class="form-control" required id="codigoPostal" value="<?= $cl_codigo_postal ?>">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="ciudad" class="form-label">Ciudad</label>
                            <input type="text" class="form-control" required id="ciudad" value="<?= $cl_ciudad ?>">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="provincia" class="form-label">Provincia</label>
                            <input type="text" class="form-control" required id="provincia" value="<?= $cl_provincia ?>">
                        </div>
                    </div>
                    <div class="col-md-9">
                        <div class="mb-3">
                            <label for="calle" class="form-label">Calle</label>
                            <input type="text" class="form-control" required id="calle" value="<?= $cl_calle ?>">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="mb-3">
                            <label for="numero" class="form-label">Número</label>
                            <input type="text" class="form-control" required id="numero" value="<?= $cl_numero_calle ?>">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="mt-3 d-grid">
                            <input class="btn btn-success" type="submit" value="<?= ($cl_id == -1) ? "Agregar" : "Modificar" ?>">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="mt-3 d-grid">
                            <a class="btn btn-danger" href="index.php">Cancelar</a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>


</main>


<?php include "components/footer.php"; ?>