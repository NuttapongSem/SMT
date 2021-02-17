<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta name="description" content="Simple CMS" />
  <meta name="author" content="Sheikh Heera" />

  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.min.css">
  <!-- CSS only -->
  <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

  <script src="https://unpkg.com/popper.js@1.14.3/dist/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>
  <!-- JavaScript Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
  <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
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

  <body>
    <div class="container" style="background-color:#FDFDFD;">

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
              <label for="exampleFormControlInput1">Birthday</label>
              <input id="datepicker0" name="birthday" value="{{$data->birthday}}" readonly="readonly" class="form-control" autocomplete="off" style="background-color:#FDFDFD;" />
            </div>
            <label for="exampleFormControlInput1">Group</label>
            <select id="groupposition" name="group" class="form-select form-select-lg mb-3" aria-label=".form-select-lg example">
              <option selected></option>
              @foreach($position as $item)
              <option value="{{$item->id}}">{{$item->name}}</option>
              @endforeach
            </select>

            <label for="exampleFormControlInput1">JobPosition</label>
            <select id="jobposition" name="jobposition" class="form-select form-select-sm" aria-label=".form-select-sm example">
              <option selected></option>

            </select><br>


            <div class="form-group">
              <label for="exampleFormControlSelect2">Interest</label><br>
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
              <img id="profileImg" src="{{'data:image/webp;base64,' . $data->imguser}}" alt="" style="width: 200px;height: auto">
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
    $("#groupposition").change(function() {
      $.ajax({ //create an ajax request to display.php
        type: "GET",
        url: "{{url('/get-position?id=')}}" + this.value,
        data: {
          id: this.value
        },
        success: function(data) {
          console.log(data)

          var select = document.getElementById("jobposition");
          $("#jobposition").empty();
          for (var i = 0; i < data.position.length; i++) {
            let name = data.position[i].name;
            let id = data.position[i].id;
            let option = "<option value='" + name + "'>" + name + "</option>";
            $("#jobposition").append(option);
          }
        }


      })
    })


    var dataOption = <?php echo json_encode($data->interest); ?>;
    var jsonData = JSON.parse(dataOption)
    let arr = [];
    for (let i = 0; i < jsonData.length; i++) {
      arr.push(jsonData[i]);
    }
    $('#selectpicker').selectpicker('val', arr);


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
  <script>
    $('#datepicker0').datepicker();
  </script>