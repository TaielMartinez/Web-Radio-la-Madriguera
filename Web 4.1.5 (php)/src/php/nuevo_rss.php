<?php

    $json = $_POST['json'];

    $imgLink = 'https://radiolamadriguera.com/img/podcast/'.$json['nombre'];
    $fecha = date(DATE_RFC2822);

    $doc = new DOMDocument('1.0');
    $doc->formatOutput = true;
    $rss = $doc->appendChild($doc->createElement('rss'));
            $xmlns_dc = $rss->appendChild($doc->createAttribute('xmlns:dc'));
                $xmlns_dc->value = 'http://purl.org/dc/elements/1.1/';
            $xmlns_content = $rss->appendChild($doc->createAttribute('xmlns:content'));
                $xmlns_content->value = 'http://purl.org/rss/1.0/modules/content/';
            $xmlns_atom = $rss->appendChild($doc->createAttribute('xmlns:atom'));
                $xmlns_atom->value = 'http://www.w3.org/2005/Atom';
            $version = $rss->appendChild($doc->createAttribute('version'));
                $version->value = '2.0';
            $xmlns_itunes = $rss->appendChild($doc->createAttribute('xmlns:itunes'));
                $xmlns_itunes->value = 'http://www.itunes.com/dtds/podcast-1.0.dtd';
            $xmlns_anchor = $rss->appendChild($doc->createAttribute('xmlns:anchor'));
                $xmlns_anchor->value = 'https://anchor.fm/xmlns';
        $channel = $rss->appendChild($doc->createElement('channel'));
            $title = $channel->appendChild($doc->createElement('title'));
                $title->appendChild($doc->createTextNode($json['nombre']));
            $description = $channel->appendChild($doc->createElement('description'));
                $description->appendChild($doc->createTextNode($json['descripcion']));
            $link = $channel->appendChild($doc->createElement('link'));
                $link->appendChild($doc->createTextNode('https://radiolamadriguera.com/'));
            $image = $channel->appendChild($doc->createElement('image'));
                $url = $image->appendChild($doc->createElement('url'));
                    $url->appendChild($doc->createTextNode($imgLink));
                $title = $image->appendChild($doc->createElement('title'));
                    $title->appendChild($doc->createTextNode($json['nombre']));
                $link = $image->appendChild($doc->createElement('link'));
                    $link->appendChild($doc->createTextNode('https://radiolamadriguera.com/'));
            $generator = $channel->appendChild($doc->createElement('generator'));
                $generator->appendChild($doc->createTextNode('Radio la madriguera'));
            $lastBuildDate = $channel->appendChild($doc->createElement('lastBuildDate'));
                $lastBuildDate->appendChild($doc->createTextNode($fecha));
            $atom = $channel->appendChild($doc->createElement('atom:link'));
                $href = $atom->appendChild($doc->createAttribute('href'));
                    $href->value = 'https://radiolamadriguera.com/podcast/'.$json['nombre'].'.xml';
                $rel = $atom->appendChild($doc->createAttribute('rel'));
                    $rel->value = 'self';
                $type = $atom->appendChild($doc->createAttribute('type'));
                    $type->value = 'application/rss+xml';
            $author = $channel->appendChild($doc->createElement('author'));
                $author->appendChild($doc->createTextNode('Radio La Madriguera'));
            $copyright = $channel->appendChild($doc->createElement('copyright'));
                $copyright->appendChild($doc->createTextNode('Radio La Madriguera'));
            $language = $channel->appendChild($doc->createElement('language'));
                $language->appendChild($doc->createTextNode('es-ar'));
            $atom = $channel->appendChild($doc->createElement('atom:link'));
                $rel = $atom->appendChild($doc->createAttribute('rel'));
                    $rel->value = 'hub';
                $href = $atom->appendChild($doc->createAttribute('href'));
                    $href->value = 'https://pubsubhubbub.appspot.com/';
            $itunes = $channel->appendChild($doc->createElement('itunes:author'));
                $itunes->appendChild($doc->createTextNode('Radio La Madriguera'));
            $itunes = $channel->appendChild($doc->createElement('itunes:summary'));
                $itunes->appendChild($doc->createTextNode($json['descripcion']));
            $itunes = $channel->appendChild($doc->createElement('itunes:type'));
                $itunes->appendChild($doc->createTextNode('episodic'));
            $itunes_owner = $channel->appendChild($doc->createElement('itunes:owner'));
                $itunes_name = $itunes_owner->appendChild($doc->createElement('itunes:name'));
                    $itunes_name->appendChild($doc->createTextNode('Radio La Madriguera'));
                $itunes_email = $itunes_owner->appendChild($doc->createElement('itunes:email'));
                    $itunes_email->appendChild($doc->createTextNode('radiolamadriguera@gmail.com'));
            $itunes = $channel->appendChild($doc->createElement('itunes:explicit'));
                $itunes->appendChild($doc->createTextNode('No'));
            $itunes = $channel->appendChild($doc->createElement('itunes:category'));
                $text = $itunes->appendChild($doc->createAttribute('text'));
                    $text->value = 'Music &amp; Technology';
            $itunes = $channel->appendChild($doc->createElement('itunes:image'));
                $href = $itunes->appendChild($doc->createAttribute('href'));
                    $href->value = $imgLink;

    $doc->save('../../podcast/'.$json['nombre'].'.xml');


?>