<?php
include_once('../conexion/conexion.php');
session_start();
date_default_timezone_set('America/Mexico_City');

#EDITAR
if (isset($_POST['editarbtn'])) {
    $id = $_POST['id'];
    $empresa = $_POST['empresa'];
    $contacto = $_POST['contacto'];
    $direcion = $_POST['direcion'];
    $telefono = $_POST['telefono'];
    $area = $_POST['area'];
    $movil = $_POST['movil'];

    $insert = $conexion->query("UPDATE m3_clientes SET empresa = '$empresa', contacto = '$contacto', direccion = '$direcion', telefono = '$telefono', area = '$area', movil = '$movil' WHERE id = '$id'");
    if ($insert) {
        header("Location: ../../Clientes.php");
    } else {
        echo '  <script type="text/javascript">
                alert("Error ");
                window.location.href="../../Clientes.php";
                </script>';
    }
}

#ELIMINAR
if (isset($_POST['eliminarcliente'])) {
    $id = $_POST['id'];
    $insert = $conexion->query("DELETE FROM m3_clientes WHERE id = '$id'");
    if ($insert) {
        header("Location: ../../Clientes.php");
    } else {
        echo '  <script type="text/javascript">
                alert("Error ");
                window.location.href="../../Clientes.php";
                </script>';
    }
}

#AGREAGAR CLIENTE
if (isset($_POST['btn-agregarcliente'])) {
    $empresa = $_POST['empresa'];
    $contacto = $_POST['contacto'];
    $direcion = $_POST['direcion'];
    $telefono = $_POST['telefono'];
    $correo = $_POST['correo'];
    $area = $_POST['area'];
    $movil = $_POST['movil'];
    $codigo = date("ymd-Gis");
    $consulta = $conexion->query("SELECT COUNT(*) AS contar FROM m3_clientes WHERE correo = '$correo'");
    $consultaarray = mysqli_fetch_array($consulta);
    if ($consultaarray['contar'] == 0) {
        $insert = $conexion->query("INSERT INTO m3_clientes VALUES(NULL,'$empresa','$contacto','$direcion','$telefono','$correo','$area','$movil','$codigo')");
        if ($insert) {
            header("Location: ../../Clientes.php");
        } else {
            echo '  <script type="text/javascript">
                    alert("Error ");
                    window.location.href="../../Clientes.php";
                    </script>';
        }
    } else {
        echo '  <script type="text/javascript">
        alert("Ya exite este cliente ");
        window.location.href="../../Clientes.php";
        </script>';
    }
}
