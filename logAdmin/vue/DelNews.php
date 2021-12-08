<html>
    <head>
        <title>Delete a News </title>
        <?php global $bootstrap; echo($bootstrap);?>
    </head>
    <header>
        <?php
        $pagecourante = basename(__FILE__);
        include('../../header/adminHeader.php'); ?>
    </header>
    <body>
        <div class="vstack gap-3">
            <div class="p-5">
            <form method="post" class="row g-3">
                <div class="col-auto">
                    <input type="text" readonly class="form-control-plaintext" id="staticEmail2" value="Recherche par catégorie :">
                </div>
                <div class="col-auto">
                    <select class="form-select">
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
                </div>
                <div class="col-auto">
                <input class="btn btn-primary mb-3" type="submit" name="findNews" value="Rechercher">
                </div>
            </form>
            </div>
            <div class="d-flex">
                <form method="post" action="../delNewsDB.php">
                    <input class="form-control" type="url" name="link">
                    <input class="btn btn-primary mb-3" type="submit" name="supprimer" value="Supprimer">
                    <?php
                    if(isset($_GET['erreur'])){
                        $err = $_GET['erreur'];
                        if($err==1 || $err==2)
                            echo "<p style='color:red'>Erreur lors de la suppression</p>";
                        if($err==0)
                            echo "<p style='color:green'>Suppression réussi</p>";
                    }
                    ?>
                </form>
            </div>
            <div class="p-2">
            <?php
                require_once("../../classes/Connection.php");
                require_once("../../classes/News.php");
                require_once('../../classes/NewsGateway.php');
                session_start();
                $username = $_SESSION['username'];
                $password = $_SESSION['password'];
                $dsn = $_SESSION['domain'];

                $con = new Connection($dsn, $username, $password);
                $tab_de_news = [];
                $query = 'SELECT * from news';
                $con->executeQuery($query,array());

                $results = $con->getResults();
                foreach ($results as $row){
                    $tab_de_news[] = new News($row['title'], $row['description'], $row['link'], $row['guid'], $row['pubDate'], $row['category']);
                }
                require('../../view/vueNews.php');


            ?>
    </body>
</html>
