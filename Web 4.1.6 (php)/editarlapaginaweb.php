<!DOCTYPE html>
<?php

if(isset($_POST['pass']) && $_POST["pass"]!="m1N2r34@"){
    die("Contraseña incorrecta");
} else if(!isset($_POST['pass'])){

    ?>

    <head>
    <title>login</title>
    </head>
    <body>
        <form action="/editarlapaginaweb.php" method="POST">
            <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input type="password" class="form-control" id="exampleInputPassword1" name="pass" placeholder="Password">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </body>
    </html>

<?php
die();
}


    include('src/php/db_connect.php');
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Editar Pagina</title>
</head>
<body>



<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css" integrity="sha256-46qynGAkLSFpVbEBog43gvNhfrOj+BmwXdxFgVK/Kvc=" crossorigin="anonymous" />
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="src/css/styleEdit.css">
<script src="src/js/editar.js"></script>



<div class="container bg-light">
    <h1 class="text-center" style="padding-top: 4%">Editar Pagina Web</h1>

    <div>
    
        <h2>Carusel</h2>

        <div class="mb-5">
        <?php
            //$ficheros  = scandir('/podcast');
            //print_r($ficheros);
        ?>
        </div>

    </div>

    <div>
    
        <h2>Carusel</h2>

        <div class="mb-5">
            <?php 
                $SQLTable = array(
                    "table" => "carusel",
                    "mysqli" => $conn,
                );
                include('src/php/SQLTable.php');
            ?>
        </div>

    </div>
    <div>
<!--
        <h2>Programas</h2>

        <div class="mb-5">
            <?php 
                $SQLTable = array(
                    "table" => "programas",
                    "mysqli" => $conn,
                );
                include('src/php/SQLTable.php');
            ?>
        </div>
-->
    
    </div>
    <div>

        <h2>Tarjetas Venta</h2>

        <div class="mb-5">
            <?php 
                $SQLTable = array(
                    "table" => "tarjetasventa",
                    "mysqli" => $conn,
                );
                include('src/php/SQLTable.php');
            ?>
        </div>
    
    </div>
    <div>

        <h2>Textos</h2>

        <div class="mb-5">
            <?php 
                $SQLTable = array(
                    "table" => "textos",
                    "mysqli" => $conn,
                    "inborrable" => true,
                    "no_agregar" => true
                );
                include('src/php/SQLTable.php');
            ?>
        </div>
    
    </div>
    <div>

        <h2>Redes Sociales</h2>

        <div class="mb-5">
            <?php 
                $SQLTable = array(
                    "table" => "redessociales",
                    "mysqli" => $conn,
                );
                include('src/php/SQLTable.php');
            ?>
        </div>
    
    </div>

    <div>

        <h2>Grilla</h2>

        <div class="mb-5">

        <?php 
            $SQLTable = array(
                "table" => "grilla",
                "mysqli" => $conn,
                "order" => "hs"
            );
            include('src/php/SQLTable.php');
        ?>
        </div>
    
    </div>


</div>


    
</body>
</html>