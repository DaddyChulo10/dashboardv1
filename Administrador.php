<?php
include_once('global/cyp/cabezera.php');

if ($_SESSION['ROL'] == 'Super Administrador') {
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
            </div>

            <br><br>

            <div class="mx-auto">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title mb-3">Acciones de usuarios</h4>

                        <ul class="nav nav-tabs nav-justified nav-bordered mb-3">
                            <li class="nav-item">
                                <a href="#uyp" data-toggle="tab" aria-expanded="true" class="nav-link active">
                                    <i class="mdi mdi-account-circle d-lg-none d-block mr-1"></i>
                                    <span class="d-none d-lg-block">Usuarios y permisos</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#abyc" data-toggle="tab" aria-expanded="false" class="nav-link">
                                    <i class="mdi mdi-home-variant d-lg-none d-block mr-1"></i>
                                    <span class="d-none d-lg-block">Altas, Bajas y Cambios</span>
                                </a>
                            </li>
                        </ul>


                        <div class="tab-content">
                            <div class="tab-pane show active" id="uyp">

                                <div class="row">
                                    <div class="col-12 mt-4">
                                        <?php
                                        $consulta = "SELECT * FROM usuarios WHERE eliminar = 'Si'";
                                        $query = mysqli_query($conexion, $consulta);
                                        foreach ($query as $row) {
                                        ?>
                                            <?php

                                            ?>
                                            <div class="card">
                                                <div class="card-body collapse show">


                                                    <h4 class="card-title">Nombre: <?php echo $row['nombre']; ?> </h4>
                                                    <p style="color: black;" class="card-text">
                                                    <form action="php/administrador/crud.php" method="post">
                                                        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">

                                                        <div class="row">
                                                            <div class="col-6">
                                                                <div style="color:black;">

                                                                    <input type="checkbox" name="m1" value="Si" <?php if ($row['m1'] == 'Si') {
                                                                                                                    echo 'checked';
                                                                                                                } ?>> Solicitudes
                                                                    <input type="date" min='<?php echo $fecha ?>' name="fecham1" class="form-control">
                                                                    <?php
                                                                    if ($row['m1'] == 'TEM') {
                                                                        echo '<p style = "color: red;">Tiene Modulo temporal: Hasta el día '.$row["datem1"].' </p>';
                                                                    }
                                                                    ?>
                                                                </div>
                                                                <div style="color:black;">

                                                                    <input type="checkbox" name="m2" value="Si" <?php if ($row['m2'] == 'Si') {
                                                                                                                    echo 'checked';
                                                                                                                } ?>> Proveedores
                                                                    <input type="date" min='<?php echo $fecha ?>' name="fecham2" class="form-control">
                                                                    <?php
                                                                    if ($row['m2'] == 'TEM') {
                                                                        echo '<p style = "color: red;">Tiene Modulo temporal: Hasta el día '.$row["datem2"].' </p>';
                                                                    }
                                                                    ?>
                                                                </div>

                                                            </div>
                                                            <div class="col-6">
                                                                <div style="color:black;">

                                                                    <input type="checkbox" name="m3" value="Si" <?php if ($row['m3'] == 'Si') {
                                                                                                                    echo 'checked';
                                                                                                                } ?>> Clientes
                                                                    <input type="date" min='<?php echo $fecha ?>' name="fecham3" class="form-control">
                                                                    <?php
                                                                    if ($row['m3'] == 'TEM') {
                                                                        echo '<p style = "color: red;">Tiene Modulo temporal: Hasta el día '.$row["datem3"].' </p>';
                                                                    }
                                                                    ?>
                                                                </div>
                                                                <div style="color:black;">

                                                                    <input type="checkbox" name="m4" value="Si" <?php if ($row['m4'] == 'Si') {
                                                                                                                    echo 'checked';
                                                                                                                } ?>> Almacen
                                                                    <input type="date" min='<?php echo $fecha ?>' name="fecham4" class="form-control">
                                                                    <?php
                                                                    if ($row['m4'] == 'TEM') {
                                                                        echo '<p style = "color: red;">Tiene Modulo temporal: Hasta el día '.$row["datem4"].' </p>';
                                                                    }
                                                                    ?>
                                                                </div>
                                                            </div>
                                                            <div class="col-6">
                                                                <div style="color:black;">

                                                                    <input type="checkbox" name="m5" value="Si" <?php if ($row['m5'] == 'Si') {
                                                                                                                    echo 'checked';
                                                                                                                } ?>> Cotizaciones
                                                                    <input type="date" min='<?php echo $fecha ?>' name="fecham5" class="form-control">
                                                                    <?php
                                                                    if ($row['m5'] == 'TEM') {
                                                                        echo '<p style = "color: red;">Tiene Modulo temporal: Hasta el día '.$row["datem5"].' </p>';
                                                                    }
                                                                    ?>
                                                                </div>
                                                                <div style="color:black;">

                                                                    <input type="checkbox" name="m6" value="Si" <?php if ($row['m6'] == 'Si') {
                                                                                                                    echo 'checked';
                                                                                                                } ?>> Compras
                                                                    <input type="date" min='<?php echo $fecha ?>' name="fecham6" class="form-control">
                                                                    <?php
                                                                    if ($row['m6'] == 'TEM') {
                                                                        echo '<p style = "color: red;">Tiene Modulo temporal: Hasta el día '.$row["datem6"].' </p>';
                                                                    }
                                                                    ?>
                                                                </div>
                                                            </div>

                                                            <div class="col-6">
                                                                <div style="color:black;">

                                                                    <input type="checkbox" name="m7" value="Si" <?php if ($row['m7'] == 'Si') {
                                                                                                                    echo 'checked';
                                                                                                                } ?>> Ventas
                                                                    <input type="date" min='<?php echo $fecha ?>' name="fecham7" class="form-control">
                                                                    <?php
                                                                    if ($row['m7'] == 'TEM') {
                                                                        echo '<p style = "color: red;">Tiene Modulo temporal: Hasta el día '.$row["datem7"].' </p>';
                                                                    }
                                                                    ?>
                                                                </div>
                                                                <div style="color:black;">

                                                                    <input type="checkbox" name="m8" value="Si" <?php if ($row['m8'] == 'Si') {
                                                                                                                    echo 'checked';
                                                                                                                } ?>> Estadisticas
                                                                    <input type="date" min='<?php echo $fecha ?>' name="fecham8" class="form-control">
                                                                    <?php
                                                                    if ($row['m8'] == 'TEM') {
                                                                        echo '<p style = "color: red;">Tiene Modulo temporal: Hasta el día '.$row["datem8"].' </p>';
                                                                    }
                                                                    ?>
                                                                </div>

                                                            </div>

                                                            <div class="col-6">
                                                                <div style="color:black;">

                                                                    <input type="checkbox" name="m9" value="Si" <?php if ($row['m9'] == 'Si') {
                                                                                                                    echo 'checked';
                                                                                                                } ?>> Proyectos
                                                                    <input type="date" min='<?php echo $fecha ?>' name="fecham9" class="form-control">
                                                                    <?php
                                                                    if ($row['m9'] == 'TEM') {
                                                                        echo '<p style = "color: red;">Tiene Modulo temporal: Hasta el día '.$row["datem9"].' </p>';
                                                                    }
                                                                    ?>
                                                                </div>
                                                                <div style="color:black;">

                                                                    <input type="checkbox" name="m10" value="Si" <?php if ($row['m10'] == 'Si') {
                                                                                                                        echo 'checked';
                                                                                                                    } ?>> Servicios
                                                                    <input type="date" min='<?php echo $fecha ?>' name="fecham10" class="form-control">
                                                                    <?php
                                                                    if ($row['m10'] == 'TEM') {
                                                                        echo '<p style = "color: red;">Tiene Modulo temporal: Hasta el día '.$row["datem10"].' </p>';
                                                                    }
                                                                    ?>
                                                                </div>


                                                            </div>
                                                            <div class="col-6">
                                                                <div style="color:black;">

                                                                    <input type="checkbox" name="m11" value="Si" <?php if ($row['m11'] == 'Si') {
                                                                                                                        echo 'checked';
                                                                                                                    } ?>> Seguimiento
                                                                    <input type="date" min='<?php echo $fecha ?>' name="fecham11" class="form-control">
                                                                    <?php
                                                                    if ($row['m11'] == 'TEM') {
                                                                        echo '<p style = "color: red;">Tiene Modulo temporal: Hasta el día '.$row["datem11"].' </p>';
                                                                    }
                                                                    ?>
                                                                </div>
                                                                <div style="color:black;">

                                                                    <input type="checkbox" name="m12" value="Si" <?php if ($row['m12'] == 'Si') {
                                                                                                                        echo 'checked';
                                                                                                                    } ?>> Facturación
                                                                    <input type="date" min='<?php echo $fecha ?>' name="fecham12" class="form-control">
                                                                    <?php
                                                                    if ($row['m12'] == 'TEM') {
                                                                        echo '<p style = "color: red;">Tiene Modulo temporal: Hasta el día '.$row["datem12"].' </p>';
                                                                    }
                                                                    ?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <br><br>
                                                        <button type="submit" name="cambios_permanentes" class="btn btn-success">Actualizar</button>
                                                    </form>
                                                    <br>

                                                    </p>
                                                </div>
                                            </div>
                                            <?php



                                            ?>
                                        <?php
                                        }
                                        ?>
                                    </div>
                                </div>

                            </div>
                            <div class="tab-pane" id="abyc">
                                <button type="button" class="btn waves-effect waves-light btn-rounded btn-outline-success" data-toggle="modal" data-target="#agregar">Agregar</button>
                                <br>
                                <div class="row">
                                    <div class="col-12 mt-4">
                                        <?php
                                        $consulta = "SELECT * FROM usuarios";
                                        $query = mysqli_query($conexion, $consulta);
                                        foreach ($query as $row) {
                                        ?>
                                            <div class="card">
                                                <div class="card-body collapse show">

                                                    <h4 class="card-title">Nombre: <?php echo $row['nombre']; ?> </h4>
                                                    <p style="color: black;" class="card-text">
                                                        Tipo de identificación <strong><?php echo $row['tipo_identificacion'] ?></strong>
                                                        No. identificacion <strong><?php echo $row['identificacion'] ?></strong> <br>
                                                        telefono <strong><?php echo $row['telefono'] ?></strong>
                                                        Correo <strong><?php echo $row['correo'] ?></strong> <br>
                                                        Usuario: <strong><?php echo $row['usuario'] ?></strong>

                                                        <br><br>
                                                        <?php if ($_SESSION['ELIMINAR'] == 'No') {
                                                        ?>
                                                            <button onclick="editar_usuarios(<?php echo $row['id'] ?>,'<?php echo $row['nombre'] ?>','<?php echo $row['tipo_identificacion'] ?>','<?php echo $row['identificacion'] ?>','<?php echo $row['telefono'] ?>','<?php echo $row['correo'] ?>','<?php echo $row['contraseña'] ?>')" type="button" class="btn waves-effect waves-light btn-rounded btn-outline-warning">Editar</button>
                                                        <?php } else if ($row['eliminar'] == 'Si') {
                                                        ?>
                                                            <button onclick="editar_usuarios(<?php echo $row['id'] ?>,'<?php echo $row['nombre'] ?>','<?php echo $row['tipo_identificacion'] ?>','<?php echo $row['identificacion'] ?>','<?php echo $row['telefono'] ?>','<?php echo $row['correo'] ?>','<?php echo $row['contraseña'] ?>')" type="button" class="btn waves-effect waves-light btn-rounded btn-outline-warning">Editar</button>

                                                        <?php
                                                        }
                                                        if ($row['eliminar'] == 'Si') {
                                                        ?>
                                                            <button onclick="Eliminar_usuario(<?php echo $row['id'] ?>,'<?php echo $row['nombre'] ?>')" type="button" class="btn waves-effect waves-light btn-rounded btn-outline-danger">Eliminar</button>
                                                        <?php
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
                    </div>
                </div>
            </div>
        </div>
    </div>



    <footer class="footer text-center " style="color: black;">
        A
    </footer>

</div>


<!-- CAMBIOS TEMPORALES-->



<!-- CAMBIOS TEMPORALES-->


<!-- MODAL EDITAR -->
<div id="editar_modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <div class="text-center mt-2 mb-4">
                    <h4 style="color: black;" class="card-title">Editar Usuario </h4>
                </div>

                <form action="php/administrador/crud.php" method="post">
                    <input type="hidden" name="id" id="id_update">
                    <div class="form-group">
                        <label>Nombre completo</label>
                        <input class="form-control" type="text" id="nombre_up" name="nombre" required>
                    </div>
                    <div class="form-group">
                        <label>Tipo de Identificación</label>
                        <br>
                        <input class="form-control" type="text" id="tipo_id_up" name="tipo_id" required>
                    </div>
                    <div class="form-group">
                        <label>No. Identificación</label>
                        <input class="form-control" type="text" id="no_id_up" name="no_id" required>
                    </div>
                    <div class="form-group">
                        <label>Telefono</label>
                        <input class="form-control" type="text" id="telefono_up" name="telefono" required>
                    </div>
                    <div class="form-group">
                        <label>Correo</label>
                        <input class="form-control" type="email" id="correo_up" name="correo" required>
                    </div>
                    <div class="form-group">
                        <label>Contraseña</label>
                        <input class="form-control" type="text" id="contraseña_up" name="contraseña" required>
                    </div>

                    <div class="form-group text-center">
                        <button type="submit" name="editar_usuario" class="btn btn-rounded btn-warning">Editar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    function editar_usuarios(id, nombre, tipo_id, no_id, telefono, correo, contraseña) {
        console.log(id);
        $("#id_update").val(id);
        $("#nombre_up").val(nombre);
        $("#tipo_id_up").val(tipo_id);
        $("#no_id_up").val(no_id);
        $("#telefono_up").val(telefono);
        $("#correo_up").val(correo);
        $("#contraseña_up").val(contraseña);
        $('#editar_modal').modal('show');
    }
</script>

<!-- MODAL EDITAR -->


<!-- MODAL ELIMINAR -->
<div id="eliminar_modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <div class="text-center mt-2 mb-4">
                    <h4 style="color: black;" class="card-title">Eliminar Usuario </h4>
                </div>

                <form action="php/administrador/crud.php" method="post">
                    <input type="hidden" name="id" id="eliminar_id">
                    <br>
                    <label> Nombre</label>
                    <input type="text" id="eliminar_nombre" class="form-control" disabled>
                    <br>
                    <div class="form-group text-center">
                        <button type="submit" name="eliminar_user" class="btn btn-rounded btn-danger">Eliminar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    function Eliminar_usuario(id, nombre) {
        console.log(id + nombre);
        $("#eliminar_id").val(id);
        $("#eliminar_nombre").val(nombre);

        $('#eliminar_modal').modal('show');
    }
</script>

<!-- MODAL ELIMINAR -->


<!-- MODAL AGREGAR -->

<div id="agregar" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <div class="text-center mt-2 mb-4">
                    <h4 style="color: black;" class="card-title">Agregar un nuevo Usuario </h4>
                </div>

                <form action="php/administrador/crud.php" method="post">
                    <div class="form-group">
                        <label>Nombre completo</label>
                        <input class="form-control" type="text" name="nombre" required>
                    </div>
                    <div class="form-group">
                        <label>Tipo de Identificación</label>
                        <br>
                        <select class="form-control" name="tipo_id" required>
                            <optgroup label="Oficiales">
                                <option value="INE">INE</option>
                                <option value="Licencia de conducir">Licencia de conducir</option>
                                <option value="Pasaporte">Pasaporte</option>
                            </optgroup>
                            <optgroup label="Otro">
                                <option value="CURP">CURP</option>
                            </optgroup>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>No. Identificación</label>
                        <input class="form-control" type="text" name="no_id" required>
                    </div>
                    <div class="form-group">
                        <label>Telefono</label>
                        <input class="form-control" type="text" name="telefono" required>
                    </div>
                    <div class="form-group">
                        <label>Correo</label>
                        <input class="form-control" type="email" name="correo" required>
                    </div>
                    <div class="form-group">
                        <label>Usuario</label>
                        <input class="form-control" type="text" name="usuario" required>
                    </div>
                    <div class="form-group">
                        <label>Contraseña</label>
                        <input class="form-control" type="password" name="contraseña" required>
                    </div>
                    <div class="form-group">
                        <label>Rol</label>
                        <select class="form-control" name="rol" required>
                            <option value="Usuario">Usuario</option>
                            <!-- <option value="Administrador">Administrador</option>-->
                            <!--<option value="Super Administrador">Super Administrador</option>-->
                        </select>

                    </div>
                    <div class="form-group text-center">
                        <button type="submit" name="agregar_usuario" class="btn btn-rounded btn-primary">Agregar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<!-- MODAL AGREGAR -->




<?php

include_once('global/cyp/pie.php');
?>