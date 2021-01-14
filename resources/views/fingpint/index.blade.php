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

    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-2.2.4.js" integrity="sha256-iT6Q9iMJYuQiMWNd9lDyBUStIq/8PuOW33aOqmvFpqI=" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>


    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js" integrity="sha384-LtrjvnR4Twt/qOuYxE721u19sVFLVSA4hf/rRt6PrZTmiPltdZcI7q7PXQBYTKyf" crossorigin="anonymous"></script> -->
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




    <div class="row card-header">

        <div class="col-lg-4"></div>

        <div class="col-lg-4 col-6" style="text-align: center;">
            <h5>Information</h5>
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

    </div>


    <div class="container">

        <!-- <div style="margin-top:1rem;margin-bottom:1rem;">

            <a href="{{url('/form-create')}}">
                <button type="button" style="width:150px;height:40px;background-color: #17a2b8;color:aliceblue" class="btn"><i class="bi bi-box-arrow-down"></i></button>
            </a>
        </div> -->



        <div class="table-responsive-xl">
            <table class="table">

                <thead>
                    <tr>
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
                            {{$row->interest}}
                        </td>
                        <td>
                            {{$row->date->first()->updated_at ?? '-'}}
                        </td>
                        <td>
                            <p>{{ $row->date->first()->status ?? '-' }}</p>
                        </td>
                        <td>
                            <a href="{{url('/edit/'.$row->id)}}">
                                <button type="button" class="btn btn-secondary" class="btn btn-danger">
                                    <i class="bi bi-hammer"></i>
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

        </div>

</body>

</html>