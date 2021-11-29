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


        ?>
        <a href="logAdmin/logAdmin.php">Admin</a>
    </article>
</div>
</body>

</html>


