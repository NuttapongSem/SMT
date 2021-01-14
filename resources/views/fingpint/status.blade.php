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



</head>

<body>
    <div class="card" style=" text-align: center"><br>
        <h5 class="card-header">Information</h5>
    </div>
    <div class="table-responsive-xl">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col-6 col-md-4">ชื่อ</th>
                    <th scope="col-6 col-md-4">วันที่</th>
                    <th scope="col-6 col-md-4">เวลา</th>
                    <th scope="col-6 col-md-4">สถานะ</th>

                </tr>
            </thead>
            <tbody>
                @foreach($date as $row)
                <tr>
                    <th scope="row">
                        {{$row->fingerprint->name}}
                    </th>
                    <td>
                        {{$row->date}}
                    </td>
                    <td>
                        {{$row->Time}}
                    </td>
                    <td>
                        {{$row->status}}
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</body>

</html>