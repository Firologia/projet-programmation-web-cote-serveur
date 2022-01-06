<html>
<head>
    <title>Database management</title>
    <?php global $bootstrap; echo($bootstrap);?>
</head>
<header>
    <?php
    $pagecourante = basename(__FILE__);
    include(__DIR__.'/../../header/adminHeader.php'); ?>
</header>
<body>
<div class="container">
    <figure class="text-center">
<h2>Gestion des News</h2>
        <?php
        $username = $_SESSION['user']->getLogin();
        $domain = $_SESSION['domain'];
        $role = $_SESSION['user']->userRole();

        echo "<p>User : $username <br> Domain : $domain <br> role : $role</p>";

        if($_SESSION['user']->isSuperAdmin()){

            echo '<a class="btn btn-primary btn-sm" href="index.php?action=addAdmin" >Add admin</a> <br> <br>';
            echo '<a class="btn btn-primary btn-sm" href="index.php?action=reset" >Delete admin</a>';
        }
        ?>
    </figure>
</div>
</body>
</html>