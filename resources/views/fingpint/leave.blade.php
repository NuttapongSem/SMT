<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="Simple CMS" />
    <meta name="author" content="Sheikh Heera" />

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"
        integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.min.css">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/css/bootstrap.css">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/2.3.2/css/bootstrap-responsive.css">
    <!-- CSS only -->
    <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

    <script src="https://unpkg.com/popper.js@1.14.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous">
    </script>
    <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/js/bootstrap.js"></script>
</head>


<body>
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

        body {
            background-color: lightgray;
            ;
        }

        table {
            border-collapse: collapse;
            border-spacing: 0;
        }

        body {
            color: #000;
            overflow-x: hidden;
            height: 100%;
            background-color: #C5CAE9 !important;
            background-repeat: no-repeat;
            padding: 0 !important
        }

        .container {
            padding-top: 120px;
            padding-bottom: 120px
        }

        input {
            padding: 22px 15px !important;
            border: 1px solid #CFD8DC !important;
            border-radius: 4px !important;
            box-sizing: border-box;
            background-color: #fff !important;
            color: #000 !important;
            font-size: 16px !important;
            letter-spacing: 1px;
            position: relative
        }

        input:focus {
            -moz-box-shadow: none !important;
            -webkit-box-shadow: none !important;
            box-shadow: none !important;
            border: 1px solid #1976D2 !important;
            outline-width: 0
        }

        .fa-calendar {
            position: absolute;
            top: 13px;
            font-size: 20px;
            color: #1976D2;
            z-index: 1000
        }

        #fa-1 {
            left: calc(50% - 40px)
        }

        #fa-2 {
            left: calc(100% - 40px)
        }

        .form-control-placeholder {
            position: absolute;
            top: -10px !important;
            padding: 12px 2px 0 2px;
            opacity: 0.5
        }

        #end-p {
            left: calc(50% + 4px)
        }

        .form-control:focus+.form-control-placeholder,
        .form-control:valid+.form-control-placeholder {
            font-size: 95%;
            top: 10px;
            transform: translate3d(0, -100%, 0);
            opacity: 1
        }

        ::placeholder {
            color: #BDBDBD;
            opacity: 1
        }

        :-ms-input-placeholder {
            color: #BDBDBD
        }

        ::-ms-input-placeholder {
            color: #BDBDBD
        }

        button:focus {
            -moz-box-shadow: none !important;
            -webkit-box-shadow: none !important;
            box-shadow: none !important;
            outline-width: 0
        }

        .datepicker {
            background-color: #fff;
            border-radius: 0 !important;
            align-content: center !important;
            padding: 0 !important
        }

        .datepicker-dropdown {
            top: 180px !important;
            left: calc(50% - 173.5px) !important;
            border-right: #1976D2;
            border-left: #1976D2
        }

        .datepicker-dropdown.datepicker-orient-left:before {
            left: calc(50% - 6px) !important
        }

        .datepicker-dropdown.datepicker-orient-left:after {
            left: calc(50% - 5px) !important;
            border-bottom-color: #1976D2
        }

        .datepicker-dropdown.datepicker-orient-right:after {
            border-bottom-color: #1976D2
        }

        .datepicker table tr td.today,
        span.focused {
            border-radius: 50% !important;
            background-image: linear-gradient(#FFF3E0, #FFE0B2)
        }

        thead tr:nth-child(2) {
            background-color: #1976D2 !important
        }

        thead tr:nth-child(3) th {
            font-weight: bold !important;
            padding: 20px 10px !important;
            color: #BDBDBD !important
        }

        tbody tr td {
            padding: 10px !important
        }

        tfoot tr:nth-child(2) th {
            padding: 10px !important;
            border-top: 1px solid #CFD8DC !important
        }

        .cw {
            font-size: 14px !important;
            background-color: #E8EAF6 !important;
            border-radius: 0px !important;
            padding: 0px 20px !important;
            margin-right: 10px solid #fff !important
        }

        .old,
        .day,
        .new {
            width: 40px !important;
            height: 40px !important;
            border-radius: 0px !important
        }

        .day.old,
        .day.new {
            color: #E0E0E0 !important
        }

        .day.old:hover,
        .day.new:hover {
            border-radius: 50% !important
        }

        .old-day:hover,
        .day:hover,
        .new-day:hover,
        .month:hover,
        .year:hover,
        .decade:hover,
        .century:hover {
            border-radius: 50% !important;
            background-color: #eee
        }

        .active {
            border-radius: 50% !important;
            background-image: linear-gradient(#1976D2, #1976D2) !important;
            color: #fff !important
        }

        .range-start,
        .range-end {
            border-radius: 50% !important;
            background-image: linear-gradient(#1976D2, #1976D2) !important
        }

        .range {
            background-color: #E3F2FD !important
        }

        .prev,
        .next,
        .datepicker-switch {
            border-radius: 0 !important;
            padding: 10px 10px 10px 10px !important;
            font-size: 18px;
            opacity: 0.7;
            color: #fff
        }

        .prev:hover,
        .next:hover,
        .datepicker-switch:hover {
            background-color: inherit !important;
            opacity: 1
        }

        @media screen and (max-width: 726px) {
            .datepicker-dropdown.datepicker-orient-right:before {
                right: calc(50% - 6px)
            }

            .datepicker-dropdown.datepicker-orient-right:after {
                right: calc(50% - 5px)
            }
        }

    </style>


    <h2 class="card-header" style="background-color: #F3C35D;text-align : center">Note of Leave</h2><br>
    <div class="container" style="background-color:#FDFDFD;"><br>

        <form class="row g-3" enctype="multipart/form-data" class="container" method="post"
            action="{{ url('/save-leave') }}" accept-charset="UTF-8">
            @csrf
            <div class="md-form mx-6 ">
                <div class="flex-row d-flex justify-content-center">
                    <div class="col-lg-6 col-11 px-1">
                        <label for="exampleFormControlInput1">Name</label>
                        <select id="name_id" name="name_id" class="form-select form-select-lg mb-3 dropdown-group"
                            aria-label=".form-select-lg example" style="text-align: center" width="330" required>
                            <option selected></option>
                            @foreach ($list_fingerprint as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>&nbsp;
                <div class="row">&nbsp;
                    <div class="row justify-content-end">
                        <div class="col-md-4">
                            <label class="form-label">Leave type</label>
                            <select name="leave_type" class="form-select" aria-label="Default select example"
                                style="width: 150px; height: 48px;" required onchange="onChangeLeavetype(this)">
                                <option selected>...</option>
                                <option value="ป่วย"> ป่วย</option>
                                <option value="กิจส่วนตัว">กิจส่วนตัว</option>
                                <option value="คลอดบุตร">คลอดบุตร</option>
                                <option value="ขอลาอุปสมบท">อุปสมบท</option>
                                <option value="พักร้อน">พักร้อน</option>
                            </select>
                        </div>
                        <div class="col-md-5">
                            <div id="day_leave">
                                <label class="form-label">Day Leave</label>
                                <select name="day_leave" class="form-select" aria-label="Default select example"
                                    style="width: 200px; height: 48px;" required>
                                    <option selected>ไม่ได้ระบุ</option>
                                    <option value="ขอลาครึ่งวันช่วงเช้า"> ขอลาครึ่งวันช่วงเช้า</option>
                                    <option value="ขอลาครึ่งวันช่วงบ่าย">ขอลาครึ่งวันช่วงบ่าย</option>
                                    <option value="ขอลาทั่งวัน">ขอลาทั่งวัน</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="flex-row d-flex justify-content-center">
                <div class="col-lg-6 col-11 px-1">
                    <label for="exampleFormControlInput1">Group</label>
                    <select id="groupposition" name="group" class="form-select form-select-lg mb-3 dropdown-group"
                        aria-label=".form-select-lg example" style="text-align: center" width="330" required>
                        <option selected></option>
                        @foreach ($list_group as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                        @endforeach
                    </select>
                    <label for="exampleFormControlInput1">Jobposition</label>
                    <select id="jobposition" name="jobposition" class="form-select form-select-lg mb-3 dropdown-group"
                        aria-label=".form-select-lg example" style="text-align: center" width="330">
                        <option selected></option>
                        @foreach ($list_job as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="md-form mx-6 ">
                <div class="flex-row d-flex justify-content-center">
                    <div class="col-lg-6 col-11 px-1">
                        <div class=" form-floating">
                            <textarea name="annotation" class="form-control" placeholder="Leave a comment here"
                                id="floatingTextarea2" style="height: 100px"></textarea>
                            <label for="floatingTextarea2">Annotation</label>
                        </div>
                    </div>
                </div><br><br>
            </div>
            <div class="md-form mx-6 ">
                <div class="flex-row d-flex justify-content-center">
                    <div class="col-lg-6 col-11 px-1">
                        <div class="input-group input-daterange">
                            <input type="text" name="date_start" id="date_start" class="form-control text-left mr-2">
                            <label class="ml-3 form-control-placeholder" id="start-p" for="start">Start
                                Date</label>
                            <span class="fa fa-calendar" id="date_start"></span>
                            <input type="text" name="date_end" id="date_end" class="form-control text-left ml-2">
                            <label class="ml-3 form-control-placeholder" id="end-p" for="end">End
                                Date</label>
                            <span class="fa fa-calendar" id="date_end"></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="md-form mx-6 ">
                <div class="flex-row d-flex justify-content-center">
                    <div class="col-lg-6 col-11 px-1">
                        <label for="inputCity" class="form-label">Endorser</label>
                        <input name="endorser" type="text" class="form-control" id="inputendorser" style="width:300px;">
                        <label for="exampleFormControlInput1">PositionEndorser</label>
                        <select id="position_endorser" name="position_endorser" class="form-select form-select-sm "
                            aria-label=".form-select-sm example" style="width: 300px;height:45px" required>
                            <option selected></option>
                            @foreach ($list_job as $item)
                                <option value="{{ $item->name }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div><br>
            </div>

            <div class="flex-row d-flex justify-content-center" style="text-align: center;">
                <div class="col-lg-6 col-11 px-1">
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary" style="width: 150px;">Submit</button>
                    </div>
                </div>
            </div>
        </form><br>
    </div><br><br>
    <div style="text-align: center;justify-content: center;display:flex;align-items: center;">
        <a href="/">
            <button type="/" class="btn btn-primary" style="width:150px;height:50px">
                <i class="bi bi-arrow-left-circle"></i>
            </button>
        </a>

    </div><br>
</body>
<script>
    $("#groupposition").change(function() {

        $.ajax({ //create an ajax request to display.php
            type: "GET",
            url: "{{ url('/get-position?id=') }}" + this.value,
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
    $(document).ready(function() {
        $('#day_leave').hide();
        $('.input-daterange').datepicker({
            format: 'dd-mm-yyyy',
            autoclose: true,
            calendarWeeks: true,
            clearBtn: true,
            disableTouchKeyboard: true
        });
    });

    function onChangeLeavetype(val) {
        switch (val.value) {
            case 'กิจส่วนตัว':
                $('#day_leave').show();
                break;

            default:
                $('#day_leave').hide();
                break;

        }
    }

</script>
