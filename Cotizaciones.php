<?php
include_once('global/cyp/cabezera.php');
if ($_SESSION['M5'] == 'Si' || $_SESSION['M5'] == 'TEM') {
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
                            <li class="breadcrumb-item">Cotizaciones
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

                        <h4 class="card-title mb-3">Modulo de cotizaciónes</h4>

                        <ul class="nav nav-tabs mb-3">
                            <li class="nav-item">
                                <a href="#cotiza" data-toggle="tab" aria-expanded="true" class="nav-link active">
                                    <i class="mdi mdi-home-variant d-lg-none d-block mr-1"></i>
                                    <span class="d-none d-lg-block">Cotización</span>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="#s" data-toggle="tab" aria-expanded="false" class="nav-link">
                                    <i class="mdi mdi-account-circle d-lg-none d-block mr-1"></i>
                                    <span class="d-none d-lg-block">Stock</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#vi" data-toggle="tab" aria-expanded="false" class="nav-link">
                                    <i class="mdi mdi-home-variant d-lg-none d-block mr-1"></i>
                                    <span class="d-none d-lg-block">Validar información</span>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="#ssa" data-toggle="tab" aria-expanded="false" class="nav-link">
                                    <i class="mdi mdi-settings-outline d-lg-none d-block mr-1"></i>
                                    <span class="d-none d-lg-block">Solicitudes sin Asignar</span>
                                </a>
                            </li>
                        </ul>

                        <div class="tab-content">
                            <div class="tab-pane show active" id="cotiza">

                                <?php
                                $consulta3 = "SELECT * FROM m5_cotizacion WHERE id_user = '$_SESSION[ID]' ORDER BY id DESC ";
                                $query3 = mysqli_query($conexion, $consulta3);
                                foreach ($query3 as $rowcotiza) {


                                ?>
                                    <div class="card">
                                        <div class="card-body collapse show">
                                            <h4 class="card-title">Folio: <?php echo $rowcotiza['folio'] ?></h4>
                                            <p style="color: black;">
                                                <strong>Empresa :</strong> <?php echo $rowcotiza['empresa'] ?> <strong>Contacto :</strong><?php echo $rowcotiza['contacto'] ?>
                                                <strong>Teléfono :</strong> <?php echo $rowcotiza['telefono'] ?> <strong>Email : </strong><?php echo $rowcotiza['correo'] ?>
                                            </p>
                                            <p style="color: black;">
                                                <strong>Cantidad: </strong><?php echo $rowcotiza['1_cantidad'] ?> <strong></strong> PZA <strong>Marca</strong> <?php echo $rowcotiza['1_marca'] ?>
                                                <strong>Descripción</strong> <?php echo $rowcotiza['1_descripcion'] ?> <strong>Tiempo de entrega </strong> <?php echo $rowcotiza['entrega'] ?> <strong>Precio unitario </strong><?php echo '$' . $rowcotiza['precio'] ?>

                                            </p>
                                            <div class="row">

                                                <?php
                                                $folioventas = $rowcotiza['folio'];
                                                $consulta4 = "SELECT COUNT(*) AS ventas FROM m7_ventas WHERE folio = '$folioventas'";
                                                $query4 = mysqli_query($conexion, $consulta4);
                                                $arrar4 = mysqli_fetch_array($query4);
                                                if ($arrar4['ventas'] == 0) {


                                                ?>
                                                    <div class="col-6">
                                                        <form action="php/m7/crud.php" method="post">
                                                            <input type="hidden" name="folio" value="<?php echo $rowcotiza['folio'];  ?>">
                                                            <input type="hidden" name="solicitud" value="<?php echo $rowcotiza['solicitud'];  ?>">
                                                            <input type="hidden" name="persona" value="<?php echo $rowcotiza['persona'];  ?>">
                                                            <input type="hidden" name="fecha_1" value="<?php echo $rowcotiza['fecha_1'];  ?>">
                                                            <input type="hidden" name="empresa" value="<?php echo  $rowcotiza['empresa']; ?>">
                                                            <input type="hidden" name="contacto" value="<?php echo  $rowcotiza['contacto']; ?>">
                                                            <input type="hidden" name="direccion" value="<?php echo  $rowcotiza['direccion']; ?>">
                                                            <input type="hidden" name="telefono" value="<?php echo  $rowcotiza['telefono']; ?>">
                                                            <input type="hidden" name="correo" value="<?php echo  $rowcotiza['correo']; ?>">
                                                            <input type="hidden" name="1_marca" value="<?php echo  $rowcotiza['1_marca']; ?>">
                                                            <input type="hidden" name="1_nombre" value="<?php echo  $rowcotiza['1_nombre']; ?>">
                                                            <input type="hidden" name="1_modelo" value="<?php echo  $rowcotiza['1_modelo']; ?>">
                                                            <input type="hidden" name="1_descripcion" value="<?php echo  $rowcotiza['1_descripcion']; ?>">
                                                            <input type="hidden" name="1_cantidad" value="<?php echo  $rowcotiza['1_cantidad']; ?>">
                                                            <input type="hidden" name="1_partes" value="<?php echo  $rowcotiza['1_partes']; ?>">
                                                            <input type="hidden" name="precio" value="<?php echo  $rowcotiza['precio']; ?>">
                                                            <input type="hidden" name="entrega" value="<?php echo  $rowcotiza['entrega']; ?>">
                                                            <input type="hidden" name="validado" value="<?php echo  $rowcotiza['validado']; ?>">
                                                            <button name="aceptacoti" class="btn btn-success" type="submit">Mandar el modulo de ventas</button>
                                                        </form>
                                                    </div>
                                                <?php
                                                } else {
                                                    echo '<p style="color:black;">Folio enviado a Ventas</p>';
                                                }
                                                ?>
                                                <div class="col-6">
                                                    <form action="php/m5/diseño.php" method="post">

                                                        <!--<button type="submit" class="btn btn-dark">Generar Cotización</button>-->
                                                    </form>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                <?php
                                }
                                ?>

                            </div>
                            <div class="tab-pane" id="s">
                                <?php
                                $consulta = "SELECT * FROM m5_cotizaciones WHERE estatus = '1' AND id_user = '$_SESSION[ID]' ORDER BY fecha DESC";
                                $query = mysqli_query($conexion, $consulta);
                                foreach ($query as $row) {
                                ?>
                                    <div class="card">
                                        <div class="card-body collapse show">
                                            <p class="card-text" style="color:black;">
                                                Folio: <strong><?php echo $row['folio'] ?></strong>
                                                Marca: <strong> <?php echo $row['1_marca'] ?></strong>
                                                Nombre: <strong><?php echo $row['1_nombre'] ?></strong>
                                                Modelo: <strong><?php echo $row['1_modelo'] ?></strong>
                                                Descripción: <strong> <?php echo $row['1_descripcion'] ?></strong>
                                                Cantidad: <strong><?php echo $row['1_cantidad'] ?></strong>
                                                Número de partes: <strong><?php echo $row['1_partes'] ?></strong>
                                            </p>
                                            <?php
                                            $modelo = $row['1_modelo'];
                                            $partes = $row['1_partes'];
                                            $cantidad = $row['1_cantidad'];
                                            $folio = $row['folio'];
                                            $consulta = "SELECT COUNT(*) AS contar FROM m4_almacen2 WHERE modelo = '$modelo' ";
                                            $consulta0 = "SELECT COUNT(*) AS contar0 FROM m4_almacen2 WHERE num_partes = '$partes' ";
                                            $query = mysqli_query($conexion, $consulta);
                                            $query0 = mysqli_query($conexion, $consulta0);
                                            $array = mysqli_fetch_array($query);
                                            $array0 = mysqli_fetch_array($query0);

                                            if ($array['contar'] >= 1) {
                                                echo '<p style="color: orange;">Validado por el Modelo</p>';
                                                $consulta1 = "SELECT * FROM m4_almacen2 WHERE modelo = '$modelo'";
                                                $query1 = mysqli_query($conexion, $consulta1);
                                                foreach ($query1 as $row1) {
                                                    #AAAAAAAqui
                                                    echo '<p style="color:black"> Solicito el cliente: ' . $cantidad . ' Hay en almacen: ' . $row1['cantidad'] . '  Stock: ' . $row1['estatus'] . ' Precio x Unidad $' . $row1['precio_lista'] . ' </p>';
                                                    if ($row1['estatus'] == 'Stock') {
                                                        if ($cantidad <= $row1['cantidad']) {

                                            ?>
                                                            <div class="row">

                                                                <div style="color:black;" class="col-6">
                                                                    <form action="php/m5/cotizacion.php" method="post">
                                                                        <label>Marca</label><br>
                                                                        <input value="<?php echo $row['1_marca']; ?>" type="text" name="marca" class="form-control" required>
                                                                </div>
                                                                <div style="color:black;" class="col-6">
                                                                    <label>Nombre</label><br>
                                                                    <input value="<?php echo $row1['marca']; ?>" type="text" name="nombre" class="form-control" required>
                                                                </div>
                                                                <div style="color:black;" class="col-6">
                                                                    <label>Modelo</label><br>
                                                                    <input value="<?php echo $row['1_modelo']; ?>" type="text" name="modelo" class="form-control" required>
                                                                </div>
                                                                <div style="color:black;" class="col-6">
                                                                    <label>Descripción</label><br>
                                                                    <input value="<?php echo $row1['descripcion']; ?>" type="text" name="descripcion" class="form-control" required>
                                                                </div>
                                                                <div style="color:black;" class="col-6">
                                                                    <label>Cantidad</label><br>
                                                                    <input value="<?php echo $row['1_cantidad']; ?>" type="number" name="cantidad" class="form-control" required>
                                                                </div>
                                                                <div style="color:black;" class="col-6">
                                                                    <label>Número de partes</label><br>
                                                                    <input value="<?php echo $row['1_partes']; ?>" type="text" name="partes" class="form-control" required>
                                                                </div>
                                                                <div style="color:black;" class="col-6">
                                                                    <label>Precio Unitario (Solo números, sin comas)</label><br>
                                                                    <input type="number" value="<?php echo $row1['precio_lista'] ?>" name="precio" class="form-control" required>
                                                                </div>
                                                                <div style="color:black;" class="col-6">
                                                                    <label>Tiempo de entrega</label><br>
                                                                    <input type="text" value="<?php echo $row1['tiempo'] ?>" name="entrega" class="form-control" required>
                                                                </div>
                                                                <div style="color:black;" class="col-6">
                                                                    <label>Acciones</label><br>
                                                                    <input type="hidden" name="id" value="<?php echo $row['id'] ?>">
                                                                    <input type="hidden" name="folio" value="<?php echo $row['folio'] ?>">
                                                                    <input type="hidden" name="solicitud" value="<?php echo $row['solicitud'] ?>">
                                                                    <input type="hidden" name="persona" value="<?php echo $row['persona'] ?>">
                                                                    <input type="hidden" name="fecha1" value="<?php echo $row['fecha'] ?>">
                                                                    <input type="hidden" name="empresa" value="<?php echo $row['empresa'] ?>">
                                                                    <input type="hidden" name="contacto" value="<?php echo $row['contacto'] ?>">
                                                                    <input type="hidden" name="direccion" value="<?php echo $row['direccion'] ?>">
                                                                    <input type="hidden" name="telefono" value="<?php echo $row['telefono'] ?>">
                                                                    <input type="hidden" name="correo" value="<?php echo $row['correo'] ?>">
                                                                    <input type="hidden" name="validado" value="Modelo">
                                                                    <button type="submit" name="GeneraC1" class="btn btn-info">Generar Cotización</button>
                                                                    </form>

                                                                </div>

                                                            </div>

                                                            <?php
                                                        } else {
                                                            #echo 'Solicita cantidad';
                                                            #Manda mjs a compras para solicitar más cantidad
                                                            $mjs_consulta = "SELECT COUNT(*) AS mjs FROM m6_compras_mjs WHERE folio = '$folio' ";
                                                            $mjs_validar = mysqli_query($conexion, $mjs_consulta);
                                                            $arraymjs = mysqli_fetch_array($mjs_validar);

                                                            if ($arraymjs['mjs'] == 0) {
                                                            ?>
                                                                <div class="row">
                                                                    <div class="col-6">
                                                                        <form action="php/m6/mjs.php" method="post">
                                                                            <input type="hidden" name="folio" value="<?php echo $folio ?>">
                                                                            <label style="color:red">Manda un mensaje con información detalla de lo que se necesita para realizar la cotización*</label>
                                                                            <textarea placeholder="Necesito (X) pieza del (Modelo/Número de pieza) tiempo de entrega" class="form-control" name="mjs" rows="5" required></textarea>
                                                                            <br>
                                                                            <button type="submit" name="mjs1" class="btn btn-success">Enviar mensaje</button>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                                <?php
                                                            } else {

                                                                $query = mysqli_query($conexion, "SELECT * FROM m6_compras_mjs WHERE folio = '$folio' ORDER BY fecha DESC");
                                                                foreach ($query as $rowmjs) {
                                                                ?>
                                                                    <div class="card">
                                                                        <div class="card-body collapse show">
                                                                            <h4 class="card-title">Folio: <?php echo $rowmjs['folio']; ?></h4>
                                                                            <p style="color: black">Mensaje enviado por: <?php echo $rowmjs['user1'] ?> <br> Mensaje: <?php echo $rowmjs['mjs1'] ?></p>
                                                                            <p style="color: black">Mensaje recibido: <?php echo $rowmjs['user2'] ?> <br> Mensaje: <?php echo $rowmjs['mjs2'] ?></p>
                                                                            <?php
                                                                            if ($rowmjs['user2'] == 'N/A') {
                                                                                echo 'Sin respuesa';
                                                                            } else {
                                                                                echo 'Realiza Cotización';
                                                                            ?>
                                                                                <div class="row">

                                                                                    <div style="color:black;" class="col-6">
                                                                                        <form action="php/m5/cotizacion.php" method="post">
                                                                                            <label>Marca</label><br>
                                                                                            <input value="<?php echo $row['1_marca']; ?>" type="text" name="marca" class="form-control" required>
                                                                                    </div>
                                                                                    <div style="color:black;" class="col-6">
                                                                                        <label>Nombre</label><br>
                                                                                        <input value="<?php echo $row1['marca']; ?>" type="text" name="nombre" class="form-control" required>
                                                                                    </div>
                                                                                    <div style="color:black;" class="col-6">
                                                                                        <label>Modelo</label><br>
                                                                                        <input value="<?php echo $row['1_modelo']; ?>" type="text" name="modelo" class="form-control" required>
                                                                                    </div>
                                                                                    <div style="color:black;" class="col-6">
                                                                                        <label>Descripción</label><br>
                                                                                        <input value="<?php echo $row1['descripcion']; ?>" type="text" name="descripcion" class="form-control" required>
                                                                                    </div>
                                                                                    <div style="color:black;" class="col-6">
                                                                                        <label>Cantidad</label><br>
                                                                                        <input value="<?php echo $row['1_cantidad']; ?>" type="number" name="cantidad" class="form-control" required>
                                                                                    </div>
                                                                                    <div style="color:black;" class="col-6">
                                                                                        <label>Número de partes</label><br>
                                                                                        <input value="<?php echo $row['1_partes']; ?>" type="text" name="partes" class="form-control" required>
                                                                                    </div>
                                                                                    <div style="color:black;" class="col-6">
                                                                                        <label>Precio Unitario (Solo números, sin comas)</label><br>
                                                                                        <input type="number" name="precio" class="form-control" required>
                                                                                    </div>
                                                                                    <div style="color:black;" class="col-6">
                                                                                        <label>Tiempo de entrega</label><br>
                                                                                        <input type="text" name="entrega" class="form-control" required>
                                                                                    </div>
                                                                                    <div style="color:black;" class="col-6">
                                                                                        <label>Acciones</label><br>
                                                                                        <input type="hidden" name="id" value="<?php echo $row['id'] ?>">
                                                                                        <input type="hidden" name="folio" value="<?php echo $row['folio'] ?>">
                                                                                        <input type="hidden" name="solicitud" value="<?php echo $row['solicitud'] ?>">
                                                                                        <input type="hidden" name="persona" value="<?php echo $row['persona'] ?>">
                                                                                        <input type="hidden" name="fecha1" value="<?php echo $row['fecha'] ?>">
                                                                                        <input type="hidden" name="empresa" value="<?php echo $row['empresa'] ?>">
                                                                                        <input type="hidden" name="contacto" value="<?php echo $row['contacto'] ?>">
                                                                                        <input type="hidden" name="direccion" value="<?php echo $row['direccion'] ?>">
                                                                                        <input type="hidden" name="telefono" value="<?php echo $row['telefono'] ?>">
                                                                                        <input type="hidden" name="correo" value="<?php echo $row['correo'] ?>">
                                                                                        <input type="hidden" name="validado" value="Modelo">
                                                                                        <button type="submit" name="GeneraC1" class="btn btn-info">Generar Cotización</button>
                                                                                        </form>

                                                                                    </div>

                                                                                </div>
                                                                            <?php
                                                                            }
                                                                            ?>
                                                                        </div>
                                                                    </div>
                                                            <?php
                                                                }
                                                            }
                                                        } #AQUI

                                                    } else {
                                                        #Manda mjs a compras para generar stock

                                                        $mjs_consulta = "SELECT COUNT(*) AS mjs FROM m6_compras_mjs WHERE folio = '$folio' ";
                                                        $mjs_validar = mysqli_query($conexion, $mjs_consulta);
                                                        $arraymjs = mysqli_fetch_array($mjs_validar);

                                                        if ($arraymjs['mjs'] == 0) {
                                                            ?>
                                                            <div class="row">
                                                                <div class="col-6">
                                                                    <form action="php/m6/mjs.php" method="post">
                                                                        <input type="hidden" name="folio" value="<?php echo $folio ?>">
                                                                        <label style="color:red">Manda un mensaje con información detalla de lo que se necesita para realizar la cotización*</label>
                                                                        <textarea placeholder="Necesito (X) pieza del (Modelo/Número de pieza) tiempo de entrega" class="form-control" name="mjs" rows="5" required></textarea>
                                                                        <br>
                                                                        <button type="submit" name="mjs1" class="btn btn-success">Enviar mensaje</button>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                            <?php
                                                        } else {

                                                            $query = mysqli_query($conexion, "SELECT * FROM m6_compras_mjs WHERE folio = '$folio' ORDER BY fecha DESC");
                                                            foreach ($query as $rowmjs) {
                                                            ?>
                                                                <div class="card">
                                                                    <div class="card-body collapse show">
                                                                        <h4 class="card-title">Folio: <?php echo $rowmjs['folio']; ?></h4>
                                                                        <p style="color: black">Mensaje enviado por: <?php echo $rowmjs['user1'] ?> <br> Mensaje: <?php echo $rowmjs['mjs1'] ?></p>
                                                                        <p style="color: black">Mensaje recibido: <?php echo $rowmjs['user2'] ?> <br> Mensaje: <?php echo $rowmjs['mjs2'] ?></p>
                                                                        <?php
                                                                        if ($rowmjs['user2'] == 'N/A') {
                                                                            echo 'Sin respuesa';
                                                                        } else {
                                                                            echo 'Realiza Cotización';
                                                                        ?>
                                                                            <div class="row">

                                                                                <div style="color:black;" class="col-6">
                                                                                    <form action="php/m5/cotizacion.php" method="post">
                                                                                        <label>Marca</label><br>
                                                                                        <input value="<?php echo $row['1_marca']; ?>" type="text" name="marca" class="form-control" required>
                                                                                </div>
                                                                                <div style="color:black;" class="col-6">
                                                                                    <label>Nombre</label><br>
                                                                                    <input value="<?php echo $row1['marca']; ?>" type="text" name="nombre" class="form-control" required>
                                                                                </div>
                                                                                <div style="color:black;" class="col-6">
                                                                                    <label>Modelo</label><br>
                                                                                    <input value="<?php echo $row['1_modelo']; ?>" type="text" name="modelo" class="form-control" required>
                                                                                </div>
                                                                                <div style="color:black;" class="col-6">
                                                                                    <label>Descripción</label><br>
                                                                                    <input value="<?php echo $row1['descripcion']; ?>" type="text" name="descripcion" class="form-control" required>
                                                                                </div>
                                                                                <div style="color:black;" class="col-6">
                                                                                    <label>Cantidad</label><br>
                                                                                    <input value="<?php echo $row['1_cantidad']; ?>" type="number" name="cantidad" class="form-control" required>
                                                                                </div>
                                                                                <div style="color:black;" class="col-6">
                                                                                    <label>Número de partes</label><br>
                                                                                    <input value="<?php echo $row['1_partes']; ?>" type="text" name="partes" class="form-control" required>
                                                                                </div>
                                                                                <div style="color:black;" class="col-6">
                                                                                    <label>Precio Unitario (Solo números, sin comas)</label><br>
                                                                                    <input type="number" value="<?php echo $row1['precio_lista'] ?>" name="precio" class="form-control" required>
                                                                                </div>
                                                                                <div style="color:black;" class="col-6">
                                                                                    <label>Tiempo de entrega</label><br>
                                                                                    <input type="text" name="entrega" class="form-control" required>
                                                                                </div>
                                                                                <div style="color:black;" class="col-6">
                                                                                    <label>Acciones</label><br>
                                                                                    <input type="hidden" name="id" value="<?php echo $row['id'] ?>">
                                                                                    <input type="hidden" name="folio" value="<?php echo $row['folio'] ?>">
                                                                                    <input type="hidden" name="solicitud" value="<?php echo $row['solicitud'] ?>">
                                                                                    <input type="hidden" name="persona" value="<?php echo $row['persona'] ?>">
                                                                                    <input type="hidden" name="fecha1" value="<?php echo $row['fecha'] ?>">
                                                                                    <input type="hidden" name="empresa" value="<?php echo $row['empresa'] ?>">
                                                                                    <input type="hidden" name="contacto" value="<?php echo $row['contacto'] ?>">
                                                                                    <input type="hidden" name="direccion" value="<?php echo $row['direccion'] ?>">
                                                                                    <input type="hidden" name="telefono" value="<?php echo $row['telefono'] ?>">
                                                                                    <input type="hidden" name="correo" value="<?php echo $row['correo'] ?>">
                                                                                    <input type="hidden" name="validado" value="Modelo">
                                                                                    <button type="submit" name="GeneraC1" class="btn btn-info">Generar Cotización</button>
                                                                                    </form>

                                                                                </div>

                                                                            </div>

                                                                        <?php
                                                                        }
                                                                        ?>
                                                                    </div>
                                                                </div>
                                                            <?php
                                                            }
                                                        }
                                                    }
                                                    #AAAAAAAqui
                                                }
                                            } else if ($array0['contar0'] >= 1) {
                                                echo '<p style="color: orange;">Validado por el número de partes</p>';
                                                $consulta2 = "SELECT * FROM m4_almacen2 WHERE num_partes = '$partes' ";
                                                $query2 = mysqli_query($conexion, $consulta2);
                                                foreach ($query2 as $row1) {
                                                    echo '<p style="color:black"> Solicito el cliente: ' . $cantidad . ' Hay en almacen: ' . $row1['cantidad'] . '  Stock: ' . $row1['estatus'] . ' Precio x Unidad ' . $row1['precio_lista'] . ' </p>';
                                                    if ($row1['estatus'] == 'Stock') {
                                                        if ($cantidad <= $row1['cantidad']) {

                                                            ?>
                                                            <div class="row">
                                                                <div style="color:black;" class="col-6">
                                                                    <form action="php/m5/cotizacion.php" method="post">
                                                                        <label>Marca</label><br>
                                                                        <input value="<?php echo $row['1_marca']; ?>" type="text" name="marca" class="form-control" required>
                                                                </div>
                                                                <div style="color:black;" class="col-6">
                                                                    <label>Nombre</label><br>
                                                                    <input value="<?php echo $row1['marca']; ?>" type="text" name="nombre" class="form-control" required>
                                                                </div>
                                                                <div style="color:black;" class="col-6">
                                                                    <label>Modelo</label><br>
                                                                    <input value="<?php echo $row1['modelo']; ?>" type="text" name="modelo" class="form-control" required>
                                                                </div>
                                                                <div style="color:black;" class="col-6">
                                                                    <label>Descripción</label><br>
                                                                    <input value="<?php echo $row1['descripcion']; ?>" type="text" name="descripcion" class="form-control" required>
                                                                </div>
                                                                <div style="color:black;" class="col-6">
                                                                    <label>Cantidad</label><br>
                                                                    <input value="<?php echo $row['1_cantidad']; ?>" type="number" name="cantidad" class="form-control" required>
                                                                </div>
                                                                <div style="color:black;" class="col-6">
                                                                    <label>Número de partes</label><br>
                                                                    <input value="<?php echo $row['1_partes']; ?>" type="text" name="partes" class="form-control" required>
                                                                </div>
                                                                <div style="color:black;" class="col-6">
                                                                    <label>Precio Unitario (Solo números, sin comas)</label><br>
                                                                    <input type="number" value="<?php echo $row1['precio_lista'] ?>" name="precio" class="form-control" required>
                                                                </div>
                                                                <div style="color:black;" class="col-6">
                                                                    <label>Tiempo de entrega</label><br>
                                                                    <input type="text" value="<?php echo $row1['tiempo'] ?>" name="entrega" class="form-control" required>
                                                                </div>
                                                                <div style="color:black;" class="col-6">
                                                                    <label>Acciones</label><br>
                                                                    <input type="hidden" name="id" value="<?php echo $row['id'] ?>">
                                                                    <input type="hidden" name="folio" value="<?php echo $row['folio'] ?>">
                                                                    <input type="hidden" name="solicitud" value="<?php echo $row['solicitud'] ?>">
                                                                    <input type="hidden" name="persona" value="<?php echo $row['persona'] ?>">
                                                                    <input type="hidden" name="fecha1" value="<?php echo $row['fecha'] ?>">
                                                                    <input type="hidden" name="empresa" value="<?php echo $row['empresa'] ?>">
                                                                    <input type="hidden" name="contacto" value="<?php echo $row['contacto'] ?>">
                                                                    <input type="hidden" name="direccion" value="<?php echo $row['direccion'] ?>">
                                                                    <input type="hidden" name="telefono" value="<?php echo $row['telefono'] ?>">
                                                                    <input type="hidden" name="correo" value="<?php echo $row['correo'] ?>">
                                                                    <input type="hidden" name="validado" value="Partes">
                                                                    <button type="submit" name="GeneraC1" class="btn btn-info">Generar Cotización</button>
                                                                    </form>
                                                                </div>
                                                            </div>

                                                            <?php
                                                        } else {
                                                            #echo 'SOLICITA CANTIDAD';
                                                            #MANDA MJS A COMPRAS PARA SOLICITAR MAS CANTIDAD
                                                            $mjs_consulta = "SELECT COUNT(*) AS mjs FROM m6_compras_mjs WHERE folio = '$folio' ";
                                                            $mjs_validar = mysqli_query($conexion, $mjs_consulta);
                                                            $arraymjs = mysqli_fetch_array($mjs_validar);

                                                            if ($arraymjs['mjs'] == 0) {
                                                            ?>
                                                                <div class="row">
                                                                    <div class="col-6">
                                                                        <form action="php/m6/mjs.php" method="post">
                                                                            <input type="hidden" name="folio" value="<?php echo $folio ?>">
                                                                            <label style="color:red">Manda un mensaje con información detalla de lo que se necesita para realizar la cotización*</label>
                                                                            <textarea placeholder="Necesito (X) pieza del (Modelo/Número de pieza) tiempo de entrega" class="form-control" name="mjs" rows="5" required></textarea>
                                                                            <br>
                                                                            <button type="submit" name="mjs1" class="btn btn-success">Enviar mensaje</button>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                                <?php
                                                            } else {

                                                                $query = mysqli_query($conexion, "SELECT * FROM m6_compras_mjs WHERE folio = '$folio' ORDER BY fecha DESC");
                                                                foreach ($query as $rowmjs) {
                                                                ?>
                                                                    <div class="card">
                                                                        <div class="card-body collapse show">
                                                                            <h4 class="card-title">Folio: <?php echo $rowmjs['folio']; ?></h4>
                                                                            <p style="color: black">Mensaje enviado por: <?php echo $rowmjs['user1'] ?> <br> Mensaje: <?php echo $rowmjs['mjs1'] ?></p>
                                                                            <p style="color: black">Mensaje recibido: <?php echo $rowmjs['user2'] ?> <br> Mensaje: <?php echo $rowmjs['mjs2'] ?></p>
                                                                            <?php
                                                                            if ($rowmjs['user2'] == 'N/A') {
                                                                                echo 'Sin respuesa';
                                                                            } else {
                                                                                echo 'Realiza Cotización';
                                                                            ?>
                                                                                <div class="row">
                                                                                    <div style="color:black;" class="col-6">
                                                                                        <form action="php/m5/cotizacion.php" method="post">
                                                                                            <label>Marca</label><br>
                                                                                            <input value="<?php echo $row['1_marca']; ?>" type="text" name="marca" class="form-control" required>
                                                                                    </div>
                                                                                    <div style="color:black;" class="col-6">
                                                                                        <label>Nombre</label><br>
                                                                                        <input value="<?php echo $row1['marca']; ?>" type="text" name="nombre" class="form-control" required>
                                                                                    </div>
                                                                                    <div style="color:black;" class="col-6">
                                                                                        <label>Modelo</label><br>
                                                                                        <input value="<?php echo $row['1_modelo']; ?>" type="text" name="modelo" class="form-control" required>
                                                                                    </div>
                                                                                    <div style="color:black;" class="col-6">
                                                                                        <label>Descripción</label><br>
                                                                                        <input value="<?php echo $row1['descripcion']; ?>" type="text" name="descripcion" class="form-control" required>
                                                                                    </div>
                                                                                    <div style="color:black;" class="col-6">
                                                                                        <label>Cantidad</label><br>
                                                                                        <input value="<?php echo $row['1_cantidad']; ?>" type="number" name="cantidad" class="form-control" required>
                                                                                    </div>
                                                                                    <div style="color:black;" class="col-6">
                                                                                        <label>Número de partes</label><br>
                                                                                        <input value="<?php echo $row['1_partes']; ?>" type="text" name="partes" class="form-control" required>
                                                                                    </div>
                                                                                    <div style="color:black;" class="col-6">
                                                                                        <label>Precio Unitario (Solo números, sin comas)</label><br>
                                                                                        <input type="number" value="<?php echo $row1['precio_lista'] ?>" name="precio" class="form-control" required>
                                                                                    </div>
                                                                                    <div style="color:black;" class="col-6">
                                                                                        <label>Tiempo de entrega</label><br>
                                                                                        <input type="text" name="entrega" class="form-control" required>
                                                                                    </div>
                                                                                    <div style="color:black;" class="col-6">
                                                                                        <label>Acciones</label><br>
                                                                                        <input type="hidden" name="id" value="<?php echo $row['id'] ?>">
                                                                                        <input type="hidden" name="folio" value="<?php echo $row['folio'] ?>">
                                                                                        <input type="hidden" name="solicitud" value="<?php echo $row['solicitud'] ?>">
                                                                                        <input type="hidden" name="persona" value="<?php echo $row['persona'] ?>">
                                                                                        <input type="hidden" name="fecha1" value="<?php echo $row['fecha'] ?>">
                                                                                        <input type="hidden" name="empresa" value="<?php echo $row['empresa'] ?>">
                                                                                        <input type="hidden" name="contacto" value="<?php echo $row['contacto'] ?>">
                                                                                        <input type="hidden" name="direccion" value="<?php echo $row['direccion'] ?>">
                                                                                        <input type="hidden" name="telefono" value="<?php echo $row['telefono'] ?>">
                                                                                        <input type="hidden" name="correo" value="<?php echo $row['correo'] ?>">
                                                                                        <input type="hidden" name="validado" value="Partes">
                                                                                        <button type="submit" name="GeneraC1" class="btn btn-info">Generar Cotización</button>
                                                                                        </form>
                                                                                    </div>
                                                                                </div>

                                                                            <?php
                                                                            }
                                                                            ?>
                                                                        </div>
                                                                    </div>
                                                            <?php
                                                                }
                                                            }
                                                        } #AQUI

                                                    } else {
                                                        #MANDA MJS PARA GENERAR STOCK

                                                        $mjs_consulta = "SELECT COUNT(*) AS mjs FROM m6_compras_mjs WHERE folio = '$folio' ";
                                                        $mjs_validar = mysqli_query($conexion, $mjs_consulta);
                                                        $arraymjs = mysqli_fetch_array($mjs_validar);

                                                        if ($arraymjs['mjs'] == 0) {
                                                            ?>
                                                            <div class="row">
                                                                <div class="col-6">
                                                                    <form action="php/m6/mjs.php" method="post">
                                                                        <input type="hidden" name="folio" value="<?php echo $folio ?>">
                                                                        <label style="color:red">Manda un mensaje con información detalla de lo que se necesita para realizar la cotización*</label>
                                                                        <textarea placeholder="Necesito (X) pieza del (Modelo/Número de pieza) tiempo de entrega" class="form-control" name="mjs" rows="5" required></textarea>
                                                                        <br>
                                                                        <button type="submit" name="mjs1" class="btn btn-success">Enviar mensaje</button>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                            <?php
                                                        } else {

                                                            $query = mysqli_query($conexion, "SELECT * FROM m6_compras_mjs WHERE folio = '$folio' ORDER BY fecha DESC");
                                                            foreach ($query as $rowmjs) {
                                                            ?>
                                                                <div class="card">
                                                                    <div class="card-body collapse show">
                                                                        <h4 class="card-title">Folio: <?php echo $rowmjs['folio']; ?></h4>
                                                                        <p style="color: black">Mensaje enviado por: <?php echo $rowmjs['user1'] ?> <br> Mensaje: <?php echo $rowmjs['mjs1'] ?></p>
                                                                        <p style="color: black">Mensaje recibido: <?php echo $rowmjs['user2'] ?> <br> Mensaje: <?php echo $rowmjs['mjs2'] ?></p>
                                                                        <?php
                                                                        if ($rowmjs['user2'] == 'N/A') {
                                                                            echo 'Sin respuesa';
                                                                        } else {
                                                                            echo 'Realiza Cotización';
                                                                        ?>
                                                                            <div class="row">
                                                                                <div style="color:black;" class="col-6">
                                                                                    <form action="php/m5/cotizacion.php" method="post">
                                                                                        <label>Marca</label><br>
                                                                                        <input value="<?php echo $row['1_marca']; ?>" type="text" name="marca" class="form-control" required>
                                                                                </div>
                                                                                <div style="color:black;" class="col-6">
                                                                                    <label>Nombre</label><br>
                                                                                    <input value="<?php echo $row1['marca']; ?>" type="text" name="nombre" class="form-control" required>
                                                                                </div>
                                                                                <div style="color:black;" class="col-6">
                                                                                    <label>Modelo</label><br>
                                                                                    <input value="<?php echo $row['1_modelo']; ?>" type="text" name="modelo" class="form-control" required>
                                                                                </div>
                                                                                <div style="color:black;" class="col-6">
                                                                                    <label>Descripción</label><br>
                                                                                    <input value="<?php echo $row1['descripcion']; ?>" type="text" name="descripcion" class="form-control" required>
                                                                                </div>
                                                                                <div style="color:black;" class="col-6">
                                                                                    <label>Cantidad</label><br>
                                                                                    <input value="<?php echo $row['1_cantidad']; ?>" type="number" name="cantidad" class="form-control" required>
                                                                                </div>
                                                                                <div style="color:black;" class="col-6">
                                                                                    <label>Número de partes</label><br>
                                                                                    <input value="<?php echo $row['1_partes']; ?>" type="text" name="partes" class="form-control" required>
                                                                                </div>
                                                                                <div style="color:black;" class="col-6">
                                                                                    <label>Precio Unitario (Solo números, sin comas)</label><br>
                                                                                    <input type="number" value="<?php echo $row1['precio_lista'] ?>" name="precio" class="form-control" required>
                                                                                </div>
                                                                                <div style="color:black;" class="col-6">
                                                                                    <label>Tiempo de entrega</label><br>
                                                                                    <input type="text" name="entrega" class="form-control" required>
                                                                                </div>
                                                                                <div style="color:black;" class="col-6">
                                                                                    <label>Acciones</label><br>
                                                                                    <input type="hidden" name="id" value="<?php echo $row['id'] ?>">
                                                                                    <input type="hidden" name="folio" value="<?php echo $row['folio'] ?>">
                                                                                    <input type="hidden" name="solicitud" value="<?php echo $row['solicitud'] ?>">
                                                                                    <input type="hidden" name="persona" value="<?php echo $row['persona'] ?>">
                                                                                    <input type="hidden" name="fecha1" value="<?php echo $row['fecha'] ?>">
                                                                                    <input type="hidden" name="empresa" value="<?php echo $row['empresa'] ?>">
                                                                                    <input type="hidden" name="contacto" value="<?php echo $row['contacto'] ?>">
                                                                                    <input type="hidden" name="direccion" value="<?php echo $row['direccion'] ?>">
                                                                                    <input type="hidden" name="telefono" value="<?php echo $row['telefono'] ?>">
                                                                                    <input type="hidden" name="correo" value="<?php echo $row['correo'] ?>">
                                                                                    <input type="hidden" name="validado" value="Partes">
                                                                                    <button type="submit" name="GeneraC1" class="btn btn-info">Generar Cotización</button>
                                                                                    </form>
                                                                                </div>
                                                                            </div>
                                                                        <?php
                                                                        }
                                                                        ?>
                                                                    </div>
                                                                </div>
                                            <?php
                                                            }
                                                        }
                                                    }
                                                }
                                            } else {
                                                echo 'ERROR';
                                            }
                                            ?>

                                        </div>
                                    </div>

                                <?php
                                }
                                ?>
                            </div>
                            <div class="tab-pane" id="vi">
                                <?php
                                $consulta = "SELECT * FROM m5_cotizaciones WHERE estatus = 'N/A' AND id_user = '$_SESSION[ID]' ORDER BY fecha DESC";
                                $query = mysqli_query($conexion, $consulta);
                                foreach ($query as $row) {
                                ?>

                                    <div class="card">
                                        <div class="card-body collapse show">
                                            <input type="hidden" name="id" value="<?php echo $row['id'] ?>">
                                            <h4 class="card-title">Folio <?php echo $row['folio'] ?></h4>
                                            <p class="card-text" style="color:black;">
                                                Marca: <strong> <?php echo $row['1_marca'] ?></strong>
                                                Nombre: <strong><?php echo $row['1_nombre'] ?></strong>
                                                Modelo: <strong><?php echo $row['1_modelo'] ?></strong>
                                                Descripción: <strong> <?php echo $row['1_descripcion'] ?></strong>
                                                Cantidad: <strong><?php echo $row['1_cantidad'] ?></strong>
                                                Número de partes: <strong><?php echo $row['1_partes'] ?></strong>

                                            </p>
                                            <div id="1<?php echo $row['id'] ?>">
                                                <button type="button" onclick="validar(<?php echo $row['id'] ?>,'<?php echo $row['1_modelo'] ?>', '<?php echo $row['1_partes'] ?>')" class="btn btn-success">Validar información</button>
                                            </div>
                                            <div id="2<?php echo $row['id'] ?>" style="display:none;">
                                                <form action="php/m5/crud.php" method="post">
                                                    <input type="hidden" name="id" value="<?php echo $row['id'] ?>">
                                                    <h4 style="color:blue">La información que se solicita si existe en Almacen, ¿Deseas generar el reporte?</h4>
                                                    <button class="btn btn-info" name="generar" type="submit">Generar cotización</button>
                                                </form>
                                            </div>
                                            <div id="3<?php echo $row['id'] ?>" style="display:none;">
                                                <h4 style="color:orange">No existe en almacén con este modelo o número de partes, algunas sugerecias de modelos o número de partes parecidos.<br>
                                                    Llama al cliente, y corroborar la información o cierra la cotización. </h4>
                                                <h4 style="color:black;">Datos del cliente: <br> Teléfono: <strong><?php echo $row['telefono']; ?></strong> Correo: <strong><?php echo $row['correo']; ?></strong> Empresa: <strong><?php echo $row['empresa']; ?></strong> </h4>
                                                <p style="color:orange;">

                                                <div class="row">
                                                    <div style="color: black" class="col-3">
                                                        Modelos: <br>
                                                        <?php
                                                        $rest = substr($row['1_modelo'], 0, 5);
                                                        $opcion = "SELECT * FROM m4_almacen2 WHERE modelo LIKE '$rest%'";
                                                        $con = mysqli_query($conexion, $opcion);
                                                        foreach ($con as $row1) {
                                                            echo $row1['modelo'] . '<br>';
                                                        }
                                                        ?>
                                                    </div>
                                                    <div style="color: black" class="col-3">
                                                        Número de partes: <br>
                                                        <?php
                                                        $rest0 = substr($row['1_partes'], 0, 5);
                                                        $opcion0 = "SELECT * FROM m4_almacen2 WHERE num_partes LIKE '$rest0%'";
                                                        $con0 = mysqli_query($conexion, $opcion0);
                                                        foreach ($con0 as $row10) {
                                                            echo $row10['num_partes'] . '<br>';
                                                        }
                                                        ?>
                                                    </div>
                                                    <div class="col-6">
                                                        <?php
                                                        $rest = substr($row['1_partes'], 0, 5);
                                                        $opcion = "SELECT * FROM m4_almacen2 WHERE modelo LIKE '$rest%'";
                                                        $con = mysqli_query($conexion, $opcion);
                                                        foreach ($con as $row1) {
                                                            echo $row1['modelo'] . '<br>';
                                                        }
                                                        ?>
                                                    </div>
                                                </div>
                                                </p>
                                                <!---->
                                                <script>
                                                    function opcion(id) {
                                                        document.getElementById("opcion" + id).disabled = false;
                                                        document.getElementById("opcion1" + id).disabled = false;
                                                        document.getElementById("opcion2" + id).disabled = false;
                                                    }
                                                </script>
                                                <div class="row">


                                                    <div style="color: black;" class="col-3">
                                                        <form action="php/m5/crud.php" method="post">
                                                            <input type="hidden" name="id" value="<?php echo $row['id'] ?>">
                                                            <label>Código</label>
                                                            <input name="modelo" id="opcion<?php echo $row['id'] ?>" disabled value="<?php echo $row['1_modelo'] ?>" class="form-control" type="text" required>
                                                            <br>
                                                            <input name="partes" id="opcion1<?php echo $row['id'] ?>" disabled value="<?php echo $row['1_partes'] ?>" class="form-control" type="text" required>
                                                    </div>
                                                    <div style="color: black;" class="col-3">
                                                        <label>Acciones</label><br>
                                                        <button type="button" onclick="opcion(<?php echo $row['id'] ?>)" class="btn btn-warning"> Habilitar </button>
                                                        <button id="opcion2<?php echo $row['id'] ?>" disabled name="editaropc2" type="submit" class="btn btn-warning"> Editar </button>
                                                        </form>
                                                    </div>


                                                    <div style="color: black;" class="col-4">
                                                        <label>Motivo para cerrar la solicitud</label>
                                                        <form action="php/m5/crud.php" method="POST">
                                                            <input type="hidden" name="id" value="<?php echo $row['id'] ?>">
                                                            <input placeholder="Motivo" name="motivo" class="form-control" type="text" required>
                                                            <br>
                                                            <button type="submit" class="btn btn-danger" name="cerrarop2">Cerrar</button>
                                                        </form>
                                                    </div>

                                                </div>
                                                <!---->

                                            </div>


                                            <!--Mensaje-->
                                            <div id="4<?php echo $row['id'] ?>" style="display:none;">
                                                <h4 style="color:red"> No existe un modelo o número de partes similar o igual en Almacen</h4>
                                                <p style="color:black"> Especifica a compras los siguientes datos: Marca(Linea / No Linea), Nombre, Modelo, Descripción, Cantidad, Número de partes, Precio unitario y Tiempo de entrega</p>
                                                <?php
                                                $folio = $row['folio'];
                                                $mjs_consulta1 = "SELECT COUNT(*) AS mjs1 FROM m6_compras_mjs WHERE folio = '$folio' ";
                                                $mjs_validar1 = mysqli_query($conexion, $mjs_consulta1);
                                                $arraymjs1 = mysqli_fetch_array($mjs_validar1);
                                                if ($arraymjs1['mjs1'] == 0) {
                                                ?>
                                                    <form action="php/m6/mjs.php" method="post">
                                                        <input type="hidden" name="folio" value="<?php echo $folio ?>">

                                                        <textarea class="form-control" name="mjs" rows="3" placeholder="Específica el modelo, la marca, y la cantidad a cotizar "></textarea>
                                                        <br>
                                                        <button name="mjs1" type="submit" class="btn btn-success">Enviar mensaje</button>
                                                    </form>
                                                    <?php
                                                } else {
                                                    $query1 = mysqli_query($conexion, "SELECT * FROM m6_compras_mjs WHERE folio = '$folio' ORDER BY fecha DESC");
                                                    foreach ($query1 as $rowmjs1) {
                                                    ?>
                                                        <h4 class="card-title">Folio: <?php echo $rowmjs1['folio']; ?></h4>
                                                        <p style="color: black">Mensaje enviado por: <?php echo $rowmjs1['user1'] ?> <br> Mensaje: <?php echo $rowmjs1['mjs1'] ?></p>
                                                        <p style="color: black">Mensaje recibido: <?php echo $rowmjs1['user2'] ?> <br> Mensaje: <?php echo $rowmjs1['mjs2'] ?></p>
                                                        <?php
                                                        if ($rowmjs1['user2'] == 'N/A') {
                                                            echo 'Sin respuesa';
                                                        } else {
                                                            echo 'Realiza Cotización';
                                                        ?>
                                                            <div class="row">

                                                                <div style="color:black;" class="col-6">
                                                                    <form action="php/m5/cotizacion.php" method="post">
                                                                        <label>Marca</label><br>
                                                                        <input type="text" name="marca" class="form-control" required>
                                                                </div>
                                                                <div style="color:black;" class="col-6">
                                                                    <label>Nombre</label><br>
                                                                    <input type="text" name="nombre" class="form-control" required>
                                                                </div>
                                                                <div style="color:black;" class="col-6">
                                                                    <label>Modelo</label><br>
                                                                    <input type="text" name="modelo" class="form-control" required>
                                                                </div>
                                                                <div style="color:black;" class="col-6">
                                                                    <label>Descripción</label><br>
                                                                    <input type="text" name="descripcion" class="form-control" required>
                                                                </div>
                                                                <div style="color:black;" class="col-6">
                                                                    <label>Cantidad</label><br>
                                                                    <input type="number" name="cantidad" class="form-control" required>
                                                                </div>
                                                                <div style="color:black;" class="col-6">
                                                                    <label>Número de partes</label><br>
                                                                    <input type="text" name="partes" class="form-control" required>
                                                                </div>
                                                                <div style="color:black;" class="col-6">
                                                                    <label>Precio Unitario (Solo números, sin comas)</label><br>
                                                                    <input type="number" name="precio" class="form-control" required>
                                                                </div>
                                                                <div style="color:black;" class="col-6">
                                                                    <label>Tiempo de entrega</label><br>
                                                                    <input type="text" name="entrega" class="form-control" required>
                                                                </div>
                                                                <div style="color:black;" class="col-6">
                                                                    <label>Acciones</label><br>
                                                                    <input type="hidden" name="id" value="<?php echo $row['id'] ?>">
                                                                    <input type="hidden" name="folio" value="<?php echo $row['folio'] ?>">
                                                                    <input type="hidden" name="solicitud" value="<?php echo $row['solicitud'] ?>">
                                                                    <input type="hidden" name="persona" value="<?php echo $row['persona'] ?>">
                                                                    <input type="hidden" name="fecha1" value="<?php echo $row['fecha'] ?>">
                                                                    <input type="hidden" name="empresa" value="<?php echo $row['empresa'] ?>">
                                                                    <input type="hidden" name="contacto" value="<?php echo $row['contacto'] ?>">
                                                                    <input type="hidden" name="direccion" value="<?php echo $row['direccion'] ?>">
                                                                    <input type="hidden" name="telefono" value="<?php echo $row['telefono'] ?>">
                                                                    <input type="hidden" name="correo" value="<?php echo $row['correo'] ?>">
                                                                    <input type="hidden" name="validado" value="Sin información">
                                                                    <button type="submit" name="GeneraC1" class="btn btn-info">Revisar Stock</button>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        <?php
                                                        }
                                                        ?>

                                                <?php
                                                    }
                                                }

                                                ?>
                                                <br>
                                                <?php ?>
                                                <!--
                                                    <form action="php/m5/crud.php" method="POST">
                                                    <input type="hidden" name="id" value="<?php //echo $row['id'] 
                                                                                            ?>">
                                                    <button type="submit" name="cerraropc3" class="btn btn-danger" name="cerrarop2">Cerrar</button>
                                                </form>
                                                -->
                                            </div>
                                            <script>
                                                function validar(id, modelo, partes) {
                                                    console.log(id)
                                                    $.ajax({
                                                        url: 'php/m5/validar.php',
                                                        method: 'GET',
                                                        data: {
                                                            modelo: modelo,
                                                            partes: partes
                                                        },
                                                        success: function(r) {
                                                            console.log(r)
                                                            $('#1' + id).hide()
                                                            if (r == 'Correcto') {
                                                                $('#2' + id).show()
                                                            } else if (r == 'Opcion') {
                                                                $('#3' + id).show()
                                                            } else if (r == 'Error') {
                                                                $('#4' + id).show()
                                                            }

                                                        }
                                                    });
                                                }
                                            </script>
                                        </div>
                                    </div>
                                <?php
                                }
                                ?>
                            </div>
                            <div class="tab-pane" id="ssa">
                                <?php
                                $consulta = "SELECT * FROM m5_cotizaciones WHERE id_user = 'N/A' ORDER BY fecha DESC";
                                $query = mysqli_query($conexion, $consulta);
                                foreach ($query as $row) {
                                ?>
                                    <form action="php/m5/crud.php" method="post">
                                        <div class="card">
                                            <div class="card-body collapse show">
                                                <input type="hidden" name="id" value="<?php echo $row['id'] ?>">
                                                <h4 class="card-title">Folio <?php echo $row['folio'] ?></h4>
                                                <p class="card-text" style="color:black;">
                                                    Empresa: <strong><?php echo $row['empresa'] ?></strong> <br>
                                                    Marca: <strong> <?php echo $row['1_marca'] ?></strong> Nombre: <strong><?php echo $row['1_nombre'] ?></strong> Modelo: <strong><?php echo $row['1_modelo'] ?></strong> </p>
                                                <button type="submit" name="asignarm5" class="btn btn-success">Asignar Cotización</button>
                                            </div>
                                        </div>
                                    </form>
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

<?php
include_once('global/cyp/pie.php');
?>