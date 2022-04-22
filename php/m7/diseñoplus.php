<?php

include_once('../conexion/conexion.php');
session_start();
date_default_timezone_set('America/Mexico_City');
$fecha = date("dmy");
$fecha1 = date("d/m/Y");
$query = $conexion->query("SELECT DISTINCT folio,empresa,contacto,correo,estatus,telefono FROM m7_ventas_productos WHERE folio = '$_POST[folio]'");
foreach ($query as $dis) {
    #$importe = $row['precio'] * $row['1_cantidad'];
    #$iva = ($importe * .16);
    #$total = $importe + $iva;
?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Cotizacion</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
    </head>

    <body>

        <!-- 1 -->
        <div class="row">
            <div class="col-2">
                <center><img class="logo" src="../../assets/img/logo.png" alt=""></center>
            </div>
            <div class="col-8">
                <center> <strong class="e">INGENIERÍA, AUTOMATIZACIÓN Y CONTROL INDUSTRIAL S.A. DE C.V.</strong>
                    <p class="e">44 Poniente #502 Esq. Blvd 5 de Mayo. Col. Santa María. C.P. 72080, Puebla, México. <br>
                        RFC:IAC 020821 FEO</p>
                </center>
            </div>
        </div>
        <!-- 2 -->
        <div class="row">
            <div class="col-8"></div>
            <div class="col-4">
                <table class="table table-striped">
                    <tr>
                        <td><strong>COTIZACIÓN</strong></td>
                    </tr>
                    <tr>
                        <td>
                            <p><?php echo $_POST['folio'] ?>/<?php echo $fecha ?></p>
                        </td>
                    </tr>
                </table>

            </div>
        </div>
        <!-- 3 -->
        <div class="row">
            <div class="col-5">
                <strong>COTIZADO A: </strong><br>
                <strong>Empresa: </strong> <?php echo $dis['empresa'] ?><br>
                <strong>Contacto: </strong><?php echo $dis['contacto'] ?><br>
                <strong>Teléfono: </strong><?php echo $dis['telefono'] ?><br>
                <strong>Email: </strong> <?php echo $dis['correo'] ?>
            </div>
            <div class="col-4">

            </div>
            <div class="col-3">
                <br>
                <strong>Elaboración: </strong> <?php echo $fecha1 ?> <br>
                <strong>Válida Hasta: </strong> <?PHP echo date("d/m/Y", strtotime($fecha . "+ 5 days"));  ?> <br>
                <strong>Estatus: </strong> <?php echo $dis['estatus'] ?>
            </div>

        </div>
        <!-- 4 -->
        <br>
        <div class="row">
            <div class="col-12">
                <strong style="font-size: 13px;"> AGRADECEMOS EL INTERÉS MOSTRADO A NUESTRA EMPRESA Y TENEMOS EL GRADO DE PONER A SU CONSIDERACIÓN LA SIGUIENTE PROPUESTA</strong>

            </div>
            <div class="col-12">
                <center>
                    <table class="table table-bordered">
                        <thead class="thead-dark">
                            <tr>
                                <th>IMAGEN</th>
                                <th>CANTIDAD</th>
                                <th>UNIDAD</th>
                                <th>MARCA</th>
                                <th>MODELO</th>
                                <th>DESCRIPCIÓN</th>
                                <th>TIEMPO DE ENTREGA</th>
                                <th>PRECIO UNITARIO</th>
                                <th>IMPORTE</th>
                                <th>MONEDA</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 0;
                            $subtotal = 0;
                            $consulta = $conexion->query("SELECT *  FROM m7_ventas_productos WHERE folio = '$_POST[folio]'");
                            foreach ($consulta as $row) {

                                echo '
                                <tr>
                                    <td></td>
                                    <td>' . $row["cantidad"] . '</td>
                                    <td> Piezas </td>
                                    <td>' . $row["marca"] . '</td>
                                    <td>';

                                if (isset($_POST['check'][$i])) {
                                    echo '';
                                } else {
                                    echo $row["modelo"];
                                }
                                echo '</td>
                                    <td>';
                                if (isset($_POST['descrp'][$i]) && $_POST['descrp'][$i] != '') {
                                    echo $_POST['descrp'][$i];
                                } else {
                                    echo $row["descripcion"];
                                }
                                echo  '</td>
                                    <td>' . $row["entrega"] . '</td>
                                    <td>' . number_format($row["precio"], 2) . '</td>
                                    <td>' . number_format($importe = $row["cantidad"] * $row["precio"], 2) . '</td>
                                    <td><strong>MXM</strong></td>
                                </tr>
                            ';
                                $subtotal = $subtotal + (float)$importe;
                                $i++;
                            }
                            ?>
                        </tbody>
                    </table>
                </center>

            </div>
        </div>
        <!-- 5 -->
        <div class="row">
            <div class="col-8">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th><strong>OBSERVACIONES</strong></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td style="font-size: 10px;">
                                <strong>
                                    1.- FAVOR DE CONSIDERAR ACTUALIZAR OFERTA EN CASO DE MODIFICAR LAS PIEZAS SOLICITADAS. <br>
                                    2.- DEBIDO A LA ESCASEZ DE MATERIA PRIMA A NIVEL MUNDIAL, LOS TIEMPOS DE ENTREGA PUEDE CAMBIAR, CONSIDERE ESTO EN SU PROCESO DE COMPRA.
                                </strong>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="col-4">
                <table class="table table-borderless">
                    <tr>
                        <th><strong>SUBTOTAL</strong></th>
                        <td>$ <?php echo number_format($subtotal, 2)  ?></td>
                    </tr>
                    <tr>
                        <th><strong>IVA 16%</strong></th>
                        <td>$ <?php echo number_format($iva = ($subtotal * .16), 2);
                                ?></td>
                    </tr>
                    <tr>
                        <th><strong>TOTAL</strong></th>
                        <td><strong>$ <?php echo number_format($total = $subtotal + $iva, 2);
                                        ?></strong></td>
                    </tr>
                </table>
            </div>
        </div>

        <!--6-->
        <div class="row">
            <div class="col-12">
                <strong>CONDICIONES COMERCIALES:</strong><br>
                <strong>1.-</strong> Forma de pago al contado 100%. <br>
                <strong>2.-</strong> Vigencia de la cotización, 5 días naturales a partir de la fecha de expedición<br>
                <strong>3.-</strong> Precios y Tiempos de entrega, sujetos a cambio sin previo aviso.<br>
                <strong>4.-</strong> Precios cotizados en Dólares Americanos tomar tipo de cambio del DOF del día de su pago.<br>
                <strong>5.-</strong> Para procesar su pedido es necesario colocar una orden de compra indicando el número de cotización, este debe ser antes de las 11:00 pm después de ese horario considerar un día hábil más.<br>
                <strong>6.-</strong> Los productos son libres a bordo dentro de la ciudad de Puebla.<br>
                <strong>7.-</strong> En caso de no estar ubicados en el área metropolitana el flete será cubierto por el cliente.<br>
                <strong>8.-</strong> Si, requiere factura favor de solicitarla con su accesor de ventas, antes del último día del mes en que se realizó la comprá, IMPORTANTE ENVIAR DATOS FISCALES VIGENTES, USO DEL CFDI, MÉTODO DE PAGO Y FORMA DE PAGO.<br>
                <strong>9.-</strong> Toda cancelación causará un importe del 20% sobre el total de la orden de comprá y el 100% en piezas especiales. <br>
                <strong>10.-</strong> La garantía de los productos es la que otorga cada fabricante.<br>
                <strong>11.-</strong> Los pagos pueden realizarse por medio de depósito o transferencia bancaria, única y exclusivamente en las siguientes cuentas:<br>
            </div>
        </div>
        <!--7-->
        <br>
        <div class="row">
            <div class="col-7">
                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                            <th><strong>BANCO</strong></th>
                            <th><strong>MONEDA</strong></th>
                            <th><strong>SUCURSAL</strong></th>
                            <th><strong></strong></th>
                            <th><strong>CLABE</strong></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>BBVA BANCOMER</td>
                            <td>Pesos</td>
                            <td>0512</td>
                            <td></td>
                            <td>01265000136774415 8</td>
                        </tr>
                        <tr>
                            <td>BBVA BANCOMER</td>
                            <td>Dólares</td>
                            <td>3738</td>
                            <td></td>
                            <td>01265000136774539 3</td>
                        </tr>

                    </tbody>
                </table>
            </div>
            <div class="col-5">
                <center>
                    <strong>Quedo a sus Ordenes</strong>
                    <br><br>
                </center>
                <div class="row">

                    <div class="col-6">
                        <center> <?php echo $_SESSION['NOMBRE'] ?> <br> <strong>AGENTE DE VENTAS</strong> </center>
                    </div>
                    <div class="col-6">
                        <center><strong>SOPORTE TÉCNICO</strong></center>
                    </div>
                </div>
            </div>
        </div>


    </body>

    </html>

<?php
}

?>