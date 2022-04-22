<?php
include_once('global/cyp/cabezera.php');
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
                            <li class="breadcrumb-item">Seguimiento
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

                        <h4 class="card-title mb-3">Modulo de seguimiento</h4>

                        <ul class="nav nav-tabs mb-3">
                            <li class="nav-item">
                                <a href="#seguimiento" data-toggle="tab" aria-expanded="true" class="nav-link active">
                                    <i class="mdi mdi-account-circle d-lg-none d-block mr-1"></i>
                                    <span class="d-none d-lg-block">Seguimiento</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#seguimientoplus" data-toggle="tab" aria-expanded="false" class="nav-link">
                                    <i class="mdi mdi-home-variant d-lg-none d-block mr-1"></i>
                                    <span class="d-none d-lg-block">Seguimiento (+)</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#clientes" data-toggle="tab" aria-expanded="false" class="nav-link">
                                    <i class="mdi mdi-home-variant d-lg-none d-block mr-1"></i>
                                    <span class="d-none d-lg-block">Seguimiento Clientes</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#clientesplus" data-toggle="tab" aria-expanded="false" class="nav-link">
                                    <i class="mdi mdi-home-variant d-lg-none d-block mr-1"></i>
                                    <span class="d-none d-lg-block">Seguimiento Clientes (+)</span>
                                </a>
                            </li>
                        </ul>

                        <div class="tab-content">
                            <div class="tab-pane show active" id="seguimiento">
                                <div class="row">
                                    <?php
                                    $seguimiento = $conexion->query("SELECT * FROM m5_cotizaciones ORDER BY id DESC");
                                    foreach ($seguimiento as $seg1) {
                                        $folio = $seg1['folio'];
                                    ?>

                                        <div class="col-4">
                                            <div class="card">
                                                <div style="color:black" class="card-body">
                                                    <h4 class="card-title">Folio: <?php echo $seg1['folio'] ?></h4>
                                                    <div class="mt-4 activity">
                                                        <!---->
                                                        <div class="d-flex align-items-start border-left-line pb-3">

                                                            <div class="btn btn-purple btn-circle mb-2 btn-item">
                                                                <i data-feather="external-link"></i>
                                                            </div>

                                                            <div class="ml-3 mt-2">
                                                                <h5 class="text-dark"><strong>Cotización</strong></h5>
                                                                <p class="font-14 mb-2 text-dark"><?php echo $seg1['fecha']; ?></p>
                                                            </div>
                                                        </div>
                                                        <!---->
                                                        <?php
                                                        $seguimiento2 = $conexion->query("SELECT * FROM m7_ventas WHERE folio = '$folio'");
                                                        foreach ($seguimiento2 as $seg2) {
                                                        ?>
                                                            <div class="d-flex align-items-start border-left-line pb-3">

                                                                <div class="btn btn-cyan btn-circle mb-2 btn-item">
                                                                    <i data-feather="wind"></i>
                                                                </div>

                                                                <div class="ml-3 mt-2">
                                                                    <h5 class="text-dark"><strong>Ventas</strong></h5>
                                                                    <p class="font-14 mb-2 text-dark">
                                                                        <?php
                                                                        if ($seg2['estatus'] == 'RECHAZADA') {
                                                                            echo 'Rechazado por: <strong>' . $seg2['inf'] . '</strong>';
                                                                        } else {
                                                                            echo $seg2['inf'];
                                                                        }
                                                                        ?></p>
                                                                </div>
                                                            </div>
                                                        <?php
                                                        }

                                                        /////////
                                                        $seguimiento2 = $conexion->query("SELECT * FROM m6_compras_v WHERE folio = '$folio'");
                                                        foreach ($seguimiento2 as $seg2) {
                                                        ?>
                                                            <div class="d-flex align-items-start border-left-line pb-3">

                                                                <div class="btn btn-success btn-circle mb-2 btn-item">
                                                                    <i data-feather="shopping-bag"></i>
                                                                </div>

                                                                <div class="ml-3 mt-2">
                                                                    <h5 class="text-dark"><strong>Compras</strong></h5>

                                                                </div>
                                                            </div>
                                                        <?php
                                                        }
                                                        $seguimiento2 = $conexion->query("SELECT * FROM m4_almacen_entradas WHERE folio = '$folio'");
                                                        foreach ($seguimiento2 as $seg2) {
                                                        ?>
                                                            <div class="d-flex align-items-start border-left-line pb-3">

                                                                <div class="btn btn-danger btn-circle mb-2 btn-item">
                                                                    <i data-feather="layers"></i>
                                                                </div>

                                                                <div class="ml-3 mt-2">
                                                                    <h5 class="text-dark"><strong>Almacen</strong></h5>
                                                                    <p class="font-14 mb-2 text-dark">
                                                                        <?php
                                                                        if ($seg2['name_user'] != '') {
                                                                            echo 'Persona responsable <strong> ' . $seg2['name_user'] . '</strong>';
                                                                        }
                                                                        ?>
                                                                    </p>
                                                                </div>
                                                            </div>
                                                        <?php
                                                        }
                                                        $seguimiento2 = $conexion->query("SELECT * FROM m12_facturacion WHERE folio = '$folio'");
                                                        foreach ($seguimiento2 as $seg2) {
                                                        ?>
                                                            <div class="d-flex align-items-start border-left-line pb-3">

                                                                <div class="btn btn-warning btn-circle mb-2 btn-item">
                                                                    <i data-feather="layers"></i>
                                                                </div>

                                                                <div class="ml-3 mt-2">
                                                                    <h5 class="text-dark"><strong>Facturación</strong></h5>
                                                                </div>
                                                            </div>
                                                        <?php
                                                        }
                                                        $seguimiento2 = $conexion->query("SELECT * FROM m4_almacen_mjs WHERE folio = '$folio'");
                                                        foreach ($seguimiento2 as $seg2) {
                                                        ?>
                                                            <div class="d-flex align-items-start border-left-line pb-3">

                                                                <div class="btn btn-dark btn-circle mb-2 btn-item">
                                                                    <i data-feather="layers"></i>
                                                                </div>

                                                                <div class="ml-3 mt-2">
                                                                    <h5 class="text-dark"><strong>Almacen</strong></h5>
                                                                    <p class="font-14 mb-2 text-dark">
                                                                        <?php
                                                                        if ($seg2['name_user'] != '') {
                                                                            echo 'Lo entrega: <strong>' . $seg2['name_user'] . '</strong>';
                                                                        }
                                                                        ?>
                                                                    </p>

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
                            <div class="tab-pane" id="seguimientoplus">
                                <div class="row">
                                    <?php
                                    $seguimiento = $conexion->query("SELECT DISTINCT folio FROM m7_ventas_productos ORDER BY id DESC");
                                    foreach ($seguimiento as $seg1) {
                                        $folio = $seg1['folio'];
                                    ?>
                                        <div class="col-4">
                                            <div class="card">
                                                <div style="color:black" class="card-body">
                                                    <h4 class="card-title">Folio: <?php echo $seg1['folio'] ?></h4>
                                                    <div class="mt-4 activity">

                                                        <?php
                                                        $seguimiento2 = $conexion->query("SELECT DISTINCT estatus, inf FROM m7_ventas_productos WHERE folio = '$folio'");
                                                        foreach ($seguimiento2 as $seg2) {
                                                        ?>
                                                            <div class="d-flex align-items-start border-left-line pb-3">

                                                                <div class="btn btn-cyan btn-circle mb-2 btn-item">
                                                                    <i data-feather="wind"></i>
                                                                </div>

                                                                <div class="ml-3 mt-2">
                                                                    <h5 class="text-dark"><strong>Ventas</strong></h5>
                                                                    <p class="font-14 mb-2 text-dark">
                                                                        <?php
                                                                        if ($seg2['estatus'] == 'RECHAZADA') {
                                                                            echo 'Rechazado por: <strong>' . $seg2['inf'] . '</strong>';
                                                                        } else {
                                                                            echo $seg2['inf'];
                                                                        }
                                                                        ?></p>
                                                                </div>
                                                            </div>
                                                        <?php
                                                        }

                                                        /////////
                                                        $seguimiento2 = $conexion->query("SELECT DISTINCT folio FROM m6_compras_vs WHERE folio = '$folio'");
                                                        foreach ($seguimiento2 as $seg2) {
                                                        ?>
                                                            <div class="d-flex align-items-start border-left-line pb-3">

                                                                <div class="btn btn-success btn-circle mb-2 btn-item">
                                                                    <i data-feather="shopping-bag"></i>
                                                                </div>

                                                                <div class="ml-3 mt-2">
                                                                    <h5 class="text-dark"><strong>Compras</strong></h5>

                                                                </div>
                                                            </div>
                                                        <?php
                                                        }
                                                        $seguimiento2 = $conexion->query("SELECT DISTINCT folio, name_user FROM m4_almacen_entradas_vs WHERE folio = '$folio'");
                                                        foreach ($seguimiento2 as $seg2) {
                                                        ?>
                                                            <div class="d-flex align-items-start border-left-line pb-3">

                                                                <div class="btn btn-danger btn-circle mb-2 btn-item">
                                                                    <i data-feather="layers"></i>
                                                                </div>

                                                                <div class="ml-3 mt-2">
                                                                    <h5 class="text-dark"><strong>Almacen</strong></h5>
                                                                    <p class="font-14 mb-2 text-dark">
                                                                        <?php
                                                                        if ($seg2['name_user'] != '') {
                                                                            echo 'Persona responsable <strong> ' . $seg2['name_user'] . '</strong>';
                                                                        }
                                                                        ?>
                                                                    </p>
                                                                </div>
                                                            </div>
                                                        <?php
                                                        }
                                                        $seguimiento2 = $conexion->query("SELECT DISTINCT folio FROM m12_facturacion_vs WHERE folio = '$folio'");
                                                        foreach ($seguimiento2 as $seg2) {
                                                        ?>
                                                            <div class="d-flex align-items-start border-left-line pb-3">

                                                                <div class="btn btn-warning btn-circle mb-2 btn-item">
                                                                    <i data-feather="layers"></i>
                                                                </div>

                                                                <div class="ml-3 mt-2">
                                                                    <h5 class="text-dark"><strong>Facturación</strong></h5>
                                                                </div>
                                                            </div>
                                                        <?php
                                                        }
                                                        $seguimiento2 = $conexion->query("SELECT DISTINCT folio, name_user FROM m4_almacen_salidas WHERE folio = '$folio'");
                                                        foreach ($seguimiento2 as $seg2) {
                                                        ?>
                                                            <div class="d-flex align-items-start border-left-line pb-3">

                                                                <div class="btn btn-dark btn-circle mb-2 btn-item">
                                                                    <i data-feather="layers"></i>
                                                                </div>

                                                                <div class="ml-3 mt-2">
                                                                    <h5 class="text-dark"><strong>Almacen</strong></h5>
                                                                    <p class="font-14 mb-2 text-dark">
                                                                        <?php
                                                                        if ($seg2['name_user'] != '') {
                                                                            echo 'Lo entrega: <strong>' . $seg2['name_user'] . '</strong>';
                                                                        }
                                                                        ?>
                                                                    </p>

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
                            <div class="tab-pane" id="clientes">
                                <div class="table-responsive">
                                    <table id="clientestable" class="table table-striped table-bordered no-wrap">
                                        <thead>
                                            <tr>
                                                <th>Empresa</th>
                                                <th>Contacto</th>
                                                <th>Direccion</th>
                                                <th>Télefono</th>
                                                <th>Correo</th>
                                                <th>Area</th>
                                                <th>Movil</th>
                                                <th>Folio</th>
                                                <th>Nombre</th>
                                                <th>Modelo</th>
                                                <th>Partes</th>
                                                <th>Descripcion</th>
                                                <th>Cantidad</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $consulta = $conexion->query("SELECT m3c.empresa, m3c.contacto, m3c.direccion, m3c.telefono, m3c.correo, m3c.area, m3c.movil, m3p.folio, m3p.nombre, m3p.modelo, m3p.partes, m3p.descripcion, m4s.1_cantidad FROM m3_clientes AS m3c INNER JOIN m3_clientes_productos AS m3p ON m3c.codigo = m3p.codigo_cliente INNER JOIN m4_almacen_mjs AS m4s ON m3p.folio = m4s.folio");
                                            foreach ($consulta as $row) {
                                            ?>
                                                <tr style="color:black">
                                                    <td><?php echo $row['empresa']; ?></td>
                                                    <td><?php echo $row['contacto']; ?></td>
                                                    <td><?php echo $row['direccion']; ?></td>
                                                    <td><?php echo $row['telefono']; ?></td>
                                                    <td><?php echo $row['correo']; ?></td>
                                                    <td><?php echo $row['area']; ?></td>
                                                    <td><?php echo $row['movil']; ?></td>
                                                    <td><?php echo $row['folio']; ?></td>
                                                    <td><?php echo $row['nombre']; ?></td>
                                                    <td><?php echo $row['modelo']; ?></td>
                                                    <td><?php echo $row['partes']; ?></td>
                                                    <td><?php echo $row['descripcion']; ?></td>
                                                    <td><?php echo $row['1_cantidad']; ?></td>
                                                </tr>
                                            <?php
                                            }
                                            ?>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="tab-pane" id="clientesplus">
                                <div class="table-responsive">
                                    <table id="clientesplustable" class="table table-striped table-bordered no-wrap">
                                        <thead>
                                            <tr>
                                                <th>Empresa</th>
                                                <th>Contacto</th>
                                                <th>Direccion</th>
                                                <th>Télefono</th>
                                                <th>Correo</th>
                                                <th>Area</th>
                                                <th>Movil</th>
                                                <th>Folio</th>
                                                <th>Nombre</th>
                                                <th>Modelo</th>
                                                <th>Partes</th>
                                                <th>Descripcion</th>
                                                <th>Cantidad</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $consulta = $conexion->query("SELECT m3c.empresa, m3c.contacto, m3c.direccion, m3c.telefono, m3c.correo, m3c.area, m3c.movil, m7vp.folio, m7vp.marca, m7vp.modelo, m7vp.partes, m7vp.descripcion, m7vp.cantidad FROM m3_clientes AS m3c INNER JOIN m7_ventas_productos AS m7vp ON m3c.codigo = m7vp.codigo_cliente WHERE m7vp.estatus = 'ENTREGADO';");
                                            foreach ($consulta as $row) {
                                            ?>
                                                <tr style="color:black">
                                                    <td><?php echo $row['empresa']; ?></td>
                                                    <td><?php echo $row['contacto']; ?></td>
                                                    <td><?php echo $row['direccion']; ?></td>
                                                    <td><?php echo $row['telefono']; ?></td>
                                                    <td><?php echo $row['correo']; ?></td>
                                                    <td><?php echo $row['area']; ?></td>
                                                    <td><?php echo $row['movil']; ?></td>
                                                    <td><?php echo $row['folio']; ?></td>
                                                    <td><?php echo $row['marca']; ?></td>
                                                    <td><?php echo $row['modelo']; ?></td>
                                                    <td><?php echo $row['partes']; ?></td>
                                                    <td><?php echo $row['descripcion']; ?></td>
                                                    <td><?php echo $row['cantidad']; ?></td>
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
        </div>




    </div>
    <footer class="footer text-center " style="color: black;">
        44 Poniente #502 esq. blvd. 5 de Mayo Col. Santa María, C.P. 72080 Puebla, Puebla. <br>
        Tel: (222) 2-20-54-44, (222) 5-14-75-56 coordinacion@iacsa-puebla.com.mx
    </footer>

</div>

<script src="assets/extra-libs/datatables.net/js/jquery.dataTables.min.js"></script>
<script>
    $('#clientestable').DataTable()
    $('#clientesplustable').DataTable()
</script>
<?php
include_once('global/cyp/pie.php');
?>