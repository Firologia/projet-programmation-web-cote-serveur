<?php

if (isset($_POST['link'])){

    require_once("../classes/Connection.php");
    require_once("../classes/News.php");
    require_once('../classes/NewsGateway.php');

    session_start();

    $adminNews = new NewsGateway($_SESSION['domain'],$_SESSION['username'],$_SESSION['password']);

    try {
        $adminNews->DeleteNews($_POST['link']);
        header('Location:vue/DelNews.php?erreur=0');
    }catch (PDOException $e){
        header('Location:vue/DelNews.php?erreur=1');
    }


}
?>