<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://js.pusher.com/7.0/pusher.min.js"></script>
    <script src="https://player.vimeo.com/api/player.js"></script>
    <script>
        // Enable pusher logging - don't include this in production
        Pusher.logToConsole = true;

        var pusher = new Pusher('b92f163bad2020dc6232', {
            cluster: 'ap1'
        });

        var channel = pusher.subscribe('my-channel');
        channel.bind('my-event', function(data) {
            $("#body").fadeOut(1000);
            setInterval(function(){
                location.href = "http://127.0.0.1:8000/video/" + data.id;
            }, 1000)
        });
    </script>

</head>

<body id="body" style="display: none;">
    <h1>Video</h1>
    <div class="container">
        <div class="row">
            <div class="col">
                <iframe id="vid" src="https://player.vimeo.com/video/{{ $video }}?autoplay=1&muted=1&controls=0" width="500" height="360" frameborder=“0”></iframe>
            </div>
            <div class="col">
                <h3>name: {{ $data["name"] }} </h3>
                <h3>age: {{ $data["age"] }} </h3>
                <h3>interest: {{ $data["interest"] }} </h3>
            </div>
        </div>
    </div>
    <script> 
        let iframe = document.getElementById("vid");
        let player = new Vimeo.Player(iframe);
        player.on("play", function() {
            document.getElementById("body").style.display = "block";
            $("#body").hide().fadeIn(1000)
        });
        player.on("ended", function() {
            location.href = "http://127.0.0.1:8000/video/0";
        });
    </script>
    

</body>