<?php
include_once('global/cyp/cabezera.php');
if ($_SESSION['M3'] == 'Si' || $_SESSION['M3'] == 'TEM') {
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
                            <li class="breadcrumb-item">Clientes
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

                        <h4 class="card-title mb-3">Modulo de clientes</h4>

                        <ul class="nav nav-tabs mb-3">
                            <li class="nav-item">
                                <a href="#clientes" data-toggle="tab" aria-expanded="true" class="nav-link active">
                                    <i class="mdi mdi-account-circle d-lg-none d-block mr-1"></i>
                                    <span class="d-none d-lg-block">Clientes</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#home" data-toggle="tab" aria-expanded="false" class="nav-link">
                                    <i class="mdi mdi-home-variant d-lg-none d-block mr-1"></i>
                                    <span class="d-none d-lg-block">Home</span>
                                </a>
                            </li>
                        </ul>

                        <div class="tab-content">

                            <div class="tab-pane show active" id="clientes">

                                <button id="a" type="button" onclick="agregar()" class="btn btn-success"> Agregar</button>
                                <button type="button" onclick="ocultar()" class="btn btn-dark none" style="display: none;">Ocultar</button>

                                <div class="none" style="display: none;">
                                    <br><br>
                                    <form action="php/m3/crud.php" method="post">
                                        <div style="color:black" class="row">
                                            <div class="col-4">
                                                <label>Empresa</label>
                                                <input type="text" class="form-control val" name="empresa" required>
                                            </div>
                                            <div class="col-4">
                                                <label>Contacto</label>
                                                <input type="text" class="form-control val" name="contacto" required>
                                            </div>
                                            <div class="col-4">
                                                <label>Dirección</label>
                                                <input type="text" class="form-control val" name="direcion" required>
                                            </div>
                                            <div class="col-4">
                                                <label>Télefono</label>
                                                <input type="text" class="form-control val" name="telefono" required>
                                            </div>
                                            <div class="col-4">
                                                <label>Correo</label>
                                                <input type="correo" class="form-control val" name="correo" required>
                                            </div>
                                            <div class="col-4">
                                                <label>Area</label>
                                                <input type="text" class="form-control val" name="area" required>
                                            </div>
                                            <div class="col-4">
                                                <label>Movil</label>
                                                <input type="text" class="form-control val" name="movil" required>
                                            </div>
                                            <div class="col-4">
                                                <label>Acciones</label><br>
                                                <button class="btn btn-info" name="btn-agregarcliente" type="submit">Agregar</button>
                                            </div>
                                        </div>
                                    </form>

                                </div>
                                <script>
                                    function agregar() {
                                        $('.none').show()
                                        $('#a').hide()
                                    }

                                    function ocultar() {
                                        $('#a').show()
                                        $('.none').hide()
                                        $('.val').val('');
                                    }
                                </script>
                                <br><br>

                                <div class="table-responsive">
                                    <table id="zero_config" class="table table-striped table-bordered no-wrap">
                                        <thead>
                                            <tr style="color:black">
                                                <th>Acciones</th>
                                                <th>Empresa</th>
                                                <th>Contacto</th>
                                                <th>Dirección</th>
                                                <th>Télefono</th>
                                                <th>Correo</th>
                                                <th>Area</th>
                                                <th>Móvil</th>
                                                <th>Código</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $consulta = $conexion->query("SELECT * FROM m3_clientes WHERE id ORDER BY id DESC");
                                            foreach ($consulta as $row) {
                                            ?>
                                                <tr style="color:black">
                                                    <td>
                                                        <button onclick="eliminar(<?php echo $row['id']; ?>,'<?php echo $row['empresa'] ?>','<?php echo $row['contacto'] ?>','<?php echo $row['correo'] ?>')" type="button" class="btn btn-danger"><i class="fas fa-trash"></i></button>
                                                        <button onclick="editar(<?php echo $row['id'] ?>,'<?php echo $row['empresa'] ?>','<?php echo $row['contacto'] ?>','<?php echo $row['direccion'] ?>','<?php echo $row['telefono'] ?>','<?php echo $row['area'] ?>','<?php echo $row['movil'] ?>')" type="button" class="btn btn-warning"><i class="far fa-edit"></i></button>
                                                    </td>
                                                    <td><?php echo $row['empresa']; ?></td>
                                                    <td><?php echo $row['contacto']; ?></td>
                                                    <td><?php echo $row['direccion']; ?></td>
                                                    <td><?php echo $row['telefono']; ?></td>
                                                    <td><?php echo $row['correo']; ?></td>
                                                    <td><?php echo $row['area']; ?></td>
                                                    <td><?php echo $row['movil']; ?></td>
                                                    <td><?php echo $row['codigo']; ?></td>
                                                </tr>
                                            <?php
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>

                            </div>
                            <div class="tab-pane" id="home">




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
    function eliminar(id, empresa, contacto, correo) {
        $('#eliminar').modal('show')
        $('#id').val(id)
        $('#empresa_eli').html('Empresa: <strong>' + empresa + '</strong>')
        $('#contacto_eli').html('Contacto: <strong>' + contacto + '</strong>')
        $('#correo_eli').html('Correo: <strong>' + correo + '</strong>')
    }

    function editar(id, empresa, contacto, direccion, telenono, area, movil) {
        $('#editar').modal('show');
        $('#id_id').val(id)
        $('#1').val(empresa)
        $('#2').val(contacto)
        $('#3').val(direccion)
        $('#4').val(telenono)
        $('#5').val(area)
        $('#6').val(movil)

    }
</script>


<div class="modal fade" id="editar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Editar</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="php/m3/crud.php" method="post">
                <div class="modal-body">

                    <input type="hidden" id="id_id" name="id">
                    <div style="color:black" class="row">
                        <div class="col-4">
                            <label>Empresa</label>
                            <input type="text" class="form-control" id="1" name="empresa" required>
                        </div>
                        <div class="col-4">
                            <label>Contacto</label>
                            <input type="text" class="form-control" id="2" name="contacto" required>
                        </div>
                        <div class="col-4">
                            <label>Dirección</label>
                            <input type="text" class="form-control" id="3" name="direcion" required>
                        </div>
                        <div class="col-4">
                            <label>Télefono</label>
                            <input type="text" class="form-control" id="4" name="telefono" required>
                        </div>
                        <div class="col-4">
                            <label>Area</label>
                            <input type="text" class="form-control" id="5" name="area" required>
                        </div>
                        <div class="col-4">
                            <label>Movil</label>
                            <input type="text" class="form-control" id="6" name="movil" required>
                        </div>

                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-dark" data-dismiss="modal">Cerrar</button>
                    <button name="editarbtn" type="submit" class="btn btn-warning">Editar</button>
                </div>
            </form>
        </div>
    </div>
</div>




<div id="eliminar" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="danger-header-modalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="php/m3/crud.php" method="post">
                <input type="hidden" id="id" name="id">

                <div class="modal-header modal-colored-header bg-danger">
                    <h4 class="modal-title" id="danger-header-modalLabel">Eliminar Usuario</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">

                    <p style="color:black;" id="empresa_eli"></p>
                    <p style="color:black;" id="contacto_eli"></p>
                    <p style="color:black;" id="correo_eli"></p>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-dismiss="modal">Cerrar</button>
                    <button type="submit" name="eliminarcliente" class="btn btn-danger">Eliminar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="assets/extra-libs/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="dist/js/pages/datatable/datatable-basic.init.js"></script>
<?php
include_once('global/cyp/pie.php');
?>