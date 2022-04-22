<?php
include_once('../conexion/conexion.php');
session_start();
date_default_timezone_set('America/Mexico_City');
$fecha = date("Y-m-d");

#SUBIR DOCUMENTO D1 
if (isset($_POST['btn-subirdocs1'])) {
    $folio = $_POST['folio'];
    $directorio = 'archivos/';
    $doc1 = $folio . 'salida11' . $_FILES['doc1']['name'];
    $subir_archivo1 = $directorio . basename($doc1);
    if (move_uploaded_file($_FILES['doc1']['tmp_name'], $subir_archivo1)) {
        $insert = $conexion->query("UPDATE m4_almacen_salidas SET  doc1 = '$doc1', estatus = 'LISTO' WHERE folio = '$folio' ");
        if ($insert) {
            header("Location: ../../Almacen.php");
        } else {
            echo '<script type="text/javascript">
            alert("Error ");
            window.location.href="../../Almacen.php";
            </script>';
        }
    } else {
        echo '<script type="text/javascript">
            alert("Error ");
            window.location.href="../../Almacen.php";
            </script>';
    }
}


#SUBIR DOCUMENTO D2  ABIERTO
if (isset($_POST['btn-subirdocs2'])) {
    $folio = $_POST['folio'];
    $directorio = 'archivos/';

    $doc2 = $folio . 'salida22' . $_FILES['doc2']['name'];

    $subir_archivo2 = $directorio . basename($doc2);
    if (move_uploaded_file($_FILES['doc2']['tmp_name'], $subir_archivo2)) {
        $insert = $conexion->query("UPDATE m4_almacen_salidas SET doc2 = '$doc2', estatus = 'LISTO' WHERE folio = '$folio' ");
        if ($insert) {
            header("Location: ../../Almacen.php");
        } else {
            echo '<script type="text/javascript">
            alert("Error ");
            window.location.href="../../Almacen.php";
            </script>';
        }
    } else {
        echo '<script type="text/javascript">
            alert("Error ");
            window.location.href="../../Almacen.php";
            </script>';
    }
}
#ENTREGAR MATERIAL
if (isset($_POST['entregar-material'])) {
    $folio = $_POST['folio'];
    $cant = count($_POST['modelo']);
    for ($i = 0; $i < $cant; $i++) {
        $cantidad = $_POST['cantidad'][$i];
        $modelo = $_POST['modelo'][$i];
        $consulta = $conexion->query("SELECT * FROM m4_almacen2 WHERE modelo = '$modelo'");
        foreach ($consulta as $row) {
            if ($cantidad <= $row['cantidad']) {
                echo $resultado =  $row['cantidad'] - $cantidad;
                $insert  = $conexion->query("UPDATE m4_almacen2 SET cantidad = '$resultado' WHERE modelo = '$modelo'");
                $insert2 = $conexion->query("UPDATE m4_almacen_salidas SET estatus = 'ENTREGADO', id_user = '$_SESSION[ID]', name_user = '$_SESSION[NOMBRE]'  WHERE  folio = '$folio' and  modelo = '$modelo'");
                $insert3 = $conexion->query("UPDATE m7_ventas_productos SET estatus = 'ENTREGADO', fecha2 = '$fecha' WHERE folio = '$folio'");
            } else {
                echo '<script type="text/javascript">
                alert("Error con el modelo: ' . $modelo . ' Haga los cambios manualmente");
                window.location.href="../../Almacen.php";
                </script>';
            }
        }
    }
    header("Location: ../../Almacen.php");
    /*
    for ($i = 0; $i < $cant; $i++) {
        $cantidad = $_POST['cantidad'][$i];
        $modelo = $_POST['modelo'][$i];
        $consulta = $conexion->query("SELECT * FROM m4_almacen2 WHERE modelo = '$modelo'");
        foreach($consulta as $consulta){
            $cant = $_POST['cantidad'] ;
            echo $cant . $cantidad;
            if ($cantidad <= $cant){
                echo 'Hacer el crud <br>';
            }

        }
    } */
}


#NOTIFICAR ALMACEN SALIDA
if (isset($_POST['notificaralmacen'])) {

    $contar = count($_POST['codigo_cliente']);
    for ($i = 0; $i < $contar; $i++) {
        $codigo_cliente = $_POST['codigo_cliente'][$i];
        $folio = $_POST['folio'][$i];
        $empresa = $_POST['empresa'][$i];
        $contacto = $_POST['contacto'][$i];
        $direccion = $_POST['direccion'][$i];
        $telefono = $_POST['telefono'][$i];
        $correo = $_POST['correo'][$i];
        $marca = $_POST['marca'][$i];
        $modelo = $_POST['modelo'][$i];
        $descripcion = $_POST['descripcion'][$i];
        $cantidad = $_POST['cantidad'][$i];
        $partes = $_POST['partes'][$i];
        $precio = $_POST['precio'][$i];

        $insert = $conexion->query("INSERT INTO m4_almacen_salidas VALUES(NULL,'$codigo_cliente','$folio','$empresa','$contacto','$direccion','$telefono','$correo','$marca','$modelo','$descripcion','$cantidad','$partes','$precio','EMITIDO','','','','') ");
    }
    header("Location: ../../Facturacion.php");
}

#ENTRADA ALMACEN
if (isset($_POST['btnsubirdocentrada'])) {
    $folio = $_POST['folio'];
    $directorio = 'archivos/';
    $doc1 = $folio . 'entradacotizaplus' . $_FILES['doc1']['name'];
    $doc2 = $folio . 'entradafacturaplus' . $_FILES['doc2']['name'];
    $subir_archivo1 = $directorio . basename($doc1);
    $subir_archivo2 = $directorio . basename($doc2);
    if (move_uploaded_file($_FILES['doc1']['tmp_name'], $subir_archivo1) && move_uploaded_file($_FILES['doc2']['tmp_name'], $subir_archivo2)) {
        $insert = $conexion->query("UPDATE m4_almacen_entradas_vs SET  doc1 = '$doc1', doc2 = '$doc2', estatus = 'ENTREGADO', id_user= '$_SESSION[ID]', name_user = '$_SESSION[NOMBRE]' WHERE folio = '$folio' ");
        if ($insert) {
            header("Location: ../../Almacen.php");
        } else {
            echo '<script type="text/javascript">
            alert("Error ");
            //window.location.href="../../Almacen.php";
            </script>';
        }
    } else {
        echo '<script type="text/javascript">
            alert("Error archivos");
            //window.location.href="../../Almacen.php";
            </script>';
    }
}

#NOTIFICAR ALMACEN ENTRADA 
if (isset($_POST['EnviarAlmacen'])) {
    $contar = count($_POST['folio']);

    if ($contar >= 1) {
        for ($i = 0; $i < $contar; $i++) {
            $folio = $_POST['folio'][$i];
            $cantidad = $_POST['cantidad'][$i];
            $info = $_POST['info'][$i];
            $insert = $conexion->query("INSERT INTO m4_almacen_entradas_vs VALUES(NULL, '$folio','$cantidad','$info','ENVIADO','','','','')");
        }
        header("Location: ../../Compras.php");
    }
}
