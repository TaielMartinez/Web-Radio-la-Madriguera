<?php

    include('db_connect.php');

    $result = mysqli_query($conn, $_POST["sql"]);


    if (!$result) {
        die('Consulta no válida: '.$_POST["sql"] . mysqli_error($conn));
    }

    return $result;
    echo 'lalala'.$result;

?>