<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Radio la Madriguera</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css" integrity="sha256-46qynGAkLSFpVbEBog43gvNhfrOj+BmwXdxFgVK/Kvc=" crossorigin="anonymous" />
    <link href="src/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="src/css/vivo.css">
    <link rel="stylesheet" href="src/css/flex.css">
    <link rel="stylesheet" href="src/css/color.css">
    <link rel="stylesheet" href="src/css/celu.css">

</head>
<body class="color-bg-body">

    <?php include 'src/layouts/navbar.php' ?>

    <div class="row mt-3">
    
    <div class="col-xs-12 col-sm-5 col-md-5 text-center">
        <img class="vivo-foto" id="vivo_foto" src="src/img/logo.jpg" alt="">
    </div>
    <div class="col-xs-12 col-sm-7 col-md-7 mt-4 text-center text-white">
        <h1 id="vivo_nombre"></h1><br>
        <div id="audioControl">
            <i class="fa fa-play-circle fa-5x color-madriguera text-center" aria-hidden="true" id="play"></i>
            <i class="fa fa-pause-circle fa-5x color-madriguera text-center" aria-hidden="true" id="pause" style="display=none"></i>
        </div>
        <p class="text-justify mt-4" id="vivo_descripcion"></p><br>
    </div>

    <audio  id="StreamAudio">
        <source src='http://163.172.8.18:8194/proxy/kmpa?mp=/stream' type='audio/mpeg' preload="auto" />
    </audio>


    <div class="mt-5 mb-5">.</div>

    <script src="src/js/jquery-3.4.1.min.js"></script>
    <script src="src/js/popper.min.js"></script>
    <script src="src/js/bootstrap.min.js"></script>
    <script src="src/js/vivo.js"></script>
    
</body>
</html>