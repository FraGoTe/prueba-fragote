<?php
require_once("./api.php");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Grafico de pobreza en el peru</title>
    <link rel="stylesheet" href="./estilos.css">
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/data.js"></script>
    <script src="https://code.highcharts.com/modules/series-label.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/export-data.js"></script>
    <script src="https://code.highcharts.com/modules/accessibility.js"></script>
  
</head>

<body>
    <figure class="highcharts-figure">
        <div id="container"></div>
        <p style="text-align: center; margin: 20px">La tendencia en el grafico con respecto al indice de pobreza del Perú es de <?php echo $trend_data?></b>
    </figure>
    <script>

        const data = <?php echo json_encode($array_headcount) ?>;
   

   
        
        Highcharts.chart('container', {

            title: {
                text: 'Gráfico histórico del índice pobreza en el Perú',
                align: 'center',
                margin: 20
            },

            subtitle: {
                text: 'Acontinuacion las muestra del grafico',
                align: 'left'
            },

            yAxis: {
                title: {
                    text: 'Nivel % de pobreza'
                }
            },

            xAxis: {
                accessibility: {
                    rangeDescription: 'Range: 2010 to 2020'
                },
                //categories: ['2022', '2023'],
            },

            legend: {
                layout: 'vertical',
                align: 'right',
                verticalAlign: 'middle'
            },

            plotOptions: {
                series: {
                    label: {
                        connectorAllowed: false
                    },
                    pointStart: 1997
                }
            },

            series: [{
                    name: 'Indice pobreza en el Perú',
                    data: data,
                    color: '#204377'
                }
            ],

            responsive: {
                rules: [{
                    condition: {
                        maxWidth: 800
                    },
                    chartOptions: {
                        legend: {
                            layout: 'horizontal',
                            align: 'center',
                            verticalAlign: 'top'
                        }
                    }
                }]
            }

        });
    </script>
</body>

</html>
