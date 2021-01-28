<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <meta name="description" content="Simple CMS" />
    <meta name="author" content="Sheikh Heera" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.12/css/jquery.dataTables.css">
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script> -->
    <!-- <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.js"></script> -->




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

<body>

    <style>
        body {
            background-color: lightgray;
        }
    </style>


    <h2 class="card-header" style="background-color: #F3C35D;text-align : center">Attendance</h2><br>
    <div class="container" style="background-color:#FDFDFD;">
        <div class="table-responsive-xl"><br>


            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                <i class="bi bi-search">&#160;</i>Filter
            </button>

            <a href="chartuser">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" style="float : right;">
                    <i class="bi bi-bar-chart-steps"></i>Chartuser
                </button>
            </a>


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
                                        <select name="status" class="custom-select" id="inputGroupSelect01">
                                            <!-- <option value="เข้า">เข้า</option> -->
                                            <option value=""></option>
                                            <option value="เข้า">เข้า</option>
                                            <option value="ออก">ออก</option>
                                        </select>
                                    </div>


                                </div>


                                <div class="md-form mx-5 my-1">
                                    <div class="row">
                                        <div class="col-6">
                                            <label for="floatingInput">DateStart</label>
                                            <input type="date" name="date_start" value="{{$data->searchdateStart}}" data-open="picker2" class="form-control date-time picker-opener">

                                        </div>
                                        <div class="col-6">
                                            <label for="floatingInput">DateEnd</label>
                                            <input type="date" name="date_end" value="{{$data->searchdateEnd}}" data-open="picker2" class="form-control date-time picker-opener">

                                        </div>
                                    </div>

                                </div>

                                <div class="md-form mx-5 my-1">
                                    <label for="floatingInput">TimeStart</label>
                                    <input type="time" name="time_start" value="{{$data->searchTimeto}}" data-open="picker3" class="form-control date-time-2 picker-opener">
                                </div>

                                <div class="md-form mx-5 my-1">
                                    <label for="floatingInput">TimeEnd</label>
                                    <input type="time" name="time_end" value="{{$data->searchTimein}}" data-open="picker3" class="form-control date-time-2 picker-opener">
                                </div><br>

                                <div class="text-center">


                                    <a class="btn btn-primary" href="checkin" role="button"><i class="bi bi-arrow-left-circle-fill"></i></a>


                                    <input class="btn btn-primary" type="submit" value="Submit" style="width:100px;height:40px">


                                </div>


                        </div>

                        </form>
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


                </tr>

                @endforeach

            </tbody>

        </table>
        {{$data->links("pagination::bootstrap-4")}}
        <br>


    </div><br>
    <center>
        <div>
            <a href="/">
                <button type="/" class="btn btn-primary" style="width:150px;height:50px">
                    <i class="bi bi-arrow-left-circle"></i>
                </button>
            </a><br><br>
        </div>
    </center>

    </div>


</body>


</html>