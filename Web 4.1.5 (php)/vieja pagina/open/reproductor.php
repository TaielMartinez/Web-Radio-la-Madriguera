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

    <div class="row mt-3">

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
    
    <div class="col-xs-12 col-sm-5 col-md-5 text-center">
        <img class="vivo-foto" src="<?php echo $podcast['foto']?>" alt="">
    </div>
    <div class="col-xs-12 col-sm-7 col-md-7 mt-4 text-center text-white">
        <h2><?php echo $podcast['nombre'] ?></h2>
        <span>
            <?php
                $date1 = explode(" ", $podcast['fecha']);
                echo $date1[0];
            ?>
         </span><br><br>


        <div class="player">
            <div class="play_pause icon_play"></div>
        </div>
        <div>
            <div class="next icon_next"></div>
            <div class="progress"></div>
        </div>

        <audio  id="audio">
            <source src='http://163.172.8.18:8194/proxy/kmpa?mp=/stream' type='audio/mpeg' preload="auto" />
        </audio>


    <div class="mt-5 mb-5">.</div>

    <script src="src/js/jquery-3.4.1.min.js"></script>
    <script src="src/js/popper.min.js"></script>
    <script src="src/js/bootstrap.min.js"></script>
    <script src="src/js/reproductor.js"></script>
    
</body>
</html>