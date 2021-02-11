<!-- app/views/layouts/master.blade.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <meta name="description" content="Simple CMS" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Sheikh Heera" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w==" crossorigin="anonymous" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous"></script>



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

        table {
            border-collapse: collapse;
            border-spacing: 0;
        }

        @import url("https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css");
    </style>

</head>

<style>
    #nav2 {
        display: none;

    }

    #nav1 {
        display: flex;
    }

    @media only screen and (max-width: 550px) {
        #nav1 {
            display: none;
        }

        #nav2 {
            display: flex;
        }
    }


    .block-1 {
        width: 300px;
        height: 120px;
        margin: 10px;

    }

    .block-2 {
        width: 300px;
        height: 120px;
        margin: 10px;

    }
</style>

<body>
    @if (Session::has('save'))
    <script language="javascript">
        alert('{{Session::get("save")}}')
    </script>

    @endif
    <style>
        body {
            background-color: lightgray;
            ;
        }

        table {
            border-collapse: collapse;
            border-spacing: 0;
        }
    </style>


    <div class="row card-header" style="background-color: #F3C35D;">

        <div class="col-lg-4"></div>

        <div class="col-lg-4 col-6" style="text-align:center;">

            <h2>Information</h2>
        </div>

        <div class="col-lg-4 col-6" style="text-align: end;">

            <div class="row" id="nav1">

                <div class=" col-10" style="padding-top: 5px;">
                    ชื่อผู้ใช้ : {{Auth::user()->name}}

                </div>

                <div class="col-2">
                    <a href="{{url('/logout')}}">
                        <button type="button" style="width:50px;height:40px;background-color: #dc3545;color:aliceblue" class="btn">
                            <i class="fas fa-sign-out-alt"></i>
                        </button>
                    </a>

                </div>

            </div>

            <div class="row" id="nav2">
                <div class="col-12" style="text-align: end;">
                    <div class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            {{Auth::user()->name}} |
                            <i class="fas fa-sign-out-alt"></i>
                        </button>
                        <button class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="{{url('/logout')}}">ไปชะ</a>
                        </button>
                    </div>
                </div>

            </div>

        </div>

    </div><br>

    <div class="container" style="background-color:#FDFDFD;">

        <div style="margin-top:1rem;margin-bottom:1rem;"><br>


            <a href="{{ url('/datauser')}}">
                <button type="button" class="btn btn-danger mx-0" style="width:125px;height:35px;color:aliceblue"><i class="bi bi-journal-check"></i>&#160;Profile</button>
            </a>
            <a href="{{ url('/checkin')}}">
                <button type="button" class="btn btn-warning mx-0" style="width:125px;height:35px;background-color:#239B56 ;color:aliceblue"></i>&#160;<i class="bi bi-person-check-fill"></i>Attendance</button>
            </a>
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" style="width:125px;height:35px;">
                <i class="bi bi-graph-up"></i>&#160 Chart
            </button>

            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Chart</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="block-1">
                                <h5>Chart Per Day</h5>
                                <a href="chartuser">
                                    <button type="button" class="btn btn-primary" data-toggle="modal">
                                        <i class="bi bi-file-bar-graph-fill"></i>&#160;Chart Per Day
                                    </button>
                                </a>
                            </div>
                            <hr>
                            <div class="block-2">
                                <h5>Tooltips in a modal</h5>
                                <a href="chartuser" button type="button" class="btn btn-primary" data-toggle="modal">
                                    <i class="bi bi-graph-up"></i>&#160;Chartuser
                                    </button>
                                </a>


                            </div>
                        </div>
                    </div>
                </div>
            </div>



            <div class="table-responsive-xl">
                <table class="table">

                    <table class="table table-bordered">
                        <thead>
                            <tr style=" background-color: #F3C35D;text-align : center">
                                <th scope="col-6 col-md-4" style="text-align : center">Name</th>
                                <th scope="col-6 col-md-4" style="text-align : center">Age</th>
                                <th scope="col-6 col-md-4" style="text-align : center">Interest</th>
                                <th scope="col-6 col-md-4" style="text-align : center">Time</th>
                                <th scope="col-6 col-md-4" style="text-align : center">Status</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data as $row)
                            <tr style="text-align : center">
                                <th scope="row" style="text-align : center">
                                    {{$row->name}}
                                </th>
                                <td>
                                    {{$row->age}}
                                </td>
                                <td>
                                    <?php $arr = json_decode($row->interest) ?>
                                    @foreach($arr as $interest)
                                    @if($loop->last)
                                    {{$interest}}
                                    @else
                                    {{$interest}},
                                    @endif
                                    @endforeach
                                </td>
                                <td>
                                    {{$row->attendance->first()->updated_at ?? '-'}}
                                </td>
                                <td>
                                    <p>{{$row->attendance->first()->status ?? '-' }}</p>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>

                    </table>
                    {{$data->links("pagination::bootstrap-4")}}

                </table>
            </div><br>
        </div>

</body>

</html>