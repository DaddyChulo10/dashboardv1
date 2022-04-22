<?php
include_once('../conexion/conexion.php');
session_start();
date_default_timezone_set('America/Mexico_City');
$fecha = date("Y-m-d");
#agrega
if (isset($_POST['aceptacoti'])) {
    $folio = $_POST['folio'];
    $solicitud = $_POST['solicitud'];
    $persona = $_POST['persona'];
    $fecha1 = $_POST['fecha_1'];
    $empresa = $_POST['empresa'];
    $contacto = $_POST['contacto'];
    $direccion = $_POST['direccion'];
    $telefono = $_POST['telefono'];
    $correo = $_POST['correo'];
    $marca = $_POST['1_marca'];
    $nombre = $_POST['1_nombre'];
    $modelo = $_POST['1_modelo'];
    $descripcion = $_POST['1_descripcion'];
    $cantidad = $_POST['1_cantidad'];
    $partes = $_POST['1_partes'];
    $precio = $_POST['precio'];
    $entrega = $_POST['entrega'];
    $validado = $_POST['validado'];
    $insert = $conexion->query("INSERT INTO m7_ventas VALUES (NULL,'$folio','$solicitud','$persona','$fecha1','$empresa','$contacto','$direccion','$telefono','$correo','$_SESSION[ID]','$_SESSION[NOMBRE]','$marca','$nombre','$modelo','$descripcion','$cantidad','$partes','$precio','0000-00-00','EMITIDA','null','$entrega','$validado','$fecha','')");
    if ($insert) {
        header("Location: ../../Cotizaciones.php");
    } else {
        echo '<script type="text/javascript">
        alert("Error ");
        window.location.href="../../Cotizaciones.php";
        </script>';
    }
}

#RECHAZAR
if (isset($_POST['btn-rechazar'])) {
    $Razon1 = $_POST['Razon1'];
    $Razon2 = $_POST['Razon2'];
    $id = $_POST['id'];

    if ($Razon1 == '') {
        $insert = $conexion->query("UPDATE m7_ventas SET estatus = 'RECHAZADA', inf = '$Razon2' WHERE id = '$id'");
    } else if ($Razon2 == '') {
        $insert = $conexion->query("UPDATE m7_ventas SET estatus = 'RECHAZADA', inf = '$Razon1' WHERE id = '$id'");
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

#ACEPTAR
if (isset($_POST['aceptar-btn'])) {
    $id = $_POST['id'];
    $insert = $conexion->query("UPDATE m7_ventas SET estatus = 'ACEPTADA' WHERE id = '$id'");
    if ($insert) {
        header("Location: ../../Ventas.php");
    } else {
        echo '<script type="text/javascript">
        alert("Error ");
        window.location.href="../../Ventas.php";
        </script>';
    }
}

#TIEMPO DE ESPERA
if (isset($_POST['fecha_enviado'])) {
    $time = date("Y-m-d H:i:s");
    $id = $_POST['id'];
    echo $mensaje = "Cotización enviado: " . $time;
    $actualozarfecha = $conexion->query("UPDATE m7_ventas SET inf = '$mensaje' WHERE id = '$id' ");
    if ($actualozarfecha) {
        header("Location: ../../Ventas.php");
    } else {
        echo '<script type="text/javascript">
        alert("Error ");
        window.location.href="../../Ventas.php";
        </script>';
    }
}

#MODIFICAR DATOS
if (isset($_POST['corregirdatos'])) {

    $id = $_POST['id'];
    $cantidad = $_POST['cantidad'];
    $entrega = $_POST['entrega'];
    $precio = $_POST['precio'];

    $editar = $conexion->query("UPDATE m7_ventas SET 1_cantidad = '$cantidad', entrega = '$entrega', precio = '$precio' WHERE id = '$id' ");
    if ($editar) {
        header("Location: ../../Ventas.php");
    } else {
        echo '<script type="text/javascript">
        alert("Error ");
        window.location.href="../../Ventas.php";
        </script>';
    }
}
