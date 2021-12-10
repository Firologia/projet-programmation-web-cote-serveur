<html>
<head>
    <title>Ajouter une news</title>
    <?php global $bootstrap; echo($bootstrap);?>
</head>
<header>


    <?php
    $pagecourante = basename(__FILE__);
    include(__DIR__.'/../../header/adminHeader.php');
    ?>
</header>
<body>
<div class="container">
<FORM METHOD="post" class="addNewsForm" action="index.php?action=addingNews" >
    <p>Titre :<input class="form-control" TYPE="text" NAME="title"></p>
    <p>Description :<textarea class="form-control" TYPE="text" NAME="description"></textarea></p>
    <p>Lien : <input class="form-control" TYPE="url" NAME="link"></p>
    <p>Date de publication : <input class="form-control" TYPE="datetime-local" NAME="pubDate"></p>
    <p>Catégorie : <select class="form-select" name="category"></p>
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
    <p><input type="submit" name="addNews" value="Ajouter"></p>
</FORM>
    <a href="AjoutNews.php?deconnexion=true"><span>Déconnexion</span></a>
</div>
</body>
<footer>

</footer>
</html>
