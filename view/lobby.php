<html>
<head>
    <meta charset="utf-8">
    <title>Projet n°2 Flux RSS</title>
    <?php global $bootstrap; echo($bootstrap);?>
</head>

<body>
<header>
    <nav class="navbar navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand my-auto " href="#">
                <img src="resources/logo.png" alt="" width="50" height="50" class="d-inline-block align-text-center">
                <h4 class="my-auto d-inline-block align-text-top">Projet n°2 Flux RSS</h4>
            </a>
            <form class="d-flex my-auto">
                <input class="form-control me-5" type="search" placeholder="Search" aria-label="Search">
                <a class="btn btn-outline-success" href="index.php?action=logAdmin">LogAdmin</a>
            </form>
        </div>
    </nav>
</header>

<div>
    <article class="listeNews mt-5 mx-auto">
        <?php

        global $dsn, $user, $pass, $con;


        try {


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

    </article>
</div>
</body>

</html>


