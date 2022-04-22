<?php
include_once('../conexion/conexion.php');
session_start();
date_default_timezone_set('America/Mexico_City');
#$fecha = date("Y-m-d");


#SUBIR DPCUMENTOS
if(isset($_POST['btn-subirdocs'])){
    $folio = $_POST['folio'];
    $directorio = 'archivos/';

    $doc1 = $folio . '11-' . $_FILES['doc1']['name'];
    $doc2 = $folio . '22-' . $_FILES['doc2']['name'];
    $doc3 = $folio . '33-' . $_FILES['doc3']['name'];

    $subir_archivo1 = $directorio . basename($doc1);
    $subir_archivo2 = $directorio . basename($doc2);
    $subir_archivo3 = $directorio . basename($doc3);

    if (move_uploaded_file($_FILES['doc1']['tmp_name'], $subir_archivo1) && move_uploaded_file($_FILES['doc2']['tmp_name'], $subir_archivo2) && move_uploaded_file($_FILES['doc3']['tmp_name'], $subir_archivo3)) {
        $insert = $conexion->query("UPDATE m6_compras_vs SET  doc1 = '$doc1', doc2 = '$doc2', doc3 = '$doc3' WHERE folio = '$folio' ");
        if ($insert) {
            header("Location: ../../Compras.php");
        } else {
            echo '<script type="text/javascript">
            alert("Error ");
            window.location.href="../../Compras.php";
            </script>';
        }
    } else {
        echo '<script type="text/javascript">
            alert("Error archivos ");
            
            </script>';
    }

}

#ASIGNAR COMPRAS ACEPTADO
if (isset($_POST['compras_plus'])) {
    $folio = $_POST['folio'];

    $can = count($_POST['cantidad']);
    for ($i = 0; $i < $can; $i++) {
        $cantidad = $_POST['cantidad'][$i];
        $inf = $_POST['inf'][$i];
        $insert = $conexion->query("INSERT INTO m6_compras_vs VALUES(NULL,'$folio','$cantidad','$inf','','','')");
    }

    header("Location: ../../Ventas.php");
}
