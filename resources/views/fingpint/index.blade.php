<!-- app/views/layouts/master.blade.php -->
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

    <!-- นำเข้า  CSS จาก Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <!-- นำเข้า  CSS จาก dataTables -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.12/css/jquery.dataTables.css">

    <!-- นำเข้า  Javascript จาก  Jquery -->
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <!-- นำเข้า  Javascript  จาก   dataTables -->
    <!-- <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.js"></script> -->

    <script type="text/javascript">
        $(function() {
            $('#example').dataTable();
        });
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

        table {
            border-collapse: collapse;
            border-spacing: 0;
        }
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
                    <!-- <a href="{{url('/logout')}}">
                        <button type="button" style="width:50px;height:40px;background-color: #dc3545;color:aliceblue" class="btn">
                            <i class="fas fa-sign-out-alt"></i>
                        </button>
                    </a> -->
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
                <button type="button" class="btn btn-warning mx-0" style="width:125px;height:35px;background-color:#239B56 ;color:aliceblue"><i class="bi bi-hand-index-thumb-fill"></i>&#160;<i class="bi bi-person-check-fill"></i>Attendance</button>
            </a>
        </div>



        <div class="table-responsive-xl">
            <table class="table">

                <table class="table table-bordered" id="example" >
                    <thead>
                        <tr style="background-color: #F3C35D;">
                            <th scope="col-6 col-md-4">Name</th>
                            <th scope="col-6 col-md-4">Age</th>
                            <th scope="col-6 col-md-4">Interest</th>
                            <th scope="col-6 col-md-4">Time</th>
                            <th scope="col-6 col-md-4">Status</th>
                            <th scope="col-6 col-md-4">Edit</th>
                            <th scope="col-6 col-md-4">Delete</th>



                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data as $row)


                        <tr>
                            <th scope="row">
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
                            <td>
                                <a href="{{url('/edit/'.$row->id)}}">
                                    <button type="button" class="btn btn-secondary" class="btn btn-danger" style="background-color: #006ABE;">
                                        <i class="bi bi-pencil-fill"></i>
                                    </button>
                                </a>

                            <td>
                                <a href="{{url('/delete/'.$row->id)}}" onclick="return confirm('delete confirm?')">
                                    <button type="button" style="width:150px;height:40px" class="btn btn-danger">ลบ
                                        <i class="bi bi-x-circle"></i>
                                    </button>
                                </a>
                            </td>


                        </tr>
                        @endforeach
                    </tbody>

                </table>
            </table>
        </div><br>

</body>

</html>