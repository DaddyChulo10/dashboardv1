<?php
include_once('global/cyp/cabezera.php');
if ($_SESSION['M12'] == 'Si' || $_SESSION['M12'] == 'TEM') {
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
                            <li class="breadcrumb-item">Facturación
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

                        <h4 class="card-title mb-3">Modulo de Facturación</h4>

                        <ul class="nav nav-tabs mb-3">
                            <li class="nav-item">
                                <a href="#notificacion" data-toggle="tab" aria-expanded="true" class="nav-link active">
                                    <i class="mdi mdi-account-circle d-lg-none d-block mr-1"></i>
                                    <span class="d-none d-lg-block">Notificación</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#notificacionplus" data-toggle="tab" aria-expanded="false" class="nav-link">
                                    <i class="mdi mdi-home-variant d-lg-none d-block mr-1"></i>
                                    <span class="d-none d-lg-block">Notificacion (+)</span>
                                </a>
                            </li>


                        </ul>

                        <div class="tab-content">
                            <div class="tab-pane show active" id="notificacion">

                                <?php
                                $insert = $conexion->query("SELECT * FROM m12_facturacion WHERE id ORDER BY id DESC");
                                foreach ($insert as $row) {


                                ?>
                                    <div class="card">
                                        <div class="card-body collapse show">
                                            <h4 class="card-title">Folio <?php echo $row['folio'] ?></h4>
                                            <?php
                                            if ($row['oc'] == '' && $row['fd'] == '') {
                                            ?>
                                                <!--
                                                <div class="row">
                                                    <div class="col-3">
                                                        <button class="btn btn-info" type="button" onclick="orden(<?php echo $row['id'] ?>)">Por Orden de compra</button>
                                                    </div>
                                                    <div class="col-3">
                                                        <button class="btn btn-info" type="button" onclick="ficha(<?php echo $row['id'] ?>)">Por Ficha de deposito</button>
                                                    </div>
                                                </div>
                                                <br> -->
                                                <script>
                                                    /* function orden(id) {
                                                        $('#orden' + id).show()
                                                        $('#ficha' + id).hide()
                                                        $('#ficha' + id).val('')
                                                    }

                                                    function ficha(id) {
                                                        $('#ficha' + id).show()
                                                        $('#orden' + id).hide()
                                                        $('#orden' + id).val('')
                                                    }*/
                                                </script>

                                                <!--
                                                <div style="display: none;" id="orden<?php # echo $row['id'] 
                                                                                        ?>">
                                                    <form method="post" enctype="multipart/form-data" action="php/m12/crud.php">
                                                        <input type="hidden" name="folio" value="<?php # echo $row['folio']; 
                                                                                                    ?>">
                                                        <div class="input-group mb-3">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text">Orden de Compra</span>
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

                                                <div style="display: none;" id="ficha<?php # echo $row['id'] 
                                                                                        ?>">
                                                    <form method="post" enctype="multipart/form-data" action="php/m12/crud.php">
                                                        <input type="hidden" name="folio" value="<?php # echo $row['folio']; 
                                                                                                    ?>">
                                                        <div class="input-group mb-3">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text">Ficha de deposito</span>
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

                                                -->

                                                <form method="post" enctype="multipart/form-data" action="php/m12/crud.php">
                                                    <input type="hidden" name="folio" value="<?php echo $row['folio']; ?>">

                                                    <div class="input-group mb-3">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">Orden de Compra</span>
                                                        </div>
                                                        <div class="custom-file">
                                                            <input type="file" name="doc1" class="custom-file-input" required>
                                                            <label class="custom-file-label">Elija Archivo</label>
                                                        </div>
                                                    </div>
                                                    <div class="input-group mb-3">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">Ficha de deposito</span>
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

                                            <?php
                                            } else {
                                            ?>
                                                <div class="row">
                                                    <div class="col-6">

                                                        <?php
                                                        $folio = $row['folio'];
                                                        $insertfacturacion = $conexion->query("SELECT COUNT(*) AS contar FROM m4_almacen_mjs WHERE folio = '$folio'");
                                                        $array = mysqli_fetch_array($insertfacturacion);
                                                        if ($array['contar'] == 0) { ?>
                                                            <form action="php/m4/crud.php" method="post">
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

                                                                <button type="submit" name="btn-noti-almacen" class="btn btn-success">Notificar Almacen</button>
                                                            </form>
                                                        <?php } else {
                                                            echo '<p style="color:black;">Ya se notifico en almacen...</p>';
                                                        } ?>
                                                    </div>
                                                    <div class="col-6">
                                                        <p style="color:black">Descargar documentos subidos</p>
                                                        <?php # if ($row['oc'] != '') {
                                                        ?>
                                                        <a class="btn btn-info" href="php/m12/archivos/<?php echo $row['oc'] ?>" download="Orden de compra">Orden de compra</a>
                                                        <?php
                                                        #} else if ($row['fd']  != '') {
                                                        ?>
                                                        <a class="btn btn-info" href="php/m12/archivos/<?php echo $row['fd'] ?>" download="Ficha de deposito">Ficha de deposito</a>
                                                        <?php
                                                        #}  
                                                        ?>
                                                    </div>
                                                </div>

                                            <?php
                                            }
                                            ?>
                                        </div>
                                    </div>
                                <?php
                                }
                                ?>

                            </div>
                            <div class="tab-pane" id="notificacionplus">


                                <div class="card">
                                    <?php
                                    $distinct = $conexion->query("SELECT DISTINCT folio FROM m12_facturacion_vs WHERE id ORDER BY id DESC");
                                    foreach ($distinct as $dis) {
                                        $folio = $dis['folio'];
                                    ?>
                                        <div class="card-body collapse show">
                                            <h4 class="card-title">Folio: <?php echo $dis['folio']; ?></h4>
                                            <?php
                                            $consultadoc = $conexion->query("SELECT * FROM m12_facturacion_vs WHERE folio = '$folio'");
                                            foreach ($consultadoc as $row) {
                                            }
                                            if ($row['doc1'] == '' && $row['doc2'] == '') {
                                                echo
                                                '
                                                    <form method="post" enctype="multipart/form-data" action="php/m12/crudplus.php">
                                                    <input type="hidden" name="folio" value="' . $folio . '">

                                                    <div class="input-group mb-3">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">Orden de Compra</span>
                                                        </div>
                                                        <div class="custom-file">
                                                            <input type="file" name="doc1" class="custom-file-input" required>
                                                            <label class="custom-file-label">Elija Archivo</label>
                                                        </div>
                                                    </div>
                                                    <div class="input-group mb-3">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">Ficha de deposito</span>
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
                                                    
                                                    ';
                                            } else {
                                                echo '
                                                <div class="row">
                                                    <div class="col-6">';
                                                $consultaalmacen = $conexion->query("SELECT COUNT(*) AS contar FROM m4_almacen_salidas WHERE folio='$folio'");
                                                $arrayconsultaalmacen = mysqli_fetch_array($consultaalmacen);
                                                if ($arrayconsultaalmacen['contar'] == 0) {
                                                    echo
                                                    '
                                                    <form action="php/m4/crudplus.php" method="POST">';
                                                    $consultadoc = $conexion->query("SELECT * FROM m12_facturacion_vs WHERE folio = '$folio'");
                                                    foreach ($consultadoc as $row) {
                                                        echo '
                                                            <input type="hidden" name="codigo_cliente[]" value="' . $row['codigo_cliente'] . '">
                                                            <input type="hidden" name="folio[]" value="' . $row['folio'] . '">
                                                            <input type="hidden" name="empresa[]" value="' . $row['empresa'] . '">
                                                            <input type="hidden" name="contacto[]" value="' . $row['contacto'] . '">
                                                            <input type="hidden" name="direccion[]" value="' . $row['direccion'] . '">
                                                            <input type="hidden" name="telefono[]" value="' . $row['telefono'] . '">
                                                            <input type="hidden" name="correo[]" value="' . $row['correo'] . '">
                                                            <input type="hidden" name="marca[]" value="' . $row['marca'] . '">
                                                            <input type="hidden" name="modelo[]" value="' . $row['modelo'] . '">
                                                            <input type="hidden" name="descripcion[]" value="' . $row['descripcion'] . '">
                                                            <input type="hidden" name="cantidad[]" value="' . $row['cantidad'] . '">
                                                            <input type="hidden" name="partes[]" value="' . $row['partes'] . '">
                                                            <input type="hidden" name="precio[]" value="' . $row['precio'] . '">
                                                        ';
                                                    }
                                                    echo '
                                                        <button class ="btn btn-success" name="notificaralmacen">Notificar Almacen</button>
                                                    </form>
                                                    ';
                                                } else {
                                                    echo '<p style="color:black;">Ya se notifico en almacén...</p>';
                                                }

                                                echo '
                                                    </div>
                                                    <div class="col-6">
                                                   
                                                        <p style="color:black;"> Descargar documentos subidos</p>
                                                        <a href="php/m12/archivos/' . $row['doc1'] . '"  download="Orden de compra">Orden de compra</a>
                                                        <br>
                                                        <a href="php/m12/archivos/' . $row['doc2'] . '"  download="Ficha de deposito">Ficha de deposito</a>
                                                       
                                                       
                                                       
                                                    </div>
                                                </div>';
                                            }

                                            ?>
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
        
    </footer>

</div>

<?php
include_once('global/cyp/pie.php');
?>