<html>

<head>
    <meta charset="utf-8">
    <?php global $bootstrap; echo($bootstrap);?>
</head>
<header>
    <nav class="navbar navbar-light bg-light">
        <div class="container-fluid">
            <a href="index.php" class="btn btn-primary" >Retour accueil</a>
        </div>
    </nav>
</header>
<body>

    <div class="container-md">
        <form action="index.php?action=admin" method="POST" >
            <div class="mb-3">
                <h2>Connexion</h2>
                <p><strong>Veuillez vous connecter pour continuer : </strong></p>

                <label class="form-label"><b>Nom d'utilisateur</b></label>
                <input class="form-control" type="text" placeholder="Entrer le nom d'utilisateur" name="username" required>
                <br>
                <label class="form-label"><b>Mot de passe</b></label>
                <input class="form-control" type="password" placeholder="Entrer le mot de passe" name="password" required>
                <br>
                <label class="form-label"><b>Domaine</b></label>
                <select class="form-select" name="domain" required>
                    <option value="iutClermont">IUT de Clermont</option>
                    <option value="home">Home</option>
                </select>
                <br>
                <input class="btn btn-primary" type="submit" id='submit' value='Connexion' >
                <?php
                if(!empty($_REQUEST["erreur"])){
                    $err = $_REQUEST['erreur'];
                    if($err==1)
                        echo "<p style='color:red'>Utilisateur ou mot de passe incorrect</p>";
                }
                ?>
            </div>
        </form>
    </div>

</body>
</html>
