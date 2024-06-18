<!doctype html>
<html lang="es">

<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
</head>

<body>
    <header>
        <!-- place navbar here -->
    </header>
    <main class="container">
        <div class="my-3">
            <form action="subir.php" method="post" enctype="multipart/form-data">
                <label for="archivo" class="form-label">Carga de archivo csv</label>
                <input type="file" class="form-control" name="archivo" id="archivo" />
                <div class="my-3">
                    <input class="btn btn-success" type="submit" value="Subir">
                </div>
            </form>
        </div>

        <?php

        if ($_FILES) {
            $type = $_FILES["archivo"]["type"];
            if ($type == "text/csv") {

            }
            $name = $_FILES["archivo"]["name"];
            $url = $_FILES["archivo"]["tmp_name"];
            $guardarEn = '../temp/';
            $filename = "datos_upload.csv";
            $fichero_subido = $guardarEn . $name;

            move_uploaded_file($url, $fichero_subido);

            // echo $error;

            echo "Archivo subido correctamente.";

            
        }

        ?>

    </main>
    <footer>
        <!-- place footer here -->
    </footer>
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>

</html>