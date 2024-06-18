<?php

if ($_FILES) {
    $type = $_FILES["archivo"]["type"];
    if ($type == "text/csv") {
        $url = $_FILES["archivo"]["tmp_name"];
        $name = "clinicas.csv";
        $guardarEn = '../../temp/';
        $filename = "datos_upload.csv";
        $fichero_subido = $guardarEn . $name;
        move_uploaded_file($url, $fichero_subido);



        








        header("location:../../success.php");
        exit;
    } else {
        header("location:../../danger.php");
        exit;
    }
    
} else {
    header("location:../../");
    exit;
}