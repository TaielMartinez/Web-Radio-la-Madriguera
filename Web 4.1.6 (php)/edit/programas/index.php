<!DOCTYPE html>
<?php

if(isset($_POST['pass']) && $_POST["pass"]!="m1N2r34@"){
    die("Contraseña incorrecta");
} else if(!isset($_POST['pass'])){

    ?>

    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <head>
    <title>Login</title>
    </head>
    <body>
        <form action="" method="POST">
            <div class="form-group mt-3 ml-2">
                <input type="password" class="" id="exampleInputPassword1" name="pass" placeholder="Password">
                <button type="submit" class="btn btn-primary">Entrar</button>
            </div>
        </form>
    </body>
    </html>

<?php
die();
}


    include('../../src/php/db_connect.php');

?>



<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Madriguera - Edit Podcast</title>

    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="../../src/css/edit_podcast.css">

</head>
<body class="bg-dark">


    <div class="container mt-2 mb-5">

        <h1 class="text-center text-white">Editor de procast</h1>
    
        <div class="ml-3 mr-3 mt-5 pl-3 pr-3 pt-3 pb-3 card">
        
            <h3>Nuevo Programa</h3>

            <select class="new_tipo form-control">
                <option>Tipo</option>
                <option>Vivo</option>
                <option>Podcast</option>
                <option>Especial</option>
            </select>
            <br>

            <input class="new_titulo form-control" type="text" placeholder="Titulo">
            <br>

            <input class="new_subtitulo form-control" type="text" placeholder="Subtitulo">
            <br>

            <textarea class="new_descripcion form-control" rows="3" placeholder="Descripcion corta"></textarea>
            <br>

            <textarea class="new_descripcionlarga form-control" rows="5" placeholder="Descripcion larga"></textarea>
            <br>

            <div class="ml-3">
            
                <p class="mb-1">Redes Sociales (Links)</p>
                <input class="new_fb form-control" type="text" placeholder="Facebook">
                <input class="new_ig form-control" type="text" placeholder="Instagram">
                <input class="new_tw form-control" type="text" placeholder="Twitter">
                <input class="new_wp form-control" type="text" placeholder="Whatsapp">
                <input class="new_rc form-control" type="text" placeholder="RadioCut">
                <input class="new_yt form-control" type="text" placeholder="Youtube">
                <input class="new_pe form-control" type="text" placeholder="Personalizada (solo facu)">

            </div>
            <br>

            <input type="file" class="new_foto form-control-file" id="new_foto">
            <br>

            <div class="row text-center">
                <div class="col mt-2">
                    <button class="new_guardar btn btn-success btn-lg">Guardar</button>
                </div>
                <div class="col">
                    <button class="new_descargar btn btn-secondary btn-sm mt-2">Descargar Borrador</button>
                    <button class="new_importar btn btn-secondary btn-sm mt-2">Importar Borrador</button>
                </div>

                <input type="file" class="new_foto2 form-control-file mt-4 ml-4 mr-4 d-none">
            
            </div>
        
        </div>
    
    </div>





    <script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
    <script src="../../src/js/edit_nuevo_programas.js"></script>

</body>
</html>