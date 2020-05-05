<?php

    include 'db_connect.php';

    

    if ($_REQUEST['id']) {

        $id = $_REQUEST['id'];
    
        $row_podcast = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM podcast WHERE id = '$id'"));
        $id_programa = $row_podcast['id_programa'];
        $row_programa = mysqli_fetch_assoc(mysqli_query($conn, "SELECT nombre, tipo FROM programas WHERE id = '$id_programa'"));
        
        $result = array(
            "podcast"=>json_encode($row_podcast),
            "programa"=>json_encode($row_programa)
        );

        echo json_encode($result);
    
    }

?>