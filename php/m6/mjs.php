<?php
include_once('../conexion/conexion.php');
session_start();
date_default_timezone_set('America/Mexico_City');
$fecha = date("Y-m-d");
if (isset($_POST['mjs1'])) {
    $folio = $_POST['folio'];
    $mjs = $_POST['mjs'];
    $consulta = "INSERT INTO m6_compras_mjs VALUES(NULL,'$folio','$mjs','N/A','$fecha','$_SESSION[NOMBRE]','N/A')";
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
if (isset($_POST['mjs2'])) {
    $folio = $_POST['folio'];
    $mjs = $_POST['mjs'];
    $consulta = "UPDATE m6_compras_mjs SET mjs2 = '$mjs', user2 = '$_SESSION[NOMBRE]' WHERE folio = '$folio'";
    $insert = $conexion->query($consulta);
    if ($insert) {
        header("Location: ../../Compras.php");
    } else {
        echo '<script type="text/javascript">
                alert("Error ");
                window.location.href="../../Compras.php";
                </script>';
    }
}
