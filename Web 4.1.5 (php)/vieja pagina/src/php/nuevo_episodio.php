<?php

    include('db_connect.php');

    $json =  $_POST["sql"];

    $data = "";
    $data2 = "";

    if($json['nombre']){
        $data = $data."`nombre`,";
        $data2 = $data2."'".$json["nombre"]."',";
    }
    if($json['id_programa']){
        $data = $data."`id_programa`,";
        $data2 = $data2."'".$json["id_programa"]."',";
    }
    if($json['link']){
        $data = $data."`link`,";
        $data2 = $data2."'".$json["link"]."',";
    }
    if($json['foto']){
        $data = $data."`foto`,";
        $data2 = $data2."'".$json["foto"]."',";
    }

    $data = substr($data, 0, -1);
    $data2 = substr($data2, 0, -1);

    $data3 = "INSERT INTO `podcast` (`id`,".$data.") VALUES (NULL,".$data2.")";

    $result = mysqli_query($conn, $data3);
    
    echo $data3;


    if (!$result) {
        echo "error: ".mysqli_error($conn);
        die();
    }

    echo 'completo: '.$result;

?>