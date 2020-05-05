<?php

    include('db_connect.php');

    $json = $_POST['json'];

    $imgLink = 'https://radiolamadriguera.com/img/podcast/'.$json['nombre'];
    $fecha = date(DATE_RFC2822);

    $sql_programas = "SELECT rss FROM `programas` WHERE id = ".$json['id_programa'];
    $result_programas = mysqli_query($conn, $sql_programas);
    $xml_file;

    while($row = $result_programas->fetch_assoc()) {
        $xml_file = $row['rss'];
    }

    $xml = simplexml_load_file("../../podcast/".$xml_file);
        $item = $xml->channel[0]->addChild("item");
            $item->addAttribute("text", "geography");
/*
    $dom=new DOMDocument();
    $dom->load("../../podcast/".$xml_file);
    echo ($dom);
    $root=$dom->documentElement;

    $channel = $channel->getElementsByTagName('channel');
    $item = $channel->appendChild($doc->createElement('item'));
        $itunes->appendChild($doc->createTextNode('No'));

    echo $dom->saveXML();
*/
?>