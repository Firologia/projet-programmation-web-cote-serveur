<?php

//MAIN DIRECTORY
$dir=__DIR__.'/../'; //nous ramène au répertoire au dessus

//Liste modules à inclure


//BD

$dsn='mysql:host=berlin.iut.local;dbname=dbjoartzet'; //nom BDD
$user='joartzet'; //nom utilisateur
$pass='achanger'; //mot de passe utilisateur
$action='';

//Vues
$vues['error']='view/error.php';
$vues['lobby']='view/lobby.php';


?>
