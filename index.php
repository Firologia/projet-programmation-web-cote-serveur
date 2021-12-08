<?php

//Chargement config.php
require_once(__DIR__.'/config/config.php');

//Chargement de l'autoloader
require_once(__DIR__.'/config/Autoload.php');
Autoload::charger();

$controller= new Controller();

?>