<?php  
//action.php
$connect = mysqli_connect('localhost', 'root', '', 'testing');

$input = filter_input_array(INPUT_POST);

$foto = mysqli_real_escape_string($connect, $input["foto"]);
$last_name = mysqli_real_escape_string($connect, $input["last_name"]);

if($input["action"] === 'edit')
{
 $query = "
 UPDATE carusel 
 SET foto = '".$foto."', 
 last_name = '".$last_name."' 
 WHERE id = '".$input["id"]."'
 ";

 mysqli_query($connect, $query);

}
if($input["action"] === 'delete')
{
 $query = "
 DELETE FROM tbl_user 
 WHERE id = '".$input["id"]."'
 ";
 mysqli_query($connect, $query);
}

echo json_encode($input);

?>