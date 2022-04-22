

function grafica7(fecha, g7) {
    $.ajax({
        url: 'php/m8/consultas.php',
        method: 'POST',
        async: true,
        data: {
            fecha: fecha,
            g7: g7,
        },
        dataType: "json",
        success: function(data) {
            //CANTIDAD
            can = data.length;
            //ARRAY FECHA
            motivo = []
            for (i = 0; i < can; i++) {
                motivo.push(data[i][0])
            }
            //ARRAY CANTIDAD
            cantidad = []

            for (i = 0; i < can; i++) {
                cantidad.push(Number(data[i][1]))
            }

            Highcharts.chart('grafica7', {
                chart: {
                    type: 'column'
                },
                title: {
                    text: 'Motivos del rechazo'
                },
                colors:[
                    '#861480'
                ],
                xAxis: {
                    categories: motivo,
                    crosshair: true
                },
                yAxis: {
                    min: 0,
                    title: {
                        text: 'Cantidad'
                    }
                },
                tooltip: {
                   
                    shared: true,
                    useHTML: true
                },
                plotOptions: {
                    column: {
                        pointPadding: 0.2,
                        borderWidth: 0
                    }
                },
                series: [{
                    name: 'Rechazo',
                    data: cantidad

                }]
            });
        }
    })


}


function grafica6(fecha, g6) {
    $.ajax({
        url: 'php/m8/consultas.php',
        method: 'POST',
        async: true,
        data: {
            fecha: fecha,
            g6: g6,
        },
        dataType: "json",
        success: function (data) {
            //console.log(data)
            //CANTIDAD
            can = data.length;
            //ARRAY MODELO
            modelo = []
            for (i = 0; i < can; i++) {
                modelo.push(data[i][0])
            }
            //ARRAY CANTIDAD
            cantidad = []

            for (i = 0; i < can; i++) {
                cantidad.push(Number(data[i][1]))
            }

            const chart = Highcharts.chart('grafica6', {
                title: {
                    text: 'Modelos Rechazados'
                },
                subtitle: {
                    text: 'Plain'
                },
                colors:[
                    '#C82300'
                ],
                xAxis: {
                    categories: modelo
                },
                series: [{
                    type: 'column',
                    colorByPoint: true,
                    data: cantidad,
                    showInLegend: false
                }]
            });

            document.getElementById('plain2').addEventListener('click', () => {
                chart.update({
                    chart: {
                        inverted: false,
                        polar: false
                    },
                    subtitle: {
                        text: 'Plain'
                    }
                });
            });

            document.getElementById('inverted2').addEventListener('click', () => {
                chart.update({
                    chart: {
                        inverted: true,
                        polar: false
                    },
                    subtitle: {
                        text: 'Inverted'
                    }
                });
            });
        }
    })

}

function grafica5(fecha, g5) {
    $.ajax({
        url: 'php/m8/consultas.php',
        method: 'POST',
        async: true,
        data: {
            fecha: fecha,
            g5: g5,
        },
        dataType: "json",
        success: function (data) {
            //console.log(data)
            //CANTIDAD
            can = data.length;
            //ARRAY MODELO
            modelo = []
            for (i = 0; i < can; i++) {
                modelo.push(data[i][0])
            }
            //ARRAY CANTIDAD
            cantidad = []

            for (i = 0; i < can; i++) {
                cantidad.push(Number(data[i][1]))
            }

            const chart = Highcharts.chart('grafica5', {
                title: {
                    text: 'Modelos Vendidos'
                },
                subtitle: {
                    text: 'Plain'
                },
                colors:[
                    '#3AE500'
                ],
                xAxis: {
                    categories: modelo
                },
                series: [{
                    type: 'column',
                    colorByPoint: true,
                    data: cantidad,
                    showInLegend: false
                }]
            });

            document.getElementById('plain1').addEventListener('click', () => {
                chart.update({
                    chart: {
                        inverted: false,
                        polar: false
                    },
                    subtitle: {
                        text: 'Plain'
                    }
                });
            });

            document.getElementById('inverted1').addEventListener('click', () => {
                chart.update({
                    chart: {
                        inverted: true,
                        polar: false
                    },
                    subtitle: {
                        text: 'Inverted'
                    }
                });
            });
        }
    })
}

function grafica4(fecha, g4) {
    $.ajax({
        url: 'php/m8/consultas.php',
        method: 'POST',
        async: true,
        data: {
            fecha: fecha,
            g4: g4,
        },
        dataType: "json",
        success: function (data) {
            //console.log(data)
            //CANTIDAD
            can = data.length;
            //ARRAY MODELO
            modelo = []
            for (i = 0; i < can; i++) {
                modelo.push(data[i][0])
            }
            //ARRAY CANTIDAD
            cantidad = []

            for (i = 0; i < can; i++) {
                cantidad.push(Number(data[i][1]))
            }

            const chart = Highcharts.chart('grafica4', {
                title: {
                    text: 'Modelos cotizados'
                },
                subtitle: {
                    text: 'Plain'
                },
                colors:[
                    '#00D6E5'
                ],
                xAxis: {
                    categories: modelo
                },
                series: [{
                    type: 'column',
                    colorByPoint: true,
                    data: cantidad,
                    showInLegend: false
                }]
            });

            document.getElementById('plain').addEventListener('click', () => {
                chart.update({
                    chart: {
                        inverted: false,
                        polar: false
                    },
                    subtitle: {
                        text: 'Plain'
                    }
                });
            });

            document.getElementById('inverted').addEventListener('click', () => {
                chart.update({
                    chart: {
                        inverted: true,
                        polar: false
                    },
                    subtitle: {
                        text: 'Inverted'
                    }
                });
            });
        }
    })

}

function grafica3(fecha, g3) {
    $.ajax({
        url: 'php/m8/consultas.php',
        method: 'POST',
        async: true,
        data: {
            fecha: fecha,
            g3: g3,
        },
        dataType: "json",
        success: function (data) {

            //CANTIDAD
            can = data.length;
            //ARRAY FECHA
            fecha = []
            for (i = 0; i < can; i++) {
                fecha.push(data[i][0])
            }
            //ARRAY CANTIDAD
            cantidad = []

            for (i = 0; i < can; i++) {
                cantidad.push(Number(data[i][1]))
            }

            //GRAFiCA
            Highcharts.chart('grafica3', {
                chart: {
                    type: 'line'
                },
                title: {
                    text: 'Total de Cotizaciones del mes Rechazadas:'
                },
                colors:[
                    '#C82300'
                ],
                subtitle: {
                    text: ''
                },
                xAxis: {
                    categories: fecha
                },
                yAxis: {
                    title: {
                        text: 'Número de solicitudes'
                    }
                },
                plotOptions: {
                    line: {
                        dataLabels: {
                            enabled: true
                        },
                        enableMouseTracking: false
                    }
                },
                series: [{
                    name: 'Cotizaciones Rechazadas',
                    data: cantidad
                }, ]
            });
        }
    })

}

function grafica2(fecha, g2) {
    $.ajax({
        url: 'php/m8/consultas.php',
        method: 'POST',
        async: true,
        data: {
            fecha: fecha,
            g2: g2,
        },
        dataType: "json",
        success: function (data) {
            //CANTIDAD
            can = data.length;
            //ARRAY FECHA
            fecha = []
            for (i = 0; i < can; i++) {
                fecha.push(data[i][0])
            }
            //ARRAY CANTIDAD
            cantidad = []

            for (i = 0; i < can; i++) {
                cantidad.push(Number(data[i][1]))
            }

            //GRAFiCA
            Highcharts.chart('grafica2', {
                chart: {
                    type: 'line'
                },
                title: {
                    text: 'Total de Cotizaciones del mes Aprobadas:'
                },
                colors:[
                    '#3AE500'
                ],
                subtitle: {
                    text: ''
                },
                xAxis: {
                    categories: fecha
                },
                yAxis: {
                    title: {
                        text: 'Número de solicitudes'
                    }
                },
                plotOptions: {
                    line: {
                        dataLabels: {
                            enabled: true
                        },
                        enableMouseTracking: false
                    }
                },
                series: [{
                    name: 'Cotizaciones Aprobadas',
                    data: cantidad
                }, ]
            });
        }
    })

}

function grafica1(fecha, g1) {
    $.ajax({
        url: 'php/m8/consultas.php',
        method: 'POST',
        async: true,
        data: {
            fecha: fecha,
            g1: g1,
        },
        dataType: "json",
        success: function (data) {

            //CANTIDAD
            can = data.length;
            //ARRAY FECHA
            fecha = []
            for (i = 0; i < can; i++) {
                fecha.push(data[i][0])
            }
            //ARRAY CANTIDAD
            cantidad = []

            for (i = 0; i < can; i++) {
                cantidad.push(Number(data[i][1]))
            }

            //GRAFiCA
            Highcharts.chart('grafica1', {
                chart: {
                    type: 'line'
                },
                title: {
                    text: 'Total de Cotizaciones del mes:'
                },
                colors:[
                    '#00D6E5'
                ],
                subtitle: {
                    text: ''
                },
                xAxis: {
                    categories: fecha
                },
                yAxis: {
                    title: {
                        text: 'Número de solicitudes'
                    }
                },
                plotOptions: {
                    line: {
                        dataLabels: {
                            enabled: true
                        },
                        enableMouseTracking: false
                    }
                },
                series: [{
                    name: 'Cotizaciones realizadas',
                    data: cantidad
                }, ]
            });
        }
    })
}


function porcentajes(fecha, d1) {
    $.ajax({
        url: 'php/m8/consultas.php',
        method: 'POST',
        data: {
            fecha: fecha,
            d1: d1,
        },
        dataType: "json",
        success: function (r) {
            //console.log(r)
            $('#dato1').html(r.Total);
            $('#dato1porcentaje').html(r.Portotal + '%')
            $('#dato2').html(r.Aprobadas);
            $('#dato2porcentaje').html(r.PorApro + '%')
            $('#dato3').html(r.Rechazadas);
            $('#dato3porcentaje').html(r.PorRecha + '%')
        }
    })
}