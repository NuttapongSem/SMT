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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css"
        integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"
        integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w=="
        crossorigin="anonymous" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js"
        integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js"
        integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"
        integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"
        integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous">
    </script>


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
@if (Session::has('deleteSucess'))
    <script language="javascript">
        alert('{{ Session::get('deleteSucess') }}')

    </script>
@endif
@if (Session::has('urlPDF'))
    <script>
        let PDF = '{{ Session::get('urlPDF') }}';
        console.log(PDF);
        if (PDF != null) {
            window.open(PDF);

        }

    </script>
    <?php Session::forget('urlPDF'); ?>

@endif

<body>
    @if (Session::has('save'))
        <script language="javascript">
            alert('{{ Session::get('save') }}')

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
                    ชื่อผู้ใช้ : {{ Auth::user()->name }}

                </div>

                <div class="col-2">
                    <a href="{{ url('/logout') }}">
                        <button type="button" style="width:50px;height:40px;background-color: #dc3545;color:aliceblue"
                            class="btn">
                            <i class="fas fa-sign-out-alt"></i>
                        </button>
                    </a>

                </div>

            </div>

            <div class="row" id="nav2">
                <div class="col-12" style="text-align: end;">
                    <div class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            {{ Auth::user()->name }} |
                            <i class="fas fa-sign-out-alt"></i>
                        </button>
                        <button class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="{{ url('/logout') }}">ออกระบบ</a>
                        </button>
                    </div>
                </div>

            </div>

        </div>

    </div><br>

    <div class="container" style="background-color:#FDFDFD;">

        <div style="margin-top:1rem;margin-bottom:1rem;"><br>


            <a href="{{ url('/datauser') }}">
                <button type="button" class="btn btn-danger mx-0" style="width:125px;height:35px;color:aliceblue"><i
                        class="bi bi-journal-check"></i>&#160;Profile</button>
            </a>

            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal"
                style="width:125px;height:35px;">
                <i class="bi bi-hourglass-bottom"></i> Time attendance
            </button>

            <a href="chartuser">
                <button type="button" class="btn btn-primary" data-toggle="modal" style="width:125px;height:35px;">
                    <i class="bi bi-file-bar-graph-fill"></i>&#160;Chart
                </button>
            </a>

            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Chart</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <a href="{{ url('/checkin') }}">
                                <button type="button" class="btn btn-primary" data-toggle="modal"
                                    style="width:125px;height:35px;background-color:#239B56;">&#160;Attendance</button>
                            </a>
                        </div>
                        <div class="modal-body">
                            <a href=" {{ url('/leave') }}" role="button" class="btn btn-secondary popover-test"
                                title="Popover title" data-bs-content="Popover body content is set in this attribute."
                                style="width:125px;height:35px;">Leave</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class=" table-responsive-xl">
                <table class="table">

                    <table class="table table-bordered">
                        <thead>
                            <tr style=" background-color: #F3C35D;text-align : center">
                                <th scope="col-6 col-md-4" style="text-align : center">Name</th>
                                <th scope="col-6 col-md-4" style="text-align : center">group</th>
                                <th scope="col-6 col-md-4" style="text-align : center">jobposition</th>
                                <th scope="col-6 col-md-4" style="text-align : center" style="width: 150px;">Time</th>
                                <th scope="col-6 col-md-4" style="text-align : center">Status</th>
                                <th scope="col-6 col-md-4" style="text-align : center">Late</th>
                                <th scope="col-6 col-md-4" style="text-align : center">Note</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $row)
                                <tr style="text-align : center">

                                    <th scope="row" style="text-align : center">
                                        {{ $row->name }}
                                    </th>
                                    <td>
                                        {{ $row->nameposition() }}
                                    </td>
                                    <td>
                                        {{ $row->jobpositions->name }}
                                    </td>
                                    <td>
                                        {{ count($row->attendance) > 0 ? $row->attendance->first()->updated_at : '-' }}
                                    </td>
                                    <td>
                                        <p>{{ count($row->attendance) > 0 ? $row->attendance->first()->status : '-' }}
                                        </p>
                                    </td>
                                    <td>
                                        @if ($row->data_late)
                                            <p style="color:red">{{ $row->data_late }}</p>
                                        @else
                                            <p>{{ $row->no_late }}</p>
                                        @endif

                                    </td>
                                    <td>


                                        @if ($row->leaveStatus)
                                            <a href="{{ url('/data-leave/' . $row->id) }}">
                                                <button type="button" style="width:150px;height:auto"
                                                    class="btn btn-success">{{ $row->leaveStatus }}
                                                </button>
                                            </a>
                                        @else
                                            <a href="#">
                                                <button type="button" style="width:150px;height:auto"
                                                    class="btn btn-secondary">
                                                    ไม่มีใบลา&nbsp;<i class="bi bi-journal-x"></i>
                                                </button>
                                            </a>
                                        @endif

                                    </td>
                                </tr>
                            @endforeach
                        </tbody>

                    </table>
                    {{ $data->links('pagination::bootstrap-4') }}

                </table>

            </div><br>
        </div>

</body>

</html>
