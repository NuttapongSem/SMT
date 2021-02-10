<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta name="description" content="Simple CMS" />
  <meta name="author" content="Sheikh Heera" />


  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.min.css">
  <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
  <script src="https://unpkg.com/popper.js@1.14.3/dist/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>

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
<h3 class="card-header" style=" text-align: center; background-color: #F3C35D;">EditInformation</h2>


  <br>
  <div class="container" style="background-color:#FDFDFD;">





    <body>
      <style>
        body {
          background-color: lightgray;
          ;
        }
      </style>

      @if (Session::has('error'))
      <script language="javascript">
        alert('{{Session::get("error")}}')
      </script>

      @endif

      <form enctype="multipart/form-data" class="container" method="post" action="{{url('/save-edit')}}" accept-charset="UTF-8" style="background-color:#FDFDFD;">

        @csrf
        <input hidden value="{{$data->id}}" name="id" type="text" class="form-control" id="exampleFormControlInput1">

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

              <select id="selectpicker" class="selectpicker" multiple data-live-search="true" name="interest[]">
                <option value="Photography">Photography</option>
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
          </div>
          <center><input type="submit" value="Submit" class="btn btn-primary" style="background-color: #006ABE;"></center>
        </div><br>

      </form>
  </div><br>
  <div style="text-align: center;justify-content: center;display:flex;align-items: center;">
    <a href="/datauser">
      <button type="/datauser" class="btn btn-primary" style="width:150px;height:50px">
        <i class="bi bi-arrow-left-circle"></i>
      </button>
    </a>
  </div>
  </body>

  <script type="text/javascript">
    $(document).ready(function() {

      var dataOption = <?php echo json_encode($data->interest); ?>;
      var jsonData = JSON.parse(dataOption)
      let arr = [];
      for (let i = 0; i < jsonData.length; i++) {
        arr.push(jsonData[i]);
      }
      $('#selectpicker').selectpicker('val', arr);
    })


    function readURL(input) {
      if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
          $('#profileImg').attr('src', e.target.result)
        }
        reader.readAsDataURL(input.files[0]);
      }
    }
  </script>