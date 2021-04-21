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

        body {
            background-color: lightgreen;
        }

        * {
            box-sizing: border-box;
        }

        .row::after {
            content: "";
            clear: both;
            display: block;
        }

        [class*="col-"] {
            float: left;
            padding: 15px;
        }

        html {
            font-family: "Lucida Sans", sans-serif;
        }

        .header {
            color: #ffffff;
            padding: 15px;
        }

        .menu ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
        }

        .menu li {
            padding: 8px;
            margin-bottom: 7px;

            color: #ffffff;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.12), 0 1px 2px rgba(0, 0, 0, 0.24);
        }


        .aside {

            padding: 15px;
            color: #ffffff;
            text-align: center;
            font-size: 14px;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.12), 0 1px 2px rgba(0, 0, 0, 0.24);
        }

        .footer {

            color: #ffffff;
            text-align: center;
            font-size: 12px;
            padding: 15px;
        }

        /* For desktop: */
        .col-1 {
            width: 8.33%;
        }

        .col-2 {
            width: 16.66%;
        }

        .col-3 {
            width: 25%;
        }

        .col-4 {
            width: 33.33%;
        }

        .col-5 {
            width: 41.66%;
        }

        .col-6 {
            width: 50%;
        }

        @media only screen and (max-width: 768px) {

            /* For mobile phones: */
            [class*="col-"] {
                width: 100%;
            }
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
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous">
</script>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

<body>
    <style>
        body {
            background-color: lightgray;
        }

        .chart {
            width: 100%;
            min-height: 450px;
            border-style: ridge;
        }

        .row {
            margin: 0 !important;
        }
    </style>


    <script>
        $(function() {
            $(".datepicker").datepicker();
        });
    </script>




    <h2 class="card-header" style="background-color: #F3C35D;text-align : center">Dashboard</h2><br>

    <div class="container" style="background-color:#FDFDFD;"><br>


        <div style="text-align: center;justify-content: center;display:flex;align-items: center;">
            <h4>Date ::&#160</h4>
            <input id="date" name="date_start" readonly="readonly" data-open="picker2" class="datepicker  date-time picker-opener" style="width: 150px; height: 30px; ">
        </div><br>

        <div class="row" style="padding-top:5;">

            <div id="datenow"></div>
            <div class="col-12 chart">
                <canvas id="myChart" width="100" height="40"></canvas>
                <script>
                    $(document).ready(function() {

                        let status = JSON.parse(
                            '<?php echo json_encode($data); ?>');
                        let minTime;
                        let maxTime;

                        if (status.data.length > 0) {
                            minTime = new Date(status.data[0].x.split(' ')[0] + " 06:00:00")
                            maxTime = new Date(status.data[0].x.split(' ')[0] + " 23:00:00")
                        } else {
                            minTime = new Date("2021-01-01 06:00:00")
                            maxTime = new Date("2021-01-01 23:00:00")
                        }
                        var yLabels = status['name'];
                        for (let i = 0; i < status.data.length; i++) {
                            status.data[i].x = new Date(status.data[i].x);
                        }

                        let text = document.getElementById('datenow');
                        text.innerHTML = 'วันที่ : ' + "" + status['datenow'];
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
                                            "min": minTime,
                                            "max": maxTime,

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
                                    "label": "Data",
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
        </div>

        <div class="row">
            <div class="col-6">
                <div id="Checkinchart_3d" class="chart">
                </div>
                <script type="text/javascript">
                    let dataIn = JSON.parse('<?php echo json_encode($data['datastatusin']); ?>');
                    google.charts.load("current", {
                        packages: ["corechart"]
                    });
                    google.charts.setOnLoadCallback(drawChart1);
                    if (dataIn.length == 1) {
                        dataIn = [
                            ['Task', 'Hours per Day'],
                            ['No data', 1]

                        ]
                    }

                    function drawChart1() {
                        var data = google.visualization.arrayToDataTable(dataIn);

                        var options = {
                            title: 'Status(in)',
                            is3D: true,
                            pieSliceText: 'value',

                        };

                        var chart = new google.visualization.PieChart(document.getElementById('Checkinchart_3d'));
                        chart.draw(data, options);
                    }
                </script>
            </div>

            <div class="col-6 right">
                <div class="aside">
                    <table class=" table" id="rows_in">
                        <thead>
                            <tr style="text-align : center">
                                <th>Name</th>
                                <th>Time</th>
                            </tr>
                            @foreach ($paginate['in'] as $row)
                            <tr style="text-align : center">
                                <td>
                                    {{ $row->name }}
                                </td>
                                <td>
                                    {{ $row->Time }}
                                </td>
                            </tr>

                            @endforeach
                        </thead>
                        <tbody>
                        </tbody>
                    </table>

                </div>
            </div>

        </div>

        <div class="row">
            <div class="col-6">
                <div id="Checkoutchart_3d" class="chart"></div>
                <script type="text/javascript">
                    let dataOut = JSON.parse('<?php echo json_encode($data['datastatusout']); ?>');
                    google.charts.load("current", {
                        packages: ["corechart"]
                    });
                    google.charts.setOnLoadCallback(drawChart2);
                    if (dataOut.length == 1) {
                        dataOut = [
                            ['Task', 'Hours per Day'],
                            ['No data', 1]

                        ]
                    }

                    function drawChart2() {
                        var data = google.visualization.arrayToDataTable(dataOut);

                        var options = {
                            title: 'Status(Out)',
                            is3D: true,
                            pieSliceText: 'value',

                        };

                        var chart = new google.visualization.PieChart(document.getElementById('Checkoutchart_3d'));
                        chart.draw(data, options);
                    }
                </script>
            </div>

            <div class="col-6 right">
                <div class="aside">
                    <table class=" table" id="rows_out">
                        <thead>
                            <tr style="text-align : center">
                                <th>Name</th>
                                <th>Time</th>
                            </tr>
                            @foreach ($paginate['out'] as $row)
                            <tr style="text-align : center">
                                <td>
                                    {{ $row->name }}
                                </td>
                                <td>
                                    {{ $row->Time }}
                                </td>
                            </tr>
                            @endforeach
                        </thead>
                        <tbody>
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>

    </div><br><br>

    <div style="text-align: center;justify-content: center;display:flex;align-items: center;">

        <a href="/">
            <button type="checkin" class="btn btn-primary" style="width:150px;height:50px">
                <i class="bi bi-arrow-left-circle"></i>
            </button>
        </a>

    </div><br>


</body>

<script type=text/javascript>
    function chartIn(data) {
        let dataIn = data
        google.charts.load("current", {
            packages: ["corechart"]
        });
        google.charts.setOnLoadCallback(drawChart1);
        if (dataIn.length == 1) {
            dataIn = [
                ['Task', 'Hours per Day'],
                ['No data', 1]

            ]
        }

        function drawChart1() {
            var data = google.visualization.arrayToDataTable(dataIn);

            var options = {
                title: 'Status(in)',
                is3D: true,
                pieSliceText: 'value',

            };

            var chart = new google.visualization.PieChart(document.getElementById('Checkinchart_3d'));
            chart.draw(data, options);
        }
    }

    function chartOut(data) {
        let dataOut = data
        google.charts.load("current", {
            packages: ["corechart"]
        });
        google.charts.setOnLoadCallback(drawChart2);
        if (dataOut.length == 1) {
            dataOut = [
                ['Task', 'Hours per Day'],
                ['No data', 1]
            ]
        }

        function drawChart2() {
            var data = google.visualization.arrayToDataTable(dataOut);

            var options = {
                title: 'Status(Out)',
                is3D: true,
                pieSliceText: 'value',

            };

            var chart = new google.visualization.PieChart(document.getElementById('Checkoutchart_3d'));
            chart.draw(data, options);
        }
    }

    function chart(data) {
        let status = data;
        let minTime;
        let maxTime;

        if (status.data.length > 0) {
            minTime = new Date(status.data[0].x.split(' ')[0] + " 06:00:00")
            maxTime = new Date(status.data[0].x.split(' ')[0] + " 23:00:00")
        } else {
            minTime = new Date("2021-01-01 06:00:00")
            maxTime = new Date("2021-01-01 23:00:00")
        }
        var yLabels = status['name'];
        for (let i = 0; i < status.data.length; i++) {
            status.data[i].x = new Date(status.data[i].x);
        }

        let text = document.getElementById('datenow');
        text.innerHTML = 'วันที่ : ' + "" + status['datenow'];
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
                            "min": minTime,
                            "max": maxTime,

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
                    "label": "Data",
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
    }

    // function setRows(val) {
    //     console.log(val)
    // }

    $(document).ready(function() {
        $("#date").change(function() {

            $.ajax({ //create an ajax request to display.php
                type: "GET",
                url: "{{ url('/getdate') }}",
                data: {
                    data: $(this).val()
                },
                success: function(data) {
                    console.log(data);
                    chart(data.data);
                    chartIn(data.data.datastatusin);
                    chartOut(data.data.datastatusout)
                    let text = document.getElementById('datenow');
                    let months = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug",
                        "Sep", "Oct", "Nov", "Dec"
                    ];
                    let d = data.data.datenow.split('-')
                    d = new Date(d[2], d[1] - 1, d[0])
                    text.innerHTML = 'วันที่ :' +
                        "" + d.getDate() + " " + months[d.getMonth()] + " " + d
                        .getFullYear()

                    while (document.getElementById('rows_in').rows.length > 0) {
                        document.getElementById('rows_in').deleteRow(0);
                    }

                    var tableRef = document.getElementById('rows_in').getElementsByTagName(
                        'tbody')[0];
                    var table = document.getElementById("rows_in");
                    var header = table.createTHead();
                    var row = header.insertRow(0);
                    var cell0 = row.insertCell(0);
                    var cell1 = row.insertCell(1);
                    cell0.innerHTML = "<b>Name</b>";
                    cell1.innerHTML = "<b>Time</b>";
                    var use = data.paginate['in'];
                    for (i = 0; i < use.length; i++) {
                        tableRef.insertRow().innerHTML =
                            "<tbody><tr style='text-align:center;'><td>" + use[i].name +
                            "</td><td>" + use[i].Time + "</td></tr></tbody>";
                    }

                    while (document.getElementById('rows_out').rows.length > 0) {
                        document.getElementById('rows_out').deleteRow(0);
                    }

                    var tableoutRef = document.getElementById('rows_out')
                        .getElementsByTagName('tbody')[0];
                    var tableout = document.getElementById("rows_out");
                    var headerout = tableout.createTHead();
                    var rowout = headerout.insertRow(0);
                    var cellout0 = rowout.insertCell(0);
                    var cellout1 = rowout.insertCell(1);
                    cellout0.innerHTML = "<b>Name</b>";
                    cellout1.innerHTML = "<b>Time</b>";
                    var useout = data.paginate['out'];

                    for (i = 0; i < useout.length; i++) {

                        tableoutRef.insertRow().innerHTML =
                            "<tbody><tr style='text-align:center;'><td>" + useout[i].name +
                            "</td><td>" + useout[i].Time + "</td></tr></tbody>";
                    }
                }
            });
        });
    });



    $(window).resize(function() {
        drawChart1();
        drawChart2();
    });
</script>

</html>