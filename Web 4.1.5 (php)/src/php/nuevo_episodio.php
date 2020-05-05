<?php

    include('db_connect.php');

    $json =  $_POST["sql"];

    //$xml = simplexml_load_file("https://anchor.fm/s/9d6811c/podcast/rss");
    //$xml = json_encode($xml);

    print_r($json);

    $data = "";
    $data2 = "";
    $fecha = date("Y-m-d H:i:s");

    if($json['nombre']){
        $data = $data."`nombre`,";
        $data2 = $data2."'".$json["nombre"]."',";
    }
    if($json['id_programa']){
        $data = $data."`id_programa`,";
        $data2 = $data2."'".$json["id_programa"]."',";
    }
    if($json['audio']){
        $data = $data."`link`,";
        $data2 = $data2."'".$json["audio"]."',";
    }
    if($json['foto']){
        $data = $data."`foto`,";
        $data2 = $data2."'".$json["foto"]."',";
    }

    if($json['episodio']){
        $data = $data."`episodio`,";
        $data2 = $data2."'".$json["episodio"]."',";
    }

    if($json['tipo']){
        $data = $data."`tipo`,";
        $data2 = $data2."'".$json["tipo"]."',";
    }

    $data = $data."`fecha`,";
    $data2 = $data2."'".$fecha."',";

    $data = substr($data, 0, -1);
    $data2 = substr($data2, 0, -1);

    $data3 = "INSERT INTO `podcast` (`id`,".$data.") VALUES (NULL,".$data2.")";

    $result = mysqli_query($conn, $data3);
    
    //echo $data3;


    if (!$result) {
        echo "error: ".mysqli_error($conn);
        die();
    }

    echo 'completo: '.$result;

?>