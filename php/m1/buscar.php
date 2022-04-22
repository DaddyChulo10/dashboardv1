<?php
include_once('../conexion/conexion.php');
date_default_timezone_set('America/Mexico_City');

session_start();

$correo = $_POST['correo'];

$read =  $conexion->query("SELECT COUNT(*) AS contar FROM m3_clientes WHERE correo = '$correo'");
$array = mysqli_fetch_array($read);

if ($array['contar'] == 1) {
    $consulta = $conexion->query("SELECT * FROM m3_clientes WHERE correo = '$correo'");
    foreach ($consulta as $row) {
        echo json_encode(['Empresa' => $row['empresa'], 'Contacto' => $row['contacto'], 'Direccion' => $row['direccion'], 'Telefono' => $row['telefono'], 'Correo' => $row['correo'], 'Area' => $row['area'], 'Movil' => $row['movil']]);
    }
} else {
    echo json_encode(['Empresa' => 'Una nueva empresa']);

}
