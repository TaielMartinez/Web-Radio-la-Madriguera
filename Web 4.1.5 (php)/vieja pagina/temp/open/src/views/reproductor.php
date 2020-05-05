<?php include('../php/db_connect.php') ?>

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
        <img class="vivo-foto" src="../../../<?php echo $podcast['foto']?>" alt="">
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
    <div class="flex-between mt-2">
        <span class="ml-2">00:00</span>
        <div class="icon_play mt-2 icon_play_<?php echo $podcast['id'] ?>" onclick="play_pause_podcast(<?php echo $podcast['id'] ?>)">
            <i class="fa fa-play-circle fa-5x color-madriguera text-center" aria-hidden="true"></i>
        </div>
        <span class="mr-2">00:00</span>
    </div>
    </div>
</div>


<div class="mt-5 mb-5 color-dark">.</div>

<script> cargar_reproductor('<?php echo $podcast['id'] ?>') </script>




<style>

    .rangeslider{
        width: 100%;
    }

    .rangeslider:hover input[type="range"]::-webkit-slider-thumb{
        background: white;
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
        background: rgba(0,0,0,0);
        width: 10px;
        height: 20px;
        padding-top: 10px;
        border-radius: 25px;
    }
    .myslider::-webkit-slider-thumb:hover {
        background: red;
    }


    .myslider:hover {
        opacity: 1;
    }

</style>
