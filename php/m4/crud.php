<?php
include_once('../conexion/conexion.php');
session_start();
date_default_timezone_set('America/Mexico_City');
$fecha = date("Y-m-d");

if (isset($_POST['agregaralmacen'])) {

    $posicion = $_POST['posicion'];
    $marca = $_POST['marca'];
    $modelo = $_POST['modelo'];
    $num_partes = $_POST['num_partes'];
    $no_serie = $_POST['no_serie'];
    $descripcion = $_POST['descripcion'];
    $no_pedimiento_aduanal = $_POST['no_pedimiento_aduanal'];
    $cantidad = $_POST['cantidad'];
    $cantidad_max = $_POST['cantidad_max'];
    $cantidad_min = $_POST['cantidad_min'];
    $punto_reorden = $_POST['punto_reorden'];
    $precio_iacsa = $_POST['precio_iacsa'];
    $precio_lista = $_POST['precio_lista'];
    $fecha_solicitud = $_POST['fecha_solicitud'];
    $fecha_arribo = $_POST['fecha_arribo'];
    $tiempo = $_POST['tiempo'];
    $unidad = $_POST['unidad'];
    $proveedor = $_POST['proveedor'];
    $observaciones = $_POST['observaciones'];
    $estatus = $_POST['estatus'];

    $insert = $conexion->query("INSERT INTO m4_almacen2 VALUES(NULL,'$posicion','$marca','$modelo','$num_partes','$no_serie','$descripcion','$no_pedimiento_aduanal','$cantidad','$cantidad_max','$cantidad_min','$punto_reorden','$precio_iacsa','$precio_lista','$fecha_solicitud','$fecha_arribo','$tiempo','$unidad','$proveedor','$observaciones','$estatus')");

    if ($insert) {
        header("Location: ../../Almacen.php");
    } else {
        echo '<script type="text/javascript">
                alert("Error ");
                window.location.href="../../Almacen.php";
                </script>';
    }
}



if (isset($_POST['editaralmacen'])) {
    $id = $_POST['id'];
    $posicion = $_POST['posicion'];
    $marca = $_POST['marca'];
    $modelo = $_POST['modelo'];
    $num_partes = $_POST['num_partes'];
    $no_serie = $_POST['no_serie'];
    $descripcion = $_POST['descripcion'];
    $no_pedimiento_aduanal = $_POST['no_pedimiento_aduanal'];
    $cantidad = $_POST['cantidad'];
    $cantidad_max = $_POST['cantidad_max'];
    $cantidad_min = $_POST['cantidad_min'];
    $punto_reorden = $_POST['punto_reorden'];
    $precio_iacsa = $_POST['precio_iacsa'];
    $precio_lista = $_POST['precio_lista'];
    $fecha_solicitud = $_POST['fecha_solicitud'];
    $fecha_arribo = $_POST['fecha_arribo'];
    $tiempo = $_POST['tiempo'];
    $unidad = $_POST['unidad'];
    $proveedor = $_POST['proveedor'];
    $observaciones = $_POST['observaciones'];
    $estatus = $_POST['estatus'];

    $consulta = "UPDATE m4_almacen2 SET posicion = '$posicion', marca = '$marca', modelo = '$modelo', num_partes = '$num_partes', no_serie = '$no_serie',descripcion = '$descripcion',no_pedimiento_aduanal = '$no_pedimiento_aduanal',cantidad = '$cantidad', cantidad_max = '$cantidad_max', cantidad_min = '$cantidad_min', punto_reorden = '$punto_reorden', precio_iacsa = '$precio_iacsa', precio_lista = '$precio_lista', fecha_solicitud = '$fecha_solicitud', fecha_arribo = '$fecha_arribo', tiempo = '$tiempo', unidad = '$unidad', proveedor = '$proveedor', observaciones = '$observaciones', estatus='$estatus'  WHERE id = '$id'";
    $insert = $conexion->query($consulta);
    if ($insert) {
        header("Location: ../../Almacen.php");
    } else {
        echo '<script type="text/javascript">
                alert("Error ");
                window.location.href="../../Almacen.php";
                </script>';
    }
}

if (isset($_POST['eliminaralmacen'])) {
    $id = $_POST['id'];
    $insert = $conexion->query("DELETE FROM m4_almacen WHERE id = '$id'");
    if ($insert) {
        header("Location: ../../Almacen.php");
    } else {
        echo '<script type="text/javascript">
                alert("Error ");
                window.location.href="../../Almacen.php";
                </script>';
    }
}

#Notificar almacen desde facturación
if (isset($_POST['btn-noti-almacen'])) {
    $folio = $_POST['folio'];
    $empresa = $_POST['empresa'];
    $contacto = $_POST['contacto'];
    $direccion = $_POST['direccion'];
    $telefono = $_POST['telefono'];
    $correo = $_POST['correo'];
    $marca = $_POST['marca'];
    $nombre = $_POST['nombre'];
    $modelo = $_POST['modelo'];
    $partes = $_POST['partes'];
    $descripcion = $_POST['descripcion'];
    $cantidad = $_POST['cantidad'];
    $precio = $_POST['precio'];
    $insert = $conexion->query("INSERT INTO m4_almacen_mjs VALUES(NULL, '$folio','$empresa','$contacto','$direccion','$telefono','$correo','$marca','$nombre','$modelo','$partes','$descripcion','$cantidad','$precio','','','1','ABIERTO','','')");
    if ($insert) {
        header("Location: ../../Facturacion.php");
    } else {
        echo '<script type="text/javascript">
            alert("Error ");
            window.location.href="../../Facturacion.php";
            </script>';
    }
}


#SUBIR DOCUMENTO D1 
if (isset($_POST['btn-subirdocs1'])) {
    $folio = $_POST['folio'];
    $directorio = 'archivos/';
    $doc1 = $folio . 'salida1' . $_FILES['doc1']['name'];
    $subir_archivo1 = $directorio . basename($doc1);
    if (move_uploaded_file($_FILES['doc1']['tmp_name'], $subir_archivo1)) {
        $insert = $conexion->query("UPDATE m4_almacen_mjs SET  f = '$doc1', estatus = 'ENTREGADO' WHERE folio = '$folio' ");
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

    $doc2 = $folio . 'salida2' . $_FILES['doc2']['name'];

    $subir_archivo2 = $directorio . basename($doc2);
    if (move_uploaded_file($_FILES['doc2']['tmp_name'], $subir_archivo2)) {
        $insert = $conexion->query("UPDATE m4_almacen_mjs SET ne = '$doc2' ,estatus = 'ENTREGADO' WHERE folio = '$folio' ");
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


#SUBIR DOS DOCUMENTOS A LA VEZ
/*
if (isset($_POST['btn-subirdocs'])) {
    $folio = $_POST['folio'];
    $directorio = 'archivos/';
    $doc1 = $folio . 'salida1' . $_FILES['doc1']['name'];
    $doc2 = $folio . 'salida2' . $_FILES['doc2']['name'];
    $subir_archivo1 = $directorio . basename($doc1);
    $subir_archivo2 = $directorio . basename($doc2);
    if (move_uploaded_file($_FILES['doc1']['tmp_name'], $subir_archivo1) && move_uploaded_file($_FILES['doc2']['tmp_name'], $subir_archivo2)) {
        $insert = $conexion->query("UPDATE m4_almacen_mjs SET  f = '$doc1', ne = '$doc2' ,estatus = 'ENTREGADO' WHERE folio = '$folio' ");
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
*/

#resta de productos
if (isset($_POST['entregar-material'])) {

    $folio = $_POST['folio'];
    $modelo = $_POST['modelo'];
    $cantidad = $_POST['cantidad'];
    $partes = $_POST['partes'];
    $correo = $_POST['correo'];
    $empresa = $_POST['empresa'];
    $contacto = $_POST['contacto'];
    $direccion = $_POST['direccion'];
    $telefono = $_POST['telefono'];
    $marca = $_POST['marca'];
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];


    //MODELO\\
    $insert = $conexion->query("SELECT * FROM m4_almacen2 WHERE modelo = '$modelo'");
    foreach ($insert as $row) {
        $resultado =  $row['cantidad'] - $cantidad;
        if ($resultado <= 0) {
            echo '<script type="text/javascript">
            alert("Existencias insuficientes ");
            window.location.href="../../Almacen.php";
            </script>';
        }
        #, 
        $resultado1 = $conexion->query("UPDATE m4_almacen2 set cantidad = $resultado WHERE modelo = '$modelo'");
        $resultado2 = $conexion->query("UPDATE m4_almacen_mjs SET estatus = 'CERRADO', id_user = '$_SESSION[ID]', name_user = '$_SESSION[NOMBRE]' WHERE folio = '$folio'");
        if ($resultado1 && $resultado2) {
            #AGREGAR USUARIO Y PRODUCTOS A CLIENTES

            $consultarfolio = $conexion->query("SELECT * FROM m3_clientes WHERE correo = '$correo'");
            foreach ($consultarfolio as $rowcodigo) {
                $codigo_cliente = $rowcodigo['codigo'];
                $insertarclientepro = $conexion->query("INSERT INTO m3_clientes_productos VALUES (NULL,'$codigo_cliente','$folio','$marca','$nombre','$modelo','$partes','$descripcion')");
                if ($insertarclientepro) {
                    $insertventas = $conexion->query("UPDATE m7_ventas SET estatus = 'ENTREGADO' , fecha2 = '$fecha' WHERE folio = '$folio'");

                    header("Location: ../../Almacen.php");
                } else {
                    echo '<script type="text/javascript">
                alert("Error Productos");
                window.location.href="../../Almacen.php";
                </script>';
                }
            }

            /*$codigo = date("ymd-Gis");
            $clienteconsul = $conexion->query("SELECT COUNT(*) AS cliente FROM m3_clientes WHERE correo = '$correo'");
            $arrayclienteconsul = mysqli_fetch_array($clienteconsul);
            if ($arrayclienteconsul['cliente'] == 0) {
                $insertarcliente = $conexion->query("INSERT INTO m3_clientes VALUES (NULL,'$empresa','$contacto','$direccion','$telefono','$correo','$codigo')");
                $insertarclienteproducto = $conexion->query("INSERT INTO m3_clientes_productos VALUES(NULL,'$codigo','$folio','$marca','$nombre','$modelo','$partes','$descripcion')");
                if ($insertarcliente &&  $insertarclienteproducto) {
                    $insertventas = $conexion->query("UPDATE m7_ventas SET estatus = 'ENTREGADO' WHERE folio = '$folio'");

                    header("Location: ../../Almacen.php");
                } else {
                    echo '<script type="text/javascript">
                    alert("Error  Clientes || Productos");
                    window.location.href="../../Almacen.php";
                    </script>';
                }
            } else {
                $consultacorreo = $conexion->query("SELECT * FROM m3_clientes WHERE correo = '$correo'");
                foreach ($consultacorreo as $rowcorreo) {
                    $codigo_old = $rowcorreo['codigo'];
                    $insertarclientepro = $conexion->query("INSERT INTO m3_clientes_productos VALUES (NULL,'$codigo_old','$folio','$marca','$nombre','$modelo','$partes','$descripcion')");
                    if ($insertarclientepro) {
                        $insertventas = $conexion->query("UPDATE m7_ventas SET estatus = 'ENTREGADO' WHERE folio = '$folio'");

                        header("Location: ../../Almacen.php");
                    } else {
                        echo '<script type="text/javascript">
                    alert("Error Productos");
                    window.location.href="../../Almacen.php";
                    </script>';
                    }
                }
            }*/
            #AGREGAR USUARIO Y PRODUCTOS A CLIENTES
            header("Location: ../../Almacen.php");
        } else {
            echo '<script type="text/javascript">
            alert("Error ");
            window.location.href="../../Almacen.php";
            </script>';
        }
    }

    //PARTES\\
    $insert = $conexion->query("SELECT * FROM m4_almacen2 WHERE num_partes = '$partes'");
    foreach ($insert as $row) {
        $resultadop = $row['cantidad'] - $cantidad;
        if ($resultadop <= 0) {
            echo '<script type="text/javascript">
            alert("Existencias insuficientes ");
            window.location.href="../../Almacen.php";
            </script>';
        }
        #, 
        $resultado1 = $conexion->query("UPDATE m4_almacen2 set cantidad = $resultadop WHERE num_partes = '$partes'");
        $resultado2 = $conexion->query("UPDATE m4_almacen_mjs SET estatus = 'CERRADO', id_user = '$_SESSION[ID]', name_user = '$_SESSION[NOMBRE]' WHERE folio = '$folio'");
        if ($resultado1 && $resultado2) {
            #AGREGAR USUARIO Y PRODUCTOS A CLIENTES
            $codigo = date("ymd-Gis");
            $clienteconsul = $conexion->query("SELECT COUNT(*) AS cliente FROM m3_clientes WHERE correo = '$correo'");
            $arrayclienteconsul = mysqli_fetch_array($clienteconsul);
            if ($arrayclienteconsul['cliente'] == 0) {
                $insertarcliente = $conexion->query("INSERT INTO m3_clientes VALUES (NULL,'$empresa','$contacto','$direccion','$telefono','$correo','$codigo')");
                $insertarclienteproducto = $conexion->query("INSERT INTO m3_clientes_productos VALUES(NULL,'$codigo','$folio','$marca','$nombre','$modelo','$partes','$descripcion')");
                if ($insertarcliente &&  $insertarclienteproducto) {
                    $insertventas = $conexion->query("UPDATE m7_ventas SET estatus = 'ENTREGADO', fecha2 = '$fecha' WHERE folio = '$folio'");

                    header("Location: ../../Almacen.php");
                } else {
                    echo '<script type="text/javascript">
                     alert("Error  Clientes || Productos");
                     window.location.href="../../Almacen.php";
                     </script>';
                }
            } else {
                $consultacorreo = $conexion->query("SELECT * FROM m3_clientes WHERE correo = '$correo'");
                foreach ($consultacorreo as $rowcorreo) {
                    $codigo_old = $rowcorreo['codigo'];
                    $insertarclientepro = $conexion->query("INSERT INTO m3_clientes_productos VALUES (NULL,'$codigo_old','$folio','$marca','$nombre','$modelo','$partes','$descripcion')");
                    if ($insertarclientepro) {
                        $insertventas = $conexion->query("UPDATE m7_ventas SET estatus = 'ENTREGADO', fecha2 = '$fecha' WHERE folio = '$folio'");
                        header("Location: ../../Almacen.php");
                    } else {
                        echo '<script type="text/javascript">
                     alert("Error Productos");
                     window.location.href="../../Almacen.php";
                     </script>';
                    }
                }
            }
            #AGREGAR USUARIO Y PRODUCTOS A CLIENTES
            header("Location: ../../Almacen.php");
        } else {
            echo '<script type="text/javascript">
            alert("Error ");
            window.location.href="../../Almacen.php";
            </script>';
        }
    }
}

#NOTIFICAR ALMACEN ENTRADA

if (isset($_POST['btnnotificarentrada'])) {
    $folio = $_POST['folio'];
    $marca = $_POST['marca'];
    $nombre = $_POST['nombre'];
    $modelo = $_POST['modelo'];
    $descripcion = $_POST['descripcion'];
    $cantidad = $_POST['cantidad'];
    $partes = $_POST['partes'];
    $id_producto = $_POST['idproductoalmacen'];

    $insert = $conexion->query("INSERT INTO m4_almacen_entradas VALUES (NULL, '$folio','$marca','$nombre','$modelo','$descripcion','$cantidad','$partes','Enviado','','$id_producto','','','','')");
    if ($insert) {
        header("Location: ../../Compras.php");
    } else {
        echo '<script type="text/javascript">
            alert("Error ");
            window.location.href="../../Compras.php";
            </script>';
    }
}

#ENTREGA DE DOCUMENTOS DE ENTRADA DE ALMACEN

if (isset($_POST['btnsubirdocentrada'])) {
    $folio = $_POST['folio'];
    $directorio = 'archivos/';
    $doc1 = $folio . 'entradacotizacion' . $_FILES['doc1']['name'];
    $doc2 = $folio . 'entradafactura' . $_FILES['doc2']['name'];
    $subir_archivo1 = $directorio . basename($doc1);
    $subir_archivo2 = $directorio . basename($doc2);
    if (move_uploaded_file($_FILES['doc1']['tmp_name'], $subir_archivo1) && move_uploaded_file($_FILES['doc2']['tmp_name'], $subir_archivo2)) {
        $insert = $conexion->query("UPDATE m4_almacen_entradas SET  doc1 = '$doc1', doc2 = '$doc2', estatus = 'ENTREGADO', id_user= '$_SESSION[ID]', name_user = '$_SESSION[NOMBRE]' WHERE folio = '$folio' ");
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
