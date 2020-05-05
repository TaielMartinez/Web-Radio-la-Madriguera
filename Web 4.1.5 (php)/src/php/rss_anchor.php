<?php

    $xml = simplexml_load_file("https://anchor.fm/s/9d6811c/podcast/rss");
    $json = json_encode($xml);

    echo $json;

?>