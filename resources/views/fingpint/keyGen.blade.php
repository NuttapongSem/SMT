<!-- app/views/layouts/master.blade.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <meta name="description" content="Simple CMS" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Sheikh Heera" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w==" crossorigin="anonymous" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

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

        @import url("https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css");

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


        .block-1 {
            width: 300px;
            height: 120px;
            margin: 10px;

        }

        .block-2 {
            width: 300px;
            height: 120px;
            margin: 10px;

        }

        body {
            font-family: "Lato", sans-serif;
            transition: background-color .5s;
        }

        .sidenav {
            height: 100%;
            width: 0;
            position: fixed;
            z-index: 1;
            top: 0;
            left: 0;
            background-color: #2C3E50;
            overflow-x: hidden;
            transition: 0.5s;
            padding-top: 60px;
        }

        .sidenav a {
            padding: 8px 8px 8px 32px;
            text-decoration: none;
            font-size: 25px;
            color: #ffffff;
            display: block;
            transition: 0.3s;
        }

        .sidenav a:hover {
            color: #40ee89;
        }

        .sidenav .closebtn {
            position: absolute;
            top: 0;
            right: 25px;
            font-size: 36px;
            margin-left: 50px;
        }

        #main {
            transition: margin-left .5s;
            padding: 16px;
        }

        @media screen and (max-height: 450px) {
            .sidenav {
                padding-top: 15px;
            }

            .sidenav a {
                font-size: 18px;
            }
        }

        body {
            background-color: lightgray;
        }
    </style>

</head>

<body>


    <div id="mySidenav" class="sidenav">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
        <a href="{{ url('/') }}">หน้าหลัก</a>
        <hr>
        <a href="{{ url('/datauser') }}">ข้อมูลส่วนตัว</a>
        <hr>
        <a href="{{ url('/checkin') }}">เวลาเข้า,ออกงาน</a>
        <hr>
        <a href=" {{ url('/leave') }}">ใบลา</a>
        <hr>
        <a href="chartuser">แผนภาพกราฟ</a>
        <hr>
        <a href="summary">สรุปการทำงาน</a>
    </div>
    <div class="row card-header" style="background-color: #F3C35D;">

        <div class="col-lg-4">
            <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776;</i></span>
        </div>

        <div class="col-lg-4 col-6" style="text-align:center;">
            <h2>Information</h2>
        </div>
        <div class="col-lg-4 col-6" style="text-align: end;">
            <div class="row" id="nav1">
                <div class=" col-10" style="padding-top: 5px;">
                    ชื่อผู้ใช้ : {{ Auth::user()->name }}
                </div>
                <div class="col-2">
                    <a href="{{ url('/logout') }}">
                        <button type="button" style="width:50px;height:40px;background-color: #dc3545;color:aliceblue" class="btn">
                            <i class="fas fa-sign-out-alt"></i>
                        </button>
                    </a>
                </div>
            </div>
            <div class="row" id="nav2">
                <div class="col-12" style="text-align: end;">
                    <div class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            {{ Auth::user()->name }} |
                            <i class="fas fa-sign-out-alt"></i>
                        </button>
                        <button class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="{{ url('/logout') }}">ออกระบบ</a>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div><br>

    <div class="container">

        <div style="margin-top:1rem;margin-bottom:1rem;"><br>
            <div style="text-align: right;">
                <button class="btn btn-primary" onclick="genKey()"><i class="fas fa-plus"></i> Generate new key</button>
            </div>
            <div id="listKey" style="height: 30em; background-color: white; text-align: center;overflow: scroll;" class="table-responsive-xl my-2 p-3" id="main">
                @foreach ($tokens as $token)
                <div class='row'>
                    <div class='col'>
                        {{ $token->token }}
                        <hr>
                    </div>
                </div>
                @endforeach
            </div>
            <div style="text-align: center;">
                <button class="btn btn-primary" onclick="window.history.back()">back</button>
            </div>
        </div>

        <!-- Toast -->
        <div class="position-fixed bottom-0 end-0 p-3" style="z-index: 5">
            <div id="liveToast" class="toast hide" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="toast-header">
                    <strong class="me-auto">key is copied</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
            </div>
        </div>
        <script>
            function openNav() {
                document.getElementById("mySidenav").style.width = "250px";
                document.getElementById("main").style.marginLeft = "250px";
                document.body.style.backgroundColor = "rgba(0,0,0,0.4)";
            }

            function closeNav() {
                document.getElementById("mySidenav").style.width = "0";
                document.getElementById("main").style.marginLeft = "0";
                document.body.style.backgroundColor = "lightgray";
            }

            function genKey() {
                $.ajax({
                    type: "POST",
                    url: "{{ url('/generateKey') }}",
                    success: function(response) {
                        let input = document.createElement("input");
                        input.id = "keyInput"
                        input.value = response.token.token;
                        input.type = 'text';
                        input.className = 'swal-content__input';
                        swal({
                            title: "New key is",
                            content: input,
                            buttons: {
                                copy: "copy",
                                cancel: "close"
                            },
                            icon: "success",
                        }).then(value => {
                            switch (value) {
                                case "copy":
                                    input.select();
                                    document.execCommand("copy");
                                    document.getElementById("liveToast").className = "toast show"
                                    setTimeout(() => {
                                        document.getElementById("liveToast").className = "toast hide"
                                    }, 2000)
                                    break;
                            }

                        })
                        $("#listKey").empty()
                        let tokens = response.tokens

                        for (let index in tokens) {
                            let col = "<div class='row'> <div class='col'>" + tokens[index].token + "<hr> </div> </div>"
                            $("#listKey").append(col)
                        }

                    }
                });

            }
        </script>
</body>

</html>