<?php

    include('db_connect.php');

    if($_POST['id']){

        $sql = "SELECT * FROM `programas` WHERE id = ".$_POST['id'];
        $result = mysqli_query($conn, $sql);
        echo $_POST['id'];

        while($row = $result->fetch_assoc()) {
            echo json_encode($row);
        }

    } else {
        echo 'no id';
    }

?>