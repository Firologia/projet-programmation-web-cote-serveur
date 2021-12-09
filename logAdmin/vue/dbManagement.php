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
        if($_SESSION['username'] !== "" && $_SESSION['domain'] !== ""){
        $username = $_SESSION['username'];
        $domain = $_SESSION['domain'];
        echo "<p>User : $username <br> Domain : $domain </p>";
        }
        ?>
    </figure>
</div>
</body>
</html>