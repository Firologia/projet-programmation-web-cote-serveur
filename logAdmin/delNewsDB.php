<?php

if (isset($_POST['link'])){

    require_once ("../classes/Connection.php");
    require_once ("../classes/News.php");
    require_once ('../classes/NewsGateway.php');

    session_start();

    if ($adminNews = new NewsGateway($_SESSION['domain'],$_SESSION['username'],$_SESSION['password'])){
        if ($adminNews->DeleteNews($_POST['link'])){
            header('Location:DelNews.php?erreur=0');
        }
        else header('Location:DelNews.php?erreur=1');

    }
    else header('Location:DelNews.php?erreur=1');
}
?>