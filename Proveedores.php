<?php
include_once('global/cyp/cabezera.php');
if ($_SESSION['M2'] == 'Si' || $_SESSION['M2'] == 'TEM') {
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


        <div class="row">
            <div class="col-xl-6">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title mb-3"></h4>

                        <ul class="nav nav-tabs mb-3">
                            <li class="nav-item">
                                <a href="#correo" data-toggle="tab" aria-expanded="true" class="nav-link active">
                                    <i class="mdi mdi-account-circle d-lg-none d-block mr-1"></i>
                                    <span class="d-none d-lg-block">Enviar Correos</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#crud" data-toggle="tab" aria-expanded="false" class="nav-link">
                                    <i class="mdi mdi-home-variant d-lg-none d-block mr-1"></i>
                                    <span class="d-none d-lg-block">Altas, Bajas, Eliminaciones</span>
                                </a>
                            </li>


                        </ul>

                        <div class="tab-content">

                            <div class="tab-pane show active" id="correo">
                                <div class="row">
                                    <div class="col-12 mt-4">
                                        <div class="card">
                                            <div class="card-body collapse show">
                                                <form action="php/m2/correo.php" method="post">

                                                    <h4 class="card-title">Enviar Correo a Proveedor</h4>
                                                    <div class="row">
                                                        <div style="color: black;" class="col-6">
                                                            <label> Correo: </label>
                                                            <select style="color: black;" required class="form-control" name="Correo">
                                                                <option selected></option>
                                                                <?php
                                                                $consulta = "SELECT * FROM m2_proveedores ";
                                                                $query = mysqli_query($conexion, $consulta);
                                                                foreach ($query as $row) {
                                                                ?>
                                                                    <option value="<?php echo $row['correo'] ?>"> Empresa: <?php echo $row['empresa'] ?> Correo: <?php echo $row['correo'] ?></option>

                                                                <?php
                                                                }
                                                                ?>
                                                            </select>
                                                        </div>
                                                        <div style="color: black;" class="col-6">
                                                            <label> Asunto: </label>
                                                            <input type="text" name="Asunto" class="form-control" required>

                                                        </div>
                                                        <div class="col-12">
                                                            <label style="color:black;"> Mensaje: </label>
                                                            <textarea class="form-control" name="Mensaje" cols="30" rows="5" required></textarea>
                                                        </div>

                                                        <div class="col-6">
                                                            <button class="btn btn-success" type="submit">Enviar Correo</button>
                                                        </div>

                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
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
                                    <form action="php/m2/crud.php" method="post">
                                        <div class="row">
                                            <div class="col-6">
                                                <div style="color:black;" class="form-group">
                                                    <label>Empresa</label>
                                                    <input class="form-control" type="text" name="empresa" required>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div style="color:black;" class="form-group">
                                                    <label>Nombre del contacto</label>
                                                    <input class="form-control" type="text" name="nombre" required>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div style="color:black;" class="form-group">
                                                    <label>Cargo</label>
                                                    <input class="form-control" type="text" name="cargo" required>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div style="color:black;" class="form-group">
                                                    <label>Dirección</label>
                                                    <input class="form-control" type="text" name="direccion" required>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div style="color:black;" class="form-group">
                                                    <label>Código Postal</label>
                                                    <input class="form-control" type="text" name="cp" required>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div style="color:black;" class="form-group">
                                                    <label>Ciudad</label>
                                                    <input class="form-control" type="text" name="ciudad" required>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div style="color:black;" class="form-group">
                                                    <label>Pais</label>
                                                    <input class="form-control" type="text" name="pais" required>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div style="color:black;" class="form-group">
                                                    <label>Teléfono</label>
                                                    <input class="form-control" type="text" name="telefono" required>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div style="color:black;" class="form-group">
                                                    <label>Correo electronico</label>
                                                    <input class="form-control" type="email" name="correo" required>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div style="color:black;" class="form-group">
                                                    <br>
                                                    <button type="submit" name="agregarproveedor" class="btn btn-success">Agregar proveedor</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <?php
                                $consulta = "SELECT * FROM m2_proveedores";
                                $query = mysqli_query($conexion, $consulta);
                                foreach ($query as $row) {
                                ?>
                                    <div class="row">
                                        <div class="col-12 mt-4">
                                            <div class="card">
                                                <div class="card-body collapse show">
                                                    <form action="php/m2/crud.php" method="post">
                                                        <div class="row">
                                                            <div class="col-6">
                                                                <div style="color:black;" class="form-group">
                                                                    <label>Empresa</label>
                                                                    <input id="id1<?php echo $row['id'] ?>" class="form-control" type="text" name="empresa" value="<?php echo $row['empresa']; ?>" disabled required>
                                                                </div>
                                                            </div>
                                                            <div class="col-6">
                                                                <div style="color:black;" class="form-group">
                                                                    <label>Nombre del contacto</label>
                                                                    <input id="id2<?php echo $row['id'] ?>" class="form-control" type="text" name="nombre" value="<?php echo $row['nombre']; ?>" disabled required>
                                                                </div>
                                                            </div>
                                                            <div class="col-6">
                                                                <div style="color:black;" class="form-group">
                                                                    <label>Cargo</label>
                                                                    <input id="id3<?php echo $row['id'] ?>" class="form-control" type="text" name="cargo" value="<?php echo $row['cargo']; ?>" disabled required>
                                                                </div>
                                                            </div>
                                                            <div class="col-6">
                                                                <div style="color:black;" class="form-group">
                                                                    <label>Dirección</label>
                                                                    <input id="id4<?php echo $row['id'] ?>" class="form-control" type="text" name="direccion" value="<?php echo $row['direccion']; ?>" disabled required>
                                                                </div>
                                                            </div>
                                                            <div class="col-6">
                                                                <div style="color:black;" class="form-group">
                                                                    <label>Código Postal</label>
                                                                    <input id="id5<?php echo $row['id'] ?>" class="form-control" type="text" name="cp" value="<?php echo $row['c_postal']; ?>" disabled required>
                                                                </div>
                                                            </div>
                                                            <div class="col-6">
                                                                <div style="color:black;" class="form-group">
                                                                    <label>Ciudad</label>
                                                                    <input id="id6<?php echo $row['id'] ?>" class="form-control" type="text" name="ciudad" value="<?php echo $row['ciudad']; ?>" disabled required>
                                                                </div>
                                                            </div>
                                                            <div class="col-6">
                                                                <div style="color:black;" class="form-group">
                                                                    <label>Pais</label>
                                                                    <input id="id7<?php echo $row['id'] ?>" class="form-control" type="text" name="pais" value="<?php echo $row['pais']; ?>" disabled required>
                                                                </div>
                                                            </div>
                                                            <div class="col-6">
                                                                <div style="color:black;" class="form-group">
                                                                    <label>Teléfono</label>
                                                                    <input id="id8<?php echo $row['id'] ?>" class="form-control" type="text" name="telefono" value="<?php echo $row['telefono']; ?>" disabled required>
                                                                </div>
                                                            </div>
                                                            <div class="col-6">
                                                                <div style="color:black;" class="form-group">
                                                                    <label>Correo electronico</label>
                                                                    <input id="id9<?php echo $row['id'] ?>" class="form-control" type="email" name="correo" value="<?php echo $row['correo']; ?>" disabled required>
                                                                </div>
                                                            </div>
                                                            <div class="col-6">
                                                                <div style="color:black;" class="form-group">
                                                                    <br>

                                                                    <input type="hidden" name="id" value="<?php echo $row['id'] ?>">
                                                                    <button type="button" onclick="habilitar(<?php echo $row['id'] ?>)" class="btn btn-warning">Habilitar</button>
                                                                    <button type="button" onclick="deshabilitar(<?php echo $row['id'] ?>)" class="btn btn-info">Deshabilitar</button>
                                                                    <button id="id10<?php echo $row['id'] ?>" type="submit" disabled name="editarproveedor" class="btn btn-warning">Editar</button>
                                                                    <button id="id11<?php echo $row['id'] ?>" type="submit" disabled name="eliminarproveedor" class="btn btn-danger">Eliminar</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </form>
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
        44 Poniente #502 esq. blvd. 5 de Mayo Col. Santa María, C.P. 72080 Puebla, Puebla. <br>
        Tel: (222) 2-20-54-44, (222) 5-14-75-56 coordinacion@iacsa-puebla.com.mx
    </footer>

</div>


<script>
    function habilitar(id) {
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
    }

    function deshabilitar(id) {
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

    }
</script>
<?php
include_once('global/cyp/pie.php');
?>