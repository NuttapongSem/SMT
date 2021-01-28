<!DOCTYPE html>
<html lang="en">

<head>


    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.css" rel="stylesheet" id="bootstrap-css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.bundle.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <meta name="description" content="Simple CMS" />
    <meta name="author" content="Sheikh Heera" />
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <style>
        body {
            margin: 3rem auto;
        }
    </style>

</head>

<body>
    <div class="container">
        <canvas id="myChart" width="100" height="40"></canvas>
    </div>
    <script>
        $(document).ready(function() {
            let status = JSON.parse('<?php echo json_encode($data); ?>');
            var yLabels = status['name'];
            console.log(status);
            var canvas = document.getElementById('myChart');
            var config = {
                "options": {
                    "scales": {
                        "xAxes": [{
                            "type": 'time',
                            "time": {
                                "unit": 'minute',
                                "unitStepSize": 60,

                            },
                            "distribution": 'linear',
                            "bounds": 'ticks',
                            "ticks": {
                                "source": 'auto',
                                "autoSkip": true,
                                "stepSize": 1
                            },
                        }],
                        "yAxes": [{
                            "display": true,
                            "ticks": {
                                callback: function(value, index, values) {
                                    return yLabels[value];
                                },
                                "stepSize": 1,
                                "min": 1
                            }
                        }]
                    },
                },
                "data": {
                    "labels": [],
                    "datasets": [{
                        "label": "line",
                        "type": "line",
                        "backgroundColor": "#00b",
                        "borderColor": "#00b",
                        "borderWidth": 1,
                        "fill": false,
                        "data": status['data']
                    }, ]
                },

            };
            var myBarChart = Chart.Line(canvas, config);
        })
    </script>
</body>

</html>