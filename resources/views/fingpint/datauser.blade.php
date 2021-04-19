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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous">
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
        alert('{{ Session::get('
            save ') }}')
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
                        <input type=" text" name="name" value="{{ $data->searchName }}" class="form-control" id="floatingInput" style="width: 150px; height: 45px;">
                    </div>&#160;

                    <input class="btn btn-primary" type="submit" value="Submit" style="width:80px;height:35px">

                </div><br>
            </form>
            <div class="table-responsive-xl">

                <table class="table table-bordered" id="example" style="background-color:#FDFDFD;">


                    <thead style="background-color: #F3C35D;text-align : center">

                        <tr>

                            <th scope="col-6 col-md-4" style="text-align : center">Porfile</th>

                            <th scope="col-6 col-md-4" style="width:200px;">ชื่อ</th>

                            <th scope="col-6 col-md-4">เเผนก</th>

                            <th scope="col-6 col-md-4">ตำเเหน่ง</th>

                            <th scope="col-6 col-md-4" style="width: 150px;">วันเกิด</th>

                            <th scope="col-6 col-md-4">สิ่งที่สนใจ</th>

                            <th scope="col-6 col-md-4">เเก้ไข</th>

                            <th scope="col-6 col-md-4">ลบ</th>

                            <th scope="col-6 col-md-4">กราฟ</th>

                            <th scope="col-6 col-md-4">token</th>

                        </tr>
                    </thead>

                    <tbody style="vertical-align:middle">
                        @foreach ($data as $key => $row)
                        <tr>

                            <td style="width: 200px;padding:20px">
                                <img class="a" style="width: 100%;height: auto;" src="data:image/jpeg;base64,{{ $row->imguser }}" alt="">
                            </td>

                            <th scope="row" style="vertical-align:middle">
                                {{ $row->name }}
                            </th>

                            <td style="vertical-align:middle;">
                                {{ $row->nameposition() }}
                            </td>

                            <td style="vertical-align:middle">
                                {{ $row->jobpositions->name }}
                            </td>

                            <td style="vertical-align:middle">
                                {{ $row->birthdayformat() }}
                            </td>

                            <td scope="row" style="vertical-align:middle">
                                <?php $arr = json_decode($row->interest); ?>
                                @foreach ($arr as $interest)
                                @if ($loop->last)
                                {{ $interest }}
                                @else
                                {{ $interest }},
                                @endif
                                @endforeach
                            </td>
                            <td style="vertical-align:middle">
                                <a href="{{ url('/edit/' . $row->id) }}">
                                    <button type="button" class="btn btn-secondary" class="btn btn-danger" style="background-color: #006ABE;">
                                        <i class="bi bi-pencil-fill"></i>
                                    </button>
                                </a>
                            </td>
                            <td style="vertical-align:middle">
                                <a href="{{ url('/delete/' . $row->id) }}" onclick="return confirm('delete confirm?')">
                                    <button type="button" style="width:100px;height:40px" class="btn btn-danger">ลบ
                                        <i class="bi bi-x-circle"></i>
                                    </button>
                                </a>
                            </td>

                            <td style="vertical-align:middle ">
                                <div class="text-center" style="width: 150px">
                                    <a href=" {{ '/chartuser/' . $row->id }}">
                                        <button type="button" class="btn btn-info">
                                            <i class="bi bi-graph-up"></i>
                                            &#160;Chartuser
                                        </button>
                                    </a>
                                </div>
                            </td>

                            <td style="vertical-align:middle; text-align: center;">
                                @if ($row->lineUser)
                                <p id="p_{{ $key }}"> {{ $row->lineUser->token }}</p>
                                @else
                                <p id="p_{{ $key }}"> - </p>
                                @endif
                                <button onclick="getToken('{{ $key }}', '{{ $row->id }}')" type="button" style="width:100px;height:40px" class="btn btn-primary">token
                                </button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $data->links('pagination::bootstrap-4') }}
            </div><br>
            <div style="text-align: center;justify-content: center;display:flex;align-items: center;">
                <a href="/">
                    <button type="/" class="btn btn-primary" style="width:150px;height:50px">
                        <i class="bi bi-arrow-le
                         ft-circle"></i>
                    </button>
                </a>
            </div><br><br><br>
        </div>
    </div>
    <script>
        function getToken(key, id) {
            // alert(key);
            $.ajax({
                type: "POST",
                url: "{{ url('/generateKey') }}",
                data: {
                    fingerprint_id: id
                },
                success: function(response) {
                    // console.log(response);
                    let p = document.getElementById("p_" + key)
                    p.innerHTML = response.token
                    // console.log(response.token)
                }
            });
        }
    </script>
</body>

</html>