<?php
$urls=[];
$urls[] = "https://www.journaldugeek.com/feed/"; /* adresse du flux RSS*/
$urls[] = "https://www.tomsguide.fr/feed/";
global $con;
$newsGateway = new NewsGateway($con);
foreach ($urls as $url){

    $xml = simplexml_load_file($url);

    foreach ($xml->channel->item as $item){

        $title=$item->title;                //Balise title
        $description=$item->description;    //Balise description
        $link=$item->link;                  //Balise link
        $guid=$item->guid;                  //Balise guid
        $XMLpubDate=$item->pubDate;            //Balise pubDate
        $pubDate=date("Y-m-d H:i:s", strtotime($XMLpubDate));

        $category=$item->category;             //Categorie
        if ($category == 'Actualité') $category = $item->category[1];
        switch($category) {

            case 'Hardware':
                $category = 'numerique';
                break;

            case 'apps':
                $category = 'digitalNews';
                break;

            case 'Offres, Bons plans':
                $category = 'promo';
                break;

            case 'Audio':
                $category = 'numerique';
                break;

            case 'Ordinateurs' :
                $category = 'numerique';
                break;

            case 'Téléviseur' :
                $category = 'numerique';
                break;

            case 'Buzz' :
                $category = 'socialMedia';
                break;

            case 'asus' :
                $category = 'numerique';
                break;

            case 'PSVR2' :
                $category = 'numerique';
                break;

            case 'Cinéma' :
                $category = 'cineSerieManga';
                break;

            case 'Montres connectées':
                $category = 'numerique';
                break;

            case 'Mercedes' :
                $category = 'professional';
                break;

            case 'Alexa' :
                $category = 'professional';
                break;

            case 'piratage' :
                $category = 'digitalNews';
                break;
        }

        try {
            $newsGateway->InsertNews($title,$description,$link,$guid,$pubDate,$category);
        } catch (PDOException $e){

        }

    }
}

