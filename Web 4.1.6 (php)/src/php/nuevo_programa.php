<?php

    include('db_connect.php');

    $json =  $_POST["sql"];

    $data = "";
    $data2 = "";

    if($json['nombre']){
        $data = $data."`nombre`,";
        $data2 = $data2."'".$json["nombre"]."',";
    }

    $data = $data."`rss`,";
    $data2 = $data2."'".$json["nombre"].".xml',";

    if($json['subtitulo']){
        $data = $data."`subtitulo`,";
        $data2 = $data2."'".$json["subtitulo"]."',";
    }
    if($json['descripcion']){
        $data = $data."`descripcion`,";
        $data2 = $data2."'".$json["descripcion"]."',";
    }
    if($json['foto']){
        $data = $data."`foto`,";
        $data2 = $data2."'"."img/".$json["foto"]."',";
    }
    if($json['redesSociales']){
        $data = $data."`redesSociales`,";
        $data2 = $data2."'".json_encode($json["redesSociales"])."',";
    }
    if($json['descripcionLarga']){
        $data = $data."`descripcionLarga`,";
        $data2 = $data2."'".$json["descripcionLarga"]."',";
    }
    if($json['tipo']){
        $data = $data."`tipo`,";
        $data2 = $data2."'".$json["tipo"]."',";
    }

    $data = substr($data, 0, -1);
    $data2 = substr($data2, 0, -1);

    $data3 = "INSERT INTO `programas` (`id`,".$data.") VALUES (NULL,".$data2.")";

    $result = mysqli_query($conn, $data3);
    
    echo $data3;


    if (!$result) {
        echo "error: ".mysqli_error($conn);
        die();
    }

    echo 'completo: '.$result;

?>