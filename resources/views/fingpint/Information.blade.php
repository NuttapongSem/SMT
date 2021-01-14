<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="Simple CMS" />
    <meta name="author" content="Sheikh Heera" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js" integrity="sha384-LtrjvnR4Twt/qOuYxE721u19sVFLVSA4hf/rRt6PrZTmiPltdZcI7q7PXQBYTKyf" crossorigin="anonymous"></script>
</head>

<body>
    @if (Session::has('error'))
    <script language="javascript">
        alert('{{Session::get("error")}}')
    </script>

    @endif
    <form enctype="multipart/form-data" class="container" method="post" action="{{url('/save-finger')}}" accept-charset="UTF-8">
        @csrf
        <input hidden value="" name="id" type="text" class="form-control" id="exampleFormControlInput1">
        <div class="card" style=" text-align: center"><br>
            <h5 class="card-header">Information</h5>
        </div>
        <div class="card-body">
            <h5 class="card-title">
                <div class="form-group">
                    <label for="exampleFormControlInput1">Name</label>
                    <input required value="{{old('name')}}" name="name" type="text" class="form-control" id="exampleFormControlInput1">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1">Age</label>
                    <input required value="{{old('age')}}" name="age" type="number" class="form-control" id="exampleFormControlInput1">
                </div>


                <div class="form-group">
                    <label for="exampleFormControlSelect2">Interest</label>
                    <select name="interest" class="form-control" id="exampleFormControlSelect2">
                        <option value="ฟุตบอล"> ฟุตบอล</option>
                        <option value="เพลง">เพลง</option>
                        <option value="ดูหนัง">ดูหนัง</option>


                    </select>
                </div>

                <div class="form-group">
                    <label for="exampleFormControlInput1">Porfile</label>
                    <input value="" name="imguser" type="file" class="form-control" id="exampleFormControlInput1">
                </div>

                <!-- <div class="form-group">
                    <label for="exampleFormControlInput1">รูปนิ้วมือ</label>
                    <input value="" name="fingerprint" type="file" class="form-control form-control-file" id="exampleFormControlInput1">
                </div> -->

                <div class="form-group">
                    <br>
                </div>
                <center><input type="submit" value="Submit" style="width:200px;height:50px" class="btn btn-primary"></center>

    </form><br><br>
</body>

</html>