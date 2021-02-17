<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.css" rel="stylesheet" id="bootstrap-css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.bundle.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <meta name="description" content="Simple CMS" />
    <meta name="author" content="Sheikh Heera" />
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

</head>

<body>

    <style>
        body {
            margin: 3rem auto;
        }

        .chart {
            width: 100%;
            min-height: 450px;
            border-style: ridge;
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
            background-color: lightgray;
        }
    </style>
    <h2 class="card-header" style="background-color: #F3C35D;text-align : center">Chart {{$name}}</h2><br>

    <div class="container" style="background-color:#FDFDFD;">
        <div class="table-responsive-xl"><br>

            <div class="container chart">

                <div style="text-align: center;"><br>

                    <h5 id="week"></h5><br>
                    <button type="button" class="btn btn-success" onclick="prev()" style="width: 80px;height: 20;"><i class="bi bi-arrow-left-circle"></i>&#160;</button>
                    <button type="button" class="btn btn-warning" onclick="next()" style="width: 80px;height: 20;">&#160;<i class="bi bi-arrow-right-circle"></i></button>
                </div><br>
                <div class="row">
                    <canvas id="myChart" width="100" height="40"></canvas>
                </div>
                <div class="aside">
                    <script>
                        function prev() {
                            week += 1;
                            curr = new Date(curr.setDate(curr.getDate() - 7))
                            firstday = new Date(curr.setDate(curr.getDate() - curr.getDay()));
                            lastday = new Date(curr.setDate(curr.getDate() - curr.getDay() + 6));
                            document.getElementById("week").innerHTML = firstday.getDate() + " " + months[firstday.getMonth()] + " " + firstday.getFullYear() + " to " + lastday.getDate() + " " + months[lastday.getMonth()] + "-" + lastday.getFullYear();

                            chart.options.scales.yAxes[0].time = {
                                unit: 'day',
                                min: firstday.setHours(-12),
                                max: lastday.setHours(12)
                            }
                            if (week < dataChart.length && week >= 0) {
                                chart.data.datasets = dataChart[week];
                            } else {
                                chart.data.datasets = [{
                                    label: "No Data",
                                    borderColor: '#0421FF ',
                                    fill: false
                                }]
                            }
                            chart.update();
                        }

                        function next() {
                            week -= 1;
                            curr = new Date(curr.setDate(curr.getDate() + 7))
                            firstday = new Date(curr.setDate(curr.getDate() - curr.getDay()));
                            lastday = new Date(curr.setDate(curr.getDate() - curr.getDay() + 6));
                            document.getElementById("week").innerHTML = firstday.getDate() + " " + months[firstday.getMonth()] + " " + firstday.getFullYear() + " to " + lastday.getDate() + " " + months[lastday.getMonth()] + "-" + lastday.getFullYear();
                            chart.options.scales.yAxes[0].time = {
                                unit: 'day',
                                min: firstday.setHours(-12),
                                max: lastday.setHours(12)
                            }
                            if (week < dataChart.length && week >= 0) {
                                chart.data.datasets = dataChart[week];
                            } else {
                                chart.data.datasets = [{
                                    label: "No Data",
                                    borderColor: '#0421FF ',
                                    fill: false
                                }]
                            }

                            chart.update();

                        }
                        let week = 0;
                        let dataRaw = JSON.parse('<?php echo json_encode($dataChart); ?>');
                        let dataChart = [];
                        for (let i = 0; i < dataRaw.length; i++) {
                            let dataWeek = [];
                            for (let j = 0; j < dataRaw[i].length; j++) {
                                console.log(dataRaw[i])

                                dataWeek.push({
                                    label: "วันที่::" + dataRaw[i][j]['date'],
                                    borderColor: '#0421FF ',
                                    data: [{
                                            x: new Date(dataRaw[i][j]['start']),
                                            y: new Date(dataRaw[i][j]['y']),
                                        },
                                        {
                                            x: new Date(dataRaw[i][j]['end']),
                                            y: new Date(dataRaw[i][j]['y']),

                                        }
                                    ],
                                    fill: false
                                })
                            }
                            if (dataWeek.length == 0) {
                                dataWeek.push({
                                    label: "No Data",
                                    borderColor: '#0421FF ',
                                    fill: false
                                })
                            }
                            dataChart.push(dataWeek);
                        }
                        let curr = new Date();
                        let firstday = new Date(curr.setDate(curr.getDate() - curr.getDay()));
                        let months = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];
                        let lastday = new Date(curr.setDate(curr.getDate() - curr.getDay() + 6));
                        document.getElementById("week").innerHTML = firstday.getDate() + " " + months[firstday.getMonth()] + " " + firstday.getFullYear() + " to " + lastday.getDate() + " " + months[lastday.getMonth()] + "-" + lastday.getFullYear();
                        let ctx = document.getElementById('myChart').getContext('2d');
                        let chart = new Chart(ctx, {
                            type: 'line',
                            data: {
                                datasets: dataChart[week]
                            },
                            options: {
                                tooltips: {
                                    callbacks: {
                                        title: (items, data) => data.datasets[items[0].datasetIndex].data[items[0].index].x.toString().split(' ')[4],
                                        label: (item, data) => ''
                                    }
                                },
                                legend: {
                                    labels: {
                                        // This more specific font property overrides the global property
                                        fontSize: 16
                                    }
                                },
                                scales: {
                                    yAxes: [{
                                        type: 'time',
                                        time: {
                                            unit: 'day',
                                            min: firstday.setHours(-12),
                                            max: lastday.setHours(12)
                                        },
                                        ticks: {
                                            fontSize: 16
                                        }
                                    }],
                                    xAxes: [{
                                        type: 'time',
                                        time: {
                                            displayFormats: {
                                                hour: 'HH:mm',
                                            },
                                            unit: 'hour',
                                            min: new Date(2021, 0, 1, 6),
                                            max: new Date(2021, 0, 1, 21),
                                            unitStepSize: 0.5
                                        },
                                        ticks: {
                                            fontSize: 14
                                        }
                                    }]
                                },
                            }
                        });
                    </script><br>

                </div>
            </div>
        </div><br>

    </div>
    <br><br>
    <div style="text-align: center;justify-content: center;display:flex;align-items: center;">
        <a href="/datauser">
            <button type="/datauser" class="btn btn-primary" style="width:150px;height:50px">
                <i class="bi bi-arrow-left-circle"></i>
            </button>
        </a>
    </div>
    <br><br>
</body>

</html>