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
    <link href="//code.jquery.com/ui/1.12.1/themes/smoothness/jquery-ui.css" rel="stylesheet"/>
    <link href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" rel="stylesheet"/>
    <link href="https://cdn.quilljs.com/1.0.0/quill.snow.css" rel="stylesheet"/>
    
    
    <link rel="stylesheet" href="../../src/css/edit_podcast.css">

    <?php include('../../src/php/db_connect.php'); ?>


</head>
<body class="bg-dark">


    <div class="container mt-2 mb-5">

        <h1 class="text-center text-white">Editor de procast</h1>
    
        <div class="ml-3 mr-3 mt-5 pl-3 pr-3 pt-3 pb-3 card">
        
            <h3>Nuevo Episodio</h3>

            <select class="new_tipo form-control">
                <option>Podcast</option>
                <?php 
                    $sql_programas = "SELECT * FROM `programas`";
                    $result_programas = $conn->query($sql_programas);
                    if ($result_programas->num_rows > 0) {
                        while($row = $result_programas->fetch_assoc()) {
                            $temp = $row['id'];
                            echo '<option>'.$temp.' - '.$row['nombre'].'</option>';
                        }
                    }
                
                ?>
            </select>
            <br>

            <input class="new_titulo form-control" type="text" placeholder="Titulo">
            <br>

            <input class="new_episodio form-control" type="number" placeholder="Episodio">
            <br>

            <!--
            <input type="text" id="fechaInicio" class="new_fecha" placeholder="  Fecha"></p>
            <br>
            -->

            <textarea class="new_descripcion form-control" rows="3" placeholder="Descripcion"></textarea>
            <br>

            <input type="file" class="new_foto form-control-file" id="new_foto">
            <br>

            <select class="new_audio form-control">
                <option>Audio</option>
            </select>
            <br>

            <div class="row text-center">
                <div class="col mt-2">
                    <button class="new_guardar btn btn-success btn-lg">Guardar</button>
                </div>
                <div class="col">
                    <button class="new_descargar btn btn-secondary btn-sm mt-2">Descargar Borrador</button>
                    <button class="new_importar btn btn-secondary btn-sm mt-2">Importar Borrador</button>
                </div>

                <input type="file" class="new_foto form-control-file mt-4 ml-4 mr-4 d-none">
            
            </div>
        
        </div>
    
    </div>





    <script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js" integrity="sha384-6khuMg9gaYr5AxOqhkVIODVIvm9ynTT5J4V1cfthmT+emCG6yVmEZsRHdxlotUnm" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
    <script src="../../src/js/edit_nuevo_episodio.js"></script>
    
    
    <script type="text/javascript">
        $(document).ready(function() {
            $("#fechaInicio").datepicker();
        });
    </script>

</body>
</html>