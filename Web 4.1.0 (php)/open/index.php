<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Radio la Madriguera</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css" integrity="sha256-46qynGAkLSFpVbEBog43gvNhfrOj+BmwXdxFgVK/Kvc=" crossorigin="anonymous" />
    <link href="src/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="src/css/celu.css">
    <link rel="stylesheet" href="src/css/flex.css">
    <link rel="stylesheet" href="src/css/color.css">

    <?php 
        include('src/php/db_connect.php');
        echo '
            <script>
                console.log("'.$connCheck.'")
            </script>
        ';
    ?>

</head>
<body class="color-bg-body">

    <?php include 'src/layouts/navbar.php' ?>

        <div class="text-right mt-2 mr-2">
            <i class="fas fa-cog fa-2x text-secondary"></i>
        </div>

    
    <h4 class="text-white col-12 mb-3 text-center"></h4>
    <div class="container celu-scroll_horizontal">
        <div class="row text-center flex-nowrap">

            <?php
                $sql_ultimosPodcast = "SELECT * FROM `podcast` ORDER BY fecha DESC LIMIT 1";
                $result_ultimosPodcast = $conn->query($sql_ultimosPodcast);

                if ($result_ultimosPodcast->num_rows > 0) {
                    while($row = $result_ultimosPodcast->fetch_assoc()) {
                        
                    }
                }
            ?>

        </div>
    </div>

    <h4 class="text-white col-12 mb-3 text-center">
        <div class="btn btn-warning text-white">En Vivo</div>
        <div class="mt-2">Ultimos Episodios</div>
    </h4>
    <div class="container celu-scroll_horizontal">
        <div class="row text-center flex-nowrap">

            <?php
                $sql_ultimosPodcast = "SELECT * FROM `podcast` ORDER BY fecha DESC LIMIT 6";
                $result_ultimosPodcast = $conn->query($sql_ultimosPodcast);

                if ($result_ultimosPodcast->num_rows > 0) {
                    while($row = $result_ultimosPodcast->fetch_assoc()) {
                        echo '
                        
                                <a class="mr-3 celu-card" href="src">
                                    <div class="celu-divImgTop">
                                        <img class="card-img-top" src="'.$row['foto'].'" alt="'.$row['nombre'].'">
                                    </div>
                                    <div class="card-body celu-cardBody">
                                        <hp class="text-white text-center" style="font-size: 1rem">'.$row['nombre'].'</hp>
                                    </div>
                                </a>
                        
                        ';
                    }
                }
            ?>

        </div>
    </div>

    <h4 class="text-white col-12 mb-3 mt-5 text-center">Todos los Podcast</h4>
    <div class="container celu-scroll_horizontal">
        <div class="row text-center flex-nowrap">

            <?php
                $sql_ultimosPodcast = "SELECT * FROM `podcast` ORDER BY fecha DESC LIMIT 6";
                $result_ultimosPodcast = $conn->query($sql_ultimosPodcast);

                if ($result_ultimosPodcast->num_rows > 0) {
                    while($row = $result_ultimosPodcast->fetch_assoc()) {
                        echo '
                        
                                <div class="mr-3 celu-card">
                                    <div class="celu-divImgTop">
                                        <img class="card-img-top" src="'.$row['foto'].'" alt="'.$row['nombre'].'">
                                    </div>
                                    <div class="card-body celu-cardBody">
                                        <hp class="text-white text-center" style="font-size: 1rem">'.$row['nombre'].'</hp>
                                    </div>
                                </div>
                        
                        ';
                    }
                }
            ?>

        </div>
    </div>

    <h4 class="text-white col-12 mb-3 mt-5 text-center">Programas en vivo</h4>
    <div class="container celu-scroll_horizontal">
        <div class="row text-center flex-nowrap">

            <?php
                $sql_ultimosPodcast = "SELECT * FROM `podcast` ORDER BY fecha DESC LIMIT 6";
                $result_ultimosPodcast = $conn->query($sql_ultimosPodcast);

                if ($result_ultimosPodcast->num_rows > 0) {
                    while($row = $result_ultimosPodcast->fetch_assoc()) {
                        echo '
                        
                                <div class="mr-3 celu-card">
                                    <div class="celu-divImgTop">
                                        <img class="card-img-top" src="'.$row['foto'].'" alt="'.$row['nombre'].'">
                                    </div>
                                    <div class="card-body celu-cardBody">
                                        <hp class="text-white text-center" style="font-size: 1rem">'.$row['nombre'].'</hp>
                                    </div>
                                </div>
                        
                        ';
                    }
                }
            ?>

        </div>
    </div>

    <div class="mt-5 mb-5">.</div>

    <script src="src/js/jquery-3.3.1.slim.min.js"></script>
    <script src="src/js/popper.min.js"></script>
    <script src="src/js/bootstrap.min.js"></script>
    
</body>
</html>