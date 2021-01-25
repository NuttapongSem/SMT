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
    <div class="container" style="background-color:#FDFDFD;">

        <h2 class="card-header" style="background-color: #F3C35D;text-align : center">Attendance</h2><br><br>

        <div class="table-responsive-xl">
            <form action="/checkin?page=1">
                <input type="text" name="name" value="{{$data->searchName}}">
                <input type="date" name="date" value="{{$data->searchDate}}">
                <input type="time" name="timeto" value="{{$data->searchTimeto}}">
                <input type="time" name="timein" value="{{$data->searchTimein}}">
                <div class="input-group mb-3"> 
                    <div class="input-group-prepend">
                        <select class="custom-select" id="inputGroupSelect01">
                            <option selected>เข้า</option>
                            <option value="1">ออก</option>
                        </select>
                    </div>


                </div> 
                <input type="submit">





            </form>
            <table class="table table-bordered"><br>
                <thead style="background-color: #F3C35D;">
                    <tr>

                        <th scope="col-6 col-md-4" style="text-align : center">Name</th>
                        <th scope="col-6 col-md-4">Date</th>
                        <th scope="col-6 col-md-4">Time</th>
                        <th scope="col-6 col-md-4">Status</th>

                    </tr>
                </thead>

                <tbody>
                    @foreach($data as $row)
                    <tr>
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

        </div><br>
        <center>
            <a href="/">
                <button type="/" class="btn btn-primary" style="width:150px;height:50px">
                    <i class="bi bi-arrow-left-circle"></i>
                </button>
            </a><br><br><br>
        </center>

    </div>


</body>


</html>