<?php
include_once('../conexion/conexion.php');
session_start();
date_default_timezone_set('America/Mexico_City');
#$fecha = date("Y-m-d");

if (isset($_POST['btn-solicitarcompras'])) {
    $folio = $_POST['folio'];
    $marca = $_POST['marca'];
    $nombre = $_POST['nombre'];
    $modelo = $_POST['modelo'];
    $descripcion = $_POST['descripcion'];
    $cantidad = $_POST['cantidad'];
    $partes = $_POST['partes'];
    $almacen = $_POST['idalmacen'];
    $cantidad = $_POST['cantidad'];
    $inf = $_POST['inf'];
    $insert = $conexion->query("INSERT INTO m6_compras_v VALUES (NULL,'$folio','$marca','$nombre','$modelo','$descripcion','$cantidad','$partes','ENVIADO','$inf','$almacen','','','')");
    if ($almacen == 0) {
        $insert2 = $conexion->query("UPDATE m7_ventas SET validado = 'Modelo' WHERE folio = '$folio'");
    } 
    if ($insert) {
        header("Location: ../../Ventas.php");
    } else {
        echo '<script type="text/javascript">
        alert("Error ");
        window.location.href="../../Ventas.php";
        </script>';
    }
}

if (isset($_POST['btn-subirdocs'])) {

    $folio = $_POST['folio'];
    $directorio = 'archivos/';

    $doc1 = $folio . '1' . $_FILES['doc1']['name'];
    $doc2 = $folio . '2' . $_FILES['doc2']['name'];
    $doc3 = $folio . '3' . $_FILES['doc3']['name'];

    $subir_archivo1 = $directorio . basename($doc1);
    $subir_archivo2 = $directorio . basename($doc2);
    $subir_archivo3 = $directorio . basename($doc3);

    if (move_uploaded_file($_FILES['doc1']['tmp_name'], $subir_archivo1) && move_uploaded_file($_FILES['doc2']['tmp_name'], $subir_archivo2) && move_uploaded_file($_FILES['doc3']['tmp_name'], $subir_archivo3)) {
        $insert = $conexion->query("UPDATE m6_compras_v SET estatus = 'LISTO', doc1 = '$doc1', doc2 = '$doc2', doc3 = '$doc3' WHERE folio = '$folio' ");
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


/*

*/