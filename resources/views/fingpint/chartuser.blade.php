<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <meta name="description" content="Simple CMS" />
    <meta name="author" content="Sheikh Heera" />
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.css" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

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
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.bundle.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

<body>
    <style>
        body {
            background-color: lightgray;
        }
    </style>
    <script>
        $(function() {
            $(".datepicker").datepicker();
        });
    </script>



    <h2 class="card-header" style="background-color: #F3C35D;text-align : center">Dashboard</h2><br>

    <div class="container" style="background-color:#FDFDFD;">
        <div class="table-responsive-xl"><br>

            <div style="text-align: center;justify-content: center;display:flex;align-items: center;">
                <h4>Date ::&#160</h4>
                <input id="date" name="date_start" readonly="readonly" data-open="picker2" class="datepicker  date-time picker-opener" style="width: 200px; height: 50px; ">
            </div><br>

            <!-- <button type="button" class="btn btn-dark">Dark</button> -->

            <div class="row">

                <div id="datenow"></div>
                <div class="col-12">
                    <canvas id="myChart" width="100" height="40"></canvas>
                    <script>
                        $(document).ready(function() {

                            let status = JSON.parse('<?php echo json_encode($data); ?>');
                            var yLabels = status['name'];
                            let text = document.getElementById('datenow');
                            text.innerHTML = 'วันที่ : ' + "" + status['datenow'];
                            var canvas = document.getElementById('myChart');
                            console.log(status);
                            var config = {
                                "options": {
                                    "scales": {
                                        "xAxes": [{
                                            "type": 'time',
                                            "time": {
                                                "unit": 'hour',
                                                "displayFormats": {
                                                    "hour": "HH:mm"
                                                },
                                                "unitStepSize": 0.5,

                                            },
                                            "distribution": 'linear',
                                            "bounds": 'ticks',
                                            "ticks": {
                                                "source": 'auto',
                                                "autoSkip": true,
                                                "stepSize": 1,

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
                                        "label": "List_user ",
                                        "type": "line",
                                        "backgroundColor": "#0421FF ",
                                        "borderColor": "#0421FF ",
                                        "borderWidth": 1,
                                        "fill": false,
                                        "data": status['data']
                                    }, ]
                                },

                            };
                            var myBarChart = Chart.Line(canvas, config);
                        })
                    </script>
                </div>
            </div><br><br>
            <div class="row">
                <div class="col-6">

                    <div id="Checkinchart_3d" style="width: 500px; height: 500px;">
                    </div>
                    <script type="text/javascript">
                        let dataIn = JSON.parse('<?php echo json_encode($data['datastatusin']); ?>');
                        google.charts.load("current", {
                            packages: ["corechart"]
                        });
                        google.charts.setOnLoadCallback(drawChart);
                        if (dataIn.length == 1) {
                            dataIn = [
                                ['Task', 'Hours per Day'],
                                ['No data', 1]
                            ]
                        }

                        function drawChart() {
                            var data = google.visualization.arrayToDataTable(dataIn);

                            var options = {
                                title: 'Status(in)',
                                is3D: true,
                                'width': 550,
                                'height': 550
                            };

                            var chart = new google.visualization.PieChart(document.getElementById('Checkinchart_3d'));
                            chart.draw(data, options);
                        }
                    </script>
                </div>
                <div class="col-6" style="padding: 5rem;">
                    <table class=" table">
                        <thead>
                            <tr style="text-align : center">
                                <th scope="col-6">Name</th>
                                <th scope="col-6">Time</th>
                            </tr>
                        </thead>
                        @foreach( $paginate['in'] as $row)
                        <tbody>
                            <tr style="text-align : center">
                                <td scope="col-6 row">{{$row->name}}</td>
                                <td scope="col-6 row">{{$row->Time}}</td>
                            </tr>
                        </tbody>
                        @endforeach

                    </table>
                </div>

            </div>
        </div>
        <div class="row">
            <div class="col-6">
                <div id="Checkoutchart_3d" style="width: 500px; height: 500px;"></div>
                <script type="text/javascript">
                    let dataOut = JSON.parse('<?php echo json_encode($data['datastatusout']); ?>');
                    google.charts.load("current", {
                        packages: ["corechart"]
                    });
                    google.charts.setOnLoadCallback(drawChart);
                    if (dataOut.length == 1) {
                        dataOut = [
                            ['Task', 'Hours per Day'],
                            ['No data', 1]
                        ]
                    }

                    function drawChart() {
                        var data = google.visualization.arrayToDataTable(dataOut);

                        var options = {
                            title: 'Status(Out)',
                            is3D: true,
                            'width': 550,
                            'height': 550
                        };

                        var chart = new google.visualization.PieChart(document.getElementById('Checkoutchart_3d'));
                        chart.draw(data, options);
                    }
                </script>
            </div>

            <div class="col-6" style="padding: 5rem;">
                <table class=" table">
                    <thead>
                        <tr style="text-align : center">
                            <th scope="col-6">Name</th>
                            <th scope="col-6">Time</th>
                        </tr>
                    </thead>
                    @foreach( $paginate['out'] as $row)
                    <tbody>
                        <tr style="text-align : center">
                            <td scope="col-6 row">{{$row->name}}</td>
                            <td scope="col-6 row">{{$row->Time}}</td>
                        </tr>
                    </tbody>
                    @endforeach

                </table>
            </div>
        </div>


    </div>
    <div style="text-align: center;justify-content: center;display:flex;align-items: center;">

        <a href="checkin">
            <button type="checkin" class="btn btn-primary" style="width:150px;height:50px">
                <i class="bi bi-arrow-left-circle"></i>
            </button>
        </a>

    </div><br>
    </div>

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
                            "unit": 'hour',
                            "displayFormats": {
                                "hour": "HH:mm"
                            },
                            "unitStepSize": 0.5,

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
                    "label": "List_user",
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
                    text.innerHTML = 'วันที่ :' +
                        "" + data.data.datenow;
                }
            });
        });

    });
</script>


</html>