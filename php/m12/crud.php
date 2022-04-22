<?php
include_once('../conexion/conexion.php');
session_start();
date_default_timezone_set('America/Mexico_City');
$fecha = date("Y-m-d");

if (isset($_POST['btn-factura'])) {
    $folio = $_POST['folio'];
    $empresa = $_POST['empresa'];
    $contacto = $_POST['contacto'];
    $direccion = $_POST['direccion'];
    $telefono = $_POST['telefono'];
    $correo = $_POST['correo'];
    $marca = $_POST['marca'];
    $nombre = $_POST['nombre'];
    $modelo = $_POST['modelo'];
    $partes = $_POST['partes'];
    $descripcion = $_POST['descripcion'];
    $cantidad = $_POST['cantidad'];
    $precio = $_POST['precio'];
    $insert = $conexion->query("INSERT INTO m12_facturacion VALUES(NULL, '$folio','$empresa','$contacto','$direccion','$telefono','$correo','$marca','$nombre','$modelo','$partes','$descripcion','$cantidad','$precio','PENDIENTE','','')");
    if ($insert) {
        header("Location: ../../Ventas.php");
    } else {
        echo '<script type="text/javascript">
            alert("Error ");
            window.location.href="../../Ventas.php";
            </script>';
    }
}






#SUBIR DOCUMENTO POR ORDEN DE COMPRA  PENDIENTE

/*
if (isset($_POST['btn-subirdocs1'])) {
    $folio = $_POST['folio'];
    $directorio = 'archivos/';
    $doc1 = $folio . '1er' . $_FILES['doc1']['name'];
    $subir_archivo1 = $directorio . basename($doc1);
    if (move_uploaded_file($_FILES['doc1']['tmp_name'], $subir_archivo1)) {
        $insert = $conexion->query("UPDATE m12_facturacion SET estatus = 'LISTO', oc = '$doc1' WHERE folio = '$folio' ");
        if ($insert) {
            header("Location: ../../Facturacion.php");
        } else {
            echo '<script type="text/javascript">
            alert("Error ");
            window.location.href="../../Facturacion.php";
            </script>';
        }
    }
} */

#SUBIR DOCUMENTO POR FICHA DE DEPOSITO  
/*

if (isset($_POST['btn-subirdocs2'])) {
    $folio = $_POST['folio'];
    $directorio = 'archivos/';
    $doc2 = $folio . '2do' . $_FILES['doc2']['name'];
    $subir_archivo2 = $directorio . basename($doc2);
    if (move_uploaded_file($_FILES['doc2']['tmp_name'], $subir_archivo2)) {
        $insert = $conexion->query("UPDATE m12_facturacion SET estatus = 'LISTO', fd = '$doc2' WHERE folio = '$folio' ");
        if ($insert) {
            header("Location: ../../Facturacion.php");
        } else {
            echo '<script type="text/javascript">
            alert("Error ");
            window.location.href="../../Facturacion.php";
            </script>';
        }
    }
}
*/


#SUBIR DOS DOCUMENTOS A LA VEZ

if (isset($_POST['btn-subirdocs'])) {
    $folio = $_POST['folio'];
    $directorio = 'archivos/';
    $doc1 = $folio . '1' . $_FILES['doc1']['name'];
    $doc2 = $folio . '2' . $_FILES['doc2']['name'];
    $subir_archivo1 = $directorio . basename($doc1);
    $subir_archivo2 = $directorio . basename($doc2);
    if (move_uploaded_file($_FILES['doc1']['tmp_name'], $subir_archivo1) && move_uploaded_file($_FILES['doc2']['tmp_name'], $subir_archivo2)) {
        $insert = $conexion->query("UPDATE m12_facturacion SET estatus = 'LISTO', oc = '$doc1', fd = '$doc2' WHERE folio = '$folio' ");
        if ($insert) {
            header("Location: ../../Facturacion.php");
        } else {
            echo '<script type="text/javascript">
            alert("Error ");
            window.location.href="../../Facturacion.php";
            </script>';
        }
    } else {
        echo '<script type="text/javascript">
            alert("Error ");
            window.location.href="../../Facturacion.php";
            </script>';
    }
}
