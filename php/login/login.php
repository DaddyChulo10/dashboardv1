<?php
include_once('../conexion/conexion.php');
date_default_timezone_set('America/Mexico_City');
$hoy = date('Y-m-d');
session_start();
$user = $_GET['user'];
$pwd = $_GET['pwd'];
$query = "SELECT COUNT(*) AS contar FROM usuarios WHERE usuario = '$user' and contraseña = '$pwd'";
$consulta = mysqli_query($conexion, $query);
$array = mysqli_fetch_array($consulta);
if ($array['contar'] == 1) {
    $query = "SELECT * FROM usuarios WHERE usuario = '$user' and contraseña = '$pwd'";
    $consulta = mysqli_query($conexion, $query);
    foreach ($consulta as $row) {
        $_SESSION['ID'] = $row['id'];
        $_SESSION['NOMBRE'] = $row['nombre'];
        $_SESSION['TIPO_ID'] = $row['tipo_identificacion'];
        $_SESSION['IDENTIFICACION'] = $row['identificacion'];
        $_SESSION['TELEFONO'] = $row['telefono'];
        $_SESSION['CORREO'] = $row['correo'];
        $_SESSION['USUARIO'] = $row['usuario'];
        $_SESSION['CONTRASEÑA'] = $row['contraseña'];
        $_SESSION['ELIMINAR'] = $row['eliminar'];
        $_SESSION['ROL'] = $row['rol'];
        $_SESSION['M1'] = $row['m1'];
        $_SESSION['M2'] = $row['m2'];
        $_SESSION['M3'] = $row['m3'];
        $_SESSION['M4'] = $row['m4'];
        $_SESSION['M5'] = $row['m5'];
        $_SESSION['M6'] = $row['m6'];
        $_SESSION['M7'] = $row['m7'];
        $_SESSION['M8'] = $row['m8'];
        $_SESSION['M9'] = $row['m9'];
        $_SESSION['M10'] = $row['m10'];
        $_SESSION['M11'] = $row['m11'];
        $_SESSION['M12'] = $row['m12'];

        $_SESSION['DATEM1'] = $row['datem1'];
        $_SESSION['DATEM2'] = $row['datem2'];
        $_SESSION['DATEM3'] = $row['datem3'];
        $_SESSION['DATEM4'] = $row['datem4'];
        $_SESSION['DATEM5'] = $row['datem5'];
        $_SESSION['DATEM6'] = $row['datem6'];
        $_SESSION['DATEM7'] = $row['datem7'];
        $_SESSION['DATEM8'] = $row['datem8'];
        $_SESSION['DATEM9'] = $row['datem9'];
        $_SESSION['DATEM10'] = $row['datem10'];
        $_SESSION['DATEM11'] = $row['datem11'];
        $_SESSION['DATEM12'] = $row['datem12'];
    }
    if ($_SESSION['M1'] == 'TEM') {
        if ($_SESSION['DATEM1'] < $hoy) {
            $que = "UPDATE usuarios SET m1 = 'No', datem1 = '0000-00-00' WHERE id='$_SESSION[ID]'";
            mysqli_query($conexion, $que);
            unset($_SESSION["M1"]);
            unset($_SESSION["DATEM1"]);
            $_SESSION['M1'] = 'No';
            $_SESSION['DATEM1'] = 'No';
        }
    }

    if ($_SESSION['M2'] == 'TEM') {
        if ($_SESSION['DATEM2'] < $hoy) {
            $que = "UPDATE usuarios SET m2 = 'No', datem2 = '0000-00-00' WHERE id='$_SESSION[ID]'";
            mysqli_query($conexion, $que);
            unset($_SESSION["M2"]);
            unset($_SESSION["DATEM2"]);
            $_SESSION['M2'] = 'No';
            $_SESSION['DATEM2'] = 'No';
        }
    }

    if ($_SESSION['M3'] == 'TEM') {
        if ($_SESSION['DATEM3'] < $hoy) {
            $que = "UPDATE usuarios SET m3 = 'No', datem3 = '0000-00-00' WHERE id='$_SESSION[ID]'";
            mysqli_query($conexion, $que);
            unset($_SESSION["M3"]);
            unset($_SESSION["DATEM3"]);
            $_SESSION['M3'] = 'No';
            $_SESSION['DATEM3'] = 'No';
        }
    }

    if ($_SESSION['M4'] == 'TEM') {
        if ($_SESSION['DATEM4'] < $hoy) {
            $que = "UPDATE usuarios SET m4 = 'No', datem4 = '0000-00-00' WHERE id='$_SESSION[ID]'";
            mysqli_query($conexion, $que);
            unset($_SESSION["M4"]);
            unset($_SESSION["DATEM4"]);
            $_SESSION['M4'] = 'No';
            $_SESSION['DATEM4'] = 'No';
        }
    }

    if ($_SESSION['M5'] == 'TEM') {
        if ($_SESSION['DATEM5'] < $hoy) {
            $que = "UPDATE usuarios SET m5 = 'No', datem5 = '0000-00-00' WHERE id='$_SESSION[ID]'";
            mysqli_query($conexion, $que);
            unset($_SESSION["M5"]);
            unset($_SESSION["DATEM5"]);
            $_SESSION['M5'] = 'No';
            $_SESSION['DATEM5'] = 'No';
        }
    }

    if ($_SESSION['M6'] == 'TEM') {
        if ($_SESSION['DATEM6'] < $hoy) {
            $que = "UPDATE usuarios SET m6 = 'No', datem6 = '0000-00-00' WHERE id='$_SESSION[ID]'";
            mysqli_query($conexion, $que);
            unset($_SESSION["M6"]);
            unset($_SESSION["DATEM6"]);
            $_SESSION['M6'] = 'No';
            $_SESSION['DATEM6'] = 'No';
        }
    }

    if ($_SESSION['M7'] == 'TEM') {
        if ($_SESSION['DATEM7'] < $hoy) {
            $que = "UPDATE usuarios SET m7 = 'No', datem7 = '0000-00-00' WHERE id='$_SESSION[ID]'";
            mysqli_query($conexion, $que);
            unset($_SESSION["M7"]);
            unset($_SESSION["DATEM7"]);
            $_SESSION['M7'] = 'No';
            $_SESSION['DATEM7'] = 'No';
        }
    }

    if ($_SESSION['M8'] == 'TEM') {
        if ($_SESSION['DATEM8'] < $hoy) {
            $que = "UPDATE usuarios SET m8 = 'No', datem8 = '0000-00-00' WHERE id='$_SESSION[ID]'";
            mysqli_query($conexion, $que);
            unset($_SESSION["M8"]);
            unset($_SESSION["DATEM8"]);
            $_SESSION['M8'] = 'No';
            $_SESSION['DATEM8'] = 'No';
        }
    }

    if ($_SESSION['M9'] == 'TEM') {
        if ($_SESSION['DATEM9'] < $hoy) {
            $que = "UPDATE usuarios SET m9 = 'No', datem9 = '0000-00-00' WHERE id='$_SESSION[ID]'";
            mysqli_query($conexion, $que);
            unset($_SESSION["M9"]);
            unset($_SESSION["DATEM9"]);
            $_SESSION['M9'] = 'No';
            $_SESSION['DATEM9'] = 'No';
        }
    }

    if ($_SESSION['M10'] == 'TEM') {
        if ($_SESSION['DATEM10'] < $hoy) {
            $que = "UPDATE usuarios SET m10 = 'No', datem10 = '0000-00-00' WHERE id='$_SESSION[ID]'";
            mysqli_query($conexion, $que);
            unset($_SESSION["M10"]);
            unset($_SESSION["DATEM10"]);
            $_SESSION['M10'] = 'No';
            $_SESSION['DATEM10'] = 'No';
        }
    }

    if ($_SESSION['M11'] == 'TEM') {
        if ($_SESSION['DATEM11'] < $hoy) {
            $que = "UPDATE usuarios SET m11 = 'No', datem11 = '0000-00-00' WHERE id='$_SESSION[ID]'";
            mysqli_query($conexion, $que);
            unset($_SESSION["M11"]);
            unset($_SESSION["DATEM11"]);
            $_SESSION['M11'] = 'No';
            $_SESSION['DATEM11'] = 'No';
        }
    }

    if ($_SESSION['M12'] == 'TEM') {
        if ($_SESSION['DATEM12'] < $hoy) {
            $que = "UPDATE usuarios SET m12 = 'No', datem12 = '0000-00-00' WHERE id='$_SESSION[ID]'";
            mysqli_query($conexion, $que);
            unset($_SESSION["M12"]);
            unset($_SESSION["DATEM12"]);
            $_SESSION['M12'] = 'No';
            $_SESSION['DATEM12'] = 'No';
        }
    }

    echo 'Correcto';
} else {
    echo 'Error';
}
