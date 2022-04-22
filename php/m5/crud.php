<?php
include_once('../conexion/conexion.php');
session_start();
#1 Genera el reporte, 2cerrar, 3No stock, 4 Si stock, 5Cotizo, 6Finalizo 



if (isset($_POST['asignarm5'])) {
    $id = $_POST['id'];
    $consulta = "UPDATE m5_cotizaciones SET id_user = '$_SESSION[ID]', name_user = '$_SESSION[NOMBRE]' WHERE id = '$id'";
    $insert = $conexion->query($consulta);
    if ($insert) {
        header("Location: ../../Cotizaciones.php");
    } else {
        echo '<script type="text/javascript">
                alert("Error ");
                window.location.href="../../Cotizaciones.php";
                </script>';
    }
}

if (isset($_POST['editaropc2'])) {
    $id = $_POST['id'];
    $modelo = $_POST['modelo'];
    $partes = $_POST['partes'];

    $consulta = "UPDATE m5_cotizaciones SET 1_modelo = '$modelo', 1_partes = '$partes' WHERE id = '$id'";
    $insert = $conexion->query($consulta);
    if ($insert) {
        header("Location: ../../Cotizaciones.php");
    } else {
        echo '<script type="text/javascript">
                alert("Error ");
                window.location.href="../../Cotizaciones.php";
                </script>';
    }
}

#valida información

if (isset($_POST['generar'])) {
    $id = $_POST['id'];
    $consulta = "UPDATE m5_cotizaciones SET estatus = '1' WHERE id = '$id'";
    $insert = $conexion->query($consulta);
    if ($insert) {
        header("Location: ../../Cotizaciones.php");
    } else {
        echo '<script type="text/javascript">
                alert("Error ");
                window.location.href="../../Cotizaciones.php";
                </script>';
    }
}

if (isset($_POST['cerrarop2'])) {
    $id = $_POST['id'];
    $motivo = $_POST['motivo'];
    $consulta = "UPDATE m5_cotizaciones SET estatus = '2', inf = '$motivo' WHERE id = '$id'";
    $insert = $conexion->query($consulta);
    if ($insert) {
        header("Location: ../../Cotizaciones.php");
    } else {
        echo '<script type="text/javascript">
                alert("Error ");
                window.location.href="../../Cotizaciones.php";
                </script>';
    }
}

if (isset($_POST['cerraropc3'])) {
    $id = $_POST['id'];
    $consulta = "UPDATE m5_cotizaciones SET estatus = '2', inf = 'No existe en almacen lo que se solicito' WHERE id = '$id'";
    $insert = $conexion->query($consulta);
    if ($insert) {
        header("Location: ../../Cotizaciones.php");
    } else {
        echo '<script type="text/javascript">
                alert("Error ");
                window.location.href="../../Cotizaciones.php";
                </script>';
    }
}

#stock || no stock

