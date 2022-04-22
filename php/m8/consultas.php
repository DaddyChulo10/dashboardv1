<?php
include_once('../conexion/conexion.php');
session_start();
date_default_timezone_set('America/Mexico_City');

/*-----COTIZACIONES-----*/

#GRAFICA7
if (isset($_POST['g7'])) {
    //SELECT v.1_modelo AS modelo, COUNT(*) as registros FROM m7_ventas AS v WHERE MONTH(v.fecha_1) = '04'  AND YEAR(v.fecha_1) = '2022' GROUP BY modelo HAVING COUNT(*)>0
    $fechaentero = strtotime($_POST['fecha']);
    $mes = date("m", $fechaentero);
    $año = date("Y", $fechaentero);
    $registro = $conexion->query("SELECT v.inf AS rechazo, COUNT(*) as registros FROM m7_ventas AS v WHERE MONTH(v.fecha_1) = '$mes'  AND YEAR(v.fecha_1) = '$año' AND v.estatus = 'RECHAZADA' GROUP BY rechazo HAVING COUNT(*)>00");
    echo $array = json_encode($registro->fetch_all());
    
}

#GRAFICA6
if (isset($_POST['g6'])) {
    //SELECT v.1_modelo AS modelo, COUNT(*) as registros FROM m7_ventas AS v WHERE MONTH(v.fecha_1) = '04'  AND YEAR(v.fecha_1) = '2022' GROUP BY modelo HAVING COUNT(*)>0
    $fechaentero = strtotime($_POST['fecha']);
    $mes = date("m", $fechaentero);
    $año = date("Y", $fechaentero);
    $registro = $conexion->query("SELECT v.1_modelo AS modelo, COUNT(*) as registros FROM m7_ventas AS v WHERE MONTH(v.fecha_1) = '$mes'  AND YEAR(v.fecha_1) = '$año' AND v.estatus = 'RECHAZADA' GROUP BY modelo HAVING COUNT(*)>0");
    echo $array = json_encode($registro->fetch_all());
    
}

#GRAFICA5
if (isset($_POST['g5'])) {
    //SELECT v.1_modelo AS modelo, COUNT(*) as registros FROM m7_ventas AS v WHERE MONTH(v.fecha_1) = '04'  AND YEAR(v.fecha_1) = '2022' GROUP BY modelo HAVING COUNT(*)>0
    $fechaentero = strtotime($_POST['fecha']);
    $mes = date("m", $fechaentero);
    $año = date("Y", $fechaentero);
    $registro = $conexion->query("SELECT v.1_modelo AS modelo, COUNT(*) as registros FROM m7_ventas AS v WHERE MONTH(v.fecha_1) = '$mes'  AND YEAR(v.fecha_1) = '$año' AND (v.estatus = 'ENTREGADO' OR v.estatus = 'ACEPTADA' ) GROUP BY modelo HAVING COUNT(*)>0");
    echo $array = json_encode($registro->fetch_all());
    
}

#GRAFICA4
if (isset($_POST['g4'])) {
    //SELECT v.1_modelo AS modelo, COUNT(*) as registros FROM m7_ventas AS v WHERE MONTH(v.fecha_1) = '04'  AND YEAR(v.fecha_1) = '2022' GROUP BY modelo HAVING COUNT(*)>0
    $fechaentero = strtotime($_POST['fecha']);
    $mes = date("m", $fechaentero);
    $año = date("Y", $fechaentero);
    $registro = $conexion->query("SELECT v.1_modelo AS modelo, COUNT(*) as registros FROM m7_ventas AS v WHERE MONTH(v.fecha_1) = '$mes'  AND YEAR(v.fecha_1) = '$año' GROUP BY modelo HAVING COUNT(*)>0");
    echo $array = json_encode($registro->fetch_all());
    
}

#GRAFICA3
if (isset($_POST['g3'])) {
    $fechaentero = strtotime($_POST['fecha']);
    $mes = date("m", $fechaentero);
    $año = date("Y", $fechaentero);
    //SELECT v.fecha_1 AS fecha, COUNT(*) as registros FROM m7_ventas AS v GROUP BY fecha HAVING COUNT(*)>0;
    $registro = $conexion->query("SELECT v.fecha_1 AS fecha, COUNT(*) as registros FROM m7_ventas AS v WHERE MONTH(v.fecha_1) = '$mes'  AND YEAR(v.fecha_1) = '$año' AND estatus = 'RECHAZADA' GROUP BY fecha HAVING COUNT(*)>0");
    echo $array = json_encode($registro->fetch_all());
}


#GRAFICA2
if (isset($_POST['g2'])) {

    $fechaentero = strtotime($_POST['fecha']);
    $mes = date("m", $fechaentero);
    $año = date("Y", $fechaentero);
    //SELECT v.fecha_1 AS fecha, COUNT(*) as registros FROM m7_ventas AS v GROUP BY fecha HAVING COUNT(*)>0;
    $registro = $conexion->query("SELECT v.fecha_1 AS fecha, COUNT(*) as registros FROM m7_ventas AS v WHERE MONTH(v.fecha_1) = '$mes' AND YEAR(v.fecha_1) = '$año' AND  (v.estatus = 'ENTREGADO' OR v.estatus = 'ACEPTADA')  GROUP BY fecha HAVING COUNT(*)>0;");
    echo $array = json_encode($registro->fetch_all());
}


#GRAFICA1
if (isset($_POST['g1'])) {
    $fechaentero = strtotime($_POST['fecha']);
    $mes = date("m", $fechaentero);
    $año = date("Y", $fechaentero);
    //SELECT v.fecha_1 AS fecha, COUNT(*) as registros FROM m7_ventas AS v GROUP BY fecha HAVING COUNT(*)>0;
    $registro = $conexion->query("SELECT v.fecha_1 AS fecha, COUNT(*) as registros FROM m7_ventas AS v WHERE MONTH(v.fecha_1) = '$mes'  AND YEAR(v.fecha_1) = '$año' GROUP BY fecha HAVING COUNT(*)>0");
    echo $array = json_encode($registro->fetch_all());
}




#PORCENTAJES
if (isset($_POST['d1'])) {
    $fechaentero = strtotime($_POST['fecha']);
    $mes = date("m", $fechaentero);
    $año = date("Y", $fechaentero);

    $total = $conexion->query("SELECT COUNT(MONTH(t.fecha_1)) AS mes FROM m7_ventas AS t WHERE MONTH(t.fecha_1) = '$mes'  AND YEAR(t.fecha_1) = '$año' ");
    $totalarray = mysqli_fetch_array($total);
    if ($totalarray['mes'] == 0) {
        $resultadototal = 0;
    } else {
        $resultadototal = (100 / $totalarray['mes']) * $totalarray['mes'];
    }

    $aprobadas = $conexion->query("SELECT COUNT(MONTH(t.fecha_1)) AS mes FROM m7_ventas AS t WHERE MONTH(t.fecha_1) = '$mes' AND YEAR(t.fecha_1) = '$año' AND (estatus = 'ENTREGADO' OR estatus = 'ACEPTADA')  ");
    $aprobadasarray = mysqli_fetch_array($aprobadas);
    if ($aprobadasarray['mes'] == 0) {
        $resultadoaprobadas = 0;
    } else {
        $resultadoaprobadas = (100 / $totalarray['mes']) * $aprobadasarray['mes'];
    }

    $rechazadas = $conexion->query("SELECT COUNT(MONTH(t.fecha_1)) AS mes FROM m7_ventas AS t WHERE MONTH(t.fecha_1) = '$mes' AND estatus = 'RECHAZADA'  AND YEAR(t.fecha_1) = '$año'");
    $rechazadasarray = mysqli_fetch_array($rechazadas);
    if ($rechazadasarray['mes'] == 0) {
        $resultadorechazadas = 0;
    } else {
        $resultadorechazadas = (100 / $totalarray['mes']) * $rechazadasarray['mes'];
    }
    echo json_encode(['Total' => $totalarray['mes'], 'Portotal' => $resultadototal, 'Aprobadas' =>  $aprobadasarray['mes'], 'PorApro' => round($resultadoaprobadas, 2), 'Rechazadas' => $rechazadasarray['mes'], 'PorRecha' => round($resultadorechazadas, 2)]);
    /*
    if ($_POST['fecha'] == '') {
        $total = $conexion->query("SELECT COUNT(*) AS contar FROM m7_ventas");
        $totalarray = mysqli_fetch_array($total);
        $resultadototal = (100 / $totalarray['contar']) * $totalarray['contar'];

        $aprobadas = $conexion->query("SELECT COUNT(*) AS contar FROM m7_ventas WHERE estatus = 'ENTREGADO'");
        $aprobadasarray = mysqli_fetch_array($aprobadas);
        $resultadoaprobadas = (100 / $totalarray['contar']) * $aprobadasarray['contar'];

        $rechazadas = $conexion->query("SELECT COUNT(*) AS contar FROM m7_ventas WHERE estatus = 'RECHAZADA'");
        $rechazadasarray = mysqli_fetch_array($rechazadas);
        $resultadorechazadas = (100 / $totalarray['contar']) * $rechazadasarray['contar'];


        echo json_encode(['Total' => $totalarray['contar'], 'Portotal' => $resultadototal, 'Aprobadas' => $aprobadasarray['contar'], 'PorApro' => round($resultadoaprobadas, 2), 'Rechazadas' => $rechazadasarray['contar'], 'PorRecha' => round($resultadorechazadas, 2)]);
    } else {
        $fechaentero = strtotime($_POST['fecha']);
        $mes = date("m", $fechaentero);

        $total = $conexion->query("SELECT COUNT(MONTH(t.fecha_1)) AS mes FROM m7_ventas AS t WHERE MONTH(t.fecha_1) = '$mes' ");
        $totalarray = mysqli_fetch_array($total);
        if ($totalarray['mes'] == 0) {
            $resultadototal = 0;
        } else {
            $resultadototal = (100 / $totalarray['mes']) * $totalarray['mes'];
        }

        $aprobadas = $conexion->query("SELECT COUNT(MONTH(t.fecha_1)) AS mes FROM m7_ventas AS t WHERE MONTH(t.fecha_1) = '$mes' AND estatus = 'ENTREGADO'");
        $aprobadasarray = mysqli_fetch_array($aprobadas);
        if ($aprobadasarray['mes'] == 0) {
            $resultadoaprobadas = 0;
        } else {
            $resultadoaprobadas = (100 / $totalarray['mes']) * $aprobadasarray['mes'];
        }

        $rechazadas = $conexion->query("SELECT COUNT(MONTH(t.fecha_1)) AS mes FROM m7_ventas AS t WHERE MONTH(t.fecha_1) = '$mes' AND estatus = 'RECHAZADA'");
        $rechazadasarray = mysqli_fetch_array($rechazadas);
        if ($rechazadasarray['mes'] == 0) {
            $resultadorechazadas = 0;
        } else {
            $resultadorechazadas = (100 / $totalarray['mes']) * $rechazadasarray['mes'];
        }
        echo json_encode(['Total' => $totalarray['mes'], 'Portotal' => $resultadototal, 'Aprobadas' =>  $aprobadasarray['mes'], 'PorApro' => round($resultadoaprobadas, 2), 'Rechazadas' => $rechazadasarray['mes'], 'PorRecha' => round($resultadorechazadas, 2)]);
    }*/
}
