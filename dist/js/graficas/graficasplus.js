function grafica7plus(fecha, g7) {
    $.ajax({
        url: 'php/m8/consultasplus.php',
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

            Highcharts.chart('grafica7plus', {
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

function grafica6plus(fecha, g6) {
    $.ajax({
        url: 'php/m8/consultasplus.php',
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

            const chart = Highcharts.chart('grafica6plus', {
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

            document.getElementById('plain2plus').addEventListener('click', () => {
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

            document.getElementById('inverted2plus').addEventListener('click', () => {
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

function grafica5plus(fecha, g5) {
    $.ajax({
        url: 'php/m8/consultasplus.php',
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

            const chart = Highcharts.chart('grafica5plus', {
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

            document.getElementById('plain1plus').addEventListener('click', () => {
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

            document.getElementById('inverted1plus').addEventListener('click', () => {
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

function grafica4plus(fecha, g4) {
    $.ajax({
        url: 'php/m8/consultasplus.php',
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

            const chart = Highcharts.chart('grafica4plus', {
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

            document.getElementById('plainplus').addEventListener('click', () => {
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

            document.getElementById('invertedplus').addEventListener('click', () => {
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

function grafica3plus(fecha, g3) {
    $.ajax({
        url: 'php/m8/consultasplus.php',
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
            Highcharts.chart('grafica3plus', {
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
                        text: 'Número de ventas Rechazadas'
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
                    name: 'Ventas Rechazadas',
                    data: cantidad
                }, ]
            });
        }
    })

}


function grafica2plus(fecha, g2) {
    $.ajax({
        url: 'php/m8/consultasplus.php',
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
            Highcharts.chart('grafica2plus', {
                chart: {
                    type: 'line'
                },
                title: {
                    text: 'Total de ventas del mes Aprobadas:'
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
                        text: 'Número de ventas Aprobadas'
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
                    name: 'Ventas Aprobadas',
                    data: cantidad
                }, ]
            });
        }
    })

}

function grafica1plus(fecha, g1plus) {
    $.ajax({
        url: 'php/m8/consultasplus.php',
        method: 'POST',
        async: true,
        data: {
            fecha: fecha,
            g1plus: g1plus,
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
            Highcharts.chart('grafica1plus', {
                chart: {
                    type: 'line'
                },
                title: {
                    text: 'Total de Ventas del mes:'
                },
                colors: [
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
                        text: 'Número de ventas realizadas'
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
                    name: 'Ventas',
                    data: cantidad
                }, ]
            });
        }
    })
}


function porcentajesplus(fecha, d1plus) {
    $.ajax({
        url: 'php/m8/consultasplus.php',
        method: 'POST',
        data: {
            fecha: fecha,
            d1plus: d1plus,
        },
        dataType: "json",
        success: function (r) {
            $('#dato1plus').html(r.Total);
            $('#dato1porcentajeplus').html(r.Portotal + '%')
            $('#dato2plus').html(r.Aprobadas);
            $('#dato2porcentajeplus').html(r.PorApro + '%')
            $('#dato3plus').html(r.Rechazadas);
            $('#dato3porcentajeplus').html(r.PorRecha + '%')
        }
    })
}