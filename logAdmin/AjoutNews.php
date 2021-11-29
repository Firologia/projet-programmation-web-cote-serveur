<html>
<head>
    <title>Ajouter une news</title>
    <?php include('../header/linkBootstrap.php'); ?>
</head>
<body>
<div class="containerForm">
<FORM METHOD="post" class="addNewsForm" action="addNewsDB.php" >
    <p>Titre :<input TYPE="text" NAME="title"></p>
    <p>Description :<input TYPE="text" NAME="description"></p>
    <p>Lien : <input TYPE="url" NAME="link"></p>
    <p>Date de publication : <input TYPE="datetime-local" NAME="pubDate"></p>
    <p>Catégorie : <select name="category"></p>
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
<?php
session_start();

if (isset($_GET['deconnexion'])){
    if ($_GET['deconnexion']==true){
        session_unset();
        header("location:../index.php");
    }
}
else if($_SESSION['username'] !== "" && $_SESSION['domain'] !== ""){
    $username = $_SESSION['username'];
    $domain = $_SESSION['domain'];
    echo "Utilisateur : $username <br> Domain : $domain";
}

?>
</footer>
</html>
