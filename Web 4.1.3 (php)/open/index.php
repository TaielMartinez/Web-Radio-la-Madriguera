<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Radio la madriguera</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css" integrity="sha256-46qynGAkLSFpVbEBog43gvNhfrOj+BmwXdxFgVK/Kvc=" crossorigin="anonymous" />
    <link href="src/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="src/css/celu.css">
    <link rel="stylesheet" href="src/css/flex.css">
    <link rel="stylesheet" href="src/css/color.css">
    <link rel="stylesheet" href="src/css/navbar.css">
    <link rel="stylesheet" href="src/css/reproductor.css">
    <link rel="stylesheet" href="src/css/vivo.css">

</head>
<body class="color-bg-body">

    <div class="routes-navbar"></div>
    <div class="routes-mini_reproductor"></div>
    <div class="routes-vista"></div>


    <audio  id="audio">
        <source src="http://163.172.8.18:8194/proxy/kmpa?mp=/stream" type="audio/mpeg" preload="true"/>
    </audio>

    <audio  id="audio2">
        <source src="" type="audio/mpeg" preload="true"/>
    </audio>



    <script src="src/js/jquery-3.4.1.min.js"></script>
    <script src="src/js/popper.min.js"></script>
    <script src="src/js/bootstrap.min.js"></script>
    <script src="src/js/routes.js"></script>
    <script src="src/js/player.js"></script>
</body>
</html>