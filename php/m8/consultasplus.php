<?php
include_once('../conexion/conexion.php');
session_start();
date_default_timezone_set('America/Mexico_City');


/*
SELECT v.inf, v.folio FROM m7_ventas_productos AS v WHERE v.estatus = 'RECHAZADA' AND MONTH(v.fecha1) = '04' AND YEAR(v.fecha1) = '2022' GROUP BY v.folio;


SELECT v.inf, COUNT(*) as rechazo FROM m7_ventas_productos AS v WHERE v.estatus = 'RECHAZADA' AND MONTH(v.fecha1) = '04' AND YEAR(v.fecha1) = '2022' GROUP BY v.folio;

SELECT v.inf, COUNT(*) as rechazo FROM m7_ventas_productos AS v WHERE v.estatus = 'RECHAZADA' AND MONTH(v.fecha1) = '04' AND YEAR(v.fecha1) = '2022' GROUP BY v.inf;



EL MERO CHIDOOOO

SELECT v.inf, COUNT(DISTINCT folio) as rechazo FROM m7_ventas_productos AS v WHERE v.estatus = 'RECHAZADA' AND MONTH(v.fecha1) = '04' AND YEAR(v.fecha1) = '2022' GROUP BY v.inf;
*/

#GRAFICA7
if (isset($_POST['g7'])) {
    //SELECT v.1_modelo AS modelo, COUNT(*) as registros FROM m7_ventas AS v WHERE MONTH(v.fecha_1) = '04'  AND YEAR(v.fecha_1) = '2022' GROUP BY modelo HAVING COUNT(*)>0
    $fechaentero = strtotime($_POST['fecha']);
    $mes = date("m", $fechaentero);
    $año = date("Y", $fechaentero);
    $registro = $conexion->query("SELECT v.inf, COUNT(DISTINCT folio) as rechazo FROM m7_ventas_productos AS v WHERE v.estatus = 'RECHAZADA' AND MONTH(v.fecha1) = '$mes' AND YEAR(v.fecha1) = '$año' GROUP BY v.inf");
    echo $array = json_encode($registro->fetch_all());
    
}

#GRAFICA6
if (isset($_POST['g6'])) {
    $fechaentero = strtotime($_POST['fecha']);
    $mes = date("m", $fechaentero);
    $año = date("Y", $fechaentero);
    #    $registro = $conexion->query("SELECT v.1_modelo AS modelo, COUNT(*) as registros FROM m7_ventas AS v WHERE MONTH(v.fecha_1) = '$mes'  AND YEAR(v.fecha_1) = '$año' AND v.estatus = 'RECHAZADA' GROUP BY modelo HAVING COUNT(*)>0");
    $registro = $conexion->query("SELECT v.modelo as modelos, COUNT(*) as registros FROM m7_ventas_productos as v WHERE MONTH(v.fecha1) = '$mes'  AND YEAR(v.fecha1) = '$año' AND v.estatus = 'RECHAZADA' GROUP BY modelos HAVING COUNT(*)>0");

    echo $array = json_encode($registro->fetch_all());
   
}

#GRAFICA5
if (isset($_POST['g5'])) {
    $fechaentero = strtotime($_POST['fecha']);
    $mes = date("m", $fechaentero);
    $año = date("Y", $fechaentero);
    $registro = $conexion->query("SELECT v.modelo as modelos, COUNT(*) as registros FROM m7_ventas_productos as v WHERE MONTH(v.fecha1) = '$mes'  AND YEAR(v.fecha1) = '$año' AND (v.estatus = 'ENTREGADO' OR v.estatus = 'ACEPTADA' ) GROUP BY modelos HAVING COUNT(*)>0");
    echo $array = json_encode($registro->fetch_all());
}


#GRAFICA4
if (isset($_POST['g4'])) {
    $fechaentero = strtotime($_POST['fecha']);
    $mes = date("m", $fechaentero);
    $año = date("Y", $fechaentero);
    $registro = $conexion->query("SELECT v.modelo as modelos, COUNT(*) as registros FROM m7_ventas_productos as v WHERE MONTH(v.fecha1) = '$mes'  AND YEAR(v.fecha1) = '$año' GROUP BY modelos HAVING COUNT(*)>0");
    echo $array = json_encode($registro->fetch_all());
}




#GRAFICA3
if (isset($_POST['g3'])) {
    $fechaentero = strtotime($_POST['fecha']);
    $mes = date("m", $fechaentero);
    $año = date("Y", $fechaentero);
    $registro = $conexion->query("SELECT v.fecha1 AS fecha,  COUNT(DISTINCT folio) AS mes FROM m7_ventas_productos as v WHERE MONTH(v.fecha1) = '$mes'  AND YEAR(v.fecha1) = '$año'  AND v.estatus = 'RECHAZADA' GROUP BY fecha HAVING COUNT(*)>0");
    echo $array = json_encode($registro->fetch_all());
}


#GRAFICA2
if (isset($_POST['g2'])) {
    $fechaentero = strtotime($_POST['fecha']);
    $mes = date("m", $fechaentero);
    $año = date("Y", $fechaentero);
    $registro = $conexion->query("SELECT v.fecha1 AS fecha,  COUNT(DISTINCT folio) AS mes FROM m7_ventas_productos as v WHERE MONTH(v.fecha1) = '$mes'  AND YEAR(v.fecha1) = '$año'  AND  (v.estatus = 'ENTREGADO' OR v.estatus = 'ACEPTADA') GROUP BY fecha HAVING COUNT(*)>0");

    echo $array = json_encode($registro->fetch_all());
}

#GRAFICA1
if (isset($_POST['g1plus'])) {

    $fechaentero = strtotime($_POST['fecha']);
    $mes = date("m", $fechaentero);
    $año = date("Y", $fechaentero);
    //SELECT v.fecha_1 AS fecha, COUNT(*) as registros FROM m7_ventas AS v GROUP BY fecha HAVING COUNT(*)>0;
    $registro = $conexion->query("SELECT v.fecha1 AS fecha,  COUNT(DISTINCT folio) AS mes FROM m7_ventas_productos as v WHERE MONTH(v.fecha1) = '$mes'  AND YEAR(v.fecha1) = '$año' GROUP BY fecha HAVING COUNT(*)>0");
    echo $array = json_encode($registro->fetch_all());
}


#PORCENTAJES
if (isset($_POST['d1plus'])) {

    $fechaentero = strtotime($_POST['fecha']);
    $mes = date("m", $fechaentero);
    $año = date("Y", $fechaentero);

    $total = $conexion->query("SELECT COUNT(DISTINCT folio) AS mes from m7_ventas_productos AS t WHERE MONTH(t.fecha1) = '$mes'  AND YEAR(t.fecha1) = '$año'");
    $totalarray = mysqli_fetch_array($total);
    if ($totalarray['mes'] == 0) {
        $resultadototal = 0;
    } else {
        $resultadototal = (100 / $totalarray['mes']) * $totalarray['mes'];
    }

    $aprobadas = $conexion->query("SELECT COUNT(DISTINCT folio) AS mes from m7_ventas_productos AS t WHERE MONTH(t.fecha1) = '$mes'  AND YEAR(t.fecha1) = '$año' AND (estatus = 'ENTREGADO' OR estatus = 'ACEPTADA') ");
    $aprobadasarray = mysqli_fetch_array($aprobadas);
    if ($aprobadasarray['mes'] == 0) {
        $resultadoaprobadas = 0;
    } else {
        $resultadoaprobadas = (100 / $totalarray['mes']) * $aprobadasarray['mes'];
    }

    $rechazadas = $conexion->query("SELECT COUNT(DISTINCT folio) AS mes from m7_ventas_productos AS t WHERE MONTH(t.fecha1) = '$mes'  AND YEAR(t.fecha1) = '$año' AND estatus = 'RECHAZADA'");
    $rechazadasarray = mysqli_fetch_array($rechazadas);
    if ($rechazadasarray['mes'] == 0) {
        $resultadorechazadas = 0;
    } else {
        $resultadorechazadas = (100 / $totalarray['mes']) * $rechazadasarray['mes'];
    }
    echo json_encode(['Total' => $totalarray['mes'], 'Portotal' => $resultadototal, 'Aprobadas' =>  $aprobadasarray['mes'], 'PorApro' => round($resultadoaprobadas, 2), 'Rechazadas' => $rechazadasarray['mes'], 'PorRecha' => round($resultadorechazadas, 2)]);
}
