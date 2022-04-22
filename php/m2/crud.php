<?php
include_once('../conexion/conexion.php');
session_start();

if (isset($_POST['agregarproveedor'])) {
    $empresa = $_POST['empresa'];
    $nombre = $_POST['nombre'];
    $cargo = $_POST['cargo'];
    $direccion = $_POST['direccion'];
    $codigo = $_POST['cp'];
    $ciudad = $_POST['ciudad'];
    $pais = $_POST['pais'];
    $telefono = $_POST['telefono'];
    $correo = $_POST['correo'];

    $insert = $conexion->query("INSERT INTO m2_proveedores VALUES (NULL,'$empresa','$nombre','$cargo','$direccion','$codigo','$ciudad','$pais','$telefono','$correo' )");
    if ($insert) {
        header("Location: ../../Proveedores.php");
    } else {
        echo '<script type="text/javascript">
                alert("Error ");
                window.location.href="../../Proveedores.php";
                </script>';
    }
}
if (isset($_POST['editarproveedor'])) {
    $id = $_POST['id'];
    $empresa = $_POST['empresa'];
    $nombre = $_POST['nombre'];
    $cargo = $_POST['cargo'];
    $direccion = $_POST['direccion'];
    $codigo = $_POST['cp'];
    $ciudad = $_POST['ciudad'];
    $pais = $_POST['pais'];
    $telefono = $_POST['telefono'];
    $correo = $_POST['correo'];

    $insert = $conexion->query("UPDATE m2_proveedores SET empresa = '$empresa', nombre = '$nombre', cargo = '$cargo', direccion='$direccion',c_postal = '$codigo',ciudad='$ciudad',pais='$pais',telefono='$telefono',correo = '$correo' WHERE id = '$id'");
    if ($insert) {
        header("Location: ../../Proveedores.php");
    } else {
        echo '<script type="text/javascript">
                alert("Error ");
                window.location.href="../../Proveedores.php";
                </script>';
    }
}
if (isset($_POST['eliminarproveedor'])) {
    $id = $_POST['id'];
    $insert = $conexion->query("DELETE FROM m2_proveedores WHERE id = '$id'");
    if ($insert) {
        header("Location: ../../Proveedores.php");
    } else {
        echo '<script type="text/javascript">
                alert("Error ");
                window.location.href="../../Proveedores.php";
                </script>';
    }
}
