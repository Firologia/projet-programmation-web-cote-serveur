<?php

echo("
    <table class='table'>
        <thead>
            <tr>
                <th scope='col'>Titre</th>
                <th scope='col'>Lien</th>
                <th scope='col'>Date de publication</th>
            </tr>
        </thead>
        <tbody>
");
foreach ($tab_de_news as $value) {
    echo("
        <tr>
            <th scope='row'>".$value->getTitle()."</th>
            <th scope='row'><a href='". $value->getLink() ."'>" . $value->getLink() . "</a></th>
            <th scope='row'>". $value->getPubDate() ."</th>
        </tr>"
    );
}

echo("
        </tbody>
   </table>");


?>