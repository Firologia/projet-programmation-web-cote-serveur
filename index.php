<html>
<head>
    <meta charset="utf-8">
    <title>Projet n°2 Flux RSS</title>
    <?php include('header/linkBootstrap.php'); ?>
</head>

<body>
<header>
    <h1 class="maintitle"><a>Site</a></h1>
</header>

<div>
    <article class="listeNews">
        <?php

        require_once("classes/Connection.php");
        require_once("classes/News.php");
        require_once("classes/NewsGateway.php");


        try {
            $dsn='mysql:host=berlin.iut.local;dbname=dbjoartzet';
            $login='joartzet';
            $mdp='achanger';
            $con = new Connection($dsn,$login,$mdp);
            $tab_de_news = [];
            $query = 'SELECT * from news';
            $con->executeQuery($query,array());

            $results = $con->getResults();
            foreach ($results as $row){
                $tab_de_news[] = new News($row['title'], $row['description'], $row['link'], $row['guid'], $row['pubDate'], $row['category']);
            }
            require('vueNews.php');
        }
        catch(PDOException $e){
            $dsn="mysql:host=localhost;dbname=dbnews";
            $login='root';
            $mdp='achanger';
            $con = new Connection($dsn,$login,$mdp);
            $tab_de_news = [];
            $query = 'SELECT * from news';
            $con->executeQuery($query,array());

            $results = $con->getResults();
            foreach ($results as $row){
                $tab_de_news[] = new News($row['title'], $row['description'], $row['link'], $row['guid'], $row['pubDate'], $row['category']);
            }
            require('vueNews.php');
        }
        ?>
        <a href="logAdmin/logAdmin.php">Connexion Admin</a>
    </article>
</div>
</body>

</html>


