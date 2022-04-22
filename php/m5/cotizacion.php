<?php
include_once('../conexion/conexion.php');
session_start();
date_default_timezone_set('America/Mexico_City');
$fecha = date("Y-m-d");


if (isset($_POST['GeneraC1'])) {
    $id = $_POST['id'];
    $marca = $_POST['marca'];
    $nombre = $_POST['nombre'];
    $modelo = $_POST['modelo'];
    $descripcion = $_POST['descripcion'];
    $cantidad = $_POST['cantidad'];
    $partes = $_POST['partes'];
    $precio = $_POST['precio'];
    $folio = $_POST['folio'];
    $solicitud = $_POST['solicitud'];
    $persona = $_POST['persona'];
    $fecha1 = $_POST['fecha1'];
    $empresa = $_POST['empresa'];
    $contacto = $_POST['contacto'];
    $direccion = $_POST['direccion'];
    $telefono = $_POST['telefono'];
    $correo = $_POST['correo'];
    $entrega = $_POST['entrega'];
    $validado = $_POST['validado'];
    $insert = $conexion->query("INSERT INTO m5_cotizacion VALUES(NULL,'$folio','$solicitud','$persona','$fecha1','$empresa','$contacto','$direccion','$telefono','$correo','$_SESSION[ID]','$_SESSION[NOMBRE]','$marca','$nombre','$modelo','$descripcion','$cantidad','$partes','$precio','$fecha','EMITIDA','N/A','$entrega','$validado')");
    $insert1 = $conexion->query("UPDATE m5_cotizaciones SET estatus = '3' WHERE id = '$id'");
    if ($insert && $insert1) {
        header("Location: ../../Cotizaciones.php");
    } else {
        echo '<script type="text/javascript">
                alert("Error ");
                window.location.href="../../Cotizaciones.php";
                </script>';
    }
}

