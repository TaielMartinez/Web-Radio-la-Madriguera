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
    <link rel="stylesheet" href="src/css/reproductor.css">

    <?php 
        include('src/php/db_connect.php');
    ?>

</head>
<body class="color-bg-body">

    <?php include 'src/layouts/navbar.php' ?>

    

    <?php
        $sql_podcast = "SELECT * FROM podcast WHERE id = '".$_REQUEST['p']."' limit 1";
        $result_podcast = $conn->query($sql_podcast);
        $podcast;
        if ($result_podcast->num_rows > 0) {
            while($row = $result_podcast->fetch_assoc()) {
                $podcast = $row;
            }
        }
        //print_r($podcast);
    ?>
    


    <div class="row mt-3 div_datos">
        <div class="col-xs-12 col-sm-5 col-md-5 text-center">
            <img class="vivo-foto" src="<?php echo $podcast['foto']?>" alt="">
        </div>
        <div class="col-xs-12 col-sm-7 col-md-7 mt-4 text-center text-white">
            <h2><?php echo $podcast['nombre'] ?></h2>
            <span><?php echo  explode(" ", $podcast['fecha'])[0];?></span>
    
        </div>

    </div>

    <div class="text-center">
        <div class="rangeslider mt-5"> 
            <input type="range" min="0" max="100" value="0" class="myslider" id="sliderRange">
            <div class="progress_back">
                <div class="progress"></div>
            </div>
        </div>
        <div class="play_pause icon_play mt-2">
            <i class="fa fa-play-circle fa-5x color-madriguera text-center" aria-hidden="true"></i>
        </div>
        </div>
    </div>


    <audio  id="audio">
        <source src="<?php echo $podcast['link'] ?>" type="audio/mpeg" preload="true"/>
    </audio>







            <!--<div class="progress"></div> BARRA PARA MINI REPRODUCTOR-->




        <style> 
            .rangeslider{ 
                width: 100%; 
            } 
                
            .myslider { 
                -webkit-appearance: none; 
                background-attachment:fixed;
                background-repeat: no-repeat;
                background-image: linear-gradient(to right, white, white 0%, black 0%);
                width: 100%;
                height: 6px;
                opacity: 2; 
                } 
                
                
            .myslider::-webkit-slider-thumb { 
                -webkit-appearance: none; 
                cursor: pointer; 
                background: white;
                width: 10px; 
                height: 20px;
                padding-top: 10px;
                border-radius: 25px;
            }


            .myslider:hover { 
                opacity: 1; 
            } 
         </style>

    <!--<div class="mt-5 mb-5">.</div>-->

    <script src="src/js/jquery-3.4.1.min.js"></script>
    <script src="src/js/popper.min.js"></script>
    <script src="src/js/bootstrap.min.js"></script>
    <script src="src/js/reproductor.js"></script>
    
</body>
</html>