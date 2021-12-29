<?php
require_once 'session.php';
$exTitle = "Details";

if (!array_key_exists("login", $_SESSION)) {
    header("location: logout.php");
    exit();
}
$detail = array();
$details = $core->getDetails($detail);

$desczz = $core->getDesc($detail);
$clients = $core->getClients($detail);
$matrials = $core->getMatrials($detail);
$shifts = $core->getShifts($detail);
?>

<html>

<head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load('current', {
            'packages': ['bar']
        });
        google.charts.setOnLoadCallback(drawStuff);

        function drawStuff() {
            
            var data = new google.visualization.arrayToDataTable([

                ['الاسم', 'الكمية م3'],

                <?php

                 echo "['المرفوضه','".$details['الكميه_المرفوضة_م3']."'],"
                ?>

                ["King's pawn (e4)", 44],
                ["Queen's pawn (d4)", 31],
                ["Knight to King 3 (Nf3)", 12],
                ["Queen's bishop pawn (c4)", 10],
                ['Other', 3]
            ]);

            var options = {
                // title: 'Chess opening moves',
                width: 900,
                legend: {
                    position: 'none'
                },
                chart: {
                    // title: 'Chess opening moves',
                    // subtitle: 'popularity by percentage'
                },
                bars: 'horizontal', // Required for Material Bar Charts.
                axes: {
                    x: {
                        0: {
                            side: 'top',
                            label: 'الكمية'
                        } // Top x-axis.
                    }
                },
                bar: {
                    groupWidth: "90%"
                }
            };

            var chart = new google.charts.Bar(document.getElementById('top_x_div'));
            chart.draw(data, options);
        };
    </script>
</head>

<body>
    <div id="top_x_div" style="width: 600px; height: 300px;"></div>
</body>

</html>