<?php


foreach ($tab_de_news as $value) {
    echo("<h2>" . $value->getTitle() . "</h2>");
    echo("<p>" . $value->getDescription() . "</p>");
    echo("<a href='" . $value->getLink() . "'>" . $value->getLink() . "</a>");
    echo("<p>" . $value->getPubDate() . "</p>");
}


?>