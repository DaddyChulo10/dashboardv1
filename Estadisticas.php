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
                            <li class="breadcrumb-item">Estadisticas
                            </li>
                        </ol>
                    </nav>
                </div>

            </div>

        </div>
    </div>

    <div class="container-fluid">

        <div class="row">
            <div class="col-4">
                <input type="month" class="form-control" id="fecha">
            </div>
            <div class="col-4">
                <button type="button" onclick="date()" class="btn btn-dark">Buscar</button>
            </div>
            <br><br>
        </div>


        <div class="row">
            <div class="col-xl-6">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title mb-3">Modulo de estadisticas</h4>
                        <ul class="nav nav-tabs mb-3">
                            <li class="nav-item">
                                <a href="#cotizaciones" data-toggle="tab" aria-expanded="true" class="nav-link active">
                                    <i class="mdi mdi-account-circle d-lg-none d-block mr-1"></i>
                                    <span class="d-none d-lg-block">Cotizaciones</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#ventas" data-toggle="tab" aria-expanded="false" class="nav-link">
                                    <i class="mdi mdi-settings-outline d-lg-none d-block mr-1"></i>
                                    <span class="d-none d-lg-block">Ventas</span>
                                </a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div style="color:black" class="tab-pane show active" id="cotizaciones">
                                <!-- Anuncios -->
                                <div class="card-group">
                                    <div class="card border-right">
                                        <div class="card-body">
                                            <div class="d-flex d-lg-flex d-md-block align-items-center">
                                                <div>
                                                    <div class="d-inline-flex align-items-center">
                                                        <h2 id="dato1" class="text-dark mb-1 font-weight-medium"></h2>
                                                        <span id="dato1porcentaje" class="badge bg-primary font-12 text-white font-weight-medium badge-pill ml-2 d-lg-block d-md-none"></span>

                                                    </div>
                                                    <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Total de solicitudes</h6>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card border-right">
                                        <div class="card-body">
                                            <div class="d-flex d-lg-flex d-md-block align-items-center">
                                                <div>
                                                    <div class="d-inline-flex align-items-center">
                                                        <h2 id="dato2" class="text-dark mb-1 font-weight-medium"></h2>
                                                        <span id="dato2porcentaje" class="badge bg-success font-12 text-white font-weight-medium badge-pill ml-2 d-lg-block d-md-none"></span>

                                                    </div>
                                                    <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Solicitudes Aprobadas</h6>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card border-right">
                                        <div class="card-body">
                                            <div class="d-flex d-lg-flex d-md-block align-items-center">
                                                <div>
                                                    <div class="d-inline-flex align-items-center">
                                                        <h2 id="dato3" class="text-dark mb-1 font-weight-medium"></h2>
                                                        <span id="dato3porcentaje" class="badge bg-danger font-12 text-white font-weight-medium badge-pill ml-2 d-lg-block d-md-none"></span>
                                                    </div>
                                                    <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Solicitudes Rechazadas</h6>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                </div>
                                <!-- Anuncios -->
                                <div class="row">
                                    <div class="col-12">
                                        <center>
                                            <div id="grafica1"></div>
                                        </center>
                                    </div>
                                    <div class="col-12">
                                        <center>
                                            <div id="grafica2"></div>
                                        </center>
                                    </div>
                                    <div class="col-12">
                                        <center>
                                            <div id="grafica3"></div>
                                        </center>
                                    </div>
                                    <div class="col-12">
                                        <center>
                                            <div id="grafica4"></div>
                                            <button type="button" id="plain" class="btn btn-dark">Simple</button>
                                            <button type="button" id="inverted" class="btn btn-dark">Invertido</button>
                                        </center>
                                    </div>
                                    <div class="col-12">
                                        <center>
                                            <div id="grafica5"></div>
                                            <button type="button" id="plain1" class="btn btn-dark">Simple</button>
                                            <button type="button" id="inverted1" class="btn btn-dark">Invertido</button>
                                        </center>
                                    </div>
                                    <div class="col-12">
                                        <center>
                                            <div id="grafica6"></div>
                                            <button type="button" id="plain2" class="btn btn-dark">Simple</button>
                                            <button type="button" id="inverted2" class="btn btn-dark">Invertido</button>
                                        </center>
                                    </div>
                                    <div class="col-12">
                                        <center>
                                            <div id="grafica7"></div>
                                        </center>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="ventas">
                                <!-- Anuncios -->
                                <div class="card-group">
                                    <div class="card border-right">
                                        <div class="card-body">
                                            <div class="d-flex d-lg-flex d-md-block align-items-center">
                                                <div>
                                                    <div class="d-inline-flex align-items-center">
                                                        <h2 id="dato1plus" class="text-dark mb-1 font-weight-medium">0</h2>
                                                        <span id="dato1porcentajeplus" class="badge bg-primary font-12 text-white font-weight-medium badge-pill ml-2 d-lg-block d-md-none">0</span>

                                                    </div>
                                                    <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Total de Ventas solicitadas</h6>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card border-right">
                                        <div class="card-body">
                                            <div class="d-flex d-lg-flex d-md-block align-items-center">
                                                <div>
                                                    <div class="d-inline-flex align-items-center">
                                                        <h2 id="dato2plus" class="text-dark mb-1 font-weight-medium">0</h2>
                                                        <span id="dato2porcentajeplus" class="badge bg-success font-12 text-white font-weight-medium badge-pill ml-2 d-lg-block d-md-none">0</span>

                                                    </div>
                                                    <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Ventas Aprobadas</h6>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card border-right">
                                        <div class="card-body">
                                            <div class="d-flex d-lg-flex d-md-block align-items-center">
                                                <div>
                                                    <div class="d-inline-flex align-items-center">
                                                        <h2 id="dato3plus" class="text-dark mb-1 font-weight-medium">0</h2>
                                                        <span id="dato3porcentajeplus" class="badge bg-danger font-12 text-white font-weight-medium badge-pill ml-2 d-lg-block d-md-none">0</span>
                                                    </div>
                                                    <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Ventas Rechazadas</h6>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Anuncios -->
                                <div class="row">
                                    <div class="col-12">
                                        <center>
                                            <div id="grafica1plus"></div>
                                        </center>
                                    </div>

                                    <div class="col-12">
                                        <center>
                                            <div id="grafica2plus"></div>
                                        </center>
                                    </div>
                                    <div class="col-12">
                                        <center>
                                            <div id="grafica3plus"></div>
                                        </center>
                                    </div>
                                    <div class="col-12">
                                        <center>
                                            <div id="grafica4plus"></div>
                                            <button type="button" id="plainplus" class="btn btn-dark">Simple</button>
                                            <button type="button" id="invertedplus" class="btn btn-dark">Invertido</button>
                                        </center>
                                    </div>
                                    <div class="col-12">
                                        <center>
                                            <div id="grafica5plus"></div>
                                            <button type="button" id="plain1plus" class="btn btn-dark">Simple</button>
                                            <button type="button" id="inverted1plus" class="btn btn-dark">Invertido</button>
                                        </center>
                                    </div>
                                    <div class="col-12">
                                        <center>
                                            <div id="grafica6plus"></div>
                                            <button type="button" id="plain2plus" class="btn btn-dark">Simple</button>
                                            <button type="button" id="inverted2plus" class="btn btn-dark">Invertido</button>
                                        </center>
                                    </div>
                                    <div class="col-12">
                                        <center>
                                            <div id="grafica7plus"></div>
                                        </center>
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
        
    </footer>

</div>

<script>
    $(document).ready(function() {
        porcentajes('', 'Si')
        grafica1('', 'Si')
        grafica2('', 'Si')
        grafica3('', 'Si')
        grafica4('', 'Si')
        grafica5('', 'Si')
        grafica6('', 'Si')
        grafica7('', 'Si')
        porcentajesplus('', 'Si')
        grafica1plus('', 'Si')
        grafica2plus('', 'Si')
        grafica3plus('', 'Si')
        grafica4plus('', 'Si')
        grafica5plus('', 'Si')
        grafica6plus('', 'Si')
        grafica7plus('', 'Si')

    });

    function date() {
        fecha = $('#fecha').val()
        porcentajes(fecha, 'Si')
        grafica1(fecha, 'Si')
        grafica2(fecha, 'Si')
        grafica3(fecha, 'Si')
        grafica4(fecha, 'Si')
        grafica5(fecha, 'Si')
        grafica6(fecha, 'Si')
        grafica7(fecha, 'Si')
        porcentajesplus(fecha, 'Si')
        grafica1plus(fecha, 'Si')
        grafica2plus(fecha, 'Si')
        grafica3plus(fecha, 'Si')
        grafica4plus(fecha, 'Si')
        grafica5plus(fecha, 'Si')
        grafica6plus(fecha, 'Si')
        grafica7plus(fecha, 'Si')
        $('#fecha').val('')

    }
</script>
<script src="dist/js/graficas/graficas.js"></script>
<script src="dist/js/graficas/graficasplus.js"></script>
<?php
include_once('global/cyp/pie.php');
?>