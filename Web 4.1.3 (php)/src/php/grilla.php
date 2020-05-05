<?php

        $sql_grilla = "SELECT * FROM `grilla` ORDER BY hs";
        $result_grilla = mysqli_query($conn, $sql_grilla);
        $dias_semana = array(
            0  => 'lunes',
            1 => 'martes',
            2 => 'miercoles',
            3 => 'jueves',
            4 => 'viernes',
            5 => 'sabado',
            6 => 'domingo',
        );

        echo '
            <table class="table table-responsive table-dark">
            <thead>
                <tr>
                <th scope="col">hs</th>
                <th scope="col">Lunes</th>
                <th scope="col">Martes</th>
                <th scope="col">Miercoles</th>
                <th scope="col">Jueves</th>
                <th scope="col">Viernes</th>
                <th scope="col">Sabado</th>
                <th scope="col">Domingo</th>
                </tr>
            </thead>
            <tbody>
        ';
        while($row = $result_grilla->fetch_assoc()) {
            echo '
            <tr>
                <th scope="row">'.$row["hs"].'</th>
            ';

            for ($i=0; $i < sizeof($dias_semana); $i++) {
                $name = $dias_semana[$i]."-name";
                $dia_id = $dias_semana[$i]."-id";
                
                if($row[$dia_id] == $id){
                    echo '<td>
                            <a style="color:#ff9757;" href="?programa='.$row[$dia_id].'">'
                            .$row[$name].
                            '</a>
                        </td>';
                } else {
                    echo '<td>
                            <a style="color:#b3b3b3;" href="?programa='.$row[$dia_id].'">'
                            .$row[$name].
                            '</a>
                        </td>';
                }
            }

            /*
            if($row["lunes-id"] == $id){
                echo '<td><a style="color:#ff9757;" href="?programa='.$row["lunes-id"].'">'.$row["lunes-name"].'</a></td>';
            } else {
                echo '<td><a href="?programa='.$row["lunes-id"].'">'.$row["lunes-name"].'</a></td>';
            }
            if($row["martes-id"] == $id){
                echo '<td><a style="color:#ff9757;" href="?programa='.$row["martes-id"].'">'.$row["martes-name"].'</a></td>';
            } else {
                echo '<td><a href="?programa='.$row["martes-id"].'">'.$row["martes-name"].'</a></td>';
            }
            if($row["miercoles-id"] == $id){
                echo '<td><a style="color:#ff9757;" href="?programa='.$row["miercoles-id"].'">'.$row["miercoles-name"].'</a></td>';
            } else {
                echo '<td><a href="?programa='.$row["miercoles-id"].'">'.$row["miercoles-name"].'</a></td>';
            }
            if($row["jueves-id"] == $id){
                echo '<td><a style="color:#ff9757;" href="?programa='.$row["jueves-id"].'">'.$row["jueves-name"].'</a></td>';
            } else {
                echo '<td><a href="?programa='.$row["jueves-id"].'">'.$row["jueves-name"].'</a></td>';
            }
            if($row["viernes-id"] == $id){
                echo '<td> <dstyle="color:#ff9757;"?programa= iv><a href="'.$row["viernes-id"].'">'.$row["viernes-name"].'</a></td>';
            } else {
                echo '<td><a href="?programa='.$row["viernes-id"].'">'.$row["viernes-name"].'</a></td>';
            }
            if($row["sabado-id"] == $id){
                echo '<td><a style="color:#ff9757;" href="?programa='.$row["sabado-id"].'">'.$row["sabado-name"].'</a></td>';
            } else {
                echo '<td><a href="?programa='.$row["sabado-id"].'">'.$row["sabado-name"].'</a></td>';
            }
            if($row["domingo-id"] == $id){
                echo '<td><a style="color:#ff9757;" href="?programa='.$row["domingo-id"].'">'.$row["domingo-name"].'</a></td>';
            } else {
                echo '<td><a href="?programa='.$row["domingo-id"].'">'.$row["domingo-name"].'</a></td>';
            }
            */

            echo '
            </tr>
            ';
        };
        echo '
            </tbody>
            </table>
            ';


?>