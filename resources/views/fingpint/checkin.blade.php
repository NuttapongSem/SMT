<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <meta name="description" content="Simple CMS" />
    <meta name="author" content="Sheikh Heera" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.css">
    <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />



    <style>
        html,
        body {
            margin: 0;
            padding: 0;
            border: 0;
            font-size: 100%;
            font: inherit;
            vertical-align: baseline;
        }

        /* HTML5 display-role reset for older browsers */
        article,
        aside,
        details,
        figcaption,
        figure,
        footer,
        header,
        hgroup,
        menu,
        nav,
        section {
            display: block;
        }

        body {
            line-height: 1;
        }

        ol,
        ul {
            list-style: none;
        }

        blockquote,
        q {
            quotes: none;
        }

        blockquote:before,
        blockquote:after,
        q:before,
        q:after {
            content: '';
            content: none;
        }

        *h2 {
            margin: 0 !important;
        }

        .card-header {
            margin: 0 !important;
        }
    </style>


</head>
<script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>

<script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>

<body>


    <style>
        body {
            background-color: lightgray;
        }
    </style>






    <h2 class="card-header" style="background-color: #F3C35D;text-align : center">Attendance</h2><br>
    <div class="container" style="background-color:#FDFDFD;">
        <div class="table-responsive-xl"><br>

            <div>

                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                    <i class="bi bi-search"></i>&#160;Filter
                </button>


            </div>



            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">SearchCheckin</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="/checkin?page=1">

                                <div class="text-center">

                                    <h3>Search</h3>
                                </div>
                                <div class="md-form mx-5 my-1">
                                    <label for="floatingInput">Name</label>
                                    <input type="text" name="name" value="{{$data->searchName}}" class="form-control" id="floatingInput" placeholder="text">

                                </div>
                                <div class="md-form mx-5 my-1">

                                    <label for="floatingInput">Satus</label>
                                    <div class="input-group-prepend">
                                        <select name="status" id="dropdown" class="custom-select" width="150px">
                                            <option value=""></option>
                                            <option value="เข้า">เข้า</option>
                                            <option value="ออก">ออก</option>
                                        </select>
                                    </div>
                                </div>





                                <div class="md-form mx-5 ">
                                    <div class="row">
                                        <div class="col-6">
                                            <label for="datepicker">DateStart</label>
                                            <!-- <input name="date_start" value="{{$data->searchdateStart}}" readonly="readonly" data-open="picker2" class="datepicker form-control date-time picker-opener" autocomplete="off" style="background-color:#FDFDFD;"> -->
                                            <input id="datepicker1" name="date_start" value="{{$data->searchdateStart}}" readonly="readonly" class="form-control" autocomplete="off" style="background-color:#FDFDFD;" />
                                        </div>
                                        <div class="col-6">
                                            <label for="datepicker">DateEnd</label>
                                            <!-- <input name="date_end" value="{{$data->searchdateEnd}}" readonly="readonly" data-open="picker2" class="datepicker form-control date-time picker-opener" autocomplete="off" style="background-color:#FDFDFD;"> -->

                                            <input id="datepicker2" name="date_end" value="{{$data->searchdateEnd}}" readonly="readonly" class="form-control" autocomplete="off" style="background-color:#FDFDFD;" />
                                        </div>
                                    </div>

                                </div>

                                <div class="md-form mx-5 my-1">
                                    <div class="row">
                                        <div class="col-6">
                                            <label for="floatingInput">TimeStart</label>
                                            <!-- <input name="time_start" id="datetimepicker3" value="{{$data->searchTimeto}}"> -->

                                            <input id="timepicker1" name="time_start" value="{{$data->searchTimeto}}" class="form-control" autocomplete="off" style="background-color:#FDFDFD;" />
                                        </div>

                                        <div class="col-6">
                                            <label for="floatingInput">TimeEnd</label>
                                            <!-- <input type="time" name="time_end" value="{{$data->searchTimein}}" data-open="picker3" class="stepExample2 form-control date-time-2 picker-opener"> -->

                                            <input id="timepicker2" name="time_end" value="{{$data->searchTimein}}" class="form-control" autocomplete="off" style="background-color:#FDFDFD;" />

                                        </div>
                                    </div>
                                </div><br>
                                <div class="text-center">

                                    <a class="btn btn-primary" href="checkin" role="button"><i class="bi bi-arrow-left-circle-fill"></i></a>

                                    <input class="btn btn-primary" type="submit" value="Submit" style="width:100px;height:40px">

                                </div>
                        </div>



                    </div>

                </div>

            </div>

        </div>


        <table class="table table-bordered"><br>
            <thead style="background-color: #F3C35D;">
                <tr style="text-align : center">

                    <th scope="col-6 col-md-4">Name</th>
                    <th scope="col-6 col-md-4">Date</th>
                    <th scope="col-6 col-md-4">Time</th>
                    <th scope="col-6 col-md-4">Status</th>
                    <!-- <th scope="col-6 col-md-4">Late</th> -->

                </tr>
            </thead>

            <tbody>
                @foreach($data as $row)
                <tr style="text-align : center">
                    <th scope="row" style="vertical-align:middle">
                        {{$row->name}}
                    </th>
                    <td>
                        {{$row->date ?? '-'}}
                    </td>
                    <td>
                        {{$row->Time ?? '-'}}
                    </td>

                    <td>
                        <p>{{$row->status ?? '-' }}</p>
                    </td>

                    <!-- <td>
                        <p style="color:red;">{{$row->late ?? '-' }}</p>
                    </td> -->


                </tr>

                @endforeach

            </tbody>

        </table>
        {{$data->links("pagination::bootstrap-4")}}
        <br>


    </div><br>
    <div style="text-align: center;justify-content: center;display:flex;align-items: center;">
        <a href="/">
            <button type="button" class="btn btn-primary" style="width:150px;height:50px">
                <i class="bi bi-arrow-left-circle"></i>
            </button>
        </a>
    </div><br><br>

    <script>
        $('#datepicker1').datepicker();

        $('#datepicker2').datepicker();

        $('#timepicker1').timepicker({
            uiLibrary: 'bootstrap4',
            mode: '24hr'
        });
        $('#timepicker2').timepicker({
            uiLibrary: 'bootstrap4',
            mode: '24hr'
        });
        $('#dropdown').dropdown();
    </script>
</body>


</html>