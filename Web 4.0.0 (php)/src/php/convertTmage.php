<?php
if ( 0 < $_FILES['file']['error'] ) {
    echo 'Error: ' . $_FILES['file']['error'] . '<br>';
}
else
{
    $imagePath = $_FILES['file']['tmp_name'];
	$ImageType = pathinfo($imagePath, PATHINFO_EXTENSION);
	$data = file_get_contents($imagePath);
	$dataURI = 'data:image/' . $ImageType . ';base64,' . base64_encode($data);
	echo $dataURI;
}
?>