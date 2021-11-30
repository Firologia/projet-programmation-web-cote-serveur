<?php
require_once("../classes/Connection.php");
require_once("../classes/News.php");
require_once("../classes/NewsGateway.php");
session_start();
$username = $_SESSION['username'];
$password = $_SESSION['password'];
$dsn = $_SESSION['domain'];

    if (isset($_POST['title']) && isset($_POST['description']) && isset($_POST['link']) && isset($_POST['pubDate']) && isset($_POST['category']))
    {
        $newsGtw = new NewsGateway($dsn,$username,$password);
        $newsGtw->InsertNews($_POST['title'], $_POST['description'], $_POST['link'], $_POST['link'],  $_POST['pubDate'], $_POST['category']);
        header("Location:AjoutNews.php");
    }

?>