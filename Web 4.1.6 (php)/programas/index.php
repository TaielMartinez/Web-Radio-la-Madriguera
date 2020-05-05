<!DOCTYPE html>

<?php
    include('../src/php/db_connect.php');
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Madriguera - El Aire es Libre</title>
</head>
<body>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css" integrity="sha256-46qynGAkLSFpVbEBog43gvNhfrOj+BmwXdxFgVK/Kvc=" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="../src/css/style.css">
    <link rel="stylesheet" href="../src/css/styleProgramas.css">


    <nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top">
        <a class="navbar-brand" href="#inicio">
            <img src="../src/img/logo.jpg" width="40" height="40" class="d-inline-block align-top mr-3" alt=""></img>
            <span class="title">Radio La Madriguera</span>
            </a>
        <div class="collapse navbar-collapse position-relative" id="navbarText">
            <ul class="navbar-nav mr-auto">
            <li class="nav-item active card mr-1">
                <a class="nav-link" href="/#vivo">Escuchar en Vivo <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item card mr-1">
                <a class="nav-link" href="?view=lista">Programas</a>
            </li>
            <li class="nav-item card mr-1">
                <a class="nav-link" href="?view=grilla">Grilla</a>
            </li>
            <li class="nav-item card mr-1">
                <a class="nav-link" href="/#venta">Realizar radio!</a>
            </li>
            </ul>
            <span class="navbar-text">
            </span>
        </div>
    </nav>

    
    <?php

        if(isset($_GET["programa"]) && $_GET["programa"] > 0){ // hay programa
            programaEspecifico($conn);
        } else if (isset($_GET["view"])){  // hay view
            if ($_GET["view"] == "grilla"){
                programasGrilla($conn);
            } else {
                programasLista($conn);
            }
        } else {
            programasLista($conn);
        }
    
    ?>

    <?php

        function programasLista ($conn){
            $sql_programas = "SELECT * FROM `programas`";
            $result_programas = $conn->query($sql_programas);
            echo '

                <div class="container bg-white" id="programas_container">

                    <h1 id="programas_div" class="text-center mt-2">Programas</h1>
                    <h4 class="mb-5 text-center">En Radio la Madriguera</h4>

                    <ul class="nav nav-pills nav-fill">
                        <li class="nav-item">
                            <a class="nav-link active" href="?view=fila">Lista</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="?view=grilla">Grilla</a>
                        </li>
                    </ul>

                    <div class="list-group mt-4">';

            if ($result_programas->num_rows > 0) {
                while($row = $result_programas->fetch_assoc()) {

                    echo '
                        <a href="?programa='.$row["id"].'" class="list-group-item list-group-item-action flex-column align-items-start mb-2">
                        <div class="row">
                            <div class="col-xs-12 col-sm-6 col-md-4 text-center">
                                <img class="img-fluid rounded mx-auto d-block mt-3 mb-3" src="../../../'.$row["foto"].'" alt="" height="50%" width="50%">
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-6">
                                <div class="d-flex w-100 justify-content-between">
                                <h4 class="mb-3 text-center">'.$row["nombre"].'</h4><br>
                                
                                </div>
                                <p class="mb-1 text-justify">'.$row["descripcion"].'</p>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-2 text-right">
                                <small class="float-right mt-2">'.$row["subtitulo"].'</small>
                            </div>
                        </div>
                        
                        </a>
                    ';
                    }
                }

                echo '</div>';
        };

        function programasGrilla ($conn){
            $id = "";
            $sql_programa = "SELECT * FROM programas where id= '".$id."'";
            $result_programa = $conn->query($sql_programa);
            $row = $result_programa -> fetch_array(MYSQLI_ASSOC);
            echo '

                <div class="container bg-white" id="programas_container">

                    <h1 id="programas_div" class="text-center mt-2">Programas</h1>
                    <h4 class="mb-5 text-center">En Radio la Madriguera</h4>

                    <ul class="nav nav-pills nav-fill">
                        <li class="nav-item">
                            <a class="nav-link" href="?view=fila">Lista</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="?view=grilla">Grilla</a>
                        </li>
                    </ul>

                    <div class="list-group mt-4">';

                    include('../src/php/grilla.php');

                echo '</div>';
        };

        function programaEspecifico ($conn) {
            $id = $_GET["programa"];
            $sql_programa = "SELECT * FROM programas where id= '".$id."'";
            $result_programa = $conn->query($sql_programa);
            $row = $result_programa -> fetch_array(MYSQLI_ASSOC);
            
            echo '
                <div class="container bg-white" id="programas_container">
                <div class="row" id="programas_div">
                    <div class="col-xs-12 col-sm-12 col-md-3 float-left mt-2">
                        <img class="img-fluid rounded float-left" src="../../../'.$row["foto"].'" alt="" height="100%" width="100%">
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-8 ml-5">
                        <h2 class=" mt-5">'.$row["nombre"].'</h2>
                ';

                       if($row["descripcionLarga"]){
                        echo '<p class="mt-4">'.$row["descripcionLarga"].'</p>';
                       } else {
                        echo '<p class="mt-4">'.$row["descripcion"].'</p>';
                       } 
                echo '
                        <P>'.$row["subtitulo"].'</P>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 mt-5">
                        <div class="mt-5">
            ';
            include('../src/php/grilla.php');
            echo '
                        </div>
                    </div>
                </div>
            ';
        }

    ?>

    <div>
        <div class="row mt-5">
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
    
</body>
</html>