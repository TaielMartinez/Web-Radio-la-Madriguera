<?php 

    error_reporting(0);

    $inborrable = $SQLTable["inborrable"];
    $no_agregar = $SQLTable["no_agregar"];
    $order = $SQLTable["order"];
    $table = $SQLTable["table"];
    $conn = $SQLTable["mysqli"];
    // $table = "programas";

?>



<div> 
    <table id="table_<?php echo $table ?>" class="table table-bordered table-striped">
        <thead>
            <tr>
                <?php
                    if($order){
                        $sql = "SELECT * FROM $table ORDER BY $order";
                    } else {
                        $sql = "SELECT * FROM $table ORDER BY id DESC";
                    };
                    $result = mysqli_query($conn, $sql);
                    
                    $i2 = 3;
                    $row = array_keys(mysqli_fetch_array($result));
                    
                    //echo '<pre>'; print_r(array_keys($row)); echo '</pre>';
                    //echo '<pre>'; print_r($result); echo '</pre>';

                    $col = mysqli_field_count($conn);
                    $nom_col = "";
                    $type = "";

                    for ($i = 1; $i <= $col-1; $i++) {
                        echo '<th>'.$row[$i2].'</th>';
                        $nom_col = $nom_col.'-/-'.$row[$i2];
                        $i2++;
                        $i2++;
                    }

                    echo '<th></th>';

                    $info_campo = $result->fetch_fields();
                    foreach ($info_campo as $valor) {
                        $type = $type.'-/-'.$valor->type;
                    }

                    //echo $type;

                    $nom_col_array = explode( '-/-', $nom_col );
                
                ?>
            </tr>
        </thead>
        <tbody>
            <?php
                if($inborrable){
                    $borrar = '';
                } else {
                    $borrar = '<i class="fa fa-trash fa-lg"></i>';
                }
                $result = mysqli_query($conn, $sql);
                while($row = mysqli_fetch_array($result))
                {
                    echo '<tr id="Fila'.$row["id"].$table.'">';
                    for ($i = 1; $i <= $col-1; $i++) {
                        if($nom_col_array[$i] == 'foto' || $nom_col_array[$i] == 'img') {
                            echo '<td id="TD'.$i.$row["id"].$table.'"><img src='.$row[$i].' alt="Imagen no valida" height="90"/> </td>';
                        } else {
                            echo '<td id="TD'.$i.$row["id"].$table.'">'.$row[$i].'</td>';
                        }
                    }
                    echo '
                            <td>
                                <span style="display: block;" id="IconBase'.$row["id"].$table.'">
                                    <a href="#" onclick="e(`edit`,'.$row["id"].', `'.$table.'`, '.($col-1).', `'.$nom_col.'`)"><i class="fa fa-edit fa-lg"></i></a>
                                    <a href="#" onclick="e(`dell`,'.$row["id"].', `'.$table.'`)">'.$borrar.'</a>
                                </span>
                                <span style="display: none;" id="ConfBorrar'.$row["id"].$table.'">
                                    <button type="button" class="btn btn-success" onclick="e(`dell_S`,'.$row["id"].', `'.$table.'`)">borrar</button>
                                    <button type="button" class="btn btn-danger" onclick="e(`dell_N`,'.$row["id"].', `'.$table.'`)">no borrar</button>
                                </span>
                                <span style="display: none;" id="EditIcon'.$row["id"].$table.'">
                                    <button onclick="e(`editGuardar`,'.$row["id"].', `'.$table.'`, '.($col-1).', `'.$nom_col.'`)" type="button" class="btn btn-success">guardar</button>
                                </span>
                            </td>
                        </tr>';
                }
            ?>
        </tbody>
    </table>
    <?php 
        if($no_agregar){} else {
            echo '<button onclick="e(`add`,'.$result->num_rows.', `'.$table.'`)" type="button" class="btn btn-success"><i class="fa fa-plus fa-lg"></i></button>';
        }
    ?>
</div>






<script>

    function e(action, id, table, col_cant, row){
        console.log('e:'+action+id+table+col_cant+row)
        switch (action) {
            case 'edit':
                edit(id, table, col_cant, row);
                break;

            case 'editGuardar':
                editGuardar(id, table, col_cant, row);
                break;

            case 'add':
                add(id, table);
                break;

            case 'dell':
                dell(id, table);
                break;

            case 'dell_S':
                dell_S(id, table);
                break;

            case 'dell_N':
                dell_N(id, table);
                break;
        }


        function edit(id, table, col_cant, type) {
            let column = row.split('-/-')
            console.log(column)
            for (let i = 1; i <= col_cant; i++) {
                if(column[i] == 'foto' || column[i] == 'img'){
                    $("#TD"+i+id+table).html('<input type="file" name="file_to_upload" id="file_to_upload">')
                } else {
                    text = $("#TD"+i+id+table).text()
                    $("#TD"+i+id+table).html('<input type="text" name="" id="TDInput'+i+id+table+'">')
                    $("#TDInput"+i+id+table).val(text)
                }
            }
            $("#IconBase"+id+table).hide()
            $("#EditIcon"+id+table).show()
        }

        function editGuardar(id, table, col_cant, row, type) {
            let column = row.split('-/-')
            for (let i = 1; i <= col_cant; i++) {
                if(column[i] == 'foto' || column[i] == 'img'){
                    if($("#file_to_upload").val() != ""){
                        var file_data = $('#file_to_upload').prop('files')[0];
                        var form_data = new FormData();
                
                        form_data.append('file', file_data);
                
                        $.ajax({
                            url: "src/php/convertTmage.php", 
                            dataType: 'text',  
                            cache: false,
                            contentType: false,
                            processData: false,
                            data: form_data,
                            type: 'post',
                            success: function(data){
                                $("#TD"+i+id+table).html(`<img src='`+data+`' height="90"/>`)
                                $("#file_to_upload").val("")
                                $.ajax({
                                    url: "src/php/db_sql.php",
                                    method: "POST",
                                    data: { sql : "UPDATE `"+table+"` SET `"+column[i]+"` = '"+data+"' WHERE `"+table+"`.`id` = "+id }
                                })
                            }
                        });
                    } else {
                        $("#TD"+i+id+table).html(`<img src='' height="90"/>`)
                    }
                } else {
                    text = $("#TDInput"+i+id+table).val()
                    $("#TD"+i+id+table).html(text)

                    $.ajax({
                        url: "src/php/db_sql.php",
                        method: "POST",
                        data: { sql : "UPDATE `"+table+"` SET `"+column[i]+"` = '"+text+"' WHERE `"+table+"`.`id` = "+id }
                    })
                }
                
            }
            
            

            $("#IconBase"+id+table).show()
            $("#EditIcon"+id+table).hide()
        }


        function add(num, table) {

            //console.log('add')
            //console.log(num)
            //console.log(table)


            $.ajax({
                url: "src/php/db_sql.php",
                method: "POST",
                data: { sql : "INSERT INTO `"+table+"` (`id`) VALUES (NULL)" },
                success:function(data) {
                    //console.log("sus"+data);
            },
            error:function(data) {
                //console.log("err"+data);
            }
            })
            location.reload();

        }

        function dell(id, table) {
            $("#IconBase"+id+table).hide()
            $("#ConfBorrar"+id+table).show()
        }

        function dell_S(id, table) {
            $("#IconBase"+id+table).show()
            $("#ConfBorrar"+id+table).hide()
            $("#Fila"+id+table).hide()

            $.ajax({
                url: "src/php/db_sql.php",
                method: "POST",
                data: { sql : "DELETE FROM `"+table+"` WHERE `"+table+"`.`id` = "+id }
            })

        }

        function dell_N(id, table) {
            $("#IconBase"+id+table).show()
            $("#ConfBorrar"+id+table).hide()
        }

    }

</script>