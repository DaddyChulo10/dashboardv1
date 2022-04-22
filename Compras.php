<?php
include_once('global/cyp/cabezera.php');
if ($_SESSION['M6'] == 'Si' || $_SESSION['M6'] == 'TEM') {
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
                            <li class="breadcrumb-item">Compras
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

                        <h4 class="card-title mb-3">Compras</h4>

                        <ul class="nav nav-tabs mb-3">

                            <li class="nav-item">
                                <a href="#mjs" data-toggle="tab" aria-expanded="true" class="nav-link active">
                                    <i class="mdi mdi-account-circle d-lg-none d-block mr-1"></i>
                                    <span class="d-none d-lg-block">Notificación</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#soli" data-toggle="tab" aria-expanded="false" class="nav-link">
                                    <i class="mdi mdi-home-variant d-lg-none d-block mr-1"></i>
                                    <span class="d-none d-lg-block">Solicitudes</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#soliplus" data-toggle="tab" aria-expanded="false" class="nav-link">
                                    <i class="mdi mdi-home-variant d-lg-none d-block mr-1"></i>
                                    <span class="d-none d-lg-block">Solicitudes (+)</span>
                                </a>
                            </li>

                        </ul>

                        <div class="tab-content">
                            <div class="tab-pane show active" id="mjs">
                                <?php
                                $query = mysqli_query($conexion, 'SELECT * FROM m6_compras_mjs WHERE fecha ORDER BY id DESC');
                                foreach ($query as $row) {
                                ?>
                                    <div class="card">
                                        <div class="card-body collapse show">
                                            <h4 class="card-title">Folio: <?php echo $row['folio']; ?></h4>
                                            <p style="color: black">Nombre: <?php echo $row['user1'] ?> <br> Mensaje: <?php echo $row['mjs1'] ?></p>
                                            <p style="color: black">Nombre: <?php echo $row['user2'] ?> <br> Mensaje: <?php echo $row['mjs2'] ?></p>
                                            <?php
                                            if ($row['mjs2'] == 'N/A') {
                                            ?>
                                                <form action="php/m6/mjs.php" method="post">
                                                    <input type="hidden" name="folio" value="<?php echo $row['folio']; ?>">
                                                    <textarea class="form-control" name="mjs" rows="5" required></textarea>
                                                    <br>
                                                    <button class="btn btn-success" name="mjs2">Responder mensaje</button>
                                                </form>
                                            <?php
                                            }
                                            ?>
                                        </div>
                                    </div>
                                <?php
                                }
                                ?>
                            </div>
                            <div class="tab-pane" id="soli">
                                <?php
                                $query = $conexion->query('SELECT * FROM m6_compras_v WHERE id ORDER BY id DESC');
                                foreach ($query as $row) {
                                ?>
                                    <div class="card">
                                        <div class="card-body collapse show">
                                            <h4 class="card-title">Folio: <?php echo $row['folio']; ?></h4>
                                            <p style="color:black;">Se neceista la cantidad de: <strong><?php echo $row['cantidad'] . 'pzas ' ?></strong> Marca: <strong><?php echo $row['nombre'] ?></strong>, Modelo: <strong><?php echo $row['modelo']; ?></strong>, Número de partes <strong><?php echo $row['num_partes'] ?></strong>, Mensaje: <strong><?php echo $row['inf'] ?></strong> </p>
                                            <?php
                                            if ($row['doc1'] == '' && $row['doc2'] == '' && $row['doc3'] == '') {
                                            ?>
                                                <div class="row">
                                                    <div class="col-10">
                                                        <form action="php/m6/crud.php" method="post" enctype="multipart/form-data">
                                                            Subir documentos
                                                            <div class="input-group mb-3">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text">Cotización</span>
                                                                </div>
                                                                <div class="custom-file">
                                                                    <input type="file" name="doc1" class="custom-file-input" required>
                                                                    <label class="custom-file-label">Elija Archivo</label>
                                                                </div>
                                                            </div>
                                                            <div class="input-group mb-3">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text">Orden de compra</span>
                                                                </div>
                                                                <div class="custom-file">
                                                                    <input type="file" name="doc2" class="custom-file-input" required>
                                                                    <label class="custom-file-label">Elija Archivo</label>
                                                                </div>
                                                            </div>
                                                            <div class="input-group mb-3">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text">Ficha de deposito</span>
                                                                </div>
                                                                <div class="custom-file">
                                                                    <input type="file" name="doc3" class="custom-file-input" required>
                                                                    <label class="custom-file-label">Elija Archivo</label>
                                                                </div>
                                                            </div>

                                                            <div class="input-group">
                                                                <input type="hidden" name="folio" value="<?php echo $row['folio'] ?>">
                                                                <button class="btn btn-success" name="btn-subirdocs" type="submit">Subir documentos</button>
                                                            </div>
                                                        </form>
                                                    </div>

                                                </div>
                                            <?php
                                            } else {
                                            ?>
                                                <p style="color:black;">Notificar almacén </p>
                                                <div class="row">
                                                    <div class="col-6">
                                                        <?php
                                                        $queryentradas = $conexion->query("SELECT COUNT(*) AS contar FROM m4_almacen_entradas WHERE folio = '$row[folio]'");
                                                        $array = mysqli_fetch_array($queryentradas);
                                                        if ($array['contar'] == 0) {

                                                        ?>
                                                            <form action="php/m4/crud.php" method="POST">
                                                                <input type="hidden" name="folio" value="<?php echo $row['folio'] ?>">
                                                                <input type="hidden" name="marca" value="<?php echo $row['marca'] ?>">
                                                                <input type="hidden" name="nombre" value="<?php echo $row['nombre'] ?>">
                                                                <input type="hidden" name="modelo" value="<?php echo $row['modelo'] ?>">
                                                                <input type="hidden" name="descripcion" value="<?php echo $row['descripcion'] ?>">
                                                                <input type="hidden" name="cantidad" value="<?php echo $row['cantidad'] ?>">
                                                                <input type="hidden" name="partes" value="<?php echo $row['num_partes'] ?>">
                                                                <input type="hidden" name="idproductoalmacen" value="<?php echo $row['id_producto_almacen'] ?>">
                                                                <button type="submit" name="btnnotificarentrada" class="btn btn-success">Notificar almacen</button>
                                                            </form>

                                                        <?php
                                                        } else {
                                                            echo '<p style= "color:black;"> Ya se notifico Almacen</p>';
                                                        }
                                                        ?>
                                                    </div>
                                                    <div class="col-6">
                                                        <p> Descargar documentos subidos</p>
                                                        <a href="php/m6/archivos/<?php echo $row['doc1'] ?>" download="Cotizacion">Cotizacion</a>
                                                        <br>
                                                        <a href="php/m6/archivos/<?php echo $row['doc2'] ?>" download="Orden de compra">Orden de compra</a>
                                                        <br>
                                                        <a href="php/m6/archivos/<?php echo $row['doc3'] ?>" download="Ficha de deposito">Ficha de deposito</a>

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
                            <div class="tab-pane" id="soliplus">
                                <?php
                                $consultadis = $conexion->query("SELECT DISTINCT folio FROM m6_compras_vs WHERE id ORDER BY id DESC");
                                foreach ($consultadis as $dis) {


                                ?>
                                    <div class="card">
                                        <div class="card-body collapse show">
                                            <h4 class="card-title">Folio: <?php echo $dis['folio'] ?> </h4>
                                            <?php
                                            $consulta = $conexion->query("SELECT * FROM m6_compras_vs WHERE folio = '$dis[folio]'");

                                            echo '
                                            <div class="container">
                                                <div class="row">
                                                    <div class="col-6">';
                                            foreach ($consulta as $row) {
                                                $doc1 = $row['doc1'];
                                                $doc2 = $row['doc2'];
                                                $doc3 = $row['doc3'];
                                                echo '
                                                        
                                                            <ul style="color:black;" class="list-group list-group-horizontal">
                                                            
                                                                <li class="list-group-item" style="width:200px;"> Cantidad: <strong>' . $row['cantidad'] . '</strong></li>
                                                                <li class="list-group-item" style="width:200px;"> Información: <strong>' . $row['inf'] . '</strong></li>
                                                            </ul>
                                                            <br>
                                                       
                                                        ';
                                            }

                                            if ($doc1 == '' && $doc2 == '' && $doc3 == '') {


                                                echo '
                                                    </div>
                                                    <div style="color:black" class="col-6">
                                                        <form action="php/m6/crudplus.php" method="post" enctype="multipart/form-data">
                                                            Subir documentos
                                                            <div class="input-group mb-3">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text">Cotización</span>
                                                                </div>
                                                                <div class="custom-file">
                                                                    <input type="file" name="doc1" class="custom-file-input" required>
                                                                    <label class="custom-file-label">Elija Archivo</label>
                                                                </div>
                                                            </div>
                                                            <div class="input-group mb-3">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text">Orden de compra</span>
                                                                </div>
                                                                <div class="custom-file">
                                                                    <input type="file" name="doc2" class="custom-file-input" required>
                                                                    <label class="custom-file-label">Elija Archivo</label>
                                                                </div>
                                                            </div>
                                                            <div class="input-group mb-3">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text">Ficha de deposito</span>
                                                                </div>
                                                                <div class="custom-file">
                                                                    <input type="file" name="doc3" class="custom-file-input" required>
                                                                    <label class="custom-file-label">Elija Archivo</label>
                                                                </div>
                                                            </div>

                                                            <div class="input-group">
                                                                <input type="hidden" name="folio" value="' . $row['folio'] . '">
                                                                <button class="btn btn-success" name="btn-subirdocs" type="submit">Subir documentos</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                               
                                            ';
                                            } else {
                                                echo '
                                                    </div>
                                                    <div style="color:black" class="col-6">
                                                    ';
                                                $constaalmacen = $conexion->query("SELECT COUNT(*) AS contar FROM m4_almacen_entradas_vs WHERE folio = '$dis[folio]'");
                                                $arrayconstaalmacen = mysqli_fetch_array($constaalmacen);
                                                if ($arrayconstaalmacen['contar'] == 0) {
                                                    echo '
                                                        <form method="POST" Action="php/m4/crudplus.php"> ';
                                                    $consultalmacen = $conexion->query("SELECT * FROM m6_compras_vs WHERE folio = '$dis[folio]'");
                                                    foreach($consultalmacen as $row){
                                                        echo '
                                                            <input type="hidden" name="folio[]" value="' . $dis['folio'] . '">
                                                            <input type="hidden" name="cantidad[]" value="' . $row['cantidad'] . '">
                                                            <input type="hidden" name="info[]" value="' . $row['inf'] . '">
                                                            ';
                                                    }
                                                    echo ' <button name="EnviarAlmacen" class="btn btn-info" type="submit">Solicitar Almacen</button> 
                                                        </form>
                                                            ';
                                                } else {
                                                    echo '<p style"color:black;">Ya se notifico Almacen</p>';
                                                    echo '
                                                        <p> Descargar documentos subidos</p>
                                                        <a href="php/m6/archivos/'. $row['doc1'] .'" download="Cotizacion">Cotizacion</a>
                                                        <br>
                                                        <a href="php/m6/archivos/'. $row['doc2'] .'" download="Orden de compra">Orden de compra</a>
                                                        <br>
                                                        <a href="php/m6/archivos/'. $row['doc3'] .'" download="Ficha de deposito">Ficha de deposito</a>
                                                    ';
                                                }

                                                echo '
                                                    </div>
                                                </div>
                                            </div>
                                                    ';
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
    <!-- 
        Se corrigio un errir que se me generaba en el modulo de cotizaciones en el apartado de stock
        Se hicieron correcciones en el modulo de cotizaciones, cuando el usuario da clic en tipo de solicitud/producto, los campos se convierte en obligatorios
        Ventas Solicita a compras la cantidad de material a adquirir
        Se creo la base de datos a compras
        Compras ya se puede subir documentos(Cotizacion|Orden de compra|ficha de deposito)


        Se va a notificar a almacén de las entradas que realizo compras, y se va a cambiar los productos en almacen
-->
    <footer class="footer text-center " style="color: black;">
        
    </footer>

</div>

<?php
include_once('global/cyp/pie.php');
?>