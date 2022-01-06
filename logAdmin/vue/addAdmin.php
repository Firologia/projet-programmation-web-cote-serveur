<html>
<head>
    <title>Ajouter un admin</title>
    <?php global $bootstrap; echo($bootstrap);?>
</head>
<header>
    <?php
    $pagecourante = basename(__FILE__);
    include(__DIR__.'/../../header/adminHeader.php');
    ?>
</header>

<div class="container">
    <FORM METHOD="post" class="addAdminForm" action="index.php?action=addingAdmin" >
        <p>Login :<input class="form-control" TYPE="text" NAME="logNewAdmin"></p>
        <p>Mot de passe:<input class="form-control" TYPE="password" NAME="passNewAdmin"></p>
        <p>Rôle :<select class="form-select" name="roleNewAdmin"></p>
            <option value="0">User</option>
            <option value="1">Admin</option>
        </select>
        <p><input type="submit" name="addAdmin" value="Ajouter"></p>
    </FORM>
    <a href="AjoutNews.php?deconnexion=true"><span>Déconnexion</span></a>
</div>
</html>

<?php ?>
