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
  <br>
  <!-- <pre>{{$data}}}</pre> -->
  <form enctype="multipart/form-data" class="container" method="post" action="{{url('/save-edit')}}" accept-charset="UTF-8">
    @csrf
    <input hidden value="{{$data->id}}" name="id" type="text" class="form-control" id="exampleFormControlInput1">
    <div class="card" style=" text-align: center">
      <h5 class="card-header">Information</h5>
    </div>
    <div class="table-responsive">
      <div class="card-body">

        <div class="form-group">
          <label for="exampleFormControlInput1">Name</label>
          <input value="{{$data->name}}" name="name" type="text" class="form-control" id="exampleFormControlInput1">
        </div>
        <div class="form-group">
          <label for="exampleFormControlInput1">Age</label>
          <input value="{{$data->age}}" name="age" type="number" class="form-control" id="exampleFormControlInput1">
        </div>


        <div class="form-group">
          <label for="exampleFormControlSelect2">Interest</label>
          <select name="interest" class="form-control" id="exampleFormControlSelect2">
            <option value="Photography"> Photography</option>
            <option value="Animals">Animals</option>
            <option value="Camping">Camping</option>
            <option value="Sport">Sport</option>
            <option value="Game">Game</option>
            <option value="Car">Car</option>
            <option value="Science">Science</option>
            <option value="Cooking">Cooking</option>


          </select>
        </div>
        <div class="form-group">
          <label for="exampleFormControlInput1">Profile </label><br>
          <img id="profileImg" src="{{$data->imguser}}" alt="" style="width: 200px;height: auto">
          <input value="imguser" name="imguser" type="file" class="form-control" id="exampleFormControlInput1" onchange="readURL(this);">
        </div>
        <div class="form-group">
          <!-- <label for="exampleFormControlTextarea1">Example textarea</label> -->
          <!-- <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea> -->
        </div>
      </div>
      <center><input type="submit" value="Submit" class="btn btn-primary"></center>
    </div>
  </form>

</body>
<script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
<script type="text/javascript">
  function readURL(input) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();
      reader.onload = function(e) {
        $('#profileImg').attr('src', e.target.result);
      }
      reader.readAsDataURL(input.files[0]);
    }
  }
</script>