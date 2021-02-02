<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
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

        html,
        body {
            margin: 0;
            padding: 0;
            border: 0;
            font-size: 100%;
            font: inherit;
            vertical-align: baseline;
        }
    </style>

</head>

<body>
    <style>
        body {
            background-color: lightgray;
        }
    </style>




    <h2 class="card-header" style="background-color: #F3C35D;text-align : center">Dashboard</h2><br>
    <div class="container" style="background-color:#FDFDFD;">
        <div class="table-responsive-xl"><br>

            <div style="text-align: center;justify-content: center;display:flex;align-items: center;">

                <h4>Date::</h4><input id="date" type="date" name="date_start" data-open="picker2" class="form-control date-time picker-opener" style="width: 200px; height: 50px; ">

            </div><br>

            <div id="datenow">

            </div>



            <div class="row">
                <canvas id="myChart" width="100" height="40"></canvas>

            </div>
            <script>
                $(document).ready(function() {

                    let status = JSON.parse('<?php echo json_encode($data); ?>');
                    var yLabels = status['name'];
                    let text = document.getElementById('datenow');
                    text.innerHTML = 'วันที่ : ' + status['datenow'];
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
            </script><br>
        </div><br>

        <div style="text-align: center;justify-content: center;display:flex;align-items: center;">
            <a href="checkin">
                <button type="checkin" class="btn btn-primary" style="width:150px;height:50px">
                    <i class="bi bi-arrow-left-circle"></i>
                </button>
            </a>
        </div>
        <br>

</body>
<script type=text/javascript>
    function chart(data) {

        let status = data;
        var yLabels = status['name'];
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
    }
    $(document).ready(function() {
        $("#date").change(function() {

            $.ajax({ //create an ajax request to display.php
                type: "GET",
                url: "{{url('/getdate')}}",
                data: {
                    data: $(this).val()
                },
                success: function(data) {
                    // console.log(data.data);
                    chart(data.data);
                    let text = document.getElementById('datenow');
                    text.innerHTML = 'วันที่ : ' + data.data.datenow;
                }
            });
        });
    });
</script>

</html>