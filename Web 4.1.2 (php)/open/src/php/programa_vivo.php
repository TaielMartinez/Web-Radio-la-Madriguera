<?php

include('db_connect.php');

date_default_timezone_set('America/Argentina/Buenos_Aires');
    include('diaSemana.php');
    $sq_name = $diaSemana.'-name';
    $sq_id = $diaSemana.'-id';
    $sq_hora = date('H');
    $programa_id = "";
    $programa;

    $sql_grilla = "SELECT * FROM `grilla` WHERE hs LIKE '".$sq_hora."%' ORDER BY hs ASC";
    $result_grilla = $conn->query($sql_grilla);

    if ($result_grilla->num_rows > 0) {
        while($row = $result_grilla->fetch_assoc()) {
            //print_r($row);
            $a = $row['hs'];
            $b = explode(":", $a);
            $c = $b[1];
            //echo $c;
            //echo date('i');
            if($c <= (date('i'))){
                $programa_id = $row[$sq_id];
                //echo $sq_id;
            }
        }
    }

    //echo $programa_id;
    $sql_programa = "SELECT * FROM `programas` WHERE id = '".$programa_id."'";
    $result_programa = $conn->query($sql_programa);

    
    while($row = $result_programa->fetch_assoc()) {
        $programa = $row;
        //print_r($row);
    }

    if($programa == null){
        echo 'musica';
    } else {
        echo json_encode($programa);
    }

?>