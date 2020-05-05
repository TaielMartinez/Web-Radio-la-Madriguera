<?php

    include('db_connect.php');

    $json = $_POST['json'];
    $rss = $_POST['rss'];

    $imgLink = 'https://radiolamadriguera.com/img/podcast/'.$json['nombre'];
    $xml_anchor = simplexml_load_file("https://anchor.fm/s/9d6811c/podcast/rss");
    $fecha = date(DATE_RFC2822);
    $foto = "";
    //if()

    $sql_programas = "SELECT rss FROM `programas` WHERE id = ".$json['id_programa'];
    $result_programas = mysqli_query($conn, $sql_programas);
    $xml_file;

    while($row = $result_programas->fetch_assoc()) {
        $xml_file = $row['rss'];
    }

    $xml = simplexml_load_file("../../podcast/".$xml_file);
        $item = $xml->channel[0]->addChild("item");
            $title = $item->addChild('title', $json["nombre"]);
            $description = $item->addChild('description', $json["description"]);
            $link = $item->addChild('link', 'https://radiolamadriguera.com/');
            //$rss['enclosure']['@attributes']['url']
            $guid = $item->addChild('guid', $rss['guid']);
            $dc_creator = $item->addChild('dc:creator', 'Radio La Madriguera');
            $pubDate = $item->addChild('pubDate', $rss['pubDate']);
            $enclosure = $item->addChild('enclosure');
                $enclosure->addAttribute('url', $rss['enclosure']['@attributes']['url']);
                $enclosure->addAttribute('length', $rss['enclosure']['@attributes']['length']);
                $enclosure->addAttribute('type', $rss['enclosure']['@attributes']['type']);
            $itunes_summary = $item->addChild('itunes:summary', '&lt;p&gt;a&lt;/p&gt;');
            $itunes_explicit = $item->addChild('itunes:explicit', 'No');
            $itunes_duration = $item->addChild('itunes:duration', "");
            $itunes_image = $item->addChild('itunes:image', '');
            $itunes_episodeType = $item->addChild('itunes:episodeType', 'full');

    $xml->asXml('../../podcast/'.$xml_file);
    $output = $xml->asXML();

    print_r();

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