<?php



include_once('../conexion/conexion.php');
session_start();
$modelo = $_GET['modelo'];
$partes = $_GET['partes'];
$query = "SELECT COUNT(*) AS contar FROM m4_almacen2 WHERE modelo = '$modelo'";
$consulta = mysqli_query($conexion, $query);
$array = mysqli_fetch_array($consulta);

$query0 = "SELECT COUNT(*) AS contar0 FROM m4_almacen2 WHERE num_partes = '$partes'";
$consulta0 = mysqli_query($conexion, $query0);
$array0 = mysqli_fetch_array($consulta0);

if ($array['contar'] == 1 || $array0['contar0'] == 1) {
    echo 'Correcto';
} else {
    $rest = substr($modelo, 0, 5);
    $query1 = "SELECT COUNT(*) AS contar1 FROM m4_almacen2 WHERE modelo LIKE '$rest%'";
    $consulta1 = mysqli_query($conexion, $query1);
    $array1 = mysqli_fetch_array($consulta1);

    $rest0 = substr($partes, 0, 5);
    $query10 = "SELECT COUNT(*) AS contar10 FROM m4_almacen2 WHERE num_partes LIKE '$rest0%'";
    $consulta10 = mysqli_query($conexion, $query10);
    $array10 = mysqli_fetch_array($consulta10);

    if ($array1['contar1'] >= 1 || $array10['contar10'] >= 1) {
        echo 'Opcion';
    } else {
        echo 'Error';
    }
}
