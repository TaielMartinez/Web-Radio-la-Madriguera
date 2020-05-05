<!DOCTYPE html>

<?php
    include('src/php/db_connect.php');
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Radio la Madriguera</title>
    <link rel="manifest" href="src/public/manifest.json">
</head>
<body>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css" integrity="sha256-46qynGAkLSFpVbEBog43gvNhfrOj+BmwXdxFgVK/Kvc=" crossorigin="anonymous" />
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="src/css/style.css">


<?php
    $sql_textos = "SELECT * FROM `textos`";
    $result_textos = $conn->query($sql_textos);

    $i = 0;
    $json = array();
    while($row = $result_textos->fetch_assoc()) {
        $json[$i]["titulo"] = $row["titulo"];
        $json[$i]["texto1"] = $row["texto1"];
        $json[$i]["texto2"] = $row["texto2"];
        $json[$i]["texto3"] = $row["texto3"];
        $i++;
    }
?>


<div>
    <nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top">
        <a class="navbar-brand" href="#inicio">
            <img src="./src/img/logo.jpg" width="40" height="40" class="d-inline-block align-top mr-3" alt=""></img>
            <span class="title">Radio La Madriguera</span>
            </a>
        <div class="collapse navbar-collapse position-relative" id="navbarText">
            <ul class="navbar-nav mr-auto">
            <li class="nav-item active card mr-1 bg-warning">
                <a class="nav-link" href="#vivo">Escuchar en Vivo <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item card mr-1">
                <a class="nav-link" href="/programas">Programas</a>
            </li>
            <li class="nav-item card mr-1">
                <a class="nav-link" href="/programas?view=grilla">Grilla</a>
            </li>
            <li class="nav-item card mr-1">
                <a class="nav-link" href="#venta">Realizar radio!</a>
            </li>
            </ul>
            <span class="navbar-text">
            </span>
        </div>
    </nav>
    <div class="container bg-white">
    <br></br>
    <div id="carouselExampleIndicators" class="carousel slide " data-ride="carousel">
        <?php
            $sql_carusle_cant = "SELECT count(*) FROM `carusel`";
            $result_carusel_cant = $conn->query($sql_carusle_cant);

            $sql_carusle_img1 = "SELECT * FROM carusel order by id ASC limit 1";
            $result_carusel_img1 = $conn->query($sql_carusle_img1);
        ?>
        <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <?php

            $row2 = $result_carusel_cant -> fetch_array(MYSQLI_ASSOC);
            $row_count = $row2["count(*)"];
            
            for ($i=1; $i <= $row_count-1; $i++) {
                echo '<li data-target="#carouselExampleIndicators" data-slide-to="'.$i.'"></li>';
            }
            //print_r($result_carusel_cant);
        ?>

        </ol>
        <div class="carousel-inner">
            <?php

                $row = $result_carusel_img1 -> fetch_array(MYSQLI_ASSOC);
                
                //print_r ($row2);
                //echo $row2["count(*)"];

                echo '<div class="carousel-item active">
                        <img src="'.$row["foto"].'" class="d-block w-100" alt=""></img>
                    </div>';

                for ($i=1; $i <= $row_count-1; $i++) {
                    echo '<div class="carousel-item">
                            <img src="'.$row["foto"].'" class="d-block w-100" alt="" id="foto_carousel'.$i.'"></img>
                        </div>';
                }
            ?>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only" id="vivo">Anterior</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Siguiente</span>
        </a>
    </div>
    <hr></hr>
    <!--
    <div>
        <div class="row">
        <div class="col-12 col-sm-6 col-md-8">Proba la app de Radio La Madriguera! Pesa menos de 1MB!</div>
        <div class="col-6 col-md-4"><button type="button" class="btn btn-warning">INSTALAR</button></div>
        </div>
        <hr></hr>
    </div>
    -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">
        </a>
        <div id="player_div">
            <div class="row">
                <div class="col">
                    <audio  id="StreamAudio">
                        <source src='http://163.172.8.18:8194/proxy/kmpa?mp=/stream' type='audio/mpeg' preload="auto" />
                    </audio>
                </div>
                
                <div class="col" id="play_vivo_div text-center" class="rounded">
                    <h2 class="text-center"><?php echo $json[2]["texto1"] ?></h2>
                    <a id="audioControl" href="#">
                        <i class="fa fa-play-circle icon-size color_madriguera text-center" aria-hidden="true" id="play"></i>
                        <i class="fa fa-pause-circle icon-size color_madriguera text-center" aria-hidden="true" id="pause"></i>
                    </a>
                    <h2 class="text-center"><?php echo $json[2]["texto2"] ?></h2>
                </div>
            </div>
        </div>
    </nav>
    <hr></hr>
    <br id="programas"></br>
    <section id="team" class="pb-5">
        <div class="container">
            <div class="row">
                <?php
                $sql_programas = "SELECT * FROM `programas`";
                $result_programas = $conn->query($sql_programas);

                if ($result_programas->num_rows > 0) {
                    while($row = $result_programas->fetch_assoc()) {
                        //echo "id: " . $row["nombre"];

                        if($row["tipo"] == "Vivo"){

                            echo '<div class="col-xs-12 col-sm-6 col-md-4">';
                            echo '    <div class="image-flip" ontouchstart="this.classList.toggle();">';
                            echo '        <div class="mainflip">';
                            echo '            <div class="frontside">';
                            echo '                <div class="card">';
                            echo '                    <div class="card-body text-center">';
                            echo '                        <p><img class="img-fluid" src="'.$row["foto"].'" alt=""></img></p>';
                            echo '                        <h4 class="card-title">'.$row["nombre"].'</h4>';
                            echo '                        <p class="card-text">'.$row["subtitulo"].'</p>';
                            echo '                        <p class="disable-text">'.$row["horario"].'</p>';
                            echo '                        <a href="#" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i></a>';
                            echo '                    </div>';
                            echo '                </div>';
                            echo '            </div>';
                            echo '            <div class="backside">';
                            echo '                <div class="card">';
                            echo '                    <div class="card-body text-center mt-4">';
                            echo '                        <h4 class="card-title">'.$row["nombre"].'</h4>';
                            echo '                        <p class="card-text">'.$row["descripcion"].'</p>';
                            echo '                        <ul class="list-inline">';
                            echo '                            <li class="list-inline-item">';
                            echo '                                <a class="social-icon text-xs-center" target="_blank" href="https://www.facebook.com/radiolamadriguera">';
                            echo '                                    <i class="fa fa-facebook"></i>';
                            echo '                                </a>';
                            echo '                            </li>';
                            echo '                            <li class="list-inline-item">';
                            echo '                                <a class="social-icon text-xs-center" target="_blank" href="https://www.twitter.com/LMGAradio">';
                            echo '                                    <i class="fa fa-twitter"></i>';
                            echo '                                </a>';
                            echo '                            </li>';
                            echo '                            <li class="list-inline-item">';
                            echo '                                <a class="social-icon text-xs-center" target="_blank" href="http://instagram.com/radiolamadriguera">';
                            echo '                                    <i class="fa fa-instagram"></i>';
                            echo '                                </a>';
                            echo '                            </li>';
                            echo '                        </ul>';
                            echo '                    </div>';
                            echo '                </div>';
                            echo '            </div>';
                            echo '        </div>';
                            echo '    </div>';
                            echo '</div>';

                        };
                    };
                };
                ?>
            </div>
        </div>
    </section>
    <hr></hr>
    
    <div class="contain bg-white">
        <h1 class="text-center mb-4"><?php echo $json[0]["titulo"] ?></h1>  <!-- QUIENES SOMOS -->
        <div class="row">
            <div class="col">
                <h4 class="ml-5 text-center"><?php echo $json[0]["texto1"] ?></h4>
                <p class="ml-3 mr-3 text-justify"><?php echo $json[0]["texto2"] ?></p>
            </div>
            <div class="col">
                <div id="mapa_div">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3282.9180936713087!2d-58.41583678477159!3d-34.631510066476274!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x95bccb0132e6b3bd%3A0x492bc2139eb6a5d2!2sC1240ACB%2C%20C1240ACB%2C%20Calle%20Gallegos%203446%2C%20C1240ACB%20CABA!5e0!3m2!1ses-419!2sar!4v1571010832445!5m2!1ses-419!2sar" width="600" height="450" frameborder="0" id="mapa" allowfullscreen=""></iframe> 
                </div>
            </div>
        </div>
    </div>

    <div id="venta">
        <div class="contain bg-white">
            <hr></hr>
            <h1 class="text-center"><?php echo $json[1]["titulo"] ?></h1>
            <h4 class="ml-5"></h4>
            <p class="ml-3 mr-3 text-justify"><?php echo $json[1]["texto1"] ?></p>
        
            <div class="row">

                <?php
                $sql_tarjetas = "SELECT * FROM `tarjetasventa`";
                $result_tarjetas = $conn->query($sql_tarjetas);

                if ($result_tarjetas->num_rows > 0) {
                    while($row = $result_tarjetas->fetch_assoc()) {
                        $boton = json_decode($row["boton"]);
                        echo '<div class="col-xs-12 col-sm-6 col-md-4">
                                <div class="">
                                    <div class="maiflip">
                                        <div class="frontside">
                                            <div class="card">
                                                <div class="card-body text-center">
                                                    <p><img class=" img-fluid" src="'.$row["foto"].'" alt="card image"></img></p>
                                                    <h4 class="card-title">'.$row["titulo"].'</h4>
                                                    <p class="card-text">'.$row["texto_1"].'</p>
                                                    <p class="disable-text">'.$row["texto_2"].'</p>
                                                    <a href='.$boton->link.' target="_blank" class="btn btn-success"><i class="'.$boton->icono.'"></i>  '.$boton->texto.'</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>';
                    }
                } else {
                    echo "0 results";
                }
                
                ?>

            </div>
        </div>
    </div>
    <hr></hr>
    <div>
        <div class="row">
            <div class="col-md-12">
                <div class=" flex-center text-center">
                <?php
                    $sql_redesSociales = "SELECT * FROM `redessociales`";
                    $result_redesSociales = $conn->query($sql_redesSociales);

                    while($row = $result_redesSociales->fetch_assoc()) {
                        echo '<a href="'.$row["link"].'" target="_blank">
                            <i class="'.$row["fa type"].' fa-'.$row["fa"].' fa-lg white-text mr-md-5 mr-3 fa-2x" style="color:black"> </i>
                        </a>';
                    }
                ?>
                </div>
            </div>

        </div>

        <div class="footer-copyright text-center py-3">© 2019 Copyright:
        <a href="http://radiolamadriguera.com/"> www.radiolamadriguera.com</a>
        </div>


    </div>
    </div>
</div>
    
<script src="src/js/index.js"></script>
<script>
<?php

    $sql_carusel = "SELECT * FROM `carusel`";
    $result_carusel_todo = $conn->query($sql_carusel);

    $i = 0;
    //print_r($result_redesSociales);
    while($row = $result_carusel_todo->fetch_assoc()) {
        echo 'fotosCarousel('.$i.', "'.$row["foto"].'");';
        $i++;
    }

    $conn->close();
?>

function fotosCarousel (id, foto) {
    $("#foto_carousel"+id).attr("src", foto)
}

</script>

<script async src="https://www.googletagmanager.com/gtag/js?id=G-6PNTQCFM87"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-6PNTQCFM87');
</script>
</body>
</html>