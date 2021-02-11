<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <meta name="description" content="Simple CMS" />
    <meta name="author" content="Sheikh Heera" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>


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

        img.a {
            -ms-transform: rotate(0deg);
            /* IE 9 */
            transform: rotate(0deg);
        }

        tr td img {
            margin: 10px;
        }
    </style>



</head>

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
    </style>

    <h2 class="card-header" style="background-color: #F3C35D; text-align : center">Profile</h2><br>

    <div class="container">

        <div class="table-responsive-xl" style="text-align : center">
            <form action="/datauser?page=1">
                <div class="row" style="text-align: center;justify-content: center;display:flex;align-items: center;">
                    <div>
                        Name::&#160;
                    </div>


                    <div>

                        <input type=" text" name="name" value="{{$data->searchName}}" class="form-control" id="floatingInput" style="width: 150px; height: 45px;">
                        <!-- placeholder="D/M/Y" -->
                    </div>&#160;

                    <input class="btn btn-primary" type="submit" value="Submit" style="width:80px;height:35px">

                </div><br>
            </form>



            <table class="table table-bordered" id="example" style="background-color:#FDFDFD;">


                <thead style="background-color: #F3C35D;text-align : center">

                    <tr>

                        <th scope="col-6 col-md-4" style="text-align : center">name</th>

                        <th scope="col-6 col-md-4">age</th>

                        <th scope="col-6 col-md-4">interest</th>

                        <th scope="col-6 col-md-4">Porfile</th>

                        <th scope="col-6 col-md-4">Edit</th>

                        <th scope="col-6 col-md-4">Delete</th>

                        <th scope="col-6 col-md-4">Chart</th>

                    </tr>
                </thead>

                <tbody style="vertical-align:middle">
                    @foreach($data as $row)
                    <tr>
                        <th scope="row" style="vertical-align:middle">
                            {{$row->name}}
                        </th>
                        <td style="vertical-align:middle">
                            {{$row->age}}
                        </td>
                        <td scope="row" style="vertical-align:middle">
                            <?php $arr = json_decode($row->interest) ?>
                            @foreach($arr as $interest)
                            @if($loop->last)
                            {{$interest}}
                            @else
                            {{$interest}},
                            @endif
                            @endforeach
                        </td>

                        <td style="width: 200px;padding:20px">
                            <img class="a" style="width: 100%;height: auto;" src="data:image/jpeg;base64,{{$row->imguser}}" alt="">
                        </td>

                        <td style="vertical-align:middle">
                            <a href="{{url('/edit/'.$row->id)}}">
                                <button type="button" class="btn btn-secondary" class="btn btn-danger" style="background-color: #006ABE;">
                                    <i class="bi bi-pencil-fill"></i>
                                </button>
                            </a>

                        <td style="vertical-align:middle">

                            <a href="{{url('/delete/'.$row->id)}}" onclick="return confirm('delete confirm?')">
                                <button type="button" style="width:100px;height:40px" class="btn btn-danger">ลบ
                                    <i class="bi bi-x-circle"></i>
                                </button>
                            </a>
                        </td>

                        <td style="vertical-align:middle">
                            <div class="text-center">
                                <a href=" {{'/chartuser/'.$row->id}}">
                                    <button type="button" class="btn btn-info"><i class="bi bi-graph-up"></i>&#160;Chartuser</button>
                                </a>
                            </div>

                        </td>


                    </tr>

                    @endforeach

                </tbody>

            </table>
            {{$data->links("pagination::bootstrap-4")}}

        </div><br>

        <div style="text-align: center;justify-content: center;display:flex;align-items: center;">
            <a href="/">
                <button type="/" class="btn btn-primary" style="width:150px;height:50px">
                    <i class="bi bi-arrow-left-circle"></i>
                </button>
            </a>


        </div><br><br><br>


</body>

</html>