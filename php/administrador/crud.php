<?php
include_once('../conexion/conexion.php');
session_start();


//Agregar
if (isset($_POST['agregar_usuario'])) {
    $nombre = $_POST['nombre'];
    $tipo_id = $_POST['tipo_id'];
    $no_id = $_POST['no_id'];
    $telefono = $_POST['telefono'];
    $correo = $_POST['correo'];
    $usuario = $_POST['usuario'];
    $contraseña = $_POST['contraseña'];
    $rol = $_POST['rol'];

    $query = "SELECT COUNT(*) AS contar FROM usuarios WHERE usuario = '$usuario' ";
    $consulta = mysqli_query($conexion, $query);
    $array = mysqli_fetch_array($consulta);
    if ($array['contar'] == 1) {
        echo '<script type="text/javascript">
        alert("Este Usuario Ya existe");
        window.location.href="../../Administrador.php";
        </script>';
    } else {

        if ($rol == 'Super Administrador') {

            $insert = $conexion->query("INSERT INTO usuarios VALUES (NULL,'$nombre','$tipo_id','$no_id','$telefono','$correo','$usuario','$contraseña','Si','$rol','Si','Si','Si','Si','Si','Si','Si','Si','Si','Si','Si','Si',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL)");
            if ($insert) {
                header("Location: ../../Administrador.php");
            } else {
                echo '<script type="text/javascript">
                        alert("Error ");
                        window.location.href="../../Administrador.php";
                        </script>';
            }
        } else if ($rol == 'Usuario') {
            $insert = $conexion->query("INSERT INTO usuarios VALUES (NULL,'$nombre','$tipo_id','$no_id','$telefono','$correo','$usuario','$contraseña','Si','$rol','No','No','No','No','No','No','No','No','No','No','No','No',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL)");
            if ($insert) {
                header("Location: ../../Administrador.php");
            } else {
                echo '<script type="text/javascript">
                        alert("Error ");
                        window.location.href="../../Administrador.php";
                        </script>';
            }
        }
    }
}

//Eliminar 
if (isset($_POST['eliminar_user'])) {
    $id = $_POST['id'];


    $eliminar_query = "DELETE FROM usuarios WHERE id = '$id'";
    if (mysqli_query($conexion, $eliminar_query)) {
        header("Location: ../../Administrador.php");
    } else {
        echo '<script type="text/javascript">
        alert("Error ");
        window.location.href="../../Administrador.php";
        </script>';
    }
}

//Editar

if (isset($_POST['editar_usuario'])) {
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $tipo_id = $_POST['tipo_id'];
    $no_id = $_POST['no_id'];
    $telefono = $_POST['telefono'];
    $correo = $_POST['correo'];
    $contraseña = $_POST['contraseña'];

    $queryeditar = "UPDATE usuarios SET nombre = '$nombre', tipo_identificacion = '$tipo_id', identificacion = '$no_id', telefono = '$telefono', correo = '$correo', contraseña = '$contraseña' WHERE id='$id'";
    if (mysqli_query($conexion, $queryeditar)) {
        header("Location: ../../Administrador.php");
    } else {
        echo '<script type="text/javascript">
        alert("Error ");
        window.location.href="../../Administrador.php";
        </script>';
    }
}


//Cambios permanentes
if (isset($_POST['cambios_permanentes'])) {

    $id = $_POST['id'];
    $m1 = $_POST['m1'];
    $m2 = $_POST['m2'];
    $m3 = $_POST['m3'];
    $m4 = $_POST['m4'];
    $m5 = $_POST['m5'];
    $m6 = $_POST['m6'];
    $m7 = $_POST['m7'];
    $m8 = $_POST['m8'];
    $m9 = $_POST['m9'];
    $m10 = $_POST['m10'];
    $m11 = $_POST['m11'];
    $m12 = $_POST['m12'];


    $fecham1 = $_POST['fecham1'];
    $fecham2 = $_POST['fecham2'];
    $fecham3 = $_POST['fecham3'];
    $fecham4 = $_POST['fecham4'];
    $fecham5 = $_POST['fecham5'];
    $fecham6 = $_POST['fecham6'];
    $fecham7 = $_POST['fecham7'];
    $fecham8 = $_POST['fecham8'];
    $fecham9 = $_POST['fecham9'];
    $fecham10 = $_POST['fecham10'];
    $fecham11 = $_POST['fecham11'];
    $fecham12 = $_POST['fecham12'];


    if ($fecham1 == '') {
        if ($m1 == '') {
            $m1 = 'No';
        }
        $fecham1 = NULL;
    } else {
        $m1 = 'TEM';
    }

    if ($fecham2 == '') {
        if ($m2 == '') {
            $m2 = 'No';
        }
        $fecham2 = NULL;
    } else {
        $m2 = 'TEM';
    }

    if ($fecham3 == '') {
        if ($m3 == '') {
            $m3 = 'No';
        }
        $fecham3 = NULL;
    } else {
        $m3 = 'TEM';
    }

    if ($fecham4 == '') {
        if ($m4 == '') {
            $m4 = 'No';
        }
        $fecham4 = NULL;
    } else {
        $m4 = 'TEM';
    }

    if ($fecham5 == '') {
        if ($m5 == '') {
            $m5 = 'No';
        }
        $fecham5 = NULL;
    } else {
        $m5 = 'TEM';
    }

    if ($fecham6 == '') {
        if ($m6 == '') {
            $m6 = 'No';
        }
        $fecham6 = NULL;
    } else {
        $m6 = 'TEM';
    }

    if ($fecham7 == '') {
        if ($m7 == '') {
            $m7 = 'No';
        }
        $fecham7 = NULL;
    } else {
        $m7 = 'TEM';
    }

    if ($fecham8 == '') {
        if ($m8 == '') {
            $m8 = 'No';
        }
        $fecham8 = NULL;
    } else {
        $m8 = 'TEM';
    }

    if ($fecham9 == '') {
        if ($m9 == '') {
            $m9 = 'No';
        }
        $fecham9 = NULL;
    } else {
        $m9 = 'TEM';
    }

    if ($fecham10 == '') {
        if ($m10 == '') {
            $m10 = 'No';
        }
        $fecham10 = NULL;
    } else {
        $m10 = 'TEM';
    }

    if ($fecham11 == '') {
        if ($m11 == '') {
            $m11 = 'No';
        }
        $fecham11 = NULL;
    } else {
        $m11 = 'TEM';
    }

    if ($fecham12 == '') {
        if ($m12 == '') {
            $m12 = 'No';
        }
        $fecham12 = NULL;
    } else {
        $m12 = 'TEM';
    }





    $cambios = "UPDATE usuarios SET m1 = '$m1', datem1 = '$fecham1', m2 = '$m2', datem2 = '$fecham2',m3 = '$m3', datem3 = '$fecham3',m4 = '$m4', datem4 = '$fecham4',m5 = '$m5', datem5 = '$fecham5',m6 = '$m6', datem6 = '$fecham6',m7 = '$m7', datem7 = '$fecham7',m8 = '$m8', datem8 = '$fecham8',m9 = '$m9', datem9 = '$fecham9',m10 = '$m10', datem10 = '$fecham10',m11 = '$m11', datem11 = '$fecham11',m12 = '$m12', datem12 = '$fecham12' WHERE id='$id'";







    if (mysqli_query($conexion, $cambios)) {
        header("Location: ../../Administrador.php");
    } else {
        echo '<script type="text/javascript">
        alert("Error ");
        window.location.href="../../Administrador.php";
        </script>';
    }
}
