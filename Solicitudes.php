<?php
#MODULO 1

include_once('global/cyp/cabezera.php');
if ($_SESSION['M1'] == 'Si' || $_SESSION['M1'] == 'TEM') {
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
        </div>
    </div>

    <div class="container-fluid">

        <div class="card">
            <div class="card-body">

                <h4 class="card-title mb-3">Administrar Solicitudes</h4>

                <ul class="nav nav-tabs mb-3">
                    <li class="nav-item">
                        <a href="#new" data-toggle="tab" aria-expanded="true" class="nav-link active">
                            <i class="mdi mdi-account-circle d-lg-none d-block mr-1"></i>
                            <span class="d-none d-lg-block">Nueva Solicitud</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#crud" data-toggle="tab" aria-expanded="false" class="nav-link">
                            <i class="mdi mdi-home-variant d-lg-none d-block mr-1"></i>
                            <span class="d-none d-lg-block">Consultar</span>
                        </a>
                    </li>


                </ul>

                <div class="tab-content">
                    <div class="tab-pane show active" id="new">
                        <h4 class="card-title"> Datos de la solicitud: </h4>

                        <div class="row">
                            <div class="col-6">
                                <label style="color: black;">Correo electronico</label>
                                <input class="form-control" type="email" id="buscar_correo" required>
                            </div>
                            <div class="col-6">
                                <label style="color: black;">Buscar correo</label>
                                <br>
                                <button onclick="buscar()" type="button" class="btn btn-dark" name="buscar">Buscar</button>
                            </div>
                        </div>
                        <script>
                            function buscar() {
                                var correo = $('#buscar_correo').val();
                                if (correo == '') {
                                    Swal.fire({
                                        title: 'Sin correo a buscar',
                                        text: 'No ha ingresado el correo!',
                                        icon: 'error',
                                        showConfirmButton: false,
                                        timer: 2750
                                    })
                                }
                                $.ajax({
                                    type: 'POST',
                                    url: 'php/m1/buscar.php',
                                    data: {
                                        correo: correo
                                    },
                                    dataType: "json",
                                    success: function(r) {
                                        //console.log(r);
                                        if (r.Empresa == 'Una nueva empresa') {
                                            console.log('Nuevo usuario')
                                            $('#ocultarformilario').show();
                                            $('#buscar_correo').val('');
                                            $('#nombre_empresa').val('');
                                            $('#contacto_empresa').val('');
                                            $('#direccion_empresa').val('');
                                            $('#telefono_empresa').val('');
                                            $('#correo_empresa').val('');
                                            $('#area_empresa').val('');
                                            $('#movil_empresa').val('');

                                        } else {
                                            console.log('Usuario ya registrado')
                                            console.log(r)
                                            console.log(r.Empresa)
                                            $('#ocultarformilario').show();
                                            $('#nombre_empresa').val(r.Empresa);
                                            $('#contacto_empresa').val(r.Contacto);
                                            $('#direccion_empresa').val(r.Direccion);
                                            $('#telefono_empresa').val(r.Telefono);
                                            $('#correo_empresa').val(r.Correo);
                                            $('#area_empresa').val(r.Area);
                                            $('#movil_empresa').val(r.Movil);


                                            $('#buscar_correo').val('');

                                        }
                                    }
                                })
                            }
                        </script>

                        <form action="php/m1/crud.php" method="post">

                            <div style="display: none;" id="ocultarformilario">
                                <div class="row">
                                    <div style="color: black;" class="col-6">
                                        <label>Solicitud</label>
                                        <select class="form-control" name="solicitud" required>
                                            <option value="Personal">Personal</option>
                                            <option value="Teléfono">Teléfono</option>
                                            <option value="Correo">Correo</option>
                                        </select>
                                    </div>
                                    <div style="color: black;" class="col-6">
                                        <label>Tipo de persona</label>
                                        <select class="form-control" name="tipo_persona" required>
                                            <option value="Fisica">Fisica</option>
                                            <option value="Moral">Moral</option>
                                        </select>
                                    </div>

                                    <div style="color: black;" class="col-6">
                                        <label>Fecha</label>
                                        <input class="form-control" type="date" name="fecha" required>
                                    </div>
                                    <div style="color: black;" class="col-6">
                                        <label>Nombre de la empresa</label>
                                        <input id="nombre_empresa" class="form-control" type="text" name="nom_empresa" required>
                                    </div>
                                    <div style="color: black;" class="col-6">
                                        <label>Contacto</label>
                                        <input id="contacto_empresa" class="form-control" type="text" name="area_contacto" required>
                                    </div>
                                    <div style="color: black;" class="col-6">
                                        <label>Dirección</label>
                                        <input id="direccion_empresa" class="form-control" type="text" name="direccion" required>
                                    </div>
                                    <div style="color: black;" class="col-6">
                                        <label>Teléfono</label>
                                        <input id="telefono_empresa" class="form-control" type="text" name="telefono" required>
                                    </div>
                                    <div style="color: black;" class="col-6">
                                        <label>Correo electronico</label>
                                        <input id="correo_empresa" class="form-control" type="email" name="correo" required>
                                    </div>
                                    <div style="color: black;" class="col-6">
                                        <label>Area</label>
                                        <input id="area_empresa" class="form-control" type="text" name="area" required>
                                    </div>
                                    <div style="color: black;" class="col-6">
                                        <label>Movil</label>
                                        <input id="movil_empresa" class="form-control" type="text" name="movil" required>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <h4 class="card-title"> Tipo de solicitud <h4 style="color: red;"> Favor de llenar todos los campos necesarios, de lo contrario no se enviara la información al modulo correspondiente*</h4>
                            </h4>
                            <div class="row">
                                <div class="col-sm-3 mb-2 mb-sm-0">
                                    <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                        <a class="nav-link active show" id="v-pills-home-tab" data-toggle="pill" href="#Producto" role="tab" aria-controls="v-pills-home" aria-selected="true">
                                            <i class="mdi mdi-home-variant d-lg-none d-block mr-1"></i>
                                            <span class="d-none d-lg-block">Producto</span>
                                        </a>
                                        <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#Servicio" role="tab" aria-controls="v-pills-profile" aria-selected="false">
                                            <i class="mdi mdi-account-circle d-lg-none d-block mr-1"></i>
                                            <span class="d-none d-lg-block">Servicio</span>
                                        </a>
                                        <a class="nav-link" id="v-pills-settings-tab" data-toggle="pill" href="#Proyecto" role="tab" aria-controls="v-pills-settings" aria-selected="false">
                                            <i class="mdi mdi-settings-outline d-lg-none d-block mr-1"></i>
                                            <span class="d-none d-lg-block">Proyecto</span>
                                        </a>
                                    </div>
                                </div> <!-- end col-->

                                <div class="col-sm-9">
                                    <div class="tab-content" id="v-pills-tabContent">
                                        <div class="tab-pane fade active show" id="Producto" role="tabpanel" aria-labelledby="v-pills-home-tab">
                                            <div class="row">
                                                <div style="color: black;" class="col-6">
                                                    <label>Marca</label>
                                                    <br>

                                                    <script>
                                                        function linea() {

                                                            $('#elemento2').show()
                                                            $('#elemento1').hide()
                                                            $('#sel1').val('')

                                                            $('#modelo').attr("required", true)
                                                            $('#descripcion').attr("required", true)
                                                            $('#cantidad').attr("required", true)
                                                            $('#partes').attr("required", true)
                                                            $('#sel').attr("required", true)
                                                            $('#sel1').attr("required", false)

                                                        }

                                                        function nolinea() {

                                                            $('#elemento1').show()
                                                            $('#elemento2').hide()
                                                            //$("#1_nombre option[value='Sin información']").attr("selected", true);
                                                            $("#sel").val("Sin información");

                                                            $('#modelo').attr("required", true)
                                                            $('#descripcion').attr("required", true)
                                                            $('#cantidad').attr("required", true)
                                                            $('#partes').attr("required", true)
                                                            $('#sel').attr("required", false)
                                                            $('#sel1').attr("required", true)


                                                        }
                                                    </script>

                                                    <input onclick="linea()" type="radio" name="1_marca" value="Linea"> Linea
                                                    <input onclick="nolinea()" type="radio" name="1_marca" value="No Linea"> No Linea
                                                </div>
                                                <div style="color: black;" class="col-6">
                                                    <label>Nombre de la marca</label>
                                                    <div id="elemento1" style="display:none;">
                                                        <input id="sel1" class="form-control" type="text" name="1_nombre_no">
                                                    </div>
                                                    <div id="elemento2" style="display:none;">
                                                        <select id="sel" class="form-control" name="1_nombre">
                                                            <option selected value="Sin información"></option>
                                                            <option value="Omron">Omron</option>
                                                            <option value="Yaskawa">Yaskawa</option>
                                                            <option value="Mitsubichi">Mitsubichi</option>
                                                            <option value="Siemens">Siemens</option>
                                                            <option value="Keyence">Keyence</option>
                                                            <option value="Cognex">Cognex</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div style="color: black;" class="col-6">
                                                    <label>Modelo</label>
                                                    <input id="modelo" class="form-control" type="text" name="1_modelo">
                                                </div>
                                                <div style="color: black;" class="col-6">
                                                    <label>Descripción</label>
                                                    <input id="descripcion" class="form-control" type="text" name="1_descripcion">
                                                </div>
                                                <div style="color: black;" class="col-6">
                                                    <label>Cantidad</label>
                                                    <input id="cantidad" class="form-control" type="number" name="1_cantidad">
                                                </div>
                                                <div style="color: black;" class="col-6">
                                                    <label>No. Partes</label>
                                                    <input id="partes" value="Sin Número de partes" class="form-control" type="text" name="1_no_partes">
                                                </div>
                                            </div>
                                        </div>



                                        <div class="tab-pane fade" id="Servicio" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                                            <div class="row">
                                                <div style="color: black;" class="col-6">
                                                    <label>Prioridad</label>
                                                    <select class="form-control" name="2_prioridad">
                                                        <option selected value="Sin información"></option>
                                                        <option value="Urgente">Urgente</option>
                                                        <option value="No Urgente">No Urgente</option>
                                                    </select>
                                                </div>
                                                <div style="color: black;" class="col-6">
                                                    <label>Motivo</label>
                                                    <select class="form-control" name="2_motivo">
                                                        <option selected value="Sin información"></option>
                                                        <option value="Revisión">Revisión</option>
                                                        <option value="Reparación">Reparación</option>
                                                        <option value="Programación">Programación</option>
                                                        <option value="Eléctrico">Eléctrico</option>
                                                    </select>
                                                </div>
                                                <div style="color: black;" class="col-6">
                                                    <label>Marca</label>
                                                    <input class="form-control" type="text" name="2_marca">
                                                </div>
                                                <div style="color: black;" class="col-6">
                                                    <label>Modelo</label>
                                                    <input class="form-control" type="text" name="2_modelo">
                                                </div>
                                                <div style="color: black;" class="col-6">
                                                    <label>Descripción</label>
                                                    <input class="form-control" type="text" name="2_descripcion">
                                                </div>
                                                <div style="color: black;" class="col-6">
                                                    <label>Falla</label>
                                                    <input class="form-control" type="text" name="2_falla">
                                                </div>

                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="Proyecto" role="tabpanel" aria-labelledby="v-pills-settings-tab">
                                            <div class="row">
                                                <div style="color: black;" class="col-6">
                                                    <label>Descripcón del alcance</label>
                                                    <input class="form-control" type="text" name="3_descripcion">
                                                </div>
                                                <div style="color: black;" class="col-6">
                                                    <label>Programar Cita</label>
                                                    <input class="form-control" type="date" name="3_cita">
                                                </div>

                                            </div>
                                        </div>
                                    </div> <!-- end tab-content-->
                                </div> <!-- end col-->
                            </div>
                            <br><br><br>
                            <button name="agregar_solicitud" class="btn btn-success"> Guardar Solicitud</button>
                        </form>

                    </div>
                    <div class="tab-pane" id="crud">
                        <br>
                        <form action="php/m1/crud.php" method="POST">

                            <div class="customize-input float-left">
                                <select name="filtro" class="custom-select custom-select-set form-control bg-white border-0 custom-shadow custom-radius">
                                    <option selected value="Todos">Todos</option>
                                    <?php
                                    if ($_SESSION['ROL'] == 'Super Administrador') {
                                        $query = "SELECT DISTINCT 0_fecha FROM m1_solicitudes ORDER BY 0_fecha DESC ";
                                    } else {
                                        $query = "SELECT DISTINCT 0_fecha FROM m1_solicitudes WHERE id_usuario= '$_SESSION[ID]' ORDER BY id DESC ";
                                    }

                                    $consulta = mysqli_query($conexion, $query);
                                    foreach ($consulta as $row) {
                                    ?>
                                        <option value="<?php echo $row['0_fecha'] ?>"> <?php echo $row['0_fecha'] ?></option>
                                    <?php
                                    }
                                    ?>

                                </select>
                            </div>
                            <button type="submit" name="Consultarfecha" class="btn btn-rounded btn-outline-success">Consultar</button><br>
                        </form>
                        <br>
                        <div class="row">
                            <div class="col-12 mt-4">
                                <?php
                                if (isset($_GET['filtro'])) {
                                    if ($_SESSION['ROL'] == 'Super Administrador') {
                                        $query = "SELECT * FROM m1_solicitudes WHERE 0_fecha = '$_GET[filtro]'";
                                    } else {
                                        $query = "SELECT * FROM m1_solicitudes WHERE id_usuario= '$_SESSION[ID]' AND 0_FECHA = '$_GET[filtro]' ";
                                    }
                                } else {
                                    if ($_SESSION['ROL'] == 'Super Administrador') {
                                        $query = "SELECT * FROM m1_solicitudes WHERE 0_fecha ORDER BY 0_fecha DESC";
                                    } else {
                                        $query = "SELECT * FROM m1_solicitudes WHERE id_usuario= '$_SESSION[ID]' ORDER BY 0_fecha DESC";
                                    }
                                }

                                $consulta = mysqli_query($conexion, $query);
                                foreach ($consulta as $row) {


                                ?>
                                    <div class="card">
                                        <div class="card-body">

                                            <form action="php/m1/crud.php" method="post">
                                                <h4 class="card-title"> Folio: <?php echo $row['id'] ?> </h4>
                                                <label style="color:black;">Asignado por: <strong><?php echo $row['nombre_usuario'] ?></strong></label><br>

                                                <!-- <button onclick="dis(<?php # echo $row['id'] 
                                                                            ?>)" class="btn btn-warning" type="button">Habilitar</button>
                                                <button onclick="ena(<?php # echo $row['id'] 
                                                                        ?>)" class="btn btn-warning" type="button">Deshabilitar</button>-->
                                                <br><br>
                                                <div class="row">

                                                    <div style="color: black;" class="col-6">
                                                        <label>Solicitud</label>
                                                        <input id="id1<?php echo $row['id'] ?>" value="<?php echo $row['0_solicitud'] ?>" disabled class="form-control" type="text" name="solicitud" required>

                                                    </div>
                                                    <div style="color: black;" class="col-6">
                                                        <label>Tipo de persona</label>
                                                        <input id="id2<?php echo $row['id'] ?>" value="<?php echo $row['0_persona'] ?>" disabled class="form-control" type="text" name="tipo_persona" required>
                                                    </div>

                                                    <div style="color: black;" class="col-6">
                                                        <label>Fecha</label>
                                                        <input id="id3<?php echo $row['id'] ?>" value="<?php echo $row['0_fecha'] ?>" disabled class="form-control" type="date" name="fecha" required>
                                                    </div>
                                                    <div style="color: black;" class="col-6">
                                                        <label>Nombre de la empresa</label>
                                                        <input id="id4<?php echo $row['id'] ?>" value="<?php echo $row['0_empresa'] ?>" disabled class="form-control" type="text" name="nom_empresa" required>
                                                    </div>
                                                    <div style="color: black;" class="col-6">
                                                        <label>Contacto</label>
                                                        <input id="id5<?php echo $row['id'] ?>" value="<?php echo $row['0_contacto'] ?>" disabled class="form-control" type="text" name="area_contacto" required>
                                                    </div>
                                                    <div style="color: black;" class="col-6">
                                                        <label>Dirección</label>
                                                        <input id="id6<?php echo $row['id'] ?>" value="<?php echo $row['0_direccion'] ?>" disabled class="form-control" type="text" name="direccion" required>
                                                    </div>
                                                    <div style="color: black;" class="col-6">
                                                        <label>Teléfono</label>
                                                        <input id="id7<?php echo $row['id'] ?>" value="<?php echo $row['0_telefono'] ?>" disabled class="form-control" type="text" name="telefono" required>
                                                    </div>
                                                    <div style="color: black;" class="col-6">
                                                        <label>Correo electronico</label>
                                                        <input id="id8<?php echo $row['id'] ?>" value="<?php echo $row['0_correo'] ?>" disabled class="form-control" type="mail" name="correo" required>
                                                    </div>
                                                </div>
                                                <!--TRES ELEMNTOS-->
                                                <br></br>
                                                <h4 class="card-title"> Tipo de solicitud </h4>
                                                <div class="row">
                                                    <div class="col-sm-3 mb-2 mb-sm-0">
                                                        <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                                            <a class="nav-link active show" id="v-pills-home-tab" data-toggle="pill" href="#Producto<?php echo $row['id'] ?>" role="tab" aria-controls="v-pills-home" aria-selected="true">
                                                                <i class="mdi mdi-home-variant d-lg-none d-block mr-1"></i>
                                                                <span class="d-none d-lg-block">Producto</span>
                                                            </a>
                                                            <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#Servicio<?php echo $row['id'] ?>" role="tab" aria-controls="v-pills-profile" aria-selected="false">
                                                                <i class="mdi mdi-account-circle d-lg-none d-block mr-1"></i>
                                                                <span class="d-none d-lg-block">Servicio</span>
                                                            </a>
                                                            <a class="nav-link" id="v-pills-settings-tab" data-toggle="pill" href="#Proyecto<?php echo $row['id'] ?>" role="tab" aria-controls="v-pills-settings" aria-selected="false">
                                                                <i class="mdi mdi-settings-outline d-lg-none d-block mr-1"></i>
                                                                <span class="d-none d-lg-block">Proyecto</span>
                                                            </a>
                                                        </div>
                                                    </div> <!-- end col-->

                                                    <div class="col-sm-9">
                                                        <div class="tab-content" id="v-pills-tabContent">
                                                            <div class="tab-pane fade active show" id="Producto<?php echo $row['id'] ?>" role="tabpanel" aria-labelledby="v-pills-home-tab">
                                                                <div class="row">
                                                                    <div style="color: black;" class="col-6">
                                                                        <label>Marca</label>
                                                                        <input id="id9<?php echo $row['id'] ?>" value="<?php echo $row['1_marca']; ?>" disabled type="text" class="form-control" name="1_marca" required>
                                                                    </div>
                                                                    <div style="color: black;" class="col-6">
                                                                        <label>Nombre de la marca</label>
                                                                        <input id="id10<?php echo $row['id'] ?>" value="<?php echo $row['1_nombre']; ?>" disabled class="form-control" type="text" name="1_nombre" placeholder="Omron, Yaskawa, Mitsubishi, Siemens, Keyence, Cognex, Otro....">
                                                                    </div>
                                                                    <div style="color: black;" class="col-6">
                                                                        <label>Modelo</label>
                                                                        <input id="id11<?php echo $row['id'] ?>" value="<?php echo $row['1_modelo']; ?>" disabled class="form-control" type="text" name="1_modelo">
                                                                    </div>
                                                                    <div style="color: black;" class="col-6">
                                                                        <label>Descripción</label>
                                                                        <input id="id12<?php echo $row['id'] ?>" value="<?php echo $row['1_descripcion']; ?>" disabled class="form-control" type="text" name="1_descripcion">
                                                                    </div>
                                                                    <div style="color: black;" class="col-6">
                                                                        <label>Cantidad</label>
                                                                        <input id="id13<?php echo $row['id'] ?>" value="<?php echo $row['1_cantidad']; ?>" disabled class="form-control" type="text" name="1_cantidad">
                                                                    </div>
                                                                    <div style="color: black;" class="col-6">
                                                                        <label>No. Partes</label>
                                                                        <input id="id14<?php echo $row['id'] ?>" value="<?php echo $row['1_partes']; ?>" disabled class="form-control" type="text" name="1_no_partes">
                                                                    </div>
                                                                </div>
                                                            </div>



                                                            <div class="tab-pane fade" id="Servicio<?php echo $row['id'] ?>" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                                                                <div class="row">
                                                                    <div style="color: black;" class="col-6">
                                                                        <label>Prioridad</label>
                                                                        <input id="id15<?php echo $row['id'] ?>" value="<?php echo $row['2_prioridad']; ?>" disabled class="form-control" name="2_prioridad" required>
                                                                    </div>
                                                                    <div style="color: black;" class="col-6">
                                                                        <label>Motivo</label>
                                                                        <input id="id16<?php echo $row['id'] ?>" value="<?php echo $row['2_motivo']; ?>" disabled type="text" class="form-control" name="2_motivo" required>
                                                                    </div>
                                                                    <div style="color: black;" class="col-6">
                                                                        <label>Marca</label>
                                                                        <input id="id17<?php echo $row['id'] ?>" value="<?php echo $row['2_marca']; ?>" disabled class="form-control" type="text" name="2_marca">
                                                                    </div>
                                                                    <div style="color: black;" class="col-6">
                                                                        <label>Modelo</label>
                                                                        <input id="id18<?php echo $row['id'] ?>" value="<?php echo $row['2_modelo']; ?>" disabled class="form-control" type="text" name="2_modelo">
                                                                    </div>
                                                                    <div style="color: black;" class="col-6">
                                                                        <label>Descripción</label>
                                                                        <input id="id19<?php echo $row['id'] ?>" value="<?php echo $row['2_descripcion']; ?>" disabled class="form-control" type="text" name="2_descripcion">
                                                                    </div>
                                                                    <div style="color: black;" class="col-6">
                                                                        <label>Falla</label>
                                                                        <input id="id20<?php echo $row['id'] ?>" value="<?php echo $row['2_falla']; ?>" disabled class="form-control" type="text" name="2_falla">
                                                                    </div>

                                                                </div>
                                                            </div>
                                                            <div class="tab-pane fade" id="Proyecto<?php echo $row['id'] ?>" role="tabpanel" aria-labelledby="v-pills-settings-tab">
                                                                <div class="row">
                                                                    <div style="color: black;" class="col-6">
                                                                        <label>Descripcón del alcance</label>
                                                                        <input id="id21<?php echo $row['id'] ?>" value="<?php echo $row['3_descripcion']; ?>" disabled class="form-control" type="text" name="3_descripcion">
                                                                    </div>
                                                                    <div style="color: black;" class="col-6">
                                                                        <label>Programar Cita</label>
                                                                        <input id="id22<?php echo $row['id'] ?>" value="<?php echo $row['3_cita'] ?>" disabled class="form-control" type="date" name="3_cita">
                                                                    </div>

                                                                </div>
                                                            </div>
                                                        </div> <!-- end tab-content-->
                                                    </div> <!-- end col-->
                                                </div>
                                                <!--TRES ELEMENTOS-->
                                                <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                                                <br>
                                                <!--
                                                    <button id="id23<?php #echo $row['id'] 
                                                                    ?>" type="submit" name="editar_solicitud" disabled class="btn btn-success">Editar solicitud</button>
                                                <button id="id24<?php #echo $row['id'] 
                                                                ?>" type="submit" name="eliminar_solicitud" disabled class="btn btn-danger">Eliminar solicitud</button>

                                               -->
                                            </form>
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
        44 Poniente #502 esq. blvd. 5 de Mayo Col. Santa María, C.P. 72080 Puebla, Puebla. <br>
        Tel: (222) 2-20-54-44, (222) 5-14-75-56 coordinacion@iacsa-puebla.com.mx
    </footer>

</div>

<script>
    function dis(id) {



        //CLASS GETELEMENTBYCLASSNAME
        console.log(id);
        document.getElementById("id1" + id).disabled = false;
        document.getElementById("id2" + id).disabled = false;
        document.getElementById("id3" + id).disabled = false;
        document.getElementById("id4" + id).disabled = false;
        document.getElementById("id5" + id).disabled = false;
        document.getElementById("id6" + id).disabled = false;
        document.getElementById("id7" + id).disabled = false;
        document.getElementById("id8" + id).disabled = false;
        document.getElementById("id9" + id).disabled = false;
        document.getElementById("id10" + id).disabled = false;
        document.getElementById("id11" + id).disabled = false;
        document.getElementById("id12" + id).disabled = false;
        document.getElementById("id13" + id).disabled = false;
        document.getElementById("id14" + id).disabled = false;
        document.getElementById("id15" + id).disabled = false;
        document.getElementById("id16" + id).disabled = false;
        document.getElementById("id17" + id).disabled = false;
        document.getElementById("id18" + id).disabled = false;
        document.getElementById("id19" + id).disabled = false;
        document.getElementById("id20" + id).disabled = false;
        document.getElementById("id21" + id).disabled = false;
        document.getElementById("id22" + id).disabled = false;
        document.getElementById("id23" + id).disabled = false;
        document.getElementById("id24" + id).disabled = false;


    }

    function ena(id) {
        console.log(id);
        document.getElementById("id1" + id).disabled = true;
        document.getElementById("id2" + id).disabled = true;
        document.getElementById("id3" + id).disabled = true;
        document.getElementById("id4" + id).disabled = true;
        document.getElementById("id5" + id).disabled = true;
        document.getElementById("id6" + id).disabled = true;
        document.getElementById("id7" + id).disabled = true;
        document.getElementById("id8" + id).disabled = true;
        document.getElementById("id9" + id).disabled = true;
        document.getElementById("id10" + id).disabled = true;
        document.getElementById("id11" + id).disabled = true;
        document.getElementById("id12" + id).disabled = true;
        document.getElementById("id13" + id).disabled = true;
        document.getElementById("id14" + id).disabled = true;
        document.getElementById("id15" + id).disabled = true;
        document.getElementById("id16" + id).disabled = true;
        document.getElementById("id17" + id).disabled = true;
        document.getElementById("id18" + id).disabled = true;
        document.getElementById("id19" + id).disabled = true;
        document.getElementById("id20" + id).disabled = true;
        document.getElementById("id21" + id).disabled = true;
        document.getElementById("id22" + id).disabled = true;
        document.getElementById("id23" + id).disabled = true;
        document.getElementById("id24" + id).disabled = true;


    }
</script>

<?php
include_once('global/cyp/pie.php');
?>