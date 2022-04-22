<?php 
$conexion = new mysqli("localhost", "root", "", "control");
if ($conexion->connect_errno) {
    echo "Fallo al conectar a la base de datos: (" . $conexion->connect_errno . ") " . $conexion->connect_error;
}
?>