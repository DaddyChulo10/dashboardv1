<?php
include_once('global/cyp/cabezera.php');
if ($_SESSION['M4'] == 'Si' || $_SESSION['M4'] == 'TEM') {
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
                        $('#hora-dinamico').html(horaImprimible)
                        //document.getElementById("hora-dinamico").innerHTML = horaImprimible;
                        setTimeout(mueveReloj, 1000)
                    }
                </script>

            </div>

        </div>
    </div>

    <div class="container-fluid">

        <?php
        $min = $conexion->query("SELECT * FROM m4_almacen2");
        foreach ($min as $row) {
            if ($row['cantidad'] <= $row['cantidad_min']) {
        ?>
                <div class="alert alert-danger alert-dismissible bg-danger text-white border-0 fade show" role="alert">
                    <strong>Falta de material en almacen</strong>
                    <p>Marca: <strong><?php echo $row['marca'] ?></strong> Modelo: <strong><?php echo $row['modelo'] ?> <strong> Número de partes: </strong><?php echo $row['num_partes']; ?></strong> Existencias: <strong><?php echo $row['cantidad'] ?></strong>
                        Cantidad Minima: <strong><?php echo $row['cantidad_min'] ?> </strong>
                    </p>
                </div>
        <?php
            }
        }
        ?>

        <div class="row">
            <div class="col-xl-6">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title mb-3">Modulo de Almacén</h4>

                        <h4 class="card-title mb-3"></h4>

                        <ul class="nav nav-tabs mb-3">
                            <li class="nav-item">
                                <a href="#noti" data-toggle="tab" aria-expanded="true" class="nav-link active">
                                    <i class="mdi mdi-account-circle d-lg-none d-block mr-1"></i>
                                    <span class="d-none d-lg-block">Notificación de Salidas</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#entradas" data-toggle="tab" aria-expanded="false" class="nav-link">
                                    <i class="mdi mdi-home-variant d-lg-none d-block mr-1"></i>
                                    <span class="d-none d-lg-block">Notificación de entradas</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#crud" data-toggle="tab" aria-expanded="false" class="nav-link">
                                    <i class="mdi mdi-home-variant d-lg-none d-block mr-1"></i>
                                    <span class="d-none d-lg-block">Altas, Bajas, Eliminaciones</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#entradasplus" data-toggle="tab" aria-expanded="false" class="nav-link">
                                    <i class="mdi mdi-home-variant d-lg-none d-block mr-1"></i>
                                    <span class="d-none d-lg-block">Notificación de entradas (+)</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#salidasplus" data-toggle="tab" aria-expanded="false" class="nav-link">
                                    <i class="mdi mdi-home-variant d-lg-none d-block mr-1"></i>
                                    <span class="d-none d-lg-block">Notificación de Salidas (+)</span>
                                </a>
                            </li>
                        </ul>

                        <div class="tab-content">

                            <div class="tab-pane show active" id="noti">

                                <?php
                                $insert = $conexion->query("SELECT * FROM m4_almacen_mjs WHERE id ORDER BY id DESC");
                                foreach ($insert as $row) {
                                    if ($row['lugar'] == 1) {
                                ?>
                                        <div class="card">
                                            <div class="card-body collapse show">
                                                <h4 class="card-title">Folio: <?php echo $row['folio'] ?> </h4>
                                                <p style="color:black">Nueva salida de producto</p>
                                                <?php
                                                if ($row['f'] == '' && $row['ne'] == '') {
                                                ?>
                                                    <div class="row">
                                                        <div class="col-3">
                                                            <button class="btn btn-info" type="button" onclick="uno(<?php echo $row['id'] ?>)">Por Factura</button>
                                                        </div>
                                                        <div class="col-3">
                                                            <button class="btn btn-info" type="button" onclick="dos(<?php echo $row['id'] ?>)">Por Nota de entrega</button>
                                                        </div>
                                                    </div>
                                                    <br>

                                                    <script>
                                                        function uno(id) {
                                                            $('#uno' + id).show()
                                                            $('#dos' + id).hide()
                                                            $('#dos' + id).val('')
                                                        }

                                                        function dos(id) {
                                                            $('#dos' + id).show()
                                                            $('#uno' + id).hide()
                                                            $('#uno' + id).val('')
                                                        }
                                                    </script>

                                                    <div style="display: none;" id="uno<?php echo $row['id'] ?>">
                                                        <form method="post" enctype="multipart/form-data" action="php/m4/crud.php">
                                                            <input type="hidden" name="folio" value="<?php echo $row['folio']; ?>">

                                                            <div class="input-group mb-3">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text">Factura</span>
                                                                </div>
                                                                <div class="custom-file">
                                                                    <input type="file" name="doc1" class="custom-file-input" required>
                                                                    <label class="custom-file-label">Elija Archivo</label>
                                                                </div>
                                                            </div>

                                                            <div class="input-group">
                                                                <button class="btn btn-success" name="btn-subirdocs1" type="submit">Subir documento</button>
                                                            </div>
                                                        </form>
                                                    </div>

                                                    <div style="display: none;" id="dos<?php echo $row['id'] ?>">

                                                        <form method="post" enctype="multipart/form-data" action="php/m4/crud.php">
                                                            <input type="hidden" name="folio" value="<?php echo $row['folio']; ?>">
                                                            <div class="input-group mb-3">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text">Nota de entrega</span>
                                                                </div>
                                                                <div class="custom-file">
                                                                    <input type="file" name="doc2" class="custom-file-input" required>
                                                                    <label class="custom-file-label">Elija Archivo</label>
                                                                </div>
                                                            </div>
                                                            <div class="input-group">
                                                                <button class="btn btn-success" name="btn-subirdocs2" type="submit">Subir documento</button>
                                                            </div>
                                                        </form>

                                                    </div>



                                                    <!--
                                                    <form method="post" enctype="multipart/form-data" action="php/m4/crud.php">
                                                        <input type="hidden" name="folio" value="<?php echo $row['folio']; ?>">

                                                        <div class="input-group mb-3">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text">Factura</span>
                                                            </div>
                                                            <div class="custom-file">
                                                                <input type="file" name="doc1" class="custom-file-input" required>
                                                                <label class="custom-file-label">Elija Archivo</label>
                                                            </div>
                                                        </div>
                                                        <div class="input-group mb-3">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text">Nota de entrega</span>
                                                            </div>
                                                            <div class="custom-file">
                                                                <input type="file" name="doc2" class="custom-file-input" required>
                                                                <label class="custom-file-label">Elija Archivo</label>
                                                            </div>
                                                        </div>
                                                        <div class="input-group">
                                                            <button class="btn btn-success" name="btn-subirdocs" type="submit">Subir documentos</button>
                                                        </div>
                                                    </form>

                                                -->
                                                <?php
                                                } else if ($row['estatus'] == 'ENTREGADO') {
                                                ?>
                                                    <div class="row">
                                                        <div class="col-6">
                                                            <p style="color:white;">a</p>
                                                            <button id="btn-entrega<?php echo $row['id'] ?>" onclick="mostrar(<?php echo $row['id'] ?>)" class="btn btn-success">Entregar Material</button>
                                                            <script>
                                                                function mostrar(id) {
                                                                    $('#none' + id).show()
                                                                    $('#btn-entrega' + id).hide()
                                                                }
                                                            </script>

                                                            <div id="none<?php echo $row['id'] ?>" style="display: none;">

                                                                <p style="color: black;">Al momento que se entregue, se le restarán el material que hay en almacen</p>
                                                                <form enctype="multipart/form-data" action="php/m4/crud.php" method="post">
                                                                    <input type="hidden" name="folio" value="<?php echo $row['folio'] ?>">
                                                                    <input type="hidden" name="modelo" value="<?php echo $row['1_modelo'] ?>">
                                                                    <input type="hidden" name="partes" value="<?php echo $row['1_partes'] ?>">
                                                                    <input type="hidden" name="cantidad" value="<?php echo $row['1_cantidad'] ?>">
                                                                    <input type="hidden" name="correo" value="<?php echo $row['correo'] ?>">

                                                                    <input type="hidden" name="empresa" value="<?php echo $row['empresa'] ?>">
                                                                    <input type="hidden" name="contacto" value="<?php echo $row['contacto'] ?>">
                                                                    <input type="hidden" name="direccion" value="<?php echo $row['direccion'] ?>">
                                                                    <input type="hidden" name="telefono" value="<?php echo $row['telefono'] ?>">
                                                                    <input type="hidden" name="marca" value="<?php echo $row['1_marca'] ?>">
                                                                    <input type="hidden" name="nombre" value="<?php echo $row['1_nombre'] ?>">
                                                                    <input type="hidden" name="descripcion" value="<?php echo $row['1_descripcion'] ?>">

                                                                    <button type="submit" name="entregar-material" class="btn btn-warning">Entregar material</button>
                                                                </form>
                                                            </div>
                                                        </div>

                                                        <div class="col-6">
                                                            <p style="color:black">Descargar documento subido</p>
                                                            <?php if ($row['f'] != '') {
                                                            ?>
                                                                <a class="btn btn-info" href="php/m4/archivos/<?php echo $row['f'] ?>" download="Factura">Factura</a>
                                                            <?php
                                                            } else if ($row['ne']  != '') {
                                                            ?>
                                                                <a class="btn btn-info" href="php/m4/archivos/<?php echo $row['ne'] ?>" download="Nota de entrega">Nota de entrega</a>
                                                            <?php
                                                            }
                                                            ?>

                                                        </div>
                                                    </div>
                                                <?php
                                                } else if ($row['estatus'] == 'CERRADO') {
                                                    echo '<p style = "color:black;">Material ya entregado</p>';
                                                    echo '<P style = "color:black;">Responsable quien entrego el material: <strong>' . $row['name_user'] . '</strong></p>';
                                                }
                                                ?>
                                            </div>
                                        </div>
                                <?php
                                    } else {
                                    }
                                }
                                ?>
                            </div>
                            <div class="tab-pane" id="entradas">
                                <?php
                                $query = $conexion->query("SELECT * FROM m4_almacen_entradas WHERE id ORDER BY id DESC");
                                foreach ($query as $row) {
                                ?>
                                    <div class="card">
                                        <div class="card-body collapse show">
                                            <h4 class="card-title">Folio: <?php echo $row['folio'] ?></h4>
                                            <p style="color:black;">Nueva entrega de almacen: Nombre: <strong><?php echo $row['nombre'] ?></strong> Modelo: <strong><?php echo $row['modelo'] ?></strong> Partes: <strong><?php echo $row['partes'] ?></strong>
                                                Descripcion: <strong><?php echo $row['descripcion'] ?></strong> Cantidad: <strong> <?php echo $row['cantidad'] ?></strong> Partes: <strong><?php echo $row['partes'] ?></strong>
                                            </p>
                                            <div class="row">
                                                <?php
                                                if ($row['doc1'] == '' && $row['doc2'] == '') {
                                                ?>

                                                    <div class="col-6">
                                                        <form enctype="multipart/form-data" action="php/m4/crud.php" method="POST">
                                                            <input type="hidden" name="folio" value="<?php echo $row['folio']; ?>">

                                                            <div class="input-group mb-3">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text">Cotizacion</span>
                                                                </div>
                                                                <div class="custom-file">
                                                                    <input type="file" name="doc1" class="custom-file-input" required>
                                                                    <label class="custom-file-label">Elija Archivo</label>
                                                                </div>
                                                            </div>
                                                            <div class="input-group mb-3">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text">Nota de entrega</span>
                                                                </div>
                                                                <div class="custom-file">
                                                                    <input type="file" name="doc2" class="custom-file-input" required>
                                                                    <label class="custom-file-label">Elija Archivo</label>
                                                                </div>
                                                            </div>
                                                            <div class="input-group">
                                                                <button class="btn btn-success" name="btnsubirdocentrada" type="submit">Subir documentos</button>
                                                            </div>

                                                        </form>
                                                    </div>

                                                <?php
                                                } else {
                                                    echo '<p style="color:red;">Cambia la cantidad de existencias con el Modelo/número de partes sumando lo que llego a lo que existe en almacen.
                                                    <br> Si no existe, dar de alta este nuevo producto para ver los cambios.</P>';
                                                    echo '<p style="color:red;"><strong>Si en almacén se encuentra en Non-Stock, cambiarlo en Stock para ver los cambios</strong> </P>';
                                                ?>
                                                    <div class="col-6">
                                                        <p style="color: purple;">Persona responsable <strong><?php echo $row['name_user'] ?></strong></p>
                                                        <p style="color:black">Descargar documentos subidos</p>
                                                        <a href="php/m4/archivos/<?php echo $row['doc1'] ?>" download="Cotizacion">Cotizacion</a>
                                                        <br>
                                                        <a href="php/m4/archivos/<?php echo $row['doc2'] ?>" download="Nota de entrega">Nota de entrega</a>
                                                    </div>
                                                <?php
                                                }
                                                ?>


                                            </div>
                                        </div>
                                    </div>
                                <?php
                                }
                                ?>
                            </div>

                            <div class="tab-pane" id="crud">
                                <script>
                                    function agregar() {
                                        $('#element').show()
                                        $('#btnocultar').show()
                                    }

                                    function ocultar() {
                                        $('#element').hide()
                                        $('#btnocultar').hide()
                                    }
                                </script>
                                <button onclick="agregar()" type="button" class="btn waves-effect waves-light btn-rounded btn-outline-success">Agregar</button>
                                <button onclick="ocultar()" id="btnocultar" style="display:none;" type="button" class="btn waves-effect waves-light btn-rounded btn-outline-info">Ocultar formulario</button>

                                <br><br>
                                <div id="element" style="display:none;">
                                    <form action="php/m4/crud.php" method="post">
                                        <div style="color:black;" class="row">

                                            <div class="col-3">
                                                <div class="form-group">
                                                    <label>Posición</label>
                                                    <input class="form-control" type="text" name="posicion" required>
                                                </div>
                                            </div>

                                            <div class="col-3">
                                                <div class="form-group">
                                                    <label>Marca</label>
                                                    <input class="form-control" type="text" name="marca" required>
                                                </div>
                                            </div>
                                            <div class="col-3">
                                                <div class="form-group">
                                                    <label>Modelo</label>
                                                    <input class="form-control" type="text" name="modelo" required>
                                                </div>
                                            </div>
                                            <div class="col-3">
                                                <div class="form-group">
                                                    <label>Número de partes</label>
                                                    <input class="form-control" type="text" name="num_partes" required>
                                                </div>
                                            </div>
                                            <div class="col-3">
                                                <div class="form-group">
                                                    <label>Número de serie</label>
                                                    <input class="form-control" type="text" name="no_serie" required>
                                                </div>
                                            </div>
                                            <div class="col-3">
                                                <div class="form-group">
                                                    <label>Descripción</label>
                                                    <input class="form-control" type="text" name="descripcion" required>
                                                </div>
                                            </div>
                                            <div class="col-3">
                                                <div class="form-group">
                                                    <label>Número de pedimiento Aduanal</label>
                                                    <input class="form-control" type="text" name="no_pedimiento_aduanal" required>
                                                </div>
                                            </div>
                                            <div class="col-3">
                                                <div class="form-group">
                                                    <label>Cantidad</label>
                                                    <input class="form-control" type="number" name="cantidad" required>
                                                </div>
                                            </div>
                                            <div class="col-3">
                                                <div class="form-group">
                                                    <label>Cantidad Máxima</label>
                                                    <input class="form-control" type="number" name="cantidad_max" required>
                                                </div>
                                            </div>
                                            <div class="col-3">
                                                <div class="form-group">
                                                    <label>Cantidad Minima</label>
                                                    <input class="form-control" type="number" name="cantidad_min" required>
                                                </div>
                                            </div>
                                            <div class="col-3">
                                                <div class="form-group">
                                                    <label>Punto de Reorden</label>
                                                    <input class="form-control" type="text" name="punto_reorden" required>
                                                </div>
                                            </div>
                                            <div class="col-3">
                                                <div class="form-group">
                                                    <label>Precio Compra</label>
                                                    <input class="form-control" type="number" name="precio_iacsa" required>
                                                </div>
                                            </div>
                                            <div class="col-3">
                                                <div class="form-group">
                                                    <label>Precio Venta</label>
                                                    <input class="form-control" type="number" name="precio_lista" required>
                                                </div>
                                            </div>
                                            <div class="col-3">
                                                <div class="form-group">
                                                    <label>Fecha_solicitud</label>
                                                    <input class="form-control" type="text" name="fecha_solicitud" required>
                                                </div>
                                            </div>
                                            <div class="col-3">
                                                <div class="form-group">
                                                    <label>Fecha_arribo</label>
                                                    <input class="form-control" type="text" name="fecha_arribo" required>
                                                </div>
                                            </div>
                                            <div class="col-3">
                                                <div class="form-group">
                                                    <label>Tiempo</label>
                                                    <input class="form-control" type="text" name="tiempo" required>
                                                </div>
                                            </div>
                                            <div class="col-3">
                                                <div class="form-group">
                                                    <label>Unidad</label>
                                                    <input class="form-control" type="text" name="unidad" required>
                                                </div>
                                            </div>
                                            <div class="col-3">
                                                <div class="form-group">
                                                    <label>Proveedor</label>
                                                    <input class="form-control" type="text" name="proveedor" required>
                                                </div>
                                            </div>
                                            <div class="col-3">
                                                <div class="form-group">
                                                    <label>Observaciones</label>
                                                    <input class="form-control" type="text" name="observaciones" required>
                                                </div>
                                            </div>

                                            <div class="col-3">
                                                <div class="form-group">
                                                    <label>Estatus</label>
                                                    <select class="form-control" name="estatus" required>
                                                        <option value="Stock">Stock</option>
                                                        <option value="Non-Stock">Non-Stock</option>
                                                    </select>

                                                </div>
                                            </div>



                                            <div class="col-3">
                                                <div class="form-group">
                                                    <br>
                                                    <button type="submit" name="agregaralmacen" class="btn btn-success">Agregar Almacén</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>

                                <div class="row">
                                    <div class="col-12">
                                        <div class="card">
                                            <div class="card-body">

                                                <div class="table-responsive">
                                                    <table id="multi_col_order" class="table table-striped table-bordered display no-wrap" style="width:100%">
                                                        <thead>
                                                            <tr>
                                                                <th>Acciones</th>
                                                                <th>Posicion</th>
                                                                <th>Marca</th>
                                                                <th>Modelo</th>
                                                                <th>No° Partes</th>
                                                                <th>No° Serie</th>
                                                                <th>Descripcion </th>
                                                                <th>No Pedimiento Aduanal</th>
                                                                <th>Cantidad </th>
                                                                <th>Cantidad Max</th>
                                                                <th>Cantidad Min </th>
                                                                <th>Punto reorden</th>
                                                                <th>Precio Compra</th>
                                                                <th>Precio Venta</th>
                                                                <th>Fecha de Solicitud</th>
                                                                <th>Fecha de Arribo</th>
                                                                <th>Tiempo</th>
                                                                <th>Unidad</th>
                                                                <th>Proveedor</th>
                                                                <th>Observaciones</th>
                                                                <th>Estatus</th>
                                                            </tr>
                                                        </thead>

                                                        <tbody>

                                                            <?php
                                                            $consulta = "SELECT * FROM m4_almacen2 ";
                                                            $query = mysqli_query($conexion, $consulta);
                                                            foreach ($query as $row) {
                                                            ?>
                                                                <tr>
                                                                    <td>
                                                                        <button onclick="edit(<?php echo $row['id'] ?>,'<?php echo $row['posicion'] ?>','<?php echo $row['marca'] ?>','<?php echo $row['modelo'] ?>','<?php echo $row['num_partes'] ?>','<?php echo $row['no_serie'] ?>','<?php echo $row['descripcion'] ?>','<?php echo $row['no_pedimiento_aduanal'] ?>','<?php echo $row['cantidad'] ?>','<?php echo $row['cantidad_max'] ?>','<?php echo $row['cantidad_min'] ?>','<?php echo $row['punto_reorden'] ?>','<?php echo $row['precio_iacsa'] ?>','<?php echo $row['precio_lista'] ?>','<?php echo $row['fecha_solicitud'] ?>','<?php echo $row['fecha_arribo'] ?>','<?php echo $row['tiempo'] ?>','<?php echo $row['unidad'] ?>','<?php echo $row['proveedor'] ?>','<?php echo $row['observaciones'] ?>','<?php echo $row['estatus'] ?>')" type="button" class="btn btn-warning">Edit</button>
                                                                    </td>
                                                                    <td><?php echo $row['posicion'] ?></td>
                                                                    <td><?php echo $row['marca'] ?></td>
                                                                    <td><?php echo $row['modelo'] ?></td>
                                                                    <td><?php echo $row['num_partes'] ?></td>
                                                                    <td><?php echo $row['no_serie'] ?></td>
                                                                    <td><?php echo $row['descripcion'] ?></td>
                                                                    <td><?php echo $row['no_pedimiento_aduanal'] ?></td>
                                                                    <td><?php echo $row['cantidad'] ?></td>
                                                                    <td><?php echo $row['cantidad_max'] ?></td>
                                                                    <td><?php echo $row['cantidad_min'] ?></td>
                                                                    <td><?php echo $row['punto_reorden'] ?></td>
                                                                    <td><?php echo $row['precio_iacsa'] ?></td>
                                                                    <td><?php echo $row['precio_lista'] ?></td>
                                                                    <td><?php echo $row['fecha_solicitud'] ?></td>
                                                                    <td><?php echo $row['fecha_arribo'] ?></td>
                                                                    <td><?php echo $row['tiempo'] ?></td>
                                                                    <td><?php echo $row['unidad'] ?></td>
                                                                    <td><?php echo $row['proveedor'] ?></td>
                                                                    <td><?php echo $row['observaciones'] ?></td>
                                                                    <td><?php echo $row['estatus'] ?></td>
                                                                </tr>
                                                            <?php
                                                            }
                                                            ?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="entradasplus">
                                <?php
                                $consultadis = $conexion->query("SELECT DISTINCT folio FROM m4_almacen_entradas_vs WHERE id ORDER BY id DESC");
                                foreach ($consultadis as $dis) {
                                ?>
                                    <div class="card">
                                        <div style="color:black" class="card-body collapse show">
                                            <h4 class="card-title">Folio <?php echo $dis['folio'] ?></h4>
                                            <div class="row">
                                                <div class="col-6">
                                                    <?php
                                                    $consulta = $conexion->query("SELECT * FROM m4_almacen_entradas_vs WHERE folio = '$dis[folio]'");
                                                    foreach ($consulta as $row) {
                                                        echo '
                                                    <ul style="color:black;" class="list-group list-group-horizontal">       
                                                        <li class="list-group-item" style="width:200px;"> Cantidad: <strong>' . $row['cantidad'] . '</strong></li>
                                                        <li class="list-group-item" style="width:200px;"> Información: <strong>' . $row['inf'] . '</strong></li>
                                                    </ul>
                                                <br>
                                                ';
                                                    }
                                                    ?>
                                                </div>
                                                <div class="col-6">
                                                    <?php
                                                    if ($row['doc1'] == '' && $row['doc2'] == '') {
                                                        echo '
                                                        <form enctype="multipart/form-data" action="php/m4/crudplus.php" method="POST">
                                                            <input type="hidden" name="folio" value="' . $row['folio'] . '">

                                                            <div class="input-group mb-3">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text">Cotizacion</span>
                                                                </div>
                                                                <div class="custom-file">
                                                                    <input type="file" name="doc1" class="custom-file-input" required>
                                                                    <label class="custom-file-label">Elija Archivo</label>
                                                                </div>
                                                            </div>
                                                            <div class="input-group mb-3">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text">Nota de entrega</span>
                                                                </div>
                                                                <div class="custom-file">
                                                                    <input type="file" name="doc2" class="custom-file-input" required>
                                                                    <label class="custom-file-label">Elija Archivo</label>
                                                                </div>
                                                            </div>
                                                            <div class="input-group">
                                                                <button class="btn btn-success" name="btnsubirdocentrada" type="submit">Subir documentos</button>
                                                            </div>

                                                        </form>
                                                        ';
                                                    } else {
                                                        echo '<p style="color:red">Cambia la cantidad de existencias con el Modelo de partes sumando lo que llego a lo que existe en almacen.
                                                        Si no existe, dar de alta este nuevo producto para ver los cambios.</p>';
                                                        echo '<p style="color:purple">Persona responsable <strong>' . $row['name_user'] . '</strong></p>';
                                                        echo '<p style"color:black;">Ya se notifico Almacen</p>';
                                                        echo '
                                                        <p> Descargar documentos subidos</p>
                                                        <a href="php/m4/archivos/' . $row['doc1'] . '" download="Cotizacion">Cotizacion</a>
                                                        <br>
                                                        <a href="php/m4/archivos/' . $row['doc2'] . '" download="Nota de entrega">Nota de entrega</a>
                                                       
                                                    ';
                                                    }
                                                    ?>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>
                            <div class="tab-pane" id="salidasplus">
                                <?php
                                $dis = $conexion->query("SELECT DISTINCT folio FROM m4_almacen_salidas  WHERE id ORDER BY id DESC");
                                foreach ($dis as $dis) {
                                    $folio = $dis['folio'];




                                ?>
                                    <div style="color:black" class="card">
                                        <div class="card-body collapse show">
                                            <h4 class="card-title">Folio: <?php echo $dis['folio'] ?></h4>
                                            <div class="row">
                                                <div class="col-6">
                                                    <?php
                                                    $salidaalmacen = $conexion->query("SELECT * FROM m4_almacen_salidas WHERE folio = '$folio'");
                                                    foreach ($salidaalmacen as $salida) {
                                                        echo ' 
                                                        <ul style="color:black;" class="list-group list-group-horizontal">       
                                                            <li class="list-group-item" style="width:200px;"> Cantidad: <strong>' . $salida['cantidad'] . '</strong></li>
                                                            <li class="list-group-item" style="width:200px;"> Modelo: <strong>' . $salida['modelo'] . '</strong></li>
                                                        </ul>';
                                                    }
                                                    ?>

                                                </div>

                                                <div class="col-6">
                                                    <?php
                                                    if ($salida['estatus'] == 'EMITIDO') {


                                                    ?>
                                                        <div class="row">
                                                            <div class="col-6">
                                                                <button class="btn btn-info" type="button" onclick="uno(<?php echo $dis['folio'] ?>)">Por Factura</button>
                                                            </div>
                                                            <div class="col-6">
                                                                <button class="btn btn-info" type="button" onclick="dos(<?php echo $dis['folio'] ?>)">Por Nota de entrega</button>
                                                            </div>
                                                        </div>
                                                        <br>

                                                        <script>
                                                            function uno(id) {
                                                                $('#uno' + id).show()
                                                                $('#dos' + id).hide()
                                                                $('#dos' + id).val('')
                                                            }

                                                            function dos(id) {
                                                                $('#dos' + id).show()
                                                                $('#uno' + id).hide()
                                                                $('#uno' + id).val('')
                                                            }
                                                        </script>

                                                        <div style="display: none;" id="uno<?php echo $dis['folio'] ?>">
                                                            <form method="post" enctype="multipart/form-data" action="php/m4/crudplus.php">
                                                                <input type="hidden" name="folio" value="<?php echo $folio; ?>">

                                                                <div class="input-group mb-3">
                                                                    <div class="input-group-prepend">
                                                                        <span class="input-group-text">Factura</span>
                                                                    </div>
                                                                    <div class="custom-file">
                                                                        <input type="file" name="doc1" class="custom-file-input" required>
                                                                        <label class="custom-file-label">Elija Archivo</label>
                                                                    </div>
                                                                </div>

                                                                <div class="input-group">
                                                                    <button class="btn btn-success" name="btn-subirdocs1" type="submit">Subir documento</button>
                                                                </div>
                                                            </form>
                                                        </div>

                                                        <div style="display: none;" id="dos<?php echo $dis['folio'] ?>">

                                                            <form method="post" enctype="multipart/form-data" action="php/m4/crudplus.php">
                                                                <input type="hidden" name="folio" value="<?php echo $folio; ?>">
                                                                <div class="input-group mb-3">
                                                                    <div class="input-group-prepend">
                                                                        <span class="input-group-text">Nota de entrega</span>
                                                                    </div>
                                                                    <div class="custom-file">
                                                                        <input type="file" name="doc2" class="custom-file-input" required>
                                                                        <label class="custom-file-label">Elija Archivo</label>
                                                                    </div>
                                                                </div>
                                                                <div class="input-group">
                                                                    <button class="btn btn-success" name="btn-subirdocs2" type="submit">Subir documento</button>
                                                                </div>
                                                            </form>

                                                        </div>
                                                    <?php
                                                    } else if ($salida['estatus'] == 'LISTO') {

                                                    ?>
                                                        <div class="row">
                                                            <div class="col-6">
                                                                <button id="btn-entrega<?php echo $folio ?>" onclick="mostrar(<?php echo $folio ?>)" class="btn btn-success">Entregar Material</button>
                                                                <script>
                                                                    function mostrar(id) {
                                                                        $('#none' + id).show()
                                                                        $('#btn-entrega' + id).hide()
                                                                    }
                                                                </script>

                                                                <div id="none<?php echo $folio ?>" style="display: none;">

                                                                    <p style="color: black;">Al momento que se entregue, se le restarán la cantidad que hay en almacen</p>
                                                                    <form enctype="multipart/form-data" action="php/m4/crudplus.php" method="post">
                                                                        <input type="hidden" name="folio" value="<?php echo $folio ?>">

                                                                        <?php
                                                                        $input = $conexion->query("SELECT * FROM m4_almacen_salidas WHERE folio = '$folio'");
                                                                        foreach ($input as $input) {
                                                                            echo '
                                                                                <input type="hidden" name="cantidad[]" value="' . $input['cantidad'] . '" >
                                                                                <input type="hidden" name="modelo[]" value="' . $input['modelo'] . '" >
                                                                            ';
                                                                        }
                                                                        ?>

                                                                        <button type="submit" name="entregar-material" class="btn btn-warning">Entregar material</button>
                                                                    </form>
                                                                </div>


                                                            </div>
                                                            <div class="col-6">
                                                                <p style="color:black">Descargar documento subido</p>
                                                                <?php if ($salida['doc1'] != '') {
                                                                ?>
                                                                    <a href="php/m4/archivos/<?php echo $row['f'] ?>" download="Factura">Factura</a>
                                                                <?php
                                                                } else if ($row['doc2']  != '') {
                                                                ?>
                                                                    <a href="php/m4/archivos/<?php echo $row['ne'] ?>" download="Nota de entrega">Nota de entrega</a>
                                                                <?php
                                                                }
                                                                ?>
                                                            </div>
                                                        </div>
                                                    <?php
                                                    } else if ($salida['estatus'] == 'ENTREGADO') {
                                                    ?>
                                                        <div class="row">
                                                            <div class="col-6">
                                                                <?php 
                                                                echo 'Material ya entregado <br> Responsable quien entrego el material: <strong>'.$salida['name_user'] .'</strong>';
                                                                ?>
                                                            </div>
                                                            <div class="col-6">
                                                                <p style="color:black">Descargar documento subido</p>
                                                                <?php if ($salida['doc1'] != '') {
                                                                ?>
                                                                    <a href="php/m4/archivos/<?php echo $row['f'] ?>" download="Factura">Factura</a>
                                                                <?php
                                                                } else if ($row['doc2']  != '') {
                                                                ?>
                                                                    <a href="php/m4/archivos/<?php echo $row['ne'] ?>" download="Nota de entrega">Nota de entrega</a>
                                                                <?php
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
    <footer class="footer text-center " style="color: black;">
        
    </footer>

</div>





<script>
    function edit(id, posicion, marca, modelo, num_partes, no_serie, descripcion, pedimiento, cantidad, cantidad_max, cantidad_min, punto_reorden, precioiacsa, preciolista, fecha_soli, fecha_arribo, tiempo, unidad, proveedor, observaciones, estatus) {
        $('#editar').modal('show');
        $('#id').val(id)

        $('#1').val(posicion)
        $('#2').val(marca)
        $('#3').val(modelo)
        $('#4').val(num_partes)
        $('#5').val(no_serie)
        $('#6').val(descripcion)
        $('#7').val(pedimiento)
        $('#8').val(cantidad)
        $('#9').val(cantidad_max)
        $('#10').val(cantidad_min)
        $('#11').val(punto_reorden)
        $('#12').val(precioiacsa)
        $('#13').val(preciolista)
        $('#14').val(fecha_soli)
        $('#15').val(fecha_arribo)
        $('#16').val(tiempo)
        $('#17').val(unidad)
        $('#18').val(proveedor)
        $('#19').val(observaciones)
        $('#20').val(estatus)


    }
</script>

<div class="modal fade" id="editar" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" style="color:black">Editar</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <form action="php/m4/crud.php" method="POST">
                    <input type="hidden" id="id" name="id">
                    <div style="color:black;" class="row">

                        <div class="col-3">
                            <div class="form-group">
                                <label>Posición</label>
                                <input id="1" class="form-control" type="text" name="posicion" required>
                            </div>
                        </div>

                        <div class="col-3">
                            <div class="form-group">
                                <label>Marca</label>
                                <input id="2" class="form-control" type="text" name="marca" required>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <label>Modelo</label>
                                <input id="3" class="form-control" type="text" name="modelo" required>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <label>Número de partes</label>
                                <input id="4" class="form-control" type="text" name="num_partes" required>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <label>Número de serie</label>
                                <input id="5" class="form-control" type="text" name="no_serie" required>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <label>Descripción</label>
                                <input id="6" class="form-control" type="text" name="descripcion" required>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <label>Número de pedimiento Aduanal</label>
                                <input id="7" class="form-control" type="text" name="no_pedimiento_aduanal" required>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <label>Cantidad</label>
                                <input id="8" class="form-control" type="number" name="cantidad" required>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <label>Cantidad Máxima</label>
                                <input id="9" class="form-control" type="number" name="cantidad_max" required>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <label>Cantidad Minima</label>
                                <input id="10" class="form-control" type="number" name="cantidad_min" required>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <label>Punto de Reorden</label>
                                <input id="11" class="form-control" type="text" name="punto_reorden" required>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <label>Precio Compra</label>
                                <input id="12" class="form-control" type="number" name="precio_iacsa" required>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <label>Precio Venta</label>
                                <input id="13" class="form-control" type="number" name="precio_lista" required>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <label>Fecha_solicitud</label>
                                <input id="14" class="form-control" type="text" name="fecha_solicitud" required>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <label>Fecha_arribo</label>
                                <input id="15" class="form-control" type="text" name="fecha_arribo" required>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <label>Tiempo</label>
                                <input id="16" class="form-control" type="text" name="tiempo" required>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <label>Unidad</label>
                                <input id="17" class="form-control" type="text" name="unidad" required>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <label>Proveedor</label>
                                <input id="18" class="form-control" type="text" name="proveedor" required>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <label>Observaciones</label>
                                <input id="19" class="form-control" type="text" name="observaciones" required>
                            </div>
                        </div>

                        <div class="col-3">
                            <div class="form-group">
                                <label>Estatus</label>
                                <select id="20" class="form-control" name="estatus" required>
                                    <option value="Stock">Stock</option>
                                    <option value="Non-Stock">Non-Stock</option>
                                </select>

                            </div>
                        </div>



                        <div class="col-3">
                            <div class="form-group">
                                <br>
                                <button type="submit" name="editaralmacen" class="btn btn-warning">Editar Almacén</button>
                            </div>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>
</div>



<script src="assets/extra-libs/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="dist/js/pages/datatable/datatable-basic.init.js"></script>
<?php
include_once('global/cyp/pie.php');
?>