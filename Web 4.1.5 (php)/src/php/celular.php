<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Radio la Madriguera</title>
</head>
<body>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css" integrity="sha256-46qynGAkLSFpVbEBog43gvNhfrOj+BmwXdxFgVK/Kvc=" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    

    <!--Navbar-->
    <nav class="navbar navbar-dark red lighten-1 mb-4 bg-madriguera">

        <!-- Navbar brand -->
        <a class="navbar-brand" href="#">Radio la Madriguera</a>

        <!-- Collapse button -->
        <button class="navbar-toggler second-button" type="button" data-toggle="collapse" data-target="#navbarSupportedContent23"
        aria-controls="navbarSupportedContent23" aria-expanded="false" aria-label="Toggle navigation">
        <div class="animated-icon2"><span></span><span></span><span></span><span></span></div>
        </button>

        <!-- Collapsible content -->
        <div class="collapse navbar-collapse" id="navbarSupportedContent23">

            <!-- Links -->
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                <a class="nav-link" href="#"><i class="fa fa-play text-center circle-icon" aria-hidden="true"></i> Reproductor <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="#"><i class="fa fa-calendar text-center circle-icon" aria-hidden="true"></i> Cronograma</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="#"><i class="fa fa-columns text-center circle-icon" aria-hidden="true"></i> Programas</a>
                </li>
            </ul>
            <!-- Links -->

        </div>
        <!-- Collapsible content -->

    </nav>
    <!--/.Navbar-->

    <div id="canvas">

    <div id="img_programa"></div>

    

    <h3 class="text-center text-light mt-3">Escuchando...</h3>
    <h2 class="text-center text-light mb-3">Radio la Madriguera</h2>
    <div class="" id="play_vivo_div text-center" class="rounded">
    
        <a id="audioControl" href="#">
            <i class="fa fa-play-circle icon-size color_madriguera text-center" aria-hidden="true" id="play"></i>
            <i class="fa fa-pause-circle icon-size color_madriguera text-center" aria-hidden="true" id="pause"></i>
        </a>

        <div class="container mt-3">
        <div class="row">
            <div class="col d-flex justify-content-center">
            <div class="card text-white bg-dark mb-3 bg-transparent mr-2 ml-2" style="max-width: 18rem;">
                <div class="card-body">
                    <a href="https://wa.me/5491122693676?text=Buenos%20dias,%20queria%20consultar:" target="_blank">
                        <i class="fab fa-whatsapp fa-lg white-text mr-md-5 fa-4x" style="color:white"></i>
                    </a>
                </div>
            </div>
            </div>
            <div class="col d-flex justify-content-center">
            <div class="card text-white bg-dark mb-3 bg-transparent mr-2 ml-2" style="max-width: 18rem;">
                <div class="card-body">
                    <a href="https://www.twitter.com/LMGAradio" target="_blank">
                        <i class="fab fa-twitter fa-lg white-text mr-md-5 fa-4x" style="color:white"></i>
                    </a>
                </div>
            </div>
            </div>
            </div>
            <div class="row">
            <div class="col d-flex justify-content-center">
            <div class="card text-white bg-dark bg-transparent mr-2 ml-2" style="max-width: 18rem;">
                <div class="card-body">
                    <a href="http://instagram.com/radiolamadriguera" target="_blank">
                        <i class="fab fa-instagram fa-lg white-text mr-md-5 fa-4x" style="color:white"></i>
                    </a>
                </div>
            </div>
            </div>
            <div class="col d-flex justify-content-center">
            <div class="card text-white bg-dark bg-transparent mr-2 ml-2" style="max-width: 18rem;">
                <div class="card-body">
                    <a href="https://www.facebook.com/radiolamadriguera" target="_blank">
                        <i class="fab fa-facebook fa-lg white-text mr-md-5 fa-4x" style="color:white"></i>
                    </a>
                </div>
            </div>
            </div>
        </div>
        </div>





        
    </div>
    <a class="navbar-brand" href="#">
    </a>
    <div id="player_div">
        <div class="">
            <div class="">
                <audio  id="StreamAudio">
                    <source src='http://163.172.8.18:8194/proxy/kmpa?mp=/stream' type='audio/mpeg' preload="auto" />
                </audio>
            </div>
        </div>
    </div>

    <div class="fb-page" 
        data-href="https://www.facebook.com/RADIOLAMADRIGUERA/"
        data-width="380" 
        data-hide-cover="false"
        data-show-facepile="false">
    </div>

    </div>


    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../css/styleCelular.css">
    <script src="../js/celular.js"></script>
    
</body>
</html>