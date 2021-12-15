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
                <img src="resources/icon.png" alt="" width="50" height="50" class="d-inline-block align-text-center">
                <h4 class="my-auto d-inline-block align-text-top">Projet n°2 Flux RSS</h4>
            </a>
            <form class="d-flex my-auto align-text-center" method="post" action="index.php?action=showCateg" >
                <label class="form-label me-5"><b>Catégorie:</b></label>
                <select class="form-select me-5" name="categ">
                    <option value="none">Aucune</option>
                <option value="numerique">Numérique</option>
                <option value="mobileAndTelecom">Mobile & Télécom</option>
                <option value="operationSystem">Systeme exploitation</option>
                <option value="professional">Professionel</option>
                <option value="videoGames">Jeux vidéo</option>
                <option value="videoAudioPhoto">Video & Audio & Photo</option>
                <option value="cineSerieManga">Cine & Série & Manga</option>
                <option value="digitalNews">Digital News</option>
                <option value="specialize">Specialize</option>
                </select>
                <button type="submit" class="btn btn-outline-success me-5" >Rechercher</button>

            </form>
            <a class="btn btn-outline-success" href="index.php?action=logAdmin">LogAdmin</a>
        </div>
    </nav>
</header>

<div>
    <article class="listeNews">
        <?php

        global $dsn, $user, $pass, $con;


        try {
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


