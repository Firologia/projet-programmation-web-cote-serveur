<?php

//MAIN DIRECTORY
$dir=__DIR__.'/../'; //nous ramène au répertoire au dessus

//Liste modules à inclure


//BD

$dsn='mysql:host=berlin.iut.local;dbname=dbjoartzet'; //nom BDD
$user='joartzet'; //nom utilisateur
$pass='achanger'; //mot de passe utilisateur
$action='';
$bootstrap='<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">';


//Vues
$vues['error']='view/error.php';
$vues['lobby']='view/lobby.php';
$vues['logAdmin']='logAdmin/logAdmin.php';
$vues['addNews']='logAdmin/vue/AjoutNews.php';
$vues['delNews']='logAdmin/vue/DelNews.php';
$vues['admin']='logAdmin/vue/dbManagement.php';


?>
