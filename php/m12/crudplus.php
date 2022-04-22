<?php
include_once('../conexion/conexion.php');
session_start();
date_default_timezone_set('America/Mexico_City');


#SUBIR DOS DOCUMENTOS A LA VEZ

if (isset($_POST['btn-subirdocs'])) {
    $folio = $_POST['folio'];
    $directorio = 'archivos/';
    $doc1 = $folio . '1PLUS' . $_FILES['doc1']['name'];
    $doc2 = $folio . '2PLUS' . $_FILES['doc2']['name'];
    $subir_archivo1 = $directorio . basename($doc1);
    $subir_archivo2 = $directorio . basename($doc2);
    if (move_uploaded_file($_FILES['doc1']['tmp_name'], $subir_archivo1) && move_uploaded_file($_FILES['doc2']['tmp_name'], $subir_archivo2)) {
        $insert = $conexion->query("UPDATE m12_facturacion_vs SET estatus = 'LISTO', doc1 = '$doc1', doc2 = '$doc2' WHERE folio = '$folio' ");
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


#NOTIFICAR ALMACEN
if (isset($_POST['btn-enviarfacturacion'])) {
    echo $contador = count($_POST['codigo_cliente']);

    for ($i = 0; $i < $contador; $i++) {
        $codigo_cliente = $_POST['codigo_cliente'][$i];
        $folio = $_POST['folio'][$i];
        $empresa = $_POST['empresa'][$i];
        $contacto = $_POST['contacto'][$i];
        $direccion = $_POST['direccion'][$i];
        $telefono = $_POST['telefono'][$i];
        $correo = $_POST['correo'][$i];
        $marca = $_POST['marca'][$i];
        $modelo = $_POST['modelo'][$i];
        $descripcion = $_POST['descripcion'][$i];
        $cantidad = $_POST['cantidad'][$i];
        $partes = $_POST['partes'][$i];
        $precio = $_POST['precio'][$i];

        $inser = $conexion->query("INSERT INTO m12_facturacion_vs VALUES(NULL,'$codigo_cliente','$folio','$empresa','$contacto','$direccion','$telefono','$correo','$marca','$modelo','$descripcion','$cantidad','$partes','$precio','','','')");
    }
    header("Location: ../../Ventas.php");
}
