<?php
include_once('../conexion/conexion.php');
session_start();
date_default_timezone_set('America/Mexico_City');
$fecha = date("Y-m-d");

#RECHAZAR
if (isset($_POST['btn-rechazar'])) {
    $Razon1 = $_POST['Razon1'];
    $Razon2 = $_POST['Razon2'];
    $folio = $_POST['folio'];

    if ($Razon1 == '') {
        $insert = $conexion->query("UPDATE m7_ventas_productos SET estatus = 'RECHAZADA', inf = '$Razon2' WHERE folio = '$folio'");
    } else if ($Razon2 == '') {
        $insert = $conexion->query("UPDATE m7_ventas_productos SET estatus = 'RECHAZADA', inf = '$Razon1' WHERE folio = '$folio'");
    }

    if ($insert) {
        header("Location: ../../Ventas.php");
    } else {
        echo '<script type="text/javascript">
        alert("Error ");
        window.location.href="../../Ventas.php";
        </script>';
    }
}

#ACEPTAR
if (isset($_POST['aceptar-btn'])) {
    $folio = $_POST['folio'];
    $insert = $conexion->query("UPDATE m7_ventas_productos SET estatus = 'ACEPTADA' WHERE folio = '$folio'");
    if ($insert) {
        header("Location: ../../Ventas.php");
    } else {
        echo '<script type="text/javascript">
        alert("Error ");
        window.location.href="../../Ventas.php";
        </script>';
    }
}


#TIEMPO DE ESPERA
if (isset($_POST['fecha_enviado'])) {
    $time = date("Y-m-d H:i:s");
    $folio = $_POST['folio'];
    echo $mensaje = "Cotización enviado: " . $time;
    $actualozarfecha = $conexion->query("UPDATE m7_ventas_productos SET inf = '$mensaje' WHERE folio = '$folio' ");
    if ($actualozarfecha) {
        header("Location: ../../Ventas.php");
    } else {
        echo '<script type="text/javascript">
        alert("Error ");
        window.location.href="../../Ventas.php";
        </script>';
    }
}



#EDITA PRODUCTOS ALMACEN NO
if (isset($_POST['editarNo'])) {
    $no1 = count($_POST['id1']);
    if ($no1 >= 1) {
        for ($a = 0; $a < $no1; $a++) {
            $id1 = $_POST['id1'][$a];
            $marca1 = $_POST['marca1'][$a];
            $modelo1 = $_POST['modelo1'][$a];
            $descripcion1 = $_POST['descripcion1'][$a];
            $cantidad1 = $_POST['cantidad1'][$a];
            $partes1 = $_POST['partes1'][$a];
            $precio1 = $_POST['precio1'][$a];
            $entrega1 = $_POST['entrega1'][$a];
            $update1 = $conexion->query("UPDATE m7_ventas_productos SET cantidad = '$cantidad1', precio = '$precio1', entrega = '$entrega1', marca = '$marca1', modelo = '$modelo1', descripcion='$descripcion1', partes = '$partes1' WHERE id = '$id1'");
        }
    }
    header('location: ../../Ventas.php');
}


#EDITA PRODUCTOS ALMACEN SI

if (isset($_POST['editarSi'])) {
    $si = count($_POST['id']);
    if ($si >= 1) {
        for ($i = 0; $i < $si; $i++) {
            $id = $_POST['id'][$i];
            $cantidad = $_POST['cantidad'][$i];
            $precio = $_POST['precio'][$i];
            $entrega = $_POST['entrega'][$i];
            $update = $conexion->query("UPDATE m7_ventas_productos SET cantidad = '$cantidad', precio = '$precio',entrega = '$entrega' WHERE id = '$id'");
        }
    }

    $no1 = count($_POST['id1']);
    if ($no1 >= 1) {
        for ($a = 0; $a < $no1; $a++) {
            $id1 = $_POST['id1'][$a];
            $marca1 = $_POST['marca1'][$a];
            $modelo1 = $_POST['modelo1'][$a];
            $descripcion1 = $_POST['descripcion1'][$a];
            $cantidad1 = $_POST['cantidad1'][$a];
            $partes1 = $_POST['partes1'][$a];
            $precio1 = $_POST['precio1'][$a];
            $entrega1 = $_POST['entrega1'][$a];
            $update1 = $conexion->query("UPDATE m7_ventas_productos SET cantidad = '$cantidad1', precio = '$precio1', entrega = '$entrega1', marca = '$marca1', modelo = '$modelo1', descripcion='$descripcion1', partes = '$partes1' WHERE id = '$id1'");
        }
    }
    header('location: ../../Ventas.php');
}


#AGREGA A COTIZACIONES TODOS LOS PROUDCTOS 
if (isset($_POST['btn-enviarplus'])) {

    if (!isset($_POST['cliente'])) {
        echo '<script type="text/javascript">
        alert("Error, Selecciona un cliente!");
        window.location.href="../../Ventas.php";
        </script>';
    } else {
        $folio = '2' . date('ymdGis');
        $codigo_cliente = $_POST['cliente'];

        #OBTENER LA INFORMACION DEL CLIETE

        $consulta_cliente = $conexion->query("SELECT * FROM m3_clientes WHERE codigo = '$codigo_cliente'");
        foreach ($consulta_cliente as $row) {
            $empresa = $row['empresa'];
            $contacto = $row['contacto'];
            $direccion = $row['direccion'];
            $telefono = $row['telefono'];
            $correo = $row['correo'];
        }

        $c1 = count($_POST["modelo"]);
        if ($c1 >= 1) {
            for ($i = 0; $i < $c1; $i++) {
                $modelos_almacen = $_POST["modelo"][$i];
                $cantidad = $_POST['cantidad'][$i];
                $consultaSI = $conexion->query("SELECT * FROM m4_almacen2 WHERE modelo = '$modelos_almacen'");
                foreach ($consultaSI as $row) {
                    $marca = $row['marca'];
                    $modelo = $row['modelo'];
                    $descripcion = $row['descripcion'];
                    $partes = $row['num_partes'];
                    $precio = $row['precio_lista'];
                    $entrega = $row['tiempo'];
                    $insert = $conexion->query("INSERT INTO m7_ventas_productos VALUES(NULL,'$codigo_cliente','$folio','$empresa','$contacto','$direccion','$telefono','$correo','$marca','$modelo','$descripcion','$cantidad','$partes','$precio','$entrega','EMITIDA','','','SI','$fecha','')");
                }
            }
        }

        $c2 = count($_POST["modelodos"]);
        if ($c2 >= 1) {
            for ($a = 0; $a < $c2; $a++) {
                $marca2 = $_POST['marca'][$a];
                $modelodos = $_POST['modelodos'][$a];
                $descripcion2 = $_POST['descripcion'][$a];
                $cantidaddos = $_POST['cantidaddos'][$a];
                $insert2 = $conexion->query("INSERT INTO m7_ventas_productos VALUES(NULL,'$codigo_cliente','$folio','$empresa','$contacto','$direccion','$telefono','$correo','$marca2','$modelodos','$descripcion2','$cantidaddos','','0','','EMITIDA','','','NO','$fecha','')");
            }
        }






        #OBTIENE LA CANTIDAD DE LOS MODELOS, CONSULTA LOS MODELOS Y HACE INSERT EN LA TABLA VENTAS
        /*for ($i = 0; $i < count($_POST['modelos']); $i++) {
            $modelos = $_POST['modelos'][$i];
            $consulta = $conexion->query("SELECT * FROM m4_almacen2 WHERE modelo = '$modelos'");
            foreach ($consulta as $row) {
                $marca = $row['marca'];
                $modelo = $row['modelo'];
                $descripcion = $row['descripcion'];
                $partes = $row['num_partes'];
                $precio = $row['precio_lista'];
                $entrega = $row['tiempo'];
                $insert = $conexion->query("INSERT INTO m7_ventas_productos VALUES (NULL,'$codigo_cliente','$folio','$empresa','$contacto','$direccion','$telefono','$correo','$marca','$modelo','$descripcion','0','$partes','$precio','$entrega','EMITIDA','','','SI')");
            }
        }*/
        header('location: ../../Ventas.php');
    }
}
