<?php
include_once('global/cyp/cabezera.php');
if ($_SESSION['M7'] == 'Si' || $_SESSION['M7'] == 'TEM') {
} else {
    echo '
    <script>
    alert("Sin permisos");
    window.location.replace("Index.php");
    </script>';
}
?>


<div class="page-wrapper">

    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-7 align-self-center">
                <h3 id="hora-dinamico" class="page-title text-truncate text-dark font-weight-medium mb-1"></h3>
                <script>
                    function mueveReloj() {
                        momentoActual = new Date()
                        hora = momentoActual.getHours()
                        minuto = momentoActual.getMinutes()
                        segundo = momentoActual.getSeconds()
                        horaImprimible = hora + " : " + minuto + " : " + segundo
                        document.getElementById("hora-dinamico").innerHTML = horaImprimible;
                        setTimeout(mueveReloj, 1000)
                    }
                </script>
                <div class="d-flex align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb m-0 p-0">
                            <li class="breadcrumb-item">Ventas
                            </li>
                        </ol>
                    </nav>
                </div>

            </div>

        </div>
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-6">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title mb-3">Modulo de Ventas</h4>

                        <ul class="nav nav-tabs mb-3">
                            <li class="nav-item">
                                <a href="#ventas" data-toggle="tab" aria-expanded="true" class="nav-link active">
                                    <i class="mdi mdi-account-circle d-lg-none d-block mr-1"></i>
                                    <span class="d-none d-lg-block">Ventas</span>
                                </a>

                            </li>
                            <li class="nav-item">
                                <a href="#agregarplus" data-toggle="tab" aria-expanded="false" class="nav-link">
                                    <i class="mdi mdi-home-variant d-lg-none d-block mr-1"></i>
                                    <span class="d-none d-lg-block">Agregar (+)</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#ventasplus" data-toggle="tab" aria-expanded="false" class="nav-link">
                                    <i class="mdi mdi-home-variant d-lg-none d-block mr-1"></i>
                                    <span class="d-none d-lg-block">Ventas (+)</span>
                                </a>
                            </li>

                        </ul>

                        <div class="tab-content">
                            <div class="tab-pane show active" id="ventas">
                                <?php
                                $query = mysqli_query($conexion, "SELECT * FROM m7_ventas WHERE id ORDER BY id DESC");
                                foreach ($query as $row) {

                                ?>
                                    <div class="card">
                                        <div class="card-body collapse show">
                                            <h4 class="card-title">Folio:<?php echo $row['folio']; ?></h4>
                                            <p style="color:black;"><strong>Empresa: </strong> <?php echo $row['empresa'] ?> <strong> Contacto: </strong> <?php echo $row['contacto'] ?> <strong> Telefono: </strong> <?php echo $row['telefono'] ?></p>
                                            <p style="color:black;"><strong>Nombre: </strong><?php echo $row['1_nombre'] ?> <strong> Modelo: </strong><?php echo $row['1_modelo'] ?> <strong>Número de partes</strong> <?php echo $row['1_partes'] ?>
                                                <strong> Descripción: </strong><?php echo $row['1_descripcion'] ?> <strong> Tiempo de entrega: </strong><?php echo $row['entrega'] ?>
                                                <strong> Precio unitario: </strong> <?php echo '$' . $row['precio'] ?> Cantidad Solicitada: <strong><?php echo $row['1_cantidad'] ?></strong>
                                            </p>
                                            <?php
                                            if ($row['estatus'] == 'EMITIDA' && $row['inf'] == 'null') {
                                                echo '<p style="color:red;">Aun no se envia esta cotización </p>';
                                            } else if ($row['estatus'] == 'EMITIDA' && $row['inf'] != 'null') {
                                                echo '<p style = "color:green;">' . $row['inf'] . '</p>';
                                            }


                                            if ($row['estatus'] == 'EMITIDA') {
                                                #####CUANDO LA SOLICITUD ES EMITIDA (ACEPTADA / RECHAZADA)#####
                                            ?>

                                                <div class="row">
                                                    <div class="col-3">
                                                        <form action="php/m7/diseño.php" method="post">
                                                            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                                                            <div class="input-group">
                                                                <div class="input-group-prepend">
                                                                    <label style="color:black">Ocultar modelo </label>
                                                                    <div class="input-group-text">
                                                                        <input type="checkbox" name="modelo-ocul">
                                                                    </div>
                                                                </div>
                                                                <input type="text" placeholder="Descripcion opcional" class="form-control" name="descripcion-ocul">
                                                            </div>
                                                            <button type="submit" class="btn btn-dark">Generar Cotización</button>
                                                        </form>
                                                    </div>
                                                    <br>
                                                    <!--
                                                    <div class="col-3">
                                                        <form action="php/m7/diseño.php" method="post">
                                                            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                                                            <button type="submit" class="btn btn-dark">Generar Cotización</button>
                                                        </form>
                                                    </div> -->
                                                    <div class="col-3">
                                                        <form action="php/m7/crud.php" method="POST">
                                                            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                                                            <button type="submit" name="fecha_enviado" class="btn btn-info">Avisar del envio</button>
                                                        </form>

                                                    </div>
                                                    <div class="col-3">
                                                        <form action="php/m7/crud.php" method="post">
                                                            <input type="hidden" name="id" value="<?php echo $row['id'] ?>">
                                                            <button name="aceptar-btn" type="submit" class="btn btn-success">Aceptar</button>
                                                        </form>
                                                        <button id="btn-rechazar<?php echo $row['id'] ?>" onclick="rechazar(<?php echo $row['id'] ?>)" class="btn btn-danger">Rechazar</button>



                                                        <div class="row">
                                                            <div class="col-6">
                                                                <div style="display: none;" id="none<?php echo $row['id'] ?>">
                                                                    <form action="php/m7/crud.php" method="POST">
                                                                        <br>
                                                                        <p style="color: red;"> Motivo del rechazo </p>
                                                                        <div style="color:black;" class="form-group">
                                                                            <input id="check-motivo<?php echo $row['id'] ?>" onclick="motivo(<?php echo $row['id'] ?>)" class="form-check-input" type="radio" name="a">Por motivo
                                                                            <br>
                                                                            <input id="check-otro<?php echo $row['id'] ?>" onclick="otro(<?php echo $row['id'] ?>)" class="form-check-input" type="radio" name="a"> Otro
                                                                        </div>

                                                                        <div id="motivo<?php echo $row['id'] ?>" style="display: none;" class="form-group">
                                                                            <select class="form-control" id="slt-motivo<?php echo $row['id'] ?>" name="Razon1">
                                                                                <option value=""></option>
                                                                                <option value="Tiempo de entrega">Tiempo de entrega</option>
                                                                                <option value="Precio">Precio</option>
                                                                                <option value="Cantidad">Cantidad</option>
                                                                                <option value="Descripción">Descripción</option>
                                                                            </select>
                                                                        </div>
                                                                        <div style="display: none;" id="otro<?php echo $row['id'] ?>" class="form-group">
                                                                            <input class="form-control" type="text" id="txt-otro<?php echo $row['id'] ?>" name="Razon2" placeholder="Especifique">
                                                                        </div>
                                                                        <input type="hidden" name="id" value="<?php echo $row['id'] ?>">
                                                                        <button style="display: none;" id="rechazar-btn<?php echo $row['id'] ?>" name="btn-rechazar" type="submit" class="btn btn-danger">Rechazar</button>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>
                                                    <div class="col-3">
                                                        <br><br>
                                                        <button type="button" onclick="editar(<?php echo $row['id'] ?>)" class="btn btn-warning"> Editar cotización</button>
                                                    </div>

                                                    <script>
                                                        function editar(id) {
                                                            $('#editarventas' + id).show()

                                                        }
                                                    </script>

                                                    <div class="col-12" id="editarventas<?php echo $row['id']; ?>" style="display: none;">
                                                        <div class="col-12">
                                                            <form action="php/m7/crud.php" method="post">
                                                                <input type="hidden" name="id" value="<?php echo $row['id'] ?>">
                                                                <div style="color: black;" class="row">
                                                                    <div class="col-3">
                                                                        <div class="form-group">
                                                                            <label>Cantidad</label>
                                                                            <input value="<?php echo $row['1_cantidad']; ?>" type="text" class="form-control" name="cantidad" required>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-3">
                                                                        <div class="form-group">
                                                                            <label>Tiempo de entrega</label>
                                                                            <input value="<?php echo $row['entrega']; ?>" type="text" class="form-control" name="entrega" required>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-3">
                                                                        <div class="form-group">
                                                                            <label>Precio Unitario</label>
                                                                            <input value="<?php echo $row['precio']; ?>" type="text" class="form-control" name="precio" required>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-3">
                                                                        <div class="form-group">
                                                                            <label>Corregir la información</label><br>
                                                                            <button class="btn btn-success" type="submit" name="corregirdatos">Corregir</button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php

                                            } else if ($row['estatus'] == 'RECHAZADA') {
                                                ###CUANDO LA SOLICITUD FUE RECHAZADA###
                                                echo '<p style="color:red;">Rechazado, el motivo es: <strong>' . $row['inf'] . '</strong></p>';
                                            } else if ($row['estatus'] == 'ACEPTADA') {
                                                #####CUANDO ES ACEPTADA#####
                                                $modelo = $row['1_modelo'];
                                                $folio = $row['folio'];
                                                $partes = $row['1_partes'];

                                                echo '<p style="color:black;">Aceptado</p>';
                                                if ($row['validado'] == 'Modelo') {

                                                    $a = "SELECT * FROM m4_almacen2 WHERE modelo = '$modelo'";
                                                    $insertalmacen = $conexion->query($a);
                                                } else if ($row['validado'] == 'Partes') {
                                                    $insertalmacen = $conexion->query("SELECT * FROM m4_almacen2 WHERE num_partes = '$partes'");
                                                } else if ($row['validado'] == 'Sin información') {
                                                    $insertalmacen = 'Sin informacion';
                                                }
                                                if ($insertalmacen == 'Sin informacion') {
                                                    #########CUANDO NO HAY PRODUCTOS EN ALMACEN######### SE VA IR DIRECTO A $insertalmacen == 'Sin informacion' #########
                                                    echo '<P>No existe este producto en Almacen, se va a mandar a compras para solicitar la información</P>';
                                                    $consultacomprasv = $conexion->query("SELECT COUNT(*) AS contarcomprasv FROM m6_compras_v WHERE folio = '$folio' ");
                                                    $arraycomprasv = mysqli_fetch_array($consultacomprasv);
                                                    if ($arraycomprasv['contarcomprasv'] == 0) {
                                                ?>
                                                        <div class="row">

                                                            <div class="col-6">
                                                                <form action="php/m6/crud.php" method="post">
                                                                    <label style="color:black;">Especifica la cantidad:</label>
                                                                    <input name="cantidad" value="" type="number" class="form-control" required>
                                                            </div>
                                                            <div class="col-6">
                                                                <label style="color:black;">Mensaje:</label>
                                                                <textarea name="inf" class="form-control" rows="3" required></textarea>

                                                            </div>
                                                            <div class="col-6">
                                                                <input type="hidden" name="folio" value="<?php echo $row['folio'] ?>">
                                                                <input type="hidden" name="marca" value="<?php echo $row['1_marca'] ?>">
                                                                <input type="hidden" name="nombre" value="<?php echo $row['1_nombre'] ?>">
                                                                <input type="hidden" name="modelo" value="<?php echo $row['1_modelo'] ?>">
                                                                <input type="hidden" name="descripcion" value="<?php echo $row['1_descripcion'] ?>">
                                                                <input type="hidden" name="cantidad" value="<?php echo $row['1_cantidad'] ?>">
                                                                <input type="hidden" name="partes" value="<?php echo $row['1_partes'] ?>">
                                                                <input type="hidden" name="idalmacen" value="0">


                                                                <button type="submit" name="btn-solicitarcompras" class="btn btn-success">Solicitar a compras</button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                        <?php

                                                    } else {
                                                        $conusltaalmacen = $conexion->query("SELECT * FROM m4_almacen_entradas WHERE folio = '$folio'");
                                                        foreach ($conusltaalmacen as $rowconsul) {
                                                            if ($rowconsul['doc1'] != '' && $rowconsul['doc2'] != '') {
                                                                echo '<p style="color:red;">Almacén ya recibio la información</p>';
                                                            }
                                                        }
                                                        echo 'Ya se mando la solicito a comprás';
                                                    }
                                                    #########CUANDO NO HAY PRODUCTOS EN ALMACEN######### SE VA IR DIRECTO A $insertalmacen == 'Sin informacion' #########
                                                } else {
                                                    #CUANDO SI FUE VALIDADO
                                                    foreach ($insertalmacen as $rowalmacen) {
                                                        if ($rowalmacen['modelo'] == $row['1_modelo'] && $rowalmacen['cantidad'] >= $row['1_cantidad'] && $rowalmacen['estatus'] == 'Stock' || $rowalmacen['num_partes'] == $row['1_partes'] && $rowalmacen['cantidad'] >= $row['1_cantidad'] && $rowalmacen['estatus'] == 'Stock') {
                                                            $insertfacturacion = $conexion->query("SELECT COUNT(*) AS contar FROM m12_facturacion WHERE folio = '$folio'");
                                                            $array = mysqli_fetch_array($insertfacturacion);
                                                            if ($array['contar'] == 0) {
                                                        ?>
                                                                <form action="php/m12/crud.php" method="post">
                                                                    <input type="hidden" name="folio" value="<?php echo $row['folio'] ?>">
                                                                    <input type="hidden" name="empresa" value="<?php echo $row['empresa'] ?>">
                                                                    <input type="hidden" name="contacto" value="<?php echo $row['contacto'] ?>">
                                                                    <input type="hidden" name="direccion" value="<?php echo $row['direccion'] ?>">
                                                                    <input type="hidden" name="telefono" value="<?php echo $row['telefono'] ?>">
                                                                    <input type="hidden" name="correo" value="<?php echo $row['correo'] ?>">
                                                                    <input type="hidden" name="marca" value="<?php echo $row['1_marca'] ?>">
                                                                    <input type="hidden" name="nombre" value="<?php echo $row['1_nombre'] ?>">
                                                                    <input type="hidden" name="modelo" value="<?php echo $row['1_modelo'] ?>">
                                                                    <input type="hidden" name="partes" value="<?php echo $row['1_partes'] ?>">
                                                                    <input type="hidden" name="descripcion" value="<?php echo $row['1_descripcion'] ?>">
                                                                    <input type="hidden" name="cantidad" value="<?php echo $row['1_cantidad'] ?>">
                                                                    <input type="hidden" name="precio" value="<?php echo $row['precio'] ?>">
                                                                    <button name="btn-factura" type="submit" class="btn btn-success">Notificar Facturación</button>
                                                                </form>
                                                            <?php
                                                            } else {
                                                                echo '<p>Ya se le notifico a facturación</p>';
                                                            }
                                                        } else {
                                                            #########CUANDO NO HAY PRODUCTOS EN ALMACEN######### SE VA IR DIRECTO A $insertalmacen == 'Sin informacion' #########
                                                            echo '<p style= "color:black;">Estatus del producto:  <strong>' . $rowalmacen['estatus'], '</strong> Cantidad que hay en almacen: <strong>' . $rowalmacen['cantidad'] . '</strong> No hay productos en almacen, solicita a compras <br> </p>';

                                                            $consultacomprasv = $conexion->query("SELECT COUNT(*) AS contarcomprasv FROM m6_compras_v WHERE folio = '$folio' ");
                                                            $arraycomprasv = mysqli_fetch_array($consultacomprasv);
                                                            if ($arraycomprasv['contarcomprasv'] == 0) {
                                                            ?>
                                                                <div class="row">

                                                                    <div class="col-6">
                                                                        <form action="php/m6/crud.php" method="post">
                                                                            <label style="color:black;">Especifica la cantidad:</label>
                                                                            <input name="cantidad" value="<?php echo $row['1_cantidad'] - $rowalmacen['cantidad'] ?>" type="number" class="form-control" required>
                                                                    </div>
                                                                    <div class="col-6">
                                                                        <label style="color:black;">Mensaje:</label>
                                                                        <textarea name="inf" class="form-control" rows="3" required></textarea>

                                                                    </div>
                                                                    <div class="col-6">
                                                                        <input type="hidden" name="folio" value="<?php echo $row['folio'] ?>">
                                                                        <input type="hidden" name="marca" value="<?php echo $row['1_marca'] ?>">
                                                                        <input type="hidden" name="nombre" value="<?php echo $row['1_nombre'] ?>">
                                                                        <input type="hidden" name="modelo" value="<?php echo $row['1_modelo'] ?>">
                                                                        <input type="hidden" name="descripcion" value="<?php echo $row['1_descripcion'] ?>">
                                                                        <input type="hidden" name="cantidad" value="<?php echo $row['1_cantidad'] ?>">
                                                                        <input type="hidden" name="partes" value="<?php echo $row['1_partes'] ?>">
                                                                        <input type="hidden" name="idalmacen" value="<?php echo $rowalmacen['id'] ?>">
                                                                        <button type="submit" name="btn-solicitarcompras" class="btn btn-success">Solicitar a compras</button>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                            <?php

                                                            } else {
                                                                $conusltaalmacen = $conexion->query("SELECT * FROM m4_almacen_entradas WHERE folio = '$folio'");
                                                                foreach ($conusltaalmacen as $rowconsul) {
                                                                    if ($rowconsul['doc1'] != '' && $rowconsul['doc2'] != '') {
                                                                        echo '<p style="color:red;">Almacén ya recibio la información</p>';
                                                                    }
                                                                }
                                                                echo 'Ya se mando la solicito a comprás';
                                                            }
                                                            #########CUANDO NO HAY PRODUCTOS EN ALMACEN######### SE VA IR DIRECTO A $insertalmacen == 'Sin informacion' #########
                                                        }
                                                    }
                                                    #CUANDO SI FUE VALIDADO

                                                }
                                            } else if ($row['estatus'] == 'ENTREGADO') {
                                                echo '<p style = "color:black;"> Material ya entregado </p>';
                                            }
                                            ?>
                                            <!--ROW-->
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>
                            <div class="tab-pane" id="agregarplus">



                                <form action="php/m7/crudplus.php" method="post">
                                    <div class="row">
                                        <div class="col-12">
                                            <p style="color:black;">Selecciona a un cliente:</p>
                                            <select class="cliente" name="cliente" style="width:600px;" required>
                                                <option selected disabled></option>
                                                <?php
                                                $consultaclinentes = $conexion->query("SELECT * FROM m3_clientes");
                                                foreach ($consultaclinentes as $row) {
                                                ?>
                                                    <option value="<?php echo $row['codigo'] ?>">Empresa: <strong><?php echo $row['empresa']; ?></strong> Contacto: <strong><?php echo $row['contacto'] ?></strong> Correo: <strong><?php echo $row['correo']; ?></strong></option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <br>

                                    <div style="color:black;" class="row">
                                        <div class="col-12">
                                            <p style="color:black">Agrega campos para modelos que SI existan en Almacén</p>
                                            <center>
                                                <button type="button" name="add" id="add" class="btn btn-dark">Agregar</button>
                                            </center>
                                            <br>
                                            <div id="tabla1" style="display: none;" class="table-responsive">
                                                <table style="color:black;" class="table table-bordered" id="dynamic_field">
                                                    <tr>
                                                        <td>Modelo</td>
                                                        <td>Cantidad</td>
                                                        <td>Eliminar</td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                    </div>

                                    <br>
                                    <div style="color: black;" class="row">
                                        <div class="col-12">
                                            <p>Agrega campos para modelos que NO existan en Almacén</p>
                                            <center>
                                                <button type="button" id="add2" class="btn btn-dark">Agregar</button>
                                            </center>
                                            <br>
                                            <div id="tabla2" style="display: none;" class="table-responsive">
                                                <table style="color:black;" class="table table-bordered" id="dynamic_field2">
                                                    <tr>
                                                        <td>Marca</td>
                                                        <td>Modelo</td>
                                                        <td>Descripción</td>
                                                        <td>Cantidad</td>
                                                        <td>Eliminar</td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                    </div>

                                    <br><br><br>
                                    <center>
                                        <button name="btn-enviarplus" type="submit" class="btn btn-success">Guardar cotización</button>
                                    </center>

                                </form>
                            </div>
                            <div class="tab-pane" id="ventasplus">

                                <?php

                                /*SELECT * FROM m7_ventas_productos M7 INNER JOIN m3_clientes M3 ON M7.codigo_cliente = M3.codigo */
                                #SELECT * FROM m7_ventas_productos M7 INNER JOIN m3_clientes M3 ON M7.codigo_cliente = M3.codigo WHERE M3.codigo = '220328-113550';
                                #SELECT * FROM m7_ventas_productos M7 INNER JOIN m3_clientes M3 ON M7.codigo_cliente = M3.codigo WHERE M3.codigo = '220330-92922';
                                #SELECT DISTINCT codigo_cliente FROM m7_ventas_productos 
                                $distinct = $conexion->query("SELECT DISTINCT folio, estatus FROM m7_ventas_productos ORDER BY id DESC");
                                foreach ($distinct as $dis) {

                                    $folio = $dis['folio'];
                                ?>
                                    <div style="color:black" class="card">
                                        <div class="card-body collapse show">
                                            <h4 class="card-title">Folio : <?php echo $dis['folio'] ?> </h4>
                                            <div class="table-responsive">
                                                <form action="php/m7/crudplus.php" method="post">
                                                    <table class="table">
                                                        <thead class="thead-dark">
                                                            <tr>
                                                                <th>Marca</th>
                                                                <th>Modelo</th>
                                                                <th>Descripcion</th>
                                                                <th>Cantidad</th>
                                                                <th>Partes</th>
                                                                <th>Precio</th>
                                                                <th>Entrega</th>
                                                                <th>Estatus</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php
                                                            $si = $conexion->query("SELECT * FROM m7_ventas_productos WHERE folio = '$folio' AND almacen = 'SI'");
                                                            $cont = 0;
                                                            foreach ($si as $row) {

                                                            ?>

                                                                <tr>
                                                                    <input type="hidden" name="id[]" value="<?php echo $row['id'] ?>">
                                                                    <td><?php echo '<p style="color:black">' . $row['marca'] . '</p>' ?></td>
                                                                    <td><?php echo '<p style="color:black">' . $row['modelo'] . '</p>' ?></td>
                                                                    <td><?php echo '<p style="color:black">' . $row['descripcion'] . '</p>' ?></td>
                                                                    <td><input required style="width:100px;" required type="number" class="form-control" name="cantidad[]" value="<?php echo $row['cantidad'] ?>"></td>
                                                                    <td><?php echo '<p style="color:black">' . $row['partes'] . '</p>' ?></td>
                                                                    <td><input required style="width:100px;" step="0.01" required type="number" class="form-control" name="precio[]" value="<?php echo $row['precio'] ?>"></td>
                                                                    <td><input required style="width:100px;" required type="text" class="form-control" name="entrega[]" value="<?php echo $row['entrega'] ?>"></td>
                                                                    <td>
                                                                        <?php
                                                                        //CONTADOR
                                                                        $modelo = $row['modelo'];
                                                                        $cantidad = $row['cantidad'];
                                                                        $consulamacensi = $conexion->query("SELECT * FROM m4_almacen2 WHERE modelo = '$modelo' ");
                                                                        foreach ($consulamacensi as $rowsi) {

                                                                            if ($cantidad  <= $rowsi['cantidad']) {
                                                                                echo '<span class="badge badge-pill badge-success">Hay existencias</span>';
                                                                            } else {
                                                                                echo '<span class="badge badge-pill badge-danger">No hay existencias</span>';
                                                                                $cont++;
                                                                            }
                                                                        }
                                                                        //CONTADOR
                                                                        ?>
                                                                    </td>
                                                                </tr>
                                                            <?php
                                                            }

                                                            $lol = 0;
                                                            $si = $conexion->query("SELECT * FROM m7_ventas_productos WHERE folio = '$folio' AND almacen = 'NO'");
                                                            foreach ($si as $row) {
                                                            ?>
                                                                <tr>
                                                                    <input type="hidden" name="id1[]" value="<?php echo $row['id'] ?>">
                                                                    <td><input required style="width:100px;" type="text" class="form-control" name="marca1[]" value="<?php echo $row['marca'] ?>"></td>
                                                                    <td><input required style="width:100px;" type="text" class="form-control" name="modelo1[]" value="<?php echo $row['modelo'] ?>"></td>
                                                                    <td><input required style="width:100px;" type="text" class="form-control" name="descripcion1[]" value="<?php echo $row['descripcion'] ?>"></td>
                                                                    <td><input required style="width:100px;" type="number" class="form-control" name="cantidad1[]" value="<?php echo $row['cantidad'] ?>"></td>
                                                                    <td><input required style="width:100px;" type="text" class="form-control" name="partes1[]" value="<?php echo $row['partes'] ?>"></td>
                                                                    <td><input required style="width:100px;" step="0.01" type="number" class="form-control" name="precio1[]" value="<?php echo $row['precio'] ?>"></td>
                                                                    <td><input required style="width:100px;" type="text" class="form-control" name="entrega1[]" value="<?php echo $row['entrega'] ?>"></td>
                                                                    <td>
                                                                        <?php
                                                                        $otrolol = $conexion->query("SELECT COUNT(*) AS contar FROM m4_almacen2 WHERE modelo = '$row[modelo]'");
                                                                        $otrololarray = mysqli_fetch_array($otrolol);
                                                                        if ($otrololarray['contar'] == 0) {
                                                                            echo '<span class="badge badge-pill badge-danger">No hay existencias</span>';
                                                                            $lol++;
                                                                        }
                                                                        //CONTADOR
                                                                        $modelo = $row['modelo'];
                                                                        $cantidad = $row['cantidad'];
                                                                        $consulamacensi = $conexion->query("SELECT * FROM m4_almacen2 WHERE modelo = '$modelo' ");
                                                                        foreach ($consulamacensi as $rowsi) {

                                                                            if ($cantidad  <= $rowsi['cantidad']) {
                                                                                echo '<span class="badge badge-pill badge-success">Hay existencias</span>';
                                                                            } else {
                                                                                echo '<span class="badge badge-pill badge-danger">No hay existencias</span>';
                                                                                $lol++;
                                                                            }
                                                                        }
                                                                        //CONTADOR

                                                                        ?>
                                                                    </td>
                                                                </tr>
                                                            <?php
                                                            }
                                                            ?>
                                                        </tbody>
                                                    </table>
                                                    <?php
                                                    if ($dis['estatus'] == 'EMITIDA') {
                                                        echo '<div class="mx-auto" style="width: 200px;">
                                                       <button type="submit" class="btn btn-warning" name="editarSi">Editar campos</button>
                                                   </div>';
                                                    }
                                                    ?>
                                                </form>
                                                <script>
                                                    function mostrarfnt(folio) {
                                                        $('#mostrar' + folio).hide()
                                                        $('#ocultar' + folio).show()
                                                        $('#lista' + folio).show()
                                                    }

                                                    function ocultarfnt(folio) {
                                                        $('#mostrar' + folio).show()
                                                        $('#ocultar' + folio).hide()
                                                        $('#lista' + folio).hide()
                                                    }
                                                </script>
                                                <?php

                                                $mensaje = $conexion->query("SELECT DISTINCT folio, inf FROM m7_ventas_productos WHERE folio = '$folio'");
                                                foreach ($mensaje as $rowmensaje) {
                                                    if ($rowmensaje['inf'] == '' && $dis['estatus'] == 'EMITIDA') {
                                                        echo '<p style="color:red;"> No se ha enviado la cotizacón</p>';
                                                    } else if ($dis['estatus'] == 'EMITIDA') {
                                                        echo '<p style="color:green;">' . $rowmensaje['inf'] . '</p>';
                                                    } else if ($dis['estatus'] == 'RECHAZADA') {
                                                        echo '<p style="color:red;">Rechazado por: <strong> ' . $rowmensaje['inf'] . '</strong></p>';
                                                    }
                                                }
                                                ### EMITIDA ###
                                                $consultaalmacenno = $conexion->query("SELECT COUNT(*) AS contar FROM m7_ventas_productos WHERE estatus = 'EMITIDA' AND folio = '$folio' AND almacen= 'NO'");
                                                $arrayno = mysqli_fetch_array($consultaalmacenno);
                                                if (($arrayno['contar'] + $cont) == 0 && $dis['estatus'] == 'EMITIDA') {

                                                    echo '
                                                    <div class="row">
                                                        <div class="col-7">
                                                            <form action="php/m7/diseñoplus.php" method="post">
                                                                <input type = "hidden" name="folio" value="' . $folio . '">
                                                                <div id="lista' . $folio . '" style="display:none; color:black;" class="row"> ';
                                                    $lista = $conexion->query("SELECT * FROM m7_ventas_productos where folio = '$folio'");
                                                    $b = 0;
                                                    foreach ($lista as $listas) {
                                                        echo '
                                                                    <div class="col-6">
                                                                        <p>Modelo: <strong>' . $listas['modelo'] . '  </strong>
                                                                            Ocultar Modelo
                                                                            <input type="checkbox" name="check[' . $b . ']" value="' . $listas['modelo'] . '">
                                                                        <p> 
                                                                    </div>
                                                                    <div class="col-6">
                                                                        <p>Modificar descripcion</p>
                                                                        <input type="text" name="descrp[' . $b . ']" class="form-control">
                                                                    </div>
                                                                           ';
                                                        $b++;
                                                    }
                                                    echo '
                                                                   </div>
                                                                       <div class="btn-list">
                                                                           <div class="btn-group" role="group" aria-label="Basic example">
                                                                               <button type="submit" class="btn btn-dark">Genera Cotizacion</button>
                                                                               <button id="mostrar' . $folio . '" onclick="mostrarfnt(' . $folio . ')" type="button" class="btn btn-dark">Mostrar</button>
                                                                               <button id="ocultar' . $folio . '" onclick="ocultarfnt(' . $folio . ')" style="display:none;" type="button" class="btn btn-dark">Ocultar</button>
                                                                           </div>
                                                                       </div> 
                                                                   </form>
                                                               </div>
                                                                   <div class="col-3">
                                                                       <form action="php/m7/crudplus.php" method="POST">
                                                                           <input type="hidden" name="folio" value="' . $folio . '">
                                                                           <button type="submit" name="fecha_enviado" class="btn btn-info">Avisar del envio</button>
                                                                       </form>
                                                                   </div>
                                                                   <div class="col-2">
                                                         <form action="php/m7/crudplus.php" method="post">
                                                             <input type="hidden" name="folio" value="' . $folio . '">
                                                             <button name="aceptar-btn" type="submit" class="btn btn-success">Aceptar</button>
                                                             
                                                         </form>
                                                         <button onclick="rechazar(' . $folio . ')" class="btn btn-danger">Rechazar</button>
                                                         <div style="display: none;" id="none' . $folio . '">
                                                             <form action="php/m7/crudplus.php" method="POST">
                                                                  <br>
                                                                  <p style="color: red;"> Motivo del rechazo </p>
                                                                  <div style="color:black;" class="form-group">
                                                                      <input id="check-motivo' . $folio . '" onclick="motivo(' . $folio . ')" class="form-check-input" type="radio" name="a">Por motivo
                                                                      <br>
                                                                      <input id="check-otro' . $folio . '" onclick="otro(' . $folio . ')" class="form-check-input" type="radio" name="a"> Otro
                                                                  </div>
                                                    
                                                                  <div id="motivo' . $folio . '" style="display: none;" class="form-group">
                                                                      <select class="form-control" id="slt-motivo' . $folio . '" name="Razon1">
                                                                          <option value=""></option>
                                                                          <option value="Tiempo de entrega">Tiempo de entrega</option>
                                                                          <option value="Precio">Precio</option>
                                                                          <option value="Cantidad">Cantidad</option>
                                                                          <option value="Descripción">Descripción</option>
                                                                      </select>
                                                                  </div>
                                                                  <div style="display: none;" id="otro' . $folio . '" class="form-group">
                                                                      <input class="form-control" type="text" id="txt-otro' . $folio . '" name="Razon2" placeholder="Especifique">
                                                                  </div>
                                                                  <input type="hidden" name="folio" value="' . $folio . '">
                                                                  <button style="display: none;" id="rechazar-btn' . $folio . '" name="btn-rechazar" type="submit" class="btn btn-danger">Rechazar</button>
                                                             </form>
                                                         </div>
                                                        </div>
                                                    </div>
                                                    ';
                                                } else if (($arrayno['contar'] + $cont) > 0 && $dis['estatus'] == 'EMITIDA') {
                                                    $cantidadmensaje = $conexion->query("SELECT COUNT(*) AS contar FROM m6_compras_mjs WHERE folio = '$folio'");
                                                    $arraymensaje = mysqli_fetch_array($cantidadmensaje);
                                                    if ($arraymensaje['contar'] == 0) {
                                                        echo '  <form action="php/m6/mjsplus.php" method="post">
                                                                    <input type="hidden" name="folio" value="' . $folio . '">
                                                                    <div class="row">
                                                                        <div class="col-6">
                                                                            <p style="color: black;">Enviarle un mensaje especificando todos los detalles a compras, (Solo se podrá enviar una sola vez)</p>
                                                                            <textarea class="form-control" name="mjs" required rows="7"></textarea>
                                                                        </div>
                                                                        <div class="col-6">
                                                                            <br>
                                                                            <button name="mjs1" type="submit" class="btn btn-info">Enviar mensaje</button>
                                                                        </div>
                                                                    </div>
                                                                </form>';
                                                    } else {

                                                        $consultareceptor = $conexion->query("SELECT * FROM m6_compras_mjs WHERE folio = '$folio'");
                                                        foreach ($consultareceptor as $rec) {
                                                            if ($rec['mjs2'] == 'N/A') {
                                                                echo '<p style="color:black">Mensaje enviado</p>';
                                                            } else {
                                                                echo '<p style="color:blue"> Respondido por: <strong>' . $rec['user2'] . '</strong>  Mensaje: <strong>' . $rec['mjs2'] . ' </strong></p>';
                                                                echo '
                                                                    <div class="row">
                                                                    <div class="col-7">
                                                                    <form action="php/m7/diseñoplus.php" method="post">
                                                                        <input type = "hidden" name="folio" value="' . $folio . '">
                                                                        
                                                                        <div id="lista' . $folio . '" style="display:none; color:black;" class="row"> ';
                                                                $lista = $conexion->query("SELECT * FROM m7_ventas_productos where folio = '$folio'");
                                                                $b = 0;
                                                                foreach ($lista as $listas) {
                                                                    echo '
                                                                                <div class="col-6">
                                                                                    <p>Modelo: <strong>' . $listas['modelo'] . '  </strong>
                                                                                        Ocultar Modelo
                                                                                        <input type="checkbox" name="check[' . $b . ']" value="' . $listas['modelo'] . '">
                                                                                    <p> 
                                                                                </div>
                                                                                <div class="col-6">
                                                                                    <p>Modificar descripcion</p>
                                                                                    <input type="text" name="descrp[' . $b . ']" class="form-control">
                                                                                </div>
                                                                                ';
                                                                    $b++;
                                                                }
                                                                echo '
                                                                        </div>
                                                                        <div class="btn-list">
                                                                            <div class="btn-group" role="group" aria-label="Basic example">
                                                                                <button type="submit" class="btn btn-dark">Genera Cotizacion</button>
                                                                                <button id="mostrar' . $folio . '" onclick="mostrarfnt(' . $folio . ')" type="button" class="btn btn-dark">Mostrar</button>
                                                                                <button id="ocultar' . $folio . '" onclick="ocultarfnt(' . $folio . ')" style="display:none;" type="button" class="btn btn-dark">Ocultar</button>
                                                                            </div>
                                                                        </div> 
                                                                    </form>
                                                                </div>
                                                                        <div class="col-3">
                                                                            <form action="php/m7/crudplus.php" method="POST">
                                                                                <input type="hidden" name="folio" value="' . $folio . '">
                                                                                <button type="submit" name="fecha_enviado" class="btn btn-info">Avisar del envio</button>
                                                                            </form>
                                                                        </div>
                                                                        <div class="col-2">
                                                                            <form action="php/m7/crudplus.php" method="post">
                                                                                <input type="hidden" name="folio" value="' . $folio . '">
                                                                                <button name="aceptar-btn" type="submit" class="btn btn-success">Aceptar</button>
                                                                            </form>
                                                                            <br>
                                                                            <button onclick="rechazar(' . $folio . ')" class="btn btn-danger">Rechazar</button>
                                                                         <div style="display: none;" id="none' . $folio . '">
                                                                             <form action="php/m7/crudplus.php" method="POST">
                                                                                  <br>
                                                                                  <p style="color: red;"> Motivo del rechazo </p>
                                                                                  <div style="color:black;" class="form-group">
                                                                                      <input id="check-motivo' . $folio . '" onclick="motivo(' . $folio . ')" class="form-check-input" type="radio" name="a">Por motivo
                                                                                      <br>
                                                                                      <input id="check-otro' . $folio . '" onclick="otro(' . $folio . ')" class="form-check-input" type="radio" name="a"> Otro
                                                                                  </div>
                                                                    
                                                                                  <div id="motivo' . $folio . '" style="display: none;" class="form-group">
                                                                                      <select class="form-control" id="slt-motivo' . $folio . '" name="Razon1">
                                                                                          <option value=""></option>
                                                                                          <option value="Tiempo de entrega">Tiempo de entrega</option>
                                                                                          <option value="Precio">Precio</option>
                                                                                          <option value="Cantidad">Cantidad</option>
                                                                                          <option value="Descripción">Descripción</option>
                                                                                      </select>
                                                                                  </div>
                                                                                  <div style="display: none;" id="otro' . $folio . '" class="form-group">
                                                                                      <input class="form-control" type="text" id="txt-otro' . $folio . '" name="Razon2" placeholder="Especifique">
                                                                                  </div>
                                                                                  <input type="hidden" name="folio" value="' . $folio . '">
                                                                                  <button style="display: none;" id="rechazar-btn' . $folio . '" name="btn-rechazar" type="submit" class="btn btn-danger">Rechazar</button>
                                                                             </form>
                                                                         </div>
                                                                    </div>
                                                                </div>
                                                                ';
                                                            }
                                                        }
                                                    }
                                                }
                                                ?>
                                            </div>
                                            <?php

                                            ### ACEPTADA ###
                                            $consultaalmacenaceptada = $conexion->query("SELECT COUNT(*) AS contar FROM m7_ventas_productos WHERE estatus = 'ACEPTADA' AND folio = '$folio' AND almacen= 'NO'");
                                            $arrayaceptada = mysqli_fetch_array($consultaalmacenaceptada);
                                            if ($dis['estatus'] == 'ACEPTADA') {

                                                if (($arrayaceptada['contar'] + $cont) <= 0) {
                                                    #FACTURACION
                                                    $consultafacturacion = $conexion->query("SELECT COUNT(*) as contar FROM m12_facturacion_vs WHERE folio = '$folio'");
                                                    $arrayconsultafacturacion = mysqli_fetch_array($consultafacturacion);
                                                    if ($arrayconsultafacturacion['contar'] == 0) {
                                                        echo '
                                                                    <form action="php/m12/crudplus.php" method="POST">
                                                                    ';
                                                        $consultaalmacenn = $conexion->query("SELECT * FROM m7_ventas_productos WHERE folio = '$folio'");
                                                        foreach ($consultaalmacenn as $row) {
                                                            echo '
                                                                        <input name="codigo_cliente[]" type="hidden" value="' . $row['codigo_cliente'] . '">
                                                                        <input name="folio[]" type="hidden" value="' . $row['folio'] . '">
                                                                        <input name="empresa[]" type="hidden" value="' . $row['empresa'] . '">
                                                                        <input name="contacto[]" type="hidden" value="' . $row['contacto'] . '">
                                                                        <input name="direccion[]" type="hidden" value="' . $row['direccion'] . '">
                                                                        <input name="telefono[]" type="hidden" value="' . $row['telefono'] . '">
                                                                        <input name="correo[]" type="hidden" value="' . $row['correo'] . '">
                                                                        <input name="marca[]" type="hidden" value="' . $row['marca'] . '">
                                                                        <input name="modelo[]" type="hidden" value="' . $row['modelo'] . '">
                                                                        <input name="descripcion[]" type="hidden" value="' . $row['descripcion'] . '">
                                                                        <input name="cantidad[]" type="hidden" value="' . $row['cantidad'] . '">
                                                                        <input name="partes[]" type="hidden" value="' . $row['partes'] . '">
                                                                        <input name="precio[]" type="hidden" value="' . $row['precio'] . '">
                                                                        
                                                                    ';
                                                        }
                                                        echo '
                                                                        <button type="submit" name="btn-enviarfacturacion" class="btn btn-info"> Enviar a facturación</button>
                                                                    </form>';
                                                    } else {
                                                        echo '<p style="color:black;">Ya se notifico a Facturación</p>';
                                                    }
                                                    #FACTURACION
                                                } else {
                                                    #COMPRAS
                                                    #hace el conteo
                                                    $for = $arrayaceptada['contar'] + $cont;
                                                    $consultamensaje = $conexion->query("SELECT COUNT(*)  AS contar FROM m6_compras_vs WHERE folio ='$folio'");
                                                    $arraymjs = mysqli_fetch_array($consultamensaje);
                                                    if ($arraymjs['contar'] == 0) {
                                            ?>

                                                        <form action="php/m6/crudplus.php" method="post">
                                                            <input type="hidden" name="folio" value="<?php echo $folio ?>">
                                                            <p style="color:red">Especificar con detalle, solo se podrá mandar una sola vez la solicitud a compras</p>
                                                            <div class="row">
                                                                <?php
                                                                for ($i = 1; $i <= $for; $i++) {
                                                                    echo '
                                                                
                                                                    <div class="col-6">
                                                                        <p style="color:black;">Cantidad</p><br>
                                                                            <input required type="number" name="cantidad[]" class="form-control">
                                                                        </div>
                                                                    <div class="col-6">
                                                                        <p style="color:black;">Mensaje a redactar</p><br>
                                                                            <textarea  required class="form-control" name="inf[]" rows="3"></textarea>
                                                                    </div>
                                                                
                                                                    ';
                                                                }
                                                                #COMPRAS
                                                                ?>
                                                                <div class="col-12">
                                                                    <button name="compras_plus" class="btn btn-success" type="submit">Enviar</button>
                                                                </div>
                                                            </div>

                                                        </form>
                                            <?php
                                                    } else {
                                                        if ($lol == 0 && $cont == 0) {
                                                            #FACTURACION
                                                            $consultafacturacion = $conexion->query("SELECT COUNT(*) as contar FROM m12_facturacion_vs WHERE folio = '$folio'");
                                                            $arrayconsultafacturacion = mysqli_fetch_array($consultafacturacion);
                                                            if ($arrayconsultafacturacion['contar'] == 0) {
                                                                echo '
                                                                    <form action="php/m12/crudplus.php" method="POST">
                                                                    ';
                                                                $consultaalmacenn = $conexion->query("SELECT * FROM m7_ventas_productos WHERE folio = '$folio'");
                                                                foreach ($consultaalmacenn as $row) {
                                                                    echo '
                                                                        <input name="codigo_cliente[]" type="hidden" value="' . $row['codigo_cliente'] . '">
                                                                        <input name="folio[]" type="hidden" value="' . $row['folio'] . '">
                                                                        <input name="empresa[]" type="hidden" value="' . $row['empresa'] . '">
                                                                        <input name="contacto[]" type="hidden" value="' . $row['contacto'] . '">
                                                                        <input name="direccion[]" type="hidden" value="' . $row['direccion'] . '">
                                                                        <input name="telefono[]" type="hidden" value="' . $row['telefono'] . '">
                                                                        <input name="correo[]" type="hidden" value="' . $row['correo'] . '">
                                                                        <input name="marca[]" type="hidden" value="' . $row['marca'] . '">
                                                                        <input name="modelo[]" type="hidden" value="' . $row['modelo'] . '">
                                                                        <input name="descripcion[]" type="hidden" value="' . $row['descripcion'] . '">
                                                                        <input name="cantidad[]" type="hidden" value="' . $row['cantidad'] . '">
                                                                        <input name="partes[]" type="hidden" value="' . $row['partes'] . '">
                                                                        <input name="precio[]" type="hidden" value="' . $row['precio'] . '">
                                                                    ';
                                                                }
                                                                echo '
                                                                        <button type="submit" name="btn-enviarfacturacion" class="btn btn-info"> Enviar a facturación</button>
                                                                    </form>';
                                                            } else {
                                                                echo '<p style="color:black;">Ya se notifico a Facturación</p>';
                                                            }

                                                            #FACTURACION
                                                        } else {
                                                            echo '<p style"color:black;">Ya se notifico a compras</p>';
                                                        }
                                                    }
                                                }
                                                ### ACEPTADA ###
                                            } else if ($dis['estatus'] == 'ENTREGADO') {
                                                echo '<p class="text-center" style=color:black>Material ya entregado</p>';
                                            }

                                            ?>


                                        </div>
                                    </div>
                                <?php
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>




</div>
<footer class="footer text-center " style="color: black;">
    44 Poniente #502 esq. blvd. 5 de Mayo Col. Santa María, C.P. 72080 Puebla, Puebla. <br>
    Tel: (222) 2-20-54-44, (222) 5-14-75-56 coordinacion@iacsa-puebla.com.mx
</footer>

</div>

<script>
    //PARA EL CLIENTE
    $('.cliente').select2()
</script>

<script>
    //PARA AGREGAR MÁS CAMPOS PARA MODELOS QUE EXISTEN EN ALMACEN
    $(document).ready(function() {
        var i = 0;
        $('#add').click(function() {
            i++;
            $('#dynamic_field').append('<tr id="row' + i + '"><td> <select style="width:350px;" required id="modelo' + i + '" name="modelo[]"> <option selected disabled></option> <?php $consulta = $conexion->query("SELECT * FROM m4_almacen2"); ?> <?php foreach ($consulta as $row) { ?> <option value="<?php echo $row['modelo'] ?>" ><?php echo $row['marca']; ?>, Modelo: <?php echo $row['modelo'] ?></option> <?php } ?></select></td>  <td><input type="number" name="cantidad[]" required class="form-control"></td>  <td><button type="button" name="remove" id="' + i + '" class="btn btn-danger btn_remove">X</button></td></tr>');
            $('#modelo' + i).select2()
            $('#tabla1').show()
        });

        $(document).on('click', '.btn_remove', function() {
            i--;
            var button_id = $(this).attr("id");
            $('#row' + button_id + '').remove();
            if (i == 0) {
                $('#tabla1').hide()
            }
        });
    });



    //Agrega campos para modelos que NO existan en Almacén
    var a = 0;
    $('#add2').click(function() {

        a++; //<input type="text" name="name[]" placeholder="Ingrese su nombre" class="form-control name_list" />
        $('#dynamic_field2').append('<tr id="ros' + a + '"><td><input type="text" name="marca[]" placeholder="Marca..." class="form-control" required></td><td><input type="text" name="modelodos[]" placeholder="Modelo..." class="form-control" required></td><td><input type="text" name="descripcion[]" placeholder="Descripcion..." class="form-control" required></td> <td><input type="number" name="cantidaddos[]" placeholder="cantidad..." class="form-control" required></td> <td><button type="button" name="remove" id="' + a + '" class="btn btn-danger btn_remove2">X</button></td></tr>');
        $('#tabla2').show();

    });

    $(document).on('click', '.btn_remove2', function() {
        a--;

        var button_id = $(this).attr("id");
        $('#ros' + button_id + '').remove();
        if (a == 0) {
            $('#tabla2').hide();
        }

    });
</script>



<script>
    function rechazar1(folio) {
        var folio = folio
        console.log(folio)
    }

    //Rechazar Nomral
    function rechazar(id) {

        $('#btn-rechazar' + id).hide()
        $('#none' + id).show()
    }

    function motivo(id) {
        $('#motivo' + id).show()
        $('#rechazar-btn' + id).show()
        $('#slt-motivo' + id).attr("required", true)

        $('#otro' + id).hide()
        $('#txt-otro' + id).val("")
        $("#txt-otro" + id).attr("required", false);
    }

    function otro(id) {
        $('#otro' + id).show()
        $('#rechazar-btn' + id).show()
        $("#txt-otro" + id).attr("required", true);


        $('#motivo' + id).hide()
        $('#slt-motivo' + id).val("")
        $('#slt-motivo' + id).attr("required", false)
    }
</script>
<?php
include_once('global/cyp/pie.php');
?>

<!-- PRIMER MODELO -->
<!--
https://drive.google.com/drive/folders/1RhkQva0aWXLiWrd9XbyS9yFzimSUHuAN

<div style="color:black;" class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <p style="color:black">Selecciona los modelos a cotizar:</p>
                                                <select class="form-control" multiple="multiple" id="modelos" name="modelos[]" required="required" style="width:600px;">
                                                <?php
                                                #$buscarmodelos = $conexion->query("SELECT * FROM m4_almacen2");
                                                #foreach ($buscarmodelos as $row) {
                                                ?>
                                                        <option style="color:black;" value="<?php #echo $row['modelo'] 
                                                                                            ?>">Marca: <?php #echo $row['marca'] 
                                                                                                        ?> Modelo: <?php #echo $row['modelo'] 
                                                                                                                    ?> </option>
                                                    <?php
                                                    #}
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
-->