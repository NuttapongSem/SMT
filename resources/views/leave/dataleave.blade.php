<!DOCTYPE html>

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

        .aside {

            padding: 15px;
            color: #ffffff;
            text-align: center;
            font-size: 14px;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.12), 0 1px 2px rgba(0, 0, 0, 0.24);
        }

        .card {
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
            transition: 0.3s;
            margin: auto;
            width: 80%;
            padding: 30px 40px
        }

    </style>

</head>


<body>
    @if (Session::has('save'))
        <script language="javascript">
            alert('{{ Session::get('save') }}')

        </script>
    @endif

    <h2 class="card-header" style="background-color: #F3C35D;text-align : center">Information Leave</h2><br>
    <div class="container" style="background-color:#FDFDFD;"><br>
        <div class="card">
            <div class="table-responsive-xl">

                <h4 style="text-align: center">หนังสือขออนุญาตลาหยุด</h4>
                <p style="text-align: right">วันที่ {{ $data->date_now }}</p>
                <p style="text-align: left">เรื่องขอลา{{ $data->leave_type }}</p>
                <p style="text-align: left">เรียน ผู้บริหาร</p>
                <br><br>
                <p style="text-align: left">ข้าพเจ้า {{ $data->profiles->name }}</p>
                <p style="text-align: left">พนักงานกลุ่ม {{ $data->profiles->groups->name }}</p>
                <p style="text-align: left">พนักงานตำเเหน่ง {{ $data->profiles->jobpositions->name }}</p>
                <p style="text-align: left">ขออนุญาติลาเพื่อ {{ $data->annotation }}</p>
                <tr>
                    <td style="text-align: left">โดยเริ่มตั่งเเต่วันที่{{ $data->date_start }}</td>

                    <td style="text-align: right">จนถึ่งวันที่{{ $data->date_end }}</td>
                </tr><br><br><br><br><br><br>
                <tr style="text-align:right">
                    <td style=" text-align: right;padding-left: 80%;">ลงชื่อ &nbsp;
                    </td><br>
                    <td style="text-align: right;padding-right: 13%;"> (&nbsp;{{ $data->profiles->name }}&nbsp;)</td>

                </tr>
                <br><br><br><br><br><br><br>
                <p>ผู้รับรอง &nbsp;{{ $data->endorser }}</p>
                <p>(&nbsp;ตำเเหน่ง&nbsp;{{ $data->position_endorser }}&nbsp;)</p>


            </div>
            <div style="text-align: center">
                <td style="vertical-align:middle">

                    <a href="{{ url('/delete-leave/' . $data->id) }}" onclick="return confirm('delete confirm?')">
                        <button type="button" style="width:100px;" class="btn btn-danger">ลบ
                            <i class="bi bi-x-circle"></i>
                        </button>
                    </a>
                </td>
                &nbsp;
                <button
                    onclick="window.open('{{ url('/storage/exportPDF') . '/' . ($data->path_pdf ? $data->path_pdf : '') }}','_blank')"
                    type="button" style="width:100px;" class="btn btn-info">Info</button>
            </div>
        </div>



        {{-- <p style="cursor: pointer"><a
                onclick="window.open('{{ url('/storage/exportPDF') . '/' . (count($row->leave) > 0 ? $row->leave[0]->path_pdf : '') }}','_blank')">{{ $row->leaveStatus }}</a>
        </p> --}}


    </div>
</body>
