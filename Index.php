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
                            <li class="breadcrumb-item">Dashboard
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>

        </div>
    </div>

    <div class="container-fluid">



        <!-- 
        <div class="card-group">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex d-lg-flex d-md-block align-items-center">
                        <div>
                            <h2 class="text-dark mb-1 font-weight-medium">
                                <?php
                                $sql = "SELECT COUNT(*) AS contar FROM usuarios WHERE m1 = 'Si'";
                                $query = mysqli_query($conexion, $sql);
                                $array = mysqli_fetch_array($query);
                                echo $array['contar'];
                                ?>
                            </h2>
                            <h6 class="text-dark font-weight-normal mb-0 w-100 text-truncate">Solicitudes</h6>
                        </div>
                        <div class="ml-auto mt-md-3 mt-lg-0">
                            <span class="opacity-7 text-dark"><i data-feather="edit-3"></i></span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-body">
                    <div class="d-flex d-lg-flex d-md-block align-items-center">
                        <div>
                            <h2 class="text-dark mb-1 font-weight-medium">
                                <?php
                                $sql = "SELECT COUNT(*) AS contar FROM usuarios WHERE m2 = 'Si'";
                                $query = mysqli_query($conexion, $sql);
                                $array = mysqli_fetch_array($query);
                                echo $array['contar'];
                                ?>
                            </h2>
                            <h6 class="text-dark font-weight-normal mb-0 w-100 text-truncate">Proveedores</h6>
                        </div>
                        <div class="ml-auto mt-md-3 mt-lg-0">
                            <span class="opacity-7 text-dark"><i data-feather="alert-octagon"></i></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <div class="d-flex d-lg-flex d-md-block align-items-center">
                        <div>
                            <h2 class="text-dark mb-1 font-weight-medium">
                                <?php
                                $sql = "SELECT COUNT(*) AS contar FROM usuarios WHERE m3 = 'Si'";
                                $query = mysqli_query($conexion, $sql);
                                $array = mysqli_fetch_array($query);
                                echo $array['contar'];
                                ?></h2>
                            <h6 class="text-dark font-weight-normal mb-0 w-100 text-truncate">Clientes</h6>
                        </div>
                        <div class="ml-auto mt-md-3 mt-lg-0">
                            <span class="opacity-7 text-dark"><i data-feather="alert-octagon"></i></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <div class="d-flex d-lg-flex d-md-block align-items-center">
                        <div>
                            <h2 class="text-dark mb-1 font-weight-medium">
                                <?php
                                $sql = "SELECT COUNT(*) AS contar FROM usuarios WHERE m4 = 'Si'";
                                $query = mysqli_query($conexion, $sql);
                                $array = mysqli_fetch_array($query);
                                echo $array['contar'];
                                ?>
                            </h2>
                            <h6 class="text-dark font-weight-normal mb-0 w-100 text-truncate">Almacen</h6>
                        </div>
                        <div class="ml-auto mt-md-3 mt-lg-0">
                            <span class="opacity-7 text-dark"><i data-feather="alert-octagon"></i></span>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="card-group">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex d-lg-flex d-md-block align-items-center">
                        <div>
                            <h2 class="text-dark mb-1 font-weight-medium">
                                <?php
                                $sql = "SELECT COUNT(*) AS contar FROM usuarios WHERE m5 = 'Si'";
                                $query = mysqli_query($conexion, $sql);
                                $array = mysqli_fetch_array($query);
                                echo $array['contar'];
                                ?>
                            </h2>
                            <h6 class="text-dark font-weight-normal mb-0 w-100 text-truncate">Cotizaciones</h6>
                        </div>
                        <div class="ml-auto mt-md-3 mt-lg-0">
                            <span class="opacity-7 text-dark"><i data-feather="alert-octagon"></i></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <div class="d-flex d-lg-flex d-md-block align-items-center">
                        <div>
                            <h2 class="text-dark mb-1 font-weight-medium">
                                <?php
                                $sql = "SELECT COUNT(*) AS contar FROM usuarios WHERE m6 = 'Si'";
                                $query = mysqli_query($conexion, $sql);
                                $array = mysqli_fetch_array($query);
                                echo $array['contar'];
                                ?>
                            </h2>
                            <h6 class="text-dark font-weight-normal mb-0 w-100 text-truncate">Compras</h6>
                        </div>
                        <div class="ml-auto mt-md-3 mt-lg-0">
                            <span class="opacity-7 text-dark"><i data-feather="alert-octagon"></i></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <div class="d-flex d-lg-flex d-md-block align-items-center">
                        <div>
                            <h2 class="text-dark mb-1 font-weight-medium">
                                <?php
                                $sql = "SELECT COUNT(*) AS contar FROM usuarios WHERE m7 = 'Si'";
                                $query = mysqli_query($conexion, $sql);
                                $array = mysqli_fetch_array($query);
                                echo $array['contar'];
                                ?>
                            </h2>
                            <h6 class="text-dark font-weight-normal mb-0 w-100 text-truncate">Ventas</h6>
                        </div>
                        <div class="ml-auto mt-md-3 mt-lg-0">
                            <span class="opacity-7 text-dark"><i data-feather="alert-octagon"></i></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <div class="d-flex d-lg-flex d-md-block align-items-center">
                        <div>
                            <h2 class="text-dark mb-1 font-weight-medium">
                                <?php
                                $sql = "SELECT COUNT(*) AS contar FROM usuarios WHERE m8 = 'Si'";
                                $query = mysqli_query($conexion, $sql);
                                $array = mysqli_fetch_array($query);
                                echo $array['contar'];
                                ?>
                            </h2>
                            <h6 class="text-dark font-weight-normal mb-0 w-100 text-truncate">Estadisticas</h6>
                        </div>
                        <div class="ml-auto mt-md-3 mt-lg-0">
                            <span class="opacity-7 text-dark"><i data-feather="alert-octagon"></i></span>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="card-group">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex d-lg-flex d-md-block align-items-center">
                        <div>
                            <h2 class="text-dark mb-1 font-weight-medium">
                                <?php
                                $sql = "SELECT COUNT(*) AS contar FROM usuarios WHERE m9 = 'Si'";
                                $query = mysqli_query($conexion, $sql);
                                $array = mysqli_fetch_array($query);
                                echo $array['contar'];
                                ?>
                            </h2>
                            <h6 class="text-dark font-weight-normal mb-0 w-100 text-truncate">Proyectos</h6>
                        </div>
                        <div class="ml-auto mt-md-3 mt-lg-0">
                            <span class="opacity-7 text-dark"><i data-feather="alert-octagon"></i></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <div class="d-flex d-lg-flex d-md-block align-items-center">
                        <div>
                            <h2 class="text-dark mb-1 font-weight-medium">
                                <?php
                                $sql = "SELECT COUNT(*) AS contar FROM usuarios WHERE m10 = 'Si'";
                                $query = mysqli_query($conexion, $sql);
                                $array = mysqli_fetch_array($query);
                                echo $array['contar'];
                                ?>
                            </h2>
                            <h6 class="text-dark font-weight-normal mb-0 w-100 text-truncate">Servicios</h6>
                        </div>
                        <div class="ml-auto mt-md-3 mt-lg-0">
                            <span class="opacity-7 text-dark"><i data-feather="alert-octagon"></i></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <div class="d-flex d-lg-flex d-md-block align-items-center">
                        <div>
                            <h2 class="text-dark mb-1 font-weight-medium">
                                <?php
                                $sql = "SELECT COUNT(*) AS contar FROM usuarios WHERE m11 = 'Si'";
                                $query = mysqli_query($conexion, $sql);
                                $array = mysqli_fetch_array($query);
                                echo $array['contar'];
                                ?>
                            </h2>
                            <h6 class="text-dark font-weight-normal mb-0 w-100 text-truncate">Seguimiento</h6>
                        </div>
                        <div class="ml-auto mt-md-3 mt-lg-0">
                            <span class="opacity-7 text-dark"><i data-feather="alert-octagon"></i></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <div class="d-flex d-lg-flex d-md-block align-items-center">
                        <div>
                            <h2 class="text-dark mb-1 font-weight-medium">
                                <?php
                                $sql = "SELECT COUNT(*) AS contar FROM usuarios WHERE m12 = 'Si'";
                                $query = mysqli_query($conexion, $sql);
                                $array = mysqli_fetch_array($query);
                                echo $array['contar'];
                                ?>
                            </h2>
                            <h6 class="text-dark font-weight-normal mb-0 w-100 text-truncate">M12</h6>
                        </div>
                        <div class="ml-auto mt-md-3 mt-lg-0">
                            <span class="opacity-7 text-dark"><i data-feather="alert-octagon"></i></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
         -->





    </div>
    <footer class="footer text-center " style="color: black;">
        
    </footer>

</div>

<?php
include_once('global/cyp/pie.php');
?>