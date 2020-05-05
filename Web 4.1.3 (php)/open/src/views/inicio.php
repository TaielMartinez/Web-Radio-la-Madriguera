<?php include('../php/db_connect.php') ?>

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
    <div class="btn btn-warning text-white" onclick="routes_vivo()">En Vivo</div>
    <div class="mt-5">Ultimos Episodios</div>
</h4>
<div class="container celu-scroll_horizontal">
    <div class="row text-center flex-nowrap">

        <?php
            $sql_ultimosPodcast = "SELECT * FROM `podcast` ORDER BY fecha DESC LIMIT 6";
            $result_ultimosPodcast = $conn->query($sql_ultimosPodcast);

            if ($result_ultimosPodcast->num_rows > 0) {
                while($row = $result_ultimosPodcast->fetch_assoc()) {
                    echo '
                    
                        <a class="mr-3 celu-card" onclick="routes_reproductor('.$row['id'].')">
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

        <a class="mr-3 celu-card" href="src">
            <div class="celu-divImgTop">
                <img class="card-img-top" src="src/img/mas.png" alt="Mostrar Mas">
            </div>
            <div class="card-body celu-cardBody">
                <hp class="text-white text-center" style="font-size: 1rem">Mostrar Todos</hp>
            </div>
        </a>

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