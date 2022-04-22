<?php
include_once('../conexion/conexion.php');
date_default_timezone_set('America/Mexico_City');

session_start();

//AGREGAR
if (isset($_POST['agregar_solicitud'])) {
    $solicitud_0 = $_POST['solicitud'];
    $tipo_persona_0 = $_POST['tipo_persona'];
    $fecha_0 = $_POST['fecha'];
    $nom_empresa_0 = $_POST['nom_empresa'];
    $area_contacto_0 = $_POST['area_contacto'];
    $direccion_0 = $_POST['direccion'];
    $telefono_0 = $_POST['telefono'];
    $correo_0 = $_POST['correo'];
    $area_0 = $_POST['area'];
    $movil_0 = $_POST['movil'];


    $marca_1 = $_POST['1_marca'];
    $nombre_1 = $_POST['1_nombre'];
    $nombre_1_1 = $_POST['1_nombre_no'];
    $modelo_1 = $_POST['1_modelo'];
    $descripcion_1 = $_POST['1_descripcion'];
    $cantidad_1 = $_POST['1_cantidad'];
    $partes_1 = $_POST['1_no_partes'];

    $prioridad_2 = $_POST['2_prioridad'];
    $motivo_2 = $_POST['2_motivo'];
    $marca_2 = $_POST['2_marca'];
    $modelo_2 = $_POST['2_modelo'];
    $descripcion_2 = $_POST['2_descripcion'];
    $falla_2 = $_POST['2_falla'];

    $descripcion_3 = $_POST['3_descripcion'];
    $cita_3 = $_POST['3_cita'];

    #
    if ($marca_1 == '') {
        $marca_1 == 'Sin Información';
    }

    if ($nombre_1 == '') {
        $nombre_1 = 'Sin Información';
    } else if ($marca_1 == 'No Linea') {
        $nombre_1 = $nombre_1_1;
    }
    if ($modelo_1 == '') {
        $modelo_1 = 'Sin Información';
    }
    if ($descripcion_1 == '') {
        $descripcion_1 = 'Sin Información';
    }
    if ($cantidad_1 == '') {
        $cantidad_1 = 'Sin Información';
    }
    if ($partes_1 == '') {
        $partes_1 = 'Sin Información';
    }
    if ($marca_2 == '') {
        $marca_2 = 'Sin Información';
    }
    if ($modelo_2 == '') {
        $modelo_2 = 'Sin Información';
    }
    if ($descripcion_2 == '') {
        $descripcion_2 = 'Sin Información';
    }
    if ($falla_2 == '') {
        $falla_2 = 'Sin Información';
    }
    if ($descripcion_3 == '') {
        $descripcion_3 = 'Sin Información';
    }
    if ($cita_3 == '0000-00-00') {
        $cita_3 = 'Sin Información';
    }

    #CLIENTES
    $codigo = date("ymd-Gis");
    $clienteconsul = $conexion->query("SELECT COUNT(*) AS cliente FROM m3_clientes WHERE correo = '$correo_0'");
    $arrayclienteconsul = mysqli_fetch_array($clienteconsul);
    if ($arrayclienteconsul['cliente'] == 0) {
        $insertarcliente = $conexion->query("INSERT INTO m3_clientes VALUES (NULL,'$nom_empresa_0','$area_contacto_0','$direccion_0','$telefono_0','$correo_0','$area_0','$movil_0','$codigo')");
    }

    #INSERTAR SOLICITUDES
    $insert = $conexion->query("INSERT INTO m1_solicitudes VALUES (NULL, '$solicitud_0', '$tipo_persona_0','$fecha_0','$nom_empresa_0','$area_contacto_0','$direccion_0','$telefono_0','$correo_0','$area_0','$movil_0','$marca_1','$nombre_1','$modelo_1','$descripcion_1','$cantidad_1','$partes_1','$prioridad_2','$motivo_2','$marca_2','$modelo_2','$descripcion_2','$falla_2','$descripcion_3','$cita_3','$_SESSION[ID]','$_SESSION[NOMBRE]')");
    if ($insert) {
        echo '<script type="text/javascript">
        alert("Datos agregados ");
        </script>';
    }
    #COTIZACIONES
    if ($nombre_1 == '' || $marca_1 == '' || $modelo_1 == '' || $descripcion_1 == '' || $cantidad_1 == '' || $partes_1 == '') {
        echo '<script type="text/javascript">
        alert("Campos vacios ");
        console.log(' . $nombre_1 . ' ' . $nombre_1 . ' ' . $marca_1 . ' ' . $modelo_1 . ' ' . $descripcion_1 . ' ' . $cantidad_1 . ' ' . $partes_1 . ');
        </script>';
    } else {
        #$folio = (bin2hex(random_bytes(5)));
        $folio = date("ymd-Gis");
        echo $con = "INSERT INTO m5_cotizaciones VALUES(NULL,'P-$folio','$solicitud_0','$tipo_persona_0','$fecha_0','$nom_empresa_0','$area_contacto_0','$direccion_0','$telefono_0','$correo_0','N/A','N/A','N/A','N/A','N/A','$marca_1','$nombre_1','$modelo_1','$descripcion_1','$cantidad_1','$partes_1','NADA')";
        $in = $conexion->query($con);
        if ($in) {
        } else {
            echo '<script type="text/javascript">
                alert("Error 1 ");
                </script>';
        }
    }
    #COTIZACIONES


    if ($insert) {
        header("Location: ../../Solicitudes.php");
    } else {
        echo '<script type="text/javascript">
                alert("Error ");
                window.location.href="../../Solicitudes.php";
                </script>';
    }
}



//EDITAR
if (isset($_POST['editar_solicitud'])) {
    $id = $_POST['id'];
    $solicitud_0 = $_POST['solicitud'];
    $tipo_persona_0 = $_POST['tipo_persona'];
    $fecha_0 = $_POST['fecha'];
    $nom_empresa_0 = $_POST['nom_empresa'];
    $area_contacto_0 = $_POST['area_contacto'];
    $direccion_0 = $_POST['direccion'];
    $telefono_0 = $_POST['telefono'];
    $correo_0 = $_POST['correo'];

    $marca_1 = $_POST['1_marca'];
    $nombre_1 = $_POST['1_nombre'];
    $modelo_1 = $_POST['1_modelo'];
    $descripcion_1 = $_POST['1_descripcion'];
    $cantidad_1 = $_POST['1_cantidad'];
    $partes_1 = $_POST['1_no_partes'];

    $prioridad_2 = $_POST['2_prioridad'];
    $motivo_2 = $_POST['2_motivo'];
    $marca_2 = $_POST['2_marca'];
    $modelo_2 = $_POST['2_modelo'];
    $descripcion_2 = $_POST['2_descripcion'];
    $falla_2 = $_POST['2_falla'];

    $descripcion_3 = $_POST['3_descripcion'];
    $cita_3 = $_POST['3_cita'];

    #
    if ($nombre_1 == '') {
        $nombre_1 = 'Sin Información';
    }
    if ($modelo_1 == '') {
        $modelo_1 = 'Sin Información';
    }
    if ($descripcion_1 == '') {
        $descripcion_1 = 'Sin Información';
    }
    if ($cantidad_1 == '') {
        $cantidad_1 = 'Sin Información';
    }
    if ($partes_1 == '') {
        $partes_1 = 'Sin Información';
    }
    if ($marca_2 == '') {
        $marca_2 = 'Sin Información';
    }
    if ($modelo_2 == '') {
        $modelo_2 = 'Sin Información';
    }
    if ($descripcion_2 == '') {
        $descripcion_2 = 'Sin Información';
    }
    if ($falla_2 == '') {
        $falla_2 = 'Sin Información';
    }
    if ($descripcion_3 == '') {
        $descripcion_3 = 'Sin Información';
    }
    if ($cita_3 == '0000-00-00') {
        $cita_3 = 'Sin Información';
    }
    $insert = $conexion->query("UPDATE m1_solicitudes SET 0_solicitud ='$solicitud_0', 0_persona = '$tipo_persona_0', 0_fecha = '$fecha_0', 0_empresa = '$nom_empresa_0', 0_contacto = '$area_contacto_0', 0_direccion = '$direccion_0', 0_telefono = '$telefono_0', 0_correo = '$correo_0', 1_marca = '$marca_1', 1_nombre = '$nombre_1', 1_modelo = '$modelo_1', 1_descripcion = '$descripcion_1', 1_cantidad = '$cantidad_1', 1_partes = '$partes_1', 2_prioridad = '$prioridad_2', 2_motivo = '$motivo_2', 2_marca = '$marca_2', 2_modelo = '$modelo_2', 2_descripcion = '$descripcion_2', 2_falla = '$falla_2', 3_descripcion = '$descripcion_3', 3_cita = '$cita_3' WHERE id = '$id' ");

    if ($insert) {
        header("Location: ../../Solicitudes.php");
    } else {
        echo '<script type="text/javascript">
                alert("Error ");
                window.location.href="../../Solicitudes.php";
                </script>';
    }
}


//ELIMINAR

if (isset($_POST['eliminar_solicitud'])) {
    $id = $_POST['id'];


    $eliminar_query = "DELETE FROM m1_solicitudes WHERE id = '$id'";
    if (mysqli_query($conexion, $eliminar_query)) {
        header("Location: ../../Solicitudes.php");
    } else {
        echo '<script type="text/javascript">
        alert("Error ");
        window.location.href="../../Solicitudes.php";
        </script>';
    }
}

//CONSULTA FECHAS

if (isset($_POST['Consultarfecha'])) {
    $filtro = $_POST['filtro'];
    echo $filtro;
    if ($filtro == 'Todos') {
        header("Location: ../../Solicitudes.php");
    } else {
        header("Location: ../../Solicitudes.php?filtro=" . $filtro);
    }
}
