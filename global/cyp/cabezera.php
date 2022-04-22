<?php
include_once('php/conexion/conexion.php');
session_start();
date_default_timezone_set('America/Mexico_City');
$fecha = date("Y-m-d");

if (!isset($_SESSION['ID'])) {
    header('location: login.php');
} else {


?>
    <!DOCTYPE html>
    <!--By Edgar Pérez Alvarado-->
    <html dir="ltr" lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <!-- Tell the browser to be responsive to screen width -->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <!-- Favicon icon -->
        <title>Empresa || <?php echo basename($_SERVER['PHP_SELF'], ".php"); ?></title>
        <!-- Custom CSS -->
        <link href="assets/extra-libs/c3/c3.min.css" rel="stylesheet">
        <!--         <link href="assets/libs/chartist/dist/chartist.min.css" rel="stylesheet">
-->
        <link href="assets/extra-libs/jvector/jquery-jvectormap-2.0.2.css" rel="stylesheet" />
        <!-- Custom CSS -->
        <link href="dist/css/style.min.css" rel="stylesheet">

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

        <!--Alertas-->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.11.0/sweetalert2.css" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.11.0/sweetalert2.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10/dist/sweetalert2.all.min.js"></script>
        <!-- -->

        <link href="assets/extra-libs/datatables.net-bs4/css/dataTables.bootstrap4.css" rel="stylesheet">

        <!--SELECT2-->

        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

        <!--Progreso web-->
        <script src="https://cdn.rawgit.com/mburakerman/prognroll/master/src/prognroll.js"></script>

        <!--Grafica-->
        <script src="https://code.highcharts.com/highcharts.js"></script>
        <script src="https://code.highcharts.com/modules/exporting.js"></script>
        <script src="https://code.highcharts.com/modules/export-data.js"></script>
        <script src="https://code.highcharts.com/modules/offline-exporting.js"></script>
    </head>

    <body onload="mueveReloj()">

        <div class="preloader">
            <div class="lds-ripple">
                <div class="lds-pos"></div>
                <div class="lds-pos"></div>
            </div>
        </div>
        <div id="main-wrapper" data-theme="light" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full" data-sidebar-position="fixed" data-header-position="fixed" data-boxed-layout="full">
            <header class="topbar" data-navbarbg="skin6">
                <nav class="navbar top-navbar navbar-expand-md">
                    <div class="navbar-header" data-logobg="skin6">
                        <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)"><i class="ti-menu ti-close"></i></a>
                        <!-- Logo -->
                        <div class="navbar-brand">
                            <!-- Logo icon -->
                            <a href="index.php">
                                <b class="logo-icon">
                                </b>
                            </a>
                        </div>

                        <a class="topbartoggler d-block d-md-none waves-effect waves-light" href="javascript:void(0)" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><i class="ti-more"></i></a>
                    </div>
                    <div class="navbar-collapse collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav float-left mr-auto ml-3 pl-1">
                        </ul>
                        <ul class="navbar-nav float-right">
                            <li class="nav-item d-none d-md-block">
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="javascript:void(0)" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <span class="ml-2 d-none d-lg-inline-block"><span>Hola,</span> <span class="text-dark"><?php echo $_SESSION['NOMBRE']; ?></span> <i data-feather="chevron-down" class="svg-icon"></i></span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right user-dd animated flipInY">
                                    <br>
                                    <a href="php/login/cerrar.php" class="dropdown-item"><i data-feather="power" class="svg-icon mr-2 ml-1"></i>
                                        Logout</a>
                                </div>
                            </li>

                        </ul>
                    </div>
                </nav>
            </header>



            <aside class="left-sidebar" data-sidebarbg="skin6">
                <div class="scroll-sidebar" data-sidebarbg="skin6">
                    <nav class="sidebar-nav">
                        <ul id="sidebarnav">
                            <li class="sidebar-item"> <a class="sidebar-link sidebar-link" href="Index.php" aria-expanded="false"><i data-feather="home" class="feather-icon"></i><span class="hide-menu">Dashboard</span></a></li>
                            <li class="list-divider"></li>
                            <?php
                            if ($_SESSION['ROL'] == 'Super Administrador') {
                            ?>
                                <li class="nav-small-cap"><span class="hide-menu">Administrador</span></li>
                                <li class="sidebar-item"> <a class="sidebar-link" href="Administrador.php" aria-expanded="false"><i data-feather="users" class="feather-icon"></i><span class="hide-menu">Usuarios</span></a></li>
                            <?php
                            }
                            ?>

                            <?php
                            if ($_SESSION['M1'] == 'Si' || $_SESSION['M1'] == 'TEM') {
                            ?>
                                <li class="nav-small-cap"><span class="hide-menu">Modulo 1</span></li>
                                <li class="sidebar-item"> <a class="sidebar-link" href="Solicitudes.php" aria-expanded="false"><i data-feather="edit-3" class="feather-icon"></i><span class="hide-menu">Solicitudes</span></a></li>

                            <?php
                            }
                            ?>

                            <?php
                            if ($_SESSION['M2'] == 'Si' || $_SESSION['M2'] == 'TEM') {
                            ?>
                                <li class="nav-small-cap"><span class="hide-menu">Modulo 2</span></li>
                                <li class="sidebar-item"> <a class="sidebar-link" href="Proveedores.php" aria-expanded="false"><i data-feather="truck" class="feather-icon"></i><span class="hide-menu">Proveedores</span></a></li>

                            <?php
                            }
                            ?>
                            <?php
                            if ($_SESSION['M3'] == 'Si' || $_SESSION['M3'] == 'TEM') {
                            ?>
                                <li class="nav-small-cap"><span class="hide-menu">Modulo 3</span></li>
                                <li class="sidebar-item"> <a class="sidebar-link" href="Clientes.php" aria-expanded="false"><i data-feather="user-check" class="feather-icon"></i><span class="hide-menu">Clientes</span></a></li>

                            <?php
                            }
                            ?>
                            <?php
                            if ($_SESSION['M4'] == 'Si' || $_SESSION['M4'] == 'TEM') {
                            ?>
                                <li class="nav-small-cap"><span class="hide-menu">Modulo 4</span></li>
                                <li class="sidebar-item"> <a class="sidebar-link" href="Almacen.php" aria-expanded="false"><i data-feather="layers" class="feather-icon"></i><span class="hide-menu">Almacen</span></a></li>

                            <?php
                            }
                            ?>
                            <?php
                            if ($_SESSION['M5'] == 'Si' || $_SESSION['M5'] == 'TEM') {
                            ?>
                                <li class="nav-small-cap"><span class="hide-menu">Modulo 5</span></li>
                                <li class="sidebar-item"> <a class="sidebar-link" href="Cotizaciones.php" aria-expanded="false"><i data-feather="external-link" class="feather-icon"></i><span class="hide-menu">Cotizaciones</span></a></li>

                            <?php
                            }
                            ?>
                            <?php
                            if ($_SESSION['M6'] == 'Si' || $_SESSION['M6'] == 'TEM') {
                            ?>
                                <li class="nav-small-cap"><span class="hide-menu">Modulo 6</span></li>
                                <li class="sidebar-item"> <a class="sidebar-link" href="Compras.php" aria-expanded="false"><i data-feather="shopping-bag" class="feather-icon"></i><span class="hide-menu">Compras</span></a></li>

                            <?php
                            }
                            ?>
                            <?php
                            if ($_SESSION['M7'] == 'Si' || $_SESSION['M7'] == 'TEM') {
                            ?>
                                <li class="nav-small-cap"><span class="hide-menu">Modulo 7</span></li>
                                <li class="sidebar-item"> <a class="sidebar-link" href="Ventas.php" aria-expanded="false"><i data-feather="wind" class="feather-icon"></i><span class="hide-menu">Ventas</span></a></li>

                            <?php
                            }
                            ?>
                            <?php
                            if ($_SESSION['M8'] == 'Si' || $_SESSION['M8'] == 'TEM') {
                            ?>
                                <li class="nav-small-cap"><span class="hide-menu">Modulo 8</span></li>
                                <li class="sidebar-item"> <a class="sidebar-link" href="Estadisticas.php" aria-expanded="false"><i data-feather="bar-chart-2" class="feather-icon"></i><span class="hide-menu">Estadisticas</span></a></li>

                            <?php
                            }
                            ?>
                            <?php
                            if ($_SESSION['M9'] == 'Si' || $_SESSION['M9'] == 'TEM') {
                            ?>
                                <li class="nav-small-cap"><span class="hide-menu">Modulo 9</span></li>
                                <li class="sidebar-item"> <a class="sidebar-link" href="#" aria-expanded="false"><i data-feather="alert-octagon" class="feather-icon"></i><span class="hide-menu">Proyectos</span></a></li>

                            <?php
                            }
                            ?>
                            <?php
                            if ($_SESSION['M10'] == 'Si' || $_SESSION['M10'] == 'TEM') {
                            ?>
                                <li class="nav-small-cap"><span class="hide-menu">Modulo 10</span></li>
                                <li class="sidebar-item"> <a class="sidebar-link" href="#" aria-expanded="false"><i data-feather="alert-octagon" class="feather-icon"></i><span class="hide-menu">Servicios</span></a></li>

                            <?php
                            }
                            ?>
                            <?php
                            if ($_SESSION['M11'] == 'Si' || $_SESSION['M11'] == 'TEM') {
                            ?>
                                <li class="nav-small-cap"><span class="hide-menu">Modulo 11</span></li>
                                <li class="sidebar-item"> <a class="sidebar-link" href="Seguimiento.php" aria-expanded="false"><i data-feather="trending-up" class="feather-icon"></i><span class="hide-menu">Seguimiento</span></a></li>

                            <?php
                            }
                            ?>
                            <?php
                            if ($_SESSION['M12'] == 'Si' || $_SESSION['M12'] == 'TEM') {
                            ?>
                                <li class="nav-small-cap"><span class="hide-menu">Modulo 12</span></li>
                                <li class="sidebar-item"> <a class="sidebar-link" href="Facturacion.php" aria-expanded="false"><i data-feather="book-open" class="feather-icon"></i><span class="hide-menu">Facturación</span></a></li>

                            <?php
                            }
                            ?>
                        </ul>
                    </nav>
                    <!-- End Sidebar navigation -->
                </div>
                <!-- End Sidebar scroll-->
            </aside>
        <?php
    }
        ?>